<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Micro_admin extends CI_Controller
 {
	function __construct() 
	{
		parent::__construct();
		$this->load->model('new/Producto_model', 'producto');
		$this->load->model('new/Solicitud_model', 'solicitud');
		$this->load->model('new/Usuarios_model', 'usuarios');
		$this->load->model('new/Empresa_model', 'empresa');
		$this->load->model('new/Mensajes_model','mensaje');
		$this->load->model('new/Remitente_model', "remitente");
		$this->load->model('new/Departamento_model','departamento'); 
		$this->load->model('new/Municipio_model','municipio'); 
		$this->load->model('new/Categoria_model','categoria'); 
		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
		$this->load->model('crypter_model','crypter');
		$this->load->library(array('session', 'email','form_validation'));
	}


	
    private function verifyc_login()
    {
    	$usuario =$this->usuarios->get($this->session->userdata('id_usuario'));
    	if($usuario->permisos==1)
    	{	return TRUE;	}

    	redirect(base_url());
    } 
    
    public function index()
    {
    	$this->inicio();
    } 
    public function cambiar_membresia($id_empresa,$id_membresia=1)
    {    	
    	$this->verifyc_login();
		$nueva['membresia']= $id_membresia;
		$result=$this->empresa->update($nueva,$id_empresa);
		if($result>=1)
			{	echo "Exito!";	}
		else
			{	echo "Error!";	}
    }
#en desarrollo
    private function de_la_fecha($dato=FALSE,$fecha=FALSE,$coteja=FALSE,$head='fecha_publicacion') 
    {  	
    	$anno = substr($fecha,0,4);
    	$mes = substr($fecha,0,7);
    	$dia = substr($fecha,0,9);
    	$semana =intval($dia);

    	if(!is_array($dato))
    	{
			if($coteja=="a"&&$anno==substr($dato->$head,0,4))
			{	return 1;	}
			elseif($coteja=="m"&&$mes==substr($dato->$head,0,7))
			{	return 1;	}
			elseif($coteja=="d"&&$dia==substr($dato->$head,0,9))
			{	return 1;	}
			elseif($coteja=="s"&&$dia==substr($dato->$head,0,9))
			{	return 1;	}
			else {return 0;}
		}else
		{			
			if($coteja=="a"&&$anno==substr($dato->$head,0,4))
			{	return 1;	}
			elseif($coteja=="m"&&$mes==substr($dato->$head,0,7))
			{	return 1;	}
			elseif($coteja=="d"&&$dia==substr($dato->$head,0,9))
			{	return 1;	}
			else {return 0;}
		}
    }
    private function count_por_fecha($datos=FALSE,$fecha=FALSE,$coteja=FALSE,$head='fecha_publicacion')
    {
    	$out=0;
    	foreach ($datos as $value) 
    	{
    		$out+=$this->de_la_fecha($value,$fecha,$coteja,$head);
    	}
    	return $out;
    }
	public function inicio()
    {
    	$this->verifyc_login();
		$mensajes=$this->mensajes(TRUE);
		$empresas=$this->empresas(TRUE);
		$productos=$this->productos(TRUE);
		$solicitudes_internas=$this->solicitudes_internas(TRUE);
		$solicitudes_externas=$this->solicitudes_externas(FALSE,TRUE);
		$fecha="".date("Y m d");
		$fecha = str_replace(" ", "-",$fecha);

    	$datos['datos']['Mensajes']->total_registros=count($mensajes);
    	$datos['datos']['Mensajes']->total_dia=$this->count_por_fecha($mensajes,$fecha,'d','fecha');
    	$datos['datos']['Mensajes']->total_semana=0;
    	$datos['datos']['Mensajes']->total_mes=$this->count_por_fecha($mensajes,$fecha,'m','fecha');

    	$datos['datos']['Solictudes Externas']->total_registros=count($solicitudes_externas);
    	$datos['datos']['Solictudes Externas']->total_dia=$this->count_por_fecha($solicitudes_externas,$fecha,'d','fecha');
    	$datos['datos']['Solictudes Externas']->total_semana=0;
    	$datos['datos']['Solictudes Externas']->total_mes=$this->count_por_fecha($solicitudes_externas,$fecha,'m','fecha');

    	$datos['datos']['Solictudes Internas']->total_registros=count($solicitudes_internas);
    	$datos['datos']['Solictudes Internas']->total_dia=$this->count_por_fecha($solicitudes_internas,$fecha,'d');
    	$datos['datos']['Solictudes Internas']->total_semana=0;
    	$datos['datos']['Solictudes Internas']->total_mes=$this->count_por_fecha($solicitudes_internas,$fecha,'m');

    	$datos['datos']['Productos']->total_registros=count($productos);
    	$datos['datos']['Productos']->total_dia=$this->count_por_fecha($productos,$fecha,'d');;
    	$datos['datos']['Productos']->total_semana=0;
    	$datos['datos']['Productos']->total_mes=$this->count_por_fecha($productos,$fecha,'m');;

    	$datos['datos']['Empresas']->total_registros=count($empresas);
    	$datos['datos']['Empresas']->total_dia=$this->count_por_fecha($empresas,$fecha,'d','fecha');
    	$datos['datos']['Empresas']->total_semana=0;
    	$datos['datos']['Empresas']->total_mes=$this->count_por_fecha($empresas,$fecha,'m','fecha');

    	$datos['titulo']="Administrador";
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$datos['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
		$this->load->view('template/head', $datos);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('template/javascript', FALSE);
	    $this->load->view('micro_admin/buscador', FALSE);
	    $this->load->view('micro_admin/inicio', $datos);
	    $this->load->view('micro_admin/funcionalidades', $datos); 
    }

    public function busqueda($tipo=NULL, $dato="")
    {
    	switch($tipo)
    	{
    		case 'Validar':
    			$tipo_validado = $this->input->post('selec1');
    			$dato_validado = $this->input->post('busqueda');
    			$this->busqueda($tipo_validado,$dato_validado);
    			break;
    		case 'Empresas':
    			$this->empresas(FALSE,$dato);
    			break;
    		case 'Productos':
    			$this->productos(FALSE,$dato);
    			break;
    		case 'Solicitud_internas':
    			$this->solicitudes_internas(FALSE,$dato);
    			break;
    		case 'Solicitud_externas':
    			break;
    		case 'Mensajes':
    			break;
    		default:	
		   		$this->load->view('micro_admin/buscador', FALSE);

    	}
    }
    public function empresas($var=FALSE,$criterio="")
    {
		$proveedores=$this->empresa->buscar($criterio);
	
    	$this->verifyc_login();

    	$proveedores = clear_array($proveedores);
		$datos['page_count'] = count($proveedores)/25;
		$datos['page']=($this->input->post('page')-1);
		//$proveedores= array_reverse($proveedores);
		foreach ($proveedores as $key => $proveedor)
		{
			if(!$var)
			{
			 	if($key<($datos['page']*25))
				{  continue; }
				if(($datos['page']>0))
				{
					if($key>=($datos['page']*50))	
				  	{break;}
				}	
				else
				{
					if($key>=25)	
					{break;}
				}
			}
		 	if(!$proveedor)
		 	{	continue;	}
			$out['empresa']=$this->empresa->get($proveedor->id);
			$out['usuario']=$this->usuarios->get($out['empresa']->usuario);
			if($var){$datos['proveedores'][]=$out['empresa'];}
			else{	$datos['proveedores'][]=$out;	}
			unset($proveedor);
		 }

		if($var)
		{	return $datos['proveedores'];	}

    	$datos['titulo']="Proveedor Administrador- empresas";
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$datos['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
		$this->load->view('template/head', $datos);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('micro_admin/buscador', FALSE);
		$this->load->view('template/javascript', FALSE);
	    $this->load->view('micro_admin/buscador', FALSE);
	    $this->load->view('micro_admin/empresas', $datos);
	    $this->load->view('micro_admin/funcionalidades', $datos); 
    }
    public function productos($var=FALSE,$criterio="")
    {
		$productos=$this->producto->buscar($criterio);
	
    	$this->verifyc_login();

		$productos = clear_array($productos);
		$datos['page_count'] = count($productos)/25;
		$datos['page']=($this->input->post('page')-1); 
		foreach ($productos as $key => $producto)
		 {		 	
			if(!$var)
			{
			 	if($key<($datos['page']*25))
				{  continue; }
				if(($datos['page']>0))
				{
					if($key>=($datos['page']*50))	
				  	{break;}
				}	
				else
				{
					if($key>=25)	
					{break;}
				}
			}
			$producto=$this->producto->get($producto->id);
			if(!$producto){ continue;	}
			$datos['productos'][]=$producto;
			unset($producto);
		}	
		if($var)
		{	return $datos['productos'];	}

    	$datos['titulo']="Proveedor Administrador- productos";
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$datos['usuario']->usuario=$this->session->userdata('usuario');
		$this->load->view('template/head', $datos);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('micro_admin/buscador', FALSE);
		$this->load->view('template/javascript', FALSE);
	    $this->load->view('micro_admin/productos', $datos);   
	    $this->load->view('micro_admin/funcionalidades', $datos); 
    }
    public function solicitudes_internas($var=FALSE,$criterio="")
    {    	
		$solicitudes=$this->solicitud->buscar($criterio);
		$solicitudes = clear_array($solicitudes); 

    	$this->verifyc_login();
		$datos['page_count'] = count($solicitudes)/25;
		$datos['page']=($this->input->post('page')-1);
		foreach ($solicitudes as $key => $solicitud)
		{
			if(!$var)
			{
			 	if($key<($datos['page']*25))
				{  continue; }
				if(($datos['page']>0))
				{
					if($key>=($datos['page']*50))	
				  	{break;}
				}	
				else
				{
					if($key>=25)	
					{break;}
				}
			}
			$solicitud=$this->solicitud->get($solicitud->id);
			$datos['solicitudes'][]=$solicitud;
			unset($solicitud);
		}
		if($var)
		{	return $datos['solicitudes'];	}

    	$datos['titulo']="Proveedor Administrador- Solicitudes internas";
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['usuario']->usuario=$this->session->userdata('usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$this->load->view('template/head', $datos);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('micro_admin/buscador', FALSE);
		$this->load->view('template/javascript', FALSE);
	    $this->load->view('micro_admin/solicitudes_internas', $datos);   
	    $this->load->view('micro_admin/funcionalidades', $datos); 
    }
    public function solicitudes_externas($oferta_publicada=FALSE,$var=FALSE)
    {
		$solicitudes=$this->asistentes_proveedor->get_all();
		if($var)
		{	return $solicitudes;	}
	
    	$this->verifyc_login();
		$dotos['page_count'] = count($solicitudes)/25;
		$datos['page']=($this->input->post('page')-1);			    	
		foreach ($solicitudes as $key => $solicitud)
		{
			/*
			if($key<($datos['page']*25))
			{  continue; }
	  		if($datos['page']>0)
			{
				if($key>=($datos['page']*50))	
				{break;}
			}	
			else
			{
				if($key>=25)	
				 {break;}
			}
			*/
			$solicitud->categoria=$this->categoria->get($solicitud->categoria)->nombre_categoria;
		
			$datos['datos'][]=$solicitud;
		}

    	$datos['titulo']="Proveedor Administrador- Solicitudes externas";
		$id_usuario=$this->session->userdata('id_usuario');
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['usuario']->usuario=$this->session->userdata('usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$this->load->view('template/head', $datos);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('micro_admin/buscador', FALSE);
		$this->load->view('template/javascript', FALSE);
	    $this->load->view('micro_admin/solicitudes_externas', $datos);  
	    $this->load->view('micro_admin/funcionalidades', $datos); 
	    if($oferta_publicada)
	    {	    	
			$data['launcher'] = FALSE;
			$data['view'] = 'confirmar_solicitud';		
			$data['id_popup'] = 'confirmar_solicitud';			
		   	$this->load->view('popups/auto_launch', $data);
	    } 
	    return;
    }
    #En desarrollo
    public function enviar_a_platino($id_solictud)
    {    	
    	$this->verifyc_login();

		$solicitud=$this->asistentes_proveedor->get($id_solictud);

		$empresas_platino=$this->empresa->get_all(array('membresia'=>3));
		$destinatarios=NULL;
		foreach ($empresas_platino as $key => $value) 
		{
			$empresa=$this->empresa->get(array('id'=>$value->id,'categorias'=>$solicitud->categoria));
			if($empresa)
				{
					$empresa_tmp=$this->empresa->get($value->id_empresa);
					$contacto_tmp=$this->contacto->get($empresa_tmp->id_contacto);
					$usuario_tmp=$this->usuario->get($contacto_tmp->id_user);
					$destinatarios[]=$usuario_tmp->email;
				}
			$empresa=NULL;
		}

		/* para pruebas
		echo "...<PRE>";
		print_r($destinatarios);
		echo "</PRE>";
		return;
		*/

		$mensaje="El sr.<B>".$solicitud->nombres."</B><BR>";
		$mensaje.="Ha registrado la siguiente solicitud. ".$solicitud->solicitud;
		$mensaje.="<BR>Su email es: <b>".$solicitud->email."</b>";
		$mensaje.="<H2>Datos de la solictud</H2>";
		$mensaje.="<TABLE BORDER='0' padding=4' margin='2' cellspading='2' bgcolor='#efefef'>";
		$mensaje.="<TR><th align='left'>Producto o insumo solicitado:<td align='left'><I>".$solicitud->solicitud."</I>";
		$mensaje.="<TR><th align='left'>Descripcion de la solicitud:<td align='left'><I>".$solicitud->descripcion."</I>";
		$mensaje.="<TR><th align='left'>Cantidad:<td align='left'><I>".$solicitud->cantidad_requerida."</I>";
		$mensaje.="<TR><th align='left'>Precio máximo:</B><td align='left'>".$solicitud->precio."</B><BR>";
		$mensaje.="<TR><th align='left'>Forma de pago preferida:<td align='left'><I>".$solicitud->forma_de_pago."</I>";
		$mensaje.="<TR><th align='left'>Direccion de Email:<td align='left'><I>".$solicitud->email."</I>";
		$mensaje.="<TR><th align='left'>Nombre y Apellidos:<td align='left'><I>".$solicitud->nombres."</I>";		
		$mensaje.="<TR><th align='left'>Telefono:<td align='left'><I>".$solicitud->telefono."</I>";
		$mensaje.="<TR><th align='left'>Nombre empresa:<td align='left'></I>".$solicitud->nombre_empresa."</I>";
		$mensaje.="<TR><th align='left'>Ciudad de entrega:<td align='left'><I>".$solicitud->ciudad_entrega."</I>";
		$mensaje.="</TABLE>";
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);


		$count=0;
		foreach ($destinatarios as  $value) 
		{
			$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
			$this->email->to($value);
			$this->email->subject("Tienes una nueva oportunidad comercial");
			$this->email->message($mensaje);
			if ($this->email->send())
			{$count++;}
		}

		echo "<H3>Se enviaron ".$count." mensajes, sactisfactoriamente</H3>";
		echo "<a href='JavaScript:windows.close();'>Cerrar</a>"; 
		//redirect($_SERVER['HTTP_REFERER']);
    }

    public function editar_solicitud_externa()
    {
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
		$datos['ciudad_entrega'] = $this->input->post('ciudad');
		$id= $this->input->post('id_solictud');

		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');  
		$this->asistentes_proveedor->update($datos,$id);
		echo "<H3>Edicion exitosa!<H3>";
		echo "<a href='JavaScript:windows.close();'>Cerrar</a>"; 
    }
    
#en desarrollo
    public function publicar_solicitud($id)
    {
    	$this->verifyc_login(); 	
    	$id_user= $this->session->userdata('id_usuario'); 
		$solicitud=$this->asistentes_proveedor->get($id);
		switch ($solicitud->categoria) 
		{
			case 39:
				$id_user=355;
				$subcategoria="Metalmecánica";
				break;
			case 6:
				$id_user=127;
				$subcategoria="Oxfords";
				break;
			case 33:
				$id_user=224;
				$subcategoria="Otros Servicios para Empresas y Outsourcing";
				break;
		}
		$solicitud->fecha_publicacion="".date("Y m d");
		$this->solicitud->insert($solicitud);    	
		$ciudad = $this->municipio->get(array("municipio" => $solicitud->ciudad_entrega));
		$departamento = $this->departamento->get($ciudad->id_departamento);
		$this->asistentes_proveedor->update(array('publicada'=>$this->oferta->id),$id);
		$this->solicitudes_externas(TRUE);
    }
    public function mensajes($var=FALSE)
    {    	
    	$this->verifyc_login();

    	$mensajes=$this->mensaje->get_all();

		if($var)
		{	return $mensajes;	}
    	

		$dotos['page_count'] = count($mensajes)/25;
		$datos['page']=($this->input->post('page')-1);
			    	
		foreach ($mensajes as $key => $mensaje)
		{
			$mensajes[$key]->remitente=$this->remitente->get(array('id' => $mensaje->remitente))->nombres;

			$usuario= $this->usuarios->get($mensaje->destinatario);
		  	if($usuario)
		  	{	$mensajes[$key]->destinatario=$usuario->nombres;	}
		  
			if($key<($datos['page']*25))
			{  continue; }
	  		if($datos['page']>0)
			{
				if($key>=($datos['page']*50))	
				{break;}
			}	
			else
			{
				if($key>=25)	
				 {break;}
			}
			$datos['datos'][]=$mensaje;
		}

    	$datos['titulo']="Proveedor Administrador- Mensajes";
		$datos['usuario']->usuario=$this->session->userdata('usuario');
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=> $id_usuario));
		$this->load->view('template/head', $datos);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('micro_admin/buscador', FALSE);
		$this->load->view('template/javascript', FALSE);
	    $this->load->view('micro_admin/mensajes', $datos);
    }


	public function recuperar_clave($id_usuario=NULL)
	{
		$this->verifyc_login();
		$pass_rand = $this->crypter->encrypt(rand(10,50));
		$this->usuarios->update(array('password'=>md5($pass_rand)),$id_usuario);
		$usuario=$this->usuarios->get($id_usuario);
			
		$mensaje="Hola, Sr(a).<B>".$usuario->nombres."</B><BR>";
		$mensaje.="";
		$mensaje.="<H4>Nuevos datos de cuenta Proveedor.com.co</H4>";
		$mensaje.="<TABLE BORDER='0' padding=4' margin='2' cellspading='2' bgcolor='#efefef'>";
		$mensaje.="<TR><TH  align='left'>Usuario: <TD>".$usuario->usuario;
		$mensaje.="<TR><TH  align='left'>Contraseña: <TD>".$pass_rand;
		$mensaje.="<TABLE>";
		
		/*
		echo @$email;
		echo "<PRE>";
		echo "</PRE>";
		echo @$mensaje;
		return;
		*/
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
		redirect(base_url()."micro_admin/empresas");
	}
}
