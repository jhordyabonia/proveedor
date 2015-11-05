<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Editar_empresa extends CI_Controller {
	// Constructor de la clase del control
	function __construct()
       {
		parent::__construct();
    $this->load->model('new/Producto_model', "producto");
    $this->load->model('new/Usuarios_model', "usuario");
    $this->load->model('new/Empresa_model', "empresa");
    $this->load->model('new/Catalogo_model', "catalogo");   
		$this->load->model('new/Archivos_empresa_model', "archivos_empresa");		

    $this->id=$this->session->userdata('id_usuario');
    if($this->id=='')
      {redirect(base_url());}
    $usuario=$this->usuario->get($this->id);
    $empresa=$this->empresa->get(array('usuario'=>$this->id));
	}

    public function destacados()
    {
             $datos['productos_destacados']=$this->input->post('destacados');
             #echo "<PRE>";
             #print_r($datos);
             #echo "</PRE>";
             $this->empresa->update($datos,array('usuario'=>$this->id));
             redirect($_SERVER['HTTP_REFERER']);
    }
	  public function contacto()
	  {
              $datos['nombres']=$this->input->post('nombres');
              $datos['cargo']=$this->input->post('cargo');
              $datos['direccion']=$this->input->post('direccion');
              $datos['pais']=$this->input->post('pais');
              $datos['departamento']=$this->input->post('provincia');
              $datos['ciudad']=$this->input->post('municipio');
              $datos['celular']=$this->input->post('celular');
              $datos['telefono']=$this->input->post('telefono');
              $datos['web']=$this->input->post('web');
              $datos['facebook']=$this->input->post('facebook');
              $datos['twitter']=$this->input->post('twitter');
              $datos['linkedin']=$this->input->post('linkedin');
              #echo "<PRE>";
              #print_r($datos);
              #echo "</PRE>";

              $this->usuario->update($datos,$this->id);
              redirect($_SERVER['HTTP_REFERER']);
	  }
	  public function catalogos()
	  {
              $datos['nombre']=$this->input->post('nombre');
              $datos['categoria']=$this->input->post('categoria');
              $datos['descripcion']=$this->input->post('descripcion');
              $datos['catalogo']=$this->input->post('catalogo');
              $datos['palabras_clave']=$this->input->post('palabras_clave');
              #echo "<PRE>";
              #print_r($datos);
              #echo "</PRE>";

              $datos['empresa']=$this->empresa->get(array('usuario'=>$this->id))->id;
              $this->catalogo->insert($datos);
              redirect($_SERVER['HTTP_REFERER']);
	  }
	  public function usuario()
	  {
              $datos['usuario']=$this->input->post('usuario');
              $datos['email']=$this->input->post('email');
              $datos['password']=md5($this->input->post('password'));
              #$usuario['password2']=$this->input->post('password2');
              #echo "<PRE>";
              #print_r($datos);
              #echo "</PRE>";

              $this->usuario->update($usuario,$this->id);
              redirect($_SERVER['HTTP_REFERER']);
	  }
	  public function perfil()
	  {
              $datos['nombre']=$this->input->post('nombre');
              $datos['nit']=$this->input->post('nit');
              $datos['tipo']=$this->input->post('tipo');
              $datos['categorias']=$this->input->post('categoria').'|';
              $datos['descripcion']=$this->input->post('descripcion');
              $datos_usuario['rol']=$this->input->post('radio');
              $datos['productos_principales']=$this->input->post('prod_princ');
              $datos['productos_de_interes']=$this->input->post('prod_int4');
              $logo=$this->archivos_empresa->archivo_adjunto('logo','logos/');
              $logo=substr($logo,0,strlen($logo)-1);
              if(strpos($logo, '.')>0){$datos['logo']=$logo;}
              #$perfil['radio']=$this->input->post('radio');
              #echo "<PRE>";
              #print_r($datos);
              #echo "</PRE>";

              $this->usuario->update($datos_usuario,$this->id);
              $this->empresa->update($datos,array('usuario'=>$this->id));
              redirect($_SERVER['HTTP_REFERER']);
	  }  
	  public function nosotros()
	  {
              $datos['descripcion']=$this->input->post('nosotros');
              $datos['mision']=$this->input->post('mision');
              $datos['vision']=$this->input->post('vision');
              #echo "<PRE>";
              #print_r($datos);
              #echo "</PRE>";

              $this->empresa->update($datos,array('usuario'=>$this->id));
              redirect($_SERVER['HTTP_REFERER']);
	  } 
	  public function banners()
	  {        
              $banners=$this->archivos_empresa->archivo_adjunto('banners','banners/');
              
              $this->empresa->update(array('banners'=>$banners),array('usuario'=>$this->id));
              redirect($_SERVER['HTTP_REFERER']);
	  }
	   public function videos()
	  {            
              $datos="";
              foreach ($this->input->post('videos') as $key => $value)
              {
                    if($value=='')
                    { continue; }
                    if(strpos($value, 'embed')>0)
                    {
                      $datos.=$value.',';
                      continue;
                    }
                    $video=explode('watch?v=', $value);
                    $video=explode('&', $video[1]);
                    $datos.="https://www.youtube.com/embed/".$video[0].",";
              }
              $usuario=$this->session->userdata('id_usuario');
              $this->empresa->update(array('videos'=>$datos),array('usuario'=>$usuario));
              redirect($_SERVER['HTTP_REFERER']);
	  }
	   public function imagenes()
	  {
              $datos="";
              foreach ($this->input->post('imagenes_titulos') as $key => $imagen)
              {
                 $datos.=$imagen.",";
              }
              $archivos=$this->archivos_empresa->archivo_adjunto('imagenes','imagenes/');
              $eliminados=$this->input->post('eliminados');
              $archivos_actuales=$this->empresa->get(array('usuario'=>$this->id))->imagenes;
              $archivos_actuales=explode('|',$archivos_actuales);
              $archivos_actuales=$archivos_actuales[1];
              foreach (explode(',', $eliminados) as $key => $value)
              {
                $archivos_actuales=str_replace($value, '', $archivos_actuales);
              }
              $datos.='|'.$archivos_actuales.$archivos;

              #echo "<PRE>";
              #print_r($eliminados);
              #echo "</PRE>";

              $this->empresa->update(array('imagenes'=>$datos),array('usuario'=>$this->id));
              redirect($_SERVER['HTTP_REFERER']);
	  }
	}