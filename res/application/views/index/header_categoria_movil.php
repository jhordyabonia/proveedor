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
          <div class="col-md-11 col-sm-11 col-xs-12 caja_logo2 visible-xs hidden-sm hidden-md hidden-lg">
            <div class="row">
              <a href="<?php echo base_url() ?>">
              <img class="img-responsive" src="<?php echo img_url().'index/logo_proveedor.png' ?>"></a>
          </div>
      </div>
          <div class="col-md-11 col-sm-11 col-xs-12">
            <div class="row">
              <!-- Buscador par moviles -->
              <div class="col-md-8 col-sm-12 col-xs-12 visible-sm hidden-md hidden-lg visible-xs">
                <div class="row form_buscador">                 
                 <?= form_open(base_url() . 'listados/validar') ?> 
                  <div class="col-md-3 col-sm-3 col-xs-2 div_c_elem_buscador_select">
                      <i type="select" class="fa fa-chevron-down icono_flechita"></i> 
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8 div_c_elem_buscador_input">
                    <div class="input-group">
                      <input type="text" class="form-control input_busqueda" name="busqueda"
                        placeholder="Buscar productos">
                    </div>
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-2 div_c_elem_buscador div_c_elem_buscador_submit">
                    <div class="btn-group">
                      <button type="submit" class="btn btn-default btn_busqueda">
                        <span class="glyphicon glyphicon-search" id="logo_buscar" aria-hidden="true"></span> 
                      </button>
                    </div>
                  </div>
                 <?= form_close() ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>