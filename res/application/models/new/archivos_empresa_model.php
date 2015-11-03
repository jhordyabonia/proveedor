<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archivos_empresa_model extends CI_Model {
	var $path;
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}	
	function archivo_adjunto($campo,$destino='adjunto')
	{
		$config['upload_path'] = './uploads/'.$destino;
		$config['allowed_types'] = 'docx|xlsx|pptx|ods|odt|odp|txt|pdf|png|jpg';
		$this->upload->initialize($config);
		
        $name=$_FILES[$campo]['name'];
        $type=$_FILES[$campo]['type'];
        $tmp_name=$_FILES[$campo]['tmp_name'];
        $error=$_FILES[$campo]['error'];
        $size=$_FILES[$campo]['size'];

        $out="";

        foreach ($name as $key => $value) 
        {
           $_FILES['userfile']['name']=$name[$key];
           $_FILES['userfile']['type']=$type[$key];
           $_FILES['userfile']['tmp_name']=$tmp_name[$key];
           $_FILES['userfile']['error']=$error[$key];
           $_FILES['userfile']['size']=$size[$key];
			if ($this->upload->do_upload())
			 {
				$data = $this->upload->data();
				$this->path=$data['full_path'];	
				$out.=$data['file_name'].',';
			}else
			{
				$this->upload->display_errors();
				#return FALSE;
			}
		}
		return $out;
		
		
	}
}

/* End of file email_model.php */
/* Location: ./application/models/email_model.php */