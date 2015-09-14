<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/div_seo.css">
<div>
	<div id="seo0_productos">
		<div id="seo0_productos" class="col-md-10 texto" >
			<h2 class="texto_venta">Venta de <b><?=$nom_producto?></b> en Colombia - Precio y Catalogo de Productos</h2>
			<h4 class="texto_venta2">Se muestra a continuacion el catalogo de productos de <b><?=$nom_producto?></b> al por mayor de venta de <b><?=$nom_producto?></b>  . Encuente los proveedores que venden, suministran o distribuyen en Colombia al mejor precio en Proveedor.com.co</h4>
		</div>
		<div class="col-md-12 texto">
			<a href="<?=base_url()?>" >Inicio</a>>
			<a href="<?=base_url()?>listados/lista/default/productos/<?=$page?>/<?=$filtro?>/<?=$tipo_filtro?>">Productos</a>>
			Resultados para "<b><?=$nom_producto?></b>" (<?=$page_count*25?>) 
		</div>
	</div>
</div>
<div>
	<div id="seo0_solicitudes"  style="display:none">
		<div class="col-md-10 texto" >
			<h2 class="texto_venta">Compradores de <b><?=$nom_producto?></b> en Colombia. </h2>
			<h4 class="texto_venta2">Listado con solicitudes de cotizacion de <b><?=$nom_producto?></b>. Proveedor.com.co le ofrece un completo listado de oportunidades comerciales de empresas compradores y clientes para <b><?=$nom_producto?></b></h4>
		</div>
		<div class="col-md-12 texto">
			<a href="<?=base_url()?>" >Inicio</a>>
			<a href="<?=base_url()?>listados/lista/default/solicitudes/<?=$page?>/<?=$filtro?>/<?=$tipo_filtro?>">Solicitudes</a>>
			Resultados para "<b><?=$nom_producto?></b>" (<?=$page_count3*25?>) 
			</div>
	</div>
</div>
<div>
	<div id="seo0_proveedores" style="display:none">
		<div class="col-md-10 texto" >
			<h2 class="texto_venta"><b><?=$nom_producto?></b> - Proveedores - Empresas en Colombia</h2>
			<h4 class="texto_venta2"><b><?=$nom_producto?></b>, empresas proveedoras, mayoristas, distribuidores y vendedores al por mayor y al detal. Mostramos a continuación Fabricantes, comercializadores, y negocios relacionados.</h4>
		</div>
		<div class="col-md-12 texto">
			<a href="<?=base_url()?>" >Inicio</a>>
			<a href="<?=base_url()?>listados/lista/default/proveedores/<?=$page?>/<?=$filtro?>/<?=$tipo_filtro?>">Proveedores</a>>
			Resultados para "<b><?=$nom_producto?></b>" (<?=$page_count2*25?>) 
		</div>
	</div>
</div>