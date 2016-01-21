<?php

/**
 * Description of u
 *
 * @author Karlox Martinez
 */
class U_logo_model extends CI_Model {

	const TYPE = "gif|jpg|png";
	const FOLDER = "./uploads/logos/";
	const SIZE = "2000";

	var $error;
	var $nombre_archivo;

	function __construct() {
		parent::__construct();
		// $this->load->library('image_lib');
	}

	private function resize_img($path,$img)
	{
		$this->resize($img,"index_carrouseles/",120,120);
		$this->resize($img,"index_productos_principales/",184,122);
		$this->resize($img,"index_productos_principales_mas_destacado/",266,148);
		$this->resize($img,"listados/",175,155);
		$this->resize($img,"pagina_producto/miniatura/",55,55);
		$this->resize($img,"pagina_producto/visualizador/",316,160);
		$this->resize($img,"pagina_producto/galeria/",480,401);
		$this->resize($img,"pagina_de_empresa/",220,185);
		$this->resize($img,"SOP/",235,155);

		$this->resize("logos/".$img,"index_carrouseles/logos/",120,120);
		$this->resize("logos/".$img,"index_productos_principales/logos/",184,41);
		$this->resize("logos/".$img,"index_productos_principales_mas_destacado/logos/",237,56);
		$this->resize("logos/".$img,"pagina_de_empresa/logos/",180,90);
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

	function imagen() {
		$config['allowed_types'] = self::TYPE;
		$config['upload_path'] = self::FOLDER;
		$config['overwrite'] = FALSE;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload()) {
			$data = $this->upload->data();
			$nombre_archivo = $data['file_name'];	
			$this->resize_img($config['upload_path'],$data['file_name']);
			$this->error = $this->upload->display_errors();
			$this->nombre_archivo = $nombre_archivo;
			return $nombre_archivo;
		} else {
			return FALSE;
		}
	}

	/*
	 * Funcion para crear una imagen en miniatura.
	 * Source_image: El directorio y nombre de la imagen a convertir 
	 * new_image: Directorio donde se guardar la nueva imagen
	 * return: Falso o verdadero sin la accion tiene efecto.
	 */
}
