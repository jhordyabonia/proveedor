<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('breadcrumb');
        $this->load->model('banner_model');
        $this->load->model('new/Usuarios_model','usuarios');
        $this->load->model('new/Municipio_model','municipio');
        $this->load->model('new/Departamento_model','departamento');
        $this->load->model('new/Empresa_model','empresa');
        $this->load->model('new/Tipo_empresa_model','tipo_empresa');
        $this->load->model('new/Membresia_model','membresia');
        $this->load->model('new/Categoria_model','categoria');
        $this->load->model('new/Subcategoria_model','subcategoria');
        $this->load->model('new/Producto_model','producto');
        $this->load->model('new/Solicitud_model','solicitud');
        $this->load->model('new/Dimension_model','dimension');
        $this->load->model('new/Busquedas_model','busquedas');
    }    
    public function index()
    {
        $this->ver();
    }

    public function captura($categoria=6)
    {
        $this->load->model('popups_textos_model', 'popups_textos');
        $this->load->model('new/Subcategoria_model', 'subcategoria');
        $this->load->model('new/Categoria_model', 'categoria');

        $datos['id_popup']="asistentes_proveedor";
        $datos['categorias']=$this->categoria->get_all();
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

        #$datos['id_registro']=$this->session->userdata('id_registro');
        #$datos['id_usuario']= $this->session->userdata('id_usuario');
        #$this->load->view('template/head', $datos, FALSE);
        #$this->load->view('template/javascript', FALSE, FALSE);
        #$this->load->view('index/top_menu',$datos);
        #$datos['url_registro']=base_url()."registro/registro_usuario";
        #$datos['url_publicar_producto']=base_url()."publicar_producto";
        #$datos['url_publicar_solicitud']=base_url()."publicar_oferta";        
        #$data['url_publicar_producto']=base_url()."publicar_producto";
        #$data['url_publicar_solicitud']=base_url()."publicar_oferta";
        #$this->load->view('index/header_buscador',$data);
        $datos['datos']->titulos=$titulos;  
        $datos['index'] = TRUE;      
        $this->load->view('template/head', array('titulo'=>"Categorias --proveedor.com.co",'facebook' =>FALSE));
        $this->load->view('template/javascript', FALSE);
        #$this->load->view('popups/asistentes_proveedor', $datos); 
        $datos['mensaje_enviado']= $this->session->userdata('mensaje_enviado');
        $this->load->view('index/formulario_solicitudes_index', $datos);
       

        #$this->load->view("template/footer");
        
        return;
    }
    public function vinvular_dispositivo()
    {
        $ipAddress=gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $macAddr=false;

        #run the external command, break output into lines
        $arp='arp -n $ipAddress';
        $lines=explode('\n', $arp);

        #look for the output line describing our IP address
        foreach($lines as $line)
        {
           $cols=preg_split('/\s+/', trim($line));
           if ($cols[0]==$ipAddress)
           {
               $macAddr=$cols[1];
           }
        }
        echo  $ipAddress."<PRE>";
        print_r($macAddr);
        echo "</PRE>";

        #$this->load->view('registro/registro_dispositivo');
    } 
    public function ver_sub($in2=0, $div="productos", $page=0,$filtro=0,$tipo_filtro=0)
    {
        $this->ver(0,$div,$page,$filtro,$tipo_filtro,$in2);
    }
    public function ver($in=37, $div="productos", $page=0,$filtro=0,$tipo_filtro=0, $in2=0)
    {   
        $data['div']=$div;
        $subcategoria=$in2;
        $data['id_usuario']= $this->session->userdata('id_usuario');
        
        $tmp=FALSE;
        if ($in==0)
        {
            $tmp=$this->subcategoria->get($in2);
            $in=$tmp->id_categoria;
            $data['categoria']->id_categoria=$tmp->id_subcategoria;
            $data['categoria']->nombre_categoria=$tmp->nom_subcategoria;
        }
        else
        {
            $data['categoria']=$this->categoria->get($in);
        }
        $categoria=$in;

        $data['tipo_filtro']=$tipo_filtro;
        $data['filtro']=$filtro;
        $data['page']=$page;
        $data['div']=$div;

        $data['categorias']=$this->categoria->get_all();
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
        $data['empresas']=$this->empresa->obtener_ultimos(5);
 
        $solo_captura=FALSE;
        
        $productos=$this->producto->buscar("",$categoria,$subcategoria);
        $solicitudes=$this->solicitud->buscar("",$categoria,$subcategoria);
        $proveedores=$this->empresa->buscar("",$categoria);
                
        $data['url_publicar_producto']=base_url()."publicar_producto";
        $data['url_publicar_solicitud']=base_url()."publicar_oferta";
        $this->breadcrumb->add('"' . $data['nom_producto'] . '"', base_url() . '');

        $data['page_count']=0;
        $data['page_count2']=0;
        $data['page_count3']=0;

        if($filtro!=0)
        {
            switch ($tipo_filtro) 
            {
                case 0:
                        $filtrado=$this->filtro_categoria($productos,$filtro); 
                    break;
                
                default:
                        $filtrado=$this->filtro_categoria($productos,0,$filtro); 
                        break;
            }
            $productos=$filtrado['productos'];
        }else
        {
            $filtrado=$this->filtro_categoria($productos);
        }
        $filtros['filtros']=$filtrado['categorias'];
        $filtros['p']=$data['titulo'];
        $filtros['div']=$div;
        $filtros['page']=$page;

        $data['div_categorias']="";
        #$data['div_categorias']=$this->load->view('listados/div_categorias', $filtros, TRUE);


        if(!$productos){$data['div']="proveedores";}
        if ($productos) 
        {
            $data['page_count'] = count($productos)/25;
            if($page>$data['page_count'])
            {
                $data['page']=0;
            }
            foreach ($productos as $key => $producto)
             {              
                if($key<($data['page']*25))
                {  continue; }

                if($key>=(($data['page']+1)*25))    
                {break;}

                $datos['producto']=$this->producto->get($producto->id);
                $img_prinsipal=explode(',',$datos['producto']->imagenes);
                $datos['producto']->imagenes=$img_prinsipal[0];
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
                $datos['producto']->div_membresia=$this->membresia->get_div_list($datos['producto']->empresa);
                $data['div_productos'][$key]=$this->load->view('listados/div_productos',$datos, TRUE);
                
                unset($producto);
            }
        }
        if ($solicitudes) 
        {
            $solicitudes = clear_array($solicitudes); 
            $data['page_count3'] = count($solicitudes)/25;  
            $data['page']=$page;
            if($page>$data['page_count3'])
            {
                $data['page']=0;
            }            
            foreach ($solicitudes as $key => $solicitud)
             {
                if($key<($data['page']*25))
                {  continue; }

                if($key>=(($data['page']+1)*25))    
                {break;}

                $datos['solicitud']=$this->solicitud->get($solicitud->id);
                $img_prinsipal=explode(',',$datos['solicitud']->imagenes);
                $datos['solicitud']->imagenes=$img_prinsipal[0];
                $datos['empresa']=$this->empresa->get($datos['solicitud']->empresa);
                $datos['solicitud']->medida=$this->dimension->get($datos['solicitud']->medida);
                if($datos['solicitud']->cantidad_requerida!=1)
                {   $datos['solicitud']->medida=$datos['solicitud']->medida->prural;}
                else {  $datos['solicitud']->medida=$datos['solicitud']->medida->nombre;}
                $datos['empresa']->tipo=$this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
                $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
                $datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
                $datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
                $datos['solicitud']->div_membresia=$this->membresia->get_div_list($datos['solicitud']->empresa);
                $data['div_solicitudes'][$key]=$this->load->view('listados/div_solicitudes', $datos, TRUE);
                
                unset($solicitud);
            }
        }
        
        if ($proveedores)
        {
            $proveedores = clear_array($proveedores);
            
            $data['page_count2'] = count($proveedores)/25;
            $data['page']=$page;
            if($page>$data['page_count2'])
            {
                $data['page']=0;
            }   
            foreach ($proveedores as $key => $proveedor)
             {
                if($key<($data['page']*25))
                {  continue; }

                if($key>=(($data['page']+1)*25))    
                {break;}

                if(!$proveedor)
                {   continue;   }
                $datos['empresa']=$this->empresa->get($proveedor->id);
                $datos['empresa']->tipo=$this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
                $datos['empresa']->productos=$this->producto->get_all(array('empresa'=>$proveedor->id));
                $datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
                $datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
                $datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
                $datos['empresa']->div_membresia= $this->membresia->get_div_list($datos['empresa']->id);
                $data['div_empresas'][$key]=$this->load->view('listados/div_empresas', $datos, TRUE);
                unset($proveedor);
             }
        }
        $data['page']=$page;        

//add's categorias

        $data['registro']=$this->session->userdata('registro');
        $data['paso']=$this->session->userdata('paso');
        $data['id_registro']=$this->session->userdata('id_registro');

        $this->load->view('template/head', $data, FALSE);
        $this->load->view('template/javascript');
        $this->load->view('registro/funcionalidades_');
        $this->load->view('index/top_menu',$data);
        $this->load->view('index/header_buscador_categorias',$data);
        #$this->load->view('index/banner_adsense');
        #$this->load->view('index_test/banner', $data);
        #$this->load->view('index_test/ultimos_productos_empresas', $data);

        
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
        $mensaje_enviado= $this->session->userdata('mensaje_enviado');
        $this->load->view('index/formulario_solicitudes', array('categoria'=>$in,'datos'=>$datos,'mensaje_enviado'=>$mensaje_enviado));
        #$this->session->set_userdata('mensaje_enviado',FALSE);
        #$this->load->view("index/banner_adsense", $data);

        $dat['auto_launch_AP']=FALSE;
        $dat['view'] = "asistentes_proveedor_popup";      
        $dat['index'] = FALSE;     
        $dat['categorias']  = $this->categoria->get_all();    
        $dat['categoria'] = $categoria;      
        $dat['id_popup'] = "asistentes_proveedor_popup";             
        $this->load->view('popups/asistentes_proveedor', $dat);

        
        if(!$solo_captura)
        {
            if($subcategoria==0)
            { $this->load->view('index/productos_destacados', $data);  }
            $this->load->view('carrouseles/funcionalidades', $data);
            $this->load->view('carrouseles/carousel_productos_destacados', $data);
            $this->load->view('carrouseles/carousel_oportunidades_comerciales', $data);
            $this->load->view('carrouseles/carousel_empresas_registradas', $data);
            #$this->load->view('index_test/productos_patrocinados', $data);
            #$this->load->view('index_test/empresas_patrocinadas',$data);
            $this->load->view("listados/elemento", $data); //add's categorias
           # $this->load->view("listados/listados_mobil", $data);
        }
        $this->load->view('template/footer');
        $this->load->view('template/footer_empy');
    }

    function cotizar($in=37, $in2=0, $div="productos", $page=0)
    {
        $this->session->set_flashdata('auto_launch_AP', 1);
        redirect(base_url().'categoria/ver/'.$in);
    }
    function cotizar_index()
    {
        $this->session->set_flashdata('auto_launch_AP', 1);
        redirect(base_url());
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
            if($id_subcategoria==$value->subcategoria)
            {   $out['productos'][]=$value; }
            elseif($id_categoria==$categoria->id_categoria) 
            {   $out['productos'][]=$value; }
        }
        return $out;
    }
}
