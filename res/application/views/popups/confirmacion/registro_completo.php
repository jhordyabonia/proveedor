<a data-toggle="modal" id='popup_launch' data-target="#first_ligin" class="enlace_registro cursor-mano" hhref="JavaScript:;">
</a><link rel="stylesheet" type="text/css" href="<?php echo css_url()?>styles_login.css">
           <div class="modal fade" id="first_ligin" tabindex="-1" role="dialog" 
                aria-labelledby="myModalLabel" aria-hidden="true" >
           <div class="modal-dialog">
              <div class="modal-content modal-content-one">
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
                    <b>Registro exitoso!!</b>
                  </h4>
                  <h5 class="text-center">¿Que desea hacer ahora?</h5>
                  <a type="button" class="btn btn-primary btn_hecho"
                    href="<?=base_url()?>publicar_producto"> Publicar producto
                  </a>
                  <br>
                  <br>
                  <a type="button" class="btn btn-warning btn_reg"
                   href="<?=base_url()?>publicar_oferta">  Solicitar producto
                 </a>

                </div>
                <div class="modal-body">
                  

                </div>
              </div>
            </div>
          </div>

<SCRIPT TYPE="text/javascript">
window.onload=fun();
function fun()
{
  document.getElementById('popup_launch').click();
}
</SCRIPT>