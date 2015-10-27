<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_producto_principales extends CI_Controller {

    ///Constructor de la clase del control
  function __construct()
  {
    parent::__construct();    
    $this->load->model('new/Producto_model', "producto");
    $this->load->model('new/Empresa_model', "empresa");
  }
  

  ##LLama la vista que mostrara la parte del footer en las vistas
  function index()
  {
    $datos['empresa'] = $this->empresa->get(4264);
    $datos['productos'] = $this->producto->get_all(array('empresa'=>4264));
    $datos['destacados'] = array();# $this->producto->get_all(array('empresa'=>4264));
    foreach (explode(',',$datos['empresa']->productos_destacados) as $key => $value) 
    {
      if(is_null($value)){break;}
      $datos['destacados'][]=$this->producto->get($value);
    }
    $this->load->view('config_OroPlatino/top_menu_config');
    $this->load->view('config_OroPlatino/conf_productos_principales',$datos);
    $this->load->view('template/footer');
    $this->load->view('template/footer_empy');
  }
  
  }