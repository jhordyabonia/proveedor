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
		$this->load->model('new/Busquedas_model','busquedas');
		#$this->load->model('Busqueda_model','busqueda');
	}

	public function news()
	{
		$this->load->view('news/news');
	}

	// Metodo temporal, en reemplazo de un diccionario real
	

	public function porcentaje_de_coincidencia($palabra1="",$palabra2="")
	{
		$porcentaje_de_coincidencia=100;

		if(strlen($palabra1)<strlen($palabra2))
		{$palabra_mayor=$palabra2;$palabra_menor=$palabra1;}
		else{$palabra_menor=$palabra2;$palabra_mayor=$palabra1;}

		$diferencia=strlen($palabra_mayor)-strlen($palabra_menor);
		$porcentaje_de_coincidencia-=(strlen($palabra_mayor)/100)*$diferencia;
		if($diferencia!=0)
		{	$palabra_menor=$palabra_menor.substr($palabra_mayor,-$diferencia);	}
		
		$array_palabra_menor=str_split($palabra_menor);
		$array_palabra_mayor=str_split($palabra_mayor);

		for($a=0;$a<strlen($palabra_menor);$a++)
		{ 
			if($array_palabra_menor[$a]==$array_palabra_mayor[$a])				
				{continue;}
			
			$porcentaje_de_coincidencia-=strlen($palabra_mayor)/100;
		}
		if(strlen($palabra1)==strlen($palabra2))
		{
			for($a=strlen($palabra_menor)-1;$a>=0;$a--)
			{ 
				if($array_palabra_menor[$a]==$array_palabra_mayor[$a])				
					{continue;}
			
				$porcentaje_de_coincidencia-=strlen($palabra_mayor)/100;
			}
		}
	
		return $porcentaje_de_coincidencia;
	} 

	public function sugerencias($palabra)
	{

		$this->load->model('new/Diccionario_model','diccionario');
		$palabra_segmentada;
		for($key=1;strlen($palabra)>$key;$key++) 
		{
			$palabra_segmentada[]=substr($palabra,0,-$key);
		}
		
		$sugerencia="";
		$porcentaje_de_coincidencia=0;
		foreach ($palabra_segmentada as $key => $value) 
		{
			#if((strlen($value)<strlen($palabra)/1.5)&&$porcentaje_de_coincidencia!=0)
			#	{break;}

			$results=$this->diccionario->like($value);

			if($results)
			{
				foreach ($results as $key => $sugerencias)
				{
					$tmp=$this->porcentaje_de_coincidencia($palabra,$sugerencias->palabra);
					#echo "<br>".$tmp." : ".$sugerencias->palabra;
					if($tmp>=$porcentaje_de_coincidencia)
					{
						$porcentaje_de_coincidencia=$tmp;
						$sugerencia=$sugerencias->palabra;
					}
				}
			}
		}
		echo "<title>".$sugerencia."</title>";
		echo $sugerencia;
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

	public function test($busqueda,$tipo_buqueda='Simple')
	{
		$print= $this->analisis_busqueda($busqueda,$tipo_buqueda);
		if($tipo_buqueda=='Simple')
		{
		}else
		{
			echo "<PRE>";
			print_r($print);
			echo "</PRE>";
		}
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
                    $out[]=substr($value,0,-2); 
                }      
                else
                {
                    $end_value=substr($value,-1);
                    if($end_value=="s"||$end_value=="S")
                    {
                        $out[]=substr($value,0,-1); 
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
	public function lista($p="XXXXXX",$div="productos", $page=0, $filtro=0,$tipo_filtro=0)
	{
		$data['div']=$div;
		$data['busqueda']=$this->analisis_busqueda($p);
		$data['id_usuario']= $this->session->userdata('id_usuario');

		$data['url_publicar_solicitud']="";
		$data['url_publicar_producto']="";
		
		$this->breadcrumb->add('Inicio', base_url());
		$this->breadcrumb->add('Productos', base_url() . '');

		if($p=="XXXXXX")
		{
			$data['nom_producto']="Sin dato";
		}else
		{
			$data['nom_producto']='<b>'.$p.'</b>';
		}
		if($p=="default")
		{	
			$p="";
			//$data['nom_producto']="Ver todo";
		}		
		$data['titulo']=$data['busqueda'];
		$p=$this->analisis_busqueda($p,"Compuesta");


		$productos=$this->producto->buscar($p,"Compuesta");
		$solicitudes=$this->solicitud->buscar($p,"Compuesta");
		$proveedores=$this->empresa->buscar($p,"Compuesta");

		$filtros['total_porCategoria']=clear_array($this->total_porCategoria($productos));
		$filtros['total_porSubCategoria']=clear_array($this->total_porSubCategoria($productos));
		$filtros['p']=$data['titulo'];
		$filtros['div']=$div;
		$filtros['page']=$page;

		$data['div_categorias']=$this->load->view('listados/div_categorias', $filtros, TRUE);

		if($filtro!=0)
		{
			switch ($tipo_filtro) 
			{
				case 0:
						$productos=clear_array($this->filtrarProductos_categoria($productos,$filtro)); 
					break;
				
				default:
						$productos=clear_array($this->filtrarProductos_SubCategoria($productos,$filtro));
					break;
			}
			
		}

		$data['categorias']=$this->categoria->get_all();
				
		$data['url_publicar_producto']=base_url()."publicar_producto";
		$data['url_publicar_solicitud']=base_url()."publicar_oferta";
		$this->load->view("template/head", $data);
		$this->load->view("template/javascript");
		$this->load->view("index/top_menu");
		$this->load->view("index/header_buscador", $data);
		$this->load->view('listados/div_header_seo', $data, FALSE);
		$this->breadcrumb->add('"' . $data['nom_producto'] . '"', base_url() . '');

		$data['page']=$page; 
		$data['page_count']=0;
		$data['page_count2']=0;
		$data['page_count3']=0;

		$data['div_solicitudes']=FALSE;
		$data['div_productos']=FALSE;
		$data['div_empresas']=FALSE;

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
				{	$datos['producto']->medida=$datos['producto']->medida->prural;}
				else {	$datos['producto']->medida=$datos['producto']->medida->nombre;}
				
				$tmp=$this->tipo_empresa->get($datos['empresa']->tipo);
				$datos['empresa']->tipo=$tmp->tipo;
			
				$datos['usuario']=$this->usuarios->get($datos['empresa']->usuario);
				$datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
				$datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
				if(!$producto){ continue;	}
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
				{	$datos['solicitud']->medida=$datos['solicitud']->medida->prural;}
				else {	$datos['solicitud']->medida=$datos['solicitud']->medida->nombre;}
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
			if($p=="")
			{
				$proveedores = array_reverse($proveedores);
			}

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
			 	{	continue;	}
				$out['empresa']=$this->empresa->get($proveedor->id);
				$out['empresa']->tipo=$this->tipo_empresa->get($out['empresa']->tipo)->tipo;
				$out['empresa']->productos=$this->producto->get_all(array('empresa'=>$proveedor->id));
				$datos['usuario']=$this->usuarios->get($out['empresa']->usuario);
				$datos['usuario']->ciudad=$this->municipio->get($datos['usuario']->ciudad)->municipio;
				$datos['usuario']->departamento=$this->departamento->get($datos['usuario']->departamento)->nombre;
				$out['empresa']->div_membresia= $this->membresia->get_div_list($out['empresa']->id);
				$data['div_empresas'][$key]=$this->load->view('listados/div_empresas', $out, TRUE);
				unset($proveedor);
			 }
		}
		$data['page']=$page;
			


		$resultados= "Productos:".($data['page_count']*25).",Solicitudes:".($data['page_count3']*25).",Proveedores:".($data['page_count2']*25);
		$this->busquedas->insert(array('busqueda'=>$data['busqueda'],'resultados'=>$resultados));
		$this->load->view("listados/elemento", $data);
		$this->load->view("listados/div_footer_seo", $data);
		$this->load->view("listados/div_footer_seo_2", $data);
		$this->load->view("template/footer");
	}


	//Jhordy:: funcion extrae unicamente los productos pertenecientes  la categoria $id_seleccion
	private function filtrarProductos_categoria($productos,$id_seleccion){
		$out=array();
		foreach ($productos as $value) 
		{
			$subcategoria_tmp=$this->subcategoria->get($value->subcategoria);
			$id_categoria=$subcategoria_tmp->id_categoria;

			if($id_categoria==$id_seleccion) 
			{ 
				$out[]=$value;
			}
		}
		return $out;
	}

	//Jhordy:: funcion extrae unicamente los productos pertenecientes  la subcategoria $id_seleccion
	private function filtrarProductos_SubCategoria($productos,$id_seleccion){
		$out=array();
		foreach ($productos as $value) 
		{
			if($value->subcategoria==$id_seleccion) 
			{ 
				$out[]=$value;
			}
		}
		return $out;
	}
	//Jhordy:: Esta funcion retorna el numero de productos de cada categoria
	private function total_porCategoria($productos){
		$out = array();		
		if($productos==NULL)
		{	return $out;	}
		foreach ($productos as $datos)
		{
				$id_subcategoria=$datos->subcategoria;
				$subcategoria_tmp=$this->subcategoria->get($id_subcategoria);
				$aux['id_categoria']=$subcategoria_tmp->id_categoria;
				$aux['cantidad']=$this->productos_porCategoria($aux['id_categoria'],$productos);	
				$aux['nombre']=$this->categoria->get($aux['id_categoria'])->nombre_categoria;	
				$out[]=$aux;	
		}		
		return $out;
	}
	//Jhordy:: Esta funcion retorna la cantidad de productos de una categoria especifica
	private function productos_porCategoria($id_categoria,$productos){
			$total=0;
			if($productos)
			  {
				  foreach ($productos as $registro)
				  {
						$id_tmp=$registro->subcategoria;
						$subcategoria_tmp=$this->subcategoria->get($id_tmp);
						if($subcategoria_tmp->id_categoria==$id_categoria)
						{	$total++;	}
				 }
			   } 
			return $total;
	}
	//Jhordy:: Esta funcion retorna las subcategorias de cada producto  u ofertas
	private function total_porSubCategoria($productos){
		$out = array();
		if($productos==NULL)
		{	return $out;	}
		foreach ($productos as $datos)
		{
				$id=$datos->subcategoria;
				$subcategoria_tmp=$this->subcategoria->get($id);
				$aux['cantidad']=$this->productos_porSubCategoria($id,$productos);	
				$aux['id_categoria']=$subcategoria_tmp->id_categoria;		
				$aux['id_subCategoria']=$id;	
				$aux['nombre']=$subcategoria_tmp->nom_subcategoria;	
				$out[]=$aux;	
		}		
		return $out;
	}	
	//Jhordy:: Esta funcion retorna la catidad de productos u ofertas en una subcategoria
	private function productos_porSubCategoria($id_subcategoria,$productos){
			$total=0;
			if($productos)
			  {
				  foreach ($productos as $registro)
				  {
						if($registro->subcategoria==$id_subcategoria)
						{	$total++;	}
				 }
			   } 
			return $total;
	}

}


/* End of file listado_test.php */
/* Location: ./application/controllers/listado_test.php */
