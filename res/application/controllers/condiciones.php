<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Condiciones extends CI_Controller {


function __construct(){
    parent::__construct();
    $this->load->library('session');
  }
 
   //funcion para llamar la pagina terminos y condiciones
	function index (){ 	 
  		$this->load->view('vistas/terminos_y_condiciones');
	}
}