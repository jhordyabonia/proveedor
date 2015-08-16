		<!-- own imports -->
		<script type="text/javascript">
    base_url="<?=base_url()?>";
		producto_tipo=<?php echo $producto->tipo; ?>;
		producto_sector=<?php echo $producto->sector; ?>;
		</script>
		<link href="<?= base_url() ?>assets/css/publicar_producto/edicionproducto_style.css" rel="stylesheet" type="text/css" >
		<link href="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.css" rel="stylesheet" type="text/css" />
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url() ?>assets/js/publicar_producto/jquery.number.min.js"></script>
    <script src="<?= base_url() ?>assets/js/publicar_producto/bootstrap-filestyle.min.js"> </script>
    <script src="<?= base_url() ?>assets/js/publicar_producto/jquery.tagsinput.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/js/publicar_producto/funcionalidades.js"></script>
		
		<div class="container-fluid">
			<div class="row">
				<!-- sidebar -->
			<div class="col-sm-2">
					<!-- div boton Publicar ofertas -->
				<div class="col-xs-3 col-xs-push-2 col-sm-12 col-sm-push-0 text-center btn1 " 
					 onclick="location.href='<?= base_url() ?>publicar_producto';" 
					 style="cursor:pointer;">
					<img src="<?php echo img_url(); ?>Tablero_usuario/Publicar_Producto.png" 
					class="img-responsive img_btn1">
					<h4 class="boton">Publicar Producto</h4>
				</div>
			<!-- div boton Administrar mis oferta -->
					<div class="col-xs-3 col-xs-push-4 col-sm-12 col-sm-push-0 text-center btn2 "
					onclick="location.href='<?= base_url() ?>producto/administrar';" 
					 style="cursor:pointer;">
						<img src="<?php echo img_url(); ?>Tablero_usuario/Ediccion_de_producto.png" 
						class="img-responsive img_btn1">
						<h4 class="boton">Administrar Producto</h4>
					</div>
			</div> 

				<!-- page content -->
				<?php
					$atributos = array(
						'autocomplete' => 'off',
						'id' => 'default-behavior', 'novalidate' => 'novalidate');
				?>
				<?= form_open_multipart('producto', $atributos); ?>
					<div class="col-md-10 col-sm-10">
						<!-- page title -->
						<div class="row">
							<h3>Editar producto</h3>
						</div>

						<?php if ($this->session->flashdata('producto_registrado')) { ?>
							<div class="row"> <div class="col-md-12">
								<div class="alert alert-success" role="alert">
									<strong><?= $this->session->flashdata('producto_registrado') ?></strong>
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
									<input type="hidden" name="id_producto" value="<?php echo $producto->id; ?>">
									<input type="text" class="form-control" name="nombre"
										value="<?php echo $producto->nombre; ?>" required >
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
                    required class="form-control"><?php echo $producto->descripcion; ?></textarea>
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
                   <?  foreach ($producto->imagenes as $key => $value):?> 
                    <?php if($value=='default.jpg') {continue;}    ?>              
                        <div id='imagen<?=$key?>' class="col-md-4 col-sm-4 col-xs-4">
                          <a href="#" class="thumbnail">
                            <img class="img-responsive" src="<?=base_url();?>uploads/<?=$value;?>" alt="Imagen eliminada">
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
                <?php echo form_error('etiquetas', '<div class="error">', '</div>'); ?>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="input-control">
                  <?php $keywords=""; 
                  if($producto->palabras_clave)
                  {
                    foreach ($producto->palabras_clave as $key)
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

            <!-- precio unitario / a convenir -->
            <div class="row">
              <div class="col-md-3 col-sm-4 col-xs-5">
                <fieldset>
                  <?php 
                    $tipo_pago='default';
                    if($producto->precio_unidad=="0")
                    {
                       $tipo_pago='checked';
                    }
                  ?>
                  <label> Precio unitario <input type="radio" id="precioUni" name="rd_precio"
                    value="precioUni" checked value="pr_unit"> </label>
                </fieldset>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-5">
                <fieldset>

                  <label> Precio a convenir <input type="radio" id="precioconvenir" name="rd_precio"
                    value="precioconvenir" <?=$tipo_pago?> value="pr_aconv" onchange="JavaScript:precio1.value=0;precio1_format.value=0;"> </label>
                </fieldset>
              </div>
            </div>

            <!-- precio por unidad -->
            <div class="row">
              <div class="col-md-2">
                <h5 id="titulo1">Precio por unidad <span id="asterisk" class="label label-default">*</span></h5>
              </div>
              <div class="col-md-3 col-sm-4" id="seccion_precio">
                <div class="input-group">
                  <span class="input-group-addon">$</span>
                  <input type="text" class="form-control" id="precio1_format" required="true"  value="<?php echo $producto->precio_unidad ?>" >
                  <input type="hidden" class="form-control" id="precio1" readonly name="precio" 
                    value="<?php echo $producto->precio_unidad ?>"/>
                </div>
                <label for="precio1_format" generated="true" class="error"></label>
                <label for="precio1" generated="true" class="error" style="display: none !important;"></label>
                <h6 class="hidden-xs">Ingrese el precio</h6>
                <h6 class="hidden-xs">Ej. 650.000</h6>
              </div>
             <script>
          dimension='<?=$producto->medida?>';
          cantidad=$("#precio1_format").val();
          jQuery(document).ready(function($) {
            $("#combo1").load(base_url + "herramientas/unidad_medida/"+cantidad+"/<?=$producto->medida->id_dimension?>");
            console.log(base_url + "herramientas/unidad_medida/"+cantidad+"/<?=$producto->medida->id_dimension?>");
          });
          </script>
          <div class="col-md-2 col-sm-4 col-xs-5">

            <select class="form-control" id="combo1" name="medida" value="<?=$producto->medida->id_dimension?>">
              </select>

            <input class="form-control" type="hidden" id="medida" value="0">
            
          </div>
        </div>

            <!-- tiempo minimo -->
            <div class="row">
              <div class="col-md-2">
                <h5>Pedido mínimo<span id="asterisk" class="label label-default">*</span></h5>
              </div>
              <div class="col-md-2 col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" required name="pedido_min" id="pedido_min"
                    value="<?php echo $producto->pedido_minimo; ?>">
                </div>
                <h6>Ingrese la cantidad</h6>
                <h6>Ej. 1.000</h6>
              </div>
              <div class="col-md-2 col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" name="medidas" disabled="disabled"
                    value="Unidad (Und)">
                </div>
              </div>
            </div>
<!--             tiempo de entrega
<div class="row">
	<div class="col-md-2">
		<h5>Tiempo de entrega<span id="asterisk" class="label label-default">*</span></h5>
		<?php echo form_error('tiempo_entrega', '<div class="error">', '</div>'); ?>
	</div>
	<div class="col-md-2 col-sm-4">
		<div class="input-group">
			<input type="text" class="form-control" name="tiempo_entrega" required="true"
				id="tiempo_entrega" value="0" >
		</div>
		<h6 class="hidden-xs">Ej. 8</h6>
	</div>
	<div class="col-md-2 col-sm-4">
		<select class="form-control" id="combo2" name="list_entrega">
			<option value="Semanas">Semanas</option>
			<option value="Dias">Dias</option>
			<option value="Meses">Meses</option>
			<option value="Horas">Horas</option>
		</select>
	</div>
</div>

capacidad de suministro
<div class="row">
	<div class="col-md-2">
		<h5>Capacidad de suministro</h5>
		<?php echo form_error('capacidad', '<div class="error">', '</div>'); ?>
	</div>
	<div class="col-md-2 col-sm-4">
		<div class="input-group">
			<input type="text" class="form-control" name="capacidad" id="capacidad"
				value="0" >
		</div>
		<h6>Ingrese la cantidad</h6>
		<h6 class="hidden-xs">Ej. 500</h6>
	</div>
	<div class="col-md-2 col-sm-4">
		<div class="input-group">
			<input type="text" class="form-control" name="medidas" disabled="disabled"
				value="Unidad (Und)">
		</div>
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1" id="seccion_precio_por"><h5>por</h5></div>
	<div class="col-md-2 col-sm-3 col-xs-5">
		<select class="form-control" id="combo" name="list_capacidad">
			<option value="Día">Dia</option>
			<option value="Semana">Semana</option>
			<option value="Mes">Mes</option>
			<option value="Hora">Hora</option>
		</select>
	</div>
</div>
 -->
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
											<label>  <input <?=$producto->tipo_pago['Transferencia bancaria'];?> type='checkbox' name='pago[]' value='Transferencia bancaria' >Transferencia bancaria </label>
										</fieldset>
										<fieldset>
											<label>  <input <?=$producto->tipo_pago['Giros nacionales'];?> type='checkbox' name='pago[]' value='Giros nacionales' >Giros nacionales </label>
										</fieldset>
										<fieldset>
											<label>  <input <?=$producto->tipo_pago['Cheque'];?> type='checkbox' name='pago[]'  value='Cheque' >Cheque </label>
										</fieldset>
									</div>
									<div class="col-md-4 col-sm-4">
										<fieldset>
											<label>  <input <?=$producto->tipo_pago['Efectivo'];?> type='checkbox' name='pago[]' value='Efectivo' >Efectivo </label>
										</fieldset>
										<fieldset>
											<label>  <input <?=$producto->tipo_pago['Contraentrega'];?> type='checkbox' name='pago[]' value='Contraentrega' >Contraentrega </label>
										</fieldset>
										<fieldset>
                      <label> <input <?=$producto->tipo_pago['A convenir'];?> type='checkbox' name='pago[]' value='A convenir' > A convenir </label>
                    </fieldset>
                       </label>
                     
									</div>
									<div class="col-md-3 col-sm-3">
										<h6>Otra forma de pago</h6>
                    
										<div class="input-group">
                      <input id="otra" type='hidden' name='pago[]' <?php if($producto->tipo_pago['Otros']!='') echo 'checked'?> >
											<input type="text" class="form-control" id="pminimo" name="otra" onchange="JavaScript:document.getElementById('otra').checked=true;"
												value="<?=$producto->tipo_pago['Otros']?>">
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

						<!-- empresa o sector al que le interesa ... -->
						<div class="row">

							<div class="col-md-2 col-sm-3">
								<h5>Empresa o sector al que le interesa el producto</h5>
							</div>
							<div class="col-md-2 col-sm-3 col-xs-6">
								<select class="form-control" id="combo_tipo" name="tipo" 
                  <?php foreach ($tipos as $key => $value) :?>
                    <? if($value->id_tipoempresa==$producto->tipo):?>
                      <option value="<?=$value->id_tipoempresa?>" selected ><?=$value->tipo?></potion>
                    <?php else:?> 
                      <option value="<?=$value->id_tipoempresa?>" ><?=$value->tipo?></potion>
                    <?php endif;?>
                  <?php endforeach;?>
								</select>
							</div>
							<div class="col-md-2 col-sm-3 col-xs-6">
								<select class="form-control" id="combo_sector" name="sector" >
                   <?php foreach ($categoria as $key => $value) :?>
                    <? if($producto->sector==$value->id_categoria):?>
                      <option value="<?=$value->id_categoria?>" selected ><?=$value->nombre_categoria?></potion>
                    <?php else:?> 
                      <option value="<?=$value->id_categoria?>" ><?=$value->nombre_categoria?></potion>
                    <?php endif;?>
                  <?php endforeach;?>
                </select>
								</select>
							</div>
						</div>

						<!-- estado del producto -->
						<div class="row">
							<div class="col-md-2 col-sm-3">
								<h5>Estado del producto</h5>
							</div>
							<div class="col-md-2 col-sm-3">
								<select class="form-control" id="combo" name="estado">
								<?php if ($producto->estado=="Nuevo"): ?>
									<option value="Nuevo" selected>Nuevo</option>
									<option value="Usado">Usado</option>
								<?php else: ?>
									<option value="Nuevo" >Nuevo</option>
									<option value="Usado" selected>Usado</option>
								<?php endif ?>
								</select>
							</div>
						</div>

						<!-- boton guardar cambios -->
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
								<div class="btn-group  btn-group-lg vcenter" id="btn_submit">
									<button type="submit" class="btn btn-default"> Guardar Cambios </button>
								</div>
							</div>
						</div>
					</div>
				<?= form_close() ?>
			</div>
		</div>
