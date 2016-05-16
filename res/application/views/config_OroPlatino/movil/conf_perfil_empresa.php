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
		<div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">
					<i class="icon-contacto fa fa-building-o"></i>
					Perfil de Empresa
				 </h3>
                 <h3 class="text-title-contacto">Informacion de la Empresa</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <h5 class="box-title">
                    Para guardar o agregar informacion de "Perfil Empresa", ingrese la informacion
								en los campos y haga click en "Guardar".</h5>
                  <?=form_open_multipart(base_url().'editar_empresa/perfil')?>
							<div class="input-group pad-left col-xs-12 col-md-12 col-lg-12">
							  <label for="">
									<i class="ico-gene2 fa fa-building-o"></i>
									Nombre de la Empresa
									<i id='err_nombre' ></i>
									</label>
							</div>

							<!-- Campo 1 -->
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12">
							   <input required type="text" class="form-control" id="nomnbre" name="nombre" ondblclick="necessary" 
							  onchange="JavaScript:verificar_largo(this,3);verificar_caracteres(this,'[SYM].:|&.')"
							   onclick="JavaScript:limpiar(this)"
							   value="<?=$empresa->nombre?>" placeholder="Nombre de la Empresa">
							  
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_nombre"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_nombre"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-12 col-lg-12">
							  <label for="">
									<i class="ico-gene fa fa-list-alt"></i>
									Nit de la Empresa o C.C. del Comerciante
									<i id="err_nit"></i>
							  </label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12">
							  <input required type="text" class="form-control" id="nit" name="nit" ondblclick="necessary"
							  onchange="JavaScript:eliminar_espacios(this);verificar_attime(this); verificar_caracteres(this,' áéíóúñ [ALPHA][SYM]|-')"
							  value="<?=$empresa->nit?>"placeholder="Nit de la Empresa o C.C. del Comercial">
							  
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_nit"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_nit"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-12 col-lg-12">
							  <label for="">
									<!--<span class="ico-gene glyphicon glyphicon-tags"></span>-->
									<span class="ico-gene3 glyphicon glyphicon-pencil"></span>
									Tipo de Empresa
									<i id='err_tipo' ></i>
									</label>
							</div>

							<!-- Campo 3 -->
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12">
							 <select required class="form-control" id="tipo_empresa" id="tipo_empresa"
							  onchange="JavaScript:verificar(this);" name="tipo">
								  <option>Tipo de Empresa</option>
								  <?php foreach($tipos_empresa as $key=> $tipo):?>
								 	 <option <?php if($empresa->tipo==$tipo->id_tipoempresa){echo 'selected';}?> value="<?=$tipo->id_tipoempresa?>"><?=$tipo->tipo?></option>
								  <?php endforeach;?>
								</select>
								
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_tipo"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_tipo"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-12 col-lg-12">
							  <label for="">
									<span class="ico-gene glyphicon glyphicon-list"></span>
									Sector de la Empresa
									<i id="err_categoria"></i>
									</label>
							</div>

							<!-- Campo 4 -->
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12">
							  <select required class="form-control" name="categoria">
								  <option selected>Seleccionar sector de la Empresa</option>
								  <?php foreach($categorias as $key=> $categoria):?>
								 	 <option <?php foreach(explode('|',$empresa->categorias) as $value){if($categoria->id_categoria==$value){echo "selected";break;}}?> value="<?=$categoria->id_categoria?>"><?=$categoria->nombre_categoria?></option>
								  <?php endforeach;?>
								</select>
								
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_categoria"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_categoria"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-12 col-lg-12">
							  <label for="">
									<span class="ico-gene3 glyphicon glyphicon-pencil"></span>
									Descripción de la Empresa
									<span class="ico-requerido3 glyphicon glyphicon-asterisk"></span>
									<i id="err_descripcion"></i>
									</label>
							</div>

							<!-- Campo 5 -->
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12">
							  
							  <textarea required rows="9" class="form-control" name="descripcion" 
							  ondblclick="necessary" onclick="JavaScript:limpiar(this)"
							  onchange="JavaScript:verificar_largo(this,15);verificar_largo_max(this,500);"
							  placeholder="Descripción de la Empresa"><?=$empresa->descripcion?></textarea>
							  </span>
							  
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_descripcion"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_descripcion"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-12 col-lg-12">
							  <label for="">
									<i class="ico-gene4 fa fa-cubes"></i>
									Productos Principales (separados por comas)
									<i id="err_prod_prin"></i>
								</label>
							</div>

							<!-- Campo 5 -->
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12">
							  <input type="text" class="form-control" name="prod_princ" 
							  onchange="JavaScript:verificar(this);" onclick="JavaScript:limpiar(this)"  value="<?=$empresa->productos_principales?>" 
							  placeholder="Productos Principales (separados por comas)">
							  
							  <span class="">
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_prod_prin"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_prod_prin"></p>
							</div>

							<div class="input-group pad-left col-xs-12 col-md-12 col-lg-12">
							  <label for="">
									<i class="ico-gene2 fa fa-shopping-cart"></i>
									Productos Requeridos (separados por comas)</label>
							</div>

							<!-- Campo 6 -->
							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12">
							  <input type="text" class="form-control" name="prod_int4"
							  onchange="JavaScript:verificar(this);" onclick="JavaScript:limpiar(this)"  value="<?=$empresa->productos_de_interes?>"
							   placeholder="Productos Requeridos (separados por comas)">
							  </div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_prod_int4"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_prod_int4"></p>
							</div>
							<!-- Campo 6 -->
							<div class="input-group style-padding7 inline-block col-xs-12 col-md-12 col-lg-12">
								<div class="adjuntar-archivo">
							  		<a class="enlace-ssubir-imagenes" href="JavaScript:document.getElementById('logo').click()">
							  			<span class="ico-subir-img glyphicon glyphicon-open"></span>Subir logotipo de Empresa
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
							<div class="input-group inline-block col-xs-12 col-md-12 col-lg-12">
								<div class="adjuntar-archivo">
							  		<div class="container-logo-empresa inline-block content_imxx">
							  			<img  id="img_logo" class=" imgxx" src="<?=verificar_imagen('uploads/logos/'.$empresa->logo);?>">
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
							<div id="parent_msj_err_"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_"></p>
							</div>
							<!-- Campo 4 -->
							<div class="input-group style-padding8 col-xs-12 col-md-12 col-lg-12">
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
							<div id="parent_msj_err_"   style="margin: 0;display:none;" class="input-group content_validacion col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_"></p>
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