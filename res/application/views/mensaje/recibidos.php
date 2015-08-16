<script type="text/javascript">
	function seleccionar_todo()
	{
	   for (i=0;i<document.formulario_de_envio.elements.length;i++)
	      if(document.formulario_de_envio.elements[i].type == "checkbox")
	         document.formulario_de_envio.elements[i].checked=1;
	} 
</script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/mensajes/mensajes.css">
<script src="<?= base_url() ?>assets/js/mensajes/mensajes.js"></script>
<?php $data['id']='formulario_de_envio';?>
<?=form_open_multipart('mensajes/eliminar',$data);  ?>
<div class="container-fluid container_mensaje">
	<div class="col-md-2">
		<div class="row">
			<img src="<?=base_url() ?>assets/img/mensajes/icono_mensaje.png" class="img-responsive imagen_mensaje">
		</div>
	</div>
	<div class="col-md-10">
		<div class="col-md-12 row">
			<div id="botones_mensajes" class="col-md-4 btn-group">
				<div class="btn-group" role="group">
					<label class="seleccion" >
						<input type="checkbox" class="seleccionar" onclick="JavaScript:seleccionar_todo();"> Seleccionar todo
					</label>
				</div>
				<div class="btn-group boton_borrar" role="group">
					<button disabled class="btn btn-default borrar">
						<i class="glyphicon glyphicon-trash tarro_basura"></i> 
					</button>	
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-4 btn-group nuevos_mensajes">
						<button class="btn btn-primary nuevos_mensajes" type="button" name="mensaje_recibido">Nuevos mensajes
 							  <span class="badge"><?php echo $numero_nuevos?></span>
						</button>
					</div>
					<!-- <div class="col-md-8">
						<div class="input-group" id="tab_busqueda">
							<div class="input-group">
								<input type="text" class="input_buscador">

									<span class="input-group-btn">
										<button class="btn btn-default btn_buscar" type="button">
									    	<i class="fa fa-search lupa"></i>
										</button>
									</span>
							</div>
						</div>
					</div> -->
				</div>
			</div>	
		</div>
		<div class="col-md-12" role="tabpanel">
		  <!-- Nav tabs -->
		  	<?php 
		  	$tab_recibidos = "tab-pane fade active table-responsive in";
		  	$tab_enviados = "tab-pane fade";
			$active_tab_recibidos = "active";
			$active_tab_enviados = "";
		  	if($tab=="enviados")
		  		{
				  	$tab_enviados = "tab-pane fade active table-responsive in";				  	
				  	$tab_recibidos = "tab-pane fade";
				  	$active_tab_recibidos = "";
					$active_tab_enviados = "active";
		  		}
		  	?>
			<ul class="nav nav-tabs" id="mis_tabs" role="tablist">
				<li role="presentation" class="<?=$active_tab_recibidos?>">
				    <a class="tab_mensaje" href="#recibidos" aria-controls="recibidos" role="tab" data-toggle="tab">Mensajes Recibidos <span class="badge"><?php echo $numero_recibidos?></span></a>
				</li>
				<li role="presentation" class="<?=$active_tab_enviados?>">
				    <a class="tab_mensaje" href="#enviados" aria-controls="enviados"  role="tab" data-toggle="tab">Mensajes Enviados <span class="badge"><?php echo $numero_enviados?></span></a>
				</li>
			</ul>
			  <!-- Tab panes -->

			<div class="tab-content">
				<div role="tabpanel" class="<?=$tab_recibidos?>" id="recibidos">
					<table class="table tabla_mensajes">
					    <tbody>

					      <?php if($nuevos):?>
						       <?php foreach ($nuevos as $key => $value):?>
						        <tr class="mensajes">
						            <th class="check"><input type="checkbox" name= "recibidos_seleccionados[]" value="<?=$value->id?>"></td>
						            <th class="cliente"><a href="<?=base_url()?>mensajes/leer/<?=$value->id?>" class="links_mensaje"><?=$value->remitente->nombres?></a></td>
						            <th class="asunto"><a href="<?=base_url()?>mensajes/leer/<?=$value->id?>" class="links_mensaje"><?=$value->asunto?></a></td>
						            <th class="fecha"><a href="<?=base_url()?>mensajes/leer/<?=$value->id?>" class="links_mensaje"><span class="badge">Nuevo</span></a></td>
						      		<th class="fecha"><a href="<?=base_url()?>mensajes/leer/<?=$value->id?>" class="links_mensaje"><?=$value->fecha?></a></td>
						        </tr>
						      <?php endforeach; ?>
						  <?php endif; ?>

					      <?php if($recibidos):?>
						      <?php foreach ($recibidos as $key => $value):?>
						        <tr class="mensajes">
						            <td class="check"><input type="checkbox" name= "recibidos_seleccionados[]" value="<?=$value->id?>"></td>
						            <td class="cliente"><a href="<?=base_url()?>mensajes/leer/<?=$value->id?>" class="links_mensaje"><?=$value->remitente->nombres?></a></td>
						            <td class="asunto"><a href="<?=base_url()?>mensajes/leer/<?=$value->id?>" class="links_mensaje"><?=$value->asunto?></a></td>
						            <td class="fecha"></td>
						        	<td class="fecha"><a href="<?=base_url()?>mensajes/leer/<?=$value->id?>" class="links_mensaje"><?=$value->fecha?></a></td>
						        </tr>
						      <?php endforeach; ?>
						  <?php endif; ?>
					    </tbody>
					</table>
				</div>
				<div role="tabpanel" class="<?=$tab_enviados?>" id="enviados">
					<table class="table tabla_mensajes">
					    <tbody>
					      <?php if($enviados):?>
						      <?php foreach ($enviados as $key => $value):?>
						        <tr class="mensajes">
						            <td class="check"><input type="checkbox" name="enviados_seleccionados"></td>
						            <td class="cliente"><a href="<?=base_url()?>mensajes/leer/<?=$value->id?>" class="links_mensaje"><?=$value->destinatario->nombres?></a></td>
						            <td class="asunto"><a href="<?=base_url()?>mensajes/leer/<?=$value->id?>" class="links_mensaje"><?=$value->asunto?></a></td>
						            <td class="fecha"><a href="<?=base_url()?>mensajes/leer/<?=$value->id?>" class="links_mensaje"><?=$value->fecha?></a></td>
						        </tr>
						      <?php endforeach; ?>
						  <?php endif; ?>
					    </tbody>
					</table>
				</div>
			</div>			 
		</div>
	</div>
</div>
<?= form_close() ?> 