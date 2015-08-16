<?php
//En estas variables se guarda el id de usuario del proveedor y el nit, son capturados de la url
$seg3 = $this->uri->segment(3);
$seg4 = $this->uri->segment(4);
?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/perfil_empresa/perfil_empresa.css">
<div class="container-fluid">
	<div class="row">
		<!-- Div de pestañas -->
		<div class="col-md-12" id="contenedor_pesta">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2 tab_inactive"><a href="<?php echo base_url()?>perfil_test/ver_empresa/<?=$id_contacto?>/<?=$seg4?>">Catalogo de Productos</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?php echo base_url()?>perfil_test/productos_solicitados/<?=$id_contacto?>/<?=$seg4?>">Productos que solicita</a></div>
				<div class="col-md-2 tab_active"><a href="#">Perfil de la Empresa</a></div>
				<div class="col-md-1 tab_inactive"><a href="<?php echo base_url()?>perfil_test/contacto_empresa/<?=$seg4?>">Contacto</a></div>
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
						<!-- Acerca de:-->
						<div class="col-md-12 contenedor_subtitulos">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<h4 class="text_subtitle">Nombre Empresa</h4>
							</div>
						</div>
						<div class="col-md-12 contenedor_descrip">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<p class="text_descript">  <?= $nom_empresa->nombre?></p>
							</div>
						</div>
						<div class="col-md-12 contenedor_subtitulos">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<h4 class="text_subtitle">Logo Empresa</h4>
							</div>
						</div>
						<div class="col-md-12 contenedor_descrip">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<p class="text_descript">  
									<div class="col-md-2 logo_div">
										<div class="col-md-12 center-block">
											<img class="img-responsive center-block logo_empresa" src="<?php echo base_url()?>uploads/logos/<?php echo $logo_empresa->logo; ?>" alt="Logo Empresa" class="img-responsive">
											<input type='file' name='logo'>Cambiar</input>
										</div>		
									</div>
								</p>
							</div>
						</div>
						<div class="col-md-12 contenedor_subtitulos">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<h4 class="text_subtitle">Acerca de nuestra Empresa</h4>
							</div>
						</div>
						<div class="col-md-12 contenedor_descrip">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<p class="text_descript">  <?=  nl2br($des_empresa->descripcion); ?></p>
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
								<p class="text_descript">
									<?=  $ubicacion->ciudad; ?> - <?=  $ubicacion->departamento; ?> - <?=  $ubicacion->direccion; ?> 
								</p>
									
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
	                             			 echo ''.$registro->nombre_producto.' &nbsp;&nbsp;&nbsp;';
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
								<h4 class="text_subtitle">Productos que le interese a la Empresa</h4>
							</div>
						</div>
						<div class="col-md-12 contenedor_descrip">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								<p class="text_descript">
									<?php 
										 foreach ($pro_int as $registro)
										 {
	                              			echo ''.$registro->nombre_producto.' &nbsp;&nbsp;&nbsp;'; 
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
								<h3 id="titulo_empresa"><?= $nom_empresa->nombre?> </h3>
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
										<p class="info_respuesta"><strong  class="text_info_tilte">Tipo de Empresa: </strong><?= $tipo_empresa->tipo ?></p>
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
											                 echo '<li>'.$row->nombre_producto . '</li>';
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
												<p class="info_respuesta"></p>
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
					                             			 echo '<li>'.$registro->nombre_producto.'</li>';
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
												<p class="info_respuesta"></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<center>
								<button type="button" class="btn btn-default boton_empresa" id="btn_llamar">
				  					<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Llama a la Empresa
								</button>
							</center>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
