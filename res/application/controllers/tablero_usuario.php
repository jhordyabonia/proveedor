<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Tablero_usuario extends CI_Controller {

	///Constructor de la clase del control
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('new/Mensajes_model','mensajes');
		$this->load->model('new/Producto_model','producto');
		$this->load->model('new/Solicitud_model','solicitud');
		$this->load->model('new/Membresia_model','membresia');
		$this->load->model('new/Remitente_model','remitente');
		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Usuarios_model','usuarios');
		$this->load->model('new/Categoria_model','categoria');
		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
	}

	/////funcion para llamar la pagina de perfil de usuario
	function index() {

  	 	$this->session->set_userdata('path_current',base_url()."tablero_usuario");
		$iduser = $this->session->userdata('id_usuario');
		
		$datos['nuevos'] = $this->mensajes->get_all(array('destinatario' => $iduser, 'estado' => 0));
		$datos['recibidos'] = $this->mensajes->get_all(array('destinatario' => $iduser, 'estado' => 1));
		$remitente = $this->usuarios->get($iduser)->email;
		$remitente = $this->remitente->get(array('correo' => $remitente));
		
		$datos['enviados']=FALSE;
		if($remitente)
		{	
			$datos['enviados'] =$this->mensajes->get_all(array('remitente' => $remitente->id));		
		}
		if($datos['nuevos'])
		{$datos['count_msj']=count($datos['nuevos']);}
		else {$datos['count_msj']=0;}		
		if($datos['enviados'])
		{$datos['count_msj2']=count($datos['enviados']);}
		else {$datos['count_msj2']=0;}

		$datos['empresa']=$this->empresa->get(array('usuario'=>$iduser));

		if(!$datos['empresa'])#completar registro de empresa, en caso de estar incompleto.
		{redirect('registro/asistente_registro/'.$this->usuarios->get($iduser)->usuario);}

		$datos['membresia']=$this->membresia->get($datos['empresa']->membresia);

		$datos['count_contactos'] = 0;#$this->tablero_model->cantidad_usuarios($iduser);
		$datos['count_ofertas'] = count($this->solicitud->get_all(array('empresa'=>$datos['empresa']->id)));
		$datos['count_productos'] = count($this->producto->get_all(array('empresa'=>$datos['empresa']->id)));
		$this->load->model('Membresia_model','membresia');		

		$datos['nombre_membresia']=$datos['membresia']->nombre;
		$datos['membresia']=$this->membresia->get_div_list($datos['empresa']->id);
		
		$datos['usuario']=$this->usuarios->get($iduser);
    	$datos['administrador']=FALSE;
    	if($datos['usuario']->permisos==1)
    	{$datos['administrador']=TRUE;}

		$datos['titulo']="Administrar mis solicitudes - PROVEEDOR.com.co";
		$this->load->view('template/head', $datos);
		$this->load->view('template/javascript', $datos, FALSE);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		$this->load->view('tablero_usuario/tablero', $datos);
		$this->load->view('template/footer', $datos, FALSE);
	}


	public function oportunidades($categoria=6)
	{		

		$id_usuario=$this->session->userdata('id_usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$datos['membresia']=$this->membresia->get($datos['empresa']->membresia);
		$solicitudes=$this->asistentes_proveedor->get_all();

		$datos['total_oportunidades']=count($solicitudes);
		$datos['numero_nuevas']=0;
		$dotos['page_count'] = count($solicitudes)/25;
		$datos['page']=($this->input->post('page')-1);	
		$datos['datos'] = array();		    	
		foreach ($solicitudes as $key => $solicitud)
		{
			$misma_categoria=FALSE;
			foreach (explode('|',$datos['empresa']->categorias) as $value)
			{
				if($solicitud->categoria==$value)
				{
					$misma_categoria=TRUE;
					break;
				}
			}
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
			if($misma_categoria)
			{	$datos['datos'][]=$solicitud;	}
		}
    	$datos['titulo']="Mis oportunidades comerciales -Proveedor.com.co ";
		$datos['usuario']->usuario=$this->session->userdata('usuario');
		$datos['empresa']=$this->empresa->get(array('usuario'=>$this->session->userdata('id_usuario')));
		$this->load->view('template/head', $datos);
		$this->load->view('template/javascript', FALSE);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
	    $this->load->view('tablero_usuario/solicitudes_externas', $datos); 
		$this->load->view('template/footer', $datos, FALSE);
	}

}
