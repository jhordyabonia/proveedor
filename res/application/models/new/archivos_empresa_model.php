<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archivos_empresa_model extends CI_Model {
	var $path;
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}	

	private function resize_img($path,$img)
	{
		$this->resize("banners/".$img,"SOP/banners/",284,1136);
		$this->resize("imagenes/".$img,"SOP/imagenes/",270,129);

		$this->resize("logos/".$img,"index_carrouseles/logos/",120,120);
		$this->resize("logos/".$img,"index_productos_principales/logos/",184,41);
		$this->resize("logos/".$img,"index_productos_principales_mas_destacado/logos/",237,56);
		$this->resize("logos/".$img,"pagina_de_empresa/logos/",180,90);
		$this->resize("logos/".$img,"SOP/logos1/",420,144);
		$this->resize("logos/".$img,"SOP/logos2/",34,20);
		$this->resize("logos/".$img,"SOP/logos3/",362,630);
	}	
	private function resize($img,$destino="",$width=316,$heigth=160)
	{		
		$CI = & get_instance();
        $CI->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/'.$img;#$data['full_path'];"uploads/imagenes/1.png";
        $config['new_image'] = 'uploads/resize/'.$destino;
        $config['maintain_ratio'] = TRUE;
        $config['create_thumb'] = FALSE;
        $config['width'] = $width;
        $config['height'] = $heigth;

        $CI->image_lib->initialize($config);

        if ($CI->image_lib->resize());
        	#{echo "<br>hecho";}
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
				$this->resize_img($config['upload_path'],$data['file_name']);
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