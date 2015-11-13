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
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
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
					<span class="ico-cont-style glyphicon glyphicon-th-list"></span>
					Catalogo de Productos
				</h3>
				<div class="content-catalogo-pro">
					<div class="titles">
						<h3 class="text-title-pub">Publicar Producto o Servicio</h3>
						<ul class="list-item-cata">
							<li class="item-cata" onclick="location.href='<?=base_url()?>publicar_producto'">
								<span class="glyphicon glyphicon-open"></span>
								Publicacion Completa
							</li>
							<li class="item-cata" onclick="location.href='<?=base_url()?>producto/administrar'">
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
							  <input type="text" class="form-control" name="nombre"
                  				 onclick="JavaScript:limpiar(this)"  required
                  				 onchange="JavaScript:verificar_largo(this,5);" 
                  				 value="<?php echo set_value('nombre'); ?>" placeholder="Nombre del productos o servicio">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id='err_nombre' ></i></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_nombre"  class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_nombre"></p>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-list"></span>
							  </span>
							 <select class="form-control" required name="categoria" 
							 onchange="JavaScript:cambio_categoria_simple(this.value); document.getElementById('div_subcategoria').style.display='';"
							  required value="<?=set_value('categoria'); ?>"
                  				 onclick="JavaScript:limpiar(this)" >
								  <option value="1">Selecciones la categoria del producto o servicio requerido</option>
							  	  <?php foreach($categorias as $categoria):?>
								  	<option value="<?=$categoria->id_categoria?>"><?=$categoria->nombre_categoria?></option>
								  <?php endforeach;?>
							</select>
								<span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id='err_categoria' ></i></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_categoria" style="display:none"  class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_categoria"></p>
							</div>
							<!-- Row de Sub-Categorias del Producto -->
					            <div id="div_subcategoria" style="display:none" class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
								  <span class="fiel-tramspa input-group-addon">
								  	<span class="ico-gene glyphicon glyphicon-list"></span>
								  </span>
								  <select class="form-control new-br" name="subcategorias_simples" id="subcategorias_simples">
					                      <option value="" selected>Seleccione una sub-categoria del producto</option>       
					                    </select>
					                   <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id='err_subcategorias_simples' ></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_subcategorias_simples"  class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_subcategorias_simples"></p>
							</div>

							<!-- Campo 3 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-textarea-item glyphicon glyphicon-list-alt"></span>
							  </span>
							  <textarea class="form-control" rows="5"							  
                  				 onclick="JavaScript:limpiar(this)" required
                  				 onchange="JavaScript:verificar_largo(this,10);" 
                  				 name="descripcion" 
                  				 placeholder="Descripcion del producto o servicio"></textarea>
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id='err_descripcion' ></i></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido2 glyphicon glyphicon-asterisk"></span>
							  </span>
							  <span class="palabras-maxima"><strong>5000</strong> palabras máximo</span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_descripcion" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_descripcion"></p>
							</div>

							<!-- Campo 4 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  	<div class="conte-radios">
								  	<div class="radio inline-block">
									  <label>
									    <input type="radio"  name="precio" id="optionsRadios1" checked value="1" onclick="document.getElementById('div_precio').style.display=''">
									    Precio unitario
									  </label>
									</div>
									<div class="radio inline-block">
									  <label>
									    <input type="radio" name="precio" id="optionsRadios2" value="0" onclick="document.getElementById('div_precio').style.display='none'">
									    Precio a convenir
									  </label>
									</div>
								</div>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_precio" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_precio"></p>
							</div>

							<!-- Campo 5 -->
							<div id="div_precio" class="input-group style-padding2 col-xs-12 col-md-6 col-lg-8">
							  	<span class="input-group-addon">
							  		$
							  	</span>
							  	<input type="text" class="form-control" name="precio" id="precio" onkeypress="this.value+=' ';decimal_point(this)" onchange="decimal_point(this)" placeholder="Precio">
							  	<span class="fiel-tramspa input-group-addon">
							  		por
							  	</span>
							  	<div class="input-group">
								    <select class="form-control" name="list_medidas">
									  <option value="1">Unidad (und)</option>
								    	<?php foreach ($unidades as $key => $unidad):?>
										  <option <?=$unidad->id_dimension?> ><?=$unidad->nombre?></option>
										<?php endforeach;?>
									</select>
								</div>
								<span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id="err_list_medidas"> </i></i>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_list_medidas" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7" style="padding-top: 15px;">
							  <p class="text_errors" id="msj_err_list_medidas"></p>
							</div>

							<!-- Campo 6 -->
							<script type="text/javascript">
								function load_new_logo2()
			                    {
			                        var paths = document.getElementById('btn_archivos2').files;
			                        var navegador = window.URL || window.webkitURL;
			                        var url = navegador.createObjectURL(paths[0]);
			                        document.getElementById('img_logo').src=url; 		                        
	                    		}
                   			</script>
							<div class="input-group style-padding2 col-xs-12 col-md-6 col-lg-8">
								<div class="subir-imagenes" >
							  		<a href="JavaScript:document.getElementById('btn_archivos2').click()" class="enlace-ssubir-imagenes">
							  			<span class="ico-subir-img glyphicon glyphicon-open"></span>
							  			<p class="text-subir-img">Subir imagenes del producto</p>
							  		</a>
							  		<div class="container-logo-empresa inline-block">
							  			<img  id="img_logo" class="logo" src="<?=base_url()?>uploads/logos/default.png">
							  		</div>
							  	</div>   
							  	<div style="display:none">
		                          <input type="file" class="filestyle" id="btn_archivos2" name="userfiles[]" multiple
		                            data-size="lg" data-input="false" data-icon="false" data-badge="false" 
		                            onchange="JavaScript:load_new_logo2();">
		                        </div>
							</div>

				            <div class="row" style="margin-top:-14px;" >
				              <div class="col-md-12 col-xs-12" style="padding: 0;">
				                <div class="col-md-6 col-xs-12">
				                  <div style="display:none" class="btn-group btn-group-lg vcenter" id="eliminar1" >
				                      <button style="display:none" type="button" id="btn_delete" class="btn btn-default">
				                        <span class="glyphicon glyphicon-remove"></span>
				                        Eliminar Imagen
				                      </button>
				                  </div>
				                </div>
				              </div>
				              </div>
							<!-- Campo validacion -->
							<div  id="parent_msj_err_imagenes" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_imagenes"></p>
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


<script type="text/javascript">

       document.onload=ready();
       function ready()
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/confirmar_producto/";
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                ready=document.getElementById('ready');
                ready.innerHTML=popup.response;
                console.log(popup.response);
                <?php if($this->session->flashdata('producto_registrado')):?>
                  document.getElementById('launch_popup_ready').click();
                <?php endif; ?>
              }
       }
  </script>
  
  <div data-toggle="modal" data-target="#confirmar_producto" id="launch_popup_ready">
    </div>
  <div id="ready" onload="JavaScript:ready();">
    </div>
    <!--
    -->