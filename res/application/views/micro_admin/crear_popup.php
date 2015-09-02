
	    <title>
	    	Vista e inventario - <?=$excel->titlesheet?>
	    </title>
    <body>    	

		<?=form_open_multipart(base_url().'popup_categoria/crear/TRUE')?>
		<CENTER>
			<br><br>
			<select value="6" name="categoria">
				<?php foreach ($categorias as $key => $categoria):?>
				<option value="<?=$categoria->id_categoria?>"><?=$categoria->nombre_categoria?></option>
				<?php endforeach;?>
			</select>
			<br>
			<table>
			<br>

				<tr><th>Campo<th>Mostrar<th>Titulo
				<tr><td bgcolor="lightgray">Nombre<td bgcolor="lightgray"><input type="checkbox" name="nombre" checked><td bgcolor="lightgray"><input type type="text" name="nombre_titulo" value="Producto o servicio solicitado">
				<tr><td>Descripcion<td><input type="checkbox" name="descripcion" checked><td><input type type="text" name="descripcion_titulo" value="Descripción de la solicitud">
				<tr><td bgcolor="lightgray">Email<td bgcolor="lightgray"><input type="checkbox" name="email" checked><td bgcolor="lightgray"><input type type="text" name="email_titulo" value="E-mail de quien envía el mensaje">
				<tr><td>Nombre Contacto<td><input type="checkbox" name="contacto" checked><td><input type type="text" name="contacto_titulo" value="Nombre y apellido">
				<tr><td bgcolor="lightgray">Nombre empresa<td bgcolor="lightgray"><input type="checkbox" name="empresa" checked><td bgcolor="lightgray"><input type type="text" name="empresa_titulo" value="Nombre de empresa">
				<tr><td>Precio<td><input type="checkbox" name="precio" checked><td><input type type="text" name="precio_titulo" value="Precio máximo a pagar por el total (opcional):">
				<tr><td bgcolor="lightgray">Formas de pago<td bgcolor="lightgray"><input type="checkbox" name="pago" checked><td bgcolor="lightgray"><input type type="text" name="pago_titulo" value="Forma de pago preferida (opcional)">
				<tr><td>Cuidad entrega<td><input type="checkbox" name="ciudad" checked><td><input type type="text" name="ciudad_titulo" value="Ciudad de entrega">
				<tr><td bgcolor="lightgray">Telefono<td bgcolor="lightgray"><input type="checkbox" name="telefono" checked><td bgcolor="lightgray"><input type type="text" name="telefono_titulo" value="Teléfono de contacto">
			</table>
			<br>
			<table>
			<tr><td bgcolor="lightgray">Titulo
			<tr><td><textarea name="texto_titulo" cols="70" rows="2">
			Sólo ingrese su e-mail y algunos datos necesarios para que le enviemos cotizaciones a su e-mail. Su cotización será enviada a varias empresas.
			</textarea><br>
			<tr><td bgcolor="lightgray">Texto arriba
			<tr><td><textarea name="texto_head" cols="70" rows="5">
			Solo ingrese su teléfono celular o fijo (incluya indicativo) y nos pondremos en contacto para brindarle más información.
			</textarea><br>
			<tr><td bgcolor="lightgray">Texto abajo
			<tr><td><textarea name="texto_body" cols="70" rows="15">

<p class="texto_ceo_1">
Lo ponemos en contacto con empresas 
<br>
<p class="texto_ceo_3">
<br>
Si desea más información contacte a soporte@proveedor.com.co o ingrese a http://www.proveedor.com.co
Sus datos personales serán tratados conforme a nuestra política de privacidad: http://www.proveedor.com.co/proveedor/condiciones Sus datos están seguros con nosotros, respetamos su privacidad .</p>
			</textarea><br>
			</table>
			<br><?=form_submit('submit', 'crear')?>
			
    	<?=form_close()?>
    </CENTER>
	</body>
</html>

