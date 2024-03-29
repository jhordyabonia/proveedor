<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/catalogo_producto/produc_prin_catalogo.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="conten_pro_pri">
	<div class="col-md-6">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<div class="row">
			<div class="text_pro_pri">
				<p class="text_producPri">Productos Principales</p>
			</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 well-social">
		<div class="col-md-8">
			<p class="pull-right label-share">
				Compartir catálogo en redes
			</p>
		</div>
		<div class="col-md-4 pull-right">
			<div class="row">
				<div class="col-md-12 share-well">
					<?php echo form_buttons_socials('share-buttons') ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="conten_pro_pri col-md-12">
	<div class="col-md-2"></div>
	<div class="col-md-10">
		<div class="row">
			<div class="encabezado_pro_pri" data-toggle="modal" data-target="#asistentes_proveedor_popup">
				<button class="btn btn_solicitar_coti">
					<i class="ico_solicitar fa fa-file-text"></i>
					<a class="enlace_soli" >SOLICITAR COTIZACION</a>
				</button>
				<p class="text-coti">Seleccione uno o varios productos y solicite una cotizacion</p>
			</div>
		</div>
	</div>
</div>

<div class="conten_pro col-md-12">
	<div class="padding-left col-md-2">
		<div class="conten_categorias">
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
						echo '<p><a href="'.base_url().'empresa/catalogo_producto/'.$empresa->url.'/'.$page.'/'.$categoria['id'].'">';
						echo $key.' <strong>('.$categoria['cantidad'].')</strong>';
						echo '</a></p>';
						echo '</div>';

						echo '<div class="item_categoria">';
						foreach ($categoria['subcategorias'] as $key2=>$subcategoria)
						{ 
							echo '<p><a href="'.base_url().'empresa/catalogo_producto/'.$empresa->url.'/'.$page.'/'.$subcategoria['id'].'/1/">';
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
		<?php foreach($destacados as $key=>$producto):?>
		<?php if(!$producto){continue;}?>
		<?php if($producto->nombre==""){continue;}?>
			<div class="item_procud">
				<div class="imagen_producto"><a href="<?=base_url()?>producto/ver/<?=$producto->id?>"><img class="img_producto" src="<?=$producto->imagenes?>"></div></a>
				<div class="contexto_producto">
					<div class="textos">
						<div class="info_producto">
							<a href="<?=base_url()?>producto/ver/<?=$producto->id?>"><p class="nombre_producto"><?=$producto->nombre?></p></a>
						</div>
						<p class="texto_precio"><?php if($producto->precio_unidad==0){echo "Precio a convenir.";}else{echo '$'.decimal_points($producto->precio_unidad);}?></p>
						<p class="unidades"><?php if($producto->pedido_minimo==0){echo "Pedido mínimo a convenir.</p>";}else{echo decimal_points($producto->pedido_minimo)." ".($producto->medida)."<p class='pedido'>pedido mínimo</p>";}?>
					</div>
				</div>
				<input type="checkbox" class="checkbox">
			</div>
		<?php endforeach;?>
		<?php foreach($productos as $key=>$producto):?>
		<?php if(!$producto){continue;}?>
		<?php if($producto->nombre==""){continue;}?>

			<div class="item_procud">
				<div class="imagen_producto"><a href="<?=base_url()?>producto/ver/<?=$producto->id?>"><img class="img_producto" src="<?=$producto->imagenes?>"></div></a>
				<div class="contexto_producto">
					<div class="textos">
						<div class="info_producto">
							<a href="<?=base_url()?>producto/ver/<?=$producto->id?>"><p class="nombre_producto"><?=$producto->nombre?></p></a>
						</div>
						<p class="texto_precio"><?php if($producto->precio_unidad == 0){echo "Precio a convenir.";}else{echo '$'.decimal_points($producto->precio_unidad);}?></p>
						<p class="unidades"><?php if ($producto->pedido_minimo == 0){echo "Pedido mínimo a convenir.</p>";}else{echo decimal_points($producto->pedido_minimo)." ".($producto->medida)."<p class='pedido'>pedido mínimo</p>";}?>
					</div>
				</div>
				<input type="checkbox" class="checkbox">
			</div>
		<?php endforeach;?>
			<!---->
		</div>
		<div class="solicitar_cotizacion" style="text-align: center;margin-top: 23px;" data-toggle="modal" data-target="#asistentes_proveedor_popup">
			<button class="btn_solicitar_cotizacion">
					<i class="icono_solicitar fa fa-file-text"></i>
					<a class="enlace_solicitar" >SOLICITAR COTIZACION</a>
				</button>
		</div>
	</div>
</div>
<div class="contenedor_paginador col-md-12">
	<div class="col-md-2"></div>
	<div class="text-align col-md-10">
		<ul class="pagination">
		<li>
	      <a href="<?=base_url()?>empresa/catalogo_producto/<?=$empresa->url?>/<?=$page-1?>/<?=$filtro?>/<?=$tipo_filtro?>" aria-label="Next">
	        <span aria-hidden="true">Anterior</span>
	      </a>
	    </li>
		    <?php for ($key=0;$key<$cantidad_paginas;$key++) 
            {		    
		    	echo '<li><a ';
                if($page==$key)
                    echo " style='background-color: whitesmoke'";
                 echo ' href="'.base_url().'empresa/catalogo_producto/'.$empresa->url.'/'.$key.'/'.$filtro.'/'.$tipo_filtro.'">'.($key+1).'</a></li>';
            }?>	    
	    <li>
	      <a href="<?=base_url()?>empresa/catalogo_producto/<?=$empresa->url?>/<?=$page+1?>/<?=$filtro?>/<?=$tipo_filtro?>" aria-label="Next">
	        <span aria-hidden="true">Siguiente &raquo;</span>
	      </a>
	    </li>
	  </ul>
	</div>
</div>
<div class="contenido_tag col-md-12" style="background-color: #fff;padding: 0;">
	<div class="texto_tag">
		<p class="text-tag">Etiquetas</p>
	</div>
	<div class="etiquetas_tag" style="padding-bottom: 15px;">
		<p class="texto-tag"><?=$empresa->tipo?><br>
		<br>
		<p class="texto-tag"><?=$usuario->ciudad?> - <?=$usuario->departamento?> - <?=$usuario->pais?><br>
		<br>
		<p class="texto-tag"><?=$empresa->productos_principales?><br>
		<br>
		<p class="texto-tag"><?=$tag?>
	</div>
</div>