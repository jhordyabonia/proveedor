<div class="content-wrapper" style="min-height: 916px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-laptop"></i>Oficina Virtual
      <small>Proveedor.com.co</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <big> Inicio</big></a></li>
      <li class="active"><?=$empresa->nombre?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">            
          <a href="<?=base_url()?>config_empresa/cotizaciones">
            <div class="info-box">
              <span class="info-box-icon bg-orange"><i class="fa fa-file-text"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> SOLICITAR COTIZACIÓN</span>   
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
            </a>
          </div><!-- /.col -->
          <div class="col-md-6 col-sm-6 col-xs-12">            
          <a href="<?=base_url()?>config_empresa/publicar_producto">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-cube"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">PUBLICAR PRODUCTO</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
           </a>
          </div><!-- /.col -->
          <div class="col-md-6 col-sm-6 col-xs-12">            
            <a href="<?=base_url()?>tablero_ususario/oportunidades">
                <div class="info-box">
                  <span class="info-box-icon bg-blue"><i class="glyphicon glyphicon-stop ico_stop"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">OPORTUNIDADES COMERCIALES</span>
                    <span class="info-box-number"><?=$oportunidades['numero_nuevas']?></span>
                    <span class="info-box-number-new">Nuevas: <?=$oportunidades['total_oportunidades']?></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </a>
              </div>
          <div class="col-md-6 col-sm-6 col-xs-12">            
            <a href="<?=base_url()?>mensajes">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class="ion-ios-chatboxes-outline"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">MENSAJES</span>
                    <span class="info-box-number"><?=$count_msj?></span>                
                    <span class="info-box-number-new">Nuevos: <?=$count_msj2?></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </a>
          </div><!-- /.col -->
          <div class="col-md-6 col-sm-6 col-xs-12">            
          <a href="<?=base_url()?>productos/administrar">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">ADMINISTRAR PRODUCTOS</span>
                  <span class="info-box-number"><?=$count_productos?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
          </div><!-- /.col -->
          <div class="col-md-6 col-sm-6 col-xs-12">            
          <a href="<?=base_url()?>oferta_test/administrar">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">ADMINISTRAR COTIZACIONES</span>
                  <span class="info-box-number-new">Nuevas: <?=$count_ofertas;?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
          </div><!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-yellow">
            <div class="widget-user-image col-md-5 col-xs-5 col-lg-5 col-xl-5">
                <div class="content-img-circle">
                  <center>
                  <img class="imgxx1" src="<?=base_url()?>uploads/logos/<?=$empresa->logo?>" alt="User Avatar">
                </center>
              </div>
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username"><?=$empresa->nombre?></h3>
            <h5 class="widget-user-desc"><?=$empresa->categoria->nombre_categoria?></h5>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a href="#">Membresia: <span class="pull-right badge bg-blue"><?=$nombre_membresia?></span></a></li>
              <li><a href="#">Productos: <span class="pull-right badge bg-blue"><?=$count_ofertas;?></span></a></li>
              <li><a href="#">Mensajes: <span class="pull-right badge bg-blue"><?=$count_msj;?></span></a></li>
              <li><a href="#">Oportunidades: <span class="pull-right badge bg-blue"><?=$oportunidades['numero_nuevas']?></span></a></li>
            </ul>
          </div>
        </div>
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Contáctenos</span>
            <span>soporte@proveedor.com.co</span>

            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
                <span>
                  3001234123 - (031)12341234
                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div><!-- /.row -->
    <!-- Main row -->
  </section><!-- /.content -->
</div>