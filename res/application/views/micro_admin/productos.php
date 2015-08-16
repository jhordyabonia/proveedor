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
							</div>
						</div>
					</div>
					<!-- div del texto de registro y ingreso-->
					<div class="col-xs-12 col-md-3">
						<div class="row"  id="content_general_text">
							<div class="col-xs-5 col-md-5 line-right">
								<div class="row">
									<div class="col-xs-3 col-md-3">
									</div>
									<div class="col-xs-9 col-md-9">
									</div>
								</div>
							</div>
							<div class="col-xs-7 col-md-7">
								<div class="row">
									<div class="col-xs-3 col-md-3">
									</div>
									<div class="col-xs-9 col-md-9">
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
			
		</div>
	</div>




	<div class="row">
		<!-- Div de pestañas -->
		<div class="col-md-15" id="contenedor_pesta">
			<div class="row">
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/inicio">Inicio</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/empresas">Empresas</a></div>
				<div class="col-md-2 tab_active"><a href="<?=base_url()?>micro_admin/productos">Productos</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/solicitudes_internas">Solicitudes Internas</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/solicitudes_externas">Solicitudes Externas</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/mensajes">Mensajes</a></div>
				
			</div>
		</div>
		<!-- div que contiene el titulo, foto y membresia -->
		<!--  contenedor central -->
		<div class="col-md-12">
		  <div class="row">

	        

        <!-- columna de tamaño 9 para la tabla un espacio -->
        <div class="col-xs-10 col-xs-push-0 table-responsive " >
         <CENTER>
          <table class="table table-bordered table-hover ">
            <thead>
              <tr>
                <th style="text-align: center;">Producto</th>
				<th style="text-align: center;">Descripcion</th>
				<th style="text-align: center;">Precio</th>
				<th style="text-align: center;">Empresa</th>
				<th style="text-align: center;">Imagenes</th>
				<th class="hidden-xs" style="text-align: center;">Fecha de Publicacion</th>
				<th style="text-align: center;">Editar</th>
				<th style="text-align: center;">Eliminar</th>
				<th style="text-align: center;">Mensaje</th>
              </tr>
            </thead>
              <tbody>  
                <?php foreach ($productos as $producto):  ?>
                  <tr>
                    
                    <td width="10%" >                       
                       <a href="<?= base_url(); ?>producto/ver/<?=$producto->id?>/0" >
                         <h5 style="margin: 15% 10% ;">
                          <?=$producto->nombre?>
                          </h5>
                        </a>
                      </td>
                      <td width="15%" > 
					    <div class="center-block" style="max-width: 220px; /* border-style: solid; */">
							<?=$producto->descripcion?> 
						</div
					  </td>
					  <td width="10%" > 
						<?=$producto->precio_unidad?> 
				      </td>
					  <td width="15%" > 
						<?=$empresa->nombre?> 
					  </td>
                    <td width="10%" > 
                     <a href="<?= base_url(); ?>producto/ver/<?=$producto->id?>/0" >
                        <div class="center-block" style="height: 120px; width: 120px; /* border-style: solid; */">
                            <img src="<?= base_url() ?>uploads/<?=$producto->imagenes?>" 
                            class="img-responsive center-block" style="/* margin: auto auto; */ height: 85%;"/>
                        </div>
                    </td>
                      </a>
                    <td width="10%" > 
                       <h5 style="margin: 20% 30%;"> 
                        <?= $producto->fecha_publicacion ?> 
                       </h5>   
                    </td>
                      
                    <td width="10%" > 
                      <a href="<?= base_url()?>producto/editar/<?=$producto->id?>">  
                        <span class="glyphicon glyphicon-pencil" style="font-size: 30px; margin: 20% 40%;"> 
                      </a> 
                    </td>
                    
                    <td width="10%"> 
                      <a href="JavaScript:confirmar_eliminar_producto(<?=$producto->id?>);"> 
                        <span class="glyphicon glyphicon-trash" style="font-size: 30px; margin: 20% 40%;"> 
                      </a> 
                    </td>

					<td width="10%"> 
					   <a href="JavaScript:start(<?=$producto->id?>,1);">  
						 <i class="fa fa-envelope icono_mensaje" style="font-size: 30px; margin: 20% 40%;"> 
						 </i> 
						</a> 
					</td>

                  </tr>
                  <?php endforeach; ?>                
              </tbody>
          </table>
         </CENTER>
        </div>






				
			</div>
		</div>
	</div>
</div>
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
										<?= form_open_multipart(base_url()."/micro_admin/productos",$atributos); ?>
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/catologo_productos.css">