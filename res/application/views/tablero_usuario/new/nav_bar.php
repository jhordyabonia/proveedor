<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=verificar_imagen('uploads/logos/'.$empresa->logo)?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?=$usuario->nombres?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
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
      <li>
        <a href="<?=base_url()?>tablero_usuario">
          <i class="fa fa-th"></i> <span>Inicio</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>tablero_usuario/oportunidades">
          <i class="fa fa-th"></i> <span>Oportunidades</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>mensajes">
          <i class="fa fa-th"></i> <span>Mensajes</span>
        </a>
      </li>
      <li class="header">
        Publicar
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/publicidad">
          <i class="fa fa-th"></i> <span>Subir Publicidad</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/productos_principales">
          <i class="fa fa-th"></i> <span>Productos Principales</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/videos">
          <i class="fa fa-th"></i> <span>Subir Videos</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/galeria">
          <i class="fa fa-th"></i> <span>Subir Imágenes</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/catalogo">
          <i class="fa fa-th"></i> <span>Subir Catalogo</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/nosotros">
          <i class="fa fa-th"></i> <span>Misión y Visión</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/publicar_producto">
          <i class="fa fa-th"></i> <span>Publicar Producto</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/cotizaciones">
          <i class="fa fa-th"></i> <span>Solicitar Cotización</span>
        </a>
      </li>

      <li class="header">Configuración</li>
      <li>
        <a href="<?=base_url()?>config_empresa/perfil_empresa">
          <i class="fa fa-th"></i> <span>Perfil de empresa</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/contacto">
          <i class="fa fa-circle-o"></i><span>Contacto</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/usuario">
          <i class="fa fa-circle-o"></i><span>Usuario</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/clave">
          <i class="fa fa-circle-o"></i><span>Cambiar contraseña</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>