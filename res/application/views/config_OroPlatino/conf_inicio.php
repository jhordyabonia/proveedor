<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/config_OroPlatino/conf_cata_produc.css">


<div class="contenedor-config">
	<div class="title-config">
		<div class="conten-title col-xs-12 col-md-12 col-lg-12">
			<i class="ico-style-config fa fa-cog"></i>
			<h3 class="text-title-config">Configuracion</h3>
		</div>
	</div>
	<div class="container-config">
		<div class="conten-config6 col-xs-12 col-md-12 col-lg-12">
			<div class="conten-item6 col-xs-12 col-md-3 col-lg-3">
				<h3 class="text-item">General</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-perfil fa fa-building-o"></i>
					<a href="<?=base_url()?>config_empresa/perfil_empresa" class="text-subitem">Perfil de empresa</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-contacto fa fa-phone"></i>
					<a href="<?=base_url()?>config_empresa/contacto" class="text-subitem">Contacto</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-usuario fa fa-child"></i>
					<a href="<?=base_url()?>config_empresa/usuario" class="text-subitem">Usuario</a>
				</div>
				<h3 class="text-item-dos">Configurar Web</h3>
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-home"></span>
					<a href="<?=base_url()?>config_empresa/inicio" class="text-subitem">Inicio</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-th-list"></span>
					<a href="<?=base_url()?>config_empresa/publicar_producto" class="text-subitem">Subir Productos</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-bookmark"></span>
					<a href="<?=base_url()?>config_empresa/productos_principales" class="text-subitem">Productos Principales</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-briefcase"></span>
					<a href="<?=base_url()?>config_empresa/nosotros" class="text-subitem">Nosotros</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="ico-config-style2 fa fa-file-text"></i>
					<a href="<?=base_url()?>config_empresa/cotizaciones" class="text-subitem">Cotizaciones requeridas</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-open"></span>
					<a href="<?=base_url()?>config_empresa/catalogo" class="text-subitem">Subir Catálogo</a>
				</div>
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<span class="ico-cont-style glyphicon glyphicon-home"></span>
					Configurar Inicio
				</h3>

			<?=form_open_multipart(base_url().'editar_empresa/banners')?>
			<?php $banners=explode(',', $empresa->banners);?>
				<div class="content-config-inicio">
					<div class="titles">
						<h3 class="text-title-up">1. Subir imagenes centrales (Banners)</h3>
						<div class="conten-paso1">
							<p class="agreagar-text">Agregar avisos centrales a su página de inicio.</p> <p class="ver-ejm">- Ver ejemplo</p>
							<p class="medidas-recom">Medidas recomendadas 700 pixeles por 600px pixeles</p>
							<div class="img-banner">
								<div class="subir-img">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a href="JavaScript:document.getElementById('banner1').click()" class="text-up-img">Subir imágen 1</a>
									<div style="display:none" >
								  		<input type="file" id="banner1" name="banners[]"  onchange="JavaScript:load_new_logo(1);mostrar_div('div_img1','<?=$banners[0]?>')">/>
									</div>
								</div>
								<div id="div_img1" class="subido-img" style="display:<?php if($banners[0]==''){ echo 'none';}?>">
									<img id="img1" class="imge-subido banner_preview" src="<?=base_url()?>uploads/banners/<?php if($banners[0]==''){ echo '11.jpg';}else{echo $banners[0];} ?>">
									<p class="name-file"></p>
									<a href="JavaScript:ocultar_div('div_img1','<?=$banners[0]?>')" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>
							<div class="img-banner">
								<div class="subir-img">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a href="JavaScript:document.getElementById('banner2').click()" class="text-up-img">Subir imágen 2</a>
									<div style="display:none" >
								  		<input type="file" id="banner2" name="banners[]"  onchange="JavaScript:load_new_logo(2);mostrar_div('div_img2','<?=$banners[1]?>')">/>
									</div>
								</div>
								<div id="div_img2" class="subido-img" style="display:<?php if($banners[1]==''){ echo 'none';}?>">
									<img id="img2" class="imge-subido banner_preview" src="<?=base_url()?>uploads/banners/<?php if($banners[1]==''){ echo '11.jpg';}else{echo $banners[1];} ?>">
									<p class="name-file"></p>
									<a href="JavaScript:ocultar_div('div_img2','<?=$banners[1]?>')" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>									
								</div>
							</div>
							<div class="img-banner">
								<div class="subir-img">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a href="JavaScript:document.getElementById('banner3').click()" class="text-up-img">Subir imágen 3</a>
									<div style="display:none" >
								  		<input type="file" id="banner3" name="banners[]"  onchange="JavaScript:load_new_logo(3);mostrar_div('div_img3','<?=$banners[2]?>')">/>
									</div>
								</div>
								<div id="div_img3" class="subido-img" style="display:<?php if($banners[2]==''){ echo 'none';}?>">
									<img id="img3" class="imge-subido banner_preview" src="<?=base_url()?>uploads/banners/<?php if($banners[2]==''){ echo '11.jpg';}else{echo $banners[2];} ?>">
									<p class="name-file"></p>
									<a href="JavaScript:ocultar_div('div_img3','<?=$banners[2]?>')" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>

							<script type="text/javascript">
								function ocultar_div(id,img)
								{
									document.getElementById(id).style.display='none';
									document.getElementById('banners_eliminados').value+=img+',';
									console.log(id);
								}
								function mostrar_div(id,img)
								{
									document.getElementById(id).style.display='';
									document.getElementById('banners_eliminados').value+=img+',';
									console.log(id);
								}
								function load_new_logo(id)
			                    {
			                        var paths = document.getElementById('banner'+id).files;
			                        var navegador = window.URL || window.webkitURL;
			                        var url = navegador.createObjectURL(paths[0]);
			                        document.getElementById('img'+id).src=url; 		                        
	                    		}
                   			</script>
							
							<!-- Campo validacion -->
							<div class="input-group content_validacion3 col-xs-12 col-md-7 col-lg-7">
							  <p class="text_errors"></p>
							</div>

							<input type="hidden" name="banners_eliminados" id="banners_eliminados">

							<!-- Campo 7 -->
							<div class="input-group col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-guardar-inicio">
									<i class="ico-circle fa fa-floppy-o"></i>
									<p class="text-publicarPro">Guardar</p> 
								</button>
							</div>
    					<?=form_close()?>
						</div>
					</div>
				</div>
				<div class="content-config-inicio">
					<div class="titles">
						<h3 class="text-title-up">2. Subir Videos de Youtube <i class="ico-youtube fa fa-youtube"></i></h3>
						<div class="conten-paso2">
							<p class="agreagar-text">Agregar videos de Youtube a su página de inicio.</p> <p class="ver-ejm">- Ver ejemplo</p>
							<p class="medidas-recom">Copie las direcciones de los videos y peguelas en los campos respectivos (Maximo 20 videos)</p>
							
						<?=form_open_multipart(base_url().'editar_empresa/videos')?>
							<!-- Campo 1 -->
							
							<div id="videos" class="col-xs-12 col-md-9 col-lg-9">
								<?php foreach (explode(',',$empresa->videos) as $key => $video):?>
									<div class="input-group col-xs-3 col-md-2 col-lg-2">
									  <!--<input type="text" class="form-control" name="titulos_videos[]" value="<?=$video?>" placeholder="Introdusca dirección del video" style="border-radius: 0;">-->
									</div>
									<div class="input-group padig col-xs-12 col-md-6 col-lg-6">
									  <span class="fiel-tramspa padi2 input-group-addon">
									  	<?=$key+1?>
									  </span>
									  <input type="text" class="form-control" name="videos[]" value="<?=$video?>" placeholder="Introdusca titulo del video" style="border-radius: 0;">
									<a href="JavaScript:borrar_videos(<?=$key?>)" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
									</div>
								<?php endforeach;?>
							</div>
							<div class="conten-mas-videos col-xs-12 col-md-5 col-lg-5">
								<script type="text/javascript">
									videos=<?=count(explode(',',$empresa->videos))?>;
									
									videos_archivos=new Array();
									function borrar_videos(id)
									{
										tmp_videos=document.getElementsByName('videos[]');
										tmp_videos[id].value='';
										i=0;
										for(i=id;i<tmp_videos.length-1;i++)
										{
											tmp_videos[i].value=tmp_videos[i+1].value;
										}
										tmp_videos[i].value='';
									}
									function salvar_videos()
									{
										tmp_videos=document.getElementsByName('videos[]');
										for(i=0;i<tmp_videos.length;i++)
										{
											imagenes_titulos[i]=tmp_videos[i].value;
										}
									}
									function fijar_videos()
									{
										tmp_videos=document.getElementsByName('videos[]');
										for(i=0;i<tmp_videos.length-1;i++)
										{
											tmp_videos[i].value=imagenes_titulos[i];
										}
									}
									function agregar_video()
									{
										for(var i=0;i<5;i++)
										{
											salvar_videos();
											if(videos>=20){alert('Limite exedido.');return;}
											DOM='<div class="input-group padig col-xs-12 col-md-5 col-lg-5">';
											DOM+='<span class="fiel-tramspa padi2 input-group-addon">';
											DOM+=++videos;
											DOM+='</span>';
											DOM+='<input type="text" class="form-control" name="videos[]" value="" placeholder="Introdusca dirección del video" style="border-radius: 0;">';
											DOM+='<a href="JavaScript:borrar_videos('+videos+')" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>';
											DOM+='</div>';
											document.getElementById('videos').innerHTML+=DOM;
											fijar_videos();
										}
									}
								</script>
							  <a class="agregar-mas-videos" href="JavaScript:agregar_video()"><i class="ico-mas fa fa-plus-circle"></i> Agregar más videos</a>
							</div>

							<!-- Campo validacion -->
							<div class="input-group content_validacion3 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors"></p>
							</div>

							<!-- Campo 7 -->
							<div class="input-group col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-guardar-inicio" type="submit">
									<i class="ico-circle fa fa-floppy-o"></i>
									<p class="text-publicarPro">Guardar</p> 
								</button>
							</div>
    					<?=form_close()?>
						</div>
					</div>
				</div>
				<div class="content-config-inicio">
					<div class="titles">
						<h3 class="text-title-up">3. Subir imagenes de la Empresa</h3>
						<div class="conten-paso3">
							<p class="agreagar-text3">Agregar imagenes de la empresa a la página de inicio (Maximo 20 imagenes).</p>
							
						<?=form_open_multipart(base_url().'editar_empresa/imagenes')?>
							<!-- Campo 1 -->
							<script type="text/javascript">
									imagenes=<?=count($titulos)?>;
									imagenes_titulos=new Array();
									imagenes_archivos=new Array();
									function salvar_imagenes()
									{
										tmp_titulos=document.getElementsByName('imagenes_titulos[]');
										for(i=0;i<tmp_titulos.length;i++)
										{
											imagenes_titulos[i]=tmp_titulos[i].value;
										}
										tmp_titulos=document.getElementsByName('imagenes[]');
										for(i=0;i<tmp_titulos.length;i++)
										{
											imagenes_archivos[i]=tmp_titulos[i].files;
										}
										/*
										*/
										console.log(imagenes_titulos);
									}
									function fijar_imagenes()
									{
										tmp_titulos=document.getElementsByName('imagenes_titulos[]');
										for(var i=0;i<tmp_titulos.length-1;i++)
										{
											tmp_titulos[i].value=imagenes_titulos[i];
										}
										tmp_titulos=document.getElementsByName('imagenes[]');
										for(i=0;i<tmp_titulos.length;i++)
										{
											tmp_titulos[i].files=imagenes_archivos[i];
										}
									/*
									*/
									}
									function agregar_images()
									{
										for(var i=0; i<5; i++)
										{
											salvar_imagenes();
											if(imagenes>=20){alert('Limite exedido.');return;}
											
											DOM='<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">';
											DOM+='<div class="input-group padig col-xs-12 col-md-12 col-lg-12">';
											DOM+='<span class="fiel-tramspa padi2 input-group-addon">';
											DOM+=imagenes;
											DOM+='</span>';
											DOM+='<input type="text" class="form-control" value="" name="imagenes_titulos[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">';
											DOM+='</div></div><div class="img-banner"><div class="subir-img2">';
											DOM+='<span class="ico-up glyphicon glyphicon-open"></span>';
											DOM+='<a href="JavaScript:document.getElementById('+"'banner"+(imagenes+4)+"'"+').click()" class="text-up-img">Subir imágen '+imagenes+'</a>';
											DOM+='<div style="display:none" >';
											DOM+='<input type="file" id="banner'+(imagenes+4)+'" name="imagenes[]"  onchange="JavaScript:load_new_logo('+(imagenes+4)+')">/>';
											DOM+='</div></div><div  id="div_img'+(imagenes+4)+'"  class="subido-img2">';
											DOM+='<img id="img'+(imagenes+4)+'" class="imge-subido img_preview" src="<?=base_url()?>uploads/default.jpg">';
											DOM+='<p class="name-file"></p>';
											DOM+='<a href="JavaScript:document.getElementById('+"'img"+(imagenes+4)+"'"+').src="<?=base_url()?>uploads/default.jpg;" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>';
											DOM+='</div></div>';
											document.getElementById('imagenes').innerHTML+=DOM;
											fijar_imagenes();
											imagenes++;
										}
									}
									function eliminar_img(input,key)
									{
										document.getElementById('eliminados').value+=input+',';
										document.getElementById('div_img'+key).style.display='none';
										//console.log(input);
									}
									/*
									function eliminar_img(input,key)
									{
										document.getElementById('eliminados').value+=input+',';
										document.getElementById('div_img'+key).style.display='none';
										//console.log(input);
									}*/
								</script>
								<input type='hidden' value="" name='eliminados' id='eliminados'>
								<div id="imagenes">
									<?php foreach($titulos as $key => $titulo):?>
										<?php if( $key>count($imagenes)){break;}?>
										<?php if( $titulo==''||$titulo==','){break;}?>
										<?php if( $imagenes[$key]==NULL){continue;}?>
										<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">
											<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
											  <span class="fiel-tramspa padi2 input-group-addon">
											  	<?=$key+1?>
											  </span>
											  <input type="text" class="form-control" value="<?=$titulo?>" name="imagenes_titulos[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">
											</div>
										</div>							
										<div class="img-banner">
											<div class="subir-img2">
												<span class="ico-up glyphicon glyphicon-open"></span>
												<a href="JavaScript:document.getElementById('banner<?=$key+4?>').click()" class="text-up-img">Subir imágen <?=$key+1?></a>
												<div style="display:none" >
											  		<input type="file" id="banner<?=$key+4?>" name="imagenes[]"  onchange="JavaScript:load_new_logo(<?=$key+4?>)">/>
												</div>
											</div>
											<div id="div_img<?=$key+4?>" class="subido-img2">
												<img id="img<?=$key+4?>" class="imge-subido img_preview" src="<?php echo base_url()?>uploads/imagenes/<?=$imagenes[$key]?>">
												<p class="name-file"></p>
												<a href="JavaScript:eliminar_img('<?=$imagenes[$key]?>',<?=$key+4?>)" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
											</div>
										</div>
									<?php endforeach;?>
								</div>
							<!-- Campo 1 -->
							<div class="conten-mas-videos col-xs-12 col-md-5 col-lg-5">
							  <a class="agregar-mas-videos2" href="JavaScript:agregar_images();"><i class="ico-mas fa fa-plus-circle"></i> Agregar más imagenes</a>
							</div>

							<!-- Campo validacion -->
							<div class="input-group content_validacion4 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors"></p>
							</div>

							<!-- Campo 7 -->
							<div class="input-group col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-guardar-inicio2">
									<i class="ico-circle fa fa-floppy-o"></i>
									<p class="text-publicarPro">Guardar</p> 
								</button>
							</div>							
    					<?=form_close()?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>