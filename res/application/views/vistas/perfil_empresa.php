<!DOCTYPE html>
<html lang = "es">
    <head>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
    <meta charset="UTF-8">
    <title>Proveedor.com.co / Perfil Empresa </title>
    <link rel="stylesheet" href="<?=base_url()?>css/960.css">
    <link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
    <link rel="stylesheet" href="<?=base_url()?>css/reset.css">
    </head>
  <style type="text/css">
    html, body {
      font-family: Arial;
      /* desaparece scroll horizontal en IE y otros */
      overflow-x: hidden;
      overflow-y: auto;
    }

    .container_12{
      background:#ffffff;
      height:auto;
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
      /* margin-left: 300px; */
      margin-right: 100px;
      height: 45px;
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
    /* contenido */
    #div2 {
      height: auto;
      width: 1046px;
      margin-left: 129px;
      background: #ffffff;
    }
    /* contenido / linea separadora */
    #linea {
      margin-top: 18px;
      background: #f0f0f0;
      height: 0.5px;
      width: 124%;
      margin-left: -220px;
    }
    /* titulos de cada categoria */
    #titulo1 {
      margin-top: 5px;
      color: rgb(0, 0, 0);
      font-size: 15px;
      font-family: arial;
    }
    /* contenido / contenido (div) */
    #contenedor1{
      background: #ffffff;
      margin-top: 0px;
      height: auto;
      width: 642px;
    }
    /* contenido / contenido / titulo "acerca de" */
    #Titulo_acerca {
      margin-top: 24px;
      height: auto;
      background: #ffffff;
      width: 426px;
      max-width: 426px;
    }
    /* contenido / contenido / descripcion de la empresa */
    #descrion_emp{
      margin-top: 10px;
      height:auto;
      background:#ffffff;
      width: 100%;
    }
    #cuerpo{
      /* comprende todo el contenido texto de todas las */
      /* descripciones excepto la de ubicacion */
      margin-top: 0px;
      color: gray;
      font-size: 15px;
      font-family: arial;
    }
    /* contenido / contenido / ubicacion de la empresa */
    #titulo_ubicacion{
      margin-top: 40px; 
      width:109px;
      height:50px; 
      background:#ffffff;
    }
    #cuerpo_ubicacion{
      margin-top: 68px;
      width: auto;
      height: auto;
      background: #ffffff;
      margin-left: -119px;
    }
    #cuerpo1{
      margin-top: 8px;
      color: #958791;
      font-size: 15px;
      font-family: arial;
      margin-left: 0px;
    }
    /* contenido / contenido / productos principales */
    #titulo_producto{
      margin-top: 15px; 
      width:500px; 
      height: auto; 
      background:#ffffff;
    }
    #cuerpo_producto{
      margin-top: 18px;
      width: auto;
      height: auto;
      background: #ffffff;
    }
    /* contenido / contenido  / productos que le interesan a la Empresa */
    #titulo_producto2{
      margin-top:29px; 
      width:500px; 
      height: auto; 
      background:#ffffff;
    }
    #cuerpo_producto2{
      margin-top: 18px;
      width: auto;
      height: auto;
      background: #ffffff;
    }
    /* contenido / 4 imagenes de comunicacion */
    #contenedor2{
      background: #ffffff;
      margin-top: 0px;
      height: auto;
      width: auto;
      margin-left: 52px;
    }
    #foto{
      margin-top: 86px;
      height: auto;
      width: auto;
      background: #ffffff;
      margin-left: 95px;
    }
    /* contenido / publicidad */
    #publicidad {
      background: transparent;
      height: 123px;
      width: 816px;
      margin-left: 0px;
      margin-top: 97px;
      border: 3px solid #f3f3f4;
      text-align: center;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* footer */
    #footer{
      margin-top: 142px;
      height: 393px;
      width: 1344px;
      margin-left: -21px;
      background: #f2f2f2;
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
         background: red;
         height:300px;
         width: 100%;
       } 
       #div3{
         height:900px;
         width: 1830px;
       }
       #div1_logo{
        height: 49px;
        width: 205px;
        background: red;
        margin-left: 185px;
        margin-top: 7px;
       }
       #div2_ingresar{
        height: 25px;
        width: 82px;
        background: red;
        margin-left: 32px;
        margin-top: 24px;
       }
        #div2_registro{
         height: 26px;
         width: 121px;
         background: red;
         margin-left: -4px;
         margin-top: 23px;
       }
       #div3_buscar{
         height: 35px;
         width: 456px;
         background: #00a2e8;
         margin-left: 24px;
         margin-top: 11px;
       }
        #div4_boton1{
          height: 47px;
          width: 144px;
          background: red;
          margin-left: 15px;
          margin-top: 4px;
       }
       #div4_boton2{
        height: 47px;
        width: 144px;
        background: red;
        margin-left: 7px;
        margin-top: 5px;
       }
       #ingresar{
         margin-top: -26px;
         color: #A39B9B;
         font-size: 18px;
         font-family:  arial;
         margin-left: 53px;
       }
       #foto_logo{
              margin-left: 34px; 
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
            margin-top: 142px;
            height: 393px;
            width: 1344px;
            margin-left: -21px;
            background: #f2f2f2;
          }
  </style>


   <style>
     @media screen and (max-width: 1280px) {
              html, body {
      font-family: Arial;
      /* desaparece scroll horizontal en IE y otros */
      overflow-x: hidden;
      overflow-y: auto;
    }

    .container_12{
      background:#ffffff;
      height:auto;
      width: 1336px;
      max-width: 1299px;
      margin-top: 0px;
      margin-left: center;
      margin-right: center;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* header */
    #he {
      background: #FFFFFF;
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
      /* margin-left: 300px; */
      margin-right: 100px;
      height: 45px;
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
    /* contenido */
    #div2 {
      height: auto;
      width: 1046px;
      margin-left: 129px;
      background: #ffffff;
    }
    /* contenido / linea separadora */
    #linea {
      margin-top: 18px;
      background: #f0f0f0;
      height: 0.5px;
      width: 124%;
    }
    /* titulos de cada categoria */
    #titulo1 {
      margin-top: 5px;
      color: rgb(0, 0, 0);
      font-size: 15px;
      font-family: arial;
    }
    /* contenido / contenido (div) */
    #contenedor1{
      background: #ffffff;
      margin-top: 0px;
      height: auto;
      width: 642px;
    }
    /* contenido / contenido / titulo "acerca de" */
    #Titulo_acerca {
      margin-top: 24px;
      height: auto;
      background: #ffffff;
      width: 426px;
      max-width: 426px;
    }
    /* contenido / contenido / descripcion de la empresa */
    #descrion_emp{
      margin-top: 10px;
      height:auto;
      background:#ffffff;
      width: 100%;
    }
    #cuerpo{
      /* comprende todo el contenido texto de todas las */
      /* descripciones excepto la de ubicacion */
      margin-top: 0px;
      color: gray;
      font-size: 15px;
      font-family: arial;
    }
    /* contenido / contenido / ubicacion de la empresa */
    #titulo_ubicacion{
      margin-top: 40px; 
      width:109px;
      height:50px; 
      background:#ffffff;
    }
    #cuerpo_ubicacion{
      margin-top: 68px;
      width: auto;
      height: auto;
      background: #ffffff;
      margin-left: -119px;
    }
    #cuerpo1{
      margin-top: 8px;
      color: #958791;
      font-size: 15px;
      font-family: arial;
      margin-left: 0px;
    }
    /* contenido / contenido / productos principales */
    #titulo_producto{
      margin-top: 15px; 
      width:500px; 
      height: auto; 
      background:#ffffff;
    }
    #cuerpo_producto{
      margin-top: 18px;
      width: auto;
      height: auto;
      background: #ffffff;
    }
    /* contenido / contenido  / productos que le interesan a la Empresa */
    #titulo_producto2{
      margin-top:29px; 
      width:500px; 
      height: auto; 
      background:#ffffff;
    }
    #cuerpo_producto2{
      margin-top: 18px;
      width: auto;
      height: auto;
      background: #ffffff;
    }
    /* contenido / 4 imagenes de comunicacion */
    #contenedor2{
      background: #ffffff;
      margin-top: 0px;
      height: auto;
      width: auto;
      margin-left: 52px;
    }
    #foto{
      margin-top: 86px;
      height: auto;
      width: auto;
      background: #ffffff;
      margin-left: 95px;
    }
    /* contenido / publicidad */
    #publicidad {
      background: transparent;
      height: 123px;
      width: 816px;
      margin-left: 0px;
      margin-top: 97px;
      border: 3px solid #f3f3f4;
      text-align: center;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* footer */
    #footer{
      background:#f2f2f2;
      margin-top: 12px;
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
         background: red;
         height:300px;
         width: 100%;
       } 
       #div3{
         height:900px;
         width: 1830px;
       }
       #div1_logo{
        height: 49px;
        width: 205px;
        background: red;
        margin-left: 185px;
        margin-top: 7px;
       }
       #div2_ingresar{
        height: 25px;
        width: 82px;
        background: red;
        margin-left: 32px;
        margin-top: 24px;
       }
        #div2_registro{
         height: 26px;
         width: 121px;
         background: red;
         margin-left: -4px;
         margin-top: 23px;
       }
       #div3_buscar{
         height: 35px;
         width: 456px;
         background: #00a2e8;
         margin-left: 24px;
         margin-top: 11px;
       }
        #div4_boton1{
          height: 47px;
          width: 144px;
          background: red;
          margin-left: 15px;
          margin-top: 4px;
       }
       #div4_boton2{
        height: 47px;
        width: 144px;
        background: red;
        margin-left: 7px;
        margin-top: 5px;
       }
       #ingresar{
         margin-top: -26px;
         color: #A39B9B;
         font-size: 18px;
         font-family:  arial;
         margin-left: 53px;
       }
       #foto_logo{
              margin-left: 34px; 
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
    }
   </style>

    <style>
     @media screen and (max-width: 1024px) {
              html, body {
      font-family: Arial;
      /* desaparece scroll horizontal en IE y otros */
      overflow-x: hidden;
      overflow-y: auto;
    }

    .container_12{
      background:#ffffff;
      height:auto;
      width: 1336px;
      max-width: 1299px;
      margin-top: 0px;
      margin-left: center;
      margin-right: center;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* header */
    #he {
      background: #FFFFFF;
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
      width: 205px;
            max-width: 277px;
            height: 23px;
            background: white;
            margin-left: 0px;
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
      /* margin-left: 300px; */
      margin-right: 100px;
      height: 45px;
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
    /* contenido */
    #div2 {
      height: auto;
      width: 1046px;
      margin-left: 15px;
      background: #ffffff;
    }
    /* contenido / linea separadora */
    #linea {
      margin-top: 18px;
      background: #f0f0f0;
      height: 0.5px;
      width: 116%;
    }
    /* titulos de cada categoria */
    #titulo1 {
      margin-top: 5px;
      color: rgb(0, 0, 0);
      font-size: 15px;
      font-family: arial;
    }
    /* contenido / contenido (div) */
    #contenedor1{
      background: #ffffff;
      margin-top: 0px;
      height: auto;
      width: 642px;
    }
    /* contenido / contenido / titulo "acerca de" */
    #Titulo_acerca {
      margin-top: 24px;
      height: auto;
      background: #ffffff;
      width: 426px;
      max-width: 426px;
    }
    /* contenido / contenido / descripcion de la empresa */
    #descrion_emp{
      margin-top: 10px;
      height:auto;
      background:#ffffff;
      width: 100%;
    }
    #cuerpo{
      /* comprende todo el contenido texto de todas las */
      /* descripciones excepto la de ubicacion */
      margin-top: 0px;
      color: gray;
      font-size: 15px;
      font-family: arial;
    }
    /* contenido / contenido / ubicacion de la empresa */
    #titulo_ubicacion{
      margin-top: 40px; 
      width:109px;
      height:50px; 
      background:#ffffff;
    }
    #cuerpo_ubicacion{
      margin-top: 68px;
      width: auto;
      height: auto;
      background: #ffffff;
      margin-left: -119px;
    }
    #cuerpo1{
      margin-top: 8px;
      color: #958791;
      font-size: 15px;
      font-family: arial;
      margin-left: 0px;
    }
    /* contenido / contenido / productos principales */
    #titulo_producto{
      margin-top: 15px; 
      width:500px; 
      height: auto; 
      background:#ffffff;
    }
    #cuerpo_producto{
      margin-top: 18px;
      width: auto;
      height: auto;
      background: #ffffff;
    }
    /* contenido / contenido  / productos que le interesan a la Empresa */
    #titulo_producto2{
      margin-top:29px; 
      width:500px; 
      height: auto; 
      background:#ffffff;
    }
    #cuerpo_producto2{
      margin-top: 18px;
      width: auto;
      height: auto;
      background: #ffffff;
    }
    /* contenido / 4 imagenes de comunicacion */
    #contenedor2{
      background: #ffffff;
      margin-top: 0px;
      height: auto;
      width: auto;
      margin-left: 52px;
    }
    #foto{
      margin-top: 86px;
      height: auto;
      width: auto;
      background: #ffffff;
      margin-left: 95px;
    }
    /* contenido / publicidad */
    #publicidad {
      background: transparent;
      height: 123px;
      width: 816px;
      margin-left: 73px;
      margin-top: 97px;
      border: 3px solid #f3f3f4;
      text-align: center;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* footer */
    #footer{
      background:#f2f2f2;
      margin-top: 12px;
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
         background: red;
         height:300px;
         width: 100%;
       } 
       #div3{
         height:900px;
         width: 1830px;
       }
       #div1_logo{
        height: 49px;
        width: 205px;
        background: red;
        margin-left: 185px;
        margin-top: 7px;
       }
       #div2_ingresar{
        height: 25px;
        width: 82px;
        background: red;
        margin-left: 32px;
        margin-top: 24px;
       }
        #div2_registro{
         height: 26px;
         width: 121px;
         background: red;
         margin-left: -4px;
         margin-top: 23px;
       }
       #div3_buscar{
         height: 35px;
         width: 456px;
         background: #00a2e8;
         margin-left: 24px;
         margin-top: 11px;
       }
        #div4_boton1{
          height: 47px;
          width: 144px;
          background: red;
          margin-left: 15px;
          margin-top: 4px;
       }
       #div4_boton2{
        height: 47px;
        width: 144px;
        background: red;
        margin-left: 7px;
        margin-top: 5px;
       }
       #ingresar{
         margin-top: -26px;
         color: #A39B9B;
         font-size: 18px;
         font-family:  arial;
         margin-left: 53px;
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


       <?php   $seg4 = $this->uri->segment(4); //Se captura de la url el nit de la empresa?>

      <!-- pestañas -->
      <div class="grid_1" id="hi"> 
        <div style="width: 100%; height: 32px; background-color: #f0f0f0;"> 
          <div style="padding-left: 136px; padding-right: 0px; float: left; width: auto; height: 32px;"> 
            <table width="auto" style="border-spacing: 0px; height: 32px;"> <tr>
              <!-- pestañas / 1. catalogo -->
              <td style="vertical-align: middle; background-size: cover; overflow: hidden; color: #0065ca; font-weight: bold; width: 94px; text-align: center;"> 
                <div style="vertical-align: middle; height: auto; width: auto;"> 
                  <a href="<?=base_url()?>perfil/ver_empresa/<?=$id_contacto?>/<?=$seg4?>" style="text-decoration: none;" id="letra_boton1" > Catálogo </a>
                </div>
              </td>
              <!-- pestañas / 2. perfil empresa -->
              <td class="tab_activa" style="vertical-align: middle; color: white; font-weight: bold; width: 152px; text-align: center;"> 
                <a href="#"  style="text-decoration: none;" id="letra_boton"> Perfil Empresa </a>
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

      <section> <article>
        <div class="grid_4" id="div2">
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
          <div class="grid_2" id="linea"> </div>
          <!-- contenido -->
          <div class="grid_2 " id="contenedor1" >
                <div style="margin-left: 0px; margin-top: 24px;">
                    <input type="image" name="boton"   src="<?=base_url()?>img/contac.png" />
                    <input type="image" name="boton"   src="<?=base_url()?>img/cha.png" />
                </div>
                <!-- contenido / titulo "acerca de" -->
                <div class="grid_2" id="Titulo_acerca" >
                  <h1 id="titulo1">Acerca de nuestra Empresa:</h1>
                </div>
                <div class="grid_2 " id="descrion_emp" >
                  <p id="cuerpo" style="color: #000000;">
                    <?=  nl2br($des_empresa->descripcion); ?>
                  </p>
                </div>
                   <!-- contenido / ubicacion de la empresa -->
                    <div class="grid_2 " id="titulo_ubicacion" >
                      <h1 id="titulo1">Ubicación:</h1>
                    </div>
                    <div class="grid_2 " id="cuerpo_ubicacion" >
                      <p id="cuerpo1" style="color: #000000; font-weight: bold;">
                        <?=  $ubicacion->ciudad; ?> - <?=  $ubicacion->departamento; ?> - <?=  $ubicacion->direccion; ?> <br>
                      </p>
                    </div>
              
                    <div class="grid_2" id="linea" style="height: 1.5px; width: 167%; margin-left: 9px;"> </div>
                    <!-- contenido / productos principales -->
                        <div class="grid_2 " id="titulo_producto" >
                          <h1 id="titulo1">Productos Principales:</h1>
                        </div>
                        <div class="grid_2 " id="cuerpo_producto" >
                          <!-- Redes     Router     Software     BigData     Equipos para Redes -->
                          <table style="margin-top: 0px; color: gray; font-size: 15px; font-family: arial; margin-left: 94px; width: 100%;"> 
                           <tr>
                            <?php  foreach ($pro_prin as $registro): ?>
                              <td style="padding-right: 34px;">
                            <?php  echo ''.$registro->nombre_producto.' &nbsp;&nbsp;&nbsp;'; ?> 
                              </td>                                
                            <?php  endforeach; ?>
                            </tr> 
                          </table>
                        </div>
                        <!-- contenido / productos que le interesan a la Empresa -->
                        <div class="grid_2 " id="titulo_producto2" >
                          <h1 id="titulo1">Productos que le interesan a la Empresa:</h1>     
                        </div>
                        <div class="grid_2 " id="cuerpo_producto2" >
                          <table style="margin-top: 0px; color: gray; font-size: 15px; font-family: arial; margin-left: 94px; width: 100%;"> 
                           <tr>
                            <?php  foreach ($pro_int as $registro): ?>
                                <td style="padding-right: 34px;"> 
                              <?php  echo ''.$registro->nombre_producto.' &nbsp;&nbsp;&nbsp;'; ?>  
                                </td>                               
                              <?php  endforeach; ?>
                            </tr> 
                          </table>
                        </div>
                        <div class="grid_2" id="linea" style="height: 1.5px; width: 167%; margin-left: 9px;"> </div>
          </div>

          <!-- contenido / 4 imagenes de comunicacion -->
          <div class="grid_2 " id="contenedor2" >
             <div class="grid_2" style="margin-top: 5px; width: 433px;  margin-right: -181px; height: auto; margin-left: -8px; background: transparent;">
              <div style="padding: 11px 10px 10px 119px; font-size: 13px;"> 
                <a href="#" style="margin-left: -114px;"> <img src="<?=base_url()?>img/addproveedor.png" /> </a>
                <p style="color: #00a2e8; font-size: 19px; font-weight: bold; padding-bottom: 10px; padding-bottom: 91px; margin-top: -93px"> 
                  <?= $nom_empresa->nombre?> </p>
                <table width="100%" style=" border-collapse: separate; border-spacing: 0px; font-size: 12px; margin-top: -90px;">
                  <tr>
                    <td style="padding-right: 10px; padding-bottom: 10px;"> <img src="<?=base_url()?>img/contacto.png" /> <a href="#" style="text-decoration: initial; margin-left: 5px; font-size: 15px; color:#3a66d5;"> Información de Contacto </a></td>
                  </tr>
                  <tr> <td style="font-size: 12px; padding-bottom: 3px;"> <b> Ubicacion: </b>  </td> </tr>
                  <tr> <td style="font-size: 12px; padding-bottom: 3px;"> <b> Tipo de empresa: </b>  </td> </tr>
                  <tr> <td style="font-size: 12px; padding-bottom: 10px;"> <b> Productos de interes: </b> <div style="background:white; width: 168px; height: 30px;margin-left: 125px;margin-top: -12px;"><p>Computadoras, Adaptadores, Redes, Impresoras</p></div></td> </tr>
                  <tr> <td style="font-size: 12px; padding-bottom: 20px;"> <b>Solicitudes Publicadas: </b> </td> </tr>
                  <tr> <td style="font-size: 12px; padding-bottom: 3px;"> <b> Productos Principales: </b> <div style="background:white; width: 168px; height: 34px;margin-left: 131px;margin-top: -12px;"><p>Computadoras, Adaptadores, Redes, Impresoras</p></div></td> </tr>
                  <tr> <td style="font-size: 12px; padding-bottom: 29px;"> <b> Productos Publicados: </b> </td> </tr>
                  <tr>
                  <td style="padding-right: 10px; padding-left: 41px;"> <img src="<?=base_url()?>img/telefono.png" /> </td>
                  <td style="vertical-align: bottom;">
                    <input type="button" value="Llamar a la Empresa" id="numTel" onclick="VerOcultar_NumTel()"
                      style="background: #00a2e8; cursor: pointer; color: white; width: 169px; height: 37px; border:none; margin-left: -222px;"/> 
                  </td>
                </tr>
                <!-- Variable que contiene el telefono de la empresa traido desde la bd-->
                 <!--<?php $num_tel = $telefono->numero?>
                <script type="text/javascript">
                  function VerOcultar_NumTel() {
                    if (jQuery("#numTel").val() == "Llamar a la Empresa") {
                      jQuery("#numTel").css("font-weight", "bold");
                      jQuery("#numTel").css("font-size", "18px");
                      jQuery("#numTel").val("<?php echo $num_tel; ?>");
                    } else {
                      jQuery("#numTel").css("font-weight", "normal");
                      jQuery("#numTel").css("font-size", "13px");
                      jQuery("#numTel").val("Llamar a la Empresa");
                    }
                  }
                </script>-->
                </table>
              </div>
            </div>       
          </div>

          <!-- publicidad -->
          <div class="grid_2 " id="publicidad" >
            <a href="#" style="line-height: 125px;"> <img src="<?=base_url()?>img/publicidad3.png" /> </a>      
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
