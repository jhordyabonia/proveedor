<div data-toggle="modal" data-target="#asistentes_proveedor" id="formulario_cotizacion"></div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/catologo_productos.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/contacto.css">
 <?php
	   	//En estas variables se guarda el id de usuario del proveedor y el nit, son capturados de la url
    $seg3 = $this->uri->segment(3);
    $id = $id_usuario;
?>

<div class="container-fluid">
	<div class="row">
		<!-- Div de pestañas -->
		<div class="col-md-12" id="contenedor_pesta">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>perfil/ver_empresa/<?=$id_empresa?>">Catalogo de Productos</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>perfil/productos_solicitados/<?=$id_empresa?>">Productos que solicita</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>perfil/perfil_empresa/<?=$id_empresa?>">Perfil de la Empresa</a></div>
				<div class="col-md-1 tab_active"><a href="#">Contacto</a></div>
				<div class="col-md-3 tab_inactive">
					<!--<div class="input-group" id="tab_buscqueda">
						<div class="input-group">
						    <input type="text" class="form-control" id="input_buscador">
						    <span class="input-group-btn">
						        <button class="btn btn-default" type="button" id="btn_buscar">
						        	<span class="glyphicon glyphicon-search" id="logo_buscar" aria-hidden="true"></span> 
						        </button>
						    </span>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		<!-- div que contiene el titulo, foto y membresia -->
		<!--  contenedor central -->
		<div class="col-md-12">
			<div class="row">
				<!-- contenido de la pagina -->
				<div class="col-md-12">
					<div class="col-md-3 col-md-offset-3" id="contenedor_botones">
					
						<button data-toggle="modal" data-target="#popup_mensajes" type="button" class="btn btn-default boton_empresa" id="btn_contactar">
  							<span aria-hidden="true"><img src="<?= base_url() ?>assets/img/perfil_empresa/contactar_proveedor.png" height="25" width="25" alt=""></span> Contactar Proveedor
						</button>
						<!-- <button type="button" class="btn btn-default boton_empresa" id="btn_chat">
  							<span aria-hidden="true"><img src="<?= base_url() ?>assets/img/perfil_empresa/chatear_ahora.png" height="28" width="28" alt=""></span> Chatear Ahora
						</button> -->
					
					</div>
					<?php if($popup):?>
							<div class="col-md-3" id="contenedor_botones">
								<button data-toggle="modal" data-target="#asistentes_proveedor" type="button" class="btn btn-default boton_empresa_2" id="btn_contactar">
		  							<span aria-hidden="true" class="glyphicon glyphicon-list-alt icono_form"></span> Ver Formulario de Cotización
								</button>
							</div>
					<?php endif;?>
				</div>
				
				<!-- Informacion (Telefono) -->
				<div class="col-md-12" id="contenedor_general_informacion">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6 content_datos">
							<div class="col-md-12">
								<div class="col-md-6 content_descripcion">
									<h3 class="title_descripcion">Telefónos de Contactos</h3>
								</div>
								<div class="col-md-6 content_descripcion" id="info_contacto">
									<p class="text_descript">Celular:   <?=  $celular; ?> </p>
									<p class="text_descript">Oficina:   <?=  $telefono; ?></p>
								</div>
							</div>	
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
				<!-- Informacion (Ubicacion) -->
				<div class="col-md-12" id="contenedor_general_informacion">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6 content_datos">
							<div class="col-md-12">
								<div class="col-md-6 content_descripcion">
									<h3 class="title_descripcion" id="title_ubicacion">Ubicacion</h3>
								</div>
								<div class="col-md-6 content_descripcion" id="info_contacto">
									<p class="text_descript"><?=  $ciudad; ?> - <?=  $departamento; ?></p>
									<p class="text_descript"> <?=  $direccion; ?> </p>
								</div>
							</div>	
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
				<!-- Informacion (Pagina WEB) -->
				<div class="col-md-12" id="contenedor_general_informacion">
					<div class="row">
						<div class="col-md-3"></div>
						<?php if($membresia==3):?>
							<div class="col-md-6 content_datos">
								<div class="col-md-12">
									<div class="col-md-6 content_descripcion">
										<h3 class="title_descripcion" id="title_sitioweb">Página Web</h3>
									</div>
									<div class="col-md-6 content_descripcion content_sitioweb" id="info_contacto">
										<?php if($web!=str_replace('http:',"",$web)):?>
											<a href="<?=$web;?>" class="text_descript" id="sitio_web"><?=$web; ?> </a>
										<?php else:?>
											<a href="http://<?=$web;?>" class="text_descript" id="sitio_web"><?=$web; ?> </a>
										<?php endif;?>
									</div>
								</div>	
							</div>
						<?php endif;?>
						<div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>