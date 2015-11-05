<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/cotizaciones_requeridas/cotizaciones_requeridas.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="conten_pro_pri">
	<div class="col-md-12">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<div class="row">
			<div class="text_pro_pri">
				<p class="text_producPri">Cotizaciones Requeridas por la Empresa</p>
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
			<!--
			<div class="conte_item_categorias">
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
	<div class="content_item_produc col-md-10">
		<div class="titulos_coti_req">
			<div class="col-md-12">
				<div class="col-md-2">
					<p class="texto_titulos" style="text-align:center;">Fecha</p>
				</div>
				<div class="col-md-3">
					<p class="texto_titulos">Producto o Servicio requerido</p>
				</div>
				<div class="col-md-4">
					<p class="texto_titulos">Descripcion</p>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="contenido_general_lista">
			<?php foreach($oportunidades as $oportunidad):?>
				<div class="lista_coti_req">
					<div class="col-md-12">
						<div class="texto_conten col-md-2">
							<p class="texto_fecha"><?=$oportunidad->fecha?></p>
						</div>
						<div class="texto_conten col-md-3">
							<p class="texto_1">Se Requiere: </p>
							<p class="texto_requerido"><?=$oportunidad->nombre?></p>
						</div>
						<div class="texto_conten col-md-4">
							<p class="texto_descripcion"><?=$oportunidad->descripcion?></p>
							<a class="texto_vermas"  data-toggle="modal" data-target="#popup_info" >Ver mas</a>
						</div>
						<div class="conten_button col-md-2" data-toggle="modal" data-target="#popup_info">
							<button class="btn btn-enviarCoti">
								<i class="ico_enviarCoti fa fa-file-text"></i>
								<p class="btn_enviarCoti">ENVIAR COTIZACION</p>
							</button>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
<div class="contenedor_paginador col-md-12">
	<div class="col-md-2"></div>
	<div class="text-align col-md-10">
		<ul class="pagination">
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
	  </ul>
	</div>
</div>

<div class="modal" id="popup_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
    <div class="modal-dialog">
        <div class="modal-content modal-content-two">
            <div class="modal-header header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
        	<div class="modal-body contenido_popup">
            	<p class="contenedor_candado"><span class="glyphicon glyphicon-lock ico_candado"></span></p>
            	<p class="contenido_exclusivo">Contenido exclusivo para</p>
            	<p class="empresas_platino">Empresas Platino</p>
            	<div class="background_img col-md-push-4">
            		
					<div class="center-vertical_img">
						<img src="http://proveedor.com.co/assets/img/membresia/logo_mem_platino.png" class="img-responsive img_platino">
					</div>
				</div>
            	<button class="btn btn-primary btn_acceder" onclick="JavaScript:location.href='http://clientes.proveedor.com.co/';">ACCEDER AHORA!</button>
        	</div>
        </div>
    </div>
</div>