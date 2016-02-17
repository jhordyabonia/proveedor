<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_empresa extends CI_Controller {

    ///Constructor de la clase del control
  function __construct()
  {
    parent::__construct();
    $this->load->model('new/Producto_model', "producto");
    $this->load->model('new/Dimension_model', "dimension");
    $this->load->model('new/Usuarios_model', "usuario");
    $this->load->model('new/Empresa_model', "empresa");
    $this->load->model('new/Catalogo_model', "catalogo"); 
    $this->load->model('new/Categoria_model', "categoria"); 
    $this->load->model('new/Tipo_empresa_model', "tipo_empresa"); 
    $this->load->model('new/Pais_model', "pais"); 
    $this->load->model('new/Departamento_model', "departamento"); 
    $this->load->model('new/Municipio_model', "municipio"); 

    $id=$this->session->userdata('id_usuario');
    if($id=='')
      {redirect(base_url(),'refresh');}
    $this->datos['usuario']=$this->usuario->get($id);
    $this->datos['empresa']=$this->empresa->get(array('usuario'=>$id));
  }
  


    private function cargar_producto($dato)
    {
        $imagenes = explode(',', $dato->imagenes);

        $dato->imagenes = "default.jpg";
        foreach ($imagenes as $value) {
            if (!$value == "") {
                $dato->imagenes = $value;
                break;
            }
        }
        $dato->medida = $this->dimension->get($dato->medida)->nombre;

        if ($dato->precio_unidad == 0) {$dato->precio_unidad = "A convenir";}

        if ($dato->pedido_minimo == 0) {
            $dato->medida        = "";
            $dato->pedido_minimo = "A convenir";
        }

        return $dato;
    }
  
    public function producto($id)
    {
      $out=$this->producto->get($id);

      $imagen="default.jpg";
      foreach (explode(',',$out->imagenes) as $key => $value)
       {
        if($imagen!="")
          $imagen=$value;
       }
      echo $imagen.",".$out->nombre;
    }

    public function productos_empresa($id,$destacados,$page=0)
    {
        $productos = $this->producto->get_all(array('empresa' => $this->datos['empresa']->id));

        $datos['identificador_temporal'] =$id;
        $datos['productos'] = array();
        $numero_destacados=0;
        $datos['page']=$page;


        foreach ($productos as $key => $producto)
        {
          if(($key>=((20*$page)+$numero_destacados))&&($key<=(((20*($page+1))+$numero_destacados))))
          {    
            foreach (explode('A', $destacados) as $key => $destacado) 
            {
              if($producto->id==$destacado) 
                  $producto=NULL;
            }
            if(!is_null($producto))
              $datos['productos'][]=$this->cargar_producto($producto);
            else
              $numero_destacados++;
          }
        }
        #$datos['productos']=$productos;
        $this->load->view('config_OroPlatino/conf_productos_empresa.php', $datos);
    }

  ##LLama la vista que mostrara la parte del footer en las vistas
  function inicio()
  {
    
    $tmp=explode('|',$this->datos['empresa']->imagenes);
    $this->datos['titulos']=explode(',',$tmp[0]);
    $this->datos['imagenes']=explode(',',$tmp[1]);

    $this->load->view('template/head',array('titulo'=>"Configuración de Inicio"));
    $this->load->view('template/javascript',$this->datos);
    $this->load->view('config_OroPlatino/top_menu_config',$this->datos);
    $this->load->view('config_OroPlatino/conf_inicio',$this->datos);
    $this->load->view('popups/confirmacion/confirmacion_guardado');
    $this->load->view('template/footer',$this->datos);
    $this->load->view('template/footer_empy',$this->datos);
  }
  ##LLama la vista que mostrara la parte del footer en las vistas
  function cotizaciones()
  {
    $this->datos['tipos_empresa']=$this->tipo_empresa->get_all();
    $this->datos['categorias']=$this->categoria->get_all();
    $this->datos['unidades']=$this->dimension->get_all();
    $this->load->view('config_OroPlatino/top_menu_config',$this->datos);
    $this->load->view('config_OroPlatino/conf_coti_requeridas',$this->datos);
    $this->load->view('popups/confirmacion/confirmacion_guardado');
    $this->load->view('template/footer',$this->datos);
    $this->load->view('template/footer_empy',$this->datos);
    $this->load->view('template/javascript',$this->datos);
    $this->load->view('oferta/funcionalidades');
  }
  ##LLama la vista que mostrara la parte del footer en las vistas
  function contacto()
  {
    $this->datos['paises']=$this->pais->get_all();
    $this->datos['departamentos']=$this->departamento->get_all();
    $this->datos['municipios']=$this->municipio->get_all(array('id_departamento'=>$this->datos['usuario']->departamento));
    
    $this->load->view('template/head',array('titulo'=>'Configuración contacto'));
    $this->load->view('template/javascript',$this->datos);
    $this->load->view('config_OroPlatino/top_menu_config',$this->datos);
    $this->load->view('registro/funcionalidades_');
    $this->load->view('config_OroPlatino/conf_contacto',$this->datos);
    $this->load->view('popups/confirmacion/confirmacion_guardado');
    $this->load->view('template/footer',$this->datos);
    $this->load->view('template/footer_empy',$this->datos);
  }

  ##LLama la vista que mostrara la parte del footer en las vistas
  function nosotros()
  {
    $this->load->view('template/head',array('titulo'=>'Nosotros'));
    $this->load->view('template/javascript',$this->datos);
    $this->load->view('config_OroPlatino/top_menu_config',$this->datos);
    $this->load->view('config_OroPlatino/conf_nosotros',$this->datos);
    $this->load->view('popups/confirmacion/confirmacion_guardado');
    $this->load->view('template/footer',$this->datos);
    $this->load->view('template/footer_empy',$this->datos);
  }
  ##LLama la vista que mostrara la parte del footer en las vistas
  function usuario()
  {
    $this->load->view('template/head',array('titulo'=>'Configuración de usuario'));
    $this->load->view('template/javascript',$this->datos);
    $this->load->view('config_OroPlatino/top_menu_config',$this->datos);
    $this->load->view('config_OroPlatino/conf_usuario',$this->datos);
    $this->load->view('popups/confirmacion/confirmacion_guardado');
    $this->load->view('template/footer',$this->datos);
    $this->load->view('template/footer_empy',$this->datos);
    $this->load->view('registro/funcionalidades_');
  }

  ##LLama la vista que mostrara la parte del footer en las vistas
  function catalogo()
  {
    $this->datos['catalogos']=$this->catalogo->get_all(array('empresa'=>$this->datos['empresa']->id));
    $this->datos['categorias']=$this->categoria->get_all();
    $this->load->view('template/head',array('titulo'=>'Publicar catalogo'));
    $this->load->view('template/javascript',$this->datos);
    $this->load->view('config_OroPlatino/top_menu_config',$this->datos);
    $this->load->view('config_OroPlatino/conf_subir_catalogo',$this->datos);
    $this->load->view('popups/confirmacion/confirmacion_guardado');
    $this->load->view('template/footer',$this->datos);
    $this->load->view('template/footer_empy',$this->datos);
    $this->load->view('registro/funcionalidades_');
  }


  ##LLama la vista que mostrara la parte del footer en las vistas
  function perfil_empresa()
  {
    $this->datos['tipos_empresa']=$this->tipo_empresa->get_all();
    $this->datos['categorias']=$this->categoria->get_all();

    $this->load->view('template/head',array('titulo'=>'Perfil de empresa'));
    $this->load->view('registro/funcionalidades_');
    $this->load->view('config_OroPlatino/top_menu_config',$this->datos);
    $this->load->view('config_OroPlatino/conf_perfil_empresa',$this->datos);
    $this->load->view('popups/confirmacion/confirmacion_guardado');
    $this->load->view('template/footer',$this->datos);
    $this->load->view('template/footer_empy',$this->datos);
    $this->load->view('template/javascript',$this->datos);
  }
  ##LLama la vista que mostrara la parte del footer en las vistas
  function publicar_producto()
  {
    $this->datos['tipos_empresa']=$this->tipo_empresa->get_all();
    $this->datos['categorias']=$this->categoria->get_all();
    $this->datos['unidades']=$this->dimension->get_all();
    $this->load->view('template/head',array('titulo'=>'Subir productos'));
    $this->load->view('template/javascript',$this->datos);
    $this->load->view('config_OroPlatino/top_menu_config',$this->datos);
    $this->load->view('config_OroPlatino/conf_cata_produc',$this->datos);
    $this->load->view('popups/confirmacion/confirmacion_guardado');
    $this->load->view('template/footer',$this->datos);
    $this->load->view('template/footer_empy',$this->datos);
    $this->load->view('producto/funcionalidades');
  }

  ##LLama la vista que mostrara la parte del footer en las vistas
  function productos_principales()
  {
    $datos['empresa'] = $this->empresa->get($this->datos['empresa']->id);
    #$datos['productos'] = $this->producto->get_all(array('empresa'=>$this->datos['empresa']->id));
    $datos['destacados'] = array();# $this->producto->get_all(array('empresa'=>4264));
    if($datos['empresa']->productos_destacados!="")
    {
      foreach (explode(',',$datos['empresa']->productos_destacados) as $key => $value) 
      {
        if($value==-1)break;
        if(is_null($value)||$value==0)
          {
            $obj->nombre="Seleccionar producto";
            $obj->imagenes="file.jpg";
            $datos['destacados'][]=$obj;
          }else
        $datos['destacados'][]=$this->cargar_producto($this->producto->get($value));
      }
    }else{$datos['destacados']=FALSE;}
    $this->load->view('template/head',array('titulo'=>'Productos destacados'));
    $this->load->view('template/javascript',$this->datos);
    $this->load->view('config_OroPlatino/top_menu_config',$this->datos);
    $this->load->view('config_OroPlatino/conf_productos_principales',$datos);
    $this->load->view('popups/confirmacion/confirmacion_guardado');
    $this->load->view('template/footer',$this->datos);
    $this->load->view('template/footer_empy',$this->datos);
  }
  }