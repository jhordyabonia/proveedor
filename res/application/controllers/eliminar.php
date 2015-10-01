<?php
/**
* Clase temporal para eliminar productos
*/
class Eliminar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("new/producto_model",'producto');
		$this->load->model("new/Solicitud_model",'solicitud');
		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Usuarios_model','usuarios');

	}

	public function producto($id='')
	{
		$this->producto->eliminar($id);
	}
	private function solicitud($id='')
	{
		$this->solicitud->eliminar($id);
	}
	public function empresa($id=FALSE)
	{
		$this->verifyc_login();
		if ($id) 
		{
			$id_usuario=$this->empresa->get($id)->usuario;
			$this->empresa->delete($id);
			$this->usuarios->get($id_usuario);
		}

    	redirect($_SERVER['HTTP_REFERER']);
	}
	private function verifyc_login()
    {
    	$id_usuario=$this->session->userdata('id_usuario');
    	$usuario=$this->usuarios->get($id_usuario);
    	if($usuario->permisos==1)
    	{	return;	}

    	redirect(base_url());
    } 

}