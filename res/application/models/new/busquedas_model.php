<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Busquedas_model extends CI_Model {

    const TABLE_NAME = 'busquedas';

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
    
    public function archive()
    {
        $t=1000;
        while($t>=0)
        {
            $query=$this->db->query("SELECT *, COUNT(`busqueda`) FROM `busquedas` GROUP BY `busqueda` HAVING COUNT(`busqueda`)>1")->result();
            $style_alert="style='background-color:red;'";
            foreach ($query as $key => $value)
            {
                if($value->contador>0)continue;
            $this->delete(array('busqueda'=>$value->busqueda));
            $method='COUNT(`busqueda`)';
            $log=array(
                #'id'=>$value->id,
                'busqueda'=>$value->busqueda,
                'resultados'=>"Fecha, registro más antigüo: $value->fecha resultado: $value->resultados",
                'contador'=>$value->$method
                );
            $this->insert($log);
            }
            $t=$t-1;
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
}
        