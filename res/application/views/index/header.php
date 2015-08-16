<link rel="stylesheet" href="<?=base_url()?>css/960.css">
<link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
<link rel="stylesheet" href="<?=base_url()?>css/reset.css">
<style type="text/css">
	/* estilos barra de arriba */
	#ho {
		background: transparent;
		width: 1369px;
		max-width: 1438px;
		margin-top: 0px;
		margin-left: 0px;
	}

	#hi{
		width: 454px;
		height: 20px;
		background: transparent;
		margin-top: 10px;
		margin-left: 19px;
	}

	#links {
		/*margin-left: 527px;*/
		float: right;
		padding-right: 9em;
	}

	.grid_1{
		margin-top: 20px;
		height: auto;
		width: 225px;
	}

	html, body {
		font-family: Arial;
		font-size: 13px;
		/* desaparece scroll horizontal en IE y otros */
		overflow-x: hidden;
		overflow-y: auto;
	}

	a {
		text-decoration: none;
	}

	#separador {
		/*border-bottom: 1px solid #ddd;*/ 
		margin-top: 4px; 
		width: 100%;
		height: 1.5px;
		background-color: #ddd;
		background-image:-webkit-gradient(linear, left top, right bottom, 
			color-stop(0, #fbfbfb), color-stop(0.1, #e7e7e7), color-stop(0.3, #c6c6c6), 
			color-stop(0.5, #c6c6c6), color-stop(0.8, #c6c6c6), color-stop(1, #c6c6c6));

		background-image:-moz-linear-gradient(left top, #fbfbfb, #c6c6c6);
		background-image:-o-linear-gradient(left top, #fbfbfb, #c6c6c6);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorStr='#fbfbfb', endColorStr='#c6c6c6', GradientType=1);
	}
</style>

<style type="text/css">
	@media screen and (max-width: 1024px) {
		#ho {
			width: 1024px;
			margin-left: 0px;
		}

		#hi {
			width: 247px;
			margin-top: 1px;
			height: 30px;
		}

		#links {
			margin-left: 273px;
		}
	}
</style>


<div class="grid_1" id="ho">
	<div class="grid_1" id="hi">
      <b style="font-size: 11.5px; color:#7f7f7f;">Bienvenido al portal de intercambios comerciales de las empresas en Colombia!</b>
	</div>

	<div id="links"> <table> 
		<tr>
			<td style="vertical-align: middle;">
				<a href="<?=$link?>" target="_parent" <?=@$clase?>> 
					<img src="<?=base_url()?>img/ingresar.png" /> 
					<font color="#989898" style="vertical-align: middle;"> <?=$palabra?> </font> </a>
			</td>
			<?php if(isset($linkAdmin)){ ?>
				<td style="vertical-align: middle;">
					<a href="<?=$linkAdmin?>" target="_parent"> 
						<img src="<?=base_url()?>img/ingresar.png" /> 
						<font color="#989898" style="vertical-align: middle;"> <?=$Etiqueta?> </font> </a>
				</td>				
			<?php } ?>
			<td style="vertical-align: middle;"> 
				<div style="border-right: 1px solid #969696; height: 16px; margin: 1px 10px 0px 10px;"> </div> </td>
			<td style="vertical-align: middle;">
				<a href="<?=base_url()?>registro/registro_usuario" target="_top"> 
					<img src="<?=base_url()?>img/logoweb.png" style="width: 20px; height: 20px;" /> 
					<font color="#989898" style="vertical-align: middle;"> Registro Gratis </font> </a>
			</td>

			<td style="vertical-align: middle; display: none;"> 
				<div style="border-right: 1px solid #969696; height: 16px; margin: 1px 10px 0px 10px;"> </div> </td>
			<td style="vertical-align: middle; display: none;">
				<a href="#"> <img src="<?=base_url()?>img/pc.png" /> 
					<font color="#989898" style="vertical-align: middle;"> Oficina Virtual </font> </a>
			</td>

			<td style="vertical-align: middle; display: none;"> 
				<div style="border-right: 1px solid #969696; height: 16px; margin: 1px 10px 0px 10px;"> </div> </td>
			<td style="vertical-align: middle; display: none;">
				<a href="#"> <img src="<?=base_url()?>img/estrella.png" /> 
					<font color="#989898" style="vertical-align: middle;"> Favoritos </font> </a>
			</td>

			<td style="vertical-align: middle;"> 
				<div style="border-right: 1px solid #969696; height: 16px; margin: 1px 10px 0px 10px;"> </div> </td>
			<td style="vertical-align: middle;">
				<a href="#"> <img src="<?=base_url()?>img/add.png" /> 
					<font color="#989898" style="vertical-align: middle;"> Contactos </font> </a>
			</td>

			<td style="vertical-align: middle; display: none;"> 
				<div style="border-right: 1px solid #969696; height: 16px; margin: 1px 10px 0px 10px;"> </div> </td>
			<td style="vertical-align: middle; display: none;">
				<a href="#"> <font color="#989898" style="vertical-align: middle;"> Comprar </font> </a>
			</td>

			<td style="vertical-align: middle; display: none;"> 
				<div style="border-right: 1px solid #969696; height: 16px; margin: 1px 10px 0px 10px;"> </div> </td>
			<td style="vertical-align: middle; display: none;">
				<a href="#"> <font color="#989898" style="vertical-align: middle;"> Vender </font> </a>
			</td>

			<td style="vertical-align: middle;"> 
				<div style="border-right: 1px solid #969696; height: 16px; margin: 1px 10px 0px 10px;"> </div> </td>
			<td style="vertical-align: middle;">
				<a href="<?=base_url()?>ayuda" target="_top"> 
					<font color="#989898" style="vertical-align: middle;"> Ayuda </font> </a>
			</td>
		</tr> 
	</table> </div>

	<table id="separador"> <tr> <td> </td> </tr> </table>
</div>