 	

		<CENTER>
		<?=form_open_multipart(base_url().'inventarios/registrar/'.$id_empresa."/".$url_full."/".$page)?>
			<br><br>
			<table>
				<?php $count=0;?>
				<?php for($key=$page;$key<$excel->number_rows; $key++) : ?>	
					<tr>
						<td >
							<?php 
							$count++;
							if($count>9)
								{break;}
							?>
							<input style="margin-top: 10px; margin-botton: 10px;" type="file" name="img_<?=$count?>" />
						</td>
						<?php $count2=0;?>
						<?php foreach ($excel->values[$key] as $col): ?>
							<?php 
							$count2++;
							if($count2<2)
								{continue;}
							?>
								<td><input type="text" disabled value="<?=$col?>"></td>
						<?php endforeach; ?>
						
					</tr>
				<?php endfor; ?>
			</table>
			<br><br>			
			<input type='hidden' value="<?=$url_full?>" name="url_full">
			<input type='hidden' value="<?=$id_empresa?>" name="id_empresa">
			<?=form_submit('submit', 'registrar')?>
    	<?=form_close()?>
    </CENTER>
