<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Producto_model extends CI_Model {

    const TABLE_NAME = 'producto';

    const PRI_INDEX = 'id';

    public function get($where = NULL) {
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $result = $this->db->get()->result();
        if ($result) {
            if ($where !== NULL) {
                return array_shift($result);
            } else {
                return $result;
            }
        } else {
            return false;
        }
    }

    public function get_all($where = NULL) {
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $result = $this->db->get()->result();
        if ($result)
        {   return $result; }
        else 
        {   return false;   }
    }

    public function insert(Array $data) {
        if ($this->db->insert(self::TABLE_NAME, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update(Array $data, $where = array()) {
            if (!is_array($where)) {
                $where = array(self::PRI_INDEX => $where);
            }
        $this->db->update(self::TABLE_NAME, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($where = array()) {
        if (!is_array($where)) {
            $where = array(self::PRI_INDEX => $where);
        }
        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
    }
    public function buscar($palabra = "",$categoria=0,$subcategoria=0)
    {
        $this->db->select('producto.id,producto.subcategoria');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('empresa',"empresa.id = producto.empresa");
        if(is_array($palabra))
        {
            foreach ($palabra as $key => $value)
            {
                if($value=="")continue;
                $this->db->or_like('palabras_clave', $value, 'both'); 
                #$this->db->or_like('empresa.nombre', $value, 'both'); 
                #$this->db->or_like('empresa.descripcion', $value, 'both'); 
                #$this->db->or_like('empresa.productos_principales', $value, 'both'); 
                $this->db->or_like('producto.nombre', $value, 'both'); 
                $this->db->or_like('producto.descripcion', $value, 'both'); 
            }
        }
        elseif($categoria!=0)
        {
            $this->db->join('subcategoria', 'producto.subcategoria = subcategoria.id_subcategoria ');
                if($subcategoria!=0)
                {    $this->db->where(array("subcategoria.id_subcategoria"=>$subcategoria));    }
                else {  $this->db->where(array("subcategoria.id_categoria"=>$categoria));   }
        }else
        {
            $this->db->or_like('palabras_clave', $palabra, 'both'); 
            #$this->db->or_like('empresa.nombre', $palabra, 'both'); 
            #$this->db->or_like('empresa.descripcion', $palabra, 'both'); 
            #$this->db->or_like('empresa.productos_principales', $palabra, 'both'); 
            $this->db->or_like('producto.nombre', $palabra, 'both'); 
            $this->db->or_like('producto.descripcion', $palabra, 'both'); 
        }

       
        
        $this->db->order_by('empresa.membresia',"desc");
        $this->db->order_by('empresa.legalizacion',"desc");
        $this->db->order_by('producto.fecha_publicacion',"desc");
        
        $result = $this->db->get()->result();
        if ($result)
        {   return $result; }
        else 
        {   return false;   }
    }

    public function obtener_ultimos($limit=10, $order = "desc",$categoria=0)
    {
        $this->load->model('new/Dimension_model','dimension');
        $this->load->model('new/Empresa_model','empresa');
        #$this->load->model('new/Subcategoria_model','subcategoria');
        #$categorias=$this->subcategoria->get_all(array('id_categoria'=>$categoria));
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('subcategoria', 'producto.subcategoria = subcategoria.id_subcategoria ');     
       if($categoria!=0)
        {
            $this->db->where(array("subcategoria.id_categoria"=>$categoria));
        }
        $this->db->order_by("id", $order);
        $this->db->limit($limit);
        $list = $this->db->get()->result();
        
        foreach ($list as $producto)
        {
            $img=explode(',',$producto->imagenes);
            if ($img)
             {
                $producto->imagen="default.jpg";
                foreach ($img as $key => $i)
                 {
                    if($i==''){continue;}
                    $producto->imagen=$i;
                    if($i!=''){break;}
                  }  
             }
            else{   $producto->imagen="default.jpg"; }

            $dimension=$this->dimension->get($producto->medida);
            if($producto->pedido_minimo==1)
            {   $producto->medida=$dimension->nombre;   }
            else  {   $producto->medida=$dimension->prural;   }
            $producto->url=base_url()."producto/ver/".$producto->id;
            $data_empresa=$this->empresa->get($producto->empresa);
            if(!$data_empresa)
            {
                $data_empresa->nombre="Nombre de empresa no provisto";
                $data_empresa->nit = "404";
                $data_empresa->logo = "default.png";
            }
            $producto->nombre_empresa=$data_empresa->nombre;
            $producto->url_empresa=base_url()."perfil/ver_empresa/".$data_empresa->id;
            $producto->logo_empresa=$data_empresa->logo;
            $data_empresa=NULL;
        }
        return $list;
    }
    
}
        