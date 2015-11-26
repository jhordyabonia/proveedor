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
          <div class="col-md-1 col-sm-1 col-xs-3 div_row_categorias hidden-xs hidden-sm visible-md visible-lg">
            <p class="titulo_categ_boton">CATEGORÍAS</p>

            <button class="btn" id="mostrarocultar">
              <ul class="list-inline">
                <li><i class="fa fa-list-ul" id="fuente_menu"></i></li>
                <li><span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="icono_flechita"></span></li>
              </ul>     
            </button>
          </div>
           
          <div class="col-md-11 col-sm-11 col-xs-12 caja_logo2 visible-xs hidden-sm hidden-md hidden-lg">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="padding:0;">
              <a href="<?php echo base_url() ?>">
              <img class="img-responsive img-res" src="<?php echo img_url().'index/logo_proveedor.png' ?>"></a>
          </div>
      </div>
          <div class="col-md-11 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12 visible-lg hidden-xs hidden-sm visible-md">
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
              <div class="col-md-8 col-sm-12 col-xs-12 visible-sm hidden-md hidden-lg visible-xs" >
                <div class="row form_buscador">                 
                 <?= form_open(base_url() . 'listados/validar') ?> 
                  <div class="col-md-3 col-sm-3 col-xs-2 div_c_elem_buscador_select">
                      <i type="select" class="fa fa-chevron-down icono_flechita"></i> 
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8 div_c_elem_buscador_input">
                    <div class="input-group">
                      <input type="text" class="form-control input_busqueda" name="busqueda"
                        placeholder="Buscar" style="padding: 0;font-size: 15px;">
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

              <div class="col-md-4 col-sm-12 col-xs-12 form_botones_ind hidden-xs hidden-sm visible-md visible-lg">
                <div class="col-md-6 contenedor_publicar_cotizacion" style="padding-right: 0px;padding-left: 12px;">
                  <button class="btn btn-primary btn_solicitar_cotizacion" data-toggle="modal" data-target="#asistentes_proveedor_popup" ><!--onclick="JavaScript:location.href='<?=$url_publicar_solicitud?>'">-->
                    <i class="fa fa-file-text ico_soli_coti"></i>
                    <p class="txt_soli_coti">SOLICITAR<br> COTIZACIÓN</p>
                  </button>
                </div>
                <div class="col-md-6 contenedor_publicar_cotizacion" style="padding-right: 0px;padding-left: 10px;">
                  <button class="btn btn-primary btn_solicitar_cotizacion" onclick="JavaScript:location.href='<?=$url_publicar_producto?>'">
                    <i class="fa fa-cube ico_publicar_coti"></i>
                    <p class="txt_soli_coti">PUBLICAR<br> PRODUCTO</p>
                  </button>
                </div>               
              </div>
              
             
              <div class="col-md-4 col-sm-12 col-xs-12 form_botones hidden-md hidden-lg visible-xs visible-sm">
              
               <div class="col-md-6 col-sm-12 col-xs-12 contenedor_publicar_producto hidden-md hidden-lg">
                    <button class="btn btn-primary btn_formulario_cotizaciones" data-toggle="modal" data-target="#asistentes_proveedor_popup"><i class="fa fa-file-text ico_producto"></i><p class="texto_cotizacion">SOLICITAR COTIZACIÓN</p></button>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 cont_pu_pro hidden-md hidden-lg visible-xs visible-sm">
                    <button class="btn btn-primary btn_cotizacion_producto" onclick="JavaScript:location.href='<?=base_url()?>publicar_producto'"><i class="fa fa-cubes ico_pub_pro"></i><p class="texto_cotizacion">PUBLICAR PRODUCTO</p></button>
                </div>
                <?php if(!$id_usuario):?> 
                  <div class="col-md-6 col-sm-12 col-xs-12 contenedor_regi_gratis hidden-md hidden-lg visible-xs visible-sm">
                      <button class="btn btn-primary btn_ver_categorias" onclick="JavaScript:location.href='<?=base_url()?>registro/registrar'"><i class="fa fa-check ico_gratis"></i><p class="texto_cotizacion">REGISTRO GRATIS !</p></button>
                  </div>
                <?php endif;?>

              </div>

              <!--Contenedor para el boton del Menu-->
          <div class="col-md-1 col-sm-12 col-xs-12 div_row_index hidden-md hidden-lg visible-xs visible-sm">
            <button class="btn" id="mostrarocultar_index" onclick="JavaScript:location.href='<?=base_url()?>categoria_movil/'">
              <ul class="list-inline">
                <li><i class="fa fa-list-ul" id="fuente_menu"></i></li>
                <li><span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="icono_flechita"></span></li>
              </ul>     
            </button>
            <a href='<?=base_url()?>categoria_movil/'>
              <p class="titulo_index_boton">CATEGORÍAS</p>
            </a>
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