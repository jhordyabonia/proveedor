<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/config_OroPlatino/conf_cata_produc.css">


<div class="contenedor-config">
	<div class="title-config">
		<div class="conten-title col-xs-12 col-md-12 col-lg-12">
			<i class="ico-style-config fa fa-cog"></i>
			<h3 class="text-title-config">Configuracion</h3>
		</div>
	</div>
	<div class="container-config">
		<div class="conten-config5 col-xs-12 col-md-12 col-lg-12">
			<div class="conten-item5 col-xs-12 col-md-3 col-lg-3">
				<h3 class="text-item">General</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-perfil fa fa-building-o"></i>
					<a href="<?=base_url()?>config_empresa/perfil_empresa" class="text-subitem">Perfil de empresa</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-contacto fa fa-phone"></i>
					<a href="<?=base_url()?>config_empresa/contacto" class="text-subitem">Contacto</a>
				</div>
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-usuario fa fa-child"></i>
					<a href="<?=base_url()?>config_empresa/usuario" class="text-subitem">Usuario</a>
				</div>
				<h3 class="text-item-dos">Configurar Web</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-home"></span>
					<a href="<?=base_url()?>config_empresa/inicio" class="text-subitem">Inicio</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-th-list"></span>
					<a href="<?=base_url()?>config_empresa/publicar_producto" class="text-subitem">Catalogo de Productos</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-bookmark"></span>
					<a href="<?=base_url()?>config_empresa/productos_principales" class="text-subitem">Productos Principales</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-briefcase"></span>
					<a href="<?=base_url()?>config_empresa/nosotros" class="text-subitem">Nosotros</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="ico-config-style2 fa fa-file-text"></i>
					<a href="<?=base_url()?>config_empresa/cotizaciones" class="text-subitem">Cotizaciones requeridas</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-open"></span>
					<a href="<?=base_url()?>config_empresa/catalogo" class="text-subitem">Subir Catalogo</a>
				</div>
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<i class="icon-contacto fa fa-child"></i>
					Usuario
				</h3>
				<div class="content-catalogo-pro">
					<div class="titles">
						<h3 class="text-title-contacto">Informacion de Usuario</h3>
					</div>
					<div class="conten-formulario-cata">						
						<div class="formulario-cata">
							<p class="text-requerido"><span class="ico-requerido glyphicon glyphicon-asterisk"></span>Requerido</p>
							<p class="text-publique3">Para guardar o agregar informacion de usuario, ingrese la informacion
								en los campos y haga click en "Guardar".</p>

						<?=form_open_multipart(base_url().'editar_empresa/usuario')?>

							<div class="input-group pad-left3 col-xs-12 col-md-8 col-lg-8">
							  <label for="">Nombre de usuario</label>
							</div>

							<!-- Campo 1 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-user"></span>
							  </span>
							  <input type="text" class="form-control" name="usuario"
							  onchange="JavaScript:eliminar_espacios(this);verificar_attime(this);verificar_largo(this,5);verificar_caracteres(this,'[SYM]');"
							onclick="JavaScript:limpiar(this);" ondblclick="necessary"  
							 value="<?=$usuario->usuario?>" placeholder="Nombre de usuario">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id="err_usuario"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_usuario" style="display:none" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_usuario"></p>
							</div>

							<div class="input-group pad-left3 col-xs-12 col-md-8 col-lg-8">
							  <label for="">Email</label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene2 fa fa-at"></i>
							  </span>
							  <input type="text" class="form-control" name="email"
							  onchange="JavaScript:verificar_formato(this);verificar_attime(this)" onclick="JavaScript:limpiar(this);"
							  value="<?=$usuario->email?>" placeholder="Email">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id="err_email"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_email" style="display:none" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_email"></p>
							</div>

							<div class="input-group pad-left3 col-xs-12 col-md-8 col-lg-8">
							  <label for="">Contraseña</label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-asterisk"></span>
							  </span>
							  <input type="password" class="form-control" name="password"
							  onclick="JavaScript:limpiar(this);"
								onchange="JavaScript:verificar_igualdad(document.getElementById('password2'),this);verificar_largo(this,6);verificar_caracteres(this,' áéíóúñ');" 
								class="input-style"  placeholder="Contraseña">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id="err_password"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
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
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-asterisk"></span>
							  </span>
							  <input type="password" class="form-control" name="password2" placeholder="Confirmar Contraseña"
							  onclick="JavaScript:limpiar(this);"  ondblclick="necessary"
				  				onchange="JavaScript:verificar_igualdad(this,document.getElementById('password'))">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id="err_password2"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_password2" style="display:none" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_password2"></p>
							</div>

							<!-- Campo 7 -->
							<div class="input-group style-padding7 col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-guardar" type="submit">
									<i class="ico-circle fa fa-floppy-o"></i>
									<p class="text-publicarPro">Guardar</p> 
								</button>
							</div>

    					<?=form_close()?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>