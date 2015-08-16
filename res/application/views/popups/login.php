 <link rel="stylesheet" type="text/css" href="<?php echo css_url()?>styles_login.css">
    <?=form_open_multipart('popup/login/login/'."mensaje") ?>
           <div class="modal fade" id="<?=$id_popup?>" tabindex="-1" role="dialog" 
                aria-labelledby="myModalLabel" aria-hidden="true" >
              <div class="modal-dialog">
                <div class="modal-content modal-content-two">
                  <div class="modal-header" style="border-bottom: none;">
                    <button type="button" class="close" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove icono_cerrar" aria-hidden="true"></span>
                    <span class="sr-only">Close</span></button>
                    <img class="center-block" src="<?php echo img_url()?>logo3_beta.png">
                  </div>
                  
                  <div class="modal-body text-center body_login">
                      <div id="error">
                        <b color="red"><?=$this->session->flashdata('usuario_incorrecto');?></b>
                      </div>
                      <div class="input-group ig_name_user" >
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        </span>
                        <input type="text" class="form-control input_txt" placeholder="Nombre de Usuario" name="user">
                      </div>   
                      <div class="input-group ig_pwd">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                        </span>
                        <input type="password" class="form-control input_txt" placeholder="Contraseña" name="pass">
                      </div>

                      <div class="input-group center-block ig_rememberme" >
                        <input type="checkbox"> Recuerdame
                      </div>

                      <button type="submit" class="btn btn-primary btn_login">
                          <b>Iniciar Sesion</b>
                      </button>
                      <br>
                  
                      <button type="button" class="btn btn-link" >¿Olvidaste tu contraseña?</button>                   
                  </div>
                </div >
              </div>
            </div>
            </div>
            </div>
    <?= form_close() ?>
