<link rel="stylesheet" href="<?php echo css_url() ?>perfil_empresa/header.css">
	<div class="col-md-12">
		<div class="row">
			<!-- Div contenedor del header menu-->
			<div class="col-md-12" id="content_menu">
				<div class="row">
					<!-- div del logo-->
					<div class="col-md-2">
						<div class="row">
							<div class="col-md-12">
								<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/perfil_empresa/logo.png" class="img-responsive"></a>
							</div>
						</div>
					</div>
					<!-- div del texto de registro y ingreso-->
					<div class="col-xs-12 col-md-3">
						<div class="row"  id="content_general_text">
							<div class="col-xs-5 col-md-5 line-right">
								<div class="row">
									<div class="col-xs-3 col-md-3">
										<img src="<?= base_url() ?>assets/img/perfil_empresa/ingresar.png">
									</div>
									<div class="col-xs-9 col-md-9">
									<? if($usuario):?>
										<a href="<?php echo base_url() ?>logueo/logout">
											<p class="text_header">
												Salir
											</p>
										</a>									
									<? else: ?>
										<a data-toggle="modal" data-target="#login">
											<p class="text_header">
												Ingresar
											</p>
										</a>	
									<? endif; ?>
									</div>
								</div>
							</div>
							<div class="col-xs-7 col-md-7">
								<div class="row">
									<div class="col-xs-3 col-md-3">
										<img src="<?= base_url() ?>assets/img/perfil_empresa/registro.png">
									</div>
									<div class="col-xs-9 col-md-9">
									<? if($usuario):?>
										<a href="<?php echo base_url() ?>tablero_usuario">
											<p class="text_header">Tablero usuario</p>
										</a>
									<? else: ?>
										<a href="<?php echo base_url() ?>registro/registro_usuario">
											<p class="text_header">Registro Gratis</p>
										</a>
									<? endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- div de la barra de busqueda-->
					<div class="col-xs-12 col-md-4">
                	 <?= form_open(base_url() . 'listados/validar') ?> 
						<div class="input-group buscador_header" id="tab_buscqueda">
							<div class="input-group">
							    <input class="input_buscador_header"type="text" name="busqueda" class="form-control" id="cuadrobusqueda">
							    <span class="input-group-btn">
							        <button class="btn btn-default btn_buscar_header" type="submit" id="boton_busqueda">
							        	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							        </button>
							    </span>
							</div>
						</div>
                 	<?= form_close() ?>					
					</div>
					<!-- div de los botones-->
					<div class="col-xs-12 col-md-3" id="content_button">
						<div class="col-xs-12 col-md-12">
							<div class="row">
								<div class="col-xs-6 col-md-6">
									<div class="row">
										<a href="<?php echo base_url(); ?>publicar_oferta"><img src="<?= base_url() ?>assets/img/perfil_empresa/icono_solicitar_producto.png"  class="img-responsive"></a>
									</div>
								</div>
								<div class="col-xs-6 col-md-6">
									<div class="row">
										<a href="<?php echo base_url(); ?>publicar_producto"><img src="<?= base_url() ?>assets/img/perfil_empresa/icono_publicar_producto.png"  class="img-responsive"></a>
									</div>
								</div>		
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Div que contiene el titulo, foto y membresia -->
			<div class="col-md-12" id="contenedor_title">
				<div class="row">
					<!-- Imagen de Empresa -->
					<div class="col-md-2">
						<div class="background" >
							<div class="center-vertical"><?php if(!$logo_empresa){$logo_empresa="default.jpg"; } ?>
								<img class="logo_empresa" src="<?php echo base_url()?>uploads/logos/<?php echo $logo_empresa; ?>" alt="Logo Empresa" >
								<!--
									<img class="img" src="<?=base_url()?>uploads/logos/<?php echo $logo_empresa->logo; ?>" alt="Logo Empresa" class="img-responsive">
								-->
							</div>
						</div>		
					</div>
					<!-- Titulo -->
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-12">
								<div id="content_name_empresa">
									<div class="row">
										<h1 id="name_empresa"><?= $nom_empresa?></h1>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- Imagen Membresia -->
					<div class="col-md-3">
						<?php echo $div_membresia ?>
					</div>
				</div>
			</div>
		</div>
	</div>