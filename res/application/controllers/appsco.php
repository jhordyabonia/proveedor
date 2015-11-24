<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Appsco extends CI_Controller {
	// Constructor de la clase del control
	function __construct(){
		parent::__construct();
		
	}

	  public function anexos730()
	  {   	
	 	$this->load->helper('download');  
	  	 #$data = file_get_contents('uploads/adjunto/appsco730.zip');
	     #force_download('appsco730.zip',$data); 
	     echo "Ready!!";
	  }

	  public function test()
	  {
	  	preg_match('/([^.]+)\.example\.org/', $_SERVER['SERVER_NAME'], $matches);
		if(isset($matches[1])) 
		{
		    $subdomain = $matches[1];
		}
		if(!$subdomain)
		{
			$subdomain = substr(
                 $_SERVER['SERVER_NAME'], 0,
                 strpos($_SERVER['SERVER_NAME'], '.')
             );
		}
		echo '<b>:>'.$subdomain;
	  }
	}