<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/index_oroPlatino/index_oroPlatino.css">
<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">-->
<link rel="stylesheet" href="<?php echo css_url(); ?>social.css">
<script type="text/javascript">
  $(document).ready(function(){
    $('#carouselInicio').carousel({interval: 5000});
  });
</script>



<div class="imagen_principal">
	<div class="container_imagen">
<div class="row" id="banner" >
  <!-- Seccion de Carousel -->
  <div class="row" id="foto_principal">
    <!-- Carousel-->
    <div id="carouselInicio" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php if (!$empresa->banners) {$empresa->banners = '01_Registrese43.png,03_solicite2.png,02_publique2.png';}
foreach (explode(',', $empresa->banners) as $i => $banner): ?>
          <?php if ($banner == "") {break;}
?>
            <li data-target="#carouselInicio" data-slide-to="<?=$i;?>"
              class="<?php if ($i == 0) {echo 'active';}
?>"></li>
          <?php endforeach?>
        </ol>
        <div class="carousel-inner" >
          <?php foreach (explode(',', $empresa->banners) as $i => $banner): ?>
          <?php if ($banner == "") {break;}
?>
            <div class="item anti-active <?php if ($i == 0) {echo 'active';}
?>">
            	<center>
                	<img src="<?=verificar_imagen('uploads/banners/' . $banner )?>" class="img-responsive banner">
            	</center>
             </div>
          <?php endforeach?>
        </div>
    </div>
  </div>
</div>



	<!--	<img class="banners img-responsive" src="<?=base_url()?>uploads/resize/SOP/banners/<?=$empresa->banners?>">-->


	</div>
</div>
<!--Div Productos destacados-->
<?php if ($productos):?>
<div class="producto_principales">
	<div class="title_productosPrincipales">
		<div class="col-md-3">
			<ul class="list_pro">
				<li>
					<ul class="active list_pro">
						<a class="title_producPrin" href="">Productos Principales</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<script type="text/javascript">

		var	infocus =1;
		var ant_galeria;
		var galeria1 =1;
		var galeria2 =1;
		var galeria3 =1;
		function my_test(id)
		{

			if(ant_galeria=="carrousel_destacados")
				galeria1=infocus;
			else if(ant_galeria=="carrousel_videos")
				galeria2=infocus;
			else
				galeria3=infocus;

			if(id=="carrousel_destacados")
				infocus=galeria1;
			else if(id=="carrousel_videos")
				infocus=galeria2;
			else
				infocus=galeria3;

			console.log(id+" "+ant_galeria+" "+galeria3 +" "+ galeria2 +" "+ galeria1);

			if(ant_galeria!=id)
				ant_galeria=id;

		}
		function wait(ms)
		{
			out=0;
			var n = (new Date()).getSeconds();
			do if((new Date()).getSeconds()!=n)out++;
			while(out!=ms);
		}
		function left(id)
		{
			my_test(id);

			if(document.getElementById(id).childNodes.length-infocus>8)
			{
				document.getElementById(id).childNodes[infocus].className+='_run';

				wait(500);

				div_class=document.getElementById(id).childNodes[infocus].className;
				document.getElementById(id).childNodes[infocus].className=div_class.replace('_run','_hidden');
				console.log('flan');
				infocus+=2;
			}
			//else{infocus =1;left(id);}
		}
		function rigth(id)
		{

			my_test(id);

			if(infocus>=3)//&&document.getElementById(id).childNodes.length)
			{
				infocus-=2;
				div_class=document.getElementById(id).childNodes[infocus].className;
				document.getElementById(id).childNodes[infocus].className=div_class.replace('_hidden','_run');
				/*
				wait(500);
				*/
				document.getElementById(id).childNodes[infocus].className=div_class.replace('_hidden','');
			}
			//else{infocus =1;left(id);}
		}
	</script>
	<div class="container_productos_principales col-md-12">
		<a href="JavaScript:rigth('carrousel_destacados')">
			<span class="ico_flecha_left glyphicon glyphicon-chevron-left" ></span>
		</a>
		<a href="JavaScript:left('carrousel_destacados')">
			<span class="ico_flecha_right glyphicon glyphicon-chevron-right"></span>
		</a>

		<div id="carrousel_destacados" class="contenedor_productos_item">
		<?php $tag = "";foreach ($destacados as $key => $producto): ?>
		<?php if (!$producto || $producto->nombre == "") {continue;}
$tag .= $producto->nombre . ',';?>
			<div class="item_procud">
				<div class="imagen_producto"><a href="<?=base_url()?>producto/ver/<?=$producto->id?>"><img class="img_producto" src="<?=$producto->imagenes?>"></div></a>
				<div class="contexto_producto">
					<div class="textos">
						<div class="info_producto">
							<a class="nombre_producto" href="<?=base_url()?>producto/ver/<?=$producto->id?>"><p class="nombre_producto"><?=$producto->nombre?></p></a>
						</div>
						<p class="texto_precio"><?php if ($producto->precio_unidad == 0) {echo "Precio a convenir.";} else {echo '$' . decimal_points($producto->precio_unidad);}
?></p>
						<p class="unidades"><?php if ($producto->pedido_minimo == 0) {echo "Pedido mínimo a convenir.</p>";} else {echo decimal_points($producto->pedido_minimo) . " " . ($producto->medida) . '<p class="pedido">pedido mínimo</p>';}
?>
					</div>
				</div>
				<div class="mini-logo">
					<img class="img-responsive mini-logo2" src="<?=verificar_imagen('uploads/resize/SOP/logos2/'.$empresa->logo)?>">
				</div>
			</div>
		<?php endforeach;?>
            <?php foreach ($productos as $key => $producto): ?>
              <?php if (!$producto || $producto->nombre == "") {continue;} $tag .= $producto->nombre . ',';?>
                        <div class="item_procud">
                            <div class="imagen_producto"><a href="<?=base_url()?>producto/ver/<?=$producto->id?>"><img class="img_producto" src="<?=verificar_imagen('uploads/'.$producto->imagenes)?>"></div></a>
                            <div class="contexto_producto">
                                <div class="textos">
                                    <div class="info_producto">
                                        <a class="nombre_producto" href="<?=base_url()?>producto/ver/<?=$producto->id?>"><p class="nombre_producto"><?=$producto->nombre?></p></a>
                                    </div>
                                    <p class="texto_precio">
                                    <?php 
                                        if ($producto->precio_unidad == 0) 
                                        {echo "Precio a convenir.";} 
                                        else 
                                        {echo '$' . decimal_points($producto->precio_unidad);}
                                    ?>
                                    </p>
                                    <p class="unidades">
                                    <?php 
                                        if ($producto->pedido_minimo == 0)
                                        {echo "Pedido mínimo a convenir.</p>";}
                                        else 
                                        {echo decimal_points($producto->pedido_minimo) . " " . ($producto->medida) . '<p class="pedido">pedido mínimo</p>';}
                                     ?>
                                    </p>
                                </div>
                            </div>
                            <div class="mini-logo">
                                <img class="img-responsive mini-logo2" src="<?=verificar_imagen('uploads/resize/SOP/logos2/'.$empresa->logo)?>">
                            </div>
                        </div>
                    <?php endforeach;?>
		</div>
		<div class="vercatalogo col-md-12 col-lg-12">
			<span class="glyphicon glyphicon-th-list"></span>
			<a class="texto_vercatalogo" href="<?=base_url()?>empresa/catalogo_producto/<?=$empresa->url?>">Ver Catálogo > </a>
		</div>
	</div>
<?php endif;?>
	<div class="conten_btn_soli_coti col-md-12" data-toggle="modal" data-target="#asistentes_proveedor_popup">
		<button class="btn btn_soli">
			<i class="icono-soli fa fa-file-text"></i>
			<p class="texto-soli">SOLICITAR COTIZACION</p>
		</button>
	</div>
</div>
<?php if ($empresa->videos): ?>
<div class="videos_empresa">
	<div class="title_videos col-md-12">
		<div class="col-md-4">
			<ul class="list-title-videos">
				<li>
					<ul class="active list-title">
						<a class="texto-nuestra_empresa">Videos de la empresa</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="contenido_videos col-md-12">
		<a href="JavaScript:rigth('carrousel_videos')">
			<span class="flecha-left-galeria glyphicon glyphicon-chevron-left" ></span>
		</a>
		<a href="JavaScript:left('carrousel_videos')">
			<span class="flecha-right-galeria glyphicon glyphicon-chevron-right"></span>
		</a>
		<div id="carrousel_videos">
		<?php foreach (explode(',', $empresa->videos) as $key => $value): ?>
		<?php if ($value == '') {continue;}
?>
					<div class="item_video">
						<div class="item-video">
							<div class="video">
								<iframe  allowfullscreen onload="textodeiframe(this)" id="video_<?=$key?>?showinfo=1" class="img_video img-responsive" src="<?=$value?>"></iframe>
							</div>
							<div class="titulo_video">
								<p id="data_video_<?=$key?>"></p>
							</div>
						</div>
					</div>
		<?php endforeach;?>
		</div>
	</div>
</div>
<?php endif;?>
<div class="contenedor_nuestraempresa">
	<div class="nuestra_empresa col-md-12">
		<div class="col-md-3">
			<ul class="list-title">
				<li>
					<ul class=" active list-title-nuestra">
						<a class="texto-nuestra_empresa">Nuestra Empresa</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="info_nuestra_empresa col-md-12">
		<div class="container_nues_empresa col-md-12">
			<div class="title-nom_empresa"><p class="texto_nom_empre"><?=$empresa->nombre?></p></div>
			<div class="conten_info col-md-8">
				<div class="info">
					<div class="tipo_empresa inline-block">
						<img class="style_empresa img-responsive" src="<?=base_url()?>assets/img/membresia/logo_mem_platino.png">
						<p class="inline-block">Empresa Oro</p>
					</div>
					s
					<div class="boton_descargar inline-block">
						<span class="ico_descar glyphicon glyphicon-download-alt"></span>
						<a href="<?=base_url()?>empresa/descargar_catalogo/<?=$empresa->url?>"><p class="texto_des_cata">Descargar Catálogo</p></a>
					</div>
				</div>
				<div class="texto_nuestra_empresa">
					<p class="texto1">Tipo de Empresa: <a class="text02"><?=$empresa->tipo?></a> </p>
					<p class="texto1">Productos Principales: <a class="text02"><?=$empresa->productos_principales?></a></p>
					<p class="texto_descripcion"><?=$empresa->descripcion?></p>
					<p id="telefonos" style="display:none;font-size:21px;"><b>Teléfono:</b> <?=$usuario->telefono?> <b>Cel:</b> <?=$usuario->celular?> </p>
				</div>
				<div class="row">
					<div class="col-md-7 botones_contac">
						<button class="btn llamar_empresa" onclick="if(document.getElementById('telefonos').style.display==''){document.getElementById('telefonos').style.display='none'}else{document.getElementById('telefonos').style.display='';}">
							<span class="icon_compartir glyphicon glyphicon-earphone"></span>
							<p class="texto_contacto" >Llamar a la Empresa</p>
						</button>
						<button class="btn contactar_empresa" onclick="mensajes()">
							<span class="icon_compartir glyphicon glyphicon-envelope"></span>
							<p class="texto_contacto">Contactar Empresa</p>
						</button>
					</div>
					<div class="col-md-5 botones_contac">
						<div class="inline">
							<p class="texto_redes">Compartir:
								<span>
									<img class="style-sonisa img-responsive" src="<?=base_url()?>assets/img/sonrisaprecio.png">
								</span>
							</p>
						</div>
						<?php echo form_buttons_socials() ?>
					</div>
				</div>
			</div>
			<div class="logo_empresa_3 col-md-4">
				<img class="logo_nuestra img-responsive logo" src="<?=verificar_imagen('uploads/resize/SOP/logos3/'.$empresa->logo)?>">
			</div>
		</div>
	</div>
</div>

<?php if ($empresa->imagenes): ?>
<div class="contenido_galeria">
	<div class="galeria_imagenes col-md-12">
		<div class="col-md-3">
			<ul class="list-title-galeria">
				<li>
					<ul class=" active list-title-galeria">
						<a class="texto-galeria_imagenes">Galeria</a>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="contenedor_galeria col-md-12">
		<a href="JavaScript:rigth('carrousel_imagenes')">
			<span class="flecha-left-galeria glyphicon glyphicon-chevron-left" ></span>
		</a>
		<a href="JavaScript:left('carrousel_imagenes')">
			<span class="flecha-right-galeria glyphicon glyphicon-chevron-right"></span>
		</a>
		<div id="carrousel_imagenes" class="carrousel_imagenes_class">
		<?php foreach ($imagenes as $key => $value): ?>
		 <?php if ($value == '') {continue;}
?>
					<div class="item_galeria">
						<div class="item-galeria" onclick="show('<?=$key?>')">
							<div class="galeria">
								<img id="img_<?=$key?>" class="img_galeria img-responsive" src="<?=verificar_imagen('uploads/resize/SOP/imagenes/'.$value)?>">
							</div>
							<div class="titulo_galeria">
								<p><?php if ($titulos[$key] != 'Imagen') {echo $titulos[$key];}
?></p>
							</div>
						</div>
					</div>
		<?php endforeach;?>
		</div>
	</div>
</div>
<?php endif;?>
<div class="conten_btn_soli_coti col-md-12" data-toggle="modal" data-target="#asistentes_proveedor_popup">
	<button class="btn btn_soli">
		<i class="icono-soli fa fa-file-text"></i>
		<p class="texto-soli">SOLICITAR COTIZACION</p>
	</button>
</div>

<div class="contenido_contacto col-md-12">
	<div class="col-md-10">
		<ul class="item_contactenos">
			<li>
				<ul class="active item_contactenos">
					<p class="texto_contac">Contáctenos</p>
				</ul>
			</li>
		</ul>

	</div>
	<div class="col-md-2"></div>
</div>

<div class="contenido_info_contacto col-md-12">
	<div class="col-md-12">
		<div class="col-md-8" style="padding: 0;">
		<div class="informacion-contacto">
			<?php
				$telefonos;
				if($usuario->indicativo!=0)
				$telefonos.="PBX: ".$usuario->indicativo; 
				if($usuario->telefono!=0)
				$telefono.=" Extensión: ".$usuario->extension;
				?>
				<div class="title_info">
					<span class="icono_info glyphicon glyphicon-earphone"></span>
					<p class="title_texto_info">Teléfono</p>
				</div>
				<div class="conten_into">
					<p class="text_info">Celular: <?=$usuario->celular?></p>
					<p class="text_info"><?=$telefonos?></p>
				</div>

				<?php if ($usuario->direccion): ?>
				<div class="title_info">
					<span class="icono_info glyphicon glyphicon-home"></span>
					<p class="title_texto_info">Dirección</p>
				</div>
				<div class="conten_into">
					<p class="text_info"><?=$usuario->direccion?></p>
				</div>

				<?php endif;?>
				<div class="title_info">
					<span class="icono_info glyphicon glyphicon-map-marker"></span>
					<p class="title_texto_info">Ubicación</p>
				</div>
				<div class="conten_into">
					<p class="text_info"><?=$usuario->ciudad?> - <?=$usuario->departamento?> - <?=$usuario->pais?></p>
				</div>

				<?php if ($usuario->web): ?>
					<div class="title_info">
						<span class="icono_info glyphicon glyphicon-globe"></span>
						<p class="title_texto_info">Página Web</p>
					</div><?php
					if($usuario->web!=str_replace('http://', "",$usuario->web))
						$web=$usuario->web;
					else
						$web="http://".$usuario->web;
					?>
					<div class="conten_into">
						<p class="text_info" onclick="location.href='<?=$web?>'"><a href='<?=$usuario->web?>'><?=$web?></a></p>
					</div>
				<?php endif;?>
				<?php if ($usuario->facebook): ?>
						<div class="title_info">
							<i class="icono_info fa fa-facebook-square"></i>
							<p class="title_texto_info">Facebook</p>
						</div>
						<div class="conten_into">
							<p class="text_info" onclick="location.href='<?=$usuario->facebook?>'"><a href='<?=$usuario->facebook?>'><?=$usuario->facebook?></a></p>
						</div>
					<?php endif;?>
					<?php if ($usuario->twitter): ?>
						<div class="title_info">
							<i class="icono_info fa fa-twitter-square"></i>
							<p class="title_texto_info">Twitter</p>
						</div>
						<div class="conten_into">
							<p class="text_info" onclick="location.href='<?=$usuario->twitter?>'"><a href='<?=$usuario->twitter?>'><?=$usuario->twitter?></a></p>
						</div>
					<?php endif;?>
					<?php if ($usuario->linkedin): ?>
						<div class="title_info">
							<i class="icono_info fa fa-linkedin-square"></i>
							<p class="title_texto_info">Linkedin</p>
						</div>
						<div class="conten_into">
							<p class="text_info" onclick="location.href='<?=$usuario->linkedin?>'"><a href='<?=$usuario->linkedin?>'><?=$usuario->linkedin?></a></p>
						</div>
					<?php endif;?>
					<?php if ($usuario->youtube): ?>
					<div class="title_info">
						<i class="icon_redes_sociales fa fa-youtube"></i>
						<p class="title_texto_info">Youtube</p>
					</div>
					<div class="conten_into">
						<p class="text_info" onclick="location.href='<?=$usuario->youtube?>'"><a href='<?=$usuario->youtube?>'><?=$usuario->youtube?></a></p>
					</div>
					<?php endif;?>
					<!--
				<div class="title_info">
					<span class="icono_info glyphicon glyphicon-thumbs-up"></span>
					<p class="title_texto_info">Redes Sociales</p>
				</div>
				<ul class="item_redes_sociales">
					<li>
						<ul class="item_redes_sociales">
							<a class="nombre_redes" href="<?=$usuario->facebook?>">Facebook</a>
							<i class="icon_redes_sociales fa fa-facebook-square"></i>
						</ul>
					</li>
					<li>
						<ul class="item_redes_sociales">
							<a class="nombre_redes" href="<?=$usuario->twitter?>">Twitter</a>
							<i class="icon_redes_sociales fa fa-twitter-square"></i>
						</ul>
					</li>
					<li>
						<ul class="item_redes_sociales">
							<a class="nombre_redes" href="<?=$usuario->youtube?>">Youtube</a>
							<i class="icon_redes_sociales fa fa-youtube"></i>
						</ul>
					</li>
					<li>
						<ul class="item_redes_sociales">
							<a class="nombre_redes" href="<?=$usuario->linkedin?>">Linkedin</a>
							<i class="icon_redes_sociales fa fa-linkedin-square"></i>
						</ul>
					</li>
				</ul>
			-->
		</div>
		</div>
		<div class="col-md-4" style="padding: 0;">
			<div class="logo_empresa_2">
				<img class="con_logo img-responsive logo" src="<?=verificar_imagen('uploads/logos/'.$empresa->logo)?>">
			</div>
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


<style type="text/css">
/**
 *Para dar estilos a un div, imagen u objeto especifico
 *solo se referencia el objeto anteponieendo el caracter '#'
 *al id del objeto se abren llaves y se especifican a continuacion
 *los atributos de estilo deseados
 **/
#conten_pantalla
{
  height: 600px;
  width: 1000px;
  margin-left: -200px!important;
}
#pantalla
{
  max-width: 100%;
  max-height: 100%;
  position: relative;
  /*
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  */
}
#conten_pantalla2
{
  left: 10%;
  height:80%;
  width: 80%;
}
</style>
<div class="slide_producto" >
    <div class="modal fade" id="popup_slider" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog" >
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
          <div id="conten_pantalla" class="carousel-inner">
            <center>
              <div  id="conten_pantalla2" class="item">
                  <img id="pantalla" src="<?=base_url()?>uploads/resize/SOP/banners/11.jpg" alt="...">
              </div>
           </center>
          </div>

        <!-- Controls -->
          <a class="left carousel-control" href="JavaScript:anterior_imagen();" role="button" style="margin-left: -286px;">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="JavaScript:proxima_imagen();" role="button" style="margin-right: -286px;">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>
    </div>
  </div>
</div>
<a data-toggle="modal" data-target="#popup_slider" id="launch_popup_slider"></a>
<script type="text/javascript">
var imagen=0;
function show(in1)
{
	document.getElementById('pantalla').src=document.getElementById('img_'+in1).src.replace('resize/SOP/','');
	document.getElementById('launch_popup_slider').click();
	imagen=in1;
}
function anterior_imagen()
{
	if(imagen<0){imagen=<?=$key?>;}
	document.getElementById('pantalla').src=document.getElementById('img_'+(--imagen)).src.replace('resize/SOP/','');
}
function proxima_imagen()
{
	if(imagen><?=$key?>){imagen=0;}
	document.getElementById('pantalla').src=document.getElementById('img_'+(++imagen)).src.replace('resize/SOP/','');
}

</script>
