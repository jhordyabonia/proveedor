<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ejemplo extends CI_Controller {


	public function twig()
    {
        $data = array(
            array("id"=>1,"nombre"=>"Cathleen","correo"=>"mauris.ut.mi@blandit.com"),
            array("id"=>2,"nombre"=>"Kennedy","correo"=>"leo.Cras.vehicula@maurisSuspendisse.co.uk"),
            array("id"=>3,"nombre"=>"Pandora","correo"=>"Integer@Maurisquisturpis.net"),
            array("id"=>4,"nombre"=>"Tyler","correo"=>"eget.volutpat.ornare@blanditenim.ca"),
            array("id"=>5,"nombre"=>"Jolie","correo"=>"Mauris@ornare.edu"),
        );
        $this->twiggy->set('users', $data);
        $this->twiggy->display('examples/test');
    }

}

/* End of file ejemplos.php */
/* Location: ./application/ejemplos.php */