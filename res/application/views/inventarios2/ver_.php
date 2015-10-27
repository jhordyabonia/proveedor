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
		<?=form_open_multipart(base_url().'inventarios2/registrar_/'.$id_empresa)?>
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
							<input name="nit[]" value="<?=$rows[1]?>" > 
							</td>
						<td >
							<input name="nombre[]" value="<?=$rows[2]?>" > 
							</td>
						<td >
							<input name="direccion[]" value="<?=$rows[10].'-'.$rows[13].'-'.$rows[14]?>" > 
						</td>
						<td >
							<input name="municipio[]" value="<?=$rows[11]?>" > 
						</td>
						<td >
							<input name="tipo[]" value="<?=$rows[15]?>" > 
						</td>
						<td >
							<input name="telefono[]" value="<?=$rows[16].'-'.$rows[17]?>" > 
						</td>
						<td >
							<input name="email[]" value="<?=$rows[18]?>" > 
						</td>
						<td >
							<input name="descripcion[]" value="<?=$rows[20]?>" > 
						<td >
							<input name="nombres[]" value="<?=$rows[21]?>" > 
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
