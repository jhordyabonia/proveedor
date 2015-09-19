<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Popup extends CI_Controller
 {
	function __construct() 
	{
		parent::__construct();


		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Mensajes_model','mensaje');
		$this->load->model('new/Remitente_model','remitente');
		$this->load->model('new/Solicitud_model', 'solicitud');
		$this->load->model('new/Producto_model', 'producto');
		$this->load->model('new/Remitente_model', "remitente");
		$this->load->model('new/Usuarios_model', 'usuarios');
		$this->load->model('new/Categoria_model', 'categoria');

		$this->load->model('crypter_model','crypter');
		#$this->load->model('email_model','e');
		$this->load->library(array('session', 'form_validation', 'email', "breadcrumb"));
	}
	public function asistentes_proveedor($argv=FALSE)
    {
    	if(!$argv)
    	{
    		$this->load->model('popups_textos_model', 'popups_textos');
			$datos['id_popup']="asistentes_proveedor";
			$datos['categoria']=33;
			$datos['datos']=$this->popups_textos->get(array('categoria'=>$datos['categoria']));
			$this->load->view('template/head', FALSE);
			$this->load->view('template/javascript', FALSE);
	    	$this->load->view('popups/asistentes_proveedor', $datos);   
	    	return;
	    }

		$datos['solicitud'] = $this->input->post('solicitud');
		$datos['descripcion'] = $this->input->post('descripcion');
		$datos['cantidad_requerida'] = $this->input->post('cantidad_requerida');
		$datos['precio'] = $this->input->post('precio');
		$datos['forma_de_pago'] = $this->input->post('pago');
		$datos['email'] = $this->input->post('email');
		$datos['nombres'] = $this->input->post('nombres');
		$datos['apellidos'] = $this->input->post('apellidos');
		$datos['telefono'] = $this->input->post('telefono');
		$datos['nombre_empresa'] = $this->input->post('nombre_empresa');
		$datos['ciudad_entrega'] = $this->input->post('ciudad_entrega');
		$datos['categoria'] = $this->input->post('categoria');

		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
		$this->load->model('categoria_model','categoria');
		$nombre_categoria=$this->categoria->get($datos['categoria'])->nombre_categoria;
		$this->asistentes_proveedor->insert($datos);

		$remitente =$this->remitente->get(array('correo' =>$datos['email']));
		if($remitente)
		{ 
			#$remitente['correo']=$datos['email'];
			$remitente['nombres']=$datos['nombres'];
			$remitente['telefono']=$datos['telefono'];
			$this->remitente->update($remitente,$remitente->id);
		}
		else 
		{
			$remitente['correo']=$datos['email'];
			$remitente['nombres']=$datos['nombres'];
			$remitente['telefono']=$datos['telefono'];
			$this->remitente->insert($remitente);
		}
		

		$mensaje="El sr.<B>".$datos['nombres']."</B><BR>";
		$mensaje.="Ha registrado la siguiente solicitud. ".$datos['solicitud'];
		$mensaje.="<BR>Su email es: <b>".$datos['email']."</b>";
		$mensaje.="<H2>Datos de la solictud</H2>";
		$mensaje.="<TABLE BORDER='0' padding=4' margin='2' cellspading='2' bgcolor='#efefef'>";
		$mensaje.="<TR><th align='left'>Categoria: <td align='left'><I>".$nombre_categoria."</I>";
		$mensaje.="<TR><th align='left'>Producto o insumo solicitado:<td align='left'><I>".$datos['solicitud']."</I>";
		$mensaje.="<TR><th align='left'>Descripcion de la solicitud:<td align='left'><I>".$datos['descripcion']."</I>";
		$mensaje.="<TR><th align='left'>Cantidad:<td align='left'><I>".$datos['cantidad_requerida']."</I>";
		$mensaje.="<TR><th align='left'>Precio máximo:</B><td align='left'>".$datos['precio']."</B><BR>";
		$mensaje.="<TR><th align='left'>Forma de pago preferida:<td align='left'><I>".$datos['forma_de_pago']."</I>";
		$mensaje.="<TR><th align='left'>Direccion de Email:<td align='left'><I>".$datos['email']."</I>";
		$mensaje.="<TR><th align='left'>Nombre y Apellidos:<td align='left'><I>".$datos['nombres']."</I>";		
		$mensaje.="<TR><th align='left'>Telefono:<td align='left'><I>".$datos['telefono']."</I>";
		$mensaje.="<TR><th align='left'>Nombre empresa:<td align='left'></I>".$datos['nombre_empresa']."</I>";
		$mensaje.="<TR><th align='left'>Ciudad de entrega:<td align='left'><I>".$datos['ciudad_entrega']."</I>";
		$mensaje.="</TABLE>";
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
		$this->email->to('jeigl7@gmail.com, andres.asc@gmail.com, andresdulce@gmail.com');
		$this->email->subject("Se ha registrado una nueva solicitud");
		$this->email->message($mensaje);
		//echo @$mensaje;
		//return;
		if ($this->email->send())
		{
			$this->session->set_flashdata('mensaje_enviado', "DONE");
		}
		$this->session->set_flashdata('mensaje_enviado', "DONE");
		redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function auto_launch($view,$launcher=FALSE)
	{
		$datos['launcher'] =  $launcher;
		$datos['view'] = $view;		
		$datos['id_popup'] = $view;
		if($launcher)
		{
			$out = $this->load->view($view, $datos, TRUE);
			$out .= $this->load->view('popups/launcher', $datos, TRUE);
			return $out;
   		}
		$this->load->view('template/head', FALSE, FALSE);
		$this->load->view('template/javascript', FALSE, FALSE);
	   	$this->load->view('popups/auto_launch', $datos);
    } 

	public function confirmar_mensaje($id_popup='confirmar_mensaje')
	{
		$datos['id_popup']=$id_popup;
		$this->load->view('template/head', FALSE);
		$this->load->view('template/javascript', FALSE);
    	$out = $this->load->view('popups/confirmacion/confirmacion_mensaje', $datos);
    } 
	public function restriccion($id_popup='restriccion', $load=FALSE)
	{
		$datos['id_popup']=$id_popup;
		$this->load->view('template/head', FALSE, FALSE);
		$this->load->view('template/javascript', FALSE, FALSE);
    	$this->load->view('popups/restriccion', $datos);
    }
	public function registro_completo($id_popup='registro_completo')
	{
		$datos['id_popup']=$id_popup;
		$this->load->view('template/head', FALSE, FALSE);
		$this->load->view('template/javascript', FALSE, FALSE);
    	$this->load->view('popups/confirmacion/registro_completo', $datos);
    }
	public function confirmar_solicitud($id_popup='confirmar_solicitud', $load=FALSE )
	{
		$datos['id_popup']=$id_popup;
		$this->load->view('template/head', FALSE, FALSE);
		$this->load->view('template/javascript', FALSE, FALSE);
    	$this->load->view('popups/confirmacion/confirmacion_oferta_publicada', $datos);
    }
	public function confirmar_producto($id_popup='confirmar_producto', $load=FALSE)
	{
		$datos['id_popup']=$id_popup;
		$this->load->view('template/head', FALSE, $load);
		$this->load->view('template/javascript', FALSE, $load);
    	$this->load->view('popups/confirmacion/confirmacion_producto_publicado', $datos, $load);
    }
	public function confirmar_publicar($id=-1, $load=FALSE)
	{
		$datos['id_popup']="confirmar_publicar";
		$datos['id_producto']=$id;
		$this->load->view('template/head', FALSE, $load);
		$this->load->view('template/javascript', FALSE, $load);
    	$this->load->view('popups/confirmacion/confirmar_publicar', $datos, $load);
    }
	public function eliminar_producto($id=-1, $load=FALSE)
	{
		$datos['id_producto']=$id;
		$datos['id_popup']='eliminar_producto';
		$this->load->view('template/head', FALSE, FALSE);
		$this->load->view('template/javascript', FALSE, FALSE);
		$this->load->view('popups/eliminacion/eliminar_producto', $datos);
    }

	public function eliminar_solicitud($id=-1, $load=FALSE)
	{
		$datos['id_solicitud']=$id;
		$datos['id_popup']='eliminar_solicitud';
		$this->load->view('template/head', FALSE, FALSE);
		$this->load->view('template/javascript', FALSE, FALSE);
		$this->load->view('popups/eliminacion/eliminar_solicitud', $datos);
    }
    public function slider($imagen="default.jpg")
    {    	
    	$datos['imagen']=$imagen;
		$this->load->view('popups/slide_producto', $datos);
    }
    public function mensaje($id_popup='mensaje', $id_producto=FALSE)
    { 
	    $datos=$this->obtener_datos($id_producto);

	    echo "<PRE>";
	    print_r($datos);
	    echo "</PRE>";
	    return;
		if($datos)
		{
			$this->enviar($datos);			
		}else
		{			
			$datos['url'] = '#';
			$datos['imagen'] = FALSE;
		}
	 	$datos['nombre_usuario'] = FALSE;
		$datos['email'] = "";
		$datos['telefono'] = "";
		$datos['abilitado'] = "";
	 	$iduser = $this->session->userdata('id_usuario');
		if($iduser)
		{
			$tmp= $this->usuarios->get($iduser);
			$datos['nombre_usuario'] = $tmp->nombres;
			$datos['email'] = $tmp->email;
			$datos['telefono'] =" ".$tmp->telefono."- CEL.: ".$tmp->celular;
			$datos['abilitado'] = "readonly";
		}
		$datos['id_popup']=$id_popup;
		$this->load->view('template/head', FALSE, FALSE);
		$this->load->view('template/javascript', FALSE, FALSE);    	
    	$this->load->view('popups/mensaje', $datos);
    	//$this->load->view('popups/confirmacion/confirmacion_mensaje', array('id_popup'=>'confirmar_envio'));
    }
    public function envio_multiple()
    {
    	$destinatarios=$this->input->post('destinatarios');
    	echo '> '.$destinatarios;    	
    	$this->mensaje("popup",$destinatarios);
    }

	public function contactar($tipo=1)
	{	
        $this->load->view('template/head', array('titulo' => "Contactar --proveedor.com.co"));
        $this->load->view('template/javascript');
	 	$this->load->view('popups/opciones_popup');
        $this->load->view('popups/launcher', array('popup'=>'popup_opciones'));
	 	$this->load->view('popups/login');
	 	$datos['nombre_usuario'] = FALSE;
		$datos['email'] = "";
		$datos['telefono'] = "";
		$datos['abilitado'] = "";    	
    	$this->load->view('popups/mensaje', $datos);
    }

	public function login($id_popup='login',$reffer=FALSE,$error=FALSE)
	{		
	 	$iduser = $this->session->userdata('id_usuario');
		if($iduser)
			{
				if($_SERVER['HTTP_REFERER'])
					{	redirect($_SERVER['HTTP_REFERER']); }
				else{ 	redirect(base_url());	}
			}

		$this->session->set_flashdata('reffer', $reffer);
				
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');

		if($user&&$pass)
		{			
			redirect('logueo/login/'.$user.'/'.$pass);
		}
		else
		{
			$datos['id_popup']=$id_popup;
			$datos['reffer']=$reffer;
			$datos['error']=$error;
			$this->load->view('template/head', array('titulo' => "Contactar --proveedor.com.co"), FALSE);
			$this->load->view('template/javascript', FALSE, FALSE);
    		$this->load->view('popups/login', $datos);
    		return FALSE;
    	}
	}
	private function obtener_datos($id_producto_oferta_nit)
	{		
		$datos['remitente']['nombres'] = $this->input->post('remitente');
		if(!$datos['remitente']['nombres'])
		{
			return FALSE;
		}
		$datos['remitente']['correo'] = $this->input->post('email');
		$datos['remitente']['telefono'] = $this->input->post('tel');

		$datos['mensaje']['mensaje'] = $this->input->post('mensaje');
		$datos['mensaje']['tipo'] = $this->input->post('tipo');
		$datos['mensaje']['id_producto_oferta_nit'] = $id_producto_oferta_nit;
		$datos['plantilla']['nombre_contacto'] =$datos['remitente']['nombres'];
		if(!$id_producto_oferta_nit)	
		{
			$datos['mensaje']['tipo']=0;
		}
		switch ($datos['mensaje']['tipo'])
		 {
			case '1': //desde pagina de producto
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Alguien esta interesado en su producto!";
				$producto=$this->producto->get($id_producto_oferta_nit);
				$empresa=$this->empresa->get($producto->empresa);
				$usuario=$this->usuarios->get($empresa->usuario);

			 	$datos['mensaje']['destinatario']= $usuario->id;
			 	$datos['detinatario_email']=$usuario->email;
			 	$datos['plantilla']['nombre_ususario'] = $usuario->nombres;
			 	$datos['plantilla']['nombre_empresa'] =$empresa->nombre;				
				$datos['plantilla']['asunto'] = "!Una empresa se ha interesado en su producto!";
				$datos['plantilla']['url'] =  base_url()."producto/ver/".$id_producto_oferta_nit;
				$datos['plantilla']['imagen'] = explode(',',$producto->imagenes);
				$datos['plantilla']['imagen'] = $datos['plantilla']['imagen'][0];
				$datos['plantilla']['nombre_producto'] = $producto->nombre;
				break;
			case '2': //desde pagina de solicitud
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Ha recibido una cotización!";
				$solicitud=$this->solicitud->get($id_producto_oferta_nit);
				$empresa=$this->empresa->get($solicitud->empresa);
				$usuario=$this->usuarios->get($empresa->usuario);
			 	$datos['mensaje']['destinatario']= $usuario->id;
			 	$datos['detinatario_email']=$usuario->email;
			 	$datos['plantilla']['nombre_ususario'] = $usuario->nombres;
				$datos['plantilla']['nombre_empresa'] =$empresa->nombre;
				$datos['plantilla']['asunto'] = "!Ha recibido una cotización para el producto que solicitó!";
				$datos['plantilla']['url'] =  base_url()."oportunidad_comercial/ver/".$id_producto_oferta_nit;
				$datos['plantilla']['imagen'] = explode(',',$solicitud->imagenes);
				$datos['plantilla']['imagen'] =$datos['plantilla']['imagen'][0];
				$datos['plantilla']['nombre_producto'] = $solicitud->nombre;
				break;
			case '3': //desde pefil de empresa
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Tiene un mensaje para su empresa! ";
				$empresa = $this->empresa ->get($id_producto_oferta_nit);
				$usuario = $this->usuarios->get($empresa->usuario);
				$datos['mensaje']['destinatario']= $usuario->id;
			 	$datos['detinatario_email']=$usuario->email;
			 	$datos['plantilla']['nombre_ususario'] = $usuario->nombres;
			 	$datos['plantilla']['nombre_empresa'] =$empresa->nombre;				
				$datos['plantilla']['asunto'] = "!Ha recibido un mensaje para su empresa!";
				$datos['plantilla']['url'] =  base_url()."perfil/perfil_empresa/".$id_producto_oferta_nit;
				$datos['plantilla']['imagen'] = "logos/".$empresa->logo;
				$datos['plantilla']['nombre_producto'] = $empresa->nombre;
				break;
			case '4': //desde pagina de panel de oportunidades comerciales
				$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Ha recibido una cotización!";
				$oferta=$solicitudes=$this->asistentes_proveedor->get($id_producto_oferta_nit);
			 	$datos['mensaje']['destinatario']= 0;
			 	$datos['detinatario_email']=$oferta->email;
			 	$datos['plantilla']['nombre_ususario'] = $oferta->nombres;
				$datos['plantilla']['nombre_empresa'] =$oferta->nombre_empresa;
				$datos['plantilla']['asunto'] = "!Ha recibido una cotización para el producto o insumo que solicitó!";
				$datos['plantilla']['url'] =  base_url()."oportunidad_comercial/ver_/".$id_producto_oferta_nit;
				$datos['plantilla']['imagen'] = "default.jpg";
				$datos['plantilla']['nombre_producto'] = $oferta->solicitud;
				break;
				/*
			default: //mensaje standar entre ususarios
				$datos['mensaje']['tipo']=0;
				$datos['plantilla']['url']="#";
				$datos['plantilla']['imagen']=FALSE;
				$datos['mensaje']['asunto'] = $this->input->post('asunto');
				$datos['mensaje']['destinatario']= $this->input->post('id_destinatario');
				$datos['detinatario_email']= $this->input->post('destinatario');
				$datos['datos_a_enviar'] ="Recibio un msj en proveedor";
				break;
				*/
		 }
		if($this->input->post('respuesta')=='si')
			{
			 	$datos['plantilla']['nombre_ususario'] = $this->input->post('nombres_destinatario');	
				$datos['detinatario_email'] = $this->input->post('correo_destinatario');	 
				$datos['mensaje']['destinatario'] = $this->input->post('destinatario');
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Ha recibido un respuesta a su mensaje!";
				$datos['plantilla']['asunto'] = "¡Ha recibido un respuesta a su mensaje!";				
			} 
	 	
		return $datos;
	}       
	private function load_file()
	{	
		$this->load->model('email_model', "adjunto");
		$adjunto= $this->adjunto->archivo_adjunto("adjunto");	

		return $adjunto;
	}

	private function enviar($datos)
	{
		#echo "<PRE>";
		#print_r($datos);
		#echo "</PRE>";
		#return;
		if($datos['plantilla']['nombre_empresa'])
			{$datos['plantilla']['nombre_empresa']="";}

	  	#$remitente =$this->remitente->get(array('correo' =>$datos['remitente']['correo']));
		#if($remitente)
		#{ 
		#	$datos['mensaje']['remitente'] = $remitente->id;
		#	$this->remitente->update($datos['remitente'],$remitente->id);
		#}
		#else {$datos['mensaje']['remitente'] = $this->remitente->insert($datos['remitente']);}
		$datos['mensaje']['remitente'] = $this->remitente->insert($datos['remitente']);
		$datos['mensaje']['adjunto'] = $this->load_file();
		$id_mensaje=$this->mensaje->insert($datos['mensaje']);
		$datos['plantilla']['adjunto'] = FALSE;
		if($datos['mensaje']['adjunto'])
			{	$datos['plantilla']['adjunto'] =TRUE;	}

	  	$usrtmp= $this->usuarios->get(array("email"=>$datos['detinatario_email']));
	  	if(!$usrtmp)		
		{	$id_mensaje=$this->crypter->encrypt($id_mensaje);	}
		$datos['plantilla']['url_mensaje'] = base_url()."mensajes/leer/".$id_mensaje;
		$datos['datos_a_enviar']=$this->load->view('popups/plantilla_mensaje', $datos['plantilla'],TRUE);
   		
   		//echo $datos['datos_a_enviar'];
   		//return;

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
		$this->email->to($datos['detinatario_email']);
		$this->email->subject($datos['mensaje']['asunto']);
		$this->email->message($datos['datos_a_enviar']);
		$this->session->set_flashdata('mensaje_enviado', FALSE);

		if ($this->email->send())
		{
			$this->session->set_flashdata('mensaje_enviado', "DONE");
		}

		$this->session->set_flashdata('mensaje_enviado', "DONE"); // comenta esta linea para funcionamiento en el servidor
				
		redirect($_SERVER['HTTP_REFERER']);//comenta esta linea, para pruebas locales, el msj no se enviará		
	} 
}