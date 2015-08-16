<!DOCTYPE html>
<html>
<head>
	<title>Proveedor.com.co / Tablero de Usuario - Publicar producto</title>
	<meta charset='utf-8'>
	    <link rel="stylesheet" href="<?=base_url()?>css/960.css">
      <link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
      <link rel="stylesheet" href="<?=base_url()?>css/reset.css">  
      <link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" /> 
       <!-- importaciones -->
      <link rel="stylesheet" href="<?=base_url()?>css/estilosheader.css">


	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="js/buttons.js"></script>
	<script type="text/javascript" >
	 var x = 0;
  function pasarCateforia(){
  	var indice = document.forms[0].textarea1.options.selectedIndex;
  	var indice2 = document.forms[0].textarea2.options.selectedIndex;
  	document.forms[0].textarea4.value = document.forms[0].textarea1.options[indice].text+'\n'+document.forms[0].textarea2.options[indice2].text;
	  }

  function quitarCateforia(){
  	document.getElementById('textarea4').value = '';
  }  


fields = 0;
function addPalabra() {
  if (fields != 5) {
    var pal = document.getElementById("Pclave").value;
    document.getElementById('espacio').innerHTML += "<input type='text' value='"+pal+"' name='pal"+fields+"' id='pal"+fields+"' class='etiquetas' /><br />";
    fields += 1;
    document.getElementById("Pclave").value='';
  } else {
    document.getElementById('espacio').innerHTML += "<br />Solo 5 palabras por producto.";
    document.getElementById("Pclave").value='';
    document.form.add.disabled=true;
  }
}

f=0;
function quitarPalabra(){
  if(f != 5){
    var palabra = document.getElementById('pal'+f);
    palabra.parentNode.removeChild(palabra); 
    f+=1;
    fields-=1;
  } 
    
}

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#textarea1").change(function() { 
                $("#textarea1 option:selected").each(function() {
                    categoria = $('#textarea1').val();  
                    $.post("<?=base_url()?>registroproducto/llena_subcategoria", {
                        categoria : categoria
                    }, function(data) { 
                        $("#textarea2").html(data);
                    });
                });
            })
        });
    </script>


<!-- Estilos para el mensaje de confirmacion al publicar producto, el mensaje se puede editar desde el controlador -->
<style type="text/css">
  .exito {  
       color: #4F8A10;  
       background-color: #DFF2BF;  
       background-image:url('<?=base_url()?>img/Alarm-Tick-icon.png'); 
       font-family:Arial, Helvetica, sans-serif;  
       font-size:13px;  
       border: 1px solid;  
       margin: 10px 0px;  
       padding:15px 10px 15px 50px;  
       background-repeat: no-repeat;  
       background-position: 10px center;
       width: 22%; 
       position: absolute;
}
</style>

<style type="text/css">
      html, body {
        font-family: Arial;
      }
                .container_12{
                  background:#ffffff;
                  height:auto;
                  width: 1336px;
                  max-width: 1299px;
                  margin-top: 30px;
                  margin-left: center;
                  margin-right: center;
                }
                .grid_1{
                   background:#ffffff;
                   height: 50px;
                   width: 225px;
                }
                 #ha{
                   background: #ffffff;
                   height:100px;
                   width: 300px;
                }
                #he{
                    width: 1015px;
                    max-width: 1054px;
                }
                #div1{
                   height:auto;
                   width: 210px;
                }
                 #div2{
                   height:auto;
                   width: 755px;
                }
                #div3{
                   height:auto;
                   width:250px;
                }

                .grid_4{
                   background: #ffffff;
                   height:512px;
                   margin:12px 12px;
                   width: 300px;
                }

                .grid_2{
                   background: red;
                   height:170px;
                   width: 100%;
                } 

                #div4{
                  background: blue;
                  height:20px;
                } 
                h1{
                  margin-top: 20px;
                  color: rgb(0, 102, 255);
                  font-size:24px;
                  font-family: Arial;
                } 
                 h2{
                  margin-top: 20px;
                  color:blue;
                  font-size:20px;
                  font-family: Arial;
                  margin-left: -480px; 
                } 

                #titulo2{
                  margin-top: 20px;
                  color:blue;
                  font-size:20px;
                  font-family: Arial;
                  margin-left: -548px; 
                } 
                #titulo3{
                  margin-top: 10px;
                  color:blue;
                  font-size:20px;
                  font-family: Arial;
                  margin-left: -36px; 
                } 

                h7{
                  color: rgb(0, 133, 255);
                  font-size: 17px;
                  font-family: Arial;
                  margin-right:100px;
                } 
                #campo{
                  margin-left: 20px;
                  height:30px;
                  width: 300px;
                }

                #text1{
                  color:gray;
                  font-size:15px;
                  font-family: Arial;
                  margin-left: -448px;
                }

                 #parrafo6{
                  color: rgb(104, 104, 104);
                  font-size: 18px;
                  font-family: Arial;
                  margin-left: -31px;
                  margin-top:5px;
                }
                #parrafo7{
                  color: rgb(104, 104, 104);
                  font-size: 18px;
                  font-family: Arial;
                  margin-left: -290px;
                  margin-top: 2px;
                }
                
                #parrafo9{
                  color: rgb(104, 104, 104);
                  font-size: 18px;
                  font-family: Arial;
                  margin-left: -23px;
                  margin-top: 2px;
                }

                #textarea4{
                   margin-top: 3px;
                   height: 135px;
                   width: 206px;
                   max-width: 214px;
                   margin-right: 4px;
                   background: #F1EEEE;
                }

                #es9{
                   background: #ffffff;
                   margin-top: -51px;
                   margin-left: 29px;
                   height: 76px;
                   width: 712px;
                   max-width: 738px;
                }

               #espacio7{
                 background: #ffffff;
                 margin-top: 20px;
                 margin-left: 5px;
                 height: 39px;
                 width: 300px;
               }

               #espacio8{
                 background: #ffffff;
                 margin-top: 71px;
                 margin-left: -355px;
                 height: 66px;
                 width: 701px;
               }
               
                #espacio10{
                 background: #ffffff;
                 margin-top: 63px;
                 margin-left: -222px;
                 height: 38px;
                 width: 211px;
               }
               
               #espacio13{
                 background: #ffffff;
                 margin-top: 112px;
                 margin-left: -449px;
                 height: 38px;
                 width: 211px;
               }

               #espacio14{
                 background: #ffffff;
                 margin-top: 112px;
                 margin-left: -222px;
                 height: 38px;
                 width: 211px;
               }
                    
                 #eliminar{
                   border: 0px #636369 solid;
                   color: #FFFFFF;
                   background-color: #FFB800;
                   margin-top: 7px;
                   margin-left: 1px;
                   height: 60px;
                   width: 100px;
                   max-width: 100px;
                }

                  #agregar{
                    border: 0px #F9F9FF solid;
                    color: #FFFFFF;
                    background-color: #0B8AFF;
                    margin-top: 44px;
                    margin-left: 1px;
                    height: 60px;
                    width: 100px;
                    max-width: 100px;
                }

                  #eliminar1{
                   border: 0px #636369 solid;
                   color: #FFFFFF;
                   background-color: #FFB800;
                   margin-top: 0px;
                   margin-left: 7px;
                   height: 42px;
                   width: 100px;
                   max-width: 100px;
                   cursor: pointer;
                }
                
                  #agregar1{
                    border: 0px #F9F9FF solid;
                    color: #FFFFFF;
                    background-color: #0B8AFF;
                    margin-top: 0px;
                    margin-left: -12px;
                    height: 45px;
                    width: 100px;
                    max-width: 100px;
                }
                 
                
                 

                

      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
      /* nombre del producto (div primer titulo 1. Información Básica ) */
      #es1{
        background: #ffffff;
        margin-top: 0px;
        margin-left: 0px;
        height: 39px;
        width: auto;
      }
      /* nombre del producto (primer titulo 1. Información Básica ) */
      #es11{
        float: left;
        color: rgb(0, 102, 255);
        font-family:Arial;
        font-size: 18px;
        margin-top:5px;
        font-weight: bold;
      }

      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
      /* nombre del producto (div texto) */
      #es2 {
        background: #ffffff;
        height: 39px;
        width: auto;
      }
      /* nombre del producto (texto) */
      #es22{
        float: left;
        color:gray;
        font-family:Arial;
        font-size: 16px;
        margin-top:5px;
      }
      /* nombre del producto (input) */
      #es3{
        height: 30px;
        width: 328px;
        border: 1px solid #C4C2C2;
      }

      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
      /* Escoja la Categoría y Subcategoría (div texto) */
      #es4{
        background: #ffffff;
        margin-top: 20px;
        height: 39px;
        width: auto;
      }
      /* Escoja la Categoría y Subcategoría (texto) */
      #es44{
        float: left;
        color:gray;
        font-family:Arial;
        font-size: 16px;
        margin-top:5px;
      }
      /* Escoja la Categoría y Subcategoría (primer textarea/select) */
      #textarea1{
        /*margin-left: -519px;*/margin-left: 0px; float: left;
        height: 200px;
        width: 300px;
        max-width: 300px;
        border: 1px solid #ddd;
      }
      /* Escoja la Categoría y Subcategoría (segundo textarea/select) */
      #textarea2{
        /*margin-left: -802px;*/margin-left: 24px; float: left;
        height: 200px;
        width: 200px;
        max-width: 200px;
        margin-top: 0px;
        border: 1px solid #ddd;
      }
      /* Escoja la Categoría y Subcategoría (div botones agregar/eliminar) */
      #botones{
        background: #ffffff;
        /*margin-top: 0px;*/margin-top: -203px;
        margin-left: 549px;
        /*height: 206px;*/height: auto;
        width: auto;
      }

      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
      /* Descripcion del Producto (div textarea) */
      #es5{
        background:#ffffff;
        margin-top: 20px;
        height: 39px;
        width: 388px;
        max-width:388px;
      }
      /* Descripcion del Producto (texto) */
      #es55{
        float: left;
        color:gray;
        font-family:Arial;
        font-size: 16px;
        margin-top:5px;
      }
      /* Descripcion del Producto (textarea) */
      #textarea3{
        margin-left: -163px;
        height: 180px;
        width: 562px;
        max-width: 528px;
        border: 1px solid #ddd;
      }

      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
      /* Fotos del Producto (div selector de fotos) */
      #es6{
        background: #ffffff;
        margin-top: 18px;
        height: auto;
        width: auto;
      }
      /* Fotos del Producto (texto selector de fotos) */
      #es66{
        float: left;
        color:gray;
        font-family:Arial;
        font-size: 16px;
        margin-top:5px;
      }
      /* Fotos del Producto (div el que lleva el boton examinar y eliminar) */
      #botonesfoto{
        background:#ffffff;
        margin-top: -5px;
        margin-left: 269px;
        height: 39px;
        width: 223px;
      }
      /* Fotos del Producto (input-text que tiene la ruta del archivo) */
      #fotoP{
        margin-left: -268px;
        height: 30px;
        width: 230px;
        border: 1px solid #ddd;
      }

      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
      /* palabra clave (div) */
      #es7{
        background: #ffffff;
        margin-top: 20px;
        height: auto;
        width: auto;
      }
      /* palabra clave (titulo) */
      #es77{
        float: left;
        color:gray;
        font-family:Arial;
        font-size: 16px;
        margin-top:5px;
      }
      /* palabra clave (input text) */
      #Pclave{
         border:solid 1px #ddd;
         margin-left: -958px;
         height: 30px;
         width: 230px;
      }
      /* palabra clave (div botones agregar/eliminar) */
      #botonesclave{
        background: #ffffff;
        margin-top: 0px;
        margin-left: 284px;
        height: 39px;
        width: auto;
      }
      /* palabra clave (boton agregar) */
      #agregar2{
        border: 0px #F9F9FF solid;
        color: #FFFFFF;
        background-color: #B4C3CF;
        margin-top: 0px;
        margin-left: -7px;
        height: 32px;
        width: 100px;
        max-width: 100px;
      }
      /* palabra clave (boton eliminar) */
      #eliminar2{
        border: 0px #636369 solid;
        color: #FFFFFF;
        background-color: #B4C3CF;
        margin-top: 0px;
        margin-left: 2px;
        height: 32px;
        width: 100px;
        max-width: 100px;
      }
      /* palabra clave (divs verdes que contienen las palabras clave ingresadas) */
      #espacio{
        /*background: rgb(163, 255, 0);*/
        background:transparent;
        margin-top: 10px;
        height: 39px;
        width: 223px;
      }
      #espacio1{
        /*background: rgb(163, 255, 0);*/
        background:transparent;
        margin-top: 60px;
        margin-left: -234px;
        height: 39px;
        width: 224px;
      }

      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
      /* 2. negociacion / primer titulo (div con el texto titulo) ESPACIO2 ES COMUN PARA LOS DEMAS SIMILARES */
      #espacio2{
        background:#ffffff;
        height: auto;
        width: auto;
        margin-right: 29px;
      }
      #parrafo1{
        color: gray;
        font-size: 16px;
        font-family: Arial;
        margin-top:6px;
      }
      /* 2. negociacion / primer titulo (div con el input text) ESPACIO3 ES COMUN PARA LOS DEMAS SIMILARES */
      #espacio3{
        background:#ffffff;
        height: auto;
        width: auto;
      }
      #pminimo{
        border:solid 1px #A0FF24;
        margin-left: -1px;
        height: 30px;
        width: 179px;
      }
      /* 2. negociacion / primer titulo (div imagen del chulo) ESPACIO5 ES COMUN PARA LOS DEMAS SIMILARES */
      #espacio5{
        background:#ffffff;
        margin-left: 1px;
        height: auto;
        width: auto;
      }
      /* 2. negociacion / primer titulo (div con el texto de unidades) ESPACIO6 ES COMUN PARA LOS DEMAS SIMILARES */
      #espacio6{
        background:#ffffff;
        margin-left: 1px;
        height: auto;
        width: auto;
      }
      #parrafo3{
        color: gray;
        font-size: 16px;
        font-family: Arial;
        margin-top: 8px;
      }
      /* 2. negociacion / segundo titulo (textos titulo) */
      #parrafo{
        color: gray;
        font-size: 16px;
        font-family: Arial;
        margin-top:2px;
      }
      #parrafo2{
        color: gray;
        font-size: 16px;
        font-family: Arial;
        margin-top:2px;
        float: left;
      }
      /* 2. negociacion / segundo titulo (input text) */
      #cmaxima{
        border:solid 1px #A0FF24;
        margin-left: -1px;
        height: 30px;
        width: 179px;
      }
      /* 2. negociacion / segundo titulo (texto unidades) */
      #parrafo4{
        color: gray;
        font-size: 16px;
        font-family: Arial;
        margin-top: 8px;
      }
      /* 2. negociacion / tercer titulo (input text) */
      #pu{
        border:solid 1px #A0FF24;
        margin-left: -1px;
        height: 30px;
        width: 179px;
      }
      /* 2. negociacion / tercer titulo (texto unidades) */
      #parrafo5{
        color: gray;
        font-size: 16px;
        font-family: Arial;
        margin-top: 8px;
      }
      /* 2. negociacion / cuarto titulo (div checkboxs) */
      #espacio4{
        background: #ffffff;
        margin-left: -6px;
        height: auto;
        width: 290px;
      }
      /* 2. negociacion / cuarto titulo (input text de la opcion Otros) */
      #textotros{
        border:solid 1px #A0FF24;
        margin-left: 10px;
        height: 28px;
        width: 132px;
        max-width:132px;
      }

      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
      /* 3. Informacion Complementaria / primer titulo (div y texto titulo) COMUN PARA SEGUNDO Y TERCER TITULO */
      #espacio9{
        background: #ffffff;
        margin-top: 14px;
        height: auto;
        width: auto;
      }
      #parrafo8{
        color: gray;
        font-size: 16px;
        font-family: Arial;
        margin-top: 2px;
      }
      /* 3. Informacion Complementaria / tercer titulo (textos titulo) */
       #parrafo10{
        color: gray;
        font-size: 16px;
        font-family: Arial;
        margin-top: 2px;
      }
      #parrafo11{
        color: gray;
        font-size: 16px;
        font-family: Arial;
        margin-top: 3px;
      }
      /* 3. Informacion Complementaria / primer titulo (div select) */
      #espacio12{
        background: #ffffff;
        margin-top: 7px;
        margin-left: -149px;
        height: auto;
        width: auto;
      }
      /* 3. Informacion Complementaria / segundo titulo (div select) */
      #espacio11{
        background: #ffffff;
        margin-top: 57px;
        margin-left: 7px;
        height: 38px;
        width: 211px;
      }
      /* 3. Informacion Complementaria / primer y segundo titulo (select) */
      #combo{
        border:solid 1px #A0FF24;
        margin-left: -72px;
        margin-top: 2px;
        height: 32px;
        width: 133px;
      }
      /* 3. Informacion Complementaria / tercer titulo (input text) */
      #ubicacion{
        border:solid 1px #A0FF24;
        margin-left: -72px;
        height: 29px;
        width: 132px;
      }
      /* 3. Informacion Complementaria / boton naranja publicar producto */
      #espacio15{
        background: #ffffff;
        margin-top: 210px;
        margin-left: -414px;
        height: auto;
        width: auto;
        cursor: pointer;
      }

      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
      /* aside derecho (texto) */
      #es99{
        float: left;
        color:rgb(16, 183, 214);
        font-family:Arial;
        font-size:16px;
        margin-top:5px;
        font-weight: bold;
      }
</style>


<!-- Estilos para los mensajes de error -->
<style type="text/css">
  .error{
  box-shadow: 10px 5px 20px #58ACFA; 
  border-radius: 20px;  
  background-color:#ddd;
  width:250px;
  padding:10px;
  float: right;
  font-size: 9pt;
  position: relative;
  z-index: 2;
  }
</style>

<!-- Estilos para las etiquetas "palabras clave" que se añaden -->
<style type="text/css">
    .etiquetas {
      /*border-radius:9px;*/
      -webkit-border-top-right-radius: 40px 30px;
      -webkit-border-bottom-right-radius: 40px 30px;
      background-color: #BBE932;
      border:solid 2px #BBE932;
      color: white;
      font-size: 14pt;
      flex: 1 0 auto;
      flex-direction: row;
      flex-wrap: wrap;
      /*# of flex items: 5*/
    }
</style>

  </head>
  <body>
    <div class="container_12" align= "center">
      <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
      <!-- header -->
      <header class="grid_1" style="padding-left: 10px; margin: 0px -13px 0px 4px; display: block; float: left;">
        <a href="<?=base_url()?>index"> <img src="img/logo3.png" style="float: left;" /></a>
      </header> 
      <header class="grid_1" id="he" style="float: left; width: 1024px; padding-left: 0px; max-width: 1054px; display: block;">
        <table width="auto" height="auto" style="border-spacing: 0px;"> <tr> <td>
          <div style="padding: 4px 0px 4px 0px;"> <table style="border-spacing: 0px;"> <tr>
            <td class="header_iconos"> <a href="<?=base_url()?>tablero_usuario"> Inicio </a> </td>
            <!-- separador -->
            <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
            </td>
            <!-- separador -->
            <td class="header_iconos"> <a href="<?=base_url()?>mensajes_usuario"> Mensajes </a> </td>
            <!-- separador -->
            <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
            </td>
            <!-- separador -->
            <td class="header_iconos"> <a href="<?=base_url()?>contactos"> Contactos </a> </td>
            <!-- separador -->
            <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
            </td>
            <!-- separador -->
            <td class="header_iconos activo"> <a href="#"> Productos </a> </td>
            <!-- separador -->
            <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
            </td>
            <!-- separador -->
            <td class="header_iconos"> <a href="<?=base_url()?>reg_oferta/registrar"> Busco/Compro </a>  </td>
            <!-- separador -->
            <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
            </td>
            <!-- separador -->
            <td class="header_iconos" style="width: 327px;">
              <table width="100%" style="height: 50px; background-color: #f1f1f1; border-spacing: 0px;"> <tr>
                <td style="padding-top: 15px; padding-left: 70px; width: 50px;"> <img src="img/logouser.png" /> </td>
                <td style="padding-top: 15px; width: 100px;"> 
                  <p id="usuactual" style="font-size: 18px;"> <a href="#" style="color: #ff7f27;"> <?= $this->session->userdata('usuario');?> </a> </p> 
                </td>
                <td style="padding-top: 17px;"> <p style="font-size: 13px;"> > </p> </td>
              </tr> </table>
            </td>
          </tr> </table> </div>
        </td> </tr> </table>
      </header> 

      <div class="clear"></div>

      <article> <section>
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        <!-- aside izquierdo: publicar producto / organizar productos -->
        <div class="grid_4" id="div1">
          <div class="grid_2 alpha" style="margin-top: 30px;">
            <a href="panel2.html"><img src="img/publicar_2.png" /></a> 
          </div>
          <div class="grid_2 alpha" style="margin-top: 26px;">
            <a href="<?=base_url()?>organizar_productos"><img src="img/organizar.png" /></a>
          </div>
        </div>

        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        <!-- contenido -->
       <?=form_open_multipart('registroproducto');  ?> 
       
        <div class="grid_4" id="div2" style="z-index: 1;">
          <div class="grid_2 alpha" style="margin-top: 30px; height:80px; background:#ffffff;">
            <a name="fin" id="fin"></a>
            <h1>Publicar Producto</h1><br>
            <?php 
            if($this->session->flashdata('producto_registrado'))  { ?>
            <div class="exito mensajes"> <?=$this->session->flashdata('producto_registrado')?></div>
            <br>
             <?php } ?>
          </div>
          
          <div class="grid_2 alpha" style="margin-top: 10px; height: 2268px; background:#ffffff;">
            <div style="padding: 10px 10px 10px 25px;">
              <div class="grid_2" id="es1"><p id="es11">1. Información Básica</p></div>
              <br><br><br>
             
              <div class="grid_2" id="es2"> <p id="es22"> Nombre del Producto <font color="red">*</font> </p> </div>
              <div class="grid_2" id="es2">
              <input type="text" id="es3" name="nombre" value="<?php echo set_value('nombre'); ?>"/> 
            </div>  
              <?php echo form_error('nombre', '<div class="error">', '</div>'); ?> 
              <br><br>

              <div class="grid_2" id="es4"><p id="es44">Escoja la Categoría y Subcategoría <font color="red">*</font> </p></div>
              <br><br><br>
              <div style="width: 700px; height: 200px; overflow: hidden; ">
                <select name="textarea1" size="3" id="textarea1">
                   <?php      foreach($categoria as $fila)   {
                                                 ?>
                      <option value="<?=$fila -> id_categoria ?>"><?=$fila -> nombre_categoria ?></option>
                 <?php
                   }
                     ?>  
                </select>
                <select multiple name="textarea2" size="3" id="textarea2" >

                </select>
                <div class="grid_2" id="botones">
                  <input type="button" value="Agregar"  style="cursor: pointer;" id="agregar" onclick="pasarCateforia();">
                  <input type="button" value="Eliminar" style="cursor: pointer;" id="eliminar" onclick="quitarCateforia();">
                </div>
              </div>

              <br><br>

              <div class="grid_2" id="es5"><p id="es55">Descripcion del Producto <font color="red">*</font> </p></div>
              <br><br><br>
              <textarea id="textarea3" name="descripcion" style="resize: none;"><?php echo set_value('descripcion'); ?></textarea><?php echo form_error('descripcion', '<div class="error">', '</div>'); ?> 
              <br><br>

              <div class="grid_2" id="es6"> <p id="es66">Fotos del Producto</p></div>
              <br><br> <br><?=@$error?>

              <!-- area de subida de fotos del producto -->
              <!-- no se puede mostrar la ruta completa de la foto pues ademas de ser innecesario, -->
              <!-- es una funcion de seguridad que tienen los exploradores de internet -->
              <style type="text/css">
                .custom-input-file {
                    overflow: hidden;
                    position: relative;
                    cursor: pointer;
                    background-color: #00a2e8;
                    color: #fFFfFF;
                    text-align: center;
                    font-family: Arial;
                    font-size: 10pt;
                  width: 98px;
                  min-height: 30px;
                  vertical-align: middle;
                  padding-top: 12px;
                }

                .custom-input-file .input-file {
                    margin: 0;
                    padding: 0;outline:0;
                    font-size: 1px;
                    border: 45px solid transparent; /* border: 10000px solid transparent; */
                    border-right: 0px solid transparent;
                    opacity: 0;
                    filter: alpha(opacity=0);
                    position: absolute;
                    right: -3px; /* right: -1000px; */
                    top: -10px; /* top: -1000px; */
                    cursor: pointer;
                }
                .custom-input-file .archivo {
                    background-color: #000;
                    color: #fff;
                    font-size: 7pt;
                    overflow: hidden;
                    display: none; /*no mostrar */
                }
              </style>
              <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
              <script type="text/javascript">
                function obtieneruta() {
                  var ruta = document.getElementById("file_upfile").value;
                  document.getElementById("fotoP").value = ruta;
                }

                $(function(){
                    $(".custom-input-file input:file").change(function(){
                        $(this).parent().find(".archivo").html($(this).val());
                    })/*.css('border-width',function(){
                        if(navigator.appName == "Microsoft Internet Explorer")
                            return 0;
                    })*/;
                });
              </script>

              <div class="grid_2" id="botonesfoto">
                <table width="auto"> <tr>
                  <td>
                    <input type="text" id="fotoP" name="fotoP" />
                  </td>
                  <td>
                    <div class="custom-input-file">
                      <input type="file" class="input-file" id="file_upfile"  name="userfile" onchange="obtieneruta()" />
                      Examinar
                        <div class="archivo">...</div>
                    </div>
                  </td>
                  <td>
                    <input type="button" value="Eliminar" id="eliminar1">
                  </td>
                </tr> </table>
              </div>

              <br><br>

              <div class="grid_2" id="es7"><p id="es77">Palabra Clave</p></div>
              <br><br>
              <br> <input type="text" id="Pclave" name="Pclave" />
              <div class="grid_2" id="botonesclave">
                <input type="button" value="Agregar"  style="cursor: pointer;" id="agregar2" onclick="addPalabra();">
                <input type="button" value="Eliminar" style="cursor: pointer;" id="eliminar2" onclick="quitarPalabra();">   
              </div>

              <div class="grid_2" id="espacio">
                <!--/*chaqueta en algodon*/-->      
              </div>
              <br>
              <div class="grid_2" id="espacio1">
                <!--/*chaqueta roja*/-->      
              </div>
              <br><br><br><br><br><br><br><br><br><br><br>

              <div class="grid_2" id="es1"><p id="es11">2. Negociación</p> </div>
              <br><br><br><br>

              <div class="grid_2" id="espacio2"><h1 id="parrafo1">Pedido Minimo <font color="red">*</font> </h1>
              </div>
              <div class="grid_2" id="espacio3">
                <input type="text" id="pminimo" name="pedido" value="<?php echo set_value('pedido'); ?>"></input>
              </div>
              <div class="grid_2" id="espacio5"> <img src="img/chulo.png" style="width: auto; height: 34px;"/> </div>
              <div class="grid_2" id="espacio6"><h1 id="parrafo3">Ej. 2 Unidades</h1></div>
              <?php echo form_error('pedido', '<div class="error">', '</div>'); ?> 
              <br> <br> <br>
              <div class="grid_2" id="espacio2" style="margin-right: -3px;" ><h1 id="parrafo">Capacidad máxima <font color="red">*</font> <br><h1 id="parrafo2">de entrega</h1></h1>
              </div>
              <div class="grid_2" id="espacio3">
               <input type="text" id="cmaxima" name="capacidad" value="<?php echo set_value('capacidad'); ?>"/> 
             </div>
              <div class="grid_2" id="espacio5"><img src="img/chulo.png" style="width: auto; height: 34px;"/></div>
              <div class="grid_2" id="espacio6"><h1 id="parrafo4">Ej. 200 Unidades semanales</h1></div> 
              <?php echo form_error('capacidad', '<div class="error">', '</div>'); ?> 
              <br> <br> <br>
              <div class="grid_2" id="espacio2" style="margin-right: 6px;"><h1 id="parrafo">Precio por unidad <font color="red">*</font> </h1>
              </div>
              <div class="grid_2" id="espacio3"> 
                <input type="text" id="pu" name="precio" value="<?php echo set_value('precio'); ?>"/> 
              </div>
              <div class="grid_2" id="espacio5"><img src="img/chulo.png" style="width: auto; height: 34px;"/></div>
              <div class="grid_2" id="espacio6"><h1 id="parrafo5">Ej. $650.000 COP</h1></div>
              <?php echo form_error('precio', '<div class="error">', '</div>'); ?> 
              <br> <br> <br>

              <div class="grid_2" id="espacio2"><h1 id="parrafo1">Forma de pago <font color="red">*</font> </h1></div>
              <div class="grid_2" id="espacio4">
                <?php echo form_error('pago', '<div class="error">', '</div>'); ?> 
                <table width="100%" height="auto">
                  <tr> <td style="font-size: 16px; color: gray; padding: 10px 10px 10px 10px; font-family: Arial;">
                    <input type="checkbox" name="pago[]" value="Giro a cuenta bancaria" <?php echo set_checkbox('pago','Giro a cuenta bancaria', false) ?>>Giro a Cuenta Bancaria  
                  </td> 
                  </tr>
                  <tr> <td style="font-size: 16px; color: gray; padding: 10px 10px 10px 10px; font-family: Arial;">
                    <input type="checkbox"  name="pago[]" value="Giros nacionales" <?php echo set_checkbox('pago', 'Giros nacionales',false) ?>>Giros Nacionales 
                  </td> 
                  </tr>
                  <tr> <td style="font-size: 16px; color: gray; padding: 10px 10px 10px 10px; font-family: Arial;">
                    <input type="checkbox" name="pago[]" value="Efectivo" <?php echo set_checkbox('pago', 'Efectivo', false) ?>>Efectivo
                     </td> 
                  </tr>
                  <tr> <td style="font-size: 16px; color: gray; padding: 10px 10px 10px 10px; font-family: Arial;">
                    <input type="checkbox" name="pago[]" value="Cheque" <?php echo set_checkbox('pago', 'Cheque', false) ?>>Cheque
                  </td> 
                  </tr>
                  <tr> <td style="font-size: 16px; color: gray; padding: 10px 10px 10px 10px; font-family: Arial;">
                    <input type="checkbox" name="pago[]" value="Contraentrega" <?php echo set_checkbox('pago', 'Contraentrega', false) ?>>Contraentrega  
                  </td> 
                  </tr>
                  <tr> <td style="font-size: 16px; color: gray; padding: 10px 10px 10px 10px; font-family: Arial;">
                    <input type="checkbox" name="pago[]" value="A convenir" <?php echo set_checkbox('pago', 'A convenir', false) ?>> A Convenir 
                  </td> 
                  </tr>
                  <tr> <td style="font-size: 16px; color: gray; padding: 10px 10px 10px 32px; font-family: Arial; vertical-align: middle;">
                    Otro <input type="text" id="textotros" name="otro" value="<?php echo set_value('otro'); ?>"/> </td> 
                  </tr> 
                </table>
              </div>
              
              <div class="grid_2" id="es1" style="margin-top: 30px;">
                <p id="es11">3. Información Complementaria</p>
              </div>
              <br>

              <div class="grid_2" id="es6" style="margin-top: 10px; padding-bottom: 20px;"> <p id="es66" style="text-align: left;">
                La siguiente Información no es obligatoria pero ayuda a los compradores a tener más información y mejorar la visibilidad de su producto</p></div>
              <br> 
              <div class="grid_2" id="espacio9"><h1 id="parrafo8">Estado del Producto</h1></div>
              <div class="grid_2" id="espacio9" style="margin-top: 63px; margin-left: -167px;"><h1 id="parrafo8">Muestras Disponibles?</h1></div>
              <div class="grid_2" id="espacio9" style="margin-top: 106px; margin-left: -186px;">
                <h1 id="parrafo10">Ubicacion de</h1><h1 id="parrafo11">la mercancía</h1></div>
              <br>

              <div class="grid_2" id="espacio11">
                <select id="combo" name="muestras">
                  <option value=" ">--------</option>
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </div>

              <div class="grid_2" id="espacio12">
                <select id="combo" name="estado">
                  <option value=" ">--------</option>
                  <option value="nuevo">Nuevo</option>
                  <option value="usado">Usado</option>
                </select>
              </div>
              <br>
              <div class="grid_2" id="espacio14">
                <input type="text" id="ubicacion" name="ubicacion" value="<?php echo set_value('ubicacion'); ?>"></div>              
              <div class="grid_2" id="espacio15">
                <button type="submit" style="border: 0; background-color: transparent">
                <img src="img/boton_publicar.png"/>
              </button></div>
            </div>
          </div>     
        </div>

        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        <!-- aside derecho: categorias seleccionadas -->
        <div class="grid_4" id="div3" style="margin-left: -6px;">
          <div class="grid_2 alpha" style="margin-top: 30px; height:250px; background:#ffffff;"></div>
          <div class="grid_2 alpha" style="margin-top: 4px; height: 202px; background: #F1EEEE; width: 223px; max-width:223px;">
            <p id="es99">Categorias Seleccionadas</p>
            <textarea id="textarea4" name="textarea4" style="border: none; resize: none;"><?php echo set_value('textarea4'); ?></textarea>
            <?php echo form_error('textarea4', '<div class="error">', '</div>'); ?> 
          </div>
        </div>

      </section> </article>
      <?= form_close() ?> 
    </div>
  </body>
</html>
