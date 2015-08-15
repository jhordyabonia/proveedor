<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Busqueda_model extends CI_Model 
{
    public function construct() 
    {
        parent::__construct();
    }
 
    function resultado_producto($busqueda)
    { 
        $this->db->like('nom_producto', $busqueda);        
        $this->db->join('negociacion','negociacion.id_producto = producto.id_producto');
        $this->db->join('img_producto','img_producto.id_producto = producto.id_producto');
        $this->db->join('contacto','contacto.id_user = producto.id_usuario');
        $this->db->join('empresa','empresa.id_contacto = contacto.id_contacto');
        $consulta = $this->db->get('producto');
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
        else {
            return FALSE;
        }
    }

   function resultado_oferta ($busqueda)
   {
        $this->db->like('nom_producto', $busqueda);
        $this->db->join('img_oferta','img_oferta.id_oferta = oferta.id_oferta');
        $this->db->join('negociacion2','negociacion2.id_oferta = oferta.id_oferta');
        $this->db->join('contacto','contacto.id_user = oferta.id_usuario');
        $consulta = $this->db->get('oferta');
        if ($consulta->num_rows() > 0) 
        {   return $consulta->result() ;    }
        else {  return FALSE;    }
    }

      function resultado_proveedor($busqueda)
      {
        /*
        $ofertas = $this->resultado_oferta($busqueda);
        $porductos = $this->resultado_porducto($busqueda);

        foreach ($oferta as $key => $value)
        {
            $this->db->join('producto_empresa2', 'producto_empresa2.id_producto = '.$value->id_producto);
            $this->db->join('id_usuario');
            $this->db->join('');
            $this->db->join('');
            $this->db->join('');
            $this->db->get('empresa');
        }
        */
        $this->db->like('nombre', $busqueda);
        $this->db->join('producto_empresa','producto_empresa.nit_empresa = empresa.nit');
        $this->db->join('tipo_empresa','tipo_empresa.id_tipoempresa = empresa.tipo_empresa');
        $this->db->join('contacto','contacto.id_contacto = empresa.id_contacto');
        $this->db->join('producto','producto.id_usuario = contacto.id_user');
        $this->db->join('img_producto','img_producto.id_producto = producto.id_producto');
        $consulta = $this->db->get('empresa');
        if ($consulta->num_rows() > 0) 
        {   return $consulta->result() ;    }
        else {  return FALSE;    }
     }

    function productos_principales($id)
    {
        $this->db->select('nombre_img');
        $this->db->from('img_producto');
        $this->db->where('id_producto', $id);
        $query = $this->db->get();   
        
        return $query;
    }


    function ver_productos()
    {
        $this->db->select('*');
        $this->db->from('img_producto');
        $this->db->join('producto', 'producto.id_producto = img_producto.id_producto');
        $this->db->join('negociacion', 'negociacion.id_producto = producto.id_producto');
        $this->db->order_by("nom_producto", "random");
        $query = $this->db->get();
        return $query->result();
    }

    function count_ciudad($busqueda,$ciudad)
    {
        $this->db->like('nom_producto', '%'.$busqueda.'%'); 
        $this->db->where('ubicacion', $ciudad); 
        $this->db->from('producto');   
        
        return $this->db->count_all_results();;
    }
    public function count_productos($palabra='')
    {
        $this->db->like('nom_producto', $palabra); 
        $this->db->select('id_producto');
        return $this->db->get('producto')->num_rows;
    }

    /**
        *@busqueda: datos a buscar
        *@tipo_busqueda: describe el tipo de busqued a realizar:
        *'Simple' > retorna el string, con las modificaciones pertinentes
        *'Compuesta' > realiza las modificaciones pertinentes y descompone el string
        * en un array de estring segun sus espacios (%20).
    */

    public function analisis_busqueda($busqueda,$tipo_buqueda='Simple')
    {
        //implementar analicis de la cadena, conlas erramientas de strign.
        $busqueda=str_replace('%20',' ',$busqueda); 
        $busqueda=str_replace(')',"%19",$busqueda);
        $busqueda=str_replace('%19',")",$busqueda);
        $busqueda=str_replace('%C2%BF',"¿",$busqueda);
        $busqueda=str_replace('%C2%B4','´',$busqueda);
        //$busqueda=str_replace('_',' ',$busqueda); 
        $busqueda=str_replace('C2 A1','!',$busqueda); 
        $busqueda=str_replace('%C2%A1','¡',$busqueda); 

        if($tipo_buqueda!='Simple')
        {
            $out = explode(' ',$busqueda);
            foreach ($out as $key => $value) #construlccion del singular
            {
                $end_value=substr($value,-2);
                if($end_value=="es"||$end_value=="ES")
                {
                    $out[]=str_replace($end_value,"",$value); 
                }      
                else
                {
                    $end_value=substr($value,-1);
                    if($end_value=="s"||$end_value=="S")
                    {
                        $out[]=str_replace($end_value,"",$value); 
                    }
                    else
                    {                        
                        $out[]=$value; 
                    }
                }    
            }            
            $out[] = $busqueda;
            return array_reverse($out);
        }

        return $busqueda;
    }
    public function buscar_productos($palabra="",$categoria=0)
    {
        if ($palabra!="")
        {
            $this->db->select('producto.id');
            $this->db->join('empresa', 'empresa.id = producto.empresa');
            #$this->db->like('producto.nombre', $palabra, 'both'); 
            $palabra=$this->analisis_busqueda($palabra,'Compuesta');
            foreach ($palabra as $key => $value)
            {
                $this->db->or_like('producto.nombre', $value, 'both'); 
                $this->db->or_like('producto.descripcion', $value, 'both'); 
                $this->db->or_like('empresa.nombre', $value, 'both');
                $this->db->or_like('empresa.descripcion', $value, 'both'); 
                $this->db->or_like('empresa.palabras_clave', $value, 'both');
            }
            $this->db->order_by('empresa.membresia', 'desc');
        }else
        {
            $this->db->select('producto.id'); 
            $this->db->order_by('producto.id', 'desc');
            if($categoria!=0)
            {
                $this->db->join('subcategoria', 'producto.subcategoria = subcategoria.id_subcategoria ');
                $this->db->where(array("subcategoria.id_categoria"=>$categoria));
            }   
        }
        $query = $this->db->get('producto');
        if ($query->num_rows) 
        {
            $productos = $query->result_array();
            foreach ($productos as $key => $producto) 
            {
                $data[]=$producto['id_producto'];
            }
            return $data;
        }
        return FALSE;
    } 
    public function buscar_solicitudes($palabra="",$categoria=0)
    {      
        if($palabra!="")
        {
            $this->db->select('oferta.id_oferta');
            $this->db->join('usuario', 'usuario.id_usuario = oferta.id_usuario');
            $this->db->join('contacto', 'contacto.id_user = oferta.id_usuario');
            $this->db->join('empresa', 'empresa.id_contacto = contacto.id_contacto');
            $this->db->join('membresia_empresa', 'empresa.nit = membresia_empresa.id_empresa', 'left');
            $this->db->join('palabras_clave', 'palabras_clave.id_oferta = oferta.id_oferta');
            $this->db->like('nom_producto', $palabra, 'both'); 
            $palabra=$this->analisis_busqueda($palabra,'Compuesta');
            foreach ($palabra as $key => $value)
            {
                $this->db->or_like('nom_producto', $value, 'both'); 
                $this->db->or_like('oferta.descripcion', $value, 'both'); 
                $this->db->or_like('empresa.nombre', $value, 'both');
                $this->db->or_like('empresa.descripcion', $value, 'both'); 
                $this->db->or_like('palabras_clave.palabra', $value, 'both');
            }
            $this->db->order_by('membresia_empresa.id_membresia', 'desc');
        }else
        {
          $this->db->select('oferta.id_oferta'); 
          $this->db->order_by('oferta.id_oferta', 'desc');
            if($categoria!=0)
            {
                $this->db->join('subcategoria', 'oferta.id_subcategoria = subcategoria.id_subcategoria ');
                $this->db->where(array("subcategoria.id_categoria"=>$categoria));
            }   
        } 
        $query = $this->db->get('oferta');
        if ($query->num_rows) 
        {            
            $ofertas = $query->result_array();
            $data= array("");
            foreach ($ofertas as $key =>  $oferta) 
            {
                 $data[]=$oferta['id_oferta']; 
            }
            return $data;
        }
        return FALSE;
    }
    public function buscar_proveedores($palabra="")
    {
        if($palabra!="")
        {
            $this->db->select('empresa.nit');
            $this->db->join('membresia_empresa', 'empresa.nit = membresia_empresa.id_empresa', 'left');
            $this->db->join('producto_empresa', ' producto_empresa.nit_empresa = empresa.nit');
            $this->db->join('producto_interes', ' producto_interes.nit_empresa = empresa.nit');
            $this->db->like('nombre', $palabra, 'both'); 
            $palabra=$this->analisis_busqueda($palabra,'Compuesta');
            foreach ($palabra as $key => $value)
            {
                $this->db->or_like('nombre', $value, 'both');
                $this->db->or_like('empresa.descripcion', $value, 'both'); 
                $this->db->or_like('producto_empresa.nombre_producto', $value, 'both');
                $this->db->or_like('producto_interes.nombre_producto', $value, 'both');
            }
            $this->db->order_by('membresia_empresa.id_membresia', 'desc');
        }else 
        {
            $this->db->select('empresa.nit');
            $this->db->order_by('empresa.id_contacto', 'desc'); 
        }
       
        $query = $this->db->get('empresa');
        if ($query->num_rows)
        {           
            $proveedores = $query->result_array();
            foreach ($proveedores as $key =>  $proveedor) 
            {
                $data[$key]=$proveedor['nit'];
            }
            return $data;
        }
        return FALSE;
    }
    
}