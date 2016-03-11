<!--
<input name="nombre[]" value="<?=$data[0]?>" type="hidden"> 
<input name="descripcion[]" value="<?=$data[4]?>" type="hidden"> 
<input name="subcategoria" value="<?=$data[3]?>" type="hidden"> 
<script type="text/javascript">
document.onload=send();

function send()
{

}

</script>
<input name="medida" value="<?=$data[0]?>" type="hidden"> 
<input name="pedido_minimo" value="<?=$data[0]?>" type="hidden"> 
<input name="precio" value="<?=$data[0]?>" type="hidden"> 
<input name="formas_de_pago" value="<?=$data[0]?>" type="hidden"> 
-->


		<CENTER>
		<?=form_open_multipart(base_url().'inventarios/registrar_/'.$id_empresa)?>
			<br><br>
<div style="overflow:scroll; height:70%">
			<table>
				<?php $end=0; foreach($excel->values as $key => $rows) : ?>	
						<?php if(is_null($rows[0])){$end++; continue;}?> 
					<tr>
						<td >							
							<input style="margin-top: 10px; margin-botton: 10px;" type="file" name="img[]" />
							</td>
						<td >
							<input name="nombre[]" value="<?=$rows[0]?>" > 
							</td>
						<td >
							<input name="referencia[]" value="<?=$rows[1]?>" > 
							</td>
						<td >
							<input name="descripcion[]" value="<?=$rows[4]?>" > 
							</td>
						<td >
							<input name="subcategoria[]" value="<?=$rows[3]?>" > 
						</td>
						<td >
							<input name="medida[]" value="<?=$rows[5]?>" > 
						</td>
						<td >
							<input name="pedido_minimo[]" value="<?=$rows[6]?>" > 
						</td>
						<td >
							<input name="precio[]" value="<?=$rows[7]?>" > 
						</td>
						<td >
							<input name="formas_de_pago[]" value="<?=$rows[8]?>" > 
					</tr>
					<?php if($end>=2){break;}?>
				<?php endforeach; ?>
			</table>
			<br><br>			
</div>
			<input type='hidden' value="<?=$url_full?>" name="url_full">
			<input type='hidden' value="<?=$id_empresa?>" name="id_empresa">
			<?=form_submit('submit', 'registrar')?>
    	<?=form_close()?>
    </CENTER>
