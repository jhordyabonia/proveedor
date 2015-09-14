<link href="<?php echo css_url().'index/header_buscador.css' ?>" rel="stylesheet">
<link href="<?php echo css_url().'index/menu/component.css' ?>" rel="stylesheet">
<link href="<?php echo css_url().'index/menu/content.css' ?>" rel="stylesheet">
<script src="<?php echo js_url().'index/jquery.collapse.js' ?>"></script>
<script src="<?php echo js_url().'index/bootstrap-select.js' ?>"></script>

<!--Js para el menu-->
<script src="<?php echo js_url().'index/menu/modernizr.custom.js'?>"></script>
<script src="<?php echo js_url().'index/menu/classie.js'?>"></script>
<script src="<?php echo js_url().'index/menu/uiMorphingButton_fixed.js'?>"></script>


<div class="header_logo_buscador">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
      <div class="col-md-1 col-sm-1 hidden-xs"></div>
      <div class="col-md-11 col-sm-11 col-xs-12 hidden-xs caja_logo">
        <div class="row">
          <a href="<?php echo base_url() ?>">
            <img class="img-responsive" src="<?php echo img_url().'index/logo_proveedor.png' ?>"></a>
        </div>
      </div>
    </div>
    <div class="categorias_buscador row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <!--Contenedor para el boton del Menu-->
          <div class="col-md-1 col-sm-1 col-xs-3 div_row_categorias">
            <p class="titulo_categ_boton">CATEGORÍAS</p>

            <button class="btn" id="mostrarocultar">
              <ul class="list-inline">
                <li><i class="fa fa-list-ul" id="fuente_menu"></i></li>
                <li><span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="icono_flechita"></span></li>
              </ul>     
            </button>
          </div>

          <div class="col-md-11 col-sm-11 col-xs-12 caja_logo2 visible-xs hidden-sm hidden-md hidden-lg">
            <div class="row">
              <a href="<?php echo base_url() ?>">
              <img class="img-responsive" src="<?php echo img_url().'index/logo_proveedor.png' ?>"></a>
          </div>
      </div>
          <div class="col-md-11 col-sm-11 col-xs-12">
            <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="row form_buscador">                 
                 <?= form_open(base_url() . 'listados/validar') ?> 
                  <div class="col-md-3 col-sm-3 col-xs-12 div_c_elem_buscador_select hidden-xs">
                    <select class="form-control" name="selec1" id="selec" value="<?=set_value('selec1')?>">
                      <option value="productos" <?=set_select('selec1',  set_value('selec1') );?> >Productos</option>
                      <option value="solicitudes">Oportunidades</option>
                      <option value="proveedores">Empresas</option>
                    </select>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-9 div_c_elem_buscador_input">
                    <div class="input-group">
                      <input type="text" class="form-control input_busqueda" name="busqueda" value="<?=set_value('busqueda')?>"
                        placeholder="Buscar productos, proveedores y productos solicitados">
                    </div>
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-3 div_c_elem_buscador div_c_elem_buscador_submit">
                    <div class="btn-group">
                      <button type="submit" class="btn btn-default btn_busqueda">
                        <span class="glyphicon glyphicon-search" id="logo_buscar" aria-hidden="true"></span> 
                      </button>
                    </div>
                  </div>
                 <?= form_close() ?>
                </div>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12 form_botones">
                <!-- por favor hacer que en res 992px los dos botones se bajen autom. -->
                <a href="<?php echo $url_publicar_solicitud ?>">
                  <img class="img1" src="<?php echo img_url().'index/btn_solicitar_producto.png' ?>"></a>
                <a href="<?php echo $url_publicar_producto ?>"> 
                  <img class="img2" src="<?php echo img_url().'index/btn_publicar_producto.png' ?>"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12" id="divmostoc">
    <div class="col-md-12 cont_titulo_categorias_slide">
      <p class="titulo_categorias_slide"><i class="fa fa-list ico_lista_slide"></i> CATEGORÍAS</p>
    </div>
    <?php foreach ($categorias as $key => $value):?>
    <div class="col-md-3 cont_categorias_slide">
      <a href="<?=base_url()?>categoria/ver/<?=$value->id_categoria?>" class="enlace_categoria_slide"><?=$value->nombre_categoria?><i class="fa fa-angle-right ico_flecha_slide"></i></a><br>
    </div>
    <?php endforeach;?>
  </div>
</div>
</div>
<!-- Funcionalidad de mostrar ocultar categorias-->
  <script type="text/javascript">
  $(document).ready(function() {
  $('#mostrarocultar').click(function() {
  $('#divmostoc').slideToggle(1000);
  });
  });
  </script>
