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

	function imagen() {
		$config['allowed_types'] = self::TYPE;
		$config['upload_path'] = self::FOLDER;
		$config['overwrite'] = FALSE;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload()) {
			$data = $this->upload->data();
			$nombre_archivo = $data['file_name'];
			// $this->_create_thumbnail($nombre_archivo);
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

	function _create_thumbnail($filename = FALSE) {
		if ($filename) {
			$config['image_library'] = 'gd';
			$config['source_image'] = 'uploads/' . $filename;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['new_image'] = 'uploads/logos/thumbs/';
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
