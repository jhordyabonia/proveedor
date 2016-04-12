<a data-toggle="modal" id="popup_launch" name="popup_launch" data-target="#popup-registro" class="enlace_registro cursor-mano" hhref="JavaScript:;">
	</a>
<link rel="stylesheet" href="<?=base_url()?>assets/css/popup_registro.css">
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
							onchange="JavaScript:verificar_attime(this);verificar_largo(this,6)"
							class="input-style" placeholder="Nombre de usuario" required type="text"
							title="<?=form_error('usuario', '','')?>" rel='tooltip' data-placement='right'>
							<!-- <span class="bar"></span> -->
			                <span class="input-group-addon new-input-group">
			                  <i id='err_usuario'>
										<?php if(form_error('usuario', '','')!='')
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
								<i class="fa fa-at scale-icon"></i>
							</span>
							<input name="email" value="<?php echo set_value('email'); ?>" 
							onchange="JavaScript:verificar_attime(this);verificar_largo(this,6)"
							class="input-style" placeholder="Email" required type="email"
							title="<?=form_error('email', '','')?>" rel='tooltip' data-placement='right'>
							<span class="input-group-addon new-input-group">
								<i id='err_usuario'>
								<?php if(form_error('email', '','')!='')
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
						<span class="glyphicon glyphicon-asterisk iconos-gly"></span>
					</span>
					<input id="password" name="password"  value="<?php echo set_value('password'); ?>" 
					onchange="JavaScript:verificar_largo(this,6)" class="input-style" 
					placeholder="Contraseña" required type="password" title="<?=form_error('password', '','')?>" rel='tooltip' 
					data-placement='right'>	
					<span class="input-group-addon new-input-group">
						<i id="err_password">
					  	<?php if(form_error('password', '','')!='')
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
						<span class="glyphicon glyphicon-asterisk iconos-gly"></span>
					</span>
				  	<input name="password2"  value="<?php echo set_value('password2'); ?>" 
				  	onchange="JavaScript:verificar_igualdad(this,document.getElementById('password'))"
				  	class="input-style" placeholder="Confirmar Contraseña" required type="password" title="<?=form_error('password', '','')?>" 
				  	rel='tooltip' data-placement='right'>
				  	<span class="input-group-addon new-input-group">
				   	<i id="err_password2">
				  	<?php if(form_error('password2', '','')!='')
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
                <div class="style-pasos margin-top-registro">
                	<p class="text-pasos">Paso 1 de 3</p>
                </div>
				<div class="col-md-12">
                	<button type="submit" class="btn btn-default center-block boton_enviar">
                		Siguiente
                	</button>
              	</div> 
          </div>
      </form>
        </div>
    </div>  
</div>
<script type="text/javascript">
window.onload=fun();
function fun()
{
document.getElementById('popup_launch').click();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("[rel=tooltip]").tooltip({ placement: 'right'});
});
</script>