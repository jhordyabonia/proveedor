<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/config_OroPlatino/top_menu_config.css">

<div class="contenedor_top_menu">
	<div class="top-menu">
		<div class="top_menu_conf">
			<ul class="nav navbar-nav">
				<li>
					<img class="img-style img-responsive" src="<?php echo base_url()?>assets/img/index/logo_proveedor.png">
				</li>
				<li class="list-menu">
					<a class="item-list" href="<?=base_url()?>tablero_usuario">INICIO</a>
				</li>
				<li class="list-menu">
					<a class="item-list" href="<?=base_url()?>tablero_usuario/oportunidades">OPORTUNIDADES</a>
				</li>
				<li class="list-menu">
					<a class="item-list" href="<?=base_url()?>mensajes">MENSAJES</a>
				</li>
				<li class="list-menu">
					<!--<a class="item-list" href="<?=base_url()?>">CONTACTOS</a>-->
				</li>
				<li class="list-menu">
					<a class="item-list" href="<?=base_url()?>producto/administrar">PRODUCTOS</a>
				</li>
				<li class="list-menu padding-style">
					<span class="ico-user glyphicon glyphicon-user"></span>
					<a class="nom_username" href="<?=base_url()?>empresa/inicio/<?=$empresa->id?>"><?=$usuario->usuario?></a>
				</li>
				<li class="list-menu">
					<a class="salir" href="<?=base_url()?>logueo/logout">salir</a>
				</li>
				<li class="list-menu">
					<a class="icostyle-config active"><i class="fa fa-cog"></i></a>
				</li>
			</ul>
		</div>
	</div>
</div>