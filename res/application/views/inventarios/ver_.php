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
		<?=form_open_multipart(base_url().'inventarios/registrar_/'.$id_empresa."/".$url_full,array('name'=>'form'))?>
	 <br><br>
<div style="overflow:scroll; height:70%;<?php if($begging!=0){echo 'display:none;';}?>">
	<script>
   function handleFileSelect(evt) {
   	evt.stopPropagation();
    evt.preventDefault();

    var files = evt.dataTransfer.files; // FileList object.
   	//console.log(evt);

    // files is a FileList of File objects. List some properties.
    var output = [];
    evt.toElement.control.files=files;
    for (var i = 0, f; f = files[i]; i++) 
    {
    	if (!f.type.match('image.*')) 
        continue;


       var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          //var span = document.createElement('span');
          //span.innerHTML = ['<img class="thumb" src="', e.target.result,
           //                 '" title="', theFile.name, '"/>','<strong>', theFile.name, '</strong>'].join('');

          evt.srcElement.innerHTML=['<img class="thumb" src="', e.target.result,
                            '" title="', theFile.name, '"/>','<strong>', theFile.name, '</strong>'].join('');
          //evt.srcElement.insertBefore(span, null);
          //evt.toElement.control.value=e.target.result;
          //console.log(e.target.result);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
 
    }
  }

  function handleDragOver(evt) {
    evt.stopPropagation();
    evt.preventDefault();
    evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
  }
function set()
{
  var img= document.getElementsByTagName('label');
  for(i=0;i<img.length;i++)
  { 
    div= document.getElementById(img[i].id);
  	if(div==null){console.log(img[i].id);continue;}
    div.addEventListener('dragover', handleDragOver, false);
    div.addEventListener('drop', handleFileSelect, false);   
  }
}
window.onload=function()
{
    set();
    verificar(); 
    <?php if($begging!=0):?>
        document.getElementById('send').click();
   <?php endif;?>
};
</script>
	<style>
.thumb {
    height: 75px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
  }
.button {
    background-color: #4CAF50;
    border: none;
    display: block;
    color: white;
    padding: 5px;
    text-align: center;
    text-decoration: none;
    /*font-size: 12px;*/
    margin: 1px;
    cursor: pointer;
}
</style>			<table style="<?php if($begging!=0){echo 'display:none;';}?>">
                <?php $count=0; $end=0; 
                 foreach($excel->values as $key => $rows) : ?>	
						<?php if($key<$begging){ continue;}?> 
						<?php if(is_null($rows[0])){$end++; continue;}?> 
					<tr>
						<td >
                            <?php if($count==0):?>
                                #
                            <?php else: ?>
                                <?=$count;?>
                            <?php endif?>
                            
                            <?php $count++;?>
                            </td>
						<td >
                            <?php if($count!=1):?>							
                                <input id="img_<?=$key?>"style="display: none;margin-top: 10px; margin-botton: 10px;" type="file" name="img[]" />
                                <label for="img_<?=$key?>" id="label_<?=$key?>" class="button" >Seleccionar imagen o arrastrar</label>
							<?php else:?>
                               Imagen
                            <?php endif;?>
                            </td>
						<td >
							<input name="nombre[]" value="<?=$rows[0]?>" > 
							</td>
						<td >
							<input name="referencia[]" value="<?=$rows[1]?>" > 
							</td>
						<td >
							<input name="categoria[]" value="<?=$rows[2]?>" > 
							</td>
						<td >
							<input name="subcategoria[]" value="<?=$rows[3]?>" > 
						</td>
						<td >
							<input name="descripcion[]" value="<?=$rows[4]?>" > 
							</td>
						<td >
							<input name="precio[]" value="<?=$rows[5]?>" > 
							</td>
						<td >
							<input name="medida[]" value="<?=$rows[6]?>" > 
                            </td>
						<td >
							<input name="pedido_minimo[]" value="<?=$rows[7]?>" > 
                            </td>
						<td >
							<input name="" value="<?=$rows[8]?>" > 
                            </td>
						<td >
							<input name="" value="<?=$rows[9]?>" > 
                            </td>
						<td >
							<input name="" value="<?=$rows[10]?>" > 
                            </td>
						<td >
							<input name="" value="<?=$rows[11]?>" > 
                            </td>
                      <!--
						<td >
							<input name="medida[]" value="<?=$rows[5]?>" > 
						</td>
						<td >
							<input name="pedido_minimo[]" value="<?=$rows[9]?>" > 
						</td>
						<td >
							<input name="precio[]" value="<?=$rows[7]?>" > 
						</td>
						<td >
							<input name="formas_de_pago[]" value="<?=$rows[8]?>" > 
					</tr>-->
					<?php if($end>=2){break;}?>
				<?php endforeach; ?>
                
                <input type='submit' value='Registrar productos' onclick="document.getElementById('frame').style.display='';"  id='send'>
                <br><br>
                El archivo, cuenta con: <div onload=" document.getElementById('preload_item').innerHTML='<?=$count-1;?>';"> <?=$count-1;?> Productos.</div>
                <br><br>		    
            </table>
			<br><br>			
</div>
			<input type='hidden' value="<?=$begging?>" name="begging">
			<input type='hidden' value="<?=$url_full?>" name="url_full">
			<input type='hidden' value="<?=$id_empresa?>" name="id_empresa">            
            
    	<?=form_close()?>
    </CENTER>
    
    
    
     
     </div><!--end content-->
        <div  id="frame" style="<?php if($begging==0){echo 'display:none;';}?>position:absolute;top:0px;left:0px;background-color:white;width:100%;heigtt:100%;padding:30%">
            <center><h1>Cargando...<br></h1><?=$begging?>/<?=($count+$begging)?></center>
            </div>
          