<div class="scroll_horizontal hidden-md hidden-lg visible-xs visible-sm">
	<div class="ult_productos">
		<p class="ult_prods">Productos Destacados</p>
		<div id="productos_destacados" class="wrapper">
			<div id="scroller">
				<ul>
					<?php foreach ($productos as $key => $producto):?>
					<li>
						<div class="item row row-centered">
		                    <div class="cadaElemento col-md-12">
		                      	<div class="divImg col-md-12 col-sm-12 col-xs-12"> 
		                        	<a>
		                          		<img src="<?=$producto->imagen?>">
		                        	</a>
		                        	<div class="row">
		                          		<a class="new_color" href="<?=$producto->url?>"><?=$producto->nombre?></a>
		                        	</div>
		                      	</div>
		                      </div>
		                </div>
		            </li>
		        <?php endforeach;?>
		        <li><div class="item"></div></li>
				</ul>				
			</div>
			<div class="fondo_btn_todos">
			</div>
		</div>
	</div>
</div>
<div class="content_boton hidden-md hidden-lg visible-xs visible-sm">
	<button class="btn btn-vertodos" onclick="JavaScript:location.href='<?=base_url()?>listados/lista/default/productos'">Ver Todos</button>
</div>
			