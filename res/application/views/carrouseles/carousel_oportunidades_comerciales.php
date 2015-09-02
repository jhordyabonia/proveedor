<div class="scroll_horizontal hidden-md hidden-lg visible-xs visible-sm">
	<div class="ult_productos">
		<p class="ult_prods">Últimas oportunidades comerciales</p>
		<div id="oportunidades" class="wrapper">
			<div id="scroller">
				<ul>
					<?php foreach ($productos_destacados_2 as $key => $producto_destacado): ?>
                	<li>
						<div class="row row-centered">
		                    <div class="cadaElemento col-md-12">
		                      	<div class="divImg col-md-12 col-sm-12 col-xs-12"> 
		                        	<a>
		                          		<img src="<?=$producto_destacado->imagen ?>">
		                        	</a>
		                        	<div class="row">
		                          		<a class="new_color" href="<?=$producto_destacado->url ?>"><?=$producto_destacado->nombre?></a>
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
	<button class="btn btn-vertodos" onclick="JavaScript:location.href='<?=base_url()?>listados/lista/default/solicitudes'" >Ver Todos</button>
</div>
