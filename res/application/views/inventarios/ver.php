<!DOCTYPE html>
<html>
    <head>
	    <title>
	    	Vista e inventario - <?=$excel->titlesheet?>
	    </title>
    </head>
    <body>    	

		<?=form_open_multipart(base_url().'inventarios/registrar/'.$id_empresa)?>
			<table>
				<?php foreach($excel->values as $key => $row) : ?>		
					<tr>
						<?php foreach ($row as $col) : ?>
							<td><input type="text" disabled value="<?=$col?>"></td>
						<?php endforeach; ?>
						<td>
							<input type="file" name="imagenes_<?=$key?>" onchange="JavaScript:alert(this.value);"
							 		style="color:red;"/>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
			<input type='hidden' value="<?=$url_full?>" name="url_full">
			<input type="hidden" name="id_empresa" value="<?=$id_empresa?>">
			<?=form_submit('submit', 'registrar')?>
    	<?=form_close()?>
	</body>
</html>

