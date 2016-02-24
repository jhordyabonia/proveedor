<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type='text/css'>
.span12
{
	width: 100%;
	height: 100%;
}
.text-left {
    text-align: left;
    font-size: 12px;
}
.cell
{
	padding: 5px;
    font-size: 16px;
    height: 10px;
    width: 2%;
    border-right: 1px solid #F5F5F5;
    border-top: 1px solid rgb(185, 179, 179);
    color: #333333;
    cursor: alias;
}
.row1
{
    background-color: white;
}
.new
{
    font-weight: bold;
}
.badge
{
	background-color: #FF7F27!important;
}
.conten-general-cata 
{
    width: 80%!important;
}
.mensaje
{   
	display: inline-block;
    font-size: 15px;
    color: #111;
    margin: 0;
    padding: 20px;
    text-align: justify;
}
.tools
{
	padding: 5px 12px 5px 28px;
    width: 100%;
    border: 1px solid #F5F5F5;
}
.responder
{
    width: 100%;
    height: 22%;
    padding: 11px 25px 11px 25px;
}
.logo_reponder
{
    max-width: 100%;
    max-height: 100%;
}
.conten_responder
{
	padding: 10px;
	/*display:none;*/
}
.conten_logo
{
	width: 100px;
    height: 49px;
}
.other
{
	margin-left: -80px;
    padding: 1px 12px 2px 82px;
}
.cerrar
{
	padding-right: 15px;
}
@media (min-width: 992px){
.conten_repo 
{
    /* padding-right: 1px!important; */
    padding-left: 7px!important;
    width: 10px;
}
}
</style>
</head>
<body>
	<div style='height:20px;'></div>  
	<div>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/config_OroPlatino/conf_cata_produc.css">


<div class="contenedor-config">
	<div class="title-config">
		<div class="conten-title col-xs-12 col-md-12 col-lg-12">
			<i class="fa fa-envelope icono_mensaje"></i>
			<h3 class="text-title-config">Mensajes</h3>
		</div>
	</div>
	<div class="container-config">
		<div class=" hidden-xs hidden-md conten-config6 col-xs-12 col-md-12 col-lg-12">
			<div class="conten-item6 col-xs-12 col-md-3 col-lg-3" style="max-width: 20%;">
				<h3 class="text-item">General</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">					
					<span class="ico-config-style glyphicon glyphicon-log-in"></span>
					<a  href="<?=base_url()?>mensajes/"  class="text-subitem">Recibidos</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">		
					<span class="ico-config-style glyphicon glyphicon-log-out"></span>
					<a href="<?=base_url()?>mensajes/enviados" class="text-subitem">Enviados</a>
				</div>
				
				<h3 class="text-item">Datos del contacto</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-user"></span>
						Nombres:
						<br>
					<?=$mensaje->nombres_decontato?>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-map-marker"></span>
						Ubicación:
						<br>
						<?php if($mensaje->ubicacion):?>
									<?=$mensaje->ubicacion->departamento?>
									- <?=$mensaje->ubicacion->ciudad?>
									- <?=$mensaje->ubicacion->direccion?>
								<?php endif;?>
				</div>

				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-phone-alt"></span>
					Telefono:
					<br>
					<?php if(is_array($mensaje->destinatario->telefono)):?>
									<br><b>Indicativo:</b> <?=$mensaje->telefono['indicativo']?>
									<br><b>Numero:</b> <?=$mensaje->telefono['numero']?>
									<br><b>Extension:</b> <?=$mensaje->telefono['extension']?>
									<br><b>Celular:</b> <?=$mensaje->telefono['celular']?>
								<?php else: ?>
									<?=$mensaje->destinatario->telefono?>
								<?php endif;?>
				</div>
				
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-briefcase"></span>
					Empresa:
					<br>
					
				</div>
				
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<a href="<?=base_url()?>mensajes"><span class="glyphicon glyphicon-arrow-left"></span></a>
					 <CENTER><?=$mensaje->asunto?></CENTER>
				</h3>
					<br>
					<br>
				<div class="content-config-inicio">
					<div class="tools">
						<CENTER>
							<? if($mensaje->adjunto):?>
								<button onclick="JavaScript:location.href='<?=base_url()?>mensajes/descargar_adjunto/<?=$mensaje->id?>'" rel="tooltip" title="Descargar Adjunto" class="btn btn-default borrar">Descargar Adjunto
									<i class="fa fa-paperclip clip_icono"></i>						
								</button>
							<? endif; ?>

							<button onclick="location.href='<?=base_url()?>mensajes/eliminar_uno/<?=$mensaje->id?>/3'" rel="tooltip" title="Mensaje eliminar" class="btn btn-default borrar">
								<i class="glyphicon glyphicon-trash tarro_basura"></i>						
							</button>

							<button onclick="location.href='<?=base_url()?>mensajes/anterior/<?=$tap?>/<?=$mensaje->id?>';"
								rel="tooltip" title="Mensaje anterior" class="btn btn-default borrar">
								<i class="glyphicon glyphicon-chevron-left"></i>						
							</button>

							<button onclick="location.href='<?=base_url()?>mensajes/siguiente/<?=$tap?>/<?=$mensaje->id?>';"
								rel="tooltip" title="Mensaje siguinete" class="btn btn-default borrar">
								<i class="glyphicon glyphicon-chevron-right"></i>						
							</button>

							<button onclick="JavaScript:responder();" rel="tooltip" title="Responder" class="btn btn-default borrar">
								<i class="glyphicon glyphicon-retweet"></i>						
							</button>
						</CENTER>
					</div>
					<div class="titles">
						<p> 
							<br>Para: <?=$mensaje->destinatario->nombres?>
							<br>De: <?=$mensaje->remitente->nombres?>
							<br>Fecha: <?=$mensaje->fecha?>							
							<p class="mensaje"> <br><?=nl2br($mensaje->mensaje)?></p>
							<br>
						</p>
					</div>
					<div class="tools">
						<CENTER>
							
							<? if($mensaje->adjunto):?>
								<button onclick="JavaScript:location.href='<?=base_url()?>mensajes/descargar_adjunto/<?=$mensaje->id?>'" rel="tooltip" title="Descargar Adjunto" class="btn btn-default borrar">Descargar Adjunto
									<i class="fa fa-paperclip clip_icono"></i>						
								</button>
							<? endif; ?>

							<button onclick="location.href='<?=base_url()?>mensajes/eliminar_uno/<?=$mensaje->id?>/3'"
							 rel="tooltip" title="Eliminar mensaje" class="btn btn-default borrar">
								<i class="glyphicon glyphicon-trash tarro_basura"></i>						
							</button>

							<button onclick="location.href='<?=base_url()?>mensajes/anterior/<?=$tap?>/<?=$mensaje->id?>';" rel="tooltip" title="Mensaje anterior" class="btn btn-default borrar">
								<i class="glyphicon glyphicon-chevron-left"></i>						
							</button>

							<button onclick="location.href='<?=base_url()?>mensajes/siguiente/<?=$tap?>/<?=$mensaje->id?>';"
								rel="tooltip" title="Mensaje siguinete" class="btn btn-default borrar">
								<i class="glyphicon glyphicon-chevron-right"></i>						
							</button>

							<button onclick="JavaScript:responder();" rel="tooltip" title="Reponder mensaje" class="btn btn-default borrar">
								<i class="glyphicon glyphicon-retweet"></i>						
							</button>
						</CENTER>
					</div>

				</div>
					
<?=form_open_multipart('mensajes/enviar/'.$mensaje->tipo);  ?>
				<div class="content-config-inicio conten_responder" style="display:none" id="conten_responder">
					<div class="row"> 
						<button onclick="JavaScript:document.getElementById('conten_responder').style.display='';" id="close" type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true" class="cerrar">X</span>
							<span class="sr-only">Close</span>
						</button>
                   
						<div class="conten_repo col-md-2 col-xs-2 col-mg-2">
							<div class="conten_logo">
								<img class="logo_reponder" src="<?=base_url()?>uploads/logos/default.png"></img>
							</div>
							<!--
							<button rel="tooltip" title="Enviar mensaje" class="btn btn-default borrar">
								<i class="glyphicon glyphicon-send"></i>	Enviar					
							</button>
						-->
						<button type="submit" rel="tooltip" title="Enviar mensaje" class="btn btn-default borrar">
								<i class="glyphicon glyphicon-send"></i>	Enviar	 				
							</button>

							<input type="hidden" value="<?=$mensaje->id_objeto?>" name="id_objeto">
							<input type="hidden" value="<?=$mensaje->tipo?>" name="tipo">                  
							<input type="hidden" value="Proveedor.com.co - ¡Ha recibido un respuesta a su mensaje!" name="asunto">
							<?php if($tap=="recibidos"):?>
								<input type="hidden" value="<?=$mensaje->destinatario->email?>" name="email">
								<input type="hidden" value="<?=$mensaje->destinatario->telefono?>" name="telefono">
								<input type="hidden" value="<?=$mensaje->destinatario->nombres?>" name="remitente">
								<!-- El remitente pasa ser destinatario y el destinatario remitente-->
								<input type="hidden" value="si" name="respuesta">
								<input type="hidden" value="<?=$mensaje->remitente->id?>" name="destinatario">
								<input type="hidden" value="<?=$mensaje->remitente->email?>" name="correo_destinatario">
								<input type="hidden" value="<?=$mensaje->remitente->telefono?>" name="telefono_destinatario">
								<input type="hidden" value="<?=$mensaje->remitente->nombres?>" name="nombres_destinatario">				
							<?php else:?>
								<input type="hidden" value="<?=$mensaje->remitente->email?>" name="email">
								<input type="hidden" value="<?=$mensaje->remitente->telefono?>" name="telefono">
								<input type="hidden" value="<?=$mensaje->remitente->nombres?>" name="remitente">
								<!-- El remitente pasa ser destinatario y el destinatario remitente-->
								<input type="hidden" value="si" name="respuesta">
								<input type="hidden" value="<?=$mensaje->destinatario->id?>" name="destinatario">
								<input type="hidden" value="<?=$mensaje->destinatario->email?>" name="correo_destinatario">
								<input type="hidden" value="<?=$mensaje->destinatario->telefono?>" name="telefono_destinatario">
								<input type="hidden" value="<?=$mensaje->destinatario->nombres?>" name="nombres_destinatario">	
							<?php endif;?>
						</div>
						<div class="other col-md-10 col-xs-10 col-mg-10">
							<TEXTAREA rows="3" cols="100" class="responder" name="mensaje" id="mensaje" value="">
							</TEXTAREA>

							<span class="fa fa-paperclip clip_icono" aria-hidden="true"/>
			                <span class="clip" onclick="JavaScript:document.getElementById('userfile').click()">Adjuntar archivo</span>
			                <span id="adjunto" onclick="JavaScript:document.getElementById('userfile').click()"></span>
			                <input style="display:none" type="file" class="upload" onchange="JavaScript:adjunto();" id="userfile" name="userfile" data-badge="false">
			                    
						</div>
					</div>
				</div>

				<!--
							</div>-->
						<!--aquí el output-->
						
	</div>
<?= form_close() ?> 
<script type="text/javascript">
	     document.onload= start();
	     function start()
	       {
		       	var popup=new XMLHttpRequest();
		       	var url_popup="<?=base_url()?>popup/confirmar_mensaje";
				popup.open("GET", url_popup, true);
				popup.addEventListener('load',show,false);
				popup.send(null);
				function show()
					{
						cotizar=document.getElementById('cotizar');
						cotizar.innerHTML=popup.response;	
						//console.log(popup.response);								
						<?php if ($this->session->flashdata('mensaje_enviado')=='DONE'):?>
						   window.onload= document.getElementById('confimacion_msj_enviado').click();
						<?php endif; ?> 			 
					}
			}
			function adjunto()
			{
				var paths = document.getElementById('userfile').files;
				document.getElementById('adjunto').innerHTML=paths[0]['name'];             
			}
			function responder()
			{
				document.getElementById('conten_responder').style.display='';
				document.getElementById('mensaje').focus();
			}
	</script>
  <div id="cotizar">
		</div>
</body>
</html>
<h1>