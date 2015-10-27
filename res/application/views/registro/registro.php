   <link rel="stylesheet" href="<?=base_url()?>assets/css/popup_registro.css">
   <a data-toggle="modal" id="popup_launch" name="popup_launch" data-target="#popup-registro" class="enlace_registro cursor-mano" href="JavaScript:;">
	</a>
	<div class="registro">
        <div class="modal fade" id="popup-registro" tabindex="-1" role="dialog" aria-hidden="false" style="padding: 0 15px;">
		 <div class="modal-dialog modal-dialog-registro" style="padding-left: 15px;padding-right: 15px;">
				          <div class="modal-header encabezado">
				            <button type="button" class="close" data-dismiss="modal" >
		                  <span aria-hidden="true">
				                <span class="fa fa-times cerrar" aria-hidden="true"></span>
		                  </span>
				                <span class="sr-only">Cerrar</span>
				              </button>
				            <h4 id='title' class="modal-title text-center titulo_popup">
				            	<span class="glyphicon glyphicon-pencil" style="font-size: 24px;left: -1px;"></span> 
				            	Registrar Empresa
				            </h4>
				          </div>
		    	<form action="<?=base_url()?>registro/insert" method="post" accept-charset="utf-8" name="registro" enctype="multipart/form-data"> 
   
				<div class="modal-body text-center popup_central" id="paso1">
            		<p class="style-p">Información de Usuario</p>
            			<div class="input-group ">
			                <span class="input-group-addon new-input-group">
			                  <span class="glyphicon glyphicon-user iconos-gly"></span>
			                </span>
			                <input name="usuario" value="<?php echo set_value('usuario'); ?>" 
							onchange="JavaScript:eliminar_espacios(this);verificar_attime(this);verificar_largo(this,5);verificar_caracteres(this,'[SYM]');"
							onclick="JavaScript:limpiar(this);" ondblclick="necessary"  
							class="input-style necessary" placeholder="Nombre de usuario"
							rel='tooltip' data-placement='right' id="usuario">
							<!-- <span class="bar"></span> -->
			                <span class="input-group-addon new-input-group margen-input-veri">
			                  <i id='err_usuario'>
										<?php if(form_error('usuario', '','')!='')
											{
											echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
											}
										?>
										</i>
			                </span>
			                <span class="input-group-addon new-input-group margen-input-aste">
			                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
			                </span>
                  		</div>

                  		<!-- Campo De Validación -->
                  		<div class="input-group" style="margin: 0;display:none;" id="parent_msj_err_usuario">
			                <span class="input-group-addon new-input-group" style="color: transparent;">
			                  <span class="glyphicon glyphicon-user iconos-gly"></span>
			                </span>
			                <span class="style-text-validation" id="msj_err_usuario"><?=form_error('usuario', '','')?></span>
                  		</div>

						<div class="input-group">
							<span class="input-group-addon new-input-group">
								<i class="fa fa-at scale-icon"></i>
							</span>
							<input name="email" value="<?php echo set_value('email'); ?>" 
							onchange="JavaScript:verificar_formato(this);verificar_attime(this)" onclick="JavaScript:limpiar(this);"
							class="input-style" placeholder="Email"  type="email" ondblclick="necessary"
							rel='tooltip' data-placement='right'id="email">
							<span class="input-group-addon new-input-group margen-input-veri">
								<i id='err_email'>
								<?php if(form_error('email', '','')!='')
									{
									echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
									}
								?>
								</i>
							</span>
							<span class="input-group-addon new-input-group margen-input-aste">
								<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
							</span>
						</div>

						<!-- Campo De Validación -->
                  		<div class="input-group" style="margin: 0;display:none;" id="parent_msj_err_email">
			                <span class="input-group-addon new-input-group" style="color: transparent;">
			                  <span class="glyphicon glyphicon-user iconos-gly"></span>
			                </span>
			                <span class="style-text-validation" id="msj_err_email"><?=form_error('email', '','')?></span>
                  		</div>		

				<div class="input-group"> 
					<span class="input-group-addon new-input-group">
						<span class="glyphicon glyphicon-asterisk iconos-gly"></span>
					</span>
					<input id="password" name="password"  value="<?php echo set_value('password'); ?>"  onclick="JavaScript:limpiar(this);"
					onchange="JavaScript:verificar_igualdad(document.getElementById('password2'),this);verificar_largo(this,6);verificar_caracteres(this,' áéíóúñ');" class="input-style" 
					placeholder="Contraseña"  type="password" rel='tooltip' ondblclick="necessary"
					data-placement='right'>	
					<span class="input-group-addon new-input-group margen-input-veri">
						<i id="err_password">
					  	<?php if(form_error('password', '','')!='')
						   	{
						   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
						   	}
					   	 ?>
					   	</i>
				   	</span>
				   	<span class="input-group-addon new-input-group margen-input-aste">
						<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
					</span>
				</div>

				<!-- Campo De Validación -->
                  		<div class="input-group" style="margin: 0;display:none;" id="parent_msj_err_password">
			                <span class="input-group-addon new-input-group" style="color: transparent;">
			                  <span class="glyphicon glyphicon-user iconos-gly"></span>
			                </span>
			                <span class="style-text-validation" id="msj_err_password"><?=form_error('password', '','')?></span>
                  		</div>

				<div class="input-group"> 
					<span class="input-group-addon new-input-group">
						<span class="glyphicon glyphicon-asterisk iconos-gly"></span>
					</span>
				  	<input id="password2"  name="password2"  value="<?php echo set_value('password2'); ?>" 
				  	onclick="JavaScript:limpiar(this);"  ondblclick="necessary"
				  	onchange="JavaScript:verificar_igualdad(this,document.getElementById('password'))"
				  	class="input-style" placeholder="Confirmar Contraseña"  type="password" 
				  	rel='tooltip' data-placement='right'>
				  	<span class="input-group-addon new-input-group margen-input-veri">
				   	<i id="err_password2">
				  	<?php if(form_error('password2', '','')!='')
					   	{
					   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
					   	}
				   	 ?>
				   	</i>
				   	</span>
					<span class="input-group-addon new-input-group margen-input-aste">
						<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
					</span>
				</div>

				<!-- Campo De Validación -->
          		<div class="input-group" style="margin: 0;display:none;" id="parent_msj_err_password2">
	                <span class="input-group-addon new-input-group" style="color: transparent;">
	                  <span class="glyphicon glyphicon-user iconos-gly"></span>
	                </span>
	                <span class="style-text-validation" id="msj_err_password2"><?=form_error('password2', '','')?></span>
          		</div>

                <div class="style-pasos margin-top-registro">
                	<p class="text-pasos">Paso 1 de 3</p>
                </div>

				<div class="group">
					
                	<input type="button" value="Siguiente" onclick="JavaScript:validar(1,4);" class="btn center-block boton_enviar">
                </div> 
          </div>
<!--paso2-->
				<div class="modal-body text-center popup_central_paso2" id="paso2" style="display:none">
					<p class="style-p">Información de Contacto</p>
					<div class="input-group">
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-user iconos-gly"></span>
		                </span>
						<input name="nombre"  value="<?php echo set_value('nombre'); ?>"
						onchange="JavaScript:verificar_largo(this,5); verificar_caracteres(this,'=')"
						class="input-style" type="text" placeholder="Nombre y Apellido" 
						ondblclick="necessary" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri">							
							<i id="err_nombre">
								<?php if(form_error('nombre', '','')!='')
								{
									echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
								}
								?>
							</i>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste margen-input-veri">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>

					<!-- Campo De Validación -->
          		<div class="input-group" style="margin: 0; display:none;" id="parent_msj_err_nombre">
	                <span class="input-group-addon new-input-group" style="color: transparent;">
	                  <span class="glyphicon glyphicon-user iconos-gly"></span>
	                </span>
	                <span class="style-text-validation" id="msj_err_nombre"><?=form_error('nombre', '','');?></span>
          		</div>

					<div class="input-group">
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-user iconos-gly"></span>
		                </span>
						<input name="cargo"  value="<?php echo set_value('cargo'); ?>"
						onchange="JavaScript:verificar_largo(this,2);"
						class="input-style" type="text" placeholder="Cargo/Función en la empresa" ondblclick="necessary"
						style="width: 101%;" title="<?=form_error('cargo', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri">
							<i id="err_cargo">
							<?php if(form_error('cargo', '','')!='')
							{
								echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							}
							?>
							</i>
						</span>
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>

					<!-- Campo De Validación -->
          		<div class="input-group" style="margin: 0; display:none;" id="parent_msj_err_cargo">
	                <span class="input-group-addon new-input-group" style="color: transparent;">
	                  <span class="glyphicon glyphicon-user iconos-gly"></span>
	                </span>
	                <span class="style-text-validation" id="msj_err_cargo"><?=form_error('cargo', '','');?></span>
          		</div>

					<div class="input-group">
						<span class="input-group-addon new-input-group margen-input-aste margen-input-veri">
		                  <i class="fa fa-file-text" style="font-size: 19px !important;margin-left: 6px;"></i>
		                </span>
						<input name="direccion"  value="<?php echo set_value('direccion'); ?>"
						onchange="JavaScript:verificar_largo(this,5);"
						class="input-style" type="text" placeholder="Dirección de la empresa" ondblclick="necessary"
						title="<?=form_error('direccion', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri">
							<i id="err_direccion">
								<?php if(form_error('direccion', '','')!='')
								{
									echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
								}
								?>
							</i>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>

					<!-- Campo De Validación -->
          		<div class="input-group" style="margin: 0;display:none;" id="parent_msj_err_direccion">
	                <span class="input-group-addon new-input-group" style="color: transparent;">
	                  <span class="glyphicon glyphicon-user iconos-gly"></span>
	                </span>
	                <span class="style-text-validation" id="msj_err_direccion"><?=form_error('direccion', '','');?></span>
          		</div>

					<div class="input-group">
						<span class="input-group-addon new-input-group">
							<i class="fa fa-globe iconos-gly"></i>
		                </span>
						<select name="pais" id="pais" value="<?=set_value('pais'); ?>" 
						onchange="JavaScript:cambio_pais();verificar(this);" onload="JavaScript:cambio_pais();"
						class="input-style font-text" id="select" ondblclick="necessary" title="<?=form_error('pais', '','')?>" 
						rel='tooltip' data-placement='right' value="">
							<option value="0">Selecciona tu pais</option>
							<option value="52">Colombia</option>
							<optgroup label=""></optgroup>
							<optgroup label="-------------------------------------"></optgroup>
							<optgroup label="SELECCIONAR OTRO PAÍS"></optgroup>							
							<optgroup label=""></optgroup>
					        	<?php  foreach($paises as $pais)  {   ?>
					         	<option value="<?=$pais -> id ?>" 
					         		<?php echo set_select('pais',  $pais -> id ); ?> ><?=$pais -> nombre ?></option>
					        	<?php  } ?>   
						</select>
						<span class="input-group-addon new-input-group margen-input-veri">
							<i id="err_pais">
							<?php if(form_error('pais', '','')!='')
							{
								echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							}
							?>
							</i>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>

					<!-- Campo De Validación -->
					<div class="input-group" style="margin: 0;display:none;" id="parent_msj_err_pais">
						<span class="input-group-addon new-input-group" style="color: transparent;">
							<span class="glyphicon glyphicon-user iconos-gly"></span>
						</span>
						<span class="style-text-validation" id="msj_err_pais"><?=form_error('pais', '','');?></span>
					</div>

					<div class="input-group" style="display:none;" id="ubicacion"> 	
						<span class="input-group-addon new-input-group" >
							<i class="fa fa-globe iconos-gly" style="color: transparent;"></i>
		                </span>					
						<select style="display:none" name="provincia" id="provincia" 
						value="<?=set_value('provincia'); ?>" onchange="JavaScript:cambio_departamento(this.value); verificar(this);"
						class="input-style font-text" id="select" ondblclick="necessary"  rel='tooltip' 
						data-placement='right'>
							<option value="0">Selecciona tu departamento</option>
								<optgroup label=""></optgroup>
						        	<?php  foreach($dept as $departamento):  ?>
						         	<option value="<?=$departamento->id_departamento?>" 
						         		<?php echo set_select('provincia',  $departamento->id_departamento ); ?> ><?=$departamento->nombre ?></option>
						        	<?php  endforeach; ?>   
						</select>	
						<span class="input-group-addon new-input-group margen-input-veri">
							<i id="err_provincia">
							<?php if(form_error('provincia', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						   	</i>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste">
		                  <span id="required_provincia" ondblclick="necessary" style="display:none" class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>

					<!-- Campo De Validación -->
          		<div class="input-group" style="margin: 0;display:none;" id="parent_msj_err_provincia">
	                <span class="input-group-addon new-input-group" style="color: transparent;">
	                  <span class="glyphicon glyphicon-user iconos-gly"></span>
	                </span>
	                <span class="style-text-validation" id="msj_err_provincia"><?=form_error('provincia', '','');?></span>
          		</div>

					<div class="input-group" style="display:none;"  id="ubicacion2"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-globe iconos-gly" style="color: transparent;"></i>
		                </span>
		                <select style="display:none" name="municipio" id="municipio" value="<?=set_value('municipio'); ?>"
						class="input-style font-text" ondblclick="necessary"  rel='tooltip'  onchange="JavaScript:verificar(this);"
						data-placement='right'>
							<option value="0">Selecciona tu municipio</option>
											<optgroup label=""></optgroup>
									        	<?php  foreach($municipios as $municipio)  {   ?>
									         	<option value="<?=$municipio->id_municipio ?>" 
									         		<?php echo set_select('municipio',  $municipio->id_municipio ); ?> ><?=$municipio->nombre_municipio ?></option>
									        	<?php  } ?>   
						</select>	
						<span class="input-group-addon new-input-group margen-input-veri">									
							<i id="err_municipio">
								<?php if(form_error('municipio', '','')!='')
								   	{
								   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
								   	}
						   		 ?>
						   	</i>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste">
		                  <span id="required_municipio" ondblclick="necessary" style="display:none" class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>

					<!-- Campo De Validación -->
          		<div class="input-group" style="display:none;margin: 0;" id="parent_msj_err_municipio">
	                <span class="input-group-addon new-input-group" style="color: transparent;">
	                  <span class="glyphicon glyphicon-user iconos-gly"></span>
	                </span>
	                <span class="style-text-validation" id="msj_err_municipio"><?=form_error('municipio', '','');?></span>
          		</div>

					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<span class="glyphicon glyphicon-phone iconos-gly"></span>
		                </span>
						<input name="cel"  value="<?php echo set_value('cel'); ?>"
						onchange="JavaScript:verificar_largo(this,10); verificar_caracteres(this,'[ALPHA][SYM]|-')"
						onclick="JavaScript:limpiar(this);" class="input-style" type="text" placeholder="Telefono Celular" ondblclick="necessary"
						rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri">
							<i id='err_cel'>
								<?php if(form_error('cel', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						   	</i>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>

					<!-- Campo De Validación -->
          		<div class="input-group" style="margin: 0;display:none;" id="parent_msj_err_cel">
	                <span class="input-group-addon new-input-group" style="color: transparent;">
	                  <span class="glyphicon glyphicon-user iconos-gly"></span>
	                </span>
	                <span class="style-text-validation" onclick="JavaScript:limpiar(this)" id="msj_err_cel"><?=form_error('cel', '','');?></span>
          		</div>

					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-phone iconos-gly"></i>
		                </span>
						<input name="fijo"  value="<?php echo set_value('fijo'); ?>" onchange="JavaScript:verificar(this);"
						class="input-style" type="text" placeholder="Telefono Fijo y/o PBX"
						rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri"
						  style="padding-right: 26px !important;">
						<i id="err_fijo">
							<?php if(form_error('fijo', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						   	</i>
						</span>
				   	    <span class="input-group-addon new-input-group "style="display: none;">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>

					<!-- Campo De Validación -->
          		<div class="input-group" style="margin: 0;display:none;" id="parent_msj_err_fijo">
	                <span class="input-group-addon new-input-group" style="color: transparent;">
	                  <span class="glyphicon glyphicon-user iconos-gly"></span>
	                </span>
	                <span class="style-text-validation" id="msj_err_fijo"><?=form_error('fijo', '','');?></span>
          		</div>

					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-laptop iconos-gly"></i>
		                </span> 
						<input name="web"  value="<?php echo set_value('web'); ?>" onchange="JavaScript:verificar_caracteres(this,'[SPACE]@ ( ) ? ¿ =');"
						class="input-style" type="text" placeholder="Pagina Web" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri" 
						style="padding-right: 26px !important;">
						<i id="err_web">
							<?php if(form_error('web', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						   	</i>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste" 
						style="display: none;">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>

					<!-- Campo De Validación -->
          		<div class="input-group" style="margin: 0;display:none;">
	                <span class="input-group-addon new-input-group" style="color: transparent;">
	                  <span class="glyphicon glyphicon-user iconos-gly"></span>
	                </span>
	                <span class="style-text-validation" id="msj_err_web"><?=form_error('web', '','');?></span>
          		</div>

					<div class="style-pasos margin-top-registro">
						<p class="text-pasos">Paso 2 de 3</p>
					</div>
				<div class="group">	
					<input type="button" value="Siguiente" onclick="JavaScript:validar(2,15);" class="btn center-block boton_enviar">
				</div> 
              </div>
<!--paso2-->       
				<div class="modal-body text-center popup_central_paso3" id="paso3" style="display:none">
					<p class="style-p">Información de la Empresa</p>
					<div class="input-group">
			                <span class="input-group-addon new-input-group">
			                	<i class="fa fa-building-o iconos-font"></i>
			                </span>
			                <input id="name" name="nombre_empresa" value="<?php echo set_value('nombre_empresa'); ?>" 
							onchange="JavaScript:verificar_largo(this,3);verificar_caracteres(this,'[SYM].:|&')" onclick="JavaScript:limpiar(this)"
							class="input-style" placeholder="Nombre de la empresa" ondblclick="necessary" type="text"
							title="<?=form_error('nombre_empresa', '','')?>" rel='tooltip' data-placement='right'>
							<!-- <span class="bar"></span> -->
			                <span class="input-group-addon new-input-group margen-input-veri">
			                  	<i id='err_nombre_empresa'>
									<?php if(form_error('nombre_empresa', '','')!='')
									{
									echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
									}
									?>
								</i>
			                </span>
			                <span class="input-group-addon new-input-group margen-input-aste">
			                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
			                </span>
                  		</div>

                  		<!-- Campo De Validación -->
					<div class="input-group" style="margin: 0;display: none;" id="parent_msj_err_nombre_empresa">
						<span class="input-group-addon new-input-group" style="color: transparent;">
							<span class="glyphicon glyphicon-user iconos-gly"></span>
						</span>
						<span class="style-text-validation" id="msj_err_nombre_empresa"><?=form_error('nombre_empresa', '','');?></span>
					</div>

					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-newspaper-o iconos-font"></i>
			            </span>
						<input id="nit" name="nit"  value="<?php echo set_value('nit'); ?>" onclick="JavaScript:limpiar(this)"
						onchange="JavaScript:eliminar_espacios(this);verificar_attime(this); verificar_caracteres(this,' áéíóúñ [ALPHA][SYM]|-')"
						class="input-style" type="text" placeholder="Nit de la empresa / CC del comerciante" ondblclick="necessary"
						 rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri">
							<i id='err_nit'>
								<?php 
									if(form_error('nit', '','')!='')
									   	{
									   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
									   	}
						   	 	?>
						   	 </i>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste">
			                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
			            </span>
					</div>

					<!-- Campo De Validación -->
					<div class="input-group" style="margin: 0;display: none;" id="parent_msj_err_nit">
						<span class="input-group-addon new-input-group" style="color: transparent;">
							<span class="glyphicon glyphicon-user iconos-gly"></span>
						</span>
						<span class="style-text-validation" id="msj_err_nit"><?=form_error('nit', '','');?></span>
					</div>

					<div class="input-group">
						<span class="input-group-addon new-input-group">
							<span class="glyphicon glyphicon-tags iconos-font"></span>
			            </span> 
						<select id="tipo_empresa" name="tipo"  value="<?php echo set_value('tipo'); ?>" onchange="JavaScript:verificar(this);"
							class="input-style font-text" id="select" ondblclick="necessary" onclick="JavaScript:limpiar(this)" 
							rel='tooltip' data-placement='right'>
						<option value="0">Tipo de empresa</option>
						<?php foreach ($lista as $item) : ?>
							<option value="<?= $item->id_tipoempresa ?>" <?php echo set_select('tipo', $item->id_tipoempresa); ?> ><?= $item->tipo ?>
							</option>
						<?php endforeach; ?>
						</select>
							<span class="input-group-addon new-input-group margen-input-veri">
							<i id='err_tipo'>
								<?php if(form_error('tipo', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						   	</i>
						   	</span>
						<span class="input-group-addon new-input-group margen-input-aste">
							<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
						</span>
					</div>

					<!-- Campo De Validación -->
					<div class="input-group" style="margin: 0;display: none;" id="parent_msj_err_tipo">
						<span class="input-group-addon new-input-group" style="color: transparent;">
							<span class="glyphicon glyphicon-user iconos-gly"></span>
						</span>
						<span class="style-text-validation" id="msj_err_tipo"><?=form_error('tipo', '','');?></span>
					</div>

					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-file-text iconos-font"></i>
			            </span>
						<textarea id="descripcion" name="descripcion" rows="3" cols="50" value="<?php echo set_value('descripcion'); ?>"
						class="input-style" type="textarea" placeholder="Descripcion de la empresa" ondblclick="necessary"
						onchange="JavaScript:verificar_largo(this,15);verificar_largo_max(this,500);"
						onclick="JavaScript:limpiar(this)" rel='tooltip' data-placement='right'></textarea>
						<span class="input-group-addon new-input-group margen-input-veri">
							<i id='err_descripcion'>
								<?php if(form_error('descripcion', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						   	</i>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste">
							<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
						</span>
					</div>

					<!-- Campo De Validación -->
					<div class="input-group" style="margin: 0;display: none;" id="parent_msj_err_descripcion">
						<span class="input-group-addon new-input-group" style="color: transparent;">
							<span class="glyphicon glyphicon-user iconos-gly"></span>
						</span>
						<span class="style-text-validation" id="msj_err_descripcion"><?=form_error('descripcion', '','');?></span>
					</div>
					
					<!-- Segundo Select con checkbox de prueba -->
					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-cubes iconos-font"></i>
						</span>
						<input id="sectores" name="sectores" class="input-style"  placeholder="Selecciona los sectores (Maximo 5)"
						onclick="JavaScript:mostrar_categorias();" rel='tooltip' data-placement='right' ondblclick="necessary">
						<span class="input-group-addon new-input-group margen-input-veri"
						style="padding-right: 26px !important;">
							<a href="JavaScript:mostrar_categorias()">								
								<span class="glyphicon glyphicon-chevron-down"></span>								
							</a>
						<i id='err_sectores'>								
							<?php if(form_error('categorias', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						   	</i>
						<span class="input-group-addon new-input-group" style="display: none;">
							<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
						</span>
						</span>
						<span class="input-group-addon new-input-group" style="display: none;">
							<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
						</span>
					</div>
					<!-- Campo De Validación -->
					<div class="input-group" style="margin: 0;display: none;" id="parent_msj_err_sectores">
						<span class="input-group-addon new-input-group" style="color: transparent;">
							<span class="glyphicon glyphicon-user iconos-gly"></span>
						</span>
						<span class="style-text-validation" id="msj_err_sectores"><?=form_error('categorias', '','');?></span>
					</div>

					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-cubes iconos-font"></i>
						</span>
						<input id="prod_prin" name="prod1"  value="<?php echo set_value('prod1'); ?>"
						class="input-style" type="text" placeholder="Productos principales(separados por comas)"
						onchange="JavaScript:verificar(this);"
						onclick="JavaScript:limpiar(this)" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri"
						style="padding-right: 26px !important;">
						<i id='err_prod1'>								
							<?php if(form_error('prod1', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						   	</i>
						</span>
						<span class="input-group-addon new-input-group" style="display: none;">
							<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
						</span>
					</div>

					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-truck iconos-font"></i>
						</span>
						<input id="prod_int" name="prod_int4"  value="<?php echo set_value('prod_int4'); ?>" onchange="JavaScript:verificar(this);"
						class="input-style" type="text" placeholder="Productos requeridos(separados por comas)">
						<span class="input-group-addon new-input-group margen-input-veri"
						style="padding-right: 26px !important;">
							<i id='err_prod_int4'>
								<?php if(form_error('prod_int4', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						   	</i>
						</span>
						<span class="input-group-addon new-input-group" style="display: none;">
							<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
						</span>
					</div>
					<div class="">
						<div class="button raised blue container-logotipo alineacion-inlineblock"
						onclick="JavaScript:document.getElementById('btn_archivos').click();">
							<div class="center" fit style="font-size: 17px;margin-top: 8px;">
							<span class="glyphicon glyphicon-picture ico_pitu"></span>
							<span class="tex_subi">Subir Logotipo de Empresa</span>
							 	<div style="display:none">
								    <input type="file" id="btn_archivos" name="logo" style="display:none"
							       onchange="JavaScript:load_new_logo()">
							  	</div>
							</div>
							<!--<paper-ripple fit></paper-ripple>-->
						</div>
						<div>
							<div class="alineacion-inlineblock style-default">
		 						<p style="line-height: 1;margin-top: 2px;">
		 							<img  id="logo" alt="Solo se permiten imagenes de en formato JPG y PNG" style="display:none; max-width:70px; max-height:50px" src="<?=base_url()?>uploads/default.jpg">
		 							<i id='err_logo' class="style-text-validation" style="display:none">
										<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>
										<br>
										Solo se permiten imagenes de en formato JPG y PNG
										<br>
									</i>
							<!--<div id="txt_alt">Subir logo<br>de empresa</div>-->
		 							<!-- <img  id="logo" style="max-width:70px; max-height:50px" src="<?=base_url()?>assets/img/administrar_productos/icono_prod_publicados.png"> -->
		 						</p>
		 						<a href="JavaScript:delete_logo();" id="eliminar_img" style="display:none" class="btn btn-danger">Eliminar Imagen</a>
		 					</div>
	 					</div>
					</div>
					
					<div class="group col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:15px;"> 
						<label class="label-radiosbutton" style="font-size: 13px;">Que va hacer en proveedor?</label>
					</div>
					<div class="group ">
						<div class='style-radiobutton'>
							<input type='radio' name='rol'>
							<label class="label-radiosbutton" style="font-size: 13px;" for="comprar">Comprar</label>
						</div>
						<div class='style-radiobutton'>
							<input type='radio' name='rol'>
							<label class="label-radiosbutton" style="font-size: 13px;" for="comprar">Vender</label>
						</div>
						<div class='style-radiobutton'>
							<input type='radio' name='rol' checked>
							<label class="label-radiosbutton" style="font-size: 13px;" for="comprar">Ambas</label>
						</div>
					</div>
					<div class="group " style="margin-top: 12px;">
						<input type='checkbox' name='radio' id='radio' value="" onclick="JavaScript:verificar(this);this.value=1" ondblclick="necessary">
						<label class="label-radiosbutton" style="font-size: 13px;"s for="comprar">Acepto los Terminos y Condiciones de uso</label>
						<span class="glyphicon glyphicon-asterisk left-aste-acepto"></span>
						<span class="input-group-addon new-input-group margen-input-veri"
						style="padding-right: 26px !important; display:none">
							<i id='err_radio'>
								<?php if(form_error('radio', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						   	</i>
						</span>
						<div style="display:none">
					</div>
						<span class="input-group-addon new-input-group" style="display: none;">
							<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
						</span>
					</div>
						<!-- Campo De Validación -->
					<div class="input-group" style="margin: 0;display: none;" id="parent_msj_err_radio">
						<span class="input-group-addon new-input-group" style="color: transparent;">
							<span class="glyphicon glyphicon-user iconos-gly"></span>
						</span>
						<span class="style-text-validation" id="msj_err_radio"><?=form_error('radio', '','');?></span>
					</div>
					<div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 style-pasos3">
						<p for="pasos">Paso 3 de 3</p>
					</div>
	            	<div class="group">
	                	<input type="button" value="Listo!" onclick="JavaScript:validar(3,0);"  class="center-block boton_enviar">
	              	</div> 					 
	        	</div>
        	</div>
        	<!-- Google Code for registro empresa Conversion Page -->
			<script type="text/javascript">
			/* <![CDATA[ */
			var google_conversion_id = 959040203;
			var google_conversion_language = "en";
			var google_conversion_format = "3";
			var google_conversion_color = "ffffff";
			var google_conversion_label = "kcfaCP73t1oQy5WnyQM";
			var google_remarketing_only = false;
			/* ]]> */
			</script>
			<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
			</script>
			<noscript>
			<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/959040203/?label=kcfaCP73t1oQy5WnyQM&amp;guid=ON&amp;script=0"/>
			</div>
			</noscript>
        </form>
</div>
<!--paso3-->

<!--categorias paso3-->
<div id="content_categorias" style="display:none">
	<ul style="z-index: 1;">
	<div class="button raised orange " onclick="JavaScript:ocultar_categorias()">
			<<< Regresar
	</div>
	   	<?php foreach ($categorias as $row): ?> 
			<li class="lista_categoria">
	       		<input class="checkbox_categoria" onclick="JavaScript:marcar_categoria(this.value)" type="checkbox" value="<?=$row->id_categoria?>" id="<?=$row->id_categoria?>" style="float:left;margin-right:6px;"/>
	       		<!--<input class="checkbox_categoria" onclick="JavaScript:marcar_categoria(this.value)" type="checkbox" value="<?=$row->nombre_categoria; ?>" style="float:left;margin-right:6px;"/>-->
		   			<span class="titulo_categoria"><?=$row->nombre_categoria; ?></span>
	   		</li>
		<?php endforeach; ?>
	<div class="button raised orange " onclick="JavaScript:ocultar_categorias()">
			<<< Regresar
	</div>
	</ul>
</div>  


    </div> 
</div>
<SCRIPT TYPE="text/javascript">
window.onload=fun();
function fun()
{
	document.getElementById('popup_launch').click();
}
</script>