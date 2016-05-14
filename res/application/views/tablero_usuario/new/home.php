<div class="content-wrapper" style="min-height: 916px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?=$empresa->nombre?>
      <small>Proveedor.com.co</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
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
            <div class="info-box">
              <span class="info-box-icon bg-orange"><i class="glyphicon glyphicon-file ico_file"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> SOLICITAR COTIZACIÓN</span>   
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-blue"><i class="glyphicon glyphicon-stop ico_stop"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">PUBLICAR PRODUCTO</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-blue"><i class="glyphicon glyphicon-stop ico_stop"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">OPORTUNIDADES COMERCIALES</span>
                <span class="info-box-number"><?=$oportunidades['numero_nuevas']?></span>
                <span class="info-box-number-NEW"><?=$oportunidades['total_oportunidades']?></span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="ion-ios-chatboxes-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">MENSAJES</span>
                <span class="info-box-number"><?=$count_msj?></span>                
                <span class="info-box-number-NEW"><?=$count_msj2?></span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ADMINISTRAR PRODUCTOS</span>
                <span class="info-box-number"><?=$count_productos?></span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-cart-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ADMINISTRAR COTIZACIONES</span>
                <span class="info-box-number-NEW"><?=$count_ofertas;?></span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-yellow">
            <div class="widget-user-image">
              <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">Nadia Carmichael</h3>
            <h5 class="widget-user-desc">Lead Developer</h5>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a href="#">Escriba aca la membresia <span class="pull-right badge bg-blue">31</span></a></li>
              <li><a href="#">Productos <span class="pull-right badge bg-blue">5</span></a></li>
              <li><a href="#">Mensajes <span class="pull-right badge bg-blue">12</span></a></li>
              <li><a href="#">Visitas <span class="pull-right badge bg-blue">842</span></a></li>
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