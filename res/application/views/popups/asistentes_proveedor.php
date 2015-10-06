<a data-toggle="modal" id="popup_launch_AP" data-target="#<?=$id_popup?>">
  </a>

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

                  <p class="texto_superior_2"><?=$datos->texto_titulo?></p>

                  <p class="requerido"><span class="fa fa-asterisk asterisk"></span> Requerido</p><br>

                 <?php if($datos->campos!=str_replace('email',"",$datos->campos)):?>

                  <label for="email" class="label_modal_email hidden-xs hidden-sm"><?=$datos->titulos['email']?>:<span class="fa fa-asterisk asterisk_label"></span></label>

                  <div class="input-group">

                    <span class="input-group-addon">

                      <span class="fa fa-at" aria-hidden="true"></span>

                    </span>

                    <input type="email" class="form-control tam_caja" placeholder="<?=$datos->titulos['email']?>" name="email" value="" required>

                  <input type="hidden" name="tipo" value="">

                  </div>

                <?php endif;?>

                 <?php if($datos->campos!=str_replace('nombre', "",$datos->campos)):?>

                 <label for="Producto" class="label_modal hidden-xs hidden-sm"><?=$datos->titulos['nombre']?>:<span class="fa fa-asterisk asterisk_label"></span></label><br>

                  <div class="input-group producto_insumo">

                    <span class="input-group-addon">

                      <span class="fa fa-shopping-cart" aria-hidden="true"></span>

                    </span>

                    <input type="text" class="form-control tam_caja" placeholder="<?=$datos->titulos['nombre']?>" name="solicitud" value="" required>

                  </div> 

                <?php endif;?>

                 <?php if($datos->campos!=str_replace('cantidad',"",$datos->campos)):?>

                  <label for="cantidad" class="label_modal hidden-xs hidden-sm"><?=$datos->titulos['cantidad']?>:<span class="fa fa-asterisk asterisk_label"></span></label>

                  <div class="input-group">

                    <span class="input-group-addon">

                      <span class="fa fa-cubes" aria-hidden="true"></span>

                    </span>

                    <input type="text" class="form-control texto_cantidad tam_caja" placeholder="<?=$datos->titulos['cantidad']?>" name="cantidad_requerida" value="" required>

                  </div>

                <?php endif;?>

                 <?php if($datos->campos!=str_replace('descripción',"",$datos->campos)):?>

                  <label for="mensaje" class="label_modal hidden-xs hidden-sm"><?=$datos->titulos['descripción']?>:<span class="fa fa-asterisk asterisk_label"></span></label>

                  <div class="col-xs-12 input-group">

                    <textarea class="form-control caja_mensaje" placeholder="<?=$datos->titulos['descripción']?>" name="descripcion" rows="4" required></textarea>

                  </div>

                <?php endif;?>

                 <?php if($datos->campos!=str_replace('precio',"",$datos->campos)):?>

                  <label for="precio" class="label_modal hidden-xs hidden-sm"><?=$datos->titulos['precio']?>:</label>

                  <div class="input-group">

                    <span class="input-group-addon">

                      <span class="glyphicon glyphicon-usd ico_precio_solici" aria-hidden="true"></span>

                    </span>

                    <input type="text" class="form-control texto_precio tam_caja" placeholder="<?=$datos->titulos['precio']?>" name="precio" value="">

                  <input type="hidden" name="tipo" value="">

                  </div>

                <?php endif;?>

                 <?php if($datos->campos!=str_replace('pago',"",$datos->campos)):?>

                  <label for="forma_pago" class="label_modal hidden-xs hidden-sm"><?=$datos->titulos['pago']?>:</label>

                  <div class="input-group">

                    <span class="input-group-addon">

                      <span class="glyphicon glyphicon-usd ico_precio_solici" aria-hidden="true"></span>

                    </span>

                    <select name="pago" class="form-control formas_de_pago">

                      <option selected value="No seleccionado"> <?=$datos->titulos['pago']?></option>

                      <option value="Transferencia bancaria">Transferencia bancaria</option>

                      <option value="Giros Nacionales">Giros Nacionales</option>

                      <option value="Cheque">Cheque</option>

                      <option value="Efectivo">Efectivo</option>

                      <option value="Contraentrega">Contraentrega</option>

                      <option value="A convenir">A convenir</option>

                    </select>

                  </div>

                <?php endif;?>

                 <?php if($datos->campos!=str_replace('empresa',"",$datos->campos)):?>

                  <label for="empresa" class="label_modal hidden-xs hidden-sm"><?=$datos->titulos['empresa']?>:</label>

                  <div class="input-group">

                    <span class="input-group-addon">

                      <span class="fa fa-briefcase" aria-hidden="true"></span>

                    </span>

                    <input type="text" class="form-control texto_empresa tam_caja" placeholder="<?=$datos->titulos['empresa']?>" name="nombre_empresa" value="">

                  <input type="hidden" name="tipo" value="">

                  </div>

                <?php endif;?>

                 <?php if($datos->campos!=str_replace('contacto',"",$datos->campos)):?>

                  <label for="empresa" class="label_modal hidden-xs hidden-sm"><?=$datos->titulos['contacto']?>:<span class="fa fa-asterisk asterisk_label"></span></label>

                  <div class="input-group">

                    <span class="input-group-addon">

                      <span class="fa fa-user" aria-hidden="true"></span>

                    </span>

                    <input type="text" class="form-control tam_caja" placeholder="<?=$datos->titulos['contacto']?>" name="nombres" value="" required>

                  <input type="hidden" name="tipo" value="">

                  </div>

                <?php endif;?>

                 <?php if($datos->campos!=str_replace('teléfono', "",$datos->campos)):?>

                  <label for="empresa" class="label_modal hidden-xs hidden-sm"><?=$datos->titulos['teléfono']?>:<span class="fa fa-asterisk asterisk_label"></span></label>

                  <div class="input-group">

                    <span class="input-group-addon">

                      <span class="fa fa-phone" aria-hidden="true"></span>

                    </span>

                    <input type="text" class="form-control tam_caja" placeholder="<?=$datos->titulos['teléfono']?>" name="telefono" value="" required>

                  <input type="hidden" name="tipo" value="">

                  </div>

                <?php endif;?>

                 <?php if($datos->campos!=str_replace('ciudad', "",$datos->campos)):?>

                  <label for="empresa" class="label_modal hidden-xs hidden-sm"><?=$datos->titulos['ciudad']?><span class="fa fa-asterisk asterisk_label"></span></label>

                  <div class="input-group">

                    <span class="input-group-addon">

                      <span class="fa fa-truck" aria-hidden="true"></span>

                    </span>

                    <input type="text" class="form-control texto_ciudad tam_caja" placeholder="<?=$datos->titulos['ciudad']?>" name="ciudad_entrega" value="" required>

                  <input type="hidden" name="tipo" value="">

                  </div>

                <?php endif;?>

                  <div class="col-md-12 input-group enviar">

                    <button type="submit" class="btn btn-default center-block boton_enviar">SOLICITAR</button>

                  </div>

                  <input type="hidden" class="form-control texto_ciudad tam_caja" placeholder="" name="categoria" value="<?=$categoria?>">

                  <?=$datos->texto_body?> 

                </div>                

          </div>

          <!-- cierra vista tamaño lg -->

        </div>

    </div> 

 <?= form_close() ?>
  <?php if($this->session->flashdata('auto_launch_AP')=="1"||$auto_launch_AP):?>
  <SCRIPT TYPE="text/javascript">
    window.onload=fun();
  function fun()
  {
    document.getElementById('popup_launch_AP').click();
  }
  </SCRIPT>
  <?php endif;?>