<link rel="stylesheet" href="<?php echo css_url()?>index/index.css">
<script src="<?php echo js_url().'index/productos_destacados.js' ?>"></script>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<div class="content_destacados">
  <!--Pestaña-->
  <div class="col-md-12 contenedor_pestana">
    <div class="row">
      <div class="container_pestana hidden-xs">
        <div class="row">
          <p class="title_pestana">Productos y Servicios Destacados</p>
        </div>
      </div>
      <div class="container_pestana2 visible-xs hidden-sm hidden-md hidden-lg">
        <div class="row">
          <p class="title_pestana2">Productos y Servicios Destacados</p>
        </div>
      </div>
      <div class="container_linkscarrusel">
        <div class="row">
          <ul class="list-inline" style="float: right; margin-right: 1.5em;">
            <li data-target="#carrusel" data-slide-to="0" id="pag1_li" class="li_active">
              <a id="pag1_t" class="t_active" href="#"> 1 </a></li>
            <li data-target="#carrusel" data-slide-to="1" id="pag2_li">
              <a id="pag2_t" href="#"> 2 </a></li>
            <li data-target="#carrusel" data-slide-to="id" 2="pag3_li">
              <a id="pag3_t" href="#"> 3 </a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!--Contenedor de los productor-->
  <div class="col-md-12 fondo">
    <div  id="content_general_product">

      <div class="carousel" data-ride="carousel" id="carrusel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div id="pag1_c" class="item active">
            <div class="row">
              <div class="col-md-12">
                <?php foreach ($productos_destacados_1 as $key => $producto_destacado): ?>
                <?php if ($key==0): ?>
                  <!-- Producto 1-->
                  <div class="col-md-4">
                    <div class="col-md-12 contenedor_producto cp_big">
                      <div class="row" id="content_produc_grande">
                        <div class="col-md-8">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="row div_imagen_grande">
                                <a href="http://www.proveedor.com.co/producto/ver/254">
                                  <img src="http://www.proveedor.com.co/uploads/default.jpg">
                                </a>
                              </div> 
                            </div>
                            <div class="col-md-12">
                              <a href="http://www.proveedor.com.co/producto/ver/254"><p id="nom_produ_grande">Programa de Coaching de Vida - Método ILICH </p></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="col-md-12 content_precio_product">
                            A convenir
                            <img src="<?= base_url() ?>assets/img/index/sonrisaprecio.png" class="sonrisa_precio img-responsive">
                          </div>
                          <div class="col-md-12 content_unid_product">
                            <p class="unidades_produc">A convenir 1 Unidad</p>
                            <p class="pedido_produc">pedido minimo</p>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <img src="http://www.proveedor.com.co/uploads/logos/membresiaplatinofondonaranja.png" class="foto_emp_producto img-responsive" id="foto_emp_grande">
                        </div>
                      </div>
                    </div>
                  </div>
                <?php else: ?>
                <!-- Producto 2-->
                  <div class="col-md-2">
                    <div class="col-md-12 contenedor_producto">
                      <div class="row">
                        <div class="col-md-12 content_foto_product">
                          <div class="row">
                              <img src="<?php echo $producto_destacado->imagen ?>" class="foto_producto img-responsive">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <a href="<?php echo $producto_destacado->url ?>"><p class="nom_produ"><?php echo $producto_destacado->nom_producto ?></p></a>
                        </div>
                        <div class="col-md-12 content_precio_product">
                          <?php echo decimal_points($producto_destacado->precio_unidad) ?>
                          <img src="<?= base_url() ?>assets/img/index/sonrisaprecio.png" class="sonrisa_precio img-responsive">
                        </div>
                        <div class="col-md-12 content_unid_product">
                          <p class="unidades_produc"><?php echo decimal_points($producto_destacado->pedido_min) ?> <?php echo $producto_destacado->medida ?></p>
                          <p class="pedido_produc">pedido minimo</p>
                        </div>
                        <div class="col-md-12 content_emp_product">
                          <a href="<?php echo $producto_destacado->url_empresa ?>">
                            <img src="<?php echo $producto_destacado->logo_empresa ?>" class="foto_emp_producto img-responsive">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                <?php endforeach ?>
              </div>
            </div>
          </div>
          <div id="pag2_c" class="item">
            <div class="row">
              <div class="col-md-12">
                <?php foreach ($productos_destacados_2 as $key => $producto_destacado): ?>
                <?php if ($key==0): ?>
                  <!-- Producto 1-->
                  <div class="col-md-4">
                    <div class="col-md-12 contenedor_producto cp_big">
                      <div class="row" id="content_produc_grande">
                        <div class="col-md-8">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="row div_imagen_grande">
                                <a href="http://www.proveedor.com.co/producto/ver/255">
                                  <img src="http://www.proveedor.com.co/uploads/default.jpg">
                                </a>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <a href="http://www.proveedor.com.co/producto/ver/255"><p id="nom_produ_grande">Programa de Coaching en Salud y Bienestar - </p></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="col-md-12 content_precio_product">
                             A convenir
                            <img src="<?= base_url() ?>assets/img/index/sonrisaprecio.png" class="sonrisa_precio img-responsive">
                          </div>
                          <div class="col-md-12 content_unid_product">
                            <p class="unidades_produc"> A convenir 1 Unidad</p>
                            <p class="pedido_produc">pedido minimo</p>
                          </div>
                        </div>
                        <div class="col-md-12">
                           <a href="http://www.proveedor.com.co//perfil/ver_empresa/0/13068269">
                                 <img src="http://www.proveedor.com.co/uploads/logos/membresiaplatinofondonaranja.png" class="foto_emp_producto img-responsive" id="foto_emp_grande">
                              </a>  
                        </div>
                      </div>
                    </div>
                  </div>
                <?php else: ?>
                <!-- Producto 2-->
                  <div class="col-md-2">
                    <div class="col-md-12 contenedor_producto">
                      <div class="row">
                        <div class="col-md-12 content_foto_product">
                          <div class="row">
                              <img src="<?php echo $producto_destacado->imagen ?>" class="foto_producto img-responsive">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <a href="<?php echo $producto_destacado->url ?>"><p class="nom_produ"><?php echo $producto_destacado->nom_producto ?></p></a>
                        </div>
                        <div class="col-md-12 content_precio_product">
                          <?php echo decimal_points($producto_destacado->precio_unidad) ?>
                          <img src="<?= base_url() ?>assets/img/index/sonrisaprecio.png" class="sonrisa_precio img-responsive">
                        </div>
                        <div class="col-md-12 content_unid_product">
                          <p class="unidades_produc"><?php echo decimal_points($producto_destacado->pedido_min) ?> <?php echo $producto_destacado->medida ?></p>
                          <p class="pedido_produc">pedido minimo</p>
                        </div>
                        <div class="col-md-12 content_emp_product">
                           <a href="<?php echo $producto_destacado->url_empresa ?>">
                            <img src="<?php echo $producto_destacado->logo_empresa ?>" class="foto_emp_producto img-responsive">
                          </a> 
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                <?php endforeach ?>
              </div>
            </div>
          </div>
          <div id="pag3_c" class="item">
            <div class="row">
              <div class="col-md-12">
                <?php foreach ($productos_destacados_3 as $key => $producto_destacado): ?>
                <?php if ($key==0): ?>
                  <!-- Producto 1-->
                  <div class="col-md-4">
                    <div class="col-md-12 contenedor_producto cp_big">
                      <div class="row" id="content_produc_grande">
                        <div class="col-md-8">
                          <div class="row">
                            <div class="col-md-12"> 
                              <div class="row div_imagen_grande">
                                <a href="http://www.proveedor.com.co/producto/ver/253">
                                  <img src="http://www.proveedor.com.co/uploads/default.jpg">
                                </a>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <a href="http://www.proveedor.com.co/producto/ver/253"><p id="nom_produ_grande">Programa de Coaching Empresarial</p></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="col-md-12 content_precio_product">
                             A convenir
                            <img src="<?= base_url() ?>assets/img/index/sonrisaprecio.png" class="sonrisa_precio img-responsive">
                          </div>
                          <div class="col-md-12 content_unid_product">
                            <p class="unidades_produc"> A convenir 1 Unidad</p>
                            <p class="pedido_produc">pedido minimo</p>
                          </div>
                        </div>
                        <div class="col-md-12">
                              <a href="http://www.proveedor.com.co//perfil/ver_empresa/0/13068269">
                                 <img src="http://www.proveedor.com.co/uploads/logos/membresiaplatinofondonaranja.png" class="foto_emp_producto img-responsive" id="foto_emp_grande">
                              </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php else: ?>
                <!-- Producto 2-->
                  <div class="col-md-2">
                    <div class="col-md-12 contenedor_producto">
                      <div class="row">
                        <div class="col-md-12 content_foto_product">
                          <div class="row">
                              <img src="<?php echo $producto_destacado->imagen ?>" class="foto_producto img-responsive">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <a href="<?php echo $producto_destacado->url ?>"><p class="nom_produ"><?php echo $producto_destacado->nom_producto ?></p></a>
                        </div>
                        <div class="col-md-12 content_precio_product">
                          <?php echo decimal_points($producto_destacado->precio_unidad) ?>
                          <img src="<?= base_url() ?>assets/img/index/sonrisaprecio.png" class="sonrisa_precio img-responsive">
                        </div>
                        <div class="col-md-12 content_unid_product">
                          <p class="unidades_produc"><?php echo decimal_points($producto_destacado->pedido_min) ?> <?php echo $producto_destacado->medida ?></p>
                          <p class="pedido_produc">pedido minimo</p>
                        </div>
                        <div class="col-md-12 content_emp_product">
                          <img src="<?php echo $producto_destacado->logo_empresa ?>" class="foto_emp_producto img-responsive">
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>