<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Solicitud_model extends CI_Model {

    const TABLE_NAME = 'solicitud';

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

     public function buscar($palabra = "",$categoria=0)
    {
        $this->db->select('solicitud.id');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('empresa',"empresa.id = solicitud.empresa");
        $this->db->or_like('palabras_clave', $palabra, 'both'); 
        $this->db->or_like('empresa.nombre', $palabra, 'both'); 
        $this->db->or_like('empresa.descripcion', $palabra, 'both'); 
        $this->db->or_like('empresa.productos_de_interes', $palabra, 'both'); 
        $this->db->or_like('solicitud.nombre', $palabra, 'both'); 
        $this->db->or_like('solicitud.descripcion', $palabra, 'both'); 

        $this->load->model('new/Subcategoria_model','subcategoria');
        if($categoria!=0)
        {
           $this->db->join('subcategoria',"subcategoria.id_subcategoria = solicitud.subcategoria"); 
           $this->db->join('categoria',"categoria.id_categoria = subcategoria.id_categoria ");
           $this->db->where(array('categoria.id_categoria'=>$categoria));
        }
        
        $this->db->order_by('empresa.membresia',"acend");
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
        $this->load->model('new/Subcategoria_model','subcategoria');
        $categorias=$this->subcategoria->get_all(array('id_categoria'=>$categoria));
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if($categoria!=0)
        {  
             foreach ($categorias as $key => $value) 
            {
                $this->db->where(array("subcategoria"=>$value->id_subcategoria));
            }
        }
        $this->db->order_by("id", $order);
        $this->db->limit($limit);
        $list = $this->db->get()->result();
        
        foreach ($list as $solicitud)
        {
            $img=explode(',',$solicitud->imagenes);
            if ($img)
             {  $solicitud->imagen=base_url()."uploads/".$img[0];   }
            else{   $solicitud->imagen=base_url()."uploads/default.jpg"; }

            $dimension=$this->dimension->get($solicitud->medida);
            if($solicitud->cantidad_requerida==1)
            {   $solicitud->medida=$dimension->nombre;   }
            else  {   $solicitud->medida=$dimension->prural;   }
            $solicitud->url=base_url()."oportunidad_comercial/ver/".$solicitud->id;
            $data_empresa=$this->empresa->get($solicitud->empresa);
            if(!$data_empresa)
            {
                $data_empresa->nombre="Nombre de empresa no provisto";
                $data_empresa->nit = "404";
                $data_empresa->logo = "default.jpg";
            }
            $solicitud->nombre_empresa=$data_empresa->nombre;
            $solicitud->url_empresa=base_url()."perfil/ver_empresa/".$data_empresa->nit;
            $solicitud->logo_empresa=base_url()."uploads/logos/".$data_empresa->logo;
            $data_empresa=NULL;
        }
        return $list;
    }

}
        