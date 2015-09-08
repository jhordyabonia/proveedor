

<!-- Menu lateral de categorias-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/catologo_productos.css">

						<div class="row" style="padding-left: 15px !important;">
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
												echo '<p id="text_subtitle"><a href="'.base_url().'listados/lista/'.$p.'/'.$div.'/'.$page.'/'.$categoria['id_categoria'].'" class="text_categoria">';
												echo $categoria['nombre'].' <B>('.$categoria['cantidad'].')</B>';
												echo '</a></p>';
												echo '</div>';

											foreach ($total_porSubCategoria as $subcategoria)
											{ 
												if($categoria['id_categoria']==$subcategoria['id_categoria'])
												{ 								                  	
													echo '<div class="col-md-12" id="content_subtitle">';
												echo '<p id="text_subtitle"><a href="'.base_url().'listados/lista/'.$p.'/'.$div.'/'.$page.'/'.$subcategoria['id_subCategoria'].'/1/">';
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
					