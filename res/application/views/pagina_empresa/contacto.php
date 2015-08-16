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
					
						<button data-toggle="modal" data-target="#popup" type="button" class="btn btn-default boton_empresa" id="btn_contactar">
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
										<a href="http://<?=$web;?>" class="text_descript" id="sitio_web"><?=  $web; ?> </a>
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
<!-- funcionalidad de msj en popup -->
	<?php 
		$nit = $this->uri->segment(3); 
		$reffer= "none";
	  if($this->session->flashdata('reffer')) 
	  	{	$reffer=$this->session->flashdata('reffer');	}
	  ?>
	<script type="text/javascript">
 	   reffer= "<?=$reffer?>";
	     document.onload= start();
	     function start()
	       {
		       	var popup=new XMLHttpRequest();
		       	var url_popup="<?=base_url()?>popup/contactar/<?=$id_empresa?>/3";
				var msj_enviado = "<?=$this->session->flashdata('mensaje_enviado')?>"=="DONE";
				if (msj_enviado)
				{	url_popup="<?=base_url()?>popup/confirmar_mensaje";	}

				popup.open("GET", url_popup, true);
				popup.addEventListener('load',show,false);
				popup.send(null);

				function show()
					{
						document.getElementById('formulario_cotizacion').click();
						cotizar=document.getElementById('cotizar');
						console.log(popup.response);
						cotizar.innerHTML=popup.response;

	       				if (msj_enviado)
						{  	document.getElementById('confimacion_msj_enviado').click();	}
						else
						{ 
							error_login ="<?=$this->session->flashdata('session')?>";
			                mensaje = "<?=$this->session->flashdata('reffer')?>";
			                if(error_login!="Done"&&mensaje=="mensaje")
			                {
			                  document.getElementById('#login').click();
			                }else
			                if(mensaje=="mensaje")
			                {
								document.getElementById('btn_contactar').click();
								<?=$this->session->set_flashdata('reffer',FALSE)?>
							}								
						}  					
					}
			}
	</script>
  <div id="cotizar">
		</div>
<div data-toggle="modal" data-target="#asistentes_proveedor" id="formulario_cotizacion"></div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/catologo_productos.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/contacto.css">