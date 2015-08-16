<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesion en proveedor.com.co</title>
	<meta charset='utf-8'>
</head>

<body>
<?= form_open("/logueo/iniciar_sesion");

$usuario = array(
	'name' => 'usuario',
	'placeholder' => 'Escribe  nombre de usuario',
	'size' => '50'
	);


 $password = array(
	'name' => 'password',
	'placeholder' => 'Escribe tu password',
	'size' => '50',
	'type' => 'password'
	);
?>

 <table align="center"  width="45%">
	<tr><td>
	<label><font color=red>*</font>Nombre de Usuario: </td><td><?= form_input(@$usuario) ?></td></tr></label>
<tr><td>
<label><font color=red>*</font>Contraseña: </td><td><?= form_input(@$password) ?></td></tr></label>
<tr><td colspan="2"><center>
<?= form_submit('', 'Ingresar') ?>
</center></td>
</table>

<?= form_close() ?>

</body>
</html>