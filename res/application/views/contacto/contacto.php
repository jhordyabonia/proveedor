<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/contacto/contacto.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="contenido_contactenos">
	<div class="col-md-6">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<ul class="item_contactenos">
				<li>
					<ul class="active item_contactenos">
						<p class="texto_contacto">Contáctenos</p>
					</ul>
				</li>
			</ul>
			
		</div>
	</div>
	<div class="col-md-6">
		<div class="col-md-8">
			<p class="pull-right label-share">
				Compartir Contacto en redes
			</p>
		</div>
		<div class="col-md-4 pull-right">
			<div class="row">
				<div class="col-md-12 share-well">
					<?php echo form_buttons_socials('share-buttons') ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="contenido_info_contacto row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<?php
				$telefonos;
				if($usuario->indicativo!=0)
				$telefonos.="PBX: ".$usuario->indicativo; 
				if($usuario->telefono!=0)
				$telefono.=" Extensión: ".$usuario->extension;
				?>
			<div class="info_contacto">
					<div class="title_info">
						<span class="icono_info glyphicon glyphicon-earphone"></span>
						<p class="title_texto_info">Teléfono</p> 
					</div>
					<div class="conten_into">
						<p class="text_info">Celular: <?=$usuario->celular?></p>
						<p class="text_info"><?=$telefonos?></p>
					</div>

				<?php if ($usuario->direccion): ?>
					<div class="title_info">
						<span class="icono_info glyphicon glyphicon-home"></span>
						<p class="title_texto_info">Dirección</p> 
					</div>
					<div class="conten_into">
						<p class="text_info"><?=$usuario->direccion?></p>
					</div>
				<?php endif;?>
					<div class="title_info">
						<span class="icono_info glyphicon glyphicon-map-marker"></span>
						<p class="title_texto_info">Ubicación</p> 
					</div>
					<div class="conten_into">
						<p class="text_info"><?=$usuario->ciudad?> - <?=$usuario->departamento?> - <?=$usuario->pais?></p>
					</div>
				<?php if($usuario->web):?>
					<div class="title_info">
						<span class="icono_info glyphicon glyphicon-globe"></span>
						<p class="title_texto_info">Página Web</p> 
					</div>
					<div class="conten_into"><?php
					if($usuario->web!=str_replace('http://', "",$usuario->web))
						$web=$usuario->web;
					else
						$web="http://".$usuario->web;
					?>
						<p class="text_info"><a href='<?=$web?>'><?=$web?></a></p>
					</div>

				<?php endif;?>
					<?php if($usuario->facebook):?>
						<div class="title_info">
							<i class="icono_info fa fa-facebook-square"></i>
							<p class="title_texto_info">Facebook</p> 
						</div>
						<div class="conten_into">
							<p class="text_info" onclick="location.href='<?=$usuario->facebook?>'"><a href='<?=$usuario->facebook?>'><?=$usuario->facebook?></a></p>
						</div>
					<?php endif;?>
					<?php if($usuario->twitter):?>
						<div class="title_info">
							<i class="icono_info fa fa-twitter-square"></i>
							<p class="title_texto_info">Twitter</p> 
						</div>
						<div class="conten_into">
							<p class="text_info" onclick="location.href='<?=$usuario->twitter?>'"><a href='<?=$usuario->twitter?>'><?=$usuario->twitter?></a></p>
						</div>
					<?php endif;?>
					<?php if($usuario->linkedin):?>
						<div class="title_info">							
							<i class="icono_info fa fa-linkedin-square"></i> 
							<p class="title_texto_info">Linkedin</p> 
						</div>
						<div class="conten_into">
							<p class="text_info" onclick="location.href='<?=$usuario->linkedin?>'"><a href='<?=$usuario->linkedin?>'><?=$usuario->linkedin?></a></p>
						</div>
					<?php endif;?>
					<?php if($usuario->youtube):?>
					<div class="title_info">
						<i class="icon_redes_sociales fa fa-youtube"></i>
						<p class="title_texto_info">Youtube</p> 
					</div>
					<div class="conten_into">
						<p class="text_info" onclick="location.href='<?=$usuario->youtube?>'"><a href='<?=$usuario->youtube?>'><?=$usuario->youtube?></a></p>
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
					<div class="boton-solicitar-cotizacion" data-toggle="modal" data-target="#asistentes_proveedor_popup">
						<button class="btn btn-cot-soli">
							<i class="icono_button_soli fa fa-file-text"></i>
							<a class="enlace_soli_cot" >SOLICITAR COTIZACION</a>
						</button>
					</div>
			</div>
	</div>
</div>
<div class="contenido_tag col-md-12" style="background-color: #fff;padding: 0;">
	<div class="texto_tag">
		<p class="text-tag">Etiquetas</p>
	</div>
	<div class="etiquetas_tag" style="padding-bottom: 15px;">
		<p class="texto-tag"><?=$empresa->tipo?><br>
		<br>
		<p class="texto-tag"><?=$usuario->ciudad?> - <?=$usuario->departamento?> - <?=$usuario->pais?><br>
		<br>
		<p class="texto-tag"><?=$empresa->productos_principales?><br>
		<br>
		<p class="texto-tag"><?=$tag?>
	</div>
</div>
