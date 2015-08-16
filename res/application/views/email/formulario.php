<h1>Email de contacto</h1>
<?php
echo form_open_multipart('testemail/enviar');
echo form_label('Correo', 'email');
$datos = array(
			  'name'        => 'email',
			  'id'        => 'email',
			);
echo form_input($datos);

echo form_label('Archivo', 'adjunto');
$datos = array(
			  'name'        => 'adjunto',
			  'id'        => 'adjunto',
			);
echo form_upload($datos);

echo form_submit('enviar','enviar');
echo form_close();