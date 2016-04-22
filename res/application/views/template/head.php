<!DOCTYPE html>
<html lang="es">
<head>
  <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>-->
  <!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />-->
  <meta charset="UTF-8">
  <meta name="google-site-verification" content="KCcycDogdTluio0fwtnVFmj2SaUULxHn9SOdpcfvI_o" />
  <meta name="google-site-verification" content="px6HVEw0kihblm_G6SY3jvhBiP8mMdC0Zscl_TKI1bI" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <?php if (isset($descripcion)): ?>
  <!-- seo description -->
  <meta name="description" content="<?php echo $descripcion ?>">
  
  <!-- las etiquetas -->
  <meta name="keywords" content="<?php echo $tags ?>">
  <?php else: ?>
    <!-- No se ha agregado metadescription, verifique en application\views\template\head.php -->
  <?php endif ?>
  <!-- Social tags -->
  <?php $this->load->view('facebook-banners/meta'); ?>


  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/img/logoweb.ico" rel="shortcut icon" />
  <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/head.css">
  <link rel="stylesheet" href="<?php echo css_url(); ?>social.css">
  <script> var base_url = "<?= base_url() ?>"; </script>
  <title><?php echo $titulo ?></title>
  
  

</head>
<body>
<div class="container-fluid head_home"><!-- div.container-fluid aplica a todo  -->
  <div class="row"> <!-- div.row aplica a todo -->
<!-- fin head.php --><script type="text/javascript" src="http://cdn.broadstreetads.com/init.js"></script>
