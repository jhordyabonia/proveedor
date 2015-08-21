<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {

    function __construct() {
        parent::__construct();
        $auto_launch;
        #$this->load->model('Busqueda_model','buscador');


        $this->load->model('new/Usuarios_model','usuarios');
        $this->load->model('new/Departamento_model','departamento');
        $this->load->model('new/Tipo_empresa_model','tipo_empresa');
        $this->load->model('new/Dimension_model','dimension');
        $this->load->model('new/Municipio_model','municipio');

        $this->load->model('new/Membresia_model', 'membresia_model');
        $this->load->model('new/Empresa_model', 'empresa_model');
        $this->load->model('new/Producto_model', 'producto');
        $this->load->model('new/Solicitud_model', 'solicitud');
        $this->load->model('new/Categoria_model', 'categoria_model');
        $this->load->model('new/Subcategoria_model', 'subcategoria');
        $this->load->model('popups_textos_model', 'popups_textos');
        $this->load->model('banner_model');

    }    
    public function index()
    {
        $this->ver();
    }

    public function captura($categoria=6)
    {

        $datos['id_popup']="asistentes_proveedor";
        $datos['categorias']=$this->subcategoria->get_all(array('id_categoria'=>$categoria));
        $datos['categoria']=$categoria;
        $datos['datos']=$this->popups_textos->get(array('categoria'=>$datos['categoria']));
        $titulos=array();
        foreach (explode(',',$datos['datos']->titulos) as $key => $value) 
        {
            $dato_tmp=explode('|',$value);
            if(count($dato_tmp)>1)
            {
                $titulos[$dato_tmp[0]]=$dato_tmp[1];
            }else {$titulos[$value]=$value; }
        }

        $datos['registro']=$this->session->userdata('registro')|TRUE;
        $datos['paso']=$this->session->userdata('paso')|0;
        $datos['id_registro']=$this->session->userdata('id_registro')|0;
        $datos['id_usuario']= $this->session->userdata('id_usuario');
        $this->load->view('template/head', $datos, FALSE);
        $this->load->view('template/javascript', FALSE, FALSE);
        $this->load->view('index/top_menu',$datos);
        $datos['url_registro']=base_url()."registro/registro_usuario";
        $datos['url_publicar_producto']=base_url()."publicar_producto";
        $datos['url_publicar_solicitud']=base_url()."publicar_oferta";        
        $data['url_publicar_producto']=base_url()."publicar_producto";
        $data['url_publicar_solicitud']=base_url()."publicar_oferta";
        $this->load->view('index/header_buscador',$data);
        $datos['datos']->titulos=$titulos;
        #$datos['auto_launch']=TRUE;
        $datos['auto_launch_AP']=TRUE;
        $this->load->view('template/head', array('titulo'=>"Categorias --proveedor.com.co"));
        $this->load->view('template/javascript', FALSE);
        $this->load->view('popups/asistentes_proveedor', $datos); 

        $datos['permiso']=FALSE;
        $nit = $this->session->userdata('empresa');
        if($nit=="1059985632-7"||($nit=="90058523"||$nit=="102223263921"))
        {  $datos['permiso']=TRUE;  }
        $this->load->view('categorias/captura', $datos); 
        $this->load->view("template/footer");
        
        return;
    }
    public function ver($in=37, $in2=0, $div="productos", $page=0)
    {   
        $data['div']=$div;
        $data['id_usuario']= $this->session->userdata('id_usuario');
        $this->load->library('breadcrumb');
        $tmp=FALSE;
        if ($in==0)
        {
            $tmp=$this->subcategoria->get($in2);
            $in=$tmp->id_categoria;
        }
        $categoria=$in;
        if($categoria<0)
            {$categoria*=-1;}

        $data['categoria']=$this->categoria_model->get($categoria);
        $data['categorias']=$this->categoria_model->get_all();
        $data['subcategorias']=$this->subcategoria->get_all(array('id_categoria'=>$categoria));
        
        $data['titulo']=$data['categoria']->nombre_categoria;
        if($tmp!=FALSE){$data['titulo']=$tmp->nom_subcategoria;}
        $data['url_registro']=base_url()."registro/registro_usuario";
        $data['url_publicar_producto']=base_url()."publicar_producto";
        $data['url_publicar_solicitud']=base_url()."publicar_oferta";
        $data['banners']= $this->banner_model->get();
        $data['productos_destacados_1']=$this->producto->obtener_ultimos(11,"RANDOM",$categoria);
        $data['productos_destacados_2']=$this->producto->obtener_ultimos(11,"RANDOM",$categoria);
        $data['productos_destacados_3']=$this->producto->obtener_ultimos(11,"RANDOM",$categoria);
        $data['productos_patrocinados']=$this->producto->obtener_ultimos(2);
        $data['productos']=$this->producto->obtener_ultimos(5,"RANDOM",$categoria);
        $data['solicitudes']=$this->solicitud->obtener_ultimos(5,$categoria);
        $data['empresas']=$this->empresa_model->obtener_ultimos(5);
 
        $solo_captura=FALSE;
        if((count($data['productos_destacados_1']) +count($data['productos_destacados_2'])+count($data['productos_destacados_3'])) < 4
            ||count($data['productos']) < 4
            ||count($data['solicitudes']) < 4
            ||count($data['empresas']) < 4)
        {
            $solo_captura=TRUE;
        }
//add's categorias
        $data['nom_producto']=$data['categoria']->nombre_categoria;

        $productos=$this->producto->buscar("",$categoria);
        $solicitudes=$this->solicitud->buscar("",$categoria);
        $proveedores=$this->empresa->buscar("LGHAHAHAHAHAHT");
                
        $data['url_publicar_producto']=base_url()."publicar_producto";
        $data['url_publicar_solicitud']=base_url()."publicar_oferta";
        $this->breadcrumb->add('"' . $data['nom_producto'] . '"', base_url() . '');
       
        $data['page']=$page;
        $data['page_count']=0;
        $data['page_count2']=0;
        $data['page_count3']=0;

        if ($productos) 
        {
            $productos = clear_array($productos);
            $data['page_count'] = count($productos)/25;
            if($data['page']>$data['page_count'])
            {
                $data['page']=$data['page_count'];
            }
            foreach ($productos as $key => $producto)
             {
                /*
                if($key<($data['page']*25))
                {  continue; }

                if($key>=(($data['page']+1)*25))    
                {break;}
                */
                
                $datos['producto']=$this->producto->get($producto->id);
                $datos['empresa']=$this->empresa->get($datos['producto']->empresa);
                $datos['producto']->medida=$this->dimension->get($datos['producto']->medida);
                if($datos['producto']->pedido_minimo!=1)
                {   $datos['producto']->medida=$datos['producto']->medida->prural;}
                else {  $datos['producto']->medida=$datos['producto']->medida->nombre;}
                
                $tmp=$this->tipo_empresa->get($datos['empresa']->tipo);
                $datos['empresa']->tipo=$tmp->tipo;
                $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
                $datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
                $datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
                if(!$producto){ continue;   }
                $producto->div_membresia=$this->membresia_model->get_div_list($datos['producto']->empresa);
                $data['div_productos'][$key]=$this->load->view('listados/div_productos',$datos, TRUE);
                
                unset($producto);
            }
        }else{  $data['div_productos']=FALSE;   }
        $tmp=0;
        if ($solicitudes) 
        {
            $solicitudes = clear_array($solicitudes); 
            $data['page_count3'] = count($solicitudes)/25;
            if($data['page']>$data['page_count3'])
            {
                $data['page']=$data['page_count3'];
            }
            foreach ($solicitudes as $key => $solicitud)
             {
                /*
                if($key<($data['page']*25))
                {  continue; }

                if($key>=(($data['page']+1)*25))    
                {break;}
                */
                $datos['solicitud']=$this->solicitud->get($solicitud->id);
                $datos['empresa']=$this->empresa->get($datos['solicitud']->empresa);
                $datos['solicitud']->medida=$this->dimension->get($datos['solicitud']->medida);
                if($datos['solicitud']->cantidad_requerida!=1)
                {   $datos['solicitud']->medida=$datos['solicitud']->medida->prural;}
                else {  $datos['solicitud']->medida=$datos['solicitud']->medida->nombre;}
                $datos['empresa']->tipo=$this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
                $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
                $datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
                $datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
                $solicitud->div_membresia=$this->membresia_model->get_div_list($datos['solicitud']->empresa);
                $data['div_solicitudes'][$key]=$this->load->view('listados/div_solicitudes', $datos, TRUE);
                
                unset($solicitud);
            }
        }else{  $data['div_solicitudes']=FALSE; }
        
        if ($proveedores)
        {
            $proveedores = clear_array($proveedores);
            $proveedores = array_reverse($proveedores);
            
            $data['page_count2'] = count($proveedores)/25;
            if($data['page']>$data['page_count2'])
            {
                $data['page']=$data['page_count2'];
            }
            foreach ($proveedores as $key => $proveedor)
             {
                /*
                if($key<($data['page']*25))
                {  continue; }

                if($key>=(($data['page']+1)*25))    
                {break;}
                */
                if(!$proveedor)
                {   continue;   }
                $out['empresa']=$this->empresa->get($proveedor->id);
                $out['empresa']->tipo=$this->tipo_empresa->get($out['empresa']->tipo)->tipo;
                $datos['usuario']=$this->usuarios->get($out['empresa']->usuario);
                $datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
                $datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
                $out['empresa']->div_membresia= $this->membresia_model->get_div_list($out['empresa']->id);
                $data['div_empresas'][$key]=$this->load->view('listados/div_empresas', $out, TRUE);
                unset($proveedor);
             }
        }else{  $data['div_empresas']=FALSE;    }


        $data['div_categorias']=$this->load->view('listados/div_categorias', $data, TRUE);

//add's categorias

        $data['registro']=$this->session->userdata('registro');
        $data['paso']=$this->session->userdata('paso');
        $data['id_registro']=$this->session->userdata('id_registro');

        $this->load->view('template/head', $data, FALSE);
        $this->load->view('template/javascript');
        $this->load->view('index/top_menu',$data);
        $this->load->view('index/header_buscador_categorias',$data);
        #$this->load->view('index/banner', $data);
        #$this->load->view('index/ultimos_productos_empresas', $data);

        
        $this->load->model('popups_textos_model', 'popups_textos');
        $datos=$this->popups_textos->get(array('categoria'=>$in));
        if($datos==FALSE){$datos=$this->popups_textos->get(array('categoria'=>0));}
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
        $dat=array('categoria'=>$categoria,'datos'=>$datos);
        $this->load->view('index/formulario_solicitudes', $dat);

        $dat['auto_launch_AP']=TRUE;
        $dat['view'] = "asistentes_proveedor_popup";      
        $dat['id_popup'] = "asistentes_proveedor_popup";             
        $this->load->view('popups/asistentes_proveedor', $dat);

        if(!$solo_captura)
        {
            #$this->load->view('index/productos_destacados', $data);
            #$this->load->view('test/carousel_productos_destacados', $data);
            #$this->load->view('test/carousel_oportunidades_comerciales', $data);
            #$this->load->view('test/carousel_empresas_registradas', $data);
            #$this->load->view('index/productos_patrocinados', $data);
            #$this->load->view('index/empresas_patrocinadas',$data);
            $data['busqueda']='';
            $this->load->view("listados/div_footer_seo", $data);
            $this->load->view("listados/elemento_categorias", $data); //original, descomentar
            $this->load->view("listados/div_footer_seo", $data);
            $this->load->view("listados/div_footer_seo_2", $data);
            #$this->load->view("listados/listados_mobil", $data);
        }
/*
*/
        $this->load->view('template/footer');
        $this->load->view('template/footer_empy');
    }

    function cotizar($in=37, $in2=0, $div="productos", $page=0)
    {
        $this->session->set_flashdata('auto_launch_AP', 1);
        redirect(base_url().'categoria/ver/'.$in);
    }
}
