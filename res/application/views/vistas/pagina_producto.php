		<!-- PRUEBITA GENERAL CON EL SCRIPT ADAPT.JS -->
		<!-- PARA HACER DE 960 UN SISTEMA MULTIPANTALLA / RESPONSIVE -->
		<!-- <link rel="stylesheet" href="<?= base_url() ?>adapt-master/assets/css/master.css" /> -->
		<noscript>
		<!-- <link rel="stylesheet" href="<?= base_url() ?>adapt-master/assets/css/mobile.min.css" /> -->
		</noscript>
		<script>
			// Edit to suit your needs.
			var ADAPT_CONFIG = {
				// Where is your CSS?
				path: 'adapt-master/assets/css/',
				// false = Only run once, when page first loads.
				// true = Change on window resize and page tilt.
				dynamic: true,
				// First range entry is the minimum.
				// Last range entry is the maximum.
				// Separate ranges by "to" keyword.
				range: [
					'0px    to 760px  = mobile.min.css',
					'760px  to 980px  = 720.min.css',
					'980px  to 1280px = 960.min.css',
					'1280px to 1600px = 1200.min.css',
					'1600px to 1940px = 1560.min.css',
					'1940px to 2540px = 1920.min.css',
					'2540px           = 2520.min.css'
				]
			};
		</script>
		<!--  <script src="<?= base_url() ?>adapt-master/assets/js/adapt.min.js"></script> -->

		<link rel="stylesheet" href="<?= base_url() ?>css/960.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/960_12_col.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/reset.css">

		<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js"></script>

		<!-- importaciones para el visor de imagenes -->
  		<script type="text/javascript" src="<?= base_url() ?>js/visualizador_imagenes.js"></script>
  		<link rel="stylesheet" href="<?= base_url() ?>css/visualizador_imagenes.css">
  		<script type="text/javascript">
  			/* wait for images to load */
				
  			$(window).load(function () {
  				$('.sp-wrap').smoothproducts();
  			});
  		</script>

		<!-- importaciones para las tabs -->
		<link href='<?= base_url() ?>css/estilostabs.css' rel='stylesheet' type='text/css'>
		<!-- <script type="text/javascript" src="js/jquery-1.9.1.js"></script>  -->
		<!-- <script type="text/javascript" src="<?= base_url() ?>js/jstabs.js"></script> -->
	</head>

	<style type="text/css">
		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* cuerpo */
		html, body {
			font-family: Arial;
			/* desaparece scroll horizontal en IE y otros */
			overflow-x: hidden;
			overflow-y: auto;
		}

		a {
			text-decoration: none;
		}

		.container_12{
			background:#ffffff;
			height: auto;
			width: 79.1em; /*width: 1265px; */
			margin-top: 10px;
			margin-left: center;
			margin-right: center;
		}

		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* generales */
		.grid_1{
			background: yellow;
			height: 50px;
			width: 225px;
		}

		.grid_4{
			background: #ffffff;
			height:512px;
			margin:12px 12px;
			width: 300px;
		}

		.grid_2{
			background: red;
			height:300px;
			width: 100%;
		}

		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* headers: he, hi, ho */
		#titulito{
			width: auto;
			height: 20px;
			background: transparent;
			margin-top: -27px;
			margin-left: 657px;
			display: none;
		}

		#espacio_logo_proveedor {
			background: transparent;
			width: 15em;
			height: auto;
			margin: 0;
			margin-top: -1.4em;
			margin-left: 0.42em;
			display: block;
		}

		/* headers */
		#he {
			margin-top: -7px;
			width: auto; /*1015px*/
			/*max-width: 1054px;*/
			/*margin-left: -38px; /*con respecto al borde izq de la pantalla */
			margin-left: -19px; /*con respecto a la "r" del logo de proveedor */
			background: transparent;
		}

		/* header 2 */
		#hi {
			display: block;
			width: auto;
			margin-top: -19px;
			height: 70px;
			background: #ffffff;
			margin-left: 12px;
		}

		#div1_logo {
			height: 49px;
			width: 205px;
			background: red;
			margin-left: 0px;
			margin-top: 1px;
		}

		#div3_buscar{
			height: auto;
			width: auto;
			background: #00a2e8;
			margin-left: 5px;
			margin-top: 9px;
			border: none;
			background: transparent;
			border-radius: 3px;
			border-collapse: separate;
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
			background-image: url("<?= base_url() ?>img/flechita_select.png");
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
			background: url('<?= base_url() ?>img/botonbusqueda.png');
			width: 65px;
			height: 41px;
			cursor: pointer;
			border: none;
			display: block;
			margin-bottom: -1px;
			background-position: center;
		}

		#div4_boton1 {
			height: 47px;
			width: 144px;
			background: red;
			margin-left: 10px;
			margin-top: 9px;
			box-shadow: 139px 3px 0px white, 4px 3px 0.2px #ddd;
		}

		#div4_boton2 {
			height: 47px;
			width: 178px;
			background: red;
			margin-left: -1px;
			margin-top: 9px;
			box-shadow: 139px 3px 0px white, 4px 3px 0.2px #ddd;
		}

		/* ruta del producto */
		#ho{
			width: 700px;
			max-width: 900px;
			margin-top: 7px;
			height: 22px;
			background:#ffffff;
			padding-left: 3px;
			display: block;
			float: left;
			clear: both;
		}

		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* espacio para las fotos y los videos */
		#div1{
			height: 468px;
			width: 322px;
			max-width: 322px;
			background: #ffffff;
			display: block;
			padding-top: 1px;
			margin-left: 11px;
		}

		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* informacion general  del producto (a la derecha del v. de imagenes) */
		#div2{
			height: auto; /*465px*/
			width: 895px;
			background:#ffffff;
			margin-left: 12px;
		}

		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* otros estilos / sin clasificar */
		#div3{
			height:900px;
			width: 1830px;
		}

		#div4{
			height:900px;
			width: 1830px;
		}

		#div2_ingresar{
			height: 25px;
			width: 82px;
			background: red;
			margin-left: 32px;
			margin-top: 24px;
		}

		#espacio{
			height: 25px;
			width: 1px;
			background: silver;
			margin-left: -8px;
			margin-top: 24px;
		}

		#div2_registro{
			height: 26px;
			width: 121px;
			background: red;
			margin-left: -4px;
			margin-top: 23px;
		}

		#espacio_busqueda{
			width: 371px;
			height: 38px;
			background: #00a2e8;
			margin-left: 3px;
			margin-top: 3px;
		}

		#espacio_boton_busqueda{
			width: 58px;
			height: 38px;
			background: yellow;
			margin-left: 617px;
			margin-top: -38px;
		}

		#espacio_foto_producto{
			margin-top: 0px;
			height: 366px;
			width: 393px;
			background:#aaaaaa;
		}

		#foto_producto{
			margin-top: 4px;
			height: 358px;
			width: 383px;
			background: #ffffff;
			margin-left:5px;
		}

		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* boton azul  publicar oferta de compra */
		#botonazul_ofcompra {
			height: auto;
			width: auto;
			margin-left: 411px;
			margin-top: -35px;
			background: #ffffff;
			padding: 0px 19px 0px 19px;
			text-align: center;

		}
		.text-naranja{
			color:#FF7F27;
		}

		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* quiero contactar al proveedor - formulario */
		#qqap_form {
			height: auto;
			width: 1263px;
			/*border-bottom: 1px solid #ddd;*/
			margin-left: 0px;
			margin-top: 42px;
			background: transparent;
			padding-bottom: 30px;
		}

		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* header (iframe) */
		#header_iframe {
			width: 104%; /* width: 106.8%; */
			height: 35px;
			margin: -11px 0px 27px -10px;
		}

		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* footer */
		#foo {
			margin-top: 8px;
			height: 333px;
			max-height: 333px;
			width: 1348px;
			margin-left: -2.5em;
			background: #f2f2f2;
			margin-bottom: -15px;
		}

	</style>
		<div class="container_12" style="width: 100%;">
			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			<!-- header  -->
			<iframe src="<?= base_url() ?>header" scrolling="no" id="header_iframe"></iframe>
			
			<div style="margin-left: 2em;">
				<div style="float: left; margin-right: 2em;">
					<div class="grid_1" id="espacio_logo_proveedor">
						<a href="<?php echo base_url() ?>"> 
							<img src="<?= base_url() ?>img/logo3.png" /> </a>
					</div>
				</div>
				<div style="float: left">
					<div class="grid_1" id="he">
						<table style="width: auto; height: auto;">
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
									<table style="width: auto; height: auto;">
										<tr>
											<td style="height: auto; padding-right: 8px;">

												<a href="<?= $publicar_of ?>" <?= @$clase_css ?>>
													<img src="<?= base_url() ?>img/boton_oferta.png" /> </a>
											</td>
											<td style="height: auto">
												<a href="<?= $publicar_prod ?>" <?= @$clase_css ?>>
													<img src="<?= base_url() ?>img/boton_producto.png" /> </a>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>



			<!-- header 2 -->
			<!-- <div class="grid_1" id="espacio_logo_proveedor">
				<a href="<?php echo base_url() ?>"> 
					<img src="<?= base_url() ?>img/logo3.png" /> </a>
			</div>

			<div class="grid_1" id="he">
				<table style="width: auto; height: auto;">
					<tr>
						<td style="height: auto; padding-right: 8px;">
							<?= form_open(base_url() . 'listado/validar') ?> 
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
							<table style="width: auto; height: auto;">
								<tr>
									<td style="height: auto; padding-right: 8px;">

										<a href="<?= $publicar_of ?>" <?= @$clase_css ?>>
											<img src="<?= base_url() ?>img/boton_oferta.png" /> </a>
									</td>
									<td style="height: auto">
										<a href="<?= $publicar_prod ?>" <?= @$clase_css ?>>
											<img src="<?= base_url() ?>img/boton_producto.png" /> </a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div> -->

			<!-- ruta del producto -->
			<div class="grid_1" id="ho">
				<p style="font-size: 12px">
					<?php echo $this->breadcrumb->output(); ?>
				</p>
			</div>

			<div class="clear"></div>

			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			<!-- contenido -->
			<article> <section>
					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- espacio de las fotos y videos -->
					<div class="grid_4" id="div1">
						<table width="auto">
							<tr> <td style="width: 322px; max-width: 322px; height: 360px;">
									<div class="sp-wrap"> <!-- maximo 8 imagenes -->
										<?php foreach ($img_principal as $row): ?> <!--Este ciclo trae de la bd el nombre de la imagen -->
											<a href="<?= base_url() ?>uploads/resize<?php echo $row['nombre_img']; ?>">
												<img src="<?= base_url() ?>uploads/resize<?php echo $row['nombre_img']; ?>" alt=""> </a>
										<?php endforeach; ?>
									</div>
								</td> </tr>
							<tr> <td style="padding-top: 10px;">
									<a href="#" style="font-size: 12px;"> <center> View and Share related images </center> </a>
								</td> </tr>
						</table>
					</div>

					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- informacion general  del producto -->
					<div class="grid_4" id="div2">
						<!-- titulo del producto -->
						<div class="grid_2 alpha" style="margin: 0px 0px 0px 40px; height: auto; width:885px; background: transparent; padding-bottom: 1px;">
							<div style="padding: 5px 10px 5px 0px; font-size: 20px;">
								<?php echo $nombre_producto->nom_producto; ?>
							</div>
						</div>
						<!-- informacion basica del producto -->
						<div class="grid_2 alpha" style="margin-top: 5px; height: auto; width: 535px; margin-left: 0px; background: transparent;">
							<div style="padding: 10px 10px 12px 10px; border: 1px solid #f3f3f4;">
								<table width="100%">
									<tr style="height: 50px;">
										<td width="33.3%" style="vertical-align: middle; ">
											<table width="auto" style="float: right;"> <tr>
													<td style="padding-right: 10px;">
														<p> Precio: </p> </td>
													<td style="padding-right: 2px;">
														<p style="color: #ff7f27; font-weight: bold; font-size: 18px;"> $ </p> </td>
													<td style="padding-right: 5px;">
														<p style="font-weight: bold; font-size: 18px;"> <?=decimal_points($precio_producto->precio_unidad); ?> </p> </td>
												</tr> </table>
										</td>
										<td width="33.3%" style="vertical-align: middle;">
											<table width="auto"> <tr>
													<td style="padding-right: 10px; padding-left: 10px; color: #ff7f27; font-size: 50px;"> / </td>
													<td style="padding-right: 15px; font-size: 16px; padding-top: 20px;">
														<?=decimal_points($pedido_min->pedido_min); ?> unidades</td>
												</tr> </table>
										</td>
										<td width="33.3%" rowspan="2" style="padding-top: 3px;">
											<!--<table width="100%" style="border-collapse: separate; border-spacing: 6px;">
												<tr>
													<td width="50%"> <a href="#"> <img src="<?= base_url() ?>img/disponible.png" /> </a> </td>
													<td width="50%"> <a href="#"> <img src="<?= base_url() ?>img/call_2.png" /> </a> </td>
												</tr>
												<tr>
													<td width="50%"> <a href="#contactar"> <img src="<?= base_url() ?>img/contactar_2.png" /> </a> </td>
												</tr>
											</table> -->
										</td>
									</tr>

									<tr>
										<td colspan="2" style="padding: 13px 10px 4px 29px; font-size: 13px;">
											<table width="100%" style="border-collapse: separate; border-spacing: 0px; font-size: 12px;">
												<tr>
													<td width="50%" style="font-weight: bold; text-align: left; padding-right: 10px; color:#7f7f7f;">
														Pedido minimo: </td>
													<td width="50%"> <p id="unidadesminimas"> <?=decimal_points($pedido_min->pedido_min);?> unidades </p> </td>
												</tr>
<!-- 												<tr>
													<td width="50%" style="font-weight: bold; padding-top: 8px; text-align: left; padding-right: 10px; color:#7f7f7f;">
														Tiempo de entrega: </td>
													<td width="50%" style="padding-top: 8px;"> <p id="tiempo"> :( </p> </td>
												</tr> -->
<!-- 												<tr>
													<td width="50%" style="padding-top: 8px; font-weight: bold; text-align: left; padding-right: 10px; color:#7f7f7f;">
														Capacidad de <br> Producción: </td>
													<td width="50%" style="padding-top: 8px;"> <p id="capacproduccion"> <?php
															if (isset($negociacion[0]['pedido_max'])) {
																echo $negociacion[0]['pedido_max'] . " ";
																echo $negociacion[0]['nombre_unidad'] . " X semana";
															} else {
																echo 'No definido por el usuario';
															}
															?> </p> </td>
												</tr> -->
												<tr>
													<td width="50%" style="padding-top: 8px; font-weight: bold; text-align: left; padding-right: 10px; color:#7f7f7f;">
														Forma de pago: </td>
													<td width="50%" style="padding-top: 8px;"> <p id="formapago">
														<ul>
															<?php
															foreach ($pago as $row):
																echo '<li>' . $row->tipo_pago . ' </li>';
																?>
															<?php endforeach; ?>
														</ul>
														</p> </td>
												</tr>
												<tr>
													<td width="50%" style="padding-top: 8px; font-weight: bold; text-align: left; padding-right: 10px; color:#7f7f7f;">
														Ubicacion: </td>
													<td width="50%" style="padding-top: 8px;"> <p id="origendesp"> <?php echo mb_convert_case($desc_empresa[0]->ciudad, MB_CASE_TITLE) . " - " . mb_convert_case($desc_empresa[0]->departamento, MB_CASE_TITLE); ?> </p> </td>
												</tr>
												<tr>
													<td width="50%" style="padding-top: 8px; font-weight: bold; text-align: left; padding-right: 10px; color:#7f7f7f;">
														Estado: </td>
													<td width="50%" style="padding-top: 8px;"> <p id="estadoproducto"> <?php echo $nombre_producto->estado ?> </p> </td>
												</tr>
												<!--<tr>
													<td width="50%" style="padding-top: 8px; font-weight: bold; text-align: left; padding-right: 10px;">
														Marca: </td>
													<td width="50%" style="padding-top: 8px;"> <p id="marcaproducto"> Pvcor </p> </td>
												</tr> -->
											</table>
										</td>
									</tr>

									<tr>
										<td colspan="4">
											<div style="margin-left: 28px; margin-top: 24px;">
												<input data-toggle="modal" data-target="#popup" type="image" name="boton"  id="launch_popup" src="<?= base_url() ?>img/cotizar.png" />
												

												<!-- <input type="image" name="boton"   src="<?= base_url() ?>img/chatear.png" /> -->

										<!--	<table width="100%" height="auto"> <tr>
												<td style="padding-right: 10px;"> <a href="#"><img src="<?= base_url() ?>img/logo_face.png" /></a> </td>
										  <td style="padding-right: 10px;"> <a href="#"><img src="<?= base_url() ?>img/logo_twitter.png" /></a> </td>
										  <td style="padding-right: 10px;"> <a href="#"><img src="<?= base_url() ?>img/logo_tube.png" /></a> </td>
										  <td style="padding-right: 10px;"> <a href="#"><img src="<?= base_url() ?>img/logo_in.png" /></a> </td>
										  <td style="padding-right: 10px;"> <a href="#"><img src="<?= base_url() ?>img/Logo_pinterest.png" /></a> </td>
										  <td style="padding-right: 10px;"> <a href="#"><img src="<?= base_url() ?>img/logo_plus.png" /></a> </td>
											</tr> </table>-->
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<!-- informacion basica del fabricante/vendedor -->
						<div class="grid_2" style="width: 412px; height: auto; background: transparent; border-top: 2px solid #f3f3f4; margin: 5px -181px 0px -8px;">
							<div style="padding: 11px 10px 10px 119px; font-size: 13px;">
								<a href="#" style="margin-left: -114px;"> <img src="<?= base_url() ?>img/addproveedor.png" /> </a>


								<a href="<?php echo base_url() . "perfil/ver_empresa/0/" . $desc_empresa[0]->nit ?>" style="margin-left: 5px; font-size: 15px; pñ0">
									<p style="color: #00a2e8; font-size: 19px; font-weight: bold; margin-top: -90px">
										<?= $info_empresa->nombre ?> </p> </a>
										 <div style= "float:right"> <!--MEMBRESIA SOLICITUD PRODUCTO -->
                                         <?php echo $div_membresia ?> 
                                         </div>

					     	<table width="100%" style=" border-collapse: separate; border-spacing: 0px; font-size: 12px; margin-top: -90px;">
									<tr>
										<td style="padding-right: 10px; padding-bottom: 9px;"> <img src="<?= base_url() ?>img/contacto.png" />
											<a href="<?php echo base_url() . "perfil/contacto_empresa/" . $desc_empresa[0]->nit ?>" style="margin-left: 5px; font-size: 15px; pñ0">
												Información de Contacto
											</a>
										</td>
									</tr>
									<tr> <td style="font-size: 12px;"> <b> Ubicacion: </b> <?= $ciudad->ciudad ?> </td> </tr>
									<tr> <td style="font-size: 12px;"> <b> Tipo de empresa: </b> <?= $tipo_empresa->tipo ?> </td> </tr>
									<tr> <td style="font-size: 12px;"> <b> Productos principales: </b>
											<?php
											foreach ($otros_pro as $row):
												echo $row->nombre_producto . ' ';
												?>
											<?php endforeach; ?>
										</td> </tr>
									<tr> <td style="padding-top: 10px; font-size: 12px;"> <b> Productos publicados: </b> <a href="<?php echo base_url() . "perfil/ver_empresa/0/" . $desc_empresa[0]->nit ?>"> <?php echo $prod_publicados; ?> - Ver productos </a> </td> </tr>
							        
								</table>

							</div>

						</div>
						<!-- links contacto fabricante/vendedor -->
						<div class="grid_2 " style="border-top: 1px dotted #ddd; margin-top: 10px; height: auto; width: 383px; margin-right: -105px; margin-left: 13px; background: transparent;">

							<div style="padding: 10px 10px 10px 10px;"> <center>

									<table width="80%">

										<tr> <td style="font-size: 11px;"> <br> </td> </tr>
										<tr>
											<td style="padding-right: 10px; padding-left: 56px;"> <img src="<?= base_url() ?>img/telefono.png" /> </td>
											<td style="vertical-align: bottom;">
												<input type="button" value="Llamar a la Empresa" id="numTel" onclick="VerOcultar_NumTel()"
													   style="background: #00a2e8; cursor: pointer; color: white; width: 169px; height: 37px; border:none;"/>
											</td>
										</tr>
										<script type="text/javascript">
											function VerOcultar_NumTel() {
												if (jQuery("#numTel").val() == "Llamar a la Empresa") {
													jQuery("#numTel").css("font-weight", "bold");
													jQuery("#numTel").css("font-size", "18px");
													jQuery("#numTel").val("<?php echo $telefono->numero;
											echo " -- " . $telefono->celular; ?>");
												} else {
													jQuery("#numTel").css("font-weight", "normal");
													jQuery("#numTel").css("font-size", "13px");
													jQuery("#numTel").val("Llamar a la Empresa");
												}
											}
										</script>
									</table>
								</center> </div>
						</div>


						<div class="grid_2 " style="border-top: 1px dotted #ddd; margin-top: 10px; height: auto; width: 383px; margin-right: -105px; margin-left: 13px; background: transparent;">
							<!-- para las redes sociales
							<div style="padding: 10px 10px 10px 10px;"> <center>
							<table width="80%"
								<tr> <td style="font-size: 17px; padding-left: 10px;"> <p style="text-align: center;">Comparte este rpoducto</p><br> </td> </tr>
								<tr>
									<td style="padding-right: 10px; padding-left: 56px;"> <img src="<?= base_url() ?>img/telefono.png" /> </td>
								</tr>
							</table>
						</center> </div> -->
						</div>
						<!-- publicidad
						<div class="grid_2 " style="margin-top: 36px; height: 89px; width: 844px; margin-left: 0px; background:#ffffff">
							<img src="<?= base_url() ?>img/publi_long.png" />
						</div>-->
					</div>

					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- tabs: info producto / perfil empresa / otros productos empresa -->
					<div class="grid_4" style="width: 1250px; height: auto;">
						<table style="width: auto; margin-left: -11px; border-bottom: 1px dotted rgb(190, 190, 190);s"> <tr>
								<td style="width: 109px;">
									<div style="border-top: 1px solid #ddd; margin-top: 31.7px;"> </div>
								</td>
								<td style="width: auto;">
									<div class="grid_2 " style="height: 373px; width: auto; margin-left: -11px; margin-top: -40px; background: transparent;">
										<div style="padding: 10px 10px 10px 10px; height: 355px;">
											<table width="100%" style="height: 355px;">
												<tr>
													<td style="width: 823px; max-width: 865px; font-size: 13px; padding-top: 26px;">
														<ul id="tabs">
															<li><a href="#" title="tab1" style="border-left: 1px solid #ddd;"> Información del Producto </a></li>
															<li class="dos" ><a href="#" title="tab2"> Perfil de la Empresa </a></li>
															<li><a href="#" title="tab3"> Otros Productos de la Empresa </a></li>
														</ul>
														<div id="content">
															<div id="tab1">
																<!-- PESTAÑA 1    -->
																<?php echo $nombre_producto->descripcion_producto; ?>
															</div>

															<div id="tab2">
																<!-- PESTAÑA 2    -->
																<?php
																foreach ($desc_empresa as $dato):
																	echo nl2br($dato->descripcion);
																	?>

																<?php endforeach; ?>
															</div>

															<div id="tab3">
																<!-- PESTAÑA 3 -->
																<ul>
																	<?php
																	foreach ($otros_pro as $row):
																		echo '<li>' . $row->nombre_producto . '</li> ';
																		?>
																	<?php endforeach; ?>
																</ul>
															</div>
														</div>
													</td>
<!-- 													<td width="auto" style="vertical-align: middle;">
														<p style="font-size: 11px; text-align: right;">
															<a href="#" style="color: grey;"> <img src="<?= base_url() ?>img/icono_rsa.png" />
																Report Suspicious Activity  </a> </p>
														<div style="width: 326px; height: 253px; border-top: 1px solid #ddd; margin: 9px 0px 0px -3px;">
															<div style="border: 1px solid #bcccd8; margin: 17px 22px 0px 4px;">
																<a href="#" style="margin-left:1px;">
																	<img src="<?= base_url() ?>img/publi1.png" style="margin-left: -1px;"/> </a>
															</div>
														</div>
													</td> -->
												</tr>
											</table>
										</div>
									</div>
								</td>
							</tr> </table> </div>

					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- boton azul  publicar oferta de compra -->
					<div class="grid_2" id="botonazul_ofcompra">
						<div>
							<p>¿No es el producto que estaba buscando?</p>
							<p class="text-naranja">Publique el producto que necesita!</p>
						</div>
						<div>
							<a href="<?php echo base_url() ?>publicar_oferta" > <img src="<?php echo img_url() ?>publicar-solicitud.jpg" /></a>
						</div>
					</div>
					

					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- quiero contactar al proveedor - formulario -->
					<div class="grid_2" id="qqap_form">
						<a name="contactar" > <!-- Ancla donde se desplazara al presionar boton contactar proveedor -->
							<table style="width: 100%; height: auto;"> <tr>
									<!-- separador -->
									<td style="width: 109px;">
										<div style="border-top: 2px solid #ddd; margin-top: 39.7px;"> </div>
									</td>
									<!-- formulario -->
									<td id="cotizar_id"style="width: 687px; max-width: 687px;">
										<div class="grid_2 " style="margin-left: 0px; height: auto; width: 677px; background: transparent;">
											<div style="font-size: small;">
												<table width="100%">
													<tr>
														<td style="cursor: pointer;">
															<div style="width: 287px; border-left: 1px solid #ddd; border-right: 1px solid #ddd; border-top: 3px solid #00a2e8; border-bottom: none; text-align: center; height: 37px; line-height: 34px;
																 position: relative; z-index: 3; margin-bottom: -2px; background: white;">
																<p style="vertical-align: middle; font-weight: bold; font-size: 15px">
																	Quiero contactar al Proveedor! </p>
															</div>
														</td>
													</tr>
													<tr> <td> <div style="border-top: 2px solid #ddd; position: relative; z-index: 2;">
																<!-- Mensaje de validacion para el formulario de mensaje -->
																<?php
																if ($this->session->flashdata('validacion_incorrecta')) {
																	?>
																	<p><?= $this->session->flashdata('validacion_incorrecta') ?></p>
																<?php } ?>

																<!-- Formulario de contactar al proveedor -->
																<?php $producto = $nombre_producto->nom_producto; ?>
																<?php $imagen_producto = $img_mensaje->nombre_img; ?>
																<?php $id_user = $this->uri->segment(4); ?>
																<?= form_open_multipart('control_producto/enviar') ?>
																<input type="hidden" name="id_producto" value="<?= $this->uri->segment(3); ?>">
																<input type="hidden" name="iduser" value="<?= $this->uri->segment(4); ?>">
																<table style="width: 100%; border-spacing: 0px;">
																	<tr> <td colspan="3" style="padding-top: 32px;"> </td> </tr>
																	<tr>
																		<td width="300px" style="color: black; text-align: right; float: left; line-height: 25px; height: 29px;" class="titulo">
																			<font color="red"> * </font> Quien envía el mensaje: </td>
																		<td class="subtitulo">
																			<?php echo form_error('from'); ?>
																			<input onclick="JavaScript:document.getElementById('launch_popup').click();" type="text" name="from" style="width: 196px; height: 26px; margin-left: 0px; border: 1px solid #ddd;" /> </td>
																		<td>
																			<div style="width: 350px; margin-left: -295px; float: left; line-height: 26px; color: rgb(189, 189, 189);">Ingrese el nombre de la persona de Contacto</div>
																		</td>
																	</tr>
																	<tr> <td style="padding-top: 10px;"> </td> </tr>
																	<tr>
																		<td width="300px" style="color: black; text-align: right; float: left; line-height: 25px; height: 29px;" class="titulo">
																			<font color="red"> * </font> E-mail de quien envia el mensaje: </td>
																		<td class="subtitulo">
																			<?php echo form_error('from'); ?>
																			<input onclick="JavaScript:document.getElementById('launch_popup').click();" type="text" name="from" style="width: 196px; height: 26px; margin-left: 0px; border: 1px solid #ddd;" /> </td>
																		<td>
																			<div style="width: 350px; margin-left: -295px; float: left; line-height: 26px; color: rgb(189, 189, 189);">Ingrese su e-mail o su usuario</div>
																		</td>
																	</tr>
																	<tr> <td style="padding-top: 10px;"> </td> </tr>
																	<tr>
																		<td width="300px" style="color: black; text-align: right; float: left; line-height: 25px; height: 29px;" class="titulo">
																			<font color="red"> * </font> Teléfono de contacto: </td>
																		<td class="subtitulo">
																			<?php echo form_error('tel'); ?>
																			<input onclick="JavaScript:document.getElementById('launch_popup').click();" type="text" name="tel" style="width: 196px; height: 26px; margin-left: 0px; border: 1px solid #ddd;" /> </td>
																		<td>
																			<div style="width: 248px; margin-left: -295px; float: left; line-height: 14px; color: rgb(189, 189, 189);">Ingrese un numero celular o fijo al que quiera ser contactado</div>
																		</td>
																	</tr>
																	<tr> <td style="padding-top: 10px;"> </td> </tr>
																	<tr>
																		<td width="300px" style="color: black; float: left; text-align: right;" class="titulo"> Producto: </td>
																		<td class="subtitulo">
																			<table width="auto" style="margin-left: 0px;"> <tr>
																					<td width="15%">
																						<img src="<?= base_url() ?>uploads/resize<?= $img_mensaje->nombre_img; ?>"
																							 style="width: auto; height: auto; max-width: 80px; max-height: 50px;" /> </td>
																					<td width="80%" style="vertical-align: middle;"> <a href="#">
																							<?php echo $nombre_producto->nom_producto; ?> </a> </td>
																				</tr> </table>
																		</td>
																	</tr>
																	<tr> <td style="padding-top: 10px;"> </td> </tr>
																	<tr>
																		<td width="300px" style="float: left; text-align: right; color: black;" class="titulo"> <font color="red"> * </font> Mensaje: </td>
																		<td class="subtitulo">
																			<?php echo form_error('msj'); ?>
																			<textarea onclick="JavaScript:document.getElementById('launch_popup').click();" rows="10" name="msj" cols="50" style="margin-left: 0px; width: 495px; height: 103px; border: 1px solid #ddd; resize: none; font-family: Arial;"></textarea> </td>
																	</tr>
																	<tr> <td style="padding-top: 10px;"> </td> </tr>
																	<tr>
																		<td width="149px" class="titulo">  </td>
																		<td class="subtitulo" style="float: right; text-align: right; padding-right: 17px;">
																			<a href="#">
																				<input type="image" name="boton"   src="<?= base_url() ?>img/envi.png" />
																			</a>
																		</td>
																	</tr>
																</table>
																<?= form_close() ?>  <!--  cierra  el formulario -->
															</div> </td> </tr>
												</table> </div>
										</div>
									</td>
									<!-- informacion de la empresa -->
									<td>
										<div class="grid_2" style="border: 2px solid #e8e8e8; height: auto; width: 314px; margin: 10px 0px 0px; margin-left: 178px; background: white;">
											<center> <div style="padding: 3px 5px 0px 5px; font-size: 13px; vertical-align: middle;">
													<p style="text-align: left; color: #00a2e8; font-size: 18px; font-weight: bold; padding-bottom: 5px;">
														<?= $info_empresa->nombre ?> </p>
													<table width="100%" style="border-collapse: separate; border-spacing: 2px; font-size: 12px;">
														<tr> <td>
																<b style="padding-right: 3px;"> Ciudad: </b>
																<?= $ciudad->ciudad ?>
															</td> </tr>
														<tr> <td>
																<b style="padding-right: 3px;"> Tipo de empresa: </b>
																<?= $tipo_empresa->tipo ?>.
															</td> </tr>
														<tr> <td>
																<b style="padding-right: 3px;"> Productos principales: </b>
																<?php
																foreach ($otros_pro as $row):
																	echo $row->nombre_producto . ' ';
																	?>
																<?php endforeach; ?>
															</td> </tr>
														<tr> <td>
																<b style="padding-right: 3px;"> Productos publicados: </b>
																<a href="#" style="color: blue;"> <?php echo $prod_publicados; ?> - Ver productos </a>
															</td> </tr>
													</table>
												</div> </center>
										</div>
									</td>
								</tr> </table>
					</div>

					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- Otro producto relacionados con ...(nombre producto) / mas productos de esta categoria -->
					<!-- <div class="grid_2" style="height: 580px; width: 1251px; margin-left: 14px; margin-top: 12px; background: transparent;">
						<div style="padding: 20px 20px 10px 28px;"> -->
							<!-- Los usuarios que encontraron éste producto también buscaron -->
							<!-- <table width="100%">
								<thead> <tr> <td colspan="5" style="font-weight: bold; font-size: 15px; padding-bottom: 31px;">
											Otros productos relacionados con <p style="color:#ff7f27; margin-top: -18px; margin-left: 246px; font-size: 15px;"> <?php echo $nombre_producto->nom_producto; ?></p>
										</td> </tr> </thead>
								<style type="text/css">
									#img_a {
										width: auto;
										max-width: 172px;
										height: auto;
										max-height: 130px;
										vertical-align: middle;
									}
								</style>
								<tbody> <tr>
										<td width="245.2px">
											<table width="100%">
												<tr> <td style="padding-bottom: 10px; text-align: center;">
														<img id="img_a" src="<?= base_url() ?>img/tuberia_2.png" />
													</td> </tr>
												<tr> <td style="text-align: center; padding-bottom: 5px;"> <p id="desc_a1"> <a href="#" style="font-size: 15px; color: #00a2e8;">
																iPad 4 16 GB + Wifi + 3g + accesorios
															</a> </p> </td> </tr>
											</table>
										</td>
										<td width="245.2px">
											<table width="100%">
												<tr> <td style="padding-bottom: 10px; text-align: center;">
														<img id="img_a" src="<?= base_url() ?>img/arroz.png" />
													</td> </tr>
												<tr> <td style="text-align: center; padding-bottom: 5px;"> <p id="desc_a2"> <a href="#" style="font-size: 15px; color: #00a2e8;">
																iPad 4 16 GB + Wifi + 3g + accesorios
															</a> </p> </td> </tr>
											</table>
										</td>
										<td width="245.2px">
											<table width="100%">
												<tr> <td style="padding-bottom: 10px; text-align: center;">
														<img id="img_a" src="<?= base_url() ?>img/maquinaria.png" />
													</td> </tr>
												<tr> <td style="text-align: center; padding-bottom: 5px;"> <p id="desc_a3"> <a href="#" style="font-size: 15px; color: #00a2e8;">
																iPad 4 16 GB + Wifi + 3g + accesorios
															</a> </p> </td> </tr>
											</table>
										</td>
										<td width="245.2px">
											<table width="100%">
												<tr> <td style="padding-bottom: 10px; text-align: center;">
														<img id="img_a" src="<?= base_url() ?>img/cosarara.png" />
													</td> </tr>
												<tr> <td style="text-align: center; padding-bottom: 5px;"> <p id="desc_a4"> <a href="#" style="font-size: 15px; color: #00a2e8;">
																iPad 4 16 GB + Wifi + 3g + accesorios
															</a> </p> </td> </tr>
											</table>
										</td>
										<td width="245.2px">
											<table width="100%">
												<tr> <td style="padding-bottom: 10px; text-align: center;">
														<img id="img_a" src="<?= base_url() ?>img/ruedagris.png" />
													</td> </tr>
												<tr> <td style="text-align: center; padding-bottom: 5px;"> <p id="desc_a5"> <a href="#" style="font-size: 15px; color: #00a2e8;">
																iPad 4 16 GB + Wifi + 3g + accesorios
															</a> </p> </td> </tr>
											</table>
										</td>
									</tr> </tbody>
							</table>

							<br> <br> -->

							<!-- Más productos de ésta categoría -->
<!-- 							<table width="100%">
								<thead> <tr> <td colspan="5" style="font-weight: bold; font-size: 18px; padding-bottom: 22px;">
											Otros productos de <p style="color:#ff7f27; margin-top: -20px; margin-left: 175px; font-size: 17px;"> <?= $info_empresa->nombre ?> </p>
										</td> </tr> </thead>
								<tbody> <tr>
										<td width="245.2px">
											<table width="100%">
												<tr> <td style="padding-bottom: 10px; text-align: center;">
														<img id="img_a" src="<?= base_url() ?>img/tuberia_2.png" />
													</td> </tr>
												<tr> <td style="text-align: center; padding-bottom: 5px;"> <p id="desc_b1"> <a href="#" style="font-size: 15px; color: #00a2e8;">
																iPad 4 16 GB + Wifi + 3g + accesorios
															</a> </p> </td> </tr>
											</table>
										</td>
										<td width="245.2px">
											<table width="100%">
												<tr> <td style="padding-bottom: 10px; text-align: center;">
														<img id="img_a" src="<?= base_url() ?>img/arroz.png" />
													</td> </tr>
												<tr> <td style="text-align: center; padding-bottom: 5px;"> <p id="desc_b2"> <a href="#" style="font-size: 15px; color: #00a2e8;">
																iPad 4 16 GB + Wifi + 3g + accesorios
															</a> </p> </td> </tr>
											</table>
										</td>
										<td width="245.2px">
											<table width="100%">
												<tr> <td style="padding-bottom: 10px; text-align: center;">
														<img id="img_a" src="<?= base_url() ?>img/maquinaria.png" />
													</td> </tr>
												<tr> <td style="text-align: center; padding-bottom: 5px;"> <p id="desc_b3"> <a href="#" style="font-size: 15px; color: #00a2e8;">
																iPad 4 16 GB + Wifi + 3g + accesorios
															</a> </p> </td> </tr>
											</table>
										</td>
										<td width="245.2px">
											<table width="100%">
												<tr> <td style="padding-bottom: 10px; text-align: center;">
														<img id="img_a" src="<?= base_url() ?>img/cosarara.png" />
													</td> </tr>
												<tr> <td style="text-align: center; padding-bottom: 5px;"> <p id="desc_b4"> <a href="#" style="font-size: 15px; color: #00a2e8;">
																iPad 4 16 GB + Wifi + 3g + accesorios
															</a> </p> </td> </tr>
											</table>
										</td>
										<td width="245.2px">
											<table width="100%">
												<tr> <td style="padding-bottom: 10px; text-align: center;">
														<img id="img_a" src="<?= base_url() ?>img/ruedagris.png" />
													</td> </tr>
												<tr> <td style="text-align: center; padding-bottom: 5px;"> <p id="desc_b5"> <a href="#" style="font-size: 15px; color: #00a2e8;">
																iPad 4 16 GB + Wifi + 3g + accesorios
															</a> </p> </td> </tr>
											</table>
										</td>
									</tr> </tbody>
							</table>
						</div>
					</div>
 -->
					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- publicidad -->
					<!-- <center>
						<div class="grid_2" style="height: auto; width: 1216px; margin: 10px 0px 45px 46px; background:#ffffff;">
							<img src="<?= base_url() ?>img/publi_long.png" />
						</div>
					</center> -->

					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- footer -->
					<!-- <div class="grid_2" id="foo">
						<iframe src="<?= base_url() ?>footer" scrolling="no"
								style="height: 333px; width: 100%; margin-left: 0px;">
						</iframe>
					</div>
			</section> </article>
	</body>
</html> -->
</div>


<!-- funcionalidad de msj en popup -->
<?php 
  $id_producto = $this->uri->segment(3); 
  $reffer= "none";
  if($this->session->flashdata('reffer')) 
  	{	$reffer=$this->session->flashdata('reffer');	}
  ?>
  <script type="text/javascript">
 	   reffer= "<?=$reffer?>";
	     document.onload= start();
	     function start()
	       {
		       	var popup=new XMLHttpRequest();
		       	var url_popup="<?=base_url()?>popup/contactar/<?=$id_producto?>/1";
				var msj_enviado = "<?=$this->session->flashdata('mensaje_enviado')?>"=="DONE";
				if (msj_enviado)
				{	url_popup="<?=base_url()?>popup/confirmar_mensaje";	}

				popup.open("GET", url_popup, true);
				popup.addEventListener('load',show,false);
				popup.send(null);

				function show()
					{
						cotizar=document.getElementById('cotizar');
						console.log(popup.response);
						cotizar.innerHTML=popup.response;

	       				if (msj_enviado)
						{  	document.getElementById('confimacion_msj_enviado').click();	}
						else
						{ 
							error_login ="<?=$this->session->flashdata('session')?>";
			                mensaje = "<?=$this->session->flashdata('reffer')?>";
			                if(error_login!="Done"&&mensaje=="mensaje")
			                {
			                  document.getElementById('#login').click();
			                }else
			                if(mensaje=="mensaje")
			                {
								document.getElementById('btn_contactar').click();
								<?=$this->session->set_flashdata('reffer',FALSE)?>
							}								
						}  					
					}
			}
	</script>
  <div id="cotizar">
    </div>
