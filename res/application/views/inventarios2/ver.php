 	

		<CENTER>
		<?=form_open_multipart(base_url().'inventarios/registrar/'.$id_empresa)?>
			<br><br>
			<table>
				<?php $end=0; foreach($excel->values as $key => $rows) : ?>	
					<tr>
						<td >							
							<input style="margin-top: 10px; margin-botton: 10px;" type="file" name="img_<?=$key?>" />
						</td>
						<?php foreach ($rows as $key2 => $col): ?>
								<?php if($key2==0&&is_null($col)){$end++; break;}?>
							<td><input type="text" disabled value="<?=$col?>"></td>
						<?php endforeach; ?>						
					</tr>
					<?php if($end>2){break;}?>
				<?php endforeach; ?>
			</table>
			<br><br>			
			<input type='hidden' value="<?=$url_full?>" name="url_full">
			<input type='hidden' value="<?=$id_empresa?>" name="id_empresa">
			<?=form_submit('submit', 'registrar')?>
    	<?=form_close()?>
    </CENTER>
