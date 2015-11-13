<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		
	}
	public function get()
	{
		$data['url_registro']=base_url()."registro/registro_usuario";
		$data['url_publicar_producto']=base_url()."publicar_producto";
		$data['url_publicar_solicitud']=base_url()."publicar_oferta";
		return array(
			array(
				'img_url' => img_url()."index/slide-1.png", 
				'url' => $data['url_registro'], 
				'active' => 'active', 
			),
			array(
				'img_url' => img_url()."index/slide-2.png", 
				'url' => $data['url_publicar_producto'], 
				'active' => '', 
			),
			array(
				'img_url' => img_url()."index/slide-3.png", 
				'url' => $data['url_publicar_solicitud'], 
				'active' => '', 
			),
			array(
				'img_url' => img_url()."index/slide-4.png", 
				'url' => $data['url_publicar_solicitud'], 
				'active' => '', 
			)
		);
	}

}

/* End of file banner_model.php */
/* Location: ./application/models/banner_model.php */