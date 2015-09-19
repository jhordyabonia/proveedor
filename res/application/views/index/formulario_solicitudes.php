<link href="<?php echo css_url().'index/formulario_solicitudes.css' ?>" rel="stylesheet">
<script src="<?php echo js_url().'index/bootstrap-select.js' ?>"></script>

<div class="formulario_solicitudes" >
	<div class="row hidden-xs hidden-sm">
		<div class="col-md-12">
			<div id="launcher" class="boton_solicitudes" onclick="ocultar_categorias();">
				<a class="btn btn-solicitar">
					<i class="fa fa-file-text icono-solicitar" ></i> 
					SOLICITAR COTIZACIÓN 
				</a>
			</div>
		</div>
	</div>
	<div class="row" style="background-color: whitesmoke;" id="captura" >
		<div class="hidden-sm hidden-xs visible-md visible-lg"> 
			<span><i id="mostrarocultar" class="fa fa-chevron-circle-up boton-flotante" onclick="ocultar_formulario()"></i></span>
		</div>

<script type="text/javascript">
ocultar_formulario();

function ocultar_formulario()
{
	document.getElementById('div_subcategorias').style.display='';
	document.getElementById('captura').style.display='none';	
}
function ocultar_categorias()
{
	if(document.getElementById('div_subcategorias').style.display=='none')
	{	ocultar_formulario();	}
	else
	{
		document.getElementById('div_subcategorias').style.display='none';
		document.getElementById('captura').style.display='';
	}	
}
</script>

		<div class=" col-md-12 form_solicitudes">
			<form class="form-style" method="post" action="<?=base_url();?>popup/asistentes_proveedor/TRUE" id="form">
				<div class="cont_title_form">
					<p class="texto_form_soli"><?=$datos->texto_head?></p>
					<p class="texto2_form_soli"><?=$datos->texto_titulo?></p>
				</div>
				<div class="contenido-requerido">
	                <span class="glyphicon glyphicon-asterisk style-aste"></span>					
	                <p class="style-requerido">Requerido</p>
				</div>
			
			  <?php if($datos->campos!=str_replace('nombre', "",$datos->campos)):?>
				<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                	<i class="fa fa-cube iconos-usados"></i>
	                </span>
			        <input type="text" class="input-style" name="solicitud" placeholder="<?=$datos->titulos['nombre']?>">
	                <span class="input-group-addon transparencia style-right">
	                 <!-- <i class="fa fa-check-circle style-icon-vali"></i>--><br>
	                </span>
	                <span class="input-group-addon transparencia">
	                	<!--<span class="glyphicon glyphicon-asterisk style-aste"></span>-->
	                </span>
                </div>
                <!-- Campo De Validación -->
          		<div class="input-group">
	                <p class="style-text-vali"><!--Validación Corresondiente--></p>
          		</div>

			  <?php endif;?>
			  <?php if($datos->campos!=str_replace('descripción', "",$datos->campos)):?>
          		<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                  <i class="fa fa-file-text iconos-usados"></i>
	                </span>
			        <textarea type="textarea" name="descripcion" class="input-style" placeholder="<?=$datos->titulos['descripción']?>"></textarea>
	                <span class="input-group-addon transparencia style-right">
	                 <!-- <i class="fa fa-check-circle style-icon-vali"></i>-->
	                </span>
	                <span class="input-group-addon transparencia">
	                	<!--<span class="glyphicon glyphicon-asterisk style-aste"></span>-->
	                </span>
                </div>
                <!-- Campo De Validación -->
          		<div class="input-group">
	                <p class="style-text-vali"><!--Validación Corresondiente--></p>
          		</div>

			  <?php endif;?>
			  <?php if($datos->campos!=str_replace('contacto', "",$datos->campos)):?>
          		<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                  <i class="fa fa-user iconos-usados"></i>
	                </span>
			        <input type="text" name="nombres" class="input-style" placeholder="<?=$datos->titulos['contacto']?>">
	                <span class="input-group-addon transparencia style-right">
	                  <!--<i class="fa fa-times-circle style-icon-novali"></i>-->
	                </span>
	                <span class="input-group-addon transparencia">
	                	<!--<span class="glyphicon glyphicon-asterisk style-aste"></span>-->
	                </span>
                </div>
                <!-- Campo De Validación -->
          		<div class="input-group">
	                <p class="style-text-vali"><!--Validación Corresondiente--></p>
          		</div>

			  <?php endif;?>
			  <?php if($datos->campos!=str_replace('empresa', "",$datos->campos)):?>
          		<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                  <i class="fa fa-user iconos-usados"></i>
	                </span>
			        <input type="text" name="nombre_empresa" class="input-style" placeholder="<?=$datos->titulos['empresa']?>">
	                <span class="input-group-addon transparencia style-right">
	                  <!--<i class="fa fa-times-circle style-icon-novali"></i>-->
	                </span>
	                <span class="input-group-addon transparencia">
	                	<!--<span class="glyphicon glyphicon-asterisk style-aste"></span>-->
	                </span>
                </div>
                <!-- Campo De Validación -->
          		<div class="input-group">
	                <p class="style-text-vali"><!--Validación Corresondiente--></p>
          		</div>

			  <?php endif;?>
			  <?php if($datos->campos!=str_replace('email', "",$datos->campos)):?>
          		<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                  <i class="fa fa-at iconos-usados"></i>
	                </span>
			        <input type="email" name="email" class="input-style" placeholder="<?=$datos->titulos['email']?>">
	                <span class="input-group-addon transparencia style-right">
	                 <!-- <i class="fa fa-check-circle style-icon-vali"></i>-->
	                </span>
	                <span class="input-group-addon transparencia">
	                	<!--<span class="glyphicon glyphicon-asterisk style-aste"></span>-->
	                </span>
                </div>
                <!-- Campo De Validación -->
          		<div class="input-group">
	                <p class="style-text-vali"><!--Validación Corresondiente--></p>
          		</div>

			  <?php endif;?>
			  <?php if($datos->campos!=str_replace('cantidad', "",$datos->campos)):?>
          		<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                  <i class="fa fa-shopping-cart iconos-usados"></i>
	                </span>
			        <input type="text" class="input-style" name="cantidad_requerida" placeholder="<?=$datos->titulos['cantidad']?>">
	                <span class="input-group-addon transparencia style-right">
	                  <!--<i class="fa fa-times-circle style-icon-novali"></i>-->
	                </span>
	                <span class="input-group-addon transparencia">
	                	<!--<span class="glyphicon glyphicon-asterisk style-aste"></span>-->
	                </span>
                </div>
                <!-- Campo De Validación -->
          		<div class="input-group">
	                <p class="style-text-vali"><!--Validación Corresondiente--></p>
          		</div>			
			  <?php endif;?>
			  <?php if($datos->campos!=str_replace('ciudad', "",$datos->campos)):?>
                 
          		<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                  <i class="fa fa-globe iconos-usados"></i>
	                </span>
			        <input type="text" class="input-style" name="ciudad_entrega" placeholder="<?=$datos->titulos['ciudad']?>">
	                <span class="input-group-addon transparencia style-right">
	                 <!-- <i class="fa fa-check-circle style-icon-vali"></i>-->
	                </span>
	                <span class="input-group-addon transparencia">
	                	<!--<span class="glyphicon glyphicon-asterisk style-aste"></span>--><p></p>
	                </span>
                </div>
                <!-- Campo De Validación -->
          		<div class="input-group">
	                <p class="style-text-vali"><!--Validación Corresondiente--></p>
          		</div>
			  <?php endif;?>
			<?php if($datos->campos!=str_replace('precio', "",$datos->campos)):?>				
          		
          		<div class="input-group ">
	                <span class="input-group-addon transparencia">
						<i class="fa fa-usd iconos-usados"></i>
	                </span>
			        <input name="precio" type="text" class="input-style" placeholder="<?=$datos->titulos['precio']?>">
	                <span class="input-group-addon transparencia style-right">
	                <!--  <i class="fa fa-times-circle style-icon-novali"></i>-->
	                </span>
	                <span class="input-group-addon transparencia">
	                <!--	<span class="glyphicon glyphicon-asterisk style-aste"></span>-->
	                </span>
                </div>
                <!-- Campo De Validación -->
          		<div class="input-group">
	                 <p class="style-text-vali"><!--Validación Corresondiente--></p>
          		</div>

			<?php endif;?>
			<?php if($datos->campos!=str_replace('pago', "",$datos->campos)):?>				
          		
          		<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                  <i class="fa fa-usd iconos-usados"></i>
	                </span>
			        <select name="pago" type="text" class="input-style font-text">
			        	<option value="" selected><?=$datos->titulos['pago']?></option>
			        	<option value="Transferencia bancaria">Transferencia bancaria</option>
			        	<option value="Giros Nacionales">Giros Nacionales</option>
			        	<option value="Cheque">Cheque</option>
			        	<option value="Efectivo">Efectivo</option>
			        	<option value="Contraentrega">Contraentrega</option>
			        	<option value="A convenir">A convenir</option>
			        </select>
	                <span class="input-group-addon transparencia style-right">
	                <!--  <i class="fa fa-check-circle style-icon-vali"></i>-->
	                </span>
	                <span class="input-group-addon transparencia">
	                <!--	<span class="glyphicon glyphicon-asterisk style-aste"></span>-->
	                </span>
                </div>
                <!-- Campo De Validación -->
          		<div class="input-group">
	              <!--  <p class="style-text-vali">Validación Corresondiente</p>-->
          		</div>

			<?php endif;?>
			<?php if($datos->campos!=str_replace('teléfono', "",$datos->campos)):?>				
          		
          		<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                	<i class="fa fa-phone iconos-usados"></i>
	                </span>
			        <input name="telefono" type="text" class="input-style" placeholder="<?=$datos->titulos['teléfono']?>">
	                <span class="input-group-addon transparencia style-right">
	                <!--  <i class="fa fa-times-circle style-icon-novali"></i>-->
	                </span>
	                <span class="input-group-addon transparencia">
	                <!--	<span class="glyphicon glyphicon-asterisk style-aste"></span>-->
	                </span>
                </div>
                <!-- Campo De Validación -->
          		<div class="input-group">
	               <p class="style-text-vali"><!-- Validación Corresondiente--></p>
	              <p class="style-text-vali"><br></p>
          		</div>
				<?php endif;?>
            	<input type="hidden" name="categoria" value="<?=$categoria?>">
          		<div class="col-xs-12 col-sm-12 col-md-12 input-group" style="text-align:center;">
	                <a class="btn btn-solicitarAhora" href="JavaScript:document.getElementById('form').submit()"> SOLICITAR AHORA !</a>
                </div>
              	 <?=$datos->texto_body?> 
				<div class="input-group col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
					<div class="hidden-md visible-xs visible-sm" onclick="JavaScript:ocultar_categorias();">
                		<span><i class="fa fa-chevron-circle-up boton-flotante-mobil"></i></span>
                	</div>
            	</div>
			</form>
		</div>		
	</div>
</div>