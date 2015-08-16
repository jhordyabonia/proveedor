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
				background-color: white;

				position:absolute;
				top: 25%;
				left:25%;

				display: center; 

				height: auto;

				min-height: 39px;

				border-radius: 3px; 

				border: 6px solid silver; 

			}



			/* estilos del select de arriba (dentro de un label) */

			#selec {

				height: 41px; 

				width: 90px; /* width: 104px; */ 

				border: none; 

				padding: 10px 10px 10px 1px;

				margin: 0;

				background: transparent;

				color: silver; /*gris el texto */

				outline:none;

				display: inline-block;

				-webkit-appearance:none;

				-moz-appearance:none;

				appearance:none;

				cursor:pointer;

				font-weight: bold;

			}



			.flechita {

				margin-right: 10px; 

				margin-left: 10px;

			}



			.flechita #selec {

				/* quitar la flecha de un select (para firefox, ie y otros) */

				-moz-appearance: none;

				appearance: none;

				text-indent: 0.01px;

				text-overflow: '';

				background-image: url("img/flechita_select.png");

				background-position: 87px 19px; /* background-position: 87px 17px; */

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

				color: gray;

				font-size: 13px;

			}



			#btn_busqueda {

				background: url('img/botonbusqueda.png'); 

				width: 140px; 

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

				margin-top: 120px;

				height: 50px;

				padding-left: 3px;

				border: 1px solid white;

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

				margin-left: 2px;

				margin-top: 110px;

			}

			#espacio3_2 {

				background-color:  #f3f3f4;

				margin-top: -70px;
				margin-left: 70%;

				height: 0px;

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
				margin-left: 15%; 

				height: auto;

				width: 1015px;

			}

			#espacio4_2 {

				background-color:  transparent;

				margin-top: -1px;

				margin-left: 2%;

				height: 144px;

				width: 480px;

				padding-left: 3px;

				border: 3px solid #f3f3f4;

				padding-right: 2px;

			}



			#espacio4_3 {

				background-color:  transparent;

				margin-top: -149px;

				margin-left: 53%;

				height: 144px;

				width: 480px;

				padding-left: 3px;

				border: 3px solid #f3f3f4;

				padding-right: 2px;

			}



			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

			/* APARTADO ULTIMOS PRODUCTOS SOLICITADOS / ULTIMOS PRODUCTOS PUBLICADOS / PUBLICIDAD */

			#ultimosproductos_sol_publi {

				background-color: transparent; 

				margin-top: 20px;
				margin-left: 16%; 

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

				margin-left: 2%;


			}

			#titulo_emp_patrocinadoras {

				width: 22%;

			}

			#estilos_logos_emp_patrocinadoras {

				vertical-align: middle; 

				
				padding: 20px 150px 20px 40px;

				width: 180px;

				height: 92px;

			}

			#estilos_espacio_emp_patrocinadoras {

				vertical-align: middle; 

				border: 4px solid #f3f3f4; 

				padding: 8px 8px 8px 8px;

				width: 180px;

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

<body>
<div class="sibling">

		<img src="<?= base_url() ?>img/logo3.png" class="logo_prov"style="margin: 10px 20px 5px 22%; float: left;" />

			</div>

			 

			    <td height="auto" style="padding-right: 80px;">

						        <a href="<?= $publicar_of ?>" <?= @$clase_css ?>> 

									
									<img src="<?= base_url() ?>img/boton_oferta.png" style="margin: 10px 20px 5px 10px; float: right;" /> </a>

									</td>
									<td height="auto">

										<a href="<?= $publicar_prod ?>" <?= @$clase_css ?>> 

											<img src="<?= base_url() ?>img/boton_producto.png"style="margin: 10px 20px 5px 10px; float: right;" /> </a>

									</td>


				<div id="bannerNav" style="display: none; visibility: hidden;"> </div> <!-- las opciones estan en js/bannerrotator.js -->

					<div id="bannerRotator"	style="height: 254px; margin: 0;">
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
															<ul>

																<li rel="1" style="display: block;">

																	<a href="#"> <img style="width: 100%; max-width: 100%; height: 254px; margin-top: -7px;" 

																					  src="<?= base_url() ?>img/01_Registrese4.png" class="fotos_img"> </a>

																</li>

																<li rel="2" style="display: none;">

																	<a href="#"> <img style="width: 100%; max-width: 100%; height: 254px; margin-top: -7px;" 

																					  src="<?= base_url() ?>img/02_publique2.png" class="fotos_img"> </a>

																</li>

																<li rel="3" style="display: none;">

																	<a href="#"> <img style="width: 100%; max-width: 100%; height: 254px; margin-top: -7px;" 

																					  src="<?= base_url() ?>img/03_solicite2.png" class="fotos_img"> </a>

																</li>


															</ul>

														</div>


  

													</td>



												</tr> 
											</tbody>

										</table>

									</div> </div>

							</div> </div>



						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

						<!-- APARTADO ESPACIO PUBLICITARIO DEBAJO DE LA VENTANA DE TABS -->

						
						</div>
						<div class="sibling"id="espacio3">

		<img src="<?= base_url() ?>img/plujaveriana.png" class="logo_prov" />

			</div>
			<div class="sibling"id="espacio3_2">

			<a href="<?= base_url() ?>registro/registro_usuario"> 

									<img src="<?= base_url() ?>img/registrate.png" style="margin: 14px 0px 15px 26px;"/> </a>
              </div>
								
 <div id="espacio_2" class="grid_2 alpha">
 	 <img src="<?= base_url() ?>img/categoria.png"> </img>
         <a href="<?=base_url()?>logueo"> <img src="<?= base_url() ?>img/12.png"> </img> </a>
        <a href="<?=base_url()?>logueo"><img src="<?= base_url() ?>img/22.png"> </img></a>
        <a href="<?=base_url()?>registro/registro_usuario"><img src="<?= base_url() ?>img/32.png"> </img></a>
        <a id="inline" href="<?=base_url()?>index#popup_banner"><img src="<?= base_url() ?>img/42.png"></a>
    </div>

</div>

						<!-- APARTADO PRODUCTOS DESTACADOS -->

						<div class="grid_2 alpha" id="productosplus">

							<div id="titulo" style="padding: 10px 10px 10px 0px;">

								<p style="color: #ff7f27; font-weight: bold; margin-left: 22%;"><img src="<?= base_url() ?>img/producto destacado.png"> </img></p> 

								<div style="width: 168px; background: transparent; height: 21px; margin-left: 846px; margin-top: -14px; margin-bottom: -4px;">

								  <p style="font-weight: bold;font-size: 14px; margin-top: -24px; margin-right: -11px;">

									

								</div>

							</div>

							<!-- importaciones pestañas 2 -->

							<script src="<?= base_url() ?>js/billy.carousel.jquery.min.js" type="text/javascript"></script>

							<link rel="stylesheet" href="<?= base_url() ?>css/demonstration.css" type="text/css" media="screen" />

							<script type="text/javascript">

			$(document).ready(function() {

				// ----- Carousel

				$('#billy_scroller').billy({

					slidePause: 10000,

					
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

										
										<style type="text/css">

											.c_prodplus {

												padding-left: 25%;

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

												max-width: 180px;

												height: auto;

												max-height: 55px;

												vertical-align: middle;

											}

											.c_prodplus_divgen {

												
												width: 198px;

												max-width: 200px; 

												min-width: 20px; 

												height: 308px;

												min-height: 50px;

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






							<div id="titulo" style="padding: 10px 10px 10px 10px;">

								<table style="width: 100%; height: auto;"> <tr> 

									
									</tr> </table>

		</div> 

						</div>



<!-- APARTADO PRODUCTOS PATROCINADOS -->

						<div class="grid_2 alpha" id="productospatrocinados">

							<div id="titulo" style="padding: 10px 10px 10px 8px;">

								<table style="width: 100%; height: auto;"> <tr>

										<td style="width: 22%;"><img src="<?= base_url() ?>img/producto patrocinado.png"> </img></p> 



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

																				

																					</p> </td> 

																				<td width="auto"> <img src="<?= base_url() ?>img/ultimo solicitado.png" /> </td> </tr>

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

																				

																					</p> </td> 

																				<td width="auto"> <img src="<?= base_url() ?>img/ultimo p publicado.png" /> </td> </tr>

																			<tr> <td style="padding: 18px 0px 0px 52px;"> <a href="#"> Ver Todas </a> </td> </tr>

																		</table>

																	</div>

																	<div id="contenido"> 

																		<!-- Contenido de ultimas ofertas de compra -->

																		<?php echo $this->load->view($contenido_publicados) ?>

																	</div>

																</td>


																
															</tr> </table>

													</td> </tr> </table> </td>

									</tr> </table>

							</div>

						</div>



<div class="grid_2 alpha" id="apartadoE">

	<div id="titulo" style="padding: 10px 10px 10px 10px;">

			<table style="width: 100%; height: auto;">

					<tr> <td id="titulo_emp_patrocinadoras"> 

								<p style="color: #ff7f27; font-weight: bold; font-size: 15px;">  <img src="<?= base_url() ?>img/empresas patrocinador.PNG" /> </p> </td> 

				
								</table>

	 </div> 

		
		        </div>


<div id="contenido" style="padding: 20px 10px 20px 10px">

		  <div style="width: auto; height: auto; float: left; margin-top: -13px; margin-left: 20px;">

			

				

						  <div id="estilos_logos_emp_patrocinadoras" style="margin-right: 1px; float: left; margin-top: 15px;">

								<center> <a href="#"> <img src="<?= base_url() ?>img/publi5.PNG" /> </a> </center>

						    </div>

					<div id="estilos_logos_emp_patrocinadoras" style="margin-right: 2px; float: left; margin-top: 15px;">

										<center> <a href="#"> <img src="<?= base_url() ?>img/publi5.PNG" /> </a> </center>

			</div>

									<div id="estilos_logos_emp_patrocinadoras" style="margin-right: 15px; float: left; margin-top: 15px;">

										<center> <a href="#"> <img src="<?= base_url() ?>img/publi5.PNG" /> </a> </center>

		                            </div>

	                </div>




</body>

