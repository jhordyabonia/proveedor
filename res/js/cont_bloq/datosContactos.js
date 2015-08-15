//este archivo JS contiene un ejemplo de los datos traidos desde la bd, en forma de matriz
//donde cada fila es un registro y cada columna es un campo
//este formato es esencial a la hora de mostrar los datos en el html, pues aqui pueden traerse
//"n" registros en bloque, ya es el javascript integrado en panel7.html el que decide cómo y cuántos
//registros mostrar en la pantalla

//consideraciones
//logoEmpresa: es la ruta a un archivo img/archivo.png
//nivel: habrian dos niveles: certificado (1) y no certificado (0) [se deja al criterio del basedatero]
//los demas si pueden traerse en texto plano

//si se desea se pueden tener varias consultas en este mismo archivo, diferenciando el nombre
//de la variable que es la matriz donde están los datos

//formato de los datos (tabla de contactos)
// [logoEmpresa, nombreEmpresa, nombreUsuario, datosContacto, ciudad, nivel]
var contactos = [
    ["img/fh_solar_led.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/ferralia.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/electro_la_oficina.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/coindustrial.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/redcampo.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "0"],
    ["img/ferralia.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "0"],
    ["img/tuberia.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/memorias_usb.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/cosaverde.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],

    ["img/memorias_usb.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/redcampo.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/teclados.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/disponible.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/chulo.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/cuadroazul.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"],
    ["img/cuadronaranja.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844 <br> Tel.: 555 5885", "Cali", "1"]
];

//formato de los datos (bloquear contactos)
// [logoEmpresa, nombreEmpresa, nombreUsuario, datosContacto, ciudad, nivel]
var contactosB = [
    ["img/fh_solar_led.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844", "Cali", "1"],
    ["img/ferralia.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844", "Cali", "1"],
    ["img/electro_la_oficina.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844", "Cali", "1"],
    ["img/redcampo.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844", "Cali", "1"],
    ["img/coindustrial.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844", "Cali", "0"],
    ["img/ferralia.png", "InterCorp S.A.", "Usuario1", "Cel.: 300 654 8844", "Cali", "0"],
];