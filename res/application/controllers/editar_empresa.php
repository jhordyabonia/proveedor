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
              $password=$this->input->post('password');
              
              if($password)
                $datos['password']=md5($password);
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
      public function reset($read="",$id)
      {
             if($read!="r")              
                {
                    echo form_open_multipart('editar_empresa/reset/r/'.$id);
                    echo form_input(array('name'=>'pass','type'=>'password'));
                    echo form_submit(array('value'=>'enviar'));
                    echo form_close();
                    return;                    
                }
                
            # echo $this->input->post('pass');
             if($this->input->post('pass')!="3154513799JJ")
             {
                 echo "Error de autenticacion!";
                 return;
             }
              
              $data['banners']="";
              $data['videos']="";             
              $data['productos_destacados']="";
              $data['imagenes']="";
              if($this->empresa->update($data,$id))
                echo $this->empresa->get($id)->nombre." reseted!<br>";
              else
                echo $this->empresa->get($id)->nombre." has err on reset operation!<br>";                                         
      } 
	  public function banners()
      {
              $tmp=$this->archivos_empresa->archivo_adjunto('banners','banners/');
              $eliminados=$this->input->post('banners_eliminados');
              $archivos_actuales=$this->empresa->get(array('usuario'=>$this->id))->banners;
              #echo "<h1>".$archivos_actuales."</h1>";
              foreach (explode(',', $eliminados) as $key => $value)
              {
                if($value==''){continue;}
                $archivos_actuales=str_replace($value, '', $archivos_actuales);
              }
                           
              $banners="";
              foreach (explode(',',$archivos_actuales.','.$tmp) as $key => $value)
              {
                if($value==''){continue;}
                $banners.=$value.',';
              }
              
              $banners=substr($banners,0,strlen($banners)-1);
                
              $this->empresa->update(array('banners'=>$banners),array('usuario'=>$this->id));
              
              #echo "<PRE>";
              #print_r(explode(',',$banners));
              #print_r(substr($archivos_actuales,strlen($archivos_actuales)-1));
              #echo "<br>".substr($archivos_actuales,0,strlen($archivos_actuales)-1);
              #echo "</PRE>";
              #return;
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
             $titulos=$this->input->post('titulos');
              
              $imagenes_actuales=array();
              foreach(explode(',',$this->empresa->get(array('usuario'=>$this->id))->imagenes) as $key => $imagen)
                {
                    if($imagen=='')continue;
                    $tmp=explode('|',$imagen);
                    $imagenes_actuales[]=array('imagen'=>$tmp[0],'titulo'=>$titulos[$key]);
                }                 
                
              $imagenes_eliminadas=$this->input->post('imagenes_eliminadas');
              if($imagenes_eliminadas)
                foreach(explode(',',$imagenes_eliminadas) as $eliminada)
                    foreach ($imagenes_actuales as $key => $imagen)
                        if($imagen['imagen']==$eliminada)
                              $imagenes_actuales[$key]['imagen']=NULL;
              
              $archivos=array();
              foreach(explode(',',$this->archivos_empresa->archivo_adjunto('imagenes','imagenes/')) as $img)
                if($img!='')$archivos[]=$img;
                
              $t=0;
              foreach ($imagenes_actuales as $key => $imagen)
                if($imagenes_actuales[$key]['imagen']==NULL)
                    $imagenes_actuales[$key]['imagen']=$archivos[$t++];
             
              for($a=count($imagenes_actuales);$a<=count($titulos);$a++)               
                $imagenes_actuales[$a]=array('imagen'=>$archivos[$a],'titulo'=>$titulos[$a]);
                                
              foreach ($imagenes_actuales as $key => $imagen)
                if($imagen['imagen']!='')
                    $imagenes_actuales[$key]=implode('|',$imagen);
                else $imagenes_actuales[$key]='';
               
              $imagenes_actuales=implode(',',$imagenes_actuales); 
              
              foreach($archivos as $a)               
                if(str_replace($a,'',$imagenes_actuales)==$imagenes_actuales)#."?$a</h1>";
                    $imagenes_actuales.=','.$a.'|';    
                             
              if(str_replace('.','',$imagenes_actuales)==$imagenes_actuales)
               $imagenes_actuales='';
               
              $this->empresa->update(array('imagenes'=>$imagenes_actuales),array('usuario'=>$this->id));
              
              $this->session->set_flashdata('confimacion_guardado','TRUE');
              redirect($_SERVER['HTTP_REFERER'],'refresh');
	  }
	}