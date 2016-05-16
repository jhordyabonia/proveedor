	<div class="content-wrapper" style="min-height: 916px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?=$empresa->nombre?>
      <small>Proveedor.com.co</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active"><?=$empresa->nombre?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
	  <div class="row">
		<div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">
					<i class="icon-contacto fa fa-child"></i>
					Videos
				 </h3>
                 
					<div class="titles">
						<h3 class="text-title-up">Subir Videos de Youtube <i class="ico-youtube fa fa-youtube"></i></h3>
						<div class="conten-paso2">
							<p class="agreagar-text">Agregar videos de Youtube a su página de inicio.</p> <p class="ver-ejm"><!-- - Ver ejemplo --></p>
							<p class="medidas-recom">Copie las direcciones de los videos y peguelas en los campos respectivos (Maximo 20 videos)</p>
							
						<?=form_open_multipart(base_url().'editar_empresa/videos')?>
							<!-- Campo 1 -->
							
							<div id="videos" class="col-xs-12 col-md-12 col-lg-12">
								<?php $key=0; foreach (explode(',',$empresa->videos) as $key => $video):?>
									<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
									  <span class=" input-group-addon">
									  	<?=$key+1?><!-- Url:<br>-->
									  </span>
									  <input id="v_<?=$key?>" type="text" class="form-control col-xs-9 col-md-8 col-lg-8" onchange="document.getElementById('a_<?=$key?>').style.display=''" name="videos[]" value="<?=$video?>" placeholder="Introduzca dirección del video" style="border-radius: 0;width: 74%;">
									<a id="a_<?=$key?>"  style="display:<?php if(!$video){echo 'none';}?>" href="JavaScript:borrar_videos(<?=$key?>)" class="btn-remov-img col-xs-1 col-md-2 col-lg-2">
									<span class="ico-rem glyphicon glyphicon-remove-sign"></span>
									<span class="hidden-xs">Borrar</span></a>
									</div>
									<!--
									<div class="input-group padig col-xs-12 col-md-10 col-lg-10">
									<span class=" input-group-addon">
									  Nombre:<br>
									  </span>
									<input type="text" class="form-control" name="videos[]" value="" placeholder="Introdusca titulo del video" style="border-radius: 0;">
									</div>-->
								<?php endforeach;?>
									</div>
							<div class="conten-mas-videos col-xs-12 col-md-10 col-lg-10">
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
											videos_archivos[i]=tmp_videos[i].value;
										}
									}
									function fijar_videos()
									{
										tmp_videos=document.getElementsByName('videos[]');
										for(i=0;i<tmp_videos.length-1;i++)
										{
											tmp_videos[i].value=videos_archivos[i];
										}
									}
									function agregar_video()
									{
										for(var i=0;i<5;i++)
										{
											salvar_videos();
											if(videos>=20){alert('Limite exedido.');return;}
											DOM='<div class="input-group padig col-xs-12 col-md-12 col-lg-12">';
											DOM+='<span class=" input-group-addon">';
											DOM+=++videos;
											DOM+='</span>';
											DOM+='<input id="v_'+videos+'" type="text" onchange="document.getElementById('+"'a_"+videos+"'"+').style.display='+"'';"+'"  class="form-control col-xs-9 col-md-8 col-lg-8" name="videos[]" value="" placeholder="Introduzca dirección del video" style="border-radius: 0;width: 74%;">';
											DOM+='<a style="display:none" id="a_'+videos+'" href="JavaScript:borrar_videos('+videos+')" class="btn-remov-img col-xs-1 col-md-2 col-lg-2"><span class="ico-rem glyphicon glyphicon-remove-sign"></span><span class="hidden-xs">Borrar</span></a>';
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

							<div class="input-group style-padding6 col-xs-12 col-md-12 col-lg-12" style="padding:2%;">
                                <button type="submit" class="btn btn-primary">
									<i class="ico-circle fa fa-floppy-o"></i>
                                    Guardar
                                 </button>
                               </div>						
    					<?=form_close()?>
	
                </div><!-- /.box-body -->
					</div>
				</div>
				</div>
				</div>
				</div>
				</div>
  </section>
			
				<style>.input-group-addon {
border: 0!important; 
}
</style>