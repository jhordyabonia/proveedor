<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Editar_empresa extends CI_Controller {
	// Constructor de la clase del control
	function __construct()
       {
		parent::__construct();
		$this->load->model('new/Empresa_model', "empresa");
              $this->load->model('new/Usuarios_model', "usuarios");
		$this->load->model('new/Catalogo_model', "catalogo");		
	}

         public function destacados()
         {
              $empresa['destacados']=$this->input->post('destacados');
              echo "<PRE>";
              print_r($empresa);
              echo "</PRE>";
         }
	  public function contacto()
	  {
              $contacto['nombres']=$this->input->post('nombres');
              $contacto['cargo']=$this->input->post('cargo');
              $contacto['direccion']=$this->input->post('direccion');
              $contacto['pais']=$this->input->post('pais');
              $contacto['celular']=$this->input->post('celular');
              $contacto['telefono']=$this->input->post('telefono');
              $contacto['web']=$this->input->post('web');
              $contacto['facebook']=$this->input->post('facebook');
              $contacto['twitter']=$this->input->post('twitter');
              $contacto['linkedin']=$this->input->post('linkedin');
              echo "<PRE>";
              print_r($contacto);
              echo "</PRE>";

              $usuario=$this->session->userdata('id_usuario');
              $this->usuarios->update($contacto,$usuario);

	  }
	  public function catalogos()
	  {
              $catalogo['nombre']=$this->input->post('nombre');
              $catalogo['categoria']=$this->input->post('categoria');
              $catalogo['descripcion']=$this->input->post('descripcion');
              $catalogo['catalogo']=$this->input->post('catalogo');
              $catalogo['palabras_clave']=$this->input->post('palabras_clave');
              echo "<PRE>";
              print_r($catalogo);
              echo "</PRE>";

              $usuario=$this->session->userdata('id_usuario');
              $catalogo['empresa']=$this->empresa->get(array('usuario'=>$usuario))->id;
              $this->catalogo->insert($catalogo);
	  }
	  public function usuario()
	  {
              $usuario['usuario']=$this->input->post('usuario');
              $usuario['email']=$this->input->post('email');
              $usuario['password']=md5($this->input->post('password'));
              #$usuario['password2']=$this->input->post('password2');
              echo "<PRE>";
              print_r($usuario);
              echo "</PRE>";

              $id=$this->session->userdata('id_usuario');
              $this->usuarios->update($usuario,23514);
	  }
	  public function perfil()
	  {
              $perfil['nombre']=$this->input->post('nombre');
              $perfil['nit']=$this->input->post('nit');
              $perfil['tipo']=$this->input->post('tipo');
              $perfil['categorias']=$this->input->post('categoria');
              $perfil['descripcion']=$this->input->post('descripcion');
              $perfil['productos_principales']=$this->input->post('prod_princ');
              $perfil['productos_de_interes']=$this->input->post('prod_req');
              $perfil['logo']=$this->input->post('logo');
              #$perfil['radio']=$this->input->post('radio');
              echo "<PRE>";
              print_r($perfil);
              echo "</PRE>";

              $usuario=$this->session->userdata('id_usuario');
              $this->empresa->update($perfil,array('usuario'=>$usuario));
	  }  
	  public function nosotros()
	  {
              $nosotros['descripcion']=$this->input->post('nosotros');
              $nosotros['mision']=$this->input->post('mision');
              $nosotros['vision']=$this->input->post('vision');
              echo "<PRE>";
              print_r($nosotros);
              echo "</PRE>";

              $usuario=$this->session->userdata('id_usuario');
              $this->empresa->update($nosotros,array('usuario'=>$usuario));
	  } 
	  public function banners()
	  {
              echo "<PRE>";
              print_r($this->input->post('banners'));
              echo "</PRE>";
              $banners="";
              foreach ($this->input->post('banners') as $key => $value)
              {
                    $banners.=$value.",";
              }

              $usuario=$this->session->userdata('id_usuario');
              $this->empresa->update(array('banners'=>$banners),array('usuario'=>$usuario));
	  }
	   public function videos()
	  {            
              echo "<PRE>";
              print_r($this->input->post('videos'));
              echo "</PRE>";
              $videos="";
              foreach ($this->input->post('banners') as $key => $value)
              {
                    $videos.=$value.",";
              }

              $usuario=$this->session->userdata('id_usuario');
              $this->empresa->update(array('videos'=>$videos),array('usuario'=>$usuario));
	  }
	   public function imagenes()
	  {
              echo "<PRE>";
              print_r($this->input->post('imagenes'));
              echo "</PRE>";
              $imagenes="";
              foreach ($this->input->post('imagenes') as $key => $value)
              {
                    $imagenes.=$value.",";
              }

              $usuario=$this->session->userdata('id_usuario');
              $this->empresa->update(array('imagenes'=>$imagenes),array('usuario'=>$usuario));
	  }
	}