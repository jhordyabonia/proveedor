<link rel="stylesheet" type="text/css" href="<?php echo css_url()?>/new_tablero_usuario/header_tablero_usuario.css">
<div class="contenedor_header">
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <img src="http://www.proveedor.com.co/assets/img/index/logo_proveedor.png" class="img_logo_header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav menu_collapse hidden-xs visible-sm visible-md visible-lg">
                <li class="item_collapse"><a href="#">Inicio</a></li>
                <li class="item_collapse"><a href="#">Mensajes</a></li>
                <li class="item_collapse"><a href="#">Contactos</a></li>
                <li class="item_collapse"><a href="#">Productos</a></li>
                <li class="item_collapse"><a href="#">Solicitudes</a></li>
            	<li class="item_collapse_usuario"><a href="#">Metalmecánica S.A.S <span class="glyphicon glyphicon-user ico_usuario"></span></a></li>
            	<li class="dropdown item_collapse_editar_empresa">
          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog ico_editar_em"></span> <span class="caret"></span></a>
          				<ul class="dropdown-menu" role="menu">
            				<li><a href="#" class="editar_empresa">Editar perfil de empresa</a></li>
            				<li><a href="#" class="editar_empresa">Cerrar sesión</a></li>
            			</ul>
        		</li>
            </ul>
            <ul class="nav navbar-nav menu_collapse visible-xs hidden-sm hidden-md hidden-lg">
                <li class="item_collapse_xs"><a href="#">Inicio</a></li>
                <li class="item_collapse_xs"><a href="#">Mensajes</a></li>
                <li class="item_collapse_xs"><a href="#">Contactos</a></li>
                <li class="item_collapse_xs"><a href="#">Productos</a></li>
                <li class="item_collapse_xs"><a href="#">Solicitudes</a></li>
                <li class="item_collapse_xs"><a href="#">Usuario <span class="glyphicon glyphicon-user"></span></a></li>
                <li class="dropdown item_collapse_xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" class="editar_empresa">Editar perfil de empresa</a></li>
                            <li><a href="#" class="editar_empresa">Cerrar sesión</a></li>
                        </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>