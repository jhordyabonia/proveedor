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
      {redirect(base_url(),'refresh');}
    $usuario=$this->usuario->get($this->id);
    $empresa=$this->empresa->get(array('usuario'=>$this->id));
	}

    public function destacados()
    {
             $datos['productos_destacados']=$this->input->post('destacados');
             #foreach ($this->input->post('destacados') as $key => $value)
             {
             # if(is_null($value)){continue;}
             # $datos['productos_destacados'].=$value.',';
             # echo $value."<br>";
             }
             #echo "<PRE>";
             #echo $datos['productos_destacados'];
             #echo "</PRE>";
             #return;
             $this->empresa->update($datos,array('usuario'=>$this->id));
             $this->session->set_flashdata('confimacion_guardado','TRUE');
             redirect($_SERVER['HTTP_REFERER'],'refresh');
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
              #if(strpos($datos['web'], 'http')<0)
              #echo "<PRE>";
              #print_r($datos);
              #echo "</PRE>";
              if(!is_int(strpos($datos['web'], 'http'))&&$datos['web']!="")
              {$datos['web']="http://".$datos['web'];}
              if(!is_int(strpos($datos['facebook'], 'http'))&&$datos['facebook']!="")
              {$datos['facebook']="http://".$datos['facebook'];}
              if(!is_int(strpos($datos['twitter'], 'http'))&&$datos['twitter']!="")
              {$datos['twitter']="http://".$datos['twitter'];}
              if(!is_int(strpos($datos['linkedin'], 'http'))&&$datos['linkedin']!="")
              {$datos['linkedin']="http://".$datos['linkedin'];}
              /*
              */

              $this->usuario->update($datos,$this->id);
              $this->session->set_flashdata('confimacion_guardado','TRUE');
              redirect($_SERVER['HTTP_REFERER'],'refresh');
	  }
	  public function catalogos()
	  {
              $datos['nombre']=$this->input->post('nombre');
              $datos['categoria']=$this->input->post('categoria');
              $datos['descripcion']=$this->input->post('descripcion');
              $datos['catalogo']=$this->archivos_empresa->archivo_adjunto('catalogo','catalogo/');
              $datos['catalogo']=str_replace(',', '', $datos['catalogo']);
              $datos['palabras_clave']=$this->input->post('palabras_clave');
              
              #echo "<PRE>";
              #print_r($_FILES);
              #echo "</PRE>";
              #return;

              $datos['empresa']=$this->empresa->get(array('usuario'=>$this->id))->id;
              $this->catalogo->insert($datos);
              $this->session->set_flashdata('confimacion_guardado','TRUE');
              redirect($_SERVER['HTTP_REFERER'],'refresh');
	  }
    public function borrar_catalogo($id)
    {
      $catalogo=$this->catalogo->get($id);
      $empresa=$this->empresa->get(array('usuario'=>$this->id))->id;
      if($catalogo)
      {
        $this->catalogo->delete(array('id'=>$id,'empresa'=>$empresa));
      }
      $this->session->set_flashdata('confimacion_guardado','TRUE');
      redirect($_SERVER['HTTP_REFERER'],'refresh');
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

              $actual['id']=$this->id;
              $actual['password']=md5($this->input->post('password_old'));
              $this->usuario->update($datos,$actual);              
              $this->session->set_flashdata('confimacion_guardado','TRUE');
              redirect($_SERVER['HTTP_REFERER'],'refresh');
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
              $this->session->set_flashdata('confimacion_guardado','TRUE');
              redirect($_SERVER['HTTP_REFERER'],'refresh');
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
              $this->session->set_flashdata('confimacion_guardado','TRUE');
              redirect($_SERVER['HTTP_REFERER'],'refresh');
	  } 
	  public function banners()
	  {        
              $eliminados=$this->input->post('banners_eliminados');
              $archivos_actuales=$this->empresa->get(array('usuario'=>$this->id))->banners;
              foreach (explode(',', $eliminados) as $key => $value)
              {
                if($value==''){continue;}
                $archivos_actuales=str_replace($value.',', '', $archivos_actuales);
                $archivos_actuales=str_replace(',,', ',', $archivos_actuales);
              }
              if(substr($archivos_actuales,strlen($archivos_actuales)-1)==',')
                {$banners=substr($archivos_actuales,1);}

              $banners.=$this->archivos_empresa->archivo_adjunto('banners','banners/');

              #echo "<PRE>";
              #print_r($banners);
              #echo "</PRE>";
              #return;
              $this->empresa->update(array('banners'=>$banners),array('usuario'=>$this->id));
              $this->session->set_flashdata('confimacion_guardado','TRUE');
              redirect($_SERVER['HTTP_REFERER'],'refresh');
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
              $this->session->set_flashdata('confimacion_guardado','TRUE');
              redirect($_SERVER['HTTP_REFERER'],'refresh');
	  }
	   public function imagenes()
	  {
              $datos="";
              foreach ($this->input->post('imagenes_titulos') as $key => $imagen)
              {
                if($imagen==''){$imagen="Imagen";}
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
                $archivos_actuales=str_replace(',,', ',', $archivos_actuales);
              }

              /*
              echo "<PRE>";
              print_r($archivos_actuales);
              echo "</PRE>";
              return;
              */
              $datos.='|'.$archivos_actuales.$archivos;
              $this->empresa->update(array('imagenes'=>$datos),array('usuario'=>$this->id));
              $this->session->set_flashdata('confimacion_guardado','TRUE');
              redirect($_SERVER['HTTP_REFERER'],'refresh');
	  }
	}