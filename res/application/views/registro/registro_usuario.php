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
				<form action="<?=base_url()?>registro/registrar/1" method="post" accept-charset="utf-8">                
				<div class="modal-body text-center popup_central">
            		<p class="style-p">Información de Usuario</p>
            			<div class="input-group ">
			                <span class="input-group-addon new-input-group">
			                  <span class="glyphicon glyphicon-user iconos-gly"></span>
			                </span>
			                <input name="usuario" value="<?php echo set_value('usuario'); ?>" 
							onchange="JavaScript:verificar_attime(this);verificar_largo(this,5);"
							onclick="JavaScript:limpiar(this);"
							class="input-style" placeholder="Nombre de usuario" required type="text"
							rel='tooltip' data-placement='right'>
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
							class="input-style" placeholder="Email" required type="email"
							rel='tooltip' data-placement='right'>
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
					onchange="JavaScript:verificar_igualdad(document.getElementById('password2'),this);verificar_largo(this,6)" class="input-style" 
					placeholder="Contraseña" required type="password" rel='tooltip' 
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
				  	onclick="JavaScript:limpiar(this);"
				  	onchange="JavaScript:verificar_igualdad(this,document.getElementById('password'))"
				  	class="input-style" placeholder="Confirmar Contraseña" required type="password" 
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
                	<button type="submit" class="btn center-block boton_enviar">
                		Siguiente
                	</button>
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
</script>32;Contraseña: 
								</td>
								<td> 
									<input type="password" name="password" size="40" value="<?php echo set_value('password'); ?>" style="float: left;">
									<?php /* echo form_error('password', '<div class="error">', '</div>'); */ ?>
									<?php echo form_error('password', '<span class="tooltip_perso">', '</span>'); ?>
								</td>
							</tr>
							<tr>
								<td align="right" style="font-size: 12px;">
									<font color=red>*</font>&#32;Confirma la contraseña: 
								</td>
								<td>
									<input type="password" name="password2" size="40" value="<?php echo set_value('password2'); ?>" style="float: left;">
									<?php /* echo form_error('password2', '<div class="error" id="pass2">', '</div>'); */ ?>
									<?php echo form_error('password2', '<span class="tooltip_perso">', '</span>'); ?>
								</td>
							</tr>
							<tr>
								<td align="right" style="font-size: 12px;">
									<font color=red>*</font>&#32;¿Qué vas hacer?
								</td>
								<td id="btnspace" style="font-size: 13px; word-spacing: 5px;">
									<div style="margin-right: 24px; float: left;">
										<input type="radio" name="radio" value="Comprador">&#32;Comprar
									</div>
									<div style="margin-right: 24px; float: left;">
										<input type="radio" name="radio" value="Vendedor">&#32;Vender
									</div>
									<div style="margin-right: 24px; float: left;">
										<input type="radio" name="radio" value="Ambos">&#32;Ambos
									</div>
									<?php /* echo form_error('radio', '<div class="error" style="margin-left: 276px;">', '</div>'); */ ?>
									<?php echo form_error('radio', '<span class="tooltip_perso" style="margin-left: 15px;">', '</span>'); ?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<tr>
										<td> </td>
										<td align="center" style="padding-right: 70px;">
											<button class="button button-flat-primary" type="submit"
												style="height: 45px; width: 245px; font-size: 22px; 
													font-family: 'Arial Rounded MT Bold', Arial, sans-serif;">
												Continuar </button>
										</td>
									</tr>
								</td>
							</tr>
						</table>
						<?= form_close() ?>
					</div><!--Fin md6-->

					<!-- el resto / aside derecho -->
					<div class="col-md-3 texto">
						<div id="left1" style="border: none;">
							<p style="font-size: 17px; font-family: 'Arial Rounded MT Bold', Arial, sans-serif; font-weight: normal;"> 
								¿Ya estás registrado? </p>
							<button class="button button-flat" type="button" onclick="$(location).attr('href','<?=base_url()?>logueo');" 
								style="width: 113px; height: 36px; font-size: 16px; color: #00a2e8; 
								font-family: 'Arial Rounded MT Bold', Arial, sans-serif; font-weight:normal;" id="ingresar"> 
								Ingresar </button>
						</div>
						<!-- <div id="left2">
							<p>Beneficios de proveedor.com.co</p>
							<ul>
								<li><img src="<?php echo img_url() ?>obj1.png" width="65" height="45"><p>Incremente sus ventas!</p></li>
								<li><img src="<?php echo img_url() ?>obj2.png" width="65" height="45"><p>Chat online!</p></li>
								<li><img src="<?php echo img_url() ?>obj3.png" width="65" height="45"><p>Catalogo de productos!</p></li>
							</ul>
						</div> -->
					</div>
					<center><img src="<?=base_url()?>img/register-copy.png"></center>       
					<div id="cuatrolinks"> 
				</div><!--Fin Row-->		
			</div><!--Fin page-header-->

			<!-- el footer -->
			<footer>
				<div class="row" style="background: white;">
					<!-- <div class="col-md-4"> a </div>
					<div class="col-md-4"> b </div>
					<div class="col-md-4"> c </div> -->
					
					<!--            
						<a href="#"><img src="<?php echo img_url() ?>12.png" style="margin-left: -21px; margin-top: 4px;"></a>
						<a href="#"><img src="<?php echo img_url() ?>22.png" style="margin-left: 28px; margin-top: 4px;"></a>
						<a href="#"><img src="<?php echo img_url() ?>32.png" style="margin-top: 4px; margin-left: 20px;"></a>
						<a href="#"><img src="<?php echo img_url() ?>42.png" style="margin-top: 4px; margin-left: 37px;"></a>
					-->
					</div>
					<!--
						<div id="publi_publi">
							<a href="#"> <img src="<?php echo img_url() ?>publi.png" /> </a>
						</div>
					-->
				</div>
			</footer>
		</div><!--Fin container-->