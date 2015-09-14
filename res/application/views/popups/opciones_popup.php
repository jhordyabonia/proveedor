<div class="login">
 <link rel="stylesheet" type="text/css" href="<?php echo css_url()?>styles_login.css">
          <div class="modal fade" id="popup_mensajes" tabindex="-1" role="dialog" 
                aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog main-div borders">
              <div class="modal-content modal-content-login borders">
                <div class="modal-header borders" style="border-bottom: 1px solid #ABABAB;">
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">
                    <span class="glyphicon glyphicon-remove icono_cerrar" aria-hidden="true">
                    </span>
                    </span>
                    <span class="sr-only">Close</span>
                 </button>
                  
                  <img class="center-block" src="<?=img_url()?>logo3.png">

                    <!-- Boton d iniciar sesion -->
                  <h4 class="text-center"> 
                    <b> Enviar mensaje como usuario registrado </b>
                  </h4>
                   <button onclick="JavaScript:login(this,'false');" type="button" class="btn btn-primary btn_hecho" data-dismiss="modal">
                      Ingresar
                  </button>
                  <!--/Boton d iniciar sesion -->


                  <br><br>
                  <!-- Boton registrar empresas -->
                  <h4 class="text-center"> No soy usuario registrado </h4>
                  <button type="button" class="btn btn-warning btn_reg" data-dismiss="modal"
                    onclick="JavaScript:launch(this);">
                      Registrar empresa
                  </button>
                  <!-- /Boton registrar empresas -->

                </div>
                <div class="modal-body borders">
                  
                  <!-- Boton continuar -->
                  <h4 class="text-center"> Enviar mensaje sin ingresar  </h4>
                  <a id="throw" data-toggle="modal" data-target="#popup_mensajes_vacio"></a>
                  <script type="text/javascript">
                    function throw_mensaje()
                    {
                      document.getElementById('div_login').innerHTML="";
                      document.getElementById('registro').innerHTML="";
                      document.getElementById('throw').click();
                    }
                  </script>
                  <button type="button" onclick="JavaScript:throw_mensaje();" class="btn btn-default btn_hecho" data-dismiss="modal">
                      Continuar
                  </button>
                  <!-- /Boton continuar -->

                </div>
              </div>
            </div>
          </div>  
        </div>  
