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
					<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>perfil/ver_empresa/<?=$id_empresa?>">Catalogo de Productos</a></div>
					<div class="col-md-2 tab_active"><a href="<?=base_url()?>perfil/productos_solicitados/<?=$id_empresa?>">Productos que solicita</a></div>
					<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>perfil/perfil_empresa/<?=$id_empresa?>">Perfil de la Empresa</a></div>
					<div class="col-md-1 tab_inactive"><a href="<?=base_url()?>perfil/contacto_empresa/<?=$id_empresa?>">Contacto</a></div>
						<!--<div class="input-group" id="tab_buscqueda">
							<div class="input-group">
						      <input type="text" class="form-control" id="input_buscador">
						      <span class="input-group-btn">
						        <button class="btn btn-default" type="button" id="btn_buscar">Go!</button>
						      </span>
						    </div><!-- /input-group -->
						</div>						
					</div>
				</div>
			</div>
			<!-- div general para perfil empresas (catalogo producto) -->
			<div class="col-md-12">
				<div class="row">
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
											echo '<p id="text_subtitle"><a class="text_categoria" href="'.base_url().'perfil/productos_solicitados/'.$seg3.'/'.$seg4.'/'.$categoria['id_categoria'].'" >';
											echo $categoria['nombre'].' <B>('.$categoria['cantidad'].')</B>';
											echo '</a></p>';
											echo '</div>';

										foreach ($total_porSubCategoria as $subcategoria)
										{ 
											if($categoria['id_categoria']==$subcategoria['id_categoria'])
											{ 								                  	
												echo '<div class="col-md-12" id="content_subtitle">';
												echo '<p class="text_subcategoria"><a class="text_categoria" href="'.base_url().'perfil/productos_solicitados/'.$seg3.'/'.$seg4.'/'.$subcategoria['id_subCategoria'].'/1/">';
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

											<div class="col-md-12 ">
												<button type="button" data-toggle="modal" data-target="#popup" class="btn btn-default boton_empresa" id="btn_contactar">
													<span aria-hidden="true">
														<img src="<?= base_url() ?>assets/img/perfil_empresa/contactar_proveedor.png" height="25" width="25" alt="">
													</span>
														Contactar Comprador
												</button> 
												<!-- <button type="button" class="btn btn-default boton_empresa" id="btn_chat">Chatear Ahora</button> -->
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
														<div class="col-md-7 text_info_result"><?= $ciudad_empresa ?></div>
													</div>
													<div class="row">
														<div class="col-md-5 text_info"><strong>Tipo de Empresa: </strong></div>
														<div class="col-md-7 text_info_result"><?=$tipo_empresa?></div>
													</div>
													<div class="row">
														<div class="col-md-5 text_info"><strong>Productos de Principales: </strong></div>
														<div class="col-md-7 text_info_result">
															<p>
																<?php foreach ($otrosProductos_empresa as $row)
																	{
																		echo $row . ', ';
																	}
																?>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--Contiene todos los productos de la empresa -->
							<div class="col-md-12" id="content_general_productos">
								<div class="row">
									<!-- Producto 1-->

									<?php $page_count = count($ofertas)/24; $page-=1;?>
									<?php if ($ofertas) {
										foreach ($ofertas as $key=>$oferta): ?>
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
											<div class="col-md-3">
												<div class="col-md-12 content_producto">
													<div class="row">
														<div class="col-md-12">
															<div class="content_foto_producto">
																<a href="<?php echo base_url().'oportunidad_comercial/ver/'.$oferta->id ?>">
																	<?php $imagenes=explode(',',$oferta->imagenes);?>
																	<img class="img_imagen" src="<?=base_url()?>uploads/<?=$imagenes[0]?>">
																	<!--<img src="<?=base_url()?>uploads/ma6new_11.jpg" class="img-responsive img_producto">-->
																</a>
															</div>
															<div class="col-md-12">
																<a href="<?php echo base_url().'oportunidad_comercial/ver/'.$oferta->id ?>">
																	<h5 class="name_producto"><?php echo $oferta->nombre ?></h5>
																</a>
																<p class="text_info_producto">Fecha publicacion: <?php echo $oferta->fecha_publicacion ?></p>
																<p class="text_info_producto">Precio a pagar: <?=decimal_points($oferta->precio_maximo); ?></p>
																<!--<input id="select" type="checkbox" >-->
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php endforeach; }else{?>
											<div class="col-md-12 no-solicitudes">
												<h3>En este momento la empresa no ha solicitado productos</h3>
											</div>
										</div>
										<?php } ?>
									</div>	
							</div>
							<!--botones abajo y Paginador -->
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<!--<h4 id="text_paginador">Seleccione uno o variosproductos y de click en "Contactar Proveedor" o "Chatear Ahora".</h4>-->
									</div>
									<div class="col-md-12" id="content_btn_paginador">
										<center>
											<button data-toggle="modal" data-target="#popup" type="button" class="btn btn-default boton_empresa" id="btn_contactar">
			  									<span aria-hidden="true"><img src="<?= base_url() ?>assets/img/perfil_empresa/contactar_proveedor.png" height="25" width="25" alt=""></span> Contactar Comprador
											</button>
											<!-- <button type="button" class="btn btn-default boton_empresa" id="btn_chat">
			  									<span aria-hidden="true"><img src="<?= base_url() ?>assets/img/perfil_empresa/chatear_ahora.png" height="28" width="28" alt=""></span> Chatear Ahora
											</button> -->
										</center>
									</div>
									<div class="col-md-12">
										
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
										<?= form_open_multipart('perfil/productos_solicitados/'.$id_empresa, $atributos); ?>
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


<!-- funcionalidad de msj en popup -->
	<?php 
		$nit = $this->uri->segment(4); 
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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/catologo_productos.css">
