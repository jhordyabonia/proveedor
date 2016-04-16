<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/catalogo_producto/produc_prin_catalogo.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="conten_pro_pri">
	<div class="col-md-6">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<div class="row">
			<div class="text_pro_pri">
				<p class="text_producPri">Descargar Catálogos de la Empresa</p>
			</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 descargar-social">
		<div class="col-md-8">
			<p class="pull-right label-share">
				Compartir Catálogos en redes
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
			<div class="encabezado_pro_pri">
				<button class="btn btn_solicitar_coti" data-toggle="modal" data-target="#asistentes_proveedor_popup">
					<i class="ico_solicitar fa fa-file-text"></i>
					<a class="enlace_soli2" >SOLICITAR COTIZACION</a>
				</button>
			</div>
		</div>
	</div>
</div>

<div class="conten_pro pad-cincuenta col-md-12">
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

						
						echo '</div>';
					 }
				?>
			</div>
		</div>
	</div>
	<div class="content_item_produc col-md-10">
		<div class="contenedor_productos_item">
		<?php if($catalogos!=NULL):?>
			<?php foreach ($catalogos as $key => $catalogo):?>
			<?php if($catalogo->catalogo==NULL) {continue;}?>
			<div class="item_procud2">
				<div class="imagen_producto">
					<i class="icon_catalogo fa fa-file-pdf-o"></i>
					<!--<img class="img-pdf2" src="<?=base_url()?>assets/img/pdf.png">-->
				</div>
				<div class="contexto_producto center">
					<div class="textos2">
						<p><?=$catalogo->nombre?></p>
					</div>
						<a class="btn btn-descargar" href="<?=base_url()?>uploads/catalogo/<?=$catalogo->catalogo?>" target="other">
							<span class="icon_style_des3 glyphicon glyphicon-download-alt"></span>
							DESCARGAR
						</a>
				</div>
			</div>
		<?php endforeach;?>
		<?php else:?>
		<h2>
		 <br>
			La empresa no ha publicado catálogos.</h2>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		 <br>
		<CENTER>
		</CENTER>
		<?php endif;?>

		</div>
		</div>
		<div class="solicitar_cotizacion2 col-md-12">
			<button class="btn_solicitar_cotizacion" data-toggle="modal" data-target="#asistentes_proveedor_popup">
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
<div class="container-fluid">
