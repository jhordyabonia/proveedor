<link rel="stylesheet" href="<?php echo base_url()?>assets/css/perfil_empresa/perfil_empresa.css">
<?php
//En estas variables se guarda el id de usuario del proveedor y el nit, son capturados de la url
$seg3 = $this->uri->segment(3);
$seg4 = $this->uri->segment(4);
?>
<div class="container-fluid">
	<div class="row">
		<!-- Div de pestañas -->
		<div class="col-md-12" id="contenedor_pesta">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2 tab_inactive"><a href="<?php echo base_url()?>perfil/ver_empresa/<?=$id_empresa?>">Catalogo de Productos</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?php echo base_url()?>perfil/productos_solicitados/<?=$id_empresa?>">Productos que solicita</a></div>
				<div class="col-md-2 tab_active"><a href="#">Perfil de la Empresa</a></div>
				<div class="col-md-1 tab_inactive"><a href="<?php echo base_url()?>perfil/contacto_empresa/<?=$id_empresa?>">Contacto</a></div>
				<div class="col-md-3 tab_inactive">
					<!--<div class="input-group" id="tab_buscqueda1">
						<div class="input-group">
						    <input type="text" class="form-control" id="input_buscador" placeholder="Buscar productos de la empresa">
						    <span class="input-group-btn">
						        <button class="btn btn-default" type="button" id="btn_buscar1">
						        	<span class="glyphicon glyphicon-search" id="logo_buscar" aria-hidden="true"></span> 
						        </button>
						    </span>
						</div>  -->
					</div>
				</div>
			</div>
		</div>
		<!-- div que contiene el titulo, foto y membresia -->
		<!--  contenedor central -->
		<div class="col-md-12" id="contendor_total">
			<div class="row">
				<!-- Informacion importante de la empresa-->
				<div class="col-md-7" id="contendor">
					<div class="row">
						<div class="col-md-12" id="contenedor_botones">
							<center>
								<button data-toggle="modal" data-target="#popup_mensajes" type="button" class="btn btn-default boton_empresa" id="btn_contactar">
  									<span aria-hidden="true"><img src="<?= base_url() ?>assets/img/perfil_empresa/contactar_proveedor.png" height="25" width="25" alt=""></span> Contactar Proveedor
								</button>
								<!-- <button type="button" class="btn btn-default boton_empresa" id="btn_chat">
  									<span aria-hidden="true"><img src="<?= base_url() ?>assets/img/perfil_empresa/chatear_ahora.png" height="28" width="28" alt=""></span> Chatear Ahora
								</button> -->
							</center>
						</div>
						<!-- Acerca de:-->
						<div class="col-md-12 contenedor_subtitulos">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<h4 class="text_subtitle">Acerca de nuestra Empresa</h4>
							</div>
						</div>
						<div class="col-md-12 contenedor_descrip">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<p class="text_descript">  <?=  nl2br($des_empresa); ?></p>
							</div>
						</div>
						<!-- -->
						<!-- Ubicacion de la empresa:-->
						<div class="col-md-12 contenedor_subtitulos">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<h4 class="text_subtitle">Ubicación</h4>
							</div>
						</div>
						<div class="col-md-12 contenedor_descrip">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<p class="text_descript"><?=  $ubicacion->ciudad; ?> - <?=  $ubicacion->departamento; ?> - <?=  $ubicacion->direccion; ?> </p>
							</div>
						</div>
						<!-- -->
						<!-- Productos principales de la empresa:-->
						<div class="col-md-12 contenedor_subtitulos">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<h4 class="text_subtitle">Productos Principales</h4>
							</div>
						</div>
						<div class="col-md-12 contenedor_descrip">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<p class="text_descript">
									<?php  
										foreach ($pro_prin as $registro) 
										{
	                             			 echo ''.$registro.' &nbsp;&nbsp;&nbsp;';
	                                    }                  
                             		?>
                        		 </p>
                     	</div>
						</div>
						<!-- -->
						<!-- Productos de interes para la empresa-->
						<div class="col-md-12 contenedor_subtitulos">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<h4 class="text_subtitle">Productos que le interesan a la Empresa</h4>
							</div>
						</div>
						<div class="col-md-12 contenedor_descrip">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<p class="text_descript">
									<?php 
										 foreach ($pro_int as $registro)
										 {
	                              			echo ''.$registro.' &nbsp;&nbsp;&nbsp;'; 
	                              		 }
                              		?>  
                              	</p>
                            </div>
						</div>
						<!-- -->
					</div>
				</div>

				<!-- contenedor de descripcion corta de la empresa-->
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-3">
							<div id="content_foto">
								<img id="foto_agregar_proveedor" src="<?= base_url() ?>assets/img/perfil_empresa/agregar_proveedor.png" class="img-responsive">
							</div>
						</div>
						<div class="col-md-9">
							<div class="col-md-12">
								<h3 id="titulo_empresa"><?= $nom_empresa?> </h3>
							</div>
							<div class="col-md-12">
								<img src="<?= base_url() ?>assets/img/perfil_empresa/contacto.png"><a href="" id="informacion_contacto">Informacion de Contacto</a>
							</div>
							<div class="col-md-12" id="content_informacion_empresa">
								<div class="row">
									<div class="col-md-12">
										<p class="info_respuesta"><strong  class="text_info_tilte">Ubicacion: </strong><?=  $ubicacion->ciudad; ?></p>
									</div>
									<div class="col-md-12">
										<p class="info_respuesta"><strong  class="text_info_tilte">Tipo de Empresa: </strong><?= $tipo_empresa ?></p>
									</div>
									<div class="col-md-12 content_info_resumida">
										<div class="row show-grid">
											<div class="col-md-5">
												<p class="text_info_tilte">Productos de interes:</p>
											</div>
											<div class="col-md-7">
												<ul id="lista_productos_principales">
													<?php foreach ($otrosProductos_empresa as $row)
											              {
											                 echo '<li>'.$row. '</li>';
											              }
											        ?> 
												</ul>
											</div>
										</div>
									</div>
									<div class="col-md-12 content_info_resumida">
										<div class="row">
											<div class="col-md-5">
												<p class="text_info_tilte">Solicitudes Publicadas:</p>
											</div>
											<div class="col-md-7">
												<?php if ($count_ofertas>0){?>
												<a href="<?php echo base_url().'perfil/productos_solicitados/'.$id_empresa ?>">
													<p class="count-productos">
														<?php echo $count_ofertas ?> - Ver solicitudes
													</p>
													</a>
												
												<?php }else{?>
													<!-- <a href="<?php echo base_url().'/perfil_test/productos_solicitados/0/'.$nit ?>">
													<p class="count-productos">
														<?php echo $count_ofertas ?> - Ver solicitudes
													</p> -->
													</a>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="col-md-12 content_info_resumida">
										<div class="row">
											<div class="col-md-5">
												<p class="text_info_tilte">Productos Principales:</p>
											</div>
											<div class="col-md-7">
												<ul id="lista_productos_principales">
													<?php
														foreach ($pro_prin as $registro) 
														{
					                             			 echo '<li>'.$registro.'</li>';
					                                    }                  
				                             		?>
				                             	</ul>
											</div>
										</div>
									</div>
									<div class="col-md-12 content_info_resumida">
										<div class="row">
											<div class="col-md-6">
												<p class="text_info_tilte">Productos Publicados:</p>
											</div>
											<div class="col-md-6">
												<?php if ($count_productos>0){?>
												<a href="<?php echo base_url().'perfil/ver_empresa/'.$id_empresa ?>">
													<p class="count-productos">
														<?php echo $count_productos ?> - Ver Productos
													</p>
													</a>
												
												<?php }else{?>
													<a class="count-productos"href="<?php echo base_url().'perfil/ver_empresa/'.$id_empresa ?>">
													<p class="count-productos">
														<?php echo $count_productos ?>
													</p>
													</a>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<center>
								<button type="button" class="btn btn-default boton_empresa" id="btn_llamar"
								onclick="JavaScript:document.getElementById('numero_empresa').innerHTML='Celular:   <?=  $contacto; ?><BR>Oficina:   <?=  $contacto2; ?>';">
				  					<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Llama a la Empresa
								</button>
								<div id="numero_empresa">
								</div>
							</center>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

