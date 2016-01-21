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
        <div class="col-xs-10 col-xs-push-0 table-responsive " > <CENTER>

		<a href="<?=base_url()?>inventarios2"><h2>Registro masivos<i class="fa fa-shield fa-flip-vertical" > 
						</i> </h2></a>
		<a href="<?=base_url()?>inventarios2/eliminar"><h2>Eliminar registros masivos</h2></a>


        <!-- columna de tamaño 9 para la tabla un espacio -->
        <div class="col-xs-10 col-xs-push-0 table-responsive " >
         <CENTER>
          <table class="table table-bordered table-hover ">
            <thead>
              <tr>
				<th style="text-align: center;">Reestablecer<br>Contaseña</th>
				<th style="text-align: center;">Identificadores</th>
                <th style="text-align: center;">Logo</th>
				<th style="text-align: center;">Descripcion</th>
				<th style="text-align: center;">Tipo Empresa/<br>Categoria Prinsipal/<br>Membresia</th>
				<th style="text-align: center;">Datos Usuario</th>
				<th style="text-align: center;">Contacto</th>
				<th style="text-align: center;">Direccion</th>
				<th style="text-align: center;">Acciones</th>
              </tr>
            </thead>
              <tbody>  
                <?php foreach ($proveedores as $proveedor):  ?>
                  <tr>
                    
                    <td width="5%" >                     	
                       <a href="<?= base_url(); ?>/micro_admin/recuperar_clave/<?=$proveedor['usuario']->id?>" >
                       Reestablecer<br>Contaseña
                       </a>
                    </td>
                    <td width="10%" >
	                    <center> 
	                    	<b>Nit:</b>                      
	                       <br><a href="<?= base_url(); ?>perfil/ver_empresa/<?=$proveedor['empresa']->id?>" >
	                          <?=$proveedor['empresa']->nit?>
	                       </a>
	                       <br><b>Nombre:</b>
	                       <br><input id="empresa_<?=$proveedor['empresa']->id?>nombre" disabled="true" value="<?=$proveedor['empresa']->nombre?>">
	                    </center> 
                     </td>
                      <td width="15%" > 
						<img  class="center-block" src="<?=base_url()?>uploads/resize/logos/<?=$proveedor['empresa']->logo?>" style="max-width:155px; max-height:70px">
					 	<input id="empresa_<?=$proveedor['empresa']->id?>logo_old" type="hidden" value="<?=$proveedor['empresa']->logo?>">
					  </td>
                      <td width="15%" > 
					    <div class="center-block" style="max-width: 220px; /* border-style: solid; */">
					    	<textarea cols="15" rows="3" disabled="true" id="empresa_<?=$proveedor['empresa']->id?>descripcion" >
					    		<?=$proveedor['empresa']->descripcion?>
					    	</textarea>
						</div>
					  </td>					  
					  <td width="30%" > 
					   	<center>
					   		<b>Tipo Registro:</b><br>
					   			<?php if($proveedor['empresa']->tipo_registro==1): ?> 
	                      			<option value="1">Orgánico</option>
	                      		<?php elseif ($proveedor['empresa']->tipo_registro==2): ?>
	                      			Automático (Desde Solicitud)
	                      		<?php elseif ($proveedor['empresa']->tipo_registro==3): ?>
	                      			Registro Masivo
	                      		<?php else:?>	                
	                      			Registro Rápido (Desde Micro_admin)
	                      		<?php endif;?>
                      		<br>
					   		<b>Membresia:</b>
                      		<br>
                      		<select value="<?=$proveedor['empresa']->membresia?>" 
                      			onchange="JavaScript:cambiar_membresia('<?=$proveedor['empresa']->id?>',this.value)">
                      			<?php if($proveedor['empresa']->membresia==1): ?> 
	                      			<option value="1">Estandard</option>
	                      			<option value="2">Oro</option>
	                      			<option value="3">Platino</option>
	                      		<?php elseif ($proveedor['empresa']->membresia==2): ?>	                      		
	                      			<option value="2">Oro</option>
	                      			<option value="1">Estandard</option>
	                      			<option value="3">Platino</option>
	                      		<?php else:?>	                      		
	                      			<option value="3">Platino</option>
	                      			<option value="2">Oro</option>
	                      			<option value="1">Estandard</option>
	                      		<?php endif;?>
                      		</select>   
                      		<br>
                      		<b>Verificación:</b>
                      		<br>
                      		<select value="<?=$proveedor['empresa']->legalizacion?>" 
                      			onchange="JavaScript:cambiar_verificacion('<?=$proveedor['empresa']->id?>',this.value)"> 
	                      			<?php if($proveedor['empresa']->legalizacion==0): ?> 	                      		
	                      			<option value="0">Sin Verificar</option> 
	                      			<option value="1">Verificada</option>                  		
	                      			 <?php else:?>	                      		
	                      			<option value="1">Verificada</option>
	                      			<option value="0">Sin Verificar</option>
	                      		    <?php endif;?>        		
                      		</select> 
							<br>
							<b>Tipo_empresa:</b>
                      		<br>
	                      		<select value="<?=$proveedor['empresa']->tipo?>"  disabled="true" id="empresa_<?=$proveedor['empresa']->id?>tipo_empresa">
		                      			<?php foreach($tipos_empresa as $tipo): ?> 
			                      			<?php if($proveedor['empresa']->tipo==$tipo->id_tipoempresa):?>
				                      			<option selected value="<?=$tipo->id_tipoempresa?>"><?=$tipo->tipo?></option>
				                      			<?php else:?>	                      			
				                      			<option value="<?=$tipo->id_tipoempresa?>"><?=$tipo->tipo?></option>	                      			
			                      			<?php endif;?>	                      			
			                      		<?php endforeach;?>			                      	
	                      		</select> 
                      		<br>
                      		<b>Categoria Principal:</b>
                      		<br>
	                      		<select value="6" id="empresa_<?=$proveedor['empresa']->id?>categoria"	                      			
                      			onchange="JavaScript:cambiar_categoria('<?=$proveedor['empresa']->id?>',this.value)"> 
	                      		<option value="6">No definida</option>
		                      			<?php foreach($categorias as $categoria): ?> 
			                      			<option value="<?=$categoria->id_categoria?>" <?php if($proveedor['empresa']->categoria==$categoria->id_categoria){echo "selected";}?> ><?=$categoria->nombre_categoria?></option>	                      			
			                      		<?php endforeach;?>
	                      		</select> 
                      		</center>
                      	</div>
				      </td>
					  <td width="15%" >
					  	<center>
					  	 <b>Nombre:</b>
							<br>
							<input id="empresa_<?=$proveedor['empresa']->id?>nombres" disabled="true" value="<?=$proveedor['usuario']->nombres?>">
							<br>
						  <b>Usuario:</b>
							<br>
							<?=$proveedor['usuario']->nombres?> 
							<br>
						  <b>Email:</b>
							<br>
						  	<?=$proveedor['usuario']->email?>
	                      </b>
                      	</center>
                      </td>
                    <td width="20%" > 
                    	<center>
	                       <b>Indicativo:</b>
	                       <br><input id="empresa_<?=$proveedor['empresa']->id?>indicativo" size="3" disabled="true" value="<?= $proveedor['usuario']->indicativo?>">
	                       <br><b>Numero:</b>
	                       <br><input id="empresa_<?=$proveedor['empresa']->id?>numero" disabled="true" value="<?= $proveedor['usuario']->telefono?>">
	                       <br><b>Extensión:</b>
	                       <br><input id="empresa_<?=$proveedor['empresa']->id?>extension" size="3" disabled="true" value="<?= $proveedor['usuario']->extension?>">
	                       <br><b>Celular:</b>
	                       <br><input id="empresa_<?=$proveedor['empresa']->id?>celular" size="15" disabled="true" value="<?= $proveedor['usuario']->celular?>">
                     	</center>
                     </td>
                      
                    <td width="10%" > 
                      <input id="empresa_<?=$proveedor['empresa']->id?>direccion" disabled="true" value="<?= $proveedor['usuario']->direccion ?>">
                    </td>

					<td width="10%"> 
						<center>
						 <br>
					     	<a id="empresa_<?=$proveedor['empresa']->id?>" href="JavaScript:editar_empresa('empresa_<?=$proveedor['empresa']->id?>');">
		                     	<span class="glyphicon glyphicon-pencil" style="font-size: 30px; margin: 20% 40%;"></span>
	                    	</a>
						 <br>
						 <br>
						 <br>
						 <br>
		                    <a href="<?=base_url()?>eliminar/empresa/<?=$proveedor['empresa']->id?>"> 
		                        <span class="glyphicon glyphicon-trash" style="font-size: 30px; margin: 20% 40%;"></span>
		                     </a> 
						 <br>
		                 </center>
                    </td>

                  </tr>
                  <input type="hidden"  id="empresa_<?=$proveedor['empresa']->id?>id" value="<?=$proveedor['empresa']->id?>"/>
                  <input type="hidden"  id="empresa_<?=$proveedor['empresa']->id?>nit" value="<?=$proveedor['empresa']->nit?>"/>
	              <input type="hidden"  id="empresa_<?=$proveedor['empresa']->id?>web" value="<?=$proveedor['usuario']->web?>"/>
	              <input type="hidden"  id="empresa_<?=$proveedor['empresa']->id?>departamento" value="<?=$proveedor['usuario']->departamento?>"/>
	              <input type="hidden"  id="empresa_<?=$proveedor['empresa']->id?>ciudad" value="<?=$proveedor['usuario']->ciudad?>"/>
	              <input type="hidden"  id="empresa_<?=$proveedor['empresa']->id?>cargo" value="<?=$proveedor['usuario']->cargo?>"/>
	              <input type="hidden"  id="empresa_<?=$proveedor['empresa']->id?>id_categorias" value="1|"/>
	              <input type="hidden"  id="empresa_<?=$proveedor['empresa']->id?>nombre_categorias" value="nom_catgoria|"/>
	                    
                  <?php endforeach; ?>                
              </tbody>
          </table>
         </CENTER>
        </div>

<?php $attribbs=array('id'=>"form",'target'=>"other",'autocomplete' => 'off','novalidate' => 'novalidate');?>
<?=form_open_multipart('perfil/actualizar2/',$attribbs)?>
<input type='hidden' name="nombre" id="nombre">	                
<input type='hidden' name="nombres" id="nombres">	                
<input type='hidden' name="descripcion" id="descripcion">	                
<input type='hidden' name="tipo_empresa" id="tipo_empresa">	                
<input type='hidden' name="logo_old" id="logo_old">	                
<input type='hidden' name="cargo" id="cargo">	                
<input type='hidden' name="direccion" id="direccion">	                
<input type='hidden' name="departamento" id="departamento">	                
<input type='hidden' name="ciudad" id="ciudad">	                
<input type='hidden' name="web" id="web" >	         
<input type='hidden' name="telefono" id="numero">	          
<input type='hidden' name="indicativo" id="indicativo">	                
<input type='hidden' name="extension" id="extension">	                
<input type='hidden' name="celular" id="celular">	                
<input type='hidden' name="nit" id="nit">	
<input type='hidden' name="id" id="id">	
<input type='hidden' name="id_categorias" id="nit">	
<input type='hidden' name="nombre_categorias" id="nit">	
<?= form_close() ?>



				
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
     function cambiar_categoria(id_empresa,id_membresia)
      {
          //console.log(" "+id_empresa+" "+id_membresia);

          var nav=new XMLHttpRequest();
          var url =  "<?=base_url()?>micro_admin/cambiar_categoria/"+id_empresa+"/"+id_membresia;
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
     function cambiar_verificacion(id_empresa,id_membresia)
      {
          //console.log(" "+id_empresa+" "+id_membresia);

          var nav=new XMLHttpRequest();
          var url =  "<?=base_url()?>micro_admin/cambiar_verificacion/"+id_empresa+"/"+id_membresia;
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