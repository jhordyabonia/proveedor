<?php
/**
* Clase temporal para eliminar productos
*/
class Eliminar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("producto_model");
		$this->load->model("oferta_model");
		$this->load->model('empresak_model');

	}

	public function producto($id='')
	{
		$this->producto_model->eliminar($id);
	}
	public function oferta($id='')
	{
		$this->oferta_model->eliminar($id);
	}
	public function empresa($nit=FALSE)
	{
		$this->verifyc_login();
		if ($nit) 
		{
			$this->load->model('producto_interes_model');
			$this->load->model('producto_empresa_model');
			$this->load->model('categoriaempresa_model');
			$this->load->model('membresia_empresa_model');
			$this->load->model('contactok_model');
			$this->load->model('usuario_model');
			$this->producto_interes_model->delete($nit);
			$this->producto_empresa_model->delete($nit);
			$this->categoriaempresa_model->delete($nit);
			$this->membresia_empresa_model->delete($nit);
			$id_contacto=$this->empresak_model->get($nit)->id_contacto;
			$id_usuario=$this->contactok_model->get($id_contacto)->id_user;
			$this->empresak_model->delete($nit);
			$this->contactok_model->delete($id_contacto);
			$this->usuario_model->delete($id_usuario);
		}

    	redirect($_SERVER['HTTP_REFERER']);
	}
	private function verifyc_login()
    {
    	$nit = $this->session->userdata('empresa');
    	if($nit=="1059985632-7"||($nit=="90058523"||$nit=="102223263921"))
    	{	return;	}

    	redirect(base_url());
    } 

}