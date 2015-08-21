<div class="col-md-12 content_titulo_membresia_list">
	<p class="texto_verificada_list"><?=$membresia->nombe?></p>
	<!--<span class="glyphicon glyphicon-briefcase style-glyphicon-briefcase"></span>-->
	<img  class="imagen_verificada_list"
	src="<?php echo img_url();?>membresia/<?=$membresia->logo?>">
</div>

<?php if($verificada!=0): ?>
			<div class="row">
				<!-- aca debe ir la instrucción php para llamar el div de verificación de la empresa -->
				<div class="col-md-12 verificada">
					<div class="col-md-2">
						<img class="imagen_verificada" src="<?php echo img_url();?>membresia/Check_mark__64.png">
					</div>
					<div class="col-md-10">
						<p class="texto_verificada">Verificada</p>
					</div>	
				</div>
			</div> 
<?php endif;?>