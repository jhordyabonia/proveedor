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
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: black;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: none;
    color: black;
    text-decoration: none;
}
.icon
{
	color:#FF7F27;
    font-size: 28px;
}
.link
{	
    font-size: 18px;
}
.action
{
	width: 100%;
	text-align: right;
	padding-top: -50px;
}
.body
{
	margin-left: 20px;
	margin-right: 20px;
}
.line
{
	height: 50px;
}
.line td
{
	width: 390px;
	padding-left: 60px;
}
</style>
</head>
<body>
	<div>
		<a href='<?php echo site_url('cotizacion/')?>'>Cotizaciones</a> |
		<a href='<?php echo site_url('cotizacion/item')?>'>Items</a> |
		<a href='<?php echo site_url('cotizacion/oferta')?>'>Ofertas</a> |		
	</div>
	<div style='height:100px;'>

	</div> 
	<div class="body">
		<h2>
			<span class="glyphicon glyphicon-user iconos-gly"></span><b> SOLICITUDES ESPECIALES DE COTIZACIÓN</b>
			<br><span class="icon">Solictud <?=$solicitud->solicitud?></span> 

			<div class="action">
					<a class="link" href="javascript:window.history.back();">
							<span class="glyphicon glyphicon-arrow-left iconos-gly icon"></span> <b> Regresar</b>
					</a>
					<a href="http://192.168.33.10/cotizacion/read/<?=$solicitud->id?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
						<span class="ui-button-icon-primary ui-icon ui-icon-document"></span>
						<span class="ui-button-text">&nbsp;View</span>
					</a>
					<a href="http://192.168.33.10/cotizacion/edit/<?=$solicitud->id?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
						<span class="ui-button-icon-primary ui-icon ui-icon-pencil"></span>
						<span class="ui-button-text">&nbsp;Edit</span>
					</a>
					<a  href="http://192.168.33.10/cotizacion/edit/<?=$solicitud->id?>" href="javascript:void(0)" class="delete_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
						<span class="ui-button-icon-primary ui-icon ui-icon-circle-minus"></span>
						<span class="ui-button-text">&nbsp;Delete</span>
					</a>
				</div>
		</h2>
				<br>
				<table border="1" color="gray"><tr><td>
					<div class="dataTables_wrapper solictud" role="grid">
						<h3 class="ui-accordion-header ui-helper-reset ui-state-default form-title">
						<div class="floatL form-title-left">

							<a href="#">Solicitud especial No. <?=$solicitud->id?> -  <?=$solicitud->fecha?></a>
						</div>
					<div class="clear"></div>
						</h3>
								<table cellpadding="0" cellspacing="0" border="0">
									<tr class="form-field-box line odd "><th>Categoria: <td><?=$solicitud->categoria?><th>Telefono:<td><?=$solicitud->telefono?><th>Nombre de Contacto:<td><?=$solicitud->nombres?>
									<tr class="form-field-box line even"><th>Solicitud: <td><?=$solicitud->solicitud?><th>Direccion:<td><?=$solicitud->ciudad_entrega?><th>Empresa:<td><?=$solicitud->empresa?>
									<tr class="form-field-box line odd "><th>Descripcion: <td><?=$solicitud->descripcion?><th>E-mail:<td><?=$solicitud->email?><th>Lugar de entrega:<td><?=$solicitud->ciudad_entrega?>
								</table>
					</div>
				</table>
					<br>
					<br>

	    <div >
	    	<!--
	    	<a role="button" class="add_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" href="<?=base_url()?>make_item/<?=$solicitud->id?>">
				<span class="ui-button-icon-primary ui-icon ui-icon-circle-plus"></span>
				<span class="ui-button-text">Add Cotizacion</span>
			</a>
		-->
			<?php echo $output; ?>
	    </div>
    </div>
</body>
</html>
