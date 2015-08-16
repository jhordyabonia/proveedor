<!DOCTYPE html>
<html lang = "es">
    <head>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
    <meta charset="UTF-8">
    <title>Proveedor.com.co / Contacto - Empresa </title>
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
      width: 100%;
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
      width: 100%;
      text-align: center;
      background: rgb(255, 255, 255);
    }
    /* titulo / titulo (texto) */
    #titulo_empresa {
      margin-top: 0px;
      color: rgb(0, 0, 0);
      font-size: 33px;
      font-family: Arial;
      margin-left: 27px;
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
    /* separador antes de contenido general */
    #linea {
      margin-top: 18px;
      background: #f0f0f0;
      height: 0.5px;
      width: 124%;
      margin-left: -220px;
    }
    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* contenedor central */
    #contenedor1{
      background: #ffffff;
      margin-top: 0px;
      height:auto;
      width: 700px;
      margin-left: 303px;
    }
    /* contenedor central / telefono de contacto */
    #tabla1_tel{
      width: 226px;
      height: 145px;
      background: #f5f5f5;
      margin-top: 40px;
      margin-left: 0px;
    }
    #titulo_tel{
      font-family: arial;
      font-size: 15px;
      color: black;
      text-align: center;
      line-height: 145px;
    }
    #tabla1_tel1{
      width: 444px;
      height: 140px;
      background: white;
      margin-top: 40px;
      margin-left: -3px;
      border: 3px solid #f3f3f4;
    }
    /* contenedor central / ubicacion */
    #tabla2_ubicacion{
      width: 226px;
      height: 89px;
      background: #f5f5f5;
      margin-top: 8px;
      margin-left: 0px;
    }
    #titulo_ubicacion{
      font-family:arial;
      font-size: 15px;
      color:#fc7f27;
      text-align:center;
      line-height: 89px;
    }
    #tabla2_ubicacion2{
      width: 444px;
      height: 83px;
      background: white;
      margin-top: 8px;
      margin-left: -3px;
      border: 3px solid #f3f3f4;
    }
    /* contenedor central / pagina web */
    #tabla3_web{
      width: 226px;
      height: 89px;
      background: #f5f5f5;
      margin-top: 8px;
      margin-left: 0px;
    }
    #titulo_web{
      font-family:arial;
      font-size: 15px;
      color:#00a2e8;
      text-align: center;
      line-height: 89px;
    }
    #tabla3_web3{
      width: 444px;
      height: 83px;
      background: white;
      margin-top: 8px;
      margin-left: -3px;
      border: 3px solid #f3f3f4;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* contenedor central / 4 botones de comunicacion */
    #contenedor2 {
      background: #ffffff;
      margin-top: 35px;
      height: auto;
      width: 195px;
      margin-left: 37px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* publicidad */
    #publicidad{
      background: white;
      height: 117px;
      width: 817px;
      margin-left: 187px;
      margin-top: 130px;
      border: 3px solid #f3f3f4;
      text-align: center;
      line-height: 123px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* footer */
    #footer {
      background: #f2f2f2;
      margin-top: 45px;
      height: 388px;
      width: 1359px;
      margin-left: -40px;
      margin-bottom: -22px;
    }



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
        #div2{
        height: auto;
        width: 1237px;
        margin-left: 18px;
        margin-right: 100px;
        background: #ffffff;
       }
       #div3{
         height:900px;
         width: 1830px;
       }
       
       
      

      
       #foto{
        margin-top: 79px;
        height: 156px;
        width: 163px;
        background: #ffffff;
        margin-left:44px;
       }

       #titulo1{
        margin-top: 26px;
        color: rgb(0, 0, 0);
        font-size: 23px;
        font-family: arial;
       }
        #cuerpo{
        margin-top: 1px;
        color: #958791;
        font-size: 20px;
        font-family: arial;
        margin-left: 100px;
       }
        #cuerpo1{
        margin-top: 33px;
        color: #958791;
        font-size: 18px;
        font-family: arial;
        margin-left: 0px;
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
        margin-left: 11px;
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
         font-family: arial;
         margin-left: 53px;
       }
       #espacio_busqueda{
         width: 371px;
         height: 30px;
         background: #00a2e8;
         margin-left: 3px;
         margin-top: 3px;
       }
      #espacio_boton_busqueda{
         width: 58px;
         height: 30px;
         background:#00a2e8;
         margin-left: 377px;
         margin-top: -28px;
       }
       
       


        
        #tabla3_web_cuerpo{
        width: 453px;
        height: 95px;
        background: #ffffff;
        margin-top: 2px;
        margin-left: 2px;
       }
       
       
       
       #cu{
         font-family: arial;
         font-size: 19px;
         color: black;
         margin-left: 48px;
         margin-top: 41px;
       }
       #cu1{
        font-family: arial;
        font-size: 19px;
        color: black;
        margin-left: 48px;
        margin-top: -12px;
       }
       #p{
        text-align: center;
        font-size: 17px;
        font-family: arial;
        margin-left: 0px;
        margin-top: -20px;
       }
        #p1{
        text-align: center;
        font-size: 17px;
        font-family: arial;
        margin-left: -43px;
        margin-top: -21px;
       }

        #p2{
         text-align: left;
         font-size: 17px;
         font-family: arial;
         margin-left: 45px;
         margin-top: 21px;
       }
       #p3{
        text-align: left;
        font-size: 17px;
        font-family: arial;
        margin-left: 45px;
        margin-top: -10px;
       }
       #p4{
       text-align: center;
       font-size: 17px;
       font-family: arial;
       margin-left: -7px;
       margin-top: 36px;
       color: #00a2e8;
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
            margin-top: 136px; 
            height:393px;
            width: 1344px;
            margin-left: -36px; 
            background:#f2f2f2;
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
      margin-top: 20px;
      background: #FFFFFF;
      width: 100%;
      margin-left: 300px;
      margin-right: 100px;
      height: auto;
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
      width: 100%;
      text-align: center;
      background: rgb(255, 255, 255);
    }
    /* titulo / titulo (texto) */
    #titulo_empresa {
      margin-top: 0px;
      color: rgb(0, 0, 0);
      font-size: 33px;
      font-family: Arial;
      margin-left: 27px;
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
    /* separador antes de contenido general */
    #linea {
      margin-top: 18px;
      background: rgb(167, 167, 167);
      height: 2px;
      width: 978px;
      margin-left: 212px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* contenedor central */
    #contenedor1{
      background: #ffffff;
      margin-top: 0px;
      height:auto;
      width: 700px;
      margin-left: 303px;
    }
    /* contenedor central / telefono de contacto */
    #tabla1_tel{
      width: 226px;
      height: 145px;
      background: #f5f5f5;
      margin-top: 40px;
      margin-left: 0px;
    }
    #titulo_tel{
      font-family: arial;
      font-size: 15px;
      color: black;
      text-align: center;
      line-height: 145px;
    }
    #tabla1_tel1{
      width: 444px;
      height: 140px;
      background: white;
      margin-top: 40px;
      margin-left: -3px;
      border: 3px solid #f3f3f4;
    }
    /* contenedor central / ubicacion */
    #tabla2_ubicacion{
      width: 226px;
      height: 89px;
      background: #f5f5f5;
      margin-top: 8px;
      margin-left: 0px;
    }
    #titulo_ubicacion{
      font-family:arial;
      font-size: 15px;
      color:#fc7f27;
      text-align:center;
      line-height: 89px;
    }
    #tabla2_ubicacion2{
      width: 444px;
      height: 83px;
      background: white;
      margin-top: 8px;
      margin-left: -3px;
      border: 3px solid #f3f3f4;
    }
    /* contenedor central / pagina web */
    #tabla3_web{
      width: 226px;
      height: 89px;
      background: #f5f5f5;
      margin-top: 8px;
      margin-left: 0px;
    }
    #titulo_web{
      font-family:arial;
      font-size: 15px;
      color:#00a2e8;
      text-align: center;
      line-height: 89px;
    }
    #tabla3_web3{
      width: 444px;
      height: 83px;
      background: white;
      margin-top: 8px;
      margin-left: -3px;
      border: 3px solid #f3f3f4;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* contenedor central / 4 botones de comunicacion */
    #contenedor2 {
      background: #ffffff;
      margin-top: 35px;
      height: auto;
      width: 195px;
      margin-left: 37px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* publicidad */
    #publicidad{
      background: white;
      height: 117px;
      width: 817px;
      margin-left: 187px;
      margin-top: 130px;
      border: 3px solid #f3f3f4;
      text-align: center;
      line-height: 123px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* footer */
    #footer {
      background: #f2f2f2;
      margin-top: 45px;
      height: 388px;
      width: 1359px;
      margin-left: -40px;
      margin-bottom: -22px;
    }




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
        #div2{
        height: auto;
        width: 1237px;
        margin-left: 18px;
        margin-right: 100px;
        background: #ffffff;
       }
       #div3{
         height:900px;
         width: 1830px;
       }
       
       
      

      
       #foto{
        margin-top: 79px;
        height: 156px;
        width: 163px;
        background: #ffffff;
        margin-left:44px;
       }

       #titulo1{
        margin-top: 26px;
        color: rgb(0, 0, 0);
        font-size: 23px;
        font-family: arial;
       }
        #cuerpo{
        margin-top: 1px;
        color: #958791;
        font-size: 20px;
        font-family: arial;
        margin-left: 100px;
       }
        #cuerpo1{
        margin-top: 33px;
        color: #958791;
        font-size: 18px;
        font-family: arial;
        margin-left: 0px;
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
        margin-left: 11px;
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
         font-family: arial;
         margin-left: 53px;
       }
       #espacio_busqueda{
         width: 371px;
         height: 30px;
         background: #00a2e8;
         margin-left: 3px;
         margin-top: 3px;
       }
      #espacio_boton_busqueda{
         width: 58px;
         height: 30px;
         background:#00a2e8;
         margin-left: 377px;
         margin-top: -28px;
       }
       
       


        
        #tabla3_web_cuerpo{
        width: 453px;
        height: 95px;
        background: #ffffff;
        margin-top: 2px;
        margin-left: 2px;
       }
       
       
       
       #cu{
         font-family: arial;
         font-size: 19px;
         color: black;
         margin-left: 48px;
         margin-top: 41px;
       }
       #cu1{
        font-family: arial;
        font-size: 19px;
        color: black;
        margin-left: 48px;
        margin-top: -12px;
       }
       #p{
        text-align: center;
        font-size: 17px;
        font-family: arial;
        margin-left: 0px;
        margin-top: -20px;
       }
        #p1{
        text-align: center;
        font-size: 17px;
        font-family: arial;
        margin-left: -43px;
        margin-top: -21px;
       }

        #p2{
         text-align: left;
         font-size: 17px;
         font-family: arial;
         margin-left: 45px;
         margin-top: 21px;
       }
       #p3{
        text-align: left;
        font-size: 17px;
        font-family: arial;
        margin-left: 45px;
        margin-top: -10px;
       }
       #p4{
       text-align: center;
       font-size: 17px;
       font-family: arial;
       margin-left: -7px;
       margin-top: 36px;
       color: #00a2e8;
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
            margin-top: 136px; 
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
      margin-top: 20px;
      background: #FFFFFF;
      width: 100%;
      margin-left: 230px;
      margin-right: 100px;
      height: auto;
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
      width: 100%;
      text-align: center;
      background: rgb(255, 255, 255);
    }
    /* titulo / titulo (texto) */
    #titulo_empresa {
      margin-top: 0px;
      color: rgb(0, 0, 0);
      font-size: 33px;
      font-family: Arial;
      margin-left: 27px;
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
    /* separador antes de contenido general */
    #linea {
      margin-top: 18px;
      background: rgb(167, 167, 167);
      height: 2px;
      width: 978px;
      margin-left: 212px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* contenedor central */
    #contenedor1{
      background: #ffffff;
      margin-top: 0px;
      height:auto;
      width: 700px;
      margin-left: 303px;
    }
    /* contenedor central / telefono de contacto */
    #tabla1_tel{
      width: 226px;
      height: 145px;
      background: #f5f5f5;
      margin-top: 40px;
      margin-left: 0px;
    }
    #titulo_tel{
      font-family: arial;
      font-size: 15px;
      color: black;
      text-align: center;
      line-height: 145px;
    }
    #tabla1_tel1{
      width: 444px;
      height: 140px;
      background: white;
      margin-top: 40px;
      margin-left: -3px;
      border: 3px solid #f3f3f4;
    }
    /* contenedor central / ubicacion */
    #tabla2_ubicacion{
      width: 226px;
      height: 89px;
      background: #f5f5f5;
      margin-top: 8px;
      margin-left: 0px;
    }
    #titulo_ubicacion{
      font-family:arial;
      font-size: 15px;
      color:#fc7f27;
      text-align:center;
      line-height: 89px;
    }
    #tabla2_ubicacion2{
      width: 444px;
      height: 83px;
      background: white;
      margin-top: 8px;
      margin-left: -3px;
      border: 3px solid #f3f3f4;
    }
    /* contenedor central / pagina web */
    #tabla3_web{
      width: 226px;
      height: 89px;
      background: #f5f5f5;
      margin-top: 8px;
      margin-left: 0px;
    }
    #titulo_web{
      font-family:arial;
      font-size: 15px;
      color:#00a2e8;
      text-align: center;
      line-height: 89px;
    }
    #tabla3_web3{
      width: 444px;
      height: 83px;
      background: white;
      margin-top: 8px;
      margin-left: -3px;
      border: 3px solid #f3f3f4;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* contenedor central / 4 botones de comunicacion */
    #contenedor2 {
      background: #ffffff;
      margin-top: 35px;
      height: auto;
      width: 195px;
      margin-left: 37px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* publicidad */
    #publicidad{
      background: white;
      height: 117px;
      width: 817px;
      margin-left: 187px;
      margin-top: 130px;
      border: 3px solid #f3f3f4;
      text-align: center;
      line-height: 123px;
    }

    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* footer */
    #footer {
      background: #f2f2f2;
      margin-top: 45px;
      height: 388px;
      width: 1359px;
      margin-left: -40px;
      margin-bottom: -22px;
    }










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
        #div2{
        height: auto;
        width: 1237px;
        margin-left: -185px;
        margin-right: 100px;
        background: #ffffff;
       }
       #div3{
         height:900px;
         width: 1830px;
       }
       
       
      

      
       #foto{
        margin-top: 79px;
        height: 156px;
        width: 163px;
        background: #ffffff;
        margin-left:44px;
       }

       #titulo1{
        margin-top: 26px;
        color: rgb(0, 0, 0);
        font-size: 23px;
        font-family: arial;
       }
        #cuerpo{
        margin-top: 1px;
        color: #958791;
        font-size: 20px;
        font-family: arial;
        margin-left: 100px;
       }
        #cuerpo1{
        margin-top: 33px;
        color: #958791;
        font-size: 18px;
        font-family: arial;
        margin-left: 0px;
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
        margin-left: 11px;
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
         font-family: arial;
         margin-left: 53px;
       }
       #espacio_busqueda{
         width: 371px;
         height: 30px;
         background: #00a2e8;
         margin-left: 3px;
         margin-top: 3px;
       }
      #espacio_boton_busqueda{
         width: 58px;
         height: 30px;
         background:#00a2e8;
         margin-left: 377px;
         margin-top: -28px;
       }
       
       


        
        #tabla3_web_cuerpo{
        width: 453px;
        height: 95px;
        background: #ffffff;
        margin-top: 2px;
        margin-left: 2px;
       }
       
       
       
       #cu{
         font-family: arial;
         font-size: 19px;
         color: black;
         margin-left: 48px;
         margin-top: 41px;
       }
       #cu1{
        font-family: arial;
        font-size: 19px;
        color: black;
        margin-left: 48px;
        margin-top: -12px;
       }
       #p{
        text-align: center;
        font-size: 17px;
        font-family: arial;
        margin-left: 0px;
        margin-top: -20px;
       }
        #p1{
        text-align: center;
        font-size: 17px;
        font-family: arial;
        margin-left: -43px;
        margin-top: -21px;
       }

        #p2{
         text-align: left;
         font-size: 17px;
         font-family: arial;
         margin-left: 45px;
         margin-top: 21px;
       }
       #p3{
        text-align: left;
        font-size: 17px;
        font-family: arial;
        margin-left: 45px;
        margin-top: -10px;
       }
       #p4{
       text-align: center;
       font-size: 17px;
       font-family: arial;
       margin-left: -7px;
       margin-top: 36px;
       color: #00a2e8;

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
              margin-top: 136px;
              height: 393px;
              width: 1024px;
              margin-right: -12px;
              margin-left: 170px;
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


        <?php
              //En estas variables se guarda el id de usuario del proveedor y el nit, son capturados de la url
                $seg3 = $this->uri->segment(3);
                $id = $id_usuario->id_user;
          ?>
      <!-- pestañas -->
      <div class="grid_1" id="hi"> 
        <div style="width: 100%; height: 32px; background-color: #f0f0f0;"> 
          <div style="padding-left: 136px; padding-right: 0px; float: left; width: auto; height: 32px;"> 
            <table width="auto" style="border-spacing: 0px; height: 32px;"> <tr>
              <!-- pestañas / 1. catalogo -->
              <td style="vertical-align: middle; background-size: cover; overflow: hidden; color: #000000; font-weight: bold; width: 94px; text-align: center;"> 
                <div style="vertical-align: middle; height: auto; width: auto;"> 
                <a href="<?=base_url()?>perfil/ver_empresa/<?=$id?>/<?=$seg3?>" style="text-decoration: none;" id="letra_boton1" >
                 Catálogo </a>
                </div>
              </td>
              <!-- pestañas / 2. perfil empresa -->
              <td style="vertical-align: middle; color: #000000; font-weight: bold; width: 152px; text-align: center;"> 
                <a href="<?=base_url()?>perfil/perfil_empresa/<?=$id?>/<?=$seg3?>"  style="text-decoration: none;" id="letra_boton">
                 Perfil Empresa </a>
              </td>
              <!-- pestañas / 3. contacto -->
              <td class="tab_activa" style="vertical-align: middle; color: white; font-weight: bold; width: 113px; text-align: center;"> 
                <a href="<?=base_url()?>perfil/contacto_empresa/<?=$seg3?>"  style="text-decoration: none;" id="letra_boton"> Contacto </a>
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
          <!-- separador antes de contenido general -->
          <div class="grid_2" id="linea"></div>
            <!-- contenedor central -->
            <div class="grid_2" id="contenedor1">
              <div style="margin-left: 128px; margin-top: 24px;">
                    <input type="image" name="boton"   src="<?=base_url()?>img/contac.png" />
                    <input type="image" name="boton"   src="<?=base_url()?>img/cha.png" />
                </div>
              <!-- contenedor central / telefono de contacto -->
              <div class="grid_2" id="tabla1_tel"> <h1 id="titulo_tel">Teléfonos de Contacto</h1> </div>
                <div class="grid_2" id="tabla1_tel1">
                <table style="width: 70%; height: auto; margin-left: 50px; margin-top: 50px; font-size: 15px;">
                  <tr>
                    <td style="font-weight: bold; padding-bottom: 9px;"> Celular: </td>
                    <td> <?=  $contacto2->celular; ?> </td>
                  </tr>
                  <tr>
                    <td style="font-weight: bold;"> Oficina: </td>
                    <td> <?=  $contacto2->numero; ?> </td>
                  </tr>
                </table>
                </div>

                <!-- contenedor central / ubicacion -->
              <div class="grid_2" id="tabla2_ubicacion"> <h1 id="titulo_ubicacion" style="color: #000000;">Ubicación</h1> </div>
              <div class="grid_2" id="tabla2_ubicacion2">
                <table style="width: 70%; height: auto; margin-left: 50px; margin-top: 20px; font-size: 15px;">
                  <tr> <td style="padding-bottom: 9px;"> <?=  $contacto->ciudad; ?> - <?=  $contacto->departamento; ?> </td> </tr>
                  <tr> <td> <?=  $contacto->direccion; ?> </td> </tr>
                </table>
              </div>
              
              <!-- contenedor central / pagina web -->
              <div class="grid_2" id="tabla3_web"> <h1 id="titulo_web" style="color: #000000;">Página Web</h1> </div>
              <div class="grid_2" id="tabla3_web3">
                <p style="font-size: 15px; font-weight: bold; text-align: center; line-height: 89px;"> 
                  <a href="#" style="text-decoration: none; color: #00a2e8;" > 
                    <?=  $contacto->web; ?> 
                  </a> 
                </p>
              </div>
            </div>
 
            <!-- contenedor central / 4 botones de comunicacion -->
           <!-- <div class="grid_2 " id="contenedor2">
              <table>
                <tr>
                  <td style="padding-bottom: 10px; text-align: center;"> 
                    <p style="color: #00a2e8; font-size: 15px; font-weight: bold;"> Contactar al Proveedor 
                    </p> 
                  </td>
                </tr>
                <tr>
                  <td>
                    <table style="width: 200px; height: 194px; border-collapse: separate; border-spacing: 3px;">
                      <tr>
                        <td> <a href="#"> <img src="<?=base_url()?>img/disponible.png" /> </a> </td>
                        <td> <a href="#"> <img src="<?=base_url()?>img/contactar.png" /> </a> </td>
                      </tr>
                      <tr>
                        <td> <a href="#"> <img src="<?=base_url()?>img/addproveedor.png" /> </a> </td>
                        <td> <a href="#"> <img src="<?=base_url()?>img/call_2.png" /> </a> </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>   
            </div>-->

            <!-- publicidad -->
            <div class="grid_2 " id="publicidad" >
              <a href="#"><img src="<?=base_url()?>img/publicidad3.png"/></a>      
            </div>

            <!-- footer -->
            <div class="grid_2 alpha" id="foo">
                <iframe src="<?=base_url()?>footer" scrolling="no" style="height: 353px; width: 100%; margin-left: 0px;"></iframe>
            </div>
                        </div>  
        </div>
      </article> </section>  
    </div>
  </body>
</html>
