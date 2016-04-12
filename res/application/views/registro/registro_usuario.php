<a data-toggle="modal" id="popup_launch" name="popup_launch" data-target="#popup-registro" class="enlace_registro cursor-mano" href="JavaScript:;">
	</a>
	<div class="registro">
        <div class="modal fade" id="popup-registro" tabindex="-1" role="dialog" aria-hidden="false" style="padding: 0 15px;">
		    <div class="modal-dialog modal-dialog-registro">
		        <div class="modal-header encabezado">
		        	<button type="button" class="close" data-dismiss="modal">
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
				<form action="<?=base_url()?>registro/registrar/1" method="post" accept-charset="utf-8" name="registro">                
				<div class="modal-body text-center popup_central">
            		<p class="style-p">Información de Usuario</p>
            			<div class="input-group ">
			                <span class="input-group-addon new-input-group">
			                  <span class="glyphicon glyphicon-user iconos-gly"></span>
			                </span>
			                <input name="usuario" value="<?php echo set_value('usuario'); ?>" 
							onchange="JavaScript:verificar_attime(this);verificar_largo(this,5);verificar_caracteres(this,'[SYM]');"
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
					
                	<input type="button" value="Siguiente" onclick="JavaScript:validar();" class="btn center-block boton_enviar">
               		
              	</div> 
          </div>
      </form>
        </div>
    </div>
    </div>  
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("[rel=tooltip]").tooltip({ placement: 'right'});
});
</script>