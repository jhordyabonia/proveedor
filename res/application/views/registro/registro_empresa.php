<a data-toggle="modal" id='popup_launch' data-target="#popup-registro" class="enlace_registro cursor-mano" hhref="JavaScript:;">
											</a>
										
<!---->
    <div class="registro">
        <div class="modal fade" id="popup-registro" tabindex="-1" role="dialog" aria-hidden="true" >
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
		          <?= form_open_multipart('registro/registrar/3/'.$this->uri->segment(4)) ?> 
				<div class="modal-body text-center popup_central_paso3" id="content_paso3">
					<p class="style-p">Información de la Empresa</p>
					<div class="input-group">
			                <span class="input-group-addon new-input-group">
			                	<i class="fa fa-building-o iconos-font"></i>
			                </span>
			                <input id="name" name="nombre_empresa" value="<?php echo set_value('nombre_empresa'); ?>" 
							onchange="JavaScript:verificar_largo(this,6)" onclick="JavaScript:limpiar(this)"
							class="input-style" placeholder="Nombre de la empresa" required type="text"
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
						<input id="nit" name="nit"  value="<?php echo set_value('nit'); ?>" onclick="JavaScript:limpiar(this)" onchange="JavaScript:verificar_attime(this);"
						class="input-style" type="text" placeholder="Nit de la empresa / CC del comerciante" required pattern="[0-9._-]+"
						title="El Nit solo debe contener caracteres numéricos y/o los caracteres '-,_' " rel='tooltip' data-placement='right'>
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
						<select id="tipo_empresa" name="tipo"  value="<?php echo set_value('tipo'); ?>"
							class="input-style font-text" id="select" required onclick="JavaScript:limpiar(this)" 
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
						class="input-style" type="textarea" placeholder="Descripcion de la empresa" required
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

					<!-- <div class="input-group"> 
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
						<span class="input-group-addon new-input-group margen-input-veri">
							<?php if(form_error('categorias', '','')!='')
							   	{
							   		echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
							   	}
						   	 ?>
						</span>
						<span class="input-group-addon new-input-group margen-input-aste">
							<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
						</span>
					</div> -->
					<!-- Segundo Select con checkbox de prueba -->
					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-cubes iconos-font"></i>
						</span>
						<input id="sectores" class="input-style" type="text" placeholder="Selecciona los sectores (Maximo 5)"
						onclick="JavaScript:mostrar_categorias()" rel='tooltip' data-placement='right' required>
						<span class="input-group-addon new-input-group margen-input-veri"
						style="padding-right: 26px !important;">
							<a href="JavaScript:mostrar_categorias()">								
								<span class="glyphicon glyphicon-chevron-down"></span>
								<!--
								<ul class="list-inline">
					                <li><i class="fa fa-list-ul" id="fuente_menu"></i></li>
					                <li><span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="icono_flechita"></span></li>
				             	</ul>
				             	-->
							</a>

						</span>
						<span class="input-group-addon new-input-group" style="display: none;">
							<span class="glyphicon glyphicon-asterisk style-icon-aste"></span>
						</span>
					</div>
					<div class="input-group"> 
						<span class="input-group-addon new-input-group">
							<i class="fa fa-cubes iconos-font"></i>
						</span>
						<input id="prod_prin" name="prod1"  value="<?php echo set_value('prod1'); ?>"
						class="input-style" type="text" placeholder="Productos principales(separados por comas)"
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
						<input id="prod_int" name="prod_int4"  value="<?php echo set_value('prod_int4'); ?>" 
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
		 							<img  id="logo" style="display:none; max-width:70px; max-height:50px" src="<?=base_url()?>uploads/default.jpg">
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
						<input type='checkbox' name='radio' required>
						<label class="label-radiosbutton" style="font-size: 13px;"s for="comprar">Acepto los Terminos y Condiciones de uso</label>
						<span class="glyphicon glyphicon-asterisk left-aste-acepto"></span>
					</div>
					<div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 style-pasos3">
						<p for="pasos">Paso 3 de 3</p>
					</div>
	            	<div class="group">
	                	<button type="submit" class="btn center-block boton_enviar">Listo!</button>
	              	</div> 					 
	        	</div>
        	<?= form_close() ?>
        </div>
    </div> 


</div>

<div id="content_categorias" style="display:none">
	<ul style="z-index: 1;">
	<div class="button raised orange " onclick="JavaScript:ocultar_categorias()">
			<<< Regresar
	</div>
	   	<?php foreach ($categorias as $row): ?> 
			<li class="lista_categoria">
	       		<input class="checkbox_categoria" onclick="JavaScript:marcar_categoria(this.value)" type="checkbox" value="<?=$row->id_categoria?>" style="float:left;margin-right:6px;"/>
	       		<!--<input class="checkbox_categoria" onclick="JavaScript:marcar_categoria(this.value)" type="checkbox" value="<?=$row->nombre_categoria; ?>" style="float:left;margin-right:6px;"/>-->
		   			<span class="titulo_categoria"><?=$row->nombre_categoria; ?></span>
	   		</li>
		<?php endforeach; ?>
	<div class="button raised orange " onclick="JavaScript:ocultar_categorias()">
			<<< Regresar
	</div>
	</ul>
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
    $("[rel=tooltip]").tooltip({ placement: 'right'}).style.display="block;";
});
$('tooltip').attr({
   'style': 'display: block'
});
</script>

<script type="text/javascript">
$(".select_box dt select").on('click', function () {
          $(".select_box dd ul").slideToggle('fast');
      });

      $(".select_box dd ul li select").on('click', function () {
          $(".select_box dd ul").hide();
      });

      function getSelectedValue(id) {
           return $("#" + id).find("dt select option.value").html();
      }

      $(document).bind('click', function (e) {
          var $clicked = $(e.target);
          if (!$clicked.parents().hasClass("select_box")) $(".select_box dd ul").hide();
      });


      $('.mutliSelect input[type="checkbox"]').on('click', function () {
        
          var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
              title = $(this).val() + "  ";
        
          if ($(this).is(':checked')) {
              var html = '<span title="' + title + '">' + title + '</span>';
              $('.multiSel').append(html);
              $(".hida").hide();
          } 
          else {
              $('span[title="' + title + '"]').remove();
              var ret = $(".hida");
              $('.select_box dt select').append(ret);
              
          }
      });
</script>