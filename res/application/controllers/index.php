<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('new/Producto_model','producto');
		$this->load->model('new/Solicitud_model', 'solicitud');
		$this->load->model('new/Empresa_model', 'empresa');
		$this->load->model('banner_model');
		$this->load->model('new/Categoria_model','categoria');
	}
	
	public function index()
	{
		$data['id_usuario']= $this->session->userdata('id_usuario');
		$data['categorias']=$this->categoria->get_all();
		$data['titulo']="PROVEEDOR.com.co";
		$data['url_registro']=base_url()."registro/registro_usuario";
		$data['url_publicar_producto']=base_url()."publicar_producto";
		$data['url_publicar_solicitud']=base_url()."publicar_oferta";
		$data['banners']= $this->banner_model->get();
		$data['productos_destacados_1']=$this->producto->obtener_ultimos(11,"RANDOM");
		$data['productos_destacados_2']=$this->producto->obtener_ultimos(11,"RANDOM");
		$data['productos_destacados_3']=$this->producto->obtener_ultimos(11,"RANDOM");
		$data['productos_patrocinados']=$this->producto->obtener_ultimos(2);
		$data['productos']=$this->producto->obtener_ultimos(5);
		$data['solicitudes']=$this->solicitud->obtener_ultimos(5);
		$data['empresas']=$this->empresa->obtener_ultimos(5);

		$this->load->view('template/head', $data, FALSE);
		$this->load->view('template/javascript');
		$this->load->view('index_test/top_menu',$data);
		$this->load->view('index_test/header_buscador',$data);
		$this->load->view('index_test/banner', $data);
		$this->load->view('index_test/colaboradores', $data);
		$this->load->view('index_test/ultimos_productos_empresas', $data);
		$this->load->view('index_test/banner_eventos',FALSE);
		$this->load->view('index_test/productos_destacados', $data);
		$this->load->view('index_test/productos_patrocinados', $data);
		$this->load->view('index_test/empresas_patrocinadas',$data);
		$this->load->view('template/footer');
		$this->load->view('template/footer_empy');
	}
}
