<!DOCTYPE html>

<html lang = "es">
  	<head>
  		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />

		<meta charset="UTF-8">

		<title>BÃºsqueda / PROVEEDOR.com.co</title>

		<link rel="stylesheet" href="<?=base_url()?>css/960.css" />

		<link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css" />

		<link rel="stylesheet" href="<?=base_url()?>css/reset.css" />

		<link rel="stylesheet" href="<?=base_url()?>css/listados/estilosheader.css" />

     	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

     	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />

     	<!--[if lte IE 7]><meta http-equiv="X-UA-Compatible" content="chrome=1"><![endif]-->

     	<link rel="stylesheet" href="<?=base_url()?>css/listados/reset.css" type="text/css" media="screen" />

     	<link rel="stylesheet" href="<?=base_url()?>css/listados/style.css" type="text/css" media="screen" />



     	<?php $url = base_url(); ?> <!-- En esta variable php se guarda el dominio de la url y se utiliza en la funcion pageselectCallback -->



     	<!-- importaciones sistema de paginacion -->

      <link rel="stylesheet" href="<?=base_url()?>css/listados/pagination.css" />

		<script type="text/javascript" src="<?=base_url()?>js/jquery-1.9.1.js"> </script>

		<script type="text/javascript" src="<?=base_url()?>js/listados/jquery.pagination.js"> </script> 



		<!-- Variable enviada desde el controlador, para reemplazar en el script dependiendo de la  -->

		<!-- busqueda la pagina abrira la pestaÃ±a 1,2 o 3 -->

		<script type="text/javascript">

			// script para las pestaÃ±as

			$(document).ready(function() {

				$("#content div").hide(); // Initially hide all content

				$("#tabs li<?php echo $li ?>").attr("id","current"); // Activate first tab

				$("#content <?php echo $div ?>").fadeIn(); // Show first tab content

			    

			    $('#tabs a').click(function(e) {

			        e.preventDefault();        

			        $("#content div").hide(); //Hide all content

			        $("#tabs li").attr("id",""); //Reset id's

			        $(this).parent().attr("id","current"); // Activate this

			        $('#' + $(this).attr('title')).fadeIn(); // Show content for current tab

			    });

			});

		</script>



		<!-- <script type="text/javascript"> 

		///array con productos traidos desde la bd

		</script>-->

<?php 

	echo '

	<script type="text/javascript">

	var productos = [';

	if($productos){

	foreach (@$productos as $value) { 

	echo'

	["uploads/resize/'.@$value->nombre_img.'", "'.@$value->nom_producto.'",

	    "'.@$value->precio_unidad.'", "'.@$value->pedido_min.' unidades pedido mÃ­nimo",

	    "'.nl2br(substr(@$value->descripcion_producto, 0, 76)).'...",

	    "1", "'.@$value->nombre.'", 

	    "", "'.@$value->ubicacion.'", 
	    "<br> <br>",
	    "", "", 

	    "Marca: ", "Pvor", 

	    "Ciudad: ", "'.@$value->ciudad.'",

	    "'.@$value->id_usuario.'", "'.@$value->id_producto.'",

	    "'.@$value->nit.'"],';

	}

}

//echo var_export($productos);  
//die();

	echo '];



	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//formato de los elementos de la pestaÃ±a "proveedores"

// imgP, tituloP, 

// rutaImgP1, descImgP1

// rutaImgP2, descImgP2

// rutaImgP3, descImgP3

// certificado (1 o 0), ciudad 

// prodP1, prodP2, prodP3, prodP4, prodP5



var proveedores = [';

if($proveedor){

foreach (@$proveedor as $value) { 
echo'

	["uploads/resize/logos/'.@$value->logo.'", "'.@$value->nombre.'",

	"uploads/resize/'.@$value->nombre_img.'", "'.@$value->nom_producto.'",

	"uploads/resize/'.@$value->nombre_img.'", "'.@$value->nom_producto.'",

	"uploads/resize/'.@$value->nombre_img.'", "'.@$value->nom_producto.'",

	"1", "'.@$value->ciudad.'",

	"Maquinaria", "Trituradoras", "Despulpadoras", "Maquinaria para trigo", "Papas",

	"'.@$value->nit.'","'.@$value->id_usuario.'",

	"'.@$value->id_producto.'","'.@$value->tipo_empresa.'"],

	';

	}

}	

echo '];



//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//formato de los elementos de la pestaÃ±a "ofertas de compra"

// imgO, tituloO, 

// descripcion

// textoCantidad, textoPrecio, textoCiudadEnt

// empresa, certificado (1 o 0)

var ofertas = [';

if($ofertas){

foreach (@$ofertas as $value) { 

echo'

	["uploads/resize/'.@$value->nombre_img.'", "'.@$value->nom_producto.'",

	"'.@$value->descripcion.'",

	"'.@$value->cantidad_requerida.' unidades", "'.@$value->precio.' por unidad", "'.@$value->lugar_entrega.' - ",

	"Empresa de prueba S.A.S.", "0",

	"'.@$value->nit.'", "'.@$value->id_usuario.'"],

';

}

}

echo '

];

	</script>

	';

 ?>







		

		

		<!-- paginacion #1 -->

		<script type="text/javascript" src="<?=base_url()?>js/listados/formato_tabs.js"></script>



		<!-- importaciones para las tabs -->

		<link href='<?=base_url()?>css/listados/estilostabs.css' rel='stylesheet' type='text/css' />

		<!-- <script type="text/javascript" src="js/jstabs.js"> </script>  -->



		<!-- estilos css generales -->

		<style type="text/css">

			/* cuerpo */

				html, body {

					font-family: Arial;

					/* desaparece scroll horizontal en IE y otros */

					overflow-x: hidden;

					overflow-y: auto;

					height: auto;

				}



				a {

					text-decoration: none !important;

				}



				.container_12{

					background:#FFFFFF;

					height: auto;

					width: 1265px; /*width: 1346px;*/

					max-width: 1346px;

					margin-top: 0px;

					margin-left: center;

					margin-right: center;

				}



			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

			/* contenedores generales */

				.grid_1{

					background: yellow;

					height: 50px;

					width: 225px;

				}



				.grid_2{

					background: red;

					height:300px;

					width: 100%;

				} 



				.grid_4{

					background: #ffffff;

					height:512px;

					margin:12px 12px;

					width: 300px;

				}



		 	/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

			/* header 1 */

				#ha {

					width: 1338px;

					max-width: 1338px;

					height:31px;

					background:#FFFFFF;

					margin: -0.1em 0 0 -0.6em;

				}

				#ha_iframe {

					width: 100%; 

					height: 60px;

				}



		 	/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

			/* header 2: conjunto barra de busqueda e imagenes de publicar */

				#he {

					margin-top: 1.7em;

					width: auto;

					margin-left: -14px;

					background: transparent;

				}



				#barra {

					/* estilos de la barra de busqueda de arriba (tabla) */

					width: auto;

					display: block; 

					height: auto;

					min-height: 39px;

					border-radius: 3px; 

					/* border: 2px solid #005e9b; */ border: 2px solid #818181;

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

		    		background-image: url("../../img/flechita_select.png");

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

					background: url('../../img/botonbusqueda.png'); 

					width: 65px; 

					height: 41px; 

					cursor: pointer; 

					border: none;

					display: block;

					margin-bottom: -1px;

					background-position: center;

				}



				@media screen and (-webkit-min-device-pixel-ratio:0) {

					select {padding-right:10px}

				}



			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

			/* div donde va el contenido principal (fotos) de la pagina (inicio del contenido) */

				#div2 { /* contorno */

					height: auto;

		         width: 1234px;

		         background: transparent;

		         margin-bottom: -17px;

		         margin-left: 0.8em;

					margin-top: 1.5em;

					margin-bottom: 1em;
					display: none;

				}



				#margen { /* fondo */

					height: auto;

					max-height: 310px;

					background: transparent;

					width: 1232px;

					margin: 0;

					border: 1px solid #F3F3F4;

				}



				/* pestaÃ±a productos */

				#tablita_principal {

					margin: 39px 0px 0px 15px;

					margin-top: -10px;

				}



				.imagenes_PE {  /* imagenes */

					width: auto; 

					max-width: 169px;

					height: auto;

					max-height: 113px;

					vertical-align: middle;

				}



				/* c/empresa tablita proveedores */

				.estilos_logos_emp_patrocinadoras { 

					vertical-align: middle; 

					border: 4px solid #f3f3f4; 

					padding: 8px 8px 8px 8px;

					width: 168px;

					height: 68px;

				}

				.estilos_logos_emp_patrocinadoras img {

					height: auto;

					max-height: 64px;

					width: auto;

					max-width: 160px;

				}





				  

				#hi{

					height: 4.34em;

					width: 225px;

					background:#FFFFFF;

					margin-top: 0.78em;

					margin-left: 6px;

				}



				#titulito{

					width: auto;

					height: 20px;

					background: transparent;

					margin-top: 0.4em;

					margin-left: 0; /*margin-left: 657px;*/

					display: none;

					float: right;

				}



				 #espacio{

					  width: 1280px;

					  max-width: 1280px;

					  height:2px;

					  background:#aaaaaa;

				 }



			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

			/* div que maneja el panel izquierdo de la pagina */

				#div1 {

					height: auto;

					width: 206px;

					font-size: 13px;

					background-color: transparent; /*background-color: #f7f7f7;*/

					visibility: hidden;

				}

					 

					  

				#div3{

					height: auto;

					width: 63em;

					background: #ffffff;

					/*border: 1px solid red;*/

					margin-left: 0;

				}



				  #div4{

					height: 81px;

	                width: 1207px;

				 }

				 #titulo{

					margin-top:0px;

					color:#07a9ea;

					font-size:22px;

					font-family: arial;

				 }

				 #letras{

					color:black;

					font-size:17px;

					font-family: arial;

					margin-left:38px;

				 }

					 #enviar{

					 border: 0px #636369 solid;

					 color: #FFFFFF;

					 background-color: #FFB800;

					 margin-top: 0px;

					 margin-left: 0px;

					 height: 51px;

					 width: 137px;

					 max-width: 137px;

					 font-size:17px;

				 }



			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

			/* footer */

				#footer {

					margin: 0;

					height: auto; 

					width: 100%; /*width: 1366px; */

					background: #f2f2f2;

				}



				#footer_iframe {

					width: 96%; 

					margin-left: 0px;

					height: 21em;

				}



			#titulo_cont {

				font-family: 'Arial Rounded MT', Arial, sans-serif; 

				font-size: 21px; 

				margin-bottom: 0.5em; 

				font-weight: bold;

			}

			#subtitulo_cont {

				font-size: 12px; 

				margin-bottom: 1.5em; 

				color: #7f7f7f; 

				width: 54em;

			}



			#preg_satis {

				margin: 3em 0 0; 

				width: 63em; 

				height: auto; 

				background:#ffffff;

			}

		</style>



		<!-- estilos css para resoluciones 1024 -->

		<style type="text/css">

			@media screen and (max-width: 1024px) {

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* header 1 */

					#ha_iframe {

						margin-left: -235px;

					}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* header 2: conjunto barra de busqueda e imagenes de publicar */

					#cuadrobusqueda {

						width: 250px;

					}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* div donde va el contenido principal (fotos) de la pagina (inicio del contenido) */

					#div2 { /* contorno */

			         margin-left: 3px;

			         width: 994px;

					}



					#margen { /* fondo */

						width: 992px;

						padding-left: 4px;

					}



					/* pestaÃ±a productos */

					#tablita_principal {

						margin: 0px 0px 0px 0px;

					}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* div que maneja el panel izquierdo de la pagina */

					#div1 {

						display: none;

					}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* footer */

					#footer {

						width: 100%;

						margin: 0;

					}



					#footer_iframe {

						width: 100%;

						height: 21em;

					}

			}

		</style>



		<!-- determinar la pestaÃ±a pulsada -->

		<!-- y con base en ella cambiar el contenido de -->

		<!-- div donde va el contenido principal (fotos) de la pagina -->

		<!-- http://stackoverflow.com/questions/6365255/jquery-onclick-event-for-li-tags -->

		<!-- nota: dentro del innerhtml todo debe ir SIN indentar -->

		<script type="text/javascript">

			$(document).ready(function() {

				$("ul.tabs li a").click(function(e) {

					if ($(this).attr("title") == "Productos") {

						$('#tab1').css('display', 'block');

						$('#margen').css('display', 'block');

						$('#preg_satis').html('<div style="text-align: center; margin-bottom: 1.5em;">' 

							+ '<p style="font-weight: bold; color: black; font-size: 15px; font-family: Arial, sans-serif;">'

							+ 'Â¿No encontraste lo que estabas buscando? </p> </div>' 

							+ '<div style="text-align: center;"> <a href="#">' 

							+ '<img src="<?=base_url()?>img/boton_oferta.png"> </a> </div>');

						$('#titulo_cont').html('Venta al por mayor de cobre en Colombia -'

							+ 'Precio y catÃ¡logo de productos');

						$('#subtitulo_cont').html('Se muestra a continuaciÃ³n el catÃ¡logo de productos al '

							+ 'por mayor de venta de <b> cobre </b>. Encuentre proveedores que venden, '

							+ 'suministran o distribuyen <b> cobre </b> en Colombia al mejor precio '

							+ 'en Proveedor.com.co');

					} else if ($(this).attr("title") == "Proveedores") {

						$('#tab2').css('display', 'block');

						$('#margen').css('display', 'none');

						$('#preg_satis').html('<center> <div style="width: 45em;"> <div style="float: left;">'

							+ '<div style="text-align: center; margin-bottom: 1em;">'

							+ '<p style="font-weight: bold; color: black; font-size: 15px; font-family: Arial, sans-serif;">'

							+ 'Â¿No encontraste lo que estabas buscando? </p> </div>' 

							+ '<div style="text-align: center; line-height: 60px;"> <a href="#">'

							+ '<img src="<?=base_url()?>img/boton_oferta.png" style="vertical-align: middle;"> </a>'

							+ '</div> </div> <div style="float: right;">'

							+ '<div style="text-align: center; margin-bottom: 1em;">'

							+ '<p style="font-weight: bold; color: black; font-size: 15px; font-family: Arial, sans-serif;">'

							+ 'Â¿Quiere aparecer en este listado? </p> </div> <div style="text-align: center;">'

							+ '<a href="#">'

							+ '<img src="<?=base_url()?>img/reg_empresa.png"> </a>'

							+ '</div> </div> </div> </center>');

						$('#titulo_cont').html('Proveedores mayoristas de cobre en Colombia');

						$('#subtitulo_cont').html('Encuentre empresas y proveedores de <b>cobre</b> '

							+ 'en Colombia. Compare entre comercializadoras, distribuidoras y '

							+ 'fabricantes que ofrecen <b>cobre</b> a precios de mayorista '

							+ 'en Proveedor.com.co');

					} else if ($(this).attr("title") == "Compradores") {

						$('#tab3').css('display', 'block');

						$('#margen').css('display', 'none');

						$('#preg_satis').html('<center> <div style="width: 45em;"> <div style="float: left;">'

							+ '<div style="text-align: center; margin-bottom: 1em;">'

							+ '<p style="font-weight: bold; color: black; font-size: 15px; font-family: Arial, sans-serif;">'

							+ 'Â¿Quiere conseguir mÃ¡s clientes? </p> </div>' 

							+ '<div style="text-align: center; line-height: 60px;"> <a href="#">'

							+ '<img src="<?=base_url()?>img/boton_producto.png" style="vertical-align: middle;"> </a>'

							+ '</div> </div> <div style="float: right;">'

							+ '<div style="text-align: center; margin-bottom: 1em;">'

							+ '<p style="font-weight: bold; color: black; font-size: 15px; font-family: Arial, sans-serif;">'

							+ 'Â¿Quiere aparecer en este listado? </p> </div> <div style="text-align: center;">'

							+ '<a href="#">'

							+ '<img src="<?=base_url()?>img/reg_empresa.png"> </a>'

							+ '</div> </div> </div> </center>');

						$('#titulo_cont').html('Compradores de cobre en Colombia - '

							+ 'Demanda de productos al por mayor');

						$('#subtitulo_cont').html('Encuentre compradores de <b>cobre</b> '

							+ 'en Colombia al por mayor en el siguiente listado. '

							+ 'Contacte posibles clientes interesados que demandan Ã©ste producto '

							+ 'al por mayor.');

					}

				});

			});

		</script>

  	</head>

	<body>

		<div class="container_12">

			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

			<!-- HEADER -->

			<div class="grid_1" id="ha">

				<!-- <iframe src="<?=base_url()?>header" scrolling="no" id="ha_iframe"></iframe> -->

				<iframe src="<?=base_url()?>css/listados_header2_1.php" scrolling="no" id="ha_iframe" style="margin-top: 0.7em;"></iframe>

			</div>

			<div class="grid_1" id="hi"> <a href="<?=base_url()?>index">

			 <img src="<?=base_url()?>img/logo3.png" /> </a> </div> 



			<div class="grid_1" id="titulito">

           	<b style="font-size: 12px; color:#7f7f7f;">Â¡Publica Gratis tus Productos y tus Solicitudes de Productos!</b>

	      </div>



			<div class="grid_1" id="he">

				<table height="auto" width="auto">

					<tr>

						<td style="height: auto; padding-right: 8px;">

							<?=form_open(base_url().'listado/validar')?>  <!--Formulario de busqueda que dirige a la vista de listado -->

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

							<?=form_close()?>

						</td>

						<td style="height: 50px;">

							<table width="auto" height="auto">

								<tr>

									<td height="auto" style="padding-right: 8px;">

										<a href="#" <?=@$clase_css?>> 

											<img src="<?=base_url()?>img/boton_oferta.png" /> </a>

									</td>

									<td height="auto">

										<a href="#" <?=@$clase_css?>> 

											<img src="<?=base_url()?>img/boton_producto.png" /> </a>

									</td>

								</tr>

							</table>

						</td>

					</tr>

				</table>

			</div>



			<div class="clear"> </div>



			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

			<!-- CONTENIDO -->

		 	<article> <section>

				<!-- div donde va el contenido principal (fotos) de la pagina -->

				<div class="grid_4" id="div2">

					<div class="grid_4" id="margen">

						<!-- por defecto aparecen los elementos de la primer pestaÃ±a -->

						<!-- div donde va el contenido principal (fotos) de la pagina / titulo -->

						<div class="grid_4" style="margin-top: 3px; margin-left: 3px; width: 434px; height: 30px; background: transparent;">

							<p style="font-weight: bold; font-family: 'Arial Rounded MT', Arial, sans-serif; font-size: 15px; margin-top:7px; margin-left: 17px;"> 

								Productos Destacados </p>

						</div>

						<!-- div donde va el contenido principal (fotos) de la pagina / fotos -->

						<div class="grid_4" style="width: auto; height: auto; margin: 13px 0px 0px 2px;">

							<table id="tablita_principal"> 

								<tr> 

								<!-- div 1 (foto1)-->

								<?php  foreach ($p_especiales as $row): ?>

								<td style="width: 210px; height: auto;"> 

									<center> <table>

										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> 

												<img src="<?=base_url()?>uploads/resize/<?=$row->nombre_img?>" class="imagenes_PE"/></a>

										</td> </tr>

										<tr> <td style="padding-bottom: 7px;"> </td> </tr>



										<tr> <td style="width: 100%; height: 40px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> 

												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 

													<?=$row->nom_producto; ?> </p> </a>

											</div>

										</td> </tr>



										<!-- <tr> <td style="padding-bottom: 10px;"> </td> </tr>

										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">

											<center> <table> <tr>

												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>

												<td style="vertical-align: middle;"> <table>

													<tr> <td> 

														<center> <p style="font-weight: bold; font-size: 17px; color: black;"> 

														<?= $row->precio_unidad; ?> </p> </center> </td>

													</tr>

													<tr> <td> 

														<center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> 

													</td>

													</tr>

												</table> </td>

											</tr> </table> </center>

										</td> </tr>



										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">

											<img src="<?=base_url()?>img/certificado.png" style="margin-top: -6px; margin-left: 12px;" />

										</td> </tr> -->

									</table> </center>

								</td>

								<td style="padding-right: 25px;"> </td>

								<?php endforeach; ?> 

								</tr>

							</table>

						</div>

					</div>

				</div>



				<!-- div que maneja el panel izquierdo de la pagina-->

				<div class="grid_4" id="div1">

					<STYLE TYPE="text/css"> #div1 a { text-decoration: none; } </STYLE>

					<!-- div que maneja el panel izquierdo de la pagina / category -->

				   <div class="grid_4" style="width: 198px; height: auto; background: #fff; padding: 5px 0px 5px 0px; margin: 0 0 1em 0; border: 4px solid #f7f7f7;">

				      <b style="margin-left:12px; font-size:13px;"> CategorÃ­as </b>

				      <ul style="margin: 0.5em 0 0.4em 0; line-height: 2.3em;">

							<li type="disc" style="margin-left: 30px; color: gray;"> 

								<a href="#" style="color: blue"> MinerÃ­a y Metalurgia <font style="color:gray; font-size: 11px;"> (100) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray;">

								<a href="#" style="color: blue"> Maquinaria y Equipo <font style="color:gray; font-size: 11px;"> (50) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray;">

								<a href="#" style="color: blue"> Productos quÃ­micos <font style="color:gray; font-size: 11px;"> (30) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray;">

								<a href="#" style="color: blue"> Equipos para servicios <font style="color:gray; font-size: 11px;"> (20) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray;">

								<a href="#" style="color: blue"> EnergÃ­a <font style="color:gray; font-size: 11px;"> (10) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray;">

								<a href="#" style="color: blue"> ElectrodomÃ©sticos <font style="color:gray; font-size: 11px;"> (5) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray;">

								<a href="#" style="color: blue"> ConstrucciÃ³n <font style="color:gray; font-size: 11px;"> (3) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray;">

								<a href="#" style="color: blue"> FerreterÃ­a <font style="color:gray; font-size: 11px;"> (1) </font> </a> </li>

                  </ul>

						<a href="#" style="margin-left: 30px; color: blue; font-size: 13px; font-weight: bold;"> 

							Ver todas <img src="../../img/flechita_select_black.png" style="vertical-align: middle;"> </a>

				   </div>

				   <!-- div que maneja el panel izquierdo de la pagina / type -->

				   <div class="grid_4" style="width: 198px; height: auto; background: #fff; padding:5px 0px 5px 0px; margin: 0 0 1em 0; border: 4px solid #f7f7f7;">

                  <b style="margin-left:12px; font-size:13px;"> Ciudades </b>

                  <ul style="margin: 0.8em 0 0.8em 0;">

                  	<a href="#" style="margin: 0 0 0 12px; color: blue; font-size: 13px; font-weight: bold;"> Cundinamarca </a>

                  	<li type="disc" style="margin-left: 30px; color: gray;"> 

								<a href="#" style="color: blue"> BogotÃ¡ <font style="color:gray; font-size: 11px;"> (<?= @$bogota;?>) </font> </a> </li>

                  </ul>

                  <ul style="margin: 0.8em 0 0.8em 0;">

                  	<a href="#" style="margin: 0 0 0 12px; color: blue; font-size: 13px; font-weight: bold;"> Antioquia </a>

                  	<li type="disc" style="margin-left: 30px; color: gray;"> 

								<a href="#" style="color: blue"> MedellÃ­n <font style="color:gray; font-size: 11px;"> (<?= @$medellin;?>) </font> </a> </li>

                  </ul>

                  <ul style="margin: 0.8em 0 0.8em 0;">

                  	<a href="#" style="margin: 0 0 0 12px; color: blue; font-size: 13px; font-weight: bold;"> Valle del Cauca </a>

                  	<li type="disc" style="margin-left: 30px; color: gray;"> 

								<a href="#" style="color: blue"> Cali <font style="color:gray; font-size: 11px;"> (<?= @$cali;?>) </font> </a> </li>

                  </ul>

						<a href="#" style="margin-left: 12px; color: blue; font-size: 13px; font-weight: bold;"> 

							Ver todos <img src="../../img/flechita_select_black.png" style="vertical-align: middle;"> </a>

				   </div>

				   <!-- div que maneja el panel izquierdo de la pagina / precio -->

				   <div class="grid_4" style="width: 198px; height: auto; background: #fff; padding: 5px 0px 5px 0px; margin: 0 0 1em 0; border: 4px solid #f7f7f7;">

				      <b style="margin-left:12px; font-size:13px;"> Precio </b>

				      <ul style="margin: 0.5em 0 0.4em 0; line-height: 2.3em;">

							<li type="disc" style="margin-left: 30px; color: gray; line-height: 1.5em; margin: 1em 0 1em 30px;"> 

								<a href="#" style="color: blue"> $10.000 o menos <font style="color:gray;"> (10) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray; line-height: 1.5em; margin: 1em 0 1em 30px;">

								<a href="#" style="color: blue"> Entre $10.000 y $50.000 <font style="color:gray; font-size: 11px;"> (10) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray; line-height: 1.5em; margin: 1em 0 1em 30px;">

								<a href="#" style="color: blue"> Entre $50.000 y $100.000 <font style="color:gray; font-size: 11px;"> (10) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray; line-height: 1.5em; margin: 1em 0 1em 30px;">

								<a href="#" style="color: blue"> Entre $100.000 y $150.000 <font style="color:gray; font-size: 11px;"> (10) </font> </a> </li>

							<li type="disc" style="margin-left: 30px; color: gray; line-height: 1.5em; margin: 1em 0 1em 30px;">

								<a href="#" style="color: blue"> Entre $1.000.000 y $20.000.000 <font style="color:gray; font-size: 11px;"> (10) </font> </a> </li>

                  </ul>

						<a href="#" style="margin-left: 30px; color: blue; font-size: 13px; font-weight: bold;"> 

							Ver todas <img src="../../img/flechita_select_black.png" style="vertical-align: middle;"> </a>

				   </div>

				   <!-- div que maneja el panel izquierdo de la pagina / ads -->

					<div class="grid_4" style="margin: 0 0 1em 0; width: 205px; height: auto; background: #FFFFFF;">

						<center> <a href="#"> <img src="<?=base_url()?>img/publi.png" /></a> </center>

					</div>

				</div> 



				<!-- div que maneja el cuerpo principal de la pagina-->

				<div class="grid_4" id="div3">

					<!-- div de informacion (dinamico, cambia segun la pestaÃ±a seleccionada) -->

					<!-- breadcrumbs, titulo, subtitulo -->

					<div class="grid_2 alpha" style="width: 63em; height: auto; background: white;">

						<p style="font-size: 12px; margin-bottom: 0.5em;">

							<a href="#" style="color: blue;"> Proveedor Regional </a> &#62;

							<a href="#" style="color: blue;"> Productos de Colombia </a> &#62;

							<a href="#" style="color: #ff7f27; font-family: 'Arial Rounded MT', Arial, sans-serif; font-weight: bold;"> Resultados de Cobre </a>

							<a style="color: blue;"> (675) </a>

						</p>

						<p id="titulo_cont">

							Venta al por mayor de cobre en Colombia - Precio y catÃ¡logo de productos

						</p>

						<p id="subtitulo_cont">

							Se muestra a continuaciÃ³n el catÃ¡logo de productos al por mayor de venta 

							de <b> cobre </b>. Encuentre proveedores que venden, suministran o 

							distribuyen <b> cobre </b> en Colombia al mejor precio

							en Proveedor.com.co

						</p>

					</div>



					<!-- div que maneja el sistema de pestaÃ±as -->

					<!-- agrupar: contenedor 1 y 2, publicidad y paginacion -->

					<div class="grid_2 alpha" style="width: 63em; height: auto; background: white;">

						<!-- pestaÃ±as -->

						<ul id="tabs" class="tabs" style="height: 32px; font-size: 13px;">

						   <li> <a href="#" class="tab1" title="Productos"> Productos </a> </li>

						   <li class="tab2"> <a href="#" title="Proveedores"> Proveedores </a> </li>

						   <li class="tab3"> <a href="#" title="Compradores"> Compradores </a> </li>   

						</ul>

						<div id="content" style="padding: 0; height: 1498px; /*height: 1703px;*/ width: 63em;">

							<!-- pestaÃ±a 1 -->

							<div id="tab1">

								<!-- contenedor 1 -->

						      <div class="grid_2 alpha" style="height: 32px; background:#f7f7f7; width: 100%; font-size: 13px;">

									<h1 style="display: none !important; float: left; font-size: 13px; margin-top: 8px; margin-left: 27px; color: #7f7fa7; font-weight: bold;"> Ciudad: </h1>

									<form style="display: none !important; margin: 0.4em 0 0 0.8em; float: left;">

										<input type="radio" name="ciudad" value="Bogota" style="height: 15px; width: 15px; vertical-align: text-bottom;"> 

											BogotÃ¡ <b style="color:#4accef; font-weight: 500;"> (88)</b>

										<input type="radio" name="ciudad" value="Cali" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">

											Cali<b style="color:#4accef; font-weight: 500;"> (44)</b>

										<input type="radio" name="ciudad" value="Medellin" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">

											MedellÃ­n<b style="color:#4accef; font-weight: 500;"> (12)</b>

										<input type="radio" name="ciudad" value="Otras" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">

											Otras ciudades<b style="color:#4accef; font-weight: 500;"> (6)</b>

									</form>

								</div>



								<!-- contenedor 2 -->

								<!-- <div class="grid_2 alpha" id="noblock" style="height: auto; background: transparent; font-size: 13px;">

									<div class="grid_2 alpha" style="display: none !important; margin-top: 3px; height: 32px; width: 243px; background:#f7f7f7;">

										<h1 style="float: left; font-size: 13px; margin-top: 8px; margin-left: 27px; color: #7f7fa7; font-weight: bold;"> Chat: </h1>

										<form style="float: left; margin: 0.4em 0 0 0.8em; ">

											<input type="radio" name="ciudad" value="Bogota" style="height: 15px; width: 15px; vertical-align: text-bottom;"> 

												Disponible

										</form>

									</div>

									<div class="grid_2 alpha" style="display: none !important; margin-top: 3px; height: 32px; width: 207px; margin-left:-6px; background:#f7f7f7;">

										<h1 style="font-size: 13px; margin-top:10px; margin-left: 25px; color: #7f7fa7; font-weight: bold;"> Nivel: </h1>

										<form style="margin-top:-20px; margin-left: 76px;">

											<input type="radio" name="certificado" value="certificado" style="vertical-align: top; height: 15px; width: 15px;">

												<img src="<?=base_url()?>img/certificado_trans.png" />

										</form>     

									</div>

									<div class="grid_2 omega" style="display: none !important; margin-top: 3px; height: 32px; width: 629px; margin-left: 0px; background: #f7f7f7;">

										<h1 style="font-size:13px; margin-top:10px; margin-left: 25px; color: #7f7fa7; font-weight: bold;"> Ver </h1>

										<a href="#"><p style="margin-left: 71px; margin-top:-20px;"><img src="<?=base_url()?>img/vista1.png" /></p></a>   

										<a href="#"><p style="margin-left: 93px; margin-top:-35px;"><img src="<?=base_url()?>img/vista2.png" /></p></a>    

									</div>

								</div> -->



								<!-- publicidad -->

								<!-- <div class="grid_2 alpha" style="height:120px; width:951px; background:#fff; border: 2px solid #f3f3f4; margin: 30px 0px 0px 20px;">

									<center style="line-height: 190px;"> <a href="#"> <img src="<?=base_url()?>img/publicidad3.png" /> </a> </center>

								</div> -->



				            <!-- en esta parte va el contenido de la paginacion-->

				            <table id="tablita_paginacion">

				            	<tr> <td>

										<div class="grid_2 alpha" style="background: transparent; height: 1355px; width: 63em; margin-bottom: -40px;">

											<!-- aqui van los productos de sist paginacion -->

											<div class="grid_4" style="width: 100%; height: auto; margin-left: 0;">

												<div id="Searchresult" style="height: auto;">

													El contenido especificado no se ha inicializado. 

												</div>

											</div>

										</div>

									</td> </tr>

									<tr> <td>

										<!-- mostrando pagina tal de tal -->
										
										<div style="width: 63em; margin: 55px 0 20px 0; text-align: center;">

											<p style="color: #7F7F7F; font-family: Arial, sans-serif; font-size: 12px;">

												Mostrando resultados del <?php echo @$numero_actual ?> al <?php echo @$numero_visible ?> de <?php echo @$total_a_mostrar ?> que contienen

												<b style="text-decoration: underline;"><?php echo @$busqueda ?></b>.

											</p>

										</div>
										

										<!-- contenedor de paginas -->

										<div style="background: #e9e9e9; text-align: center; font-family: Arial; width: 63em; margin-top: 0;">

											<center> <div id="Pagination" style="height: 36px; padding: 0em 3em; margin: 0em 18%;"> </div> </center>

										</div>

										<style type="text/css">

											#Pagination .pagination { padding: 0; }

										</style>

									</td> </tr>

								</table>

							</div>



							<!-- pestaÃ±a 2 -->

							<div id="tab2">

								<!-- contenedor 1 -->

						      <div class="grid_2 alpha" style="height: 32px; background:#f7f7f7; width: 100%; font-size: 13px;">

									<h1 style="display: none !important; float: left; font-size: 13px; margin-top: 8px; margin-left: 27px; color: #7f7fa7; font-weight: bold;"> Ciudad: </h1>

									<form style="display: none !important; margin: 0.4em 0 0 0.8em;">

										<input type="radio" name="ciudad" value="Bogota" style="height: 15px; width: 15px; vertical-align: text-bottom;"> 

											BogotÃ¡ <b style="color:#4accef; font-weight: 500;"> (88)</b>

										<input type="radio" name="ciudad" value="Cali" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">

											Cali<b style="color:#4accef; font-weight: 500;"> (44)</b>

										<input type="radio" name="ciudad" value="Medellin" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">

											MedellÃ­n<b style="color:#4accef; font-weight: 500;"> (12)</b>

										<input type="radio" name="ciudad" value="Otras" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">

											Otras ciudades<b style="color:#4accef; font-weight: 500;"> (6)</b>

									</form>

								</div>



								<!-- contenedor 2 -->

								<!--<div class="grid_2 alpha" style="height: 32px; background: transparent; font-size: 13px;">

									<div class="grid_2 alpha" style="margin-top: 3px; height: 32px; width: 243px; background:#f7f7f7;">

										<h1 style="font-size: 13px; margin-top: 8px; margin-left: 27px; color: #7f7fa7; font-weight: bold;"> Chat: </h1>

										<form style="margin-top: -19px; margin-left: 85px;">

											<input type="radio" name="ciudad" value="Bogota" style="height: 15px; width: 15px; vertical-align: text-bottom;"> 

												Disponible

										</form>

									</div>

									<div class="grid_2 alpha" style="margin-top: 3px; height: 32px; width: 207px; margin-left:-6px; background:#f7f7f7;">

										<h1 style="font-size: 13px; margin-top:10px; margin-left: 25px; color: #7f7fa7; font-weight: bold;"> Nivel: </h1>

										<form style="margin-top:-20px; margin-left: 76px;">

											<input type="radio" name="certificado" value="certificado" style="vertical-align: top; height: 15px; width: 15px;">

												<img src="<?=base_url()?>img/certificado_trans.png" />

										</form>     

									</div>

									<div class="grid_2 omega" style="margin-top: 3px; height: 32px; width: 629px; margin-left: -5px; background: #f7f7f7;">

										<h1 style="font-size:13px; margin-top:10px; margin-left: 25px; color: #7f7fa7; font-weight: bold;"> Ver </h1>

										<a href="#"><p style="margin-left: 71px; margin-top:-20px;"><img src="<?=base_url()?>img/vista1.png" /></p></a>   

										<a href="#"><p style="margin-left: 93px; margin-top:-35px;"><img src="<?=base_url()?>img/vista2.png" /></p></a>    

									</div>

								</div> -->



								<!-- publicidad -->

								<!-- <div class="grid_2 alpha" style="height:120px; width:951px; background:#fff; border: 2px solid #f3f3f4; margin: 30px 0px 0px 20px;">

									<center style="line-height: 190px;"> <a href="#"> <img src="<?=base_url()?>img/publicidad3.png" /> </a> </center>

								</div> -->



								<!-- en esta parte va el contenido de la paginacion-->

				            <table id="tablita_paginacion" style="float: left;">

				            	<tr> <td>

										<div class="grid_2 alpha" style="background: transparent; height: 1355px; width: 99%; margin-bottom: -40px;">

											<!-- aqui van los productos de sist paginacion -->

											<div class="grid_4" style="width: 100%; height: auto; margin-left: 0;">

												<div id="Searchresult_2" style="height: auto;">

													El contenido especificado no se ha inicializado. 

												</div>

											</div>

										</div>

									</td> </tr>

									<tr> <td>

										<!-- mostrando pagina tal de tal -->

											<!--
										<div style="width: 63em; margin: 55px 0 20px 0; text-align: center;">

											<p style="color: #7F7F7F; font-family: Arial, sans-serif; font-size: 12px;">

												Mostrando resultados del 1 al 20 de 896 que contienen

												<b style="text-decoration: underline;">cobre</b>.

											</p>

										</div>
										-->

										<!-- contenedor de paginas -->

										<div style="background: #e9e9e9; text-align: center; font-family: Arial; width: 63em; margin-top: 0;">

											<center> <div id="Pagination_2" style="height: 36px; padding: 0em 3em; margin: 0em 18%;"> </div> </center>

										</div>

										<style type="text/css">

											#Pagination_2 .pagination { padding: 0; }

										</style>

									</td> </tr>

								</table>

							</div>



							<!-- pestaÃ±a 3 -->

							<div id="tab3">

								<!-- contenedor 2 -->

								<div class="grid_2 alpha" style="width: 100%; height: 32px; background: transparent; font-size: 13px;">

									<!-- <div class="grid_2 alpha" style="display: none !important; margin-top: 0px; height: 32px; width: 243px; background:#f7f7f7;">

										<h1 style="font-size: 13px; margin-top: 8px; margin-left: 27px; color: #7f7fa7; font-weight: bold;"> Chat: </h1>

										<form style="margin-top: -19px; margin-left: 85px;">

											<input type="radio" name="ciudad" value="Bogota" style="height: 15px; width: 15px; vertical-align: text-bottom;"> 

												Disponible

										</form>

									</div>

									<div class="grid_2 alpha" style="margin-top: 0px; height: 32px; width: 207px; margin-left:-6px; background:#f7f7f7;">

										<h1 style="font-size: 13px; margin-top:10px; margin-left: 25px; color: #7f7fa7; font-weight: bold;"> Nivel: </h1>

										<form style="margin-top:-20px; margin-left: 76px;">

											<input type="radio" name="certificado" value="certificado" style="vertical-align: top; height: 15px; width: 15px;">

												<img src="<?=base_url()?>img/certificado_trans.png" />

										</form>     

									</div> -->

									<div class="grid_2 omega" style="margin-top: 0px; height: 32px; width: 100%; margin-left: 0; background: #f7f7f7;">

										<!-- <h1 style="font-size:13px; margin-top:10px; margin-left: 25px; color: #7f7fa7; font-weight: bold;"> Ver </h1>

										<a href="#"><p style="margin-left: 71px; margin-top:-20px;"><img src="<?=base_url()?>img/vista1.png" /></p></a>   

										<a href="#"><p style="margin-left: 93px; margin-top:-35px;"><img src="<?=base_url()?>img/vista2.png" /></p></a> -->

									</div>

								</div>



								<!-- publicidad -->

								<!-- <div class="grid_2 alpha" style="height:120px; width:951px; background:#fff; border: 2px solid #f3f3f4; margin: 30px 0px 0px 20px;">

									<center style="line-height: 190px;"> <a href="#"> <img src="<?=base_url()?>img/publicidad3.png" /> </a> </center>

								</div> -->



								<!-- en esta parte va el contenido de la paginacion-->

				            <table id="tablita_paginacion" style="float: left;">

				            	<tr> <td>

										<div class="grid_2 alpha" style="background: transparent; height: 1355px; width: 63em; margin-bottom: -40px;">

											<!-- aqui van los productos de sist paginacion -->

											<div class="grid_4" style="width: 100%; height: auto;">

												<div id="Searchresult_3" style="height: auto;">

													El contenido especificado no se ha inicializado. 

												</div>

											</div>

										</div>

									</td> </tr>

									<tr> <td>

										<!-- mostrando pagina tal de tal -->

										<div style="width: 63em; margin: 55px 0 20px 0; text-align: center;">

											<p style="color: #7F7F7F; font-family: Arial, sans-serif; font-size: 12px;">

												Mostrando resultados del 1 al 20 de 896 que contienen

												<b style="text-decoration: underline;">cobre</b>.

											</p>

										</div>

										<!-- contenedor de paginas -->

										<div style="background: #e9e9e9; text-align: center; font-family: Arial; width: 63em; margin-top: 0;">

											<center> <div id="Pagination_3" style="height: 36px; padding: 0em 3em; margin: 0em 18%;"> </div> </center>

										</div>

										<style type="text/css">

											#Pagination_3 .pagination { padding: 0; }

										</style>

									</td> </tr>

								</table>

							</div>

						</div>

					</div>



					<!-- pregunta de satisfaccion-->

					<div class="grid_4" id="preg_satis">

						<!-- NOTA este es un div dinamico cuyo contenido se cambia, -->

						<!-- mediante jquery, al cambiar de pestaÃ±a -->

						<div style="text-align: center; margin-bottom: 1.5em;">

					   	<p style="font-weight: bold; color: black; font-size: 15px; font-family: Arial, sans-serif;">

					   		Â¿No encontraste lo que estabas buscando?

					   	</p>

					   </div>

					   <div style="text-align: center;">

					   	<a href="#"> 

					   		<img src="<?=base_url()?>img/boton_oferta.png"> </a>

					   </div>

					</div>

				</div>



				<!-- segundo sistema de fotos (productos especiales 2) -->		

				<!-- <div class="grid_4" id="div2" style="margin-top: 65px; border: 2px solid #f3f3f4;">

					<div class="grid_4" id="margen">

						<!-- div donde va el contenido principal (fotos) de la pagina / titulo -->

						<!-- <div class="grid_4" style="margin-top: 3px; margin-left: 5px; width: 434px; height: 30px; background: transparent;"> 

							<p style="color: #ff7f27; font-weight: bold; font-size: 15px; margin-top:7px; margin-left: 17px;"> 

								Productos Especiales </p>

						</div>

						<!-- div donde va el contenido principal (fotos) de la pagina / fotos -->

						<!-- <div class="grid_4" style="width: auto; height: auto; margin: 13px 0px 0px 2px;">

							<table id="tablita_principal"> <tr> 

								<!-- div 1 (foto1)-->

								<!-- <td style="width: 210px; height: 255px;"> 

									<center> <table>

										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> <img src="<?=base_url()?>img/cosaazul.png" class="imagenes_PE"/></a>

										</td> </tr>

										<tr> <td style="padding-bottom: 7px;"> </td> </tr>



										<tr> <td style="width: 100%; height: 40px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> 

												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 

													MÃ¡quina General Electric / Black & Decker </p> </a>

											</div>

										</td> </tr>



										<tr> <td style="padding-bottom: 10px;"> </td> </tr>

										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">

											<center> <table> <tr>

												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>

												<td style="vertical-align: middle;"> <table>

													<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 

														1.000.458.000 </p> </center> </td>

													</tr>

													<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> </td>

													</tr>

												</table> </td>

											</tr> </table> </center>

										</td> </tr>



										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">

											<img src="<?=base_url()?>img/certificado.png" style="margin-top: -6px; margin-left: 12px;" />

										</td> </tr>

									</table> </center>

								</td>

								<td style="padding-right: 25px;"> </td>



								<!-- div 2 (foto2)-->

								<!-- <td style="width: 210px; height: 255px;"> 

									<center> <table>

										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> <img src="<?=base_url()?>img/tuberia1.png" class="imagenes_PE"/></a>

										</td> </tr>

										<tr> <td style="padding-bottom: 7px;"> </td> </tr>



										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">

											<div style="height: 40px; max-height: 40px;">

											<a href="#" style="text-decoration: none;"> 

												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 

													iPad 4 16 Gb + Wifi + 3g + accesorios y un texto_demasiado_diria_yo LARGO </p> </a>

											</div>

										</td> </tr>



										<tr> <td style="padding-bottom: 10px;"> </td> </tr>

										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">

											<center> <table> <tr>

												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>

												<td style="vertical-align: middle;"> <table>

													<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 

														1.000 </p> </center> </td>

													</tr>

													<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> </td>

													</tr>

												</table> </td>

											</tr> </table> </center>

										</td> </tr>



										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">

											<img src="<?=base_url()?>img/certificado.png" style="margin-top: -6px; margin-left: 12px;" />

										</td> </tr>

									</table> </center>

								</td>

								<td style="padding-right: 25px;"> </td>



								<!-- div 3 (foto3)-->

								<!-- <td style="width: 210px; height: 255px;"> 

									<center> <table>

										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> <img src="<?=base_url()?>img/arroz.png" class="imagenes_PE"/></a>

										</td> </tr>

										<tr> <td style="padding-bottom: 7px;"> </td> </tr>



										<tr> <td style="width: 100%; height: 40px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> 

												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 

													iPad 4 16 Gb + Wifi + 3g + accesorios </p> </a>

											</div>

										</td> </tr>



										<tr> <td style="padding-bottom: 10px;"> </td> </tr>

										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">

											<center> <table> <tr>

												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>

												<td style="vertical-align: middle;"> <table>

													<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 

														1.000.458 </p> </center> </td>

													</tr>

													<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> </td>

													</tr>

												</table> </td>

											</tr> </table> </center>

										</td> </tr>



										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">

											<img src="<?=base_url()?>img/certificado.png" style="margin-top: -6px; margin-left: 12px;" />

										</td> </tr>

									</table> </center>

								</td>

								<td style="padding-right: 25px;"> </td>



								<!-- div 4 (foto4)-->

								<!-- <td style="width: 210px; height: 255px;"> 

									<center> <table>

										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> <img src="<?=base_url()?>img/cosarara.png" class="imagenes_PE"/></a>

										</td> </tr>

										<tr> <td style="padding-bottom: 7px;"> </td> </tr>



										<tr> <td style="width: 100%; height: 40px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> 

												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 

													iPad 4 16 Gb + Wifi + 3g + accesorios </p> </a>

											</div>

										</td> </tr>



										<tr> <td style="padding-bottom: 10px;"> </td> </tr>

										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">

											<center> <table> <tr>

												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>

												<td style="vertical-align: middle;"> <table>

													<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 

														458.000 </p> </center> </td>

													</tr>

													<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> </td>

													</tr>

												</table> </td>

											</tr> </table> </center>

										</td> </tr>



										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">

											<img src="<?=base_url()?>img/certificado.png" style="margin-top: -6px; margin-left: 12px;" />

										</td> </tr>

									</table> </center>

								</td>

								<td style="padding-right: 25px;"> </td>



								<!-- div 5 (foto5)-->

								<!-- <td style="width: 210px; height: 255px;"> 

									<center> <table>

										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> <img src="<?=base_url()?>img/memorias_usb.png" class="imagenes_PE"/></a>

										</td> </tr>

										<tr> <td style="padding-bottom: 7px;"> </td> </tr>



										<tr> <td style="width: 100%; height: 40px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> 

												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 

													iPad 4 16 Gb + Wifi + 3g + accesorios </p> </a>

											</div>

										</td> </tr>



										<tr> <td style="padding-bottom: 10px;"> </td> </tr>

										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">

											<center> <table> <tr>

												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>

												<td style="vertical-align: middle;"> <table>

													<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 

														655.000 </p> </center> </td>

													</tr>

													<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> </td>

													</tr>

												</table> </td>

											</tr> </table> </center>

										</td> </tr>



										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">

											<img src="<?=base_url()?>img/certificado.png" style="margin-top: -6px; margin-left: 12px;" />

										</td> </tr>

									</table> </center>

								</td>

							</tr> </table>

						</div>

					</div>

				</div> -->

				<div class="grid_4" id="div2">

					<div class="grid_4" id="margen">

						<!-- por defecto aparecen los elementos de la primer pestaÃ±a -->

						<!-- div donde va el contenido principal (fotos) de la pagina / titulo -->

						<div class="grid_4" style="margin-top: 3px; margin-left: 3px; width: 434px; height: 30px; background: transparent;">

							<p style="color: #ff7f27; font-weight: bold; font-family: 'Arial Rounded MT', Arial, sans-serif; font-size: 15px; margin-top:7px; margin-left: 17px;"> 

								Productos Especiales </p>

						</div>

						<!-- div donde va el contenido principal (fotos) de la pagina / fotos -->

						<div class="grid_4" style="width: auto; height: auto; margin: 13px 0px 0px 2px;">

							<table id="tablita_principal"> 

								<tr> 

								<!-- div 1 (foto1)-->

								<?php  foreach ($p_especiales as $row): ?>

								<td style="width: 210px; height: auto;"> 

									<center> <table>

										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> 

												<img src="<?=base_url()?>uploads/resize/<?=$row->nombre_img?>" class="imagenes_PE"/></a>

										</td> </tr>

										<tr> <td style="padding-bottom: 7px;"> </td> </tr>



										<tr> <td style="width: 100%; height: 40px; text-align: center; vertical-align: middle;">

											<a href="#" style="text-decoration: none;"> 

												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 

													<?=$row->nom_producto; ?> </p> </a>

											</div>

										</td> </tr>



										<!-- <tr> <td style="padding-bottom: 10px;"> </td> </tr>

										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">

											<center> <table> <tr>

												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>

												<td style="vertical-align: middle;"> <table>

													<tr> <td> 

														<center> <p style="font-weight: bold; font-size: 17px; color: black;"> 

														<?= $row->precio_unidad; ?> </p> </center> </td>

													</tr>

													<tr> <td> 

														<center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> 

													</td>

													</tr>

												</table> </td>

											</tr> </table> </center>

										</td> </tr>



										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">

											<img src="<?=base_url()?>img/certificado.png" style="margin-top: -6px; margin-left: 12px;" />

										</td> </tr> -->

									</table> </center>

								</td>

								<td style="padding-right: 25px;"> </td>

								<?php endforeach; ?> 

								</tr>

							</table>

						</div>

					</div>

				</div>



				<!-- publicidad -->

			  	<div class="grid_4" id="div4" style="background: #ffffff; margin: 0 0 0 0.8em; width: 77.1em;">

					<center> <a href="#"> <img src="<?=base_url()?>img/publicidad4.png" /> </a> </center> 

			  	</div>				

		 	</section> </article>

		</div>

		<!-- div que maneja el footer de la pagina-->

		<div class="grid_2 alpha" id="footer"> <center>

			<iframe src="<?=base_url()?>footer" scrolling="no" id="footer_iframe"> </iframe>

		</center> </div>

	</body>

</html>