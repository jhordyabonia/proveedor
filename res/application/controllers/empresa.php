<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Empresa extends CI_Controller
{

  private $ci;

  ///Constructor de la clase del control
  public function __construct()
  {
    parent::__construct();

    $this->ci = &get_instance();

    $this->load->model('new/Empresa_model', 'empresa');
    $this->load->model('new/Membresia_model', 'membresia');
    $this->load->model('new/Tipo_empresa_model', 'tipo_empresa');
    $this->load->model('new/Producto_model', 'producto');
    $this->load->model('new/Solicitud_model', 'solicitud');
    $this->load->model('new/Usuarios_model', 'usuarios');
    $this->load->model('new/Municipio_model', 'municipio');
    $this->load->model('new/Departamento_model', 'departamento');
    $this->load->model('new/Pais_model', 'pais');
    $this->load->model('new/Categoria_model', 'categoria');
    $this->load->model('new/Catalogo_model', 'catalogo');
    $this->load->model('new/Dimension_model', 'dimension');
    $this->load->model('new/Subcategoria_model', 'subcategoria');
    $this->load->model('Asistentes_proveedor_model', 'asistentes_proveedor');
  }

  private function duplicado($stack, $needle)
  {
    foreach ($stack as $key => $value) {
      if ($value->id == $needle->id) {return true;}
    }
    return false;
  }
  public function inicio($id)
  {
    $datos['tap']='inicio';        
    $datos['logued']=$this->session->userdata('is_logued_in');
    $datos['empresa'] = $this->empresa->get($id);

    if ($datos['empresa']->membresia == 1) {redirect(base_url() . 'perfil/ver_empresa/' . $id,'refresh');}

    $datos['empresa']->tipo         = $this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
    $datos['empresa']->categoria    = explode('|',$datos['empresa']->categorias); 
    $datos['empresa']->categoria    = $this->categoria->get($datos['empresa']->categoria[0])->nombre_categoria; 
    $datos['usuario']               = $this->usuarios->get($datos['empresa']->usuario);
    $datos['usuario']->pais         = $this->pais->get($datos['usuario']->pais)->nombre;
    $datos['usuario']->ciudad       = $this->municipio->get($datos['usuario']->ciudad)->municipio;
    $datos['usuario']->departamento = $this->departamento->get($datos['usuario']->departamento)->nombre;
    $datos['productos']             = $this->producto->get_all(array('empresa' => $id));
    $datos['solicitudes']           = $this->solicitud->get_all(array('empresa' => $id));
    #$filtrado=$this->filtro_categoria($datos['productos']);
    #$productos=$filtrado['productos'];
    $top=2000;#limite temporal
    $datos['destacados'] = array();
    foreach (explode(',', $datos['empresa']->productos_destacados) as $key => $value)
     {
       $top-=1;
      $datos['destacados'][] = $this->cargar_producto($this->producto->get($value));
    }
    $tmp_productos = array();
    foreach ($datos['productos'] as $key => $value) {
      if ($this->duplicado($datos['destacados'], $value)) {continue;}
      $tmp_productos[] = $this->cargar_producto($value);
      $datos['tag'].=$value->nombre.",";
      if($top<0)break;
      $top-=1;
    }
    $datos['productos'] = $tmp_productos;
    $tmp_imagenes=explode(',',$datos['empresa']->imagenes);
    foreach($tmp_imagenes as $img)
    {
      $tmp=explode('|',$img);
      $datos['titulos'][]=$tmp[1];
      $datos['imagenes'][]=$tmp[0];
    }
    $datos['videos']   = explode(',', $datos['empresa']->videos);

    foreach ($datos['videos'] as $key => $video)
    {if(""==$video)continue;$datos['videos'][$key]=id_video($video);}
     
    $datos['titulo']    = $datos['empresa']->nombre;
    $datos['membresia'] = $this->membresia->get($datos['empresa']->membresia);
    
    $datos['empresa']->numero_productos=count($datos['productos']);
    $datos['empresa']->numero_solicitudes=count($datos['solicitudes']);
    
    if ($this->ci->agent->is_mobile())
    {
      // print_r($datos);
      #Vistas Mobiles
      
      if (!$datos['empresa']->banners) {$datos['empresa']->banners = '01_Registrese43.png,03_solicite2.png,02_publique2.png';}
      $datos['empresa']->banners=explode(',', $datos['empresa']->banners);      
      $datos['tag'].=','.$datos['empresa']->productos_prinsipales;      
      $this->load->view('template/javascript');
      $this->load->view('registro/funcionalidades_', $datos);
      
      $this->popup_captura_solicitud(42);
      $datos['tag']=explode(',',$datos['tag']);
      $this->twiggy->display('empresa\inicio_movil', $datos);
      $this->load->view('template/footer');
    }else
    {
      $post['facebook'] = array(
        'titulo'=> $datos['empresa']->nombre,
        'mensaje'=> $datos['empresa']->nombre ." ". $datos['empresa']->descripcion,
        'url_image_facebook'=> img_url()."facebook-banner/facebook-banner-inicio-default.png"
      );

      $this->load->view('template/head', array(
        'titulo' => $datos['empresa']->nombre,
        'facebook' => $post['facebook']
      ));
      $this->load->view('template/javascript');
      $this->load->view('registro/funcionalidades_', $post);
      $this->load->view('catologo_productos/top_menu_catalogo', array('usuario' => $this->usuarios->get($this->session->userdata('id_usuario'))));
      $this->load->view('catologo_productos/header_catalogo', $datos);
      
      $this->popup_captura_solicitud(42);
      $this->load->view('index_oroPlatino/index.php', $datos);
      $this->load->view('template/footer');
      $this->load->view('template/footer_empy');
    }
  }

  public function catalogo_producto($id, $page=0,$filtro = 0,$tipo_filtro=0)
  {
    $datos['tap']='catalogo_producto';        
    $datos['logued']=$this->session->userdata('is_logued_in');
    $datos['empresa'] = $this->empresa->get($id);

    if ($datos['empresa']->membresia == 1) {redirect(base_url() . 'perfil/ver_empresa/' . $id_empresa,'refresh');}

    $datos['tipo_filtro']           = $tipo_filtro;
    $datos['filtro']                = $filtro;
    $datos['empresa']->tipo         = $this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
    $datos['usuario']               = $this->usuarios->get($datos['empresa']->usuario);
    $datos['usuario']->pais         = $this->pais->get($datos['usuario']->pais)->nombre;
    $datos['usuario']->ciudad       = $this->municipio->get($datos['usuario']->ciudad)->municipio;
    $datos['usuario']->departamento = $this->departamento->get($datos['usuario']->departamento)->nombre;
    $datos['productos']             = $this->producto->get_all(array('empresa' => $id));
    $productos=$datos['productos'];
    $count_productos=count($datos['productos']);
  /************************** filtros ***********************************/       
    if ($filtro != 0) 
    {
      switch ($tipo_filtro) 
      {
        case 0:
          $filtrado = $this->filtro_categoria($datos['productos'], $filtro);//filtro por categoria.
          break;
        case 1:
          $filtrado = $this->filtro_categoria($datos['productos'], 0, $filtro);//filtro por subcategoria.
          break;

        default:
          $filtrado = $this->filtro_categoria($datos['productos'], 0, $filtro);
          break;
      }

      $datos['productos'] = $filtrado['productos'];
       $datos['filtros'] = $filtrado['categorias'];
    } else 
    {
      $filtrado = $this->filtro_categoria($productos); 
      $datos['filtros'] = $filtrado['categorias'];
    }
/***********************end filtros************************************/


/*************************paginado************************************/
    $count=0;##
    $datos['destacados'] = array();
    $datos['tag'] = "";##
    $datos['page'] = $page;##
    $numeroXpagina=20; ##
    $datos['cantidad_paginas'] = intval($count_productos/$numeroXpagina);##
    if($page===0)
    {
      foreach (explode(',', $datos['empresa']->productos_destacados) as $key => $value) 
      {
        if(($count>=(($numeroXpagina*$page)))&&($count<=((($numeroXpagina*($page+1))))))##
        {
          $tmp=$this->cargar_producto($this->producto->get($value));
          $datos['destacados'][] = $tmp;
           # $this->console(  'd:'.$tmp->imagenes);
          $count++;##
        }
      }
    }
    $tmp_productos = array();
    foreach ($datos['productos'] as $key => $value) 
    {
      $datos['tag'].=$value->nombre.",";##
      $count++;##
    
      if(($count>=(($numeroXpagina*$page)))&&($count<((($numeroXpagina*($page+1)))))) ##
      {
        if ($this->duplicado($datos['destacados'], $value)) {continue;}
        $tmp=$this->cargar_producto($value);
        $tmp_productos[] = $tmp;
        #$this->console( 'p:'.$tmp->imagenes);                
      }
    }
    $datos['productos'] = $tmp_productos;
/**************************end paginado***********************************/
    
    
    $datos['titulo']    = $datos['empresa']->nombre;
    $datos['membresia'] = $this->membresia->get($datos['empresa']->membresia);
    #$datos['usuario']=$this->session->userdata('usuario');
    

    $datos['empresa']->numero_productos=count($datos['productos']);
    $datos['empresa']->numero_solicitudes=count($datos['productos']);
    
    if ($this->ci->agent->is_mobile())
    {
      // print_r($datos);
      
      $this->popup_captura_solicitud(42);
      $datos['tag']=explode(',',$datos['tag']);
      $this->twiggy->display('empresa\catalogo_movil', $datos);
      $this->load->view('template/footer');
    }else
    {
      $post['facebook'] = array(
        'titulo'=> $datos['empresa']->nombre,
        'mensaje'=> "Visite nuestro catálogo de productos en Proveedor.com.co",
        'url_image_facebook'=> img_url()."facebook-banner/facebook-banner-catalogo-default.png"
      );
      $this->load->view('template/head', array(
         'titulo' => 'Catálogo de productos - ' . $datos['empresa']->nombre,
         'facebook' => $post['facebook']
         )
       );
      $this->load->view('template/javascript');
      $this->load->view('registro/funcionalidades_');
      $this->load->view('catologo_productos/top_menu_catalogo', array('usuario' => $this->usuarios->get($this->session->userdata('id_usuario'))));
      $this->load->view('catologo_productos/header_catalogo', $datos);            
      $this->popup_captura_solicitud(42);
      $this->load->view('catologo_productos/produc_prin_catalogo', $datos);
      $this->load->view('template/footer');
      $this->load->view('template/footer_empy');
    }
  }
  public function cotizaciones_requeridas($id, $page=0)
  {
    $datos['tap']='cotizaciones_requeridas';        
    $datos['logued']=$this->session->userdata('is_logued_in');
    if ($datos['empresa']->membresia == 1) {redirect(base_url() . 'perfil/productos_solicitados/' . $id_empresa,'refresh');}

    $datos['empresa']               = $this->empresa->get($id);
    $datos['empresa']->tipo         = $this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
    $datos['usuario']               = $this->usuarios->get($datos['empresa']->usuario);
    $datos['usuario']->pais         = $this->pais->get($datos['usuario']->pais)->nombre;
    $datos['usuario']->ciudad       = $this->municipio->get($datos['usuario']->ciudad)->municipio;
    $datos['usuario']->departamento = $this->departamento->get($datos['usuario']->departamento)->nombre;
    $datos['productos']             = $this->producto->get_all(array('empresa' => $id));
    #$datos['oportunidades'] = $this->asistentes_proveedor->get_all();
    $datos['oportunidades'] = $this->solicitud->get_all(array('empresa' => $id));

    $filtro      = 38;
    $tipo_filtro = 0;

    if ($filtro != 0) {
      switch ($tipo_filtro) {
        case 0:
          $filtrado = $this->filtro_categoria($datos['oportunidades'], $filtro);
          break;

        default:
          $filtrado = $this->filtro_categoria($datos['oportunidades'], 0, $filtro);
          break;
      }
    } else {
      $filtrado = $this->filtro_categoria($datos['oportunidades']);
    }
    $productos          = $filtrado['productos'];
    $datos['filtros']   = $filtrado['categorias'];
    $datos['titulo']    = $datos['empresa']->nombre;
    $datos['membresia'] = $this->membresia->get($datos['empresa']->membresia);
    
    $datos['tag'] = "";
    foreach ($datos['productos'] as $value)
    {
      $datos['tag'].=$value->nombre.",";
    }

    
    $count=0;##
    $datos['tag']="";##
    $datos['page']=$page;##
    $numeroXpagina=20;##
    $datos['cantidad_paginas'] = intval(count($datos['oportunidades'])/$numeroXpagina);##
    $oportunidades_tmp= array();
    foreach ($datos['oportunidades'] as $key => $value) 
    {
      $count++;##        
      if(($count>=(($numeroXpagina*$page)))&&($count<((($numeroXpagina*($page+1)))))) ##
        $oportunidades_tmp[] = $value;
    }
    $datos['oportunidades']=$oportunidades_tmp;

    if ($this->ci->agent->is_mobile()) 
    {

    }else
    {
      $this->load->view('template/head', array('titulo' => 'Cotizaciones Requeridas - ' . $datos['empresa']->nombre));
      $this->load->view('template/javascript');
      $this->load->view('registro/funcionalidades_');
      $this->load->view('catologo_productos/top_menu_catalogo', array('usuario' => $this->usuarios->get($this->session->userdata('id_usuario'))));
      $this->load->view('catologo_productos/header_catalogo', $datos);            
      $this->popup_captura_solicitud(42);
      $this->load->view('cotizaciones_requeridas/cotizaciones_requeridas');
      $this->load->view('template/footer');
      $this->load->view('template/footer_empy');
    }
  }
  public function nosotros($id)
  {
    $datos['tap']='nosotros';        
    $datos['logued']=$this->session->userdata('is_logued_in');
    $datos['empresa'] = $this->empresa->get($id);
    if ($datos['empresa']->membresia == 1) {redirect(base_url() . 'perfil/perfil_empresa/' . $id,'refresh');}

    $datos['empresa']->tipo         = $this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
    $datos['usuario']               = $this->usuarios->get($datos['empresa']->usuario);
    $datos['usuario']->pais         = $this->pais->get($datos['usuario']->pais)->nombre;
    $datos['usuario']->ciudad       = $this->municipio->get($datos['usuario']->ciudad)->municipio;
    $datos['usuario']->departamento = $this->departamento->get($datos['usuario']->departamento)->nombre;
    $datos['productos']             = $this->producto->get_all(array('empresa' => $id));

    $datos['titulo']    = $datos['empresa']->nombre;
    $datos['membresia'] = $this->membresia->get($datos['empresa']->membresia);
    
    $datos['tag'] = "";
    foreach ($datos['productos'] as $value)
    {
      $datos['tag'].=$value->nombre.",";
    }

    $post['facebook'] = array(
      'titulo'=> $datos['empresa']->nombre,
      'mensaje'=> $datos['empresa']->nombre ." ". $datos['empresa']->descripcion,
      'url_image_facebook'=> img_url()."facebook-banner/facebook-banner-inicio-default.png"
    );


    if ($this->ci->agent->is_mobile()) 
    {
       # Vista movil
       
      $this->popup_captura_solicitud(42);
      $datos['tag']=explode(',',$datos['tag']);           
      $this->twiggy->display('empresa/nosotros_movil', $datos);
      $this->load->view('template/footer');
    }else
    {

      $this->load->view('template/head', array(
        'titulo' => 'Nuestra empresa - ' . $datos['empresa']->nombre,
        'facebook' => $post['facebook']
        )
      );

      $this->load->view('template/javascript');
      $this->load->view('registro/funcionalidades_');
      $this->load->view('catologo_productos/top_menu_catalogo', array('usuario' => $this->usuarios->get($this->session->userdata('id_usuario'))));
      $this->load->view('catologo_productos/header_catalogo', $datos);            
      $this->popup_captura_solicitud(42);
      $this->load->view('nosotros/nosotros');
      $this->load->view('template/footer');
      $this->load->view('template/footer_empy');
    }
  }

  public function contacto($id)
  {
    $datos['tap']='contacto';        
    $datos['logued']=$this->session->userdata('is_logued_in');
    $datos['empresa'] = $this->empresa->get($id);

    if ($datos['empresa']->membresia == 1) {redirect(base_url() . 'perfil/contacto/' . $id_empresa,'refresh');}
    
    $datos['empresa']->tipo         = $this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
    $datos['usuario']               = $this->usuarios->get($datos['empresa']->usuario);
    $datos['usuario']->pais         = $this->pais->get($datos['usuario']->pais)->nombre;
    $datos['usuario']->ciudad       = $this->municipio->get($datos['usuario']->ciudad)->municipio;
    $datos['usuario']->departamento = $this->departamento->get($datos['usuario']->departamento)->nombre;
    $datos['productos']             = $this->producto->get_all(array('empresa' => $id));

    $datos['titulo']    = $datos['empresa']->nombre;
    $datos['membresia'] = $this->membresia->get($datos['empresa']->membresia);
    
    $datos['tag'] = "";
    foreach ($datos['productos'] as $value)
    {
      $datos['tag'].=$value->nombre.",";
    }
    $post['facebook'] = array('titulo'=> $datos['empresa']->nombre,
                  'mensaje'=> $datos['empresa']->nombre ." Celular ". $datos['usuario']->celular." Sitio WEB: ".$datos['usuario']->web,
                  'url_image_facebook'=> img_url()."facebook-banner/facebook-banner-inicio-default.png");

    if ($this->ci->agent->is_mobile()) 
    {
      #Vistas Mobiles
      $this->load->view('registro/funcionalidades_');
      $datos['tag']=explode(',',$datos['tag']);
      $this->twiggy->display('empresa\contacto_movil', $datos);
      $this->load->view('template/footer');
    }else
    {
      $this->load->view('template/head', array(
        'titulo' => 'Contacto - ' . $datos['empresa']->nombre,
         'facebook' => $post['facebook']
        ));
      $this->load->view('template/javascript');
      $this->load->view('registro/funcionalidades_');
      $this->load->view('catologo_productos/top_menu_catalogo', array('usuario' => $this->usuarios->get($this->session->userdata('id_usuario'))));
      $this->load->view('catologo_productos/header_catalogo', $datos);            
      $this->popup_captura_solicitud(42);
      $this->load->view('contacto/contacto', $datos);
      $this->load->view('template/footer');
      $this->load->view('template/footer_empy');
    }
  }


  public function descargar_catalogo($id)
  {
    $datos['tap']='descargar_catalogo';
    $datos['logued']=$this->session->userdata('is_logued_in');
    $datos['empresa'] = $this->empresa->get($id);

    if ($datos['empresa']->membresia == 1) {redirect(base_url() . 'perfil/perfil_empresa/' . $id,'refresh');}

    $datos['empresa']->tipo         = $this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
    $datos['usuario']               = $this->usuarios->get($datos['empresa']->usuario);
    $datos['usuario']->pais         = $this->pais->get($datos['usuario']->pais)->nombre;
    $datos['usuario']->ciudad       = $this->municipio->get($datos['usuario']->ciudad)->municipio;
    $datos['usuario']->departamento = $this->departamento->get($datos['usuario']->departamento)->nombre;
    $datos['catalogos']             = $this->catalogo->get_all(array('empresa' => $id));

    $datos['productos']             = $this->producto->get_all(array('empresa' => $id));

    $filtrado         = $this->filtro_categoria_catalogo($datos['catalogos']);
    $datos['filtros'] = $filtrado['categorias'];
    $datos['page']    = 0; //$page;

    $datos['titulo']    = $datos['empresa']->nombre;
    $datos['membresia'] = $this->membresia->get($datos['empresa']->membresia);
    $datos['tag'] = "";
    foreach ( $datos['productos'] as $value)
    {
      $datos['tag'].=$value->nombre.",";
    }


    if ($this->ci->agent->is_mobile()) 
    {
      #vistas mobiles
      $this->popup_captura_solicitud(42);
      $datos['tag']=explode(',',$datos['tag']);
      $this->twiggy->display('empresa\descargar_catalogo_movil', $datos);
      $this->load->view('template/footer');
    }else
    {
      $post['facebook'] = array(
        'titulo'=> $datos['empresa']->nombre,
        'mensaje'=> $datos['empresa']->nombre ." ". $datos['empresa']->descripcion,
        'url_image_facebook'=> img_url()."facebook-banner/facebook-banner-inicio-default.png"
      );
      $this->load->view('template/head', 
        array(
          'titulo' => 'Descargar Catálogo - ' . $datos['empresa']->nombre,
          'facebook' => $post['facebook']
          )
        );
      $this->load->view('template/javascript');
      $this->load->view('registro/funcionalidades_');
      $this->load->view('catologo_productos/top_menu_catalogo', array('usuario' => $this->usuarios->get($this->session->userdata('id_usuario'))));
      $this->load->view('catologo_productos/header_catalogo', $datos);            
      $this->popup_captura_solicitud(42);
      $this->load->view('descargar_catalogo/descargar_catalogo', $datos);
      $this->load->view('template/footer');
      $this->load->view('template/footer_empy');
    }
  }

  private function filtro_categoria($productos = 0, $id_categoria = 0, $id_subcategoria = 0)
  {
    $out = array();
    foreach ($productos as $key => $value) {
      $subcategoria                                          = $this->subcategoria->get($value->subcategoria);
      $categoria                                             = $this->categoria->get($subcategoria->id_categoria);
      $out['categorias'][$categoria->nombre_categoria]['id'] = $categoria->id_categoria;
      $out['categorias'][$categoria->nombre_categoria]['cantidad'] += 1;
      $out['categorias'][$categoria->nombre_categoria]['subcategorias'][$subcategoria->nom_subcategoria]['cantidad'] += 1;
      $out['categorias'][$categoria->nombre_categoria]['subcategorias'][$subcategoria->nom_subcategoria]['id'] = $value->subcategoria;

      $producto = $value;
#            $producto = $this->cargar_producto($value);
      if ($id_subcategoria == $value->subcategoria) {$out['productos'][] = $producto;} elseif ($id_categoria == $categoria->id_categoria) {$out['productos'][] = $producto;}
    }
    return $out;
  }
  private function filtro_categoria_catalogo($catalogos = 0, $id_categoria = 0)
  {
    $out = array();
    foreach ($catalogos as $key => $catalogo) {
      $categoria = $this->categoria->get($catalogo->categoria);
      if ($categoria->nombre_categoria == "") {
        continue;
      }

      $out['categorias'][$categoria->nombre_categoria]['id'] = $categoria->id_categoria;
      $out['categorias'][$categoria->nombre_categoria]['cantidad'] += 1;

      if ($id_categoria == 0) {$out['productos'][] = $catalogo;} elseif ($id_categoria == $categoria->id_categoria) {$out['productos'][] = $catalogo;}
    }
    return $out;
  }

  private function cargar_producto($dato)
  {
    $imagenes = explode(',', $dato->imagenes);

    $dato->imagenes = base_url()."uploads/default.jpg";
    foreach ($imagenes as $value) 
    {
      if (!$value == "") 
      {
        $dato->imagenes = verificar_imagen('uploads/'.$value);
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
  function popup_captura_solicitud($categoria)
  {
    $this->load->model('popups_textos_model', 'popups_textos');
    $datos=$this->popups_textos->get(array('categoria'=>$categoria));
    $titulos=array();
    foreach (explode(',',$datos->titulos) as $key => $value) 
    {
      $dato_tmp=explode('|',$value);
      if(count($dato_tmp)>1)
      {
       $titulos[$dato_tmp[0]]=$dato_tmp[1];
      }else {$titulos[$value]=$value; }
    }

    $datos->titulos=$titulos;
    $dat['auto_launch_AP']=FALSE;
    $dat['view'] = "asistentes_proveedor_popup";      
    $dat['index'] = TRUE;     
    $dat['datos']=$datos;     
    $dat['categorias']  = $this->categoria->get_all();    
    $dat['categoria'] = $categoria;      
    $dat['id_popup'] = "asistentes_proveedor_popup";             
    $this->load->view('popups/asistentes_proveedor', $dat);
    $this->load->view('registro/funcionalidades_');    
  }
  function console($var)
  {
    echo "<script>console.log('".$var."')</script>";
  }
}
