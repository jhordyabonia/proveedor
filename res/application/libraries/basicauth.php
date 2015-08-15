
<?php

/**
* 
*/
class Basicauth 
{
	
	function __construct()
	{
	$this->CI = & get_instance();	
	}


	function login ($usuario, $password) {
		$data = array();
		$query = $this->CI->db->get_where('login', array('usuario'=>$usuario, 'password' =>md5($password)));

		if ($query->num_rows()>0) {
			$this->CI->session->sess_destroy();
			$this->CI->session->sess_create();
			$this->CI->session->set_userdata(array('logged_in'=>true, 'usuario'=>$usuario, 'id'=>$query->row()->id));
		}else {
		$data['error'] = 'Usuario o contraseña incorrectos';	
		}
		return $data;
	}



	function logout() {
		$this->CI->session->sess_destroy();

	}
	

}


?>