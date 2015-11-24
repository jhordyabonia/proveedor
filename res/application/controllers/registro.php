<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}



class Registro extends CI_Controller {

	///Constructor de la clase del control
	function __construct() {
		parent::__construct();
		
		$this->rand = random_string('alnum', 4);
		$this->load->library(array('session', 'email', 'form_validation'));
		$this->load->helper(array('form', 'url', 'captcha'));
		#$this->load->database();
		#session_start();
		#$this->data = array('');

		$this->load->model('new/Pais_model','pais');
		$this->load->model('new/Tipo_empresa_model','tipo_empresa');
		$this->load->model('new/Municipio_model','municipio');
		$this->load->model('new/Departamento_model','departamento');
		$this->load->model('new/Categoria_model','categoria');
		$this->load->model('new/Evento_model','evento');
		$this->load->model('new/Plantilla_model','plantilla');
		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Usuarios_model','usuarios');
		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
		$this->load->model('crypter_model','crypter');
	}

	/////funcion para llamar la pagina index
	function index() {
		$this->session->set_userdata('registro','TRUE');
		redirect(base_url()); 
		#$this->load->view('registro/registro_usuario', array('error' => ' '));
		//$data = array('captcha' => $this->captcha());
		//$this->session->set_userdata('captcha', $this->rand);
		//$this->load->view('vistas/registro_usuario',$datos);
	}

	function registrar() 
	{	$this->index(); }
	
	function registro_usuario() 
	{	$this->index(); }
	
	function registro_automatico($id)
	{
		$source=$this->asistentes_proveedor->get($id);
		if($source->empresa!=0)
			redirect($_SERVER['HTTP_REFERER']);

		$registro=$this->usuarios->get(array('email'=>$source->email));		
		
		if($registro!=FALSE)
			redirect($_SERVER['HTTP_REFERER']);

		$datos_usuario['usuario'] = "proveedor".substr($this->crypter->encrypt(rand(5,25)), 7);
		$password=$this->crypter->encrypt(rand(10,50));
		$datos_usuario['email'] = $source->email;
		$datos_usuario['password'] = md5($password);
		$datos_usuario['rol'] = '';	
		$datos_usuario['nombres']= $source->nombres;
		$datos_usuario['cargo'] = '';
		$datos_usuario['direccion'] = '';
		$datos_usuario['departamento'] = 33;
		$datos_usuario['ciudad'] = 1113;
		$datos_usuario['web'] = '';
		$datos_usuario['celular'] = '';
		$datos_usuario['pais'] = 52;	
		$datos_usuario['telefono'] = $source->telefono;
		//Datos de Empresa
		$datos_empresa['categorias']=$source->categoria.'|';
		$datos_empresa['nit'] = '';
		$datos_empresa['nombre'] =$source->nombre_empresa;
		$datos_empresa['tipo'] = 1;
		$datos_empresa['logo'] = "default.jpg";		
		$datos_empresa['descripcion'] = "Empresa interesada en ".$this->categoria->get(38)->nombre_categoria;
		$datos_empresa['productos_principales'] = '';
		$datos_empresa['productos_de_interes'] = '';	
		$id_registro=$this->usuarios->insert($datos_usuario);
						
		$datos_empresa['usuario'] = $id_registro;
		$id_unic=$this->empresa->insert($datos_empresa);		
		$this->asistentes_proveedor->update(array('empresa'=>$id_unic),$id);

		#$this->crear_cuenta($id_unic);
		#$this->reportar_registro(array_merge($datos_empresa,$datos_usuario));

		$mensaje="<div style='max-width: 600px;'> <img style='max-width: 600px;' src='".img_url()."header-email.png' alt=''>
		<br>Hola ".$source->nombres.", bienvenido(a) a <a href='".base_url()."'> Proveedor.com.co</a><br><br>"."

		Hemos recibido correctamente tu solicitud. Recuerda a <a href='".base_url()."logueo/activar_cuenta/".$id."'>ACTIVAR TU CUENTA</a> para continuar.	
		Ingresa a <a href='".base_url()."logueo/activar_cuenta/".$id."'>este enlace</a>,  copia  el nombre de usuario y contraseña para activar y publicar la solicitud de cotización, te recomendamos estar pendiente de tu correo y teléfono móvil dónde recibirás notificaciones.
		<br><br>Nombre de usuario: <b>".$source->email."</b><br>Contraseña: <b>".$password."</b><br> Atentamente, <br><a href='".base_url()."'>Equipo proveedor Proveedor.com.co</a><br>
		<br><img style='max-width: 600px;' src='".img_url()."footer-email-platino.png' alt=''></div>";


		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
		$this->email->to($source->email);
		$this->email->subject("Bienvenido a Proveedor.com.co");
		$this->email->message($mensaje);
		$this->email->send();

		#echo @$mensaje;
		#$this->bienvenida(array_merge($datos_empresa,$datos_usuario));
		$this->session->set_userdata('mensaje_enviado',"TRUE");
		redirect($_SERVER['HTTP_REFERER']);
	}

	function validacion()
	{
		$this->form_validation->set_rules('usuario', 'usuario', 'trim|required|min_length[4]|max_length[20]|is_unique[usuario.usuario]|callback_validaEspacios|alpha_numeric');
		$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]|max_length[20]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Contraseña', 'required|min_length[6]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuario.email]');
		$this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
		$this->form_validation->set_message('matches', 'Las %s  no coinciden');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email', 'El  %s es incorrecto, debe tener el formato correo@dominio.com');
		$this->form_validation->set_message('alpha_numeric', 'El  %s , solo puede contener caracteres alfanumericos ');
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[5]');
		/*
		$this->form_validation->set_rules('cargo', 'Cargo', 'trim|required');
		$this->form_validation->set_rules('direccion', 'Direccion', 'trim|required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('pais', 'Pais', 'callback_validar_pais');
		#$this->form_validation->set_rules('provincia', 'Departamento', 'callback_validar_dept');
		#$this->form_validation->set_rules('municipio', 'Municipio', 'callback_validar_mun');
		$this->form_validation->set_rules('cel', 'Cel', 'trim|required|is_natural|min_length[6]');
		#$this->form_validation->set_rules('indicativo', 'indicativo', 'trim|is_natural');
		$this->form_validation->set_rules('fijo', 'Telefono Fijo', 'trim|is_natural|min_length[6]');
		#$this->form_validation->set_rules('extension', 'extension', 'trim|is_natural');
		$this->form_validation->set_rules('web', 'La web', 'trim|prep_url');
		#$this->form_validation->set_rules('skype', 'Cuenta de skype', 'trim');
		///los mensajes  de validaciones se personalizan porque vienen por default en ingles
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email', 'la  %s es incorrecta, debe tener el formato correo@dominio.com');
		$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
		*/	

		$this->form_validation->set_rules('tipo', 'un tipo', 'callback_my_func');
		$this->form_validation->set_rules('nit', 'nit', 'trim|required|is_unique[empresa.nit]');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|max_length[500]');
		$this->form_validation->set_rules('radio', 'terminos y condiciones', 'required');
		$this->form_validation->set_rules('nombre_empresa', 'nombre_empresa', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('prod1', 'productos', 'trim');
		$this->form_validation->set_rules('prod_int4', 'productos', 'trim');
		$this->form_validation->set_message('is_unique', 'El %s ya esta registrado');

		return $this->form_validation->run();	
	}
	function get()
	{			
		$param['paises'] = $this->pais->get_all();	
		$param['dept'] = $this->departamento->get_all();
		$param['municipios'] = $this->municipio->get_all(array('id_departamento'=>$this->input->post('provincia')));

		$param['lista'] = $this->tipo_empresa->get_all();
		$param['categorias_select'] = $this->input->post('categorias'); //Categorias seleccionadas
		$param['categorias'] = $this->categoria->get_all();


		$this->load->view('template/head', array('titulo'=>""), FALSE);
		$this->load->view('template/javascript');
		$this->load->view('registro/funcionalidades_',$param);
		$this->load->view('registro/registro',$param);
	}


	function bienvenida($datos)
	{		
		$evento=$this->evento->get(2);
		$plantilla=$this->plantilla->get($evento->plantilla);
		$mensaje=$this->load->view('plantillas/'.$plantilla->nombre, $datos,TRUE);

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
		$this->email->to($datos['email']);
		$this->email->cc('jeigl7@gmail.com,andresdulce@gmail.com');
		$this->email->subject("Bienvenido a Proveedor.com.co");
		$this->email->message($mensaje);
		$this->email->send();

		//echo @$mensaje;
	}

	function reportar_registro($datos)
	{
		$mensaje="<B>Nuevo registro!!!</B><BR>";
		$mensaje.="Se registrado la empresa. ".$datos['nombre'];
		$mensaje.="<BR>Su nit es: <b>".$datos['nit']."</b>";
		$mensaje.="<H2>Datos de la empresa</H2>";
		$mensaje.="<TABLE BORDER='0' padding=4' margin='2' cellspading='2' bgcolor='#efefef'>";
		$mensaje.="<TR><th align='left'>Nombres de contacto: <td align='left'><I>".$datos['nombres']."</I>";
		$mensaje.="<TR><th align='left'>Email:<td align='left'><I>".$datos['email']."</I>";
		$mensaje.="<TR><th align='left'>Telefono:<td align='left'><I>".$datos['telefono']."</I>";
		$mensaje.="</TABLE>";
		
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
		$this->email->to('jeigl7@gmail.com, andres.asc@gmail.com, andresdulce@gmail.com');
		$this->email->subject("Se ha registrado una nueva empresa");
		$this->email->message($mensaje);
		$this->email->send();
	}

	function insert()
	{
		#if(!$this->validacion())
		#{
		#	$this->get();
		#	return;
		#}
		//Datos de Usuario
		$datos_usuario['usuario'] = $this->input->post('usuario');
		$datos_usuario['email'] = $this->input->post('email');
		$datos_usuario['password'] = md5($this->input->post('password'));
		$datos_usuario['rol'] = $this->input->post('radio');	
		$datos_usuario['nombres']= $this->input->post('nombre');
		$datos_usuario['cargo'] = $this->input->post('cargo');
		$datos_usuario['direccion'] = $this->input->post('direccion');
		$datos_usuario['departamento'] = $this->input->post('provincia');
		$datos_usuario['ciudad'] = $this->input->post('municipio');
		$datos_usuario['web'] = $this->input->post('web');
		$datos_usuario['celular'] = $this->input->post('cel');
		$datos_usuario['pais'] = $this->input->post('pais');	
		$datos_usuario['telefono'] = $this->input->post('fijo');
		//Datos de Empresa
		$datos_empresa['categorias']=$this->input->post('categorias');
		$categorias_tmp="38|";
		foreach ($datos_empresa['categorias'] as $key => $value)
		{
			$categorias_tmp.='|'.$value;
		}
		$datos_empresa['categorias']=$categorias_tmp;
		$datos_empresa['nit'] = $this->input->post('nit');
		$datos_empresa['nombre'] = $this->input->post('nombre_empresa');
		$datos_empresa['tipo'] = $this->input->post('tipo');
		$datos_empresa['logo'] = $this->subir_logo();
		$datos_empresa['descripcion'] = $this->input->post('descripcion');
		$datos_empresa['productos_principales'] = $this->input->post('prod1');
		$datos_empresa['productos_de_interes'] = $this->input->post('prod_int4');				
		//$data['fecha'] = "".date("Y m d");;			
		$id_registro=$this->usuarios->insert($datos_usuario);
						
		$datos_empresa['usuario'] = $id_registro;
		/*
		echo "<PRE>";
		print_r($datos_usuario);
		print_r($datos_empresa);
		echo "</PRE>";
		return;
		*/
		$id_unic=$this->empresa->insert($datos_empresa);

		#$this->crear_cuenta($id_unic);
		$this->reportar_registro(array_merge($datos_empresa,$datos_usuario));
		$this->bienvenida(array_merge($datos_empresa,$datos_usuario));
			
		$this->load->model('new/usuarios_model','usuarios');
		#$this->load->model('logueo_model');
		$check_user = $this->usuarios->get($id_registro);
        if($check_user == TRUE)   
        { 
	                $data['is_logued_in']=TRUE;
                    $data['id_usuario']=$check_user->id;
                    $data['rol_usuario']=$check_user->rol;
                    $data['usuario']=$check_user->usuario;
                    $data['email']= $check_user->email;
                    $this->session->set_userdata($data);
        }
		$this->session->set_userdata('first_ligin',1);
		redirect('tablero_usuario');		
	}	

	private function subir_logo()
	{
		//Configuramos los parametros para subir el archivo al servidor.        
        $config['upload_path'] = './uploads/logos/';        
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '0';          
        //Load the Upload CI library 
        //Cargamos la libreria CI para Subir
        $this->load->library('upload', $config);
        $excel=array();
        if ( ! $this->upload->do_upload('logo') )
        {              
          	return 'default.jpg';                       
        }
        else
        {            
            $data = array('upload_data' => $this->upload->data()); 
            return $data['upload_data']['file_name'];
        }       
	}

	function verificar($dato="",$campo='usuario',$tabla='usuarios')
	{
		$dato=str_replace("ARROBA", '@', $dato);
		$this->load->model('new/'.$tabla.'_model','datas');
		$registro=$this->datas->get(array($campo=>$dato));		
		
		if($registro)
		{	echo 1;	}
		else 
		if($registro==FALSE)		
		{	echo 0;	}
		else
		{	echo 1;	}
	}
	
	function municipio_select($provincia) 
	{
		$this->db->where("id_departamento", $provincia);
		$datos['municipios'] = $this->db->get('municipio');
		$datos['dept'] = $provincia;
		$this->load->view('municipios_select', $datos);
	}

	//Funcion para validar el select de departamento
	function validar_dept($str) {
		if ($str == '0') {
			$this->form_validation->set_message('validar_dept', 'El campo %s es obligatorio');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
}

?>
