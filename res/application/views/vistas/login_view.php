<!DOCTYPE html>
<html>
	<head>
		<title>Iniciar sesion</title>
		<meta charset='utf-8'>
	</head>

	<body>
		<form id="login"  action="<?php echo base_url();?>logueo/new_user" method="post" accept-charset="utf-8">
			<label for="usuario">Usuario</label><input type="text" name="usuario" id="usuario" value="<?php echo set_value('usuario');  ?>" />
			<br>
			<label for="password">Contraseña</label><input type="password" name="password" id="password" />
			<br>
			<input type="submit" name="entrar" value="Entrar" id="entrar" />	
		</form>
		<?php 
		    if($this->session->flashdata('usuario_incorrecto'))  {
		    ?>
		    <p><?=$this->session->flashdata('usuario_incorrecto')?></p>
		    <?php
		    } ?>
		<?php echo validation_errors('<div class="error">', '</div>') ?>
		<?php if(isset($error)) echo "<div class=\"error\"> $error </div>"; ?>
	</body>
</html>