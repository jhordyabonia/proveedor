 <!-- own imports -->
 <script type="text/javascript">
	function start()
	{
		alert("run");
		//getElementById('combo1').value=<?=$oferta->negociacion['medida']?>;
	}
	
 </script>
 <script>
  jQuery(document).ready(function($) {
        $("#publicar_oferta").addClass('active');
    });
</script>
<link href="<?= base_url() ?>assets/css/publicar_oferta/solicitudproducto_style.css"
	rel="stylesheet" type="text/css" >
<link href="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.css"
	rel="stylesheet" type="text/css" />
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css"
	rel="stylesheet" type="text/css" />
<script src="<?= base_url() ?>assets/js/publicar_producto/jquery.number.min.js"></script>
<script src="<?= base_url() ?>assets/js/publicar_producto/bootstrap-filestyle.min.js"> </script>
<script src="<?= base_url() ?>assets/js/publicar_producto/jquery.tagsinput.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script src="<?= base_url() ?>assets/js/publicar_producto/funcionalidades.js"></script>

<div class="container-fluid">
	<div class="row">
			<div class="col-sm-2">
					<!-- div boton Publicar ofertas -->
				<div class="col-xs-3 col-xs-push-2 col-sm-12 col-sm-push-0 text-center btn1 " 
					 onclick="location.href='<?= base_url() ?>publicar_oferta';" 
					 style="cursor:pointer;">
					<img src="<?php echo img_url(); ?>Tablero_usuario/Publicar_Producto.png" 
					class="img-responsive img_btn1">
					<h4 class="boton">Publicar Solicitud</h4>
				</div>
			<!-- div boton Administrar mis oferta -->
					<div class="col-xs-3 col-xs-push-4 col-sm-12 col-sm-push-0 text-center btn2 "
					onclick="location.href='<?= base_url() ?>oferta_test/administrar';" 
					 style="cursor:pointer;">
						<img src="<?php echo img_url(); ?>Tablero_usuario/Ediccion_de_producto.png" 
						class="img-responsive img_btn1">
						<h4 class="boton">Administrar Solicitudes</h4>
					</div>
			</div> 
		

		<!-- page content -->
		<?php
			$atributos = array(
				'autocomplete' => 'off',
				'id' => 'default-behavior',
				'novalidate' => 'novalidate');
		?>
		<?= form_open_multipart('oferta_test/actualizar/'.$solicitud->id, $atributos); ?>
			<div class="col-md-10 col-sm-10">
				<!-- page title -->
				<div class="row">
					<h3>Editar una solicitud de producto o servicio</h3>
				</div>

				<?php if ($this->session->flashdata('oferta_registrada')) { ?>
					<div class="row"> <div class="col-md-12">
						<div class="alert alert-success" role="alert">
							<strong><?= $this->session->flashdata('oferta_registrada') ?></strong>
						</div>
					</div> </div>
				<?php } ?>

				<!-- page subtitle (in gray) -->
				<div class="row seccion">
					<h4>Información Básica</h4>
				</div>

				<!-- page content -->
				<!-- input: nombre del producto -->
				<div class="row">
					<div class="col-md-2 col-sm-2">
						<h5>Nombre del producto o servicio a solicitar<span id="asterisk" class="label label-default">*</span></h5>
					</div>
					<div class="col-md-4 col-sm-5">
						<div class="input-control">
						 <input type="hidden" name="id_oferta" value="<?php echo $solicitud->id; ?>">              
							<input type="text" class="form-control" name="nombre"
								value="<?=$solicitud->nombre;?>" required >
							<h6>Ingresa el nombre de la solicitud con sus especificaciones técnicas</h6>
							<h6>Ej. Bota de seguridad PU bidensidad inyectada marca JM</h6>
						</div>
					</div>
				</div>

				<!-- categorias y subcategorias -->
				<div class="row">

							 <div class="col-md-12">

								 <h5>Selecciona una categoría y luego clic en Agregar</h5>

							 </div>

							 <div class="col-md-3 col-sm-5 col-xs-10">
<select name="menu" size="10" id="textarea1" class="form-control" style="width: 250px;">
										<?php foreach ($categoria as $fila): ?>
												<option title="<?= $fila->nombre_categoria ?>"
													value="<?= $fila->id_categoria ?>"><?= $fila->nombre_categoria ?></option>
										<?php endforeach; ?></select>
</div>
<div style="display: block;" class="col-md-1 col-sm-2 col-xs-2" id="flecha_union_cat_subcat">
								<img src="<?=base_url()?>img/pag_siguiente_ok.png">

</div>

							 <div class="col-md-3 col-sm-5 col-xs-10">
								<div name="menu" id="textarea2" class="form-control textarea2" style="overflow-y: scroll; display: block;">  
								<?php foreach ($datos_categoria['subcategorias'] as $subcategoria): ?>
									<div style="text-align: left; cursor: pointer; background: none repeat scroll 0% 0% rgb(255, 255, 255);" value="<?=$subcategoria->nom_subcategoria?>" title="<?=$subcategoria->nom_subcategoria?>"><?=$subcategoria->nom_subcategoria?></div>
								<?php endforeach; ?>
							 </div>
</div>

							 <div class="col-md-2 col-sm-4 col-xs-4" id="botones">
								<div style="display: inline-block;" class="btn-group btn-group-lg vcenter" id="agregar">
									<button type="button" class="btn btn-default">Agregar &gt;</button>


								 </div>
								<div style="display: block;" class="btn-group btn-group-lg vcenter" id="eliminar">
									<button type="button" class="btn btn-default">&lt; Quitar</button>

							 
	 </div>

							 </div>
							<div style="display: block;" class="col-md-3 col-sm-8 col-xs-8" id="cat_subcat">

 <div> <p>Seleccionado:</p> </div>

								 <div id="categoria_div_titulo">

									 <p>Categoria:</p>

								 </div>

								 <div id="categoria_div_contenido">
									<input readonly="" id="categoria" required="true" name="categoria" value="<?php echo $datos_categoria['categoria']->id_categoria; ?>" type="hidden">

	<div id="categoria_div">
										<p id="cat_selecc"><?php echo $datos_categoria['categoria']->nombre_categoria; ?></p>

								
 </div>

								 </div>

								 <div id="subcategoria_div_titulo">

									 <p>Subcategoria:</p>

								 </div>

								 <div id="subcategoria_div_contenido">
										<input readonly="" id="subcategoria" name="subcategoria" value="<?php echo $datos_categoria['subcategoria']->id_subcategoria; ?>" type="hidden">

									 <div id="subcategoria_div">
										<p id="subcat_selecc"><?php echo $datos_categoria['subcategoria']->nom_subcategoria; ?></p>

									 </div>

								 </div>

							 </div>

							 <div class="col-md-12 col-xs-12">

								 <label for="categoria" generated="true" class="error"></label>

								 <label for="subcategoria" generated="true" class="error"></label>

							 </div>

						 </div>

				<!-- descripcion del producto o servicio solicitado -->
				<div class="row">
					<div class="col-md-12">
						<h5>Descripción del producto o servicio solicitado</h5>
					</div>
					<div class="col-md-7 col-sm-8">
						<div class="input-control">
							<textarea name="descripcion" id="textarea3"
								required class="form-control"><?=$solicitud->descripcion; ?></textarea>
						</div>
					</div>
					<div class="col-md-2 col-sm-4">
						<p id="contador_textarea3"> <b>5000</b> palabras máximo</p>
						<label class="error" for="textarea3" generated="true"
							style="clear: both; margin-top: 2em;"></label>
					</div>
				</div>

				<!-- servicio de fotos -->
            <div class="row">
              <div class="col-md-4">
                <div class="col-md-12">
                  <div class="btn-group btn-group-lg vcenter" id="agregararchivos_div">
                    <input type="file" class="filestyle" id="btn_archivos" name="userfiles[]" multiple
                      data-size="lg" data-input="false" data-icon="false"
                      data-buttonText="Agregar Imagen(es)" data-badge="false" onclick="JavaScript:cargar_imagen()">
                  </div>
                  <div class="btn-group btn-group-lg vcenter" id="eliminar1">
                    <button type="button" class="btn btn-default" onclick="JavaScript:eliminar_ultima_imagen()">Eliminar Imagen</button>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="row" id="preview">
                  <script type="text/javascript">
                  function cargar_imagen()
                  {                     
                      document.getElementById('numero_imagenes_cargardas').value++;
                  }
                  function eliminar_ultima_imagen()
                  {
                    if(document.getElementById('numero_imagenes_cargardas').value>0)
                      {  
                        document.getElementById('numero_imagenes_cargardas').value--;
                        return;
                      }
                    
                    var nombres_imagenes=document.getElementById('imagenes_actuales');
                    var tmp=nombres_imagenes.value;
                    tmp=tmp.substring(0, tmp.lastIndexOf(','));
                    document.getElementById('imagenes_actuales').value=tmp;
                    var key = document.getElementById('numero_imagenes_precargardas').value
                    if(key>=0)
                    {
                      document.getElementById('imagen'+key).style.display='none';
                      key--;
                      document.getElementById('numero_imagenes_precargardas').value=key;
                    }
                  } 

                  </script>
                   <?php 
                      $nombres_imagenes="";
                      $numero_imagenes_precagargadas=0;
                   ?>
                   <?  foreach ($solicitud->imagenes as $key => $value):?> 
                    <?php if($value=='default.jpg') {continue;}    ?>              
                        <div id='imagen<?=$key?>' class="col-md-4 col-sm-4 col-xs-4">
                          <a href="#" class="thumbnail">
                            <img class="img-responsive" src="<?=base_url();?>uploads/resize/<?=$value;?>" alt="Imagen eliminada">
                          </a> 
                        </div>
                      <? 
                       $nombres_imagenes.=",".$value;
                       $numero_imagenes_precagargadas=$key;
                      ?>                   
                   <?php endforeach;?>
                  <input type='hidden' id='imagenes_actuales' name='imagenes_actuales'  value='<?= $nombres_imagenes?>'>
                  <input type='hidden' id='numero_imagenes_precargardas'   value='<?=$numero_imagenes_precagargadas?>'>
                  <input type='hidden' id='numero_imagenes_cargardas'   value='0'>
                
                </div>
                <h5 style="text-align: center;">Imágenes agregadas (máximo 5)</h5>
              </div>
            </div>

            <!-- palabras clave -->
				<div class="row">
					<div class="col-md-12">
						<h5>Palabras clave</h5>
						<h6>Las 'palabras clave' hacen que la solicitud sea más visible a los proveedores.</h6>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="input-control">
						 <?php $keywords=""; 
							 if($solicitud->palabras_clave)
							 {
								foreach ($solicitud->palabras_clave as $key)
									{      
										$keywords=$keywords.", ".$key; 
									}
							 }
						?>
									<input type="text" class="form-control" id="Pclave" value="<?php echo $keywords; ?>">
								</div>
						<input type="hidden" id="qwerty" name="etiquetas">
					</div>
					<div class="col-md-12">
						<h6>Ingresa la palabra clave y pulsa la tecla Enter</h6>
						<h6>Ej.: Zapato en cuero</h6>
					</div>
				</div>

				<!-- page subtitle (in gray) -->
				<div class="row seccion">
					<h4>Negociación</h4>
				</div>

				<!-- cantidad requerida -->
				<div class="row">
					<div class="col-md-2">
						<h5 id="titulo1">Cantidad requerida <span id="asterisk" class="label label-default">*</span></h5>
					</div>
					<div class="col-md-3 col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" id="cantidad_format" required="true"
								value="<?=$solicitud->cantidad_requerida;?>" onchange="JavaScript:cantidad.value=cantidad2.value=this.value;">
							<input type="hidden" class="form-control" id="cantidad" readonly name="cantidad"
								value="<?=$solicitud->cantidad_requerida; ?>"/>
						</div>
						<label for="precio1" generated="true" class="error"></label>
						<h6 class="hidden-xs">Ingrese la cantidad</h6>
						<h6 class="hidden-xs">Ej. 1.000</h6>
					</div>
					<script>
					dimension='<?=$solicitud->medida?>';
					cantidad=$("#cantidad_format").val();
					jQuery(document).ready(function($) {
						$("#combo1").load(base_url + "herramientas/unidad_medida/"+cantidad+"/<?=$solicitud->medida->id_dimension?>");
						console.log(base_url + "herramientas/unidad_medida/"+cantidad+"/<?=$solicitud->medida->id_dimension?>");
					});
					</script>
					<div class="col-md-2 col-sm-4 col-xs-5">

						<select class="form-control" id="combo1" name="list_medida" value="<?=$solicitud->medida->id_dimension?>">
							</select>

						<input class="form-control" type="hidden" id="medida" value="0">
						
					</div>
				</div>

				<!-- precio unitario / a convenir -->
				<?php 
					$preciounitario=FALSE;
					$precioconvenir=FALSE;
					if($solicitud->precio_maximo>0)
						{
							$preciounitario=TRUE;
						}else{
							$precioconvenir=TRUE;
						}
				?>
				<div class="row" id="punit_pconv">
					<div class="col-md-3 col-sm-4 col-xs-5">
						<fieldset>
							<label> Precio unitario 
								<input type="radio" id="precioUni" name="rd_precio" value="precioUni" 
								<?php if($preciounitario){echo "checked='checked'";}?>>
							 </label>
						</fieldset>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-5">
						<fieldset>               
							<label> Precio a convenir 
								<input type="radio" id="precioconvenir" name="rd_precio"  onchange="JavaScript:precio.value=0;precio_format.value=0;"
								<?php if($precioconvenir){echo "checked='checked'";}?>
								>
							</label>
						</fieldset>
					</div>
				</div>  

				<!-- Precio máximo a pagar -->
				<div class="row" id="pmax_pagar">
					<div class="col-md-2">
						<h5>Precio máximo a pagar<span id="asterisk" class="label label-default">*</span></h5>
					</div>
					<div class="col-md-2 col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" id="precio_format" required="true" onchange="JavaScript:precio.value=this.value;"
								value="<?=$solicitud->precio_maximo; ?>" >

							<input type="hidden" class="form-control" id="precio" readonly name="precio" 
								value="<?=$solicitud->precio_maximo; ?>"/>
						</div>
						<h6 class="hidden-xs">Ingrese el precio</h6>
						<h6 class="hidden-xs">Ej. 650.000</h6>
					</div>
					<div class="col-md-1 center-block">
						<p class="text-center">por</p>
					</div>
					<div class="col-md-2 col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" name="cantidad2" id="cantidad2" readonly
								value="<?=$solicitud->cantidad_requerida; ?>" style="text-align: center;">
						</div>
					</div>
					<div class="col-md-2 col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" name="unidades" readonly
								value="<?=$solicitud->medida->nombre; ?>" style="text-align: center;">
						</div>
					</div>
				</div>

				<!-- forma de pago -->
			 <div class="row">
							<div class="col-md-2">
								<h5>Forma de pago<span id="asterisk" class="label label-default">*</span></h5>
								<?php echo form_error('pago', '<div class="error">', '</div>'); ?>
							</div>
							<div class="col-md-8">
								<div class="input-control">
									<h6>Selecciona una o varias de las opciones listadas</h6>

									<div class="col-md-4 col-sm-4">
										<fieldset>
											<label>  <input <?=$solicitud->tipo_pago['Transferencia bancaria'];?> type='checkbox' name='pago[]' value='Transferencia bancaria' >Transferencia bancaria </label>
										</fieldset>
										<fieldset>
											<label>  <input <?=$solicitud->tipo_pago['Giros nacionales'];?> type='checkbox' name='pago[]' value='Giros nacionales' >Giros nacionales </label>
										</fieldset>
										<fieldset>
											<label>  <input <?=$solicitud->tipo_pago['Cheque'];?> type='checkbox' name='pago[]'  value='Cheque' >Cheque </label>
										</fieldset>
									</div>
									<div class="col-md-4 col-sm-4">
										<fieldset>
											<label>  <input <?=$solicitud->tipo_pago['Efectivo'];?> type='checkbox' name='pago[]' value='Efectivo' >Efectivo </label>
										</fieldset>
										<fieldset>
											<label>  <input <?=$solicitud->tipo_pago['Contraentrega'];?> type='checkbox' name='pago[]' value='Contraentrega' >Contraentrega </label>
										</fieldset>
										<fieldset>
											<label> <input <?=$solicitud->tipo_pago['A convenir'];?> type='checkbox' name='pago[]' value='A convenir' > A convenir </label>
										</fieldset>
									</div>
									<div class="col-md-3 col-sm-3">
										<h6>Otra forma de pago</h6>
										<div class="input-group">
                     						 <input id="otra" type='hidden' name='pago[]' <?php if($solicitud->tipo_pago['Otros']!='') echo 'checked'?> >
											<input type="text" class="form-control" id="pminimo" name="otra"
												value="<?=$solicitud->tipo_pago['Otros']?>" onchange="JavaScript:document.getElementById('otra').checked=true;">
											<?php echo form_error('otra', '<div class="error">', '</div>'); ?>
											<label class="error" for="pago[]" generated="true"></label>
										</div>
									</div>
								</div>
							</div>
						</div>

				<!-- page subtitle (in gray) -->
				<div class="row seccion">
					<h4>Información Complementaria</h4>
				</div>

				<!-- lugar de entrega -->
			<div class="row">
					<div class="col-md-2 col-sm-3">
						<h5>Lugar de entrega</h5>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6">
						<input type='hidden'  class="form-control" value="<?=$solicitud->departamento_entrega?>" id='provincia_selecionada'>
						<select class="form-control provincia inputbox" id="combo_d" name="departamento" >
						 <?php $depatamento_actual=$solicitud->departamento_entrega;?>
							<?php foreach ($departamentos as $fila):?>
									<?php if($fila->id_departamento==$depatamento_actual||$fila->nombre==$depatamento_actual): ?>
										<option value="<?= $fila->id_departamento ?>" selected
											<?php echo set_select('departamento', $fila->id_departamento); ?> ><?= $fila->nombre ?></option>
									<?php else: ?>
										 <option value="<?= $fila->id_departamento ?>" 
											<?php echo set_select('departamento', $fila->id_departamento); ?> ><?= $fila->nombre ?></option>
									<?php endif; ?>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6">
						<select class="form-control municipio inputbox" id="combo_m" name="municipio">
							 <?php $municipio_actual=$solicitud->ciudad_entrega;?>
								 <?php foreach ($municipios as $row): ?>
										<?php if($municipio_actual==$row->id_municipio||$municipio_actual==$row->municipio): ?>
											<option value="<?= $row->id_municipio ?>"  selected
												<?= set_select('municipio', $row->id_municipio); ?>><?= $row->municipio ?></option>
										<? else: ?>                  
											<option value="<?= $row->id_municipio ?>" 
												<?= set_select('municipio', $row->id_municipio); ?>><?= $row->municipio ?></option>
										<?php endif; ?>
								 <?php endforeach; ?>
						</select>
					</div> 
				</div>
			 <!-- boton guardar cambios -->
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
						<div class="btn-group  btn-group-lg vcenter" id="btn_submit">
							<button type="submit" class="btn btn-default">Guardar Cambios</button>
						</div>
					</div>
				</div>
			</div>
		<?= form_close() ?>
	</div>
</div>