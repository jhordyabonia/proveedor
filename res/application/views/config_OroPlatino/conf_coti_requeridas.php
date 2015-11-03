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
			<div class="conten-item2 col-xs-12 col-md-3 col-lg-3">
				<h3 class="text-item">General</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-perfil fa fa-building-o"></i>
					<a href="<?=base_url()?>config_empresa/perfil_empresa" class="text-subitem">Perfil de empresa</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-contacto fa fa-phone"></i>
					<a href="<?=base_url()?>config_empresa/contacto" class="text-subitem">Contacto</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
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
					<a href="<?=base_url()?>config_empresa/publicar_producto"  class="text-subitem">Catalogo de Productos</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-bookmark"></span>
					<a href="<?=base_url()?>config_empresa/productos_principales" class="text-subitem">Productos Principales</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-briefcase"></span>
					<a href="<?=base_url()?>config_empresa/nosotros" class="text-subitem">Nosotros</a>
				</div>
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
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
					<i class="ico-cont-style fa fa-file-text"></i>
					Cotizaciones Requeridas
				</h3>
				<div class="content-catalogo-pro">
					<div class="titles">
						<h3 class="text-title-pub">Solicitar cotizaciones a multiples Proveedores</h3>
						<ul class="list-item-cata">
							<li class="item-cata">
								<span class="glyphicon glyphicon-th"></span>
								Administrar Cotizaciones Requeridas
							</li>
						</ul>
					</div>
					<div class="conten-formulario-cata">
						<p class="text-cotice-eq">Solicite cotizaciones de los productos o servicios que requiere la empresa a multiples Proveedores.</p>
						<div class="formulario-cata">
							<p class="text-requerido"><span class="ico-requerido glyphicon glyphicon-asterisk"></span>Requerido</p>
          	<?= form_open('publicar_oferta/registrar/TRUE'); ?>
            					<!-- Campo 2 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-list"></span>
							  </span>
							  <select class="form-control" name="subacategoria">
								  <option selected>Selecciones la categoria del producto o servicio requerido</option>
								  <option>item-categoria</option>
								  <option>item-categoria</option>
								  <option>item-categoria</option>
								  <option>item-categoria</option>
								</select>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-pencil"></span>
							  </span>
							  <input type="text" class="form-control" name="nombre" placeholder="Nombre del productos o servicio requerido">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 3 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-textarea-item glyphicon glyphicon-list-alt"></span>
							  </span>
							  <textarea class="form-control" rows="5" name="descripcion" placeholder="Descripcion del producto o servicio requerido"></textarea>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido2 glyphicon glyphicon-asterisk"></span>
							  </span>
							  <span class="palabras-maxima"><strong>5000</strong> palabras maimo</span>
							</div>
							<!-- Campo 5 -->
							<div class="input-group  inline-block style-padding3 col-xs-12 col-md-6 col-lg-4">
							  	<input type="text" class="form-control" name="cantidad" placeholder="Cantidad requerida">
							</div>
							<div class="input-group inline-block style-padding4 col-xs-12 col-md-3 col-lg-3">
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
							<div class="input-group inline-block style-padding5 col-xs-12 col-md-1 col-lg-1">
								<p>Opcional</p>
							</div>
							<!-- Campo 6 -->
							<div class="input-group style-padding2 col-xs-12 col-md-6 col-lg-8">
								<div class="adjuntar-archivo">
							  		<a class="enlace-ssubir-imagenes">
							  			<span class="ico-subir-img glyphicon glyphicon-paperclip"></span>
							  			<p class="text-subir-img">Adjuntar archivo</p>
							  		</a>
							  	</div>
							</div>
							<!-- Campo 7 -->
							<div class="input-group style-padding2 col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-cotizacion-req">
									<i class="ico-coti fa fa-file-text"></i>
									<p class="text-publicarPro">SOLICITAR COTIZACION</p> 
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
