<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Tablero_usuario extends CI_Controller {

	///Constructor de la clase del control
	function __construct() {
		parent::__construct();
		$this->ci = &get_instance();
		$this->load->library('session');
		$this->load->model('new/Mensajes_model','mensajes');
		$this->load->model('new/Producto_model','producto');
		$this->load->model('new/Solicitud_model','solicitud');
		$this->load->model('new/Membresia_model','membresia');
		$this->load->model('new/Empresa_model','empresa');
		$this->load->model('new/Usuarios_model','usuarios');
		$this->load->model('new/Categoria_model','categoria');
		$this->load->model('asistentes_proveedor_model','asistentes_proveedor');
	}

	/////funcion para llamar la pagina de perfil de usuario
	function index() 
	{		
  	 	$this->session->set_userdata('path_current',base_url()."tablero_usuario");
		$iduser = $this->session->userdata('id_usuario');
		
		$datos['nuevos'] = $this->mensajes->get_all(array('destinatario' => $iduser, 'estado' => 0));
		$datos['recibidos'] = $this->mensajes->get_all(array('destinatario' => $iduser, 'estado' => 1));
		$remitente = $this->usuarios->get($iduser)->email;
		$remitente = $this->usuarios->get(array('email' => $remitente));
		
		$datos['enviados']=FALSE;
		if($remitente)
		{	
			$datos['enviados'] =$this->mensajes->get_all(array('remitente' => $remitente->id));		
		}
		if($datos['nuevos'])
		{$datos['count_msj']=count($datos['nuevos']);}
		else {$datos['count_msj']=0;}		
		if($datos['recibidos'])
		{$datos['count_msj2']=count($datos['recibidos']);}
		else {$datos['count_msj2']=0;}

		$datos['empresa']=$this->empresa->get(array('usuario'=>$iduser));

		if(!$datos['empresa'])#completar registro de empresa, en caso de estar incompleto.
		{
			$this->session->set_userdata('usuario_incorrecto',"Usuario o Contraseña incorrecta.");
			redirect(base_url()."logueo",'refresh');
			#{redirect('registro/asistente_registro/'.$this->usuarios->get($iduser)->usuario,'refresh');}
		}

		$datos['membresia']=$this->membresia->get($datos['empresa']->membresia);

		$datos['count_contactos'] = 0;#$this->tablero_model->cantidad_usuarios($iduser);
		$count_ofertas=$this->solicitud->get_all(array('empresa'=>$datos['empresa']->id));
		if($count_ofertas)
		{	$datos['count_ofertas'] = count($count_ofertas);	}
		else {$datos['count_ofertas'] =0;	}
		$count_productos=$this->producto->get_all(array('empresa'=>$datos['empresa']->id));
		if($count_productos)
		{	$datos['count_productos'] = count($count_productos);	}
		else { $datos['count_productos'] =0;	}
		#$this->load->model('Membresia_model','membresia');		

		$datos['nombre_membresia']=$datos['membresia']->nombre;
		$datos['membresia']=$this->membresia->get_div_list($datos['empresa']->id);
    	$datos['oportunidades']=$this->oportunidades(FALSE,FALSE);
		$datos['usuario']=$this->usuarios->get($iduser);
    	$datos['administrador']=FALSE;
    	
    	if($datos['usuario']->permisos==1)
    	{$datos['administrador']=TRUE;}
		$datos['titulo']="Tablero de usuario - PROVEEDOR.com.co";
		
	    #if ($this->ci->agent->is_mobile()){
	    #	$template = new League\Plates\Engine(APPPATH.'views');
		#	echo $template->render('tablero_usuario/tablero_movil', $datos);
		#}else{
			#$this->load->view('template/head', $datos);
			$this->load->view('tablero_usuario/new/head', $datos);
			$this->load->view('tablero_usuario/new/header', $datos);
			$this->load->view('tablero_usuario/new/nav_bar', $datos);
			$this->load->view('tablero_usuario/new/home', $datos);
			if($this->session->userdata('first_ligin')==1)
			{
		    	$this->load->view('popups/confirmacion/registro_completo');
				$this->session->set_userdata('first_ligin',0);
			};			
			$this->load->view('tablero_usuario/new/footer', $datos, FALSE);
		#}
	}

	public function activar_solicitud($id)
	{
  	 	$this->session->set_userdata('path_current',base_url()."tablero_usuario/activar_solicitud/".$id);
		$this->index();

		$source=$this->asistentes_proveedor->get($id);

    	if(!$this->verificar_logged($source->empresa))
    		{return;}

        $this->load->model('popups_textos_model', 'popups_textos');
        $datos=$this->popups_textos->get(array('categoria'=>$source->categoria));
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
        
        $dat['auto_launch_AP']=TRUE;
        $dat['datos']=$datos;
        $dat['solicitud']=$source;
        $dat['index'] = FALSE;     
        $dat['categorias']  = $this->categoria->get_all();  
        $dat['view'] = "asistentes_proveedor_popup";      
        $dat['categoria'] = $this->categoria->get($source->categoria);      
        $dat['id_popup'] = "asistentes_proveedor_popup";             
        $this->load->view('popups/asistentes_proveedor_editar', $dat);
	}

 	function verificar_logged($id_empresa_solictud)
 	{
 		$usuario= $this->session->userdata('id_usuario');
 		$empresa = $this->empresa->get(array('usuario'=>$usuario))->id;
 		if($empresa==$id_empresa_solictud)
 			{return TRUE;}
 		return FALSE;
 	}
 	public function editar_solicitud_externa($id=20)
    {
		$source=$this->asistentes_proveedor->get($id);

    	if(!$this->verificar_logged($source->empresa))
    		{
    			redirect(base_url()."tablero_usuario",'refresh');
    			return;
    		}

    	$datos['solicitud'] = $this->input->post('solicitud');
		$datos['descripcion'] = $this->input->post('descripcion');
		$datos['cantidad_requerida'] = $this->input->post('cantidad_requerida');
		$datos['precio'] = $this->input->post('precio');
		$datos['forma_de_pago'] = $this->input->post('pago');
		#$datos['email'] = $this->input->post('email');
		$datos['nombres'] = $this->input->post('nombres');
		$datos['telefono'] = $this->input->post('telefono');
		$datos['nombre_empresa'] = $this->input->post('nombre_empresa');
		$datos['categoria'] = $this->input->post('categoria');
		$datos['ciudad_entrega'] = $this->input->post('ciudad');


		$this->asistentes_proveedor->update($datos,$source->id);
		#echo "<PRE>";
		#print_r($datos);
		$this->session->set_userdata('first_ligin',1);
		redirect(base_url()."tablero_usuario"); 
    }
	public function oportunidades($categoria=FALSE,$print=TRUE)
	{	

		$id_usuario=$this->session->userdata('id_usuario');
		
		$datos['empresa']=$this->empresa->get(array('usuario'=>$id_usuario));
		$categorias_empresa=explode('|',$datos['empresa']->categorias);
		$datos['membresia']=$datos['empresa']->membresia;
		$datos['datos']=array();

		if($categoria)
		{		$datos['categoria']=$this->categoria->get($categoria);	}
		else
		{
			for($i=0;$i<count($categorias_empresa);$i++)
			{
				if($categorias_empresa[$i]=="")
					{continue;}

				$datos['categoria']=$this->categoria->get($categorias_empresa[$i]);	
				if($datos['categoria']!=FALSE)
					break;
			}
		}

		#if(!$categoria)
		#{
		#	$solicitudes=$this->asistentes_proveedor->get_all();
		#}else
		#{			
			$solicitudes=$this->asistentes_proveedor->get_all(array('categoria'=>$datos['categoria']->id_categoria));
		#}

		$datos['total_oportunidades']=0;
		$datos['numero_nuevas']=0;
		$dotos['page_count'] = count($solicitudes)/25;
		#$datos['page']=($this->input->post('page')-1);	
		#$datos['datos'] = array();		    	
		foreach ($solicitudes as $key => $solicitud)
		{
			if($solicitud->publicada==0)
				{ continue;}
			if(!$categoria)
			{
				foreach ($categorias_empresa as $value)
				{
					if($solicitud->categoria==$value)
					{
						$datos['datos'][]=$solicitud;
						break;
					}
				}
			}else {	$datos['datos'][]=$solicitud;}					
			/*
			if($key<($datos['page']*25))
			{  continue; }
			if($datos['page']>0)
			{
				if($key>=($datos['page']*50))	
				{break;}
			}	
			else
			{
				if($key>=25)	
				 {break;}
			}
			*/
		}
		$datos['total_oportunidades']=count($datos['datos']);

		$datos['categorias']=$this->categoria->get_all();
		
    	$datos['titulo']="Mis oportunidades comerciales -Proveedor.com.co ";
		$datos['usuario']=$this->session->userdata('usuario');

		$fecha="".date("Y m d");
		$fecha = str_replace(" ", "-",$fecha);
		$dia = substr($fecha,0,10);
		foreach ($datos['datos'] as $key => $value)
		{
			if($dia==substr($value->fecha,0,10))
			{$datos['numero_nuevas']+=1;}
		}

		#echo $dia.'<BR>';
		#echo $fecha.'<BR>';
		#echo substr($datos['datos'][0]->fecha,0,10).'<BR>';
		#echo $datos['datos'][0]->fecha;
		#return;

		if(!$print)	return $datos;

		$datos['nit']=$this->session->userdata('empresa');
		$datos['usuario']=$this->usuarios->get($id_usuario);
		$datos['administrador']=$datos['usuario']->permisos;
		$datos['titulo']="Oportunidades Comerciales - PROVEEDOR.com.co";

		$this->load->view('template/head', $datos);
		$this->load->view('template/javascript', FALSE);
		$this->load->view('tablero_usuario/header', $datos, FALSE);
		#$dotos['page_count'] = 1;
	    $this->load->view('tablero_usuario/solicitudes_externas', $datos); 
		$this->load->view('template/footer', $datos, FALSE);
	}
}
