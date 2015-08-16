<!DOCTYPE html>
<html lang = "es">
  <head>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
      <meta charset="UTF-8">
      <title>Proveedor.com.co / Tablero de Usuario - Enviar Mensaje </title>
      <link rel="stylesheet" href="<?=base_url()?>css/960.css">
      <link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
      <link rel="stylesheet" href="<?=base_url()?>css/reset.css">
       <link rel="stylesheet" href="<?=base_url()?>css/estilosheader.css">
  </head>
   <style type="text/css">
        .container_12{
            background:#ffffff;
           height:auto;
            width: 1336px;
            max-width: 1299px;
            margin-top: 30px;
            margin-left: center;
            margin-right: center;
          }
           #he{
               width: 1015px;
              max-width: 1054px;
          }
          .grid_1{
            background: #ffffff;
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
             height:auto;
             width:1000px;
          }
          #div3{
             height:900px;
             width: 1830px;
          }
          #titulo{
            margin-top:0px;
            color:#07a9ea;
            font-size: 18px;
            font-family: Arial;
          }
          #letras{
            color:black;
            font-size:16px;
            font-family: Arial;
            margin-left: 0px;
          }
             #enviar{
             border: 0px #636369 solid;
             color: #FFFFFF;
             background-color: #FFB800;
             margin-top: 0px;
             margin-left: 0px;
             height: 51px;
             width: 137px;
             max-width: 137px;
             font-size:17px;
          }
  </style>
  <body>
    <div class="container_12">
      <header class="grid_1" style="padding-left: 10px; margin: 0px -13px 0px 4px; display: block; float: left;">
        <a href="<?=base_url()?>index"> <img src="<?=base_url()?>img/logo3.png" style="float: left;" /></a>
      </header> 
      <header class="grid_1" id="he" style="float: left; width: 1024px; padding-left: 0px; max-width: 1054px; display: block;">
        <table width="auto" height="auto" style="border-spacing: 0px;"> <tr> <td>
          <div style="padding: 4px 0px 4px 0px;"> <table style="border-spacing: 0px;"> <tr>
            <td class="header_iconos"> <a href="<?=base_url()?>tablero_usuario"> Inicio </a> </td>
            <!-- separador -->
            <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
            </td>
            <!-- separador -->
            <td class="header_iconos"> <a href="<?= base_url()?>mensajes_usuario"> Mensajes </a> </td>
            <!-- separador -->
            <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
            </td>
            <!-- separador -->
            <td class="header_iconos activo"> <a href="<?= base_url()?>contactos"> Contactos </a> </td>
            <!-- separador -->
            <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
            </td>
            <!-- separador -->
            <td class="header_iconos"> <a href="<?=base_url()?>publicar_producto"> Productos </a> </td>
            <!-- separador -->
            <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
            </td>
            <!-- separador -->
            <td class="header_iconos"> <a href="<?=base_url()?>publicar_oferta"> Busco/Compro </a>  </td>
            <!-- separador -->
            <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
            </td>
            <!-- separador -->
            <td class="header_iconos" style="width: 327px;">
              <table width="100%" style="height: 50px; background-color: #f1f1f1; border-spacing: 0px;"> <tr>
                <td style="padding-top: 15px; padding-left: 70px; width: 50px;"> <img src="<?=base_url()?>img/logouser.png" /> </td>
                <td style="padding-top: 15px; width: 100px;"> 
                  <p id="usuactual" style="font-size: 18px;"> <a href="#" style="color: #ff7f27;"> <?=$this->session->userdata('usuario');?> </a> </p> 
                </td>
                <td style="padding-top: 17px;"> <p style="font-size: 13px;"> > </p> </td>
              </tr> </table>
            </td>
          </tr> </table> </div>
        </td> </tr> </table>
      </header> 

             <div class="clear"></div>
              <article>
                <section>
                   <div class="grid_4" id="div1">
                           <div class="grid_2 alpha" style="margin-top: 30px; height:410px; background:#ffffff;">
                            <center><a href="#"><img src="<?=base_url()?>img/add_contacto_2.png" /></a> </center>
                           </div>
                    </div>
                    <div class="grid_4" id="div2">
                       <div class="grid_2 alpha" style="margin-top: 30px; height:800px; background:#ffffff;"> 
                        <!-- Formulario para enviar mensaje al proveedor -->
                        <?=form_open_multipart('contactar_usuario/enviar/'.$usuario.'/'.$logo) ?>
                         <h1 id="titulo">Enviar Mensaje</h1>
                         <div class="grid_2 alpha" style="margin-top: 10px; height:150px; background:#fafafa;"> 
                          <!-- Mensaje de validacion para el formulario de mensaje -->
                            <?php if($this->session->flashdata('validacion_correcta'))  { ?>
                                <p><?=$this->session->flashdata('validacion_correcta')?></p>
                                <?php   }elseif ($this->session->flashdata('validacion_incorrecta')) {?>
                                  <p><?=$this->session->flashdata('validacion_incorrecta')?></p>
                               <?php }  ?>
                            <div class="grid_2" style="margin-top: 10px; height:50px; background:red; width:93px; margin-left:220px; background:#fafafa;"> 
                             <h1 id="letras"><font color="red">*</font>From:</h1> </div>
                            <div class="grid_2" style="margin-top: 5px; height: auto; background:transparent; width:405px; margin-left:-13px; padding-bottom: 23px;">
                              <input type="text" name="from" placeholder="Enter Email" style="width: 393px; max-width:393px; height: 25px; margin-left:4px; margin-top:3px; border: 2px solid #ddd;"/>
                            </div>

                            <br>
                            <div class="grid_2" style="margin-top: 10px; height:50px; background:red; width:93px; margin-left:220px; background:#fafafa;">
                              <h1 id="letras">To:</h1></div>
                            <div class="grid_2" style="margin-top: 10px; height:50px; background:transparent; width:365px; margin-left:-13px;"><span>
                              <input type="text" style="width: 166px; max-width:165px; height: 48px; margin-left:0px; margin-top:0px; border:0px" value="<?=$usuario?>" />
                              <img src="<?=base_url()?>uploads/logos/<?=$logo?>" width="55px" height="50px"></span></div>
                            <div class="grid_2" style="margin-top: 10px; height:50px; background:red; width:160px; background:#fafafa;"></div>
                        </div>

                         <div class="grid_2 alpha" style="height:400px; background:#ffffff;"> 
                            <div class="grid_2" style="margin-top: 10px; height:50px; background:red; width:100px; margin-left:73px; background:#ffffff;">
                              <h1 id="letras"> <font color="red">*</font> Subject:</h1></div>
                            <div class="grid_2" style="margin-top: 0px; height: auto; width:618px; background: transparent; padding-bottom: 29px;">
                              <input type="text" name="asunto" style="border: 2px solid #ddd; width: 606px; max-width:606px; height: 25px; margin-left:4px; margin-top:3px;"></div>
                            <br>
                            <div class="grid_2" style="margin-top: 10px; height:50px; background:red; width:100px; margin-left:73px; background:#ffffff;">
                              <h1 id="letras"> <font color="red">*</font> Message:</h1></div>
                            <div class="grid_2" style="margin-top: 10px; height:228px; width:618px; background: transparent;">
                              <textarea name="mensaje" style="border: 2px solid #ddd; width:603px; max-width:603px; height:214px; margin-top:4px; margin-left:4px; resize: none; "></textarea></div>
                            <br>
                            <div class="grid_2" style="margin-top: 10px; height:50px; background:red; width:100px; margin-left:197px;">
                                <input type="submit" value="Enviar" id="enviar" style="cursor: pointer;"> 
                            </div>
                         </div>
                         <?= form_close() ?>  <!--  cierra  el formulario -->
                       </div>
                    </div>
                    <div class="grid_2 alpha" style="margin-top: 23px; height:393px; width: 1336px; margin-left: -18px; background:#f2f2f2;">
                    <iframe src="<?=base_url()?>footer" scrolling="no" style="height: 353px; width: 100%; margin-left: 0px;"></iframe></div>   
                   </div>
                </section>
              </article>

       </div>
     </body>
  </html>
