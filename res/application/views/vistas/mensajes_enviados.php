<!DOCTYPE html>
<html lang = "es">
  	<head>
  		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
      	<meta charset="UTF-8">
      	<title>Proveedor.com.co / Tablero de Usuario - Mensajes Recibidos</title>
      	<link rel="stylesheet" href="<?=base_url()?>css/960.css">
      	<link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
      	<link rel="stylesheet" href="<?=base_url()?>css/reset.css">
      	<!-- importaciones -->
      	<link rel="stylesheet" href="<?=base_url()?>css/estilosheader.css">
  	</head>
   <style type="text/css">
        .container_12{
            background:#ffffff;
            height:auto;
            width: 1336px;
            max-width: 1299px;
            margin-top: 30px;
            margin-left: 10px;
            margin-right: center;
          }
           #he{
              float: left;
              width: 1085px;
              padding-left: 0px;
              margin-right: -75px;
              margin-left: 30px;
              display: block;
          }
          .grid_1{
            background: transparent;
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
          .grid_2{
             background: red;
             height:300px;
             width: 100%;
          } 
           #div2{
             height:auto;
             margin-right: -67px;
             width: 1084px;
          }
          #div3{
             height:auto;
             width: 1332px;
             margin-left: -16px;
          }
   </style>
   <!-- estilos tabla mensajes -->
   <style type="text/css">
		.msj {
			background: transparent; 
			color: black; 
		}
			.msj.texto {
				text-align: center; 
				vertical-align: middle;
				padding: 10px 30px 10px 30px;
				color: black; 
			}
			.msj.texto.leido { 
				color: #3aa2ed;
				font-weight: bold;
			}
			.msj.texto.noleido {
				color: #ff7f27;
				font-weight: bold;
			}
			.msj.noleido {
				background: #E4F4FF;
			}
	</style>

<style>
     @media screen and (max-width: 1280px) {
   	html, body {
   		font-family: Arial;
   	}

        .container_12{
          	background:#ffffff;
            height:auto;
            width: 1264px;
            max-width: 1264px;
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
            background: transparent;
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
             width: 996px;
          }
          .grid_2{
             background: red;
             height:300px;
             width: 100%;
          } 
          #div3{
             height:auto;
             width: 1279px;
             margin-left: -16px;
          }
      }    
</style>


   <style>
     @media screen and (max-width: 1024px) {
   	html, body {
   		font-family: Arial;
   	}

        .container_12{
          	background:#ffffff;
            height:auto;
            width: 998px;
            max-width: 998px;
            margin-top: 30px;
            margin-left: center;
            margin-right: center;
          }
           #he{
			float: left;
			width: 740px; 
			padding-left: 0px; 
			max-width: 1112px; 
			display: block; 
			margin-right: -30px; 
			margin-left: 32px;
		}
          .grid_1{
            background: transparent;
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
             width: 738px;
             margin-right: -29px;
          }
          .grid_2{
             background: red;
             height:300px;
             width: 100%;
          } 
          #div3{
             height:auto;
             width: 989px;
             margin-left: -16px;
          }
      }
         
   </style>


	<body>
		<div class="container_12">
			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			<!-- APARTADO HEADER -->
			<header class="grid_1" style="margin-left: 20px; background: transparent; padding-left: 10px; margin: 0px -13px 0px 4px; display: block; float: left;">
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
					<td class="header_iconos activo"> <a href="#"> Mensajes </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos"> <a href="<?=base_url()?>contactos"> Contactos </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos"> <a href="<?=base_url()?>publicar_producto"> Productos </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos"> <a href="<?=base_url()?>publicar_oferta"> Busco/Compro </a>  </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos" style="width: 327px;">
					  <table width="100%" style="height: 50px; background-color: #f1f1f1; border-spacing: 0px;"> <tr>
					<td style="padding-top: 15px; padding-left: 70px; width: 50px;"> <img src="<?=base_url()?>img/logouser.png" /> </td>
						<td style="padding-top: 15px; width: 100px;"> 
				<p id="usuactual" style="font-size: 18px;"> <a href="#" style="color: #ff7f27;"> <?=$this->session->userdata('usuario');?> </a> </p> 
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

			<article>
				<section>
					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- APARTADO ASIDE IZQUIERDO -->
					<div class="grid_4" id="div1">
						<div class="grid_2 alpha" style="margin-top: 30px; background-color: transparent;">
							<div class="grid_2 alpha" style="background-color: transparent;">
								<a href="<?=base_url()?>mensajes_usuario"> <img src="<?=base_url()?>img/mensajesrecibidos_2.png" /> </a> 
								<br> <br>
								<a href="#"> <img src="<?=base_url()?>img/mensajesenviados.png" /> </a>
							</div>
						</div>
					</div>

					<div class="grid_4" id="div2">
						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO TITULO DEL CONTENIDO -->
						<div class="grid_2 alpha" style="margin-top: 30px; height: auto; background-color: transparent;">
							<div style="padding: 10px 40px 10px 30px;">
								<table width="auto" height="auto">
									<tr>
										<td width="240px" style="padding-top: 3px;">
											<p style="color: #3aa2ed; font-weight: bold; font-size: 18px;"> Mensajes Recibidos </p>
										</td>
										<td width="150px" style="padding-top: 3px;">
											<p style="color: #888888; font-weight: bold; font-size: 16px;"> Nuevos Mensajes </p>
										</td>
										<td width="30px" style="padding-right: 40px;">
											<p id="cantNvoMsj" style="color: #ff7f27; font-weight: bold; font-size: 20px;"> 6 </p>
										</td>
										<td width="150px" style="padding-top: 3px;">
											<p style="color: #888888; font-weight: bold; font-size: 16px;"> Mensajes Totales </p>
										</td>
										<td width="30px">
											<p id="cantTotalMsj" style="color: #ff7f27; font-weight: bold; font-size: 20px;"> 30 </p>
										</td>
									</tr>
								</table>
							</div>
						</div>
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
						<div class="grid_2 alpha" style="margin-top: 30px; height: auto; background-color: transparent;">
							<div style="padding: 10px 40px 10px 30px;">
								<table width="100%" height="auto">
									<thead style="background-color: #e9e9e9; color: black; font-size: 15px;">
										<tr>
											<td width="5%"  style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
												<input type="checkbox" name="chk0" onclick="seleccTodosChk(this)" /> </td>
											<td width="20%" style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
												Tema </td>
											<td width="20%" style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
												Usuario </td>
											<td width="20%" style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
												Fecha </td>
											<td width="20%" style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
												----- </td>
										</tr>
										<tr> <td colspan="5" style="padding-bottom: 15px; background: white;"> </td> </tr>
									</thead>
									<tbody style="background-color: transparent; color: black; font-size: 13px; border-spacing: 2px">
										

									<!-- *********************************************************************** -->
										<?php  foreach ($msj2 as $row):  
												              
						                $date = new DateTime($row->fecha_envio);
					                 	$fecha = $date->format('l, j F \of Y');
						                  ?>
										<tr class="msj noleido" style="border-bottom: 10px solid white;">
											<td class="msj texto" width="5%"> <input type="checkbox" name="chk1"/> </td>
											<td class="msj texto noleido" width="20%" style="text-align: left;"> <?= $row->asunto;?> </td>
											<td class="msj texto" width="20%"> <?= $row->id_emisor;?> </td>
											<td class="msj texto" width="20%"> <?= $fecha;?>  <?= $row->hora_envio;?> </td>
											<td class="msj texto" width="20%"> ------ </td>
										</tr>

									<?php  endforeach; ?>


									</thead>
								</table>
								<br> <br>
								<table width="100%" height="auto">
									<tr> <td>
										<input type="button" name="eliminar" value="Eliminar" 
						               style="cursor: pointer; height: 47px; width: 140px; background-color: #e9e9e9; 
						               	color: orange; font-weight: bold; font-size: 16px; border: none;"/>
									</td> </tr>
									<tr> <td>
										<p style="font-size: 12px; padding-top: 20px;">
											Para eliminar una oferta simplemente márcala y haz clic en el botón de Eliminar
										</p>
									</td> </tr>
								</table>
							</div>
						</div>
					</div>

					<div class="grid_4" id="div3" style="margin-top: 80px;">
						<div class="grid_2 alpha" style="margin-top: 30px; height: auto; background-color: #f2f2f2;"> 
						</div>   
					</div>
				</section>
			</article>
		</div>
	</body>
</html>