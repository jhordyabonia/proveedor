<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/config_OroPlatino/conf_cata_produc.css">

<script type="text/javascript">

stack=set_stack();
function set_stack()
{
	out=Array(20);
	<?php foreach(explode(',',$empresa->productos_destacados) as $key => $value):?>
		<?php if($value==NULL):?>
			out[<?=$key?>]=0;
		<?php else:?>
			out[<?=$key?>]=<?=$value?>;
		<?php endif;?>
	<?php endforeach;?>
	return out;
}
size=<?php if($destacados){echo count($destacados);}else{echo 0;}?>;
function agregar(id)
{
	if(size>=20)
		return;
	nombre=document.getElementById('nombre_producto_'+id).innerText;
	imagen=document.getElementById('imagen_producto_'+id).src;
	DOM='<div class="conten-item-prin col-lg-4" id="destacado_'+size+'">';
	DOM+='	<div class="content-numero">';
	DOM+='	<p class="numero">'+size+'</p>';
	DOM+='</div>';
	DOM+='<div class="subir_bajar">';
	DOM+='	<i class="sub-aba fa fa-chevron-up"></i><a href="JavaScript:subir('+size+');">Subir</a><br>';
	DOM+='	<i class="sub-aba fa fa-chevron-down"></i><a href="JavaScript:bajar('+size+');">Bajar</a>';
	DOM+='</div>';
	DOM+='<div class="img-nom-remove" id="img'+(size+1)+'">';
	DOM+='	<img class="img_mini_preview_producto" src="'+imagen+'">';
	DOM+='</div>';
	DOM+='<div class="nom-prod" >';
	DOM+='	<p class="nom-produc" id="nom'+size+'">'+nombre+'</p>';
	DOM+='<a class="rem-pro" href="JavaScript:borrar('+size+')"><span class="icono-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>';
	DOM+='</div>';
	DOM+='</div>';
	document.getElementById('canvas').innerHTML+=DOM;
	stack[size++]=id;
	document.getElementById('producto_'+id).innerText="Seleccionado";
	//console.log(DOM);
}
function borrar(id)
{
	for(i=id;i<(size-1);i++)
		{bajar(i);}
	document.getElementById('destacado_'+(size-1)).remove();
	stack[--size]=undefined;
}
function subir(id)
{
	if(id<=0)
		return;

	tmp=0;

	nombre = document.getElementById('nom'+(id-1)).innerHTML;
	document.getElementById('nom'+(id-1)).innerHTML=document.getElementById('nom'+id).innerHTML;
	document.getElementById('nom'+id).innerHTML=nombre;

	imangen = document.getElementById('img'+(id-1)).innerHTML;
	document.getElementById('img'+(id-1)).innerHTML=document.getElementById('img'+id).innerHTML;
	document.getElementById('img'+id).innerHTML=imangen;
	
	tmp=stack[id];
	stack[id]=stack[id-1];
	stack[id-1]=tmp;
}
function bajar(id)
{
	if(id==19)
		return;

	nombre = document.getElementById('nom'+(id+1)).innerHTML;
	document.getElementById('nom'+(id+1)).innerHTML=document.getElementById('nom'+id).innerHTML;
	document.getElementById('nom'+id).innerHTML=nombre;

	imangen = document.getElementById('img'+(id+1)).innerHTML;
	document.getElementById('img'+(id+1)).innerHTML=document.getElementById('img'+id).innerHTML;
	document.getElementById('img'+id).innerHTML=imangen;

	tmp=stack[id+1];
	stack[id+1]=stack[id];
	stack[id]=tmp;
}
function ordenar()
{
	out=Array();
	for(i=0;i<size;i++)
	{
		if(stack[i]==0)
		{ continue;}
		out[out.length]=stack[i];
	}
	stack=out;
}
function submit()
{	
	ordenar();
	document.getElementById('destacados').value=stack;
	//console.log(stack);
	document.form.submit();
}

</script>

<div class="contenedor-config">
	<div class="title-config">
		<div class="conten-title col-xs-12 col-md-12 col-lg-12">
			<i class="ico-style-config fa fa-cog"></i>
			<h3 class="text-title-config">Configuracion</h3>
		</div>
	</div>
	<div class="container-config">
		<div class="conten-config8 col-xs-12 col-md-12 col-lg-12">
			<div class="conten-item5 col-xs-12 col-md-3 col-lg-3">
				<h3 class="text-item">General</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-perfil fa fa-building-o"></i>
					<a href="<?=base_url()?>config_empresa/perfil_empresa" class="text-subitem">Perfil de empresa</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-contacto fa fa-phone"></i>
					<a href="<?=base_url()?>config_empresa/contacto" class="text-subitem">Contacto</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-usuario fa fa-child"></i>
					<a href="<?=base_url()?>config_empresa/usuario" class="text-subitem">Usuario</a>
				</div>
				<h3 class="text-item-dos">Configurar Web</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-home"></span>
					<a href="<?=base_url()?>config_empresa/inicio" class="text-subitem">Inicio</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-th-list"></span>
					<a href="<?=base_url()?>config_empresa/publicar_producto" class="text-subitem">Catalogo de Productos</a>
				</div>
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-bookmark"></span>
					<a href="<?=base_url()?>config_empresa/productos_principales" class="text-subitem">Productos Principales</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-briefcase"></span>
					<a href="<?=base_url()?>config_empresa/nosotros" class="text-subitem">Nosotros</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="ico-config-style2 fa fa-file-text"></i>
					<a href="<?=base_url()?>config_empresa/cotizaciones" class="text-subitem">Cotizaciones requeridas</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-open"></span>
					<a href="<?=base_url()?>config_empresa/catalogo" class="text-subitem">Subir Catalogo</a>
				</div>
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<span class="ico-cont-style glyphicon glyphicon-bookmark"></span>
					Productos Principales
				</h3>
				<div class="content-catalogo-pro2">
					<div class="titles">
						<h3 class="text-title-pub">Seleccionar Productos Principales</h3>
					</div>
					<div class="conten-formulario-cata">						
						<p>Para mostrar los productos principales de su empresa en las pestañas de <span class="ico-prin glyphicon glyphicon-home"></span>Inicio y <span class="ico-prin glyphicon glyphicon-th-list"></span>Catalogo de Producto
							debes seguir estos pasos:
						</p>
						<p>1.Debes seleccionar uno o varios productos del listado de "Productos publicados".</p>
						<p>2.Puede configurar el orden en que se mostrarán los Productos Principales, 
							haciendo click en <i class="ico-ip-down fa fa-chevron-up"></i><strong class="subir-strong">Subir</strong> "Subir" 0 <i class="ico-ip-down fa fa-chevron-down"></i><strong class="subir-strong">Bajar</strong> "Bajar"
							del listado de "Productos Seleccionados".
						</p>
						<p>3.Hacer click en el botón "Guardar".</p>
					</div>
					<div class="seleccion-producto-prin">
						<div class="titles2">
							<h3 class="text-title-pub2">Productos Principales Seleccionados (Maximo 20)</h3>
						</div>
						<div class="conten-selected">
							<div id="canvas">
								<?php foreach($destacados as $key => $producto):?>
									<?php if(!$producto){continue;}?>
									<div class="conten-item-prin col-lg-4" id="destacado_<?=$key?>">
										<div class="content-numero">
											<p class="numero"><?=$key?></p>
										</div>
										<div class="subir_bajar">
											<i class="sub-aba fa fa-chevron-up"></i><a href="JavaScript:subir(<?=$key?>);">Subir</a><br>
											<i class="sub-aba fa fa-chevron-down"></i><a href="JavaScript:bajar(<?=$key?>);">Bajar</a>
										</div>
										<div class="img-nom-remove" id="img<?=$key?>">
											<img class="img_mini_preview_producto" src="<?=base_url()?>uploads/<?=$producto->imagenes?>">
										</div>
										<div class="nom-prod">
											<p class="nom-produc" id="nom<?=$key?>"><?=$producto->nombre?></p>
											<a class="rem-pro" href="JavaScript:borrar(<?=$key?>)"><span class="icono-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
										</div>
									</div>
								<?php endforeach;?>
							</div>
							<!-- Campo 7 -->
							<div class="row">
								<?=form_open_multipart(base_url().'editar_empresa/destacados',array('name'=>'form'))?>
									<input type="hidden" name="destacados" id="destacados">
									<div class="input-group col-xs-12 col-md-6 col-lg-8">
										<a href="JavaScript:submit();" class="btn btn-guardar-propri">
											<i class="ico-circle fa fa-floppy-o"></i>
											<p class="text-publicarPro">Guardar</p> 
										</a>
									</div>
		    					<?=form_close()?>
							</div>
						</div>
					</div>
					<div class="catalogo-public">
						<h3 class="text-pro-pub-ca">Productos Publicados (<?=count($productos)?>)</h3>	
						<p class="text-select">Seleccione uno o varios productos como "Principales".</p>
						<ul class="list-item-pro-pri">
							<li class="item-cata inline-block" style="margin-right: 40px;">
								<span class="glyphicon glyphicon-open"></span>
								Publicar Producto
							</li>
							<li class="item-cata inline-block">
								<span class="glyphicon glyphicon-th"></span>
								Administrar Productos
							</li>
						</ul>
						<hr class="hr-separador">
						<div class="conten-item-catapu2 row">
						<?php foreach($productos as $producto):?>
							<div class="padding-bottom col-lg-6">
								<div class="imagen-prin inline-block">
									<img class="img-responsive img_preview_producto" id="imagen_producto_<?=$producto->id?>" src="<?=base_url()?>uploads/<?=$producto->imagenes?>">
								</div>
								<div class="info-pro-pri inline-block">
									<p class="txt_nomproducto2" id="nombre_producto_<?=$producto->id?>"><?=$producto->nombre?></p>
									<p class="txt_precio">Precio: $<?=$producto->precio_unidad?></p>
									<p class="txt_pedido">Pedido Minimo: <?=$producto->pedido_minimo?> <?=$producto->medida?></p>
									<p class="txt_desc"><?=$producto->descripcion?></p>
									<button class="btn btn-selecc-princi">
										<span class="ico-config-style glyphicon glyphicon-bookmark"></span>
										<p class="selec-pri-txt inline-block" id="producto_<?=$producto->id?>"><a class="select_button" href="JavaScript:agregar(<?=$producto->id?>);">Seleccionar como Principal</a></p>
									</button>
								</div>
							</div>
						<?php endforeach;?>					</div>
						<!-- Paginador de catalogos -->
						<div class="contentidoo-paginador">
						  <ul class="pagination">	

						  <!--					   
						    <li><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li>
						      <a href="#" aria-label="Next">
						        <span aria-hidden="true">siguiente</span>
						      </a>
						    </li>
						-->
						  </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>