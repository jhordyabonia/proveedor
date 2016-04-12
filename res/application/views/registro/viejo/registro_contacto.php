<!DOCTYPE html>  
<html lang="es">
	<head>
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>Registro II / PROVEEDOR.com.co</title>
		<meta charset='utf-8'>
		<link rel="shortcut icon" href="<?php echo img_url(); ?>logoweb.ico" type="image/x-icon"/>
		<link type='text/css' rel="stylesheet" href="<?php echo css_url();  ?>registro.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="<?php echo css_url();  ?>bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo css_url();  ?>buttons.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"> </script> 
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"> </script>
		<script type="text/javascript" src="<?php echo js_url(); ?>buttons.js"> </script>

	   <script type="text/javascript">
			$(document).on("ready",function(){
				$(document).on("click", function(e){
					if($(e.target).attr("class") == "error"){
						$(".error").hide();
							// $(":input:first").focus();
						}
				});
			});
	   </script>

	   <script type="text/javascript">
			$(document).ready(function(){
				$(".provincia").change(function(){
					var id=$(this).val();
					var dataString = 'id='+ id; 
					$.ajax({ 
						type: "POST",
						url: '<?php echo base_url(),"registro/municipio_select";?>',
						data: dataString, 
						cache: false,
						success: function(html){ 
							$(".municipio").html(html);
						} 
					}); 
				}); 
			});
		</script>

	   <style type="text/css">
			.error{
				position:absolute;
				background: transparent;
				font-size: 8pt;
				color: blue;
				width: 350px;
				text-align: center;
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

			/* header 1 */
			#header1 {
				text-align: right; 
				margin-right: 94px; /* margin-right: 168px; */
				margin-top: 10px;
			}

			/* texto "Paso 2 de 3" */
			#textopaso_nde3 {
				font-size: 16px; 
				color: #ff7f27; 
				margin: 10px 63px 0px 0px; /* margin: 10px 145px 0px 0px; */
				font-family: 'Arial Rounded MT Bold', Arial, sans-serif;
				text-align: right;
			}

			/* simbolo plus + para unir campo de pbx */
			#simboloplus {
				margin: 0; 
				display: -webkit-inline-box; 
				color: #c3c3c3; 
				font-size: 23px;
				height: 20px;
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

				/* texto "Paso 2 de 3" */
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
						<a href="<?=base_url()?>index"> 
							<img align="right" src="<?php echo img_url(); ?>logo3.png" style="/*width: 215px; height: 61px;*/"> </a> 
					</div>
					<div class="col-md-9" style="margin-top: 15px;" id="recorte"> 
						<img src="<?php echo img_url(); ?>header2.png" >
						<p id="textopaso_nde3"> Paso 2 de 3 </p>
					</div>
				</div> <!--Fin Row-->

				<div class="row">
					<div class="col-md-12"> <br> </div>
				</div>

				<div class="row">
					<div class="col-md-3"> </div>

					<div class="col-md-6" style="color:#808080;">
						<!--Etiqueta que abre el formulario del  framework  -->
						<?= form_open("/registro/registrar/2/".$id_registro);?>
							<table align="center" style="border-collapse: separate; border-spacing: 4px; width: 100%;">
								<tr>
									<td> </td>
									<td align="left">
										<p style="color: #ff7f27; font-size: 19px; padding-right: 70px; 
											font-family: 'Arial Rounded MT Bold', Arial, sans-serif; padding-left: 15px;">
											¡Quiero Registrarme!</p>
									</td>
								</tr>
								<tr>
									<td>
										<p style="float: right; font-size: 12px; margin: 0;">
											<font color="red">*</font>&#32;Nombre y Apellido: </p>
									</td>
									<td>
										<input type="text" name="nombre" style="width: 229px; height: 25px;" value="<?php echo set_value('nombre'); ?>">
										<!-- <?php /* echo form_error('nombre', '<div class="error">', '</div>'); */ ?> -->
										<?php echo form_error('nombre', '<span class="tooltip_perso">', '</span>'); ?>
									</td>
								</tr>
								<tr>
									<td>
										<p style="float: right;font-size: 12px; margin: 0;">
											<font color="red">*</font>&#32;Cargo/Función en la empresa: </p>
									</td>
									<td> 
										<input type="hidden" name ="id_registro" value="<?=$id_registro?>">
										<input type="text" name="cargo" style="width: 229px; height: 25px;" 
											value="<?php echo set_value('cargo'); ?>">
										<!-- <br><?php echo form_error('cargo', '<div class="error">', '</div>'); ?> -->
										<?php echo form_error('cargo', '<span class="tooltip_perso">', '</span>'); ?>
									</td> <!-- </p> -->
								</tr>
								<tr>
									<td>
										<span style="float: right;font-size: 12px; margin: 0;">
											<font color="red">*</font>&#32;Dirección de la Empresa: </span>
									</td>
									<td>
										<input type="text" name="direccion" style="width: 229px; height: 25px;" 
											value="<?php echo set_value('direccion'); ?>">
										<!-- <br><?php echo form_error('direccion', '<div class="error">', '</div>'); ?> -->
										<?php echo form_error('direccion', '<span class="tooltip_perso">', '</span>'); ?>
									</td>
								</tr>

								<tr>
									<td>
										<p style="float: right;font-size: 12px; margin: 0;">
											<font color="red">*</font>&#32;Pais: </p>
									</td>
								<td>
									<script type="text/javascript">
										document.onload= cambio_pais();
										function cambio_pais()
										{
											if(pais.value=="52")
											{ 					
												document.getElementById('select_provincia').style.display='';
												document.getElementById('label_provincia').style.display='';
												document.getElementById('select_municipio').style.display='';
												document.getElementById('label_municipio').style.display='';
												return;
											}
											
											document.getElementById('select_provincia').style.display='none';
											document.getElementById('label_provincia').style.display='none';
											document.getElementById('select_municipio').style.display='none';
											document.getElementById('label_municipio').style.display='none';
											
											provincia.value=33;
											municipio.value=1113;
										}
									</script>
										<select name="pais" id="pais" style="width: 229px; height: 25px;" class="pais inputbox"
											value="<?=set_value('pais'); ?>" onchange="JavaScript:cambio_pais();" onload="JavaScript:cambio_pais();">
											<option value="0">Selecciona tu pais</option>
											<option value="52">Colombia</option>
											<option value="0"></option>
											<option value="0">------------------------------------------</option>
											<option value="0">SELECCIONAR OTRO PAÍS </option>
											<option value="0"></option>
									        	<?php  foreach($paises as $pais)  {   ?>
									         	<option value="<?=$pais -> id ?>" 
									         		<?php echo set_select('pais',  $pais -> id ); ?> ><?=$pais -> nombre ?></option>
									        	<?php  } ?>        
									   </select>
										<!-- <br><?php echo form_error('pais', '<div class="error">', '</div>'); ?> -->
										<?php echo form_error('pais', '<span class="tooltip_perso">', '</span>'); ?>
									</td>
								<tr>
									<td>
										<div id="label_provincia" style="display:none">
													<p style="float: right;font-size: 12px; margin: 0;">
														<font color="red">*</font>&#32;Departamento: </p>
										</div><!--fin div label_provincia-->
									</td>
									<td>
										<div id="select_provincia" style="display:none">
													<select name="provincia" id="provincia" style="width: 229px; height: 25px;" class="provincia inputbox" value="<?=set_value('provincia'); ?>" >
														<option value="0">Selecciona tu departamento</option>
														<option value="14">CUNDINAMARCA</option>
														<option value="30">VALLE DEL CAUCA</option>
														<option value="2">ANTIOQUIA</option>
														<option value="0">--------</option>
												        	<?php  foreach($dept as $fila)  {   ?>
												         	<option value="<?=$fila -> id_departamento ?>" 
												         		<?php echo set_select('provincia',  $fila -> id_departamento ); ?> ><?=$fila -> nombre ?></option>
												        	<?php  } ?>        
												   </select>
										<!-- <br><?php echo form_error('provincia', '<div class="error">', '</div>'); ?> -->
										<?php echo form_error('provincia', '<span class="tooltip_perso">', '</span>'); ?>
										</div><!--fin div select_provincia-->
									</td>

									
								</tr>
								<tr>
									<td>
										<div id="label_municipio" style="display:none">
										<p style="float: right;font-size: 12px; margin: 0;">
											<font color="red">*</font>&#32;Ciudad / Municipio: </p>
										</div><!--fin div label_municipio-->
									</td>
									<td>
										<div id="select_municipio" style="display:none">
										<select name="municipio"  id="municipio" class="municipio inputbox" style="width: 229px; height: 25px;" value="<?=set_value('municipio');?>
											<option value="0">--Municipios--</option>
											<?php if($municipios){?>
												<?php  foreach ($municipios as $row){ ?>
											<option value="<?=$row->id_municipio?>" 
												<?= set_select('municipio',  $row ->id_municipio ); ?>><?=$row->municipio?></option>
												<?php }  } ?>
										</select> 
										<!-- <br><?php echo form_error('municipio', '<div class="error">', '</div>'); ?> -->
										<?php echo form_error('municipio', '<span class="tooltip_perso">', '</span>'); ?>
									
										</div><!--fin div select_municipio--></td>
								</tr>

								<tr>
									<td>
										<p style="float: right;font-size: 12px; margin: 0;">
											<font color="red">*</font>&#32;Teléfono Celular: </p>
									</td>
									<td>
										<input type="text" name="cel" style="width: 229px; height: 25px;" >
										<?php echo form_error('cel', '<span class="tooltip_perso">', '</span>'); ?>
									</td>
								</tr>
								<tr>
									<td>
										<p style="float: right;font-size: 12px; margin: 0; margin-bottom: 18px;">
											<font color="red">*</font>&#32;Teléfono Fijo y/o PBX: </p>
									</td>
									<td>
										<div style="clear:both;height: 8px;">										
											<input type="text" name="indicativo" style="width: 41px; height: 25px;float:left;" align="left" 
												value="<?php echo set_value('indicativo'); ?>"> 
											<p id="simboloplus" style="float:left;line-height: 20px;margin: 0 4px;"> + </p>
											<input type="text" name="fijo" style="width: 102px; height: 25px;float:left;" value="<?php echo set_value('fijo'); ?>"> 
											<p id="simboloplus" style="float:left;line-height: 20px;margin: 0 4px;"> + </p>
											<input type="text" name="extension" style="width: 42px; height: 25px;float:left;" align="left" 
												value="<?php echo set_value('extension'); ?>">
										</div>
										<br> <center>
											<span style="font-family: 'Arial Rounded MT Bold', Arial, sans-serif; margin-top: -5px; 
												text-align:center; margin-left: -98px; font-size: 12px; color: #c3c3c3;">
												Indicativo + Número telefónico + Extensión</span>
										</center>
										<!-- <p style="margin: 0;"><?php echo form_error('fijo', '<div class="error">', '</div>'); ?></p> -->
										<p style="margin: 0;"><?php echo form_error('fijo', '<span class="tooltip_perso">', '</span>'); ?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p style="float: right; font-size: 12px; margin: 0;">Página web: </p>
									</td>
									<td>
										<input type="text" name="web" style="width: 229px; height: 25px;" value="<?php echo set_value('web'); ?>">
										<!-- <br><?php echo form_error('web', '<div class="error">', '</div>'); ?> -->
										<?php echo form_error('web', '<span class="tooltip_perso">', '</span>'); ?>
									</td>
								</tr>
								<tr>
									<td align="right" colspan="2">
										<button class="button button-flat-primary" type="submit" 
											style="height: 44px; width: 267px; font-size: 22px; margin-right: 91px; margin-top: 20px;
											font-family: 'Arial Rounded MT Bold', Arial, sans-serif;">
											Continuar</button>
									</td>
								</tr>
							</table>
						<?= form_close() ?>
					</div><!--Fin md6-->

					<!-- <div class="col-md-3">
						<div id="left2">
							<p>Beneficios de proveedor.com.co</p>
							<ul>
								<li><img src="<?php echo img_url(); ?>obj1.png" width="65" height="45"><p>Incremente sus ventas!</p></li>
								<li><img src="<?php echo img_url(); ?>obj2.png" width="65" height="45"><p>Chat online!</p></li>
								<li><img src="<?php echo img_url(); ?>obj3.png" width="65" height="45"><p>Catalogo de productos!</p></li>
							</ul>
						</div>
					</div> -->
				</div><!--Fin Row-->
			</div><!--Fin page-header-->

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
		</div> <!--Fin container-->
