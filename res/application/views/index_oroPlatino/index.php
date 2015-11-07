<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/index_oroPlatino/index_oroPlatino.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="imagen_principal">
	<div class="container_imagen">

	<!--<link rel="stylesheet" href="<?php echo base_url()?>assets/css/index/index.css">-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#carouselInicio').carousel({interval: 5000});
  });
</script>
<div class="row" id="banner" >
  <!-- Seccion de Carousel -->
  <div class="row" id="foto_principal">
    <!-- Carousel-->
    <div id="carouselInicio" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php foreach (explode(',', $empresa->banners) as $i => $banner): ?>
          <?php if($banner==""){break;}?>
            <li data-target="#carouselInicio" data-slide-to="<?=$i;?>" 
              class="<?php if($i==0){ echo 'active';} ?>"></li>
          <?php endforeach ?>
        </ol>
        <div class="carousel-inner" >
          <?php foreach (explode(',', $empresa->banners)  as $i => $banner): ?>
          <?php if($banner==""){break;}?>
            <div class="item anti-active <?php if($i==0){ echo 'active';} ?>">
            	<center>
                	<img src="<?php echo base_url().'uploads/banners/'.$banner?>" class="img-responsive banner">
            	</center>
             </div>
          <?php endforeach ?>
        </div>
    </div> 
  </div>
</div>



	<!--	<img class="banners img-responsive" src="<?=base_url()?>uploads/banners/<?=$empresa->banners?>">-->


	</div>
</div>
<div class="producto_principales">
	<div class="title_productosPrincipales">
		<div class="col-md-3">
			<ul class="list_pro">
				<li>
					<ul class="active list_pro">
						<a class="title_producPrin" href="">Productos Principales</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="container_productos_principales col-md-12">
		<span class="ico_flecha_left glyphicon glyphicon-chevron-left"></span>
		<div class="contenedor_productos_item">
		<?php foreach($destacados as $key=>$producto):?>
		<?php if(!$producto){continue;}?>
			<div class="item_procud">
				<div class="imagen_producto"><a href="<?=base_url()?>producto/ver/<?=$producto->id?>"><img class="img_producto" src="<?=base_url()?>uploads/<?=$producto->imagenes?>"></div></a>
				<div class="contexto_producto">
					<div class="textos">
						<div class="info_producto">
							<a class="nombre_producto" href="<?=base_url()?>producto/ver/<?=$producto->id?>"><p class="nombre_producto"><?=$producto->nombre?></p></a>
						</div>
						<p class="texto_precio"><?php if($producto->precio_unidad==0){echo "Precio a convenir.";}else{echo '$'.decimal_points($producto->precio_unidad);}?></p>
						<p class="unidades"><?php if($producto->pedido_minimo==0){echo "Pedido mínimo a convenir.</p>";}else{echo decimal_points($producto->pedido_minimo)." X ".$producto->medida.'<p class="pedido">pedido mínimo</p>';}?>
					</div>
				</div>
				<!--<input type="checkbox" class="checkbox">-->
			</div>
		<?php endforeach;?>
		<?php foreach($productos as $key=>$producto):?>
		<?php if(!$producto){continue;}?>
			<div class="item_procud">
				<div class="imagen_producto"><a href="<?=base_url()?>producto/ver/<?=$producto->id?>"><img class="img_producto" src="<?=base_url()?>uploads/<?=$producto->imagenes?>"></div></a>
				<div class="contexto_producto">
					<div class="textos">
						<div class="info_producto">
							<a class="nombre_producto" href="<?=base_url()?>producto/ver/<?=$producto->id?>"><p class="nombre_producto"><?=$producto->nombre?></p></a>
						</div>
						<p class="texto_precio"><?php if($producto->precio_unidad==0){echo "Precio a convenir.";}else{echo '$'.decimal_points($producto->precio_unidad);}?></p>
						<p class="unidades"><?php if($producto->pedido_minimo==0){echo "Pedido mínimo a convenir.</p>";}else{echo decimal_points($producto->pedido_minimo)." X ".$producto->medida.'<p class="pedido">pedido mínimo</p>';}?>
					</div>
				</div>
				<input type="checkbox" class="checkbox">
			</div>
		<?php endforeach;?>
			<!---->
	
		<span class="ico_flecha_right glyphicon glyphicon-chevron-right"></span>
		<div class="vercatalogo col-md-12 col-lg-12">
			<span class="glyphicon glyphicon-th-list"></span>
			<a class="texto_vercatalogo" href="<?=base_url()?>empresa/catalogo_producto/<?=$empresa->id?>">Ver Catalogo > </a>
		</div>
	</div>
	<div class="conten_btn_soli_coti col-md-12" data-toggle="modal" data-target="#popup_mensajes">
		<button class="btn btn_soli">
			<i class="icono-soli fa fa-file-text"></i>
			<p class="texto-soli">SOLICITAR COTIZACION</p>
		</button>
	</div>
</div>

<div class="videos_empresa">
	<div class="title_videos col-md-12">
		<div class="col-md-3">
			<ul class="list-title-videos">
				<li>
					<ul class=" active list-title">
						<a class="texto-nuestra_empresa">Videos de Empresa</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="contenido_videos col-md-12">
		<span class="ico_flecha_left_video glyphicon glyphicon-chevron-left"></span>
		<?php foreach (explode(',',$empresa->videos) as $key => $value):?>
		<?php if($value==''){continue;}?>
			<ul class="item_video">
				<li>
					<ul class="item_video">
						<div class="item-video">
							<div class="video">
								<iframe   class="img_video img-responsive" src="<?=$value?>"></iframe>
							</div>
							<div class="titulo_video">
								<p>Video <?=$key?></p>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		<?php endforeach;?>
		<span class="ico_flecha_right_video glyphicon glyphicon-chevron-right"></span>
	</div>
</div>

<div class="contenedor_nuestraempresa">
	<div class="nuestra_empresa col-md-12">
		<div class="col-md-3">
			<ul class="list-title">
				<li>
					<ul class=" active list-title">
						<a class="texto-nuestra_empresa">Nuestra Empresa</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="info_nuestra_empresa col-md-12">
		<div class="container_nues_empresa col-md-12">
			<div class="title-nom_empresa"><p class="texto_nom_empre">Provestand de Colombia S.A.S</p></div>
			<div class="conten_info col-md-8">
				<div class="info">
					<div class="tipo_empresa inline-block">
						<img class="style_empresa img-responsive" src="<?=base_url()?>assets/img/membresia/logo_mem_platino.png">
						<p class="inline-block">Empresa Oro</p>
					</div>
					s
					<div class="boton_descargar inline-block">
						<span class="ico_descar glyphicon glyphicon-download-alt"></span>
						<a href="<?=base_url()?>empresa/descargar_catalogo/<?$empresa->id?>"><p class="texto_des_cata">Descargar Catalogo</p></a>
					</div>
				</div>
				<div class="texto_nuestra_empresa">
					<p class="texto1">Tipo de Empresa: <a class="text02"><?=$empresa->tipo?></a> </p>
					<p class="texto1">Productos Principales: <a class="text02"><?=$empresa->productos_principales?></a></p>
					<p class="texto_descripcion"><?=$empresa->descripcion?></p>
					<p id="telefonos" style="display:none;font-size:21px;"><b>Telefono:</b> <?=$usuario->telefono?> <b>Cel:</b> <?=$usuario->celular?> </p>
				</div>
				<div class="botones_contac">
					<button class="btn llamar_empresa" onclick="if(document.getElementById('telefonos').style.display==''){document.getElementById('telefonos').style.display='none'}else{document.getElementById('telefonos').style.display='';}">
						<span class="icon_compartir glyphicon glyphicon-earphone"></span>
						<p class="texto_contacto" >Llamar a la Empresa</p>
					</button>
					<button class="btn contactar_empresa" data-toggle="modal" data-target="#popup_mensajes">
						<span class="icon_compartir glyphicon glyphicon-envelope"></span>
						<p class="texto_contacto">Contactar Empresa</p>
					</button>
				</div>
				<div class="redes_compartir">
					<img class="style-sonisa img-responsive" src="<?=base_url()?>assets/img/sonrisaprecio.png">
					<p class="texto_redes">Compartir:</p>
					<ul class="list_redes">
						<li><a href="<?=$usuario->facebook?>"><i class=" icono_redes fa fa-facebook-square"></i></a></li>
						<li><a href="<?=$usuario->twitter?>"><i class=" icono_redes fa fa-twitter-square"></i></a></li>
						<li><a href="<?=$usuario->youtube?>"><i class=" icono_redes fa fa-youtube"></i></a></li>
						<li><a href="<?=$usuario->linkedin?>"><i class=" icono_redes fa fa-linkedin-square"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="conten_info col-md-4">
				<img class="logo_nuestra img-responsive logo" src="<?=base_url()?>uploads/logos/<?=$empresa->logo?>">
			</div>
		</div>
	</div>
</div>

<div class="contenido_galeria">
	<div class="galeria_imagenes col-md-12">
		<div class="col-md-3">
			<ul class="list-title-galeria">
				<li>
					<ul class=" active list-title-galeria">
						<a class="texto-galeria_imagenes">Galeria</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="contenedor_galeria col-md-12">
		<span class="ico_flecha_left_video glyphicon glyphicon-chevron-left"></span>
		<?php foreach ($imagenes as $key => $value):?>
		 <?php if($value==''){continue;}?>
			<ul class="item_galeria">
				<li>
					<ul class="item_galeria">
						<div class="item-galeria">
							<div class="galeria">
								<img class="img_galeria img-responsive" src="<?=base_url()?>uploads/imagenes/<?=$value?>">
							</div>
							<div class="titulo_galeria">
								<p><?=$titulos[$key]?></p>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		<?php endforeach;?>
		<span class="ico_flecha_right_video glyphicon glyphicon-chevron-right"></span>
	</div>	
</div>
<div class="conten_btn_soli_coti col-md-12" data-toggle="modal" data-target="#popup_mensajes">
	<button class="btn btn_soli">
		<i class="icono-soli fa fa-file-text"></i>
		<p class="texto-soli">SOLICITAR COTIZACION</p>
	</button>
</div>

<div class="contenido_contacto col-md-12">
	<div class="col-md-10">
		<ul class="item_contactenos">
			<li>
				<ul class="active item_contactenos">
					<p class="texto_contac">Contactenos</p>
				</ul>
			</li>
		</ul>
		
	</div>
	<div class="col-md-2"></div>
</div>

<div class="contenido_info_contacto col-md-12">
	<div class="col-md-12">
		<div class="col-md-8" style="padding: 0;">
		<div class="informacion-contacto">
				<div class="title_info">
					<span class="icono_info glyphicon glyphicon-earphone"></span>
					<p class="title_texto_info">Telefono</p> 
				</div>
				<div class="conten_into">
					<p class="text_info">Celular: <?=$usuario->celular?></p>
					<p class="text_info">PBX: <?=$usuario->indicativo?> <?=$usuario->telefono?> Extensión: <?=$usuario->extension?></p>
				</div>
				<div class="title_info">
					<span class="icono_info glyphicon glyphicon-home"></span>
					<p class="title_texto_info">Direccion</p> 
				</div>
				<div class="conten_into">
					<p class="text_info"><?=$usuario->direccion?></p>
				</div>
				<div class="title_info">
					<span class="icono_info glyphicon glyphicon-map-marker"></span>
					<p class="title_texto_info">Ubicacion</p> 
				</div>
				<div class="conten_into">
					<p class="text_info"><?=$usuario->ciudad?> - <?=$usuario->departamento?> - <?=$usuario->pais?></p>
				</div>
				<div class="title_info">
					<span class="icono_info glyphicon glyphicon-globe"></span>
					<p class="title_texto_info">Pagina Web</p> 
				</div>
				<div class="conten_into">
					<p class="text_info"><?=$usuario->web?></p>
				</div>
				<div class="title_info">
					<span class="icono_info glyphicon glyphicon-thumbs-up"></span>
					<p class="title_texto_info">Redes Sociales</p> 
				</div>
				<ul class="item_redes_sociales">
					<li>
						<ul class="item_redes_sociales">
							<a class="nombre_redes" href="<?=$usuario->facebook?>">Facebook</a>
							<i class="icon_redes_sociales fa fa-facebook-square"></i>
						</ul>
					</li>
					<li>
						<ul class="item_redes_sociales">
							<a class="nombre_redes" href="<?=$usuario->twitter?>">Twitter</a>
							<i class="icon_redes_sociales fa fa-twitter-square"></i>
						</ul>
					</li>
					<li>
						<ul class="item_redes_sociales">
							<a class="nombre_redes" href="<?=$usuario->youtube?>">Youtube</a>
							<i class="icon_redes_sociales fa fa-youtube"></i>
						</ul>
					</li>
					<li>
						<ul class="item_redes_sociales">
							<a class="nombre_redes" href="<?=$usuario->linkedin?>">Linkedin</a>
							<i class="icon_redes_sociales fa fa-linkedin-square"></i> 
						</ul>
					</li>
				</ul>
		</div>
		</div>
		<div class="col-md-4" style="padding: 0;">
			<div class="logo_empresa_2">
				<img class="con_logo img-responsive logo" src="<?=base_url()?>uploads/logos/<?=$empresa->logo?>">
			</div>
		</div>
	</div>
</div>
<div class="contenido_tag col-md-12" style="background-color: #fff;padding: 0;">
	<div class="texto_tag">
		<p class="text-tag">Etiquetas</p>
	</div>
	<div class="etiquetas_tag">
		<p class="texto-tag">Fabricante</p>
		<p class="texto-tag">Cascos, Guantes, Overoles, Botas, Dotaciones</p>
	</div>
</div>