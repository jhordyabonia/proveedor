<link href="<?php echo css_url().'index/ultimos_productos_empresas.css' ?>" rel="stylesheet">
<script src="<?php echo js_url().'index/jquery.totemticker.min.js' ?>"></script>
<script src="<?php echo js_url().'index/ultimos_productos_empresas.js' ?>"></script>

<div class="row row_ult_prod_soli">
  <div class="col-md-12 contenedor_general">
    <div class="row seccionTresElem">
      <div class="row hidden-xs">
        <div class="col-md-4 col-sm-4 hidden-xs hidden-sm" >
            <ul class="nav nav-tabs ult_prod_publi">
              <li role="presentation" class="active"> 
                <p class="txtTab2" onclick="JavaScript:location.href='<?=base_url()?>listados/lista/default/productos'"> Últimos productos publicados </p></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-4 hidden-xs hidden-sm">
            <ul class="nav nav-tabs ult_prod_soli">
              <li role="presentation" class="active"> 
                <p class="txtTab1"> Últimos productos solicitados </p></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-4 hidden-xs hidden-sm">
            <ul class="nav nav-tabs ult_emp_reg">
              <li role="presentation" class="active"> 
                <p class="txtTab3" > Últimas empresas registradas </p></li>
            </ul>
          </div>
      </div>
      <div class="row hidden-sm hidden-md hidden-lg hidden-xs hidden-sm">
        <ul class="nav nav-tabs" id="ultimosTabs">
          <li class="active"> <a href="#sol"> 
            <p class="txtTab1"> Últimos productos solicitados </p> </a> </li>
          <li> <a href="#pub"> 
            <p class="txtTab2"> Últimos productos publicados </p> </a> </li>
          <li> <a href="#reg"> 
            <p class="txtTab3"> Últimas empresas registradas </p> </a> </li>
        </ul>
      </div>
      <div class="row hidden-xs hidden-sm" style="margin: 0;">
        <div class="tab-content">
          <!-- <div class="col-md-12 col-sm-12 hidden-xs contene_boton">
            <div class="col-md-4 col-sm-4 contene_boton2">
              <button class="btn btn_vertodo">Ver Todos</button>
            </div>
            <div class="col-md-4 col-sm-4 contene_boton3">
              <button class="btn btn_vertodo">Ver Todos</button>
            </div>
            <div class="col-md-4 col-sm-4 contene_boton4">
              <button class="btn btn_vertodo">Ver Todos</button>
            </div>
          </div> -->
          <!-- prod. publicados -->
          <div class="tab-pane" id="pub">
            <ul id="pub_ticker">
              <?php foreach ($productos as $producto): ?>
                <li>
                  <div class="row row-centered">
                    <div class="cadaElem col-md-12">
                      <div class="divImg col-md-4 col-sm-12 col-xs-12"> 
                        <a href="<?php echo $producto->url ?>">
                          <img src="<?=base_url()?>uploads/resize/index_carrouseles/<?=$producto->imagen?>" />
                        </a>
                      </div>
                      <div class="divCont col-md-8 col-sm-12 col-xs-12">
                        <div class="row">
                          <a href="<?php echo $producto->url ?>"> <h4><?php echo $producto->nombre ?></h4> </a>
                        </div>
                        <div class="divCont_mgbtncero row">
                          <div class="col-md-2 col-sm-2 col-xs-2">
                            <p class="simbprecio">$</p>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;"> 
                            <div class="row" style="margin-bottom: 0;">
                              <p class="precio"> <?php echo decimal_points($producto->precio_unidad) ?> </p>
                            </div>
                            <div class="row" style="margin-bottom: 0;">
                              <img src="<?php echo img_url().'index/sonrisaprecio.png' ?>">
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">
                            <div class="row" style="margin-bottom: 0;">
                              <p class="unidades"> 
                                <?php if($producto->pedido_minimo==0){echo "Pedido mínimo a convenir.</p>";}else{echo decimal_points($producto->pedido_minimo)." X ".$producto->medida.'<div class="row"><p class="pmin"> Pedido mínimo </p></div>';}?>
                               <!-- <?php echo decimal_points($producto->pedido_minimo).' '.$producto->medida ?> -->
                              </p>
                            </div>    
                          </div> 
                        </div>
                        <div class="divCont_mgbtncero row">
                          <h5><?php echo $producto->fecha_publicacion ?></h5> 
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
            <button class="btn btn_vertodo" onclick="JavaScript:location.href='<?=base_url()?>listados/lista/default/productos'">Ver Todos</button>
          </div>
          <!-- solicitudes -->
          <div class="tab-pane active" id="sol">
            <ul id="sol_ticker">
              <?php foreach ($solicitudes as $solicitud): ?>
                <li>
                  <div class="row row-centered">
                    <div class="cadaElem col-md-12">
                      <div class="divImg col-md-4 col-sm-12 col-xs-12"> 
                        <a href="<?php echo $solicitud->url ?>">
                          <img src="<?=base_url()?>uploads/resize/index_carrouseles/<?=$solicitud->imagen?>" />
                        </a>
                      </div>
                      <div class="divCont col-md-8 col-sm-12 col-xs-12">
                        <div class="row">
                          <a href="<?php echo $solicitud->url ?>"> <h4><?php echo $solicitud->nombre ?></h4> </a>
                        </div>
                        <div class="divCont_mgbtncero row">
                          <div class="col-md-2 col-sm-2 col-xs-2">
                            <p class="simbprecio">$</p>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;"> 
                            <div class="row" style="margin-bottom: 0;">
                              <p class="precio"> <?php echo decimal_points($solicitud->precio_maximo) ?> </p>
                            </div>
                            <div class="row" style="margin-bottom: 0;">
                              <img src="<?php echo img_url().'index/sonrisaprecio.png' ?>">
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5" style="text-align: center;">
                            <div class="row" style="margin-bottom: 0;">
                              <p class="unidades"> 
                                <?php if($solicitud->cantidad_requerida==0){echo "Cantidad requerida a convenir.</p>";}else{echo decimal_points($solicitud->cantidad_requerida)." X ".$solicitud->medida.'<div class="row"><p class="pmin"> Cantidad requerida </p></div>';}?>
                                <!--<?php echo decimal_points($solicitud->cantidad_requerida).' '.$solicitud->medida  ?> -->
                              </p>
                            </div>
                          </div> 
                        </div>
                        <div class="divCont_mgbtncero row ">
                          <h5><?php echo $solicitud->fecha_publicacion ?></h5> 
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
            <button class="btn btn_vertodo"  onclick="JavaScript:location.href='<?=base_url()?>listados/lista/default/solicitudes'" >Ver Todos</button>
          </div>
          <!-- emp. registradas -->
          <div class="tab-pane" id="reg">
            <ul id="reg_ticker">
              <?php foreach ($empresas as $empresa): ?>
                <li>
                  <div class="row row-centered">
                    <div class="cadaElem col-md-12">
                      <div class="divImg col-md-4 col-sm-12 col-xs-12"> 
                        <a href="<?=base_url()?>perfil/ver_empresa/<?=$empresa->id?>">
                          <img src="<?=base_url()?>uploads/resize/index_carrouseles/logos/<?=$empresa->logo ?>" />
                        </a>
                      </div>
                      <div class="divCont col-md-8 col-sm-12 col-xs-12">
                        <div class="row">
                          <a href="<?=base_url()?>perfil/ver_empresa/<?=$empresa->id?>"> <h4><?php echo $empresa->nombre ?></h4> </a>
                        </div>
                        <div class="divCont_mgbtncerop">
                          <div class="row">
                            <h5 class="ppales">Productos principales</h5>
                          </div>
                          <div class="row">
                          <?php if ($empresa->productos_principales): ?>
                            <p class="listaproductos"> <?php echo $empresa->productos_principales ?> </p>
                          <?php else: ?>
                            <p class="listaproductos">  </p>
                          <?php endif ?>
                          </div>
                        </div>
                        <div class="divCont_mgbtncero row">
                          <h5><?php echo $empresa->fecha ?></h5> 
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
            <button class="btn btn_vertodo"  onclick="JavaScript:location.href='<?=base_url()?>listados/lista/default/proveedores'" >Ver Todos</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- detect bootstrap screen-size via javascript -->
<!-- https://github.com/maciej-gurban/responsive-bootstrap-toolkit -->
<div class="device-xs visible-xs"></div>
<div class="device-sm visible-sm"></div>
<div class="device-md visible-md"></div>
<div class="device-lg visible-lg"></div>
<script src="<?php echo js_url().'index/bootstrap-toolkit.min.js' ?>"></script>
<script>
  function edicionHTMLTabs (viewport) {
    var txtTab1 = "Últ. productos solicitados";
    var txtTab2 = "Últ. productos publicados";
    var txtTab3 = "Últ. empresas registradas";
    var txtTab1_default = "Últimos productos solicitados";
    var txtTab2_default = "Últimos productos publicados";
    var txtTab3_default = "Últimas empresas registradas";
    //activar todas las pestañas en vistas sm, md y lg
    if ((viewport.is('sm')) || (viewport.is('md')) || (viewport.is('lg'))) {
      //reducir textos de tabs en XS y SM
      if (viewport.is('sm')) { 
        $('.txtTab1').html(txtTab1);
        $('.txtTab2').html(txtTab2);
        $('.txtTab3').html(txtTab3);
      } else { 
        $('.txtTab1').html(txtTab1_default);
        $('.txtTab2').html(txtTab2_default);
        $('.txtTab3').html(txtTab3_default);
      }

      if (!($('.tab-content').find('.tab-pane').parent().is('.abc'))) {
        $('.tab-pane').each(function(i,t){
          $(this).addClass('active');
          $(this).wrap('<div class="col-md-4 col-sm-4 abc"></div>');
        });
      }
    } else if (viewport.is('xs')) {
      //reducir textos de tabs en XS y SM
      $('.txtTab1').html(txtTab1);
      $('.txtTab2').html(txtTab2);
      $('.txtTab3').html(txtTab3);

      if ($('.tab-content').find('.tab-pane').parent().is('.abc')) {
        $('.tab-content').find('.tab-pane').unwrap();
        $('.tab-pane').each(function(i,t){ $(this).removeClass('active'); });
        $("#sol").addClass('active');
      }
    }
  }
  (function($, document, window, viewport){
    //execute when window is loaded or resized
    $(window).bind('load resize', function() {
      viewport.changed(function(){
        edicionHTMLTabs(viewport);
      }, 100);
    });
  })(jQuery, document, window, ResponsiveBootstrapToolkit);
</script>