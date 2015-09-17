<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Appsco extends CI_Controller {
	// Constructor de la clase del control
	function __construct(){
		parent::__construct();
		
	}

	  public function anexos730()
	  {   	
	 	$this->load->helper('download');  
	  	 $data = file_get_contents('uploads/adjunto/appsco730.zip');
	     force_download('appsco730.zip',$data); 
	  }
	}