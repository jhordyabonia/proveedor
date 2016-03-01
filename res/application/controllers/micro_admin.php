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
		$this->load->model('new/Busquedas_model', 'busqueda');
		$this->load->model('new/Solicitud_model', 'solicitud');
		$this->load->model('new/Usuarios_model', 'usuarios');
		$this->load->model('new/Empresa_model', 'empresa');
		$this->load->model('new/Mensajes_model','mensaje');
		$this->load->model('new/Remitente_model', "remitente");
		$this->load->model('new/Departamento_model','departamento'); 
		$this->load->model('new/Municipio_model','municipio'); 
		$this->load->model('new/Categoria_model','categoria'); 
		$this->load->model('new/Subcategoria_model','subcategoria'); 
		$this->load->model('new/Plantilla_model','plantilla'); 
		$this->load->model('new/Evento_model','evento'); 
		$this->load->model('new/Tipo_empresa_model','tipo_empresa'); 
		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
		$this->load->model('crypter_model','crypter');
		$this->load->library(array('session', 'email','form_validation'));
		$this->load->helper('file');
		
		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function empresas_()
	{
			$this->verifyc_login();
			$crud = new grocery_CRUD();

			#$crud->set_theme('datatables');
			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('empresa');
			$crud->set_relation('usuario','usuarios','email');
			$crud->set_relation('tipo','tipo_empresa','tipo');
			$crud->set_relation('tipo_registro','tipo_registro','nombre');
			$crud->set_relation('membresia','membresia','nombre');
			$crud->display_as('productos_principales','Productos Principales');
			$crud->set_subject('Empresa');

			$crud->required_fields('nombre');
			$crud->required_fields('usuario');

			//Campos a editar o agregar
			$crud->fields('id', 'nombre', 'membresia' ,  'tipo_registro' ,'tipo', 'legalizacion', 'decripcion', 'productos_principales', 'special_features');
			//Columnas a mostrar
			#$crud->columns('id', 'nombre', 'membresia' ,  'tipo_registro' ,'tipo', 'legalizacion', 'decripcion', 'productos_principales');
			//Eliminar columnas			
			#$crud->unset_columns('nit');
			//Desactivar agregar
			$crud->unset_add();
			//Desctivar eliminiar
			$crud->unset_delete();

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->load->view('main.php',$output);
			#echo "<div style='height:20px;'>Menu</div><div>";
			#echo $output['output'];
			#echo "</div>";
	}
	public function registrar_empresa($form=0)
	{
		$this->verifyc_login();

	    $dat['titulo']="Registrar empresa";
	    $dat['nit']=$this->session->userdata('empresa');
	    $dat['usuario']=$this->session->userdata('usuario');

	    $this->load->view('template/head', $dat);
	    $this->load->view('tablero_usuario/header', $dat, FALSE);
	    $this->load->view('template/javascript', FALSE);
		
		if($form===0)
		{
	    	$dat['categorias']=$this->categoria->get_all();
	    	$dat['dept']=$this->departamento->get_all();
	    	$dat['municipios']=$this->municipio->get(array('id_departamento'=>33));
			$this->load->view('registro/funcionalidades_');
	        $this->load->view('micro_admin/registro_empresa', $dat);
	        return;
		}

       $empresa['nombre']=$this->input->post('nombre_empresa');
       $empresa['categorias']=$this->input->post('categoria')."|";
       $empresa['descripcion']="Empresa del sector de ".$this->categoria->get($this->input->post('categoria'))->nombre_categoria;
       $empresa['logo']="default.jpg";
       $empresa['tipo_registro']=4;
       

       $usuario['ciudad']=$this->input->post('municipio');
       $usuario['departamento']=$this->input->post('provincia');
       $usuario['nombres']=$this->input->post('nombres');
       $usuario['email']=$this->input->post('email');
       $usuario['telefono']=$this->input->post('fijo');
	   $password=$this->crypter->encrypt(rand(10,50));
	   $usuario['usuario'] = "proveedor".substr($this->crypter->encrypt(rand(5,25)), 7);
       $usuario['password'] = md5($password);

		$registro=$this->usuarios->insert($usuario);
						
		$empresa['usuario'] = $registro;
		$id_unic=$this->empresa->insert($empresa);	

       #echo $password."<PRE>";
       #print_r($empresa);
       #print_r($usuario);
       #echo "</PRE>";
       #return;

		$mensaje="<div style='max-width: 600px;'> <img style='max-width: 600px;' src='".img_url()."header-email.png' alt=''>
		<br>Hola ".$usuario['nombres'].", bienvenido(a) a <a href='".base_url()."'> Proveedor.com.co</a><br><br>"."

		Ingresa a <a href='".base_url()."logueo'>este enlace</a>,  copia  el nombre de usuario y contraseña para activar tu cuenta
		<br><br>Nombre de usuario: <b>".$usuario['email']."</b><br>Contraseña: <b>".$password."</b><br> Atentamente, <br><a href='".base_url()."'>Equipo proveedor Proveedor.com.co</a><br>
		<br><img style='max-width: 600px;' src='".img_url()."footer-email-platino.png' alt=''></div>";


		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
		$this->email->to($usuario['email']);
		$this->email->subject("Bienvenido a Proveedor.com.co");
		$this->email->message($mensaje);
		$this->email->send();

		echo "<center><br><br><br><br><h3>Se ha hecho el registro sactisfactoriamente y enviado el siguiente mensaje:</h3>";
        echo @$mensaje;
		echo '<br>
				<a href="'.base_url().'micro_admin/registrar_empresa"><h5>Volver</h5></a>
	         	<a href="'.base_url().'micro_admin/"><h5>Micro admin</h5></a>';
       

	}
	public function guadar_plantilla()
	{
		$this->verifyc_login();
		
		$plantilla=$this->input->post('editor');
		$nombre_plantilla=$this->input->post('nombre_plantilla');
		$evento_plantilla=$this->input->post('evento_plantilla');
		
		$plantilla=str_replace("::0", "?", $plantilla);
		$plantilla=str_replace("::1", "$", $plantilla);
		$plantilla=str_replace("&lt;", "<", $plantilla);
		$plantilla=str_replace("&gt;", ">", $plantilla);
		if(write_file(APPPATH.'/views/plantillas/'.$nombre_plantilla.".php", $plantilla))
		{
			$tmp=$this->plantilla->get(array('nombre'=>$nombre_plantilla));
			if($tmp==FALSE)
			{
				$tmp=$this->plantilla->insert(array('nombre'=>$nombre_plantilla,'evento'=>$evento_plantilla));
				echo "Guardado de plantilla ".$nombre_plantilla." exitosa!!";
			}else 
			{
				$tmp=$tmp->id;
				echo "Plantilla ".$nombre_plantilla." actualizada!!";
			}
			$this->evento->update(array('plantilla'=>$tmp),$tmp);
		}else {echo "Error durante el guardado de plantlla ".$nombre_plantilla;}
	}

	function envio_err()
	{		
		$mensaje=$this->load->view('plantillas/test', FALSE,TRUE);
		/*$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
		#$this->email->to('jeigl7@gmail.com');
		$this->email->to('info@ombia.co');
		$this->email->subject("Bienvenido a Proveedor.com.co");
		$this->email->message($mensaje);
		$this->email->send();*/
		echo @$mensaje;
	}


    function enviar($id_solictud)
    {
    	$this->verifyc_login();
		
		if($id_solictud==0)
    	{show_404();}

    	$solicitud=$this->asistentes_proveedor->get($id_solictud);
		$data['solicitud'] = $solicitud;

    	$data['solicitud']=$this->asistentes_proveedor->get($id_solictud);

    	if(!$data['solicitud'])
    	{show_404();}

		$data['solicitud']->categoria=$this->categoria->get($solicitud->categoria)->nombre_categoria;
		$data['solicitud']->nombre_categoria=$data['solicitud']->categoria;
		$id_plantilla=$this->evento->get(1)->plantilla;
		$plantilla=$this->plantilla->get($id_plantilla);

		$css='
			<style type="text/css">.tag
			{
				text-decoration: none;
				background-color:inherit;
				color:inherit;
			}
			p
			{
				background-color:inherit;
				color:inherit;
			}
			</style>';
		$mensaje =$this->load->view('plantillas/'.$plantilla->nombre,$data, TRUE);

		
    	$destinatarios = $this->input->post('mensaje');
    	$destinatarios =str_replace("value=",' ',$destinatarios);
    	$destinatarios =str_replace("\">",' ',$destinatarios);
    	$destinatarios =str_replace("\"",' ',$destinatarios);
    	$destinatarios = explode(' ', $destinatarios);

    	// Configuracion de correo.
    	
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
    	$count=0;
    	foreach (clear_array($destinatarios) as  $value) 
		 {
		 	if($value==NULL){continue;}
		 	$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
		 	$this->email->to($value);
		 	$this->email->subject("Tienes una nueva oportunidad comercial");
		 	$this->email->message($css.$mensaje);
		 	if ($this->email->send())
		 	{$count++;}
		 }

		echo "<H3>Se enviaron ".$count." mensajes, sactisfactoriamente</H3>";
		echo "<br><a href='".$_SERVER['HTTP_REFERER']."Volver'</a>";    
    }
    public function envio_automatico($id_solictud=0)
    {
    	$this->verifyc_login();
		
    	if($id_solictud==0)
    	{show_404();}

    	$data['solicitud']=$this->asistentes_proveedor->get($id_solictud);

    	if(!$data['solicitud'])
    	{show_404();}

		$data['solicitud']->nombre_categoria=$this->categoria->get($data['solicitud']->categoria)->nombre_categoria;

		$evento=$this->evento->get(1);
    	$plantilla=$this->plantilla->get($evento->plantilla);

		$empresas_categoria=$this->empresa->buscar2("",$data['solicitud']->categoria);
		$destinatarios=NULL;
		foreach (clear_array($empresas_categoria) as $key => $value) 
		{
			$empresa=$this->empresa->get(array('id'=>$value->id,'membresia'=>3));
			if($empresa)
				{
					$usuario_tmp=$this->usuarios->get($empresa->usuario);
					$destinatarios[]=$usuario_tmp->email;
				}
		} 
		$css='
			<style type="text/css">.tag
			{
				text-decoration: none;
				background-color:inherit;
				color:inherit;
			}
			p
			{
				background-color:inherit;
				/*color:inherit;*/
			}
			</style>';
    	$mensaje =$this->load->view('plantillas/'.$plantilla->nombre,$data, TRUE);

    	$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
    	$count=0;
    	foreach (clear_array($destinatarios) as  $value) 
		 {
		 	if($value==NULL){continue;}
		 	$this->email->from('contacto@proveedor.com.co', 'Proveedor.com.co');
		 	$this->email->to($value);
		 	$this->email->subject("Tienes una nueva oportunidad comercial");
		 	$this->email->message($css.$mensaje);
		 	if ($this->email->send())
		 	{$count++;}
		 }

		echo "<H3>Se enviaron ".$count." mensajes, sactisfactoriamente</H3>";
		echo "<br><a href='".$_SERVER['HTTP_REFERER']."Volver'</a>";    
    } 

    public function obtener_datos_plantilla($id_evento=1,$id_preview=NULL)
	{
		$out= array();
		switch ($id_evento) 
		{
			case 1://solicitud
				$out['solicitud']=$this->asistentes_proveedor->get($id_preview);
				$out['solicitud']->nombre_categoria=$this->categoria->get($out['solicitud']->categoria)->nombre_categoria;
		
				$empresas_categoria=$this->empresa->buscar2("",$out['solicitud']->categoria);
				if(!$empresas_categoria)
					{$empresas_categoria=array();}
				$destinatarios=NULL;
				$nombres_destinatarios=NULL;
				foreach (clear_array($empresas_categoria) as $key => $value) 
				{
					$empresa=$this->empresa->get(array('id'=>$value->id,'membresia'=>3));
					if($empresa)
						{
							$usuario_tmp=$this->usuarios->get($empresa->usuario);
							$destinatarios[]=$usuario_tmp->email;
							$nombres_destinatarios[]=$usuario_tmp->nombres;
						}
					$empresa=NULL;
				} 

				$out['destinatarios']=$destinatarios;		
				$out['nombres_destinatarios']=$nombres_destinatarios;
				break;
			case 2://usuario-empresa
				if($id_preview==NULL)
				{$empresa=$this->empresa->get(10026);}
				else{$empresa=$this->empresa->get($id_preview);}
				$usuario=$this->usuarios->get($empresa->usuario);
				$out['nit']=$empresa->nit;
				$out['nombre']=$empresa->nombre;
				$out['nombres']=$usuario->nombres;
				$out['email']=$usuario->email;
				$out['telefono']=$usuario->telefono;				

				$out['destinatarios'][]=$out['email'];		
				$out['nombres_destinatarios'][]=$out['nombres'];
				break;			
			case 4://solicitud
				$out['solicitud']=$this->asistentes_proveedor->get($id_preview);
				$out['solicitud']->nombre_categoria=$this->categoria->get($out['solicitud']->categoria)->nombre_categoria;
		
				$empresas_categoria=$this->empresa->buscar2("",$out['solicitud']->categoria);
				if(!$empresas_categoria)
					{$empresas_categoria=array();}
				$destinatarios=NULL;
				$nombres_destinatarios=NULL;
				foreach (clear_array($empresas_categoria) as $key => $value) 
				{
					$empresa=$this->empresa->get(array('id'=>$value->id,'membresia'=>3));
					if($empresa)
						{
							$usuario_tmp=$this->usuarios->get($empresa->usuario);
							$destinatarios[]=$usuario_tmp->email;
							$nombres_destinatarios[]=$usuario_tmp->nombres;
						}
					$empresa=NULL;
				} 

				$out['destinatarios']=$destinatarios;		
				$out['nombres_destinatarios']=$nombres_destinatarios;
				break;
			
			default:
				# code...
				break;
		}
		return $out;

	}
	public function test_envio($id_evento=1,$id_plantilla=1,$id_preview=NULL)
	{
		$this->verifyc_login();
		$data=$this->obtener_datos_plantilla($id_evento,$id_preview);
		$plantilla=$this->plantilla->get($id_plantilla);
		$evento=$this->evento->get($id_evento);
		if($evento->id!=$plantilla->evento)
		$plantilla=$this->plantilla->get($evento->plantilla);

		$data['plantillas']=$this->plantilla->get_all(array('evento'=>$id_evento));
		$data['id_plantilla']=$id_plantilla;
		$data['eventos']=$this->evento->get_all();
		$data['evento']=$evento;
		$data['plantilla']=$plantilla;
		$data['id_preview']=$id_preview;
		$data['titulo']="Administrador";
		$id_usuario=$this->session->userdata('id_usuario');
		$data['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$data['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
		$data['administrador']=$data['usuario']->permisos;
		$this->load->view('template/head', $data,FALSE);
		$this->load->view('template/javascript', FALSE);
		$this->load->view('tablero_usuario/header', $data, FALSE);
		#$this->load->view('micro_admin/editor/tinymce/editor/index', $data, FALSE);
		$this->load->view('plantillas/evento',$data);
		if($plantilla)
		{	$data['mensaje']=$this->load->view('plantillas/'.$plantilla->nombre, $data, TRUE);}
		else {	$data['mensaje']="";	}
		$this->load->view('micro_admin/editor/index', $data, FALSE);
	}

	public function agregar_subcategoria()
	{
		$this->verifyc_login();
    	$dat['titulo']="Administrador";
		$dat['nit']=$this->session->userdata('empresa');
		$dat['usuario']=$this->session->userdata('usuario');

		$this->load->view('template/head', $dat);
		$this->load->view('tablero_usuario/header', $dat, FALSE);
		$this->load->view('template/javascript', FALSE);

		$datos['nom_subcategoria']=$this->input->post('nom_subcategoria');
		$datos['id_categoria']=$this->input->post('id_categoria');
		if($datos['nom_subcategoria']!=""&&
			$datos['id_categoria']!="")
		{
			/*
			echo "<PRE>";
			print_r($datos);
			echo "</PRE>";
			*/
			if($this->subcategoria->insert($datos))
			{
				echo "<center><br><br><br><br><br><br>Hecho!<br>Registro completo!";
			}
			else
			{
				echo "<center><br><br><br><br><br><br>Error!<br>Registro no realizado.";
				
			}
			echo "<br><a href='".base_url()."micro_admin/agregar_subcategoria'>Nuevo registro</a>";
			echo "<br><a href='".base_url()."micro_admin/'>Micro_admin</a>";
		}
		else
		{
			echo '<br><br><br><br><br><center><form action="'.base_url().'micro_admin/agregar_subcategoria" method="post">
			Nombre Subcategoria<input type="text" name="nom_subcategoria"><br>Categoria <select name="id_categoria">';
			foreach ($this->categoria->get_all() as $key => $value) 
			{
				echo "<option value='".$value->id_categoria."''>".$value->nombre_categoria."</option>";
			}
			echo '</select><br><input type="submit">
			</form>';
		}
	}
	public function agregar_categoria()
	{
		$this->verifyc_login();
    	$dat['titulo']="Administrador";
		$dat['nit']=$this->session->userdata('empresa');
		$dat['usuario']=$this->session->userdata('usuario');

		$this->load->view('template/head', $dat);
		$this->load->view('tablero_usuario/header', $dat, FALSE);
		$this->load->view('template/javascript', FALSE);

		$datos['nombre_categoria']=$this->input->post('nombre_categoria');
		if($datos['nombre_categoria']!="")
		{
			/*
			echo "<PRE>";
			print_r($datos);
			echo "</PRE>";
			*/
			if($this->categoria->insert($datos))
			{
				echo "<center><br><br><br><br><br><br>Hecho!<br>Registro completo!";
			}
			else
			{
				echo "<center><br><br><br><br><br><br>Error!<br>Registro no realizado.";
				
			}
			echo "<br><a href='".base_url()."micro_admin/agregar_categoria'>Nuevo registro</a>";
			echo "<br><a href='".base_url()."micro_admin/'>Micro_admin</a>";
		}
		else
		{
			echo '<br><br><br><br><br><center><form action="'.base_url().'micro_admin/agregar_categoria" method="post">
			Nombre Categoria<input type="text" name="nombre_categoria"><input type="submit">
			</form>';
		}
	}

	
    private function verifyc_login()
    {
    	$usuario =$this->usuarios->get($this->session->userdata('id_usuario'));
    	if($usuario->permisos==1)
    	{	return TRUE;	}

    	redirect(base_url(),'refresh');
    } 
    
    public function index()
    {
    	$this->inicio();
    } 
    public function busquedas_frecuentes()
    {
    	$busquedas = $this->busqueda->get_all();

    	echo "<table><tr><th>Busqueda<th>Resultados<th>Fecha<tr>";
    	foreach ($busquedas as $key => $value)
    	{
    		echo "<tr><td>".$value->busqueda."<td>".$value->resultados."<td>".$value->fecha;
    	}
    	echo "</table>";

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
    public function cambiar_categoria($id_empresa,$id_categoria=1)
    {    	
    	$this->verifyc_login();
		$empresa=$this->empresa->get($id_empresa);
		$categoria="";
		$primera=0;
		foreach (explode("|",$empresa->categorias) as  $value)
		{
			if($value==""){continue;}
			$primera++;
			if($primera==1){continue;}
			$categoria.=$value."|";
		}
		$nueva['categorias']= $id_categoria."|".$categoria;
		$result=$this->empresa->update($nueva,$id_empresa);
		if($result>=1)
			{	echo "Exito!";	}
		else
			{	echo "Error!";	}
    }
    public function cambiar_verificacion($id_empresa,$verificada=0)
    {    	
    	$this->verifyc_login();
		$nueva['legalizacion']= $verificada;
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
		$datos['administrador']=$datos['usuario']->permisos;
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
		$proveedores=$this->empresa->buscar2($criterio);
	
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
			$tmp_categoria = 0;
			foreach (explode('|',$out['empresa']->categorias) as $key => $value) 
			{
				if($value!="")
					$tmp_categoria=$value;
				if($tmp_categoria!=0)
					break;
			}
			$out['empresa']->categoria=$tmp_categoria;
			$out['usuario']=$this->usuarios->get($out['empresa']->usuario);
			if($var){$datos['proveedores'][]=$out['empresa'];}
			else{	$datos['proveedores'][]=$out;	}
			unset($proveedor);
		 }

		if($var)
		{	return $datos['proveedores'];	}
		
		$datos['tipos_empresa']=$this->tipo_empresa->get_all();
    	$datos['categorias']=$this->categoria->get_all();
    	
    	$datos['titulo']="Proveedor Administrador- empresas";
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$datos['usuario']=$this->usuarios->get($this->session->userdata('id_usuario'));
		$datos['administrador']=$datos['usuario']->permisos;
		$this->load->view('template/head', $datos);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
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
			$producto->empresa=$this->empresa->get($producto->empresa);
			$datos['productos'][]=$producto;
			unset($producto);
		}	
		if($var)
		{	return $datos['productos'];	}

    	$datos['titulo']="Proveedor Administrador- productos";
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$datos['usuario']->usuario=$this->session->userdata('usuario');
		$datos['administrador']=FALSE;
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
			$solicitud->empresa=$this->empresa->get($solicitud->empresa);
			$datos['solicitudes'][]=$solicitud;
			unset($solicitud);
		}
		if($var)
		{	return $datos['solicitudes'];	}

    	$datos['titulo']="Proveedor Administrador- Solicitudes internas";
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['usuario']->usuario=$this->session->userdata('usuario');
		$datos['administrador']=FALSE;
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$this->load->view('template/head', $datos);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('micro_admin/buscador', FALSE);
		$this->load->view('template/javascript', FALSE);
	    $this->load->view('micro_admin/solicitudes_internas', $datos);   
	    $this->load->view('micro_admin/funcionalidades', $datos); 
    }
    public function solicitudes_externas($oferta_publicada=0,$var=0,$page=0)
    {
		$solicitudes=$this->asistentes_proveedor->get_all();
		if($var!=0)
		{	return $solicitudes;	}
	
    	$this->verifyc_login();

		$count=0;##
        $tmp_solicitudes = array();
        $datos['page'] = $page;##
        $numeroXpagina = 20; ##
        $datos['cantidad_paginas'] = count($solicitudes)/$numeroXpagina;##
        
        foreach ($solicitudes as $key => $value) 
        {            
            $count++;##        
            if(!(($count>=(($numeroXpagina*$page)))&&($count<((($numeroXpagina*($page+1)))))))
            	continue; ##
        
            $value->categoria=$this->categoria->get($value->categoria);
            $tmp_solicitudes[] = $value;
        }		
        $datos['datos']=$tmp_solicitudes; 

    	$datos['titulo']="Proveedor Administrador - Solicitudes externas";
		$id_usuario=$this->session->userdata('id_usuario');
		$datos['usuario']->usuario=$this->session->userdata('usuario');
		$datos['administrador']=FALSE;
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$datos['categorias']=$this->categoria->get_all();
		$this->load->view('template/head', $datos);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('micro_admin/buscador', FALSE);
		$this->load->view('template/javascript', FALSE);
	    $this->load->view('micro_admin/solicitudes_externas', $datos);  
	    $this->load->view('micro_admin/funcionalidades', $datos); 
	    if($oferta_publicada!=0)
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
		//redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
    public function eliminar_solicitud_externa($id)
	{		 
		$this->asistentes_proveedor->delete($id);
		redirect($_SERVER['HTTP_REFERER'],'refresh');
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
		$datos['telefono'] = $this->input->post('telefono');
		$datos['nombre_empresa'] = $this->input->post('nombre_empresa');
		$datos['categoria'] = $this->input->post('categoria');
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
				$empresa=10026;
				$subcategoria="Metalmecánica";
				break;
			case 6:
				$empresa=10026;
				$subcategoria="Oxfords";
				break;
			case 33:
				$empresa=10026;
				$subcategoria="Otros Servicios para Empresas y Outsourcing";
				break;
			default:
				$empresa=10026;
				$subcategoria=1;				
		}
		if(!$solicitud)
		{
			echo "<CENTER><H3>Error, solicitud no encontrada, contacte la direción de tecnología</H3></CENTER>";
		}
		
		$solicitud_tmp=array('nombre'=>$solicitud->solicitud,
							'subcategoria'=>$subcategoria,
							'empresa'=>$empresa,
							'descripcion'=>$solicitud->descripcion,
							'imagenes'=>'default.jpg',
							'palabras_clave'=>$solicitud->solicitud,
							'cantidad_requerida'=>$solicitud->cantidad_requerida,
							'precio_maximo'=>$solicitud->precio,
							'medida'=>$this->obtener_unidad($solicitud->cantidad_requerida),
							'formas_de_pago'=>$solicitud->forma_de_pago,
							'ciudad_entrega'=>$this->obtener_ciudad($solicitud->ciudad_entrega),
							'departamento_entrega'=>$this->obtener_departamento($solicitud->ciudad_entrega),
							);
		$id_solictud=$this->solicitud->insert($solicitud_tmp);    	

		$ciudad = $this->municipio->get(array("municipio" => $solicitud->ciudad_entrega));
		$departamento = $this->departamento->get($ciudad->id_departamento);
		$this->asistentes_proveedor->update(array('publicada'=>$id_solictud),$id);
		$this->solicitudes_externas(TRUE);
    }
    private  function obtener_departamento($input=""){ return 1;}
    private  function obtener_ciudad($input=""){ return 1;}
    private  function obtener_unidad($input=""){ return 1;}

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
		  
		  	/*
			if($key<($datos['page']*75))
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
			$datos['datos'][]=$mensaje;
		}

    	$datos['titulo']="Proveedor Administrador- Mensajes";
		$datos['usuario']->usuario=$this->session->userdata('usuario');
		$datos['administrador']=FALSE;
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
		redirect(base_url()."micro_admin/empresas",'refresh');
	}
}
