<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/div_seo.css">

		<div>
          <div id="seo_productos" class="col-md-12 fondo_color">
               <div class="col-md-4"></div>
               <div class="col-md-4">
                    <p class="texto_resultado">Mostrando resultados de <?=($page*25)+1?> a <?php if(($page_count*25)<($page+1)*25){echo $page_count*25;}else{echo ($page+1)*25;}?> de <?=$page_count*25?> que contienen <b><?=$nom_producto ?></b>
                    <br>Encontrados <?=$page_count*25?> productos en venta de <b><?=$nom_producto?></b>.
                    </p>
               </div>
               <div class="col-md-4"></div>
               </div>
          </div> 

          <div id="seo_solicitudes" class="col-md-12 fondo_color" style="display:none">
               <div class="col-md-4"></div>
               <div class="col-md-4">
                    <p class="texto_resultado">Mostrando resultados de <?=($page*25)+1?> a <?php if(($page_count3*25)<($page+1)*25){echo $page_count3*25;}else{echo ($page+1)*25;}?> de <?=$page_count3*25?> que contienen <b><?=$nom_producto ?></b>
                    <br>Encontrados <?=$page_count3*25?> solicitudes de compradores de <b><?=$nom_producto?></b> 
                    </p>
               </div>
               <div class="col-md-4"></div>
               </div>
          </div>

          <div id="seo_proveedores" class="col-md-12 fondo_color" style="display:none">
               <div class="col-md-4"></div>
               <div class="col-md-4">
                    <p class="texto_resultado">Mostrando resultados de <?=($page*25)+1?> a <?php if(($page_count2*25)<($page+1)*25){echo $page_count2*25;}else{echo ($page+1)*25;}?> de <?=$page_count2*25?> que contienen <b><?=$nom_producto ?></b>
                    <br>Encontrados <?=$page_count2*25?> Proveedores de <b><?=$nom_producto?></b> 
                    </p>
               </div>
               <div class="col-md-4"></div>
               </div>
          </div>
