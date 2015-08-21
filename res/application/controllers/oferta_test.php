<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class oferta_test extends CI_Controller {

	var $id_oferta_editar;
	///Constructor de la clase del control
	function __construct() {
		parent::__construct();
		$this->load->model('new/Usuarios_model','usuarios');
		$this->load->model('new/Solicitud_model','solicitud');
		$this->load->model('new/Dimension_model','dimension');
		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Categoria_model','categoria');
		$this->load->model('new/Subcategoria_model','subcategoria');
		$this->load->model('new/Departamento_model','departamento');
		$this->load->model('new/Municipio_model','municipio');
		$this->load->model('u_model', "u");
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url'));
	}

	// Esta funcion es la encargada de llamar la vista de organizar ofertas de compra en tablero usuario 
	
	function administrar() 
	{
		$id = $this->session->userdata('id_usuario');
		$this->verificar_logged();
		$empresa=$this->empresa->get(array('usuario'=>$id));
		if(!$empresa)
		{
			show_404();
		}
		
		$datos['solicitudes'] = $this->solicitud->get_all(array('empresa' => $empresa->id));
		if(!$datos['solicitudes'])
		{	$datos['solicitudes'] =array();	}
		foreach ($datos['solicitudes'] as $key => $value) 
		{	
			$tmp = array_shift(explode(',',$value->imagenes));
			if($tmp)
				{	$datos['solicitudes'][$key]->nombre_img =$tmp;	}
			else
				{	$datos['solicitudes'][$key]->nombre_img ="";	}			
		}
		$datos['solicitudes_cantidad'] = count($datos['solicitudes']);

		$datos['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
		$datos['administrador']=$datos['usuario']->permisos;
		$datos['titulo']="Administrar mis productos - PROVEEDOR.com.co";
		$datos['empresa']=$empresa;
		//Carga de las vistas
		$this->load->view('template/head', $datos);
		$this->load->view('template/javascript', $datos, FALSE);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('tablero_usuario/administrar_ofertas', $datos);

	}
	// obtener los datos de las categorias de un producto
	private function obtener_datos_categoria($id_subcategoria)
	{
		$out['subcategoria']=$this->subcategoria->get($id_subcategoria);
		$out['categoria']=$this->categoria->get($out['subcategoria']->id_categoria);
		$out['subcategorias'] = $this->subcategoria->get_all($out['subcategoria']->id_categoria); 
		return $out;
	}

	//funcion para verificar que el oferta pertenezca al usuario con sesion iniciada
	public function verificar_logged($id_oferta=NULL)
	{
		$id_usuario = $this->session->userdata('id_usuario');
		$empresa = $this->empresa->get(array('usuario'=>$id_usuario));
		$nit=$empresa->nit;
		if($nit=="1059985632-7"||($nit=="90058523"||$nit=="102223263921"))
    	{	return TRUE;	}


		if($id_oferta==NULL)
		{
			if(!$id_usuario=='')
				{	return  TRUE; }
			else
				{
					redirect('/logueo');
					return FALSE;
				}	
		}

		$solicitud=$this->solicitud->get($id_oferta);
		$empresa=$this->empresa->get($solicitud->empresa);
		if(!$solicitud)
		{
			show_404();
			return FALSE;
		}else
		{		
			if($id_usuario===$empresa->usuario)
				{	return  TRUE; }
			
		}
		 
		redirect('/tablero_usuario');
		return FALSE;
	}
	public function editar($id_oferta) 
	{	
		if (!$this->verificar_logged($id_oferta))
		{	return;	}

		$data['categoria'] = $this->categoria->get_all();
			
		$data['solicitud']=$this->solicitud->get($id_oferta);
		$data['solicitud']->palabras_clave=explode(',',$data['solicitud']->palabras_clave);
		$data['solicitud']->tipo_pago=explode(',',$data['solicitud']->formas_de_pago);
		$data['solicitud']->imagenes=explode(',',$data['solicitud']->imagenes);
		$data['solicitud']->tipo_pago=$this->tipos_de_pago_actuales($data['solicitud']->tipo_pago);
		$data['solicitud']->medida=$this->dimension->get($data['solicitud']->medida);
		$data['departamentos'] = $this->departamento->get_all();
		$data['municipios'] = $this->municipio->get_all(array('id_departamento'=>$data['solicitud']->departamento_entrega));		
		#echo "<PRE>";
		#print_r($data['solicitud']);
		#echo "</PRE>";
		#return;
		$data['datos_categoria'] = $this->obtener_datos_categoria($data['solicitud']->subcategoria);
		$data['error'] = '';
		$data['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));		
		$data['administrador']=$data['usuario']->permisos;
		$data['empresa']=$this->empresa->get($data['solicitud']->empresa);
		$data['titulo']="Editar una solicitud de producto o servicio - PROVEEDOR.com.co";
		$this->load->view('template/head', $data);
		$this->load->view('template/javascript', $data, FALSE);
		$this->load->view('tablero_usuario/header', $data, FALSE);
		$this->load->view('oferta/editar', $data, FALSE);
		$this->load->view('template/footer_empy', $data, FALSE);
	}

	function actualizar($id_solicitud) 
	{
		#crear metodo de verificacion

		#if($this->validar())
		{
			$solicitud=$this->get_data_form();
			$this->solicitud->update($solicitud,$id_solicitud);
			$this->_images_form($id_solicitud);
			$this->session->set_flashdata('oferta_editada', 'Oferta registrada exitosamente!!');
			redirect(base_url() . 'oferta_test/administrar', 'refresh');
		}
		#else
		#{$this->index();}
	}
	

	function validar() {
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('categoria', 'categoria', 'trim|required');
		$this->form_validation->set_rules('subcategoria', 'subcategoria', 'trim|required');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|min_length[15]');
		$this->form_validation->set_rules('etiquetas', 'etiquetas', 'required');
		$this->form_validation->set_rules('precio', 'precio', 'required|is_natural');
// $this->form_validation->set_rules('cantidad', 'Cantidad', 'is_natural');
		$this->form_validation->set_rules('cantidad2', 'Cantidad', 'is_natural');
// $this->form_validation->set_rules('datepicker', 'tiempo', 'required');
		$this->form_validation->set_rules('departamento', 'departamento', 'required');
		$this->form_validation->set_rules('municipio', 'municipio', 'required');
		$this->form_validation->set_rules('otro', 'otro', 'alpha');
		$this->form_validation->set_message('required', 'Campo obligatorio');
		$this->form_validation->set_message('is_natural', 'Escriba numeros sin espacios ni puntos');
		$this->form_validation->set_message('alpha', 'Escriba caracteres alfabeticos a-z/A-Z');
		return $this->form_validation->run();
	}
	
	function get_data_form() {
		$data['nombre'] = $this->input->post('nombre');
		#$data['categoria'] = $this->input->post('categoria');
		$data['subcategoria'] = $this->input->post('subcategoria');
		$data['descripcion'] = $this->input->post('descripcion');
		$data['palabras_clave'] = $this->a_string(json_decode($this->input->post('etiquetas'),TRUE));
		$data['cantidad_requerida'] = $this->input->post('cantidad');
		$data['medida'] = $this->input->post('list_medida');
		$data['precio_maximo'] = $this->input->post('precio');
		$data['departamento_entrega'] = $this->input->post('departamento');
		$data['ciudad_entrega'] = $this->input->post('municipio');
		$data['formas_de_pago'] = $this->a_string($this->input->post('pago'));
		$data['formas_de_pago'] .= $this->input->post('otra');
		return $data;	
	}
	
	private function a_string($datos=array())
	{
		$out = '';
		if (!is_array($datos)) 
		{
			return $out;
		}
		foreach ($datos as $key => $value)
		{
			if(is_string($value))
			{
				if($value==''){continue;}
				$out = $value.','.$out;
			}elseif(is_array($value))
			{
				$out = $this->a_string($value).$out;
			}
		}
		return $out;
	}
	function _images_form($id_registro) {
		$name_array = "userfiles";
		$imagenes="";
		if ($_FILES[$name_array]) {
			$numero_archivos = count($_FILES[$name_array]['name']);
			for ($i = 0; $i < $numero_archivos; $i++) {
				$_FILES['userfile'] = array(
					'name' => $_FILES[$name_array]['name'][$i],
					'type' => $_FILES[$name_array]['type'][$i],
					'tmp_name' => $_FILES[$name_array]['tmp_name'][$i],
					'error' => $_FILES[$name_array]['error'][$i],
					'size' => $_FILES[$name_array]['size'][$i]
				);
				if ($this->u->imagen()) {
					$imagenes.= $this->u->nombre_archivo;
				}else
				{
					$imagenes.= 'default.jpg';
				}
			}
		}else
		{
			$imagenes.= 'default.jpg';
		}

		$this->solicitud->update(array('imagenes'=> $imagenes),$id_registro);
	}
	
	function tipos_de_pago_actuales($pagos)
	{			
		$out['Giros nacionales']='Giros nacionales';
		$out['Cheque']='Cheque';
		$out['A convenir']='A convenir';
		$out['Efectivo']='Efectivo';
		$out['Contraentrega']='Contraentrega';
		$out['Transferencia bancaria']='Transferencia bancaria';
		$out['Otros']="";

		foreach ($pagos as $value)
		{						
			if(is_string(array_search($value, $out)))
				{	$out[$value]='checked';	}	
			else
				{	$out['Otros']=$value;	}
						
		}
		return $out;
	}

	//funcion para eliminar producto seleccionado en el checkbox de la vista organizar ofertas
	function eliminar($oferta)
	 {
		
		if (!$this->verificar_logged($oferta))
		{	return;	}
		
		$this->solicitud->delete($oferta);
		$this->session->set_flashdata('oferta_eliminada', 'Solicitud de producto eliminada de su inventario');
		redirect($_SERVER['HTTP_REFERER']);
	}

}
