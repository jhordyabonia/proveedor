<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cotizacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->model('new/Usuarios_model', 'usuarios');
		$this->load->model('new/Empresa_model', 'empresa');
		$this->load->model('new/Cotizacion_model', 'cotizacion');
		$this->load->model('new/Categoria_model','categoria'); 
		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');

		$this->load->library('grocery_CRUD');
			$this->verifyc_login();
	}
    private function verifyc_login()
    {
    	$usuario =$this->usuarios->get($this->session->userdata('id_usuario'));
    	if($usuario->permisos==1)
    	{	return TRUE;	}

    	redirect(base_url());
    } 

	private function toArray($obj)
	{
		$out;
		foreach ($obj as $key => $item) 
		{
			$out[$key]=$item;
		}
		return $out;
	}
	private function show($output = null)
	{
		$datos['titulo']="Proveedor Administrador - Solicitudes Especiales";
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$datos['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
		$datos['administrador']=$datos['usuario']->permisos;
		
		$this->load->view('template/head', $datos);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('template/javascript', FALSE);

		$this->load->view('cotizacion.php',$output);
	}

	public function index()
	{ $this->cotizacion();}

	public function crear($id)
	{		
		if($this->cotizacion->get(array('solicitud'=>$id))!=FALSE)
			redirect(base_url().'cotizacion/','refresh');

		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
		$source=$this->asistentes_proveedor->get($id);

		$in_update['nombre']=$source->solicitud;
		$in_update['solicitud']=$source->id;		
		$in_update['descripcion']=$source->descripcion;
		$in_update['comprador']=$source->empresa;
    	$this->db->insert('cotizacion',$in_update);

    	redirect(base_url().'cotizacion/','refresh');
	}
	public function cotizacion_read()
	{
		
	}

	public function cotizacion()
	{
			$crud = new grocery_CRUD();
					
			$crud->add_fields('Items');
			$crud->set_theme('datatables');
			$crud->set_table('cotizacion');
			$crud->set_subject('Cotizacion');
			$crud->display_as('id','ID');
			$crud->display_as('nombre','Solicitud');
			$crud->columns('No.','fecha','id','nombre','comprador','valor','Cotizaciones Recibidas','Ordenes de Compra','Activadas');
			$crud->set_relation('comprador', 'empresa','nombre');

			$crud->add_action('Agragar Items', '', '','ui-icon-image',array($this,'add_item'));
			$crud->add_action('Ver Items', '', '','ui-icon-image',array($this,'view_item'));
			$crud->add_action('Ver Comprador', '', '','ui-icon-image',array($this,'viewSeller'));

			$output = $crud->render();

			$this->show($output);
	}
	public function view_item($pk,$data)
	{
		return site_url('cotizacion/item/'.$pk);
	}
	public function viewSeller($pk,$data)
	{
		return site_url('micro_admin/empresas_/read/'.$data->comprador);
	}
	public function make_item($pk)
	{
		$in=array('cotizacion'=>$pk);        
        $this->db->insert('item',$in);    	
    	redirect(base_url().'cotizacion/item/edit/'.$this->db->insert_id(),'refresh');
	}
	public function add_item($pk,$data)
	{
    	return site_url('cotizacion/make_item/'.$pk);
	}

	public function item($pk=NULL)
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('item');
			$crud->set_subject('Item');	

			$crud->set_relation('cotizacion', 'cotizacion','nombre');
			if($pk===NULL)
				redirect(base_url().'cotizacion','refresh');
			$crud->where('cotizacion',$pk);
			$crud->add_action('Ver Ofertas', '', '','ui-icon-image',array($this,'viewOferts'));
   			$crud->unset_add();
			$output = $crud->render();


			$datos['titulo']="Proveedor Administrador - Solicitudes Especiales";
			$id_usuario=$this->session->userdata('id_usuario');
			$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
			$datos['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
			$datos['administrador']=$datos['usuario']->permisos;
			
			$this->load->view('template/head', $datos);
			$this->load->view('tablero_usuario/header', $datos, FALSE);
			$this->load->view('template/javascript', FALSE);
			/*
			*/

			$output->solicitud=$this->asistentes_proveedor->get($this->cotizacion->get($pk)->solicitud);
			$output->solicitud->categoria=$this->categoria->get($data['solicitud']->categoria)->nombre_categoria;

			$this->load->view('items.php',$output);
	}

  
	public function oferta($pk=NULL)
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('oferta');
			$crud->set_subject('Oferta');	

			$crud->set_relation('item', 'item','precio_unidad');
			if($pk===NULL)
				redirect($_SERVER['HTTP_REFERER'],'refresh');
			$crud->where('item',$pk);
   			$crud->unset_add();
			$output = $crud->render();

			$this->show($output);
	}
	public function viewOferts($pk,$data)
	{
		return site_url('cotizacion/oferta/'.$pk);
	}

}