

<!-- Menu lateral de categorias-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/catologo_productos.css">

						<div class="row div_categorias">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12 content_title">
										<p id="text_title_categoria">Categorias</p>
									</div>
									<!-- Subcategoria 1 -->
									<?php
										foreach ($filtros as $key=>$categoria)
										{
											echo '<div class="col-md-12 categorias_div">';
											echo '<div class="col-md-12" id="content_descrip_categoria">';
											echo '<p id="text_subtitle"><a href="'.base_url().'listados/lista/'.$p.'/'.$div.'/'.$page.'/'.$categoria['id'].'" class="text_categoria">';
											echo $key.' <B>('.$categoria['cantidad'].')</B>';
											echo '</a></p>';
											echo '</div>';

											foreach ($categoria['subcategorias'] as $key=>$subcategoria)
											{ 
												echo '<div class="col-md-12" id="content_subtitle">';
												echo '<p class="text_subcategoria"><a class="text_categoria" href="'.base_url().'listados/lista/'.$p.'/'.$div.'/'.$page.'/'.$subcategoria['id'].'/1/">';
												echo $key.' ('.$subcategoria['cantidad'].')';
												echo '</a></p>';
												echo '</div>';
											}                  
											echo '</div>';
										 }
									?>
								</div>
							</div>
						</div>
					