<script type="text/javascript">
	var containerHeight = $(".descripcion_producto").height();
var $text = $(".descripcion_producto p");
 
while ( $text.outerHeight() > containerHeight ) {
        $text.text(function (index, text) {
            return text.replace(/\W*\s(\S)*$/, '...');
       });
}
</script>
<div class="row div_productos">
	<div class="col-md-12 div_resultado">
		<!-- Foto del producto -->
		<div class="col-md-3 row imagen_producto">
			<div class="background_imagen" >
				<div class="center-vertical_imagen">
					<a href="<?=base_url()?>producto/ver/<?=$producto->id?>">
						<img src="<?=base_url()?>uploads/<?=$producto->imagenes?>" class="img_imagen img-responsive">
					</a>
				</div>
			</div>
		</div>
		<!-- Informacion del producto -->
		<div class="col-md-7 nombre_producto">
			<!-- row de nombre producto -->
			<div class="row enlace">
				<a href="<?=base_url()?>producto/ver/<?=$producto->id?>" class="enlace_producto"><?php echo $producto->nombre ?></a>
			</div>
			<!-- row de info producto y emrpesa -->
			<div class="row">
				<!-- div para info de producto -->
				<div class="col-md-4 row info_producto">
					<p class="precio_producto">Precio:    <span class="glyphicon glyphicon-usd icono_precio" aria-hidden="true"></span>
					 	<span class="valor_producto"><?=decimal_points($producto->precio_unidad) ?></span>
					</p> 
					<img src="<?php echo img_url()?>sonrisaprecio.png" class="sonrisa_precio img-responsive">
				</div>
				<div class="col-md-3 row cantidad_producto">
					<p class="cantidad"><?=decimal_points($producto->pedido_minimo) ?> <?=$producto->medida ?></p>
					<p class="pedido">Pedido Mínimo</p>
				</div>
				<!-- div para info de vendedor -->
				<div class="col-md-5 hidden-xs info_vendedor">
					<a href="<?=base_url()?>/perfil/ver_empresa/<?=$empresa->id?>">
						<p class="nombre_empresa"><?php echo $empresa->nombre ?></p>
					</a>
					<div class="row">
						<?php echo @$producto->div_membresia ?>
					</div>
					<p class="tipo_empresa">Tipo de Empresa: <span class="tipo"><?php echo $empresa->tipo ?></span></p>
					<p class="ubicacion">Ubicación: <span class="ubica"><?php echo $usuario->ciudad," - ",$usuario->departamento ?></span></p>
				</div>
				<div class="col-md-8 row hidden-xs descripcion_producto">
					<p class="descripcion"><?php echo $producto->descripcion ?></p>
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
				<button onclick="JavaScript:start(<?=$producto->id?>,1);" type="button" class="boton_contacto btn btn-default" aria-label="Left Align">
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
