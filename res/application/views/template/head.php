<!DOCTYPE html>
<html lang="es">
<head>
  <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>-->
  <!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title><?php echo $titulo ?></title>
  <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/img/logoweb.ico" rel="shortcut icon" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/head.css">
  <link rel="stylesheet" href="<?php echo css_url(); ?>social.css">
  <script> var base_url = "<?= base_url() ?>"; </script>
  <meta name="google-site-verification" content="px6HVEw0kihblm_G6SY3jvhBiP8mMdC0Zscl_TKI1bI" />
  <meta name="google-site-verification" content="KCcycDogdTluio0fwtnVFmj2SaUULxHn9SOdpcfvI_o" />
  <?php $this->load->view('facebook-banners/meta'); ?>
</head>
<body>

<!-- Estart SDK funciones de facebook-->
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '682439635234689',
      xfbml      : true,
      version    : 'v2.3'
    });
    FB.api('https://graph.facebook.com/', 'post', {
            id: window.location.href,
            scrape: true
        }, function(response) {
            //console.log('rescrape!',response);
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<!-- Estart SDK funciones de facebook-->

<div class="container-fluid head_home"><!-- div.container-fluid aplica a todo  -->
  <div class="row"> <!-- div.row aplica a todo -->
<!-- fin head.php --><script type="text/javascript" src="http://cdn.broadstreetads.com/init.js"></script>
