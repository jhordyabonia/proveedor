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
		<div class="conten-config3 col-xs-12 col-md-12 col-lg-12">
			<div class="conten-item3 col-xs-12 col-md-3 col-lg-3">
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
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-open"></span>
					<a href="<?=base_url()?>config_empresa/catalogo" class="text-subitem">Subir Catalogo</a>
				</div>
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<span class="ico-cont-style glyphicon glyphicon-th-list"></span>
					Catalogo de Productos
				</h3>
				<div class="content-catalogo-pro">
					<div class="titles">
						<h3 class="text-title-pub">Publicar Catalogos</h3>
					</div>
					<div class="conten-formulario-cata">						
						<div class="formulario-subircata">
							<p class="text-requerido"><span class="ico-requerido glyphicon glyphicon-asterisk"></span>Requerido</p>
							<p class="text-subir-cata">Publique los catalogos de productos y/o servicios que ofrece la empresa.</p>
							
						<?= form_open('editar_empresa/catalogos'); ?>
            				<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene fa fa-file-pdf-o"></i>
							  </span>
							  <input type="text" class="form-control" name="nombre" placeholder="Nombre del Catalogo">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i class="fa fa-check-circle validacion_success"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors"></p>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-list"></span>
							  </span>
							  <select class="form-control" name="categoria">
								  <option selected>Selecciones una categoria</option>
								  <option>item-categoria</option>
								  <option>item-categoria</option>
								  <option>item-categoria</option>
								  <option>item-categoria</option>
								</select>
								<span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i class="fa fa-check-circle validacion_success"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors"></p>
							</div>

							<!-- Campo 3 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-textarea-item glyphicon glyphicon-list-alt"></span>
							  </span>
							  <textarea class="form-control" rows="5" name="descripcion" placeholder="Descripcion del Catálogo"></textarea>
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i class="fa fa-times-circle validacion_error_ta2"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido2 glyphicon glyphicon-asterisk"></span>
							  </span>
							  <span class="palabras-maxima"><strong>5000</strong> palabras maimo</span>
							</div>

							<!-- Campo validacion -->
							<div class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors"></p>
							</div>

							<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-pencil"></span>
							  </span>
							  <input type="text" class="form-control" name="palabras_clave" placeholder="Palabras claves separadas por comas (,)">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i class="fa fa-times-circle validacion_error"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors"></p>
							</div>

							<!-- Campo 6 -->
							<div class="input-group style-padding2 col-xs-12 col-md-6 col-lg-8">
								<div class="subir-imagenes-cata">
							  		<a class="enlace-ssubir-imagenes">
							  			<span class="ico-subir-img glyphicon glyphicon-open"></span>
							  			<p class="text-subir-img">Subir catalogo <p class="agregarpdf">(Agregar archivo PDF o DOC)</p></p>
							  		</a>
							  	</div>
							</div>

							<!-- Campo validacion -->
							<div class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors"></p>
							</div>

							<!-- Campo 7 -->
							<div class="input-group style-padding3 col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-publicarPro">
									<i class="ico-circle fa fa-arrow-circle-up"></i>
									<p class="text-publicarPro">PUBLICAR CATALOGO</p> 
								</button>
							</div>											
    					<?=form_close()?>
						</div>
					</div>
					<div class="catalogo-public">
						<h3 class="text-cata-publi">Catalogos Publicados (<?=count($catalogos)?>)</h3>	
						<div class="conten-item-catapu row">
							<?php foreach($catalogos as $key => $catalogo):?>
								<div class="col-lg-6">
									<div class="img-pdf-up">
										<img class="img-pdf" src="<?php echo base_url()?>assets/img/pdf.png">
									</div>
									<div class="text-pdf">
										<p class="nom_cata"><?=$catalogo->nombre?></p>
										<p class="cate_catalo"><?=$catalogo->categoria?></p>
										<p class="desc_catalo"><?=$catalogo->descripcion?></p>
										<p class="pala_clave_catalo"><?=$catalogo->palabras_clave?></p>
										<p class="nomArchivo-catalo"><a href="<?=base_url()?>uploads/catalogos/<?=$catalogo->catalogo?>" ><?=$catalogo->catalogo?></p></a>
										<a class="eliminar-catalogo"><i class="ico-eli-cat fa fa-times-circle"></i>Borrar</a>
									</div>
								</div>
							<?php endforeach;?>
						</div>
						<!-- Paginador de catalogos -->
						<div class="contentidoo-paginador">
						  <ul class="pagination">						   
						    <li><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li>
						      <a href="#" aria-label="Next">
						        <span aria-hidden="true">siguiente</span>
						      </a>
						    </li>
						  </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>