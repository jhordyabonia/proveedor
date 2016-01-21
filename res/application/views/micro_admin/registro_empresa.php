<link rel="stylesheet" href="<?=base_url()?>assets/css/popup_registro.css">
<center>
<br>
<br>
<br>
<br>
<br>
<h2>Registro Rapído</h2>
<br>
<?= form_open_multipart('micro_admin/registrar_empresa/1'); ?>
    <table cellspading="2">
    	<tr><th>Categoria:
    		<tr><td><div class="input-group">
						<select name="categoria" class="input-style font-text" id="select" >
		    				<?php foreach ($categorias as $categoria):?>
		    					<option value="<?=$categoria->id_categoria?>"><?=$categoria->nombre_categoria?></option>
		    				<?php endforeach;?>
		    			</select>    	
							<span class="input-group-addon new-input-group margen-input-aste">
								<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
							</span>
    	<tr><th>Email:<tr><td><div class="input-group">
							<input size="36" name="email" value="<?php echo set_value('email'); ?>" 
							onchange="JavaScript:verificar_formato(this);verificar_attime(this);verificar_caracteres(this,'[SPACE] # % , : ; ? / \ <>');" onclick="JavaScript:limpiar(this);"
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

    	<tr><th>Nombre Contacto:<tr><td><div class="input-group">
						<input name="nombre" size="36"  value="<?php echo set_value('nombre'); ?>"
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

    	<tr><th>Teléfono:<tr><td><div class="input-group"> 
						<input name="fijo" size="36" value="<?php echo set_value('fijo'); ?>" onchange="JavaScript:verificar(this);"
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
				   	    <span class="input-group-addon new-input-group ">
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

					
    	<tr><th>Nombre Empresa:<tr><td><div class="input-group">
			                 <input id="name" name="nombre_empresa" size="36" value="<?php echo set_value('nombre_empresa'); ?>" 
							onchange="JavaScript:verificar_largo(this,6);verificar_caracteres(this,'[SYM].:')" onclick="JavaScript:limpiar(this)"
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

    	<tr><th>Departamento:<tr><td><input type="hidden" value="52" id="pais" name="pais">
					<div class="input-group" id="ubicacion"> 	
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
    	<tr><th>Ciudad:<tr><td><div class="input-group" style="display:none;"  id="ubicacion2"> 
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


    </table>
    <br>
    <br>
    		<input type="submit" value="Registar" required>
<?= form_close() ?>
</center>
<script type="text/javascript">
window.load=cambio_pais();
</script>