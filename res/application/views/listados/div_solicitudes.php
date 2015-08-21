<script type="text/javascript">
	var containerHeight = $(".descripcion_solicitud").height();
var $text = $(".descripcion_solicitud p");
 
while ( $text.outerHeight() > containerHeight ) {
        $text.text(function (index, text) {
            return text.replace(/\W*\s(\S)*$/, '...');
       });
}
</script>
<div class="row div_solicitudes">
	<div class="col-md-12 div_resultado">
		<!-- Foto del producto -->
		<div class="col-md-3 row imagen_producto">
			<div class="background_imagen" >
				<div class="center-vertical_imagen">
					<img src="<?=base_url()?>uploads/<?=$solicitud->imagenes?>" class="img_imagen img-responsive">
				</div>
			</div>
		</div>
		<!-- Informacion del producto -->
		<div class="col-md-7 nombre_producto">
			<!-- row de nombre producto -->
			<div class="row enlace">
				<a href="<?=base_url()?>oportunidad_comercial/ver/<?=$solicitud->id?>" class="enlace_producto"><?php echo $solicitud->nombre ?></a>
			</div>
			<!-- row de info producto y emrpesa -->
			<div class="row">
				<!-- div para info de producto -->
				<div class="col-md-7 solicitud">
					<p class="texto_solicitud">Cantidad: <span class="unidades"><?=decimal_points($solicitud->cantidad_requerida)?> <?=$solicitud->medida?></span></p>
					<p class="texto_solicitud">Presupuesto límite: <span class="contenido"><?php echo decimal_points($solicitud->precio_maximo)." X ".decimal_points($solicitud->cantidad_requerida)." ".$solicitud->medida?> </span></p>
					<p class="texto_solicitud">Lugar de entrega: <span class="contenido"><?php echo $usuario->ciudad," - ",$usuario->departamento ?></span></p>
					<p class="descripcion_solicitud"><?=$solicitud->descripcion?></p>
				<!--	<p class="texto_solicitud">Vigente hasta: <span class="unidades"><?=$fecha_vigencia?></span></p>-->
					<a href="#" class="informacion">más información ></a>
				</div>
				<!-- div para info de vendedor -->
				<div class="col-md-5 hidden-xs info_vendedor">
					<p class="nombre_empresa"><a href="<?=base_url()?>perfil/ver_empresa/<?=$empresa->id?>"><?php echo $empresa->nombre ?></a></p>
					<p class="comprador">Comprador</p>
					<div class="row">
						<?php echo @$solicitud->div_membresia ?>
					</div>
					<p class="tipo_empresa">Tipo de Empresa: <span class="tipo"><?= $empresa->tipo ?></span></p>
					<p class="ubicacion">Ubicación: <span class="ubica"><?php echo $usuario->ciudad," - ",$usuario->departamento ?></span></p>
				</div>
			</div>
		</div>
		<!-- informacion de contacto -->
		 <div class="col-md-2 hidden-xs botones_contacto">
			<!--<div class="col-md-1 comentario">
				<button type="button" class="boton_coment btn btn-default" aria-label="Left Align">
  					<span class="glyphicon glyphicon-comment ico_comentario" aria-hidden="true"></span>
  					<p class="texto_boton">Proveedor<br> Disponible</p>
				</button>
			</div>
			<div class="col-md-1 agregar">
				<button type="button" class="boton_agregar btn btn-default" aria-label="Left Align">
  					<span class="fa fa-user-plus ico_agregar" aria-hidden="true"></span>
  					<p class="texto_boton">Agregar<br> Proveedor</p>
				</button>
			</div>-->
		</div> 
		<div class="col-md-2 hidden-xs botones_contacto_2">
			<div class="col-md-1 contacto">
				<button onclick="JavaScript:start(<?=$solicitud->id?>,2);" type="button" class="boton_contacto btn btn-default" aria-label="Left Align">
  					<span class="fa fa-envelope ico_contacto" aria-hidden="true"></span>
  					<p class="texto_boton">Contactar<br> Proveedor</p>
				</button>
			</div>
			<div class="col-md-1 proveedor">
				<!--
				<button type="button" class="boton_proveedor btn btn-default" aria-label="Left Align">
  					<span class="fa fa-phone ico_proveedor" aria-hidden="true"></span>
  					<p class="texto_boton">Llamar al<br> Proveedor</p>
				</button>
				-->
			</div>
		</div>
	</div>
</div>
