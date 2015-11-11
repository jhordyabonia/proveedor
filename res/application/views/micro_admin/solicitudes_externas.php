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
				<div class="col-md-2 tab_active"><a href="#">Solicitudes Externas</a></div>
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
	                <th style="text-align: center;">Fecha</th>
	                <th style="text-align: center;">Eliminar</th>
	                <th style="text-align: center;">Producto o isumo solicitado</th>
	                <th style="text-align: center;">Descripcion de la solicitud</th>
	                <th style="text-align: center;">Catidad requerida</th>
	                <th class="hidden-xs" style="text-align: center;">Precio máximo</th>
	                <th style="text-align: center;">Forma de pago preferida</th>
	                <th style="text-align: center;">Direccion de Email</th>
	                <th style="text-align: center;">Nombre y Apellidos</th>
	                <th style="text-align: center;">Telefono</th>
	                <th style="text-align: center;">Nombre empresa</th>
	                <th style="text-align: center;">Ciudad de entrega</th>
	                <th style="text-align: center;">Categoria</th>
	                <th style="text-align: center;">Pubicar</th>
	                <th style="text-align: center;">Editar</th>
	                <th style="text-align: center;">Enviar</th>
	              </tr>
	            </thead>
	              <tbody>  
	                <?php foreach ($datos as $dato):  ?>
	                  <tr>
	                    <td width="20%" >                   
	                       <?=$dato->fecha?>
	                          </td> 
	                    <td width="20%" >                   
	                        <a href="<?=base_url()?>micro_admin/eliminar_solicitud_externa/<?=$dato->id?>">
	                        	Eliminar
	                        </a>
	                          </td> 
	                    <td width="20%" >                   
	                         <input type="text" id="<?=$dato->id?>nombre" disabled="true" value="<?=$dato->solicitud?>">
	                      </td> 
	                    <td width="20%" >     
	                    <textarea rows="2" cols="30"
	                    id="<?=$dato->id?>descripcion" disabled="true" /><?=$dato->descripcion?>
	                    </textarea> 
	                     <?php if($dato->adjunto):?>
		                        <a href="<?=base_url()?>uploads/adjunto/<?=$dato->adjunto?>">
		                        	Descargar adjunto <?=$dato->adjunto?>
		                        </a>
	                    <?php endif;?>            
	                      </td>
	                    <td width="20%" > 
	                        <input type="text"  size="10"  id="<?=$dato->id?>cantidad" disabled="true" value="<?=$dato->cantidad_requerida?>"/>
	                    </td>
	                    <td width="20%" > 
	                        <input type="text"  size="5"  id="<?=$dato->id?>precio" disabled="true" value="<?=$dato->precio?>"/>
	                    </td>	                      
	                    <td width="15%" >
	                    	<input type="text"  size="5"  id="<?=$dato->id?>pago" disabled="true" value="<?=$dato->forma_de_pago?>"/>
	                    </td>	                    
	                    <td width="15%"> 
	                     	<input type="text"  size="30"  id="<?=$dato->id?>email" disabled="true" value="<?=$dato->email?>"/>
	                    </td>
	                    <td width="15%"> 
	                     	<input type="text"  size="30" id="<?=$dato->id?>nombres" disabled="true" value="<?=$dato->nombres?>"/>
	                    </td>
	                    <td width="15%"> 
	                     	<input type="text"  size="30" id="<?=$dato->id?>telefono"  disabled="true" value="<?=$dato->telefono?>"/>
	                    </td>
	                    <td width="15%"> 
	                     	<input type="text"  size="15" id="<?=$dato->id?>nombre_empresa" disabled="true" value="<?=$dato->nombre_empresa?>"/>
	                    </td>
	                    <td width="15%"> 
	                     	<input type="text"  size="15" id="<?=$dato->id?>ciudad"  disabled="true" value="<?=$dato->ciudad_entrega?>"/>
	                    	<input type="hidden"  id="<?=$dato->id?>id" value="<?=$dato->id?>"/>
	                    	<input type="hidden"  id="<?=$dato->id?>id" value="<?=$dato->id?>"/>
	                    </td>
	                    <td width="8%" style="max-width:10"> 
	                    	<select size="1" value="<?=$dato->categoria->id_categoria?>" id="<?=$dato->id?>categoria"  disabled="true">
								<option value="<?=$dato->categoria->id_categoria?>?>"><?=$dato->categoria->nombre_categoria?></option>
								<option value="37">______________________________________</option>
								<?php foreach ($categorias as $key => $categoria):?>
								<option value="<?=$categoria->id_categoria?>"><?=$categoria->nombre_categoria?></option>
								<?php endforeach;?>
							</select>
	                     	
	                    </td>
	                    <td  bgcolor="#d3d3d3" style="border:gray 4px soil;" width="5%"> 
	                    	<?php if(!$dato->publicada):?>
		                     	<a type="button" href="<?=base_url()?>micro_admin/publicar_solicitud/<?=$dato->id?>" target="other">
		                     	<a type="button" href="JavaScript:confirmar_publicar(<?=$dato->id?>)">
		                     		Publicar	                     		
		                     	</a></a>
		                     <?php else:?>
		                      <a href="<?= base_url(); ?>oportunidad_comercial/ver/<?=$dato->publicada?>" >
		                     	Publicada
		                      </a>										
		                     <?php endif;?>	
	                    </td>
	                     <td width="5%"> 
	                     	<a id="<?=$dato->id?>"  type="button" href="JavaScript:editar(<?=$dato->id?>);">
	                     	Editar
	                    	 </a>
	                    </td>
	                     <td width="5%"> 
	                     	<a target="other" href="<?=base_url()?>micro_admin/envio_automatico/<?=$dato->id?>" >Enviar</a>
	                    		<br>
	                     	<a target="other" href="<?=base_url()?>micro_admin/test_envio/1/1/<?=$dato->id?>" >Envío selectivo</a>
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

<?php $attribbs=array('id'=>"form",'target'=>"other",'autocomplete' => 'off','novalidate' => 'novalidate');?>
<?=form_open_multipart('micro_admin/editar_solicitud_externa/',$attribbs)?>
<input type='hidden' name="solicitud" id="solicitud">	                
<input type='hidden' name="descripcion" id="descripcion">	                
<input type='hidden' name="cantidad_requerida" id="cantidad_requerida">	                
<input type='hidden' name="precio" id="precio">	                
<input type='hidden' name="pago" id="pago">	                
<input type='hidden' name="email" id="email">	                
<input type='hidden' name="nombres" id="nombres">	                
<input type='hidden' name="telefono" id="telefono">	                
<input type='hidden' name="nombre_empresa" id="nombre_empresa">	         
<input type='hidden' name="ciudad" id="ciudad">	          
<input type='hidden' name="categoria" id="categoria">
<input type='hidden' name="id_solictud" id="id_solictud">	            

<!--con este campo indico, al controlador de edicion, 
desde que pagina se esta invocando, (appications/viwes/micro_admin/editor.php ó
 appications/viwes/micro_admin/solcitudes_externas.php )-->
<input type="hidden" id="editor" value="FALSE">

<?= form_close() ?>


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
										<?= form_open_multipart(base_url()."micro_admin/solicitudes_externas",$atributos); ?>
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