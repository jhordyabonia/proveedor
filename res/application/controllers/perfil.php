<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {

	///Constructor de la clase del control
	function __construct(){
		parent::__construct();
		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Membresia_model','membresia');
		$this->load->model('new/Tipo_empresa_model','tipo_empresa');
		$this->load->model('new/Producto_model','producto');
		$this->load->model('new/Solicitud_model','solicitud');
		$this->load->model('new/Usuarios_model','usuarios');
		$this->load->model('new/Municipio_model','municipio');
		$this->load->model('new/Departamento_model','departamento');
		$this->load->model('new/Categoria_model','categoria');
		$this->load->model('new/Subcategoria_model','subcategoria');
        #$this->load->view('registro/funcionalidades_');
	}

	public function ver_empresa($id_empresa, $id_seleccion=0, $tipo_seleccion=0)
	{		
		if($id_empresa==10384)
		{redirect(base_url().'empresa/inicio/10384');}
		if($id_empresa==10263||$id_empresa==10264)
		{redirect('perfil/ver_empresa/10560');}
		if($id_empresa<1000)
		{
			$empresa= $this->empresa->get(array('nit'=>$id_seleccion));
			redirect('perfil/ver_empresa/'.$empresa->id);
		}

		$empresa= $this->empresa->get($id_empresa);

		if(!$empresa)
			{redirect('registro/registrar');}
		
		$id_user=$empresa->usuario;
		$datos['logo_empresa'] = $empresa->logo;
		$datos['nom_empresa'] = $empresa->nombre;
		//Jhordy:: La sgt linea ya no es de utilidad
		//$datos['categorias'] = $this->perfil_model->verCategoria($nit);

		$datos['productos'] = $this->producto->get_all(array('empresa'=>$id_empresa));
		
		$datos['productos'] = clear_array($datos['productos']);
		
		$datos['id_empresa'] = $id_empresa;
		$datos['user'] = $empresa->usuario;  //id de contacto que se va agregar
		#$datos['contacto_id'] = $this->perfil_model->ver_idcontacto($nit);
		#$datos['img_related'] = $this->perfil_model->ver_relacionados($id_user);

		//Jhordy:: agregue las sgts par de lineas
		$datos['total_porCategoria']=clear_array($this->total_porCategoria($datos['productos']));
		$datos['total_porSubCategoria']=clear_array($this->total_porSubCategoria($datos['productos']));
		$datos['ciudad_empresa'] = $this->usuarios->get($empresa->usuario)->ciudad;
		$ciudad = $datos['ciudad_empresa'];
		if(is_numeric($ciudad))
			{	
				$dato=$this->municipio->get($ciudad);
		#echo "<PRE>";
		#print_r($dato);
		#echo "</PRE>";
		#return;
				$datos['ciudad_empresa'] = $dato->municipio;
			}
		$datos['tipo_empresa'] = $this->tipo_empresa->get($empresa->tipo)->tipo;
		$datos['otrosProductos_empresa'] = explode(',',$empresa->productos_principales);
		$datos['membresia'] = $empresa->membresia;
		$datos['nombre_membresia'] = $this->membresia->get($empresa->membresia)->nombre;
		if($id_seleccion!=0)
		{
			if($tipo_seleccion==0)
			{	$datos['productos']=clear_array($this->filtrarProductos_categoria($datos['productos'],$id_seleccion)); }
			else
			{ 	$datos['productos']=clear_array($this->filtrarProductos_SubCategoria($datos['productos'],$id_seleccion));	}
		}		
		
		$datos['page']=$this->input->post('page');	

		$datos['tipo_seleccion']=$tipo_seleccion;
		$datos['id_seleccion']=$id_seleccion;
		$datos['total_productos']=count($datos['productos']);
		$datos['titulo'] = $empresa->nombre;
		$datos['div_membresia']=$this->membresia->get_div($id_empresa);
		$datos['usuario']=$this->session->userdata('usuario');
		$this->load->view('template/javascript', $datos, FALSE);
		$this->load->view('template/head', $datos, FALSE);
		$this->load->view('registro/funcionalidades_');
		$this->load->view('pagina_empresa/header', $datos, FALSE);
		$this->load->view('pagina_empresa/catalogo_productos', $datos, FALSE);
		$this->load->view('template/footer', $datos, FALSE);
	}

	//Jhordy:: funcion extrae unicamente los productos pertenecientes  la categoria $id_seleccion
	private function filtrarProductos_categoria($productos,$id_seleccion){
		$out=array();
		foreach ($productos as $value) 
		{
			$subcategoria_tmp=$this->subcategoria->get($value->subcategoria);
			$id_categoria=$subcategoria_tmp->id_categoria;

			if($id_categoria==$id_seleccion) 
			{ 
				$out[]=$value;
			}
		}
		return $out;
	}

	//Jhordy:: funcion extrae unicamente los productos pertenecientes  la subcategoria $id_seleccion
	private function filtrarProductos_SubCategoria($productos,$id_seleccion){
		$out=array();
		foreach ($productos as $value) 
		{
			if($value->subcategoria==$id_seleccion) 
			{ 
				$out[]=$value;
			}
		}
		return $out;
	}
	//Jhordy:: Esta funcion retorna el numero de productos de cada categoria
	private function total_porCategoria($productos){
		$out = array();		
		if($productos==NULL)
		{	return $out;	}
		foreach ($productos as $datos)
		{
				$id_subcategoria=$datos->subcategoria;
				$subcategoria_tmp=$this->subcategoria->get($id_subcategoria);
				$aux['id_categoria']=$subcategoria_tmp->id_categoria;
				$aux['cantidad']=$this->productos_porCategoria($aux['id_categoria'],$productos);	
				$aux['nombre']=$this->categoria->get($aux['id_categoria'])->nombre_categoria;	
				$out[]=$aux;	
		}		
		return $out;
	}
	//Jhordy:: Esta funcion retorna la cantidad de productos de una categoria especifica
	private function productos_porCategoria($id_categoria,$productos){
			$total=0;
			if($productos)
			  {
				  foreach ($productos as $registro)
				  {
						$id_tmp=$registro->subcategoria;
						$subcategoria_tmp=$this->subcategoria->get($id_tmp);
						if($subcategoria_tmp->id_categoria==$id_categoria)
						{	$total++;	}
				 }
			   } 
			return $total;
	}
	//Jhordy:: Esta funcion retorna las subcategorias de cada producto  u ofertas
	private function total_porSubCategoria($productos){
		$out = array();
		if($productos==NULL)
		{	return $out;	}
		foreach ($productos as $datos)
		{
				$id=$datos->subcategoria;
				$subcategoria_tmp=$this->subcategoria->get($id);
				$aux['cantidad']=$this->productos_porSubCategoria($id,$productos);	
				$aux['id_categoria']=$subcategoria_tmp->id_categoria;		
				$aux['id_subCategoria']=$id;	
				$aux['nombre']=$subcategoria_tmp->nom_subcategoria;	
				$out[]=$aux;	
		}		
		return $out;
	}	
	//Jhordy:: Esta funcion retorna la catidad de productos u ofertas en una subcategoria
	private function productos_porSubCategoria($id_subcategoria,$productos){
			$total=0;
			if($productos)
			  {
				  foreach ($productos as $registro)
				  {
						if($registro->subcategoria==$id_subcategoria)
						{	$total++;	}
				 }
			   } 
			return $total;
	}
	/* funcion para aÃ±adir proveedor --vista pagina empresa 
	  en donde $mi_id es el id del usuario que inicio sesion
	  $id_prov es la id del contacto que va agregar
	  $nit es el nit de la empresa del usuario que  se va agregar */

	public function add_proveedor($mi_id, $id_prov, $id_cont, $nit){
		$datos = array(
			'id_usuario' => $mi_id,
			'id_usuario_prov' => $id_prov,
			'id_contacto' => $id_cont,
			'nit_empresa' => $nit
				// 'estado'      => ''
		);
// $datos['addproveedor'] = $this->perfil_model->add_prov($mi_id, $nit);
		$this->db->insert('contactos_usuario', $datos);

		$this->session->flashdata('usuario_add');
		redirect('perfil/ver_empresa/' . $mi_id . '/' . $nit);


// echo 'mi id es_: '.$mi_id.' __nit_ '.$nit.' _id_contacto_ '.$id_prov ;
	}

//con esta funcion se llama a la vista de la segunda pestaÃ±a de la vista perfil empresa
	public function perfil_empresa($id_empresa,$id_seleccion=0){
		// echo 'es_ '.$id_contacto;

		if($id_empresa==10384)
		{redirect(base_url().'empresa/inicio/10384');}
	
		if($id_empresa==10263||$id_empresa==10264)
		{redirect('perfil/ver_empresa/10560');}
		if($id_empresa<1000)
		{
			$empresa= $this->empresa->get(array('nit'=>$id_seleccion));
			redirect('perfil/perfil_empresa/'.$empresa->id);
		}
		$empresa=$this->empresa->get($id_empresa);

		if(!$empresa)
			{redirect('registro/registrar');}

		$usuario=$this->usuarios->get($empresa->usuario);
		$datos['des_empresa'] = $empresa->descripcion;
		$datos['contacto'] = $usuario->celular;  //para traer la informacion  del campo contacto
		$datos['contacto2'] = $usuario->telefono; // trae informacion de telefono y celular
		
		// $datos['id_user'] = $id_user;
		$datos['logo_empresa'] = $empresa->logo;
		$datos['nom_empresa'] = $empresa->nombre;
		#$datos['ubicacion'] = $this->perfil_model->ubicacion($nit);  //para traer la informacion  del campo ubicacion
		$datos['pro_prin'] = explode(',',$empresa->productos_principales);  //productos principales
		$datos['pro_int'] = explode(',',$empresa->productos_de_interes);  //productos que interesan
		$ciudad = $usuario->ciudad;
		$datos['ubicacion']->direccion=$usuario->direccion;
		$datos['ubicacion']->departamento=$usuario->departamento;
		if(intval($ciudad)>0)
			{	
				$dato=$this->municipio->get($ciudad);
				$datos['ubicacion']->ciudad = $dato->municipio;
			}
		$departamento = $this->usuarios->get($empresa->usuario)->departamento;
		if(intval($departamento)>0)
			{	
				$dato=$this->departamento->get($departamento);
				$datos['ubicacion']->departamento = $dato->nombre;
			}
		//Jhordy:: paso la insignia del tipo de membresia
		$id_user=$empresa->usuario;	
		$datos['otrosProductos_empresa'] = explode(',',$empresa->productos_principales);
		$datos['membresia'] = $empresa->membresia;
		$datos['nombre_membresia'] = $this->membresia->get($empresa->membresia)->nombre;
		$datos['tipo_empresa'] = $this->tipo_empresa->get($empresa->tipo)->tipo;
		$datos['titulo'] = $empresa->nombre;
		$datos['div_membresia']=$this->membresia->get_div($id_empresa);
		
		$datos['count_ofertas'] = count($this->solicitud->get_all(array('empresa'=>$empresa->id)));
		$datos['count_productos'] = count($this->producto->get_all(array('empresa'=>$empresa->id)));
		$datos['usuario']=$this->session->userdata('usuario');
		$datos['id_empresa']=$id_empresa;
		$this->load->view('template/head', $datos, FALSE);
		$this->load->view('template/javascript', $datos, FALSE);
		$this->load->view('registro/funcionalidades_');
		$this->load->view('pagina_empresa/header', $datos, FALSE);
		$this->load->view('pagina_empresa/perfil_empresa', $datos, FALSE);
		$this->load->view('template/footer', $datos, FALSE);
	}

	private function obterner_datos()
	{
		$informacion['usuario']['nombres']=$this->input->post('nombres');
		$informacion['usuario']['cargo']=$this->input->post('cargo');
		$informacion['usuario']['direccion']=$this->input->post('direccion');
		$informacion['usuario']['departamento']=$this->input->post('departamento');
		$informacion['usuario']['ciudad']=$this->input->post('ciudad');
		$informacion['usuario']['web']=$this->input->post('web');

		$informacion['usuario']['celular']=$this->input->post('celular');
		$informacion['usuario']['indicativo']=$this->input->post('indicativo');
		$informacion['usuario']['telefono']=$this->input->post('telefono');
		$informacion['usuario']['extension']=$this->input->post('extension');

		$informacion['empresa']['nombre']=$this->input->post('nombre');
		$informacion['empresa']['nit']=$this->input->post('nit');
		$informacion['empresa']['tipo']=$this->input->post('tipo_empresa');
		$datos = array('nombre_empresa' => $informacion['empresa']['nombre'],'logo_old' => $this->input->post('logo_old'));
		$informacion['empresa']['logo']=$this->upload_logo($datos);

		$informacion['empresa']['descripcion']=$this->input->post('descripcion');
		$informacion['empresa']['categorias']=$this->input->post('id_categorias');
		$informacion['empresa']['productos_principales']=$this->input->post('productos_principales');
		$informacion['empresa']['productos_de_interes']=$this->input->post('productos_interes');	

		return $informacion;
	}
	private function upload_logo($datos) 
	{
		if(!$_FILES) {	return;	}
		if ($_FILES['userfile']) 
		{	
			$numero_archivos = count($_FILES['userfile']['name']);
			for ($i = 0; $i < $numero_archivos; $i++) 
			{
				$new_logo=$datos['nombre_empresa']."_".$_FILES['userfile']['name'][$i];
				$_FILES['userfile'] = array(
					'name' => $new_logo,
					'type' => $_FILES['userfile']['type'][$i],
					'tmp_name' => $_FILES['userfile']['tmp_name'][$i],
					'error' => $_FILES['userfile']['error'][$i],
					'size' => $_FILES['userfile']['size'][$i]
				);
				//delete($datos['logo_old']);
				$this->load->model('u_model', "u");
				if ($this->u->load_logo()) 
				{
					return str_replace(' ', '_', $this->u->load_logo());
				}
			}
		}
		return $datos['logo_old'];
	}

	public function actualizar()
	{
		$datos=$this->obterner_datos();

		$id_user=$this->session->userdata('id_usuario');
		$datos_usuario= $this->usuarios->get($id_user);
		$empresa=$this->empresa->get(array('usuario'=>$id_user));

		if(!$this->verificar_logged($empresa->id))
			{	return;	}

		$this->empresa->update($datos['empresa'],$empresa->id);
		$this->usuarios->update($datos['usuario'],$empresa->usuario);
		redirect('/tablero_usuario');
	}
	public function actualizar2()
	{
		$datos=$this->obterner_datos();
		#$datos['id']=$this->input->post('id');
		
		$empresa=$this->empresa->get($this->input->post('id'));
		/*
		echo "<PRE>";
		print_r($empresa);
		echo "</PRE>";
		return;
		*/

		if(!$this->verificar_logged($empresa->id))
			{	return;	}

		$this->empresa->update($datos['empresa'],$empresa->id);
		$this->usuarios->update($datos['usuario'],$empresa->usuario);
		redirect('/perfil/ver_empresa/'.$empresa->id);
	}
	public function existen_usuario_email($usuario, $email="")
	{
		$tmp = 0;
		$usuarios=$this->usuarios->get_all();
		foreach ($usuarios as $value) 
		{
			if($value->usuario==$usuario||$value->email==$email)
				{ 	
					$tmp++;
					if($tmp>1)
					return TRUE;
				}
		}
		return FALSE;
	} 
	public function actualizar_cuenta()
	{
		#if(!$this->verificar_logged($nit))
		#	{ return; }
		//reglas de validacion.
		/*
		$this->form_validation->set_rules('usuario', 'usuario', 'trim|required|min_length[4]|max_length[20]|is_unique[usuario.usuario]|callback_validaEspacios|alpha_numeric');
		$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]|max_length[20]|matches[password2]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuario.email]');
		
		if (!$this->form_validation->run()) 
		{
			redirect(base_url() . 'perfil_test/editar_empresa/'.$nit, 'refresh');
			return;
		}
		*/
		$id_user=$this->session->userdata('id_usuario');
		$usuario= $this->usuarios->get($id_user);
		$empresa=$this->empresa->get(array('usuario'=>$id_user));


		$email_form=$this->input->post('email');
		$usuario_form=$this->input->post('usuario');
		$password_form=md5($this->input->post('password'));
		$newpassword_form=$this->input->post('newpassword');
		
		if($this->existen_usuario_email($usuario_form, $email_form))
		{	
			$this->session->set_flashdata('usuario_modififcado', 'Nombre de usuario y/o email; ya existen!!');
			redirect(base_url() . 'perfil/editar_empresa/'.$empresa->id, 'refresh');
			return;
		}
		
		#if($password_db===$password_form) #requerir contraseña para cuaquier cambio en los datos de usuario.
		#{
			if($usuario_form)
			{	$datos['usuario']=$usuario_form;	}
			if($email_form)
			{	
				//requerir nueva verificacion de correo.
				$datos['email']=$email_form;
			}
			if($newpassword_form)
			{	
				if($usuario->password===$password_form) #eliminar esta validacion cuando descomente las lineas con numeral
				{
					$datos['password']=md5($newpassword_form);
				}	
				else
				{
					$this->session->set_flashdata('usuario_modififcado', 'Para cambiar la contraseña se requiere ingresar la contraseña actual!!');
					redirect(base_url() . 'perfil/editar_empresa/'.$empresa->id, 'refresh');
				}
			}

			$exito=$this->usuarios->update($datos,$id_user);
			
			if($exito)
			{
				$this->session->set_flashdata('usuario_modififcado', 'Datos de usuario modificados!!');
			}
			else
			{			
				$this->session->set_flashdata('usuario_modififcado', 'Error temporal!!');
			}
		#}
		#else
		#{			
		#	$this->session->set_flashdata('usuario_modififcado', 'Error en los datos!!');
		#}

		redirect(base_url() . 'perfil/editar_empresa/'.$empresa->id, 'refresh');
		
	}
	public function editar_empresa()
	{
		#$datos['nit'] = $nit;
		#$datos['contacto'] = $this->perfil_model->contacto($nit);  //para traer la informacion  del campo contacto
		#$datos['contacto2'] = $this->perfil_model->contacto2($nit); // trae informacion de telefono y celular
		
		$datos['empresa'] = $this->empresa->get(array('usuario'=>$this->session->userdata('id_usuario')));
		$datos['datos_usuario'] = $this->usuarios->get($datos['empresa']->usuario);
		$datos['categorias'] = $this->categoria->get_all();
		$datos['departamento'] = $this->departamento->get_all();
		$dept_select=array('id_departamento'=>$datos['datos_usuario']->departamento);
		$datos['municipios'] = $this->municipio->get_all($dept_select);
		$datos['tipos_empresa'] = $this->tipo_empresa->get_all();
		
		$tmp_categorias;
		foreach (explode('|',$datos['empresa']->categorias) as $key => $value) 
		{
			if($value==""){continue;}
			$tmp_categorias[]=$this->categoria->get($value);
		}
		$datos['empresa']->categorias=$tmp_categorias;
		$datos['usuario']->usuario=$this->session->userdata('usuario');
		$datos['administrador']=$datos['datos_usuario']->permisos;
		$datos['titulo'] = "Editar perfil empresa";

		$this->load->view('template/head', $datos, FALSE);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('empresa/editar', $datos, FALSE);
		$this->load->view('template/javascript', $datos, FALSE);
		$this->load->view('template/footer', $datos, FALSE);;
	}
	//funcion para verificar que el producto pertenezca al usuario con sesion iniciada
	public function verificar_logged($id_empresa=0)
	{
		#if($id_empresa=="1059985632-7"||($id_empresa=="90058523"||$id_empresa=="102223263921"))
    	#{	return TRUE;	}

		$id_logged = $this->session->userdata('id_usuario');
		$id_empresa_editar = $this->empresa->get($id_empresa)->usuario;
	
		if($this->usuarios->get($id_logged)->permisos==1)
		{	return TRUE;	}

		if($id_logged=='')
		{	
			redirect('/logueo');
			return FALSE;
		}elseif($id_empresa_editar==NULL)
		{
			show_404();
			return FALSE;
		}elseif($id_empresa_editar==$id_logged)
		{
			return TRUE;
		}
		
		redirect('/tablero_usuario');
		return FALSE;
	}
	public function productos_solicitados($id_empresa, $id_seleccion=0, $tipo_seleccion=0)
	 {	
		if($id_empresa==10384)
		{redirect(base_url().'empresa/inicio/10384');}

		if($id_empresa==10263||$id_empresa==10264)
		{redirect('perfil/ver_empresa/10560');}
	 	if($id_empresa<1000)
		{
			$empresa= $this->empresa->get(array('nit'=>$id_seleccion));
			redirect('perfil/productos_solicitados/'.$empresa->id);
		}
		$empresa= $this->empresa->get($id_empresa);

		if(!$empresa)
			{redirect('registro/registrar');}

		$id_user=$empresa->usuario;
		
		$datos['logo_empresa'] = $empresa->logo;
		$datos['nom_empresa'] = $empresa->nombre;
		$datos['ofertas'] = $this->solicitud->get_all(array('empresa'=>$id_empresa));
		$datos['total_porCategoria']=clear_array($this->total_porCategoria($datos['ofertas']));
		$datos['total_porSubCategoria']=clear_array($this->total_porSubCategoria($datos['ofertas']));
		$datos['ciudad_empresa'] = $this->usuarios->get($empresa->usuario)->ciudad;
		$datos['tipo_empresa'] = $this->tipo_empresa->get($empresa->tipo)->tipo;
		$datos['otrosProductos_empresa'] = explode(',',$empresa->productos_principales);
		$datos['membresia'] = $empresa->membresia;
		$datos['nombre_membresia'] = $this->membresia->get($empresa->membresia)->nombre;
		$ciudad = $datos['ciudad_empresa'];
		if(is_numeric($ciudad))
			{	
				$dato=$this->municipio->get($ciudad);
				$datos['ciudad_empresa'] = $dato->municipio;
			}
		
		if($id_seleccion!=0)
		{
			if($tipo_seleccion==0)
			{	$datos['ofertas']=clear_array($this->filtrarProductos_categoria($datos['ofertas'],$id_seleccion)); }
			else
			{ 	$datos['ofertas']=clear_array($this->filtrarProductos_SubCategoria($datos['ofertas'],$id_seleccion));	}
		}		

		$datos['tipo_seleccion']=$tipo_seleccion;
		$datos['id_seleccion']=$id_seleccion;
		$datos['total_productos']=count($datos['ofertas']);
		
		$datos['id_empresa']=$id_empresa;
		$datos['page']=$this->input->post('page');	

		$datos['titulo'] = $empresa->nombre;
		$datos['div_membresia']=$this->membresia->get_div($id_empresa);
		$datos['usuario']=$this->session->userdata('usuario');
		$this->load->view('template/head', $datos, FALSE);
		$this->load->view('template/javascript', $datos, FALSE);
		$this->load->view('registro/funcionalidades_');
		$this->load->view('pagina_empresa/header', $datos, FALSE);
		$this->load->view('pagina_empresa/productos_solicitados', $datos, FALSE);
		$this->load->view('template/footer', $datos, FALSE);
	 }
	
	public function contacto_empresa($id_empresa)
	{
		if($id_empresa==10384)
		{redirect(base_url().'empresa/inicio/10384');}

		if($id_empresa==10263||$id_empresa==10264)
		{redirect('perfil/ver_empresa/10560');}
	
		$empresa=$this->empresa->get($id_empresa);
		if(!$empresa)
		{
			$empresa= $this->empresa->get(array('nit'=>$id_empresa));
			redirect('perfil/contacto_empresa/'.$empresa->id);
		}

		if(!$empresa)
			{redirect('registro/registrar');}
		
		$usuario=$this->usuarios->get($empresa->usuario);

		$datos['celular'] = $usuario->celular;  //para traer la informacion  del campo contacto
		$datos['telefono'] = $usuario->telefono; // trae informacion de telefono y celular
		$datos['logo_empresa'] = $empresa->logo;
		$datos['nom_empresa'] = $empresa->nombre;
		$datos['id_usuario'] = $usuario->id;
		$datos['web'] = $usuario->web;
		$datos['membresia'] = $empresa->membresia;
		$datos['nombre_membresia'] = $this->membresia->get($empresa->membresia)->nombre;
		
		 //para traer la informacion  del campo ubicacion
		$ciudad = $usuario->ciudad;
		$datos['direccion'] = $usuario->direccion;
		$datos['departamento']=$usuario->departamento;
		if(intval($ciudad)>0)
			{	
				$dato=$this->municipio->get($ciudad);
				$datos['ciudad']= $dato->municipio;
			}
		$departamento = $usuario->departamento;
		if(intval($departamento)>0)
			{	
				$dato=$this->departamento->get($departamento);
				$datos['departamento']= $dato->nombre;
			}
		if($usuario->pais!=52)
		{
			$usuario->departamento="";
			$usuario->ciudad= $this->pais->get($usuario->pais)->nombre;
		}
		
		$nit=$empresa->nit;

		$dat['categoria'] = 0;
		if($nit=="10223263929")//Calzado  
		{	$dat['categoria'] = 39;	}
		if($nit=="10223263925")//Dotacion industrial.
		{	$dat['categoria'] = 41;	}
		elseif($nit=="102223263921")//Maquinaria industrial
		{	$dat['categoria'] = 6;	}
		elseif($nit=="1059985632-7")//Jhordy tester
		{	$dat['categoria'] = 37;	}
		elseif($nit=="90058523")//Andres tester
		{	$dat['categoria'] = 37;	}
		elseif($nit=="13068269")//ILICH
		{	
			$dat['categoria'] = 33;	

			$this->load->model('popups_textos_model', 'popups_textos');
			$dat['datos']=$this->popups_textos->get(array('categoria'=>$dat['categoria']));
			$dat['view'] = "asistentes_proveedor";		
			$dat['id_popup'] = "asistentes_proveedor";	
			$this->load->view('popups/asistentes_proveedor_servicios', $dat);
			#return;
		}
		if($dat['categoria']==0){$dat['categoria']=1;}
		$this->load->model('popups_textos_model', 'popups_textos');
		$dat['datos']=$this->popups_textos->get(array('categoria'=>$dat['categoria']));
		$dat['view'] = "asistentes_proveedor";		
		$dat['id_popup'] = "asistentes_proveedor";	
		$titulos=array();
		foreach (explode(',',$dat['datos']->titulos) as $key => $value) 
		{
			$dato_tmp=explode('|',$value);
			if(count($dato_tmp)>1)
			{
				$titulos[$dato_tmp[0]]=$dato_tmp[1];
			}else {$titulos[$value]=$value;	}
		}
		if($dat['categoria']==0)
		{	$datos['popup']=FALSE;	}
		else {$datos['popup']=TRUE; }
		$dat['datos']->titulos=$titulos;
        $dat['auto_launch_AP']=FALSE;
		
		$datos['id_empresa']=$id_empresa;
		$datos['titulo']=$empresa->nombre;
		$datos['div_membresia']=$this->membresia->get_div($id_empresa);
		$datos['usuario']=$this->session->userdata('usuario');
		$this->load->view('template/head', $datos, FALSE);
		$this->load->view('template/javascript', $datos, FALSE);
		$this->load->view('registro/funcionalidades_');
		$this->load->view('pagina_empresa/header', $datos, FALSE);
		$this->load->view('pagina_empresa/contacto', $datos, FALSE);
		$this->load->view('template/footer', $datos, FALSE);
		$this->load->view('popups/asistentes_proveedor', $dat);	

		if($this->session->flashdata('mensaje_enviado')=="DONE")
			return;
		
	}

	/* Esta funcion es la encargada de agregar un contacto al usuario */

	public function add_contacto() {
		if ($this->input->post('id_user')) {
			//se crea un array con las variables necesarias y se envian al modelo para insertar en la BD
			$datos = array(
				'id_user' => $this->input->post('id_user'),
				'nit' => $this->input->post('nit'),
				'id_contacto' => $this->input->post('id_contacto'),
				'mi_id' => $this->input->post('mi_id')
			);
			// $id_user = $this->input->post('id_user');
			$add_contacto = $this->perfil_model->add_contacto($datos);
			if ($add_contacto == true) {
				echo 'Proveedor aÃ±adido correctamente.';
			} else {
				echo 'El proveedor ya esta en tu lista de contactos.';
			}
		}
	}

}

/* End of file perfil_test.php */
/* Location: ./application/controllers/perfil_test.php */
