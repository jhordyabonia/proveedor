<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Resizer extends CI_Controller
 {
	function __construct() 
	{
		parent::__construct();
		$this->load->model('new/Producto_model', 'producto');
		$this->load->model('new/Busquedas_model', 'busqueda');
		$this->load->model('new/Solicitud_model', 'solicitud');
		$this->load->model('new/Usuarios_model', 'usuarios');
		$this->load->model('new/Empresa_model', 'empresa');
		$this->load->model('new/Mensajes_model','mensaje');
		$this->load->model('new/Remitente_model', "remitente");
		$this->load->model('new/Departamento_model','departamento'); 
		$this->load->model('new/Municipio_model','municipio'); 
		$this->load->model('new/Categoria_model','categoria'); 
		$this->load->model('new/Subcategoria_model','subcategoria'); 
		$this->load->model('new/Plantilla_model','plantilla'); 
		$this->load->model('new/Evento_model','evento'); 
		$this->load->model('new/Tipo_empresa_model','tipo_empresa'); 
		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
		$this->load->model('crypter_model','crypter');
		$this->load->library(array('session', 'email','form_validation'));
		$this->load->helper('file');
	}


	/*
	
public function leer_archivos_y_directorios($ruta)
	{
    
    if ($ruta=="uploads")$ruta.="/";
    if ($ruta=="uploads/resize")return;
    if (is_dir($ruta))
    {
     if ($aux = opendir($ruta))
        {
            while (($archivo = readdir($aux)) !== false)
            {
            	if ($archivo!="." && $archivo!="..")
                {
                    $ruta_completa = $ruta . '/' . $archivo;
 					if (is_dir($ruta_completa))
                    {
                        echo "</table><table><tr><th><strong>Directorio: " . $ruta_completa;
                        #$this->leer_archivos_y_directorios($ruta_completa . "/");
                    }
                    else
                    {
                        echo '<tr><td>' . $archivo . '<td>';
                        $this->resize_img_($ruta,$archivo);
                    }
                }
            }
 
            closedir($aux);
        }
    }
    else
    {
        echo $ruta;
        echo "<br />No es ruta valida";
    }
}
	private function resize_img_($path,$img)
	{
		
		$CI = & get_instance();
        $CI->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path.$img;#$data['full_path'];"uploads/imagenes/1.png";
        $config['new_image'] = str_replace('uploads/', 'uploads/pagina_producto/visualizador/',$path);
        $config['maintain_ratio'] = TRUE;
        $config['create_thumb'] = FALSE;
        $config['width'] = 316;
        $config['height'] = 160;

        $CI->image_lib->initialize($config);

        if ($CI->image_lib->resize())
        	echo "<td>Echo";
        else
        	echo "<td>Error";
	}
	*/
	private function resize_img($img,$destino="",$width=316,$heigth=160)
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

        if ($CI->image_lib->resize())
        	{echo "<br>hecho";}
	}
	private function resize_conten($destino,$width=316,$heigth=160)
	{
		echo "Staring...<br>";
		$productos=$this->producto->get_all();
		$solicitudes=$this->solicitud->get_all();
		foreach ($productos as $key => $producto) 
		{
			#if(stripos($producto->imagenes, 'default.jpg'))
			#	continue;
			echo $producto->nombre."<br>";
			foreach (explode(',',$producto->imagenes) as $key => $value) 
			{
				if($value==NULL)continue;
				$this->resize_img($value,$destino,$width,$heigth);
			}
		}
		foreach ($solicitudes as $key => $producto) 
		{
			if(stripos($producto->imagenes, 'default.jpg'))
				continue;
			echo $producto->nombre."<br>";
			foreach (explode(',',$producto->imagenes) as $key => $value) 
			{
				if($value==NULL)continue;
				$this->resize_img($value,$destino,$width,$heigth);
			}
		}
	}
	private function resize_logos($destino,$width=316,$heigth=160)
	{
		echo "Staring...<br>";
		$empresas=$this->empresa->get_all();
		foreach ($empresas as $key => $empresa) 
		{
			if(stripos($empresa->logo, 'default.jpg'))
				continue;
			echo $empresa->logo."<br>";
			
			if($empresa->logo==NULL)continue;
				$this->resize_img("logos/".$empresa->logo,$destino,$width,$heigth);			
		}
	}
	private function resize_banners($destino,$width,$heigth)
	{		
		echo "Staring...<br>";
		$empresas=$this->empresa->get_all();
		foreach ($empresas as $key => $producto) 
		{
			echo $producto->nombre."<br>";
			foreach (explode(',',$producto->banners) as $key => $value) 
			{
				if($value==NULL)continue;
				$this->resize_img("banners/".$value,$destino,$width,$heigth);
			}
		}
	}
	public function resize_imagenes($destino,$width,$heigth)
	{
		echo "Staring...<br>";
		$empresas=$this->empresa->get_all();
		foreach ($empresas as $key => $producto) 
		{
			echo $producto->nombre."<br>";
			foreach (explode(',',$producto->imagenes) as $key => $value) 
			{
				if($value==NULL)continue;
				$this->resize_img("imagenes/".$value,$destino,$width,$heigth);
			}
		}
	}
	public function index()
	{
		#$this->resize_banners("SOP/banners/",284,1136);
		#$this->resize_imagenes("SOP/imagenes/",270,129);
		
		#$this->resize_conten("SOP/",235,155);
		#$this->resize_conten("index_carrouseles/",120,120);
		#$this->resize_conten("index_productos_principales/",184,122);
		#$this->resize_conten("index_productos_principales_mas_destacado/",266,148);
		#$this->resize_conten("listados/",175,155);
		#$this->resize_conten("pagina_producto/miniatura/",55,55);
		#$this->resize_conten("pagina_producto/visualizador/",316,160);
		$this->resize_conten("pagina_producto/galeria/",480,401);
		#$this->resize_conten("pagina_de_empresa/",220,185);
		#$this->resize_logos("index_carrouseles/logos/",120,120);
		
		#$this->resize_logos("index_productos_principales/logos/",184,41);
		#$this->resize_logos("index_productos_principales_mas_destacado/logos/",237,56);
		#$this->resize_logos("pagina_de_empresa/logos/",180,90);
		$this->resize_logos("SOP/logos1/",420,144);
		$this->resize_logos("SOP/logos2/",34,20);
		$this->resize_logos("SOP/logos3/",362,630);
	}
}