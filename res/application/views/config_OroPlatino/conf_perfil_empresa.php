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
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-open"></span>
					<a href="<?=base_url()?>config_empresa/catalogo" class="text-subitem">Subir Catalogo</a>
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
							<div class="input-group pad-left col-xs-12 col-md-8 col-lg-8">
							  <label for="">Nombre de la Empresa</label>
							</div>

							<!-- Campo 1 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene2 fa fa-building-o"></i>
							  </span>
							  <input required type="text" class="form-control" id="nomnbre" name="nombre" ondblclick="necessary" 
							  onchange="JavaScript:verificar_largo(this,3);verificar_caracteres(this,'[SYM].:|&.')"
							   onclick="JavaScript:limpiar(this)"
							   value="<?=$empresa->nombre?>" placeholder="Nombre de la Empresa">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id='err_nombre' ></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_nombre"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_nombre"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-8 col-lg-8">
							  <label for="">Nit de la Empresa o C.C. del Comerciante</label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene fa fa-list-alt"></i>
							  </span>
							  <input required type="text" class="form-control" id="nit" name="nit" ondblclick="necessary"
							  onchange="JavaScript:eliminar_espacios(this);verificar_attime(this); verificar_caracteres(this,' áéíóúñ [ALPHA][SYM]|-')"
							  value="<?=$empresa->nit?>"placeholder="Nit de la Empresa o C.C. del Comercial">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id="err_nit"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_nit"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_nit"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-8 col-lg-8">
							  <label for="">Tipo de Empresa</label>
							</div>

							<!-- Campo 3 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-tags"></span>
							  </span>
							  <select required class="form-control" id="tipo_empresa" id="tipo_empresa"
							  onchange="JavaScript:verificar(this);" name="tipo">
								  <option>Tipo de Empresa</option>
								  <?php foreach($tipos_empresa as $key=> $tipo):?>
								 	 <option <?php if($empresa->tipo==$tipo->id_tipoempresa){echo 'selected';}?> value="<?=$tipo->id_tipoempresa?>"><?=$tipo->tipo?></option>
								  <?php endforeach;?>
								</select>
								<span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id='err_tipo' ></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_tipo"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_tipo"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-8 col-lg-8">
							  <label for="">Sector de la Empresa</label>
							</div>

							<!-- Campo 4 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-list"></span>
							  </span>
							  <select required class="form-control" name="categoria">
								  <option selected>Seleccionar sector de la Empresa</option>
								  <?php foreach($categorias as $key=> $categoria):?>
								 	 <option <?php foreach(explode('|',$empresa->categorias) as $value){if($categoria->id_categoria==$value){echo "selected";break;}}?> value="<?=$categoria->id_categoria?>"><?=$categoria->nombre_categoria?></option>
								  <?php endforeach;?>
								</select>
								<span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id="err_categoria"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_categoria"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_categoria"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-8 col-lg-8">
							  <label for="">Descripción de la Empresa</label>
							</div>

							<!-- Campo 5 -->
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-10">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene3 glyphicon glyphicon-pencil"></span>
							  </span>
							  <textarea required rows="9" class="form-control" name="descripcion" 
							  ondblclick="necessary" onclick="JavaScript:limpiar(this)"
							  onchange="JavaScript:verificar_largo(this,15);verificar_largo_max(this,500);"
							  placeholder="Descripción de la Empresa"><?=$empresa->descripcion?></textarea>
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id="err_descripcion"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido3 glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_descripcion"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_descripcion"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-8 col-lg-8">
							  <label for="">Productos Principales (separados por comas)</label>
							</div>

							<!-- Campo 5 -->
							<div class="input-group style-padding6 col-xs-12 col-md-7 col-lg-7">
							  <span class="fiel-tramspa input-group-addon" style="padding-right: 9px;">
							  	<i class="ico-gene4 fa fa-cubes"></i>
							  </span>
							  <input type="text" class="form-control" name="prod_princ" 
							  onchange="JavaScript:verificar(this);" onclick="JavaScript:limpiar(this)"  value="<?=$empresa->productos_principales?>" 
							  placeholder="Productos Principales (separados por comas)">
							  <span class="fiel-tramspa input-group-addon conten-ico-vali">
							  	<i id="err_prod_prin"></i>
							  </span>
							  <span class="fiel-tramspa input-group-addon">
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_prod_prin"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_prod_prin"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-8 col-lg-8">
							  <label for="">Productos Requeridos (separados por comas)</label>
							</div>

							<!-- Campo 6 -->
							<div class="input-group style-padding6 col-xs-12 col-md-7 col-lg-7">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene2 fa fa-shopping-cart"></i>
							  </span>
							  <input type="text" class="form-control" name="prod_int4"
							  onchange="JavaScript:verificar(this);" onclick="JavaScript:limpiar(this)"  value="<?=$empresa->productos_de_interes?>"
							   placeholder="Productos Requeridos (separados por comas)">
							  
							  <span class="fiel-tramspa input-group-addon">
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_prod_int4"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_prod_int4"></p>
							</div>
							<!-- Campo 6 -->
							<div class="input-group style-padding7 inline-block col-xs-12 col-md-6 col-lg-6">
								<div class="adjuntar-archivo">
							  		<a class="enlace-ssubir-imagenes" href="JavaScript:document.getElementById('logo').click()">
							  			<span class="ico-subir-img glyphicon glyphicon-open"></span>
							  			<p class="text-subir-img">Subir logotipo de Empresa</p>
							  			<div style="display:none" >
							  				<input type="file" id="logo" name="logo[]" onchange="JavaScript:load_new_logo2()"/>
							  			</div>
							  		</a>
							  	</div>
							</div>
							<!-- Campo 6 -->
							<script type="text/javascript">
								function load_new_logo2()
			                    {
			                        var paths = document.getElementById('logo').files;
			                        var navegador = window.URL || window.webkitURL;
			                        var url = navegador.createObjectURL(paths[0]);
			                        document.getElementById('img_logo').src=url; 		                        
	                    		}
                   			</script>
							<div class="input-group inline-block col-xs-12 col-md-5 col-lg-5">
								<div class="adjuntar-archivo">
							  		<div class="container-logo-empresa inline-block">
							  			<img  id="img_logo" class="logo" src="<?=base_url()?>uploads/logos/<?=$empresa->logo?>">
							  		</div>
							  		<div class="nombre-img-empres">
							  			<p class="nombre-archivo-logo"></p>
							  			<div class="conten-borrar">
								  			<!--
								  			<i class="ico-remove fa fa-times-circle"></i>
								  			<a class="enalce-remove" href="">Borrar</a>
								  			-->
							  			</div>
							  		</div>
							  	</div>
							</div>
							<!-- Campo validacion -->
							<div id="parent_msj_err_"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_"></p>
							</div>
							<!-- Campo 4 -->
							<div class="input-group style-padding8 col-xs-12 col-md-8 col-lg-8">
							  	<div class="conte-radios">
							  		<h3 class="que-quiero">Que quieres hacer en Proveedor?</h3>
								  	<div class="radio inline-block">
									  <label>
									    <input type="radio" name="radio" id="optionsRadios1" <?php if($usuario->rol=="comprar"){echo "checked";}?> value="comprar">
									    Comprar
									  </label>
									</div>
									<div class="radio inline-block">
									  <label>
									    <input type="radio" name="radio" id="optionsRadios2" <?php if($usuario->rol=="vender"){echo "checked";}?> value="vender">
									    Vender
									  </label>
									</div>
									<div class="radio inline-block">
									  <label>
									    <input type="radio" name="radio" id="optionsRadios2"  <?php if($usuario->rol=="ambas"){echo "checked";}?>  value="ambas">
									    Ambas
									  </label>
									</div>
								</div>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_"></p>
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