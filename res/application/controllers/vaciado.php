<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vaciado extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('vaciado/Vaciado_model','vaciado');
	}
	private function vaciar()
	{

		#$this->load->view('index_test/banner_eventos',FALSE);
		echo "<table border='0'>";
		echo "<tr><th>Cargando empresas...";
		$empresas=$this->vaciado->empresas();
		echo "<td>Hecho!";
		echo "<tr><th>Cargando usuarios...";
		$usuarios=$this->vaciado->usuarios();
		echo "<td>Hecho!";
		echo "<tr><th>Cargando productos...";
		$this->vaciado->producto();
		echo "<td>Hecho!";
		echo "<tr><th>Cargando solicitudes...";
		$this->vaciado->oferta();
		echo "<td>Hecho!";
		echo "<tr><th>Cargando remitentes...";
		$this->vaciado->remitentes();
		echo "<td>Hecho!";
		echo "<tr><th>Cargando mensajes...";
		$this->vaciado->mensajes();
		echo "<td>Hecho!";

		echo "<tr><th>Vinculando empresas...";
		$this->vaciado->linking($usuarios,"empresa","usuario");
		echo "<td>Hecho!";
		echo "<tr><th>Vinculando productos...";
		$this->vaciado->linking($empresas,"producto","empresa");
		echo "<td>Hecho!";
		echo "<tr><th>Vinculando solicitudes...";
		$this->vaciado->linking($empresas,"solicitud","empresa");
		echo "<td>Hecho!";
		echo "<t><th>Vinculando mensajes...";
		$this->vaciado->linking($usuarios,"mensajes","destinatario");
		echo "<td>Hecho!";
		echo "</table>";
		/*
		*/
		echo "<h4>Vinculos..</h4>";

		echo "<PRE>";
		echo "Empresas:
		";
		print_r($empresas);
		echo "Usuarios:
		";
		print_r($usuarios);
		echo "</PRE>";
	
	}
	function index()
	{
		if(md5($this->input->post('pass'))==md5("3154513799JJ"))
		{
			$this->vaciar();
		}
		else
		{
			echo '<form action="'.base_url().'vaciado" method="post">
			<input type="password" name="pass"> 
			<input type="submit">
			</form>';
		}
	}

	public function halt()
	{
		if(md5($this->input->post('pass'))==md5("3154513799JJ"))
		{
			$this->halt1();
		}
		else
		{
			echo '<form action="'.base_url().'vaciado/halt" method="post">
			<input type="password" name="pass"> 
			<input type="submit">
			</form>';
		}
		
	}
	private function halt1()
	{
		$this->vaciado->halt();
		echo "Deleted all!!";
	}

	public function to_string($tabla,$where, $select='*')
	{
		echo $this->vaciado->to_string($tabla,$where, $select);
	}


}