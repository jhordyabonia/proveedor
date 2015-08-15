<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bloquear_contacto extends CI_Controller {
	///Constructor de la clase del control
	function __construct(){
		parent::__construct();
	 	$this->load->model('contactos_model');
	
	}

	function index (){
		//Desde aqui se llama la vista de bloquear contacto, y se envian las variables con los datos necesarios
		$id_user=$this->session->userdata('id_usuario');
		$datos['contacto2'] = $this->contactos_model->mostrar_contacto($id_user);
		$datos['count_contactos'] = $this->contactos_model->cantidad_contactos($id_user);
		$datos['bogota'] = $this->contactos_model->ct_bogota($id_user); 
	 	$datos['cali'] = $this->contactos_model->ct_cali($id_user); 
		$datos['medellin'] = $this->contactos_model->ct_medellin($id_user);
		$datos['otras_ciudades'] = $this->contactos_model->ct_otras($id_user);
		$this->load->view('vistas/bloquear_contacto', $datos);        
	}


/*Esta funcion llama a la vista de bloquear contacto y recorre cada checkbox seleccionado y es enviado al 
modelo para bloquear cada contacto*/
	function bloquear (){
		$checkbox = $this->input->post('bloquear'); 

		foreach ($checkbox as $key => $value) {
	    $this->contactos_model->bloquear_contacto($value);
   		}	
	// Despues de bloquear el/los contactos en la bd se crea un mensaje y se redirecciona para mostrarlo en la vista
		$this->session->set_flashdata('ct_bloqueado','Contacto(s) bloqueado !!');
		redirect('bloquear_contacto');

	}



}