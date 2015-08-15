<?php 

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Membresia_model extends CI_Model 
{

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'membresia';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'id';

	function tipo_membresia_empresa($id_empresa)
	{
		$this->db->select('id_membresia');     
		$this->db->from('membresia_empresa');
		$this->db->where('id_empresa', $id_empresa);
		$query=$this->db->get();
		$d=$query->row_array();
		$out=$this->get($d['id_membresia']);
		//$out=$d['id_membresia'];
		return  $out;
	}
	function nombre_membresia_empresa($id_empresa)
	{
		$this->db->select('id_membresia');     
		$this->db->from('membresia_empresa');
		$this->db->where('id_empresa', $id_empresa);
		$query=$this->db->get();
		$d=$query->row_array();

		$out=$this->get_nombre($d['id_membresia']);
		//$out=$d['id_membresia'];
	   
		return  $out['nombre'];
	}

	function get_logo($id) 
	{
		$this->db->select('logo');     
		$this->db->from('membresia');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	} 
	function get_nombre($id) 
	{
		$this->db->select('nombre');     
		$this->db->from('membresia');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	} 
	public function insert(Array $data) {
		$query=$this->db->get_where('membresia_empresa',$data);
		if ($query->num_rows()==0) {
			if ($this->db->insert('membresia_empresa', $data)) {
				return $this->db->insert_id();
			} else {
				return false;
			}
		}else{
			return false;
		}
	}
	public function get_all($id)
	{
		$this->db->select('*');     
		$this->db->from('membresia_empresa');
		$this->db->where('id_empresa', $id);
		$query = $this->db->get();
		$results=$query->row_array();
		$data = $this->get($results['id_membresia']);
		$data->url = base_url()."assets/img/membresia/".$data->logo;
		return $data;
	}
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

	/**
	 * Updates selected record in the database
	 *
	 * @param Array $data Associative array field_name=>value to be updated
	 * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
	 * @return int Number of affected rows by the update query
	 */
	public function update(Array $data, $where = array()) {
			if (!is_array($where)) {
				$where = array('membresia' => $where);
			}
		$this->db->update('membresia', $data, $where);
		return $this->db->affected_rows();
	}

	/**
	 * Deletes specified record from the database
	 *
	 * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
	 * @return int Number of rows affected by the delete query
	 */
	public function delete($where = array()) {
		if (!is_array()) {
			$where = array(self::PRI_INDEX => $where);
		}
		$this->db->delete(self::TABLE_NAME, $where);
		return $this->db->affected_rows();
	}
	public function get_div($id_empresa='')
	{
		$this->load->model('membresia_empresa_model','membresia_empresa');
		$membresia=$this->membresia_empresa->get_id_membresia($id_empresa);
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
		$this->load->model('membresia_empresa_model','membresia_empresa');
		$membresia=$this->membresia_empresa->get_id_membresia($id_empresa);
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