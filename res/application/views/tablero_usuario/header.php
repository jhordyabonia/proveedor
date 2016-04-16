<link rel="stylesheet" type="text/css" href="<?php echo css_url()?>/new_tablero_usuario/header_tablero_usuario.css">
<div class="contenedor_header">
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a href="<?=base_url()?>">
                <img src="http://www.proveedor.com.co/assets/img/index/logo_proveedor.png" class="img_logo_header">
            </a>
            <button type="button" class="navbar-toggle collapsed  hidden-xs" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav menu_collapse">
                <li class="indice_active item_collapse"><a href="<?=base_url()?>tablero_usuario">INICIO</a></li>
                <li class="item_collapse"><a href="<?=base_url()?>tablero_usuario/oportunidades">OPORTUNIDADES</a></li>
                <li class="item_collapse"><a href="<?=base_url()?>mensajes">MENSAJES</a></li>
                <!--<li class="item_collapse"><a href="#">CONTACTOS</a></li>-->
                <li class="item_collapse"><a href="<?=base_url()?>producto/administrar">PRODUCTOS</a></li>
                <li class="item_collapse"><a href="<?=base_url()?>oferta_test/administrar">SOLICITUDES</a></li>
                <?php if($administrador):?>
                <li class="item_collapse"><a href="<?=base_url()?>micro_admin">ADMIN</a></li>
                <?php endif;?>
            </ul>
            <ul class="nav navbar-nav navbar-right menu_collapse_derecha">
                <li class="item_collapse_usuario">
                    <a href="<?=base_url()?>perfil/ver_empresa/<?=$empresa->id?>" class="nombre_empresa">
                        <span class="glyphicon glyphicon-user ico_usuario"></span>
                        <?=$usuario->usuario?>
                    </a>
                </li>
                <li class="dropdown item_collapse_editar_empresa">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog ico_editar_em"></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?=base_url()?>config_empresa/perfil_empresa" class="editar_empresa">Editar perfil de empresa</a></li>
                            <li><a href="<?=base_url()?>logueo/logout" class="editar_empresa">Cerrar sesión</a></li>
                        </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>