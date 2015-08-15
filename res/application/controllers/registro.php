<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}



class Registro extends CI_Controller {

	///Constructor de la clase del control
	function __construct() {
		parent::__construct();
		
		$this->load->model('new/Usuarios_model','usuarios');
		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Tipo_empresa_model','tipo_empresa');
		$this->load->model('new/Categoria_model','categoria');
		$this->load->model('new/Pais_model','pais');
		$this->load->model('new/Departamento_model','departamento');
		$this->load->model('new/Municipio_model','municipio');
		$this->load->model('crypter_model','crypter');

		$this->rand = random_string('alnum', 4);
		$this->load->library(array('session', 'email','form_validation'));
		$this->load->helper(array('form', 'url', 'captcha'));
		$this->load->database();
		$this->data = array('');
		$this->id_registro_lost=0;
	}

	public function asistente_registro($dato)
	{
		$usuario=$this->usuarios->get(array('usuario'=>$dato));
		if($usuario==null)
		{
			$usuario= $this->usuarios->get(array('email'=>$dato));
		}
		if($usuario==null)
		{ return FALSE;	}

		if($usuario->nombres=="")
		{
			$this->usuarios->delete($usuario->id);
			return FALSE;
		}
		
		$empresa= $this->empresa->get(array('usuario'=>$usuario->id));
		if (!$empresa)
		{
			$param = array(
					'lista' => $this->tipo_empresa->get_all(),
					'categorias' => $this->categoria->get_all(),
					'id_registro' =>  $usuario->id,
					);
			if(!$param['id_registro'])
			{$param['id_registro']=$this->id_registro_lost;}
			$this->load->view('registro/registro_empresa',$param);
			#$this->load->view('registro/registro iniciado',$param); anteriormente, habia inicado el registro.

			return TRUE;			
		}
		return FALSE;
	}
	/////http://uno-de-piera.com/helper-captcha-en-codeigniter/
	/////funcion que llama la vista del registro de usuarios
	function registro_usuario()
	{
		$this->registrar();
	}
	function registrar($id_registro=0)
	{
		switch ($id_registro) 
		{
			case 0:
				$this->load->view('registro/registro_usuario');				
				break;
			case 1:

				#$this->form_validation->set_rules('usuario', 'usuario', 'trim|required|min_length[4]|max_length[20]|is_unique[usuarios.usuario]|callback_validaEspacios|alpha_numeric');
				$this->form_validation->set_rules('usuario', 'usuario', 'trim|required|min_length[4]|max_length[20]|callback_validaEspacios|alpha_numeric');
				$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]|max_length[20]|matches[password2]');
				$this->form_validation->set_rules('password2', 'Contraseña', 'required|min_length[6]');
				#$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('radio', '', 'callback_radio_option');

				//Se personaliza los mensajes de las validaciones
				$this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
				$this->form_validation->set_message('matches', 'Las %ss  no coinciden');
				$this->form_validation->set_message('required', 'El campo %s es obligatorio');
				$this->form_validation->set_message('valid_email', 'El  %s es incorrecto, debe tener el formato correo@dominio.com');
				$this->form_validation->set_message('alpha_numeric', 'El  %s , solo puede contener caracteres alfanumericos ');
		
				if(!$this->form_validation->run())
				{			
					$this->load->view('registro/registro_usuario');			
					return;
				}
				$data ['usuario'] = $this->input->post('usuario');
				$data ['email'] = $this->input->post('email');
				$data ['password'] = md5($this->input->post('password'));
				$data ['rol'] = $this->input->post('radio');	
			
				$param['title'] = "Registro datos de contacto-Proveedor.com.co";
				$param['paises'] = $this->pais->get_all();	
				$param['dept'] = $this->departamento->get_all();	
				$param['municipios'] = $this->municipio->get($this->input->post('provincia'));
				if($this->asistente_registro($data ['usuario'])){break;} #verificacion de registro imcompleto
				if($this->asistente_registro($data ['email'])){break;} #verificacion de registro imcompleto
				$param['id_registro'] =$this->usuarios->insert($data);
				$this->id_registro_lost=$param['id_registro'];
				$this->load->view('template/head', $param, FALSE);
				$this->load->view('template/javascript');
				$this->load->view('registro/registro_persona',$param);
				
				break;
			case 2:			
					///Las diferentes validaciones para el formulario
				$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('cargo', 'Cargo', 'trim|required');
				$this->form_validation->set_rules('direccion', 'Direccion', 'trim|required|min_length[5]|max_length[100]');
				$this->form_validation->set_rules('pais', 'Pais', 'callback_validar_pais');
				$this->form_validation->set_rules('provincia', 'Departamento', 'callback_validar_dept');
				$this->form_validation->set_rules('municipio', 'Municipio', 'callback_validar_mun');
				$this->form_validation->set_rules('celular', 'Celular', 'trim|required|is_natural|min_length[6]|max_length[15]');
				#$this->form_validation->set_rules('indicativo', 'indicativo', 'trim|is_natural');
				#$this->form_validation->set_rules('fijo', 'Telefono Fijo', 'trim|is_natural|min_length[6]');
				#$this->form_validation->set_rules('extension', 'extension', 'trim|is_natural');
				$this->form_validation->set_rules('web', 'La web', 'trim|prep_url');
				#$this->form_validation->set_rules('skype', 'Cuenta de skype', 'trim');

				///los mensajes  de validaciones se personalizan porque vienen por default en ingles
				$this->form_validation->set_message('required', 'El campo %s es obligatorio');
				$this->form_validation->set_message('valid_email', 'la  %s es incorrecta, debe tener el formato correo@dominio.com');
				$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');

				
				if(!$this->form_validation->run()||$this->input->post('id_registro')==0)
				{
					$param['title'] = "Registro datos de contacto-Proveedor.com.co";
					$param['paises'] = $this->pais->get_all();	
					$param['dept'] = $this->departamento->get_all();	
					$param['municipios'] = $this->municipio->get($this->input->post('provincia'));		
					$param['id_registro'] =$this->input->post('id_registro');
					if(!$param['id_registro'])
					{$param['id_registro']=$this->id_registro_lost;}
					$this->load->view('template/head', $param, FALSE);
					$this->load->view('template/javascript');
					$this->load->view('registro/registro_persona',$param);				
					return;
				}
		
				$data['nombres']= $this->input->post('nombre');
				$data['cargo'] = $this->input->post('cargo');
				$data['direccion'] = $this->input->post('direccion');
				$data['pais'] = $this->input->post('pais');
				$data['departamento'] = $this->input->post('provincia');
				$data['ciudad'] = $this->input->post('municipio');
				$data['web'] = $this->input->post('web');
				$data['celular'] = $this->input->post('celular');	
				//$data['indicativo'] = $this->input->post('indicativo');
				$data['telefono'] = $this->input->post('fijo');
				//$data['extension'] = $this->input->post('extension');
				$id_registro = $this->input->post('id_registro');
				if(!$id_registro)
				{$id_registro=$this->id_registro_lost;}

				$this->usuarios->update($data,$id_registro);
							
				$param = array(
				'lista' => $this->tipo_empresa->get_all(),
				'categorias' => $this->categoria->get_all(),
				'id_registro' => $id_registro,
				);
				$this->load->view('registro/registro_empresa',$param);

				break;
			case 3:
				$this->form_validation->set_rules('tipo', 'un tipo', 'required|callback_my_func');
				$this->form_validation->set_rules('nit', 'nit', 'trim|required|is_unique[empresa.nit]');
				$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|max_length[500]');
				$this->form_validation->set_rules('condiciones', 'terminos y condiciones', 'required');
				$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|min_length[3]');
				$this->form_validation->set_rules('prod1', 'productos', 'trim');
				$this->form_validation->set_rules('prod2', 'productos', 'trim');
				$this->form_validation->set_rules('prod3', 'productos', 'trim');
				$this->form_validation->set_rules('prod4', 'productos', 'trim');
				$this->form_validation->set_rules('prod_int1', 'productos', 'trim');
				$this->form_validation->set_rules('prod_int2', 'productos', 'trim');
				$this->form_validation->set_rules('prod_int3', 'productos', 'trim');
				$this->form_validation->set_rules('prod_int4', 'productos', 'trim');
				$this->form_validation->set_message('is_unique', 'El %s ya esta registrado');

				if(!$this->form_validation->run())
				{
					$param = array(
					'lista' => $this->tipo_empresa->get_all(),
					'categorias' => $this->categoria->get_all(),
					'id_registro' => $this->input->post('id_registro')
					);
					$this->load->view('registro/registro_empresa',$param);
					return;
				}
				$this->load->model('u_logo_model','u_logo');
				$data['nit'] = $this->input->post('nit');
				$data['nombre'] = $this->input->post('nombre');
				$data['tipo'] = $this->input->post('tipo');
				$data['logo'] = $this->u_logo->imagen();
				$data['descripcion'] = $this->input->post('descripcion');
				$data['productos_principales'] = $this->input->post('prod1');
				$data['productos_principales'].=",".$this->input->post('prod2');
				$data['productos_principales'].=",".$this->input->post('prod3');
				$data['productos_principales'].=",".$this->input->post('prod4');
				$data['productos_de_interes'] = $this->input->post('prod_int1');
				$data['productos_de_interes'].=",".$this->input->post('prod_int2');
				$data['productos_de_interes'].=",".$this->input->post('prod_int3');
				$data['productos_de_interes'].=",".$this->input->post('prod_int4');				
				//$data['fecha'] = "".date("Y m d");;			
				$data['usuario'] = $this->input->post('id_registro');
				$usuario=$this->usuarios->get($data['usuario'] );
				if(!$usuario)
				{
					$usuario=$this->usuarios->last_record();
					$data['usuario']= $usuario->id;					
					$data['verificacion']= $this->verificacion($usuario->id);
				}
				#echo "<PRE>";
				#print_r($usuario);
				#echo "</PRE>";
				#return;

				$data['categorias']="";
				foreach (explode('|',$this->input->post('id_categorias')) as $id_categoria) 
				{
					$data['categorias'].=$id_categoria."|";
				}
				
				
				if($this->empresa->get(array('usuario'=>$usuario->id)))
				{
					echo "Gracias, por registrar se, por favor ingrese a su correo y verifique su cuenta.";
					$this->empresa->insert($data);
					#enviar correo, para verificacion
					return;
				}
				$this->empresa->insert($data);					
               
				redirect('logueo/login/'.$usuario->usuario.'/'.$usuario->password);
				break;
		}
	}

	public function verificar($token,$id_usuario)
	{
		$empresa=$this->empresa->get(array('verificacion'=>$token));

		if(!$empresa)
		{redirect('index');}

		if($id_usuario==$empresa->usuario)
			{
				$this->empresa->update(array('verificacion'=>"Y"),$empresa->id);
				$usuario=$this->usuarios->get($id_usuario);
				redirect('logueo/login/'.$usuario->usuario.'/'.$usuario->password);
			}
		$usuario=$this->usuarios->get($id_usuario);
		if(!$this->asistente_registro($usuario->email))
			{redirect('index');			};
	}

	private function verificacion($id_usuario=NULL)
	{
		$token = $this->crypter->encrypt($id_usuario);
		$usuario=$this->usuarios->get($id_usuario);			
		$mensaje="Hola, Sr(a).<B>".$usuario->nombres."</B><BR>";
		$mensaje.="";
		$mensaje.="<H4>Verificacion de cuenta Proveedor.com.co</H4>";
		$mensaje.="<p><a href='".base_url()."registro/verificar/$token/$id_usuario'>Verificar cuenta</a></p>";
		$mensaje.="<TABLE BORDER='0' padding=4' margin='2' cellspading='2' bgcolor='#efefef'>";
		$mensaje.="<TR><TH  align='left'>Usuario: <TD>".$usuario->usuario;
		$mensaje.="<TR><TH  align='left'>Contraseña: <TD>**********";
		$mensaje.="</TABLE>";
		$mensaje.="<a href='".base_url()."registro/recuperar_clave/".$usuario->id."'>Olvido, su clave de acceso?</a>";
		
		
		echo @$email;
		echo "<PRE>";
		echo "</PRE>";
		echo @$mensaje;
		return $token;
		
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
		$this->email->to($usuario->email);
		$this->email->subject("Cambio de contraseña Proveedor.com.co");
		$this->email->message($mensaje);
		if ($this->email->send())
		{
			$this->session->set_flashdata('mensaje_enviado', "DONE");
		}
		$this->session->set_flashdata('mensaje_enviado', "DONE");
		return $token;
	}
	function municipio_select() {
		$provincia = $this->input->post('id');
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

	//Funcion para validar el select de municipio
	function validar_mun($str) {
		if ($str == '0') {
			$this->form_validation->set_message('validar_mun', 'El campo %s es obligatorio');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	
//Esta funcion se llama en las reglas de validacion de registro usuario para validar que no se dejen espacios en el nomnbre de usuario
	function validaEspacios($palabra) {
		if (strpos($palabra, " ") != 0) {
			$this->form_validation->set_message('validaEspacios', 'El    %s no debe contener espacios');
			return FALSE;
		} else {
			return TRUE;
		}
	}

//Funcion para la validacion de radio boton en registro usuario 
	function radio_option($option) {
		if (!$option) {
			$this->form_validation->set_message('radio_option', 'Debe elegir una opción');
			return FALSE;
		} else {
			return TRUE;
		}
	}

// }
//Esta funcion llama la vista de registro empresa
	// function empresa (){    
	//   $data = array(
	//   'lista' =>$this->registro_model->listaTipoEmpresa(),
	//   'categorias_select' =>  $this->input->post('categorias'), //Categorias seleccionadas
	//   // 'error' => $this->upload->display_errors(),
	//   'categorias' =>$this->registro_model->mostrarCategoria(),
	//   'captcha' => $this->captcha()
	//     );
	//   $this->load->view('registro/registro_empresa',$data);  
	//   } 

	function condiciones($check) {
		if ($check) {
			return FALSE;
		} else {
			$this->form_validation->set_message('condiciones', 'El texto introducido no coincide con la imagen');
			return TRUE;
		}
	}

////Funcion para validar si lo escrito en el input coincide con el captcha
	function validate_captcha($texto) {
		$texto_captcha = $this->registro_model->ultimo_captcha();  //trae el ultimo captcha generado en la bd

		if ($texto == $texto_captcha->word) {
			return TRUE;
		} else {
			$this->form_validation->set_message('validate_captcha', 'El texto introducido no coincide con la imagen');
			return FALSE;
		}
	}

	// esta funcion crea el captcha en la ruta especificada y con los datos que se le pasan en el array
	public function captcha() {
		//configuramos el captcha
		$conf_captcha = array(
			// 'word'   => $this->rand,
			'word' => '',
			'img_path' => './captcha/',
			'img_url' => base_url() . 'captcha/',
			'font_path' => './fonts/JI Hidden Vines.ttf',
			'img_width' => '165',
			'img_height' => '32',
			//decimos que pasados 10 minutos elimine todas las imágenes
			//que sobrepasen ese tiempo
			'expiration' => 600
		);

		//guardamos la info del captcha en la variable $cap
		$cap = create_captcha($conf_captcha);

		//pasamos la info del captcha al modelo para insertarlo en la base de datos
		$this->registro_model->insert_captcha($cap);

		//devolvemos el captcha para utilizarlo en la vista
		return $cap;
	}

	function Upload() {
		parent::Controller();
		$this->load->helper(array('form', 'url'));
	}

	////funcion para cargar el combobox tipo de mepresa de la vista
	function lista() {
		$this->load->model('registro_model');
		$data['cat'] = $this->registro_model->mostrar_tipo();
		$this->load->view('home', $data);
	}

}

?>