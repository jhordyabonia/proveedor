				<a data-toggle="modal" id='popup_launch' data-target="#popup-registro" class="enlace_registro cursor-mano" hhref="JavaScript:;">
												
											</a>
										
<link rel="stylesheet" href="<?=base_url()?>assets/css/popup_registro.css">
    <div class="registro">
        <div class="modal fade" id="popup-registro" tabindex="-1" role="dialog" aria-hidden="false" >
		      <div class="modal-dialog modal-dialog-registro">
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
						title="<?=form_error('descripcion', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group">
							<?php if(form_error('nombre', '','')!='')
							{
								echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							}
							?>
						</span>
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>
					<div class="input-group">
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-user iconos-gly"></span>
		                </span>
						<input name="cargo"  value="<?php echo set_value('cargo'); ?>"
						class="input-style" type="text" placeholder="Cargo/Función en la empresa" required
						title="<?=form_error('descripcion', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group">
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
					<div class="input-group">
						<span class="input-group-addon new-input-group">
		                  <i class="fa fa-file-text iconos-gly"></i>
		                </span>
						<input name="direccion"  value="<?php echo set_value('direccion'); ?>"
						class="input-style" type="text" placeholder="Dirección de la empresa" required
						title="<?=form_error('direccion', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group">
							<?php if(form_error('direccion', '','')!='')
							{
								echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							}
							?>
						</span>
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
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
						<span class="input-group-addon new-input-group">
							<?php if(form_error('paises', '','')!='')
							{
								echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							}
							?>
						</span>
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>
					<div class="input-group"> 	
						<span class="input-group-addon new-input-group">
							<i class="fa fa-globe iconos-gly"></i>
		                </span>					
						<select  style="display:none" name="provincia" id="provincia" 
						value="<?=set_value('provincia'); ?>" onchange="JavaScript:cambio_departamento(this.value);"
						class="input-style font-text" id="select" required title="<?=form_error('provincia', '','')?>" rel='tooltip' 
						data-placement='right'>
							<option value="33">Selecciona tu departamento</option>
								<option value="33"></option>
						        	<?php  foreach($dept as $departamento):  ?>
						         	<option value="<?=$departamento->id_departamento?>" 
						         		<?php echo set_select('provincia',  $departamento->id_departamento ); ?> ><?=$departamento->nombre ?></option>
						        	<?php  endforeach; ?>   
						</select>	
						<span class="input-group-addon new-input-group">
							<?php if(form_error('provincia', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						</span>
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>
					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-globe iconos-gly"></i>
		                </span>
						<select style="display:none" name="municipio" id="municipio" value="<?=set_value('municipio'); ?>"
						class="input-style font-text" required title="<?=form_error('municipio', '','')?>" rel='tooltip' 
						data-placement='right'>
							<option value="1113">Selecciona tu municipio</option>
											<option value="1113"></option>
									        	<?php  foreach($municipios as $municipio)  {   ?>
									         	<option value="<?=$municipio->id_municipio ?>" 
									         		<?php echo set_select('municipio',  $municipio->id_municipio ); ?> ><?=$municipio->nombre_municipio ?></option>
									        	<?php  } ?>   
						</select>	
						<span class="input-group-addon new-input-group">									
							<?php if(form_error('municipio', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						</span>
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>
					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<span class="glyphicon glyphicon-phone iconos-gly"></span>
		                </span>
						<input name="cel"  value="<?php echo set_value('cel'); ?>"
						class="input-style" type="text" placeholder="Telefono Celular" required
						title="<?=form_error('cel', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group">
							<?php if(form_error('cel', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						</span>
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>
					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-phone iconos-gly"></i>
		                </span>
						<input name="fijo"  value="<?php echo set_value('fijo'); ?>"
						class="input-style" type="text" placeholder="Telefono Fijo y/o PBX" required
						title="<?=form_error('fijo', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group">
							<?php if(form_error('fijo', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						</span>
				   	    <span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>
					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-laptop iconos-gly"></i>
		                </span>
						<input name="web"  value="<?php echo set_value('web'); ?>"
						class="input-style" type="text" placeholder="Pagina Web"
						title="<?=form_error('web', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group">
							<?php if(form_error('web', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						</span>
						<span class="input-group-addon new-input-group">
		                  <span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
		                </span>
					</div>
					<div class="style-pasos margin-top-registro">
						<p class="text-pasos">Paso 2 de 3</p>
					</div> 
				<div class="group">
                	<button type="submit" class="btn btn-default center-block boton_enviar">Siguiente</button>
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