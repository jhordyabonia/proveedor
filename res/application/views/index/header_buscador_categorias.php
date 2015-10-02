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
    <div class="row" id="borde_lateral">
      <div class="col-md-1 col-sm-1 hidden-xs"></div>
      <div class="col-md-11 col-sm-11 col-xs-12 hidden-xs caja_logo">
        <div class="row">
          <a href="<?php echo base_url() ?>">
            <img class="img-responsive" src="<?php echo img_url().'index/logo_proveedor.png' ?>">
          </a>
        </div>
      </div>
    </div>
    <div class="categorias_buscador row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <!--Contenedor para el boton del Menu-->
          <div class="col-md-1 col-sm-1 col-xs-3 div_row_categorias">
          </div>
          <div class="col-md-11 col-sm-11 col-xs-12 caja_logo2 visible-xs hidden-sm hidden-md hidden-lg">
            <div class="row">
              <a href="<?php echo base_url() ?>">
              <img class="img-responsive" src="<?php echo img_url().'index/logo_proveedor.png' ?>"></a>
          </div>
      </div>
          <div class="col-md-11 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12 hidden-xs hidden-sm visible-md visible-lg">
                <div class="row form_buscador">                 
                 <?= form_open(base_url() . 'listados/validar') ?> 
                  <div class="col-md-3 col-sm-3 col-xs-12 div_c_elem_buscador_select hidden-xs">
                    <select class="form-control" name="selec1" id="selec">
                      <option value="productos" selected>Productos</option>
                      <option value="solicitudes">Oportunidades</option>
                      <option value="proveedores">Empresas</option>
                    </select>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-9 div_c_elem_buscador_input">
                    <div class="input-group">
                      <input type="text" class="form-control input_busqueda" name="busqueda"
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

              <div class="col-md-4 col-sm-12 col-xs-12 form_botones">

                  <div class="col-md-6 col-sm-12 col-xs-12 contenedor_publicar_cotizacion hidden">
                    <button class="btn btn-primary btn_cotizacion_producto" onclick="ocultar_formulario()"><span class="glyphicon glyphicon-file ico_cotizacion"></span><p class="texto_cotizacion">SOLICITAR<br> COTIZACIÓN</p></button>
                  </div>

                  <div class="col-md-6 col-sm-12 col-xs-12 cont_pub_pro hidden-xs hidden-sm visible-md visible-lg">
                      <button class="btn btn-primary btn_cotizacion_producto_md"><i class="fa fa-cubes icon_pub"></i><p class="text_pub">PUBLICAR <br> PRODUCTO</p></button>
                  </div>

                <!-- por favor hacer que en res 992px los dos botones se bajen autom. -->
                <!-- <a href="<?php echo $url_publicar_solicitud ?>">
                  <img class="img1" src="<?php echo img_url().'index/btn_solicitar_producto.png' ?>"></a>
                <a href="<?php echo $url_publicar_producto ?>"> 
                  <img class="img2" src="<?php echo img_url().'index/btn_publicar_producto.png' ?>"></a> -->
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function mostrar_select()
      {
        document.getElementById('title').style.display='none';
        document.getElementById('select').style.display='';
        document.getElementById('select').click();
      }
    </script>
    
    <div class="row col-md-12" id="contenedor_subcategorias" style="padding:0;">
      <div class="contenedor_categoria_xs col-sm-12 col-xs-12" id="title">
        <h2 onmouseover="JavaScrpt:mostrar_select()" class="style_cate_h2"><i class="fa fa-list icono_catelist_xs"></i><?=$categoria->nombre_categoria?><i class="fa fa-chevron-down icono_catechevron_xs"></i></h2>
      </div>

      <div class="col-md-4 col-sm-12 col-xs-12 form_botones">
        <div class="col-md-6 col-sm-12 col-xs-12 contenedor_publicar_producto hidden-md hidden-lg visible-xs visible-sm">
            <button class="btn btn-primary btn_formulario_cotizaciones"><i class="fa fa-file-text ico_producto"></i><p class="texto_cotizacion">SOLICITAR COTIZACIÓN</p></button>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 contenedor_ver_categorias hidden-md hidden-lg visible-xs visible-sm">
            <button class="btn btn-primary btn_ver_categorias" onclick="JavaScript:location.href='<?=base_url()?>categoria_movil/sub/<?=$categoria->id_categoria?>'"><i class="fa fa-list-ul ico_producto"><p class="texto_cotizacion">VER SUBCATEGORÍAS</p></i></button>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 contenedor_publicar_producto hidden-md hidden-lg visible-xs visible-sm">
            <button class="btn btn-primary btn_cotizacion_producto" onclick="JavaScript:location.href='<?=base_url()?>publicar_producto'"><i class="fa fa-cubes ico_producto"></i><p class="texto_cotizacion">PUBLICAR PRODUCTO</p></button>
        </div>
      </div>

    <div class="col-md-12 cont_titulo_categorias_slide hidden-xs hidden-sm visible-md visible-lg">
      <div class="col-md-12 contenedor_select_categoria hidden-xs hidden-sm" style="display:none;" id="select">
        <p class="titulo_categorias_slide hidden-xs hidden-sm"><i class="fa fa-list ico_lista_slide"></i>
        <select onchange="JavaScript:location.href='<?=base_url()?>categoria/ver/'+this.value;" class="select_categorias">
          <option value="<?=$categoria->id_categoria?>" class="item_select_categoria hidden-xs hidden-sm"><?=$categoria->nombre_categoria?></option>
          <?php foreach ($categorias as $key => $value):?>
          <option value="<?=$value->id_categoria?>" class="item_select_categoria hidden-xs hidden-sm"><?=$value->nombre_categoria?></option>
          <?php endforeach;?>
        </select>
      </p>
    </div>
    </div>
    <div  id="div_subcategorias" class="hidden-xs hidden-sm">
      <?php foreach ($subcategorias as $key => $value):?>
      <div class="col-md-3 cont_categorias_slide">
        <a href="<?=base_url()?>categoria/ver/0/<?=$value->id_subcategoria?>" class="enlace_categoria_slide hidden-xs hidden-sm"><?=$value->nom_subcategoria?><i class="fa fa-angle-right ico_flecha_slide"></i></a><br>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</div>
  </div>