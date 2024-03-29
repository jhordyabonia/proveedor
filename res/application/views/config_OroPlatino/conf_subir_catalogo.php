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
					<a href="<?=base_url()?>config_empresa/publicar_producto" class="text-subitem">Subir Productos</a>
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
					<a href="<?=base_url()?>config_empresa/catalogo" class="text-subitem">Subir Catálogo</a>
				</div>
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<span class="ico-cont-style glyphicon glyphicon-th-list"></span>
					Catálogo de Productos
				</h3>
				<div class="content-catalogo-pro">
					<div class="titles">
						<h3 class="text-title-pub">Publicar Catálogos</h3>
					</div>
					<div class="conten-formulario-cata">						
						<div class="formulario-subircata">
							<p class="text-requerido"><span class="ico-requerido glyphicon glyphicon-asterisk"></span>Requerido</p>
							<p class="text-subir-cata">Publique los catálogos de productos y/o servicios que ofrece la empresa.</p>
							
						<?= form_open_multipart('editar_empresa/catalogos'); ?>
            				<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene fa fa-file-pdf-o"></i>
							  </span>
							  <input type="text" class="form-control" name="nombre" required
							   onchange="JavaScript:verificar_largo(this,5);"
							onclick="JavaScript:limpiar(this);" 
							placeholder="Nombre del Catálogo">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">							  	
									<i id="err_nombre"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_nombre" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_nombre"></p>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-list"></span>
							  </span>
							  <select class="form-control" name="categoria"	 required						  
							   onchange="JavaScript:verificar(this);"
							onclick="JavaScript:limpiar(this);" >
								  <option selected>Selecciones una categoria</option>
								      <?php foreach($categorias as $categoria):?>
									  	<option value="<?=$categoria->id_categoria?>"><?=$categoria->nombre_categoria?></option>
									  <?php endforeach;?>
								</select>
								<span class="fiel-tramspa input-group-addon conten-ico-vali">
									<i id="err_"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_categoria" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_categoria"></p>
							</div>

							<!-- Campo 3 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-textarea-item glyphicon glyphicon-list-alt"></span>
							  </span>
							  <textarea class="form-control" rows="5" name="descripcion" required
							   onchange="JavaScript:verificar_largo(this,10);"
							onclick="JavaScript:limpiar(this);" 
							 placeholder="Descripcion del Catálogo"></textarea>
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">  	
									<i id="err_descripcion"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido2 glyphicon glyphicon-asterisk"></span>
							  </span>
							  <span class="palabras-maxima"><strong>5000</strong> palabras maimo</span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_descripcion" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_descripcion"></p>
							</div>

							<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-pencil"></span>
							  </span>
							  <input type="text" class="form-control" name="palabras_clave"							  
							   onchange="JavaScript:verificar_largo(this,5);"
							onclick="JavaScript:limpiar(this);"  placeholder="Palabras claves separadas por comas (,)">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
									<i id="err_palabras_clave"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->							
							<div id="parent_msj_err_palabras_clave" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_palabras_clave"></p>
							</div>

							<!-- Campo 6 -->
							<div class="input-group style-padding2 col-xs-12 col-md-6 col-lg-8">
								<div class="subir-imagenes-cata" onclick="document.getElementById('catalogo').click()">
							  		<a class="enlace-ssubir-imagenes">
							  			<span class="ico-subir-img glyphicon glyphicon-open"></span>
							  			<p class="text-subir-img">Subir Catálogo <p class="agregarpdf" id="adjunto">(Agregar archivo PDF o DOC)</p></p>
							  		</a>
							  		<div style="display:none">
							  			<input type="file"  id="catalogo" name="catalogo[]" required
							  			onchange="JavaScript:var paths = document.getElementById('catalogo').files;document.getElementById('adjunto').innerHTML=paths[0]['name'];" >
							  		</div>
							  	</div>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_catalogo" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_catalogo"></p>
							</div>

							<!-- Campo 7 -->
							<div class="input-group style-padding3 col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-publicarPro">
									<i class="ico-circle fa fa-arrow-circle-up"></i>
									<p class="text-publicarPro">PUBLICAR CATÁLOGO</p> 
								</button>
							</div>											
    					<?=form_close()?>
						</div>
					</div>
					<div class="catalogo-public">
						<h3 class="text-cata-publi">Catálogos Publicados (<?php if(!$catalogos){echo 0;}else{ echo count($catalogos);}?>)</h3>	
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
										<p class="nomArchivo-catalo"><a href="<?=base_url()?>uploads/catalogo/<?=$catalogo->catalogo?>" ><?=$catalogo->catalogo?></p></a>
										<a class="eliminar-catalogo" href="<?=base_url()?>editar_empresa/borrar_catalogo/<?=$catalogo->id?>" ><i class="ico-eli-cat fa fa-times-circle"></i>Borrar</a>
									</div>
								</div>
							<?php endforeach;?>
						</div>
						<!-- Paginador de catalogos -->
						<div class="contentidoo-paginador">
						  <ul class="pagination">		
						  <!--				   
						    <li><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li>
						      <a href="#" aria-label="Next">
						        <span aria-hidden="true">siguiente</span>
						      </a>
						    </li>
						-->
						  </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>