<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mensajes extends CI_Controller {
	// Constructor de la clase del control
	function __construct(){
		parent::__construct();
		$this->load->model('new/Mensajes_model','mensajes');
		$this->load->model('new/Remitente_model','remitente');
		$this->load->model('new/Usuarios_model','usuarios');
		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Producto_model','producto');
		$this->load->model('new/Solicitud_model','solicitud');
		$this->load->model('new/Departamento_model','departamento');
		$this->load->model('new/Municipio_model','municipio');
		$this->load->model('crypter_model','crypter');
		$this->load->library('session');
	}
 
  public function descargar_adjunto($id_mensaje=0)
  {   	
  	$this->session->set_userdata('path_current',base_url()."mensajes/descargar_adjunto/".$id_mensaje);
  	
  	 if(!is_numeric($id_mensaje))
  	 {
  		$id_mensaje=$this->crypter->decrypt($id_mensaje);
	 }else
	 if(!$this->veryficar_logged($id_mensaje))
	 { 
	   show_404();
	   return;
	 }

	 $mensaje =$this->mensajes->get($id_mensaje); 
	 $this->load->helper('download');  

	 $data = file_get_contents('uploads/adjunto/'.$mensaje->adjunto);
     force_download($mensaje->adjunto,$data); 
  }
  // Muestra la vista de mensajes recibidos del tablero de usuario
  public function enviados()
  {
  	$this->index("enviados");
  }
  function index($tab="recibidos")
  {     
  	$this->session->set_userdata('path_current',base_url()."mensajes");
	if(!$this->veryficar_logged())
	{  return;  }

	$id_usuario=$this->session->userdata('id_usuario');
	$datos['tab']=$tab;
	$datos['nuevos'] = $this->mensajes->get_all(array('destinatario' => $id_usuario, 'estado' => 0));
	$datos['recibidos'] = $this->mensajes->get_all(array('destinatario' => $id_usuario, 'estado' => 1));
	$remitente = $this->usuarios->get($id_usuario)->email;
	$remitente = $this->remitente->get(array('correo' => $remitente));
	
	$datos['enviados']=FALSE;
	if($remitente)
	{	
		$datos['enviados'] =$this->mensajes->get_all(array('remitente' => $remitente->id));		
	}
	if($datos['nuevos'])
	{
	  foreach ($datos['nuevos'] as $key => $value) 
	  { 
		$datos['nuevos'][$key]->remitente=$this->remitente->get(array('id' => $value->remitente));
	  }
	}
	if($datos['recibidos'])
	{
	  foreach ($datos['recibidos'] as $key => $value) 
	  { 
		$datos['recibidos'][$key]->remitente=$this->remitente->get(array('id' => $value->remitente));
	  }
	}
	if($datos['enviados'])
	{
	  foreach ($datos['enviados'] as $key => $value) 
	  { 
	  	$usuario= $this->usuarios->get($value->destinatario);
	  	if($usuario)
	  	{	$objeto->nombres = $usuario->nombres;}
	  	else {	$objeto->nombres = "Usuario no registrado";}
		$datos['enviados'][$key]->destinatario=$objeto;
		$objeto = NULL;
	  }
	}
	if($datos['nuevos'])
	{$datos['numero_nuevos']=count($datos['nuevos']);}
	else {$datos['numero_nuevos']=0;}
	if($datos['recibidos'])
	{$datos['numero_recibidos']=count($datos['recibidos'])+$datos['numero_nuevos'];}
	else {$datos['numero_recibidos']=$datos['numero_nuevos'];}
	if($datos['enviados'])
	{$datos['numero_enviados']=count($datos['enviados']);}
	else {$datos['numero_enviados']=0;}

	$datos['usuario']->usuario=$this->session->userdata('usuario');
	$datos['id_usuario']=$this->session->userdata('id_usuario');
	$datos['administrador']=FALSE;
	$datos['empresa']=$this->empresa->get(array('usuario'=>$datos['id_usuario']));
	$this->load->view('template/head',array('titulo' => "Contactar --proveedor.com.co"), FALSE); 
	$this->load->view('template/javascript', FALSE, FALSE);     
	$this->load->view('tablero_usuario/header', $datos, FALSE);
	$this->load->view('mensaje/recibidos', $datos);
  }
 
  public function leer($id)
  {
  	 $this->session->set_userdata('path_current',base_url()."mensajes/leer/".$id);
	 $datos['administrador']=FALSE;
  	 /*
  	 if(!is_numeric($id))
  	 {
  		$this->usuario_noregistrado($id);
	  	return;
	 }
	 if(!$this->veryficar_logged($id))
	 { 
	   show_404();
	   return;
	 }
  	*/
	$id_user=$this->session->userdata('id_usuario');
	$datos['nuevos'] = $this->mensajes->get_all(array('destinatario' => $id_user, 'estado' => 0));
	$datos['recibidos'] = $this->mensajes->get_all(array('destinatario' => $id_user, 'estado' => 1));
	$datos['enviados'] =$this->mensajes->get_all(array('remitente' => $id_user));

	$datos['numero_nuevos']=count($datos['nuevos']);
	$datos['numero_recibidos']=count($datos['recibidos'])+$datos['numero_nuevos'];
	$datos['numero_enviados']=count($datos['enviados']);
  	
	$datos['mensaje'] =$this->mensajes->get($id);   

	$datos['mensaje']->url=FALSE;
	$datos['mensaje']->image=FALSE;
	$id_tmp=$datos['mensaje']->id_objeto;

	switch ($datos['mensaje']->tipo) 
	{
		case 1:
			$producto=$this->producto->get($id_tmp);
			$datos['mensaje']->nom_objeto=$producto->nombre;
			$datos['mensaje']->url=base_url()."producto/ver/".$id_tmp;
			$datos['mensaje']->image=base_url()."uploads/".$producto->imagenes;
			break;
		case 2:
			$datos['mensaje']->datos=0;
			$solicitud=$this->solicitud->get($id_tmp);
			$datos['mensaje']->nom_objeto=$solicitud->nombre;
			$datos['mensaje']->url=base_url()."oportunidad_comercial/ver/".$id_tmp;
			$datos['mensaje']->image=base_url()."uploads/".$solicitud->imagenes;
			break;
		case 3:
			$datos['mensaje']->datos=0;
			$tmp=$this->empresa->get($id_tmp);
			$datos['mensaje']->nom_objeto=$tmp->nombre;
			$datos['mensaje']->url=base_url()."perfil/perfil_empresa/".$id_tmp;
			$datos['mensaje']->image=base_url()."uploads/logos/".$tmp->logo;
			break;		
	}
	if(!$datos['mensaje']->image)
	{
		$datos['mensaje']->image=base_url()."uploads/default.jpg";
	}
	
	$usuario = $this->usuarios->get($datos['mensaje']->destinatario);
	//$contacto = $this->contacto->get($datos['mensaje']->destinatario);
	if(!$usuario)
	{
		$remitente_tmp=$this->remitente->get($datos['mensaje']->destinatario);
		if($remitente_tmp)
		{
			$participante1->telefono = $remitente_tmp->telefono;
			$participante1->correo = $remitente_tmp->correo;
			$participante1->nombres = $remitente_tmp->nombres;
			$participante1->id_contacto = $remitente_tmp->id;
		}else
		{
			$participante1->telefono = FALSE;
			$participante1->correo = FALSE;
			$participante1->nombres = "Usuario no registrado";
			$participante1->id_contacto = 0;
		}
	}else
	{
		$participante1->id_contacto = $usuario->id;
		$participante1->nombres = $usuario->nombres;
		$participante1->correo = $usuario->email;
		$participante1->telefono =$usuario->telefono;
	}
	$participante2 = $this->remitente->get(array('id' => $datos['mensaje']->remitente ));
	$participante2->id_contacto = 0;//$participante2->id;
	$user = $this->usuarios->get(array('email' => $participante2->correo));
	if($user)
	{	$participante2->id_contacto =$user->id; }

	if($id_user!=$datos['mensaje']->destinatario)
	{
		$datos['mensaje']->ubicacion->direccion=$user->direccion; 
		$datos['mensaje']->ubicacion->ciudad =$this->municipio->get($user->ciudad)->municipio;
		$datos['mensaje']->ubicacion->departamento =$this->departamento->get($user->departamento)->nombre;
	
		$datos['mensaje']->destinatario = $participante1;
		$datos['mensaje']->remitente = $participante2;
	}else
	{
		$datos['mensaje']->ubicacion->direccion=$usuario->direccion; 
		$datos['mensaje']->ubicacion->ciudad =$this->municipio->get($usuario->ciudad)->municipio;
		$datos['mensaje']->ubicacion->departamento =$this->departamento->get($usuario->departamento)->nombre;
		
		$datos['mensaje']->remitente = $participante1;
		$datos['mensaje']->destinatario =$participante2;
		$this->mensajes->update(array('estado' => 1),$id);
	}
 
	$datos['usuario']->usuario=$this->session->userdata('usuario');
	$datos['id_usuario']=$this->session->userdata('id_usuario');
	$datos['empresa']=$this->empresa->get(array('usuario'=>$datos['id_usuario']));
	$this->load->view('template/head',array('titulo' => "Contactar --proveedor.com.co"), FALSE); 
	$this->load->view('template/javascript', FALSE, FALSE);  
	$this->load->view('tablero_usuario/header', $datos, FALSE);   
	$this->load->view('mensaje/mensaje', $datos);
	$this->load->view('template/footer_empy');
  }

  public function test_encrypt($number)
  {
  	$result =$this->crypter->encrypt($number);
  	echo '<br>'.$result.'<br>';
  	echo $this->crypter->decrypt($result);
  }
  private function usuario_noregistrado($id)
  {  	
  	$id=$this->crypter->decrypt($id);
	$datos['mensaje'] =$this->mensajes->get($id); 
	if(!$datos['mensaje'] ) 
	return; 
	
	$datos['mensaje']->url=FALSE;
	$datos['mensaje']->image=FALSE;
	$id_tmp=$datos['mensaje']->id_objeto;

	switch ($datos['mensaje']->tipo) 
	{case 1:
			$datos['mensaje']->nom_objeto=$this->productoJ->get($id_tmp)->nom_producto;
			$datos['mensaje']->url=base_url()."producto/ver/".$id_tmp;
			$datos['mensaje']->image=base_url()."uploads/".$this->productoJ->ver_ultima_imgproducto($id_tmp)->nombre_img;
			break;
		case 2:
			$datos['mensaje']->datos=0;
			$tmp=$this->oferta->get($id_tmp);
			$datos['mensaje']->nom_objeto=$tmp['nom_producto'];
			$datos['mensaje']->url=base_url()."oportunidad_comercial/ver/".$id_tmp;
			$datos['mensaje']->image=base_url()."uploads/".$this->oferta->ver_ultima_imgoferta($id_tmp)->nombre_img;
			break;
		case 3:
			$datos['mensaje']->datos=0;
			$tmp=$this->empresa->get_empresa($id_tmp);
			$datos['mensaje']->nom_objeto=$tmp['nombre'];
			$datos['mensaje']->url=base_url()."perfil/perfil_empresa/0/".$id_tmp;
			$datos['mensaje']->image=base_url()."uploads/".$tmp['logo'];
			break;		
	}
	if(!$datos['mensaje']->image)
	{
		$datos['mensaje']->image=base_url()."uploads/default.jpg";
	}
	
	$contacto = $this->contacto->get($datos['mensaje']->destinatario);
	if(!$contacto)
	{
		$participante1->telefono = FALSE;
		$participante1->correo = "contacto@proveedor.com.co";
		$participante1->nombres = "Usuario no registrado";
		$participante1->id_contacto = 0;
	}else
	{
		$participante1->id_contacto = $contacto->id_contacto;
		$participante1->nombres = $contacto->nombres;
		$participante1->correo = $this->usuario->get($contacto->id_user)->email;
		$participante1->telefono =$this->telefono->get($datos['mensaje']->destinatario);
	}
	$participante2 = $this->remitente->get(array('id' => $datos['mensaje']->remitente ));
	$participante2->id_contacto = 0;//$participante2->id;
	$user = $this->usuario->get(array('email' => $participante2->correo));
	if($user)
	{	$participante2->id_contacto = $this->contacto->get(array('id_user' => $user->id_usuario))->id_contacto; }

	if($id_contacto!=$datos['mensaje']->destinatario)
	{
		$datos['mensaje']->ubicacion = $this->contacto->get($datos['mensaje']->destinatario);
		if(is_numeric($datos['mensaje']->ubicacion->ciudad))
		{
			$tmp =$this->municipio->get($datos['mensaje']->ubicacion->ciudad);
			$datos['mensaje']->ubicacion->ciudad =$tmp['municipio'];
			$datos['mensaje']->ubicacion->departamento =$this->departamento->get($datos['mensaje']->ubicacion->departamento)->nombre;
		}
		$datos['mensaje']->destinatario = $participante1;
		$datos['mensaje']->remitente = $participante2;
	}else
	{
		$datos['mensaje']->ubicacion = $this->contacto->get($participante2->id_contacto);
		if(is_numeric($datos['mensaje']->ubicacion->ciudad))
		{
			$tmp =$this->municipio->get($datos['mensaje']->ubicacion->ciudad);
			$datos['mensaje']->ubicacion->ciudad =$tmp['municipio'];
			$datos['mensaje']->ubicacion->departamento =$this->departamento->get($datos['mensaje']->ubicacion->departamento)->nombre;
		}
		$datos['mensaje']->remitente = $participante1;
		$datos['mensaje']->destinatario =$participante2;
		$this->mensajes->update(array('estado' => 1),$id);
	}
	$datos['usuario']=$this->session->userdata('usuario');
	$datos['nit']=$this->session->userdata('empresa');
	$this->load->view('template/head',array('titulo' => "Contactar --proveedor.com.co"), FALSE); 
	$this->load->view('template/javascript', FALSE, FALSE);    
	$this->load->view('mensaje/usuario_noregistrado/mensaje', $datos);
  }

  
  public function eliminar()
  {
  	return;
    $mensajes_enviados =$this->input->post('enviados_seleccionados');
    $mensajes_recibidos =$this->input->post('recibidos_seleccionados');
    $key=0;
    if($mensajes_enviados)
    {
		foreach ($mensajes_enviados as $key => $value) 
		{
			if(!$this->veryficar_logged($value))
			{
				$this->session->set_flashdata('error_eliminando', $key.' Error eliminando correo!!');
				continue;
			}
			//$this->mensajes->update(array('estado'=>3),$value);
			$mensaje=$this->mensajes->get($value);
			$this->mensajes->update(array('remitente' =>-$mensaje->remitente), $value);
		}
	}
	if($mensajes_recibidos)
    {
		foreach ($mensajes_recibidos as $key => $value) 
		{
			if(!$this->veryficar_logged($value))
			{
				$this->session->set_flashdata('error_eliminando', $key.' Error eliminando correo!!');
				continue;
			}
			$this->mensajes->update(array('estado'=>3),$value);
			$mensaje=$this->mensajes->get($value);
			$this->mensajes->update(array('destinatario' =>-$mensaje->remitente), $value);
		}
	}

	$this->session->set_flashdata('correos_eliminados', $key.' Correos eliminados!!');
	redirect($_SERVER['HTTP_REFERER']);             
  }

  private function veryficar_logged($id_mensaje=FALSE)
  {

  	$nit = $this->session->userdata('empresa');
    	if($nit=="1059985632-7"||($nit=="90058523"||$nit=="102223263921"))
    	{	return TRUE;	}

	$id_usuario=$this->session->userdata('id_usuario');

	if($id_usuario=='')
	{ 
	  redirect('/logueo');
	  return FALSE;
	}    
	if(!$id_mensaje)
	{
		return TRUE;
	}
	$tmp_mensaje= $this->mensajes->get(array('id' =>$id_mensaje));
	if(!$tmp_mensaje)
	{   return FALSE;  }
	else
	{
		$remitente = $this->usuarios->get($id_usuario)->email;
		$remitente = $this->remitente->get(array('correo' => $remitente));
	
		if($id_usuario===$tmp_mensaje->destinatario||
			$remitente->id===$tmp_mensaje->remitente)
		{ return TRUE;  }
	}
  }


  public function lanzar_popup($tipo)
  {
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
			$datos['telefono'] =" ".$tmp->indicativo."-".$tmp->telefono."-".$tmp->extension."- CEL.: ".$tmp->celular;
			$datos['abilitado'] = "readonly";
		}
    	else	
    	{	$this->load->view('popups/opciones_popup', $datos);	}  
    	
    	$this->load->view('popups/mensaje', $datos);	
  }

  private function obtener_datos($tipo)
  {	
		$datos['remitente']['nombres'] = $this->input->post('remitente');		
		$datos['remitente']['correo'] = $this->input->post('email');
		$datos['remitente']['telefono'] = $this->input->post('telefono');

		$datos['mensaje']['mensaje'] = $this->input->post('mensaje');
		$tipo = $this->input->post('tipo');
		$id_objeto = $this->input->post('id_objeto');		
		$datos['mensaje']['id_objeto'] = $id_objeto;		
		$datos['plantilla']['nombre_contacto'] =$datos['remitente']['nombres'];
		if(!$id_objeto)	
		{
			$tipo=0;
		}
		switch ($tipo)
		 {
			case '1': //desde pagina de producto
				$producto=$this->producto->get($id_objeto);
				$empresa=$this->empresa->get($producto->empresa);
				$usuario=$this->usuarios->get($empresa->usuario);
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Alguien esta interesado en su producto!";
			 	$datos['mensaje']['destinatario']= $usuario->id;
			 	$datos['detinatario_email']=$usuario->email;
			 	$datos['plantilla']['nombre_ususario'] = $usuario->nombres;
			 	$datos['plantilla']['nombre_empresa'] =$empresa->nombre;				
				$datos['plantilla']['asunto'] = "!Una empresa se ha interesado en su producto!";
				$datos['plantilla']['url'] =  base_url()."producto/ver/".$id_objeto;
				$datos['plantilla']['imagen'] = $producto->imagenes;
				$datos['plantilla']['nombre_producto'] = $producto->nombre;
				break;
			case '2': //desde pagina de solicitud
				$solicitud=$this->solicitud->get($id_objeto);
				$empresa=$this->empresa->get($solicitud->empresa);
				$usuario=$this->usuarios->get($empresa->usuario);
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Ha recibido una cotización!";
			 	$datos['mensaje']['destinatario']= $usuario->id;
			 	$datos['detinatario_email']=$usuario->email;
			 	$datos['plantilla']['nombre_ususario'] = $usuario->nombres;
				$datos['plantilla']['nombre_empresa'] =$empresa->nombre;
				$datos['plantilla']['asunto'] = "!Ha recibido una cotización para el producto que solicitó!";
				$datos['plantilla']['url'] =  base_url()."oportunidad_comercial/ver/".$id_objeto;
				$datos['plantilla']['imagen'] = $solicitud->imagenes;
				$datos['plantilla']['nombre_producto'] = $solicitud->nombre;
				break;
			case '3': //desde pefil de empresa
				$empresa= $this->empresa->get($id_objeto);
				$usuario= $this->usuarios->get($empresa->usuario);
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Tiene un mensaje para su empresa! ";
				$datos['mensaje']['destinatario']= $usuario->id;
			 	$datos['detinatario_email']=$usuario->email;
			 	$datos['plantilla']['nombre_ususario'] = $usuario->nombres;
			 	$datos['plantilla']['nombre_empresa'] =$empresa->nombre;				
				$datos['plantilla']['asunto'] = "!Ha recibido un mensaje para su empresa!";
				$datos['plantilla']['url'] =  base_url()."perfil/perfil_empresa/".$id_objeto;
				$datos['plantilla']['imagen'] = "logos/".$empresa->logo;
				$datos['plantilla']['nombre_producto'] = $empresa->nombre;
				break;
			/*
			default: //mensaje standar entre ususarios
				$tipo=0;
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
  public function enviar($tipo=1)
	{
		$datos=$this->obtener_datos($tipo);

		#echo "<PRE>";
		#print_r($datos);
		#echo "<PRE>";
		#return ;

		if($datos['plantilla']['nombre_empresa'])
			{$datos['plantilla']['nombre_empresa']="";}

	  	$remitente =$this->remitente->get(array('correo' =>$datos['remitente']['correo']));
		if($remitente)
		{ 
			$datos['mensaje']['remitente'] = $remitente->id;
			$this->remitente->update($datos['remitente'],$remitente->id);
		}
		else {$datos['mensaje']['remitente'] = $this->remitente->insert($datos['remitente']);}
		
		$datos['mensaje']['adjunto'] = $this->load_file();
		$id_mensaje=$this->mensajes->insert($datos['mensaje']);
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