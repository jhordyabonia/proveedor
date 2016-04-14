<?php $this->layout('_layouts/base') ?>
<?php $this->start('titulo') ?><?php echo $titulo ?><?php $this->stop() ?>
<?php $this->start('css') ?><?php $this->stop() ?>
<div class="row">
    <div class="col-xs-8 logo">
        <a href="<?=base_url()?>">
            <img class="img-responsive" src="http://www.proveedor.com.co/assets/img/index/logo_proveedor.png" alt="">
        </a>
    </div>
    <div class="col-xs-4 signout-button">
        <a class="enlace_top" href="<?=base_url()?>logueo/logout">
            <i class="fa fa-sign-out"></i>
            Salir
        </a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <div class="col-md-12">
            <div class="col-md-12 contenedor_logo">
                <!-- REEMPLAZAR IMAGEN ESTÁTICA POR IMAGEN LLAMADA CON VARIABLE -->
                <?php if($empresa->logo):?>
                    <img class="img-responsive img_logo_empresa" src="<?=base_url()?>uploads/logos/<?=$empresa->logo?>">
                <?php else:?>
                    <img class="img-responsive img_logo_empresa" src="<?=base_url()?>uploads/logos/default.jpg">
                <?php endif;?>
            </div>
            <div class="col-xs-12 col-md-6 titulo_empresa">
                <p class="nombre_empresa">
                    <a href="<?=base_url()?>perfil/ver_empresa/<?=$empresa->id?>" 
                        class="nom_empresa link_tablero_usuario">
                        <?=$empresa->nombre?>
                    </a>
                </p>
                <!-- aquí colocar condición if para el titulo de membresía -->
                <p class="titulo_membresia"><?=$nombre_membresia?></p>
                <!-- <p class="titulo_membresia">Empresa Platino</p> -->
            </div>
            <!-- aquí colocar condición if para el logo de membresía -->
            <div class="col-xs-3 col-md-3 img_membresia center">
                <?php if($nombre_membresia=="Empresa Platino"):?> 
                    <img src="<?=base_url()?>assets/img/membresia/logo_mem_platino.png" class="membresia img-responsive">
                <?php elseif($nombre_membresia=="Empresa Oro"):?> 
                    <img src="<?=base_url()?>assets/img/membresia/logo_mem_oro.png" class="membresia img-responsive">
                <?php else:?> 
                    <img src="<?=base_url()?>assets/img/membresia/logo_mem_estandar.png" class="membresia img-responsive">
                <?php endif;?>
            </div>
            <div class="col-md-12 actualizar_membresia hidden-xs">
                <?php if($nombre_membresia!="Empresa Platino"):?> 
                <!--
                <a href="http://clientes.proveedor.com.co/#precio" class="link_tablero_usuario">
                    <p class="texto_actualizar">
                            <span class="glyphicon glyphicon-circle-arrow-up"></span> 
                            ACTUALIZAR A PLATINO  
                    </p>
                </a>-->
                <?php elseif($administrador):?>
                <a href="micro_admin" class="link_tablero_usuario">
                    <p class="texto_actualizar">
                            <span class="glyphicon glyphicon-circle-arrow-up"></span> 
                            Micro Admin 
                    </p>
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <a href="<?=base_url()?>publicar_producto" class="a-boton-tablero">
        <div class="col-xs-10 center-block center boton-tablero color-naranja">
            <div class="iconos-tablero">
                <i class="fa fa-chevron-up icono-tablero" aria-hidden="true"></i>
                <i class="fa fa-stop icono-tablero" aria-hidden="true"></i>
            </div>
            <p class="text-center">
                PUBLICAR PRODUCTOS
            </p>
        </div>
    </a>
    <a href="<?=base_url()?>publicar_oferta" class="a-boton-tablero">
        <div class="col-xs-10 center-block center boton-tablero color-azul">
            <div class="iconos-tablero">
                <i class="fa fa-file-o icono-tablero" aria-hidden="true"></i>
            </div>
            <p class="text-center">
                SOLICITAR COTIZACIÓN
            </p>
        </div>
    </a>
</div>
