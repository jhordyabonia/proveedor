<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_movil extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('new/categoria_model','categoria');
		$this->load->model('new/Subcategoria_model','subcategoria');
	}

	public function index()
	{
		$data['categorias']=$this->categoria->get_all();


		$data['registro']=$this->session->userdata('registro');
		$data['paso']=$this->session->userdata('paso');
		$data['id_registro']=$this->session->userdata('id_registro');

		$data['titulo']="PROVEEDOR.com.co";
		$data['id_usuario']= $this->session->userdata('id_usuario');
		$this->load->view('template/head', $data, FALSE);
		$this->load->view('template/javascript');
		$this->load->view('index/top_menu',$data);
		$this->load->view('index/header_categoria_movil',$data);
		$this->load->view('categorias/pagina_categorias_movil',$data);
		$this->load->view('template/footer');
		$this->load->view('template/footer_empy');
	}

	public function sub($categoria=6)
	{
		$data['registro']=$this->session->userdata('registro');
		$data['paso']=$this->session->userdata('paso');
		$data['id_registro']=$this->session->userdata('id_registro');
		$data['categoria']=$this->categoria->get($categoria);
		$data['subcategorias']=$this->subcategoria->get_all(array('id_categoria'=>$categoria));

		$this->load->view('template/head', $data, FALSE);
		$this->load->view('template/javascript');
		$this->load->view('index/top_menu',$data);
		$this->load->view('index/header_categoria_movil',$data);
		$this->load->view('categorias/pagina_subcategoria_movil',$data);
		$this->load->view('template/footer');
		$this->load->view('template/footer_empy');
	}
}