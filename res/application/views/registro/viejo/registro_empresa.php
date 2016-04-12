<?php
if (isset($_POST["verificaForm"])) {
	$arrayError = array(
		'validate' => array(
			'nombre' =>
			form_error('nombre', '<span class="tooltip_perso" dataname="nombre">', '</span>'),
			'nit' =>
			form_error('nit', '<span class="tooltip_perso" dataname="nit">', '</span>'),
			'tipo' =>
			form_error('tipo', '<span class="tooltip_perso" dataname="tipo">', '</span>'),
			'descripcion' =>
			form_error('descripcion', '<span class="tooltip_perso" dataname="descripcion">', '</span>'),
			'categorias' =>
			form_error('categorias', '<span class="tooltip_perso" dataname="categorias">', '</span>'),
			'prod1' =>
			form_error('prod1', '<span class="tooltip_perso" dataname="prod1">', '</span>'),
			'prod_int1' =>
			form_error('prod_int1', '<span class="tooltip_perso" dataname="prod_int1">', '</span>'),
			'captcha' =>
			form_error('captcha', '<span class="tooltip_perso" dataname="captcha">', '</span>'),
			'condiciones' =>
			form_error('condiciones', '<span class="tooltip_perso">', '</span>'),
		),
		'captchaSrc' => ($captcha['image']),
		'uploadVerific' => $uploadVerific
	);

	if (!$uploadVerific) {
		$arrayError['validate']['logo'] = '<span class="tooltip_perso">El campo del logo es obligatorio</span>';
	} else {
		$arrayError['validate']['logo'] = '';
	}

	echo json_encode($arrayError);
	return;
}
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>Registro III / PROVEEDOR.com.co</title>
		<meta charset='utf-8'>
		<link rel="shortcut icon" href="<?php echo img_url(); ?>logoweb.ico" type="image/x-icon"/>
		<link type='text/css' rel="stylesheet" href="<?php echo css_url(); ?>registro.css">
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

		<script>
			// tinymce.init({selector:'textarea'});
		</script>

		<!-- Latest compiled and minified JavaScript -->
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo css_url(); ?>buttons.css">		
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script> 
		<script type="text/javascript" src="<?php echo js_url(); ?>buttons.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">

		<script type="text/javascript">
			var x = 0;
			function pasar() {
				// 		if(x!=5){
				// 	var indice = document.forms[0].categoria.options.selectedIndex;
				// 	document.forms[0].categorias.value = document.forms[0].categoria.options[indice].text+'\n'+document.forms[0].categorias.value;
				// 	document.forms[0].categoria.value = document.forms[0].categoria.value-document.forms[0].categoria.options[indice].text;
				// 	x +=1;
				// }else{
				// 	document.getElementById('msj').innerHTML += "Solo 5 categorias.";
				// 	document.getElementById('categoria').disabled=true;
				// 	}

				obj = document.getElementById('categoria');
				if (obj.selectedIndex == -1)
					return;
				valor = obj.value;
				txt = obj.options[obj.selectedIndex].text;
				obj.options[obj.selectedIndex] = null;
				obj2 = document.getElementById('categorias');
				opc = new Option(txt, valor);
				eval(obj2.options[obj2.options.length] = opc);
			}

			// La funcion quitar  esta pendiente .....falta completar la funcionalidad #############
			function quitar() {
				var indice = document.forms[0].categorias.options.selectedIndex;
				var txt = document.getElementById('categoria').value.split('\n');
				txt.splice(parseInt(indice) - 1, 1);
				document.getElementById('categoria').value = txt.join('\n');
			}

			//jquery para la opcion de pasar y quitar categorias
			$().ready(function() {
				$('.pasar').click(function() {
					return !$('#categoria option:selected').remove().appendTo('#categorias');
				});
				$('.quitar').click(function() {
					return !$('#categorias option:selected').remove().appendTo('#categoria');
				});
			});

			//quitar los  div de mensaje de validacion al hacer clic
			$(document).on("ready", function() {
				$(document).on("click", function(e) {
					if ($(e.target).attr("class") == "error") {
						$(".error").hide();
						// $(":input:first").focus();
					}
				});
			});
		</script>

		<!-- Los siguientes estilos seran migrados a un archivo css aparte   -->
		<style type="text/css"> 
			.box {
				float: left;
				width: 250px;
				height: 200px;
				margin: 1px;
				/*border: 1px solid blue;*/
			}

			.box2 {
				float: left;
				width: 80px;
				height: 200px;
				margin: 1px;
				/*border: 1px solid blue;*/
			}

			.box3 {
				float: left;
				width: 300px;
				height: 200px;
				margin: 1px;
				padding-left: 40px;
				/*border: 1px solid blue;*/
			}
			/*.after-box {
			  clear: left;
			}*/

			.error{
				position:absolute;
				background: transparent;
				font-size: 8pt;
				color: blue;
				width: 350px;
				height:30px;
				padding-top: 5px;
			}
		</style>

		<!-- estilos css generales -->
		<style type="text/css">
			span.tooltip_perso {
				/* tooltip creado con http://csstooltip.com/ */
				position: absolute;
				width: 225px;
				height: 32px; /*height: 40px;*/
				padding: 3px;
				font-size: 13px;
				line-height: 12px; /*line-height: 15px;*/
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

			/* fuente c/subtitulo antes de campo texto */
			#fuentesubtitulo {
				font-size: 13px;
				color: #808080;
			}

			/* header 1 */
			#header1 {
				text-align: right; 
				margin-right: 94px; /* margin-right: 168px; */
				margin-top: 10px;
			}

			/* texto "Paso 3 de 3" */
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

		<!-- estilos css resolucion 1024 -->
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

				/* texto "Paso 3 de 3" */
				#textopaso_nde3 {
					margin-right: -50px;
				}
			}
		</style>
	</head>

	<body>
		<div class="container" style="padding: auto; margin: auto;">
			<!-- header 1 -->
			<div id="header1">
				<a href="#"> <p style="color: black; margin: 0;"> Ayuda </p> </a>
			</div>
			<div class="page-header" style="margin-top: 0px; border-bottom: none;">
				<!-- logo proveedor (header 2) -->
				<div class="row">
					<div class="col-md-3" id="logoproveedor"> 
						<a href="<?= base_url() ?>index"> 
							<img align="right" src="<?php echo img_url(); ?>logo3.png" style="/*width: 215px; height: 61px;*/"> </a> 
					</div>
					<div class="col-md-9" style="margin-top: 15px;" id="recorte"> 
						<img src="<?php echo img_url(); ?>header3.png" >
						<p id="textopaso_nde3"> Paso 3 de 3 </p>
					</div>
				</div> <!--Fin Row-->
			</div><!--Fin page-header-->		

			<!-- <div class="row"> <!--primera fila --> <!-- 
				<div class="col-md-3"> </div>
				<div class="col-md-6">
					<p class="text-left">Ingrese la información de la empresa</p> 
				</div>
				<div class="col-md-2" ><p class="text-right" >(<font color="red">*</font>)Datos requeridos</div>
				<div class="col-xs-6 col-sm-6 col-md-4"> </div>
			</div>
			<br> -->

			<?= form_open_multipart('registro/registrar/3') ?> <!--formulario -->
			<?//=form_open_multipart('registro_3/empresa') ?>
			<!-- titulo -->
			<table style="margin-bottom: 8px; width: 100%;"> <tr>
					<td style="text-align: center;">
						<p style="color: #ff7f27; font-size: 19px; font-family: 'Arial Rounded MT Bold', Arial, sans-serif;">
							¡Quiero Registrarme!</p>
					</td>
				</tr> </table>

			<!--1da fila -->
			<div class="row" id="fuentesubtitulo"> 
				<div class="col-md-3"> </div>
				<div class="col-md-2" style="width: 15%; padding-right: 0;">
					<p class="text-right" ><font color="red">*</font><font size="2px">&#32;Nombre de la empresa:</font></p>
				</div>

				<div class="col-md-3" style="width:auto">
					<input type="text" name="nombre" size="30"  value="" style="float: left; margin-left: 1px;"/>
					<!-- <img src="<?= base_url() ?>img/help.png" title="texto de ayuda para este campo" style="margin-left: 5px;"> -->
					<div style="float: left;" id="nombre-error">
						<!-- <?php echo form_error('nombre', '<div class="error">', '</div>'); ?> -->
						<?php echo form_error('nombre', '<span class="tooltip_perso">', '</span>'); ?>
					</div>
				</div>

				<!-- aqui iba tipo empresa -->
			</div>

			<!--2da fila -->
			<div class="row" id="fuentesubtitulo">
				<div class="col-md-3"> </div>
				<div class="col-md-2" style="width:15%;padding-right:0;" >
					<p class="text-right"><font color="red">*</font>&#32;NIT de la empresa / CC:</p>
				</div>

				<div class="col-md-3">
					<input type="text" name="nit" size="30" value="<?php echo set_value('nit'); ?>" 
						   style="float: left; margin-left: 1px; float: left;"/>
					   <!-- <img src="<?= base_url() ?>img/help.png" title="ej 123456789-1" style="margin-left: 5px;"> -->
					<div style="height:30px; float: left;" id="nit-error">
						<!-- <?php echo form_error('nit', '<div  class="error">', '</div>'); ?> -->
						<?php echo form_error('nit', '<span class="tooltip_perso">', '</span>'); ?>
					</div>
				</div>

				<!-- aqui iba logo empresa -->
			</div>

			<!-- 3ra fila -->
			<div class="row" id="fuentesubtitulo">
				<div class="col-md-3"> </div>
				<div class="col-md-2" style="width: 15%; padding-right: 0;">
					<p class="text-right"><font color="red">*</font>&#32;Tipo de empresa: </p>
				</div>

				<div class="col-md-3" style="width:auto;">
					<input type="hidden" name ="id_registro" value="<?=$id_registro?>">
					<select name="tipo" id="tipo" style="width: 213px; float: left; margin-left: 1px;">
						<option value="0">Selecciona una opción</option>
						<?php foreach ($lista as $item) { ?>
							<option value="<?= $item->id_tipoempresa ?>" <?php echo set_select('tipo', $item->id_tipoempresa); ?> ><?= $item->tipo ?>
							</option>
						<?php } ?>
					</select>
					<!-- <img src="<?= base_url() ?>img/help.png" title="texto de ayuda para este campo" style="margin-left: 5px;"> -->
					<div style="height:30px; float: left" id="tipo-error">
						<!-- <?php echo form_error('tipo', '<div class="error">', '</div>'); ?> -->
						<?php echo form_error('tipo', '<span class="tooltip_perso">', '</span>'); ?>
					</div>
				</div>
			</div>  

			<!-- 4ta fila -->
			<div class="row" id="fuentesubtitulo">
				<div class="col-md-3"> </div>
				<div class="col-md-2" style="width: 15%; padding-right: 0;">
					<p class="text-right"> <font color="red">*</font>&#32;Logo de<br>la empresa: </p>
				</div>           

				<div class="col-md-3" style="width:auto;">
					<input type="file" style="width:214px; float: left;" name="userfile" value="<?php echo set_value('userfile', 'userfile'); ?>" 
						   class="input-file">

					<div style="height:30px; float:left" id="logo-error">
						<?php if (@$error) { ?>
							<span class="tooltip_perso"> <?= @$error; ?> </span> 
						<?php } ?>  
						<?php echo form_error('tipo', '<span class="tooltip_perso">', '</span>'); ?>
					</div>

				</div>
			</div>   

			<!--5ta fila -->
			<div class="row" id="fuentesubtitulo" style="margin-bottom: 15px;"> 
				<div class="col-md-3"> </div>
				<div class="col-md-2" style="width:15%;padding-right:0;">
					<br>
					<p class="text-right"><font color="red">*</font>&#32;Descripción de la<br>empresa:</p>
				</div> 

				<div class="col-md-7"> 
					<textarea name="descripcion" rows="4" cols="70" style="float: left;"><?php echo set_value('descripcion'); ?></textarea>
					<!-- <img src="<?= base_url() ?>img/help.png" title="texto de ayuda para este campo" style="margin-left: 5px;"> -->
					<div style="height:30px; float: left;" id="descripcion-error">
						<!-- <?php echo form_error('descripcion', '<div  class="error">', '</div>'); ?> -->
						<?php echo form_error('descripcion', '<span class="tooltip_perso">', '</span>'); ?>
					</div>
				</div> 
			</div>

			<!--6ta fila -->
			<div class="row" id="fuentesubtitulo"> 
				<div class="col-md-3"> </div>
				<div class="col-md-2" style="width:15%;padding-right:0;">
					<br> <br>
					<p class="text-right"><font color="red">*</font> Sector o categoría de <br> la empresa <br><br> Máximo 5 </p>
				</div>

				<div class="col-md-3">
					<select name="categoria[]" id="categoria" multiple="multiple" size="9" style="width: 85%;" >
						<?php foreach ($categorias as $row): ?> 
							<?php echo '<option>' . $row->nombre_categoria . '</option>'; ?>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="col-md-1" style="padding-right:0; padding-left:0;">
					<br> <br>
					<input type="button" value="Pasar »"  style="width: 80%;" class="pasar izq" >				
					<input  type="button" value="« Quitar"  style="width: 80%;" class="quitar der">
				</div>

				<div class="col-md-3">
					<select name="categorias[]" id="categorias"  multiple="multiple" size="9" placeholder="Categorías seleccionadas" style="width: 85%;">
						<?php
						if ($categorias_select) {
							foreach ($categorias_select as $valor) {
								echo '<option>' . $valor . '</option>';
							}
						}
						?>
					</select>
					<!-- <img src="<?= base_url() ?>img/help.png" title="texto de ayuda para este campo" style="margin-left: 5px;"> -->
					<div style="height:30px;" id="categorias-error">
						<!-- <?php echo form_error('categorias', '<div class="error">', '</div>'); ?> -->
						<?php echo form_error('categorias', '<span class="tooltip_perso">', '</span>'); ?>
					</div>
				</div>
			</div> 

			<!--7ta fila -->
			<div class="row" id="fuentesubtitulo"> 
				<div class="col-md-3"> </div>
				<div class="col-md-2" style="width:15%;padding-right:0;">
					<p class="text-right">Productos principales <br>de la empresa:</p>
				</div>

				<div class="col-md-7">
					<input type="text" style="border: 1px solid #ff7f27;" name="prod1" size="20"  value="<?php echo set_value('prod1'); ?>"  />
					<input type="text" style="border: 1px solid #ff7f27;" name="prod2" size="20" value="<?php echo set_value('prod2'); ?>" />
					<input type="text" style="border: 1px solid #ff7f27;" name="prod3" size="20" value="<?php echo set_value('prod3'); ?>" />
					<input type="text" style="border: 1px solid #ff7f27;" name="prod4" size="20" value="<?php echo set_value('prod4'); ?>" />
					<!-- <img src="<?= base_url() ?>img/help.png" title="texto de ayuda para este campo" style="margin-left: 5px;"> -->
					<div style="height:30px;">
						<p style="margin: 0; color: #d4d4d4;"> Ingrese los 4 productos más importantes  que vende su empresa </p>
						<div id="prod1-error">								
							<!-- <?php echo form_error('prod1', '<div  class="error">', '</div>'); ?> -->
							<?php echo form_error('prod1', '<span class="tooltip_perso">', '</span>'); ?>
						</div>
					</div>
				</div>
			</div>

			<!--8ta fila -->
			<div class="row" id="fuentesubtitulo" style="margin-top: 10px; margin-bottom: 10px;"> 
				<div class="col-md-3"> </div>
				<div class="col-md-2" style="width:15%;padding-right:0;">
					<p class="text-right">Productos que le <br>interesan a la empresa:</p>
				</div>

				<div class="col-md-7">
					<input type="text" style="border: 1px solid #00a2e8;" 
						   name="prod_int1" size="20" value="<?php echo set_value('prod_int1'); ?>" />
					<input type="text" style="border: 1px solid #00a2e8;" 
						   name="prod_int2" size="20" value="<?php echo set_value('prod_int2'); ?>" />
					<input type="text" style="border: 1px solid #00a2e8;" 
						   name="prod_int3" size="20" value="<?php echo set_value('prod_int3'); ?>" />
					<input type="text" style="border: 1px solid #00a2e8;" 
						   name="prod_int4" size="20" value="<?php echo set_value('prod_int4'); ?>" />
					   <!-- <img src="<?= base_url() ?>img/help.png" title="texto de ayuda para este campo" style="margin-left: 5px;"> -->
					<div style="height:30px;">
						<p style="margin: 0; color: #d4d4d4;"> Ingrese los 4 productos que más requiere su empresa </p>
						<div id="prod_int1-error">
							<!-- <?php echo form_error('prod_int1', '<div class="error">', '</div>'); ?> -->
							<?php echo form_error('prod_int1', '<span class="tooltip_perso">', '</span>'); ?>
						</div>
					</div>
				</div>
			</div> 

			<!--10ma fila -->
			<div class="row" id="fuentesubtitulo" style="margin-top: 15px;"> 
				<!-- <div class="col-md-3"> </div> -->
				<!-- <div class="col-md-9"> -->

				<table style="width: 100%;"> <tr> <td class="text-center">
							<div style="display: inline; font-size: 14px;">
								<input type="checkbox" name="condiciones[]" value="1" id="acepto" 
									   size="30"  <?php echo set_checkbox('condiciones', '1') ?> />
								<font color="red">*</font>&#32;Acepto los Términos y Condiciones de uso
							</div>
							<div id="condiciones-error" style="position: relative;top: -23px;left: 152px;">							
								<!-- <?= form_error('condiciones', '<div class="error" style="display: inline-flex;">', '</div>'); ?> -->
								<?= form_error('condiciones', '<span class="tooltip_perso">', '</span>'); ?>
							</div>
						</td> </tr> </table>
			</div> 

			<!-- 11va fila -->
			<div class="row" id="fuentesubtitulo" style="text-align: center; margin-top: 10px; margin-bottom: 70px;"> 
				<!-- <div class="col-md-3"> </div>
				<div class="col-md-9"> -->
					<!-- <p class="text-center"> -->
				<button class="button button-flat-primary" type="submit" 
						style="height: 45px; width: 245px; font-size: 22px; font-family: 'Arial Rounded MT Bold', Arial, sans-serif;">
					Listo!</button>
					<!-- </p> -->
				<!-- </div> -->
			</div> 
			<?= form_close() ?> <!--Cierra formulario -->

			<footer>
				<div class="row" style="background: white;">
					<div id="cuatrolinks">
						<a href="#"><img src="<?php echo img_url(); ?>12.png" style="margin-left: -21px; margin-top: 4px;"></a>
						<a href="#"><img src="<?php echo img_url(); ?>22.png" style="margin-left: 28px; margin-top: 4px;"></a>
						<a href="#"><img src="<?php echo img_url(); ?>32.png" style="margin-top: 4px; margin-left: 20px;"></a>
						<a href="#"><img src="<?php echo img_url(); ?>42.png" style="margin-top: 4px; margin-left: 37px;"></a>
					</div>
					<div id="separador"> </div>
					<div id="publi_publi">
						<a href="#"> <img src="<?php echo img_url(); ?>publi.png" /> </a>
					</div>
				</div>
			</footer>	
		</div><!--Fin container-->
