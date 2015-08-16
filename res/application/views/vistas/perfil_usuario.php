<!DOCTYPE html>
<html lang = "es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<title>Proveedor.com.co / Tablero de Usuario - Inicio</title>
		<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
		<link rel="stylesheet" href="<?= base_url() ?>css/960.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/960_12_col.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/reset.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/menu_tablero.css">
		<!-- importaciones -->
		<link rel="stylesheet" href="<?= base_url() ?>css/estilosheader.css">
		<link rel="stylesheet" href="<?php echo base_url()?>application/membresia/index.css">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

 	<!-- Estilos nuevos -->
 	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">

 	<style type="text/css">
 		.perfil_empresa{
 			background: #fdfdfd;
 			height: 60px;
			margin-top: 15px;
			box-shadow: 1px 1px 5px #999;
			border-radius: 7px 7px 7px 7px;
			-moz-border-radius: 7px 7px 7px 7px;
			-webkit-border-radius: 7px 7px 7px 7px;


 		}

 		 #texto_membresiaEstandar{
	     font-family: arial;
	     font-size: 18px;
	     color:grey;
	     font-weight: bold;
	     display: inline;
	     margin-left: 2px;
         }

         .texto_membresias{
	     font-family: arial;
	     font-size: 18px;
	     color:orange;
	     font-weight: bold;
	     display: inline;
	     line-height: 65px;
         margin-right: -59px;

         }

 		.tipo_empresa{
 			width: 58px;
			/* height: 50%; */
            margin-right: -27px;
 		}

 		.logo_empresa{
 			width: 60px;
			/* height: 50%; */

 		}


 	</style>

	</head>

	<body>
	<center>
		<div class="container_12"> 
			<center>
				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!-- APARTADO HEADER -->
				<!--
				<div class="grid_1">
					<a href="<?= base_url() ?>index"> <img src="<?= base_url() ?>img/logo3.png" id="foto_logo" style="padding-top: 0px;"/> </a>
				</div> 
				-->
				<div style="display:none" class="grid_1" id="he">
					<table width="auto" height="auto" style="border-spacing: 0px;"> <tr> <td>
								<div style="padding: 4px 0px 4px 0px;"> <table style="border-spacing: 0px;"> <tr>
											<td class="header_iconos activo"> <a href="<?= base_url() ?>tablero_usuario"> Inicio </a> </td>
											<!-- separador -->
											<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> </td>
											<!-- separador -->
											<td class="header_iconos"> <a href="<?= base_url() ?>mensajes"> Mensajes </a> </td>
											<!-- separador -->
											<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> </td>
											<!-- separador -->
											<td class="header_iconos"> <a href="<?= base_url() ?>contactos"> Contactos </a> </td>
											<!-- separador -->
											<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;">
												<div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> </td>
											<!-- separador -->
											<td class="header_iconos"> <a href="<?= base_url() ?>publicar_producto"> Productos </a> </td>
											<!-- separador -->
											<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> </td>
											<!-- separador -->
											<td class="header_iconos"> <a href="<?= base_url() ?>publicar_oferta"> Busco/Compro </a>  </td>
											<!-- separador -->
											<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> </td>
											<!-- separador -->
											<td class="header_iconos" style="width: 327px;">
												<table width="100%" style="height: 50px; background-color: #f1f1f1; border-spacing: 0px;"> <tr>
														<td style="padding-top: 15px; padding-left: 70px; /* width: 50px; */"> <img src="<?= base_url() ?>img/logouser.png" /> </td>
														<td style="padding-top: 15px; width: 100px;"> 
															<p id="usuactual" style="font-size: 18px;"> <a href="#" style="color: #ff7f27;"> <?= $this->session->userdata('usuario'); ?> </a> </p> 
														</td>
														<td style="padding-top: 17px;">
															
															<div class="btn-group">
															  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" style="left:5px">
																<span class="glyphicon glyphicon-cog"></span>
															  </button>
															  <ul class="dropdown-menu dropdown-menu-right ">
															  <!-- dropdown menu links -->
																<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url() ?>perfil/editar_empresa/<?php echo $empresa->nit?>">Editar perfil de empresa</a></li>
																<li role="presentation" class="divider"></li>
																<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>logueo/logout">Cerrar sesion</a></li>
															  </ul>
															</div>
														</td>
													</tr> </table>
											</td>
										</tr> </table> </div>
							</td> </tr> </table>-->
				</div>
				<div class="clear"></div>

				<!-- Nuevo div para el nombre de la empresa y el logo de la membresia -->
				<div class="container">
		 
					<div class="row">
						<div class="col-xs-10 col-xs-push-1 perfil_empresa"> 
						<div class="row">
							<div class="col-md-2">
								<?php if($empresa->logo==""||$empresa->logo=="0"){$empresa->logo="default.jpg";}?>
								<img class="img-responsive" style="margin-bottom: 5px; max-height: 50px; margin-top: 5px;"
								src="<?=base_url()?>uploads/logos/<?=$empresa->logo?>">
							</div>
							<div class="col-md-6">
								<h3 style="margin-top: 10px;font-weight: bold;font-size: 20px;text-align: center;"> <?php echo $empresa->nombre ?> </h3> 
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-8">
										<?php if ($nombre_membresia=="Empresa Estandar"): ?>
											<p class="texto_membresias" id="texto_membresiaEstandar">
										    <?php echo $nombre_membresia ?>
											</p>
										<?php else: ?>											
											<p class="texto_membresias">
										    <?php echo $nombre_membresia ?>
											</p>
										<?php endif ?>
									</div>
									<div class="col-md-4">
										<img class="tipo_empresa" src="<?php echo base_url().'assets/img/membresia/'.$membresia->logo ?>">
									</div>
								</div>
							</div>
						</div>
							
						
						</div>
					</div>
				</div>


				<article> 
					<section style="width: auto;">
						<div class="grid_4" id="div2_boton1" onclick="location.href='<?= base_url() ?>publicar_producto';" style="cursor:pointer;"> 
							<!-- <a href="<?= base_url() ?>publicar_producto"> -->
								<!-- <img src="<?= base_url() ?>img/naranja_2.png" id="imagen_boton1" /> -->
								<img src="<?= base_url() ?>img/icono-publicar-producto.png" id="imagen_boton1" />
								
								<br>
								<h2a> Publicar <br> Producto </h2a>
								</a>
								</div>
						
								<!-- Nuevo Btn 2 -->
						<div class="grid_4" id="div2_boton2" onclick="location.href='<?= base_url() ?>publicar_oferta';" style="cursor:pointer;"> 
							<!-- <a href="<?= base_url() ?>publicar_oferta"> -->
								<!-- <img src="<?= base_url() ?>img/verde_2.png" id="imagen_boton2"/> -->
									<img src="<?= base_url() ?>img/icono-solicitar-producto.png" id="imagen_boton2"/>
									<br>
									<h2a>Solicitar <br> Producto</h2a>
								</a> 
								</div>
								
								<!-- Nuevo Btn 3-->

					  <?php if($Admin):?>
						<div class="grid_4" id="div2_boton7" onclick="location.href='<?= base_url() ?>micro_admin';" style="cursor:pointer;"> 
							<br>
							<br>
							<br>
								<h2a> Micro Admin </h2a><!--Numero de contactos traidos desde la bd -->
						</div>
						<?php else:?>
						<div class="grid_4" id="div2_boton7" onclick="location.href='<?= base_url() ?>contactos';" style="cursor:pointer;"> 
							<!-- <a href="<?= base_url() ?>contactos"> -->
								<!-- <img src="<?= base_url() ?>img/add_contacto_2.png" id="imagen_boton7"/> -->
								<br><br><br>
								<h2a> Contactos </h2a>
								<img src="<?=base_url()?>img/icono-contactos.png" id="imagen_boton7">

								</a>
							<span class="contacto_number"><?= $count_contactos; ?></span> <!--Numero de contactos traidos desde la bd -->
						</div>				
					  <?php endif;?>
								<!-- Nuevo Btn 4-->
						<div class="grid_4" id="div2_boton5" onclick="location.href='<?= base_url() ?>oferta_test/administrar';" style="cursor:pointer;"> 
							<!-- <a href="<?= base_url() ?>organizar_ofertas"> -->
								<!-- <img src="<?= base_url() ?>img/compro_2.png" id="imagen_boton5"/> -->
								<img src="<?= base_url() ?>img/icono-producto-solicitado.png" id="imagen_boton5"/>
								<br><br>
								<h2a>Productos <br> Solicitados</h2a>
								</a>
							<span class="oferta_number"><?= $count_ofertas; ?></span> <!--Numero de ofertas publicadas traidos desde la bd -->
							<br>
							
						</div>

								<!-- Nuevo Btn 5-->
						<div class="grid_4" id="div2_boton3" onclick="location.href='<?= base_url() ?>mensajes/';" style="cursor:pointer;"> 
							<!-- <a href="<?= base_url() ?>mensajes_usuario"> -->
								<!-- <img src="<?= base_url() ?>img/mensajes_2.png" id="imagen_boton3"/> -->
								<img src="<?= base_url() ?>img/icono-nuevos-mensajes.png" id="imagen_boton3"/>
								</a>
							<span class="msj_number"><?= $count_msj; ?></span> <!--Numero de mensajes recibidos traidos desde la bd -->
							<br><br><br>
							<h2a>Nuevos Mensajes</h2a>
						</div>

								<!-- Nuevo Btn 6-->
						<div class="grid_4" id="div2_boton6" onclick="location.href='<?= base_url() ?>mensajes/enviados';" style="cursor:pointer;"> 
							<!-- <a href="<?= base_url() ?>mensajes_usuario/enviados"> -->
								<!-- <img src="<?= base_url() ?>img/enviados_2.png" id="imagen_boton6"/> -->
								<img src="<?= base_url() ?>img/icono-mensajes-enviados.png" id="imagen_boton6"/>
								</a>
							<span class="msj_number2"><?= $count_msj2; ?></span> <!--Numero de mensajes enviados traidos desde la bd -->
							<br><br><br>
							<h2a>Mensajes Enviados</h2a>
						</div>

								<!-- Nuevo Btn 7-->
						<div class="grid_4" id="div2_boton4" onclick="location.href='<?= base_url() ?>producto/administrar';" style="cursor:pointer;"> 
							<!-- <a href="<?= base_url() ?>organizar_productos"> -->
								<!-- <img src="<?= base_url() ?>img/publicados_2.png" id="imagen_boton4"/> -->
								<!-- <img src="<?= base_url() ?>img/icono_productos_publicados_2.png" id="imagen_boton4"/> -->

								<span style="font-size: 55px; color: #fff; margin-top: 15px;" class="glyphicon glyphicon-list"> 
								</span>

								<br><br>
								<h2a> Productos <br> Publicados </h2a>
								</a>
							<span class="producto_number"><?= $count_productos; ?></span> <!--Numero de productos publicados traidos desde la bd -->
						</div>


					</section> </article>
			</center> </div>
	</center> <body><br>
<script type="text/javascript">
       document.onload=ready();
       function ready()
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/registro_completo/";
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                ready=document.getElementById('ready');
                ready.innerHTML=popup.response;
                console.log(popup.response);
                first_into="<?=$this->session->flashdata('registro_completo')?>";
                if(first_into=='DONE')
                {
               	  console.log("click");
                  document.getElementById('launch_popup_ready').click();
                }
              }
       }
  </script>
  <div data-toggle="modal" data-target="#registro_completo" id="launch_popup_ready">
    </div>
  <div id="ready" onload="JavaScript:ready();">
    </div>
   