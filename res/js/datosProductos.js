//este archivo JS contiene un ejemplo de los datos traidos desde la bd, en forma de matriz
//donde cada fila es un registro y cada columna es un campo
//este formato es esencial a la hora de mostrar los datos en el html, pues aqui pueden traerse
//"n" registros en bloque, ya es el javascript integrado en home-categori.html el que decide cómo y cuántos
//registros mostrar en la pantalla

//si se desea se pueden tener varias consultas en este mismo archivo, diferenciando el nombre
//de la variable que es la matriz donde están los datos

//CONSIDERACIONES
// el campo certifiE define si el proveedor es certificado (1) o no (0)

//formato de los datos (tablita)
// imgP, tituloP, 
// precioP, textounidadesP, 
// descP, 
// certifiE, tituloE
// descE1_t, descE1_c, 
// descE2_t, descE2_c, 
// descE3_t, descE3_c, 
// descE4_t, descE4_c
var productos = [
    ["http://sm.proveedor.com.co/proveedor/img/cosaazul.png", "Tubería en Acero de 20cm de diámetro, revistamiento en cobre",
    "100.458.000", "300 unidades pedido mínimo",
    "Tubería de alta calidad para entrega inmediata en cualquier ciudad del país..",
    "1", "Electrónicos Andinos S.A.S", 
    "Origen del Despacho: ", "Cali", 
    "Estado del Producto: ", "En Stock", 
    "Marca: ", "Pvor", 
    "Ciudad: ", "Bogotá"],

    ["http://sm.proveedor.com.co/proveedor/img/papita.png", "Papita",
    "10.458", "2500 unidades pedido mínimo",
    "Papita de alta calidad para entrega inmediata en cualquier ciudad del país..",
    "0", "Importaciones El Padre S.A.S.", 
    "Origen del Despacho: ", "Cali", 
    "Estado del Producto: ", "En Stock", 
    "Marca: ", "Pvor", 
    "Ciudad: ", "Santafé de Bogotá"],

    ["http://sm.proveedor.com.co/proveedor/img/memorias_usb.png", "Memoria USB 16GB",
    "15.000", "300 unidades pedido mínimo",
    "Espectacular memoria USB de 16GB marca KINGSTON",
    "1", "Lenovo/IBM de Colombia y Latinoamérica S.A.", 
    "Origen del Despacho: ", "Cali", 
    "Estado del Producto: ", "En Stock", 
    "Marca: ", "Pvor", 
    "Ciudad: ", "Popayán"],

    ["http://sm.proveedor.com.co/proveedor/img/tuberia1.png", "Memoria USB 16GB",
    "15.000", "300 unidades pedido mínimo",
    "Espectacular memoria USB de 16GB marca KINGSTON",
    "1", "Grandes Superficies de Colombia / Homecenter", 
    "Origen del Despacho: ", "Cali", 
    "Estado del Producto: ", "En Stock", 
    "Marca: ", "Pvor", 
    "Ciudad: ", "Popayán"],

    ["http://sm.proveedor.com.co/proveedor/img/cosagris.png", "Memoria USB 16GB",
    "15.000", "300 unidades pedido mínimo",
    "Espectacular memoria USB de 16GB marca KINGSTON",
    "1", "Script Media", 
    "Origen del Despacho: ", "Cali", 
    "Estado del Producto: ", "En Stock", 
    "Marca: ", "Pvor", 
    "Ciudad: ", "Popayán"],

    ["http://sm.proveedor.com.co/proveedor/img/cosaverde.png", "Nunca se supo con certeza que era :P",
    "15.000", "300 unidades pedido mínimo",
    "Espectacular memoria USB de 16GB marca KINGSTON",
    "1", "Importaciones y Exportaciones OIPRO  S.A.S.", 
    "Origen del Despacho: ", "Cali", 
    "Estado del Producto: ", "En Stock", 
    "Marca: ", "Pvor", 
    "Ciudad: ", "Popayán"],

    ["http://sm.proveedor.com.co/proveedor/img/ipad_5.png", "Memoria USB 16GB",
    "15.000", "300 unidades pedido mínimo",
    "Espectacular memoria USB de 16GB marca KINGSTON",
    "1", "Importaciones El Padre S.A.S.", 
    "Origen del Despacho: ", "Cali", 
    "Estado del Producto: ", "En Stock", 
    "Marca: ", "Pvor", 
    "Ciudad: ", "Popayán"],

    ["http://sm.proveedor.com.co/proveedor/img/ipad_4.png", "Memoria USB 16GB",
    "15.000", "300 unidades pedido mínimo",
    "Espectacular memoria USB de 16GB marca KINGSTON",
    "1", "Importaciones El Padre S.A.S.", 
    "Origen del Despacho: ", "Cali", 
    "Estado del Producto: ", "En Stock", 
    "Marca: ", "Pvor", 
    "Ciudad: ", "Popayán"],

    ["http://sm.proveedor.com.co/proveedor/img/ipad_3.png", "Memoria USB 16GB",
    "15.000", "300 unidades pedido mínimo",
    "Espectacular memoria USB de 16GB marca KINGSTON",
    "1", "Importaciones El Padre S.A.S.", 
    "Origen del Despacho: ", "Cali", 
    "Estado del Producto: ", "En Stock", 
    "Marca: ", "Pvor", 
    "Ciudad: ", "Popayán"],
];
