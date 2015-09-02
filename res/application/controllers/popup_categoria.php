<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Popup_categoria extends CI_Controller
 {
	function __construct() 
	{
		parent::__construct();
		
		$this->load->model('popups_textos_model', 'popups_textos');
        $this->load->model('new/Categoria_model', 'categoria');
		$this->load->model('new/Usuarios_model', 'usuario');
		$this->load->library(array('session', 'email','form_validation'));
		$this->verifyc_login();
	}
 	 private function verifyc_login()
    {
    	$usuario=$this->usuario->get($this->session->userdata('id_usuario'));
    	if($usuario->permisos==1)
    	{	return;	}

    	redirect(base_url());
    } 

	public function crear($recorded=FALSE)
	{
		if(!$recorded)
		{
            $datos['registro']=$this->session->userdata('registro');
            $datos['paso']=$this->session->userdata('paso');
            $datos['id_registro']=$this->session->userdata('id_registro');

			$datos['categorias']=$this->categoria->get_all();
            $datos['titulo']="Crear popup, de captura";
            $datos['id_usuario']= $this->session->userdata('id_usuario');
            $datos['url_registro']=base_url()."registro/registro_usuario";
            $datos['url_publicar_producto']=base_url()."publicar_producto";
            $datos['url_publicar_solicitud']=base_url()."publicar_oferta";        
            $this->load->view('template/head', $datos, FALSE);
            $this->load->view('template/javascript', FALSE, FALSE);
            $this->load->view('index/top_menu',$datos);
            $this->load->view('index/header_buscador',$datos);
		    $this->load->view('micro_admin/crear_popup',$datos);
            $this->load->view("template/footer");
		    return;
		}

		$datos['categoria']=$this->input->post('categoria');
		$datos['texto_titulo']=$this->input->post('texto_titulo');
        $datos['texto_body']=$this->input->post('texto_body');
        $datos['texto_body']=$this->input->post('texto_body');

		$datos['campos']="";
    	 if($this->input->post('nombre'))
    	 	{$datos['campos'].="nombre,"; }
	   	 if($this->input->post('contacto'))
    	 	{$datos['campos'].="contacto,"; }
 	  	 if($this->input->post('email'))
    	 	{$datos['campos'].="email,"; }
    	 if($this->input->post('telefono'))
    	 	{$datos['campos'].="teléfono,"; }
    	 if($this->input->post('ciudad'))
    	 	{$datos['campos'].="ciudad,"; }
    	 if($this->input->post('empresa'))
    	 	{$datos['campos'].="empresa,"; }
    	 if($this->input->post('descripcion'))
    	 	{$datos['campos'].="descripción,"; }
    	 if($this->input->post('precio'))
    	 	{$datos['campos'].="precio,"; }
    	 if($this->input->post('pago'))
    	 	{$datos['campos'].="pago,"; }

    	$datos['titulos']="";
    	$datos['titulos'].=',contacto|'. $this->input->post('contacto_titulo');
    	$datos['titulos'].=',nombre|'. $this->input->post('nombre_titulo');
    	$datos['titulos'].=',email|'. $this->input->post('email_titulo');
    	$datos['titulos'].=',descripción|'. $this->input->post('descripcion_titulo');
    	$datos['titulos'].=',empresa|'. $this->input->post('empresa_titulo');
    	$datos['titulos'].=',pago|'. $this->input->post('pago_titulo');
    	$datos['titulos'].=',teléfono|'. $this->input->post('telefono_titulo');
    	$datos['titulos'].=',precio|'. $this->input->post('precio_titulo');
    	$datos['titulos'].=',ciudad|'. $this->input->post('ciudad_titulo');

    	$popup_tmp=$this->popups_textos->get(array('categoria'=>$datos['categoria']));
    	if($popup_tmp==FALSE)
    	{$this->popups_textos->insert($datos);}
    	else{$this->popups_textos->update($datos,array('categoria'=>$datos['categoria']));}
		/*
		if($popup_tmp==FALSE)
		{ 	echo "Se creo el popup con exito, para la categoria ".$this->categoria->get($datos['categoria'])->nombre_categoria;}
    	else {echo "Se actualizo el popup con exito ".$this->categoria->get($datos['categoria'])->nombre_categoria;}
		echo "<br><a href='".base_url()."micro_admin'>volver</a>";
		*/
    	redirect(base_url()."categoria/captura/".$datos['categoria']);
	}
}