<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Pagina producto</title>
        <link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="<?= base_url() ?>css/producto.css" type="text/css" />
        <link rel="stylesheet" href="<?= base_url() ?>css/footer.css" type="text/css" />
    </head>
    <body >
        <header>
            <!-- Llamamos el archivo php que mostrara el header de la vista -->
            <?php echo $this->load->view('index/header') ?>
        </header>

        <nav>
            <div class="menu_sup" >
                Home->Nombre de categoria -> nombre de subcategoria -> nombre producto (??????)	
            </div>
        </nav>

        <section>	 
            <article>
                <div class="container_superior">

                    <div class="img_large">
                        <?php foreach ($img_principal as $row): ?>     		
                            <img src="<?= base_url() ?>uploads/<?php echo $row->nombre_img; ?>" width="100%" >
                        <?php endforeach; ?>
                        <div class="img_miniatura">
                            <?php foreach ($img_miniatura as $row): ?> 
                                <?php $img2 = $row->nombre_img; ?>
                                <img src="<?= base_url() ?>uploads/<?php echo $row->nombre_img; ?>" width="12%" height="12%" style="border: 1px solid blue; ">
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <div class="nom_producto">	 
                        <?php foreach ($nombre_producto as $row2): ?> 
                            <?php $no = $row2->nom_producto; ?>

                            Nombre producto_<?= $no ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="container_descripcion">

                        <div class="info_producto">


                            <div class="info">	 
                                <?php foreach ($negociacion as $row3): ?> 
                                    <?php
                                    $precio = $row3->precio_unidad;
                                    $min = $row3->pedido_min;
                                    $max = $row3->pedido_max;
                                    ?>

<?php endforeach; ?>
                                <p align="center"> Precio<?= $precio ?>/<?= $min ?>_ unidades&nbsp;Pedido minimo</center>
                                <br><p align="center">Capacidad de produccion_<?= $max ?> unidades mensuales	
                            </div>	

                            <div class="iconos">
                                <img src="<?= base_url() ?>img/4logos.png" >	 	
                            </div>	

                        </div>

                        <div class="info_empresa">	
                            <?php foreach ($empresa as $row4): ?> 
                                <?php
                                $ci = $row4->ciudad;
                                // $tipo= $row4->tipo_empresa;
                                ?>
<?php endforeach; ?>
                            <p align="center">Nivel<?@$ci ?>	</p>
                            <p align="center">Ciudad<?@$ci ?>	</p>
                            <p align="center">Tipo_empresa<?@$ci ?>	</p>
                            <p align="center">Productos<?@$ci ?>	</p>
                        </div>

                    </div>

                </div>
<?php //echo $this->load->view($contenido_superior)  ?>


                <div id="publi1">

                </div>
            </article>

            <article>
                <div id="publi3"><p align="left" style="margin: 25px"> producto detail - compañia - profile - company profile</p>
                    <?php foreach ($in_pro as $row2): ?> 
                        <?php
                        echo'<p align="left" style="margin: 25px"> Estado: ' . $e1 = $row2->estado . '</p>';
                        echo '<p align="left" style="margin: 25px"> Muestra: ' . $row2->muestra . '</p>';
                        echo '<p align="left" style="margin: 25px"> Ubicación: ' . $row2->ubicacion . '</p>';
                        echo '<p align="left" style="margin: 25px"> ' . $row2->descripcion . '</p>';
                        ?>

<?php endforeach; ?>

                </div>


                <?php //echo $this->load->view($productos_plus) ?>
            </article>
            <div id="publi2">
                <?php //echo $this->load->view($publicidad)  ?>
            </div>
            <article>
                <!--    panel mensajes de la parte inferior-->
                        <?= form_open_multipart('control_producto/enviar') ?>
                <div class="enviar_msj">
                    <div class="division">
                        <p><span>Quiero contactar al proveedor</span></p>
                        <?= @$mensaje ?>
                        <?php
                        if ($this->session->flashdata('validacion_correcta')) {
                            ?>
                            <p><?= $this->session->flashdata('validacion_correcta') ?></p>
    <?php }
?>

                        <input type="hidden" name="para" value="<?= $this->session->userdata('email'); ?>" size="35">
                        *Quien envia el mensaje: <input type="text" name="de" placeholder="Ingrese email o Id de miembro" size="35">
                        <p>Teléfono o contacto: <input type="text" name="tel" size="35"></p>

                    </div>

                    <div class="division">
                        <img src="<?= base_url() ?>img/4logos.png">	
                    </div>

                    <div class="division">
                        <p>Proveedor verificado	</p>
                        <p>Productos principales</p>
                        <p>Muestras en linea</p>
                    </div>
                </div>

                <div>
                    *Mensaje <textarea rows="8" cols="100" name="msj"></textarea>
                    <br>
                    <input type="submit" align="left">
                    <?= form_close() ?>
                    <hr color="gray" width="95%">
                </div>	
            </article>
            Productos especiales
            <article>

                <div class="division">
                    <img src="<?= base_url() ?>img/prueba.png" width="120px">
                </div>

                <div class="division">
                    <img src="<?= base_url() ?>img/prueba.png" width="120px">
                </div>

                <div class="division">
                    <img src="<?= base_url() ?>img/prueba.png" width="120px">
                </div>

                <div class="division">
                    <img src="<?= base_url() ?>img/prueba.png" width="120px">
                </div>

                <div class="division">
                    <img src="<?= base_url() ?>img/prueba.png" width="120px">
                </div>
            </article>

        </section>
        <footer>
        <?php echo $this->load->view('index/footer') ?>
        </footer>

    </body>
</html>
