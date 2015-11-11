<div class="login">
<link rel="stylesheet" type="text/css" href="<?php echo css_url()?>styles_login.css">
      <div class="modal fade" id="popup_guardado" tabindex="-1" role="dialog" 
                aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog ">
          <div class="modal-content modal-content-login modal-content-one">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">
                <span class="glyphicon glyphicon-remove icono_cerrar" aria-hidden="true">
                </span>
                </span>
                <span class="sr-only">Close</span>
             </button>
              
              <span class="glyphicon glyphicon-ok-sign icon_conf" aria-hidden="true" >
              </span>
              <h4 class="text-center"> 
                <b>Datos Guardados</b>
              </h4>
              <h5 class="text-center">Sus datos de han actualizado con exito</h5>
              <button type="button" class="btn btn-primary btn_hecho" data-dismiss="modal">
              <!--onclick="JavaScript:window.location.reload()">-->
                  Aceptar
              </button>

            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!--Autolaunch -->
<div data-toggle="modal" data-target="#popup_guardado" id="confimacion_guardado">
    </div>

<?php if ($this->session->flashdata('confimacion_guardado')=='TRUE'):?>
  <script type="text/javascript">
    window.onload=document.getElementById('confimacion_guardado').click();
  </script>
<?php endif; ?> 