<section class="content">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">
					<i class="icon-contacto fa fa-phone"></i>
					Contacto
				 </h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                    <h5 class="box-title">
                     Para guardar o agregar informacion de "Contacto", ingrese la informacion en los campos y haga click en "Guardar".
                    </h5>
                  <?=form_open_multipart(base_url().'editar_empresa/contacto')?>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<span class="ico-gene glyphicon glyphicon-user"></span>
									Nombre del contacto
									<span class=" conten-ico-vali">
								  	<i id="err_nombres"></i>
							  	</span>
							  </label>
							</div>

							<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							  <input required type="text" class="form-control" name="nombres" ondblclick="necessary"
							  onchange="JavaScript:verificar_largo(this,5); verificar_caracteres(this,'=')"
							   value="<?=$usuario->nombres?>" placeholder="Nombre del contacto">							  
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_nombres" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_nombres"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<i class="ico-gene fa fa-list-alt"></i>
									Cargo/Funcion en la empresa
									<span class=" conten-ico-vali">
							  		<i id="err_cargo"></i>
							  	</span>
							  
									</label>
							</div>

							<!-- Campo 2 -->
							<div class="input-group style-padding col-xs-12 col-md-10 col-lg-10">							  
							  <input required type="text" class="form-control" name="cargo"
							  onchange="JavaScript:verificar_largo(this,2);" 
							  value="<?=$usuario->cargo?>" placeholder="Cargo/Funcion en la empresa">							  
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_cargo" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_cargo"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<span class="ico-gene glyphicon glyphicon-map-marker"></span>
									Dirección de la empresa
									<span class=" conten-ico-vali">
										<i id="err_direccion"></i>
									</span>							  
									</label>
							</div>

							<!-- Campo 3 -->
							<div class="input-group style-padding col-xs-12 col-md-10 col-lg-10">							  
							  <input required type="text" class="form-control" name="direccion"
							  onchange="JavaScript:verificar_largo(this,5);"
							   value="<?=$usuario->direccion?>" placeholder="Direccion de la empresa">
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_direccion" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_direccion"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<i class="ico-gene fa fa-globe"></i>
									Selecciona tu pais									
									<span class=" conten-ico-vali">
										<i id="err_pais"></i>
									</span>
									</label>
							</div>

							<!-- Campo 4.0 -->
							<script type="text/javascript">
								active_validation=false;;
							</script>
							<div class="input-group style-padding col-xs-12 col-md-10 col-lg-10">							  
							  <select required class="form-control" name="pais" id="pais" onchange="JavaScript:cambio_pais();verificar(this);"
							   onload="JavaScript:cambio_pais();" ondblclick="necessary" value="52">
								  	<option value="0">Selecciona tu pais</option>
									<option value="52" selcted>Colombia</option>
									<optgroup label=""></optgroup>
									<optgroup label="-------------------------------------"></optgroup>
									<optgroup label="SELECCIONAR OTRO PAÍS"></optgroup>							
									<optgroup label=""></optgroup>
							        	<?php  foreach($paises as $pais):?>
							         		<option  <?php if($usuario->pais==$pais->id){echo 'selected';}?> value="<?=$pais->id ?>" >
							         		 	<?=$pais->nombre ?>
							         		</option>
							        	<?php endforeach;?>   
								</select>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_pais" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_pais"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<i class="ico-gene fa fa-globe"></i>
									Selecciona tu departamento
									<span class=" conten-ico-vali">
										<i id="err_provincia"></i>
									</span>
							  </label>
							</div>

							<!-- Campo 4.1 -->
							<div  id="ubicacion" class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							  <select required class="form-control" name="provincia" id="provincia" ondblclick="necessary" 
								 onchange="JavaScript:cambio_departamento(this.value); verificar(this);">
								  	<option value="">Selecciona tu departamento</option>
									<optgroup label=""></optgroup>
							        	<?php  foreach($departamentos as $departamento):  ?>
							         	<option <?php if($usuario->departamento==$departamento->id_departamento){echo 'selected';}?> value="<?=$departamento->id_departamento?>">
							         		<?=$departamento->nombre ?>
							         	</option>
							        	<?php  endforeach; ?>    
								</select>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_provincia" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_provincia"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<i class="ico-gene fa fa-globe"></i>
									Selecciona tu municipio
									<span class=" conten-ico-vali">
										<i id="err_municipio"></i>
									</span>
							 </label> 
							</div>

							<!-- Campo 4.2 -->
							<div id="ubicacion2" class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							   <select required class="form-control" name="municipio" id="municipio" value="<?=set_value('municipio'); ?>"
								 onchange="JavaScript:verificar(this);" ondblclick="necessary" >
								  	<option value="0">Selecciona tu municipio</option>
											<optgroup label=""></optgroup>
									        	<?php  foreach($municipios as $municipio):?>
										         	<option <?php if($usuario->ciudad==$municipio->id_municipio){echo 'selected';}?> value="<?=$municipio->id_municipio ?>">
										         		<?=$municipio->municipio ?>
										         	</option>
									        	<?php  endforeach; ?>      
								</select>								
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_municipio" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_municipio"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<span class="ico-gene glyphicon glyphicon-phone"></span>
									Teléfono celular
									<span class=" conten-ico-vali">
										<i id="err_celular"></i>
									</span>
								</label>
							</div>

							<!-- Campo 5 -->
							<div class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							  
							  <input required type="text" size="10" class="form-control" name="celular" id="celular" ondblclick="necessary"
							  onchange="JavaScript:verificar_largo(this,10); verificar_caracteres(this,'[ALPHA][SYM]|-'); limit_size(this,10);"
							  value="<?=$usuario->celular?>" placeholder="Teléfono celular">
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_celular" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_celular"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<i class="ico-gene2 fa fa-phone"></i>
									Teléfono fijo y/o PBX
									<span class=" conten-ico-vali">
										<i id="err_telefono"></i>
									</span>								
								</label>
							</div>

							<!-- Campo 6 -->
							<div class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							  <input type="text" class="form-control" name="telefono" id="telefono"
							  onchange="JavaScript:verificar(this);"
							   value="<?=$usuario->telefono?>" placeholder="Teléfono fijo y/o PBX">
							  </div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_telefono" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_telefono"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<i class="ico-gene fa fa-laptop"></i>
									Página Web
									<span class=" conten-ico-vali">
										<i id="err_web"></i>
									</span>								
								</label>
							</div>

							<!-- Campo 7 -->
							<div class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							  <input type="text" class="form-control" name="web" id="web" 
							  onchange="JavaScript:verificar_caracteres(this,'[SPACE]@ ( ) ? ¿ =');"
							  value="<?=$usuario->web?>" placeholder="Página Web">
							  </div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_web" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_web"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<i class="ico-gene2 fa fa-facebook-square"></i>
									Página de facebook
									<span class=" conten-ico-vali">
										<i id="err_facebook"></i>
									</span>									
								</label>
							</div>

							<!-- Campo 8 -->
							<div class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							  <input type="text" class="form-control" name="facebook"
							  onchange="JavaScript:verificar_caracteres(this,'[SPACE]@ ( ) ? ¿ =');"
							   value="<?=$usuario->facebook?>" placeholder="Página de facebook">
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_facebook" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_facebook"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<i class="ico-gene2 fa fa-twitter"></i>
									Página de twitter
									<span class=" conten-ico-vali">
										<i id="err_twitter"></i>
									</span>									
								</label>
							</div>

							<!-- Campo 9 -->
							<div class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							  <input type="text" class="form-control" name="twitter"
							  onchange="JavaScript:verificar_caracteres(this,'[SPACE] ( ) ? ¿ =');"
							   value="<?=$usuario->twitter?>" placeholder="Página de twitter">
							  </div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_twitter" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_twitter"></p>
							</div>

							<div class="input-group pad-left2 col-xs-12 col-md-8 col-lg-8">
							  <label for="">
									<i class="ico-gene2 fa fa-linkedin-square"></i>
									Página de likedin
									<span class=" conten-ico-vali">
										<i id="err_linkedin"></i>
									</span>
								</label>
							</div>

							<!-- Campo 10 -->
							<div class="input-group style-padding col-xs-12 col-md-10 col-lg-10">
							  <input type="text" class="form-control" name="linkedin"
							  onchange="JavaScript:verificar_caracteres(this,'[SPACE]@ ( ) ? ¿ =');"
							   value="<?=$usuario->linkedin?>" placeholder="Página de likedin">
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_linkedin" style="display:none" class="input-group content_validacion2 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors" id="msj_err_linkedin"></p>
							</div>
                           
                             <div  class="form-group" style="margin-top: 3%;margin-left: 30%;">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">
									<i class="ico-circle fa fa-floppy-o"></i>
                                    Guardar
                                 </button>
                            </div>

    					<?=form_close()?>
                    
                </div><!-- /.box-body -->
              </div>