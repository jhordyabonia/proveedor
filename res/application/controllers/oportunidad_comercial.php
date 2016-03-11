<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Oportunidad_comercial extends CI_Controller {

    function __construct() {
        parent::__construct();


        $this->load->model('new/Departamento_model','departamento');
        $this->load->model('new/Municipio_model','municipio');
        $this->load->model('new/Dimension_model', 'dimension');
        $this->load->model('new/Categoria_model', 'categoria');
        $this->load->model('new/Subcategoria_model', 'subcategoria');
        $this->load->model('new/Usuarios_model', 'usuarios');
        $this->load->model('new/Empresa_model', 'empresa');
        $this->load->model('new/Tipo_empresa_model', 'tipo_empresa');
        $this->load->model('new/Solicitud_model','solicitud');
        $this->load->model('new/Producto_model','producto');
        $this->load->model('new/Membresia_model','membresia');

        $this->load->library("breadcrumb");
    }

   public function ver($id = FALSE) {
        if ($id) 
        {
            $data['solicitud'] = $this->solicitud->get($id);
            $data['solicitud']->imagenes =explode(',', $data['solicitud']->imagenes);
            $data['solicitud']->subcategoria = $this->subcategoria->get($data['solicitud']->subcategoria);
            $data['solicitud']->departamento_entrega = $this->departamento->get($data['solicitud']->departamento_entrega)->nombre;
            $data['solicitud']->ciudad_entrega = $this->municipio->get($data['solicitud']->ciudad_entrega)->municipio;
            $data['solicitud']->medida = $this->dimension->get($data['solicitud']->medida)->nombre;
            $data['categoria'] = $this->categoria->get($data['solicitud']->subcategoria->id_categoria);
            $data['empresa'] = $this->empresa->get($data['solicitud']->empresa);
            if(!$data['empresa'])
            {$data['empresa'] = $this->empresa->get(10026);}           
            $data['usuario'] = $this->usuarios->get($data['empresa']->usuario);
            $data['usuario']->ciudad = $this->municipio->get($data['usuario']->ciudad)->municipio;
            $data['usuario']->departamento = $this->departamento->get($data['usuario']->departamento)->nombre;
            
            $this->breadcrumb->add('Inicio', base_url());
            $this->breadcrumb->add('Productos Solicitados', base_url() . '');
            if (isset($data['categoria']->nombre_categoria)) {
                $this->breadcrumb->add($data['categoria']->nombre_categoria, base_url() . 'listado/busqueda/Productos');
            }
            if (isset($data['solicitud']->subcategoria->nom_subcategoria)) {
                $this->breadcrumb->add($data['solicitud']->subcategoria->nom_subcategoria, base_url() . '');
            }
            $this->breadcrumb->add('"' . $data['solicitud']->nombre . '"', base_url() . '');
            $data['breadcrumb'] = $this->breadcrumb->output();
            $data['empresa']->tipo_empresa = $this->tipo_empresa->get($data['empresa']->tipo)->tipo;
            $data['empresa']->url_catalogo = base_url() . "perfil/ver_empresa/" . $data['empresa']->id;
            $data['empresa']->url_contacto = base_url() . "perfil/contacto_empresa/" . $data['empresa']->id;
            if ($this->session->userdata('id_user')) {
                $data['url_publicar_producto'] = base_url() . "publicar_producto";
                $data['url_publicar_solicitud'] = base_url() . "publicar_oferta";
            } else {
                $data['url_publicar_solicitud'] = base_url() . "logueo";
                $data['url_publicar_producto'] = base_url() . "logueo";
            }
            $data['numero_productos']=count($this->producto->get_all(array('empresa'=>$data['empresa']->id)));
            $data['numero_ofertas']=count($this->solicitud->get_all(array('empresa'=>$data['empresa']->id))); 
            $data['registro']=FALSE;
                    
            $data['empresa']->membresia= $data['empresa']->membresia;
            $data['empresa']->tipo= $this->tipo_empresa->get($data['empresa']->tipo)->tipo;
            $data['categorias']=$this->categoria->get_all();
            $data['div_membresia']=$this->membresia->get_div($data['empresa']->id);
            #$data['div_membresia']=$this->membresia_model->get_div($data['empresa']->id);
            $data['titulo']=$data['solicitud']->nombre." - PROVEEDOR.com.co";
            $data['url_registro']=base_url()."registro/registro_usuario";
            $data['id_usuario']= $this->session->userdata('id_usuario');
            $this->load->view('template/head', $data, FALSE);
            $this->load->view('template/javascript', FALSE, FALSE);
            $this->load->view('registro/funcionalidades_',$data);
            $this->load->view('index/top_menu',$data);
            $this->load->view('index/header_buscador',$data);
            #$this->load->view('oferta/oportunidad_banner_adsense');
        	$this->load->view('oferta/oportunidad_comercial',$data);
            $this->load->view("template/footer");
        } else {
            show_404();
        }
    }
}
