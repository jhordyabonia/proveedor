    <script type="text/javascript">
    producto_tipo=0;
    producto_sector=0;
    jQuery(document).ready(function($) {
        $("#publicar_producto").addClass('active');
    });
    </script>
   <!-- own imports -->
     <link href="<?= base_url() ?>assets/css/publicar_producto/edicionproducto_style.css"
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
     <div class="row">
       <!-- sidebar -->
      <div class="col-sm-2" style="padding-left: 2%;">
          <!-- div boton Publicar ofertas -->
        <div class="col-xs-3 col-xs-push-2 col-sm-12 col-sm-push-0 text-center btn1 ">
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
            <h4 class="boton">Administrar mis productos</h4>
          </div>
      </div>

        <!-- page content -->
        <?php
          $atributos = array(
            'autocomplete' => 'off',
            'id' => 'default-behavior', 'novalidate' => 'novalidate');
        ?>
        <?= form_open_multipart('publicar_producto/registrar', $atributos); ?>
          <div class="col-md-10 col-sm-10">
            <!-- page title -->
            <div class="row">
              <h3>Publicar Producto</h3>
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
                <h5>Nombre del producto<span id="asterisk" class="label label-default">*</span></h5>
              </div>
              <div class="col-md-4 col-sm-5">
                <div class="input-control">
                  <input type="text" class="form-control" name="nombre"
                    value="<?php echo set_value('nombre'); ?>" required >
                  <h6>Ingresa el nombre del producto con sus especificaciones técnicas</h6>
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
                <select name="menu" size="10" id="textarea1" class="form-control"
                  style="width: 450px;">

                  <?php foreach ($categoria as $fila): ?>
                    <option title="<?= $fila->nombre_categoria ?>"
                      value="<?= $fila->id_categoria ?>"><?= $fila->nombre_categoria ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
              <div class="col-md-1 col-sm-2 col-xs-2" id="flecha_union_cat_subcat" >
                <img src="<?= base_url() ?>img/pag_siguiente_ok.png">
              </div>
              <div class="col-md-3 col-sm-5 col-xs-10">
                <div name="menu" id="textarea2" class="form-control textarea2"
                  style="overflow-y: scroll; display: none"></div>
              </div>
              <div class="col-md-2 col-sm-4 col-xs-4" id="botones">
                <div class="btn-group btn-group-lg vcenter" id="agregar">
                  <button type="button" class="btn btn-default">Agregar &#62;</button>
                </div>
                <div class="btn-group btn-group-lg vcenter" id="eliminar">
                  <button type="button" class="btn btn-default">&#60; Quitar</button>
                </div>
              </div>
              <div class="col-md-3 col-sm-8 col-xs-8" id="cat_subcat">
                <div> <p>Seleccionado:</p> </div>
                <div id="categoria_div_titulo">
                  <p>Categoria:</p>
                </div>
                <div id="categoria_div_contenido">
                  <input type="hidden" readonly id="categoria" required="true"
                    name="categoria" value="<?php echo set_value('categoria'); ?>" />
                  <div id="categoria_div">
                    <p id="cat_selecc"> <?php echo set_value('categoria'); ?> </p>
                  </div>
                </div>
                <div id="subcategoria_div_titulo">
                  <p>Subcategoria:</p>
                </div>
                <div id="subcategoria_div_contenido">
                    <input type="hidden" readonly id="subcategoria"
                      name="subcategoria" value="<?php echo set_value('subcategoria'); ?>"/>
                  <div id="subcategoria_div">
                    <p id="subcat_selecc">
                      <?php echo set_value('subcategoria'); ?> </p>
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
                    required class="form-control"><?php echo set_value('descripcion'); ?></textarea>
                </div>
              </div>
              <div class="col-md-2 col-sm-4">
                <p id="contador_textarea3"> <b>5.000</b> palabras máximo</p>
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
                      data-buttonText="Agregar Imagen(es)" data-badge="false">
                  </div>
                  <div class="btn-group btn-group-lg vcenter" id="eliminar1">
                    <button type="button" class="btn btn-default">Eliminar Imagen</button>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="row" id="preview">
                  <!-- <div class="col-md-2 col-sm-2">
                    <a href="#" class="thumbnail"><img data-src="holder.js/100%x180" alt="imagen 1"></a>
                  </div> -->
                </div>
                <h5 style="text-align: center;">Imágenes agregadas (máximo 5)</h5>
              </div>
            </div>

            <!-- palabras clave -->
            <div class="row">
              <div class="col-md-12">
                <h4><b>Palabras clave + ENTER</b></h4>
                <h6>Las 'palabras clave' hacen que el producto sea más visible a las empresas.</h6>
                <?php echo form_error('etiquetas', '<div class="error">', '</div>'); ?>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="input-control">
                  <input type="text" class="form-control" id="Pclave"  >
                </div>
                <input type="hidden" id="qwerty" name="etiquetas">
              </div>
              <div class="col-md-12">
                <h6><b>Ingresa la palabra clave y pulsa la tecla ENTER</b></h6>
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
                  <label> Precio unitario <input type="radio" id="precioUni" name="rd_precio"
                    value="precioUni" checked="checked" value="pr_unit"> </label>
                </fieldset>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-5">
                <fieldset>
                  <label> Precio a convenir <input type="radio" id="precioconvenir" name="rd_precio"
                    value="precioconvenir" value="pr_aconv"> </label>
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
                  <input type="text" class="form-control" id="precio1_format" required="true"
                    value="<?php echo set_value('precio'); ?>" >
                  <input type="hidden" class="form-control" id="precio1" readonly name="precio"
                    value="<?php echo set_value('precio'); ?>"/>
                </div>
                <label for="precio1_format" generated="true" class="error"></label>
                <label for="precio1" generated="true" class="error" style="display: none !important;"></label>
                <h6 class="hidden-xs">Ingrese el precio</h6>
                <h6 class="hidden-xs">Ej. 650.000</h6>
              </div><script>
          dimension='<?=$producto->medida?>';
          cantidad=$("#precio1_format").val();
          jQuery(document).ready(function($) {
            $("#combo1").load(base_url + "herramientas/unidad_medida/"+cantidad+"/<?=$producto->medida->id_dimension?>");
            console.log(base_url + "herramientas/unidad_medida/"+cantidad+"/<?=$producto->medida->id_dimension?>");
          });
          </script>
              <div class="col-md-1 col-sm-1 col-xs-1" id="seccion_precio_por"><h5>por</h5></div>
              <div class="col-md-2 col-sm-4 col-xs-5">
                <select class="form-control" id="combo1" name="list_medidas">
                  <!-- <option>Not loaded</option> -->
                </select>
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
                    value="<?php echo set_value('pedido_min'); ?>">
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
        id="tiempo_entrega" value="<?php echo set_value('tiempo_entrega'); ?>" >
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
</div> -->

            <!-- capacidad de suministro -->
<!--             <div class="row">
  <div class="col-md-2">
    <h5>Capacidad de suministro</h5>
    <?php echo form_error('capacidad', '<div class="error">', '</div>'); ?>
  </div>
  <div class="col-md-2 col-sm-4">
    <div class="input-group">
      <input type="text" class="form-control" name="capacidad" id="capacidad"
        value="<?php echo set_value('capacidad'); ?>" >
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
</div> -->

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
                      <label> <input type="checkbox" name="pago[]"
                        <?php echo set_checkbox('pago', 'Transferencia Bancaria', false) ?>
                        value="Transferencia bancaria"> Transferencia bancaria </label>
                    </fieldset>
                    <fieldset>
                      <label> <input type="checkbox" name="pago[]"
                        <?php echo set_checkbox('pago', 'Giros nacionales', false) ?>
                        value="Giros nacionales"> Giros nacionales </label>
                    </fieldset>
                    <fieldset>
                      <label> <input type="checkbox" name="pago[]"
                        <?php echo set_checkbox('pago', 'Cheque', false) ?>
                        value="Cheque"> Cheque </label>
                    </fieldset>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <fieldset>
                      <label> <input type="checkbox" name="pago[]"
                        <?php echo set_checkbox('pago', 'Efectivo', false) ?>
                        value="Efectivo"> Efectivo </label>
                    </fieldset>
                    <fieldset>
                      <label> <input type="checkbox" name="pago[]"
                        <?php echo set_checkbox('pago', 'Contraentrega', false) ?>
                        value="Contraentrega"> Contraentrega </label>
                    </fieldset>
                    <fieldset>
                      <label> <input type="checkbox" name="pago[]"
                        <?php echo set_checkbox('pago', 'A convenir', false) ?>
                        value="A convenir"> A convenir </label>
                    </fieldset>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <h6>Otra forma de pago</h6>
                    <div class="input-group">
                      <input id="otra" type='hidden' name='pago[]'>
                      <input type="text" class="form-control" id="pminimo" name="otra" onchange="JavaScript:document.getElementById('otra').checked=true;"
                        value="<?php echo set_value('otra'); ?>">
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
                <select class="form-control" id="combo_tipo" name="tipo" >
                	 <?php foreach ($tipo_empresa as $fila): ?>
		                <option value="<?= $fila->id_tipoempresa ?>" 
		                  <?php echo set_select('tipo', $fila->id_tipoempresa); ?> ><?= $fila->tipo ?></option>
		              <?php endforeach;?>
                </select>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6">
                <select class="form-control" id="combo_sector" name="sector" >
                	 <?php foreach ($categoria as $fila): ?>
		                <option value="<?= $fila->id_categoria ?>" 
		                  <?php echo set_select('sector', $fila->id_categoria); ?> ><?= $fila->nombre_categoria ?></option>
		              <?php endforeach;?>
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
                  <option value="Nuevo">Nuevo</option>
                  <option value="Usado">Usado</option>
                </select>
              </div>
            </div>

            <!-- boton guardar cambios -->
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                <div class="btn-group  btn-group-lg vcenter" id="btn_submit">
                  <button type="submit" class="btn btn-default"> Publica! </button>
                </div>
              </div>
            </div>
          </div>
        <?= form_close() ?>
      </div>
    </div>


<script type="text/javascript">

       document.onload=ready();
       function ready()
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/confirmar_producto/";
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                ready=document.getElementById('ready');
                ready.innerHTML=popup.response;
                console.log(popup.response);
                <?php if($this->session->flashdata('producto_registrado')):?>
                  document.getElementById('launch_popup_ready').click();
                <?php endif; ?>
              }
       }
  </script>
  <div data-toggle="modal" data-target="#confirmar_producto" id="launch_popup_ready">
    </div>
  <div id="ready" onload="JavaScript:ready();">
    </div>