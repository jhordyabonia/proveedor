<?=form_open_multipart('popup/asistentes_proveedor/TRUE');  ?>
    <link rel="stylesheet" href="<?php echo css_url()?>popup_solicitud.css">
    <div class="solicitud">
        <div class="modal fade" id="<?=$id_popup?>" tabindex="-1" role="dialog" aria-hidden="true" >
          <!-- vista para tamaño lg -->
		      <div class="modal-dialog col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="modal-header encabezado visible-xs hidden-sm hidden-md hidden-lg">
                <button type="button" class="close" data-dismiss="modal" >
                  <span aria-hidden="true">
                    <span class="fa fa-times cerrar" aria-hidden="true"></span>
                  </span>
                    <span class="sr-only">Cerrar</span>
                  </button>
                  <img class="img-responsive" src="<?php echo img_url().'logo_footer.png' ?>">
                <!-- <h4 class="modal-title text-center titulo_popup">PROVEEDOR<span class="modal-title text-center titulo_popup_2">.com.co</span></h4> -->
              </div>
              <div class="modal-header encabezado hidden-xs visible-sm hidden-md hidden-lg">
                <button type="button" class="close" data-dismiss="modal" >
                  <span aria-hidden="true">
                    <span class="fa fa-times cerrar" aria-hidden="true"></span>
                  </span>
                    <span class="sr-only">Cerrar</span>
                  </button>
                  <img class="img-responsive img_logo_sm" src="<?php echo img_url().'logo_footer.png' ?>">
                <!-- <h4 class="modal-title text-center titulo_popup">PROVEEDOR<span class="modal-title text-center titulo_popup_2">.com.co</span></h4> -->
              </div>
              <div class="modal-header encabezado hidden-xs hidden-sm visible-md hidden-lg">
                <button type="button" class="close" data-dismiss="modal" >
                  <span aria-hidden="true">
                    <span class="fa fa-times cerrar" aria-hidden="true"></span>
                  </span>
                    <span class="sr-only">Cerrar</span>
                  </button>
                  <img class="img-responsive img_logo_md" src="<?php echo img_url().'logo_footer.png' ?>">
                <!-- <h4 class="modal-title text-center titulo_popup">PROVEEDOR<span class="modal-title text-center titulo_popup_2">.com.co</span></h4> -->
              </div>
              <div class="modal-header encabezado hidden-xs hidden-sm hidden-md visible-lg">
                <button type="button" class="close" data-dismiss="modal" >
                  <span aria-hidden="true">
                    <span class="fa fa-times cerrar" aria-hidden="true"></span>
                  </span>
                    <span class="sr-only">Cerrar</span>
                  </button>
                  <img class="img-responsive img_logo" src="<?php echo img_url().'logo_footer.png' ?>">
                <!-- <h4 class="modal-title text-center titulo_popup">PROVEEDOR<span class="modal-title text-center titulo_popup_2">.com.co</span></h4> -->
              </div>
                <div class="modal-body text-center popup_central">
                  <p class="texto_superior"><?=$datos->texto_head?></p>
                  <p class="texto_superior_2">Sólo ingrese su e-mail y algunos datos necesarios para que le enviemos cotizaciones a su e-mail.</p>
                  <p class="requerido"><span class="fa fa-asterisk asterisk"></span> Requerido</p><br>
                  <label for="email" class="label_modal_email">E-mail de quien envía el mensaje:<span class="fa fa-asterisk asterisk_label"></span></label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="fa fa-at" aria-hidden="true"></span>
                    </span>
                    <input type="email" class="form-control tam_caja" placeholder="" name="email" value="" required>
                  <input type="hidden" name="tipo" value="">
                  </div>
                 <label for="Producto" class="label_modal">Producto o servicio solicitado:<span class="fa fa-asterisk asterisk_label"></span></label><br>
                  <div class="input-group producto_insumo">
                    <span class="input-group-addon">
                      <span class="fa fa-shopping-cart" aria-hidden="true"></span>
                    </span>
                    <input type="text" class="form-control tam_caja" placeholder="" name="solicitud" value="" required>
                  </div> 
                  <label for="cantidad" class="label_modal">Cantidad (especifique unidades, pares, etc):<span class="fa fa-asterisk asterisk_label"></span></label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="fa fa-cubes" aria-hidden="true"></span>
                    </span>
                    <input type="text" class="form-control texto_cantidad tam_caja" placeholder="" name="cantidad_requerida" value="" required>
                  </div>
                  <label for="mensaje" class="label_modal">Descripción de la solicitud:<span class="fa fa-asterisk asterisk_label"></span></label>
                  <div class="col-xs-12 input-group">
                    <textarea class="form-control caja_mensaje" name="descripcion" rows="4" required></textarea>
                  </div>
                  <label for="precio" class="label_modal">Precio máximo a pagar por el total (opcional):</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-usd ico_precio_solici" aria-hidden="true"></span>
                    </span>
                    <input type="text" class="form-control texto_precio tam_caja" placeholder="" name="precio" value="">
                  <input type="hidden" name="tipo" value="">
                  </div>
                  <label for="forma_pago" class="label_modal">Forma de pago preferida (opcional):</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-usd ico_precio_solici" aria-hidden="true"></span>
                    </span>
                    <select name="pago" class="form-control formas_de_pago">
                      <option selected value="No seleccionado"> Elige una opción </option>
                      <option value="Transferencia bancaria">Transferencia bancaria</option>
                      <option value="Giros Nacionales">Giros Nacionales</option>
                      <option value="Cheque">Cheque</option>
                      <option value="Efectivo">Efectivo</option>
                      <option value="Contraentrega">Contraentrega</option>
                      <option value="A convenir">A convenir</option>
                    </select>
                  </div>
                  <label for="empresa" class="label_modal">Nombre de la empresa (opcional):</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="fa fa-briefcase" aria-hidden="true"></span>
                    </span>
                    <input type="text" class="form-control texto_empresa tam_caja" placeholder="" name="nombre_empresa" value="">
                  <input type="hidden" name="tipo" value="">
                  </div>
                  <label for="empresa" class="label_modal">Nombre y apellido:<span class="fa fa-asterisk asterisk_label"></span></label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="fa fa-user" aria-hidden="true"></span>
                    </span>
                    <input type="text" class="form-control tam_caja" placeholder="" name="nombres" value="" required>
                  <input type="hidden" name="tipo" value="">
                  </div>
                  <label for="empresa" class="label_modal">Teléfono de contacto:<span class="fa fa-asterisk asterisk_label"></span></label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="fa fa-phone" aria-hidden="true"></span>
                    </span>
                    <input type="text" class="form-control tam_caja" placeholder="" name="telefono" value="" required>
                  <input type="hidden" name="tipo" value="">
                  </div>
                  <label for="empresa" class="label_modal">Ciudad de entrega:<span class="fa fa-asterisk asterisk_label"></span></label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="fa fa-truck" aria-hidden="true"></span>
                    </span>
                    <input type="text" class="form-control texto_ciudad tam_caja" placeholder="" name="ciudad_entrega" value="" required>
                   <input type="hidden" class="form-control texto_ciudad tam_caja" placeholder="" name="categoria" value="<?=$categoria?>">
                  <input type="hidden" name="tipo" value="">
                  </div>
                  <div class="col-md-12 input-group enviar">
                    <button type="submit" class="btn btn-default center-block boton_enviar">SOLICITAR</button>
                  </div>
                  <?=$datos->texto_body?> 
                </div>                
          </div>
          <!-- cierra vista tamaño lg -->
        </div>
    </div> 
 <?= form_close() ?>