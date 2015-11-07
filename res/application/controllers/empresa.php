<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa extends CI_Controller 
{

    ///Constructor de la clase del control
  function __construct()
  {
    parent::__construct();
    $this->load->model('new/Empresa_model','empresa');
    $this->load->model('new/Membresia_model','membresia');
    $this->load->model('new/Tipo_empresa_model','tipo_empresa');
    $this->load->model('new/Producto_model','producto');
    $this->load->model('new/Solicitud_model','solicitud');
    $this->load->model('new/Usuarios_model','usuarios');
    $this->load->model('new/Municipio_model','municipio');
    $this->load->model('new/Departamento_model','departamento');
    $this->load->model('new/Pais_model','pais');
    $this->load->model('new/Categoria_model','categoria');
    $this->load->model('new/Catalogo_model','catalogo');
    $this->load->model('new/Dimension_model','dimension');
    $this->load->model('new/Subcategoria_model','subcategoria');
    $this->load->model('Asistentes_proveedor_model','asistentes_proveedor');
  }   
  private function duplicado($stack,$needle)
  {
    foreach ($stack as $key => $value) 
    {
      if($value==$needle){return TRUE;}
    }
    return FALSE;
  }
  function inicio($id)
  {
    $datos['empresa']= $this->empresa->get($id); 
    $datos['empresa']->tipo=$this->tipo_empresa->get($datos['empresa']->tipo)->tipo;   
    $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
    $datos['productos'] = $this->producto->get_all(array('empresa'=>$id));
   
    #$filtrado=$this->filtro_categoria($datos['productos']);
    #$productos=$filtrado['productos'];
    $datos['destacados']=array();
    foreach (explode(',',$datos['empresa']->productos_destacados) as $key => $value)
    {
      $datos['destacados'][]=$this->producto->get($value);
    }
    $tmp_productos=array();
    foreach ($datos['productos'] as $key => $value)
    {
      if($this->duplicado($datos['destacados'],$value))
        {continue;}
      $tmp_productos[]=$value;
    }
    $datos['productos']=$tmp_productos;
    $tmp=explode('|',$datos['empresa']->imagenes);
    $datos['titulos']=explode(',',$tmp[0]);
    $datos['imagenes']=explode(',',$tmp[1]);

    $datos['titulo'] = $datos['empresa']->nombre;
    $datos['membresia']=$this->membresia->get($datos['empresa']->membresia);

    $this->load->view('template/head');
    $this->load->view('template/javascript');
    $this->load->view('registro/funcionalidades_');
    $this->load->view('catologo_productos/top_menu_catalogo',array('usuario'=>$this->usuarios->get($this->session->userdata('id_usuario'))));
    $this->load->view('catologo_productos/header_catalogo',$datos);
    $this->load->view('index_oroPlatino/index.php',$datos);
    $this->load->view('template/footer');
    $this->load->view('template/footer_empy');    
  }
  function catalogo_producto($id)
  {
    $datos['empresa'] = $this->empresa->get($id);    
    $datos['empresa']->tipo=$this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
    $datos['usuario'] = $this->usuarios->get($datos['empresa']->usuario);
    $datos['productos'] = $this->producto->get_all(array('empresa'=>$id));
   
    #$filtrado=$this->filtro_categoria($datos['productos']);
    #$productos=$filtrado['productos'];
    $datos['destacados']=array();
    foreach (explode(',',$datos['empresa']->productos_destacados) as $key => $value)
    {
      $datos['destacados'][]=$this->producto->get($value);
    }
    $tmp_productos=array();
    foreach ($datos['productos'] as $key => $value)
    {
      if($this->duplicado($datos['destacados'],$value))
        {continue;}
      $tmp_productos[]=$value;
    }
    $datos['productos']=$tmp_productos;

    $filtro=38;
    $tipo_filtro=0;

    if($filtro!=0)
    {
      switch ($tipo_filtro) 
      {
        case 0:
            $filtrado=$this->filtro_categoria($datos['productos'],$filtro); 
          break;
        
        default:
            $filtrado=$this->filtro_categoria($datos['productos'],0,$filtro); 
            break;
      }
    }else
    {
      $filtrado=$this->filtro_categoria($datos['productos']);
    }
    $productos=$filtrado['productos'];
    $datos['filtros']=$filtrado['categorias'];
    $datos['page']=0;//$page;
    
    $datos['titulo'] = $datos['empresa']->nombre;
    $datos['membresia']=$this->membresia->get($datos['empresa']->membresia);
    #$datos['usuario']=$this->session->userdata('usuario');

    $this->load->view('template/head');
    $this->load->view('template/javascript');
    $this->load->view('registro/funcionalidades_');
    $this->load->view('catologo_productos/top_menu_catalogo',array('usuario'=>$this->usuarios->get($this->session->userdata('id_usuario'))));
    $this->load->view('catologo_productos/header_catalogo',$datos);
    $this->load->view('catologo_productos/produc_prin_catalogo',$datos);
    $this->load->view('template/footer');
    $this->load->view('template/footer_empy');
  }


  function contacto($id)
  {
    $datos['empresa']= $this->empresa->get($id);  
    $datos['empresa']->tipo=$this->tipo_empresa->get($datos['empresa']->tipo)->tipo;  
    $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
    $datos['productos'] = $this->producto->get_all(array('empresa'=>$id));

    $datos['titulo'] = $datos['empresa']->nombre;
    $datos['membresia']=$this->membresia->get($datos['empresa']->membresia);

    $datos['usuario']->pais=$this->pais->get($datos['usuario']->pais)->nombre;
    $datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
    $datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;

    $this->load->view('template/head');
    $this->load->view('template/javascript');    
    $this->load->view('registro/funcionalidades_');
    $this->load->view('catologo_productos/top_menu_catalogo',array('usuario'=>$this->usuarios->get($this->session->userdata('id_usuario'))));
    $this->load->view('catologo_productos/header_catalogo',$datos);
    $this->load->view('contacto/contacto',$datos);
    $this->load->view('template/footer');
    $this->load->view('template/footer_empy');
  }

  function cotizaciones_requeridas($id)
  {
    $datos['empresa']= $this->empresa->get($id);  
    $datos['empresa']->tipo=$this->tipo_empresa->get($datos['empresa']->tipo)->tipo;  
    $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
    $datos['productos'] = $this->producto->get_all(array('empresa'=>$id));
    #$datos['oportunidades'] = $this->asistentes_proveedor->get_all();
    $datos['oportunidades'] = $this->solicitud->get_all(array('empresa'=>$id));

    $filtro=38;
    $tipo_filtro=0;

    if($filtro!=0)
    {
      switch ($tipo_filtro) 
      {
        case 0:
            $filtrado=$this->filtro_categoria($datos['productos'],$filtro); 
          break;
        
        default:
            $filtrado=$this->filtro_categoria($datos['productos'],0,$filtro); 
            break;
      }
    }else
    {
      $filtrado=$this->filtro_categoria($datos['productos']);
    }
    $productos=$filtrado['productos'];
    $datos['filtros']=$filtrado['categorias'];
    $datos['page']=0;//$page;
    $datos['titulo'] = $datos['empresa']->nombre;
    $datos['membresia']=$this->membresia->get($datos['empresa']->membresia);

    $this->load->view('template/head');
    $this->load->view('template/javascript');
    $this->load->view('registro/funcionalidades_');
    $this->load->view('catologo_productos/top_menu_catalogo',array('usuario'=>$this->usuarios->get($this->session->userdata('id_usuario'))));
    $this->load->view('catologo_productos/header_catalogo',$datos);
    $this->load->view('cotizaciones_requeridas/cotizaciones_requeridas');
    $this->load->view('template/footer');
    $this->load->view('template/footer_empy');
  }  
  
  function nosotros($id)
  {
    $datos['empresa']= $this->empresa->get($id);    
    $datos['empresa']->tipo=$this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
    $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
    $datos['productos'] = $this->producto->get_all(array('empresa'=>$id));

    $datos['usuario']->pais=$this->pais->get($datos['usuario']->pais)->nombre;
    $datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
    $datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;

    $datos['titulo'] = $datos['empresa']->nombre;
    $datos['membresia']=$this->membresia->get($datos['empresa']->membresia);

    $this->load->view('template/head');
    $this->load->view('template/javascript');
    $this->load->view('registro/funcionalidades_');
    $this->load->view('catologo_productos/top_menu_catalogo',array('usuario'=>$this->usuarios->get($this->session->userdata('id_usuario'))));
    $this->load->view('catologo_productos/header_catalogo',$datos);
    $this->load->view('nosotros/nosotros');
    $this->load->view('template/footer');
    $this->load->view('template/footer_empy');
  }
  function descargar_catalogo($id)
  {
    $datos['empresa']= $this->empresa->get($id);    
    $datos['empresa']->tipo=$this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
    $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
    $datos['catalogos']=$this->catalogo->get_all(array('empresa'=>$id));

    $datos['usuario']->pais=$this->pais->get($datos['usuario']->pais)->nombre;
    $datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
    $datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
    $datos['productos'] = $this->producto->get_all(array('empresa'=>$id));

    $filtro=38;
    $tipo_filtro=0;

    if($filtro!=0)
    {
      switch ($tipo_filtro) 
      {
        case 0:
            $filtrado=$this->filtro_categoria($datos['productos'],$filtro); 
          break;
        
        default:
            $filtrado=$this->filtro_categoria($datos['productos'],0,$filtro); 
            break;
      }
    }else
    {
      $filtrado=$this->filtro_categoria($datos['productos']);
    }
    $productos=$filtrado['productos'];
    $datos['filtros']=$filtrado['categorias'];
    $datos['page']=0;//$page;
    
    $datos['titulo'] = $datos['empresa']->nombre;
    $datos['membresia']=$this->membresia->get($datos['empresa']->membresia);
    $this->load->view('template/head');
    $this->load->view('template/javascript');
    $this->load->view('registro/funcionalidades_');
    $this->load->view('catologo_productos/top_menu_catalogo',array('usuario'=>$this->usuarios->get($this->session->userdata('id_usuario'))));
    $this->load->view('catologo_productos/header_catalogo',$datos);  
    $this->load->view('descargar_catalogo/descargar_catalogo',$datos);
    $this->load->view('template/footer');
    $this->load->view('template/footer_empy');
  }

  private function filtro_categoria($productos=0,$id_categoria=0,$id_subcategoria=0)
  {   
    $out=array();
    foreach ($productos as $key => $value) 
    {
      $subcategoria=$this->subcategoria->get($value->subcategoria);
      $categoria=$this->categoria->get($subcategoria->id_categoria);
      $out['categorias'][$categoria->nombre_categoria]['id']=$categoria->id_categoria;
      $out['categorias'][$categoria->nombre_categoria]['cantidad']+=1;
      $out['categorias'][$categoria->nombre_categoria]['subcategorias'][$subcategoria->nom_subcategoria]['cantidad']+=1;
      $out['categorias'][$categoria->nombre_categoria]['subcategorias'][$subcategoria->nom_subcategoria]['id']=$value->subcategoria;
      
      $producto=$this->cargar_producto($value);
      if($id_subcategoria==$value->subcategoria)
      { $out['productos'][]=$producto; }
      elseif($id_categoria==$categoria->id_categoria) 
      { $out['productos'][]=$producto; }
    }
    return $out;
  }

  private function cargar_producto($dato)
  {
    $imagenes=explode(',',$dato->imagenes);
    
    foreach ($imagenes as $value)
    {      
      if(!is_null($value))
      {
        $dato->imagenes=$value;
        break;
      }
    }
    $dato->medida=$this->dimension->get($dato->medida)->nombre;
    
    if($dato->precio_unidad==0)
    {$dato->precio_unidad="A convenir";}
    
    if($dato->pedido_minimo==0)
    {
      $dato->medida="";
      $dato->pedido_minimo="A convenir";;
    }
    
    return $dato;
  }
}