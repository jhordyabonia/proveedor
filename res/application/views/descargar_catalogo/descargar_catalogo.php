<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/catalogo_producto/produc_prin_catalogo.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="conten_pro_pri">
	<div class="col-md-12">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<div class="row">
			<div class="text_pro_pri">
				<p class="text_producPri">Descargar Catalogos de la Empresa</p>
			</div>
			</div>
		</div>
	</div>
</div>

<div class="conten_pro_pri col-md-12">
	<div class="col-md-2"></div>
	<div class="col-md-10">
		<div class="row">
			<div class="encabezado_pro_pri">
				<button class="btn btn_solicitar_coti">
					<i class="ico_solicitar fa fa-file-text"></i>
					<a class="enlace_soli" href="">SOLICITAR COTIZACION</a>
				</button>
			</div>
		</div>
	</div>
</div>

<div class="conten_pro col-md-12">
	<div class="padding-left col-md-2">
		<div class="conten_categorias2">
			<div class="title_categoria">
				<span class="ico_title_cate glyphicon glyphicon-th-list"></span>
				<h2 class="text_title_cate">Categorias</h2>
			</div>
			<div class="conte_item_categorias">
				<!--
				<div class="text_categoria">
					<p>Seguridad Industrial, Calzado y Dotacion (45)</p>
				</div>
				<div class="item_categoria">
					<p>Proteccion Contra Caidas <strong>(12)</strong></p>
					<p>Calzado Industrial <strong>(6)</strong></p>
					<p>Proteccion Manual <strong>(3)</strong></p>
					<p>Señalizacion <strong>(4)</strong></p>
					<p>Proteccion Facial <strong>(3)</strong></p>
					<p>Proteccion Auditiva <strong>(2)</strong></p>
					<p>Proteccion Cabeza <strong>(3)</strong></p>
					<p>Proteccion Corporal <strong>(9)</strong></p>
					<p>Proteccion Respiratoria <strong>(2)</strong></p>
					<p>Camillas y Botiquines <strong>(1)</strong></p>
				</div>
				-->
				<?php
					foreach ($filtros as $key=>$categoria)
					{
						echo '<div class="conte_item_categorias">';
						echo '<div class="text_categoria">';
						echo '<p><a href="'.base_url().'empresa/catalogo_producto/'.$empresa->id.'/'.$page.'/'.$categoria['id'].'">';
						echo $key.' <strong>('.$categoria['cantidad'].')</strong>';
						echo '</a></p>';
						echo '</div>';

						echo '<div class="item_categoria">';
						foreach ($categoria['subcategorias'] as $key2=>$subcategoria)
						{ 
							echo '<p><a href="'.base_url().'empresa/catalogo_producto/'.$empresa->id.'/'.$page.'/'.$subcategoria['id'].'/1/">';
							echo $key2.' <strong>('.$subcategoria['cantidad'].')</strong>';
							echo '</a></p>';
						}                  
						echo '</div>';
						echo '</div>';
					 }
				?>
			</div>
		</div>
	</div>
	<div class="content_item_produc col-md-10">
		<div class="contenedor_productos_item">
			<?php foreach ($catalogos as $key => $catalogo):?>
			<div class="item_procud2">
				<div class="imagen_producto">
					<img class="img-pdf2" src="http://192.168.33.10/assets/img/pdf.png">
				</div>
				<div class="contexto_producto">
					<div class="textos2">
						<p><?=$catalogo->nombre?></p>
					</div>
						<button class="btn btn-descargar" onclick="location.href='<?=base_url()?>uploads/catalogo/<?=$catalogo->catalogo?>">
							<span class="icon_style_des2 glyphicon glyphicon-download-alt"></span>
							DESCARGAR
						</button>
				</div>
			</div>
		<?php endforeach;?>
		</div>
		</div>
		<div class="solicitar_cotizacion2 col-md-12">
			<button class="btn_solicitar_cotizacion">
					<i class="icono_solicitar fa fa-file-text"></i>
					<a class="enlace_solicitar" href="">SOLICITAR COTIZACION</a>
				</button>
		</div>
	</div>
</div>
<div class="contenedor_paginador2 col-md-12">
	<div class="col-md-2"></div>
	<div class="text-align col-md-10">
		<ul class="pagination">
			<!--
	    <li><a href="#">1</a></li>
	    <li><a href="#">2</a></li>
	    <li><a href="#">3</a></li>
	    <li><a href="#">4</a></li>
	    <li><a href="#">5</a></li>
	    <li>
	      <a href="#" aria-label="Next">
	        <span aria-hidden="true">Siguiente &raquo;</span>
	      </a>
	    </li>
	-->
	  </ul>
	</div>
</div>