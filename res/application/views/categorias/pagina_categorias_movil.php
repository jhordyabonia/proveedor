<link href="<?php echo css_url().'pag_categorias_movil.css' ?>" rel="stylesheet">

<!-- Contenedor de Pagina de Categorias solo para dispositivos moviles -->
<div class="row">
	<div class="pag_categorias_movil col-xs-12 col-sm-12">
		<div class="seccion-title">
			<h2 class="pag_title"><i class="fa fa-list-ul ico_cate"></i>Categorias</h2>
		</div>

		<div class="seccion-body">
			<ul>
				<?php foreach ($categorias as $key => $categoria):?>
					<li>
						<a class="item_categoria" href="<?=base_url()?>categoria/ver/<?=$categoria->id_categoria?>"><?=$categoria->nombre_categoria?>
							<i class="fa fa-angle-right ico_item-cate"></i> 
						</a>
					</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</div>