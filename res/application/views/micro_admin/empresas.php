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
				<div class="col-md-2 tab_active"><a href="<?=base_url()?>micro_admin/empresas">Empresas</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/productos">Productos</a></div>
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
				<th style="text-align: center;">Reestablecer<br>Contaseña</th>
				<th style="text-align: center;">Nit</th>
                <th style="text-align: center;">Nombre</th>
                <th style="text-align: center;">Logo</th>
				<th style="text-align: center;">Descripcion</th>
				<th style="text-align: center;">Membresia</th>
				<th style="text-align: center;">Nombre Contacto</th>
				<th style="text-align: center;">usuario</th>
				<th class="hidden-xs" style="text-align: center;">Email</th>
				<th style="text-align: center;">Telefono</th>
				<th style="text-align: center;">Direccion</th>
				<th style="text-align: center;">Editar</th>
				<th style="text-align: center;">Eliminar</th>
              </tr>
            </thead>
              <tbody>  
                <?php foreach ($proveedores as $datos):  ?>
                  <tr>
                    
                    <td width="5%" >                     	
                       <a href="<?= base_url(); ?>/micro_admin/recuperar_clave/<?=$datos['usuario']->id?>" >
                       Reestablecer<br>Contaseña
                       </a>
                    </td>
                    <td width="10%" >                       
                       <a href="<?= base_url(); ?>perfil/ver_empresa/<?=$datos['empresa']->id?>" >
                         <h5 style="margin: 15% 10% ;">
                          <?=$datos['empresa']->nit?>
                          </h5>
                        </a>
                      </td><td width="10%" >                       
                       <a href="<?= base_url(); ?>perfil/ver_empresa/<?=$datos['empresa']->id?>" >
                         <h5 style="margin: 15% 10% ;">
                          <?=$datos['empresa']->nombre?>
                          </h5>
                        </a>
                      </td>
                      <td width="15%" > 
						<img  class="center-block" src="<?=base_url()?>uploads/logos/<?=$datos['empresa']->logo?>" style="max-width:185px; max-height:100px">
					  </td>
                      <td width="15%" > 
					    <div class="center-block" style="max-width: 220px; /* border-style: solid; */">
							<?=$datos['empresa']->descripcion?> 
						</div>
					  </td>
					  <td width="10%" > 
					    <div class="center-block" style=" max-width: 120px; /* border-style: solid; */">
                      		<select value="<?=$datos['empresa']->membresia?>" 
                      			onchange="JavaScript:cambiar_membresia('<?=$datos['empresa']->id?>',this.value)">
                      			<?php if($datos['empresa']->membresia==1): ?> 
	                      			<option value="1">Estandard</option>
	                      			<option value="2">Verificada</option>
	                      			<option value="3">Platino</option>
	                      		<?php elseif ($datos['empresa']->membresia==2): ?>	                      		
	                      			<option value="2">Verificada</option>
	                      			<option value="1">Estandard</option>
	                      			<option value="3">Platino</option>
	                      		<?php else:?>	                      		
	                      			<option value="3">Platino</option>
	                      			<option value="2">Verificada</option>
	                      			<option value="1">Estandard</option>
	                      		<?php endif;?>
                      		</select>                      		
                      	</div>
				      </td>
					  <td width="15%" > 
						<?=$datos['usuario']->nombres?> 
					  </td>
					  <td width="15%" > 
						<?=$datos['usuario']->usuario?> 
					  </td>
                    <td width="10%" > 
                     <?=$datos['usuario']->email?>
                    </td>
                      </a>
                    <td width="10%" > 
                       <?= $datos['usuario']->indicativo?> -
                        <?= $datos['usuario']->telefono?> -
                        <?= $datos['usuario']->extension?>
                         <br>cel: <?= $datos['usuario']->celular?> 
                        </td>
                      
                    <td width="10%" > 
                      <?= $datos['usuario']->direccion ?> 
                        
                    </td>
                    
                    <td width="10%"> 
                      <a href="<?=base_url()?>eliminar/empresa/<?=$datos['empresa']->id?>"> 
                        <span class="glyphicon glyphicon-trash" style="font-size: 30px; margin: 20% 40%;"> 
                      </a> 
                    </td>

					<td width="10%"> 
					   <a href="JavaScript:start(<?=$datos['empresa']->id?>,1);">  
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
										<?= form_open_multipart(base_url()."/micro_admin/empresas",$atributos); ?>
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

<script type="text/javascript">
      function cambiar_membresia(id_empresa,id_membresia)
      {
      		//console.log(" "+id_empresa+" "+id_membresia);

      		var nav=new XMLHttpRequest();
      		var url =  "<?=base_url()?>micro_admin/cambiar_membresia/"+id_empresa+"/"+id_membresia;
		    nav.open("GET",url, true);
			nav.addEventListener('load',show,false);
			nav.send(null);
			function show()
			{
					//cotizar=document.getElementById('cotizar');
					console.log(nav.response);
					//cotizar.innerHTML=popup.response;
			}
	       			
 	   }
</script>