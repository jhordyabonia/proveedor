<?php

/**
 * 
 *
 * @author Jhordy Abonia
 */
class Publicar_oferta extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('new/Usuarios_model', "usuarios");
		$this->load->model('new/Solicitud_model', "solicitud");
		$this->load->model('new/Categoria_model', "categoria");
		$this->load->model('new/Subcategoria_model', "subcategoria");
		$this->load->model('new/Departamento_model', "departamento");
		$this->load->model('new/Tipo_empresa_model', "tipo_empresa");
		$this->load->model('new/Empresa_model', "empresa");
		$this->load->model('new/Municipio_model', "municipio");
		$this->load->model('u_model', "u");
	}

//funcion para verificar que el producto pertenezca al usuario con sesion iniciada
	private  function verificar_logged($id_producto=NULL)
	{
		$id = $this->session->userdata('id_usuario');
		if($id_producto==NULL)
		{
			if(!$id=='')
				{	return  TRUE; }
			else
				{
					redirect('/logueo','refresh');
					return FALSE;
				}			
		}
		$producto=$this->producto->get($id_producto);
		$empresa=$this->empresa->get($producto->empresa);
		if(!$producto)
		{
			show_404();
			return FALSE;
		}else
		{
			
			if($id===$empresa->usuario)
			{	return  TRUE; }
		}
		 
		redirect('/tablero_usuario','refresh');
		return FALSE;
	}

	public function index() 
	{
		$this->verificar_logged();
		
		$data['categoria'] = $this->categoria->get_all();
		$data['dept'] = $this->departamento->get_all();
		$data['municipios'] = $this->municipio->get_all(array('id_departamento'=>$this->input->post('provincia')));
		
		#$data['error'] = '';
		$data['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
		$data['administrador']=$data['usuario']->permisos;
		$id_usuario=$this->session->userdata('id_usuario');
		$data['titulo']="Crear solicitud de producto - PROVEEDOR.com.co";
		$data['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$this->load->view('template/head', $data);
		$this->load->view('template/javascript', $data, FALSE);
		$this->load->view('tablero_usuario/header', $data, FALSE);
		$this->load->view('oferta/funcionalidades', FALSE);
		$this->load->view('oferta/publicar', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);	
	}

	public function registrar($simple=FALSE) 
	{
		#crear metodo de verificacion

		#if($this->validar())
		{
			if($simple)
			{$solicitud=$this->get_data_form_simple();}
			else{$solicitud=$this->get_data_form();}
			
			/*
			echo "<PRE>";
			print_r($solicitud);
			echo "</PRE>";
			return;
			*/

			$id_registro=$this->solicitud->insert($solicitud);

			if(!$simple)
			{	$this->_images_form($id_registro);	}

			$this->session->set_flashdata('oferta_registrada', 'Oferta registrada exitosamente!!');
			 redirect($_SERVER['HTTP_REFERER'],'refresh');
		}
		#else
		#{$this->index();}
	}

	private function validar() {
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('categoria', 'categoria', 'trim|required');
		$this->form_validation->set_rules('subcategoria', 'subcategoria', 'trim|required');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|min_length[15]');
		$this->form_validation->set_rules('precio', 'precio', 'required|is_natural');
		$this->form_validation->set_rules('cantidad2', 'Cantidad', 'is_natural');
		$this->form_validation->set_rules('departamento', 'departamento', 'required');
		$this->form_validation->set_rules('municipio', 'municipio', 'required');
		$this->form_validation->set_rules('otro', 'otro', 'alpha');
		$this->form_validation->set_message('required', 'Campo obligatorio');
		$this->form_validation->set_message('is_natural', 'Escriba numeros sin espacios ni puntos');
		$this->form_validation->set_message('alpha', 'Escriba caracteres alfabeticos a-z/A-Z');
		return $this->form_validation->run();
	}

	private function obtener_id_subcategoria($in=1)
	{
		if(is_numeric($in))
			{return $in;}
		$out= $this->subcategoria->get(array("nom_subcategoria"=>$in));
		
		if($out)
			{return $out->id_subcategoria;}

		return 1;
	}
	private function get_data_form() {
		$data['nombre'] = $this->input->post('nombre_producto_avanzado');
		$data['subcategoria'] = $this->obtener_id_subcategoria($this->input->post('subcategoria'));
		#$data['categoria'] = $this->input->post('categoria');
		$data['descripcion'] = $this->input->post('descripcion_avanzada');
		$data['palabras_clave'] = $this->input->post('Pclave');
		$data['cantidad_requerida'] = $this->input->post('cantidad');
		$data['medida'] = $this->input->post('list_medida');
		$data['precio_maximo'] = $this->input->post('precio');
		$data['departamento_entrega'] = $this->input->post('departamento');
		$data['ciudad_entrega'] = $this->input->post('municipio');
		$data['formas_de_pago'] = $this->a_string($this->input->post('pago'));
		$data['formas_de_pago'] .= $this->input->post('otra');
		$id_usuario=$this->session->userdata('id_usuario');
		$data['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$data['empresa']=$data['empresa']->id;

		return $data;	
	}
	private function get_data_form_simple() {
		$data['nombre'] = $this->input->post('nombre_producto');
		#$data['categoria'] = $this->input->post('categoria');
		$data['subcategoria'] = $this->obtener_id_subcategoria($this->input->post('subcategorias_simples'));
		$data['cantidad_requerida'] = $this->input->post('cantidad_requerida');
		$data['descripcion'] = $this->input->post('descripcion');
		$data['palabras_clave'] = $data['nombre'];
		$data['medida'] = 1;
		$data['precio_maximo'] = 'A convenir';
		$data['departamento_entrega'] = 33;
		$data['ciudad_entrega'] = 1133;
		$data['formas_de_pago'] = 'A convenir';
		$id_usuario=$this->session->userdata('id_usuario');
		$data['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$data['empresa']=$data['empresa']->id;
		$data['imagenes']='default.jpg';

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
	private function _images_form($id_registro) {
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

	public function ver_subcatgorias($id_categoria=FLASE)
	{
			$subcategoria = $this->subcategoria->get_all(array('id_categoria'=>$id_categoria));
			foreach ($subcategoria as $fila)
			{
				echo '<option value="'.$fila->nom_subcategoria.'">'.$fila->nom_subcategoria.'</option>';
			}
				
	}


}
