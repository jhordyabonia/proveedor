  <script type="text/javascript">
    producto_tipo=0;
    producto_sector=0;
    jQuery(document).ready(function($) {
        $("#publicar_producto").addClass('active');
    });
    </script>
   <!-- own imports -->
    <link href="<?= base_url() ?>assets/css/publicar_producto/publicar_producto_style.css"
      rel="stylesheet" type="text/css" >

    <link rel="stylesheet" href="<?=base_url()?>assets/css/popup_registro.css">
    <script src="<?= base_url() ?>assets/js/publicar_producto/jquery.number.min.js"></script>
    <script src="<?= base_url() ?>assets/js/publicar_producto/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/js/publicar_producto/bootstrap-filestyle.min.js"> </script>
    <link href="<?php echo css_url().'jquery.tagsinput.min.css' ?>"
      rel="stylesheet" type="text/css" />
    <script src="<?= base_url() ?>assets/js/publicar_producto/jquery.tagsinput.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css"
      rel="stylesheet" type="text/css" />
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/js/publicar_producto/publicar_producto_js.js"></script>


     <div class="row" style="margin-top:110px;margin-bottom:30px;">

       <!-- sidebar -->
      <div class="col-sm-2 col-xs-12 hidden-sm"  style="padding-left: 3.2%;">
          <!-- div boton Publicar ofertas -->
        <div class="col-xs-3 col-xs-push-2 col-sm-12 col-sm-push-0 text-center btn1 hidden-sm hidden-xs">
          <img src="<?php echo img_url(); ?>Tablero_usuario/Publicar_Producto.png" 
          class="img-responsive img_btn1">
          <h4 class="boton">Publicar Producto</h4>
        </div>
      <!-- div boton Administrar mis oferta -->
          <div class="col-xs-3 col-xs-push-4 col-sm-12 col-sm-push-0 text-center btn2 hidden-xs"
          onclick="location.href='<?= base_url() ?>producto/administrar';" 
           style="cursor:pointer;">
            <img src="<?php echo img_url(); ?>Tablero_usuario/Ediccion_de_producto.png" 
            class="img-responsive img_btn1">
            <h4 class="boton">Administrar mis productos</h4>
          </div>

          <div class="col-xs-12 col-sm-12 col-sm-push-0 text-center hidden-xs hidden-sm hidden-md hidden-lg"
          onclick="location.href='<?= base_url() ?>producto/administrar';">
            <button type="submit" class="btn boton-admipro">
              <span class="glyphicon glyphicon-list"></span>
              Administrar mis productos
            </button>
          </div>
      </div>

        <!-- page content -->
        <?php
          $atributos = array(
            'autocomplete' => 'off',
            'id' => 'default-behavior', 'novalidate' => 'novalidate');
        ?>

          <div class="col-md-10 col-sm-12">

            <?php if ($this->session->flashdata('producto_registrado')) { ?>
              <div class="row"> <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                  <strong><?= $this->session->flashdata('producto_registrado') ?></strong>
                </div>
              </div> </div>
            <?php } ?>

            <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs hidden-xs" role="tablist">
              <li role="presentation" class="active" style="width: 40%;  text-align: center;">
                <a href="#publi_simple" aria-controls="publi_simple" role="tab" data-toggle="tab"
                style="font-size: 18px;color: #ff6600;">
                  <span class="glyphicon glyphicon-ok" style="font-size: 18pxs;"></span>
                  Publicación Rápida
                </a>
              </li>
              <li role="presentation">
                <a href="#publi_completa" aria-controls="publi_completa" role="tab" data-toggle="tab" 
                style="font-size: 18px;width: 185%;  text-align: center;color: #2a6496;">
                  <span class="glyphicon glyphicon-list-alt" style="font-size: 18px;"></span>
                  Publicacion Avanzada
                </a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="publi_simple" 
              style="max-width: 800px;">
                <!-- page subtitle (in gray) -->
            <div class="hidden-xs">
              <h4 style="color: #947f7f;font-weight: bold;margin-bottom: 14px;margin-top: 33px;text-align:left;">
                Publicar Producto y/o Servicio
              </h4>
            </div>
            
          <?= form_open_multipart('publicar_producto_simple'); ?>
          <!-- Row del Nombre del Porducto -->
          <div class="row" style ="margin-bottom:8px;">
            <div class="col-xs-12">
              <div class="col-md-6 col-sm-5" style="padding: 0;">
                <div class="input-group">
                  <input class="form-control new-br" name="nombre"
                   onchange="JavaScript:verificar_largo(this,5);" 
                   onclick="JavaScript:limpiar(this)" 
                   placeholder="Nombre del producto" value="<?php echo set_value('nombre'); ?>" 
                   rel='tooltip' data-placement='right' id="" required type="text">
                  <span class="input-group-addon new-input-group margen-input-veri">
                        <i id='err_nombre'>
                    <?php if(form_error('nombre', '','')!='')
                      {
                      echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
                      }
                    ?>
                    </i>
                    </span>

                  <!-- <div class="input-group-addon style-transparent">
                    <i class="fa fa-check-circle veri-ok"></i>
                  </div>-->
                  <div class="input-group-addon style-transparent" style="padding-left: 0;">
                    <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

           <!-- Campo De Validación 
          <div class="input-group" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div>-->

          <!-- Campo De Validación -->
          <div class="input-group" style="margin: 0;" id="parent_msj_err_nombre">
            <span class="style-text-validation" id="msj_err_nombre"><?=form_error('nombre', '','')?></span>
          </div>

            <!-- Row de Categorias del Producto -->
            <div class="row" style ="margin-bottom:8px;">
              <div class="col-xs-12">

                <div class="col-md-6 col-sm-5" style="padding: 0;">
                  <div class="input-group">
                    <select class="form-control new-br" name="categoria" id="categoria" onchange="JavaScript:cambio_categoria_simple(this.value); document.getElementById('div_subcategoria').style.display='';" required value="<?=set_value('categoria'); ?>" 
                    title="<?=form_error('categoria', '','')?>" rel='tooltip' data-placement='right' >
                      <option value="" selected>Seleccione una categoria del producto</option>
                      <?php foreach ($categoria as $fila): ?>
                        <option title="<?= $fila->nombre_categoria ?>"
                          value="<?= $fila->id_categoria ?>"><?= $fila->nombre_categoria ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="input-group-addon new-input-group margen-input-veri">
                      <?php if(form_error('categoria', '','')!='')
                      {
                        echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
                      }
                      ?>
                    </span>
                  <!--  <div class="input-group-addon style-transparent">
                      <i class="fa fa-times-circle veri-nok"></i>
                    </div> -->
                    <div class="input-group-addon style-transparent" style="padding-left: 0;">
                      <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Campo De Validación 
          <div class="input-group" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div> -->

          <!-- Campo De Validación -->
          <div class="input-group" style="margin: 0;" id="parent_msj_err_categoria">
            <span class="style-text-validation" id="msj_err_categoria"><?=form_error('categoria', '','');?></span>
          </div>

          <!-- Row de Sub-Categorias del Producto -->
            <div class="row" id="div_subcategoria" style="display:none">
              <div class="col-xs-12">
                <div class="col-md-6 col-sm-5" style="padding: 0;">
                  <div class="input-group">
                    <select class="form-control new-br" name="subcategorias_simples" required id="subcategorias_simples">
                      <option value="" selected>Seleccione una sub-categoria del producto</option>       
                    </select>
                    <div class="input-group-addon style-transparent" style="padding-left: 0;">
                      <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- categorias y subcategorias
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
            </div> -->

            <!-- Row de Descripcion del Producto -->
            <div class="row" style ="margin-bottom:8px;">
              <div class="col-xs-12">
                <div class="col-md-7 col-sm-5" style="padding: 0;">
                  <div class="input-group">
                    <textarea name="descripcion" id="textarea3" onchange="JavaScript:verificar_largo(this,10);" onclick="JavaScript:limpiar(this);" placeholder="Descripción del producto o servicio"
                    required class="form-control new-br" rel='tooltip' data-placement='right' value="<?php echo set_value('descripcion'); ?>" ><?php echo set_value('descripcion'); ?></textarea>

                    <span class="input-group-addon new-input-group margen-input-veri">
                          <i id='err_descripcion'>
                      <?php if(form_error('descripcion', '','')!='')
                        {
                        echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
                        }
                      ?>
                      </i>
                    </span>
                    <div class="input-group-addon style-transparent">
                      <p class="style-max-pala hidden-sm" id="contador_textarea3"> <b>5.000</b> caracteres máximo</p>
                    </div>
                    <div class="input-group-addon style-transparent" style="padding-left: 0;">
                      <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <div class="input-group" style="margin: 0;" id="parent_msj_err_descripcion">
            <span class="style-text-validation" id="msj_err_descripcion"><?=form_error('descripcion', '','')?></span>
          </div>
            <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div>



            <!-- precio unitario / a convenir -->
            <div class="row" style="margin-top: -8px;margin-bottom: 20px;">
              <div class="col-md-12" style="padding: 0;">
              <div class="col-md-12 col-xs-12">
              <div class="col-md-4 col-xs-6" style="padding:0;">                
                <div class="col-md-6 col-sm-4 col-xs-6" style="padding:0; top:2px;">
                      <input type="radio" id="precioUni" name="rd_precio" value="precioUni" 
                      value="pr_unit" checked>
                      Precio unitario
                </div>
              </div>
              <div class="col-md-4 col-xs-6" style="padding:0;">
                <div class="col-md-6 col-sm-5 col-xs-7" style="padding:0; top:2px;">
                      <input type="radio" id="precioconvenir" name="rd_precio" value="precioconvenir" 
                      value="pr_aconv">
                      Precio a convenir  
                </div>
              </div>
              </div>
            </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-text-val">Validación Correspondiente</span>
          </div>

            <!-- precio por unidad -->
            <div class="row" style="margin-bottom: 16px;margin-top: 6px;">
              <div class="col-xs-12" style="padding: 0;">
                  <div class="col-md-4 col-sm-4 col-xs-12" id="seccion_precio" style="padding-right: 0;">
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" class="form-control" id="precio1_format" required="true"
                        value="<?php echo set_value('precio'); ?>" placeholder="Precio por unidad">
                      <div class="input-group-addon style-transparent">
                        <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                      </div>
                      <input type="hidden" class="form-control" id="precio1" readonly name="precio"
                        value="<?php echo set_value('precio'); ?>"/>
                    </div>
                    <label for="precio1_format" generated="true" class="error"></label>
                    <label for="precio1" generated="true" class="error" style="display: none !important;"></label>
                    <h6 class="hidden-xs" style="margin: -13px 0px;">Ingrese el precio Ej. 650.000</h6>
                  </div>
              <div class="col-md-1 col-sm-1 col-xs-12" id="seccion_precio_por" style="padding:0;">
                <h5>por</h5>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-12form-group" >
              <div class="input-group">
                <select class="form-control new-br" id="combo1" name="list_medidas" disabled="true">
                  <!-- <option>Not loaded</option> -->
                </select>
                <div class="input-group-addon style-transparent">
                  <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                </div>
              </div>
            </div>
            </div>
          </div>

          <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-text-val">Validación Correspondiente</span>
          </div>
            

            <!-- servicio de fotos -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="col-md-5 col-sm-5 col-xs-12" style="padding: 0;">
                  <div class="col-md-9 col-xs-12 btn-group btn-group-lg btn-agregar-img">
                    <span id="upfile1">
                      <span class="col-md-2 hidden-xs hidden-sm glyphicon glyphicon-picture icono-plus"></span>
                      <span class="col-md-10 col-xs-12" style="text-align: center;  font-size: 15px;
                        line-height: 1;margin-top: 7px;margin-bottom: 12px;">Agreagar Imágenes <br> (máximo 5)</span>
                    </span>
                    <input type="file" class="filestyle" id="btn_archivos" name="userfiles[]" multiple
                      data-size="lg" data-input="false" data-icon="false" data-badge="false"
                      onchange="JavaScript:oculta_eliminar();" onload="JavaScript:oculta_eliminar();" >
                  </div>
                </div>
               
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="row" id="preview">
                  <!-- <div class="col-md-2 col-sm-2">
                    <a href="#" class="thumbnail"><img data-src="holder.js/100%x180" alt="imagen 1"></a>
                  </div> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="row" style="margin-top:-14px;" >
              <div class="col-md-12 col-xs-12" style="padding: 0;">
                <div class="col-md-6 col-xs-12">
                  <div style="display:none" class="btn-group btn-group-lg vcenter" id="eliminar1" >
                      <button style="display:none" type="button" id="btn_delete" class="btn btn-default">
                        <span class="glyphicon glyphicon-remove"></span>
                        Eliminar Imagen
                      </button>
                  </div>
                </div>
              </div>
              </div>

            <!-- boton guardar cambios -->
            <div class="row" style="margin-top:-14px;">
              <div class="col-md-12 col-xs-12" style="padding:0;">
                <div class="col-md-7 col-xs-12">
                    <button type="submit" class="btn btn-default btn_submits"> 
                      PUBLICAR PRODUCTO 
                    </button>
                </div>
              </div>
            </div>

            <?= form_close() ?>

          </div>

              <div role="tabpanel" class="tab-pane" id="publi_completa" style="max-width: 800px;">
                <div class="col-xs-12">
                  <h3 style="color: #ff6600;font-weight: bold;margin-top:35px;margin-bottom: 26px;text-align: left;">
                    PUBLICACIÓN AVANZADA DE PRODUCTO
                  </h3>
                </div>

                <div class="col-md-12 hidden-xs hidden-sm" style="margin-top: -23px;  padding-left: 0;">
                  <h4 class="seccion" style="height: 40px;padding: 12px;">
                    Información Basica
                  </h4>
                </div>
            <?= form_open_multipart('publicar_producto/registrar'); ?>
            
        <!-- Row del Nombre del Porducto -->
          <div class="row" style="margin-bottom:15px">
            <div class="col-xs-12">
              <div class="col-md-6 col-sm-5" style="padding: 0;">
                <div class="input-group">
                  <input  class="form-control new-br" name="nombre_avanzado" placeholder="Nombre del producto"
                  onchange="JavaScript:verificar_largo(this,5);" onclick="JavaScript:limpiar(this);"
                  value="<?php echo set_value('nombre_avanzado'); ?>" required type="text" >

                    <span class="input-group-addon new-input-group margen-input-veri">
                        <i id='err_nombre_avanzado'>
                    <?php if(form_error('nombre_avanzado', '','')!='')
                      {
                      echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
                      }
                    ?>
                    </i>
                      </span>
                  <!--div class="input-group-addon style-transparent">
                    <i class="fa fa-check-circle veri-ok"></i>
                  </div-->
                  <div class="input-group-addon style-transparent" style="padding-left: 0;">
                    <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <!-- Campo De Validación -->
           <div class="input-group" style="margin: 0;" id="parent_msj_err_nombre_avanzado">
            <span class="style-text-validation" id="msj_err_nombre_avanzado"><?=form_error('nombre_avanzado', '','')?></span>
          </div>

          

            <!-- Row de Categorias del Producto -->
            <div class="row" style="margin-bottom:15px">
              <div class="col-xs-12">
                <div class="col-md-6 col-sm-5" style="padding: 0;">
                  <div class="input-group">
                    <select class="form-control new-br" name="categoria" required onchange="JavaScript:cambio_categoria(this.value);document.getElementById('div_subcategoria2').style.display='';">
                      <option value="" selected>Seleccione una categoria del producto</option>
                      <?php foreach ($categoria as $fila): ?>
                        <option title="<?= $fila->nombre_categoria ?>"
                          value="<?= $fila->id_categoria ?>"><?= $fila->nombre_categoria ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!--div class="input-group-addon style-transparent">
                      <i class="fa fa-times-circle veri-nok"></i>
                    </div-->
                    <div class="input-group-addon style-transparent" style="padding-left: 0;">
                      <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->

          <!-- Row de Sub-Categorias del Producto -->
            <div class="row" style="margin-bottom:15px;display:none" id="div_subcategoria2" >
              <div class="col-xs-12">
                <div class="col-md-6 col-sm-5" style="padding: 0;">
                  <div class="input-group">
                    <select class="form-control new-br" required name="subcategoria" id="subcategorias">
                      <option value="" selected>Seleccione una subcategoria del producto</option>

                    </select>
                    <!--div class="input-group-addon style-transparent">
                      <i class="fa fa-check-circle veri-ok"></i>
                    </div-->
                    <div class="input-group-addon style-transparent" style="padding-left: 0;">
                      <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->

            <!-- categorias y subcategorias
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
            </div> -->

            <!-- descripcion -->
            <div class="row">
              <div class="col-xs-12">
                <div class="col-md-7 col-sm-5" style="padding: 0;">
                  <div class="input-group">
                    <textarea name="descripcion_avanzada" id="textarea4" placeholder="Descripción del producto o servicio"
                     onchange="JavaScript:verificar_largo(this,10);" onclick="JavaScript:limpiar(this);" 
                    required class="form-control new-br"><?php echo set_value('descripcion_avanzada'); ?></textarea>
                    <span class="input-group-addon new-input-group margen-input-veri">
                        <i id='err_descripcion_avanzada'>
                    <?php if(form_error('descripcion_avanzada', '','')!='')
                      {
                      echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
                      }
                    ?>
                    </i>
                  </span>
                    <div class="input-group-addon style-transparent">
                      <p class="style-max-pala hidden-sm" id="contador_textarea4"> <b>5.000</b> palabras máximo</p>
                    </div>
                    <div class="input-group-addon style-transparent" style="padding-left: 0;">
                      <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- Campo De Validación -->
            <div class="input-group" style="margin: 0;" id="parent_msj_err_descripcion_avanzada">
            <span class="style-text-validation" id="msj_err_descripcion_avanzada"><?=form_error('descripcion_avanzada', '','')?></span>
          </div>

            <!-- servicio de fotos -->
            <div class="row">
              <div class="col-md-12 col-xs-12" style="padding: 0;">
                <div class="col-md-5 col-sm-5 col-xs-6" style="padding: 0;margin-left:15px;">
                  <div class="col-md-9 btn-group btn-group-lg btn-agregar-img" onclick="JavaScript:document.getElementById('btn_archivos2').click()">
                    <span id="upfile2">
                      <span class="col-md-2 glyphicon glyphicon-picture icono-plus"></span>
                      <span class="col-md-10" style="text-align: center;  font-size: 15px;
                        line-height: 1;margin-top: 7px;">Agreagar Imágenes (máximo 5)</span>
                    </span>
                     <input type="file" class="filestyle" id="btn_archivos2" name="userfiles[]" multiple
                      data-size="lg" data-input="false" data-icon="false" data-badge="false"
                      onchange="JavaScript:oculta_eliminar2();" onload="JavaScript:oculta_eliminar2();">
                  </div>
                </div>
               
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="row" id="preview_avanzado">
                  <!-- <div class="col-md-2 col-sm-2">
                    <a href="#" class="thumbnail"><img data-src="holder.js/100%x180" alt="imagen 1"></a>
                  </div> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="row" style="margin-bottom: 10px;">
              <div class="col-md-12 col-xs-12" style="padding-left: 0;
">
                <div class="col-md-6 col-xs-12">
                  <div class="btn-group btn-group-lg vcenter" id="eliminar2" >
                      <button style="display:none" type="button" id="btn_delete2" class="btn btn-default">
                        <span class="glyphicon glyphicon-remove"></span>
                        Eliminar Imagen
                      </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- palabras clave -->
            <div class="row">
              <div class="col-md-12" style="padding-left: 0;">
                <div class="col-md-12">
                  <h4><b>Palabras clave + ENTER</b></h4>
                  <h6>Las 'palabras clave' hacen que el producto sea más visible a las empresas.</h6>
                  <?php echo form_error('etiquetas', '<div class="error">', '</div>'); ?>
                </div>
                <div class="col-md-12 col-sm-6">
                  <div class="input-control">
                    <input type="text" class="form-control" id="Pclave" name="Pclave">
                  </div>
                  <input type="hidden" id="qwerty" name="etiquetas">
                </div>
                <div class="col-md-12">
                  <h6><b>Ingresa la palabra clave y pulsa la tecla ENTER</b></h6>
                  <h6>Ej.: Zapato en cuero</h6>
                </div>
              </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </-->
            
            <!-- <hr style="border: 2px solid #ea5b0c;border-radius: 200px /8px;width: 99%;"/>-->
            <div>
              <h4 class="seccion" style="height: 40px;padding: 12px;">
                Negociación
              </h4>
            </div>

            <!-- precio unitario / a convenir -->
            <div class="row">
              <div class="col-md-12" style="padding-left: 0;">
              <div class="col-md-12 col-xs-12">
                <div class="col-md-4 col-xs-6" style="padding:0;">                
                <div class="col-md-7 col-sm-4 col-xs-6" style="padding:0; top:2px;">
                      <input type="radio" id="precioUni_avanzado" name="rd_precio_avanzado" value="precioUni_avanzado" 
                      value="pr_unit_avanzado" checked="checked">
                      Precio unitario
                </div>
              </div>
                <div class="col-md-4 col-xs-6" style="padding:0;">
                <div class="col-md-7 col-sm-5 col-xs-7" style="padding:0; top:2px;">
                      <input type="radio" id="precioconvenir_avanzada" name="rd_precio_avanzado" value="precioconvenir_avanzada" 
                      value="pr_aconv_avanzado">
                      Precio a convenir  
                </div>
              </div>
              </div>
            </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->

            <!-- precio por unidad -->
            <div class="row">
              <div class="col-xs-12">
                  <div class="col-md-4 col-sm-4" id="seccion_precio_avanzado" style="padding:0;">
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" class="form-control" id="precio1_format_avanzado" required="true"
                        value="<?php echo set_value('precio_avan'); ?>" placeholder="Precio por unidad">
                        <div class="input-group-addon style-transparent">
                        <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                      </div>
                      <input type="hidden" class="form-control" id="precio1_avanzado" readonly name="precio_avan"
                        value="<?php echo set_value('precio_avan'); ?>"/>
                    </div>
                    <label for="precio1_format_avanzado" generated="true" class="error"></label>
                    <label for="precio1_avanzado" generated="true" class="error" style="display: none !important;"></label>
                    <h6 class="hidden-xs" style="margin: -13px 0px;">Ingrese el precio Ej. 650.000</h6>
                  </div>

                <div class="col-md-1 col-sm-1 col-xs-12" id="seccion_precio_por_avanzado"><h5>por</h5></div>

                <div class="col-md-3 col-sm-4 col-xs-12" style="padding:0;">
                  <div class="input-group">
                    <select class="form-control new-br" id="combo2" name="list_medidas_avan" required="true">
                      <!-- <option>Not loaded</option> -->
                    </select>
                    <div class="input-group-addon style-transparent">
                      <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->

            <!-- tiempo minimo -->
            <div class="row" style="margin: 0px 15px 0px -17px;">
              <div class="col-md-12">
              <div class="col-md-3 col-sm-4" style="padding: 0;">
                <div class="input-group">
                  <input type="text"   onchange="" class="form-control" required="true" name="pedido_min" id="pedido_min" placeholder="Pedido mínimo"
                    value="<?php echo set_value('pedido_min'); ?>" onkeypress="" >
                </div>
                <h6>Ingrese la cantidad Ej. 1.000</h6>
              </div>
              <div class="col-md-3 col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" name="medidas" disabled="disabled"
                    value="Unidad (Und)" required>
                </div>
            </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-val-avan" style="margin-top: -4px;">Validación Correspondiente</span>
          </div-->

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
              <div class="col-md-12">
                <div class="col-md-7">
                  <h5>Forma de pago (Selecciona una o varias de las opciones listadas)
                    <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                  </h5>
                  <?php echo form_error('pago', '<div class="error">', '</div>'); ?>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-5 col-sm-4"> 
                          <input type="checkbox" name="pago[]"
                          <?php echo set_checkbox('pago', 'Transferencia Bancaria', false) ?>
                          value="Transferencia bancaria"> Transferencia bancaria 
                      </div>
                      <div class="col-md-4 col-sm-4">  
                          <input type="checkbox" name="pago[]"
                          <?php echo set_checkbox('pago', 'Giros nacionales', false) ?>
                          value="Giros nacionales"> Giros nacionales 
                      </div>
                      <div class="col-md-3 col-sm-4"> 
                          <input type="checkbox" name="pago[]"
                          <?php echo set_checkbox('pago', 'Cheque', false) ?>
                          value="Cheque"> Cheque
                      </div>
              </div>
              <div class="col-md-12 col-sm-4">
                    <div class="col-md-5 col-sm-4">
                      <input type="checkbox" name="pago[]"
                      <?php echo set_checkbox('pago', 'Efectivo', false) ?>
                      value="Efectivo"> Efectivo 
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <input type="checkbox" name="pago[]"
                      <?php echo set_checkbox('pago', 'Contraentrega', false) ?>
                      value="Contraentrega"> Contraentrega 
                    </div>
                    <div class="col-md-3 col-sm-4">
                      <input type="checkbox" name="pago[]"
                      <?php echo set_checkbox('pago', 'A convenir', false) ?>
                      value="A convenir"> A convenir
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-4" style="margin-top: 7px;">
                    <div class="col-md-5 col-sm-3">
                      <div class="input-group">
                        <input id="otra" type='hidden' name='pago[]'>
                        <input type="text" class="form-control" id="pminimo" name="otra" onchange="JavaScript:document.getElementById('otra').checked=true;"
                          value="<?php echo set_value('otra'); ?>" placeholder="Otra forma de pago">
                        <?php echo form_error('otra', '<div class="error">', '</div>'); ?>
                        <label class="error" for="pago[]" generated="true"></label>
                      </div>
                    </div>
                  </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->
            

            <!-- page subtitle (in gray) -->
            <!-- <hr style="border: 2px solid #ea5b0c;border-radius: 200px /8px;width: 99%;"/>-->
            <div>
              <h4 class="seccion" style="height: 40px;padding: 12px;">
                Información Complementaria
              </h4>
            </div>

            <!-- empresa o sector al que le interesa ... -->
            <div class="row" style="margin-bottom: 16px;">
              <div class="col-md-3 col-sm-3">
                <h5>Empresa o sector al que le interesa el producto</h5>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6" style="padding:0;top:10px;">
                    <select class="form-control new-br" name="sector" onchange="">
                      <!--
                        <?php foreach ($categoria as $key => $value):?>
                        <option value="<?=$value->id_categoria?>"> <?=$value->nombre_categoria?>
                        <?php endforeach?>
                    -->
                    </select>
              </div>
              <div class="col-md-4 col-sm-3 col-xs-6" style="top:10px;">
                <select class="form-control" name="tipo" id="tipo">
                </select>
                <div class="input-group">
                    <div class="input-group-addon style-transparent">
                      <!--<span id="asterisk" class="glyphicon glyphicon-asterisk"></span>-->
                    </div>
                </div>
              </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->

            <!-- estado del producto -->
            <div class="row" style="margin-bottom: 16px;">
              <div class="col-md-3 col-sm-3">
                <h5>Estado del producto</h5>
              </div>
              <div class="col-md-2 col-sm-3" style="padding:0;top:1px;">
                <div class="input-group">
                    <select class="form-control new-br" id="combo" name="estado">
                      <option value="Nuevo">Nuevo</option>
                      <option value="Usado">Usado</option>
                    </select>
                    <div class="input-group-addon style-transparent">
                      <span id="asterisk" class="glyphicon glyphicon-asterisk"></span>
                    </div>
                </div>
              </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="input-group" style="margin: 0;margin-bottom: 20px;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->

          <!-- boton guardar cambios -->
            <div class="row" style="margin-top:-14px;">
              <div class="col-md-12 col-xs-12" style="padding:0;">
                <div class="col-md-7 col-xs-12">
                    <button type="submit" class="btn btn-default btn_submits"> 
                      PUBLICAR PRODUCTO 
                    </button>
                </div>
              </div>
            </div>
            <?= form_close() ?>
            </div>
        </div>
      </div>
              </div>
            </div>

            </div>

<script type="text/javascript">
    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
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
  <script type="text/javascript">  
    $("#upfile1").click(function () {
    $("#btn_archivos").trigger('click');
    });
  </script>

  <script type="text/javascript">  
    $("#upfile2").click(function () {
    $("#btn_archivos_avanzado").trigger('click');
    });
  </script>

  <div data-toggle="modal" data-target="#confirmar_producto" id="launch_popup_ready">
    </div>
  <div id="ready" onload="JavaScript:ready();">
    </div>