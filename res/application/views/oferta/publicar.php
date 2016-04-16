<!-- page imports -->
<link href="<?= base_url() ?>assets/css/publicar_oferta/publicar_producto_style.css"
  rel="stylesheet" type="text/css" >

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

<script>
  jQuery(document).ready(function($) {
        $("#publicar_oferta").addClass('active');
    });
</script>
<div class="container-fluid" style="margin-top: 93px;">
  <div class="row">
    <!-- sidebar -->
    <div class="col-sm-2" style="padding-left: 2%;">
        <!-- div boton Publicar ofertas -->
      <div class="col-xs-3 col-xs-push-2 col-sm-12 col-sm-push-0 text-center btn1  hidden-xs">
        <!--<img src="<?php echo img_url(); ?>Tablero_usuario/Publicar_Producto.png" 
        class="img-responsive img_btn1">-->
        <i class="fa fa-file-o ico_btn_soli"></i>
        <h4 class="boton">Publicar Solicitud</h4>
      </div>
    <!-- div boton Administrar mis oferta -->
        <div class="col-xs-3 col-xs-push-4 col-sm-12 col-sm-push-0 text-center btn2  hidden-xs"
        onclick="location.href='<?= base_url() ?>oferta_test/administrar';" 
         style="cursor:pointer;">
          <!--<img src="<?php echo img_url(); ?>Tablero_usuario/Ediccion_de_producto.png" 
          class="img-responsive img_btn1"> -->
          <i class="fa fa-files-o ico_btn_soli"></i>
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
    
      <div class="col-md-10 col-sm-10">

        <?php if ($this->session->flashdata('oferta_registrada')) { ?>
          <div class="row"> <div class="col-md-12">
            <div class="alert alert-success" role="alert">
              <strong><?= $this->session->flashdata('oferta_registrada') ?></strong>
            </div>
          </div> </div>
        <?php } ?>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs hidden-xs" role="tablist">
          <li role="presentation" style="width: 40%;" class="active">
            <a class="style-title-tab1" href="#soli_simple" aria-controls="soli_simple" role="tab" data-toggle="tab">
              <span class="glyphicon glyphicon-ok"></span>
              SOLICITAR COTIZACIÓN
            </a>
          </li>
          <li role="presentation" style="width: 40%;">
            <a class="style-title-tab2" href="#soli_completa" aria-controls="soli_completa" role="tab" data-toggle="tab">
              <span class="glyphicon glyphicon-list-alt"></span>
              PUBLICACIÓN COMPLETA
            </a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
        

          <div role="tabpanel" class="tab-pane active" id="soli_simple" style="background-color: #f4f4f4;">

            <h2 class="txt_soli_cot">Solicitar cotización de producto y/o servicio</h2>
            <!--no tocar-->
            <?= form_open('publicar_oferta/registrar/TRUE'); ?>
            <!-- Row de Categorias del Producto -->
            <div class="row" style ="margin-bottom:8px;">
              <div class="col-xs-12">
                <!--no tocar-->
                <div class="col-md-6 col-sm-5">
                  <div class="input-group">
                     <select class="form-control border_rad" name="categoria" id="categoria" 
                     onchange="JavaScript:cambio_categoria_simple(this.value);" 
                     required  >
                      <option value="" selected>Seleccione una categoria del producto</option>
                      <?php foreach ($categoria as $fila): ?>
                        <option title="<?= $fila->nombre_categoria ?>"
                          value="<?= $fila->id_categoria ?>"><?= $fila->nombre_categoria ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!--span class="input-group-addon ico_fondo_vali">
                      <span class="glyphicon glyphicon-remove-sign ico_nok_vali"></span>
                    </span-->
                    <div class="input-group-addon ico_fondo_vali">
                      <span class="glyphicon glyphicon-asterisk requerido"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Campo De Validación -->
            <!--div class="input-group txt_vali">
              <span class=""> Validacón Correspondiente</span>
            </div-->
              <!--no tocar-->
            <!-- Row de Sub-Categorias del Producto -->
            <div class="row" style ="margin-bottom:8px; display:none;"  id="div_subcategorias">
              <div class="col-xs-12">
                <div class="col-md-6 col-sm-5">
                  <div class="input-group">
                    <select class="form-control border_rad" name="subcategorias_simples" required id="subcategorias_simples">
                      <option value="">Seleccione una sub-categoria del producto</option>       
                    </select>
                    <!--span class="input-group-addon ico_fondo_vali">
                      <span class="glyphicon glyphicon-ok-sign ico_ok_vali"></span>
                    </span-->
                    <div class="input-group-addon ico_fondo_vali">
                      <span class="glyphicon glyphicon-asterisk requerido"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Campo De Validación -->
            <!--div class="input-group txt_vali">
              <span class=""> Validacón Correspondiente</span>
            </div-->
          
            <!--no tocar-->
              <!-- Row del Nombre del Porducto -->
          <div class="row" style ="margin-bottom:8px;">
            <div class="col-xs-12">
              <div class="col-md-6 col-sm-5">
                <div class="input-group">
                  <input type="text" class="form-control border_rad" name="nombre_producto"
                  onchange="JavaScript:verificar_largo(this,5);" 
                   onclick="JavaScript:limpiar(this)" 
                  placeholder="Nombre del producto y/o servicio requerido" value="" required >

                  <span class="input-group-addon ico_fondo_vali">
                        <i id='err_nombre_producto'>
                    <?php if(form_error('nombre_producto', '','')!='')
                      {
                      echo '<span class="glyphicon glyphicon-ok-sign ico_ok_vali"></span>';
                      }
                    ?>
                    </i>
                    </span>

                  <!--span class="input-group-addon ico_fondo_vali">
                    <span class="glyphicon glyphicon-ok-sign ico_ok_vali"></span>
                  </span-->
                  <div class="input-group-addon ico_fondo_vali">
                    <span class="glyphicon glyphicon-asterisk requerido"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Campo De Validación -->
         <div class="input-group" style="margin: 0;" id="parent_msj_err_nombre_producto">
            <span class="input-group txt_vali" id="msj_err_nombre_producto"><?=form_error('nombre_producto', '','')?></span>
          </div>
            <!--no tocar-->
             <!-- Row del Cantidad requerida -->
          
          <div class="row" style ="margin-bottom:8px;">
            <div class="col-xs-12">
              <div class="col-md-6 col-sm-5">
                <div class="input-group">
                  <input type="text" class="form-control border_rad" 
                  id="cantidad_requerida" name="cantidad_requerida" placeholder="Cantidad Requerida " onKeyPress="return soloNumeros(event)"
                  required  >
                  <!--span class="input-group-addon ico_fondo_vali">
                    <span class="glyphicon glyphicon-remove-sign ico_nok_vali"></span>
                  </span-->
                  <div class="input-group-addon ico_fondo_vali">
                    <span class="glyphicon glyphicon-asterisk requerido"></span>
                  </div>
                </div>

              </div>
            </div>
          </div>

          

          <!-- Campo De Validación -->
          <!--div class="input-group txt_vali">
            <span class=""> Validacón Correspondiente</span>
          </div-->
          <!--no tocar-->
          <!-- Row de Descripcion del Producto -->
            <div class="row" style ="margin-bottom:8px;">
              <div class="col-xs-12">
                <div class="col-md-7 col-sm-5">
                  <div class="input-group">
                    <textarea name="descripcion" id="textarea3" onchange="JavaScript:verificar_largo(this,10);" onclick="JavaScript:limpiar(this);" placeholder="Descripción del producto o servicio"
                    required class="form-control border_rad" rel='tooltip' data-placement='right' value="<?php echo set_value('descripcion'); ?>" ><?php echo set_value('descripcion'); ?></textarea>
                    <div class="input-group-addon ico_fondo_vali_texa">
                      <span class="input-group-addon ico_fondo_vali_texa">
                          <i id='err_descripcion'>
                      <?php if(form_error('descripcion', '','')!='')
                        {
                        echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
                        }
                      ?>
                      </i>
                    </span>
                      <!--div class="input-group-addon ico_fondo_vali_texa">
                        <span class="glyphicon glyphicon-ok-sign ico_ok_vali"></span>
                      </div-->
                      <span class="input-group-addon ico_fondo_vali_texa">
                        <span class="glyphicon glyphicon-asterisk requerido"></span>
                      </span>
                    </div>
                    <div class="input-group-addon ico_fondo_vali max_pala">
                      <p class="style-max-pala hidden-sm" id="contador_textarea3"> <b>5.000</b> caracteres máximo</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          <div class="input-group" style="margin: 0;" id="parent_msj_err_descripcion">
            <span class="input-group txt_vali" id="msj_err_descripcion"><?=form_error('descripcion', '','')?></span>
          </div>
          <!--no tocar-->

            <!-- Campo De Validación -->
          <!--div class="input-group txt_vali">
            <span class=""> Validacón Correspondiente</span>
          </div-->

            <!-- boton guardar cambios -->
            <div class="row" style="margin-top: 30px;padding-bottom: 70px;">
              <div class="col-md-12 col-xs-12">
                <div class="col-md-7 col-xs-12">
                    <button type="submit" class="btn btn-solicitarCoti"> 
                      SOLICITAR COTIZACIÓN 
                    </button>
                </div>
              </div>
            </div>
             <?= form_close() ?>

          </div>
            

          <!-- --------------------------------------------------------------------------------------------- -->

          <div role="tabpanel" class="tab-pane" id="soli_completa">

            <h2 class="txt_soli_avan">Solicitar cotización de producto y/o servicios</h2>
            <!--no tocar-->
            <!-- page subtitle (in gray) -->
            <div class="col-md-12 seccion">
              <h4>Información Básica</h4>
            </div>
            <?= form_open_multipart('publicar_oferta/registrar'); ?>
            <!--no tocar-->
            <!-- Row del Nombre del Porducto -->
            <div class="row" style ="margin-bottom:8px;padding-top: 62px;">
              
                <div class="col-md-6 col-sm-5">
                  <div class="input-group">
                    <input type="text" class="form-control border_rad" name="nombre_producto_avanzado"
                  onchange="JavaScript:verificar_largo(this,5);" 
                   onclick="JavaScript:limpiar(this)" 
                  placeholder="Nombre del producto y/o servicio requerido" value="" required >

                  <span class="input-group-addon ico_fondo_vali2">
                        <i id='err_nombre_producto_avanzado'>
                    <?php if(form_error('nombre_producto_avanzado', '','')!='')
                      {
                      echo '<span class="glyphicon glyphicon-ok-sign ico_ok_vali"></span>';
                      }
                    ?>
                    </i>
                    </span>

                    <!--span class="input-group-addon ico_fondo_vali2">
                      <span class="glyphicon glyphicon-ok-sign ico_ok_vali"></span>
                    </span-->
                    <div class="input-group-addon ico_fondo_vali2">
                      <span class="glyphicon glyphicon-asterisk requerido"></span>
                    </div>
                  </div>
                </div>
              
            </div>

            <div class="input-group" style="margin: 0;" id="parent_msj_err_nombre_producto_avanzado">
            <span class="input-group txt_vali2" id="msj_err_nombre_producto_avanzado"><?=form_error('nombre_producto_avanzado', '','')?></span>
          </div>
            <!-- Campo De Validación -->
            <!--div class="input-group txt_vali2">
              <span> Validacón Correspondiente</span>
            </div-->

            <!-- Row de Categorias del Producto -->
            <div class="row" style ="margin-bottom:8px;">
                <div class="col-md-6 col-sm-5">
                  <div class="input-group">
                    <select class="form-control border_rad" name="categoria" 
                    required onchange="JavaScript:cambio_categoria(this.value);document.getElementById('div_subcategorias2').style.display='';">
                      <option value="" selected>Seleccione una categoria del producto</option>
                      <?php foreach ($categoria as $fila): ?>
                        <option title="<?= $fila->nombre_categoria ?>"
                          value="<?= $fila->id_categoria ?>"><?= $fila->nombre_categoria ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!--span class="input-group-addon ico_fondo_vali2">
                      <span class="glyphicon glyphicon-remove-sign ico_nok_vali"></span>
                    </span-->
                    <div class="input-group-addon ico_fondo_vali2">
                      <span class="glyphicon glyphicon-asterisk requerido"></span>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Campo De Validación -->
            <!--div class="input-group txt_vali2">
              <span class=""> Validacón Correspondiente</span>
            </div-->
            <!--no tocar-->
            <!-- Row de Sub-Categorias del Producto -->
            <div class="row" style ="margin-bottom:8px; display:none" id="div_subcategorias2">
                <div class="col-md-6 col-sm-5">
                  <div class="input-group">
                    <select class="form-control border_rad" required name="subcategoria" id="subcategorias">
                      <option value="" selected>Seleccione una subcategoria del producto</option>

                    </select>
                    <!--span class="input-group-addon ico_fondo_vali2">
                      <span class="glyphicon glyphicon-ok-sign ico_ok_vali"></span>
                    </span-->
                    <div class="input-group-addon ico_fondo_vali2">
                      <span class="glyphicon glyphicon-asterisk requerido"></span>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Campo De Validación -->
            <!--div class="input-group txt_vali2">
              <span class=""> Validacón Correspondiente</span>
            </div-->

            <!-- Row de Descripcion del Producto -->
            <div class="row" style ="margin-bottom:8px;">
                <div class="col-md-7 col-sm-5">
                  <div class="input-group">
                     <textarea name="descripcion_avanzada" id="textarea3" onchange="JavaScript:verificar_largo(this,10);" onclick="JavaScript:limpiar(this);" placeholder="Descripción del producto o servicio"
                    required class="form-control new-br" rel='tooltip' data-placement='right' value="<?php echo set_value('descripcion_avanzada'); ?>" ><?php echo set_value('descripcion'); ?></textarea>
                    <div class="input-group-addon ico_fondo_vali_texa2">
                      <span class="input-group-addon ico_fondo_vali_texa2">
                          <i id='err_descripcion_avanzada'>
                      <?php if(form_error('descripcion_avanzada', '','')!='')
                        {
                        echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
                        }
                      ?>
                      </i>
                    </span>
                      <!--div class="input-group-addon ico_fondo_vali_texa2">
                        <span class="glyphicon glyphicon-ok-sign ico_ok_vali"></span>
                      </div-->
                      <span class="input-group-addon ico_fondo_vali_texa2">
                        <span class="glyphicon glyphicon-asterisk requerido"></span>
                      </span>
                    </div>
                    <!--div class="input-group-addon ico_fondo_vali2 max_pala">
                      <p class="style-max-pala hidden-sm" id="contador_textarea3"> <b>5.000</b> caracteres máximo</p>
                    </div-->
                  </div>
                </div>
            </div>

            <div class="input-group" style="margin: 0;" id="parent_msj_err_descripcion_avanzada">
            <span class="input-group txt_vali" id="msj_err_descripcion_avanzada"><?=form_error('descripcion_avanzada', '','')?></span>
          </div>

            <!-- Campo De Validación -->
          <!--div class="input-group txt_vali2">
            <span class=""> Validacón Correspondiente</span>
          </div-->
          <!--no tocar-->
        <!-- servicio de fotos -->
        <div class="row">
          <div class="col-md-4">
               <div class="col-md-9 col-xs-12 btn-group btn-group-lg btn-agregar-img">
                    <span id="upfile1">
                      <span class="col-md-2 hidden-xs hidden-sm glyphicon glyphicon-picture icono-plus"></span>
                      <span class="col-md-10 col-xs-12 text_agregar-img">Agreagar Imágenes <br> (máximo 5)</span>
                    </span>
                        <div style="display:none">
                            <input type="file" class="filestyle" id="btn_archivos" name="userfiles[]" multiple
                              data-size="lg" data-input="false" data-icon="false" data-badge="false" 
                              onchange="JavaScript:oculta_eliminar();" onload="JavaScript:oculta_eliminar();" >
                        </div>
                  </div>

              <div class="btn-group btn-group-lg vcenter" id="eliminar1">
                <button type="button" style="display:none" id="btn_delete" class="btn btn-default">
                  Eliminar Imagen</button>
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
            <h6>Las 'palabras clave' hacen que la solicitud sea más visible a los proveedores.</h6>
          
          <div class="col-md-3 col-sm-6" style="padding: 0;">
            <div class="input-control">
              <input type="text" class="form-control" id="Pclave" >
            </div>
            <input type="hidden" id="qwerty" name="etiquetas">
          </div>
          <div class="col-md-9" style="margin-left: -70px;">
            <h6 style="margin: 0;">Ingresa la palabra clave y pulsa la tecla Enter</h6>
            <h6 style="margin: 0;">Ej.: Zapato en cuero</h6>
          </div>
          </div>
        </div>

        <!-- page subtitle (in gray) -->
        <div class="row seccion">
          <h4>Negociación</h4>
        </div>

        <!-- cantidad requerida -->
        <div class="row" style="margin-bottom: 2px;">
          <div class="col-md-3 col-sm-4" style="padding: 0;">
            <div class="input-group">
              <input type="text" class="form-control border_rad" id="cantidad_format" required="true"
                value="" placeholder="Cantidad requerida">
              <input type="hidden" class="form-control" id="cantidad" readonly name="cantidad"
                value="<?php echo set_value('cantidad'); ?>"/>
            </div>

            <!-- Campo De Validación -->
            <!--div class="input-group txt_vali2">
              <span class=""> Validacón Correspondiente</span>
            </div-->

            <h6 class="hidden-xs">Ingrese la cantidad</h6>
            <h6 class="hidden-xs">Ej. 1.000</h6>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-5" style="margin-left: -79px;">
            <select class="form-control" id="combo1" name="list_medida">
              <!-- <option>Not loaded</option> -->
            </select>
          </div>
          <!--span class="ico_fondo_vali2">
            <span class="glyphicon glyphicon-ok-sign ico_ok_vali" style="margin-top: 4px;"></span>
          </span-->
          <div class="ico_fondo_vali2" style="display:inline-block;">
            <span class="glyphicon glyphicon-asterisk requerido" style="top: -4px;"></span>
          </div>
        </div>
        <!--no tocar-->

        <!-- precio unitario / a convenir -->
        <div class="row" id="punit_pconv">
          <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0;">
          <div class="col-md-2 col-sm-4 col-xs-6" style="padding:0;">
            <fieldset>
              <label> Precio unitario 
                <input type="radio" id="precioUni" name="rd_precio"
                value="precioUni" checked="checked"> </label>
            </fieldset>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-6">
            <fieldset>
              <label> Precio a convenir <input type="radio" id="precioconvenir" name="rd_precio"
                value="precioconvenir" value="pr_aconv" onchange="JavaScript:precio_format.value=0;precio.value=0;"> </label>
            </fieldset>
          </div>
          </div>
        </div>  

        <!-- Precio máximo a pagar -->
        <div class="row" id="pmax_pagar">
          <div class="col-md-12" style="padding: 0;">
            <div class="col-md-4 col-sm-4">
              <div class="row" style="margin-bottom: 1px;">
                <input type="text" class="form-control border_rad" id="precio_format" name="precio_format"required="true"
                  value="" placeholder="Precio máximo a pagar">
                <input type="hidden" class="form-control" id="precio" readonly name="precio"
                  value="<?php echo set_value('precio'); ?>"/>
              </div>
            </div>
            <div class="col-md-2 col-sm-4">
              <div class="input-group">
                <input type="text" class="form-control" name="cantidad2" id="cantidad2" disabled="disabled"
                  value="<?php echo set_value('cantidad2'); ?>" style="text-align: center;">
              </div>
            </div>
            <div class="col-md-2 col-sm-4">
              <div class="input-group">
                <input type="text" class="form-control" name="unidades" disabled="disabled"
                  value="Unidades" style="text-align: center;">
              </div>
            </div>
            <!--span class="ico_fondo_vali2">
                <span class="glyphicon glyphicon-remove-sign ico_nok_vali" style="margin-top: 4px;"></span>
              </span-->
          </div>

          <!-- Campo De Validación -->
            <!--div class="input-group txt_vali2">
              <span class=""> Validacón Correspondiente</span>
            </div-->

          <h6 class="hidden-xs">Ingrese el precio</h6>
          <h6 class="hidden-xs">Ej. 650.000</h6>
        </div>

        <!-- forma de pago -->
        <div class="row">
          <div class="col-md-12" style="padding:0;">
            <h5>Forma de pago
            <!--span class="ico_fondo_vali2">
              <span class="glyphicon glyphicon-remove-sign ico_nok_vali" style="margin-top: 4px;"></span>
            </span-->
            <!--div class="ico_fondo_vali2" style="display:inline-block;">
              <span class="glyphicon glyphicon-asterisk requerido"></span>
            </div-->
            </h5>
            <h6>Selecciona una o varias de las opciones listadas</h6>
            <?php echo form_error('pago', '<div class="error">', '</div>'); ?>
            <!-- Campo De Validación -->
            <!--div class="input-group txt_vali2">
              <span class=""> Validacón Correspondiente</span>
            </div-->
          </div>
          <div class="col-md-12" style="padding:0;">
            <div class="input-control">
              <div class="col-md-2 col-sm-4" style="padding:0;">
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
              <div class="col-md-3 col-sm-4">
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
              <div class="col-md-3 col-sm-3" style="padding:0;">
                <h6>Otra forma de pago</h6>
                <div class="input-group">
                   <input id="otra" type='hidden' name='pago[]'>
                  <input type="text" class="form-control" id="pminimo" name="otra" onchange="JavaScript:document.getElementById('otra').checked=true;"
                    value="<?php echo set_value('otra'); ?>">
                  <?php echo form_error('otra', '<div class="error">', '</div>'); ?>
                  <label class="error" for="pago[]" generated="true" ></label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- page subtitle (in gray) -->
        <div class="row seccion">
          <h4>Información Complementaria</h4>
        </div>
          <!--no tocar-->
        <!-- lugar de entrega -->
        <div class="row">
          <div class="col-md-12" style="padding:0;" style="padding:0;">
            <div class="col-md-3 col-sm-3 col-xs-6" style="padding-left: 0;padding-right: 15px;">
              <select onchange="JavaScript:cargar_municipios(this.value);" class="form-control provincia inputbox" id="combo_d" name="departamento" required="true">
                <option value="">Lugar de entrega</option>
                <?php foreach ($dept as $fila) { ?>
                  <option value="<?= $fila->id_departamento ?>" 
                    <?php echo set_select('departamento', $fila->id_departamento); ?> ><?= $fila->nombre ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6" style="display:none" id="municipio">
              <select class="form-control municipio inputbox" id="combo_m" name="municipio" required="true">
                <option value="">--Municipios--</option>                        
                <?php if ($municipios) { ?>
                  <?php foreach ($municipios as $row) { ?>
                    <option value="<?= $row->id_municipio ?>" 
                      <?= set_select('municipio', $row->id_municipio); ?>><?= $row->municipio ?></option>
                  <?php } ?>
                <?php } ?>
              </select>
            </div> 
            <!--span class="ico_fondo_vali2">
            <span class="glyphicon glyphicon-ok-sign ico_ok_vali" style="margin-top: 4px;"></span>
          </span-->
          <!--div class="ico_fondo_vali2" style="display:inline-block;">
            <span class="glyphicon glyphicon-asterisk requerido" style="top: -4px;"></span>
          </div-->
          </div>
          <!-- Campo De Validación -->
            <!--div class="input-group txt_vali2">
              <span class=""> Validacón Correspondiente</span>
            </div-->
        </div>

        <!-- boton guardar cambios -->
        <div class="row" style="margin-top: 30px;padding-bottom: 70px;">
          <div class="col-md-12 col-xs-12" style="padding:0;">
            <div class="col-md-7 col-xs-12" style="padding:0;">
                <button type="submit" class="btn-solicitarCoti"> 
                  SOLICITAR COTIZACIÓN 
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


<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e) 
{ 
var key = window.Event ? e.which : e.keyCode 
return ((key >= 48 && key <= 57) || (key==8)) 
}
</script>

<script type="text/javascript">

       document.onload=ready();
       function ready()
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/confirmar_solicitud/";
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                ready=document.getElementById('ready');
                ready.innerHTML=popup.response;
                console.log(popup.response);
                <?php if($this->session->flashdata('oferta_registrada')):?>
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
  <div data-toggle="modal" data-target="#confirmar_solicitud" id="launch_popup_ready">
    </div>
  <div id="ready" onload="JavaScript:ready();">
    </div>
