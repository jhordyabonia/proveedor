<!DOCTYPE html>
<html lang="es">
	<head>
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>Registro I / PROVEEDOR.com.co</title>
		<meta charset='utf-8'>
		<link rel="shortcut icon" href="<?php echo img_url(); ?>logoweb.ico" type="image/x-icon"/>
		<link type='text/css' rel="stylesheet" href="<?php echo css_url(); ?>registro.css">
		<!-- -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="<?php echo css_url(); ?>bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo css_url(); ?>buttons.css">
		<!--<link rel="stylesheet" href="<?php echo css_url(); ?>validationEngine.jquery.css" type="text/css"> -->
		<script src="http://www.position-relative.net/creation/formValidator/js/jquery-1.7.2.min.js" type="text/javascript"> </script>
		<script src="<?php echo js_url(); ?>jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"> </script>
		<script src="http://www.position-relative.net/creation/formValidator/js/jquery.validationEngine.js" 
			type="text/javascript" charset="utf-8">
		</script>

		<script type="text/javascript">
			// 	jQuery(document).ready(function(){
			// 		// binds form submission and fields to the validation engine
			// 		jQuery("#formID").validationEngine();
			// 	});

			// 	*
			// 	*
			// 	* @param {jqObject} the field where the validation applies
			// 	* @param {Array[String]} validation rules for this field
			// 	* @param {int} rule index
			// 	* @param {Map} form options
			// 	* @return an error string if validation failed

			$(document).on("ready",function(){
		    $(document).on("click", function(e){    
		        if($(e.target).attr("class") == "error"){
		            $(".error").hide();
		            // $(":input:first").focus();
		        }
		    });
			});
		</script> 

		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"> </script> 
		<script type="text/javascript" src="<?php echo js_url(); ?>buttons.js"> </script>

	<!-- Con este script manejamos el evento cuando el boton ingresar es presionado -->
	<script src="<?=base_url()?>js/jquery-1.9.1.js" type="text/javascript" charset="utf-8"> </script>


		<!-- estilos css generales -->
		<style>
			.texto{
				font-family:Arial,Helvetica,sans-serif;	
			}

			/*  ---- Estilos para los mensajes de error -----*/
			/*.error {
				position:absolute;
				font-size: 8pt;
				box-shadow: 10px 5px 20px #58ACFA; 
				border-radius: 20px;  
				background-color:#ddd;
				width:250px;
				padding:10px;
				float: left;
				/*color: blue;
				width: 350px;
			} */

			span.tooltip_perso {
				/* tooltip creado con http://csstooltip.com/ */
				position: absolute;
				width: 225px;
				height: 40px;
				padding: 3px;
				font-size: 13px;
				line-height: 15px;
				text-align: center;
				color: red;
				background: rgb(255, 255, 255);
				border: 1px solid #DDD;
				border-radius: 2px;
				text-shadow: rgba(0, 0, 0, 0.0980392) 1px 1px 1px;
				box-shadow: rgba(0, 0, 0, 0.4) 2px 2px 5px 0px;
				z-index: 3;
				margin-left: 22px;
				margin-top: -6px;
			}

			span.tooltip_perso:after {
				content: "";
				position: absolute;
				width: 0;
				height: 0;
				border-width: 10px;
				border-style: solid;
				border-color: #fff #ddd #fff #fff;
				top: 9px;
				left: -21px;
			}

			/* header 1 */
			#header1 {
				text-align: right; 
				margin-right: 94px; /* margin-right: 168px; */
				margin-top: 10px;
			}

			/* texto "Paso 1 de 3" */
			#textopaso_nde3 {
				font-size: 16px; 
				color: #ff7f27; 
				margin: 10px 63px 0px 0px; /* margin: 10px 145px 0px 0px; */
				font-family: 'Arial Rounded MT Bold', Arial, sans-serif;
				text-align: right;
			}

			/* estilos cuatro links (publique sus productos online, incremente...) */
			#cuatrolinks {
				text-align: center;
				background: white;
				margin-top: -3px;
				height: 50px;
				border-radius: 3px;
			}

			/* separador abajo de #cuatrolinks */
			#separador {
				height: 6px;
				background: #ddd;
				margin-top: 162px;
				margin-left: 48px;
				width: 92%;
			}

			/* publicidad (abajo del separador, footer) */
			#publi_publi {
				height: auto; 
				background:#ffffff; 
				text-align: center;
				margin-top: 28px;
			}

			/* footer */
			#foo {
				margin-top: 40px;
				height: 333px;
				/* width: 1363px; */
				background: #f2f2f2;
			}

			#foo_iframe {
				height: 333px;
				width: 100%;
				margin-left: 0px;
				border: none;
			}
		</style>

		<!-- estilos css resolucion 1024 (estilos by Padre sobrescritos bootstrap) -->
		<style type="text/css">
			@media screen and (max-width: 1024px) {
				/* header 1 */
				#header1 {
					margin-right: 0px; /* margin-right: 23px; */
				}

				/* div col-md-3 del logo proveedor */
				#logoproveedor {
					margin-left: -27px;
					margin-right: -43px;
					z-index: 3;
				}

				/* texto "Paso 1 de 3" */
				#textopaso_nde3 {
					margin: 10px -50px 0px 0px;
				}
			}
		</style>
	</head>
 
	<body>
		<div class="container" id="contenedorcentral" style="padding: auto; margin: auto;">
			<!-- header 1 -->
			<div id="header1">
				<a href="<?=base_url()?>ayuda"> <p style="color: black; margin: 0;"> Ayuda </p> </a>
			</div>
			<div class="page-header" style="margin-top: 0px; border-bottom: none;">
				<!-- logo proveedor (header 2) -->
				<div class="row">
					<div class="col-md-3" id="logoproveedor"> 
						<a href="<?=base_url()?>index"> 
							<img align="right" src="<?php echo img_url() ?>logo3.png" style="/*width: 215px; height: 61px;*/"> </a> 
					</div>
					<div class="col-md-9" style="margin-top: 15px;" id="recorte"> 
						<img src="<?php echo img_url() ?>header1.png" >
						<p id="textopaso_nde3"> Paso 1 de 3 </p>
					</div>
				</div> <!--Fin Row-->
				
				<!-- separador -->
				<div class="row">
					<div class="col-md-12"> <br> </div>
				</div>

				<!-- el resto -->
				<div class="row">
					<!-- el resto / separador izquierda -->
					<div class="col-md-3"> </div>

					<!-- el resto / contenido central formulario -->
					<div class="col-md-6" style="color:#808080;">
						<?=form_open("/registro/registrar/1");?>
						<table class="texto" id="formtable" align="center" width="100%" style="border-collapse: separate;border-spacing: 15px;">
							<tr>
								<td> </td>
								<td align="center">
									<p style="color: #197bdb; font-size: 19px; padding-right: 70px; 
										font-family: 'Arial Rounded MT Bold', Arial, sans-serif;">
										¡Quiero Registrarme!</p>
								</td>
							</tr>
							<!-- </td></tr> -->
							<tr>
								<td align="right" style="font-size: 12px;">
									<font color=red>*</font>&#32;Usuario: 
								</td>
								<td>
									<input type="text" name="usuario" size="40" value="<?php echo set_value('usuario'); ?>" style="float: left;">
									<!-- <?php /*echo form_error('usuario', '<div class="error">', '</div>');*/ ?> -->
									<?php echo form_error('usuario', '<span class="tooltip_perso">', '</span>'); ?>
								</td>
							</tr> 
							<tr>
								<td align="right" style="font-size: 12px;">
									<font color=red>*</font>&#32;Email: 
								</td>
								<td> 
									<input type="text" name="email" size="40" value="<?php echo set_value('email'); ?>" style="float: left;"> 
									<?php /* echo form_error('email', '<div class="error">', '</div>'); */ ?> 
									<?php echo form_error('email', '<span class="tooltip_perso">', '</span>'); ?>
								</td>
							</tr>
							<tr>
								<td align="right" style="font-size: 12px;">
									<font color=red>*</font>&#32;Contraseña: 
								</td>
								<td> 
									<input type="password" name="password" size="40" value="<?php echo set_value('password'); ?>" style="float: left;">
									<?php /* echo form_error('password', '<div class="error">', '</div>'); */ ?>
									<?php echo form_error('password', '<span class="tooltip_perso">', '</span>'); ?>
								</td>
							</tr>
							<tr>
								<td align="right" style="font-size: 12px;">
									<font color=red>*</font>&#32;Confirma la contraseña: 
								</td>
								<td>
									<input type="password" name="password2" size="40" value="<?php echo set_value('password2'); ?>" style="float: left;">
									<?php /* echo form_error('password2', '<div class="error" id="pass2">', '</div>'); */ ?>
									<?php echo form_error('password2', '<span class="tooltip_perso">', '</span>'); ?>
								</td>
							</tr>
							<tr>
								<td align="right" style="font-size: 12px;">
									<font color=red>*</font>&#32;¿Qué vas hacer?
								</td>
								<td id="btnspace" style="font-size: 13px; word-spacing: 5px;">
									<div style="margin-right: 24px; float: left;">
										<input type="radio" name="radio" value="Comprador">&#32;Comprar
									</div>
									<div style="margin-right: 24px; float: left;">
										<input type="radio" name="radio" value="Vendedor">&#32;Vender
									</div>
									<div style="margin-right: 24px; float: left;">
										<input type="radio" name="radio" value="Ambos">&#32;Ambos
									</div>
									<?php /* echo form_error('radio', '<div class="error" style="margin-left: 276px;">', '</div>'); */ ?>
									<?php echo form_error('radio', '<span class="tooltip_perso" style="margin-left: 15px;">', '</span>'); ?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<tr>
										<td> </td>
										<td align="center" style="padding-right: 70px;">
											<button class="button button-flat-primary" type="submit"
												style="height: 45px; width: 245px; font-size: 22px; 
													font-family: 'Arial Rounded MT Bold', Arial, sans-serif;">
												Continuar </button>
										</td>
									</tr>
								</td>
							</tr>
						</table>
						<?= form_close() ?>
					</div><!--Fin md6-->

					<!-- el resto / aside derecho -->
					<div class="col-md-3 texto">
						<div id="left1" style="border: none;">
							<p style="font-size: 17px; font-family: 'Arial Rounded MT Bold', Arial, sans-serif; font-weight: normal;"> 
								¿Ya estás registrado? </p>
							<button class="button button-flat" type="button" onclick="$(location).attr('href','<?=base_url()?>logueo');" 
								style="width: 113px; height: 36px; font-size: 16px; color: #00a2e8; 
								font-family: 'Arial Rounded MT Bold', Arial, sans-serif; font-weight:normal;" id="ingresar"> 
								Ingresar </button>
						</div>
						<!-- <div id="left2">
							<p>Beneficios de proveedor.com.co</p>
							<ul>
								<li><img src="<?php echo img_url() ?>obj1.png" width="65" height="45"><p>Incremente sus ventas!</p></li>
								<li><img src="<?php echo img_url() ?>obj2.png" width="65" height="45"><p>Chat online!</p></li>
								<li><img src="<?php echo img_url() ?>obj3.png" width="65" height="45"><p>Catalogo de productos!</p></li>
							</ul>
						</div> -->
					</div>
					<center><img src="<?=base_url()?>img/register-copy.png"></center>       
					<div id="cuatrolinks"> 
				</div><!--Fin Row-->		
			</div><!--Fin page-header-->

			<!-- el footer -->
			<footer>
				<div class="row" style="background: white;">
					<!-- <div class="col-md-4"> a </div>
					<div class="col-md-4"> b </div>
					<div class="col-md-4"> c </div> -->
					
					<!--            
						<a href="#"><img src="<?php echo img_url() ?>12.png" style="margin-left: -21px; margin-top: 4px;"></a>
						<a href="#"><img src="<?php echo img_url() ?>22.png" style="margin-left: 28px; margin-top: 4px;"></a>
						<a href="#"><img src="<?php echo img_url() ?>32.png" style="margin-top: 4px; margin-left: 20px;"></a>
						<a href="#"><img src="<?php echo img_url() ?>42.png" style="margin-top: 4px; margin-left: 37px;"></a>
					-->
					</div>
					<!--
						<div id="publi_publi">
							<a href="#"> <img src="<?php echo img_url() ?>publi.png" /> </a>
						</div>
					-->
				</div>
			</footer>
		</div><!--Fin container-->
<script type="text/javascript" data-cfasync="false">(function () { var done = false;var script = document.createElement('script');script.async = true;script.type = 'text/javascript';script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript';document.getElementsByTagName('HEAD').item(0).appendChild(script);script.onreadystatechange = script.onload = function (e) {if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {var w = new PCWidget({ c: 'b213225e-cbd8-4e45-8469-19b5d80cfbf6', f: true });done = true;}};})();</script>