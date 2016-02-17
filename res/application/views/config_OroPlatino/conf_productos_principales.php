<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/config_OroPlatino/conf_cata_produc.css">

<script type="text/javascript">

	stack=set_stack();
	size=<?php if($destacados){echo count($destacados);}else{echo 0;}?>;
	page = 0;
	first_launch=true;     
	function set_stack()
	{
		out=Array(20);
		for (var i = out.length - 1; i >= 0; i--) 
			{	out[i]=0;	};

		<?php foreach(explode(',',$empresa->productos_destacados) as $key => $value):?>
			<?php if($value==NULL||$value==-1):?>
				out[<?=$key?>]=0;
			<?php else:?>
				out[<?=$key?>]=<?=$value?>;
			<?php endif;?>
		<?php endforeach;?>
		return out;
	}
	function agregar(i,id)
	{
		if(size>=20&&i<20&&i>0)
			return;
		stack[i]=id;

		var popup=new XMLHttpRequest();
        var url_popup="<?=base_url()?>config_empresa/producto/"+id;
        popup.open("GET", url_popup, true);
        popup.addEventListener('load',show,false);
        popup.send(null);

        function show()
        {
        	var datos=popup.response.split(',');
			
			document.getElementById('imagen_pro_'+i).src='<?=base_url()?>uploads/'+datos[0];
			document.getElementById('nombre_pro_'+i).innerHTML=datos[1];
			document.getElementById('nombre_pro_'+i).className ='';
			document.getElementById('link_pro_'+i).style.display='';
			document.getElementById('close').click();
        }
	}
	function ordenar()
	{
		out="";
		for(i=0;i<size+1;i++)
		{
			if(stack[i]==0)
				out+=",";
			else		
				out+=stack[i]+",";
		}
		return out+",-1";
	}
	function submit()
	{	
		document.getElementById('destacados').value= ordenar();
		console.log(ordenar());
		//console.log(stack);
		document.form.submit();
	}
    function lanzar_popup(id)
    {
    	if(!first_launch)
			document.getElementById('close').click();

		out="";
		for(i=0;i<size;i++)
			out+=stack[i]+'A';

        var popup=new XMLHttpRequest();
        var url_popup="<?=base_url()?>config_empresa/productos_empresa/"+id+"/"+out+"/"+page;
        popup.open("GET", url_popup, true);
        popup.addEventListener('load',show,false);
        popup.send(null);
        console.log(url_popup);
        function show()
        {
            var div=document.getElementById('popup_productos_empresa');
            div.innerHTML=popup.response;
            document.getElementById('lanzador_popup_productos').click();
            first_launch=false;     
        }
    } 
    function eliminar_producto(id)
    {    	
		document.getElementById('imagen_pro_'+id).src='<?=base_url()?>uploads/file.jpg';
		document.getElementById('nombre_pro_'+id).innerHTML="Seleccionar producto";
		document.getElementById('nombre_pro_'+id).className ="btn btn1";
		document.getElementById('link_pro_'+id).style.display='none';

		if(id>20&&id<0)
			return;

		stack[id]=0;
    }
    function agregar_producto()
    {
		if(size>=20&&size<=0)
			{alert("Has pasado el limite permitido.");return;}

    	size++;
    	DOM='<div class="img-banner"><div class="subir-img">';
		DOM+='<span class="ico-up glyphicon glyphicon-open"></span>';
		DOM+='<a href="JavaScript:lanzar_popup('+size+')" class="text-up-img"> '+size+'</a>';									
		DOM+='</div>';
		DOM+='<div class="subido-img">';
		DOM+='<img id="imagen_pro_'+size+'" class="imge-subido banner_preview" src="<?=base_url()?>uploads/file.jpg">';
		DOM+='<p class="name-file"><a id="nombre_pro_'+size+'" class="btn1 btn" href="JavaScript:lanzar_popup('+size+')">Seleccionar producto</a></p>';
		DOM+='<a id="link_pro_'+size+'"  href="JavaScript:eliminar_producto('+size+')" class="btn-remov-img" style="display:none"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>';
		DOM+='</div>';
		DOM+='</div>';
		document.getElementById('div_destacados').innerHTML+=DOM;
		stack[size]=0;
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
					<a href="<?=base_url()?>config_empresa/publicar_producto" class="text-subitem">Subir Productos</a>
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
					<a href="<?=base_url()?>config_empresa/catalogo" class="text-subitem">Subir Catálogo</a>
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
						<p>Para mostrar los productos principales de su empresa en las pestañas de <a href="<?=base_url()?>config_empresa/inicio"><span class="ico-prin glyphicon glyphicon-home"></span>Inicio </a>y <a href="<?=base_url()?>producto/administrar"><span class="ico-prin glyphicon glyphicon-th-list"></span>Catálogo de Producto</a>
							debes seguir estos pasos:
						</p>
						<p>1.Debes seleccionar uno o varios productos del listado de "Productos publicados".</p>
						<p>2.Puede configurar el orden en que se mostrarán los Productos Principales, 
							Solo seleccionando en la posicion deseada el producto a mostrar.
						</p>
						<p>3.Hacer click en el botón "Guardar".</p>
					</div>
					<div class="seleccion-producto-prin">
						<div class="titles2">
							<h3 class="text-title-pub2">Productos Principales Seleccionados</h3>
						</div>
					
				<div class="content-config-inicio">
					<div class="titles">
						<h3 class="text-title-up">Seleccione el orden en que quiere sean mostrados su productos</h3>
						<div class="conten-paso1">
							<p class="agreagar-text">Permita que sus produtos estrella, de mayor demanda sean los primeros en mostrase</p> <p class="ver-ejm">- Ver ejemplo</p>
							<p class="medidas-recom">Puede seleccionar los primeros 20 productos que se mostran en su catálogo. </p>
							<div id="div_destacados">
								<?php if(count($destacados)):?>
									<?php foreach ($destacados as $key => $destacado):?>
										<?php if(is_null($destacado->id)):?>
									  	<div class="img-banner">
											<div class="subir-img">
												<span class="ico-up glyphicon glyphicon-open"></span>
												<a href="JavaScript:lanzar_popup(<?=$key?>)" class="text-up-img"><?=$key+1?></a>									
											</div>
											<div class="subido-img">
												<img id="imagen_pro_<?=$key?>" class="imge-subido banner_preview" src="<?=base_url()?>uploads/<?=$destacado->imagenes?>">
												<p class="name-file"><a id="nombre_pro_<?=$key?>" class="btn btn1" href="JavaScript:lanzar_popup(<?=$key?>)"><?=$destacado->nombre?></a></p>
												<a id="link_pro_<?=$key?>" href="JavaScript:eliminar_producto(<?=$key?>)" class="btn-remov-img" style="display:none"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
											</div>
										</div>
									<?php else:?>
									<div class="img-banner">
											<div class="subir-img">
												<span class="ico-up glyphicon glyphicon-open"></span>
												<a href="JavaScript:lanzar_popup(<?=$key?>)" class="text-up-img"><?=$key+1?></a>									
											</div>
											<div class="subido-img">
												<img id="imagen_pro_<?=$key?>" class="imge-subido banner_preview" src="<?=base_url()?>uploads/<?=$destacado->imagenes?>">
												<p class="name-file"><a id="nombre_pro_<?=$key?>" class="" href="JavaScript:lanzar_popup(<?=$key?>)"><?=$destacado->nombre?></a></p>
												<a id="link_pro_<?=$key?>" href="JavaScript:eliminar_producto(<?=$key?>)" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
											</div>
										</div>
									<?php endif;?>
									<?php endforeach;?>
								<?php endif;?>
							</div>
							<div class="conten-mas-videos col-xs-12 col-md-12 col-lg-12">
							  <a class="agregar-mas-videos2" href="JavaScript:agregar_producto();"><i class="ico-mas fa fa-plus-circle"></i> Agregar más productos principales</a>
							</div>
							
							<!-- Campo 7 -->
							<div class="input-group col-xs-12 col-md-12 col-lg-12">
								<button class="btn btn-guardar-inicio" onclick="submit();">
									<i class="ico-circle fa fa-floppy-o"></i>
									<p class="text-publicarPro">Guardar</p> 
								</button>
							</div>
							<?= form_open_multipart('editar_empresa/destacados',array('name'=>'form','id'=>'form')); ?>
								<input type="hidden" name="destacados" id="destacados">
	    					<?=form_close()?>
						</div>
					</div>
				</div>

					</div>
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
<div id="popup_productos_empresa"></div>
