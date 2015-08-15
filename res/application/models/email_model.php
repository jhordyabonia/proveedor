<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {
	var $path;
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->library('upload');
	}	
	function archivo_adjunto($nombre_archivo)
	{
		$config['upload_path'] = './uploads/adjunto';
		$config['allowed_types'] = 'docx|xlsx|pptx|ods|odt|odp|txt|pdf|png|jpg';
		$this->upload->initialize($config);
		
		if ($this->upload->do_upload())
		 {
			$data = $this->upload->data();
			$this->path=$data['full_path'];	
			return $data['file_name'];
		}else
		{
			$this->upload->display_errors();
			return FALSE;
		}
		
		
	}

	function enviar_oferta($email, $message, $adjunto)
	{
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from("contacto@proveedor.com.co","Contacto PROVEEDOR.com.co");
		$this->email->to($email);
		$this->email->subject('Alguien tiene una oferta para tí');
		
		if ($this->archivo_adjunto($adjunto)) {
			$this->email->attach($this->path);
		}
		$this->email->message($message);
		$this->email->send();
	}
	function enviar($datos)
	{
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from("contacto@proveedor.com.co","Contacto PROVEEDOR.com.co");
		$this->email->to($datos['detinatario_email']);
		$this->email->subject($datos['asunto']);
		
		if ($this->archivo_adjunto($datos['adjunto'])) {
			$this->email->attach($this->path);
		}
		$this->email->message($datos['datos_a_enviar']);
		if($this->email->send())
		{	return TRUE;	}
		else {	return FALSE;	}
	}
}

/* End of file email_model.php */
/* Location: ./application/models/email_model.php */