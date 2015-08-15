<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Membresia_model extends CI_Model {

    const TABLE_NAME = 'membresia';

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
    public function get_div($id_empresa='')
    {
        $this->load->model('new/empresa_new_model','empresa');
        $membresia=$this->empresa->get($id_empresa)->membresia;
        switch ($membresia) {
            case '1':
                $data=$this->get(1);
                $div = $this->load->view('membresia/estandar', $data, TRUE);
                return $div;
                break;
            case '2':
                $data=$this->get(2);
                $div = $this->load->view('membresia/verificada', $data, TRUE);
                return $div;
                break;
            case '3':
                $data=$this->get(3);
                $div = $this->load->view('membresia/platino', $data, TRUE);
                return $div;
                break;
        }
    } 
    public function get_div_list($id_empresa='')
    {
        $this->load->model('new/Empresa_model','empresa');
        $membresia=$this->empresa->get($id_empresa)->membresia;
        switch ($membresia) {
            case '1':
                $data=$this->get(1);
                $div = $this->load->view('membresia/estandar_list', $data, TRUE);
                return $div;
                break;
            case '2':
                $data=$this->get(2);
                $div = $this->load->view('membresia/verificada_list', $data, TRUE);
                return $div;
                break;
            case '3':
                $data=$this->get(3);
                $div = $this->load->view('membresia/platino_list', $data, TRUE);
                return $div;
                break;
        }
    }  
}
        