<center><!--editor-->
	<table>
		<tr>
			<td>
	<table style="max-width: 600px; width: 100%; margin: auto; border-radius: 7px; text-align: center;">
    <tr>
      <td>
        <img style="max-width: 600px;" src="<?php echo img_url() ?>header-email-platino.png" alt="">
      </td>
    </tr>
    <tr>
      <td>
        <strong>
          <p style="color: #FF7F27;">OPORTUNIDAD COMERCIAL</p>
          <p style="font-size: 10pt; color: #7F7F7F; margin-top: 5px; margin-bottom: 10px;">
            <?php echo $solicitud->nombre_empresa ?> <!-- Variable -->
            <br>
            <?php echo $solicitud->nombres ?> <!-- Variable -->
          </p>
<?php $attribbs=array('id'=>"form",'novalidate' => 'novalidate');?>
<?=form_open_multipart('micro_admin/editar_solicitud_externa/'.$solicitud->id,$attribbs)?>	
        </strong>
      </td>
    </tr>

<tr  align="center" valign="middle">
  <td>
  	
<!--con este campo indico, al controlador de edicion, 
desde que pagina se esta invocando, (appications/viwes/micro_admin/editor.php ó
 appications/viwes/micro_admin/solcitudes_externas.php )-->
		<input type="hidden" id="editor" value="TRUE">
		<input type="hidden" name="id_solictud" value="<?=$solicitud->id?>">
		<input  type="hidden" name="categoria" value="<?=$solicitud->categoria?>">
        <textarea id="head" name="head" cols="60" rows="3">
          		<?=@$head?> 
        </textarea>
        
        <TABLE id="previa" BORDER='0' padding='4' margin='2' cellspading='2' bgcolor='#efefef'>
        <TR>
          <th colspan="2" align='center'>
       	  </p>
       	</TR>
        <TR>
          <th align='left'>Producto o isumo solicitado:<td align='left'><I><input name="solicitud" value="<?=$solicitud->solicitud?>"></I>
        <TR>
          <th align='left'>Descripcion de la solicitud:<td align='left'><I><input name="descripcion" value="<?=$solicitud->descripcion?>"></I>
        <TR>
          <th align='left'>Cantidad:<td align='left'><I><input name="cantidad_requerida" value="<?=$solicitud->cantidad_requerida?>"></I>
        <TR>
          <th align='left'>Precio máximo:<td align='left'><I><input name="precio" value="<?=$solicitud->precio?>"></B><BR>
        <TR>
          <th align='left'>Forma de pago preferida:<td align='left'><I><input name="pago" value="<?=$solicitud->forma_de_pago?>"></I>
        <TR>
          <th align='left'>Direccion de Email:<td align='left'><I><input name="email" value="<?=$solicitud->email?>"></I>
        <TR>  
          <th align='left'>Nombre y Apellidos:<td align='left'><I><input name="nombres" value="<?=$solicitud->nombres?>"></I>
        <TR>
          <th align='left'>Telefono:<td align='left'><I><input name="telefono" value="<?=$solicitud->telefono?>"></I>
        <TR>
          <th align='left'>Nombre empresa:<td align='left'></I><input name="nombre_empresa" value="<?=$solicitud->nombre_empresa?>"></I>
        <TR>
          <th align='left'>Ciudad de entrega:<td align='left'><I><input name="ciudad" value="<?=$solicitud->ciudad_entrega?>"></I>
        
        <TR>
        	<td colspan="2">
		    </td>
	    </TR>
        </TABLE>
	     <textarea id="bottom" name="bottom" cols="60" rows="3">
          	<?=@$bottom?> 
		 </textarea>
  </td>
</tr>
    <tr>
      <td>
        <img style="max-width: 600px;" src="<?php echo img_url() ?>footer-email-platino.png" alt="">
      </td>      
    </tr>
  </table>

		<td><!--botones-->
			<center><!--destinatarios-->
						<input type="submit" name="ver" value =">>>Ver>>>">
<?= form_close() ?>
						<br>
						<br>
						<br>
						<input  type="button" name="enviar" onclick="JavaScript:enviar()" value=">>>Enviar<<<">
						<br>
						<br>
						<br>
							<select size="10" id="destinatarios" onchange="JavaScript:eliminar_destinatrio(this.value);">
								<?php foreach ($destinatarios as $key => $value)
									{
										echo "<option value='$value'>$value</option>";
									}
								?>
						</select>
						<br>
						<br>
						<br>						
						<select id="nombres_destinatarios" name="destinatarios[]" onchange="JavaScript:agregar_destinatrio(this.value)"> 
								<option value="--">Agragar destinatario</option>
								<?php foreach ($nombres_destinatarios as $key => $value):?>
									<option value='<?=$destinatarios[$key]?>'><?=$value?></option>
								<?php endforeach?>
						</select>
			</center>
		<td><!--previa-->
					<?=@$mensaje?>
	</table>
</center>

<?php $attribbs=array('id'=>"formulario_mensaje",'novalidate' => 'novalidate');?>
<?=form_open_multipart('micro_admin/enviar/'.$solicitud->id,$attribbs)?>
<textarea type="hidden" name="mensaje" id="mensaje">
</textarea>
<?= form_close() ?>
<script type="text/javascript">

function enviar()
{
	document.getElementById('mensaje').value=document.getElementById('destinatarios').innerHTML;
	document.getElementById('formulario_mensaje').submit();
} 

function agregar_destinatrio(value)
{
	//alert('tty');
	if(value=="--")
		{return;}
	if(document.getElementById('destinatarios').innerHTML.indexOf(''+value)!=-1)
		{return;}

	input="<option value='"+value+"'>"+value+"</option>";
	document.getElementById('destinatarios').innerHTML+=input;
	out=document.getElementById('nombres_destinatarios').innerHTML;
	out=out.replace(input,'');
	document.getElementById('nombres_destinatarios').innerHTML=out;
}
function eliminar_destinatrio(value)
{	
	
	<?php 
	$html="";
	$key=0;
	foreach ($nombres_destinatarios as $key => $value) 
	{
		$html.= $value.'|'.$destinatarios[$key].',';		
	}?>
	input="<?=$html?>";
	key=<?=$key?>;
	input=input.split(',');
	i=0;
	for(i=0;i<key;i++)
	{
		if(input[i].indexOf(value)!=-1)
			{break;}
	}
	input=input[i].split('|')[0];
	console.log(input);
	//return;

	input = '<option value="'+input+'">'+input+'</option>';
	document.getElementById('nombres_destinatarios').innerHTML+=input;
	
	value = '<option value="'+value+'">'+value+'</option>';
	out=document.getElementById('destinatarios').innerHTML;
	out=out.replace(value,'');
	document.getElementById('destinatarios').innerHTML=out;
	/*
	if(document.getElementById('nombres_destinatarios').innerHTML.indexOf(''+value)!=-1)
		{return;}
	*/
	
}
</script>