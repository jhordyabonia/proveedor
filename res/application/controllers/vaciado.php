<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vaciado extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('vaciado/Vaciado_model','vaciado');
	}

	function index()
	{
		
		$this->load->view('index_test/banner_eventos',FALSE);
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

		echo "<tr><th>Vinculando empresas...";
		$this->vaciado->linking($usuarios,"empresa","usuario");
		echo "<td>Hecho!";
		echo "<tr><th>Vinculando productos...";
		$this->vaciado->linking($empresas,"producto","empresa");
		echo "<td>Hecho!";
		echo "<tr><th>Vinculando solicitudes...";
		$this->vaciado->linking($empresas,"solicitud","empresa");
		echo "<td>Hecho!";
		echo "</table>";


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

	public function halt()
	{
		$this->vaciado->halt();
		echo "Deleted all!!";
	}


}