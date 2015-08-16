<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Novedades</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
	<body>
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<h1>Novedades</h1>
				<div class="panel panel-info">
					<div class="panel-heading">
						Funciones que retornan la url de las carpetas que hay dentro de assets
					</div>
					<p>Tenemos nuevas funciones derivadas de base_url()</p>
					<div class="panel-body">
						<p>Funcion:
						echo assets_url();</p>
						<p>Retorna:
						<?php echo assets_url(); ?></p>
						<p>Funcion:
						echo css_url();</p>
						<p>Retorna:
						<?php echo css_url(); ?></p>
						<p>Funcion:
						echo js_url();</p>
						<p>Retorna:
						<?php echo js_url(); ?></p>
						<p>Funcion:
						echo img_url();</p>
						<p>Retorna:
						<?php echo img_url(); ?></p>
					</div>
				</div>
			</div>
		</div>		
	</body>
</html>