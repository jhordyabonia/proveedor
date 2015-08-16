<link rel="stylesheet" type="text/css" href="<?php echo css_url()?>styles_login.css">

<?=form_open_multipart('popup/solicitudes_premium') ?>

	<div class="modal fade" id="<?=$id_popup?>" tabindex="-1" role="dialog" 
                aria-labelledby="myModalLabel" aria-hidden="true">
            
        <div class="modal-dialog">
            <div class="modal-content modal-content-two">
                <div class="modal-header" style="border-bottom: none">
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">
                    <span class="glyphicon glyphicon-remove icono_cerrar" aria-hidden="true">
                    </span>
                    </span>
                    <span class="sr-only">Close</span>
                 </button>
                  
                  <img class="center-block" src="<?php echo img_url()?>logo3_beta.png">

                    <!-- Imagenes membresias-->
                  <img class="" src="?php echo img_url()?>membresia/logo_mem_platino.png"
                       style="max-width: 70px; margin: 0 20px 0 70px;">
                  <img class="" src="?php echo img_url()?>membresia/logo_mem_verificado.png"
                       style="max-width: 70px;">
                    
                  <h4 class="text-center"> 
                    Debe ser empresa <b>Platino</b> o <b>Preferencial</b> para enviar este mensaje
                  </h4>


                    <!-- Div cuadros de texto  -->
                    <div class="body_login" style="margin-top:20px">
                      <div class="input-group ig_name_user">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        </span>
                        <input type="text" class="form-control input_txt" placeholder="Nombre de Usuario">
                      </div>   
                
                      <div class="input-group ig_pwd">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                        </span>
                        <input type="password" class="form-control input_txt" placeholder="Contraseña">
                      </div>

                      <div class="input-group center-block ig_rememberme" >
                        <input type="checkbox"> Recuerdame
                      </div>
                    </div>
                     

                    <!-- Boton iniciar sesion -->
                   <button type="button" class="btn btn-primary btn_hecho" data-dismiss="modal">
                      Ingresar
                  </button>
                  <!--/Boton iniciar sesion -->


                  <br><br>
 
                </div>
                <div class="modal-body">
                  
                  <!-- Boton solicitar membresia -->
                  <button type="button" class="btn btn-warning btn_reg" data-dismiss="modal">
                      Solicitar membresia
                  </button>
                  <!-- /Boton solicitar membresia -->

                </div>
            </div>
        </div>
    </div>	

<?= form_close() ?>