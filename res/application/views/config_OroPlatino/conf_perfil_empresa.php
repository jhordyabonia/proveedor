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
		<div class="conten-config4 col-xs-12 col-md-12 col-lg-12">
			<div class="conten-item4 col-xs-12 col-md-3 col-lg-3">
				<h3 class="text-item">General</h3>
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-perfil fa fa-building-o"></i>
					<a class="text-subitem">Perfil de empresa</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-contacto fa fa-phone"></i>
					<a class="text-subitem">Contacto</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-usuario fa fa-child"></i>
					<a class="text-subitem">Usuario</a>
				</div>
				<h3 class="text-item-dos">Configurar Web</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-home"></span>
					<a class="text-subitem">Inicio</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-th-list"></span>
					<a class="text-subitem">Catalogo de Productos</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-bookmark"></span>
					<a class="text-subitem">Productos Principales</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-briefcase"></span>
					<a class="text-subitem">Nosotros</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="ico-config-style2 fa fa-file-text"></i>
					<a class="text-subitem">Cotizaciones requeridas</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-open"></span>
					<a class="text-subitem">Subir Catalogo</a>
				</div>
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<i class="icon-contacto fa fa-building-o"></i>
					Perfil de Empresa
				</h3>
				<div class="content-catalogo-pro">
					<div class="titles">
						<h3 class="text-title-contacto">Informacion de la Empresa</h3>
					</div>
					<div class="conten-formulario-cata">						
						<div class="formulario-cata">
							<p class="text-requerido"><span class="ico-requerido glyphicon glyphicon-asterisk"></span>Requerido</p>
							<p class="text-publique2">Para guardar o agregar informacion de "Perfil Empresa", ingrese la informacion
								en los campos y haga click en "Guardar".</p>

						<?=form_open_multipart(base_url().'editar_empresa/perfil')?>
							<!-- Campo 1 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene2 fa fa-building-o"></i>
							  </span>
							  <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Empresa">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene fa fa-list-alt"></i>
							  </span>
							  <input type="text" class="form-control" name="nit" placeholder="Nit de la Empresa o C.C. del Comercial">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 4 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-tags"></span>
							  </span>
							  <select class="form-control" name="tipo">
								  <option selected>Tipo de Empresa</option>
								  <option>Colombia</option>
								  <option>EE.UUU</option>
								</select>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 4 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-list"></span>
							  </span>
							  <select class="form-control" name="categoria">
								  <option selected>Seleccionar sector de la Empresa</option>
								  <option>Colombia</option>
								  <option>EE.UUU</option>
								</select>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 5 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-10">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene3 glyphicon glyphicon-pencil"></span>
							  </span>
							  <textarea rows="9" class="form-control" name="descripcion" placeholder="Descripción de la Empresa"></textarea>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido3 glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 5 -->
							<div class="input-group style-padding6 col-xs-12 col-md-7 col-lg-7">
							  <span class="fiel-tramspa input-group-addon" style="padding-right: 9px;">
							  	<i class="ico-gene4 fa fa-cubes"></i>
							  </span>
							  <input type="text" class="form-control" name="prod_princ" placeholder="Productos Principales (separados por comas)">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 6 -->
							<div class="input-group style-padding6 col-xs-12 col-md-7 col-lg-7">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene2 fa fa-shopping-cart"></i>
							  </span>
							  <input type="text" class="form-control" name="prod_req" placeholder="Productos Requeridos (separados por comas)">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 6 -->
							<div class="input-group style-padding7 inline-block col-xs-12 col-md-6 col-lg-6">
								<div class="adjuntar-archivo">
							  		<a class="enlace-ssubir-imagenes" href="JavaScript:document.getElementById('logo').click()">
							  			<span class="ico-subir-img glyphicon glyphicon-open"></span>
							  			<p class="text-subir-img">Subir logotipo de Empresa</p>
							  			<div style="display:none" >
							  				<input type="file" id="logo" name="logo"/>
							  			</div>
							  		</a>
							  	</div>
							</div>
							<!-- Campo 6 -->
							<div class="input-group inline-block col-xs-12 col-md-5 col-lg-5">
								<div class="adjuntar-archivo">
							  		<div class="container-logo-empresa inline-block">
							  			<img src="<?php echo base_url()?>assets/img/img-logo-em-ejemplo.png">
							  		</div>
							  		<div class="nombre-img-empres">
							  			<p class="nombre-archivo-logo">Nombre del archivo.PNG</p>
							  			<div class="conten-borrar">
								  			<i class="ico-remove fa fa-times-circle"></i>
								  			<a class="enalce-remove" href="">Borrar</a>
							  			</div>
							  		</div>
							  	</div>
							</div>
							<!-- Campo 4 -->
							<div class="input-group style-padding8 col-xs-12 col-md-8 col-lg-8">
							  	<div class="conte-radios">
							  		<h3 class="que-quiero">Que quieres hacer en Proveedor?</h3>
								  	<div class="radio inline-block">
									  <label>
									    <input type="radio" name="radio" id="optionsRadios1" value="comprar">
									    Comprar
									  </label>
									</div>
									<div class="radio inline-block">
									  <label>
									    <input type="radio" name="radio" id="optionsRadios2" value="vender">
									    Vender
									  </label>
									</div>
									<div class="radio inline-block">
									  <label>
									    <input type="radio" name="radio" id="optionsRadios2" value="ambas">
									    Ambas
									  </label>
									</div>
								</div>
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