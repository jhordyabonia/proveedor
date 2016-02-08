<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/catalogo_producto/header_catalogo.css">
<link rel="stylesheet" href="<?php echo assets_url() ?>awesome-sosmed-share-button/src/css/ayoshare.css">
<script src="<?php echo assets_url() ?>awesome-sosmed-share-button/src/js/ayoshare_a.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#share-header").aayoshare(
        google = true, // true or false
        stumbleupon = false,
        facebook = true,
        linkedin = true,
        pinterest = false,
        bufferapp = false,
        reddit = false,
        vk = false,
        pocket = false,
        twitter = true,
        total = false
    );
  });
</script>
 <?php 
	$m =  $this->uri->segment(2);
	function is_active($p='',$metodo='')
	{
		if($p==$metodo)
		{echo 'active';}
		else{echo '';}
	}
?>
<div class="conten_header_catalogo">
	<div class="col-md-12">
		<div class="col-md-10">
			<div class="conten_img">
				<!--<img class="banners style-img-emp  img-responsive" src="<?=base_url()?>uploads/resize/banners/<?=$empresa->banners?>"></div>-->				
				<div class="div-img">
					<img class="img-responsive logo img_logo" src="<?=base_url()?>uploads/resize/SOP/logos1/<?=$empresa->logo?>">
				</div>
				<div class="div-nom-empresa">
					<p class="txt_nom_empre"><?=$empresa->nombre?></p>	
				</div>
				<div class="div-sonrisa">
					<img class="img-responsive sonri-img" src="<?=base_url()?>assets/img/sonrisaproveedor.png">
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="row">
				<div class="col-md-12">
					<div class="info">
						<div class="tipo_empresa">
							<img class="style_empresa img-responsive logo" src="<?=base_url()?>assets/img/membresia/<?=$membresia->logo?>">
							<p class="inline-block nombre_membresia"><?=$membresia->nombre?></p>
						</div>
						<?php if($empresa->legalizacion):?>
							<div class="verificacion">
								<img class="style_verificacion img-responsive" src="<?=base_url()?>assets/img/membresia/Check_mark__64.png">
								<p class="inline-block">Verificada</p>
							</div>
						<?php endif;?>
					</div>
				</div>
				<div class="col-md-12 share-well">
					<div id="share-header" class="inline"></div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="conten_header_item">
	<div class="">
			<ul class=" list_item">
				<li>
					<ul class="<?=is_active('inicio',$m)?> list_item">
						<span class="icon_style glyphicon glyphicon-home"></span>
						<a class="enlaces_header" href="<?=base_url()?>empresa/inicio/<?=$empresa->id?>">Inicio</a>
					</ul>
				</li>
				<li>
					<ul class="<?=is_active('catalogo_producto',$m)?> list_item">
						<span class="icon_style glyphicon glyphicon-th-list"></span>
						<a class="enlaces_header" href="<?=base_url()?>empresa/catalogo_producto/<?=$empresa->id?>">Catálogo de Productos</a>
					</ul>
				</li>
				<li>
					<ul class="<?=is_active('nosotros',$m)?> list_item">
						<span class="icon_style glyphicon glyphicon-briefcase"></span>
						<a class="enlaces_header" href="<?=base_url()?>empresa/nosotros/<?=$empresa->id?>">Nosotros</a>
					</ul>
				</li>
				<li>
					<ul class="<?=is_active('cotizaciones_requeridas',$m)?> list_item">
						<i class="icon_style fa fa-file-text"></i>
						<a class="enlaces_header" href="<?=base_url()?>empresa/cotizaciones_requeridas/<?=$empresa->id?>">Cotizaciones requeridas</a>
					</ul>
				</li>
				<li>
					<ul class="<?=is_active('contacto',$m)?>  list_item">
						<span class="icon_style glyphicon glyphicon-earphone" style="font-weight:bold;"></span>
						<a class="enlaces_header" href="<?=base_url()?>empresa/contacto/<?=$empresa->id?>">Contacto</a>
					</ul>
				</li>
				<li>
					<ul class="<?=is_active('descargar_catalogo',$m)?> list_item2">
						<span class="icon_style glyphicon glyphicon-download-alt"></span>
						<a class="enlaces_header2" href="<?=base_url()?>empresa/descargar_catalogo/<?=$empresa->id?>">DESCARGAR CATÁLOGO</a>
					</ul>
				</li>
			</ul>
		</div>
</div>


