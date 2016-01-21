<!-- <script type="text/javascript" src="build/iscroll.js"></script>-->
<script type="text/javascript" src="../../../assets/js/iscroll-master/build/iscroll.js"></script>
<link href="<?php echo css_url().'index/carousel_horizontal.css' ?>" rel="stylesheet">


<script type="text/javascript">

var myScroll;

function loaded () {
	myScroll = new IScroll('#wrapper', { scrollX: true, scrollY: false, mouseWheel: true });
}http://192.168.33.10/

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

</script>


<body onload="loaded()">
<div class="scroll_horizontal">
	<div class="ult_productos">
		<p class="ult_prods">Últimos Productos Publicados</p>
		<div id="wrapper">
			<div id="scroller">
				<ul>
					<?php foreach ($productos as $key => $producto):?>
					<li>
						<div class="row row-centered">
		                    <div class="cadaElem col-md-12">
		                      	<div class="divImg col-md-4 col-sm-12 col-xs-12"> 
		                        	<a>
		                          		<img src="http://www.proveedor.com.co/uploads/resize/default.jpg">
		                        	</a>
		                      	</div>
		                    	<div class="divCont col-md-8 col-sm-12 col-xs-12">
		                        	<div class="row">
		                          		<a href="#"><?=$producto->nom_producto?></h4> </a>
		                        	</div>
			                        <div class="divCont_mgbtncero row">
			                          	<div class="col-md-5 col-sm-5 col-xs-5"> 
			                            	<div class="row" style="margin-bottom: 0;">
			                              		<p class="precio"><span class="glyphicon glyphicon-usd">$</span> <?php echo decimal_points($producto->precio_unidad) ?>  </p>
			                            	</div>
			                            <div class="row" style="margin-bottom: 0;">
			                              	<img src="<?php echo img_url().'index/sonrisaprecio.png' ?>">
			                            </div>
			                          	</div>
			                          	<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">
			                            	<div class="row" style="margin-bottom: 0;">
			                              	<p class="unidades"><?php echo decimal_points($producto->pedido_min).' '.$producto->medida ?> </p>
			                            	</div>
			                            	<div class="row">
			                              		<p class="pmin"> Pedido mínimo </p>
			                            	</div>
			                          	</div> 
			                        </div>
		                        	<div class="divCont_mgbtncero row">
		                          		<h5><?php echo $producto->fecha_publicacion ?></h5> 
		                        	</div>
		                      	</div>
		                    </div>
		                </div>
		            </li>
		        <?php endforeach;?>
		           
				</ul>		
			</div>
		</div>
	</div>
</div>
</body>
