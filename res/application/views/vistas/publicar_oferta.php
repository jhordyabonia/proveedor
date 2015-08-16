<!DOCTYPE html>
<html lang = "es">
  <head>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta charset="UTF-8"> 
    <link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />

    <title>Publicar oferta / PROVEEDOR.com.co </title>
    <link rel="stylesheet" href="<?= base_url() ?>css/960.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/960_12_col.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/reset.css">
    <!-- importaciones -->
    <link rel="stylesheet" href="<?= base_url() ?>css/estilosheader.css">

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <!-- checkbox -->
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/publicar/normalize.css" />
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/publicar/component.css" />
      <script src="<?= base_url() ?>js/publicar/modernizr.custom.js"></script>

    <!-- Script para mostrar departamentos y municipios -->
      <script type="text/javascript">
        $(document).ready(function () {
          $(".provincia").change(function () {
            var id = $(this).val();
            var dataString = 'id=' + id;
            $.ajax({
              type: "POST",
              url: '<?php echo base_url() . "oferta/municipio_select"; ?>',
              data: dataString,
              cache: false,
              success: function (html) { //alert(html);
                $(".municipio").html(html);
              }
            });
          });
        });
      </script>

    <script type="text/javascript">
      //Pone las unidades escogidas en el combo1
        $(document).ready(function () {
          $('#combo1').change(function () {
            var combo = $("#combo1 option:selected").text();
            // var cantidad = $('#cantidad').val();
            $('input[name=unidades]').val(combo);
            // $('input[name=cantidad2]').val(cantidad);
          });
        });

      //funcion Cantidad requerida obtiene el valor de este campo y lo pone en precio max a pagar
        $(document).ready(function () {
          $('#cantidad').change(function () {
            var cantidad = $(this).val();
            $('input[name=cantidad2]').val(cantidad);
          });
        });

      // boton eliminar en palabra clave
        $(document).ready(function () {
          $("#eliminar2").click(function () {
            var texto = $('#textarea4').val();
            var lineas = 0;
            // recorremos todo el contenido del textarea
            for (var j = 0; j < texto.length; j++) {
              if (texto.charAt(j) == "\n") {
                // Por cada salto de linea se incremente en uno la variable lineas
                lineas++;
              }
            }
            //Eliminamos la ultima linea del textarea que se ha guardado en la variable lineas 
            var txt = document.getElementById('textarea4').value.split('\n');
            txt.splice(parseInt(lineas) - 1, 1);
            document.getElementById('textarea4').value = txt.join('\n');
          });
        });

      // ?
        $().ready(function () {
          $('#agregar2').click(function () {
            var input = $("input[name=Pclave]").val();
            var textarea = $("#textarea4").val();
            $('#textarea4').val(textarea + input + "\n");
            $("input[name=Pclave]").val("");
            // $('#lin').val(input); //aqui se guarda la ultima palabra enviada al textarea
          });
        });

      //funcion que monitoriza los caracteres restantes del textarea
      // http://www.yourinspirationweb.com/en/jquery-tips-tricks-how-to-limit-characters-inside-a-textarea/
        $(document).ready(function () {
          var characters = 5000;
          $("#textarea3_car").append(
              "<strong>" + characters + "</strong> caracteres restantes");
          $("#textarea3").keyup(function () {
            //se ejecuta cuando una tecla cualquiera ha sido pulsada
            if ($(this).val().length > characters) {
              //se ha sobrepasado el limite
              $(this).val($(this).val().substr(0, characters));
            }
            var remaining = characters - $(this).val().length;
            $("#textarea3_car").html(
                "<strong>" + remaining + "</strong> caracteres restantes");
            if (remaining <= 10) {
              $("#textarea3_car").css("color", "red");
            } else {
              $("#textarea3_car").css("color", "#A8ABB4");
            }
          });
        });
    </script> 

    <!-- funciones para categorias y subcategorias -->
      <script type="text/javascript">
        //mostrar subcategorias de una categoria seleccionada
          $(document).ready(function () {
            $("#textarea1").change(function () {
              $("#textarea1 option:selected").each(function () {
                categoria = $('#textarea1').val();
                $.post("<?=base_url()?>publicar_producto/mostrar_subcategoria", {
                  categoria: categoria
                }, function (data) {
                  $("#textarea2").html(data);
                  $("#textarea1").css("width", "250px"); //200px
                  $("#textarea2").css("display", "block");
                  $("#flecha_union_cat_subcat").css("display", "block");
                  $("#agregar").css("display", "none");
                  $("#cat_subcat").css("display", "none");
                  $("#eliminar").css("display", "none");
                });
              });
            });
          });

        //accion al seleccionar una subcategoria
          $(document).ready(function () {
            $("#textarea2.textarea2").on("click", "div", function () {
              $('#textarea2.textarea2 div').css("background", "#fff");
              $(this).css("background", "#ddd");
              //clase ".selecc" para el div seleccionado
              $('#textarea2.textarea2 div').removeClass("selecc");
              $(this).addClass("selecc");

              $("#agregar").css("display", "block");
              $("#cat_subcat").css("display", "none");
              $("#eliminar").css("display", "none");
            });
          });

        //colocar en "seleccionados" la categoria y subcategoria seleccionados
          $(document).ready(function () {
            $("#agregar").click(function () {
              var categoria = $("#textarea1 option:selected").text();
              var subcategoria = $("#textarea2.textarea2 div.selecc").text();
              $("#cat_selecc").text(categoria); //
              $('input[name=categoria]').val(categoria);
              $("#subcat_selecc").text(subcategoria); //
              $('input[name=subcategoria]').val(subcategoria);
            });
          });

        // boton eliminar en categoria/subcategoria 
          $(document).ready(function () {
            $("#eliminar").click(function () {
              $('input[name=categoria]').val("");
              $('input[name=subcategoria]').val("");
            });
          });

        //reconocer la pulsacion del boton "agregar (categoria y subcategoria)"
          $(document).ready(function () {
            $("#agregar").on("click", function () {
              $("#cat_subcat").css("display", "block");
              $("#eliminar").css("display", "block");
            });
          });

        //reconocer la pulsacion del boton "eliminar (categoria y subcategoria)"
          $(document).ready(function () {
            $("#eliminar").on("click", function () {
              $("#cat_subcat").css("display", "none");
            });
          });
      </script> 

    <!-- script para la gestion de las imagenes -->
      <script type="text/javascript">
        var ruta = "<?=base_url()?>upload/imagen";
        var id_multipart_for = "#default-behavior";
        var id_boton_examinar = "#btn_archivos";
        var id_boton_examina = "btn_archivos";
        var id_boton_subir = "#subir";
        var id_div_preview = "#preview";
        var id_div_resultado = "#result";

        $(document).ready(function () {
          $(id_div_preview).html('');

          $(id_boton_examinar).on('change', function () {
            //$(id_div_preview).html('');
            //agregar fotos
            var paths = document.getElementById(id_boton_examina).files;
            var navegador = window.URL || window.webkitURL;
            for (var i = paths.length - 1; i >= 0; i--) {
              var valid = true;
              size = paths[i].size;
              type = paths[i].type;
              name = paths[i].name;

              if (size > 1024 * 1024) {
                $(id_div_resultado).text("El tamaño de la imagen es muy grande");
                valid = false;
              }
              ;
              if (type != 'image/jpeg' && type != 'image/png' && type != 'image/bmp') {
                $(id_div_preview).append("El archivo " + name + " no es un tipo valido<br>");
                valid = false;
              }
              ;
              if (valid) {
                url = navegador.createObjectURL(paths[i]);
                $(id_div_preview).append('<img src="' + url + '" alt="' + name + '">');
                $(id_div_resultado).text("Imágenes Agregadas (5 máximo)");

                if (($("#preview img").length) > 5) {
                  //error
                  $("#preview img:last-child").remove(); //quitar el ultimo elemento
                  $(id_div_resultado).css("color", "red");
                  $(id_div_resultado).text("Máximo de fotos (5) alcanzado!");
                }
              }
              ;
            }
            ;
          });

          $(id_boton_subir).on('click', function () {
            var form_data = new FormData($(id_multipart_for)[0]);
            $.ajax({
              url: ruta,
              type: "post",
              data: form_data,
              contentType: false,
              processData: false,
              success: function (datos) {
                $(id_div_resultado).html(datos);
              }
            });
          });

          //miniscript para eliminar la ultima foto puesta
          $("#eliminar1").on("click", function () {
            $("#preview img:last-child").remove(); //quitar el ultimo elemento
            $(id_div_resultado).text("Imágenes Agregadas (5 máximo)");
          });
        });
      </script>

    <!-- Script para mostrar subcategorias al selecc una categoria en los select del formulario -->
      <script type="text/javascript">
        $(document).ready(function () {
          $("#textarea1").change(function () {
            $("#textarea1 option:selected").each(function () {
              categoria = $('#textarea1').val();
              $.post("<?=base_url()?>publicar_oferta/mostrar_subcategoria", {
                categoria: categoria
              }, function (data) {
                $("#textarea2").html(data);
              });
            });
          })
        });
      </script>

    <!-- script para las palabras clave -->
    <!-- http://xoxco.com/projects/code/tagsinput/ -->
      <link rel="stylesheet" type="text/css" 
        href="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.css" />
      <script type="text/javascript" 
            src="<?= base_url() ?>assets/js/publicar_producto/jquery.tagsinput.js"></script>
      <link rel="stylesheet" type="text/css" 
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />
      <script type="text/javascript">
        function onAddTag(tag) {
          alert("Palabra clave nueva: " + tag);
        }
        function onRemoveTag(tag) {
          alert("Palabra clave eliminada: " + tag);
        }
        function onChangeTag(input, tag) {
          alert("Cambió una palabra clave: " + tag);
        }

        $(function () {
          $('#Pclave').tagsInput({
            width: 'auto',
            defaultText: " "
          });
        });
      </script>
      <style type="text/css">
        .tagsinput {
          width: 440px !important;
          height: 40px !important;
          min-height: 40px !important;
          overflow-y: hidden !important;
        }
      </style>

    <!-- script formateo de numeros / number-format para el campo precio -->
    <!-- #cantidad_format, #precio_format: se escribe y se formatea automaticamente -->
    <!-- #cantidad, #cantidad: precio SIN formatear automaticamente, este se envia a la BD, campo oculto -->
    <!-- by Padre: http://plugins.jquery.com/df-number-format/ -->
      <script type="text/javascript" 
          src="<?= base_url() ?>assets/js/publicar_producto/jquery.number.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function () {
          //number(true, cant. centavos, punto decimal, punto centavos)
          $('#cantidad_format').number(true, 0, ",", ".");
          $("#cantidad_format").blur(function () {
            var val = $('#cantidad_format').val();
            $("#cantidad").val(val);
            $("#cantidad2").val(val);
          });

          $('#precio_format').number(true, 0, ",", ".");
          $("#precio_format").blur(function () {
            var val = $('#precio_format').val();
            $("#precio").val(val);
          });
        });
      </script>

    <!-- script para ocultar precio maximo a pagar cuando se haga clic en precio a convenir -->
      <script type="text/javascript">
        $(document).ready(function () {
          $('#precioUni').change(function () {
            //cuando se pulsa el radio "precio unitario"
            $("#pmax_pagar").css("display", "block");
            $("#punit_pconv").css("margin-bottom", "0");
            var validSettings = $("#default-behavior").validate().settings;
            validSettings.rules.precio = {required: true};
            validSettings.messages.precio = "Precio oblgatorio!";
          });
          $('#precioconvenir').change(function () {
            //cuando se pulsa el radio "precio a convenir"
            $("#pmax_pagar").css("display", "none");
            $("#punit_pconv").css("margin-bottom", "1em");
            var validSettings = $("#default-behavior").validate().settings;
            delete validSettings.rules.precio;
            delete validSettings.messages.precio;
          });
        });
      </script>

    <!-- script para mostrar/ocultar el select de  "municipios" cuando se selecc un depto -->
    <script type="text/javascript">
      $(document).ready(function () {
        $('#combo_d').change(function () {
          selecDep = $("#combo_d").find(":selected").val();
          if (selecDep == "") {
            //ocultar departamentos
            $("#combo_m").css("display", "none");
          } else {
            //mostrar departamentos
            $("#combo_m").css("display", "block");
          }
        });
      });
    </script>

    <!-- Estilos para los mensajes de error en las validaciones -->
      <style type="text/css">
        .error {
          font-weight: bold;
          z-index: 3;
        }
        .error:after {
          content: "";
          position: absolute;
          width: 0;
          height: 0;
          border-width: 10px;
          border-style: solid;
          border-color: #fff #ddd #fff #fff;
          top: 9px;
          left: -20px;
        }
        label.error {
          display: none;
          width: 225px;
          height: 52px;
          position: absolute;
          background: #ddd;
          font-size: 14px;
          color: red;
          padding: 0.7em 0.7em 0.7em 0.7em;
          transition: none;
          cursor: default;
          left: 80%;
          margin-top: -2em;
        }
        @media screen and (max-width: 1279px) {
          label.error { left: 75%; }
        }
        label:before {
          width: 100% !important;
          margin: 0;
          height: 100% !important;
          top: 61% !important;
          border: none !important;
          background: transparent !important;
        }
      </style>

    <!-- estilos css generales (1366) -->
      <style type="text/css">
        html, body {
          font-family: Arial;
        }
        .container_12{
          background:#ffffff;
          height: auto;
          width: 1342px;
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
          float: left;
          width: 1087px; 
          padding-left: 19px; 
          max-width: 1111px; 
          display: block; 
          margin-right: -4px;
        }
        #he_1 {
          padding-left: 10px; 
          margin: -7px -13px 0px 4px; 
          display: block; 
          float: left;
        }
        #div1{
          height:auto;
          width: 210px;
        }
        #div2{
          height: auto;
          width: 974px;
          margin-left: 13px;
          margin-top: 48px;
          border-left-style: outset;
          border-left-width: 1px;
        }
        #div3{
          height:auto;
          width:250px;
          margin-top: 256px;
        }

        .grid_4{
          background: #ffffff;
          height:512px;
          margin:12px 12px;
          width: 300px;
        }

        .grid_2{
          background: #ffffff;
          height:170px;
          width: 100%;
        } 

        #div4{
          background: blue;
          height:20px;
        } 
        h1{
          margin-top: 0px;
          color: #0159c7;
          font-size: 21px;
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

        #h7{
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
          font-size:13px;
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
          margin-top: -51px;
          height: 169px;
          width: 400px;
          max-width: 400px;
          margin-left: 528px;
          background: #f6f6f6;
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
          background-color: #ffc90e;
          margin-top: 7px;
          margin-left: -13px;
          height: 44px;
          width: 117px;
          max-width: 114px;
        }

        #agregar{
          border: 0px #F9F9FF solid;
          color: #FFFFFF;
          background-color: #00a2e8;
          margin-top: 44px;
          margin-left: -13px;
          height: 44px;
          width: 114px;
          max-width: 114px;
        }

        #eliminar1{
          border: 0px #636369 solid;
          color: #FFFFFF;
          background-color: #ffc90e;
          margin-top: -8px;
          margin-left: 7px;
          height: 39px;
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
          margin-left: 22px;
          height: 39px;
          width: auto;
        }
        /* nombre del producto (primer titulo 1. Información Básica ) */
        #es11{
          float: left;
          color: #0159c7;
          font-family: Arial;
          font-size: 19px;
          margin-top: 5px;
          margin-left: 2px;
          font-weight: bold;
        }

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
        /* nombre del producto (div texto) */
        #es2 {
          background: #ffffff;
          height: 39px;
          width: auto;
          margin-left: 31px;
        }
        /* nombre del producto (texto) */
        #es22{
          float: left;
          font-family: Arial;
          font-size: 13px;
          margin-top: 5px;
          margin-left: 0px;
          font-weight: bold;
          text-align: -webkit-auto;
          width: 157px;
          color: #7f7f7f;
        }
        /* nombre del producto (input) */
        #es3{
          height: 30px;
          width: 328px;
          border: 1px solid #C4C2C2;
          margin-left: -29px;
        }

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
        /* Escoja la Categoría y Subcategoría (div texto) */
        #es4{
          background: #ffffff;
          height: auto;
          margin-right: 25pc;
          margin-left: 31px;
          margin-top: 10px;
        }
        /* Escoja la Categoría y Subcategoría (texto) */
        #es44{
          float: left;
          font-weight: bold;
          color: #7f7f7f;
          font-family: Arial;
          font-size: 13px;
          margin-top: 5px;
        }
        /* Escoja la Categoría y Subcategoría (primer textarea/select) */
        #textarea1{
          margin-left: 0px; 
          float: left;
          margin-right: 24px;
          margin-right: 10px;
          height: 195px;
          width: 300px;
          border: 1px solid #fff;
          font-size: 13px;
        }
        /* Escoja la Categoría y Subcategoría (separador entre categoria y subcategoria) */
              #flecha_union_cat_subcat {
          width: 50px; 
          height: 195px; 
          float: left; 
          line-height: 195px; 
          width: auto;
              }
        /* Escoja la Categoría y Subcategoría (segundo textarea/select) */
        #textarea2{
          /*margin-left: -802px;*//*margin-left: 24px; float: left;
          height: 200px;
          width: 200px;
          max-width: 200px;
          margin-top: 0px;
          border: 1px solid #FFFFFF;
          font-size: 13px;*/
          margin-left: 24px; margin-left: 10px;
          float: left;
          height: 195px;
          width: 200px;
          max-width: 200px;
          margin-top: 0px;
          border: 1px solid #fff;
          font-size: 13px;
        }
        /* Escoja la Categoría y Subcategoría (div botones agregar/eliminar) */
        #botones{
          /*background: #ffffff;
          margin-top: -203px;
          margin-left: 549px;
          height: auto;
          width: 100px;*/
          background: #ffffff;
          float: left;
          width: auto;
          height: 195px;
          margin: 0;
          display: table;
        }
        /* boton agregar Escoja la Categoría y Subcategoría (div botones agregar/eliminar) */
        #agregar {
          font-weight: bold;
          cursor: pointer;
          border: 0px #F9F9FF solid;
          color: #FFFFFF;
          background-color: #00a2e8;
          margin: 0em 1em 1em 1em;
          height: 44px;
          width: 114px;
          max-width: 114px;
        }
        /* boton eliminar Escoja la Categoría y Subcategoría (div botones agregar/eliminar) */
        #eliminar {
          font-weight: bold;
          cursor: pointer;
          border: 0px #636369 solid;
          color: #FFFFFF;
          background-color: #ffc90e;
          margin: 0em 1em 1em 1em;
          height: 44px;
          width: 117px;
          max-width: 114px;
        }
        /* Escoja la Categoría y Subcategoría (muestra cat y subcat seleccionadas) */
        #cat_subcat {
          background: #f6f6f6; 
          width: 180px;
          height: 195px; 
          float: left;
          width: 180px;
          padding: 0.3em 1.5em 1.5em 1.5em;
          font-weight: bold; 
          font-size: 14px;
        }

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
        /* Descripcion del Producto (div textarea) */
        #es5{
          background: #ffffff;
          /*margin-top: -5px;*/
          height: auto; /*height: 39px;*/
          width: auto; /*width: 388px;*/
          /*margin-left: 31px;*/
          margin: 2.5em 0 0 0;
          clear: both;
          float: left;
        }
        /* Descripcion del Producto (texto) */
        #es55{
          float: left;
          font-weight: bold;
          color: #7f7f7f;
          font-family: Arial;
          font-size: 13px;
          margin: 0; /*margin-top: 5px;*/
        }
        /* Descripcion del Producto (textarea) */
        #textarea3{
          /*margin-left: -223px;*/
          height: 162px;
          width: 649px;
          /*margin-top: -29px;*/
          max-width: 830px;
          border: 1px solid #ddd;
          margin: 0px 1em 0px 0px;
          resize: none;
          float: left;
          clear: both;
        }

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
        /* Fotos del Producto (div selector de fotos) */
        #es6{
          background: #ffffff;
          margin-top: 18px;
          height: auto;
          width: auto;
          margin-left: 0px; /*margin-left: 31px;*/
        }
        /* Fotos del Producto (texto selector de fotos) */
        #es66{
          float: left;
          font-weight: bold;
          color: #7f7f7f;
          font-family: Arial;
          font-size: 13px;
          margin-top: 5px;
        }
        /* Fotos del Producto (div el que lleva el boton examinar y eliminar) */
        #botonesfoto{
          background:#ffffff;
          margin-top: 0.7em; /*margin-top: -5px;*/
          margin-left: 0; /*margin-left: 269px;*/
          height: auto; /*height: 39px;*/
          width: auto; /*width: 223px;*/
          clear: both;
          float: left;
        }
        /* Fotos del Producto (input-text que tiene la ruta del archivo) */
        #fotoP{
          margin-left: 0; /*margin-left: -240px;*/
          height: 30px;
          width: 230px;
          border: 1px solid #ddd;
        }
        /* Fotos del producto (div que tiene el preview de las fotos selecc) */
        #preview {
          border: none; 
          resize: none; 
          background: #f6f6f6; 
          margin: -0.6em 0 0 46px; 
          height: 95px; 
          width: 400px;
          padding: 0.3em 0 0.3em 0;
        }
        #preview img {
          width: 78px;
          margin-right: 2px;
        }
        /* Fotos del producto (div con informacion, debajo de #preview) */
        #result {
          font-size: 13px; 
          font-weight: bold; 
          color: #7f7f7f; 
          text-align: center;
        }

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
        /* palabra clave (contenedor general) */
        #Pclave_contenedorgeneral {
          background: transparent; 
          height: auto; 
          width: 94%;
          margin: 2em 0 0 0px; 
          clear: both; 
          float: left;
        }
        /* palabra clave (div) */
        #es7{
          background: #ffffff;
          /*margin-top: 69px;*/
          height: auto;
          width: auto;
          /*margin-left: 31px;*/
          margin: 0px 0px 0px 0px;
          clear: both;
          float: left;
        }
        /* palabra clave (titulo) */
        #es77{
          float: left;
          font-weight: bold;
          color: #7f7f7f;
          font-family: Arial;
          font-size: 13px;
          margin-top: 5px;
        }
        /* palabra clave (div botones agregar/eliminar) */
        #botonesclave{
          background: #ffffff;
          height: auto;
          width: auto;
          clear: both;
          float: left;
          margin: 0.7em 0 0 0;
        }
        /* palabra clave (input text) */
        #Pclave{
          border: solid 1px #A0FF24;
          /*margin-left: -1131px;
          margin-right: -9px;*/
          height: 30px;
          width: 440px; /*width: 230px;*/
          float: left;
          margin: 0;
        }
        /* palabra clave (boton agregar) */
        /*#agregar2{
          border: 0px #F9F9FF solid;
          color: #FFFFFF;
          background-color: #c3c3c3;
          margin-top: 0px;
          margin-left: 20px;
          height: 34px;
          width: 100px;
          max-width: 100px;
        }*/
        /* palabra clave (boton eliminar) */
        /*#eliminar2{
          border: 0px #636369 solid;
          color: #FFFFFF;
          background-color: #c3c3c3;
          margin-top: 0px;
          margin-left: 2px;
          height: 34px;
          width: 100px;
          max-width: 100px;
        }*/
        /* palabra clave (divs verdes que contienen las palabras clave ingresadas) */
        /*#espacio{
          background: rgb(163, 255, 0);
          margin-top: 10px;
          height: 39px;
          width: 223px;
        }
        #espacio1{
          background: rgb(163, 255, 0);
          margin-top: 60px;
          margin-left: -234px;
          height: 39px;
          width: 224px;
        }*/

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
        /* 2. negociacion / primer titulo (div con el texto titulo) ESPACIO2 ES COMUN PARA LOS DEMAS SIMILARES */


        /* 2. negociacion / primer titulo (div con el input text) ESPACIO3 ES COMUN PARA LOS DEMAS SIMILARES */

        #pminimo{
          border:solid 1px #A0FF24;
          margin-left: 1px;
          height: 30px;
          width: 119px;
          margin-top: 3px;
        }

        /* 2. negociacion / primer titulo (div con el texto de unidades) ESPACIO6 ES COMUN PARA LOS DEMAS SIMILARES */


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
          margin-left: -5px;
          height: 30px;
          width: 179px;
        }
        /* 2. negociacion / segundo titulo (texto unidades) */

        /* 2. negociacion / tercer titulo (input text) */
        #pu{
          border:solid 1px #A0FF24;
          margin-left: -3px;
          height: 30px;
          width: 179px;
        }
        /* 2. negociacion / tercer titulo (texto unidades) */

        /* 2. negociacion / cuarto titulo (div checkboxs) */

        /* 2. negociacion / cuarto titulo (input text de la opcion Otros) */
        #textotros{
          border:solid 1px #A0FF24;
          margin-left: 10px;
          height: 28px;
          width: 132px;
          max-width:132px;
        }

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
        /* 2. negociacion / precio unitario precio a convenir */
        #punit_pconv {
          clear: both; 
          float: left; 
          height: auto; 
          margin: 0; 
          width: auto;
        }
        /* 2. negociacion / precio maximo a pagar */
        #pmax_pagar {
          margin: 2em 0 1em; 
          clear: both; 
          float: left; 
          clear: both; 
          float: left; 
          background: white; 
          height: auto; 
          width: 529px;
        }

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
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
        #combo, #combo_m, #combo_d {
          border:solid 1px #A7A7A7;
          margin-left: -72px;
          margin-top: 2px;
          height: 28px;
          width: 133px;
          font-size: 13px;
          color: #A5A5A5;
        }
        /* 3. Informacion Complementaria / tercer titulo (input text) */
        #ubicacion{
          border:solid 1px #A0FF24;
          margin-left: -72px;
          height: 29px;
          width: 132px;
        }
        /* 3. Informacion Complementaria / boton azul publicar oferta */
        #espacio15{
          background: #ffffff;
          height: auto;
          width: auto;
          cursor: pointer;
          margin: 3em 0 0 0; 
          clear: both; 
          float: left;
        }
        #espacio15_boton {
          border: 0; 
          background-color: transparent;
          clear: both;
        }

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
        /* aside derecho (texto) */
        #es99{
          float: left;
          color: #1dabe8;
          font-family: Arial;
          font-size: 13px;
          margin-top: 5px;
          font-weight: bold;
          margin-left: 30px;
        }

        #contenido_cuerpo{
          margin-top: 10px; 
          height: auto; 
          background:#ffffff;
        }

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
        #div_formapago_checkbox {
          background:transparent; 
          height: 151px; 
          margin-right: 101px; 
          width: auto;
          clear: both;
        }
        #div_formapago_checkbox1 {
          margin-left: 8.7em;
          width: auto;
          height: auto;
          float: left;
        }
        #div_formapago_otropago {
          float: left; 
          width: auto; 
          height: auto;
          margin-left: 4em;
        }

        #contenido_cuerpo_2 {
          padding: 10px 10px 10px 25px;
        }
      </style>

    <!-- estilos css resolucion 1280 -->
      <style>
        @media screen and (min-width: 1280px) and (max-width: 1365px) {
          .container_12 {
            width: auto;
          }

          #he {
            width: 1032px;
            max-width: 1032px;
          }

          #es4 {
            clear: both;
            float: left;
            width: auto;
          }
        }
      </style>

    <!-- estilos css resolucion 1024 -->
      <style>
        @media screen and (max-width: 1279px) {
          .container_12 {
            max-width: 1005px;
          }

          #he_1 {
            margin-left: -20px;
          }
          #he {
            width: 800px;
            max-width: 800px;
            padding-left: 6px;
          }

          #div1 {
            margin-left: 2px;
            width: 180px;
          }
          #div1 img {
            width: 175px;
          }
          #div1 div {
            height: auto;
          }

          #div2 {
            width: 795px;
            margin-right: 0px;
          }
          #contenido_cuerpo_2 {
            padding: 10px 0px 10px 0px;
          }

          #es2 {
            /*margin-left: 5px;*/
          }
          #es2_desc {
            clear: both;
            margin-left: 0;
            margin: 0;
            height: auto;
            padding-left: 2.5em;
          }

          #es4_desc {
            margin-left: 1.9em;
          }

          #agregar {
            margin: 0em 0.5em 1em 0.5em;
            width: 70px;
            float: left;
            font-size: 13px;
          }
          #eliminar {
            margin: 0em 0.5em 1em 0.5em;
            width: 70px;
            clear: both;
            font-size: 13px;
          }

          #botonesfoto {
            margin-left: -8px;
          }
          #botonesfoto #fotoP {
            display: none;
          }

          #header_opciones_punit_pconv {
            margin-left: -22px !important;
          }

          #div_precioporunidad, #div_pmin_tent_csum, #div_formapago, #div_formapago_checkbox {
            margin-left: 1.5em;
            width: 722px;
          }
          #div_formapago_checkbox1 {
            margin-left: 0;
          }
          #div_formapago_otropago {
            margin: 2em 0 0 0;
          }

          #div_formapago {
            margin-top: 1.5em;
          }
        }
      </style>

    <!-- area de subida de fotos del producto -->
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
          height: 39px;
          margin-top: -8px;
          margin-left: 8px;
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

    <!-- mini estilo para los checkbox de forma de pago -->
      <style type="text/css">
        .ac-custom svg {
          background: #f3f3f4;
        }
      </style>
  </head>

  <body>
    <div class="container_12" align= "center"> 
      <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->     
      <!-- header -->
        <header class="grid_1" id="he_1">
          <a href="<?= base_url() ?>index"> <img src="<?= base_url() ?>img/logo3.png" style="float: left;" /></a>
        </header> 
        <header class="grid_1" id="he">
          <table width="auto" height="auto" style="border-spacing: 0px;"> <tr> <td>
            <div style="padding: 4px 0px 4px 0px;"> <table style="border-spacing: 0px;"> <tr>
              <td class="header_iconos"> <a href="<?= base_url() ?>tablero_usuario"> Inicio </a> </td>
              <!-- separador -->
              <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
              </td>
              <!-- separador -->
              <td class="header_iconos"> <a href="<?= base_url() ?>mensajes_usuario"> Mensajes </a> </td>
              <!-- separador -->
              <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
              </td>
              <!-- separador -->
              <td class="header_iconos"> <a href="<?= base_url() ?>contactos"> Contactos </a> </td>
              <!-- separador -->
              <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
              </td>
              <!-- separador -->
              <td class="header_iconos activo"> <a href="<?= base_url() ?>publicar_producto"> Productos </a> </td>
              <!-- separador -->
              <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
              </td>
              <!-- separador -->
              <td class="header_iconos"> <a href="#"> Busco/Compro </a>  </td>
              <!-- separador -->
              <td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
              </td>
              <!-- separador -->
              <td class="header_iconos" style="width: 327px;">
                <table width="100%" style="height: 50px; background-color: #f1f1f1; border-spacing: 0px;"> <tr>
                  <td style="padding-top: 15px; padding-left: 70px; width: 50px;"> <img src="<?= base_url() ?>img/logouser.png" /> </td>
                  <td style="padding-top: 15px; width: 100px;"> 
                    <p id="usuactual" style="font-size: 18px;"> <a href="#" style="color: #ff7f27;"> <?= $this->session->userdata('usuario'); ?> </a> </p> 
                  </td>
                  <td style="padding-top: 17px;">
                    <a href="/proveedor/logueo/logout" title="Cerrar Sesión" style="font-size: 12px;">Cerrar Sesión</a>
                  </td>
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
                <a href="panel2.html"><img src="<?= base_url() ?>img/publicarofert_2.png" /></a> 
              </div>
              <div class="grid_2 alpha" style="margin-top: 26px;">
                <a href="<?= base_url() ?>organizar_ofertas"><img src="<?= base_url() ?>img/orga.png" /></a>
              </div>
            </div>

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
          <!-- contenido -->
          <div class="grid_4" id="div2">
            <div class="grid_2 alpha" style="" id="contenido_cuerpo">
              <div class="grid_2 alpha" 
                 style="margin-top: -13px; height: auto; background: transparent; margin-left: 0; float: left; clear: both;">
                <h1>Crear una solicitud de producto o servicio</h1>
              </div>
              <div id="contenido_cuerpo_2">
                <!--- editar css del formulario -->
                <style type="text/css">
                  form.ac-custom {
                    width: auto;
                    max-width: none;
                    padding: 0 0 0 1.6em;
                    margin: 0;
                  }
                </style>

                <?php
                //En la variable $atributos se almacena en un array los atributos que se necesitan en el formulario
                $atributos = array('class' => 'ac-custom ac-checkbox ac-checkmark', 'autocomplete' => 'off',
                  'id' => 'default-behavior', 'novalidate' => 'novalidate');
                ?>
<?= form_open_multipart('publicar_oferta', $atributos); ?>

                <!-- 1. informacion basica -->
                <div class="grid_2" id="es1" style="height: auto; margin-left: 0; margin-top: 0.4em;">
                  <p id="es11" style="margin: 0;">1. Información Básica</p>
                </div>
                <br><br><br>
<?php if ($this->session->flashdata('oferta_registrada')) { ?>
                  <div class="exito_mensajes"><h3><?= $this->session->flashdata('oferta_registrada') ?></h3></div>
                  <br>
<?php } ?>

                <!-- 1. informacion basica / nombre del producto -->
                <div class="grid_2" id="es2" style="margin: 0 1em 0 0; height: auto;"> 
                  <p id="es22" style="text-align: left; width: 13em;"> Nombre del Producto o <font color="red" style="font-size: 16px;">*</font> servicio a solicitar</p></div>
                <div class="grid_2" id="es2" style="height: auto; margin-left: -11px; margin-top: 7px;"> 
                  <input type="text" id="es3" name="nombre" style="margin-left: 0px;" value="<?php echo set_value('nombre'); ?>"/> 
<?php echo form_error('nombre', '<div class="error">', '</div>'); ?>
                </div>   
                <div style="background: transparent; height: auto; margin: 0.5em 0 0 10.8em; width: 498px; clear: both; float: left;">
                  <p style="font-size: 13px; color:#A8ABB4; float: left;">
                    Ingresa el nombre completo del producto con sus especificaciones técnicas.</p> 
                  <p style="font-size: 13px; float: left; color: #77758D;">
                    Ej. Bota de seguridad PU bidensidad inyectada marca JM</p>   
                </div>
                <br><br>

                <!-- 1. informacion basica / escoja la categoria y subcategoria -->
                <div class="grid_2" id="es4" style="margin: 2em 0 0 0; clear: both; float: left; width: auto;">
                  <p id="es44" style="margin-top: 0;">
                    Escoja la Categoría y Subcategoría 
                    <font color="red" style="font-size: 16px;"pre>*</font> </p></div>
                <div style="background:transparent; height: auto; clear: both; width: auto; float: left;">
                  <p style="font-size: 13px; float: left; color:#A8ABB4;">
                    Selecciona una categoría, luego una subcategoría y click en Agregar.</p> 
                </div>
                <div style="clear: both; float: left; height: auto; margin-top: 1em;">
                  <select name="menu" size="3" id="textarea1" style="float: left;">
                    <?php foreach ($categoria as $fila) { ?>
                      <option value="<?= $fila->id_categoria ?>"><?= $fila->nombre_categoria ?></option>
<?php } ?>
                  </select>
                  <div id="flecha_union_cat_subcat" style="display: none;">
                    <img src="<?= base_url() ?>img/pag_siguiente_ok.png">
                  </div>
                    <!-- <select name="menu" size="3" id="textarea2" 
                    style="border: 1px solid #DDDDDD; float: left;">                      
                    </select> -->
                  <div name="menu" id="textarea2" class="textarea2" 
                     style="overflow-y: scroll; display: none"></div>

                  <div class="grid_2" id="botones">
                    <div style="display: table-cell; vertical-align: middle;">
                      <input type="button" value="Agregar"  style="display: none;" id="agregar" >
                      <input type="button" value="Modificar" style="display: none;" id="eliminar">
                    </div>
                  </div>
                  <!-- <div style="background: #f6f6f6; float: left; margin: 0; width: 11em; height: 12.5em;">
                     <br>
                     <div style="background: transparent; height: 20px;width: 137px; text-align: -webkit-auto; color:#7f7f7f; font-weight: bold; font-size: 13px;">
                     <p>Seleccionado:</p>
                     </div>
                     <div style="background: transparent; height: 20px;width: 86px; margin-top: 17px; margin-left: -35px; text-align: -webkit-auto; color:#7f7f7f; font-weight: bold; font-size: 13px;">
                     <p>Categoria:</p>
<?php echo form_error('categoria', '<div class="error">', '</div>'); ?>
                     </div>
                     <div style="background: transparent; height: 20px; width: 86px; margin-top: 2px; margin-left: -35px; text-align: -webkit-auto;">
                     <input type="text" style="width: 111px; border: none; height: 24px;" name="categoria" value="<?php echo set_value('categoria'); ?>"/>
                     </div>
                  <!-- segunda parte --> <!-- 
                   <div style="background: transparent; height: 20px; width: 98px; margin-top: 25px; margin-left: -23px; text-align: -webkit-auto; color:#7f7f7f; font-weight: bold; font-size: 13px;">
                    <p>Subcategoria:</p>
<?php echo form_error('subcategoria', '<div class="error">', '</div>'); ?>
                  </div>
                  <div style="background: transparent; height: 20px; width: 86px; margin-top: 2px; margin-left: -35px; text-align: -webkit-auto;">
                    <input type="text" style="width: 111px; border: none; height: 24px;" name="subcategoria" value="<?php echo set_value('subcategoria'); ?>"/>
                  </div>
                 </div> -->
                  <div id="cat_subcat" style="display: none;">
                    <div style="background: transparent; height: auto; width: auto; text-align: left; color: #7f7f7f;">
                      <p>Seleccionado:</p>
                    </div>
                    <div style="background: transparent; height: auto; width: auto; margin: 1.1em 0 0 0.6em; text-align: left; color: #7f7f7f;">
                      <p>Categoria:</p>
<?php echo form_error('categoria', '<div class="error">', '</div>'); ?>
                    </div>
                    <div style="background: transparent; height: auto; width: auto; margin: 0.3em 0 0 0.6em; text-align: left;">
                      <input type="hidden" readonly id="categoria" 
                           style="/*display: none;*/ width: 129px; border: none; height: 24px; background: transparent; font-weight: bold;" 
                           name="categoria" value="<?php echo set_value('categoria'); ?>" /> 

                      <div style="width: 129px; border: none; height: auto; background: transparent; font-weight: bold;">
                        <p id="cat_selecc" style="max-height: 32px; overflow: hidden;"> 
<?php echo set_value('categoria'); ?> </p>
                      </div>

                    </div>
                    <div style="background: transparent; height: auto; width: auto; margin: 1.5em 0 0 0.6em; text-align: left; color: #7f7f7f;">
                      <p>Subcategoria:</p>
<?php echo form_error('subcategoria', '<div class="error">', '</div>'); ?>
                    </div>
                    <div style="background: transparent; height: auto; width: auto; margin: 0.3em 0 0 0.6em; text-align: left;">
                      <input type="hidden" readonly id="subcategoria"
                           style="/*display: none;*/ width: 129px; border: none; height: 24px; background: transparent; font-weight: bold;" 
                           name="subcategoria" value="<?php echo set_value('subcategoria'); ?>"/>

                      <div style="width: 129px; border: none; height: auto; background: transparent; font-weight: bold;">
                        <p id="subcat_selecc" style="max-height: 64px; overflow: hidden;"> 
<?php echo set_value('subcategoria'); ?> </p>
                      </div>
                      <!--  -->
                    </div>
                  </div>
                </div>
                <div class="grid_2" style="width: auto; height: auto; margin: 1em 0 0 31px; clear: both; float: left;">
                  <div style="float: left;">
                    <label class="error" for="categoria" generated="true" 
                         style="left: 0%; position: relative; margin-top: 1em;"></label>
                  </div>
                  <div style="float: left; margin-left: 3em;">
                    <label class="error" for="subcategoria" generated="true"
                         style="left: 0%; position: relative; margin-top: 1em;"></label>
                  </div>
                </div>

                <!-- 1. informacion basica / descripcion del producto -->
                <div class="grid_2" id="es5">
                  <p id="es55" style="margin: 0;">
                    Descripcion del Producto <font color="red" style="font-size: 16px;">*</font> </p>
<?php echo form_error('descripcion', '<div class="error">', '</div>'); ?>
                </div>
                <div style="background: transparent; width: auto; clear: both; float: left; height: auto;"> 
                  <textarea id="textarea3" name="descripcion"><?php echo set_value('descripcion'); ?></textarea> 
                  <p id="textarea3_car" 
                     style="clear: right; font-size: 13px; color:#A8ABB4; float: left; margin: 0;"></p>
                  <label class="error" for="textarea3" generated="true"
                       style="clear: both; /*position: relative; left: 10%;*/ margin-top: 2em;"></label>
                </div>

                <!-- 1. informacion basica / fotos del producto -->
                <!-- <div class="grid_2" id="es6" style="clear: both; margin-left: 0px; margin-top: 2.5em;"> 
                  <p id="es66" style="margin-top: 0px;">Fotos del Producto</p>
<?php echo '<div class="error">' . $error . '</div>'; ?>
                </div> -->
                <!-- area de subida de fotos del producto -->
                <!-- no se puede mostrar la ruta completa de la foto pues ademas de ser innecesario, -->
                <!-- es una funcion de seguridad que tienen los exploradores de internet -->
                <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>-->
                <!-- <style type="text/css">
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
                  height: 39px;
                  margin-top: -8px;
                  margin-left: 8px;
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
                <div class="grid_2" id="botonesfoto" style="margin: 0.7em 0 0; height: auto; width: auto;">
                  <table width="auto"> <tr>
                  <td> <input type="text" id="fotoP" name="fotoP" style="margin-left: 0; margin-right: 1em;" /> </td>
                  <td>
                    <div class="custom-input-file" style="margin: 0; height: 30px;">
                    <input type="file" class="input-file" id="file_upfile"  onchange="obtieneruta()" name="userfile" />
                    <p style="font-size: 16px; margin-top: -0.5em;">Agregar</p>
                    <div class="archivo">...</div>
                    </div>
                  </td>
                  <td> <input type="button" value="Eliminar" id="eliminar1" style="height: 30px; margin: 0 0 0 0.5em;"> </td>
                  <td>
                     <textarea style="margin: 0 0 0 1.5em; border: none; resize: none; background: #f6f6f6; height: 95px; width: 400px;"></textarea>
                     <div style="background:transparent; width: 400px; height: 23px; margin: 0 0 0 1.5em; text-align: center;">
                     <b style="margin: 0; font-size: 13px; font-weight: bold; color: #7f7f7f; ">Imágenes Agregadas (5 máximo)</b>
                     </div>
                  </td>
                  </tr> </table>
                </div> -->
                <div style="clear: both; background: transparent; height: auto; width: 97%; float: left; margin-top: 2em;">
                  <div style="background: transparent; height: auto; width: auto;">
                    <div class="grid_2" id="es6" style="height: auto; margin: 0;"> 
                      <p id="es66">Fotos del Producto</p>
                      <!-- <?php echo '<div class="error">' . $error . '</div>'; ?>  -->
                    </div>

                    <div class="grid_2" id="botonesfoto">
                      <table width="auto"> <tr>
                          <td> <input type="text" id="fotoP" readonly /> </td>
                          <td>
                            <div class="custom-input-file">
                              <input type="file" class="input-file" id="btn_archivos" name="userfiles[]" multiple />
                              <p style="font-size: 16px; margin-top: -2px;">Agregar</p>
                              <div class="archivo">...</div>
                            </div>
                          </td>
                          <td> <input type="button" value="Eliminar" id="eliminar1"> </td>
                          <td>
                            <!-- vista previa de las fotos -->
                            <div id="preview"></div>
                            <div style="background: transparent; width: 400px; height: auto; margin: 3px 0 0 46px;">
                              <p id="result">Imágenes Agregadas (5 máximo)</p>
                            </div>
                          </td>
                        </tr> </table>
                    </div>
                  </div>
                </div>

                <!-- 1. informacion basica / palabra clave -->
                <!-- <div class="grid_2" id="es7" style="margin: 2.5em 0 0; clear: both;">
                  <p id="es77" style="margin: 0;">Palabra Clave</p>
                </div>
                <div class="grid_2" id="botonesclave" style="clear: both; float: left; height: auto; margin: 0.7em 0 0;">
                  <input type="text" id="Pclave" name="Pclave" style="margin: 0; float: left;" />
                  <input type="button" value="Agregar"  style="float: left; cursor: pointer; height: 30px; margin-left: 0.5em;" id="agregar2">
                  <input type="button" value="Eliminar" style="float: left; cursor: pointer; height: 30px; margin-left: 0.5em;" id="eliminar2">
                  <div style="background: transparent; margin: 0.5em 0 0; width: 329px; height: auto; float: left; clear: left;">
                  <p style="text-align: left; clear: left; font-size: 13px; color: #A8ABB4;">Ingresa la palabra clave y da click en Agregar</p>
                  <p style="text-align: left; font-size: 13px; color: #A8ABB4;">Ej. Zapatos en cuero, Zapatos para dama</p>
                  </div>
                  <div style="background: #f7f7f7; margin: 0.5em 0 0; width: 28em; clear: left; height: auto; float: left;">
                  <p style="margin: 0; text-align: left; font-size: 13px; color: #A8ABB4;">
                    Las "Palabras Clave" hacen que la solicitud sea más visible a los proveedores.</p>
                  </div>    
                </div>
                <textarea id="textarea4" name="etiquetas" 
                  style="border: none; resize: none; margin: 4.1em 0 0; margin:0; float:right;"></textarea> -->
                <div class="grid_2" id="Pclave_contenedorgeneral">
                  <div class="grid_2" id="es7">
                    <p id="es77">Palabra Clave</p>
                    <?php echo form_error('etiquetas', '<div class="error">', '</div>'); ?>
                  </div>
                  <div class="grid_2" id="botonesclave">
                    <div class="grid_2" style="height: auto; width: auto; margin: 0;">
                      <input type="text" id="Pclave" >
                    </div>
                    <input type="hidden" id="qwerty" name="etiquetas"> 
                    <div style="background: transparent; width: 329px; margin-top: 10px; clear: both; float: left;">
                      <p style="font-size: 13px; color: #A8ABB4;text-align: left;">
                        Ingresa la palabra clave y pulsa la tecla Enter </p>
                      <p style="text-align: -webkit-auto; font-size: 13px; color: #A8ABB4;text-align: left;">
                        Ej. Zapatos en cuero, Zapatos para dama</p>
                    </div>
                    <div style="background: #f7f7f7; width: 386px; margin-top: 9px; height: 37px; clear: both; float: left;">
                      <p style="text-align: left; font-size: 13px;margin-left: 12px; color: #A8ABB4;">
                        Las "Palabras Clave" ayudan a los compradores a encontrar su producto con mayor facilidad</p>
                    </div>
                  </div>
                </div>

                <!-- 2. negociacion -->
                <div class="grid_2" id="es1" style="margin: 2.5em 0 0;">
                  <p id="es11" style="margin: 0;">2. Negociación</p>
                </div>

                <!-- 2. negociacion / cantidad requerida -->
                <div style="clear: both; float: left; height: auto; margin: 0.5em 0 0; background: transparent; border-bottom: 1px dashed #c3c3c3; width: 722px;">
                  <div style="background: white; height: auto; width: 529px; margin: 0 0 1em; float: left;">
                    <p style="text-align: left;  float: left; font-weight: bold; margin: 0; color: #7f7f7f; font-size:14px;">
                      Cantidad requerida</p>
<?php echo form_error('cantidad', '<div class="error">', '</div>'); ?>
                    <b style="margin: 0 0 0 0.3em; float: left; color: red; font-size: 17px;">*</b>
                    <div style="clear: right; float: left; margin: 0 0 0 2em;">

                      <input type="text" style="float: left; height: 28px; width: 124px;"
                           id="cantidad_format" value="<?php echo set_value('cantidad'); ?>"/>
                      <input type="hidden" style="float: left; height: 28px; width: 124px;" readonly
                           id="cantidad" name="cantidad" value="<?php echo set_value('cantidad'); ?>"/>

                      <script>
                        $(document).ready(function () {
                          $("#cantidad_format").on('input', function() {
                            cantidad=$("#cantidad_format").val();
                            console.log(cantidad);
                            $("#combo1").load("<?php echo base_url() ?>publicar_producto/unidad_medida/"+cantidad);
                          });
                          $("#combo1").load("<?php echo base_url() ?>publicar_producto/unidad_medida/");
                        });
                      </script>

                      <div style="margin: 0 0 0 1em; clear: right; float: left;">
                        <select id="combo1" name="list_medida" 
                            style="text-transform: capitalize; font-size: 13px; margin: 0; height: 28px; width: 6.5em;">

                        </select>       
                      </div>
                      <div style="width: 129px; clear: both; float: left; margin: 0;">
                        <p style="text-align: left; font-size: 13px; color: #A8ABB4;">Ingrese la cantidad</p>
                        <p style="text-align: left; font-size: 13px; color: #A8ABB4;">Ej. 1.000</p>
                      </div>
                    </div>
                  </div>
                </div>
                <label class="error" for="precio1" generated="true" style="margin-top: -8em;"></label>

                <div style="margin: 1em 0 0; clear: both; float: left; background: transparent; border-bottom: 1px dashed #c3c3c3; height: auto; width: 722px;">
                  <!-- 2. negociacion / precio unitario, precio a convenir -->
                  <div id="punit_pconv">
                    <b style="color: #7f7f7f; font-size:14px; float: left; clear: both;">Precio unitario</b> 
                    <input type="radio" name="rd_precio" value="precioUni" id="precioUni" checked="checked" 
                         style="float: left; margin: 0 6em 0 0.5em; height: 16px; width: 17px;"/>
                    <b style="color: #7f7f7f; font-size:14px; float: left;">Precio a convenir</b> 
                    <input type="radio" name="rd_precio" value="precioconvenir" id="precioconvenir" 
                         style="float: left; margin: 0 6em 0 0.5em; height: 16px; width: 17px;"/> 
                  </div> 

                  <!-- 2. negociacion / precio maximo a pagar -->
                  <div id="pmax_pagar">
                    <p style="font-weight: bold; margin: 0 0.3em 0 0; float: left; color: #7f7f7f; font-size:14px;">
                      Precio máximo a pagar
                    </p>
<?php echo form_error('precio', '<div class="error">', '</div>'); ?>
                    <b style="margin: 0; color: red; font-size: 17px; float: left;">*</b>
                    <div style="clear: right; float: left; margin: 0;">

                      <input style="float: left; height: 28px; width: 124px;"
                           type="text" id="precio_format" value="<?php echo set_value('precio'); ?>"/>
                      <input style="float: left; height: 28px; width: 124px;"
                           type="hidden" id="precio" name="precio" value="<?php echo set_value('precio'); ?>"/>

                      <p style="float: left; font-size: 13px; margin: 0 1em; font-size: 13px;">por</p>
                      <div style="float: left; margin: 0;">
                        <input style="text-overflow: ellipsis; -o-text-overflow: ellipsis; margin: 0; float: left; height: 28px; background: rgb(218, 218, 218);width: 133px; border: 1px solid #A5A5A5; text-align: center;" 
                             type="text" id="cantidad2" name="cantidad2" readonly="readonly" 
                             value="<?php echo set_value('cantidad2'); ?>" disabled="disabled"/>
                        <div style="float: left; margin: 0 0 0 1em;">
                          <input style="font-size: 13px; text-transform: capitalize; text-overflow: ellipsis; -o-text-overflow: ellipsis; height: 28px; background: rgb(218, 218, 218);width: 133px;border: 1px solid #A5A5A5; text-align: center;color:gray;" 
                               value="Unidades" type="text" readonly="readonly" name="unidades" disabled="disabled"/>
                        </div>
                      </div>
                      <div style="width: 129px; margin-top: 2px; margin-left: 0; float: left;">
                        <p style="text-align: left; clear: left; font-size: 13px; color: #A8ABB4;">Ingrese el precio</p>
                        <p style="text-align: left; clear: left; font-size: 13px; color: #A8ABB4;">Ej. 650.000</p>
                      </div>  
                    </div>
                  </div>
                </div>

                <!-- 2. negociacion / forma de pago, checkbox -->
                <div style="background: white; height: auto; width: 529px; margin: 1em 0 0; clear: left; float: left;">
                  <p style="text-align: left; font-weight: bold; margin: 0; color: #7f7f7f; font-size:14px; float: left;">Forma de Pago</p>
                  <b style="margin: 0 2em 0 0.3em; float: left; color: red; font-size: 17px;">*</b>
                  <div style="float: left; margin: 0;">
                    <p style="font-size: 14px; color: #A8ABB4; ">Selecciona una o varias de las opciones listadas</p>
<?php echo form_error('pago', '<div class="error">', '</div>'); ?>
                  </div>
                </div>
                <!-- <div style="margin: 1em 0 0 9.7em; float: left; background: transparent; height: 151px; width: 459px;"> -->
                <!--<form class="ac-custom ac-checkbox ac-checkmark" autocomplete="off"> -->
                <!-- <ul>
                  <li>
                  <input id="cb6" name="pago[]" type="checkbox">
                  <label for="cb6" style="margin-top: -18px; width: 303px; margin-left: -329px; font-size: 13px;">
                    Transferencia Bancaria</label></li>
                  <li style="margin-top: -17px;">
                  <input id="cb7" name="pago[]" type="checkbox">
                  <label for="cb7" style="margin-top: -18px; width: 303px; margin-left: -360px; font-size: 13px;">
                    Giros Nacionales</label></li>
                  <li style="margin-top: -17px;">
                  <input id="cb8" name="pago[]" type="checkbox">
                  <label for="cb8" style="margin-top: -18px; width: 303px; margin-left: -415px; font-size: 13px;">
                    Cheque</label></li>
                  <li style="margin-left: 245px; margin-top: -135px;">
                  <input id="cb9" name="pago[]" type="checkbox">
                  <label for="cb9" style="margin-top: -18px;width: 303px; margin-left: -169px; font-size: 13px;">
                    Efectivo</label></li>
                  <li style="margin-left: 245px; margin-top: -17px;">
                  <input id="cb9" name="pago[]" type="checkbox">
                  <label for="cb10" style="margin-top: -17px; width: 303px; margin-left: -132px; font-size: 13px;">
                    Contraentrega</label></li>
                  <li style="margin-left: 245px; margin-top: -17px;">
                  <input id="cb9" name="pago[]" type="checkbox">
                  <label for="cb11" style="margin-top: -17px; width: 303px; margin-left: -150px; font-size: 13px;">
                    A Convenir</label></li>
                </ul> -->
                <!--</form> -->
                <!-- </div> -->
                <!-- <script src="<?= base_url() ?>js/publicar/svgcheckbx.js"></script>
                <div style="background: transparent; height: 76px; margin: 3em 0 0; width: 150px; float: left;">
                  <p style="font-weight: bold; color: #7f7f7f; font-size:13px; ">Otra forma de Pago</p>
<?php echo form_error('otra', '<div class="error">', '</div>'); ?>
                  <input type="text" id="pminimo" name="otra" value=" <?php echo set_value('otra'); ?>"></input>
                </div> -->
                <div id="div_formapago_checkbox">
                  <ul style="margin-top: 1em;">
                    <div id="div_formapago_checkbox1">
                      <li style="width: auto; height: auto;"> 
                        <input id="cb6" name="pago[]" type="checkbox" value="Transferencia Bancaria" <?php echo set_checkbox('pago', 'Transferencia Bancaria', false) ?>>
                        <label for="cb6" style="margin: -1em 0 0 4em; font-size: 13px; width: auto; height: auto; clear: both; padding: 0; float: left;">Transferencia Bancaria</label></li>
                      <li style="margin-top: -17px; clear: both;">
                        <input id="cb7" name="pago[]" type="checkbox" value="Giros Nacionales" <?php echo set_checkbox('pago', 'Giros Nacionales', false) ?>>
                        <label for="cb7" style="margin: -1em 0 0 4em; font-size: 13px; width: auto; height: auto; clear: both; padding: 0; float: left;">Giros Nacionales</label></li>
                      <li style="margin-top: -20px;">
                        <input id="cb8" name="pago[]" type="checkbox" value="Cheque" <?php echo set_checkbox('pago', 'Cheque', false) ?>>
                        <label for="cb8" style="margin: -1em 0 0 4em; font-size: 13px; width: auto; height: auto; clear: both; padding: 0; float: left;">Cheque</label></li>
                    </div>
                    <div style="margin-left: 2em; width: auto; height: auto; float: left;">
                      <li style="width: auto; height: auto;">
                        <input id="cb9" name="pago[]" type="checkbox" value="Efectivo" <?php echo set_checkbox('pago', 'Efectivo', false) ?>>
                        <label for="cb9" style="margin: -1em 0 0 4em; font-size: 13px; width: auto; height: auto; clear: both; padding: 0; float: left;">Efectivo</label></li>
                      <li style="margin-top: -17px; clear: both;">
                        <input id="cb9" name="pago[]" type="checkbox" value="Contraentrega" <?php echo set_checkbox('pago', 'Contraentrega', false) ?>>
                        <label for="cb10" style="margin: -1em 0 0 4em; font-size: 13px; width: auto; height: auto; clear: both; padding: 0; float: left;">Contraentrega</label></li>
                      <li style="margin-top: -20px;">
                        <input id="cb9" name="pago[]" type="checkbox" value="A Convenir" <?php echo set_checkbox('pago', 'A Convenir', false) ?>>
                        <label for="cb11" style="margin: -1em 0 0 4em; font-size: 13px; width: auto; height: auto; clear: both; padding: 0; float: left;">A Convenir</label></li>
                    </div>
                    <ul>
                      </div>
                      <script src="<?= base_url() ?>js/publicar/svgcheckbx.js"></script>

                      <div style="background:transparent; height: 76px; margin: -125px 0 12px 442px; width: auto;">
                        <div class="grid_2" id="div_formapago_otropago">
                          <p style="color: #7f7f7f; font-size:13px; ">Otra forma de Pago</p>
<?php echo form_error('otra', '<div class="error">', '</div>'); ?>
                          <input type="text" id="pminimo" name="otra" value="<?php echo set_value('otra'); ?>"></input>
                        </div>
                        <div class="grid_2" style="float: right; width: auto; height: auto;">
                          <label class="error" for="pago[]" generated="true"></label>
                        </div>
                      </div>

                      <!-- 3. informacion complementaria -->
                      <div class="grid_2" id="es1" style="clear: both; float: left; margin: 2em 0 0;">
                        <p id="es11" style="margin: 0;">3. Informacion complementaria</p>
                      </div>

                      <!-- 3. informacion complementaria / vigencia de la solicitud, calendario -->
                      <!-- <div style="background: transparent; width: 12em; clear: both; float: left; margin: 0.5em 0 0;"> 
                        <p style="float: left; color: #7f7f7f; font-size: 14px; font-weight: bold; text-align: left;">Vigencia de la solicitud</p>
                        <b style="margin: 0 0 0 0.3em; float: left; color: red; font-size: 17px;">*</b>
                      </div>
                      <div style="background: transparent; width: 326px; height: 37px; margin: 0.5em 0 0; float: left; clear: right;"> -->
                      <!-- parte de la fecha --> 
                      <!-- <input type="text" name="datepicker" id="datepicker" readonly="readonly" placeholder="Especifique la fecha de vencimiento de la solicitud" style="width: 292px; margin-right: 0.7em;" class="text_placeholder" value="<?php echo set_value('datepicker'); ?>"/>
<?php echo form_error('datepicker', '<div class="error">', '</div>'); ?> 
                      <!-- el siguiente css es para el tamaño de fuente y color del texto del placeholder -->
                      <!-- <style type="text/css">
                        /* WebKit browsers */
                        input.text_placeholder::-webkit-input-placeholder { 
                          font-size: 9pt; color: gray;
                        }
            
                        /* Mozilla Firefox 4 to 18 */
                        input.text_placeholder:-moz-placeholder { 
                          font-size: 9pt; color: gray;
                        }
            
                        /* Mozilla Firefox 19+ */
                        input.text_placeholder::-moz-placeholder { 
                          font-size: 9pt; color: gray;
                        }
            
                        /* Internet Explorer 10+ */
                        input.text_placeholder:-ms-input-placeholder {
                          font-size: 9pt; color: gray;
                        }
                      </style> -->

                    <!-- <img src="<?= base_url() ?>img/calendar68.png" id="selector" style="width: 27px; margin-left: 299px; margin-top: -46px;" /> -->
                    <!-- <p style="font-size: 13px; color: #A8ABB4; margin-top: -15px;">Especifique la fecha de vencimiento de la solicitud</p> -->

                      <!-- script que define y configura el calendario 
                      <script type="text/javascript">
                        window.onload = function() {
                        Calendar.setup({
                          inputField: "fecha",
                          ifFormat:   "%Y-%m-%d",
                          button:     "selector"
                        });
                        }
                      </script>-->
                      <!-- </div> -->

                      <!-- 3. informacion complementaria / lugar de entrega -->
                      <div style="background: transparent; width: auto; clear: both; float: left; margin: 0;"> 
                        <p style="color: #7f7f7f;font-size: 14px; font-weight: bold; text-align: left; float: left;">Lugar de entrega</p>
                        <b style="margin: 0 2em 0 0.3em; float: left; color: red; font-size: 17px;">*</b>
                        <div style="background: transparent; width: 315px; height: 37px;  margin: 0 0 0 1em; float: left;">

                          <select id="combo_d" name="departamento" style="color: #000; float: left; margin: 0 1em 0 0;" class="provincia inputbox">
                            <!-- <option value="Departamento" <?php echo set_select('departamento', 'Departamento'); ?>>Departamento</option>
                            <option value="Valle" <?php echo set_select('departamento', 'Valle'); ?>>Valle</option>
                            <option value="Antioquia" <?php echo set_select('departamento', 'Antioquia'); ?>>Antioquia</option>
                            <option value="Cundi" <?php echo set_select('departamento', 'Cundi'); ?>>Cundi</option> -->
                            <option value="">Selecciona tu departamento</option>
                                <?php foreach ($dept as $fila) { ?>
                              <option value="<?= $fila->id_departamento ?>" 
                                  <?php echo set_select('departamento', $fila->id_departamento); ?> ><?= $fila->nombre ?></option>
<?php } ?>
                          </select>

                          <select id="combo_m" name="municipio" style="display: none; color: #000; float: left; margin: 0;" class="municipio inputbox">
                            <option value="">--Municipios--</option>                        
                            <?php if ($municipios) { ?>
                                  <?php foreach ($municipios as $row) { ?>
                                <option value="<?= $row->id_municipio ?>" 
                                    <?= set_select('municipio', $row->id_municipio); ?>><?= $row->municipio ?></option>
  <?php }
} ?> 
                          </select>
                        </div>
                      </div>

                      <!-- boton enviar formulario -->
                      <div class="grid_2" id="espacio15">
                        <button type="submit" id="espacio15_boton">
                          <img src="<?= base_url() ?>img/boton_solicitar.png" />
                        </button>
                      </div>
<?= form_close() ?> <!--Esta etiqueta cierra el formulario --> 
                      </div> <!--fin del div que maneja el contenido de la apgina -->
                      </div> <!--fin del div que maneja el cuerpo del sscontenido -->
                      </div>
                      </section> </article>
                      </div>

                      <!-- sistema de validaciones con jquery -->
                      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
                      <script type="text/javascript" async>
                                  $(document).ready(function () {
                                    $("#default-behavior").validate({
                                      //validar todo, este o no hidden
                                      ignore: "",
                                      //especificar reglas 
                                      rules: {
                                        nombre: "required",
                                        categoria: "required",
                                        subcategoria: "required",
                                        descripcion: "required",
                                        btn_archivos: {
                                          required: true,
                                          extension: "jpeg|bmp|png"
                                        },
                                        cantidad: "required",
                                        precio: "required",
                                        'pago[]': "required", 
                                        municipio: "required"
                                      },
                                      //especificar mensajes para esas reglas
                                      messages: {
                                        nombre: "Nombre de la oferta obligatorio!",
                                        categoria: "Categoría no especificada!",
                                        subcategoria: "Subcategoría no especificada!",
                                        descripcion: "Descripción de la oferta  obligatoria!",
                                        cantidad: "Cantidad requerida obligatoria!",
                                        precio: "Precio obligatorio!",
                                        'pago[]': "Especifique al menos una forma de pago!", 
                                        municipio: "Seleccione un departamento y un municipio"
                                      },
                                      submitHandler: function (form) {
                                        form.submit();
                                      }
                                    });

                                    //editar los mensajes predeterminados
                                    jQuery.extend(jQuery.validator.messages, {
                                      required: "Campo obligatorio!"
                                    });
                                  });
                      </script>
                      </body>
                      </html>