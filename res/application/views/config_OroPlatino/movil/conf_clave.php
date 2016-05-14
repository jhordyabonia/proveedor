
<section class="content">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">
					<i class="icon-contacto fa fa-child"></i>
					Contraseña
				 </h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                  <?=form_open_multipart(base_url().'editar_empresa/usuario')?>
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
 
							<div class="input-group pad-left3 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
                                  <span class="ico-gene glyphicon glyphicon-asterisk"></span>
                                  Nueva Contraseña
                                  <i id="err_password"></i>
                                  </label>
							</div>
							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							   <input type="password" class="form-control" id="password" name="password" onclick="JavaScript:limpiar(this);"
								onchange="JavaScript:verificar_igualdad(document.getElementById('password2'),this);verificar_largo(this,6);verificar_caracteres(this,' áéíóúñ');" 
								class="input-style"  placeholder="Nueva contraseña">

							 
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_password" style="display:none" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_password"></p>
							</div>

							<div class="input-group pad-left3 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
                                  <span class="ico-gene glyphicon glyphicon-asterisk"></span>
                                  Confirmar Contraseña
                                  <i id="err_password2"></i>
                                  </label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							   <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirmar nueva contraseña"
								onclick="JavaScript:limpiar(this);"  ondblclick="necessary"
				  				onchange="JavaScript:verificar_igualdad(this,document.getElementById('password'))">
							  
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