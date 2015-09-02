<style type="text/css">
	      #content_titulo_membresia{
	     width: initial;
	     margin-left: -31px;
	     
        }

         #texto_membresiaEstandar{
	     font-family: arial;
	     font-size: 18px;
	     color:grey;
	     font-weight: bold;
	     display: inline;
         }

         .texto_membresias{
	     font-family: arial;
	     font-size: 18px;
	     color:orange;
	     font-weight: bold;
	     display: inline;
	     margin-left: 15px;
         }

        #imagen_membresia_platino{
         width: 34%;
         }

         .imagen_membresias{
         width: 32%;	
         }

</style>
<div class="col-md-12" id="content_titulo_membresia">
	<p class="texto_membresias"><?=$membresia->nombre?></p>
	<img  id="imagen_membresia_platino" class="imagen_membresias"
	src="<?php echo img_url()?>membresia/<?=$membresia->logo?>"> 
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