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
							<p class="agreagar-text">Agregar avisos centrales a su página de inicio.</p> <p class="ver-ejm"><!-- - Ver ejemplo --></p>
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
									<img id="img1" class="imge-subido banner_preview" src="<?=base_url()?>uploads/resize/SOP/banners/<?=$banners[0]?>">
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
									<img id="img2" class="imge-subido banner_preview" src="<?=base_url()?>uploads/resize/SOP/banners/<?=$banners[1]?>">
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
									<img id="img3" class="imge-subido banner_preview" src="<?=base_url()?>uploads/resize/SOP/banners/<?=$banners[2]?>">
									<p class="name-file"></p>
									<a href="JavaScript:ocultar_div('div_img3','<?=$banners[2]?>')" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>

							<script type="text/javascript">
                                function contents(need,stack)
                                {
                                    return !stack.replace(need,'')==stack;                                    
                                } 
								function ocultar_div(id,img)
								{
									document.getElementById(id).style.display='none';
									if(!contents(img,document.getElementById('banners_eliminados').value))
									    document.getElementById('banners_eliminados').value+=img+',';
									console.log(img);
                                    console.log(document.getElementById('banners_eliminados').value);                                  
								}
								function mostrar_div(id,img)
								{
									document.getElementById(id).style.display='';
                                    if(img!=0)
									    if(!contents(img,document.getElementById('banners_eliminados').value))
										    document.getElementById('banners_eliminados').value+=img+',';
									console.log(img);
                                    console.log(document.getElementById('banners_eliminados').value);
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
							<p class="agreagar-text">Agregar videos de Youtube a su página de inicio.</p> <p class="ver-ejm"><!-- - Ver ejemplo --></p>
							<p class="medidas-recom">Copie las direcciones de los videos y peguelas en los campos respectivos (Maximo 20 videos)</p>
							
						<?=form_open_multipart(base_url().'editar_empresa/videos')?>
							<!-- Campo 1 -->
							
							<div id="videos" class="col-xs-12 col-md-12 col-lg-12">
								<?php $key=0; foreach (explode(',',$empresa->videos) as $key => $video):?>
									<div class="input-group padig col-xs-12 col-md-8 col-lg-8">
									  <span class="fiel-tramspa padi2 input-group-addon">
									  	<?=$key+1?><!-- Url:<br>-->
									  </span>
									  <input id="v_<?=$key?>" type="text" class="form-control" onchange="document.getElementById('a_<?=$key?>').style.display=''" name="videos[]" value="<?=$video?>" placeholder="Introduzca dirección del video" style="border-radius: 0;width: 74%;">
									<a id="a_<?=$key?>"  style="display:<?php if(!$video){echo 'none';}?>" href="JavaScript:borrar_videos(<?=$key?>)" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
									</div>
									<!--
									<div class="input-group padig col-xs-12 col-md-5 col-lg-5">
									<span class="fiel-tramspa padi2 input-group-addon">
									  Nombre:<br>
									  </span>
									<input type="text" class="form-control" name="videos[]" value="" placeholder="Introdusca titulo del video" style="border-radius: 0;">
									</div>-->
								<?php endforeach;?>
									</div>
							<div class="conten-mas-videos col-xs-12 col-md-5 col-lg-5">
								<script type="text/javascript">
									videos=<?=count(explode(',',$empresa->videos))?>;
									
									videos_archivos=new Array();
									function borrar_videos(id)
									{
                                        document.getElementById('a_'+id).style.display='none';
										//tmp_videos=document.getElementsByName('videos[]');
										//tmp_videos[id].value='';
                                        document.getElementById('v_'+id).value='';
										/*i=0;
										for(i=id;i<tmp_videos.length-1;i++)
										{
											tmp_videos[i].value=tmp_videos[i+1].value;
										}
										tmp_videos[i].value='';*/
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
											DOM='<div class="input-group padig col-xs-12 col-md-8 col-lg-8">';
											DOM+='<span class="fiel-tramspa padi2 input-group-addon">';
											DOM+=++videos;
											DOM+='</span>';
											DOM+='<input id="v_'+videos+'" type="text" onchange="document.getElementById('+"'a_"+videos+"'"+').style.display='+"'';"+'"  class="form-control" name="videos[]" value="" placeholder="Introduzca dirección del video" style="border-radius: 0;width: 74%;">';
											DOM+='<a style="display:none" id="a_'+videos+'" href="JavaScript:borrar_videos('+videos+')" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>';
											DOM+='</div>';
											document.getElementById('videos').innerHTML+=DOM;
											fijar_videos();
										}
									}
                                    window.onload=function(){agregar_video();};
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
                            <div id="content-img" class="col-md-12 col-xs-12 col-lg-12 ">
                                <?php foreach($imagenes as $key => $imagen):?>
                                <?php if($imagen==''){continue;}?>
                                     <div align="center" class="img-content black col-md-3 col-lg-3 col-xs-3">                                         
                                        <a id="link<?=$key?>";  href="javaScript:remove_img(<?=$key?>)">
                                            <span class="borrar">X</span>
                                        </a>
                                        <a href="javaScript:document.getElementById('<?=$key?>_input').click();">
                                            <img id="galeria<?=$key?>" alt="Subir imagen" class="img" src=<?=verificar_imagen('uploads/'.$imagen)?>>
                                        </a>
                                        <input class="titulo_img input-editing"  placeholder="Titulo de la imágen" name="tiulos[]" value="<?=$titulos[$key]?>">
                                        <div style="display:none"><input id="<?=$key?>_input" type="file" name="imagenes[]" onchange="show_img(<?=$key?>);"></div>
                                     </div>
                                 <?php endforeach;?>
                                 <?php if($key<20):?>
                                    <div id="last" align="center" class="img-content simg col-md-3 col-lg-3 col-xs-3">
                                        <a href="javaScript:add_img();">
                                          <h4 class="img-subit-titulo">Subir imagen <i class="ico-up glyphicon glyphicon-open"></i> </h4>
                                        </a>
                                    </div>
                                 <?php endif;?>
                            </div>
                            <script>
                                var id_global=<?=$key;?>;
                                function show_img(id)
			                    {   
                                    var input;             
                                    if(id.type=='change')
                                     input =id.target;
                                    else
                                     input = document.getElementById(id+"_input");
			                        var paths = input.files;
			                        var navegador = window.URL || window.webkitURL;
			                        var url = navegador.createObjectURL(paths[0]);
                                    id=input.id.substr(0,1);
                                    var img=document.getElementById('galeria'+id);
                                    img.src= url;
                                    
                                    img.parentElement.parentElement.className="img-content black col-md-3 col-lg-3 col-xs-3";
                                    if(document.getElementById('link'+id)!=null)
                                    img.parentElement.parentElement.removeChild(document.getElementById('link'+id));
                                    
	                    		}
                                function remove_img(id)
                                {                                
                                    if(document.getElementById('link'+id)!=null)return;
                                    var a = document.createElement('a');
                                    a.href="javaScript:document.getElementById('"+id+"_input').click();";
                                    a.id="link"+id;                              
                                    var h = document.createElement('h4');
                                    h.className="img-subit-titulo"
                                    h.textContent=" Subir imagen";                              
                                    var i = document.createElement('i'); 
                                    i.className="ico-up glyphicon glyphicon-open";
                                    var img=document.getElementById('galeria'+id);
                                    img.src= '';
                                    a.appendChild(h);
                                    h.appendChild(i);
                                    img.parentElement.parentElement.appendChild(a);
                                    img.parentElement.parentElement.className="img-content white col-md-3 col-lg-3 col-xs-3";
                                }
                                function add_img()
                                {
                                    var id=id_global+1;
                                    
                                    doc=document.getElementById('content-img');   
                                    last=document.getElementById('last');    
                                    
                                    var  div1=document.createElement('div');
                                    div1.className="img-content white col-md-3 col-lg-3 col-xs-3";
                                    if(id < 20 )                               
                                        {div1.innerHTML=last.innerHTML;} 
                                     else
                                        {div.className="";}
                                    div1.align="center"; 
                                    last.innerHTML="";
                                    last.id="";
                                    div1.id="last";                                                                      
                                    
                                    var a_remove = document.createElement('a');
                                    a_remove.href="javaScript:remove_img("+id+");";
                                    var span = document.createElement('span');
                                    span.textContent="X";
                                    span.className="borrar";
                                    
                                    var a = document.createElement('a');
                                    a.href="javaScript:document.getElementById('"+id+"_input').click();";
                                    
                                    var img = document.createElement('img');
                                    img.id="galeria"+id;
                                    img.className="img";
                                    
                                    var input = document.createElement('input');
                                    input.className="titulo_img input-editing";
                                    input.placeholder="Titulo de la imágen";
                                    input.name="tiulos[]";
                                                                        
                                    var div2=document.createElement('div');
                                    div2.style.display='none';
                                    
                                    var inputFile = document.createElement('input');
                                    inputFile.id=id+"_input";
                                    inputFile.type="file";
                                    inputFile.name="imagenes[]";                                           
                                    
                                    a_remove.appendChild(span);
                                    last.appendChild(a_remove);
                                    
                                    a.appendChild(img);
                                    last.appendChild(a);
                                    last.appendChild(input); 
                                    div2.appendChild(inputFile);
                                    last.appendChild(div2);                                   
                                    
                                    doc.appendChild(div1);
                                    inputFile.click();  
                                    inputFile.onchange=show_img;   
                                    id_global=id;    
                                }
                            </script>
                                
                            <style>
                                .simg
                                {                                    
                                    background-color: white;
                                }
                                .img-subit-titulo
                                {
                                   padding-top: 22%;
                                   color: black;
                                }
                                .borrar
                                {
                                   position: absolute;
                                    padding: 5px;
                                    right: 0PX;
                                    z-index: 1;
                                    background-color: rgba(0,0,0,0.1);
                                    color:white;
                                }
                                .titulo_img
                                {
                                    position: absolute;
                                    bottom: 0px;
                                    left: 0px;
                                    z-index: 1;
                                    width: 100%;
                                }
                                .input-editing 
                                {
                                    background-color: rgba(0,0,0,0.3);
                                    color: white;
                                    border: none;
                                    text-align:center;
                                }
                                .img-content
                                {                                   
                                    height: 139px;
                                    width: 214px;
                                    border: 3px solid white;
                                }
                                .black{background-color: rgb(0, 0, 0);}
                                .whitesmoke{background-color: rgb(245, 245, 245);}
                                .img
                                {
                                   max-height:100%;                                    
                                   max-width:100%;                                   
                                   padding: 2%;
                                   padding-top: 10%;
                                }
                            </style>
                        <!-- viejo maquetado de fijar_imagenes	
						<?=form_open_multipart(base_url().'editar_empresa/imagenes')?>
							
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
											DOM+='<input type="file" id="banner'+(imagenes+4)+'" name="imagenes[]"  onchange="JavaScript:load_new_logo('+(imagenes+4)+'); mostrar_div('+"'"+'borrar_video_'+(imagenes+4)+"'"+',0);"/>';
											DOM+='</div></div><div  id="div_img'+(imagenes+4)+'"  class="subido-img2">';
											DOM+='<img alt="." id="img'+(imagenes+4)+'" class="imge-subido img_preview" src="<?=base_url()?>uploads/file.jpg">';
											DOM+='<p class="name-file"></p>';
											DOM+='<a id="borrar_video_'+(imagenes+4)+'" href="JavaScript:eliminar_img2('+(imagenes+4)+');" class="btn-remov-img" style="display:none"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>';
											DOM+='</div></div>';
											document.getElementById('imagenes').innerHTML+=DOM;
											fijar_imagenes();
											imagenes++;
										}
									}
									function eliminar_img2(key)
									{
										document.getElementById('img'+key).src="<?=base_url()?>uploads/file.jpg";
										document.getElementById('borrar_video_'+key).style.display='none';
									}
									function eliminar_img(input,key)
									{
										eliminar_img2(key);
										document.getElementById('eliminados').value+=input+',';
										document.getElementById('borrar_video_'+key).style.display='none';
										//document.getElementById('div_img'+key).style.display='none';
										//console.log(input);
									}
									/*
									function eliminar_img(input,key)
									{
										document.getElementById('eliminados').value+=input+',';
										document.getElementById('div_img'+key).style.display='none';
										//console.log(input);
									}*/

									window.onload=function(){agregar_video();agregar_images()};
								</script>
								<input type='hidden' value="" name='eliminados' id='eliminados'>
								<div id="imagenes">
									<?php $key=0; foreach($titulos as $key => $titulo):?>
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
											  		<input type="file" id="banner<?=$key+4?>" name="imagenes[]"  onchange="JavaScript:load_new_logo(<?=$key+4?>);mostrar_div('borrar_video_<?=$key+4?>',0);"/>
												</div>
											</div>
											<div id="div_img<?=$key+4?>" class="subido-img2 imge-subido img_preview">
												<img id="img<?=$key+4?>" alt="'" class="imge-subido img_preview" src="<?php echo base_url()?>uploads/resize/SOP/imagenes/<?=$imagenes[$key]?>">
												<p class="name-file"></p>
												<a id="borrar_video_<?=$key+4?>" href="JavaScript:eliminar_img('<?=$imagenes[$key]?>',<?=$key+4?>)" class="btn-remov-img" ><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
											</div>
										</div>
									<?php endforeach;?>
                                    
										<!--
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
												<img id="img<?=$key+4?>" class="imge-subido img_preview" src="<?php echo base_url()?>uploads/resize/imagenes/default.jpg">
												<p class="name-file"></p>
												<a href="JavaScript:eliminar_img('<?=$imagenes[$key]?>',<?=$key+4?>)" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
											</div>
										</div>
										<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">
											<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
											  <span class="fiel-tramspa padi2 input-group-addon">
											  	<?=$key+2?>
											  </span>
											  <input type="text" class="form-control" value="<?=$titulo?>" name="imagenes_titulos[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">
											</div>
										</div>							
										<div class="img-banner">
											<div class="subir-img2">
												<span class="ico-up glyphicon glyphicon-open"></span>
												<a href="JavaScript:document.getElementById('banner<?=$key+5?>').click()" class="text-up-img">Subir imágen <?=$key+2?></a>
												<div style="display:none" >
											  		<input type="file" id="banner<?=$key+5?>" name="imagenes[]"  onchange="JavaScript:load_new_logo(<?=$key+5?>)">/>
												</div>
											</div>
											<div id="div_img<?=$key+5?>" class="subido-img2">
												<img id="img<?=$key+5?>" class="imge-subido img_preview" src="<?php echo base_url()?>uploads/resize/imagenes/default.jpg">
												<p class="name-file"></p>
												<a href="JavaScript:eliminar_img('<?=$imagenes[$key]?>',<?=$key+5?>)" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
											</div>
										</div>
										<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">
											<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
											  <span class="fiel-tramspa padi2 input-group-addon">
											  	<?=$key+3?>
											  </span>
											  <input type="text" class="form-control" value="<?=$titulo?>" name="imagenes_titulos[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">
											</div>
										</div>							
										<div class="img-banner">
											<div class="subir-img2">
												<span class="ico-up glyphicon glyphicon-open"></span>
												<a href="JavaScript:document.getElementById('banner<?=$key+6?>').click()" class="text-up-img">Subir imágen <?=$key+3?></a>
												<div style="display:none" >
											  		<input type="file" id="banner<?=$key+6?>" name="imagenes[]"  onchange="JavaScript:load_new_logo(<?=$key+6?>)">/>
												</div>
											</div>
											<div id="div_img<?=$key+6?>" class="subido-img2">
												<img id="img<?=$key+6?>" class="imge-subido img_preview" src="<?php echo base_url()?>uploads/resize/imagenes/default.jpg">
												<p class="name-file"></p>
												<a href="JavaScript:eliminar_img('<?=$imagenes[$key]?>',<?=$key+6?>)" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
											</div>
										</div>
										<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">
											<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
											  <span class="fiel-tramspa padi2 input-group-addon">
											  	<?=$key+4?>
											  </span>
											  <input type="text" class="form-control" value="<?=$titulo?>" name="imagenes_titulos[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">
											</div>
										</div>							
										<div class="img-banner">
											<div class="subir-img2">
												<span class="ico-up glyphicon glyphicon-open"></span>
												<a href="JavaScript:document.getElementById('banner<?=$key+7?>').click()" class="text-up-img">Subir imágen <?=$key+4?></a>
												<div style="display:none" >
											  		<input type="file" id="banner<?=$key+7?>" name="imagenes[]"  onchange="JavaScript:load_new_logo(<?=$key+7?>)">/>
												</div>
											</div>
											<div id="div_img<?=$key+7?>" class="subido-img2">
												<img id="img<?=$key+7?>" class="imge-subido img_preview" src="<?php echo base_url()?>uploads/resize/imagenes/default.jpg">
												<p class="name-file"></p>
												<a href="JavaScript:eliminar_img('<?=$imagenes[$key]?>',<?=$key+7?>)" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
											</div>
										</div>
										<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">
											<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
											  <span class="fiel-tramspa padi2 input-group-addon">
											  	<?=$key+5?>
											  </span>
											  <input type="text" class="form-control" value="<?=$titulo?>" name="imagenes_titulos[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">
											</div>
										</div>							
										<div class="img-banner">
											<div class="subir-img2">
												<span class="ico-up glyphicon glyphicon-open"></span>
												<a href="JavaScript:document.getElementById('banner<?=$key+8?>').click()" class="text-up-img">Subir imágen <?=$key+5?></a>
												<div style="display:none" >
											  		<input type="file" id="banner<?=$key+8?>" name="imagenes[]"  onchange="JavaScript:load_new_logo(<?=$key+8?>)">/>
												</div>
											</div>
											<div id="div_img<?=$key+8?>" class="subido-img2">
												<img id="img<?=$key+8?>" class="imge-subido img_preview" src="<?php echo base_url()?>uploads/resize/imagenes/default.jpg">
												<p class="name-file"></p>
												<a href="JavaScript:eliminar_img('<?=$imagenes[$key]?>',<?=$key+8?>)" class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
											</div>
										</div>




								</div>
                                
                                <div class="conten-mas-videos col-xs-12 col-md-5 col-lg-5">
							  <a class="agregar-mas-videos2" href="JavaScript:agregar_images();"><i class="ico-mas fa fa-plus-circle"></i> Agregar más imagenes</a>
							</div>
-->
							<!-- Campo 1 -->
							

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