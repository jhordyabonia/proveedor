
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


		<!-- Etiquetas de posicionamiento -->

		<meta property="title" content="Proveedor.com.co"/>

		<meta name="Author" content="Script Media">

		<meta name="Subject" content="Ventas y compras al por mayor">

		<meta name="Language" content="Spanish">

		<meta name="description" content="Proveedor.com.co el portal donde compras y vendes al por mayor, todos los medios de pago">

		<meta name="keywords" content="proveedor.com.co, ventas,compras,portal de proveedores, portal proveedores, vendedores " />

		<meta http-equiv="keywords" content="proveedor.com.co, ventas,compras,portal de proveedores, portal proveedores, vendedores " />


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

		<br><br><br>
		<div class="container_12" align= "center">

			<div class="grid_1"> 

				<a href="#"> <img src="<?= base_url() ?>img/logo3.png" style="margin-left: -20px; margin-top: -7px;" /> 
				</a> 

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

										<input type="text" name="busqueda" id="cuadrobusqueda" placeholder="Buscar Productos, Proveedores y Productos Solicitados en Colombia"/> 

									</td>

									<td style="max-height: 40px;"> 

										<input type="submit" name="btn_busqueda"  id="btn_busqueda" value="" /> 

									</td>

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


						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->


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


						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

					</div> <!-- cierre div general -->

				</section>

			</article>


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

	</body>

</html>			