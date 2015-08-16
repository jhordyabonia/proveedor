<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vaciado_model extends CI_Model {

    public function construct() 
    {
        parent::__construct();

	}

	private function to_string($tabla,$where, $select='*')
	{
			$bd_vieja = $this->load->database('prueba', TRUE);

	 		$bd_vieja->select($select);	    
		 	$bd_vieja->from($tabla);
	 		$bd_vieja->where($where);
	 		$result_tmp=$bd_vieja->get();

	 		if($select=='*')
	 			{ return $result_tmp->result();}

	 		$out='';
	 		if($result_tmp)
	 		{
	 			foreach($result_tmp->result() as $value)
	 			{	$out.= $value->$select.","; }
	 		}
	 		return $out;
	 }

	public function linking($mach,$tabla, $where)
	{
		$bd_nueva = $this->load->database('default', TRUE);
		foreach ($mach as $key => $value)
		{
			$bd_nueva->update($tabla,array($where=>$value['id_usuario']),array($where=>$value['id_contacto']*-1));
		}
		if($tabla!="empresa")
		{	$bd_nueva->query("DELETE FROM $tabla WHERE `empresa`< 0");	}
	 	#{$bd_nueva->delete($tabla,array('empresa'=>'<0'));}
	}

	public function halt()
	{
		$bd_nueva = $this->load->database('default', TRUE);
		$bd_nueva->query("DELETE FROM `producto` WHERE 1");
		$bd_nueva->query("DELETE FROM `solicitud` WHERE 1");
		$bd_nueva->query("DELETE FROM `empresa` WHERE 1");
		$bd_nueva->query("DELETE FROM `usuarios` WHERE 1");
	}

	 public function empresas()
	 {
		$bd_vieja = $this->load->database('prueba', TRUE); 
	 	$bd_vieja->select('*');	    
	 	$bd_vieja->from('empresa');
	 	$bd_vieja->join('membresia_empresa','empresa.nit=membresia_empresa.id_empresa');
	 	$empresas=$bd_vieja->get()->result();
	 	foreach ($empresas as $key => $empresa) 
	 	{
		 	$empresa->producto_empresa=$this->to_string('producto_empresa',array('nit_empresa'=>$empresa->nit),'nombre_producto');
		 	$empresa->producto_interes=$this->to_string('producto_interes',array('nit_empresa'=>$empresa->nit),'nombre_producto');
		 	$empresa->id_categoria=$this->to_string('categoria_empresa',array('nit_empresa'=>$empresa->nit),'id_categoria');
		 	if(intval($empresa->tipo_empresa)==0)
		 	{	$empresa->tipo_empresa=1;	}

	 		$empresas[$key]=$empresa;
	 	}

	 	#return $empresas;

	 	$out=null;
		$bd_nueva = $this->load->database('default', TRUE);

	 	foreach( $empresas as $registro)
	 	{
	 		$data= array(
	 			'nombre'=>$registro->nombre,
	 			'nit'=>$registro->nit,
	 			'descripcion'=>$registro->descripcion,
	 			'logo'=>$registro->logo|"default.jpg",
	 			'membresia'=>$registro->id_membresia|1,
	 			'productos_principales'=>$registro->producto_empresa,
	 			'productos_de_interes'=>$registro->producto_interes,
	 			'categorias'=>$registro->id_categoria,
	 			'tipo'=>$registro->tipo_empresa,
	 			'usuario'=>$registro->id_contacto*-1
	 			);
	 		$bd_nueva->insert('empresa',$data);
	 		$tmp['id_usuario']=$bd_nueva->insert_id();
	 		$tmp['id_contacto']=$registro->id_contacto;
	 		$out[]=$tmp;
	 	}
	 	$this->load->database('default', TRUE); 
	 	return $out;
	}

	 public function usuarios()
	 {
		$bd_vieja = $this->load->database('prueba', TRUE); 
	 	$bd_vieja->select('*');	    
	 	$bd_vieja->join('contacto','contacto.id_user=usuario.id_usuario');
	 	$bd_vieja->join('telefono','contacto.id_contacto=telefono.id_contacto');
	 	#$bd_vieja->join('empresa','empresa.id_contacto=contacto.id_contacto');
	 	$bd_vieja->from('usuario');
	 	$bd_vieja=$bd_vieja->get()->result();
		
		$bd_nueva = $this->load->database('default', TRUE);
	 	$out=null;
	 	foreach($bd_vieja as $registro)
	 	{
	 		$data= array(
	 			'usuario'=>$registro->usuario,
	 			'email'=>$registro->email,
	 			'password'=>$registro->password,
	 			'rol'=>$registro->rol_usuario,
	 			'nombres'=>$registro->nombres,
	 			'cargo'=>$registro->rol_usuario,
	 			'pais'=>$registro->pais,
	 			'departamento'=>$registro->departamento|1,
	 			'ciudad'=>$registro->ciudad|1,
	 			'web'=>$registro->web,
	 			'celular'=>$registro->celular,
	 			'telefono'=>$registro->numero,
	 			'permisos'=>$registro->id_contacto
	 			);
	 		$bd_nueva->insert('usuarios',$data);
	 		$tmp['id_usuario']=$bd_nueva->insert_id();
	 		$tmp['id_contacto']=$registro->id_contacto;
	 		$out[]=$tmp;
	 	}
	 	$this->load->database('default', TRUE); 
	 	return $out;
	 }

	 public function producto()
	 {
		$bd_vieja = $this->load->database('prueba', TRUE); 
	 	$bd_vieja->select('*');	    
	 	$bd_vieja->from('producto');
	 	$bd_vieja->join('negociacion','negociacion.id_producto=producto.id_producto');
	 	$bd_vieja->join('usuario','usuario.id_usuario=producto.id_usuario');
	 	$bd_vieja->join('contacto','contacto.id_user=usuario.id_usuario');

	 	$productos=$bd_vieja->get()->result();

	 	foreach ($productos as $key => $producto) 
	 	{
	 		$where =array('id_producto'=>$producto->id_producto);

		 	$producto->nombre_img=$this->to_string('img_producto',$where,'nombre_img');
		 	$producto->tipo_pago=$this->to_string('pago',$where,'tipo_pago');
		 	$producto->palabra=$this->to_string('palabrasclave',$where,'palabra');
			if(intval($producto->medida)==0||$producto->medida>30)
		 	{		$producto->medida=1;	}

	 		$productos[$key]=$producto;
	 	}

		$bd_nueva = $this->load->database('default', TRUE);
	 	$out=null;
	 	foreach($productos as $registro)
	 	{
	 		$data= array(
	 			'nombre'=>$registro->nom_producto,
	 			'descripcion'=>$registro->descripcion_producto,
	 			'subcategoria'=>$registro->id_subcategoria,
	 			'estado'=>$registro->estado,
	 			'empresa'=>$registro->id_contacto*-1,
	 			'imagenes'=>$registro->nombre_img,
	 			'palabras_clave'=>$registro->palabra,
	 			'formas_de_pago'=>$registro->tipo_pago,
	 			'precio_unidad'=>$registro->precio_unidad,
	 			'pedido_minimo'=>$registro->pedido_min,
	 			'medida'=>$registro->medida|1,
	 			'fecha_publicacion	'=>$registro->fecha_publicacion	
	 			);
	 		$bd_nueva->insert('producto',$data);
	 	}
	 	#$bd_nueva->update('producto',array('medida'=>1),array('medida'=>0));

	 	$this->load->database('default', TRUE); 
	 	return $out;
	 }
	 public function oferta()
	 {
		$bd_vieja = $this->load->database('prueba', TRUE); 
	 	$bd_vieja->select('*');	    
	 	$bd_vieja->from('oferta');
	 	$bd_vieja->join('negociacion2','negociacion2.id_oferta=oferta.id_oferta');
	 	$bd_vieja->join('usuario','usuario.id_usuario=oferta.id_usuario');
	 	$bd_vieja->join('contacto','contacto.id_user=usuario.id_usuario');

	 	$solicitudes=$bd_vieja->get()->result();

	 	foreach ($solicitudes as $key => $solicitud) 
	 	{
	 		$where =array('id_oferta'=>$solicitud->id_oferta);

		 	$solicitud->nombre_img=$this->to_string('img_oferta',$where,'nombre_img');
		 	$solicitud->tipo_pago=$this->to_string('pago2',$where,'tipo_pago');
		 	$solicitud->palabra=$this->to_string('palabras_clave',$where,'palabra');

		 	if(intval($solicitud->medida)==0||$solicitud->medida>30)
		 	{	$solicitud->medida=1;	}

	 		$solicitudes[$key]=$solicitud;
	 	}
		
		$bd_nueva = $this->load->database('default', TRUE);
	 	$out=null;
	 	foreach($solicitudes as $registro)
	 	{	 		
	 		$data= array(
	 			'nombre'=>$registro->nom_producto,
	 			'descripcion'=>$registro->descripcion,
	 			'subcategoria'=>$registro->id_subcategoria,
	 			'empresa'=>$registro->id_contacto*-1,
	 			'imagenes'=>$registro->nombre_img,
	 			'palabras_clave'=>$registro->palabra,
	 			'formas_de_pago'=>$registro->tipo_pago,
	 			'cantidad_requerida'=>$registro->cantidad_requerida,
	 			'ciudad_entrega'=>$registro->ciudad_entrega|1113,
	 			'departamento_entrega'=>$registro->dpto_entrega|33,
	 			'precio_maximo'=>$registro->precio,
	 			'medida'=>$registro->medida|1,
	 			'fecha_publicacion	'=>$registro->fecha_publicacion	
	 			);
	 		$bd_nueva->insert('solicitud',$data);
	 	}
	 	#$bd_nueva->update('solicitud',array('medida'=>1),array('medida'=>0));

	 	$this->load->database('default', TRUE); 
	 	return $out;
	 }
}