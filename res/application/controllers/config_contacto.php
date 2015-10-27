<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_contacto extends CI_Controller {

    ///Constructor de la clase del control
  function __construct(){
    parent::__construct();
  }
  

  ##LLama la vista que mostrara la parte del footer en las vistas
  function index(){
    $this->load->view('config_OroPlatino/top_menu_config');
    $this->load->view('config_OroPlatino/conf_contacto');
    $this->load->view('template/footer');
    $this->load->view('template/footer_empy');
  }
  
  }