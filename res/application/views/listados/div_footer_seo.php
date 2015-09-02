<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/div_seo.css">

		<div>
          <div class="col-md-12 fondo_color">
          	<div class="col-md-4"></div>
          	<div class="col-md-4">
          		<p class="texto_resultado">Mostrando resultados de <?=($page*25)+1?> a <?php if(($page_count*25)<($page+1)*25){echo $page_count*25;}else{echo ($page+1)*25;}?> de <?=$page_count*25?> que contienen <?=$nom_producto ?>
          		</p>
          	</div>
          	<div class="col-md-4"></div>
          	</div>
		</div>
