<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mensajes extends CI_Controller {
	// Constructor de la clase del control
	function __construct(){
		parent::__construct();
		$this->load->model('new/Mensajes_model','mensajes');
		$this->load->model('new/Remitente_model','remitente');
		$this->load->model('new/Usuarios_model','usuarios');
		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Categoria_model','categoria');
		$this->load->model('new/Producto_model','producto');
		$this->load->model('new/Solicitud_model','solicitud');
		$this->load->model('new/Departamento_model','departamento');
		$this->load->model('new/Municipio_model','municipio');
		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
		$this->load->model('crypter_model','crypter');
		$this->load->library('session');
		$this->load->library('grocery_CRUD');

	    /*
	    */
	    $id=$this->session->userdata('id_usuario');
	    if($id=='')
	      {redirect(base_url(),'refresh');}
	    $this->datos['usuario']=$this->usuarios->get($id);
	    $this->datos['empresa']=$this->empresa->get(array('usuario'=>$id));
	}

 
  public function descargar_adjunto($id_mensaje=0)
  {   	
  	$this->session->set_userdata('path_current',base_url()."mensajes/descargar_adjunto/".$id_mensaje);
  	
  	 if(!is_numeric($id_mensaje))
  	 {
  		$id_mensaje=$this->crypter->decrypt($id_mensaje);
	 }elseif(!$this->veryficar_logged($id_mensaje))
	 { 
	   show_404();
	   return;
	 }

	 $mensaje =$this->mensajes->get($id_mensaje); 
	 $this->load->helper('download');  

	 $data = file_get_contents('uploads/adjunto/'.$mensaje->adjunto);
     force_download($mensaje->adjunto,$data); 
  }

	public function test()
	{
			#$this->verifyc_login();
			$crud = new grocery_CRUD();

			#$crud->set_theme('datatables');
			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('mensajes');
			$crud->set_relation('destinatario','usuarios','email');
			$crud->set_relation('remitente','remitente','correo');
			#$crud->set_relation('tipo_registro','tipo_registro','nombre');
			#$crud->set_relation('membresia','membresia','nombre');
			$crud->display_as('id_objeto','Objeto');
			$crud->set_subject('Mensajes');

			#$crud->required_fields('nombre');
			#$crud->required_fields('usuario');

			//Campos a editar o agregar
			#$crud->fields('id', 'nombre', 'membresia' ,  'tipo_registro' ,'tipo', 'legalizacion', 'decripcion', 'productos_principales', 'special_features');
			//Columnas a mostrar
			$crud->columns('remitente', 'asunto', 'mensaje' ,  'fecha' );
			//Eliminar columnas			
			#$crud->unset_columns('nit');
			//Desactivar agregar
			$crud->unset_add();
			//Desactivar todas las operacones
			#$crud->unset_operations();
			//Desactivar editar
			$crud->unset_edit();
			//Desacrtivar imprimir
			$crud->unset_print();
			//Desacrtivar Leer
			$crud->unset_read();
			//Desacrtivar exportar
			$crud->unset_export();
			//Desctivar eliminiar
			#$crud->unset_delete();

			#$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$output->listado="Enviados";

		    $this->load->view('template/head',array('titulo'=>"Mensajes"));
		    $this->load->view('template/javascript');
    		$this->load->view('config_OroPlatino/top_menu_config',$this->datos);
			$this->load->view('mensaje/listado.php',$output);
			#echo "<div style='height:20px;'>Menu</div><div>";
			#echo $output['output'];
			#echo "</div>";
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
  	 /*
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
		case '1':
			$objeto = $this->producto->get($id_tmp);
			$datos['mensaje']->url=base_url()."producto/ver/".$objeto->id;
			$datos['mensaje']->nom_objeto=$objeto->nombre;
			$image= explode(',', $objeto->imagenes);
			if($image[0]!="")
			{$datos['mensaje']->image=base_url()."uploads/".$image[0];}
			elseif($image[1]!=""){$datos['mensaje']->image=base_url()."uploads/".$image[1];}
			else{$datos['mensaje']->image=base_url()."uploads/default.jpg";}
			
			break;
		case '2':
			$datos['mensaje']->datos=0;
			$objeto=$this->solicitud->get($id_tmp);
			$datos['mensaje']->nom_objeto=$objeto->nombre;
			$datos['mensaje']->url=base_url()."oportunidad_comercial/ver/".$objeto->id;
			$image= explode(',', $objeto->imagenes);
			if($image[0]!="")
			{$datos['mensaje']->image=base_url()."uploads/".$image[0];}
			elseif($image[1]!=""){$datos['mensaje']->image=base_url()."uploads/".$image[1];}
			else{$datos['mensaje']->image=base_url()."uploads/default.jpg";}
			break;
		case '3':
			$datos['mensaje']->datos=0;
			$objeto=$this->empresa->get($id_tmp);
			$datos['mensaje']->nom_objeto=$objeto->nombre;
			$datos['mensaje']->url=base_url()."perfil/perfil_empresa/".$objeto->id;
			if(!$objeto->logo){$objeto->logo="default.png";}
			$datos['mensaje']->image=base_url()."uploads/logos/".$objeto->logo;
			break;	
		default:
			$datos['mensaje']->datos=0;
			$objeto=$this->asistentes_proveedor->get($id_tmp);
			$datos['mensaje']->nom_objeto=$objeto->nombre;
			$datos['mensaje']->url=base_url()."oportunidad_comercial/ver/".$objeto->publicada;
			$datos['mensaje']->image=base_url()."uploads/default.jpg";
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
		$participante1->telefono = $usuario->telefono;
	}
	$participante2 = $this->remitente->get(array('id' => $datos['mensaje']->remitente ));
	$participante2->id_contacto = 0;//$participante2->id;
	$user = $this->usuarios->get(array('email' => $participante2->correo));
	if($user)
	{	$participante2->id_contacto =$user->id; }
	else{	$participante2->id_contacto =$participante2->id; }

	if($id_user!=$datos['mensaje']->destinatario)
	{
		$datos['mensaje']->ubicacion->direccion=$usuario->direccion; 
		$datos['mensaje']->ubicacion->ciudad =$this->municipio->get($usuario->ciudad)->municipio;
		$datos['mensaje']->ubicacion->departamento =$this->departamento->get($usuario->departamento)->nombre;
	
		$datos['mensaje']->destinatario = $participante1;
		$datos['mensaje']->remitente = $participante2;
	}else
	{
		$datos['mensaje']->ubicacion->direccion=$user->direccion; 
		$datos['mensaje']->ubicacion->ciudad =$this->municipio->get($user->ciudad)->municipio;
		$datos['mensaje']->ubicacion->departamento =$this->departamento->get($user->departamento)->nombre;
		
		$datos['mensaje']->remitente = $participante1;
		$datos['mensaje']->destinatario =$participante2;
		$this->mensajes->update(array('estado' => 1),$id);
	}

	#echo "<PRE>";
	#print_r($datos);
	#echo "</PRE>";
	#return;
 
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
	{
		case 1:
			$datos['mensaje']->datos=0;
			$objeto = $this->producto->get($id_tmp);
			$datos['mensaje']->url=base_url()."producto/ver/".$objeto->id;
			$datos['mensaje']->nom_objeto=$objeto->nombre;
			$image= explode(',', $objeto->imagenes);
			$datos['mensaje']->image=base_url()."uploads/".$image[0];
			break;
		case 2:
			$datos['mensaje']->datos=0;
			$objeto=$this->solicitud->get($id_tmp);
			$datos['mensaje']->nom_objeto=$objeto->nombre;
			$datos['mensaje']->url=base_url()."oportunidad_comercial/ver/".$objeto->id;
			$image= explode(',', $objeto->imagenes);
			$datos['mensaje']->image=base_url()."uploads/".$image[0];
			break;
		case 3:
			$datos['mensaje']->datos=0;
			$objeto=$this->empresa->get($id_tmp);
			$datos['mensaje']->nom_objeto=$objeto->nombre;
			$datos['mensaje']->url=base_url()."perfil/perfil_empresa/".$objeto->id;
			$datos['mensaje']->image=base_url()."uploads/logos/".$objeto->logo;
			break;
		default:
			$datos['mensaje']->datos=0;
			$objeto=$this->asistentes_proveedor->get($id_tmp);
			$datos['mensaje']->nom_objeto=$objeto->nombre;
			$datos['mensaje']->url=base_url()."oportunidad_comercial/ver/".$objeto->publicada;
			$datos['mensaje']->image=base_url()."uploads/default.jpg";
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
	else{	$participante2->id_contacto =$participante2->id; }

	if($id_user!=$datos['mensaje']->destinatario)
	{
		$datos['mensaje']->ubicacion->direccion=$user->direccion; 
		$datos['mensaje']->ubicacion->ciudad =$this->municipio->get($user->ciudad)->municipio;
		$datos['mensaje']->ubicacion->departamento =$this->departamento->get($user->departamento)->nombre;
	
		$datos['mensaje']->destinatario = $participante2;
		$datos['mensaje']->remitente = $participante1;
	}else
	{
		$datos['mensaje']->ubicacion->direccion=$usuario->direccion; 
		$datos['mensaje']->ubicacion->ciudad =$this->municipio->get($usuario->ciudad)->municipio;
		$datos['mensaje']->ubicacion->departamento =$this->departamento->get($usuario->departamento)->nombre;
		
		$datos['mensaje']->remitente = $participante2;
		$datos['mensaje']->destinatario =$participante1;
		$this->mensajes->update(array('estado' => 1),$id);
	}

	#echo "<PRE>";
	#print_r($datos);
	#echo "</PRE>";
	#return;
	$datos['usuario']=$this->session->userdata('usuario');
	$datos['nit']=$this->session->userdata('empresa');
    $this->load->view('template/head', array('titulo'=>"Mensajes --proveedor.com.co"));

    $this->load->view('template/javascript');
    $this->load->view('index/top_menu',$datos);        
    $data['url_publicar_producto']=base_url()."publicar_producto";
    $data['url_publicar_solicitud']=base_url()."publicar_oferta";

    $data['categorias']=$this->categoria->get_all();
    $this->load->view('index/header_buscador',$data);
	$this->load->view('index/banner_adsense');
    $datos['datos']->titulos=$titulos;
    $this->load->view('template/javascript', FALSE); 
 
    
	$this->load->view('mensaje/usuario_noregistrado/mensaje', $datos);
    $this->load->view("template/footer");
  }

  
  public function eliminar()
  {
  	#return;
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
	redirect($_SERVER['HTTP_REFERER'],'refresh'); 
  }

  private function veryficar_logged($id_mensaje=FALSE)
  {

  	$nit = $this->session->userdata('empresa');
    	if($nit=="1059985632-7"||($nit=="90058523"||$nit=="102223263921"))
    	{	return TRUE;	}

	$id_usuario=$this->session->userdata('id_usuario');

	if($id_usuario=='')
	{ 
	  redirect('/logueo','refresh');
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
		$datos['mensaje']['tipo'] = $this->input->post('tipo');
		switch ($tipo)
		 {
			case '1': //desde pagina de producto
				$producto=$this->producto->get($id_objeto);
				$empresa=$this->empresa->get($producto->empresa);
				$usuario=$this->usuarios->get($empresa->usuario);
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Alguien esta interesado en su producto!";
			 	$datos['mensaje']['destinatario']= $usuario->id;
			 	$datos['detinatario_email']=$usuario->email;
			 	$datos['plantilla']['nombre_usuario'] = "Sr(a) ".$usuario->nombres;
			 	$datos['plantilla']['nombre_empresa'] = " - ".$empresa->nombre;				
				$datos['plantilla']['asunto'] = "!Una empresa se ha interesado en su producto!";
				$datos['plantilla']['url'] =  base_url()."producto/ver/".$id_objeto;
				$imagenes=explode(',',$producto->imagenes);
				if($imagenes[0]!="")
				{	$datos['plantilla']['imagen'] = $imagenes[0];	}
				elseif($imagenes[1]!=""){	$datos['plantilla']['imagen'] = $imagenes[1];	}
				else{	$datos['plantilla']['imagen'] = "default.jpg";	}
				$datos['plantilla']['nombre_producto'] = $producto->nombre;
				break;
			case '2': //desde pagina de solicitud
				$solicitud=$this->solicitud->get($id_objeto);
				$empresa=$this->empresa->get($solicitud->empresa);
				$usuario=$this->usuarios->get($empresa->usuario);
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Ha recibido una cotización!";
			 	$datos['mensaje']['destinatario']= $usuario->id;
			 	$datos['detinatario_email']=$usuario->email;
			 	$datos['plantilla']['nombre_usuario'] = "Sr(a) ".$usuario->nombres;
				$datos['plantilla']['nombre_empresa'] =" - ".$empresa->nombre;
				$datos['plantilla']['asunto'] = "!Ha recibido una cotización!";
				$datos['plantilla']['url'] =  base_url()."oportunidad_comercial/ver/".$id_objeto;
				$imagenes=explode(',',$producto->imagenes);
				if($imagenes[0]!="")
				{	$datos['plantilla']['imagen'] = $imagenes[0];	}
				elseif($imagenes[1]!=""){	$datos['plantilla']['imagen'] = $imagenes[1];	}
				else{	$datos['plantilla']['imagen'] = "default.jpg";	}
				$datos['plantilla']['nombre_producto'] = $solicitud->nombre;
				break;
			case '3': //desde pefil de empresa
				$empresa= $this->empresa->get($id_objeto);
				$usuario= $this->usuarios->get($empresa->usuario);
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Tiene una mensaje para su empresa! ";
				$datos['mensaje']['destinatario']= $usuario->id;
			 	$datos['detinatario_email']=$usuario->email;
			 	$datos['plantilla']['nombre_usuario'] = "Sr(a) ".$usuario->nombres;
			 	$datos['plantilla']['nombre_empresa'] =" - ".$empresa->nombre;				
				$datos['plantilla']['asunto'] = "!Ha recibido un mensaje para su empresa!";
				$datos['plantilla']['url'] =  base_url()."perfil/perfil_empresa/".$id_objeto;
				if($empresa->logo==""&&$empresa->logo=="0"){$empresa->logo="default.png";}
				$datos['plantilla']['imagen'] = "logos/".$empresa->logo;
				$datos['plantilla']['nombre_producto'] = $empresa->nombre;
				break;
			case '4': //desde pagina de panel de oportunidades comerciales
				$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Ha recibido una cotización!";
				$oportunidad=$solicitudes=$this->asistentes_proveedor->get($id_objeto);
			 	$datos['mensaje']['destinatario']= 0;
			 	$datos['detinatario_email']=$oportunidad->email;
			 	$datos['plantilla']['nombre_ususario'] = "Sr(a) ".$oportunidad->nombres;
				$datos['plantilla']['nombre_empresa'] =" - ".$oportunidad->nombre_empresa;
				$datos['plantilla']['asunto'] = "!Ha recibido respuesta a su cotización!";
				$datos['plantilla']['url'] =  base_url()."oportunidad_comercial/ver_/".$oportunidad->publicada;
				$datos['plantilla']['imagen'] = "default.jpg";
				$datos['plantilla']['nombre_producto'] = $oportunidad->solicitud;
				break;
			case '5': //desde pagina de panel de oportunidades comerciales, envio multiple
				$datos['mensaje']['asunto'] = "Proveedor.com.co - ¡Ha recibido una cotización!";
				$datos['plantilla']['asunto'] = "!Ha recibido respuesta a su cotización!";
				$datos['plantilla']['imagen'] = "default.jpg";
				foreach (explode(',',$id_objeto) as $key => $value)
				{					
					$oportunidad=$solicitudes=$this->asistentes_proveedor->get($value);
				 	$datos['mensaje']['destinatario'][]= 0;
				 	$datos['detinatario_email'][]=$oportunidad->email;
				 	if($oportunidad->nombres!="0")
				 	{ $datos['plantilla']['nombre_ususario'][] = "Sr(a) ".$oportunidad->nombres; }
				 	else{ $datos['plantilla']['nombre_ususario'][] = " ";}
					if($oportunidad->nombre_empresa!="0")
					{ $datos['plantilla']['nombre_empresa'][] = " - ".$oportunidad->nombre_empresa; }
					else{	$datos['plantilla']['nombre_empresa'][] =" ";	}
					$datos['plantilla']['url'][] =  base_url()."oportunidad_comercial/ver/".$oportunidad->publicada;
					$datos['plantilla']['nombre_producto'][] = $oportunidad->solicitud;
				}
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
				$datos['plantilla']['nombre_empresa']="-Proveedor";
			 	$datos['plantilla']['nombre_usuario']="Sr(a) ".$datos['remitente']['nombres'];
			 	#$datos['plantilla']['nombre_ususario'] = $this->input->post('nombres_destinatario');	
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

  private function enviar_multiple($datos)
	{
	  	$remitente =$this->remitente->get(array('correo' =>$datos['remitente']['correo']));
		if($remitente)
		{ 
			$datos['mensaje']['remitente'] = $remitente->id;
			$this->remitente->update($datos['remitente'],$remitente->id);
		}
		else {$datos['mensaje']['remitente'] = $this->remitente->insert($datos['remitente']);}
		
		$destinatarios=$datos['mensaje']['destinatario'];
		$email=$datos['detinatario_email'];
		$nombres=$datos['plantilla']['nombre_ususario'];
		$nombre_empresa=$datos['plantilla']['nombre_empresa'];
		$nombre_producto=$datos['plantilla']['nombre_producto'];
		$url=$datos['plantilla']['url'];

		$adjunto_msj = $this->load_file();
					
		#echo "<PRE>";
		for($i=1;$i<count($destinatarios);$i++)
		{
			
			$datos['plantilla']['url']=$url[$i];
			$datos['detinatario_email']=$email[$i];			
			$datos['plantilla']['nombre_ususario']=$nombres[$i];			
			$datos['mensaje']['destinatario']=$destinatarios[$i];
			$datos['plantilla']['nombre_empresa']=$nombre_empresa[$i];			
			$datos['plantilla']['nombre_producto']=$nombre_producto[$i];

			$destinatario =$this->remitente->get(array('correo' =>$datos['detinatario_email']));
			if($destinatario)
			{ 
				$datos['mensaje']['destinatario'] = $destinatario->id;
			}
			else 
			{
				$detinatario_tmp['correo']=$datos['detinatario_email'];
				$detinatario_tmp['nombres']=$datos['nombre_ususario'];
				$detinatario_tmp['telefono']="ninguno -Correo: ".$datos['detinatario_email'];
				$datos['mensaje']['remitente'] = $this->remitente->insert($datos['remitente']);
			}
		

			$datos['mensaje']['adjunto'] = $adjunto_msj;
			$datos['plantilla']['adjunto'] = FALSE;
			if($datos['mensaje']['adjunto'])
			{	$datos['plantilla']['adjunto'] =TRUE;	}
			$id_mensaje=$this->mensajes->insert($datos['mensaje']);

		  	$usrtmp= $this->usuarios->get(array("email"=>$datos['detinatario_email']));
		  	if(!$usrtmp)		
			{	$id_mensaje=$this->crypter->encrypt($id_mensaje);	}
			$datos['plantilla']['url_mensaje'] = base_url()."mensajes/leer/".$id_mensaje;
			$datos['datos_a_enviar']=$this->load->view('popups/plantilla_mensaje', $datos['plantilla'],TRUE);
	  		
	  		#echo  @$datos['datos_a_enviar'];
	  		#return;
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

			$this->email->send();
		}

		#print_r($datos);
		#echo "</PRE>";
		#return;
		$this->session->set_flashdata('mensaje_enviado', "DONE"); // comenta esta linea para funcionamiento en el servidor
				
		redirect($_SERVER['HTTP_REFERER'],'refresh');//comenta esta linea, para pruebas locales, el msj no se enviará		
	} 
  public function enviar($tipo=1)
	{
		$datos=$this->obtener_datos($tipo);
		if(is_null($datos['mensaje']['destinatario']))
		{
			$datos['mensaje']['destinatario']=32890;
			$datos['detinatario_email']=$this->usuarios->get(32890)->email;
		}

		if($tipo==5)
		{
			$this->enviar_multiple($datos);
			return;
		}
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
				
		redirect($_SERVER['HTTP_REFERER'],'refresh');//comenta esta linea, para pruebas locales, el msj no se enviará		
	} 
}