<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $this->section('titulo') ?></title>
    <link rel="stylesheet" href="<?php echo  assets_url() ?>bootstrap336/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo  assets_url() ?>bootstrap336/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo  assets_url() ?>font-awesome-450/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo  css_url() ?>maycol.css">
    <link rel="stylesheet" href="<?php echo  css_url() ?>carlos.css">
    <?php echo $this->section('css') ?>

</head>
<body>
    <div class="container-fluid">
        <?php echo $this->section('content') ?>
    </div>
    <!-- /.container-fluid -->
    <?php echo js("jquery-1.11.1.min.js") ?>
    <?php echo js("bootstrap.min.js") ?>
    <?php echo $this->section('javascripts') ?>
    
</body>
</html>