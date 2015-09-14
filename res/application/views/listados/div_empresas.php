<script type="text/javascript">
	var containerHeight = $(".descripcion_solicitud").height();
var $text = $(".descripcion_solicitud p");
 
while ( $text.outerHeight() > containerHeight ) {
        $text.text(function (index, text) {
            return text.replace(/\W*\s(\S)*$/, '...');
       });
}
</script>
<div class="row div_proveedores">
	<div class="col-md-12 nombre_emp">
		<div class="col-md-7">
			<a href="<?=base_url()?>perfil/perfil_empresa/<?=$empresa->id?>" ><p class="nombre_empresa"><?=$empresa->nombre?></p></a>
		</div>
		<div class="col-md-4 hidden-xs">
			<?php echo @$empresa->div_membresia ?>
		</div>
	</div>
	<div class="col-md-12 hidden-xs enlaces_empresa">
		<div class="col-md-2 catalogo">
			<a href="<?=base_url()?>perfil/ver_empresa/<?=$empresa->id?>" class="perfil">Ver catálogo</a>
		</div>
		<div class="col-md-2 prod_solicitados">
			<a href="<?=base_url()?>perfil/productos_solicitados/<?=$empresa->id?>" class="perfil">Productos Solicitados</a>
		</div>
		<div class="col-md-2 perfil_empresa">
			<a href="<?=base_url()?>perfil/perfil_empresa/<?=$empresa->id?>" class="perfil">Perfil de la Empresa</a>
		</div>
		<div class="col-md-2 contacto_empresa">
			<a href="<?=base_url()?>perfil/contacto_empresa/<?=$empresa->id?>" class="perfil">Contacto</a>
		</div>
	</div>
	<div class="col-md-12 visible-xs hidden-sm hidden-md hidden-lg enlaces_empresa">
		<div class="col-md-2 catalogo2">
			<a href="<?=base_url()?>perfil/ver_empresa/<?=$empresa->id?>" class="perfil">Ver catálogo</a>
		</div>
		<div class="col-md-2 prod_solicitados2">
			<a href="<?=base_url()?>perfil/productos_solicitados/<?=$empresa->id?>" class="perfil">Productos Solicitados</a>
		</div>
		<div class="col-md-2 perfil_empresa2">
			<a href="<?=base_url()?>perfil/perfil_empresa/<?=$empresa->id?>" class="perfil">Perfil de la Empresa</a>
		</div>
		<div class="col-md-2 contacto_empresa2">
			<a href="<?=base_url()?>perfil/contacto_empresa/<?=$empresa->id?>" class="perfil">Contacto</a>
		</div>
	</div>
	<div class="col-md-12 div_resultado_proveedor">
		<!-- Foto del producto -->
		<?php $key=0;?>
		<?php if($empresa->productos):?>
			<?php foreach ($empresa->productos as $key => $producto):?>
			  <?php if($key>2){break;}?>
				<div class="col-md-2 hidden-xs imagen_producto">
					<div class="background_imagen" >
						<div class="center-vertical_imagen">
						<a href="<?=base_url()?>producto/ver/<?=$producto->id?>">
							<?php $producto->imagenes=explode(',',$producto->imagenes);?>
							<img src="<?=base_url()?>uploads/<?=$producto->imagenes[0]?>" class="img_imagen img-responsive">
						</a>
						</div>
					</div>
					<a href="<?=base_url()?>producto/ver/<?=$producto->id?>">
						<p class="nombre_prod"><?=$producto->nombre?></p>
					</a>
				</div>
			<?php endforeach;?>
			<?php for($key;$key<2;$key++):?>
				<div class="col-md-2 hidden-xs imagen_producto">
					<div class="background_imagen" >
						<div class="center-vertical_imagen">						
						</div>
					</div>
					<p class="nombre_prod"></p>
				</div>
			<?php endfor;?>
		<?php else: ?>
		<?php for($i=0;$i<3;$i++):?>
				<div class="col-md-2 hidden-xs imagen_producto">
					<div class="background_imagen" >
						<div class="center-vertical_imagen">						
						</div>
					</div>
					<p class="nombre_prod"></p>
				</div>
			<?php endfor;?>
		<?php endif; ?>
		<!-- Informacion del la empresa -->
		<div class="col-md-4 hidden-xs info_vendedor">
			<p class="tipo_empresa">Tipo de Empresa: <span class="tipo"><?=$empresa->tipo ?></span></p>
			<p class="ubicacion">Ubicación: <span class="ubica"><?php echo $usuario->ciudad," - ",$usuario->departamento; ?></span></p>
			<?php if( $empresa->productos_principales):?>
				<p class="prod_ppales">Productos Principales:</p>
				<?php foreach (explode(',',$empresa->productos_principales) as $key => $producto):?>
					<p class="productos_ppales"><?=$producto;?></p>
				<?php endforeach;?>
				<a href="<?=base_url()?>perfil/ver_empresa/<?=$empresa->id?>" class="perfil2">ver mas productos ></a>
			<?php endif;?>
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
				<button onclick="JavaScript:start(<?=$empresa->id?>,3);"type="button" class="boton_contacto btn btn-default" aria-label="Left Align">
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
