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
		<div class="conten-config col-xs-12 col-md-12 col-lg-12">
			<div class="conten-item col-xs-12 col-md-3 col-lg-3">
				<h3 class="text-item">General</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
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
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
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
					<span class="ico-cont-style glyphicon glyphicon-th-list"></span>
					Catalogo de Productos
				</h3>
				<div class="content-catalogo-pro">
					<div class="titles">
						<h3 class="text-title-pub">Publicar Producto o Servicio</h3>
						<ul class="list-item-cata">
							<li class="item-cata">
								<span class="glyphicon glyphicon-open"></span>
								Publicacion Completa
							</li>
							<li class="item-cata">
								<span class="glyphicon glyphicon-th"></span>
								Administrar Productos
							</li>
						</ul>
					</div>
					<div class="conten-formulario-cata">
						<p class="text-publique">Publique en la pagina de "Catalago de Productos" los productos o servicios que ofrece la empresa.</p>
						<div class="formulario-cata">
							<p class="text-requerido"><span class="ico-requerido glyphicon glyphicon-asterisk"></span>Requerido</p>
							
          <?= form_open_multipart('publicar_producto/registrar/TRUE'); ?>
							<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-pencil"></span>
							  </span>
							  <input type="text" class="form-control" name="nombre" placeholder="Nombre del productos o servicio">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 2 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-list"></span>
							  </span>
							  <select class="form-control" name="subcategoria">
								  <option selected>Selecciones una categoria</option>
								  <option>item-categoria</option>
								  <option>item-categoria</option>
								  <option>item-categoria</option>
								  <option>item-categoria</option>
								</select>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 3 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-textarea-item glyphicon glyphicon-list-alt"></span>
							  </span>
							  <textarea class="form-control" rows="5" name="descripcion" placeholder="Descripcion del producto o servicio"></textarea>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido2 glyphicon glyphicon-asterisk"></span>
							  </span>
							  <span class="palabras-maxima"><strong>5000</strong> palabras maimo</span>
							</div>
							<!-- Campo 4 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  	<div class="conte-radios">
								  	<div class="radio inline-block">
									  <label>
									    <input type="radio" name="precio" id="optionsRadios1" value="1">
									    Precio unitario
									  </label>
									</div>
									<div class="radio inline-block">
									  <label>
									    <input type="radio" name="precio" id="optionsRadios2" value="0">
									    Precio a convenir
									  </label>
									</div>
								</div>
							</div>
							<!-- Campo 5 -->
							<div class="input-group style-padding2 col-xs-12 col-md-6 col-lg-8">
							  	<span class="input-group-addon">
							  		$
							  	</span>
							  	<input type="text" class="form-control" name="precio" placeholder="Precio">
							  	<span class="fiel-tramspa input-group-addon">
							  		por
							  	</span>
							  	<div class="input-group">
								    <select class="form-control" name="medida">
									  <option selected>Unidad (und)</option>
									  <option>item-unidad</option>
									  <option>item-unidad</option>
									  <option>item-unidad</option>
									  <option>item-unidad</option>
									</select>
								</div>
							</div>
							<!-- Campo 6 -->
							<div class="input-group style-padding2 col-xs-12 col-md-6 col-lg-8">
								<div class="subir-imagenes">
							  		<a class="enlace-ssubir-imagenes">
							  			<span class="ico-subir-img glyphicon glyphicon-open"></span>
							  			<p class="text-subir-img">Subir imagenes del producto</p>
							  		</a>
							  	</div>
							</div>
							<!-- Campo 7 -->
							<div class="input-group style-padding2 col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-publicarPro">
									<i class="ico-circle fa fa-arrow-circle-up"></i>
									<p class="text-publicarPro">PUBLICAR PRODUCTOS</p> 
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
