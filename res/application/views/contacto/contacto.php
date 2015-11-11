<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/contacto/contacto.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="contenido_contactenos">
	<div class="col-md-2"></div>
	<div class="col-md-10">
		<ul class="item_contactenos">
			<li>
				<ul class="active item_contactenos">
					<p class="texto_contacto">Contactenos</p>
				</ul>
			</li>
		</ul>
		
	</div>
</div>

<div class="contenido_info_contacto row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<div class="info_contacto">
					<div class="title_info">
						<span class="icono_info glyphicon glyphicon-earphone"></span>
						<p class="title_texto_info">Telefono</p> 
					</div>
					<div class="conten_into">
						<p class="text_info">Celular: <?=$usuario->celular?></p>
						<p class="text_info">PBX: <?=$usuario->indicativo?> <?=$usuario->telefono?> Extension: <?=$usuario->extension?></p>
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
					<?php if($usuario->facebook):?>
						<div class="title_info">
							<i class="icon_redes_sociales fa fa-facebook-square"></i>
							<p class="title_texto_info">Facebook</p> 
						</div>
						<div class="conten_into">
							<p class="text_info" onclick="location.href='<?=$usuario->facebook?>'"><?=$usuario->facebook?></p>
						</div>
					<?php endif;?>
					<?php if($usuario->twitter):?>
						<div class="title_info">
							<i class="icon_redes_sociales fa fa-twitter-square"></i>
							<p class="title_texto_info">Twitter</p> 
						</div>
						<div class="conten_into">
							<p class="text_info" onclick="location.href='<?=$usuario->twitter?>'"><?=$usuario->twitter?></p>
						</div>
					<?php endif;?>
					<?php if($usuario->linkedin):?>
						<div class="title_info">							
							<i class="icon_redes_sociales fa fa-linkedin-square"></i> 
							<p class="title_texto_info">Linkedin</p> 
						</div>
						<div class="conten_into">
							<p class="text_info" onclick="location.href='<?=$usuario->linkedin?>'"><?=$usuario->linkedin?></p>
						</div>
					<?php endif;?>
					<?php if($usuario->youtube):?>
					<div class="title_info">
						<i class="icon_redes_sociales fa fa-youtube"></i>
						<p class="title_texto_info">Youtube</p> 
					</div>
					<div class="conten_into">
						<p class="text_info" onclick="location.href='<?=$usuario->youtube?>'"><?=$usuario->youtube?></p>
					</div>
					<?php endif;?>
					<!--
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
					-->
					<div class="boton-solicitar-cotizacion" data-toggle="modal" data-target="#popup_mensajes">
						<button class="btn btn-cot-soli">
							<i class="icono_button_soli fa fa-file-text"></i>
							<a class="enlace_soli_cot" >SOLICITAR COTIZACION</a>
						</button>
					</div>
			</div>
	</div>
</div>
<div class="contenido_tag">
	<div class="texto_tag">
		<p class="text-tag">Etiquetas</p>
	</div>
	<div class="etiquetas_tag">
		<p class="texto-tag">Fabricante</p>
		<p class="texto-tag">Cascos, Guantes, Overoles, Botas, Dotaciones</p>
	</div>
</div>
