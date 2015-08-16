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
          <p class="title_pestana">Exposiciones y Eventos</p>
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
                <a href="http://servicios.corferias.com/catalogo_expositores/index.cfm?doc=catalogo_expositores&subdoc=catalogo_listar&ano=2015&evento=14&lang=es">
                       <img src="<?=base_url()?>uploads/eventos/BANNER_EVENTO.png" class="banner_eventos">
                     </a>
              </div>
            </div>
          </div>         
        </div>
      </div>
    </div>
  </div>
</div>