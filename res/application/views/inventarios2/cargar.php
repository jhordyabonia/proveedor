<br>
<br>
<br>
<br>
<br>
    	<CENTER><br><br><br>
	    	<?=form_open_multipart(base_url().'inventarios2/cargar')?>
	    	<table border="0">
				<tr>
					<td><input type="file" name="file" value="<?=$namefile?>">
					<td></td><td><?=form_submit('submit', 'Subir')?>
	    	</table>
			<?=form_close()?>
    	</CENTER>