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
			<div class="conten-item1 col-xs-12 col-md-3 col-lg-3">
				<h3 class="text-item">General</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-perfil fa fa-building-o"></i>
					<a href="<?=base_url()?>config_empresa/perfil_empresa" class="text-subitem">Perfil de empresa</a>
				</div>
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
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
					<i class="icon-contacto fa fa-phone"></i>
					Contacto
				</h3>
				<div class="content-catalogo-pro">
					<div class="titles">
						<h3 class="text-title-contacto">Informacion de Contacto</h3>
					</div>
					<div class="conten-formulario-cata">						
						<div class="formulario-cata">
							<p class="text-requerido"><span class="ico-requerido glyphicon glyphicon-asterisk"></span>Requerido</p>
							<p class="text-publique2">Para guardar o agregar informacion de "Contacto", ingrese la informacion
								en los campos y haga click en "Guardar".</p>

						<?=form_open_multipart(base_url().'editar_empresa/contacto')?>
							<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-user"></span>
							  </span>
							  <input type="text" class="form-control" name="nombres" value="<?=$usuario->nombres?>" placeholder="Nombre del contacto">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 2 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene fa fa-list-alt"></i>
							  </span>
							  <input type="text" class="form-control" name="cargo" value="<?=$usuario->cargo?>" placeholder="Cargo/Funcion en la empresa">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 3 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-map-marker"></span>
							  </span>
							  <input type="text" class="form-control" name="direccion" value="<?=$usuario->direccion?>" placeholder="Direccion de la empresa">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 4.0 -->
							<script type="text/javascript">
								active_validation=false;;
							</script>
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene fa fa-globe"></i>
							  </span>
							  <select class="form-control" name="pais" id="pais" onchange="JavaScript:cambio_pais();verificar(this);"
							   onload="JavaScript:cambio_pais();" value="52">
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
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 4.1 -->
							<div  id="ubicacion" class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene fa fa-globe"></i>
							  </span>
							  <select class="form-control" name="provincia" id="provincia" 
								 onchange="JavaScript:cambio_departamento(this.value); verificar(this);">
								  	<option value="">Selecciona tu departamento</option>
									<optgroup label=""></optgroup>
							        	<?php  foreach($departamentos as $departamento):  ?>
							         	<option <?php if($usuario->departamento==$departamento->id_departamento){echo 'selected';}?> value="<?=$departamento->id_departamento?>">
							         		<?=$departamento->nombre ?>
							         	</option>
							        	<?php  endforeach; ?>    
								</select>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 4.2 -->
							<div id="ubicacion2" class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene fa fa-globe"></i>
							  </span>
							  <select class="form-control" name="municipio" id="municipio" value="<?=set_value('municipio'); ?>"
								 onchange="JavaScript:verificar(this);">
								  	<option value="0">Selecciona tu municipio</option>
											<optgroup label=""></optgroup>
									        	<?php  foreach($municipios as $municipio):?>
										         	<option <?php if($usuario->ciudad==$municipio->id_municipio){echo 'selected';}?> value="<?=$municipio->id_municipio ?>">
										         		<?=$municipio->municipio ?>
										         	</option>
									        	<?php  endforeach; ?>      
								</select>
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 5 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-gene glyphicon glyphicon-phone"></span>
							  </span>
							  <input type="text" class="form-control" name="celular" value="<?=$usuario->celular?>" placeholder="Telefono celular">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 6 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene2 fa fa-phone"></i>
							  </span>
							  <input type="text" class="form-control" name="telefono" value="<?=$usuario->telefono?>" placeholder="Telefono fijo y/o PBX">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 7 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene fa fa-laptop"></i>
							  </span>
							  <input type="text" class="form-control" name="web" value="<?=$usuario->web?>" placeholder="Pagina Web">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 8 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene2 fa fa-facebook-square"></i>
							  </span>
							  <input type="text" class="form-control" name="facebook" value="<?=$usuario->facebook?>" placeholder="Pagina de facebook">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 9 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene2 fa fa-twitter"></i>
							  </span>
							  <input type="text" class="form-control" name="twitter" value="<?=$usuario->twitter?>" placeholder="Pagina de twitter">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 10 -->
							<div class="input-group style-padding col-xs-12 col-md-8 col-lg-8">
							  <span class="fiel-tramspa input-group-addon">
							  	<i class="ico-gene2 fa fa-linkedin-square"></i>
							  </span>
							  <input type="text" class="form-control" name="linkedin" value="<?=$usuario->linkedin?>" placeholder="Pagina de likedin">
							  <span class="fiel-tramspa input-group-addon">
							  	<span class="ico-requerido glyphicon glyphicon-asterisk"></span>
							  </span>
							</div>
							<!-- Campo 7 -->
							<div class="input-group style-padding2 col-xs-12 col-md-6 col-lg-8">
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