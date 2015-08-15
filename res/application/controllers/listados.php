<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listados extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		
		$this->load->library('breadcrumb');
		$this->load->model('new/Usuarios_model','usuarios');
		$this->load->model('new/Municipio_model','municipio');
		$this->load->model('new/Departamento_model','departamento');
		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Tipo_empresa_model','tipo_empresa');
		$this->load->model('new/Membresia_model','membresia');
		$this->load->model('new/Categoria_model','categoria');
		$this->load->model('new/Producto_model','producto');
		$this->load->model('new/Solicitud_model','solicitud');
		$this->load->model('new/Dimension_model','dimension');
		$this->load->model('Busqueda_model','busqueda');
	}

	public function news()
	{
		$this->load->view('news/news');
	}

	public function validar($buscador=FALSE)
	{
		/*
		if($buscador)
		{
 			$this->lista($buscador);
 			return;
 		}
		$this->form_validation->set_rules('busqueda', 'buscador', 'required|min_length[2]|max_length[20]|trim|xss_clean');
        $this->form_validation->set_message('required', 'El campo no puede ir vacío!');
        $this->form_validation->set_message('min_length', 'El  campo debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');
        $select = $this->input->post('selec1');  //para saber el item seleccionado del select de busqueda

        if ($this->form_validation->run()) 
        { 
 			$buscador = $this->input->post('busqueda');
	 		$this->lista($buscador);
 			return;
 		}
 		*/
 	    $busqueda = $this->input->post('busqueda');
 	    $selec1 = $this->input->post('selec1');
 		//$this->lista($buscador);
 		$this->lista($busqueda,$selec1);
 		//$this->lista();
	}

    public function analisis_busqueda($busqueda,$tipo_buqueda='Simple')
    {
        //implementar analicis de la cadena, conlas erramientas de strign.
        $busqueda=str_replace('%20',' ',$busqueda); 
        $busqueda=str_replace(')',"%19",$busqueda);
        $busqueda=str_replace('%19',")",$busqueda);
        $busqueda=str_replace('%C2%BF',"¿",$busqueda);
        $busqueda=str_replace('%C2%B4','´',$busqueda);
        //$busqueda=str_replace('_',' ',$busqueda); 
        $busqueda=str_replace('C2 A1','!',$busqueda); 
        $busqueda=str_replace('%C2%A1','¡',$busqueda); 

        if($tipo_buqueda!='Simple')
        {
            $out = explode(' ',$busqueda);
            foreach ($out as $key => $value) #construlccion del singular
            {
                $end_value=substr($value,-2);
                if($end_value=="es"||$end_value=="ES")
                {
                    $out[]=str_replace($end_value,"",$value); 
                }      
                else
                {
                    $end_value=substr($value,-1);
                    if($end_value=="s"||$end_value=="S")
                    {
                        $out[]=str_replace($end_value,"",$value); 
                    }
                    else
                    {                        
                        $out[]=$value; 
                    }
                }    
            }            
            $out[] = $busqueda;
            return array_reverse($out);
        }

        return $busqueda;
    }
	public function lista($p="XXXXXX",$div="productos")
	{
		$data['div']=$div;
		$data['id_usuario']= $this->session->userdata('id_usuario');

		$data['titulo']="Resultados de busqueda";
		$data['url_publicar_solicitud']="";
		$data['url_publicar_producto']="";
		
		$this->breadcrumb->add('Inicio', base_url());
		$this->breadcrumb->add('Productos', base_url() . '');

		$p=$this->analisis_busqueda($p);

		if($p=="XXXXXX")
		{
			$data['nom_producto']="Sin dato";
		}else
		{
			$data['nom_producto']=$p;
		}
		if($p=="default")
		{	
			$p="";
			//$data['nom_producto']="Ver todo";
		}		

		$productos=$this->producto->buscar($p);
		#foreach ($this->analisis_busqueda($p,'Compuesta') as  $value) 
		#{
		#	$productos[]=$this->producto->buscar($value);
		#}
		$solicitudes=$this->solicitud->buscar($p);
		$proveedores=$this->empresa->buscar($p);

		$data['categorias']=$this->categoria->get_all();
				
		$data['url_publicar_producto']=base_url()."publicar_producto";
		$data['url_publicar_solicitud']=base_url()."publicar_oferta";
		$this->load->view("template/head", $data);
		$this->load->view("template/javascript");
		$this->load->view("index_test/top_menu");
		$this->load->view("index_test/header_buscador", $data);
		$this->load->view('listados/div_header_seo', $data, FALSE);
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
				$datos['producto']->medida=$this->dimension->get($datos['producto']->medida);
				if($datos['producto']->pedido_minimo!=1)
				{	$datos['producto']->medida=$datos['producto']->medida->prural;}
				else {	$datos['producto']->medida=$datos['producto']->medida->nombre;}
				
				$tmp=$this->tipo_empresa->get($datos['empresa']->tipo);
				$datos['empresa']->tipo=$tmp->tipo;
				#ECHO "<pre>";
				#print_r($tmp);
				#ECHO "</pre>";
				#return;

				$datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
				$datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
				$datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
				if(!$producto){ continue;	}
			 	#if($datos['empresa']->membresia==3)
				#{$proveedores=array_merge($proveedores,array($datos['producto']->empresa));}
				#else{$proveedores[]=$datos['producto']->empresa;}
				$producto->div_membresia=$this->membresia->get_div_list($datos['producto']->empresa);
				$data['div_productos'][$key]=$this->load->view('listados/div_productos',$datos, TRUE);
				
				unset($producto);
			}
		}else{	$data['div_productos']=FALSE;	}
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
				$datos['solicitud']->medida=$this->dimension->get($datos['solicitud']->medida);
				if($datos['solicitud']->cantidad_requerida!=1)
				{	$datos['solicitud']->medida=$datos['solicitud']->medida->prural;}
				else {	$datos['solicitud']->medida=$datos['solicitud']->medida->nombre;}
				$datos['empresa']->tipo=$this->tipo_empresa->get($datos['empresa']->tipo)->tipo;
				$datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
				$datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
				$datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
				#if($this->empresa->get($datos['solicitud']->empresa)->membresia==3)
				#{$proveedores=array_merge($proveedores,array($datos['solicitud']->id));}
				#else{$proveedores[]=$datos['solicitud']->empresa;}
				$solicitud->div_membresia=$this->membresia->get_div_list($datos['solicitud']->empresa);
				$data['div_solicitudes'][$key]=$this->load->view('listados/div_solicitudes', $datos, TRUE);
				
				unset($solicitud);
			}
		}else{	$data['div_solicitudes']=FALSE;	}
		
		if ($proveedores)
		{
			$proveedores = clear_array($proveedores);
			if($p=="")
			{
				$proveedores = array_reverse($proveedores);
			}

			#echo "<PRE>";
			#print_r($proveedores);
			#echo "</PRE>";
			#return;
			
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
			 	{	continue;	}
				$out['empresa']=$this->empresa->get($proveedor->id);
				$out['empresa']->tipo=$this->tipo_empresa->get($out['empresa']->tipo)->tipo;
				$datos['usuario']=$this->usuarios->get($out['empresa']->usuario);
				$datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
				$datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
				$out['empresa']->div_membresia= $this->membresia->get_div_list($out['empresa']->id);
				$data['div_empresas'][$key]=$this->load->view('listados/div_empresas', $out, TRUE);
				unset($proveedor);
			 }
		}else{	$data['div_empresas']=FALSE;	}


		$data['div_categorias']=$this->load->view('listados/div_categorias', $data, TRUE);

		$this->load->view("listados/elemento", $data);
		$this->load->view("listados/div_footer_seo", $data);
		$this->load->view("listados/div_footer_seo_2", $data);
		$this->load->view("template/footer");
	}
}


/* End of file listado_test.php */
/* Location: ./application/controllers/listado_test.php */
