<link href="<?php echo css_url().'pag_categorias_movil.css' ?>" rel="stylesheet">

<!-- Contenedor de Pagina de Categorias solo para dispositivos moviles -->
<div class="row">
	<div class="pag_categorias_movil col-xs-12 col-sm-12">
		<div class="seccion-title">
			<h2 class="pag_title">
				<a href="<?=base_url()?>categoria/ver/<?=$categoria->id_categoria?>"	
					<span class="glyphicon glyphicon-arrow-left ico_subcate"></span>
					<?=$categoria->nombre_categoria?>
				</a>
			</h2>
		</div>

		<div class="seccion-body">
			<ul>
				<?php foreach ($subcategorias as $key => $subcategoria):?>
					<li>
						<a class="item_categoria" href="<?=base_url()?>categoria/ver_sub/<?=$subcategoria->id_subcategoria?>"><?=$subcategoria->nom_subcategoria?>
							<i class="fa fa-angle-right ico_item-cate"></i> 
						</a>
					</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</div>