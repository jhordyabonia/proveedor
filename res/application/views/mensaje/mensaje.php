<link rel="stylesheet" href="<?php echo base_url()?>assets/css/mensajes/mensajes.css">
<?=form_open_multipart('popup/mensaje/none/'.$mensaje->id_producto_oferta_nit);  ?>
<div class="container_mensaje leer_mensaje">
	<div class="col-md-2">
		<div class="row">
			<img src="<?=base_url() ?>assets/img/mensajes/icono_mensaje.png" class="img-responsive imagen_mensaje">
		</div>
	</div>
	<div class="col-md-10 contenedor_tabs">
		<div class="col-md-12 row contenedor_botones_msj">
			<div id="botones_mensajes" class="col-md-4 row btn-group botones">
				<div class="btn-group devolver" role="group">
					<a href="<?=base_url() ?>/mensajes">
						<img align="left" src="<?=base_url() ?>assets/img/mensajes/devolver.png" class="imagen_devolver">
						</a>	
				</div>
				<div class="boton_borrar" role="group">
					<button disabled class="btn btn-default borrar">
						<i class="glyphicon glyphicon-trash tarro_basura"></i>						
					</button></div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-4 btn-group nuevos_mensajes">
						<button disabled class="btn btn-primary nuevo_msj" type="button" name="mensaje_recibido">Nuevos mensajes
 							  <span class="badge"><?php echo $numero_nuevos?></span>
						</button>
					</div>
				</div>
			</div>	
		</div>
		<div class="col-md-12" role="tabpanel">
		   <!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade active table-responsive in" id="recibidos">
					<div class="col-md-12 leyendo_mensaje">
						
							<p class="texto_titulo">Producto cotizado: 
								<?if ($mensaje->url): ?>
									<img src="<?=$mensaje->image?>" class="img_miniatura_msj">
									<a href="<?=$mensaje->url?>" class="link_producto">
										<?=$mensaje->nom_objeto?>
									</a>
								<? endif; ?>
							</p>
						
					</div>
					<div class="col-md-12 contacto">
						<div class="col-md-1 row">
							<p class="texto_titulo">Contacto: </p>
						</div>
						<div class="col-md-10">
							<p class="texto_contacto"><?=$mensaje->destinatario->nombres?></p>
						</div>
					</div>
					<div class="col-md-12 telefono">
						<div class="col-md-1 row">
							<p class="texto_titulo">Teléfono: </p>
						</div>
						<div class="col-md-10">
							<p class="texto_contacto">
								<?php if(is_array($mensaje->destinatario->telefono)):?>
									<b>Indicativo:</b> <?=$mensaje->destinatario->telefono['indicativo']?>
									<b>Numero:</b> <?=$mensaje->destinatario->telefono['numero']?>
									<b>Extension:</b> <?=$mensaje->destinatario->telefono['extension']?>
									<b>Celular:</b> <?=$mensaje->destinatario->telefono['celular']?>
								<?php else: ?>
									<?=$mensaje->destinatario->telefono?>
								<?php endif;?>
							</p>
						</div>
					</div>
					<div class="col-md-12 telefono">
						<div class="col-md-1 row">
							<p class="texto_titulo"></p>
							<p class="texto_titulo">Ubicación: </p>
						</div>
						<div class="col-md-10">
							<p class="texto_titulo"></p>
							<p class="texto_contacto">								
								<?php if($mensaje->ubicacion):?>
									<?=$mensaje->ubicacion->departamento?>
									- <?=$mensaje->ubicacion->ciudad?>
									- <?=$mensaje->ubicacion->direccion?>
								<?php endif;?>
							</p>
						</div>
					</div>
					
					<div class="col-md-12 mensaje_fecha">
						<div class="col-md-10 row mensaje">
							<textarea disabled rows="8" class="form-control cajon_mensaje" name="mensaje"><?=$mensaje->mensaje?></textarea>
						</div>	
						<div class="col-md-2 fecha">
							<p><?=$mensaje->fecha?></p>
						</div>				
					</div>
					<div class="col-md-12 archivo_adjunto">
					<? if($mensaje->adjunto):?>
						<div class="col-md-6 texto_adjunto">
							<p><?=$mensaje->adjunto?></p>
						</div>						
						<div class="col-md-3 btn_descarga">				
		                    <a class="btn btn-primary nuevos_mensajes" type="button" href="<?=base_url()?>mensajes/descargar_adjunto/<?=$mensaje->id?>">
		                    	<button type="button" class="btn btn_download"><span class="fa fa-paperclip clip_icono_descarga" aria-hidden="true"></span>Descargar Archivo Adjunto</button>
		                    </a>
						</div>
					<? endif; ?>
					</div>
					
					<input type="hidden" value="<?=$mensaje->tipo?>" name="tipo">
					<input type="hidden" value="Proveedor.com.co - ¡Ha recibido un respuesta a su mensaje!" name="asunto">
					<input type="hidden" value="<?=$mensaje->remitente->correo?>" name="email">
					<input type="hidden" value="<?=$mensaje->remitente->telefono?>" name="telefono">
					<input type="hidden" value="<?=$mensaje->remitente->nombres?>" name="remitente">
					<!-- El remitente pasa ser destinatario y el destinatario remitente-->
					<input type="hidden" value="si" name="respuesta">
					<input type="hidden" value="<?=$mensaje->destinatario->id_contacto?>" name="destinatario">
					<input type="hidden" value="<?=$mensaje->destinatario->correo?>" name="correo_destinatario">
					<input type="hidden" value="<?=$mensaje->destinatario->telefono?>" name="telefono_destinatario">
					<input type="hidden" value="<?=$mensaje->destinatario->nombres?>" name="nombres_destinatario">
					<div class="col-md-12 responder">
						<div class="col-md-1 row texto_responder">
							<p class="titulo_responder">Responder</p>
						</div>
						<div class="col-md-10 caja_texto">
							<textarea rows="5" class="form-control cajon_responder" name="mensaje"></textarea>
						</div>
					</div>
					<div class="col-md-12 botones_adjuntar_enviar">
						<div class="col-md-6" id="adjunto">
						</div>						
				         <script type="text/javascript">
				            function adjunto()
				            {
				             var paths = document.getElementById('userfile').files;
				             document.getElementById('adjunto').innerHTML=paths[0]['name'];             
				            }
				          </script>
				        <div class="col-md-6">
				        	<div class="col-md-6 btn_adjunto">				
			                    <div class="col-md-4 fileUpload btn btn_adjuntar">
			                    	<span class="fa fa-paperclip clip_icono" aria-hidden="true"/>
			                    	<span class="clip">Adjuntar archivo</span>
			                    	<input type="file" class="upload" onchange="JavaScript:adjunto();" id="userfile" name="userfile" data-badge="false">
			                    </div>
							</div>
							<div class="col-md-6 btn_enviar">
								<div class=" btn btn_submit row">
									<i class="fa fa-envelope"></i>
	    								<input type="submit" class="form-control submit" value="Enviar">
			                    	<!-- <span class="fa fa-envelope sobre_icono" aria-hidden="true">
			                    		<input type="submit" class="submit">
			                    	</span> -->
			                    	<!-- <input type="submit" class="submit"> -->
			                    </div>
							</div>	
				        </div>						
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="enviados">

				</div>
			</div>
		</div>
	</div>
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
						console.log(popup.response);								
						<?php if ($this->session->flashdata('mensaje_enviado')=='DONE'):?>
						   window.onload= document.getElementById('confimacion_msj_enviado').click();
						<?php endif; ?> 			 
					}
			}
	</script>
  <div id="cotizar">
		</div>