<!DOCTYPE html>
<html lang="es">
	<head>
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]--> 
		<meta charset="UTF-8">
		<title>PROVEEDOR.com.co</title>
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>js/jquery.mousewheel-3.0.6.pack.js"></script>

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

				//    $("a#inline").fancybox({
				// 	'hideOnContentClick': true,
				// 			'autoDimensions': false,
				// 			'scrolling'		: 'no',
				// 			'autoScale'		: false,  				
				//        'width'		: '50%',
				//        // 'maxWidth'	: 1000,  
				//        'height'        : 350,     		        
				// });



			});

		</script>

		<link rel="stylesheet" href="<?= base_url() ?>css/960.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/960_12_col.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/reset.css">

		<!-- importaciones para las tabs -->
		<link rel="stylesheet" href="<?= base_url() ?>css/slideshow.css" type="text/css" media="screen" />   
		<link rel="stylesheet" href="<?= base_url() ?>css/index2.css" type="text/css"  />  
		<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" type="image/x-icon"/> 
		<script type="text/javascript" src="<?= base_url() ?>js/jquery.cycle.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>js/slideshow.js"></script>

		<!-- Etiquetas de posicionamiento -->
		<meta property="title" content="Proveedor.com.co"/>
		<meta name="Author" content="Script Media">
		<meta name="Subject" content="Ventas y compras al por mayor">
		<meta name="Language" content="Spanish">
		<meta name="description" content="Proveedor.com.co el portal donde compras y vendes al por mayor, todos los medios de pago">
		<meta name="keywords" content="proveedor.com.co, ventas,compras,portal de proveedores, portal proveedores, vendedores " />
		<meta http-equiv="keywords" content="proveedor.com.co, ventas,compras,portal de proveedores, portal proveedores, vendedores " />

		<!-- Archivo js para el reproductor de audio -->
		<script src="<?= base_url() ?>js/swfobject.js"></script>

		<!-- estilos css -->
		<style type="text/css">
			body {
				font-family: Arial;
				font-size: 15px;
			}

			a {
				text-decoration: none;
				color: blue;
			}

			/* contenedor general */
			.container_12{
				background:#ffffff;
				height:auto;
				width: 1265px;
				margin-top: 10px;
				margin-left: center;
				margin-right: center;
			}

			/* header (iframe) */
			#header_iframe {
				width: 104%; /* width: 106.8%; */
				height: 35px; 
				margin: -11px 0px 27px -10px;
			}

			#titulito{
				width: auto;
				height: 20px;
				background: transparent;
				margin-top: -27px;
				margin-left: 657px;
				display: none;
			}

			/* estilos barra de arriba */
			#ho {
				background: transparent;
				width: 1260px;
				max-width: 1394px;
				margin-top: 0px;  
			}

			.grid_1{
				margin-top: -14px;
				height: auto;
				width: 225px;
			}

			#ha{
				background: #ffffff;
				height:100px;
				width: 300px;
			}

			#he{
				margin-top: -6px;
				width: auto; /*1015px*/
				/*max-width: 1054px;*/
				/*margin-left: -38px; /*con respecto al borde izq de la pantalla */
				margin-left: -18px; /*con respecto a la "r" del logo de proveedor */
			}

			#div1{
				height:auto;
				width: 220px;
				margin-left: 5px;
				margin-top: 4px;
			}
			#div2 {
				height:auto;
				width: 831px;
				margin-left: -10px;
			}

			.grid_4 {
				background: #ffffff;
				height:512px;
				margin: 12px 12px;
				width: 300px;
			}

			/* aside izquierdo: accesos directos; */
			.grid_2 {
				height:300px;
				width: 100%;
				background-color: transparent;
			} 

			/* aside izquierdo: accesos directos; */
			.grid_2 {
				height:300px;
				width: 100%;
				background-color: transparent;
			} 

			li {
				color: blue;
				border-bottom: 1px solid #ddd;
				padding-top: 7px;
				padding-bottom: 7px;
			}

			.asideizquierdo {
				text-align: left; 
				padding: 2px 5px 0px 2px;
				font-size: 13px;
				font-family: Arial, sans-serif;
			}

			.asideizquierdo table tr td {
				vertical-align: middle;
			}

			.asideizquierdo.elem {
				border-bottom: 1px solid #f6f6f6;
				padding-top: 4px !important;
				padding-bottom: 1px !important;
				/**/
				display: inline-block;
				/*margin-left: 5px;*/
				margin-left: -2px;
				width: 156px; /*width: 100%; /*width: 78%;*/
				margin-right: -9px;
			}

			.asideizquierdo.elem a {
				margin-left: 0px; 
				/* color: rgb(17, 17, 172); */
				height: 20px;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
			}

			.asideizquierdo.imagen {
				width: 17px;
				height: 1.4em; /* height: 18px; */
				display: inline;
				margin-left: 0px;
				vertical-align: middle;
			}

			.tdsub_titulo {
				color: #4B4B4B; 
				font-size: 16px; 
				vertical-align: middle; 
				padding-left: 10px;
			}
			.tdsub_contenido {
				padding: 15px 10px 10px 10px;
			}
			.tdsub_contenido ul li {
				border-bottom: 1px solid #f3f3f4;
			}

			#div4{
				background: blue;
				height:20px;
			}

			#div4{
				background: transparent;
				height:20px;
			}

			#barra {
				/* estilos de la barra de busqueda de arriba (tabla) */
				width: auto;
				display: block; 
				height: auto;
				min-height: 39px;
				border-radius: 3px; 
				border: 2px solid #005e9b; 
			}

			/* estilos del select de arriba (dentro de un label) */
			#selec {
				height: 41px; 
				width: 106px; /* width: 104px; */ 
				border: none; 
				padding: 10px 10px 10px 1px;
				margin: 0;
				background: transparent;
				color: #ff812d; /* naranja el texto */
				outline:none;
				display: inline-block;
				-webkit-appearance:none;
				-moz-appearance:none;
				appearance:none;
				cursor:pointer;
				font-weight: bold;
			}

			.flechita {
				margin-left: 15px; 
				margin-right: 10px;
			}

			.flechita #selec {
				/* quitar la flecha de un select (para firefox, ie y otros) */
				-moz-appearance: none;
				appearance: none;
				text-indent: 0.01px;
				text-overflow: '';
				background-image: url("img/flechita_select.png");
				background-position: 96px 19px; /* background-position: 87px 17px; */
				background-repeat: no-repeat;
				font-family: Arial, sans-serif;
			}

			#cuadrobusqueda {
				padding-left: 42px;
				height: 39px;
				max-height: 39px;
				width: 437px; /* width: 439px; */
				max-width: 437px; /* max-width: 439px; */
				border: none;
				font-family: Arial, sans-serif;
			}

			#cuadrobusqueda:focus {
				/* quitar el resplandor generado por el explorador al darle foco al select */
				outline: 0px;
			}

			#cuadrobusqueda::-webkit-input-placeholder {
				color: #c3c3c3;
				font-size: 13px;
			}
			#cuadrobusqueda:-moz-placeholder {
				color: #929292;
				font-size: 13px;
			}
			#cuadrobusqueda::-moz-placeholder {
				color: #929292;
				font-size: 13px;
			}
			#cuadrobusqueda:-ms-input-placeholder {
				color: #c3c3c3;
				font-size: 13px;
			}

			#btn_busqueda {
				background: url('img/botonbusqueda.png'); 
				width: 65px; 
				height: 41px; 
				cursor: pointer; 
				border: none;
				display: block;
				margin-bottom: -1px;
				background-position: center;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* APARTADO BOTONES APARTADO VENTANA DE TABS */
			#espacio {
				background: #ffffff;
				height: 50px;
				width: 810px;
				margin-left: 0px;
				margin-top: 0px;
			}
			#espacio_2 {
				background-color: transparent;
				margin-top: -3px;
				height: 50px;
				padding-left: 3px;
				border: 3px solid #f3f3f4;
				padding-right: 2px;
				border-radius: 2px;
			}
			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* APARTADO VENTANA DE TABS */
			#fotos {
				background: #ffffff;
				height: 253px;
				width: 810px;
				margin-left: 0px;
				margin-top: -8px;
			}
			#fotos_2 {
				background-color: transparent;
				margin-top: 8px;
				height: 254px;
				padding-left: 3px;
				border: 3px solid #f3f3f4;
				padding-right: 2px;
				border-radius: 2px;
			}
			#fotos_3 {
				background-color: transparent; 
				margin: 0;
				height: 254px;
			}
			.fotos_img {
				width: 713px; 
				height: 218px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* APARTADO ESPACIO PUBLICITARIO DEBAJO DE LA VENTANA DE TABS */
			#espacio3 {
				background: #ffffff;
				height: 50px;
				width: 810px;
				margin-left: 0px;
				margin-top: 15px;
			}
			#espacio3_2 {
				background-color:  #f3f3f4;
				margin-top: -3px;
				height: 50px;
				padding-left: 3px;
				border: 3px solid #f3f3f4;
				padding-right: 2px;
			}
			#espacio3_3 {
				height: auto; 
				background: transparent; 
				margin-top: 15px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* APARTADO PRODUCTOS DESTACADOS */
			#productosplus {
				background-color: transparent; 
				margin-top: 7px; 
				height:auto; 
				width: 1017px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* APARTADO PRODUCTOS PATROCINADOS */
			#productospatrocinados {
				background-color: transparent; 
				margin-top: -11px; 
				height: auto;
				width: 1015px;
			}
			#espacio4_2 {
				background-color:  transparent;
				margin-top: -3px;
				margin-left: 11px;
				height: 123px;
				width: 473px;
				padding-left: 3px;
				border: 3px solid #f3f3f4;
				padding-right: 2px;
			}

			#espacio4_3 {
				background-color:  transparent;
				margin-top: -3px;
				margin-left: 16px;
				height: 123px;
				width: 473px;
				padding-left: 3px;
				border: 3px solid #f3f3f4;
				padding-right: 2px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* APARTADO ULTIMOS PRODUCTOS SOLICITADOS / ULTIMOS PRODUCTOS PUBLICADOS / PUBLICIDAD */
			#ultimosproductos_sol_publi {
				background-color: transparent; 
				margin-top: 20px; 
				height: auto;
				width: auto;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* APARTADO EMPRESAS PATROCINADORAS */
			#apartadoE {
				background-color: transparent; 
				margin-top: 20px; 
				height: auto;  
				width: 1246px; 
				margin-left: -230px;
			}
			#titulo_emp_patrocinadoras {
				width: 18%;
			}
			#estilos_logos_emp_patrocinadoras {
				vertical-align: middle; 
				border: 4px solid #f3f3f4; 
				padding: 8px 8px 8px 8px;
				width: 202px;
				height: 92px;
			}
			#estilos_espacio_emp_patrocinadoras {
				vertical-align: middle; 
				border: 4px solid #f3f3f4; 
				padding: 8px 8px 8px 8px;
				width: 202px;
				height: 92px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* APARTADO PUBLICIDAD ANTES DE FOOTER */
			#espacio5 {
				background: #ffffff;
				height: 50px;
				width: 810px;
				margin-left: 0px;
				margin-top: 24px;
				margin-bottom: 46px;
			}

			#espacio5_2 {
				background-color:  transparent;
				margin-top: -3px;
				height: 50px;
				padding-left: 3px;
				padding-right: 2px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* APARTADO FOOTER */
			#foo {
				margin-top: 8px; 
				height: 333px; 
				max-height: 333px;
				width: 1348px;
				margin-left: -269px;
				background: #f2f2f2;
				margin-bottom: -15px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* APARTADO ASIDE DERECHO DEL LADO DE LAS TABS */
			#div3 {
				background: #ffffff;
				height: 385px;
				width: 179px;
				margin-left: 0px;
				margin-top: 1px;
			}
			#div3_2 {
				background-color: transparent; 
				margin-top: 8px; 
				height: 385px;
				max-height: 385px;;
				padding-left: 3px; 
				border: 3px solid #f3f3f4; 
				padding-right: 2px;
				border-radius: 2px;
			}
			#titulo_comprar{
				width: 164px;
				height: auto;
				background: transparent;
				margin-left: -8px;
				margin-top: 2px;
				font-family: 'Arial Rounded MT', Arial, sans-serif;
			}
		</style>		
	</head>

	<body>
		<div class="container_12" align= "center">
			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			<!-- APARTADO HEADERS -->
			<!-- <iframe src="<?//=base_url()?>header" scrolling="no" style="width: 99.9%; height: 35px; margin-top: -11px; margin-bottom: 27px;">
			</iframe> -->
			<iframe src="<?= base_url() ?>header" scrolling="no" id="header_iframe"></iframe>
			<?//php echo $this->load->view($header) ?>

			<div class="grid_1"> 
				<a href="#"> <img src="<?= base_url() ?>img/logo3.png" style="margin-left: -20px; margin-top: -7px;" /> </a> 
			</div> 

			<div class="grid_1" id="titulito">
				<b style="font-size: 12px; color:#7f7f7f;">¡Publica Gratis tus Productos y tus Solicitudes de Productos!</b>
			</div>

			<div class="grid_1" id="he">
				<table height="auto" width="auto">
					<tr>
						<td style="height: auto; padding-right: 8px;">
							<?= form_open(base_url() . 'listado/validar') ?>  <!--Formulario de busqueda que dirige a la vista de listado -->
							<span><?php echo validation_errors(); ?></span>
							<table id="barra">
								<tr>
									<td style="height: 40px; max-height: 40px; padding-top: 0px; padding-right: 3px;"> 
										<div class="flechita">
											<select name="selec1" id="selec">
												<option value="Productos" selected> Productos </option>
												<option value="Solicitados" default> Solicitados </option>
												<option value="Proveedores" default> Proveedores </option>
											</select>
										</div>
									</td>
									<td style="height: 33px; max-height: 40px; padding-top: 8px;"> 
										<div style="border-left: 2px solid #ddd; padding: 2px 0px 2px 0px; height: 68%;"> </div> 
									</td>
									<td style="height: 40px; max-height: 40px; display: block; font-size: 24px;"> 
										<input type="text" name="busqueda" id="cuadrobusqueda" 
											   placeholder="Buscar Productos, Proveedores y Productos Solicitados en Colombia"/> </td>
									<td style="max-height: 40px;"> 
										<input type="submit" name="btn_busqueda"  id="btn_busqueda" value="" /> </td>
								</tr>
							</table>
							<?= form_close() ?>
						</td>
						<td style="height: 50px;">
							<table width="auto" height="auto">
								<tr>
									<td height="auto" style="padding-right: 8px;">
										<a href="<?= $publicar_of ?>" <?= @$clase_css ?>> 
											<img src="<?= base_url() ?>img/boton_oferta.png" /> </a>
									</td>

									<td height="auto">
										<a href="<?= $publicar_prod ?>" <?= @$clase_css ?>> 
											<img src="<?= base_url() ?>img/boton_producto.png" /> </a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="clear" style="padding-top: 0px;"></div>

			<article>
				<section>
					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- APARTADO ASIDE IZQUIERDO ACCESOS DIRECTOS -->
					<div class="grid_4" id="div1">
						<style type="text/css">
							#contenedor_ulmenu {
								background-color: transparent; 
								margin: 10px 0px 0px 6px; 
								height:auto; 
								border-top:1px solid #c1cedf; 
								width: 203px;
								display: none;
							}

							.ui-menu .ui-menu-item a {
								text-align: left;
								color: black !important;
								font-size: 12px;
							}
							.asideizquierdo.elem span {
								/*display: none;*/
							}
							.subcategoria {
								width: 450px;
								height: 250px;
								z-index: 1010;
								background: white;
								border: 2px solid #c1cedf !important;
								border-radius: 0 3px 3px 0;
								box-shadow: 3px 3px 7px rgb(202, 202, 202);
								font-weight: normal;
								-webkit-box-sizing: border-box;
								-moz-box-sizing: border-box;
								box-sizing: border-box;
								padding: 10px !important;
								font-family: Arial, sans-serif !important;
							}
							.subcategoria .antesde_divsubs {
								margin-bottom: 7px;
							}
							.subcategoria .divsubs {
								width: 406px !important;
								padding: 15px 10px 10px 10px !important;
							}
							.subcategoria .divsubs li {
								border: none;
							}
							.subcategoria .divsubs li a {
								padding: 0;
								line-height: 0;
								padding-top: 2px;
								padding-bottom: 11px;
								line-height: 0;
								border-bottom: 1px solid #f3f3f4;
								height: 4px;
								overflow: visible;
							}
							.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, 
							.ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus {
								/* estilo en hover */
								background: #eeeeee !important;
								border: none !important;
							}
						</style>
						<div class="grid_2 alpha" style="background-color: transparent; height: auto;">
							<!-- Aqui se llama el archivo php que contiene el marco izquierdo del index  -categorias- reproductor de video y audio -->
							<?php //echo $this->load->view($menu) ?> 
						</div>
						<!-- <div class="grid_2 alpha" style="margin-top: 30px;"></div> -->
					</div>

					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- APARTADO CONTENIDO -->
					<div class="grid_4" id="div2" style="margin-right: 0px;">
						<!-- APARTADO BOTONES APARTADO VENTANA DE TABS -->
						<div class="grid_4" id="espacio">
							<div class="grid_2 alpha" id="espacio_2">
								<a href="<?= $publicar_prod ?>"><img src="<?= base_url() ?>img/12.png" style="margin-left: -21px; margin-top: 4px;"></a>
								<a href="<?= $publicar_prod ?>"><img src="<?= base_url() ?>img/22.png" style="margin-left: 28px; margin-top: 4px;"></a>
								<a href="<?= base_url() ?>registro/registro_usuario"><img src="img/32.png" style="margin-top: 4px; margin-left: 20px;"></a>
								<a href="#popup_banner" id="inline"><img src="<?= base_url() ?>img/42.png" style="margin-top: 4px; margin-left: 37px;" id="banner_btn4"></a>
							</div>
						</div>

						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO VENTANA DE TABS -->
						<div class="grid_4" id="fotos"> <div class="grid_2 alpha" id="fotos_2"> 
								<div class="grid_2 alpha" id="fotos_3"> <div style="padding-top: 0px;">
										<table border="0" valign="top" cellspacing="0" cellpadding="0" style="width: 100%; height: 308px;"> 
											<tbody> <tr>
													<td colspan="3" style="width: 100%; height: 270px;">
														<div id="bannerNav" style="display: none; visibility: hidden;"> </div> <!-- las opciones estan en js/bannerrotator.js -->
														<div id="bannerRotator"	style="height: 254px; margin: 0;">
															<ul>
																<li rel="1" style="display: block;">
																	<a href="#"> <img style="width: 812px; max-width: 812px; height: 254px; margin-top: -7px;" 
																					  src="<?= base_url() ?>img/01_Registrese4.png" class="fotos_img"> </a>
																</li>
																<li rel="2" style="display: none;">
																	<a href="#"> <img style="width: 812px; max-width: 812px; height: 254px; margin-top: -7px;" 
																					  src="<?= base_url() ?>img/02_publique2.png" class="fotos_img"> </a>
																</li>
																<li rel="3" style="display: none;">
																	<a href="#"> <img style="width: 812px; max-width: 812px; height: 254px; margin-top: -7px;" 
																					  src="<?= base_url() ?>img/03_solicite2.png" class="fotos_img"> </a>
																</li>
																<!-- <li rel="1" style="display: block;">
																	<a href="#"> <img src="<?= base_url() ?>img/1.png" class="fotos_img"> </a>
																</li>
																<li rel="2" style="display: none;">
																	<a href="#"> <img src="<?= base_url() ?>img/trabajo1.jpg" class="fotos_img"> </a>
																</li>
																<li rel="3" style="display: none;">
																	<a href="#"> <img src="<?= base_url() ?>img/trabajo2.jpg" class="fotos_img"> </a>
																</li>
																<li rel="4" style="display: none;">
																	<a href="#"> <img src="<?= base_url() ?>img/trabajo3.jpg" class="fotos_img"> </a>
																</li>
																<li rel="5" style="display: none;">
																	<a href="#"> <img src="<?= base_url() ?>img/trabajo4.jpg" class="fotos_img"> </a>
																</li>
																<li rel="6" style="display: none;">
																	<a href="#"> <img src="<?= base_url() ?>img/trabajo5.jpg" class="fotos_img"> </a>
																</li> -->
															</ul>
														</div>
													</td>
												</tr> </tbody>
										</table>
									</div> </div>
							</div> </div>

						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO ESPACIO PUBLICITARIO DEBAJO DE LA VENTANA DE TABS -->
						<div class="grid_4" id="espacio3">
							<div class="grid_2 alpha" id="espacio3_2"> 
								<div class="grid_2" id="espacio3_3"> 
									<b style="font-size: 18px; color:#7f7f7f;">
										En Proveedor las empresas venden, compran y consiguen mas clientes.</b>
								</div>
							</div>
						</div>

						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO PRODUCTOS DESTACADOS -->
						<div class="grid_2 alpha" id="productosplus">
							<div id="titulo" style="padding: 10px 10px 10px 0px;">
								<p style="color: #ff7f27; font-weight: bold; margin-left: -822px;"> Productos Destacados</p> 
								<div style="width: 65%; background: #f3f3f4; height: 5px; margin-left: 6px; margin-top: -10px;"></div>
								<div style="width: 168px; background: transparent; height: 21px; margin-left: 846px; margin-top: -14px; margin-bottom: -4px;">
									<p style="color: #ff7f27; font-weight: bold; margin-right: 134px; margin-top: -18px; font-size: 26px;">+</p>
									<p style="font-weight: bold;font-size: 14px; margin-top: -24px; margin-right: -11px;">
										<a href="#" style="color: blue;"> Su producto aqui </a> </p>
								</div>
							</div>
							<!-- importaciones pestañas 2 
							<script type="text/javascript" src="js/jquery_prod.js"></script>
							<script src="<?//=base_url()?>js/jquery-1.9.1.min.js"></script>-->
							<script src="<?= base_url() ?>js/billy.carousel.jquery.min.js" type="text/javascript"></script>
							<link rel="stylesheet" href="<?= base_url() ?>css/demonstration.css" type="text/css" media="screen" />
							<script type="text/javascript">
			$(document).ready(function() {
				// ----- Carousel
				$('#billy_scroller').billy({
					slidePause: 10000,
					// We need custom next/prev buttons for this example. If we used the defaults 
					// (#billy_next/#billy_prev), every carousel instance on the page 
					// would scroll when they're clicked...
					nextLink: $('#carousel_billy_next'),
					prevLink: $('#carousel_billy_prev'),
					noAnimation: true //desactivar animacion
				});
			});
							</script>
							<div id="contenido" style="padding-top: 5px; padding-bottom: 5px;">
								<ul id="billy_indicators"> </ul>
								<div id="billy_clip">
									<ul id="billy_scroller">
										<!-- NOTA -->
										<!-- este es una especie de sistema de pestañas para Productos plus -->
										<!-- los "li" son las pestañas y en cada una de ellas va un contenido -->
										<!-- agregar el resto de contenido de los demas li, los de abajo que tienen una imagen -->
										<style type="text/css">
											.c_prodplus {
												padding-right: 28px;
												padding-bottom: 22px;
											}
											.c_prodplus_imagen {
												width: auto; 
												max-width: 150px;
												height: auto;
												max-height: 102px;
											}
											.c_prodplus_imagensec { 
												width: auto; 
												max-width: 150px;
												height: auto;
												max-height: 55px;
												vertical-align: middle;
											}
											.c_prodplus_divgen {
												width: 168px;
												max-width: 168px; 
												min-width: 168px; 
												height: 308px;
												min-height: 308px;
												max-height: 308px;
												border: 4px solid #f3f3f4;
											}
											.precio_precio {
												font-weight: bold; 
												font-size: 15px; 
												color: black;
											}
											.precio_signo_pesos {
												color: #ff7f27; 
												font-size: 25px; /* font-size: 40px; */
												margin-right: 2px;
											}
										</style>
										<!-- PESTAÑA 1 -->
										<li style="border: none;"> <!-- tab 1 -->
											<!-- Contenido de productos del pantallazo de  la pestaña No 1 -->
											<?php echo $this->load->view($productos_plus) ?>
										</li>
										<!-- PESTAÑA 2 -->
										<li style="border: none;"> <!-- tab 2 -->
											<!-- Contenido de productos del pantallazo de  la pestaña No 2 -->
											<?php echo $this->load->view($productos_plus2) ?>
										</li>
										<!-- PESTAÑA 3 -->
										<li style="border: none;"> <!-- tab 3 -->
											<!-- Contenido de productos del pantallazo de  la pestaña No 3 -->
											<?php echo $this->load->view($productos_plus3) ?>	
										</li>
									</ul>	
								</div>
							</div>
						</div>

						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO PRODUCTOS PATROCINADOS -->
						<div class="grid_2 alpha" id="productospatrocinados">
							<div id="titulo" style="padding: 10px 10px 10px 8px;">
								<table style="width: 100%; height: auto;"> <tr>
										<td style="width: 22%;"> <p style="color: #ff7f27; font-weight: bold;"> Productos Patrocinados </p>
											<div style="width: 822px; background: #f3f3f4; height: 5px; margin-left: 186px; margin-top: -10px;"></div>
										</td> 
										<td style="width: 96.6%;" style="border-bottom: 4px solid #f3f3f4; float: left; margin-top: 12px;"> </td>
									</tr> </table>
							</div>
							<div id="contenido" style="padding-top: 25px; padding-bottom: 5px;">
								<table style="width: auto; height: auto;">
									<div class="grid_2 alpha" id="espacio4_2"> 
										<div class="grid_2" style="height: auto; background: transparent; margin-top: 15px;"> 
											<a href=""> <img src="<?= base_url() ?>img/publii.PNG" style="" />  </a>                  
										</div>
									</div>
									<div class="grid_2 alpha" id="espacio4_3"> 
										<div class="grid_2" style="height: auto; background: transparent; margin-top: 15px;"> 
											<a href=""> <img src="<?= base_url() ?>img/publii.PNG" style="" />  </a>                    
										</div>
									</div>
								</table>
							</div>
						</div>

						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO ULTIMOS PRODUCTOS SOLICITADOS / ULTIMOS PRODUCTOS PUBLICADOS / PUBLICIDAD -->
						<div class="grid_2 alpha" id="ultimosproductos_sol_publi">
							<div id="titulo" style="padding: 10px 0px 10px 8px;">
								<table width="100%" height="auto"> <tr>
										<!-- contenedor: ABRE ofertas y productos -->
										<td width="90%"> <table border="1" style="width: 832px; max-width: 857px;"> <tr> <td>
														<!-- sistema TICKER para que los elementos viajen hacia arriba -->
														<!-- al estilo de p.iwana.com -->
														<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/estilosticker.css"/>
														<script type="text/javascript" src="<?= base_url() ?>js/jquery.totemticker.js"></script>
														<script type="text/javascript">
			$(function() {
				$('#movimiento1').totemticker({
					row_height: '130px',
					next: '#ticker-next',
					previous: '#ticker-previous',
					stop: '#stop',
					start: '#start',
					mousestop: true,
					interval: "5000",
				});
				$('#movimiento2').totemticker({
					row_height: '130px',
					next: '#ticker-next',
					previous: '#ticker-previous',
					stop: '#stop',
					start: '#start',
					mousestop: true,
					interval: "6500",
				});
			});
														</script>
														<style type="text/css">
															.imgProd {
																width: auto; 
																max-width: 126px;
																height: auto;
																max-height: 102px;
																margin-left: 22px;
															}
														</style>
														<table width="100%">
															<tr>
																<!-- ultimas ofertas de compra: columna 1 -->
																<td width="50%">
																	<div id="titulo" style="padding: 0px 10px 10px 0px;">
																		<table width="100%" height="auto">
																			<tr> <td width="auto"> <p style="color: #ff7f27; font-weight: bold;"> 
																						Últimos Productos Solicitados
																					</p> </td> 
																				<td width="auto"> <img src="<?= base_url() ?>img/separador_3.png" /> </td> </tr>
																			<tr> <td style="padding: 18px 0px 0px 52px;"> <a href="#"> Ver Todas </a> </td> </tr>
																		</table>
																	</div>
																	<div id="contenido" style="border-right: 2px solid #ddd;">
																		<!-- Contenido de ultimas ofertas de compra -->
																		<?php echo $this->load->view($contenido_ofertas) ?>
																	</div>
																</td>
																<!-- ultimos productos publicados: columna 2 -->
																<td width="50%">
																	<div id="titulo" style="padding: 0px 10px 10px 0px;">
																		<table width="100%" height="auto">
																			<tr> <td width="55%"> <p style="color: #ff7f27; font-weight: bold;"> 
																						Últimos Productos Publicados
																					</p> </td> 
																				<td width="auto"> <img src="<?= base_url() ?>img/separador_3.png" /> </td> </tr>
																			<tr> <td style="padding: 18px 0px 0px 52px;"> <a href="#"> Ver Todas </a> </td> </tr>
																		</table>
																	</div>
																	<div id="contenido"> 
																		<!-- Contenido de ultimas ofertas de compra -->
																		<?php echo $this->load->view($contenido_publicados) ?>
																	</div>
																</td>
																<!-- contenedor: CIERRA ofertas y productos / ABRE publicidad -->
																<td width="10%"> <table border="1" style="border: 4px solid #f3f3f4;"> <tr> <td> 
																				<a href="#"> <img src="<?= base_url() ?>img/publi2_2.PNG" /> </a>
																			</td> </tr> </table> </td> 
															</tr> </table>
													</td> </tr> </table> </td>
									</tr> </table>
							</div>
						</div>

						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO EMPRESAS PATROCINADORAS -->
						<div class="grid_2 alpha" id="apartadoE">
							<!-- <div id="titulo" style="padding: 10px 10px 10px 10px;">
								<table width="100%" height="auto">
									<tr> <td width="16%"> <p style="color: #ff7f27; font-weight: bold;"> Empresas Patrocinadoras </p> </td> 
									<td width="97.3%" style="border-bottom: 4px solid #f3f3f4; float: left; margin-top: 12px;"> </td> </tr>
								</table>
							</div> 
							<style type="text/css">
								#estilos_logos_emp_patrocinadoras {
									vertical-align: middle; 
									border: 4px solid #f3f3f4; 
									padding: 8px 8px 8px 8px;
								}
							</style>
							<div id="contenido" style="padding: 20px 10px 20px 10px">
								<table width="auto" height="auto" style="float: left; margin-top: 2px;">
									<tr>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/panel_sandwich.png" /> </a> </center>
										</td>
										<td style="padding-left: 15px;"> </td>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/electro_la_oficina.png" /> </a> </center>
										</td>
										<td style="padding-left: 15px;"> </td>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/fh_solar_led.png" /> </a> </center>
										</td>
										<td style="padding-left: 15px;"> </td>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/ferralia.png" /> </a> </center>
										</td>
										<td style="padding-left: 15px;"> </td>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/coindustrial.png" /> </a> </center>
										</td>
										<td style="padding-left: 15px;"> </td>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/redcampo.png" /> </a> </center>
										</td>
									</tr>
									<tr> <td style="padding-bottom: 28px;"> </td> </tr>
									<tr>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/numak.png" /> </a> </center>
										</td>
										<td style="padding-left: 15px;"> </td>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/acg_construccion.png" /> </a> </center>
										</td>
										<td style="padding-left: 15px;"> </td>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/fantel.png" /> </a> </center>
										</td>
										<td style="padding-left: 15px;"> </td>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/panel_sandwich.png" /> </a> </center>
										</td>
										<td style="padding-left: 15px;"> </td>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/fh_solar_led.png" /> </a> </center>
										</td>
										<td style="padding-left: 15px;"> </td>
										<td width="168" height="68" id="estilos_logos_emp_patrocinadoras">
											<center> <a href="#"> <img src="img/labthink.png" /> </a> </center>
										</td>
									</tr>
								</table>
							</div> -->
							<div id="titulo" style="padding: 10px 10px 10px 10px;">
								<table style="width: 100%; height: auto;">
									<tr> <td id="titulo_emp_patrocinadoras"> 
											<p style="color: #ff7f27; font-weight: bold; font-size: 15px;"> Empresas Patrocinadoras </p> </td> 
										<td style="width: 101%; border-bottom: 6px solid #f3f3f4; float: left; margin-top: 8px;"> </td> </tr>
								</table>
							</div> 
							<div id="contenido" style="padding: 20px 10px 20px 10px">
								<div style="width: auto; height: auto; float: left; margin-top: -13px; margin-left: 20px;">
									<div id="estilos_logos_emp_patrocinadoras" style="margin-right: 15px; float: left; margin-top: 15px;">
										<center> <a href="#"> <img src="<?= base_url() ?>img/publi5.PNG" /> </a> </center>
									</div>
									<div id="estilos_logos_emp_patrocinadoras" style="margin-right: 15px; float: left; margin-top: 15px;">
										<center> <a href="#"> <img src="<?= base_url() ?>img/publi5.PNG" /> </a> </center>
									</div>
									<div id="estilos_logos_emp_patrocinadoras" style="margin-right: 15px; float: left; margin-top: 15px;">
										<center> <a href="#"> <img src="<?= base_url() ?>img/publi5.PNG" /> </a> </center>
									</div>
									<div id="estilos_logos_emp_patrocinadoras" style="margin-right: 15px; float: left; margin-top: 15px;">
										<center> <a href="#"> <img src="<?= base_url() ?>img/publi5.PNG" /> </a> </center>
									</div>
									<div id="estilos_logos_emp_patrocinadoras" style="margin-right: 15px; float: left; margin-top: 15px;">
										<center> <a href="#"> <img src="<?= base_url() ?>img/publi5.PNG" /> </a> </center>
									</div>
								</div>
							</div>

							<div id="titulo" style="padding: 10px 10px 10px 10px;">
								<table style="width: 100%; height: auto;"> <tr> 
										<td style="width: 94%; border-bottom: 6px solid #f3f3f4; float: left; margin-top: 45px; margin-left: 37px;"> </td> 
									</tr> </table>
							</div> 
						</div>

						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO PUBLICIDAD ANTES DE FOOTER -->
						<div class="grid_4" id="espacio5">
							<div class="grid_2 alpha" id="espacio5_2"> 
								<div class="grid_2" style="height: auto; background: transparent;"> 
									<center> <a href="#"> <img src="<?= base_url() ?>img/publicidad4.png" /> </a> </center>
								</div>
							</div>
						</div>

						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO FOOTER -->
						<div class="grid_2 alpha" id="foo">
							<iframe src="<?= base_url() ?>footer" scrolling="no" style="height: 333px; width: 100%; margin-left: 0px;"></iframe>
							<?//php echo $this->load->view('index/footer') ?>
						</div>
					</div> <!-- cierre div general -->

					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- APARTADO ASIDE DERECHO DEL LADO DE LAS TABS -->
					<div class="grid_4" id="div3">
						<div class="grid_2 alpha" id="div3_2"> 
							<div style="padding: 85px 10px 10px 10px;">
								<div class="grid_2" id="titulo_comprar"> 
									<b style="font-size: 15px; color:#7f7f7f;">
										¡Empieza a comprar y a vender ahora!</b>
								</div>
								<a href="<?= base_url() ?>registro/registro_usuario"> 
									<img src="<?= base_url() ?>img/registrate.png" style="margin: 35px 0px 35px -6px;"/> </a>
								<b style="font-size: 15px; color:#ff7f27; font-family: 'Arial Rounded MT', Arial, sans-serif;">
									¡Registro Gratis!</b>
							</div>
							<!-- <div style="padding: 10px 10px 10px 10px;">
								<table width="auto" height="auto">
									<tr> <td colspan="10" style="padding-bottom: 9px;"> <table>
										<tr> <td> <p style="color: #ff7f27; font-size: 15px; font-weight: bold; text-align: center;"> 
											Quiero Registrarme! </p> </td> 
										</tr>
										<tr> <td style="text-align: center;"> 
											<img src="img/sonrisaprecio.png" style="margin-top: 6px;" /> </td> 
										</tr>
									</table> </td> </tr>
									<tr> <td colspan="10"> <center>
										<table style="width: auto;"> <tr> 
											<td style="padding-right: 5px;"> 
												<img src="img/logoweb_2.png" /> </td>
											<td style="vertical-align: middle;"> 
												<a href="<?= base_url() ?>registro/registro_usuario"> <p style="color: #3aa2ed; font-size: 13px;"> Regístrate Gratis! </p> </a> </td> 
										</tr> </table> 
									</center> </td> </tr>
									<tr> <td colspan="2" style="padding-top: 12px; border-bottom: 1px dotted #ddd;"> </td> </tr>
									<tr> <td colspan="10" style="padding-top: 8px;"> <center>
										<table style="width: auto;"> <tr> 
											<td style="padding-right: 5px;"> 
												<img src="img/ingresar.png" /> </td>
											<td style="vertical-align: middle;"> 
											<a class="ejemplo_4"  href="<?= base_url() ?>logueo" > 
												<p style="color: #3aa2ed; font-size: 13px;"> Ingresar </p> </a>
													 </td> 
										</tr> </table> 
									</center> </td> </tr>
									<tr> <td colspan="10" style="padding-top: 13px;"> <center>
										<table>
											<tr>
												<td style="padding-left: 13px; padding-right: 9px;"> 
													<img src="img/imgChiquita1.png" /> </td>
												<td style="vertical-align: middle;"> 
													<a href="#"> <p style="color: blue; font-size: 13px;"> Publicar Catálogo </p> </a> </td> 
											</tr>
											<tr> <td style="padding-top: 15px;">  </td> </tr>
											<tr>
												<td style="padding-left: 13px; padding-right: 9px;"> 
													<img src="img/imgChiquita2.png" /> </td>
												<td style="vertical-align: middle;"> 
													<a href="#"> <p style="color: blue; font-size: 13px;"> Anuncie en Proveedor.com.co </p> </a> </td> 
											</tr>
										</table>
									</center> </td> </tr>
								</table>
							</div> -->
						</div>
						<!-- <center> <div class="grid_2 alpha" style="margin-top: 10px; height: 48px; background: transparent;">
							<input type="button" value="Incremente sus &#x00A; Ventas!" 
								style="width: 150px; height: 100%; background-color: #f3f3f4; font-size: 15px; cursor: pointer; border:none; color: gray;" />
						</div> </center> -->
					</div>         
				</section>
			</article>
		</div>

		<!-- Div oculto que contiene el formulario que aparece en el popup -->	
		<div id="popup_banner" style="display:none">

			<div class="sibling">
				<img src="<?= base_url() ?>img/logo3.png" class="logo_prov" />
			</div>

			<div class="sibling">
				<p align="center" class="texto_1">¡Anuncie en proveedor!</p>
				<p align="center" class="texto_2">Sus productos serán vistos por miles de empresas.</p>
				<p align="center" class="texto_3">Ingrese sus datos y sera contactado por uno de nuestros asesores:</p>	
			</div>

			<div class="sibling">
				<?php
				//En la variable $atributos se almacena en un array los atributos que se necesitan en el formulario
				$atributos = array('class' => 'form_popup', 'id' => 'formulario');
				?>
<?= form_open('index/form_popup', $atributos); ?><!-- Abre el formulario que aparece en el popup -->
				<!--<form id="formulario" action="post" class="form_popup">-->

				<div class="form_1">Correo de contacto</div>
				<div class="form_2">
					<input type="email" size="32" id="correo" name="correo" class="campo">
				</div>

				<div class="form_1">Teléfono</div>
				<div class="form_2">
					<input type="tel" size="32" id="telefono" name="telefono" class="campo">
				</div>

				<div class="form_1">Nombre de contacto</div>
				<div class="form_2">
					<input type="text" size="32" id="nombre" name="nombre" class="campo">
				</div>

				<div class="form_1">Nombre de la empresa</div>
				<div class="form_2">
					<input type="text" size="32" id="empresa" name="empresa" class="campo">
				</div>

				<div class="form_1"></div>
				<div class="form_2"><input type="submit"  value="Solicitar información" class="bnt_form"></div>					

<?= form_close() ?> <!-- Cierra el formulario-->
			</div>

			<div class="sibling">
				<p class="texto_4">También  puede comunicarse al correo electrónico <span class="text_email">ventas@proveedor.com.co</span></p>
			</div>

			<div class="clear" >					
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				jQuery.validator.addMethod("letras", function(value, element) {
					return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
				}, "Solo letras del alfabeto");

				$('a#inline').fancybox({
					afterLoad: function() {
						$('.form_popup').validate({
							rules: {
								empresa: "required",
								correo: {// "email" is name of the field
									required: true,
									email: true // "email" is name of the rule
								},
								telefono: {
									required: true,
									digits: true,
									minlength: 6,
									maxlength: 10
								},
								nombre: {
									required: true,
									minlength: 4,
									letras: true
								}
							},
							messages: {
								empresa: "Este campo es obligatorio",
								correo: {
									required: "Este campo es obligatorio",
									email: "Ingrese un e-mail valido"
								},
								telefono: {
									required: "Este campo es obligatorio",
									digits: "Escriba solo numeros",
									minlength: "Minimo 6 dígitos",
									maxlength: "Maximo 10 dígitos"
								},
								nombre: {
									required: "Este campo es obligatorio",
									minlength: "Minimo 4 caracteres"
								}
							},
							submitHandler: function() {
								if ($('.form_popup').validate()) {
									correo = $('#correo').val();
									telefono = $('#telefono').val();
									nombre = $('#nombre').val();
									empresa = $('#empresa').val();
									$.ajax({
										type: "POST",
										cache: false,
										url: "<?=base_url()?>index/form_popup",
										// data		: $(this).serializeArray(),	
										data: {correo: correo, telefono: telefono, nombre: nombre, empresa: empresa},
										success: function(data) {
											$.fancybox(data);
										}
									});
									return false;
								}
							}

						});
					}
				});
			});
		</script>

		<script src="<?= base_url() ?>js/jquery.validate.js"></script>

		<!--  
		 <script src="<?= base_url() ?>js/jquery.validate.js"></script> 

		-->

		<style type="text/css">
			#popup_banner{
				width: 650px;
				min-width: 270px;
				height: auto;
				background: white;
			}
			.sibling{
				margin:5px;
				background:transparent;
				height:90%;
				width:95%;
				min-width: 200px;
				float:left;     
				/*border:1px solid black;*/
			}

			.clear{
				clear:both;
			}

			.logo_prov{
				min-width: 100px; 
				width: 160px;
				min-height: 40px;
				height: 60px;
			}

			.texto_1{
				text-align: center;
				font-weight: bolder;
				color: orange;
			}

			.texto_2{
				text-align: center;
				font-weight: bolder;
				color: black;
			}

			.texto_3{
				text-align: center;		
				color: gray;
				font-size: 10pt;
			}

			.texto_4{
				text-align: center;		
				color: gray;
				font-size: 9pt;
			}

			.text_email{
				color: orange;
			}

			.form_1 {
				float: left;
				background: transparent;
				margin: 2px;
				width: 35%;
				min-width: 100px;
				color: gray;
				text-align: right;
				margin-right: 5px;
				padding-top: 10px;
			}

			.form_2 {
				float: left;
				background: transparent;
				margin: 2px;
				width: 60%;
				min-width: 120px;
				padding-top: 10px;
			}

			.bnt_form {
				font-weight: bold;
				background: #2182DC;
				color: white;
				font-size: 10pt;
				width: 61%;
				border: none;
				height: 45px;
			}

			.campo{
				color: gray;
				font-size: 10pt;
				font-weight: bold;
			}

			.error {
				font-size: 8pt;
				color: orange;
				font-weight: bold;		
			}

			label:after {
				content:'';
			}
		</style>

		<!-- importaciones menu con subcategorias http://jqueryui.com/menu/ -->
		<link rel="stylesheet" href="<?= base_url() ?>css/subcat_jquery-ui.css">
		<script src="<?= base_url() ?>js/subcat_jquery-ui.js"></script>
		<link rel="stylesheet" href="<?= base_url() ?>css/estilossubcat.css">
		<script>
			$(function() {
				$("#menu").menu();
			});

			//ocultar la carga del menu y mostrarlo solo cuando ya este listo
			//por eso, #contenedor_ulmenu esta display:none por defecto y
			//aqui se cambia ese comportamiento
			$('#menu').ready(function() {
				$("#contenedor_ulmenu").css("display", "block");
			});
		</script>

		<!-- funcion poner en negrita primer letra c/categoria -->
		<script type="text/javascript">
			// 	//recorrer todos los LI de la lista UL #asideizquierdo (del aside izquierdo)
			// 	//de modo que al traer c/elemento, el sistema asigne al primer caracter una negrita <b>
			// 	//NOTA lo siguiente hace uso de jquery. por motivos tecnicos aparece este codigo aqui y no arriba al inicio 
			// 	//http://api.jquery.com/each/
			$(function() {
				$("ul.asideizquierdo li a").each(function(index) {
					console.log("indice.." + $(this).text());
					var valorOriginal = $(this).text(); //Selecc
					var primerLetra_va = valorOriginal.substring(0, 5); //S
					var valorRecortado = valorOriginal.substring(5); //elecc
					// console.log(valorOriginal + "/" + primerLetra_va + "/" + valorRecortado);
					$(this).html("<b>" + primerLetra_va + "</b>" + valorRecortado);
				});
			});
			// </script>

		<!-- importaciones pestañas 1 (banner rotator) -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="css/slideshow.css" type="text/css" media="screen" /> 
		<script type="text/javascript" src="js/jquery.cycle.js"></script>
		<script type="text/javascript" src="js/slideshow.js"></script>
		<script type="text/javascript" src="js/bannerRotator.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				bannerRotator('#bannerRotator', 500, 5000, true);
				//bannerRotator('#bannerRotator', 500000000000000000, 5000, true);
			});
		</script> 
		<link href="css/estilosbannerrotator.css" rel="stylesheet" type="text/css">
		<style>
			/* quitar el borde de las imagenes para IE */
			a img { border: none; }
		</style>
		<footer>
			<?php echo google_analytics('UA-56575808-1');  ?>
		</footer>
	</body>
</html>			