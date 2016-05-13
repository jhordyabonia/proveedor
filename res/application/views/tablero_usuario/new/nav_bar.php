<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo assets_url() ?>img/user.svg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?=$usuario->nombres?></p>
        <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Publicar</li>
      <li class="header">Configuración</li>
      <li class="active">
        <a href="<?=base_url()?>config_empresa/perfil_empresa"><i class="fa fa-circle-o"></i>Prefil de empresa</a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/contacto"><i class="fa fa-circle-o"></i>Contacto</a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/usuario"><i class="fa fa-circle-o"></i>Usuario</a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>