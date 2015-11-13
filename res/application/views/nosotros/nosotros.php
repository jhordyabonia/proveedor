<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/nosotros/nosotros.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="contenedor_nuestra_empresa">
	<div class="nuestra_empresa col-md-12">
		<div class="col-md-4">
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
			<div class="title-nom_empresa"><p class="texto_nom_empre"><?=$empresa->nombre?></p>
				<div class="tipo_emp inline-block">
					<img class="img-responsive" src="<?=base_url()?>assets/img/membresia/<?=$membresia->logo?>">
				</div>
				<?php if($empresa->legalizacion):?>
					<div class="veri style-info">
						<img class="img-responsive" src="<?=base_url()?>assets/img/membresia/Check_mark__64.png">
					</div>
				<?php endif?>
			</div>
			<div class="conten_info col-md-12">
				<div class="texto_nuestra_empresa">
					<p class="texto1">Tipo de Empresa: <a class="text02"><?=$empresa->tipo?></a> </p>
					<p class="texto1">Productos Principales: <a class="text02"><?=$empresa->productos_principales?></a></p>
					<div class="boton_descargar inline-block">
						<span class="ico_descar glyphicon glyphicon-download-alt"></span>
						<a href="<?=base_url()?>empresa/descargar_catalogo/<?=$empresa->id?>"><p class="texto_des_cata">Descargar Catalogo</p></a>
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
					<p class="texto_descripcion"><?=$empresa->descripcion?></p>
					<p id="telefonos" style="display:none;font-size:21px;"><b>Telefono:</b> <?=$usuario->telefono?> <b>Cel:</b> <?=$usuario->celular?> </p>
				</div>
				<div class="botones_contac">
					<button class="btn llamar_empresa"onclick="if(document.getElementById('telefonos').style.display==''){document.getElementById('telefonos').style.display='none'}else{document.getElementById('telefonos').style.display='';}">
						<span class="icon_compartir glyphicon glyphicon-earphone"></span>
						<p class="texto_contacto">Llamar a la Empresa</p>
					</button>
					<button class="btn contactar_empresa" data-toggle="modal" data-target="#popup_mensajes">
						<span class="icon_compartir glyphicon glyphicon-envelope"></span>
						<p class="texto_contacto">Contactar Empresa</p>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="conten_membresias_proveedor">
	<div class="membresias_proveedor col-md-12">
		<div class="col-md-4">
			<ul class="list-title-membresia">
				<li>
					<ul class=" active list-title-membresia">
						<a class="texto-nuestra_empresa">Membresias en Proveedor</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="info_membresias">
		<div class="container_info_membresias col-md-12">
			    <div class="container_membresia col-md-12">
			    	<div class="container_mision col-md-12">
			    		<img class="img-responsive img_membresia" src="<?=base_url()?>assets/img/membresia/<?=$membresia->logo?>">
			    		<p class="texto-membresia"><?=$membresia->nombre?></p>
			    		<li><p class="texto_descrip_mem">La <?=$membresia->nombre?> en Proveedor.com.co</p></li>
			    	</div>
			    	<?php if($empresa->legalizacion):?>
				    	<div class="container_vision col-md-12">
				    		<img class="img-responsive img_veri" src="<?=base_url()?>assets/img/membresia/Check_mark__64.png">
				    		<p class="texto-verificada">Verificada</p>
				    		<li id="#icmem"><p class="texto_descrip_mem">La empresa ha aportado:</p></li>
				    		<p class="aportado">1. Certificacion de existencia y representacion expedido por la camara de comercio.</p>
				    		<p class="aportado">2. Copia de RUT (Registro Unico Tributario).</p>
				    	</div>

				    	<div class="container_aviso_legal">
				    		<p style="padding-right: 32%;"><strong class="aviso_legal"><i class="ico_aviso fa fa-exclamation-triangle">
				    		</i>AVISO LEGAL:</strong> La palabra verificada hace referencia al nombre del producto
				    			comercial que ofrece Proveedor.com.co, y no se constituye en una obligacion a cargo de
				    			Proveedor.com.co S.A.S de verificar la existencia de la persona natural o juridica,
				    			su inscripcion en el registro mercatil, o la veracidad de la informacion suministrada.
				    		</p>
				    	</div>
			    	<?php endif;?>
			    </div>
		</div>
	</div>
</div>
<div class="mision">
	<div class="title-mision col-md-12">
		<div class="col-md-4">
			<ul class="list-title-mision">
				<li>
					<ul class=" active list-title-mision">
						<a class="texto-mision">Mision</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="info_mision">
		<div class="conten_mision col-md-12">
			<div class="contenedor-mision col-md-12">
				<h2 class="title-mi">Nuestra Mision</h2>
				<img class="img-responsive img_sonrisa" src="<?=base_url()?>assets/img/sonrisaprecio.png">
				<p class="texto_mision">
					<?=$empresa->mision?>
				</p>
			</div>
		</div>
	</div>
</div>
<div class="mision">
	<div class="title-mision col-md-12">
		<div class="col-md-4">
			<ul class="list-title-mision">
				<li>
					<ul class=" active list-title-mision">
						<a class="texto-mision">Vision</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="info_mision">
		<div class="conten_mision col-md-12">
			<div class="contenedor-mision col-md-12">
				<h2 class="title-mi">Nuestra Vision</h2>
				<img class="img-responsive img_sonrisa" src="<?=base_url()?>assets/img/sonrisaprecio.png">
				<p class="texto_mision">
					<?=$empresa->mision?>
				</p>
			</div>
		</div>
	</div>
</div>
<div class="contactenos">
	<div class="title-contactenos col-md-12">
		<div class="col-md-4">
			<ul class="list-title-contactenos">
				<li>
					<ul class=" active list-title-contactenos">
						<a class="texto-mision">Contactenos</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="container_contactenos">
		<div class="conten_contac col-md-12">
			<div class="info_contactenos col-md-12">
				<div class="titulo-info">
					<p class="itm-title">Telefonos</p>
				</div>
				<div class="conten-into">
					<p class="itm-cont">Celular: <?=$usuario->celular?> - PBX: <?=$usuario->indicativo?>  <?=$usuario->telefono?> Extencion:  <?=$usuario->extension?></p>
				</div>
				<div class="titulo-info">
					<p class="itm-title">Direccion</p>
				</div>
				<div class="conten-into">
					<p class="itm-cont"> <?=$usuario->direccion?></p>
				</div>
				<div class="titulo-info">
					<p class="itm-title">Ubicacion</p>
				</div>
				<div class="conten-into">
					<p class="itm-cont"> <?=$usuario->ciudad?> -  <?=$usuario->departamento?> -  <?=$usuario->pais?></p>
				</div>
				<?php if($usuario->facebook):?>
						<div class="titulo-info">
							<p class="itm-title">Facebook</p> 
						</div>
						<div class="conten_into">
							<p class="itm-cont" onclick="location.href='<?=$usuario->facebook?>'"><a href='<?=$usuario->facebook?>'><?=$usuario->facebook?></a></p>
						</div>
					<?php endif;?>
					<?php if($usuario->twitter):?>
						<div class="titulo-info">
							<p class="itm-title">Twitter</p> 
						</div>
						<div class="conten_into">
							<p class="itm-cont" onclick="location.href='<?=$usuario->twitter?>'"><a href='<?=$usuario->twitter?>'><?=$usuario->twitter?></a></p>
						</div>
					<?php endif;?>
					<?php if($usuario->linkedin):?>
						<div class="titulo-info">							
							<p class="itm-title">Linkedin</p> 
						</div>
						<div class="conten-into">
							<p class="itm-cont" onclick="location.href='<?=$usuario->linkedin?>'"><a href='<?=$usuario->linkedin?>'><?=$usuario->linkedin?></a></p>
						</div>
					<?php endif;?>
					<?php if($usuario->youtube):?>
					<div class="titulo-info">
						<i class="icon_redes_sociales fa fa-youtube"></i>
						<p class="itm-title">Youtube</p> 
					</div>
					<div class="conten_into">
						<p class="itm-cont" onclick="location.href='<?=$usuario->youtube?>'"><a href='<?=$usuario->youtube?>'><?=$usuario->youtube?></a></p>
					</div>
					<?php endif;?>
				<!--
				<div class="titulo-info">
					<p class="itm-title">Redes Sociales</p>
				</div>
				<ul class="item_redes_soci">
					<li>
						<ul class="item_redes_soci">
							<a class="nom_redes" href=" <?=$usuario->facebook?>">Facebook</a>
							<i class="ico-redes fa fa-facebook-square"></i>
						</ul>
					</li>
					<li>
						<ul class="item_redes_soci">
							<a class="nom_redes" href=" <?=$usuario->twitter?>">Twitter</a>
							<i class="ico-redes fa fa-twitter-square"></i>
						</ul>
					</li>
					<li>
						<ul class="item_redes_soci">
							<a class="nom_redes" href=" <?=$usuario->youtube?>">Youtube</a>
							<i class="ico-redes fa fa-youtube"></i>
						</ul>
					</li>
					<li>
						<ul class="item_redes_soci">
							<a class="nom_redes" href=" <?=$usuario->linkedin?>">Linkedin</a>
							<i class="ico-redes fa fa-linkedin-square"></i> 
						</ul>
					</li>
				</ul>
			-->
				<div class="conten_solicitud" data-toggle="modal" data-target="#popup_mensajes">
					<button class="btn btn-solicitar-coti">
						<i class="icono-soli fa fa-file-text"></i>
						<p class="texto_sol">SOLCITAR COTIZACION</p>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="conten_tag col-md-12">
	<p class="title-tag">Etiquetas</p>
</div>
<div class="cont-tags col-md-12">
	<div class="tags">
		<p class="texto_tag">Fabricantes</p>
		<p class="texto_tag"> <?=$empresa->productos_de_interes?></p>
	</div>
</div>