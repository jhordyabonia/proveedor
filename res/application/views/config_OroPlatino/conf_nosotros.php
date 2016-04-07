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
		<div class="conten-config2 col-xs-12 col-md-12 col-lg-12">
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
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-th-list"></span>
					<a href="<?=base_url()?>config_empresa/publicar_producto" class="text-subitem">Subir Productos</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-bookmark"></span>
					<a href="<?=base_url()?>config_empresa/productos_principales" class="text-subitem">Productos Principales</a>
				</div>
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-briefcase"></span>
					<a href="<?=base_url()?>config_empresa/nosotros" class="text-subitem">Nosotros</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="ico-config-style2 fa fa-file-text"></i>
					<a href="<?=base_url()?>config_empresa/cotizaciones" class="text-subitem">Cotizaciones requeridas</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-open"></span>
					<a href="<?=base_url()?>config_empresa/catalogo" class="text-subitem">Subir Catálogo</a>
				</div>
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<span class="ico-cont-style glyphicon glyphicon-briefcase"></span>
					Nosotros
				</h3>
				<div class="content-catalogo-pro">
					<div class="titles">
						<h3 class="text-title-pub">Configurar pestaña Nosotros</h3>
					</div>

          <?= form_open_multipart('editar_empresa/nosotros'); ?>
					<div class="conten-formulario-cata">
						<p class="text-nosotros">Introduzca la Descripción, la Mision, y la Visión de la empresa.</p>
						<div class="formulario-nosotros">
							<h3 style="margin-bottom: 4px;"><span class="ico-edi-nosotros glyphicon glyphicon-pencil"></span>Nuestra Empresa</h3>
							<textarea onchange="NO_SAVE=true;" onclick="no_save()" class="form-control" rows="7" name="nosotros" value="<?=set_value('nosotros')?>" placeholder="Ingrese la descripción de la empresa" style="border-radius: 0;resize: none;"><?=set_value('nosotros')|$empresa->descripcion?></textarea>
							<div class="conten-pala-but">
								<p class="text-pal-max"><strong>5000</strong> palabras maximo</p>
								<!-- Campo validacion -->
								<div class="input-group content_validacion5 col-xs-12 col-md-7 col-lg-7">
								  <p class="text_errors"></p>
								</div>
								<button class="btn btn-guardar2">
									<i class="ico-circle fa fa-floppy-o"></i>
									<p class="text-publicarPro">Guardar</p> 
								</button>
							</div>
							<h3 style="margin-top: 0px;margin-bottom: 4px;"><span class="ico-edi-nosotros glyphicon glyphicon-pencil"></span>Misión</h3>
							<textarea onchange="NO_SAVE=true;" onclick="no_save()" class="form-control" rows="7" name="mision" value="<?=set_value('mision')?>" placeholder="Ingrese la Misión de la empresa" style="border-radius: 0;resize: none;"><?=set_value('mision')|$empresa->mision?></textarea>
							<div class="conten-pala-but">
								<p class="text-pal-max"><strong>5000</strong> palabras maximo</p>
								<!-- Campo validacion -->
								<div class="input-group content_validacion5 col-xs-12 col-md-7 col-lg-7">
								  <p class="text_errors"></p>
								</div>
								<button class="btn btn-guardar2">
									<i class="ico-circle fa fa-floppy-o"></i>
									<p class="text-publicarPro">Guardar</p> 
								</button>
							</div>
							<h3 style="margin-top: 0px;margin-bottom: 4px;"><span class="ico-edi-nosotros glyphicon glyphicon-pencil"></span>Visión</h3>
							<textarea onchange="NO_SAVE=true;" onclick="no_save()" class="form-control" rows="7" name="vision" value="<?=set_value('vision')?>" placeholder="Ingrese la Visión de la empresa" style="border-radius: 0;resize: none;"><?=set_value('vision')|$empresa->vision?></textarea>
							<div class="conten-pala-but" style="margin-bottom: 20px;">
								<p class="text-pal-max"><strong>5000</strong> palabras maximo</p>
								<!-- Campo validacion -->
								<div class="input-group content_validacion5 col-xs-12 col-md-7 col-lg-7">
								  <p class="text_errors"></p>
								</div>
								<button class="btn btn-guardar2">
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
<script>
    NO_SAVE=<?php if(set_value('vision')|set_value('mision')|set_value('nosotros'))echo 'true';else echo 'false';?>;
    function no_save()
    {
       // if(NO_SAVE)
       // alert('Tienes campos sin guardar!');        
    }
</script>