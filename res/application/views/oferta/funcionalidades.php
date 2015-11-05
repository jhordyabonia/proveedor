<script type="text/javascript">
function limpiar(obj) {
    document.getElementById('err_' + obj.name).innerHTML = "";
    //document.getElementById('msj_err_'+obj.name).style.display='none';
    document.getElementById('msj_err_' + obj.name).innerHTML = ""; 
}

function verificar_attime(obj) {
    var popup = new XMLHttpRequest();
    var dato = obj.value.replace('@', 'ARROBA');
    var url_popup = "<?=base_url()?>registro/verificar/" + dato + "/" + obj.name;
    if (obj.name == 'nit') {
        url_popup = "<?=base_url()?>registro/verificar/" + dato + "/" + obj.name + "/empresa_new";
    }
    popup.open("GET", url_popup, true);
    popup.addEventListener('load', show, false);
    popup.send(null);

    function show() {
        var div = document.getElementById('err_' + obj.name);
        var div_msj = document.getElementById('msj_err_' + obj.name);
        if (popup.response == "0") {
            div.innerHTML = '<span name="err" class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';
        } else {
            err = "<i style='font-size:12px;font-family:Arial:'>El " + obj.name + ": " + obj.value + " Ya se encuentra registrado!</i><br>";
            div.innerHTML = '<span name="err" class="glyphicon glyphicon-remove-sign boton-verificar-ok validacion_error"></span>';
            if (div_msj.innerHTML.indexOf(err) == -1) {
                div_msj.innerHTML += err;
            }
        }
        /*
        alert(popup.response);
        */
    }
}

function verificar_largo(obj, max) {
    var div = document.getElementById('err_' + obj.name);
    var div_msj = document.getElementById('msj_err_' + obj.name);
    if (obj.value.length >= max) {
        div.innerHTML = '<span class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';
    } else {
        err = "<i style='font-size:12px;font-family:Arial:'>El campo " + obj.name + " debe tener, minímo " + max + " caracteres</i><br>";
        div.innerHTML = '<span class="glyphicon glyphicon-remove-sign boton-verificar-ok validacion_error"></span>';
        if (div_msj.innerHTML.indexOf(err) == -1) {
            div_msj.innerHTML += err;
        }
    }
}

function verificar_formato(obj) {
    var div = document.getElementById('err_' + obj.name);
    var div_msj = document.getElementById('msj_err_' + obj.name);
    if (obj.value.indexOf("@") != -1 && obj.value.indexOf(".") != -1) {
        div.innerHTML = '<span class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';
    } else {
        err = "<i style='font-size:12px;font-family:Arial:'>El " + obj.name + " no tiene le formato debido. ejem: usuario@dominio.com</i><br>";
        div.innerHTML = '<span class="glyphicon glyphicon-remove-sign boton-verificar-ok validacion_error"></span>';
        if (div_msj.innerHTML.indexOf(err) == -1) {
            div_msj.innerHTML += err;
        }
    }
}

function verificar_igualdad(obj1, obj2) {
    var div = document.getElementById('err_' + obj1.name);
    var div_msj = document.getElementById('msj_err_' + obj1.name);

    if (obj2.value == "") {
        return;
    }

    if (obj1.value == obj2.value) {
        div.innerHTML = '<span class="glyphicon glyphicon-ok-sign boton-verificar-ok validacion_success"></span>';
    } else {
        err = "<i style='font-size:12px;font-family:Arial:'>El " + obj1.name + " no coincide con " + obj2.name + " </i><br>";
        div.innerHTML = '<span class="glyphicon glyphicon-remove-sign boton-verificar-ok validacion_error"></span>';
        if (div_msj.innerHTML.indexOf(err) == -1) {
            div_msj.innerHTML += err;
        }
    }
}

function oculta_eliminar(){
    if(document.getElementById('btn_archivos').value!=null)
      {                   
         document.getElementById('eliminar1').style.display='';
         document.getElementById('btn_delete').style.display='';
         return;
      }
      
      document.getElementById('eliminar1').style.display='none';
      document.getElementById('btn_delete').style.display='none'; 
  
}


function cambio_categoria(id) {
    var popup = new XMLHttpRequest();
    var url_popup = "<?=base_url()?>publicar_oferta/ver_subcatgorias/" + id;
    popup.open("GET", url_popup, true);
    popup.addEventListener('load', show, false);
    popup.send(null);

    function show() {
        div = document.getElementById('subcategorias');
        div.innerHTML = popup.response;
    }
}

function cargar_municipios(id) {
    var popup = new XMLHttpRequest();
    var url_popup = "<?=base_url()?>herramientas/municipios/" + id;
    popup.open("GET", url_popup, true);
    popup.addEventListener('load', show, false);
    popup.send(null);

    function show() {
        div = document.getElementById('combo_m');
        div.innerHTML = popup.response;
        div = document.getElementById('municipio');
        div.style.display='';
    }
}

function cambio_categoria_simple(id) {
    var popup = new XMLHttpRequest();
    var url_popup = "<?=base_url()?>publicar_oferta/ver_subcatgorias/" + id;
    popup.open("GET", url_popup, true);
    popup.addEventListener('load', show, false);
    popup.send(null);

    function show() {
        div = document.getElementById('subcategorias_simples');
        div.innerHTML = popup.response;
        document.getElementById('div_subcategorias').style.display='';
    }

}

</script>
