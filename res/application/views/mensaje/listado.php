<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
a:hover
{
	text-decoration: underline;
}
.span12
{
	width: 100%;
	height: 100%;
}
.text-left {
    text-align: left;
    font-size: 12px;
}
</style>
</head>
<body>
	<div style='height:20px;'></div>  
	<div>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/config_OroPlatino/conf_cata_produc.css">


<div class="contenedor-config">
	<div class="title-config">
		<div class="conten-title col-xs-12 col-md-12 col-lg-12">
			<i class="fa fa-envelope icono_mensaje"></i>
			<h3 class="text-title-config">Mensajes</h3>
		</div>
	</div>
	<div class="container-config">
		<div class="conten-config6 col-xs-12 col-md-12 col-lg-12">
			<div class="conten-item6 col-xs-12 col-md-3 col-lg-3">
				<h3 class="text-item">General</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-th-list"></span>
					<a href="<?=base_url()?>config_empresa/perfil_empresa" class="text-subitem">Recibidos</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-th-list"></span>
					<a href="<?=base_url()?>config_empresa/contacto" class="text-subitem">Enviados</a>
				</div>
				
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<span class="ico-cont-style glyphicon glyphicon-home"></span>
					<?=$listado?>
				</h3>

				<div class="content-config-inicio">
					<div class="titles">
						<h3 class="text-title-up"> 
							<div>
								<?php echo $output; ?>
						    </div>
						</h3>
	</div>
   
</body>
</html>
