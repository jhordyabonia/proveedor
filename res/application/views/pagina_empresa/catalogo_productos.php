<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/catologo_productos.css">
<?php
		//En estas variables se guarda el id de usuario del proveedor y el nit, son capturados de la url
		// Esto va a ser un caos para la slugify
		$seg3 = $this->uri->segment(2);
		$seg4 = $this->uri->segment(3);
	?>

	<div class="container-fluid">
		<div class="row">
			<!-- Div de pestañas -->
			<div class="col-md-12" id="contenedor_pesta">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-2 tab_active"><a href="">Catalogo de Productos</a></div>
					<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>perfil/productos_solicitados/<?=$id_empresa?>">Productos que solicita</a></div>
					<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>perfil/perfil_empresa/<?=$id_empresa?>">Perfil de la Empresa</a></div>
					<div class="col-md-1 tab_inactive"><a href="<?=base_url()?>perfil/contacto_empresa/<?=$id_empresa?>">Contacto</a></div>
					<!--<div class="col-md-3 tab_inactive">
						<div class="input-group" id="tab_buscqueda1">
							<div class="input-group">
							  <input type="text" class="form-control" id="input_buscador">
							  <span class="input-group-btn">
								<button class="btn btn-default" type="button" id="btn_buscar1">
									<span class="glyphicon glyphicon-search" id="logo_buscar" aria-hidden="true"></span> 
								</button>
							  </span>
							</div> -->
						</div>	
					</div>
				</div>
			</div>
			<!-- div general para perfil empresas (catalogo producto) -->
			<div class="col-md-12">
				<div class="row">
					<!-- Menu lateral de categorias-->
					<!-- Menu lateral de categorias-->
					<div class="col-md-2">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12" id="content_title">
										<p id="text_title_categoria">Categorias</p>
									</div>
									<!-- Subcategoria 1 -->
									<?php

										foreach ($total_porCategoria as $categoria)
										{
											echo '<div class="col-md-12 categorias_div">';
												echo '<div class="col-md-12" id="content_descrip_categoria">';
												echo '<p id="text_subtitle"><a href="'.base_url().'perfil/ver_empresa/'.$id_empresa.'/'.$categoria['id_categoria'].'" class="text_categoria">';
												echo $categoria['nombre'].' <B>('.$categoria['cantidad'].')</B>';
												echo '</a></p>';
												echo '</div>';

											foreach ($total_porSubCategoria as $subcategoria)
											{ 
												if($categoria['id_categoria']==$subcategoria['id_categoria'])
												{ 								                  	
													echo '<div class="col-md-12" id="content_subtitle">';
													echo '<p class="text_subcategoria"><a class="text_categoria" href="'.base_url().'perfil/ver_empresa/'.$id_empresa.'/'.$subcategoria['id_subCategoria'].'/1/">';
													echo $subcategoria['nombre'].' <B>('.$subcategoria['cantidad'].')</B>';
													echo '</a></p>';
													echo '</div>';
												}               
											}                  
											echo '</div>';
										 }

									?>
								</div>
							</div>
						</div>
					</div>
					<!-- contenedor general central-->
					<div class="col-md-10" id="content_central">
						<div class="row">
							<!-- contenedor de los dos botones-->
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12" id="espacio"></div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12">
												<button data-toggle="modal" data-target="#popup_mensajes" type="button" class="btn btn-default boton_empresa" id="btn_contactar">
													<span aria-hidden="true"><img src="<?= base_url() ?>assets/img/perfil_empresa/contactar_proveedor.png" height="25" width="25" alt=""></span> Contactar Proveedor
												</button>
												<!-- <button type="button" class="btn btn-default boton_empresa" id="btn_chat">
													<span aria-hidden="true"><img src="<?= base_url() ?>assets/img/perfil_empresa/chatear_ahora.png" height="28" width="28" alt=""></span> Chatear Ahora
												</button> -->
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Contiene informacion basica de la emrpesa-->
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12" id="content_info_empresa">
										<div class="row">
											<div class="col-md-4 boton_agregar">
												<div id="content_foto">
													<img id="foto_agregar_proveedor" src="<?= base_url() ?>assets/img/perfil_empresa/agregar_proveedor.png" class="img-responsive">
												</div>
											</div>
											<div class="col-md-8">
												<div class="col-md-12">
													<h4 id="titulo_empresa"><?= $nom_empresa?></h4>
												</div>
												<div class="col-md-12" id="content_text_info_contact">
													<img src="<?= base_url() ?>assets/img/perfil_empresa/contacto.png"><a href="<?=base_url()?>perfil/contacto_empresa/<?=$seg4?>" id="informacion_contacto">Informacion de Contacto</a>
												</div>
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-5 text_info"><strong>Ubicacion: </strong></div>
														<div class="col-md-7 text_info_result"><?= $ciudad_empresa?></div>
													</div>
													<div class="row">
														<div class="col-md-5 text_info"><strong>Tipo de Empresa: </strong></div>
														<div class="col-md-7 text_info_result"><?= $tipo_empresa ?></div>
													</div>
													<div class="row">
														<?php if(count($otrosProductos_empresa)>0):?>
															<div class="col-md-5 text_info"><strong>Porductos Principales: </strong></div>
															<div class="col-md-7 text_info_result">
																<p>
																	<?php foreach ($otrosProductos_empresa as $row)
																		{
																			echo $row . ', ';
																		}
																	?>
																</p>
															</div>
														<? endif; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--Contiene todos los productos de la empresa -->
							<div class="col-md-12 contenedor_productos" id="content_general_productos" >
								<div class="row">
									<!-- Producto 1-->
									<?php $page_count = 0; $page=1;?>
									<? if(!$productos): ?>
											<div class="col-md-12 no-productos" style="height:300px;">
												<h3>En este momento la empresa no ha publicado productos</h3>
											</div>
									<? else: ?>
									<?php $page_count = count($productos)/24; $page-=1;?>
									<?php foreach ($productos as $key => $producto): ?>
											<!--Paginado-->
											<?php if($key<($page*24)):?>	
											 <?php continue; endif; ?>

											<?php if(($page>0)):?>
													<?php if($key>=($page*48)):?>	
													 <?php break; endif; ?>	
											<?php else:?>
													<?php if($key>=24):?>	
													 <?php break; endif; ?>	
											<?php endif; ?>

											<!--Restriccion de la cantidad de productos dependiendo de la mebresia--> 
											<?php if(($membresia==1&&$key>=8)||($membresia==2&&$key>=50)):?>	
											<?php break; endif; ?>											
             
											<div class="col-md-3">
												<div class="col-md-12 content_producto">	
													<div class="background_imagen" >
														<div class="center-vertical_imagen">
															<a href="<?php echo base_url() ?>producto/ver/<?php echo $producto->id ?>">
																<?php $imagen=""; foreach(explode(',',$producto->imagenes) as $value){if($imagen!=''){break;} $imagen=$value;}?>
																<img class="img_imagen" src="<?=verificar_imagen('uploads/resize/pagina_de_empresa/'.$imagen);?>">
															</a>
														</div>
														</div>
													<div class="col-md-12">
														<a href="<?php echo base_url() ?>producto/ver/<?php echo $producto->id?>">
															<p class="name_producto"><?php echo $producto->nombre ?></p>
														</a>
														<p class="text_info_producto">Pedido Minimo: <?=decimal_points($producto->pedido_minimo);?></p>
														<p class="text_info_producto">Precio: <?=decimal_points($producto->precio_unidad);?></p>
															<!--<input id="select" type="checkbox" >-->
													</div>
												</div>
											</div>
										<?php endforeach; ?>
										<? endif; ?>
									</div>	
							</div>
							<!--botones abajo y Paginador -->
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<!--<h4 id="text_paginador">Seleccione uno o variosproductos y de click en "Contactar Proveedor" o "Chatear Ahora".</h4>-->
									</div>										
										<?php if($productos): ?>
											<div class="col-md-12" id="content_btn_paginador">
												<center>
													<button data-toggle="modal" data-target="#popup_mensajes" type="button" class="btn btn-default boton_empresa" id="btn_contactar">
					  									<span aria-hidden="true"><img src="<?= base_url() ?>assets/img/perfil_empresa/contactar_proveedor.png" height="25" width="25" alt=""></span> Contactar Comprador
													</button>
													<!-- <button type="button" class="btn btn-default boton_empresa" id="btn_chat">
					  									<span aria-hidden="true"><img src="<?= base_url() ?>assets/img/perfil_empresa/chatear_ahora.png" height="28" width="28" alt=""></span> Chatear Ahora
													</button> -->
												</center>
											</div>
										<?php endif; ?>
									<div class="col-md-12">
										<script type="text/javascript">
											function pagination(page)
											{
												document.getElementById('page').value=page;
												document.getElementById('form_page').submit();
											}
										</script>
										<?php
											$atributos = array(
												'autocomplete' => 'off',
												'id' => 'form_page',
												'novalidate' => 'novalidate');
										?>
										<?= form_open_multipart('perfil/ver_empresa/'.$id_empresa, $atributos); ?>
											<input type="hidden" id="page" name="page" value="0">
											
											<? if($page_count>1): ?>
												<center>
													<nav>
													  <ul class="pagination">
														<?php if($page==-1){$page=0;} ?>
														<? if($page>0): ?>
															<li><a href="JavaScript:pagination(<?=$page-1?>);">&laquo; Anterior</a></li>
														<?php endif; ?>
														<? for($i=0;$i<$page_count;$i++): ?>
															<li><a href="JavaScript:pagination(<?=$i+1?>);"><?=$i+1?></a></li>
														<?endfor;?>
														<? if($page+1<=$page_count): ?>
															<li><a href="JavaScript:pagination(<?=$page+2?>);">Siguiente &raquo;</a></li>
													  	<?php endif; ?>
													  </ul>
													</nav>
												</center>
											<?php endif; ?>
										<?= form_close() ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

