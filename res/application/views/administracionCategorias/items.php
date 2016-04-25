<!DOCTYPE html>
<html lang="es">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
      <link href="<?= base_url() ?>assets/img/logoweb.ico" rel="shortcut icon" />
      <link href="<?php echo base_url() ?>assets/bootstrap336/css/bootstrap.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome-450/css/font-awesome.css">
      <script> var base_url = "<?= base_url() ?>"; </script>
      <title><?php echo $titulo ?></title>
      <script>
        var url = "<?=$url?>";
        var categoriaNombre = "<?=$categoriaNombre?>";
        var path = "<?=implode('%3A',$path)?>"; 
        var categoria_parent= <?=$categoria?>;   
        var nueva_categoria="Categoria<?=rand(0,$categoria)?>";      
        </script> 
        <link href="<?=base_url()?>assets/css/administracionCategorias/style.css" rel="stylesheet" type="text/css" >
        <script src="<?=base_url()?>assets/js/administracionCategorias/js.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        Administrar Categorias
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <!-- Creation form -->
                    <div class="form-group">
                        <label for="category-name">Nombre:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="category-name" placeholder="Digite el nombre de la categoria" onchange="nueva_categoria=this.value;">
                            <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="make()">Crear</button>
                          </span>
                        </div>
                    </div>
                    <!-- End creation form -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">     
                          <a href="<?=$url?>">Inicio</a>
                          <?php foreach ($path as $key => $value):?>
                          <li><a href="<?=$url?>/show2/<?=$key==0?-1:$key?>/<?=implode('%3A',$path)?>%3A<?=$categoriaNombre?>"><?=$value?></a></li>
                        <?php endforeach;?>
                      <li class="active"><?=$categoriaNombre?></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <!-- panel principal para mostrar las categorias -->
                <div class="col-sm-6 col-md-6">
                    <div class="items-category list-group" id="items-category">
                       <div id="main">
                       <?php if($categorias):?>
                            <?php foreach ($categorias as $key => $item):?>
                            <!-- Item category, this repeat in the foreach  -->
                                <dl  id='div<?=$item->id?>'  class="list-group-item" draggable='true' ondragstart='dragstart(this, event)' ondrop='drop(this, event)' ondragenter='return false' ondragover='return false' onclick="this.classList.add('active')">
                                    <!-- el evento onclic anterior lo puse para pruebas. Cuando una cateforia esté selecionada -->
                                    <a href="<?=$url?>/show2/0/<?=implode('%3A',$path).'%3A'.$categoriaNombre.'%3A'.$item->nombre?>">
                                        <div class="pull-left">
                                            <dt><?php echo $item->nombre; ?></dt>
                                        </div>
                                    </a> 
                                    <!-- Buttons -->
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            <a onclick='up(<?=$item->id?>)' class="btn btn-success">
                                                <i class="fa fa-arrow-up fa-fw fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <a onclick='del(<?=$item->id?>)' class="btn btn-danger">
                                                <i class="fa fa-trash fa-fw fa-2x" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Buttons -->
                                    <div class="clearfix"></div>
                                </dl>
                            <!-- End of item -->
                            </div>
                            <?php endforeach;?>
                        <?php else:?>
                            <!-- Item category, this repeat in the foreach  -->
                            <dl class="list-group-item">
                                <a href="#">
                                    <div class="pull-left">
                                        <dt>Sin categorias</dt>
                                        <dd>Al parecer no has agregado ninguna categoria, agrega escribe el nombre y dale en el botón crear</dd>
                                    </div>
                                </a> 
                                <div class="clearfix"></div>
                            </dl>
                            <!-- End of item -->
                        <?php endif;?>
                    </div>
                </div>
                <!-- Panel para mostrar las subcategorias (Solo se muestra en desktop y tablet)-->
                <div class="col-sm-6 col-md-6 hidden-xs">
                    <div class="items-subcategory list-group" id="items-subcategory">
                        <!-- Item category, this repeat in the foreach  -->
                        <dl class="list-group-item">
                            <div class="pull-left">
                                <dt>Sin subcategorias</dt>
                                <dd>Al parecer no has agregado ninguna subcategoria o no tienes selecionada ninguna categoria</dd>
                            </div>
                            <div class="clearfix"></div>
                        </dl>
                        <!-- End of item -->
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
