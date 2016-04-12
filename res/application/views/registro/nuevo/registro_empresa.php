<a data-toggle="modal" id='popup_launch' data-target="#popup-registro" class="enlace_registro cursor-mano" hhref="JavaScript:;">
											</a>
										
<link rel="stylesheet" href="<?=base_url()?>assets/css/popup_registro.css">
    <div class="registro">
        <div class="modal fade" id="popup-registro" tabindex="-1" role="dialog" aria-hidden="true" >
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
		          <?= form_open_multipart('registro/registrar/3/'.$this->uri->segment(4)) ?> 
				<div class="modal-body text-center popup_central_paso3">
					<p class="style-p">Información de la Empresa</p>
					<div class="input-group">
			                <span class="input-group-addon new-input-group">
			                	<i class="fa fa-building-o iconos-font"></i>
			                </span>
			                <input name="nombre_empresa" value="<?php echo set_value('nombre_empresa'); ?>" 
							onchange="JavaScript:verificar_attime(this);verificar_largo(this,6)"
							class="input-style" placeholder="Nombre de la empresa" required type="text"
							title="<?=form_error('nombre_empresa', '','')?>" rel='tooltip' data-placement='right'>
							<!-- <span class="bar"></span> -->
			                <span class="input-group-addon new-input-group">
			                  	<i id='err_usuario'>
									<?php if(form_error('nombre_empresa', '','')!='')
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
					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-newspaper-o iconos-font"></i>
			            </span>
						<input name="nit"  value="<?php echo set_value('nit'); ?>" onchange="JavaScript:verificar_attime(this);"
						class="input-style" type="text" placeholder="Nit de la empresa / CC del comerciante" required
						title="<?=form_error('nit', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group">
							<i id='err_nit'>
								<?php if(form_error('nit', '','')!='')
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
					<div class="input-group">
						<span class="input-group-addon new-input-group">
							<span class="glyphicon glyphicon-tags iconos-font"></span>
			            </span> 
						<select name="tipo"  value="<?php echo set_value('tipo'); ?>"
							class="input-style font-text" id="select" required title="<?=form_error('tipo', '','')?>" 
							rel='tooltip' data-placement='right'>
						<option value="0">Tipo de empresa</option>
						<?php foreach ($lista as $item) : ?>
							<option value="<?= $item->id_tipoempresa ?>" <?php echo set_select('tipo', $item->id_tipoempresa); ?> ><?= $item->tipo ?>
							</option>
						<?php endforeach; ?>
						</select>
						 <?php echo form_error('tipo', '', '<span class="glyphicon glyphicon-ok-sign boton-verificar-ok">'); ?>
							<span class="input-group-addon new-input-group">
							<?php if(form_error('tipo', '','')!='')
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
							<i class="fa fa-file-text iconos-font"></i>
			            </span>
						<textarea name="descripcion" rows="3" cols="50" value="<?php echo set_value('descripcion'); ?>"
						class="input-style" type="textarea" placeholder="Descripcion de la empresa" required
						title="<?=form_error('descripcion', '','')?>"  rel='tooltip' data-placement='right'></textarea>
						<span class="input-group-addon new-input-group">
							<?php if(form_error('descripcion', '','')!='')
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
							<i class="fa fa-list-ul iconos-font"></i>
			            </span>
						<select name="categorias"  value="<?=set_value('categorias'); ?>"
							class="input-style font-text" id="select" required title="<?=form_error('categorias', '','')?>" 
							rel='tooltip' data-placement='right'>
							<option value="38">Sector de la empresa</option>
							<?php foreach ($categorias as $row): ?> 
							<option value="<?=$row->id_categoria?>" <?=set_select('categorias', $row->id_categoria); ?> ><?=$row->nombre_categoria; ?></option>
							<?php endforeach; ?>
						</select>
						<span class="input-group-addon new-input-group">
							<?php if(form_error('categorias', '','')!='')
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
							<i class="fa fa-cubes iconos-font"></i>
						</span>
						<input name="prod1"  value="<?php echo set_value('prod1'); ?>"
						class="input-style" type="text" placeholder="Productos principales(separados por comas)"
						title="<?=form_error('prod1', '','')?>" rel='tooltip' data-placement='right'>
						<span class="input-group-addon new-input-group">
							<?php if(form_error('prod1', '','')!='')
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
							<i class="fa fa-truck iconos-font"></i>
						</span>
						<input name="prod_int4"  value="<?php echo set_value('prod_int4'); ?>"
						class="input-style" type="text" placeholder="Productos requeridos(separados por comas)">
						<span class="input-group-addon new-input-group">
							<?php if(form_error('prod_int4', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						</span>
						<span class="input-group-addon new-input-group">
							<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
						</span>
					</div>
					<div class="group">
						<div class="button raised blue container-logotipo alineacion-inlineblock">
							<div class="center" onclick="JavaScript:document.getElementById('btn_archivos').click();" fit>Subir Logotipo
							   <div style="display:none">
								    <input type="file" class="filestyle upload center" fit id="btn_archivos" name="userfiles[]" multiple 
							      data-size="lg" data-input="false" data-icon="false"
							      data-buttonText="Modificar Logotipo" data-badge="false" onchange="JavaScript:load_new_logo()">

							         <script type="text/javascript">
							            function load_new_logo()
							            {
							             var paths = document.getElementById('btn_archivos').files;
							             var navegador = window.URL || window.webkitURL;
							             url = navegador.createObjectURL(paths[0]);
							             console.log(url);
							             document.getElementById('logo').src=url;             
							            }
							          </script>
							  </div>
							</div>
							<paper-ripple fit></paper-ripple>
						</div>
						<div class="alineacion-inlineblock">
	 						<img id="logo" class="center-block logo_empresa" style="margin-top: 10px;" height="50px" src="<?=base_url()?>uploads/resize/logos/default.jpg" alt="Logo Empresa">
	 					</div>
					</div>
					<div class="group"> 
						<label class="label-radiosbutton">Que va hacer en proveedor?</label>
					</div>
					<div class="group">
						<div class='style-radiobutton'>
							<input type='radio' id='input5' name='rol' checked>
							<label class="label-radiosbutton" for="comprar">Comprar</label>
						</div>
						<div class='style-radiobutton'>
							<input type='radio' id='input5' name='rol' checked>
							<label class="label-radiosbutton" for="comprar">Vender</label>
						</div>
						<div class='style-radiobutton'>
							<input type='radio' id='input5' name='rol' checked>
							<label class="label-radiosbutton" for="comprar">Ambas</label>
						</div>
					</div>
					<div class="group">
						<input type='checkbox' id='input5' name='radio' required>
						<label class="label-radiosbutton" for="comprar">Acepto los Terminos y Condiciones de uso</label>
						<span class="glyphicon glyphicon-asterisk left-aste-acepto"></span>
					</div>
					<div class="style-pasos3">
						<p for="pasos">Paso 3 de 3</p>
					</div>
	            	<div class="group">
	                	<button type="submit" class="btn btn-default center-block boton_enviar">Listo!</button>
	              	</div> 
	            
	        <?= form_close() ?>
	        </div>
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