/* JS file that contains javascript/jquery scripts */
/* for publicar_producto view */

//pictures management script (part 1)
  var ruta = base_url + "/upload/imagen";
  var id_multipart_for = "#default-behavior";

  var id_boton_examinar = "#btn_archivos";
  var id_boton_examina = "btn_archivos";

  var id_boton_examinar_avan = "#btn_archivos_avanzado";
  var id_boton_examina_avan = "btn_archivos_avanzado";

  var id_boton_subir = "#subir";
  var id_div_preview = "#preview";
  var id_div_resultado = "#result";

  var id_boton_subir_avan = "#subir";
  var id_div_preview_avan = "#preview_avanzado";
  var id_div_resultado_avan = "#result_avanzado";

//keywords script http://xoxco.com/projects/code/tagsinput/ (part 1)
  function onAddTag(tag) { alert("Palabra clave nueva: " + tag); }
  function onRemoveTag(tag) { alert("Palabra clave eliminada: " + tag); }
  function onChangeTag(input,tag) { alert("Cambió una palabra clave: " + tag); }

//words counter for "descripcion del producto" textarea (part 1)
  function init_contadorTa(idtextarea, idcontador, max) {
    $("#" + idtextarea).keyup(function() { updateContadorTa(idtextarea, idcontador, max); });
    $("#" + idtextarea).change(function() { updateContadorTa(idtextarea, idcontador, max); });
  }
  function updateContadorTa(idtextarea, idcontador, max) {
    var contador = $("#" + idcontador);
    var ta = $("#" + idtextarea);
    //contador.html("0/" + max);
    contador.html("<b>" + (5000 - (ta.val().length)) + "</b> palabras máximo");
    if (parseInt(ta.val().length) > max) {
      ta.val(ta.val().substring(0, max - 1));
      contador.html("<b>" + (5000 - max) + "</b> palabras máximo");
    }
  }

$(document).ready(function() {
  //show sub-categories of a selected category
    $("#textarea1").change(function() {
      $("#textarea1 option:selected").each(function() {
        categoria = $('#textarea1').val();
        $.post(base_url+"publicar_producto/mostrar_subcategoria", {
          categoria: categoria
        }, function(data) {
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

  //action performed when select a sub-category
    $("#textarea2.textarea2").on("click", "div", function() {
      $('#textarea2.textarea2 div').css("background", "#fff");
      $(this).css("background", "#ddd");
      //clase ".selecc" para el div seleccionado
      $('#textarea2.textarea2 div').removeClass("selecc");
      $(this).addClass("selecc");

      $("#agregar").css("display", "inline-block");
      $("#cat_subcat").css("display", "none");
      $("#eliminar").css("display", "none");
    });

  //put in "seleccionados" selected category and sub-category
    $("#agregar").click(function() {
      var categoria = $("#textarea1 option:selected").text();
      var subcategoria = $("#textarea2.textarea2 div.selecc").text();
      $("#cat_selecc").text(categoria); //
      $('input[name=categoria]').val(categoria);
      $("#subcat_selecc").text(subcategoria); //
      $('input[name=subcategoria]').val(subcategoria);
    });

  //delete button in category/sub-category
    $("#eliminar").click(function() {
      $('input[name=categoria]').val("");
      $('input[name=subcategoria]').val("");
    });

  //recognize "agregar (categoria y subcategoria)" click
    $("#agregar").on("click", function() {
      $("#cat_subcat").css("display", "block");
      $("#eliminar").css("display", "block");
    });

  //recognize "eliminar (categoria y subcategoria)" click
    $("#eliminar").on("click", function() {
      $("#cat_subcat").css("display", "none");
    });

  //words counter for "descripcion del producto" textarea (part 2)
    //#textarea, #textoContador, num max de caracteres
    init_contadorTa("textarea3", "contador_textarea3", 5000);
    init_contadorTa("textarea4", "contador_textarea4", 5000);
  //set into precioPorUnidad input selected option
    $('#combo1').change(function() {
      var combo = $("#combo1 option:selected").text();
      $('input[name=medidas]').val(combo);
    });
  //set into precioPorUnidad input selected option
     $('#combo2').change(function() {
      var combo = $("#combo2 option:selected").text();
      $('input[name=medidas]').val(combo);
    });

  //number-format script for "precio" field
  //#precio1: user writes price and it's automatically formatted
  //#precio1_noformat: NON-formatted price, this is sended to DB, this is a hidden field
  //http://plugins.jquery.com/df-number-format/
    //number(true, cant. centavos, punto decimal, punto centavos)
     $('#precio1_format').number(true, 0, ",", ".");

    $("#precio1_format").blur(function() {
      var val = $('#precio1_format').val();
      $("#precio1").val(val);
    });

    $('#precio1_format_avanzado').number(true, 0, ",", ".");

    $("#precio1_format_avanzado").blur(function() {
      var val = $('#precio1_format_avanzado').val();
      $("#precio1_avanzado").val(val);
    });
    //validacion de numero para no permitir letras
    $('#pedido_min').number(true, 0, ",", ".");

    
  //pictures management script (part 2)
    // $(id_div_preview).html('');

    $(id_boton_examinar).on('change', function() {
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
          $(id_div_preview).append(
            '<div class="col-md-4 col-sm-4 col-xs-4">' + '<a href="#" class="thumbnail">' +
              '<img class="img-responsive" src="' + url + '" alt="' + name + '">' +
            '</a> </div>'
          );
          $(id_div_resultado).text("Imágenes Agregadas (5 máximo)");

          if (($("#preview img").length) > 5) {
            //error
            $("#preview div:last-child").remove(); //quitar el ultimo elemento
            $(id_div_resultado).css("color", "red");
            $(id_div_resultado).text("Máximo de fotos (5) alcanzado!");
          }
        }
        ;
      }
      ;
    });

$(id_boton_examinar_avan).on('change', function() {
      //$(id_div_preview).html('');
      //agregar fotos
      var paths = document.getElementById(id_boton_examina_avan).files;
      var navegador = window.URL || window.webkitURL;
      for (var i = paths.length - 1; i >= 0; i--) {
        var valid = true;
        size = paths[i].size;
        type = paths[i].type;
        name = paths[i].name;

        if (size > 1024 * 1024) {
          $(id_div_resultado_avan).text("El tamaño de la imagen es muy grande");
          valid = false;
        }
        ;
        if (type != 'image/jpeg' && type != 'image/png' && type != 'image/bmp') {
          $(id_div_preview_avan).append("El archivo " + name + " no es un tipo valido<br>");
          valid = false;
        }
        ;
        if (valid) {
          url = navegador.createObjectURL(paths[i]);
          $(id_div_preview_avan).append(
            '<div class="col-md-4 col-sm-4 col-xs-4">' + '<a href="#" class="thumbnail">' +
              '<img class="img-responsive" src="' + url + '" alt="' + name + '">' +
            '</a> </div>'
          );
          $(id_div_resultado_avan).text("Imágenes Agregadas (5 máximo)");

          if (($("#preview_avanzado img").length) > 5) {
            //error
            $("#preview_avanzado div:last-child").remove(); //quitar el ultimo elemento
            $(id_div_resultado_avan).css("color", "red");
            $(id_div_resultado_avan).text("Máximo de fotos (5) alcanzado!");
          }
        }
        ;
      }
      ;
    });

    $(id_boton_subir).on('click', function() {
      var form_data = new FormData($(id_multipart_for)[0]);
      $.ajax({
        url: ruta,
        type: "post",
        data: form_data,
        contentType: false,
        processData: false,
        success: function(datos) {
          $(id_div_resultado).html(datos);
        }
      });
    });

    $(id_boton_subir_avan).on('click', function() {
      var form_data = new FormData($(id_multipart_for)[0]);
      $.ajax({
        url: ruta,
        type: "post",
        data: form_data,
        contentType: false,
        processData: false,
        success: function(datos) {
          $(id_div_resultado_avan).html(datos);
        }
      });
    });

    //miniscript para eliminar la ultima foto puesta
    $("#eliminar1").on("click", function() {
      $("#preview div:last-child").remove(); //quitar el ultimo elemento
      $(id_div_resultado).text("Imágenes Agregadas (5 máximo)");
    });

    $("#eliminar2").on("click", function() {
      $("#preview_avanzado div:last-child").remove(); //quitar el ultimo elemento
      $(id_div_resultado_avan).text("Imágenes Agregadas (5 máximo)");
    });


  //keywords script http://xoxco.com/projects/code/tagsinput/ (part 2)
    $('#Pclave').tagsInput({
      width:'auto',
      defaultText: " "
    });

    //action performed when "precio unitario" is clicked
      $('#precioUni').change(function() {
      $("#titulo1").html('Precio por unidad <span id="asterisk" class="label label-default">*</span>');
      $("#seccion_precio").css("display", "block");
      $("#seccion_precio_por").css("display", "block");
      $("#precio1_format").prop("required", true);
      var validSettings = $("#default-behavior").validate().settings;
      validSettings.rules.precio = {required: true};
      validSettings.messages.precio = "Precio oblgatorio!";
    });
      //action performed when "precio unitario_avanzado" is clicked
      $('#precioUni_avanzado').change(function() {
      $("#titulo1_avanzado").html('Precio por unidad <span id="asterisk" class="label label-default">*</span>');
      $("#seccion_precio_avanzado").css("display", "block");
      $("#seccion_precio_por_avanzado").css("display", "block");
      $("#precio1_format_avanzado").prop("required", true);
      var validSettings = $("#default-behavior").validate().settings;
      validSettings.rules.precio_avanzado = {required: true};
      validSettings.messages.precio = "Precio oblgatorio!";
    });

  //action performed when "precio a convenir" is clicked
    $('#precioconvenir').change(function() {
      $("#titulo1").html('Seleccione unidad de medida <span id="asterisk" class="label label-default">*</span>');
      $("#seccion_precio").css("display", "none");
      $("#seccion_precio_por").css("display", "none");
     $("#precio1_format").prop("required", false);
     var validSettings = $("#default-behavior").validate().settings;
      delete validSettings.rules.precio;
      delete validSettings.messages.precio;
    });


 //action performed when "precio a convenir_avanzado" is clicked
    $('#precioconvenir_avanzada').change(function() {
      $("#titulo1_avanzado").html('Seleccione unidad de medida <span id="asterisk" class="label label-default">*</span>');
      $("#seccion_precio_avanzado").css("display", "none");
      $("#seccion_precio_por_avanzado").css("display", "none");
     $("#precio1_format_avanzado").prop("required", false);
     var validSettings = $("#default-behavior").validate().settings;
      delete validSettings.rules.precio;
      delete validSettings.messages.precio;
    });

  //load contents of "unidad de medida" into #combo1 select
    $("#combo1").load(base_url + "herramientas/unidad_medida");
    $("#combo1").removeProp('disabled');
    ////load contents of "unidad de medida" into #combo1 select
    $("#combo2").load(base_url + "herramientas/unidad_medida");
    $("#combo2").removeProp('disabled');

  //load contents of "tipo" and "sector" into #combo_tipo and #combo_sector respectively
    $("#combo_tipo").load(base_url + "publicar_producto/tipo_empresa/" + producto_tipo);
    $("#combo_tipo").removeProp('disabled');
    $("#combo_sector").load(base_url + "publicar_producto/sector_empresa/" + producto_sector);
    $("#combo_sector").removeProp('disabled');

  //jquery validation
    $("#default-behvior").validate({
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
        precio: "required",
        'pedido_min': "required",
        'tiempo_entrega': "digits",
        'capacidad': "required",
        'pago[]': "required"
      },
      //especificar mensajes para esas reglas
      messages: {
        nombre: "Nombre del producto obligatorio!",
        categoria: "Categoría no especificada!",
        subcategoria: "Subcategoría no especificada!",
        descripcion: "Descripción del producto obligatoria!",
        precio: "Precio obligatorio!",
        'pedido_min': "Pedido mínimo obligatorio!",
        'tiempo_entrega': "Tiempo de entrega obligatorio!",
        'capacidad': "Capacidad de suministro obligatoria!",
        'pago[]': "Especifique al menos una forma de pago!"
      },
      highlight: function(element) {
        //when error occurs
        $(element).closest('.input-control').addClass('has-error');
      },
      unhighlight: function(element) {
        //when error is solved
        $(element).closest('.input-control').removeClass('has-error');
      },
      submitHandler: function(form) {
        form.submit();
      }
    });

    //editar los mensajes predeterminados
    jQuery.extend(jQuery.validator.messages, {
      required: "Campo obligatorio!"
    });
}); //end of document.ready