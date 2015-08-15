$(document).ready(function() {
  //Script para mostrar departamentos y municipios
    $(".provincia").change(function () {
      var id = $(this).val();
      var dataString = 'id=' + id;
      $.ajax({
        type: "POST",
        url: (base_url + 'oferta/municipio_select'),
        data: dataString,
        cache: false,
        success: function (html) { //alert(html);
          $(".municipio").html(html);
        }
      });
    });
});

/* JS file that contains javascript/jquery scripts */
/* for publicar_producto view */

//pictures management script (part 1)
  var ruta = base_url + "/upload/imagen";
  var id_multipart_for = "#default-behavior";
  var id_boton_examinar = "#btn_archivos";
  var id_boton_examina = "btn_archivos";
  var id_boton_subir = "#subir";
  var id_div_preview = "#preview";
  var id_div_resultado = "#result";

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

  //set into precioPorUnidad input selected option
    $('#combo1').change(function() {
      var combo = $("#combo1 option:selected").text();
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

    //miniscript para eliminar la ultima foto puesta
    $("#eliminar1").on("click", function() {
      $("#preview div:last-child").remove(); //quitar el ultimo elemento
      $(id_div_resultado).text("Imágenes Agregadas (5 máximo)");
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

  //load contents of "tipo" and "sector" into #combo_tipo and #combo_sector respectively
  //jquery validation
    $("#default-behavior").validate({
      //validar todo, este o no hidden
      ignore: "",
      //especificar reglas
      rules: {
        nombre: "required",
        nombre_categorias: "required",
        descripcion: "required"
      },
      //especificar mensajes para esas reglas
      messages: {
        nombre: "Nombre obligatorio!",
        nombre_categorias: "Debes seleccionar almenos una categoría!",
        descripcion: "Descripción de la empresa obligatoria!",
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