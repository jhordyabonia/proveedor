<!DOCTYPE html>
<html>
	<head>
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>Iniciar Sesión / PROVEEDOR.com.co</title>
		<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" type="image/x-icon"/>
		<meta charset='utf-8'>
		<style>
			.titulo{
				color: #DF7401;
				font-weight:bold;
				font-size: 18pt;
			}
			p{
				font-weight:bold;	
			}
		</style>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>


	 	<!-- estilos css generales -->
	 	<style type="text/css">
	 		body {
				font-family: Arial, sans-serif; 
				margin: 0;
			}

	 		#contenedorcentral {
	 			padding: auto; 
				margin: auto;
				width: 80%;
	 		}

	 		#subcontenedor {
	 			margin: 40px 60px 40px 60px;
	 		}

	 		#caja_login_izq {
	 			width: auto;
	 			height: auto;
	 			padding: 40px 20px 40px 20px;
	 		}
	 		#caja_login_izq2 {
	 			width: auto;
	 			height: auto;
	 			padding: 40px 20px 40px 20px;
	 		}

		 		#logoproveedor {
		 			padding-bottom: 15px; /*padding-bottom: 15px;*/
		 			text-align: center;
		 			width: 290px;
		 		}

		 		#titulo {
		 			padding-bottom: 30px;
		 			text-align: center;
		 		}
		 		#titulo span {
		 			color: black;
		 			font-weight: normal;
					font-size: 22px;
					color: #ff7f27;
					font-family: 'Arial Rounded MT Bold', Arial, sans-serif;
		 		}

	 		#caja_login {
	 			width: auto;
	 			height: auto;
	 			/*margin: 0px 190px 0px 190px;*/
	 			padding: 40px 20px 40px 20px;
	 		}

		 		.campo {
		 			padding: 0;
		 			width: 290px;
					height: 30px;
					font-size: 16px;
		 		}

		 		#separacioncampos {
		 			padding-bottom: 20px;
		 		}

		 		.btnenviar {
		 			height: 45px; 
		 			width: 295px;
		 			font-size: 22px; 
		 			font-family: 'Arial Rounded MT Bold', Arial, sans-serif;
		 			background: #2182dc;
					border: none;
					color: #ffffff;
					cursor: pointer;
		 		}
		 		#boton_registro {
					border: none;
					height: 52px;
					width: 58%;
					border-radius: 4px 4px 4px 4px;
					background: #ff7f27;
					color: white;
					font-size: 16px;
					font-weight: bold;
					margin-top: -10px;
					margin-left: 22%;
				}
				p.text_regis {
					text-align: center;
					font-size: 12px;
					line-height: 29px;
					font-weight: bold;
					color: rgb(116, 116, 116);
				}
	 	</style>
	</head>

	<body>
		<div id="contenedorcentral">
			<div id="subcontenedor"> 
				<table style="width: 100%; border-collapse: separate; border-spacing: 0px;"> <tr>
				<td style="width: 50%; vertical-align: middle;">
					<div id="caja_login_izq">
						<div id="titulo" style="padding-bottom: 10px;"> <span class="titulo"> Bienvenido </span> </div>
						<div id="titulo" style="padding-bottom: 0px;"> <?= $titulo ?> </div>
						<div class="" id="caja_login_izq2">
          					<div class="container_regis">
            					<button id="boton_registro" onclick="JavaScript:location.replace('<?=base_url()?>registro/registrar');">REGISTRO GRATIS!</button>
            					<p class="text_regis">Es Fácil y Rápido</p>
          					</div>
      					</div>

						<?php echo validation_errors(); ?>
						<br>
						<?php if($this->session->flashdata('registro_completo'))  { ?>
							<p>
								<font color="orange" size="3"><?=$this->session->flashdata('registro_completo')?></font>
							</p>
							<p>
								<font color="orange" size="3">Ahora ya puedes iniciar sesión para publicar y vender productos!</font>
							</p>
							<?php
						} ?>
					</div>
				</td>
				<td style="width: 50%;">
					<div id="caja_login">
						<?php 
						echo form_open(base_url().'logueo/new_user')?>
							<table style="width: 100%; border-collapse: separate; border-spacing: 0px; font-size: 17px; color: #777777;">
								<tr> <td>
									<div id="logoproveedor">
									<a href="#"> <img src="<?=base_url()?>img/logo3.png"> </a> </div>
								</td> </tr>
								<tr> <td>
									<label for="usuario">Usuario</label>
								</td> </tr>
								<tr> <td id="separacioncampos">
									<input type="text" name="usuario" id="usuario" class="campo" value="<?php echo set_value('usuario'); ?>" />
								</td> </tr>
								<tr> <td>
									<label for="password">Contraseña</label>
								</td> </tr>
								<tr> <td id="separacioncampos">
									<input type="password" name="password" id="password" class="campo" />
								</td> </tr>
								<tr> <td style="padding-top: 10px;">
									<?=form_hidden('token',$token)?>
									<input type="submit" name="entrar" value="Entrar" id="entrar" class="btnenviar"  />
								</td> </tr>
								<tr> <td style="padding-top: 25px;">
									¿Olvidó su contraseña? Por favor envíe</td>
								 </tr>
								 <tr> <td style="">
								 	 un correo a: soporte@proveedor.com.co
									 </td>
								 </tr>
							</table>
						<?=form_close()?>
					</div>

					<?php if($this->session->flashdata('usuario_incorrecto'))  { ?>
						<p><?=$this->session->flashdata('usuario_incorrecto')?></p>
					<?php } ?>
				</td>
			</tr> </table> </div>
		</div>
		
	</body>
</html>