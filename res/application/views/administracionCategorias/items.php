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
    var categoria_parent= <?=$categoria?>;   
    var nueva_categoria="Categoria<?=rand(0,$categoria)?>";      
    </script> 
    <link href="<?=base_url()?>assets/css/administracionCategorias/style.css" rel="stylesheet" type="text/css" >
    <script src="<?=base_url()?>assets/js/administracionCategorias/js.js"></script>
</head>
<body>
    <div class="container">
        <section>
            <div class="row">
                <header>
                    <div class="col-md-12">
                        <h1>
                            Administrar Categorias
                        </h1>
                    </div>
                    <hr>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="category-name">Nombre:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="category-name" placeholder="Digite el nombre de la categoria">
                              <span class="input-group-btn">
                                <button class="btn btn-success" type="button">Crear</button>
                              </span>
                            </div><!-- /input-group -->
                        </div>
                    </div>
                </header>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                          <li><a href="#">Categoria</a></li>
                          <li><a href="#">Subcategoria</a></li>
                          <li class="active">Level 3</li>
                        </ol>
                    </div>
                </div>
                <!-- panel principal para mostrar las categorias -->
                <div class="col-sm-6">
                    <div class="items-category list-group" id="items-category">
                        <!-- Item category, this repeat in the foreach  -->
                        <dl class="list-group-item">
                            <div class="pull-left">
                                <dt>Categoria</dt>
                                <dd>Descripcion de la categoria</dd>
                            </div>
                            <a href="#" class="pull-right btn btn-danger">
                                <i class="fa fa-trash fa-fw fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="clearfix"></div>
                        </dl>
                        <!-- End of item -->
                        <dl class="list-group-item">
                            <div class="pull-left">
                                <dt>Categoria</dt>
                                <dd>Descripcion de la categoria</dd>
                            </div>
                            <a href="#" class="pull-right btn btn-danger">
                                <i class="fa fa-trash fa-fw fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="clearfix"></div>
                        </dl>
                        <dl class="list-group-item">
                            <div class="pull-left">
                                <dt>Categoria</dt>
                                <dd>Descripcion de la categoria</dd>
                            </div>
                            <a href="#" class="pull-right btn btn-danger">
                                <i class="fa fa-trash fa-fw fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="clearfix"></div>
                        </dl>
                    </div>
                </div>

                <!-- Panel para mostrar las subcategorias -->
                <div class="col-sm-6 hidden-xs">
                    <div class="items-subcategory list-group" id="items-subcategory">
                        <!-- Item category, this repeat in the foreach  -->
                        <dl class="list-group-item">
                            <div class="pull-left">
                                <dt>Sub-Categoria</dt>
                                <dd>Descripcion de la Sub-categoria</dd>
                            </div>
                            <a href="#" class="pull-right btn btn-danger">
                                <i class="fa fa-trash fa-fw fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="clearfix"></div>
                        </dl>
                        <!-- End of item -->
                        <dl class="list-group-item">
                            <div class="pull-left">
                                <dt>Sub-Categoria</dt>
                                <dd>Descripcion de la Sub-categoria</dd>
                            </div>
                            <a href="#" class="pull-right btn btn-danger">
                                <i class="fa fa-trash fa-fw fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="clearfix"></div>
                        </dl>
                        <dl class="list-group-item">
                            <div class="pull-left">
                                <dt>Sub-Categoria</dt>
                                <dd>Descripcion de la Sub-categoria</dd>
                            </div>
                            <a href="#" class="pull-right btn btn-danger">
                                <i class="fa fa-trash fa-fw fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="clearfix"></div>
                        </dl>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <hr>
    <div class="container">
        <input placeholder="Nombre categoria" onchange="nueva_categoria=this.value;">
        <button onclick="make(nueva_categoria)">Agregar</button> 
        <div class='main row' id="main">
           <?php if($categorias):?>
                <?php foreach ($categorias as $key => $item):?>
                    <div id='div<?=$item->id?>' align='center' class='caja col-md-3 col-xs-3 col-lg-3' 
                        draggable='true' ondragstart='dragstart(this, event)' ondrop='drop(this, event)' 
                        ondragenter='return false' ondragover='return false'>
                        <a href='<?=$url?>/show/<?=$item->id?>'>
                            <div class='col-md-8 col-xs-8 col-lg-8'>
                                <span class='glyphicon glyphicon-folder-open directori'></span><br><?=$item->nombre?>
                            </div>
                        </a>
                        <div class='col-md-4 col-xs-4 col-lg-4'>
                        <div class='funciones'>
                                <a onclick='up(<?=$item->id?>)'><span class='glyphicon glyphicon-upload'></span>Subir</a>
                                <a onclick='del(<?=$item->id?>)'><span class='glyphicon glyphicon-trash'></span>Eliminar</a>
                            </div>
                        </div>            
                    </div>
                <?php endforeach;?>
            <?php else:?>
                <h2 align='center'>
                    <br>No hay subcategorias aquí
                </h2> 
            <?php endif;?>
        </div>
    </div>
</body>
</html>
