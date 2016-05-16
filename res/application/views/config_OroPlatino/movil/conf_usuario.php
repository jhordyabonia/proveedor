	<div class="content-wrapper" style="min-height: 916px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?=$empresa->nombre?>
      <small>Proveedor.com.co</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active"><?=$empresa->nombre?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
	<div class="row">
		<div class="col-md-4">
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

							<div class="input-group pad-left3 col-xs-12 col-md-12 col-lg-12">
							  <label for="">
									<span class="ico-gene glyphicon glyphicon-user"></span>
									Nombre de usuario
									<i id="err_usuario"></i>
									</label>
							</div>

							<!-- Campo 1 -->
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12">
							  <input required type="text" class="form-control" name="usuario"
							  onchange="JavaScript:eliminar_espacios(this);verificar_attime(this);verificar_largo(this,6);verificar_caracteres(this,'[SYM]');"
							onclick="JavaScript:limpiar(this);" ondblclick="necessary"  
							 value="<?=$usuario->usuario?>" placeholder="Nombre de usuario">
							  </div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_usuario" style="display:none" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_usuario"></p>
							</div>

							<div class="input-group pad-left3 col-xs-12 col-md-12 col-lg-12">
							  <label for="">
										<i class="ico-gene2 fa fa-at"></i>
										Email
									<i id="err_email"></i>
								</label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12">
							  <input required type="text" class="form-control" name="email"
							  onchange="JavaScript:verificar_formato(this);verificar_attime(this)" onclick="JavaScript:limpiar(this);"
							  value="<?=$usuario->email?>" placeholder="Email">
							 </div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_email" style="display:none" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_email"></p>
							</div>

							<div class="input-group pad-left3 col-xs-12 col-md-12 col-lg-12">
							  <label for="">
									<span class="ico-gene glyphicon glyphicon-asterisk"></span>
									Contraseña
									</label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12">
							  <span class="">
							  	
							  </span>
							  <input required type="password" class="form-control" name="password_old"
							 	class="input-style"  placeholder="Contraseña">
							  </div>
                          
                            
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12" style="padding:2%;">
                                <button type="submit" class="btn btn-primary">
									<i class="ico-circle fa fa-floppy-o"></i>
                                    Guardar
                                 </button>
                               </div>

    					<?=form_close()?>
			
                </div><!-- /.box-body -->
              </div>
              </div>
              </div>
              </div>
  </section>