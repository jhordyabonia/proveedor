<div class="login">
<?=form_open_multipart(base_url().'micro_admin/publicar_solicitud/'.$id_producto);  ?>
<link rel="stylesheet" type="text/css" href="<?php echo css_url()?>styles_login.css">
           <div class="modal fade" id="<?=$id_popup?>" tabindex="-1" role="dialog" 
                aria-labelledby="myModalLabel" aria-hidden="true" >
             <div class="modal-dialog">
              <div class="modal-content modal-content-login modal-content-three">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">
                      <span class="glyphicon glyphicon-remove icono_cerrar" aria-hidden="true"></span>
                    </span>
                    <span class="sr-only">Close</span>
                    </button>
                  
                  <span class="glyphicon glyphicon-remove-sign icon_del" aria-hidden="true" >
                  </span>
                  <h4 class="text-center"> 
                    <b>Publicar Solictud</b>
                  </h4>
                  <h5 class="text-center">¿En realidad desea Publicar esta solicitud?</h5>
                  <button type="submit" name="eliminar" class="btn btn-danger btn_conf">
                      Publicar
                  </button>

                  <button type="button" class="btn btn-primary btn_cancel" data-dismiss="modal">
                      Cancelar
                  </button>
                </div>
                <div class="modal-body border">
                </div>

              </div>
            </div>
          </div>
        </div>
<?= form_close() ?>
</div>
 