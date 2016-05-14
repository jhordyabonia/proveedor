
<section class="content">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">
					<i class="icon-contacto fa fa-child"></i>
					Usuario
				 </h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                    <h5 class="box-title">
                     Para guardar o agregar informacion de usuario, ingrese la informacion en los campos y haga click en "Guardar".
                     </h5>
                  <?=form_open_multipart(base_url().'editar_empresa/usuario')?>

							<div class="input-group pad-left3 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<span class="ico-gene glyphicon glyphicon-user"></span>
									Nombre de usuario
									<i id="err_usuario"></i>
									</label>
							</div>

							<!-- Campo 1 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <input required type="text" class="form-control" name="usuario"
							  onchange="JavaScript:eliminar_espacios(this);verificar_attime(this);verificar_largo(this,6);verificar_caracteres(this,'[SYM]');"
							onclick="JavaScript:limpiar(this);" ondblclick="necessary"  
							 value="<?=$usuario->usuario?>" placeholder="Nombre de usuario">
							  </div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_usuario" style="display:none" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_usuario"></p>
							</div>

							<div class="input-group pad-left3 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
										<i class="ico-gene2 fa fa-at"></i>
										Email
									<i id="err_email"></i>
								</label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <input required type="text" class="form-control" name="email"
							  onchange="JavaScript:verificar_formato(this);verificar_attime(this)" onclick="JavaScript:limpiar(this);"
							  value="<?=$usuario->email?>" placeholder="Email">
							 </div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_email" style="display:none" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_email"></p>
							</div>

							<div class="input-group pad-left3 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<span class="ico-gene glyphicon glyphicon-asterisk"></span>
									Contraseña
									</label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="">
							  	
							  </span>
							  <input required type="password" class="form-control" name="password_old"
							 	class="input-style"  placeholder="Contraseña">
							  </div>
                            <script>
                                function cambiar_clave_f()
                                {
                                    document.getElementById('cambiar_clave_link').style.display='none';
                                    document.getElementById('cambiar_clave').style.display='';
                                    document.getElementById('password').required=true;
                                    document.getElementById('password2').required=true;
                                 }
                             </script>
							<div class="input-group style-padding7 col-xs-12 col-md-6 col-lg-8">
								<a id="cambiar_clave_link" href="JavaScript:cambiar_clave_f();">
									<p>Cambiar Contraseña <span style="padding-left:15px" class="ico-requerido glyphicon glyphicon-chevron-down"></span>
									</p> 
								</a>
							</div>
                            
<div id="cambiar_clave" style="display:none">
							<div class="input-group pad-left3 col-xs-12 col-md-8 col-lg-8">
							  <label for="">Nueva Contraseña</label>
							</div>
							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="">
							  	<span class="ico-gene glyphicon glyphicon-asterisk"></span>
							  </span>
							  <input type="password" class="form-control" id="password" name="password" onclick="JavaScript:limpiar(this);"
								onchange="JavaScript:verificar_igualdad(document.getElementById('password2'),this);verificar_largo(this,6);verificar_caracteres(this,' áéíóúñ');" 
								class="input-style"  placeholder="Nueva contraseña">

							  <span class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							  	<i id="err_password"></i>
							  </span>
							  <span class="">
							  	<span class=""></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_password" style="display:none" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_password"></p>
							</div>

							<div class="input-group pad-left3 col-xs-12 col-md-8 col-lg-8">
							  <label for="">Confirmar Contraseña</label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="">
							  	<span class="ico-gene glyphicon glyphicon-asterisk"></span>
							  </span>

							  <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirmar nueva contraseña"
								onclick="JavaScript:limpiar(this);"  ondblclick="necessary"
				  				onchange="JavaScript:verificar_igualdad(this,document.getElementById('password'))">
							  <span class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							  	<i id="err_password2"></i>
							  </span>
							  <span class="">
							  	<span class=""></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_password2" style="display:none" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_password2"></p>
							</div>
</div><!-- cambiar_clave -->
                            
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8" style="padding:2%;">
                                <button type="submit" class="btn btn-primary">
									<i class="ico-circle fa fa-floppy-o"></i>
                                    Guardar
                                 </button>
                               </div>

    					<?=form_close()?>
			
                </div><!-- /.box-body -->
              </div>