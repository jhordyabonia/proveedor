<html>
	<meta charset="UTF-8">
	<head>
		<title>plantilla</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
			img{
				width: 30%;
			}

			.naranja{
				color: #ff8c3d;
			}
			.azul{
				color: #1d71b8;
			}
			.btn-naranja{
				color: #fff;
				background:  #ff7520;
			}
			.well-white{
				background-color: #fff;
			}
			@media(max-width: 310px) {
			   p.correo{
				font-size: 12px;
			   }
			}
			@media(max-width: 380px) {
			   p.correo{
				font-size: 12px;
			   }
			}
			@media(max-width: 400px) {
			   p.correo{
				font-size: 12px;
			   }
			}
			@media(max-width: 400px) {
			   button.btn{
					  font-size: 12px;
				}
			}
		</style>
	</head>
	<body>
		<div class="container">  
			<img src="<?php echo base_url() ?>assets/img/email/header_oferta.png" >			
			<div class="row">
				<div class="col-md-12">
					<p class="text-center">Click aqui si no puede visualizar este correo</p>
				</div>
			</div>

			<div class="well well-lg">
				<div class="row">
					<div class="col-md-12">
						<p class="text-center naranja">Sr. <?php echo  $usuario?>
						<br>
						Ha recibido una cotizacion para:</p>
					</div> 
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">						
						<p class="text-center azul"><?php echo $producto['nom_producto']?></p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-4">
						<p class="azul">Nombre:</p>
					</div>
					<div class="col-xs-8">
						<p><?php echo $autor_email ?></p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-4">
						<p class="azul">Correo:</p>
					</div>
					<div class="col-xs-8">
						<p class="correo">contacto@proveedor.com.co<?php //echo $email_from ?></p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-4">
						<p class="text-left azul">Producto o servicio:</p>
					</div>
					<div class="col-xs-4">
						<img src="<?php echo $producto['url'] ?>" class="img-rounded">
					</div>
					<div class="col-xs-4">
						<p class="azul"> <?php echo $producto['nom_producto']?></p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<p class="azul">Mensaje:</p>
					</div>
					<div class="col-md-6">
						<p><?php echo $mensaje_user ?></p>
					</div>
				</div>

				<!-- 		<div class="row">
							<div class="col-md-12 center-block">
								<button class="btn btn-naranja btn-lg">VER COTIZACIÓN
								<span class="glyphicon glyphicon-cloud-download"></span>
								</button> 
							</div>
						</div>
				 -->	<!-- </div> -->
			</div>
			
			<img src="<?php echo base_url() ?>assets/img/email/footer.png" >
			<p class="text-center"><a href="<?php echo base_url() ?>/unsubscribe/">click</a> para dejar de recibir estos correos</p>
		</div><!-- container -->
	</body>
</html>