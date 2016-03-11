<link href="<?php echo css_url().'index/formulario_solicitudes.css' ?>" rel="stylesheet">
<script src="<?php echo js_url().'index/bootstrap-select.js' ?>"></script>
<!--
<style type="text/css">

	.iconos-usados {
	    font-size: 16px !important;
	    color: #fff!important;
	}
	textarea.input-style {
	    font-size: 16px!important;
	    border: 1px solid #fff!important;
	}
	div {
	    background-color: #337AB7!important;
	}
	body{
	    background-color: #337AB7!important;
	}textarea {
	    background-color: #337AB7!important;
	    color:white;
	}

	select {
	    background-color: #337AB7!important;
	    color:white;
	}
	input {
	    background-color: #337AB7!important;
	    border: 1px 0 0 0 solid #fff!important;
	    color:white!important;
	}
	select.input-style 
	{
	    border-bottom: 1px solid #fff!important;
	}
	.orange 
	{
	    background-color: #337AB7!important;
	}

</style>-->
<style type="text/css">
	h1
	{
		font-size: 20px;
		font-weight: bold;
		color: black;
		background-color: whitesmoke;
		padding: 12px;
		margin: 0px;
		width: 110%;
	    margin-left: -10px;
	}
	input {font-size: 14px!important;}
	select {font-size: 14px!important;}
	textarea 
	{
		font-size: 14px!important;
		border-bottom: 1px solid #ccc!important;
		border-top: 0 solid #ccc!important;
		border-left: 0 solid #ccc!important;
		border-right: 0 solid #ccc!important;
		outline: medium none;
	}
	.card
	{    margin: 10px auto 20px auto;
    background-color: #FFFFFF;
    width: 100%;
    border-radius: 7px;
    box-shadow: rgb(225,225,225) 0px 5px 0px;
	}
	.boton_menu
	{
		margin-right: 10px!important;
	    margin-top: 10px!important;
	    font-size: 36px!important;
	    color: #EF7204;
	}
	.acciones
	{
		padding: 30px;
		background-color: whitesmoke;
	}
	.top_menu 
	{background-color: #FF7F27;}
	.top_menu .imagen 
	{
	    width: 45%;
	    padding-left: 12px;
	    padding-top: 12px;
	    padding-bottom: 10px;
	    display: inline-block;
	}
	.btn-solicitarAhora {width: 100%!important;background-color: #FF7F27!important;}
</style>

<div class="row">
	<div class="top_menu">    	
		<p class="texto pull-right">
				<i aria-hidden="true" class="fa fa-bars boton_menu"></i>
		</p>
		<img src="<?=base_url()?>assets/img/imagen_empresa/captura1.png" class="imagen">
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-xs-12 col-lg-12">
		<h1>Solicite su cotización gratis!</h1>
	</div>
</div>
<div class="formulario_solicitudes">
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
                document.getElementById('divmostoc').style.display='';
                document.getElementById('captura').style.display='none';
                  
            }
            function ocultar_categorias()
            {
                if(document.getElementById('divmostoc').style.display=='none')
                { ocultar_formulario(); }
                 else
                {
                  document.getElementById('divmostoc').style.display='none';
                  document.getElementById('captura').style.display='';
                }
            }
        </script>

		<div class=" col-md-12 form_solicitudes orange">
			<form class="form-style card" method="post" action="<?=base_url();?>popup/asistentes_proveedor/TRUE" id="form">
				<div class="cont_title_form">
					<!--<p class="texto_form_soli"><?=$datos->texto_head?></p>-->
					<!--<p class="texto2_form_soli"><?=$datos->texto_titulo?></p>-->
				</div>
				<div class="contenido-requerido">
					<!--
	                <span class="glyphicon glyphicon-asterisk style-aste"></span>					
	                <p class="style-requerido">Requerido</p>
	            -->
				</div>
			
          		<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                  <i class="fa fa-list-ul"></i>
	                </span>
			        <select name="categoria" required type="text" class="input-style font-text">
			        	<option value="1" selected>Selecciona la categoria</option>
				        	<?php foreach ($categorias as $key => $value):?>
						     <option value="<?=$value->id_categoria?>"><?=$value->nombre_categoria?></option>
						    <?php endforeach;?>
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
			  <?php if($datos->campos!=str_replace('nombre', "",$datos->campos)):?>
				<div class="input-group ">
	                <span class="input-group-addon transparencia">
	                	<i class="fa fa-cube iconos-usados"></i>
	                </span>
			        <input required type="text" class="input-style" name="solicitud" placeholder="<?=$datos->titulos['nombre']?>">
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
			        <textarea required type="textarea" name="descripcion" class="input-style" placeholder="<?=$datos->titulos['descripción']?>"></textarea>
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
			        <input required type="text" name="nombres" class="input-style" placeholder="<?=$datos->titulos['contacto']?>">
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
			        <input required type="email" name="email" class="input-style" placeholder="<?=$datos->titulos['email']?>">
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
	                 <!-- <i class="fa fa-globe iconos-usados"></i>-->
	                  <i class="fa fa-map-marker iconos-usados"></i>
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
          		
                <SCRIPT TYPE="text/javascript">
	                function menos()
	                {
	                	document.getElementById('mas_info').style.display='none';
	                	document.getElementById('btn_mas_info').innerHTML='<p>Más información <i class="fa fa-chevron-circle-down"></i></p>';
	                	document.getElementById('btn_mas_info').onclick=mas_info;
	                }
	                function mas_info()
	                {
	                	document.getElementById('mas_info').style.display='';
	                	document.getElementById('btn_mas_info').innerHTML='<p>Menos <i class="fa fa-chevron-circle-up"></i></p>';
	                	document.getElementById('btn_mas_info').onclick=menos;
	                }
                </SCRIPT>
	           <input type="submit" id="submit" style="display:none">
			</form>
		</div>		
	</div>
</div>

<div class="row acciones">
   <a class="btn btn-solicitarAhora" href="JavaScript:document.getElementById('submit').click()"> SOLICITAR COTIZACIÓN !</a>
	<h1>LLame ahora</h1>
   <a class="btn btn-solicitarAhora" href="tel:300-618-4848">
    	<i class="fa fa-phone"></i> 300-618-4848 
	</a>
</div>
  <div id="btn_mas_info" onclick="mas_info();">
	                	<p>
	                		Más información 
	                		<i class="fa fa-chevron-circle-down"></i>
	                	</p>
	                </div>
	                   
                <div id="mas_info" style="display:none">
              	 <?=$datos->texto_body?> 
              	</div>