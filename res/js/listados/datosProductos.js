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
	["img/cosaazul.png", "Tubería en Acero de 20cm de diámetro, revistamiento en cobre",
	"100.458.000", "300 unidades pedido mínimo",
	"Tubería de alta calidad para entrega inmediata en cualquier ciudad del país..",
	"1", "Electrónicos Andinos S.A.S", 
	"Origen del Despacho: ", "Cali", 
	"Estado del Producto: ", "En Stock", 
	"Marca: ", "Pvor", 
	"Ciudad: ", "Bogotá"],

	["img/papita.png", "Papita",
	"10.458", "2500 unidades pedido mínimo",
	"Papita de alta calidad para entrega inmediata en cualquier ciudad del país..",
	"0", "Importaciones El Padre S.A.S.", 
	"Origen del Despacho: ", "Cali", 
	"Estado del Producto: ", "En Stock", 
	"Marca: ", "Pvor", 
	"Ciudad: ", "Santafé de Bogotá"],

	["img/memorias_usb.png", "Memoria USB 16GB",
	"15.000", "300 unidades pedido mínimo",
	"Espectacular memoria USB de 16GB marca KINGSTON",
	"1", "Lenovo/IBM de Colombia y Latinoamérica S.A.", 
	"Origen del Despacho: ", "Cali", 
	"Estado del Producto: ", "En Stock", 
	"Marca: ", "Pvor", 
	"Ciudad: ", "Popayán"],

	["img/tuberia1.png", "Memoria USB 16GB",
	"15.000", "300 unidades pedido mínimo",
	"Espectacular memoria USB de 16GB marca KINGSTON",
	"1", "Grandes Superficies de Colombia / Homecenter", 
	"Origen del Despacho: ", "Cali", 
	"Estado del Producto: ", "En Stock", 
	"Marca: ", "Pvor", 
	"Ciudad: ", "Popayán"],

	["img/cosagris.png", "Memoria USB 16GB",
	"15.000", "300 unidades pedido mínimo",
	"Espectacular memoria USB de 16GB marca KINGSTON",
	"1", "Script Media", 
	"Origen del Despacho: ", "Cali", 
	"Estado del Producto: ", "En Stock", 
	"Marca: ", "Pvor", 
	"Ciudad: ", "Popayán"],

	["img/cosaverde.png", "Nunca se supo con certeza que era :P",
	"15.000", "300 unidades pedido mínimo",
	"Espectacular memoria USB de 16GB marca KINGSTON",
	"1", "Importaciones y Exportaciones OIPRO  S.A.S.", 
	"Origen del Despacho: ", "Cali", 
	"Estado del Producto: ", "En Stock", 
	"Marca: ", "Pvor", 
	"Ciudad: ", "Popayán"],

	["img/ipad_5.png", "Memoria USB 16GB",
	"15.000", "300 unidades pedido mínimo",
	"Espectacular memoria USB de 16GB marca KINGSTON",
	"1", "Importaciones El Padre S.A.S.", 
	"Origen del Despacho: ", "Cali", 
	"Estado del Producto: ", "En Stock", 
	"Marca: ", "Pvor", 
	"Ciudad: ", "Popayán"],

	["img/ipad_4.png", "Memoria USB 16GB",
	"15.000", "300 unidades pedido mínimo",
	"Espectacular memoria USB de 16GB marca KINGSTON",
	"1", "Importaciones El Padre S.A.S.", 
	"Origen del Despacho: ", "Cali", 
	"Estado del Producto: ", "En Stock", 
	"Marca: ", "Pvor", 
	"Ciudad: ", "Popayán"],

	["img/ipad_3.png", "Memoria USB 16GB",
	"15.000", "300 unidades pedido mínimo",
	"Espectacular memoria USB de 16GB marca KINGSTON",
	"1", "Importaciones El Padre S.A.S.", 
	"Origen del Despacho: ", "Cali", 
	"Estado del Producto: ", "En Stock", 
	"Marca: ", "Pvor", 
	"Ciudad: ", "Popayán"],
];

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//formato de los elementos de la pestaña "proveedores"
// imgP, tituloP, 
// rutaImgP1, descImgP1
// rutaImgP2, descImgP2
// rutaImgP3, descImgP3
// certificado (1 o 0), ciudad 
// prodP1, prodP2, prodP3, prodP4, prodP5
var proveedores = [
	["img/fh_solar_led.png", "Empresa de prueba uno S.A.S.",
	"img/papita.png", "Baked sweet",
	"img/ipad_1.png", "Baked sweet",
	"img/tuberia.png", "Sweetened boiled",
	"1", "Bogotá",
	"Maquinaria", "Trituradoras", "Despulpadoras", "Maquinaria para trigo", "Papas"],

	["img/ferralia.png", "Empresa de prueba dos S.A.S.",
	"img/arroz.png", "Baked sweet",
	"img/cosaazul.png", "Baked sweet",
	"img/memorias_usb.png", "Sweetened boiled",
	"0", "Bogotá",
	"Maquinaria", "Trituradoras", "", "", ""]
];

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//formato de los elementos de la pestaña "ofertas de compra"
// imgO, tituloO, 
// descripcion
// textoCantidad, textoPrecio, textoCiudadEnt
// empresa, certificado (1 o 0)
var ofertas = [
	["img/cosaverde.png", "Máquina estrusora de plástico PC 10000",
	"Serequiere máquina estrusora de plástico, con capacidad de procesamiento de 10.000 piezas por hora, para ser entregada en la ciudad de Cali",
	"10 unidades", "5.000.000 por unidad", "Cali - Valle",
	"Empresa de prueba S.A.S.", "0"],

	["img/papita.png", "Máquina estrusora de plástico PC 10000",
	"Se requiere máquina estrusora de plástico, con capacidad en la ciudad de Cali",
	"10 unidades", "5.000.000 por unidad", "Cali - Valle",
	"Empresa de prueba 2 S.A.S.", "1"], 

	["img/contacto_sinfoto.png", "Máquina de nieve",
	"Máquina de nieve en Santafé de Bogotá DC",
	"10000 unidades", "500.000.000 por unidad", "Santafé de Bogotá DC",
	"Empresas Lenovo Latinoamérica S.A.S.", "1"]
];
