				<a data-toggle="modal" id='popup_launch' data-target="#popup-registro" class="enlace_registro cursor-mano" hhref="JavaScript:;">
												
											</a>
	<div class="registro">
        <div class="modal fade" id="popup-registro" tabindex="-1" role="dialog" aria-hidden="false" >
		      <div class="modal-dialog modal-dialog-registro" style="padding-left: 15px;padding-right: 15px;">
		          <div class="modal-header encabezado">
		            <button type="button" class="close" data-dismiss="modal" >
                  <span aria-hidden="true">
		                <span class="fa fa-times cerrar" aria-hidden="true"></span>
                  </span>
		                <span class="sr-only">Cerrar</span>
		              </button>
		            <h4 class="modal-title text-center titulo_popup">
		            	<span class="glyphicon glyphicon-pencil" style="font-size: 24px;left: -1px;"></span> 
		            	Registrar Empresa
		            </h4>
		          </div>
		      <?= form_open("/registro/registrar/2/".$id_registro);?>
				<div class="modal-body text-center popup_central_paso2">
					<p class="style-p">Información de Contacto</p>
					<div class="input-group">
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-user iconos-gly"></span>
		                </span>
						<input name="nombre"  value="<?php echo set_value('nombre'); ?>"
						class="input-style" type="text" placeholder="Nombre y Apellido" required
						title="<?=form_error('nombre', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri">
							<?php if(form_error('nombre', '','')!='')
							{
								echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							}
							?>
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
						class="input-style" type="text" placeholder="Cargo/Función en la empresa" required
						style="width: 101%;" title="<?=form_error('cargo', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri">
							<?php if(form_error('cargo', '','')!='')
							{
								echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							}
							?>
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
						class="input-style" type="text" placeholder="Dirección de la empresa" required
						title="<?=form_error('direccion', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri">
							<?php if(form_error('direccion', '','')!='')
							{
								echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							}
							?>
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
						onchange="JavaScript:cambio_pais();" onload="JavaScript:cambio_pais();"
						class="input-style font-text" id="select" required title="<?=form_error('pais', '','')?>" 
						rel='tooltip' data-placement='right'>
							<option value="0">Selecciona tu pais</option>
							<option value="52">Colombia</option>
							<option value="0"></option>
							<option value="0">------------------------------------------</option>
							<option value="0">SELECCIONAR OTRO PAÍS </option>
							<option value="0"></option>
					        	<?php  foreach($paises as $pais)  {   ?>
					         	<option value="<?=$pais -> id ?>" 
					         		<?php echo set_select('pais',  $pais -> id ); ?> ><?=$pais -> nombre ?></option>
					        	<?php  } ?>   
						</select>
						<span class="input-group-addon new-input-group margen-input-veri">
							<?php if(form_error('pais', '','')!='')
							{
								echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							}
							?>
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
						value="<?=set_value('provincia'); ?>" onchange="JavaScript:cambio_departamento(this.value);"
						class="input-style font-text" id="select" required  rel='tooltip' 
						data-placement='right'>
							<option value="33">Selecciona tu departamento</option>
								<option value="33"></option>
						        	<?php  foreach($dept as $departamento):  ?>
						         	<option value="<?=$departamento->id_departamento?>" 
						         		<?php echo set_select('provincia',  $departamento->id_departamento ); ?> ><?=$departamento->nombre ?></option>
						        	<?php  endforeach; ?>   
						</select>	
						<span class="input-group-addon new-input-group margen-input-veri">
							<?php if(form_error('provincia', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste">
		                  <span id="required_provincia" style="display:none" class="glyphicon glyphicon-asterisk style-icon-aste"></span>
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
						class="input-style font-text" required  rel='tooltip' 
						data-placement='right'>
							<option value="1113">Selecciona tu municipio</option>
											<option value="1113"></option>
									        	<?php  foreach($municipios as $municipio)  {   ?>
									         	<option value="<?=$municipio->id_municipio ?>" 
									         		<?php echo set_select('municipio',  $municipio->id_municipio ); ?> ><?=$municipio->nombre_municipio ?></option>
									        	<?php  } ?>   
						</select>	
						<span class="input-group-addon new-input-group margen-input-veri">									
							<?php if(form_error('municipio', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste">
		                  <span id="required_municipio" style="display:none" class="glyphicon glyphicon-asterisk style-icon-aste"></span>
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
						onchange="JavaScript:verificar_largo(this,10)" onclick="JavaScript:limpiar(this);"
						class="input-style" class="input-style" type="text" placeholder="Telefono Celular" required
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
						<input name="fijo"  value="<?php echo set_value('fijo'); ?>"
						class="input-style" type="text" placeholder="Telefono Fijo y/o PBX"
						rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri"
						  style="padding-right: 26px !important;">
							<?php if(form_error('fijo', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
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
						<input name="web"  value="<?php echo set_value('web'); ?>"
						class="input-style" type="text" placeholder="Pagina Web" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group margen-input-veri"
						style="padding-right: 26px !important;">
							<?php if(form_error('web', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
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
                	<button type="submit" class="btn center-block boton_enviar">Siguiente</button>
              	</div> 
              </div>
 <?= form_close() ?>
        </div>
    </div>  
</div>

<SCRIPT TYPE="text/javascript">
window.onload=fun();
function fun()
{
	document.getElementById('popup_launch').click();
}
</SCRIPT>
<script type="text/javascript">
$(document).ready(function(){
    $("[rel=tooltip]").tooltip({ placement: 'right'});
});
</script>