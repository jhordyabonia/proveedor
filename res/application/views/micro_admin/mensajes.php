<br>
<br>
<br>
<br>
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
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/productos">Productos</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/solicitudes_internas">Solicitudes Internas</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/solicitudes_externas">Solicitudes Externas</a></div>
				<div class="col-md-2 tab_active"><a href="<?=base_url()?>micro_admin/mensajes">Mensajes</a></div>
				
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
	                <th style="text-align: center;">Destinatario</th>
	                <th style="text-align: center;">remitente</th>
	                <th style="text-align: center;">mensaje</th>
	                <th style="text-align: center;">adjunto</th>
	                <th style="text-align: center;">asunto</th>
	                <th class="hidden-xs" style="text-align: center;">objeto asunto</th>
	                <th class="hidden-xs" style="text-align: center;">tipo objeto asunto</th>
	                <th style="text-align: center;">fecha</th>
	              </tr>
	            </thead>
	              <tbody>  
	                <?php foreach ($datos as $dato):  ?>
	                  <tr>
	                    
	                    <td width="20%" >                   
	                         <?=$dato->destinatario?>
	                      </td> 
	                    <td width="20%" >                   
	                         <?=$dato->remitente?>
	                      </td>
	                    <td width="20%" >                   
	                         <?=$dato->mensaje?>
	                      </td>
	                    <td width="20%" >    
	                    <?php if($dato->adjunto):?>               
		                     <a class="btn btn-primary nuevos_mensajes" type="button" href="<?=base_url()?>mensajes/descargar_adjunto/<?=$dato->id?>">
		                         <?=$dato->adjunto?>
		                     </a>
	                 	<?php else:?>
	                 			Sin Adjunto
	                 	<?php endif;?>
	                      </td>
	                    <td width="20%" > 
	                        <?=$dato->asunto?>
	                    </td>
	                    <td width="20%" > 
	                        #<?=$dato->id_producto_oferta_nit?>
	                    </td>	
	                    <td width="20%" > 
	                        #<?=$dato->tipo?>
	                    </td>	                      
	                    <td width="15%" >
	                    	<?=$dato->fecha?>
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
										<?= form_open_multipart(base_url()."/micro_admin/mensajes"); ?>
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