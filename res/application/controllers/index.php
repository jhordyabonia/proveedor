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

		$this->load->model('popups_textos_model', 'popups_textos');
		$datos=$this->popups_textos->get(array('categoria'=>0));
		$titulos=array();
		foreach (explode(',',$datos->titulos) as $key => $value) 
		{
		   $dato_tmp=explode('|',$value);
		   if(count($dato_tmp)>1)
		   {
		       $titulos[$dato_tmp[0]]=$dato_tmp[1];
		   }else {$titulos[$value]=$value; }
		}

       	$datos->titulos=$titulos;
       	#$data['formulario_captura']="";#$this->load->view('index/formulario_solicitudes_index', array('categoria'=>$in,'datos'=>$datos),FALSE);		
		
		$data['registro']=$this->session->userdata('registro')|FALSE;
		$data['paso']=$this->session->userdata('paso')|0;
		$data['id_registro']=$this->session->userdata('id_registro')|0;
		$this->load->view('registro/funcionalidades',FALSE);
		
		$this->load->view('template/head', $data, FALSE);
		$this->load->view('template/javascript');
		$this->load->view('index/top_menu',$data);
		$this->load->view('registro/funcionalidades_',$data);
		$this->load->view('index/header_buscador',$data);
       	#$this->load->view('index/formulario_solicitudes_index', array('categoria'=>$in,'datos'=>$datos),FALSE);		
		$this->load->view('index/banner', $data);
 
        
        #$this->load->view("listados/listados_mobil", $data);
		$this->load->view('index/colaboradores', $data);
		$this->load->view('index/ultimos_productos_empresas', $data);

		/*
		$this->load->view('carrouseles/funcionalidades');
        $this->load->view('carrouseles/carousel_productos_destacados', $data);
		$this->load->view('carrouseles/carousel_oportunidades_comerciales', $data);
        $this->load->view('carrouseles/carousel_empresas_registradas', $data);
        $this->load->view('carrouseles/carousel_productos_publicados', $data);
        */
        
		#$this->load->view('index/banner_eventos',FALSE);
		$this->load->view('index/productos_destacados', $data);
		#$this->load->view('test/scroll', $data);
		$this->load->view('index/empresas_patrocinadas',$data);
		$this->load->view('index/productos_patrocinados', $data);
		$this->load->view('template/footer');
		$this->load->view('template/footer_empy');

		$this->session->set_userdata('registro',FALSE);
	}
}
