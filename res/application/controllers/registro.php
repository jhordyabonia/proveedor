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
		$this->load->model('new/Categoria_model','categoria');
		$this->load->model('new/Tipo_empresa_model','tipo_empresa');
		$this->load->model('new/Municipio_model','municipio');
		$this->load->model('new/Departamento_model','departamento');


		$this->rand = random_string('alnum', 4);
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url', 'captcha'));
		#$this->load->database();
		#session_start();
		#$this->data = array('');
	}

	/////funcion para llamar la pagina index
	function index() {
		$this->session->set_userdata('paso',0);
		$this->session->set_userdata('registro',TRUE);
		$this->session->set_userdata('id_registro',0);
		redirect(base_url()); 
		#$this->load->view('registro/registro_usuario', array('error' => ' '));
		//$data = array('captcha' => $this->captcha());
		//$this->session->set_userdata('captcha', $this->rand);
		//$this->load->view('vistas/registro_usuario',$datos);
	}
		/////http://uno-de-piera.com/helper-captcha-en-codeigniter/
	/////funcion que llama la vista del registro de usuarios
	function registrar($paso=0,$id_registro=0,$redirect=0)
	{
		$this->session->set_userdata('paso',$paso);
		$this->session->set_userdata('registro',TRUE);
		$this->session->set_userdata('id_registro',$id_registro);
			
		switch ($paso) 
		{
			case 0:
					if($redirect==0){redirect(base_url()); }
					$this->load->view('registro/registro_usuario');
				break;
			case 1:

				$this->form_validation->set_rules('usuario', 'usuario', 'trim|required|min_length[4]|max_length[20]|is_unique[usuarios.usuario]|callback_validaEspacios|alpha_numeric');
				$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]|max_length[20]|matches[password2]');
				$this->form_validation->set_rules('password2', 'Contraseña', 'required|min_length[6]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');
				#$this->form_validation->set_rules('radio', '', 'callback_radio_option');

				//Se personaliza los mensajes de las validaciones
				//Mensajes de validacion originales
				$this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
				$this->form_validation->set_message('matches', 'Las %s  no coinciden');
				$this->form_validation->set_message('required', 'El campo %s es obligatorio');
				$this->form_validation->set_message('valid_email', 'El  %s es incorrecto, debe tener el formato correo@dominio.com');
				$this->form_validation->set_message('alpha_numeric', 'El  %s , solo puede contener caracteres alfanumericos ');
				//Mensajes de validacion de prueva
				/*
				$this->form_validation->set_message('is_unique', ' ');
				$this->form_validation->set_message('matches', ' ');
				$this->form_validation->set_message('required', ' ');
				$this->form_validation->set_message('valid_email', ' ');
				$this->form_validation->set_message('max_length', ' ');
				$this->form_validation->set_message('min_length', ' ');
				$this->form_validation->set_message('alpha_numeric', ' ');
				*/
				if(!$this->form_validation->run())
				{	
					if($redirect==0){redirect(base_url()); }
					$this->load->view('registro/registro_usuario');				
					return;
				}
				$data ['usuario'] = $this->input->post('usuario');
				$data ['email'] = $this->input->post('email');
				$data ['password'] = md5($this->input->post('password'));
				$data ['rol'] = $this->input->post('radio');	
			
				$this->load->model('new/Pais_model','pais');
				$param['paises'] = $this->pais->get_all();	
				$param['dept'] = $this->departamento->get_all();
				$param['municipios'] = $this->municipio->get_all(array('id_departamento'=>$this->input->post('provincia')));		
				$param['id_registro'] =$this->usuarios->insert($data);

				$this->session->set_userdata('paso',2);
				$this->session->set_userdata('registro',TRUE);
				$this->session->set_userdata('id_registro',$param['id_registro']);
				if($redirect==0){redirect(base_url()); }
				$this->load->view('registro/registro_contacto',$param);
				
				break;
			case 2:			
					///Las diferentes validaciones para el formulario
				$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[5]');
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

				if(!$this->form_validation->run())
				{			
					$this->load->model('new/Pais_model','pais');
					$param['paises'] = $this->pais->get_all();	
					$param['dept'] = $this->departamento->get_all();
					$param['municipios'] = $this->municipio->get_all(array('id_departamento'=>$this->input->post('provincia')));		
					$param['id_registro'] = $id_registro;

					if($redirect==0){redirect(base_url()); }
					$this->load->view('registro/registro_contacto',$param);	
					return;
				}
				$data['nombres']= $this->input->post('nombre');
				$data['cargo'] = $this->input->post('cargo');
				$data['direccion'] = $this->input->post('direccion');
				$data['departamento'] = $this->input->post('provincia');
				$data['ciudad'] = $this->input->post('municipio');
				$data['web'] = $this->input->post('web');
				$data['celular'] = $this->input->post('cel');
				$data['pais'] = $this->input->post('pais');	
				//$data['indicativo'] = $this->input->post('indicativo');
				$data['telefono'] = $this->input->post('fijo');
				//$data['extension'] = $this->input->post('extension');
				$this->usuarios->update($data,$id_registro);

				$this->session->set_userdata('paso',3);
				$this->session->set_userdata('registro',TRUE);
				$this->session->set_userdata('id_registro',$id_registro);

				
				$param = array(
				'lista' => $this->tipo_empresa->get_all(),
				'categorias_select' => $this->input->post('categorias'), //Categorias seleccionadas
				'categorias' => $this->categoria->get_all(),
				'id_registro' => $id_registro,
				);

				if($redirect==0){redirect(base_url()); }
				$this->load->view('registro/registro_empresa',$param);

				break;
			case 3:
				$this->form_validation->set_rules('tipo', 'un tipo', 'callback_my_func');
				$this->form_validation->set_rules('nit', 'nit', 'trim|required|is_unique[empresa.nit]');
				$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|max_length[500]');
				$this->form_validation->set_rules('radio', 'terminos y condiciones', 'required');
				$this->form_validation->set_rules('nombre_empresa', 'nombre_empresa', 'trim|required|min_length[3]');
				$this->form_validation->set_rules('prod1', 'productos', 'trim');
				#$this->form_validation->set_rules('prod2', 'productos', 'trim');
				#$this->form_validation->set_rules('prod3', 'productos', 'trim');
				#$this->form_validation->set_rules('prod4', 'productos', 'trim');
				#$this->form_validation->set_rules('prod_int1', 'productos', 'trim');
				#$this->form_validation->set_rules('prod_int2', 'productos', 'trim');
				#$this->form_validation->set_rules('prod_int3', 'productos', 'trim');
				$this->form_validation->set_rules('prod_int4', 'productos', 'trim');
				$this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
				

				if(!$this->form_validation->run())
				{
					$param = array(
					'lista' => $this->tipo_empresa->get_all(),
					'categorias_select' => $this->input->post('categorias'), //Categorias seleccionadas
					'categorias' => $this->categoria->get_all(),
					'id_registro' => $id_registro,
					);
					if($redirect==0){redirect(base_url()); }
					$this->load->view('registro/registro_empresa',$param);
					return;
				}
				
				$this->load->model('u_logo_model','u_logo');
				$data['categorias']=$this->input->post('categorias');
				//Se convierte, el array de $data['categorias'] en un string
				$categorias_tmp="";
				foreach ($data['categorias'] as $key => $value)
				{
					$categorias_tmp.='|'.$value;
				}
				$data['categorias']=$categorias_tmp;
				$data['nit'] = $this->input->post('nit');
				$data['nombre'] = $this->input->post('nombre_empresa');
				$data['tipo'] = $this->input->post('tipo');
				$data['logo'] = $this->subir_logo();
				$data['descripcion'] = $this->input->post('descripcion');
				$data['productos_principales'] = $this->input->post('prod1');
				$data['productos_de_interes'] = $this->input->post('prod_int4');				
				//$data['fecha'] = "".date("Y m d");;			
				$data['usuario'] = $id_registro;

				$id_unic=$this->empresa->insert($data);
				#$this->crear_cuenta($id_unic);
				

				$this->load->model('new/usuarios_model','usuarios');
				#$this->load->model('logueo_model');
				$usuario=$this->usuarios->get($data['usuario']);
				$check_user = $this->usuarios->get($data['usuario']);
				#$check_user = $this->logueo_model->login_user($usuario->usuario,$usuario->password);
                if($check_user == TRUE)   
                { 
                    $data = array(
                    'is_logued_in'  =>   TRUE,
                    'id_usuario'    =>    $check_user->id,
                    'permisos'   =>    $check_user->permisos,
                    'usuario'      =>    $check_user->usuario,
                    'email'         =>    $check_user->email,
                    );        
                    $this->session->set_userdata($data);
                }
				$this->session->set_userdata('first_ligin',1);
				redirect('tablero_usuario');
				break;
		}
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
		$this->load->model('new/'.$tabla.'_model','bd');
		$registro=$this->bd->get(array($campo=>$dato));		
		
		#if($registro)
		#{	echo 1;	}
		#else 
		if($registro==FALSE)		
		{	echo 0;	}
		else
		{	echo 1;	}
	}

	/////recibir datos del formulario de registro contacto
	function registro_contacto() {
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'cargo' => $this->input->post('cargo'),
			'direccion' => $this->input->post('direccion'),
			'departamento' => $this->input->post('provincia'),
			'ciudad' => $this->input->post('municipio'),
			'web' => $this->input->post('web'),
			'skype' => $this->input->post('skype')
		);

		$data2 = array(
			'indicativo' => $this->input->post('indicativo'),
			'tel' => $this->input->post('fijo'),
			'extension' => $this->input->post('extension'),
			'celular' => $this->input->post('celular')
		);

		///Las diferentes validaciones para el formulario
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('cargo', 'Cargo', 'trim|required');
		$this->form_validation->set_rules('direccion', 'Direccion', 'trim|required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('provincia', 'Departamento', 'callback_validar_dept');
		$this->form_validation->set_rules('municipio', 'Municipio', 'callback_validar_mun');
		$this->form_validation->set_rules('celular', 'Celular', 'trim|required|is_natural|exact_length[10]');
		$this->form_validation->set_rules('indicativo', 'indicativo', 'trim|is_natural');
		$this->form_validation->set_rules('fijo', 'Telefono Fijo', 'trim|is_natural|min_length[6]');
		$this->form_validation->set_rules('extension', 'extension', 'trim|is_natural');
		$this->form_validation->set_rules('web', 'La web', 'trim|prep_url');
		$this->form_validation->set_rules('skype', 'Cuenta de skype', 'trim');

		///los mensajes  de validaciones se personalizan porque vienen por default en ingles
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email', 'la  %s es incorrecta, debe tener el formato correo@dominio.com');
		$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');

		if ($this->form_validation->run() == FALSE) {
			$data['dept'] = $this->registro_model->municipios();
			$data['municipios'] = $this->registro_model->departamentos($this->input->post('provincia'));
			$this->load->view('registro/registro_persona', $data);
			$this->load->view('template/footer');
		} else {
			$this->registro_model->crearUsuario($data);
			$this->registro_model->guardarTelefonos($data2);
			redirect('/registro/empresa');
			// $this->load->view('registro/registro_empresa');
		}
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

	//Funcion para validar el select de municipio
	function validar_mun($str) {
		if ($str == '0') {
			$this->form_validation->set_message('validar_mun', 'El campo %s es obligatorio');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//////////////////Funcion para el primer pantallazo de registro  "registro de usuario"
	function registro_usuario() {

		$this->registrar();
		return;
		$data = array(
			'usuario' => $this->input->post('usuario'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'rol' => $this->input->post('radio')
		);
		// $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		/*
		  valid_email: Encargada de verificar si un campo input tiene el formato de correo electrónico (example@example.com).
		  required: Es la encargada de verificar si un campo input no esté vacío.
		  matches: Es la encargada de verificar que dos inputs sean iguales (matches[inputacomparar]).
		  is_unique: Se encarga de verificar que el valor del input no esté registrado en la base de datos (is_unique[tabla.columna]).
		  min_length, max_length: Se encarga de verificar la cantidad mínima y máxima de caracteres que puede tener un input (min_length[num], max_length[num]).
		 */
		$this->form_validation->set_rules('usuario', 'usuario', 'trim|required|min_length[4]|max_length[20]|is_unique[usuario.usuario]|callback_validaEspacios|alpha_numeric');
		$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]|max_length[20]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Contraseña', 'required|min_length[6]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuario.email]');
		$this->form_validation->set_rules('radio', '', 'callback_radio_option');

		//Se personaliza los mensajes de las validaciones
		$this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
		$this->form_validation->set_message('matches', 'Las %ss  no coinciden');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email', 'El  %s es incorrecto, debe tener el formato correo@dominio.com');
		$this->form_validation->set_message('alpha_numeric', 'El  %s , solo puede contener caracteres alfanumericos ');
		// $this->form_validation->set_message('validaEspacios', 'El nombre de usuario no debe contener espacios');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registro/registro_usuario');
			$this->load->view('template/footer');
			//echo json_encode(array('campo1' => false,"msg"=>"sjdkhfkjshdfkjhsd"));
		} else {
			$this->registro_model->crearCuenta($data);
			redirect('registro/registro_contacto');
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


	function empresa() {
		$this->load->model('u_logo_model','u_logo');
		if (!isset($_SESSION["validaexito"])) {
			$_SESSION["validaexito"] = 0;
		}

		$this->form_validation->set_rules('tipo', 'un tipo', 'callback_my_func');
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

		if ($this->form_validation->run() == true) {
			$_SESSION["validaexito"] = 1;
		}

		if ($this->form_validation->run() == false) {
			$data = array(
				'lista' => $this->registro_model->listaTipoEmpresa(),
				'categorias_select' => $this->input->post('categorias'), //Categorias seleccionadas
				'categorias' => $this->registro_model->mostrarCategoria(),
			);
			$this->load->view('registro/registro_empresa', $data);
			$this->load->view('template/footer');
		} else {
			unset($_SESSION["validaexito"]);
				$nit = $this->input->post('nit');
				$nombre = $this->input->post('nombre');
				$tipo = $this->input->post('tipo');
				$logo = $this->u_logo->imagen();
				$descripcion = $this->input->post('descripcion');
				$prod1 = $this->input->post('prod1');
				$prod2 = $this->input->post('prod2');
				$prod3 = $this->input->post('prod3');
				$prod4 = $this->input->post('prod4');
				$prod_int1 = $this->input->post('prod_int1');
				$prod_int2 = $this->input->post('prod_int2');
				$prod_int3 = $this->input->post('prod_int3');
				$prod_int4 = $this->input->post('prod_int4');
				$this->registro_model->crearEmpresa($nit, $nombre, $logo, $descripcion, $tipo);
				$this->registro_model->productoEmpresa($nit, $prod1, $prod2, $prod3, $prod4);
				$this->registro_model->productointeresanEmpresa($nit, $prod_int1, $prod_int2, $prod_int3, $prod_int4);
				$this->load->model('membresia_model','membresia');
				$this->membresia->insert(array('id_empresa' => $nit,'id_membresia'=> '1' ));

				/* para registrar las categorias de la empresa se recorre el select multiple de la vista que los contiene y por cada item se envia la informacion
				  al modelo para su insercion en la bd */
				// $item_categoria = $this->input->post('categorias'); 
				if ($this->input->post('categorias')) {
					$categoria = $this->input->post('categorias');
					$nit = $this->input->post('nit');
					foreach ($categoria as $nom_categoria) {
						$this->registro_model->categoriaEmpresa($nit, $nom_categoria);
					}
				}
			$this->session->set_flashdata('registro_completo', 'Registro exitoso!!');
			redirect('logueo');
		}  //cierra else primer if
	}

//Esta funcion resive todos los datos de el registro de empresa y realiza las respectivas validaciones
	//   function empresa (){
	//       $this->form_validation->set_rules('captcha', 'captcha', 'required|callback_validate_captcha');
	//       $this->form_validation->set_rules('tipo', 'un tipo', 'callback_my_func');
	//       $this->form_validation->set_rules('nit', 'nit', 'trim|required|is_natural_nit|is_unique[empresa.nit]');
	//       $this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|max_length[500]' );
	//       $this->form_validation->set_rules('categorias', 'categorias', 'required');
	//       $this->form_validation->set_rules('condiciones', 'terminos y condiciones', 'required');
	//       $this->form_validation->set_rules('userfile', 'logo', 'required');
	//       $this->form_validation->set_rules('nombre', 'nombre', 'trim|required|min_length[3]|alpha_numeric');
	//       $this->form_validation->set_rules('prod1', 'productos', 'trim|alpha_numeric' );
	//       $this->form_validation->set_rules('prod2', 'productos', 'trim|alpha_numeric' );
	//       $this->form_validation->set_rules('prod3', 'productos', 'trim|alpha_numeric' );
	//       $this->form_validation->set_rules('prod4', 'productos', 'trim|alpha_numeric' );
	//       $this->form_validation->set_rules('prod_int1', 'productos', 'trim|alpha_numeric' );
	//       $this->form_validation->set_rules('prod_int2', 'productos', 'trim|alpha_numeric' );
	//       $this->form_validation->set_rules('prod_int3', 'productos', 'trim|alpha_numeric' );
	//       $this->form_validation->set_rules('prod_int4', 'productos', 'trim|alpha_numeric' );
	//       $this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
	//               ///////  Clase upload  ////////////
	//           $config['upload_path'] = './uploads/logos/';
	//           $config['allowed_types'] = 'gif|jpg|png|jpeg';
	//           $config['max_size'] = '0';
	//           $config['max_width']  = '0';
	//           $config['max_height']  = '0';
	//           $this->load->library('upload', $config);
	//        if($this->form_validation->run() == true && $this->upload->do_upload()) {  
	//             $expiration = time()-600; // Límite de 10 minutos 
	//             $ip = $this->input->ip_address();//ip del usuario
	//             $captcha = $this->input->post('captcha');//captcha introducido por el usuario 
	//           // eliminamos los captcha con más de 2 minutos de vida
	//           $this->registro_model->remove_old_captcha($expiration);
	//           $check = $this->registro_model->check($ip,$expiration,$captcha); 
	//        // si el número de filas devuelto por la consulta es igual a 1 es decir, si el captcha ingresado en el campo de texto
	//        // es igual al que hay en la base de datos, junto con la ip del usuario entonces dejamos continuar 
	//        // porque todo es correcto     
	//           if($check == 1)   {
	//               // echo 'Validación pasada correctamente';
	//               $file_info = $this->upload->data();
	//               $logo = $file_info['file_name'];
	//                   $nit = $this->input->post('nit');
	//                   $nombre = $this->input->post('nombre');
	//                   $tipo = $this->input->post('tipo');
	//                   $logo = $this->input->post('userfile');
	//                   $descripcion = $this->input->post('descripcion'); 
	//                   $prod1 = $this->input->post('prod1');
	//                   $prod2 = $this->input->post('prod2');
	//                   $prod3 = $this->input->post('prod3');
	//                   $prod4 = $this->input->post('prod4');
	//                   $prod_int1 = $this->input->post('prod_int1');
	//                   $prod_int2 = $this->input->post('prod_int2');
	//                   $prod_int3 = $this->input->post('prod_int3');
	//                   $prod_int4 = $this->input->post('prod_int4'); 
	//               $this->registro_model->crearEmpresa($nit,$nombre,  $file_info['file_name'], $descripcion, $tipo);
	//             $this->registro_model->productoEmpresa($nit,$prod1,$prod2,$prod3,$prod4);  
	//             $this->registro_model->productointeresanEmpresa($nit,$prod_int1,$prod_int2,$prod_int3,$prod_int4);
	//        /*para registrar las categorias de la empresa se recorre el select multiple de la vista que los contiene y por cada item se envia la informacion
	//        al modelo para su insercion en la bd */
	//        $item_categoria = $this->input->post('categorias'); 
	//        if(count($item_categoria)>=1){
	//        $categoria =  $this->input->post('categorias');
	//           foreach ($categoria as $nom_categoria ) {
	//              $this->registro_model->categoriaEmpresa($nit,$nom_categoria);
	//             }
	//        } 
	//        $data = array('upload_data' => $this->upload->data()); 
	//         $this->session->set_flashdata('registro_completo','Registro exitoso!!');             
	//             redirect('logueo');   
	//           } 
	//       }else{
	//         $data = array(
	//         'lista' =>$this->registro_model->listaTipoEmpresa(),
	//         'categorias_select' =>  $this->input->post('categorias'), //Categorias seleccionadas
	//         'error' => $this->upload->display_errors(),
	//         'categorias' =>$this->registro_model->mostrarCategoria(),
	//         'captcha' => $this->captcha()
	//           );
	//         $this->load->view('registro/registro_empresa',$data); 
	//       }
	// }
////Funcion para validar si lo escrito en el input coincide con el captcha
	function condiciones($check) {
		if ($check) {
			return FALSE;
		} else {
			$this->form_validation->set_message('condiciones', 'El texto introducido no coincide con la imagen');
			return TRUE;
		}
	}

///Validacion del menu tipo empresa de la vista registro empresa
	function my_func($dropdown_selection) {
//If the selection equals "Select" that means it equals 0(which is the "hidden" value of it)
		if ($dropdown_selection == 0) {
			//Set the message here.
			$this->form_validation->set_message('my_func', 'Seleccione un tipo de la lista');
			//Return false, so the library knows that something  is wrong.
			return FALSE;
		}
		//If  everything is OK, return TRUE, to tell the library that we're good.
		return TRUE;
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

/////solo para ensayar el index
	function registro_exitoso() {
		$this->load->view('registro/index');
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
