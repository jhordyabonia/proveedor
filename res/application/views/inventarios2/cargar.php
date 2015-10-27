
    	<CENTER><br><br><br>
	    	<?=form_open_multipart(base_url().'inventarios2/cargar')?>
	    	<table border="0">
				<tr>
					<td><input type="file" name="file" value="<?=$namefile?>">
				<tr>
					<td></td><td><?=form_submit('submit', 'Upload')?>
		    	<?=form_close()?>
	    	</table>
    	</CENTER>