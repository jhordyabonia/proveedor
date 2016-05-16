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
					Publicidad
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
									<img id="img1" class="imge-subido banner_preview imgxx" src="<?=base_url()?>uploads/resize/SOP/banners/<?=$banners[0]?>">
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
									<img id="img2" class="imge-subido banner_preview imgxx" src="<?=base_url()?>uploads/resize/SOP/banners/<?=$banners[1]?>">
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
									<img id="img3" class="imge-subido banner_preview imgxx" src="<?=base_url()?>uploads/resize/SOP/banners/<?=$banners[2]?>">
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

							
							<div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8" style="padding:2%;">
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
				</div>
				</div>
				</div>
  </section>
			