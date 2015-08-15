<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {

    function __construct() 
    {
        parent::__construct();

        $this->load->model('new/Producto_model','producto');
        $this->load->model('new/Solicitud_model','solicitud');
        $this->load->model('new/Empresa_model', 'empresa');
        $this->load->model('new/Categoria_model', 'categoria');
        $this->load->model('new/Membresia_model','membresia');
        $this->load->model('banner_model');
        $this->load->library('breadcrumb');
    }    
    public function index()
    {
        $this->ver();
    }
    public function ver($categoria=37)
    {
        $data['id_usuario']= $this->session->userdata('id_usuario');
        $data['categorias']=$this->categoria->get_all();
        $data['titulo']="PROVEEDOR.com.co";
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
        $data['empresas']=$this->empresa->obtener_ultimos(5);
 
        if(count($data['productos_destacados_1']) < 4)redirect($_SERVER['HTTP_REFERER']);
        if(count($data['productos_destacados_2']) < 4)redirect($_SERVER['HTTP_REFERER']);
        if(count($data['productos_destacados_3']) < 4)redirect($_SERVER['HTTP_REFERER']);
        if(count($data['productos']) < 4)redirect($_SERVER['HTTP_REFERER']);
        if(count($data['solicitudes']) < 4)redirect($_SERVER['HTTP_REFERER']);
        if(count($data['empresas']) < 4)redirect($_SERVER['HTTP_REFERER']);

//add's categorias
        $data['nom_producto']="";
        $data['div']="";

        $productos=$this->producto->buscar("",$categoria);
        $solicitudes=$this->solicitud->buscar("",$categoria);
        $proveedores=$this->empresa->buscar("LGHAHAHAHAHAHT",$categoria);
                
        $data['url_publicar_producto']=base_url()."publicar_producto";
        $data['url_publicar_solicitud']=base_url()."publicar_oferta";
        $this->breadcrumb->add('"' . $data['nom_producto'] . '"', base_url() . '');

        
        $data['page']=0; 
        $data['page_count']=0;
        $data['page2']=0; 
        $data['page_count2']=0;
        $data['page3']=0; 
        $data['page_count3']=0;

        if ($productos) 
        {
            $data['page']=($this->input->post('page')-1); 
            $data['page_count'] = count($productos)/25;
            foreach ($productos as $key => $producto)
             {
                if($key<($data['page']*25))
                {  continue; }

                if(($data['page']>0))
                {
                    if($key>=($data['page']*50))    
                     {break;}
                }   
                else
                {
                    if($key>=25)    
                     {break;}
                }
                #continue;
                $datos['producto']=$this->producto->get($producto->id);
                $datos['empresa']=$this->empresa->get($datos['producto']->empresa);
                $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
                if(!$producto){ continue;   }
                if($this->empresa->get($datos['producto']->empresa)->membresia==3)
                {$proveedores=array_merge($proveedores,array($datos['producto']->empresa));}
                else{$proveedores[]=$datos['producto']->empresa;}
                $producto->div_membresia=$this->membresia->get_div_list($datos['producto']->empresa);
                $data['div_productos'][$key]=$this->load->view('listados/div_productos',$datos, TRUE);
                
                unset($producto);
            }
        }else{  $data['div_productos']=FALSE;   }
        if ($solicitudes) 
        {
            $solicitudes = clear_array($solicitudes); 
            $data['page_count3'] = count($solicitudes)/25;
            $data['page3']=($this->input->post('page3')-1);
                 
            foreach ($solicitudes as $key => $solicitud)
             {
                if($key<($data['page3']*25))
                {  continue; }
                if(($data['page3']>0))
                {
                    if($key>=($data['page3']*50))   
                    {break;}
                }   
                else
                {
                    if($key>=25)    
                    {break;}
                }
                $datos['solicitud']=$this->solicitud->get($solicitud->id);
                $datos['empresa']=$this->empresa->get($datos['solicitud']->empresa);
                $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
                if($this->empresa->get($datos['solicitud']->empresa)->membresia==3)
                {$proveedores=array_merge($proveedores,array($datos['solicitud']->id));}
                else{$proveedores[]=$datos['solicitud']->empresa;}
                $solicitud->div_membresia=$this->membresia->get_div_list($datos['solicitud']->id);
                $data['div_solicitudes'][$key]=$this->load->view('listados/div_solicitudes', $datos, TRUE);
                
                unset($solicitud);
            }
        }else{  $data['div_solicitudes']=FALSE; }
        
        if ($proveedores)
        {
            $proveedores = clear_array($proveedores);
            if($p=="")
            {
                $proveedores = array_reverse($proveedores);
            }
            $data['page_count2'] = count($proveedores)/25;
            $data['page2']=($this->input->post('page2')-1);
                    
            foreach ($proveedores as $key => $proveedor)
             {
                if($key<($data['page2']*25))
                {  continue; }
                if($data['page2']>0)
                {
                    if($key>=($data['page2']*50))   
                    {break;}
                }   
                else
                {
                    if($key>=25)    
                     {break;}
                }
                if(!$proveedor)
                {   continue;   }
                $out['empresa']=$this->empresa->get($proveedor);
                $out['empresa']->div_membresia= $this->membresia->get_div_list($out['empresa']->id);
                $data['div_empresas'][$key]=$this->load->view('listados/div_empresas', $out, TRUE);
                unset($proveedor);
             }
        }else{  $data['div_empresas']=FALSE;    }


        $data['div_categorias']=$this->load->view('listados/div_categorias', $data, TRUE);

//add's categorias

        $this->load->view('template/head', $data, FALSE);
        $this->load->view('template/javascript');
        $this->load->view('index_test/top_menu',$data);
        $this->load->view('index_test/header_buscador',$data);
        $this->load->view('index_test/banner', $data);
      //  $this->load->view('index_test/ultimos_productos_empresas', $data);
        $this->load->view('index_test/productos_destacados', $data);
        $this->load->view('index_test/productos_patrocinados', $data);
        $this->load->view('index_test/empresas_patrocinadas',$data);
        $this->load->view("listados/elemento", $data); //add's categorias
        $this->load->view('template/footer');
        $this->load->view('template/footer_empy');
    }
}
