<!DOCTYPE html>
<html lang = "es">
	<head>
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
		<meta charset="UTF-8">
		<title>Proveedor.com.co / Tablero de Usuario - Organizar Productos</title>
		<link rel="stylesheet" href="<?=base_url()?>css/960.css">
		<link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
		<link rel="stylesheet" href="<?=base_url()?>css/reset.css">
		<!-- importaciones -->
		<link rel="stylesheet" href="<?=base_url()?>css/estilosheader.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>


		<!-- Add fancyBox librerias para ventana modal-->

		<link rel="stylesheet" href="<?= base_url() ?>css/jquery.fancybox.css" type="text/css" media="screen" />

		<script type="text/javascript" src="<?= base_url() ?>js/jquery.fancybox.pack.js"></script>



		<!-- Este script es el encargado de abrir la vista de login en una ventana modal -->

		<script type="text/javascript">

			$(document).ready(function() {

				$(".ejemplo_4").fancybox({

					'autoScale': true,

					'transitionIn': 'none',

					'transitionOut': 'none',

					'scrolling': 'no',

					'width': 710,

					'height': 650,

					'closeBtn': true,

					'openEffect': 'elastic',

					'type': 'iframe'



				});

			});



		</script>


	</head>
<!-- Estilos para el mensaje de confirmacion al eliminar productos, el mensaje se puede editar desde el controlador -->
<style type="text/css">
	.exito {  
       color: #4F8A10;  
       background-color: #DFF2BF;  
       background-image:url('<?=base_url()?>img/Alarm-Tick-icon.png'); 
       font-family:Arial, Helvetica, sans-serif;  
       font-size:13px;  
       border: 1px solid;  
       margin: 10px 0px;  
       padding:15px 10px 15px 50px;  
       background-repeat: no-repeat;  
       background-position: 10px center; 
}
</style>

	<style type="text/css">
		html, body {
			font-family: Arial;
			font-size: 15px;
		}

		a {
			text-decoration: none;
			color: blue;
		}

		.container_12{
			background:#ffffff;
			height:auto;
			width: 1351px;
			max-width: 1351px;
			margin-top: 30px;
			margin-left: center;
			margin-right: center;
		}

		#he{
			float: left;
			width: 1082px; 
			padding-left: 0px; 
			max-width: 1112px; 
			display: block; 
			margin-right: -30px; 
			margin-left: 43px;
		}

		.grid_1{
			background: #ffffff;
			height: 50px;
			width: 225px;
		}

		.grid_4{
			background: #ffffff;
			height:512px;
			margin:12px 12px;
			width: 300px;
		}

		#div1{
			height:auto;
			width: 220px;
		}

		#div2{
			height:auto;
			width: 1000px;
		}

		.grid_2{
			background: red;
			height:300px;
			width: 100%;
		} 
	</style>

	   <style>
         @media screen and (max-width: 1280px) {
         html, body {
			font-family: Arial;
			font-size: 15px;
		}

		a {
			text-decoration: none;
			color: blue;
		}

		.container_12{
			background:#ffffff;
			height:auto;
			width: 1265px;
			max-width: 1265px;
			margin-top: 30px;
			margin-left: center;
			margin-right: center;
		}

		 #he{
			float: left;
			width: 995px; 
			padding-left: 0px; 
			max-width: 1112px; 
			display: block; 
			margin-right: -30px; 
			margin-left: 43px;
		}

		.grid_1{
			background: #ffffff;
			height: 50px;
			width: 225px;
		}

		.grid_4{
			background: #ffffff;
			height:512px;
			margin:12px 12px;
			width: 300px;
		}

		#div1{
			height:auto;
			width: 220px;
		}

		#div2{
			height:auto;
			width: 995px;
		}

		.grid_2{
			background: red;
			height:300px;
			width: 100%;
		} 
         }
      </style>

      <style>
         @media screen and (max-width: 1024px) {
         html, body {
			font-family: Arial;
			font-size: 15px;
		}

		a {
			text-decoration: none;
			color: blue;
		}

		.container_12{
			background:#ffffff;
			height:auto;
			width: 1009px;
			max-width: 1009px;
			margin-top: 30px;
			margin-left: center;
			margin-right: center;
		}

		 #he{
			float: left;
			width: 740px; 
			padding-left: 0px; 
			max-width: 740px; 
			display: block; 
			margin-right: -30px; 
			margin-left: 43px;
		}

		.grid_1{
			background: #ffffff;
			height: 50px;
			width: 225px;
		}

		.grid_4{
			background: #ffffff;
			height:512px;
			margin:12px 12px;
			width: 300px;
		}

		#div1{
			height:auto;
			width: 220px;
		}

		#div2{
			height:auto;
			width: 741px;
		}

		.grid_2{
			background: red;
			height:300px;
			width: 100%;
		} 
         }
      </style>

	<body>
		<div class="container_12">
			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			<!-- APARTADO HEADERS -->
			<header class="grid_1" style="background: transparent; padding-left: 10px; margin: 0px -13px 0px 4px; display: block; float: left;">
				<a href="<?=base_url()?>index"> <img src="<?=base_url()?>img/logo3.png" style="float: left;" /></a>
		  	</header> 
	  		<header class="grid_1" id="he">
				<table width="auto" height="auto" style="border-spacing: 0px;"> <tr> <td>
				  <div style="padding: 4px 0px 4px 0px;"> <table style="border-spacing: 0px;"> <tr>
					<td class="header_iconos"> <a href="<?=base_url()?>tablero_usuario"> Inicio </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos"> <a href="<?=base_url()?>mensajes_usuario"> Mensajes </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos"> <a href="<?=base_url()?>contactos"> Contactos </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos activo"> <a href="<?=base_url()?>publicar_producto"> Productos </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos"> <a href="<?=base_url()?>publicar_oferta"> Solicitudes </a>  </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos" style="width: 327px;">
					  <table width="100%" style="height: 50px; background-color: #f1f1f1; border-spacing: 0px;"> <tr>
						<td style="padding-top: 15px; padding-left: 70px; width: 50px;"> 
							<img src="<?=base_url()?>img/logouser.png" /> </td>
				<td style="padding-top: 15px; width: 100px;"> 
			<p id="usuactual" style="font-size: 18px;"><a href="#" style="color: #ff7f27;"> <?=$this->session->userdata('usuario');?> </a> </p> 
						</td>
						<td style="padding-top: 17px;">
							<a href="/proveedor/logueo/logout" title="Cerrar Sesión" style="font-size: 12px;">Cerrar Sesión</a>
						</td>
					  </tr> </table>
					</td>
				  </tr> </table> </div>
				</td> </tr> </table>
		  	</header> 
			<div class="clear"></div>

			<article> <section>
				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!-- APARTADO ASIDE IZQUIERDO -->
				<div class="grid_4" id="div1">
					<div class="grid_2 alpha" style="margin-top: 30px; height: auto; background-color: transparent;">
						<a href="<?=base_url()?>publicar_producto"> <img src="<?=base_url()?>img/publicar.png" /> </a>
						<br> <br>
						<a href="#"> <img src="<?=base_url()?>img/organizar_2.png" /> </a>
					</div>
				</div>

				<div class="grid_4" id="div2">
					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- APARTADO TITULO DEL CONTENIDO -->
					<div class="grid_2 alpha" style="margin-top: 10px; height:auto; background-color: transparent;">
						<div style="padding: 10px 10px 10px 30px;">
							<table width="100%" height="auto">
								<tr>
									<td width="50%" style="padding-top: 60px;">
										<p style="color: #3aa2ed; font-weight: bold; font-size: 18px;"> Organizar mis Productos </p>
										  <?php 
										  if($this->session->flashdata('producto_eliminado'))  { ?>									           
									        <div class="exito mensajes"><?=$this->session->flashdata('producto_eliminado')?></div>
									         <?php  } ?>
									          
									</td>
									<td width="50%" height="auto">
										<table width="100%" height="auto">
											<tr>
												<td style="float: right; padding: 10px 10px 10px 10px; width: 100%;">
													<table width="auto" height="auto">
														<tr>
															<td width="50%" style="padding-right: 35px; padding-top: 13px;"> 
																<p style="font-weight: bold; color: #888888; font-size: 16px; text-align: right;"> 
																	Productos Publicados 
																<p> 
															</td>
														<td width="7%" style="padding-top: 13px;"> 
														<p style="color: #ff7f27; font-weight: bold; font-size: 18px;"> <?php echo $count ?> </p> </td>
															<td width="10%"> <img src="<?=base_url()?>img/cuadronaranja.png" /> </td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td style="float: right; padding: 10px 10px 10px 10px; width: 100%;">
													<table width="auto" height="auto">
														<tr>
															<td width="50%" style="padding-right: 21px; padding-top: 13px;"> 
																<p style="font-weight: bold; color: #888888; font-size: 16px; text-align: right;"> 
																	Total de Productos Publicables
																<p> 
															</td>
															<td width="7%" style="padding-top: 13px;"> 
																<p style="color: #ff7f27; font-weight: bold; font-size: 18px;"> 50 </p> </td>
															<td width="10%"> <img src="<?=base_url()?>img/cuadronegro.png" style="margin-right: -5px;" /> </td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="grid_2 alpha" style="margin-top: 2px; height:10px; background:#ffffff"></div>

					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- APARTADO CONTENIDO: TABLITA -->
					<script type="text/javascript">
						function seleccTodosChk(ckh) {
							//funcion javascript para activar/desactivar todos los checkbox 
							//cuando haga clic en el de arriba (el primero)
							//obtener los controles input
							var atrInput = document.getElementsByTagName("input");
							//ahora iterar todos los controles input
							for (i=0 ; i<atrInput.length ; i++) {
								//si es checkbox
								if (atrInput[i].type == "checkbox") {
									//asignar valor a todos los tipo checkbox
									atrInput[i].checked = ckh.checked;
								}
							}
						}
					</script>
					<div class="grid_2 alpha" style="margin-top: 30px; height:1000px; background-color: transparent;">
						<div style="padding: 10px 40px 10px 30px;">
							<?=form_open_multipart('organizar_productos/quitar_producto');  ?>	
							<table width="100%" height="auto">
								<thead style="background-color: #e9e9e9; color: black; font-size: 15px;">
									<tr>
										<td width="5%" style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
											<input type="checkbox" name="chk0" onclick="seleccTodosChk(this)"/> </td>
										<td width="20%" style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
											Producto </td>
										<td width="20%" style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
											Imágenes </td>
										<td width="20%" style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
											Fecha de publicación </td>
										<td width="20%" style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
											Editar </td>
									</tr>
								</thead>
								<tbody style="background-color: transparent; color: black; font-size: 13px;">
								<?php $url=base_url();?>	
								<?php foreach ($query as $row):  ?>
									<tr>
										<td width="5%"  style="font-weight: bold; text-align: center; vertical-align: middle;"> 
											<input type="checkbox"  name="check[]" id="check" value="<?=$row->id_producto?>" class="select"/> </td>

										<td width="20%" style="font-weight: bold; text-align: center; vertical-align: middle; color: #3aa2ed;"> 
											<?=$row->nom_producto?> </td>

										<td width="20%" style="font-weight: bold; text-align: center; padding: 30px 30px 30px 30px;"> 
											<img src="<?= $url ?>uploads/<?=$row->nombre_img?>" width="80px" height="118px"/> </td>

										<td width="20%" style="text-align: left; vertical-align: middle;"> 
											<?= $row->fecha_publicacion ?>  </td>
											
										<td width="20%" style="font-weight: bold; text-align: center; vertical-align: middle;"> 
											<a href="<?=base_url()?>contactar_administrador" class="ejemplo_4">  Editar <img src="img/lapizeditar.png" /> </a> </td>
									</tr>
									<?php endforeach; ?>
								</thead>
							</table>
							<br> <br>
							<table width="100%" height="auto">
								<tr> <td>
									<input type="submit" name="eliminar" value="Eliminar"  
								   style="cursor: pointer; height: 47px; width: 140px; background-color: #e9e9e9; 
									color: orange; font-weight: bold; font-size: 16px; border: none;"/>
								</td> </tr>
								<tr> <td>
									<p style="font-size: 12px; padding-top: 20px;">
										Para eliminar una oferta simplemente márcala y haz clic en el botón de Eliminar
									</p>
								</td> </tr>
							</table>
							<?= form_close() ?>	
						</div>
					</div>
					<div class="grid_2 alpha" style="margin-top: 2px; height:20px; background:#ffffff"></div>
					<div class="clear"></div>  
				</div>
			</section> </article>
		</div>
	</body>
</html>