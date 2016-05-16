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
					<span class="ico-cont-style glyphicon glyphicon-bookmark"></span>
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
								
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8" style="padding:2%;">
                                <button type="submit" class="btn btn-primary">
									<i class="ico-circle fa fa-floppy-o"></i>
                                    Guardar
                                 </button>
                               </div>	
							</div>
							<h3 style="margin-top: 0px;margin-bottom: 4px;"><span class="ico-edi-nosotros glyphicon glyphicon-pencil"></span>Misión</h3>
							<textarea onchange="NO_SAVE=true;" onclick="no_save()" class="form-control" rows="7" name="mision" value="<?=set_value('mision')?>" placeholder="Ingrese la Misión de la empresa" style="border-radius: 0;resize: none;"><?=set_value('mision')|$empresa->mision?></textarea>
							<div class="conten-pala-but">
								<p class="text-pal-max"><strong>5000</strong> palabras maximo</p>
								<!-- Campo validacion -->
								<div class="input-group content_validacion5 col-xs-12 col-md-7 col-lg-7">
								  <p class="text_errors"></p>
								</div>
								
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8" style="padding:2%;">
                                <button type="submit" class="btn btn-primary">
									<i class="ico-circle fa fa-floppy-o"></i>
                                    Guardar
                                 </button>
                               </div>	
							</div>
							<h3 style="margin-top: 0px;margin-bottom: 4px;"><span class="ico-edi-nosotros glyphicon glyphicon-pencil"></span>Visión</h3>
							<textarea onchange="NO_SAVE=true;" onclick="no_save()" class="form-control" rows="7" name="vision" value="<?=set_value('vision')?>" placeholder="Ingrese la Visión de la empresa" style="border-radius: 0;resize: none;"><?=set_value('vision')|$empresa->vision?></textarea>
							<div class="conten-pala-but" style="margin-bottom: 20px;">
								<p class="text-pal-max"><strong>5000</strong> palabras maximo</p>
								<!-- Campo validacion -->
								<div class="input-group content_validacion5 col-xs-12 col-md-7 col-lg-7">
								  <p class="text_errors"></p>
								</div>
								
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8" style="padding:2%;">
                                <button type="submit" class="btn btn-primary">
									<i class="ico-circle fa fa-floppy-o"></i>
                                    Guardar
                                 </button>
                               </div>	
							</div>

    					<?=form_close()?>
						</div>
						</div>
				</div>
				</div>
				</div>
  </section>
			