<?php

/**
 * Description of u
 *
 * @author Karlox Martinez
 */
class U_model extends CI_Model {

	const TYPE = "gif|jpg|png";
	const FOLDER = "./uploads/";
	const SIZE = "2000";

	var $error;
	var $nombre_archivo;

	function __construct() {
		parent::__construct();
		$this->load->library('image_lib');
	}

	function imagen() {
		$config['allowed_types'] = self::TYPE;
		$config['upload_path'] = self::FOLDER;
		$config['overwrite'] = FALSE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload()) {
			$data = $this->upload->data();
			$nombre_archivo = $data['file_name'];
			$this->_create_thumbnail($nombre_archivo);
			$this->error = $this->upload->display_errors();
			$this->nombre_archivo = $nombre_archivo;
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function load_logo() {
		$config['allowed_types'] = self::TYPE;
		$config['upload_path'] = "./uploads/logos";
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload()) {
			$data = $this->upload->data();
			$nombre_archivo = $data['file_name'];
			$this->error = $this->upload->display_errors();
			$this->nombre_archivo = $nombre_archivo;
			return $this->nombre_archivo;
		} else {
			return FALSE;
		}
	}
	
	function cargar_adjunto($archivo) 
	{	
		$config['allowed_types'] = "pdf|jpg|png|xlsx|docx|pptx|odt|ods|odp|xps|txt";
		$config['upload_path'] = "./uploads/adjuntos";
		$config['overwrite'] = TRUE;
		//$this->upload->initialize($config);		
		$this->load->library('upload', $config);

		if ($this->upload->do_upload($archivo))
		 {
			$data = $this->upload->data();
			$this->path=$data['full_path'];	
			return $data['full_path'];;
		 }else{$this->upload->display_errors();	return FALSE;	}		
	}
	/*
	 * Funcion para crear una imagen en miniatura.
	 * Source_image: El directorio y nombre de la imagen a convertir 
	 * new_image: Directorio donde se guardar la nueva imagen
	 * return: Falso o verdadero sin la accion tiene efecto.
	 */

	function _create_thumbnail($filename = FALSE) {
		if ($filename) {
			$config['image_library'] = 'gd';
			$config['source_image'] = 'uploads/' . $filename;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['new_image'] = 'uploads/thumbs/';
			$config['width'] = 150;
			$config['height'] = 150;
			$this->image_lib->initialize($config);
			if (!$this->image_lib->resize()) {
				echo $this->image_lib->display_errors();
				$this->image_lib->clear();
			}
			$this->image_lib->clear();
		}
		$this->image_lib->clear();
		return FALSE;
	}

}
