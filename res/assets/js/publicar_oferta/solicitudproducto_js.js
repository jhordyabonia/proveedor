/* JS file that contains javascript/jquery scripts */
/* for publicar_oferta view */

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
  //jquery validation
    $("#default-behavior").validate({
      //validar todo, este o no hidden
      ignore: "",
      //especificar reglas
      rules: {
        nombre: "required",
        categoria: "required",
        subcategoria: "required",
        descripcion: "required",
        btn_archivos: {extension: "jpeg|bmp|png"
        },
        cantidad: "required",
        precio: "required",
        'pago[]': "required", 
        municipio: { selectedMunicipio: true }
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
    //regla propia: validar un <option value="0" />
    jQuery.validator.addMethod('selectedMunicipio', function (value) {
        return (value != '0');
    }, "");


  //cargar cantidades en select de "cantidad requerida" 
    $("#cantidad_format").on('input', function() {
      cantidad=$("#cantidad_format").val();
      console.log(cantidad);
      $("#combo1").load(base_url + "publicar_producto/unidad_medida/"+cantidad);
    });
    $("#combo1").load(base_url + "publicar_producto/unidad_medida/");

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

  //Pone las unidades escogidas en el combo1
    $('#combo1').change(function () {
      var combo = $("#combo1 option:selected").text();
      $('input[name=unidades]').val(combo);
    });

  //funcion Cantidad requerida obtiene el valor de este campo y lo pone en precio max a pagar
    $('#cantidad').change(function () {
      var cantidad = $(this).val();
      $('input[name=cantidad2]').val(cantidad);
    });

  //i don't know what's this / unknown stuff
    $('#agregar2').click(function () {
      var input = $("input[name=Pclave]").val();
      var textarea = $("#textarea4").val();
      $('#textarea4').val(textarea + input + "\n");
      $("input[name=Pclave]").val("");
      // $('#lin').val(input); //aqui se guarda la ultima palabra enviada al textarea
    });

  //words counter for "descripcion del producto" textarea (part 2)
    //#textarea, #textoContador, num max de caracteres
    init_contadorTa("textarea3", "contador_textarea3", 5000);

  //mostrar subcategorias de una categoria seleccionada
    $("#textarea1").change(function () {
      $("#textarea1 option:selected").each(function () {
        categoria = $('#textarea1').val();
        $.post(base_url+"publicar_producto/mostrar_subcategoria", {
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

  //accion al seleccionar una subcategoria
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

  //colocar en "seleccionados" la categoria y subcategoria seleccionados 
    $("#agregar").click(function () {
      var categoria = $("#textarea1 option:selected").text();
      var subcategoria = $("#textarea2.textarea2 div.selecc").text();
      $("#cat_selecc").text(categoria); //
      $('input[name=categoria]').val(categoria);
      $("#subcat_selecc").text(subcategoria); //
      $('input[name=subcategoria]').val(subcategoria);
    });

  // boton eliminar en categoria/subcategoria 
    $("#eliminar").click(function () {
      $('input[name=categoria]').val("");
      $('input[name=subcategoria]').val("");
    });

  //reconocer la pulsacion del boton "agregar (categoria y subcategoria)"
    $("#agregar").on("click", function () {
      $("#cat_subcat").css("display", "block");
      $("#eliminar").css("display", "block");
    });

  //reconocer la pulsacion del boton "eliminar (categoria y subcategoria)"
    $("#eliminar").on("click", function () {
      $("#cat_subcat").css("display", "none");
    });

  //pictures management script (part 2)
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
          $(id_div_preview).append(
            '<div class="col-md-4 col-sm-4 col-xs-4">' + '<a href="#" class="thumbnail">' +
              '<img class="img-responsive" src="' + url + '" alt="' + name + '">' +
            '</a> </div>'
          );
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

    $("#eliminar1").on("click", function () {
      $("#preview div:last-child").remove(); //quitar el ultimo elemento
      $(id_div_resultado).text("Imágenes Agregadas (5 máximo)");
    });

  //keywords script http://xoxco.com/projects/code/tagsinput/ (part 1)
    $(function () {
      $('#Pclave').tagsInput({
        width: 'auto',
        defaultText: " "
      });
    });

  //number-format script for "precio" field
  //#cantidad_format: user writes price and it's automatically formatted
  //#cantidad: NON-formatted price, this is sended to DB, this is a hidden field
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

  //script para ocultar precio maximo a pagar cuando se haga clic en precio a convenir

  //cuando se pulsa el radio "precio unitario"
    $('#precioUni').change(function () {
      $("#pmax_pagar").css("display", "block");
      $("#punit_pconv").css("margin-bottom", "2em");
      var validSettings = $("#default-behavior").validate().settings;
      validSettings.rules.precio = {required: true};
      validSettings.messages.precio = "Precio oblgatorio!";
    });

  //cuando se pulsa el radio "precio a convenir"
    $('#precioconvenir').change(function () {
      $("#pmax_pagar").css("display", "none");
      $("#punit_pconv").css("margin-bottom", "1em");
      var validSettings = $("#default-behavior").validate().settings;
      delete validSettings.rules.precio;
      delete validSettings.messages.precio;
    });

  //script para mostrar/ocultar el select de  "municipios" cuando se selecc un depto
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