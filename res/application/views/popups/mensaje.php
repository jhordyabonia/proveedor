<?php 
  $tipo= $this->uri->segment(3);

?>
<?=form_open_multipart('mensajes/enviar/'.$tipo,array('id'=>'form_mensaje'));  ?>
<script type="text/javascript">
   function adjunto()
      {
        var paths = document.getElementById('userfile').files;
        console.log("2");
        document.getElementById('adjunto').innerHTML=paths[0]['name'];             
      }
</script>

    <link rel="stylesheet" href="<?php echo css_url()?>popup_mensaje.css">
    <div class="mensaje">
      <?php if ($nombre_usuario):?>
        <div class="modal fade" id="popup_mensajes" tabindex="-1" role="dialog" aria-hidden="true" >
        <?php else:?>
        <div class="modal fade" id="popup_mensajes_vacio" tabindex="-1" role="dialog" aria-hidden="true" >
        <?php endif;?>
		      <div class="modal-dialog">
		          <div class="modal-header encabezado">
		            <button type="button" class="close" data-dismiss="modal" >
                  <span aria-hidden="true">
		                <span class="fa fa-times cerrar" aria-hidden="true"></span>
                  </span>
		                <span class="sr-only">Cerrar</span>
		              </button>
		            <h4 class="modal-title text-center titulo_popup"><i class="fa fa-envelope icono_mensaje"></i>Mensaje</h4>
		          </div>
                <div class="modal-body text-center popup_central">
                 <label for="Usuario" class="label_modal">Quien envía el mensaje:</label><br>
                  <div class="input-group quien_envia">
                    <span class="input-group-addon">
                      <span class="fa fa-user" aria-hidden="true"></span>
                    </span>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre de la persona de Contacto" name="remitente" value="<?=$nombre_usuario?>" <?=$abilitado?> >
                  </div> 
                  <label for="email" class="label_modal_email">E-mail de quien envía el mensaje:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="fa fa-at" aria-hidden="true"></span>
                    </span>
                    <input type="email" class="form-control" placeholder="Ingrese su e-mail" name="email" value="<?=$email?>" <?=$abilitado?> >
                  <input type="hidden" name="tipo" value="<?=$tipo?>">
                  <input type="hidden" id="id_objeto" name="id_objeto" value="848">
                  </div>
                  <label for="telefono" class="label_modal">Teléfono de contacto:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="fa fa-phone" aria-hidden="true"></span>
                    </span>
                    <input type="text" class="form-control" placeholder="Ingrese un numero celular o fijo al que quiera ser contactado" name="tel" value="<?=$telefono?>" <?=$abilitado?> >
                  </div>
                  <div class="input-group">
                    <!--
                    <?php if($imagen): ?>
                     <img src="<?=base_url()?>upload/<?=$imagen?>" class="foto_producto"><a href="<?=$url?>">link del producto</a>
                    <?php endif; ?>
                  -->
                 </div> 
                  <label for="mensaje" class="label_modal">Mensaje:</label>
                  <div class="col-xs-12 input-group">
                    <textarea class="form-control caja_mensaje" name="mensaje"></textarea>
                  </div>
                  <div class="col-md-12 row">
                    <div class="col-md-4 fileUpload btn btn-primary">
                      <span class="fa fa-paperclip clip_icono" aria-hidden="true"/>
                      <span class="clip">Adjuntar un archivo</span>
                      <input type="file" class="upload"  onchange="JavaScript:adjunto();" id="userfile" name="userfile"  data-badge="false">
                    </div>
                    <div id="adjunto" class="col-md-8">
                    </div>
                  </div>
                  <div class="col-md-12 input-group enviar">
                    <input type="button" class="btn btn-default center-block boton_enviar" value="Enviar Mensaje" onclick="JavaScript:document.getElementById('form_mensaje').submit();">
                  </div>
                  <br>
                </div>                
          </div>
        </div>
    </div>  
 <?= form_close() ?>