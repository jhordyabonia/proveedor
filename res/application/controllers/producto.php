<?php
/**
* Creada por @KarloxMartinez
* Controlador para administrar los productos
* Creado: 05 09 2014
*/
class Producto extends CI_Controller
{
	var $id_producto_editar;
	var $imagenes_actuales;

	function __construct()
	{
		parent::__construct();
		$this->load->model('U_model', 'u');
		$this->load->model('new/Municipio_model','municipio');
		$this->load->model('new/Departamento_model','departamento');
		$this->load->model('new/Dimension_model', 'dimension');
		$this->load->model('new/Membresia_model', 'membresia');
		$this->load->model('new/Categoria_model', 'categoria');
		$this->load->model('new/Tipo_empresa_model', 'tipo_empresa');
		$this->load->model('new/Subcategoria_model', 'subcategoria');
		$this->load->model('new/Usuarios_model', 'usuarios');
		$this->load->model('new/Empresa_model', 'empresa');
		$this->load->model('new/Producto_model', 'producto');
		$this->load->model('new/Solicitud_model', 'solicitud');
		$this->load->library(array('session', 'form_validation', 'email', "breadcrumb"));
		$this->load->helper(array('form', 'url'));
	}

	public function ver($id_producto = FALSE) 
	{		
		if ($id_producto) 
		{					
			$data['producto']= $this->producto->get($id_producto);
			if(!$data['producto'])
			{	show_404(); return;}
			$data['empresa']= $this->empresa->get($data['producto']->empresa);
            $data['empresa']->tipo = $this->tipo_empresa->get($data['empresa']->tipo)->tipo;
			$data['usuario']= $this->usuarios->get($data['empresa']->usuario);
			$data['usuario']->ciudad = $this->municipio->get($data['usuario']->ciudad)->municipio;
			$data['usuario']->departamento = $this->departamento->get($data['usuario']->departamento)->nombre;
			
			$data['numero_productos']=count($this->producto->get_all(array('empresa'=>$data['empresa']->id)));
			$data['numero_ofertas']=count($this->solicitud->get_all(array('empresa'=>$data['empresa']->id))); 
			$data['producto']->imagenes= explode(',',$data['producto']->imagenes);	
			if($data['producto']->pedido_minimo==1)	
            {	$data['producto']->medida = $this->dimension->get($data['producto']->medida)->nombre;	}
            else {	$data['producto']->medida = $this->dimension->get($data['producto']->medida)->prural;	}	

				$subcategoria = $this->subcategoria->get($data['producto']->subcategoria);
				$categoria = $this->categoria->get($subcategoria->id_categoria);

				$this->breadcrumb->add('Inicio', base_url());
				$this->breadcrumb->add('Productos', base_url() . '');
				if (isset($categoria->nombre_categoria)) 
				{
					$this->breadcrumb->add($categoria->nombre_categoria, base_url() . 'listado/busqueda/Productos');
				}
				if (isset($subcategoria->nom_subcategoria)) 
				{
					$this->breadcrumb->add($subcategoria->nom_subcategoria, base_url() . '');
				}
				$this->breadcrumb->add('"' . $data['producto']->nombre . '"', base_url() . '');

				//Jhordy:: paso la insignia del tipo de membresia
				//$nit=$this->producto->getId_empresa($this->iduser);
				$datos['categorias']=$this->categoria->get_all();
				$datos['membresia'] = $this->membresia->get($data['empresa']->membresia);
				$datos['otros_pro'] = $this->producto->get_all(array('empresa' => $data['empresa']->id));
				$datos_imagenes['img_principal'] = $data['producto']->imagenes[0];
				$array_merge0 = array_merge($datos, $datos_imagenes);

				$datos['titulo']=$data['producto']->nombre." - PROVEEDOR.com.co";
				$datos['id_usuario']= $this->session->userdata('id_usuario');

				$data['div_membresia']=$this->membresia->get_div($data['empresa']->id);
				$datos['url_publicar_solicitud']= base_url() . "publicar_producto";
				$datos['url_publicar_producto']= base_url(). "publicar_oferta";
				$this->load->view('template/head', $datos, FALSE);
				$this->load->view('template/javascript', FALSE, FALSE);
				$this->load->view('index_test/top_menu',$datos);
				$this->load->view('index_test/header_buscador',$datos);
				$this->load->view('producto/pagina_producto', $data);
				$this->load->view('template/footer');
			}else
			{
				show_404();
			}		
	}

	
	function administrar() 
	{
		$id = $this->session->userdata('id_usuario');
		$this->verificar_logged();
		$empresa=$this->empresa->get(array('usuario'=>$id));
		if(!$empresa)
		{
			show_404();
		}
		
		$datos['productos'] = $this->producto->get_all(array('empresa' => $empresa->id));
		if($datos['productos'] )
		{
			foreach ($datos['productos'] as $key => $value) 
			{	
				$tmp = array_shift(explode(',',$value->imagenes));
				if($tmp)
					{	$datos['productos'][$key]->nombre_img =$tmp;	}
				else
					{	$datos['productos'][$key]->nombre_img ="";	}			
			}
		}
		$datos['productos_cantidad'] = count($datos['productos']);

		$datos['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
		$datos['titulo']="Administrar mis productos - PROVEEDOR.com.co";
		$datos['empresa']=$empresa;
		//Carga de las vistas
		$this->load->view('template/head', $datos);
		$this->load->view('template/javascript', $datos, FALSE);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('tablero_usuario/administrar_productos', $datos);

	}
	//funcion para verificar que el producto pertenezca al usuario con sesion iniciada
	public function verificar_logged($id_producto=NULL)
	{
		$id = $this->session->userdata('id_usuario');
		if($id_producto==NULL)
		{
			if(!$id=='')
				{	return  TRUE; }
			else
				{
					redirect('/logueo');
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
		 
		redirect('/tablero_usuario');
		return FALSE;
	}


	//funcion para eliminar producto 
	public function eliminar($id_producto) 
	{
		if (!$this->verificar_logged($id_producto))
		{	return;	}

		$this->producto->delete($id_producto);
		$this->session->set_flashdata('producto_eliminado', 'Producto Eliminados de su cuenta de usuario');
		redirect('/producto/administrar');
	}



	//funcion para editar
	public function editar($id_producto=FALSE)
	{	
		if (!$this->verificar_logged($id_producto))
		{	return;	}	
		
		$data['usuario']=$this->session->userdata('id_usuario');

			if ($data['usuario']) {
				$data['producto']=$this->producto->get($id_producto);

				if ($data['producto']) 
				{
					$data['producto']->tipo_pago=$this->tipos_de_pago_actuales($data['producto']);
					$data['producto']->imagenes=explode(',', $data['producto']->imagenes);
					$data['producto']->palabras_clave=explode(',', $data['producto']->palabras_clave);
					$data['producto']->medida= $this->dimension->get($data['producto']->medida);

					$data['tipos']= $this->tipo_empresa->get_all();
					$data['categoria'] = $this->categoria->get_all();
					$data['datos_categoria'] = $this->obtener_datos_categoria($data['producto']->subcategoria);
					$data['titulo']="Editar ".$data['producto']->nombre." - PROVEEDOR.com.co";
					$data['empresa']=$this->empresa->get(array('usuario'=>$data['usuario']));
					$data['usuario']=$this->usuarios->get($data['usuario'])->usuario;
					$this->load->view('template/head', $data, FALSE);
					$this->load->view('tablero_usuario/header', $data, FALSE);
					$this->load->view('template/javascript', $data, FALSE);
					$this->load->view('producto/editar', $data, FALSE);
					$this->load->view('template/footer_empy', $data, FALSE);
				}else{
					show_404();
				}
		}else{
			   redirect('logueo', 'refresh');
		}
	}

	function tipos_de_pago_actuales($producto)
	{			
		$out['Giros nacionales']='Giros nacionales';
		$out['Cheque']='Cheque';
		$out['A convenir']='A convenir';
		$out['Efectivo']='Efectivo';
		$out['Contraentrega']='Contraentrega';
		$out['Transferencia bancaria']='Transferencia bancaria';
		$out['Otros']="";
		foreach (explode(',',$producto->formas_de_pago) as $value)
		{						
			if(is_string(array_search($value, $out)))
				{	$out[$value]='checked';	}	
			else
				{	$out['Otros']=$value;	}
						
		}
		return $out;
	}

	// obtener los datos de las categorias de un producto
	private function obtener_datos_categoria($id_subcategoria)
	{
		$out['subcategoria']=$this->subcategoria->get($id_subcategoria);
		$out['categoria']=$this->categoria->get($out['subcategoria']->id_categoria);
		$out['subcategorias'] = $this->subcategoria->get_all(array('id_categoria'=>$out['subcategoria']->id_categoria)); 
		return $out;
	}
	function subir_imagenes() 
	{
		if ($_FILES['userfiles']) 
		{
			$out = $this->input->post('imagenes_actuales');
			if($out=='default.jpg'&&$out!=''){$out.=',';}
			$numero_archivos = count($_FILES['userfiles']['name']);
			for ($i = 0; $i < $numero_archivos; $i++) 
			{
				$_FILES['userfile'] = array(
					'name' => $_FILES['userfiles']['name'][$i],
					'type' => $_FILES['userfiles']['type'][$i],
					'tmp_name' => $_FILES['userfiles']['tmp_name'][$i],
					'error' => $_FILES['userfiles']['error'][$i],
					'size' => $_FILES['userfiles']['size'][$i]
				);
				if ($this->u->imagen()) 
				{
					$out .= $this->u->nombre_archivo.',';
				}
			}
		}

		if($out==''){return 'default.jpg';}
		return $out;
	}

	public function index()
	{
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('categoria', 'categoria', 'trim|required');
		$this->form_validation->set_rules('subcategoria', 'subcategoria', 'trim|required');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|min_length[15]');
		$this->form_validation->set_rules('capacidad', 'Capacidad', 'is_natural');
		$rd_precio = $this->input->post('rd_precio');
		switch ($rd_precio) 
		{
			case 'precioUni':
				$this->form_validation->set_rules('precio', 'precio', 'required|is_natural');
				break;
			case 'precioconvenir':
				$this->form_validation->set_rules('precio', 'precio', 'is_natural');
				break;
			default:
				# code...
				break;
		}
		$this->form_validation->set_rules('pedido_min', 'pedido', 'required|is_natural');
		$this->form_validation->set_rules('tiempo_entrega', 'tiempo', 'is_natural');
		$this->form_validation->set_rules('otra', 'Otra', 'alpha');
		$this->form_validation->set_rules('pago', 'pago', 'required');
		$this->form_validation->set_message('required', 'Campo obligatorio');
		$this->form_validation->set_message('is_natural', 'Escriba numeros sin espacios ni puntos');
		$this->form_validation->set_message('alpha', 'Escriba caracteres alfabeticos a-z/A-Z');
		//-si la validacion es falsa carga la vista que nuestra los errores de validacion
		
		if ($this->form_validation->run() == FALSE)
		{
			//$this->editar();
		}

		$datos=$this->obtener_datos_form();
		/*
		echo "<PRE>";
		print_r($datos);
		echo "</PRE>";
		*/
		if($this->producto->update($datos,$datos['id'])>0)
			{
				$this->session->set_flashdata('producto_registrado', 'Producto editado exitosamente!!');
				redirect(base_url() . 'producto/administrar', 'refresh');
			}
		else
			{	
				echo "Ha ocurrido un error!";
				return;	
			} 	
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

	private function obtener_datos_form()
	{
		$datos['id'] = $this->input->post('id_producto');
		$datos['nombre'] = $this->input->post('nombre');
		$datos['subcategoria'] = $this->input->post('subcategoria');
		$datos['descripcion'] = $this->input->post('descripcion');
		$datos['imagenes'] = $this->subir_imagenes();
		$datos['palabras_clave'] = $this->a_string(json_decode($this->input->post('etiquetas'), TRUE));
		$datos['precio_unidad']= $this->input->post('precio');
		$datos['medida']=  $this->input->post('medida');
		$datos['pedido_minimo']= $this->input->post('pedido_min');
		$otra =  $this->input->post('otra');
		$datos['formas_de_pago'] = $this->a_string($this->input->post('pago')).$otra;
		$datos['tipo'] = $this->input->post('tipo');
		$datos['sector'] = $this->input->post('sector');
		$datos['estado'] = $this->input->post('estado');
		$datos['empresa'] = $this->empresa->get(array('usuario'=>$this->session->userdata('id_usuario')))->id;

		return $datos;		
	}

	public function publicar() 
	{
		$id_usuario = $this->session->userdata('id_usuario');
		if ($id_usuario)
			{
			$this->form_validation->set_rules('capacidad', 'Capacidad', 'is_natural');
			$rd_precio = $this->input->post('rd_precio');
			
			$empresa = $this->empresa->get(array('usuario' => $id_usuario));

			switch ($rd_precio) {
				case 'precioUni':
					$this->form_validation->set_rules('precio', 'precio', 'required|is_natural');
					break;
				case 'precioconvenir':
					$this->form_validation->set_rules('precio', 'precio', 'is_natural');
					break;
				default:
					# code...
					break;
			}
			$this->form_validation->set_rules('pedido_min', 'pedido', 'required|is_natural');
			$this->form_validation->set_rules('tiempo_entrega', 'tiempo', 'is_natural');
			$this->form_validation->set_rules('otra', 'Otra', 'alpha');
			$this->form_validation->set_rules('pago', 'pago', 'required');
			$this->form_validation->set_message('required', 'Campo obligatorio');
			$this->form_validation->set_message('is_natural', 'Escriba numeros sin espacios ni puntos');
			$this->form_validation->set_message('alpha', 'Escriba caracteres alfabeticos a-z/A-Z');
			//-si la validacion es falsa carga la vista que nuestra los errores de validacion
			if ($this->form_validation->run() == FALSE)
			{
				$categoria = $this->categoria->get();
				$data['usuario']=$this->session->userdata('usuario');
				$data['empresa']=$empresa;
				$data['titulo']="Publica un producto - PROVEEDOR.com.co";
				$this->load->view('template/head', $data, FALSE);
				$this->load->view('tablero_usuario/header', $data, FALSE);
				$this->load->view('template/javascript', $data, FALSE);
				$this->load->view('vistas/publicar_producto', array('categoria' => $categoria, 'error' => ''));
				$this->load->view('template/footer_empy', $data, FALSE);
			} else
			{
				$datos = $this->obtener_datos_form();
				$this->producto->insert($datos);
				$this->session->set_flashdata('producto_registrado', 'Producto registrado exitosamente!!');
				redirect(base_url() . 'producto/administrar', 'refresh');
			}
		}else{
			redirect(base_url() . 'popup/auto_launch/login', 'refresh');
		}
	}
}
