<!DOCTYPE html>
<html lang = "es">
    <head>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
    <meta charset="UTF-8">
    <title>Proveedor.com.co / Perfil Empresa - Catálogo </title>
    <link rel="stylesheet" href="<?=base_url()?>css/960.css">
    <link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
    <link rel="stylesheet" href="<?=base_url()?>css/perfil_e/reset.css">
    <!-- importaciones sistema de paginacion -->
    <link rel="stylesheet" href="<?=base_url()?>css/perfil_e/pagination.css" />
    <script type="text/javascript" src="<?=base_url()?>js/perfil_e/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/perfil_e/jquery.pagination.js"></script> 

   <!-- JS donde estan los datos de productos traidos desde la BD -->
 <?php  echo '  <script type="text/javascript" >
      var pCatalogo = [';
      if($productos){
      foreach (@$productos as $registro){
        echo '
    ["uploads/'.@$registro->nombre_img.'", "'.@$registro->nom_producto.'", "Min. Order: ", "'.$registro->pedido_min.' und",
    "Price: ", "US$ '.$registro->precio_unidad.' "],';
 }
  } 

 echo '];
</script> ';
?> 


  <script type="text/javascript">
  // Con esta funcion se verifica si el usuario ha iniciado sesion cuando oprime el boton de agregar contacto 
      $(document).ready(function() {
      $('a.add').click(function() {
        var session = '<?php echo $this->session->userdata("is_logued_in") ?>';
          if(session == false){
               alert('debes iniciar sesion'); 
          }
        })


      // cuando se presiona el boton contactar cuando no se ha iniciado sesion
        $('a.contactar').click(function() {
        var session = '<?php echo $this->session->userdata("is_logued_in") ?>';
          if(session == false){
               alert('debes iniciar sesion'); 
          }
        })

         }); 
  </script>

  <script type="text/javascript">
   /* Con esta funcion agregamos el contacto, esta funcion se realiza mediante ajax y despues 
  mandamos un mensaje en esta vista cuando el usuario da clic en el boton de añadir contacto */
      
     $(document).ready(function() {
      $('a.add').click(function() { 
        var session = '<?php echo $this->session->userdata("is_logued_in") ?>';
            if(session == true){ 
          var id_user   = '<?php echo $this->uri->segment(3);?>';
          var nit   = '<?php echo $this->uri->segment(4);?>';
          var id_contacto = '<?php echo $contacto_id->id_contacto;?>';
          var mi_id   = '<?php echo $this->session->userdata("id_usuario") ?>';
          $.post("<?=base_url()?>perfil/add_contacto", {
            id_user:id_user,
            nit:nit,
            id_contacto:id_contacto,
            mi_id:mi_id
          }, function(data) { 
            // $("#aviso_add").html(data);
            alert(data);
          });
      setTimeout(function() {
            $(".mensaje_div").fadeOut(1500);
        },4000);

           
        }   

      })

  //Si se ha iniciado sesion y se presiona el boton contactar
    $('a.contactar').click(function() {
      
      window.location.href = "<?=base_url()?>contactar_usuario/enviar_msj/<?= $logo_empresa->logo;?>/<?= $nom_empresa->nombre?>";
    })  

     }); 

    </script>




<!-- script donde se maneja el contenido de resultados de la pagina -->
<script type="text/javascript" src="<?=base_url()?>js/perfil_e/contenido.js"></script>
</head>
<style type="text/css">
      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* cuerpo */
    html, body {
      font-family: Arial;
      /* desaparece scroll horizontal en IE y otros */
      overflow-x: hidden;
      overflow-y: auto;
    }
    .container_12{
      background: #ffffff;
      height: auto;
      width: 1336px;
      max-width: 1299px;
      margin-top: 0px;
      margin-left: center;
      margin-right: center;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* header */
    #he {
      background: #ffffff;
      width: 100%;
      max-width: 103.9%;
      margin-top: 0px;
      height: 53px;
      margin-left: 0px;
    }
    /* header / espacio entre logo ingresar y logo registro gratis */
   #espacio {
          height: 14px;
          width: 1px;
          background: rgb(170, 169, 169);
          margin-left: 1px;
          margin-top: 23px;
      }
    /* header / espacio busqueda / cuadro de texto */
    #cuadro_busqueda{
      width: 277px;
      max-width: 277px;
      height: 23px;
      background: white;
      margin-left: 29px;
      margin-top: 12px;
      border: 2px solid #00a2e8;
      border-radius: 2px;
    }
    /* header / espacio busqueda / boton busqueda */
    #boton_busqueda {
      border: none;
      width: 63px;
      max-width: 63px;
      height: 29px;
      margin-left: -1px;
      margin-top: 12px;
      background: url('<?=base_url()?>img/buscar_2.png');
      background-position: 0px -1px;
      cursor: pointer;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* titulo */
    #ha {
        margin-top: 0px;
        background: #FFFFFF;
        width: 960px;
        max-width: 960px;
        margin-left: 236px;
        margin-right: 100px;
        height: 45px;
        /* margin-bottom: 21px; */
    }
    /* titulo / imagen */
    #foto1 {
      margin-top: 8px;
      height: auto;
      width: auto;
      background: #FFFFFF;
      margin-left: 8px;
    }
    /* titulo / titulo (div) */
    #div_titulo_empresa {
      height: auto;
      width: auto;
      text-align: left;
      background: rgb(255, 255, 255);
    }
    /* titulo / titulo (texto) */
    #titulo_empresa {
      margin-top: 16px;
      color: rgb(0, 0, 0);
      font-size: 33px;
      font-family: Arial;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* pestañas */
    #hi {
      background: rgb(20, 111, 209);
      width: 100%;
      max-width: 100%;
      margin-left: 0px;
      height: 32px;
      margin-top: 25px;
    }
    /* css para una pestaña activa */
    .tab_activa {
      background-color: white; 
      border-top: 3px solid #ff7f27;
    }
    .tab_activa a {
      color: black !important;
    }
    /* pestañas / texto primer pestaña (1. catalogo) */
    #letra_boton1 {
      margin-top: -9px;
      color: #000000;
      font-size: 15px;
      font-family: arial;
    }
    /* pestañas / texto segunda y tercer pestaña (2. perfil empresa, 3. contacto) */
    #letra_boton {
      margin-top: 15px;
      color: #000000;
      font-size: 15px;
      font-family: arial;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* aside izquierdo / catalogo / cada elemento */
    #cuadro1_categoria{
      margin-top: 10px;
      background: #aaaaaa;
      height: 84px;
      width: 91%;
      max-width:91%;
    }
    #cuadro2_categoria{
      margin-top: 1px;
      background: #aaaaaa;
      height: 84px;
      width: 91%;
      max-width:91%;
      max-height:104px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* productos */
    #div2 {
      height: auto;
      width: 1066px;
      margin-left: 223px;
      margin-top: 4px;
    }
    /* productos / titulo */
    #letra_producto {
      margin-left:10px;
      margin-top: -10px;
      color: #000000;
      font-size: 15px;
      font-family: arial;
    }
    /* productos / titulo / separador de abajo del titulo */
    #linea3 {
      margin-top: 10px;
      background: rgb(167, 167, 167);
      height: 2px;
      width: 99%;
    }
    /* productos / tres iconos / texto de cada icono */
    #texto_chat {
      font-family: arial;
      font-size: 12px;
      color: gray;
      margin-left: 6px;
      margin-top: 13px;
      text-align: left;
      margin: 10px 10px 10px 10px;
    }
    /* productos / paginacion / cada producto (div y producto) */
    .dpadre {
      padding: 0px 10px 21px 0px; 
      float: left;
    }
    .dhijo {
      width: 233px;
      border: 3px solid #f3f3f4; 
      height: 263px;
      max-height: 263px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* footer */
    #footer {
      background: #f2f2f2;
      margin-top: 49px; 
      height: 359px; 
      width: 1359px;
      margin-left: -30px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* otros elementos css */  
       .grid_1{
         height: 50px;
         width: 225px;
       }
       .grid_4{
         background: #ffffff;
         height:512px;
         margin:12px 12px;
         width: 300px;
       }
        #div1{
         height:auto;
         width: 220px;
       }
       .grid_2{
         background: #ffffff;
         height:300px;
         width: 100%;
       } 
       #div3{
         height:900px;
         width: 1830px;
       }
       #ingresar{
         margin-top: -26px;
         color: #A39B9B;
         font-size: 18px;
         font-family:arial;
         margin-left: 53px;
       }
       #linea{
         margin-top: 10px;
         margin-bottom: 15px;
         background: rgb(167, 167, 167);
         height: 2px;
         width: 91%;
       }
       #linea2{
         margin-top: 12px;
         margin-bottom: 12px;
         background: rgb(167, 167, 167);
         height: 1px;
         width: 91%;
       }
       #cuadro_fotos{
          margin-top: 10px;
          background: #aaaaaa;
          height: 152px;
          width: 91%;
          max-width:91%;
          max-height:152px;
       }
       #cuadro_fotos1{
          margin-top: 8px;
          background: none;
          height: 152px;
          width: 91%;
          max-width:91%;
          max-height:152px;
       }
       #chat{
        width: 111px;
        height: 103px;
        margin-top: 1px;
        margin-left: 5px;
        background: #ffffff;
       }
       #chat_opcion{
        width: 257px;
        height: 103px;
        margin-top: 4px;
        margin-left: -7px;
        background: #ffffff;
       }
       #texto_contactar{
         font-family: arial;
        font-size: 18px;
        color: #9b85ac;
        margin-left: 6px;
        margin-top: 23px;
        text-align: left;
       }
       #contactar{
        width: 111px;
        height: 103px;
        margin-top: 1px;
        margin-left: 53px;
        background: #ffffff;
       }
       #contactar_opcion{
         width: 257px;
        height: 103px;
        margin-top: 4px;
        margin-left: -7px;
        background: #ffffff;
       }
        #añadir{
        width: 111px;
        height: 103px;
        margin-top: 1px;
        margin-left: 5px;
        background: #ffffff;
       }
         #call{
        width: 111px;
        height: 103px;
        margin-top: 1px;
        margin-left: 5px;
        background: #ffffff;
       }
        #foto_logo{
                margin-left: -2px;
                margin-top: 1px;
       }
       #foto_ingresar{
          width: auto;
          margin-left: 28px;
          margin-top: 14px;
          margin-right: 5px;
       }
       #foto_registrar{
          margin-left: -6px;
          margin-top: 15px;
          margin-right: 3px;
       }
       #foto_oferta{
        margin-left: 26px; 
        margin-top: 2px;
       }

       #foo{
        margin-top: 8px; 
        height:393px;
        width: 1344px;
        margin-left: -36px; 
        background:#f2f2f2;
        }
        #linea_espacio{
              margin-top: 18px;
              background: #f0f0f0;
              height: 0.5px;
              width: 124%;
              margin-left: -220px;
          }
</style>

<style>
     @media screen and (max-width: 1024px) {
          /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* cuerpo */
    html, body {
      font-family: Arial;
      /* desaparece scroll horizontal en IE y otros */
      overflow-x: hidden;
      overflow-y: auto;
    }
    .container_12{
      background: #ffffff;
      height: auto;
      width: 1336px;
      max-width: 1299px;
      margin-top: 0px;
      margin-left: center;
      margin-right: center;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* header */
    #he {
      background: #ffffff;
      width: 100%;
      max-width: 103.9%;
      margin-top: 0px;
      height: 53px;
      margin-left: 0px;
    }
    /* header / espacio entre logo ingresar y logo registro gratis */
    #espacio {
          height: 14px;
          width: 1px;
          background: rgb(170, 169, 169);
          margin-left: 1px;
          margin-top: 23px;
      }
    /* header / espacio busqueda / cuadro de texto */
    #cuadro_busqueda {
         width: 201px;
         max-width: 277px;
         height: 23px;
         background: white;
         margin-left: 2px;
         margin-top: 12px;
         border: 2px solid #00a2e8;
         border-radius: 2px;
         }
    /* header / espacio busqueda / boton busqueda */
    #boton_busqueda {
      border: none;
      width: 63px;
      max-width: 63px;
      height: 29px;
      margin-left: -1px;
      margin-top: 12px;
      background: url('<?=base_url()?>img/buscar_2.png');
      background-position: 0px -1px;
      cursor: pointer;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* titulo */
    #ha {
        margin-top: 0px;
        background: #FFFFFF;
        width: 960px;
        max-width: 960px;
        margin-left: 236px;
        margin-right: 100px;
        height: 45px;
        /* margin-bottom: 21px; */
    }
    /* titulo / imagen */
    #foto1 {
      margin-top: 8px;
      height: auto;
      width: auto;
      background: #FFFFFF;
      margin-left: 8px;
    }
    /* titulo / titulo (div) */
    #div_titulo_empresa {
      margin-top: 6px;
      height: 116px;
      width: 535px;
      background: #FFFFFF;
      margin-left: -4px;
      text-align: center;
    }
    /* titulo / titulo (texto) */
    #titulo_empresa {
      margin-top: 16px;
      color: rgb(0, 0, 0);
      font-size: 33px;
      font-family: Arial;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* pestañas */
    #hi {
      background: rgb(20, 111, 209);
      width: 100%;
      max-width: 100%;
      margin-left: 0px;
      height: 32px;
      margin-top: 25px;
    }
    /* css para una pestaña activa */
    .tab_activa {
      background-color: white; 
      border-top: 3px solid #ff7f27;
    }
    .tab_activa a {
      color: black !important;
    }
    /* pestañas / texto primer pestaña (1. catalogo) */
    #letra_boton1 {
      margin-top: -9px;
      color: #ffffff;
      font-size: 15px;
      font-family: arial;
    }
    /* pestañas / texto segunda y tercer pestaña (2. perfil empresa, 3. contacto) */
    #letra_boton {
      margin-top: 15px;
      color: #ffffff;
      font-size: 15px;
      font-family: arial;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* aside izquierdo / catalogo / cada elemento */
    #cuadro1_categoria{
      margin-top: 10px;
      background: #aaaaaa;
      height: 84px;
      width: 91%;
      max-width:91%;
    }
    #cuadro2_categoria{
      margin-top: 1px;
      background: #aaaaaa;
      height: 84px;
      width: 91%;
      max-width:91%;
      max-height:104px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* productos */
    #div2 {
      height: auto;
      width: 1066px;
      margin-left: 215px;
      margin-top: 4px;
    }
    /* productos / titulo */
    #letra_producto {
      margin-left:10px;
      margin-top: -10px;
      color: #000000;
      font-size: 15px;
      font-family: arial;
    }
    /* productos / titulo / separador de abajo del titulo */
    #linea3 {
      margin-top: 10px;
      background: rgb(167, 167, 167);
      height: 2px;
      width: 99%;
    }
    /* productos / tres iconos / texto de cada icono */
    #texto_chat {
      font-family: arial;
      font-size: 12px;
      color: gray;
      margin-left: 6px;
      margin-top: 13px;
      text-align: left;
      margin: 10px 10px 10px 10px;
    }
    /* productos / paginacion / cada producto (div y producto) */
    .dpadre {
      padding: 0px 10px 21px 0px; 
      float: left;
    }
    .dhijo {
      width: 233px;
      border: 3px solid #f3f3f4; 
      height: 263px;
      max-height: 263px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* footer */
    #footer {
      background: #f2f2f2;
      margin-top: 49px; 
      height: 359px; 
      width: 1359px;
      margin-left: -30px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* otros elementos css */  
       .grid_1{
         height: 50px;
         width: 225px;
       }
       .grid_4{
         background: #ffffff;
         height:512px;
         margin:12px 12px;
         width: 300px;
       }
        #div1{
         height:auto;
         width: 0px;
       }
       .grid_2{
         background: #ffffff;
         height:300px;
         width: 100%;
       } 
       #div3{
         height:900px;
         width: 1830px;
       }
       #ingresar{
         margin-top: -26px;
         color: #A39B9B;
         font-size: 18px;
         font-family:arial;
         margin-left: 53px;
       }
       #linea{
         margin-top: 10px;
         background: rgb(167, 167, 167);
         height: 2px;
         width: 91%;
       }
       #linea2{
         margin-top: 2px;
         background: rgb(167, 167, 167);
         height: 1px;
         width: 91%;
       }
       #cuadro_fotos{
          margin-top: 10px;
          background: #aaaaaa;
          height: 152px;
          width: 91%;
          max-width:91%;
          max-height:152px;
       }
       #cuadro_fotos1{
          margin-top: 8px;
          background: #aaaaaa;
          height: 152px;
          width: 91%;
          max-width:91%;
          max-height:152px;
       }
       #chat{
        width: 111px;
        height: 103px;
        margin-top: 1px;
        margin-left: 5px;
        background: #ffffff;
       }
       #chat_opcion{
        width: 257px;
        height: 103px;
        margin-top: 4px;
        margin-left: -7px;
        background: #ffffff;
       }
       #texto_contactar{
         font-family: arial;
        font-size: 18px;
        color: #9b85ac;
        margin-left: 6px;
        margin-top: 23px;
        text-align: left;
       }
       #contactar{
        width: 111px;
        height: 103px;
        margin-top: 1px;
        margin-left: 53px;
        background: #ffffff;
       }
       #contactar_opcion{
         width: 257px;
        height: 103px;
        margin-top: 4px;
        margin-left: -7px;
        background: #ffffff;
       }
        #añadir{
        width: 111px;
        height: 103px;
        margin-top: 1px;
        margin-left: 5px;
        background: #ffffff;
       }
         #call{
        width: 111px;
        height: 103px;
        margin-top: 1px;
        margin-left: 5px;
        background: #ffffff;
       }
        #foto_logo{
                margin-left: -2px;
                margin-top: 1px;
       }
       #foto_ingresar{
          width: auto;
          margin-left: 28px;
          margin-top: 14px;
          margin-right: 5px;
       }
       #foto_registrar{
          margin-left: -6px;
          margin-top: 15px;
          margin-right: 3px;
       }
       #foto_oferta{
        margin-left: 11px;
                margin-top: 2px;
       }

        #foo{
              margin-top: 8px;
              height: 393px;
              width: 1024px;
              margin-right: -12px;
              margin-left: -18px;
              background: #f2f2f2;
          }
          #linea_espacio{
              margin-top: 18px;
              background: #f0f0f0;
              height: 0.5px;
              width: 124%;
              margin-left: -220px;
          }
      }
</style>

<!-- Estilos para las categorias y subcategorias  -->
<style type="text/css">
  .categorias  {
    font: bold 10pt arial;
    margin-left: 25px;
    margin-bottom: 10px;
    /*font-size: 10pt;
    font-weight: bold;*/
    }  

   .subcategorias {
    font: normal 9pt arial;
    margin-left: 25px; 
   } 
</style>

<!-- estilos para los mensajes de los botones -->
  <style type="text/css">
    #aviso_add{
     /*border: solid 2px blue;*/
     background: none;
     width: 15%;
     height: auto;
     position: absolute; 
    }

    .mensaje_div{
     border: solid 1px gray;
     background: #E6E6E6;
     width: auto;
     height: auto;
     font-size: 12pt;
     font-weight: bold;
     color: orange; 
     border-radius:10px;
     box-shadow: #000 0 0 30px;
    }

  </style> 


  <body>
    <div class="container_12">      
      <!-- header -->
      <div class="grid_1" id="he"> 
            <?=form_open(base_url().'listado/validar')?>  <!--Formulario de busqueda que dirige a la vista de listado -->
            <table style="height: 100%;"> <tr>
              <td> <a href="<?=base_url()?>index"> 
                <img src="<?=base_url()?>img/lo.png" id="foto_logo" /> </a> </td>
              <td> <a href="#"> 
                <img src="<?=base_url()?>img/in.png" id="foto_ingresar"/> </a> </td>
              <td> <div class="grid_2" id="espacio"> </div> </td>
              <td> <a href="<?=base_url()?>registro/registro_usuario"> 
                <img src="<?=base_url()?>img/reg.png" id="foto_registrar"/> </a> </td>
              <td> <div class="grid_2" id="espacio"> </div> </td>
              <td> <input type="text" id="cuadro_busqueda" name="busqueda"/> </td>
              <td> <input type="submit" id="boton_busqueda" value=""/>
              <input type="hidden" name="selec1" value="Productos">  </td>
              <td> <a href="#"> <img src="<?=base_url()?>img/sol.png" id="foto_oferta" style="margin-top: 0px;"/> </a> </td>
              <td> <a href="#"> <img src="<?=base_url()?>img/pub.png" style="margin-left: 8px; margin-top: 0px;" /> </a> </td>
            </tr> 
          </table>
          <?=form_close()?>
      </div>



            <?php
              //En estas variables se guarda el id de usuario del proveedor y el nit, son capturados de la url
                $seg3 = $this->uri->segment(3);
                $seg4 = $this->uri->segment(4);
                ?>
      <!-- pestañas -->
      <div class="grid_1" id="hi"> 
        <div style="width: 100%; height: 32px; background-color: #f0f0f0;"> 
          <div style="padding-left: 136px; padding-right: 0px; float: left; width: auto; height: 32px;"> 
            <table width="auto" style="border-spacing: 0px; height: 32px;"> <tr>
              <!-- pestañas / 1. catalogo -->
              <td class="tab_activa" style="vertical-align: middle; background-size: cover; overflow: hidden; color: #0065ca; font-weight: bold; width: 94px; text-align: center;"> 
              <div style="vertical-align: middle; height: auto; width: auto;"> 
              <a href="<?=base_url()?>perfil/ver_empresa/<?=$seg3?>/<?=$seg4?>" style="text-decoration: none;" id="letra_boton1" > Catálogo </a>
                </div>
              </td>
              <!-- pestañas / 2. perfil empresa -->
              <td style="vertical-align: middle; color: white; font-weight: bold; width: 152px; text-align: center;"> 
                <a href="<?=base_url()?>perfil/perfil_empresa/<?=$seg3?>/<?=$seg4?>"  style="text-decoration: none;" id="letra_boton"> Perfil Empresa </a>
              </td>
              <!-- pestañas / 3. contacto -->
              <td style="vertical-align: middle; color: white; font-weight: bold; width: 113px; text-align: center;"> 
                <a href="<?=base_url()?>perfil/contacto_empresa/<?=$seg4?>"  style="text-decoration: none;" id="letra_boton"> Contacto </a>
              </td>
            </tr> </table>
          </div>
        </div>
      </div> 

      <div class="clear"></div>

      <article> <section>
        
        <!-- titulo -->
                <div class="grid_1" id="ha"> 
                  <div class="grid_2" id="div_titulo_empresa">
                    <h3 id="titulo_empresa"> <?= $nom_empresa->nombre?> </h3>
                  </div>
                  <!-- div que contiene la imagene de membresia --> 
                  <div style="float: right;">
                    <!-- imagen de membresia -->
                    
                      <img src="<?php echo base_url()?>assets/img/membresia/<?php echo $membresia->logo; ?>" class="img-responsive" style="width: 83px;">
                  </div>      
                </div>
                <div class="grid_2" id="linea_espacio"> </div>
        <!-- aside izquierdo -->
        <div class="grid_4" id="div1">
          <!-- aside izquierdo / catalogo -->
          <div class="grid_2 alpha" style="margin-top: 25px; height: 704px; width: 238px; margin-left: -13px; margin-bottom: -729px;">
            <h1 style="text-align: center; margin-top: -9px; color: #000000; font-size: 15px; font-family: Arial;">
              Categorias</h1>
            <div class="grid_2" id="linea"></div>
            
            <?php 

            foreach ($total_porCategoria as $categoria)
            {
               echo '<A href="'.base_url().'perfil/ver_empresa/'.$seg3.'/'.$seg4.'/'.$categoria['id_categoria'].'" > <P class="categorias">'.$categoria['nombre'].'<B>('.$categoria['cantidad'].')</B></A></P>';
               foreach ($total_porSubCategoria as $subcategoria)
               { 
                  if($categoria['id_categoria']==$subcategoria['id_categoria'])
                  { 
                    echo '<A href="'.base_url().'perfil/ver_empresa/'.$seg3.'/'.$seg4.'/'.$subcategoria['id_subCategoria'].'/1/'.'"<P class="subcategorias">'.$subcategoria['nombre'].'<B>('.$subcategoria['cantidad'].')</B></A></P>';
                  }               
               } 
               echo "<div class='grid_2' id='linea2'></div>";                   
            }
            ?>
            


          </div>

          <style type="text/css">
            .img_related{
              border: solid 2px #EEECEC;
              width: 99%;
              height: 70%;
            }

            .img_related img {
              max-width: 100%;
              min-width: 75%;
              max-height: 90%;
              min-height: 75%;
              margin-left: 10%;
            }

            .text_related{
              border: none;
              width: 100%;
              height: auto;
              font-size: 8pt;
              margin-top: 10px;
            }
         </style> 

          <!-- aside izquierdo / related products -->
          <!--
          <div class="grid_2 alpha" style="margin-top: 70px; height: auto; width: 238px; margin-left: -13px;">
            <h1 id="letra_boton1" style="text-align: center; color: black;">Related Products</h1>
            <div class="grid_2" id="linea"></div>
              <?php  foreach ($img_related as $valor){ ?>
                <div class="grid_2" id="cuadro_fotos1">
                <?php  echo '<div class="img_related">
                <img src="<?=base_url()?>uploads/'.$valor->nombre_img.'">
                </div>
                <div class="text_related">'.$valor->nom_producto.'</div>'; ?>
              </div>
              <?php  }?>
          </div>
        </div>-->

        <!-- productos -->

        <div class="grid_4" id="div2">
          <!-- texto y botones paracontactar proveedor y chat -->
          <div style="background:white; width: 63%; height: 122px; margin-left: 8px;">
             <!-- texto -->
            <div style="background:white; height:auto; width:auto; "> 
              <p style="font-size: 17px;">Seleccione uno o varios productos y de click en "Contactar Proveedor" o "Chatear Ahora".</p>
            </div>
            <div style="margin-left: 0px; margin-top: 17px;">
               <input type="image" name="boton"   src="<?=base_url()?>img/contac.png" />
               <input type="image" name="boton"   src="<?=base_url()?>img/cha.png" />
            </div>
          </div>
          <!-- informacion del producto y proveedor -->
          <div style="background:white; width: 33%; height: 90px; margin-left: 709px;margin-top: -122px;">
            <div class="grid_2" style="margin-top: 5px; width: 433px;  margin-right: -181px; height: auto; margin-left: -8px; background: transparent;">
            <div style="padding: 11px 10px 10px 119px; font-size: 13px;"> 
              <a href="#" style="margin-left: -114px;" class="add"> <img src="<?=base_url()?>img/addproveedor.png" /> </a>
              <p style="color: #00a2e8; font-size: 19px; font-weight: bold; padding-bottom: 10px; padding-bottom: 91px; margin-top: -93px"> 
                <?= $nom_empresa->nombre?> </p>
              <table width="100%" style=" border-collapse: separate; border-spacing: 0px; font-size: 12px; margin-top: -90px;">
                <tr>
                  <td style="padding-right: 10px; padding-bottom: 3px;"> <img src="<?=base_url()?>img/contacto.png" /> <a href="#" style="text-decoration: initial; margin-left: 5px; font-size: 15px; color:#3a66d5;"> Información de Contacto </a></td>
                </tr>
                <tr> <td style="font-size: 12px;"> <b> Ubicacion: </b>   <?= $ciudad_empresa->ciudad ?></td> </tr>
                <tr> <td style="font-size: 12px;"> <b> Tipo de empresa: </b> <?= $tipo_empresa->tipo ?> </td>  </tr>
                <tr> <td style="font-size: 12px;"> <b> Tipo de membresia: </b> <?= $membresia->logo?></td>  </tr>
                <tr> <td style="font-size: 12px;"> <b> Productos de interes: </b>
                  <?php
                      foreach ($otrosProductos_empresa as $row)
                      {
                        echo $row->nombre_producto . ' ';
                      }
                  ?>                                 
                 </td>
                  </tr>
              </table>
            </div>
          </div>
          </div>


          <!-- productos / titulo -->
          <div class="grid_2 alpha" style="margin-top: 17px; height:50px;">
            <!--Jhordy:: implementacion de la variable total productos-->
            <h1 id="letra_producto" style="text-align:left;">Productos (<?=$total_productos?>)  
              <?php        
                if($tipo_seleccion==1)
                {  
                  foreach ($total_porSubCategoria as  $value)
                    {
                      if ($value['id_subCategoria']==$id_seleccion) 
                      {echo $value['nombre']; break;}
                    } 
                }else
                 {                    
                   foreach ($total_porCategoria as  $value)
                    {
                      if ($value['id_categoria']==$id_seleccion) 
                      {echo $value['nombre']; break;}
                    }
                 }
                ?> 
             </h1>
            <div class="grid_2" id="linea3"></div>
          </div>

          <!-- productos / iconos y paginacion -->
          <div class="grid_2 alpha" style="margin-top: -3px; height: auto;">
            <!-- productos / iconos y paginacion / tres iconos (1) -->
             <!--<div style="padding: 0px 20px 0px 16px;">
              <table width="100%"> <tr>
                <td width="33.3%"> <table width="auto"> <tr>
                  <td width="auto">
                    <a href="#"> <img src="<?=base_url()?>img/disponible.png" /> </a>
                  </td>
                  <td width="auto" style="vertical-align: middle;">
                    <p id="texto_chat">
                      Selecciona los productos de tu interés y da clic en "Chat" para chatear con el proveedor. </p>
                  </td>
                </tr> </table> </td>
                <td width="33.3%"> <table width="auto"> <tr>
                  <td width="auto">
                    <a href="#" class="contactar"> 
                      <img src="<?=base_url()?>img/contactar.png" /> 
                    </a>
                  </td>
                  <td width="auto" style="vertical-align: middle;">
                    <p id="texto_chat">Selecciona los productos de tu interés y da clic en "Contactar"</p>
                  </td> 
                </tr> </table> </td>
                <td width="33.3%"> <center>
                  <table width="auto"> <tr>
                    <td width="auto" style="padding-right: 3px;"> 
                      <div id="aviso_add" ></div> <!-- Aqui apareceran el mensaje de afirmacion al añadir el contacto -->
                     <!--<a href="#" class="add" > <img src="<?=base_url()?>img/addproveedor.png" /> </a> 
                   </td>
                    <td width="auto"> <a href="#"> <img src="<?=base_url()?>img/call_2.png" /> </a> </td>
                  </tr> </table>
                </center> </td>
              </tr> </table>
            </div>
            <div style="padding-top: 22px;"> </div> -->
            
            <div>
              <!-- productos / iconos y paginacion / paginacion -->
              <table width="100%" style="height: 639px; max-height: 1196px;"> <tr> <td>
                <div style="padding: 10px 10px 10px 10px; height: auto;">
                  <div id="Searchresult" style="height: auto;">
                    El contenido especificado no se ha inicializado. 
                  </div>
                </div>
              </td> </tr> </table>

              <!-- productos / iconos y paginacion / paginacion / tres iconos (2) -->
              <div style="padding: 0px 20px 40px 16px;">
                <!-- texto y botones paracontactar proveedor y chat -->
                <div style="background:white; width: 100%; height: 122px; margin-left: 8px;">
                   <!-- texto -->
                  <div style="background:white; height:auto; width:auto; "> 
                    <p style="font-size: 17px; text-align: center;">Seleccione uno o varios productos y de click en "Contactar Proveedor" o "Chatear Ahora".</p>
                  </div>
                  <div style="margin-left: 280px; margin-top: 17px;">
                     <input type="image" name="boton"   src="<?=base_url()?>img/contac.png" />
                     <input type="image" name="boton"   src="<?=base_url()?>img/cha.png" />
                  </div>
                </div>
              </div>

              <!-- productos / iconos y paginacion / paginacion / contenedor de paginas -->
              <div style="background: #e9e9e9; text-align: center; font-family: Arial; width: 978px;">
                  <center><div id="Pagination" style="padding: 0em 3em; margin: 1em 18%;"> </div></center>  
              </div>
            </div>
          </div>

          <!-- publicidad -->
          <div class="grid_2 alpha" style="margin-top: 14px; height: 122px; width: 975px; border: 2px solid #DDD;">
            <center style="line-height: 122px;"> <a href="#"> <img src="<?=base_url()?>img/publicidad3.png"/> </a> </center>
          </div>
        </div>

        
        <!-- footer -->
        <div class="grid_2 alpha" id="foo">
                    <iframe src="<?=base_url()?>footer" scrolling="no" style="height: 353px; width: 100%; margin-left: 0px;"></iframe></div>   
                </div>   
      </section> </article>
    </div>
    </body>
</html>