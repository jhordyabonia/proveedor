<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Empresa_model extends CI_Model {

    const TABLE_NAME = 'empresa';

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
        $this->db->select('id');
        $this->db->from(self::TABLE_NAME);
        if(is_array($palabra))
        {
            foreach ($palabra as $key => $value)
            {
                $this->db->or_like('nombre', $value, 'both'); 
                $this->db->or_like('descripcion', $value, 'both'); 
                $this->db->or_like('productos_principales', $value, 'both');
                $this->db->or_like('productos_de_interes', $value, 'both');
            }
        }else
        {            
                $this->db->or_like('nombre', $palabra, 'both'); 
                $this->db->or_like('descripcion', $palabra, 'both'); 
                $this->db->or_like('productos_principales', $palabra, 'both');
                $this->db->or_like('productos_de_interes', $palabra, 'both');
        }

        if($categoria!=0)
        {
           $this->db->where(array('categoria'=>$categoria));
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
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if($categoria!=0)
        {
            $this->db->where(array("categoria"=>$categoria));
        }
        $this->db->order_by("id", $order);
        $this->db->limit($limit);
        $list = $this->db->get()->result();
        
        return $list;
    }

}
        