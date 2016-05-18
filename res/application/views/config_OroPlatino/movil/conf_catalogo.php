
<section class="content">
	<div class="content-wrapper" style="min-height: 916px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <span class="ico-cont-style glyphicon glyphicon-bookmark"></span>
					Catálogos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active"><?=$empresa->nombre?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
		<div class="row">
		<div class="col-md-5">
            <div class="box box-warning">
                <div class="box-header with-border">
                 <div class="titles">
									<h3 class="text-title-pub">Publicar Catálogos</h3>
								</div>
                 
                </div><!-- /.box-header -->
                <div class="box-body"><div class="content-catalogo-pro">
					
					<div class="conten-formulario-cata">						
						<div class="formulario-subircata">
							<p class="text-requerido"><span class="ico-requerido "></span>Requerido</p>
							<p class="text-subir-cata">Publique los catálogos de productos y/o servicios que ofrece la empresa.</p>
							
						<?= form_open_multipart('editar_empresa/catalogos'); ?>
            				<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-12 col-lg-12">
							  <span class="">
							  	<i class="ico-gene fa fa-file-pdf-o"></i>
                                Nombre
							  </span>
							  <input type="text" class="form-control" name="nombre" required
							   onchange="JavaScript:verificar_largo(this,5);"
							onclick="JavaScript:limpiar(this);" 
							placeholder="Nombre del Catálogo">
							  <span class=" conten-ico-vali">							  	
									<i id="err_nombre"></i>
							  </span>
							  <span class="">
							  	<span class="ico-requerido "></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_nombre" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_nombre"></p>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding col-xs-12 col-md-12 col-lg-12">
							  <span class="">
							  	<span class="ico-gene glyphicon glyphicon-list"></span>
                                Categoria
							  </span>
							  <select class="form-control" name="categoria"	 required						  
							   onchange="JavaScript:verificar(this);"
							onclick="JavaScript:limpiar(this);" >
								  <option selected>Selecciones una categoria</option>
								      <?php foreach($categorias as $categoria):?>
									  	<option value="<?=$categoria->id_categoria?>"><?=$categoria->nombre_categoria?></option>
									  <?php endforeach;?>
								</select>
								<span class=" conten-ico-vali">
									<i id="err_"></i>
							  </span>
							  <span class="">
							  	<span class="ico-requerido "></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_categoria" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_categoria"></p>
							</div>

							<!-- Campo 3 -->
							<div class="input-group style-padding col-xs-12 col-md-12 col-lg-12">
							  <span class="">
							  	<span class="ico-textarea-item glyphicon glyphicon-list-alt"></span>
                                  Descripcion
							  </span>
							  <textarea class="form-control" rows="5" name="descripcion" required
							   onchange="JavaScript:verificar_largo(this,10);"
							onclick="JavaScript:limpiar(this);" 
							 placeholder="Descripcion del Catálogo"></textarea>
							  <span class=" conten-ico-vali">  	
									<i id="err_descripcion"></i>
							  </span>
							  <span class="">
							  	<span class="ico-requerido2 "></span>
							  </span>
							  <span class="palabras-maxima"><strong>5000</strong> palabras maimo</span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_descripcion" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_descripcion"></p>
							</div>

							<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-12 col-lg-12">
							  <span class="">
							  	<span class="ico-gene glyphicon glyphicon-pencil"></span>Palabras claves
							  </span>
							  <input type="text" class="form-control" name="palabras_clave"							  
							   onchange="JavaScript:verificar_largo(this,5);"
							onclick="JavaScript:limpiar(this);"  placeholder="Palabras claves separadas por comas (,)">
							  <span class=" conten-ico-vali">
									<i id="err_palabras_clave"></i>
							  </span>
							  <span class="">
							  	<span class="ico-requerido "></span>
							  </span>
							</div>

							<!-- Campo validacion -->							
							<div id="parent_msj_err_palabras_clave" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_palabras_clave"></p>
							</div>

							<!-- Campo 6 -->
							<div class="input-group style-padding2 col-xs-12 col-md-12 col-lg-12">
								<div class="subir-imagenes-cata" onclick="document.getElementById('catalogo').click()">
							  		<a class="enlace-ssubir-imagenes">
							  			<span class="ico-subir-img glyphicon glyphicon-open"></span>
							  			Subir Catálogo
                                        <p class="agregarpdf" id="adjunto">(Agregar archivo PDF o DOC)</p></p>
							  		</a>
							  		<div style="display:none">
							  			<input type="file"  id="catalogo" name="catalogo[]" required
							  			onchange="JavaScript:var paths = document.getElementById('catalogo').files;document.getElementById('adjunto').innerHTML=paths[0]['name'];" >
							  		</div>
							  	</div>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_catalogo" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_catalogo"></p>
							</div>

							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12" style="padding:2%;">
                                <button type="submit" class="btn btn-primary">
									<i class="ico-circle fa fa-floppy-o"></i>
                                    Guardar
                                 </button>
                               </div>		
																	
    					<?=form_close()?>
						</div>
						</div>
						</div>			
					</div>
					<div class="catalogo-public">
						<h3 class="text-cata-publi">Catálogos Publicados (<?php if(!$catalogos){echo 0;}else{ echo count($catalogos);}?>)</h3>	
						<div class="conten-item-catapu row">
							<?php foreach($catalogos as $key => $catalogo):?>
								<div class="col-lg-12">
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
  </section>			
	</div>
</div>