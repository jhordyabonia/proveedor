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
.body
{
	margin-left: 20px;
	margin-right: 20px;
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
		</h2>
		<a class="link" href="javascript:window.history.back();">
				<span class="glyphicon glyphicon-arrow-left iconos-gly icon"></span> <b> Regresar</b>
		</a>
	    <div >
			<?php echo $output; ?>
	    </div>
    </div>
</body>
</html>
