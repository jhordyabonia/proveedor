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
		$this->load->model('new/Subcategoria_model','subcategoria');
		$this->load->model('new/Producto_model','producto');
		$this->load->model('new/Solicitud_model','solicitud');
		$this->load->model('new/Dimension_model','dimension');
		$this->load->model('new/Busquedas_model','busquedas');
		$cache_buequeda="default";
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
 		redirect(base_url()."listados/lista/".$busqueda.'/'.$selec1);
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
            	if($value=="") continue;
            	if($value=="y"||$value=="o"||$value=="con"||$value=="sin")
            		{continue;}

            	if($value=="Y"||$value=="O"||$value=="CON"||$value=="SIN")
            		{continue;}

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
                    	if($value!="")                     
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
		if($p=="default")
		{				
			if($div=="productos")
				$data['busqueda']="Últimos ".$div;
			else $data['busqueda']=$div;
			//$data['nom_producto']="Ver todo";
		}
		
		$data['id_usuario']= $this->session->userdata('id_usuario');

		$data['filtro']=$filtro;
		$data['tipo_filtro']= $tipo_filtro;

		$data['url_publicar_solicitud']="";
		$data['url_publicar_producto']="";
		
		$this->breadcrumb->add('Inicio', base_url());
		$this->breadcrumb->add('Productos', base_url() . '');

		if($p=="XXXXXX")
		{
			$data['nom_producto']="Sin dato";
		}else
		{
			$data['nom_producto']=$data['busqueda'];
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
		#$proveedores=array_merge($proveedors,$this->empresa->buscar2($p,"Compuesta"));
		#$proveedores=clear_array($proveedores);

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

		#$data['div_categorias']="";
		$data['div_categorias']=$this->load->view('listados/div_categorias', $filtros, TRUE);

		$data['categorias']=$this->categoria->get_all();
				
		$data['url_publicar_producto']=base_url()."publicar_producto";
		$data['url_publicar_solicitud']=base_url()."publicar_oferta";
		$data['descripcion'] = "Listado de productos, categorias y proveedores con el termino de busqueda: " . $data['nom_producto'] . "para comprar, vender y cotizar están en PROVEEDOR.com.co";
		$data['facebook'] = array(
			'titulo'=> $data['titulo'],
			'mensaje'=> $data['descripcion'],
			'url_image_facebook'=> img_url()."facebook-banner/facebook-banner-inicio-default.png"
			);
		$this->load->view("template/head", $data);
		$this->load->view("template/javascript");
		$this->load->view('registro/funcionalidades_');
		$this->load->view("index/top_menu");
		$this->load->view("index/header_buscador", $data);
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
		if(!$productos){$data['div']="proveedores";}
        elseif(!$proveedores){$data['div']="solicitudes";}
        else{$data['div']="productos";}

		$resultados= "Productos:".($data['page_count']*25).",Solicitudes:".($data['page_count3']*25).",Proveedores:".($data['page_count2']*25);
		$this->busquedas->insert(array('busqueda'=>$data['busqueda'],'resultados'=>$resultados));
		$this->load->view('listados/div_header_seo', $data, FALSE);
		#$this->load->view('index/banner_adsense');
		$this->load->view("listados/elemento", $data);
		$this->load->view("listados/div_footer_seo", $data);
		$this->load->view("listados/div_footer_seo_2", $data);
		$this->load->view("template/footer");
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
			{	$out['productos'][]=$value;	}
			elseif($id_categoria==$categoria->id_categoria) 
			{	$out['productos'][]=$value;	}
		}
		return $out;
	}


	/**
	  *La funcion fltarar, hace un conteo del los objetos en el pararametro filtro.
	  *Y extrae los valores correspondientes a los criterios dados
	  *según los datos epecificados con el prarametro filtro.
	  *los fitros recibidos, deberan tener la sgt estructura:
	  *['nombre']; Nombre que recibira el fitro
	  *['tabla']; tabla a la que se recurrira  para buscar el dato de comparacion
	  *['campo_s']; identificador, o enlace con el indice ['tabla']
	  *['campo_t']; identificador de ['tabla']
	  *['valor']; criterio para generar el filtro; 
	  *['tag']; etiqueta para los contadores. 
	  *retorna un areglo de la forma array('valores'=>array(),'objetos'=>array());
	  *donde valores es el conteo y clasificacion de objetos y objetos, son los valores filtrados.
	  * ejemplo de uso:
	    *$usuarios= $this->usuarios->get_all();
		*$filtros[1]['nombre']='departamentos';
		*$filtros[1]['tabla']='departamento';
		*$filtros[1]['campo_s']='departamento';
		*$filtros[1]['campo_t']='id_departamento';
		*$filtros[1]['valor']=30;
		*$filtros[1]['tag']='nombre';
		*$out=$this->filtrar($usuarios,$filtros);
		*El anterior ejemplo da el numero exacto de usuarios por cada departamento ('valores'=>array())
		*Y ademas retorna los usuarios del tepartamento 30, que para el caso son los
		*usuarios del Valle del cauca.('objetos'=>array())
	**/

	public function jhordy()
	{
		$usuarios= $this->usuarios->get_all();
		$filtros[0]['nombre']='departamentos';
		$filtros[0]['tabla']='departamento';
		$filtros[0]['campo_s']='departamento';
		$filtros[0]['campo_t']='id_departamento';
		$filtros[0]['valor']=10;
		$filtros[0]['tag']='nombre';
		$filtros[1]['nombre']='municipios';
		$filtros[1]['tabla']='municipio';
		$filtros[1]['campo_s']='ciudad';
		$filtros[1]['campo_t']='id_municipio';
		$filtros[1]['valor']=0;
		$filtros[1]['tag']='municipio';
		$out=$this->filtrar($usuarios,$filtros);
		echo "start<PRE>";
		print_r($out);
		echo "</PRE>end";
	}
	public function filtrar($stack,$filtros)
	{		
		$out=array('valores'=>array(),'objetos'=>array());
		foreach ($stack as $key => $value) 
		{
			foreach ($filtros as $key => $filtro) 
			{
				$tmp = $this->$filtro['tabla']->get($value->$filtro['campo_s']);
				#if(!$tmp){continue;}
				$out['valores'][$filtro['nombre']][$tmp->$filtro['tag']]+=1;
				if($tmp->$filtro['campo_t']==$filtro['valor'])
				{
					$out['objetos'][$filtro['nombre']][]=$value;
				}
				unset($tmp);
			}
		}
		return $out;
	}
}


/* End of file listado_test.php */
/* Location: ./application/controllers/listado_test.php */
