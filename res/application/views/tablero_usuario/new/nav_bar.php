<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <ul class="sidebar-menu">
      <li class="header bg-white">
        <center>
          <span class="content-img-circle-user">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <span><?=$usuario->nombres?></span>
        </center>          
      </li>
      <li>
    <!-- search form -->
    <li>
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group  bg-white">
        <input type="text" name="q" class="form-control bg-white" placeholder="Buscar...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat bg-white text-orange"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    </li>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
      <li>
        <a href="<?=base_url()?>tablero_usuario">
          <i class="glyphicon glyphicon-home"></i> <span>Inicio</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>tablero_usuario/oportunidades">
          <i class="fa fa-briefcase"></i> <span>Oportunidades</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>mensajes">
          <i class="fa fa-envelope-o"></i>  <span>Mensajes</span>
        </a>
      </li>
      <li class="header bg-white">
        Publicar
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/publicidad">
          <i class="glyphicon glyphicon-picture"></i> <span>Subir Publicidad</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/productos_principales">
          <i class="glyphicon glyphicon-bookmark"></i> <span>Productos Principales</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/videos">
          <i class="fa fa-video-camera"></i> <span>Subir Videos</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/galeria">
          <i class="fa fa-camera"></i> <span>Subir Imágenes</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/catalogo">
          <i class="glyphicon glyphicon-open"></i> <span>Subir Catalogo</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/nosotros">
          <i class="fa fa-flag"></i> <span>Misión y Visión</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/publicar_producto">
          <i class="fa fa-cube"></i> <span>Publicar Producto</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/cotizaciones">
          <i class="fa fa-file-text "></i> <span>Solicitar Cotización</span>
        </a>
      </li>

      <li class="header bg-white">Configuración</li>
      <li>
        <a href="<?=base_url()?>config_empresa/perfil_empresa">
          <i class="fa fa-building-o"></i> <span>Perfil de empresa</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/contacto">
          <i class="fa fa-phone"></i><span>Contacto</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/usuario">
          <i class="fa fa-child"></i><span>Usuario</span>
        </a>
      </li>
      <li>
        <a href="<?=base_url()?>config_empresa/clave">
          <i class="fa fa-lock"></i><span>Cambiar contraseña</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>