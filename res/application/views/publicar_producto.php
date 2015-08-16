<!DOCTYPE html>

<html lang = "es">

	<head>

		<!--[if lt IE 9]>
	
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	
		<![endif]-->

		<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />

		<meta charset="UTF-8">

		<title>PROVEEDOR.com.co / Tablero de Usuario - Publicar producto</title>

		<link rel="stylesheet" href="<?= base_url() ?>css/960.css">

		<link rel="stylesheet" href="<?= base_url() ?>css/960_12_col.css">

		<link rel="stylesheet" href="<?= base_url() ?>css/reset.css">

		<!-- importaciones -->

		<link rel="stylesheet" href="<?= base_url() ?>css/estilosheader.css">



		<!-- para la parte de los checkbox-->

		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/publicar/normalize.css" />

		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/publicar/component.css" />

		<script src="<?= base_url() ?>js/publicar/modernizr.custom.js"></script>



		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>



		<!-- funcion pasar categoria y subcategoria -->

		<script type="text/javascript">

			$(document).ready(function() {

				$("#agregar").click(function() {

					var categoria = $("#textarea1 option:selected").text();

					var subcategoria = $("#textarea2").val();

					$('input[name=categoria]').val(categoria);

					$('input[name=subcategoria]').val(subcategoria);

				});

			});



			// boton eliminar en categoria/subcategoria 

			$(document).ready(function() {

				$("#eliminar").click(function() {

					$('input[name=categoria]').val("");

					$('input[name=subcategoria]').val("");

				});

			});



			// pasar del select a input en precio por unidad 

			$(document).ready(function() {

				$('#combo1').change(function() {

					var combo = $(this).val();

					$('input[name=medidas]').val(combo);

				});

			});



			// boton eliminar en palabra clave

			$(document).ready(function() {

				$("#eliminar2").click(function() {

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

		</script>





		<!-- Con este script se agregan palabras al textarea en palabras clave -->

		<!-- despues de cada palabra se concatena con salto de linea -->

		<script type="text/javascript">

			$().ready(function() {

				$('#agregar2').click(function() {

					var input = $("input[name=Pclave]").val();

					var textarea = $("#textarea4").val();

					$('#textarea4').val(textarea + input + "\n");

					$("input[name=Pclave]").val("");

				});

			});

		</script>



		<!-- Script para la funcion de mostrar las subcategorias al seleccionar una categoria en los select del formulario -->

		<script type="text/javascript">

			$(document).ready(function() {

				$("#textarea1").change(function() {

					$("#textarea1 option:selected").each(function() {

						categoria = $('#textarea1').val();

						$.post("<?=base_url()?>publicar_producto/mostrar_subcategoria", {
							categoria: categoria

						}, function(data) {

							$("#textarea2").html(data);

						});

					});

				})

			});

		</script>





		<!-- Estilos para los mensajes de error en las validaciones -->

		<style type="text/css">

			.error {

				position: absolute;

				color: blue;

				font-weight: bold;

				font-size: 10pt;

				left: 85%;

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

				/*margin-left: -519px;*/margin-left: 0px; float: left;

				height: 200px;

				width: 300px;

				max-width: 300px;

				border: 1px solid #FFFFFF;

				font-size: 13px;

			}

			/* Escoja la Categoría y Subcategoría (segundo textarea/select) */

			#textarea2{

				/*margin-left: -802px;*/margin-left: 24px; float: left;

				height: 200px;

				width: 200px;

				max-width: 200px;

				margin-top: 0px;

				border: 1px solid #FFFFFF;

				font-size: 13px;

			}

			/* Escoja la Categoría y Subcategoría (div botones agregar/eliminar) */

			#botones{

				background: #ffffff;

				margin-top: -203px;

				margin-left: 549px;

				height: auto;

				width: 100px;

			}



			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

			/* Descripcion del Producto (div textarea) */

			#es5{

				background: #ffffff;

				margin-top: -5px;

				height: 39px;

				width: 388px;

				max-width: 388px;

				margin-left: 31px;

			}

			/* Descripcion del Producto (texto) */

			#es55{

				float: left;

				font-weight: bold;

				color: #7f7f7f;

				font-family: Arial;

				font-size: 13px;

				margin-top: 5px;

			}

			/* Descripcion del Producto (textarea) */

			#textarea3{

				margin-left: -223px;

				height: 162px;

				width: 649px;

				margin-top: -29px;

				max-width: 830px;

				border: 1px solid #ddd;

			}



			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

			/* Fotos del Producto (div selector de fotos) */

			#es6{

				background: #ffffff;

				margin-top: 18px;

				height: auto;

				width: auto;

				margin-left: 31px;

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

				margin-top: -5px;

				margin-left: 269px;

				height: 39px;

				width: 223px;

			}

			/* Fotos del Producto (input-text que tiene la ruta del archivo) */

			#fotoP{

				margin-left: -240px;

				height: 30px;

				width: 230px;

				border: 1px solid #ddd;

			}



			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

			/* palabra clave (div) */

			#es7{

				background: #ffffff;

				margin-top: 69px;

				height: auto;

				width: auto;

				margin-left: 31px;

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

			/* palabra clave (input text) */

			#Pclave{

				border: solid 1px #A0FF24;

				margin-left: -1131px;

				margin-right: -9px;

				height: 30px;

				width: 230px;

			}

			/* palabra clave (div botones agregar/eliminar) */

			#botonesclave{

				background: #ffffff;

				margin-top: 16px;

				margin-left: 712px;

				height: 39px;

				width: auto;

			}

			/* palabra clave (boton agregar) */

			#agregar2{

				border: 0px #F9F9FF solid;

				color: #FFFFFF;

				background-color: #c3c3c3;

				margin-top: 0px;

				margin-left: 20px;

				height: 34px;

				width: 100px;

				max-width: 100px;

			}

			/* palabra clave (boton eliminar) */

			#eliminar2{

				border: 0px #636369 solid;

				color: #FFFFFF;

				background-color: #c3c3c3;

				margin-top: 0px;

				margin-left: 2px;

				height: 34px;

				width: 100px;

				max-width: 100px;

			}

			/* palabra clave (divs verdes que contienen las palabras clave ingresadas) */

			#espacio{

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

			}



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

			/* 3. Informacion Complementaria / boton naranja publicar producto */

			#espacio15{

				background: #ffffff;

				margin-top: 130px;

				margin-left: -414px;

				height: auto;

				width: auto;

				cursor: pointer;

			}



			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

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

		</style>



		<!-- estilos css resolucion 1280 -->

		<style>

			@media screen and (max-width: 1280px) {

				html, body {

					font-family: Arial;

				}

				.container_12{

					background:#ffffff;

					height:auto;

					width: 1265px;

					max-width: 1265px;

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

					width: 995px; 

					padding-left: 0px; 

					max-width: 995px; 

					display: block; 

					margin-left: 43px; 

					background: white; 

					margin-right: -13px;

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

					margin-top: 512px;

					margin-left: -733px;

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

					font-weight: bold;

					color: #77758D;

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

					color: #77758D;

					font-family: Arial;

					font-size: 13px;

					margin-top: 5px;

				}

				/* Escoja la Categoría y Subcategoría (primer textarea/select) */

				#textarea1{

					/*margin-left: -519px;*/margin-left: 0px; float: left;

					height: 200px;

					width: 300px;

					max-width: 300px;

					border: 1px solid #FFFFFF;

					font-size: 13px;

				}

				/* Escoja la Categoría y Subcategoría (segundo textarea/select) */

				#textarea2{

					/*margin-left: -802px;*/margin-left: 24px; float: left;

					height: 200px;

					width: 200px;

					max-width: 200px;

					margin-top: 0px;

					border: 1px solid #FFFFFF;

					font-size: 13px;

				}

				/* Escoja la Categoría y Subcategoría (div botones agregar/eliminar) */

				#botones{

					background: #ffffff;

					margin-top: -203px;

					margin-left: 549px;

					height: auto;

					width: 100px;

				}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* Descripcion del Producto (div textarea) */

				#es5{

					background: #ffffff;

					margin-top: 157px;

					margin-left: 31px;

					height: auto;

					width: auto;

					max-width: 388px;

				}

				/* Descripcion del Producto (texto) */

				#es55{

					float: left;

					font-weight: bold;

					color: #77758D;

					font-family: Arial;

					font-size: 13px;

					margin-top: -162px;

				}

				/* Descripcion del Producto (textarea) */

				#textarea3{

					margin-left: -433px;

					height: 162px;

					width: 649px;

					margin-top: -33px;

					max-width: 830px;

					border: 1px solid #ddd;  

				}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* Fotos del Producto (div selector de fotos) */

				#es6{

					background: #ffffff;

					margin-top: 18px;

					height: auto;

					width: auto;

					margin-left: 31px;

				}

				/* Fotos del Producto (texto selector de fotos) */

				#es66{

					float: left;

					font-weight: bold;

					color: #77758D;

					font-family: Arial;

					font-size: 13px;

					margin-top: 5px;

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

					margin-left: -240px;

					height: 30px;

					width: 230px;

					border: 1px solid #ddd;

				}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* palabra clave (div) */

				#es7{

					background: #ffffff;

					margin-top: 69px;

					height: auto;

					width: auto;

					margin-left: 31px;

				}

				/* palabra clave (titulo) */

				#es77{

					float: left;

					font-weight: bold;

					color: #77758D;

					font-family: Arial;

					font-size: 13px;

					margin-top: 5px;

				}

				/* palabra clave (input text) */

				#Pclave{

					border: solid 1px #A0FF24;

					margin-left: -1131px;

					margin-right: -9px;

					height: 30px;

					width: 230px;

				}

				/* palabra clave (div botones agregar/eliminar) */

				#botonesclave{

					background: #ffffff;

					margin-top: 16px;

					margin-left: 712px;

					height: 39px;

					width: auto;

				}

				/* palabra clave (boton agregar) */

				#agregar2{

					border: 0px #F9F9FF solid;

					color: #FFFFFF;

					background-color: #c3c3c3;

					margin-top: 0px;

					margin-left: 20px;

					height: 34px;

					width: 100px;

					max-width: 100px;

				}

				/* palabra clave (boton eliminar) */

				#eliminar2{

					border: 0px #636369 solid;

					color: #FFFFFF;

					background-color: #c3c3c3;

					margin-top: 0px;

					margin-left: 2px;

					height: 34px;

					width: 100px;

					max-width: 100px;

				}

				/* palabra clave (divs verdes que contienen las palabras clave ingresadas) */

				#espacio{

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

				}



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

					margin-left: -1px;

					height: 30px;

					width: 179px;

				}

				/* 2. negociacion / segundo titulo (texto unidades) */



				/* 2. negociacion / tercer titulo (input text) */

				#pu{

					border:solid 1px #A0FF24;

					margin-left: -1px;

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

				/* 3. Informacion Complementaria / boton naranja publicar producto */

				#espacio15{

					background: #ffffff;

					margin-top: 354px;

					margin-left: -449px;

					height: auto;

					width: auto;

					cursor: pointer;

				}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

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



				#contenedor2{

					margin-top: 10px; 

					height: 1946px; 

					background:#ffffff;

				}



				#contenido_cuerpo{

					margin-top: 10px; 

					height: auto; 

					background:#ffffff;

				}

			}

		</style>



		<!-- estilos css resolucion 1024 -->

		<style>

			@media screen and (max-width: 1024px) {

				html, body {

					font-family: Arial;

				}

				.container_12{

					background:#ffffff;

					height:auto;

					width: 1009px;

					max-width: 1009px;

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

					width: 740px; 

					padding-left: 0px; 

					max-width: 740px; 

					display: block; 

					margin-left: 43px; 

					background: white; 

					margin-right: -13px;

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

					margin-top: 512px;

					margin-left: -733px;

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

					font-weight: bold;

					color: #77758D;

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

					font-family: Arial;

					font-size: 13px;

					margin-top: 5px;

					font-weight: bold;

					color: #77758D;

				}

				/* Escoja la Categoría y Subcategoría (primer textarea/select) */

				#textarea1{

					/*margin-left: -519px;*/margin-left: 0px; float: left;

					height: 200px;

					width: 300px;

					max-width: 300px;

					border: 1px solid #FFFFFF;

					font-size: 13px;

				}

				/* Escoja la Categoría y Subcategoría (segundo textarea/select) */

				#textarea2{

					/*margin-left: -802px;*/margin-left: 24px; float: left;

					height: 200px;

					width: 200px;

					max-width: 200px;

					margin-top: 0px;

					border: 1px solid #FFFFFF;

					font-size: 13px;

				}

				/* Escoja la Categoría y Subcategoría (div botones agregar/eliminar) */

				#botones{

					background: #ffffff;

					margin-top: -203px;

					margin-left: 549px;

					height: auto;

					width: 100px;

				}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* Descripcion del Producto (div textarea) */

				#es5{

					background: #ffffff;

					margin-top: 157px;

					margin-left: 31px;

					height: auto;

					width: auto;

					max-width: 388px;

				}

				/* Descripcion del Producto (texto) */

				#es55{

					float: left;

					font-weight: bold;

					color: #77758D;

					font-family: Arial;

					font-size: 13px;

					margin-top: -162px;;

				}

				/* Descripcion del Producto (textarea) */

				#textarea3{

					margin-left: -433px;

					height: 162px;

					width: 649px;

					margin-top: -33px;

					max-width: 830px;

					border: 1px solid #ddd;

				}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* Fotos del Producto (div selector de fotos) */

				#es6{

					background: #ffffff;

					margin-top: 18px;

					height: auto;

					width: auto;

					margin-left: 31px;

				}

				/* Fotos del Producto (texto selector de fotos) */

				#es66{

					float: left;

					font-weight: bold;

					color: #77758D;

					font-family: Arial;

					font-size: 13px;

					margin-top: 5px;

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

					margin-left: -240px;

					height: 30px;

					width: 230px;

					border: 1px solid #ddd;

				}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

				/* palabra clave (div) */

				#es7{

					background: #ffffff;

					margin-top: 69px;

					height: auto;

					width: auto;

					margin-left: 31px;

				}

				/* palabra clave (titulo) */

				#es77{

					float: left;

					font-weight: bold;

					color: #77758D;

					font-family: Arial;

					font-size: 13px;

					margin-top: 5px;

				}

				/* palabra clave (input text) */

				#Pclave{

					border: solid 1px #A0FF24;

					margin-left: -1131px;

					margin-right: -9px;

					height: 30px;

					width: 230px;

				}

				/* palabra clave (div botones agregar/eliminar) */

				#botonesclave{

					background: #ffffff;

					margin-top: 16px;

					margin-left: 712px;

					height: 39px;

					width: auto;

				}

				/* palabra clave (boton agregar) */

				#agregar2{

					border: 0px #F9F9FF solid;

					color: #FFFFFF;

					background-color: #c3c3c3;

					margin-top: 0px;

					margin-left: 20px;

					height: 34px;

					width: 100px;

					max-width: 100px;

				}

				/* palabra clave (boton eliminar) */

				#eliminar2{

					border: 0px #636369 solid;

					color: #FFFFFF;

					background-color: #c3c3c3;

					margin-top: 0px;

					margin-left: 2px;

					height: 34px;

					width: 100px;

					max-width: 100px;

				}

				/* palabra clave (divs verdes que contienen las palabras clave ingresadas) */

				#espacio{

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

				}



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

					margin-left: -1px;

					height: 30px;

					width: 179px;

				}

				/* 2. negociacion / segundo titulo (texto unidades) */



				/* 2. negociacion / tercer titulo (input text) */

				#pu{

					border:solid 1px #A0FF24;

					margin-left: -1px;

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

				/* 3. Informacion Complementaria / boton naranja publicar producto */

				#espacio15{

					background: #ffffff;

					margin-top: 354px;

					margin-left: -449px;

					height: auto;

					width: auto;

					cursor: pointer;

				}



				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

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



				#contenedor2{

					margin-top: 10px; 

					height: 1946px; 

					background:#ffffff;

				}



				#contenido_cuerpo{

					margin-top: 10px; 

					height: auto; 

					background:#ffffff;

				}

			}

		</style>

	</head>



	<body style="height: auto;">



		<div class="container_12" align= "center">     

			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

			<!-- header -->

			<header class="grid_1" style="padding-left: 10px; margin: -10px -13px 0px 4px; display: block; float: left;">

				<a href="<?= base_url() ?>index"> <img src="<?= base_url() ?>img/logo3.png" style="float: left;" /></a>

			</header> 

			<header class="grid_1" id="he">

				<table width="auto" height="auto" style="border-spacing: 0px;"> <tr> <td>

							<div style="padding: 4px 0px 4px 0px;"> <table style="border-spacing: 0px;"> <tr>

										<td class="header_iconos"> <a href="<?= base_url() ?>tablero_usuario"> Inicio </a> </td>

										<!-- separador -->

										<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> 

											<div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 

										</td>

										<!-- separador -->

										<td class="header_iconos"> <a href="<?= base_url() ?>mensajes_usuario"> Mensajes </a> </td>

										<!-- separador -->

										<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> 

											<div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 

										</td>

										<!-- separador -->

										<td class="header_iconos"> <a href="<?= base_url() ?>contactos"> Contactos </a> </td>

										<!-- separador -->

										<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> 

											<div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 

										</td>

										<!-- separador -->

										<td class="header_iconos activo"> <a href="#"> Productos </a> </td>

										<!-- separador -->

										<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> 

											<div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 

										</td>

										<!-- separador -->

										<td class="header_iconos"> <a href="<?= base_url() ?>publicar_oferta"> Busco/Compro </a>  </td>

										<!-- separador -->

										<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> 

											<div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 

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

							<a href="panel2.html"><img src="<?= base_url() ?>img/publicar_2.png" /></a> 

						</div>

						<div class="grid_2 alpha" style="margin-top: 26px;">

							<a href="<?= base_url() ?>organizar_productos"><img src="<?= base_url() ?>img/organizar.png" /></a>

						</div>

					</div>



					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

					<!-- contenido -->

					<div class="grid_4" id="div2">

						<div class="grid_2 alpha" style="" id="contenido_cuerpo">

							<div class="grid_2 alpha" style="margin-top: -13px;height: auto; background: transparent;">

								<h1>Publicar Producto</h1>                     

							</div>

							<div style="padding: 10px 10px 10px 25px;">



								<style type="text/css">

									form { max-width: 1200px !important; }

								</style>



								<?php //En la variable $atributos se almacena en un array los atributos que se necesitan en el formulario

								$atributos = array('class' => 'ac-custom ac-checkbox ac-checkmark', 'autocomplete' => 'off', 'id' => 'default-behavior');
								?>

								<!--Abre el formulario que enviara la informacion al control -->

<?= form_open_multipart('publicar_producto', $atributos); ?>  

								<!-- 1. informacion basica / nombre del producto -->

								<div class="grid_2" id="es1">

									<p id="es11">1. Información Básica</p>

								</div>

								<br><br><br>



								<?php if ($this->session->flashdata('producto_registrado')) { ?>

									<div class="exito mensajes"><h3><?= $this->session->flashdata('producto_registrado') ?></h3></div>

									<br>

								<?php } ?>



								<div class="grid_2" id="es2"> 

									<p id="es22"> Nombre del Producto <font color="red" style="font-size: 16px;">*</font> </p> 

									<?php echo form_error('nombre', '<div class="error">', '</div>'); ?>

								</div>

								<div class="grid_2" id="es2"> 

									<input type="text" id="es3" name="nombre" value="<?php echo set_value('nombre'); ?>" />                  

								</div>   

								<div style="background:transparent; height: 35px; margin-left: -4.2em; margin-top: 39px; width: 498px; margin-bottom: -22px;">

									<p style="font-size: 13px; color:#A8ABB4; text-align: left;">

										Ingresa el nombre completo del producto con sus especificaciones técnicas.</p> 

									<p style="font-size: 13px; color: #77758D; text-align: left;">

										Ej. Bota de seguridad PU bidensidad inyectada marca JM</p>   

								</div>

								<br><br>



								<!-- 1. informacion basica / escoja la categoria o subcategoria -->

								<div class="grid_2" id="es4">

									<p id="es44">Escoja la Categoría y Subcategoría <font color="red" style="font-size: 16px;"pre>*</font> </p>

								</div>

								<div style="background:transparent; height: 24px; margin-top: 36px; margin-bottom: 4px; width: 877px;">

									<p style="font-size: 13px; text-align: left; color:#A8ABB4;">

										Selecciona una categoría, luego una subcategoría y click en Agregar.</p> 

								</div>



								<div style="height: 200px; margin-left: 31px;">

									<select name="menu" size="3" id="textarea1">                 

										<?php foreach ($categoria as $fila) { ?>

											<option value="<?= $fila->id_categoria ?>"><?= $fila->nombre_categoria ?></option>

										<?php } ?>

									</select>



									<select name="menu" size="3" id="textarea2">

										<!--                     <option value="Cinco" selected="selected">Cinco</option>
										
															<option value="Seis">Seis</option>
										
															<option value="Siete">Siete</option>
										
															<option value="Ocho">Ocho</option> -->

									</select>

									<div class="grid_2" id="botones">

										<input type="button" value="Agregar"  style="cursor: pointer;" id="agregar" >

										<input type="button" value="Eliminar" style="cursor: pointer;" id="eliminar">

									</div>



									<div style="background: #f6f6f6; height: 193px; margin-left: 583px; width: 167px;">

										<br>

										<div style="background: transparent; height: 20px;width: 137px; text-align: -webkit-auto; color:#7f7f7f; font-weight: bold; font-size: 13px;">

											<p>Seleccionado:</p>

										</div>

										<div style="background: transparent; height: 20px;width: 86px; margin-top: 17px; margin-left: -35px; text-align: -webkit-auto; color:#7f7f7f; font-weight: bold; font-size: 13px;">

											<p>Categoria:</p>

											<?php echo form_error('categoria', '<div class="error">', '</div>'); ?>

										</div>

										<div style="background: transparent; height: 20px; width: 86px; margin-top: 2px; margin-left: -35px; text-align: -webkit-auto;">

											<input type="text" style="width: 111px; border: none; height: 24px;" name="categoria" value="<?php echo set_value('categoria'); ?>" />                                     

										</div>

										<!--- segunda parte -->

										<div style="background: transparent; height: 20px; width: 98px; margin-top: 25px; margin-left: -23px; text-align: -webkit-auto; color:#7f7f7f; font-weight: bold; font-size: 13px;">

											<p>Subcategoria:</p>

											<?php echo form_error('subcategoria', '<div class="error">', '</div>'); ?>

										</div>

										<div style="background: transparent; height: 20px; width: 86px; margin-top: 2px; margin-left: -35px; text-align: -webkit-auto;">

											<input type="text" style="width: 111px; border: none; height: 24px;" name="subcategoria" value="<?php echo set_value('subcategoria'); ?>"/>                      

										</div>                    

									</div>

								</div>

								<br><br>



								<!-- 1. informacion basica / descripcion del producto -->

								<div class="grid_2" id="es5">

									<p id="es55">Descripcion del Producto <font color="red" style="font-size: 16px;">*</font> </p>

									<?php echo form_error('descripcion', '<div class="error">', '</div>'); ?>

								</div>

								<br><br><br>

								<div style="background:transparent; height: 133px;"> 

									<textarea id="textarea3" name="descripcion" style="resize: none;"><?php echo set_value('descripcion'); ?></textarea>                   

									<p style="margin-top: -157px; margin-bottom: 117px; margin-left: 597px; font-size: 13px; color:#A8ABB4;">

										5.000 palabras maximo</p>  

								</div>

								<!-- <br><br> -->



								<!-- 1. informacion basica / fotos del producto -->

								<div style="margin-left: 31px; background: transparent; height:auto;width: 97%;  /*margin-top: 105px;*/">

									<div style="background: transparent; height:20px;width: auto;">

										<div class="grid_2" id="es6" style="margin-left: 0px;"> 

											<p id="es66">Fotos del Producto</p>

											<?php echo '<div class="error">' . $error . '</div>'; ?> 

										</div>

										<br> <br> <br>



										<!-- area de subida de fotos del producto -->

										<!-- no se puede mostrar la ruta completa de la foto pues ademas de ser innecesario, -->

										<!-- es una funcion de seguridad que tienen los exploradores de internet -->

                    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>-->

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



										<script type="text/javascript">

											function obtieneruta() {

												var ruta = document.getElementById("file_upfile").value;

												document.getElementById("fotoP").value = ruta;

											}



											$(function() {

												$(".custom-input-file input:file").change(function() {

													$(this).parent().find(".archivo").html($(this).val());

												})/*.css('border-width',function(){
							 
												 if(navigator.appName == "Microsoft Internet Explorer")
							 
												 return 0;
							 
												 })*/;

											});

										</script>



										<div class="grid_2" id="botonesfoto" style="margin-left: 240px;">

											<table width="auto"> <tr>

													<td> <input type="text" id="fotoP" name="fotoP" /> </td>

													<td>

														<div class="custom-input-file">

															<input type="file" class="input-file" id="file_upfile"  onchange="obtieneruta()" name="userfile" />

															<p style="font-size: 16px; margin-top: -2px;">Agregar</p>

															<div class="archivo">...</div>

														</div>

													</td>

													<td> <input type="button" value="Eliminar" id="eliminar1"> </td>

													<td>

                          <!-- <textarea style="border: none; resize: none; background: #f6f6f6; margin-left: 46px; margin-top: -21px; height: 95px; width: 400px;"></textarea>

                          <div style="background:transparent; width: 364px; height: 23px; margin-top: 3px; margin-left: 71px;">

                          <b style="margin-left: 72px; font-size: 13px; font-weight: bold; color: #7f7f7f; ">Imágenes Agregadas (5 máximo)</b>

                          </div> -->

														<textarea style="border: none; resize: none; background: #f6f6f6; margin-left: 46px; margin-top: -21px; height: 95px; width: 400px;"></textarea>

														<div style="background:transparent; width: 364px; height: 23px; margin-top: 3px; margin-left: 71px;">

															<b style="margin-left: 72px; font-size: 13px; font-weight: bold; color: #7f7f7f; ">Imágenes Agregadas (5 máximo)</b>

														</div>

													</td>

												</tr> </table>

										</div>

									</div>

								</div>



								<!-- 1. informacion basica / palabras clave -->

								<div style="background: transparent; height: 68px; margin-top: 10em; width: 94%; margin-bottom: 172px;">

									<div class="grid_2" id="es7" style="margin-left: 0; margin-top: 0; margin-bottom: 50px;">

										<p id="es77">Palabra Clave</p>


									</div>

									<br> <br> <br> 

									<div class="grid_2" id="botonesclave" style="height: auto; margin-left: 0; margin-top: -36px; margin-left: 0;">

										<input type="text" id="Pclave" name="Pclave" value="word" placeholder="Keywords," style="margin-left: 0; float: left;">

										<input type="button" value="Agregar"  style="cursor: pointer; float: left;" id="agregar2">

										<input type="button" value="Eliminar" style="cursor: pointer; float: left;" id="eliminar2" >

										<div style="background: transparent; width: 329px; margin-top: 10px; clear: both; float: left;">

											<p style="font-size: 13px; color: #A8ABB4;text-align: left;">

												Ingresa la palabra clave y da click en Agregar</p>

											<p style="text-align: -webkit-auto; font-size: 13px; color: #A8ABB4;text-align: left;">

												Ej. Zapatos en cuero, Zapatos para dama</p>

										</div>

										<div style="background: #f7f7f7; width: 386px; margin-top: 9px; height: 37px; clear: both; float: left;">

											<p style="text-align: left; font-size: 13px;margin-left: 12px; color: #A8ABB4;">

												Las "Palabras Clave" ayudan a los compradores a encontrar su producto con mayor facilidad</p>

										</div>

										<textarea id="textarea4" name="etiquetas" readonly style="border: none; resize: none; margin-left: 502px; margin-top: -123px;">. </textarea>

									</div>

								</div>



								<!-- 2. negociacion / precio unitario y a convenir -->

								<style type="text/css">

									.la {

										width: auto; 

										padding: 0 !important; 

										display: inline-block; 

										clear: both; 

										float: left; 

										cursor: auto;

									}

									.la:before {

										display: none;

									}

								</style>



								<div class="grid_2" id="es1" style="margin-top: -44px;">

									<p id="es11">2. Negociación</p>

								</div>



								<script type="text/javascript">

									$(document).ready(function() {

										$('#precioUni').change(function() {

											//cuando se pulsa el radio "precio unitario"

											$("#titulo1").text("Precio por unidad");

											$("#precio1").css("display", "block");

											$("#precio1_hint").css("display", "block");

											$("#por1").css("display", "block");

											$("#asterisco1").css("margin-right", "263px");

										});

										$('#precioconvenir').change(function() {

											//cuando se pulsa el radio "precio a convenir"

											$("#titulo1").text("Seleccione unidad de medida");

											$("#precio1").css("display", "none");

											$("#precio1_hint").css("display", "none");

											$("#por1").css("display", "none");

											$("#asterisco1").css("margin-right", "90px");

										});

									});

								</script>



								<div style="background: transparent; border-bottom: 1px dashed #c3c3c3; height: 50px; margin-top: 50px; width: 722px; margin-left: -168px;">

									<label class="la" style="">

										<b style="color: #7f7f7f; font-size:14px;">Precio unitario</b>

									</label>

									<input type="radio" id="precioUni" name="rd_precio" value="precioUni" checked="checked" 

										   style="float: left; margin-top: 6px; margin-left: 24px; height: 16px; width: 17px;" />



									<label class="la" style="margin: -1.2em 0em 0em 14em;">

										<b style="color: #7f7f7f; font-size:14px;">Precio a convenir</b>

									</label>

									<input type="radio" id="precioconvenir" name="rd_precio" value="precioconvenir" 

										   style="margin-left: 24px; height: 16px; width: 17px; margin-top: 6px;"/> 

								</div>



								<!-- 2. negociacion / precio por unidad -->

								<div style="background: transparent; border-bottom: #c3c3c3; border-bottom-width: 1px; border-bottom-style: dashed; height: 114px; margin-top: 0px; width: 722px; margin-right: 174px;">

									<br>

									<div style="background: white; height: 38px; width: 529px; margin-top: 1px; margin-right: 196px;">

										<b id="asterisco1" style="margin-right: 263px; color: red; font-size: 17px;">*</b>

										<p id="titulo1" style="text-align: left; font-weight: bold; margin-top: -16px; color: #7f7f7f; font-size:14px;">Precio por unidad</p>

										<div style="margin-top: -21px; margin-right: 78px;">

											<input id="precio1" name="precio" style="height: 28px; width: 124px;"type="text" value="<?php echo set_value('precio'); ?>"/> 

											<p id="por1" style="margin-left: 158px; margin-top: -24px; font-size: 13px;">por</p>

											<div style="margin-top: -24px; margin-left: 414px;">

												<select id="combo1" name="list_medidas" style="margin-left: -92px; margin-top: 3px; height: 1.8em; width: 7em;">

													<option value="unidades">Unidad</option>

													<option value="litros">Litro</option>

													<option value="Opcion1">Opcion1</option>

													<option value="Opcion2">Opcion2</option>

												</select>                               

											</div>

											<?php echo form_error('precio', '<div class="error">', '</div>'); ?>

											<div id="precio1_hint" style="width: 129px; margin-top: 2px;margin-left: 5px;">

												<p style="text-align:left; font-size: 13px; color: #A8ABB4;">Ingrese el precio</p>

												<p style="text-align: left; font-size: 13px; color: #A8ABB4;">Ej. 650.000</p>

											</div>  

										</div>

									</div>

								</div>



								<!-- 2. 2. negociacion / precio minimo, tiempo de entrega, capacidad de suministro -->

								<div style="background: transparent; border-bottom: 1px dashed #c3c3c3; height: 257px; margin-top: 0px; width: 848px; margin-right: 50px;">

									<br>

									<div style="background: white; height: 38px; width: 529px; margin-top: 1px; margin-right: 319px;">

										<b style="margin-right: 309px; color: red; font-size: 17px;">*</b>

										<p style="text-align: left;font-weight: bold; margin-top: -16px; color: #7f7f7f; font-size:14px;">Pedido Minimo</p>

										<div style="margin-top: -21px; margin-right: 78px;">

											<input name="pedido_min" style="height: 28px; width: 124px;"type="text" value="<?php echo set_value('pedido_min'); ?>"/>                      

											<div style="margin-top: -30px; margin-left: 291px;">

												<input type="text" name="medidas" readonly style="height: 28px; background: rgb(218, 218, 218);width: 133px;border: none; text-align: center;color:gray;" placeholder="Unidades" />     

											</div>

											<?php echo form_error('pedido_min', '<div class="error">', '</div>'); ?>

											<div style="width: 129px; margin-top: 2px; margin-left: 5px;">

												<p style="text-align: left; font-size: 13px; color: #A8ABB4;">Ingrese la cantidad</p>

												<p style="text-align: left; font-size: 13px; color: #A8ABB4;">Ej. 100</p>

											</div>

										</div>

									</div>



									<div style="background: white; height: 38px; width: 529px; margin-top: 47px; margin-right: 319px;">

										<b style="margin-right: 251px; color: red; font-size: 17px;">*</b>

										<p style="text-align: left;font-weight: bold; margin-top: -16px; color: #7f7f7f; font-size:14px;">Tiempo de Entrega</p>

										<div style="margin-top: -21px; margin-right: 78px;">

											<input name="tiempo_entrega" style="height: 28px; width: 124px;"type="text" value="<?php echo set_value('tiempo_entrega'); ?>"/>                      

											<div style="margin-left: 255px; margin-top: -28px;">

												<select id="combo2" name="list_entrega">

													<option value="Semanas">Semanas</option>

													<option value="Dias">Dias</option>

													<option value="Meses">Meses</option>

													<option value="Horas">Horas</option>

												</select>    

											</div>

											<?php echo form_error('tiempo_entrega', '<div class="error">', '</div>'); ?>

											<div style="width: 129px; margin-top: 8px; margin-left: 5px;">

												<p style="text-align:left; font-size: 13px; color: #A8ABB4;">Ej. 8</p>

											</div>  

										</div>

									</div>



									<div style="background: white; height: 38px; width: 529px; margin-top: 47px; margin-right: 319px;">

										<p style="text-align: left;font-weight: bold; margin-top: -16px; color: #7f7f7f; font-size:14px;">Capacidad de</p>

										<p style="text-align: left;font-weight: bold; margin-top: -2px; color: #7f7f7f; font-size:14px; margin-left: -2px;">Suministro</p>

										<div style="margin-top: -36px; margin-right: 78px;">

											<input name="capacidad" style="height: 28px; width: 124px;"type="text" value="<?php echo set_value('capacidad'); ?>"/>

											<div style="margin-top: -30px; margin-left: 291px;">

												<input type="text" name="medidas" readonly style="height: 28px; background: rgb(218, 218, 218);width: 133px;border: none; text-align: center; color:gray;" placeholder="Unidades" />

												<p style="margin-left: 155px; margin-top: -23px; font-size: 13px;">por</p>

												<div style="margin-top: -24px; margin-left: 266px;">

													<select id="combo" name="list_capacidad" style="margin-top: 3px; margin-left: -86px;">

														<option value="Día">Dia</option>

														<option value="Semana">Semana</option>

														<option value="Mes">Mes</option>

														<option value="Hora">Hora</option>

													</select>                                 

												</div>    

												<?php echo form_error('capacidad', '<div class="error">', '</div>'); ?> 

											</div>

											<div style="width: 129px; margin-top: 2px; margin-left: 5px;">

												<p style="text-align:left; font-size: 13px; color: #A8ABB4;">Ingrese la cantidad</p>

												<p style="text-align:left; font-size: 13px; color: #A8ABB4;">Ej. 500</p>

											</div>  

										</div>

									</div>

								</div>



								<!-- 2. negociacion / forma de pago -->

								<br>

								<div style="background: white; height: 38px; width: 529px; margin-top: 1px; margin-right: 367px;">

									<b style="margin-right: 306px; color: red; font-size: 17px;">*</b>

									<p style="text-align: left;font-weight: bold; margin-top: -16px; color: #7f7f7f; font-size:14px;">Forma de Pago</p>

									<div style="margin-top: -18px; margin-right: -69px;">

										<p style="font-size: 14px; color: #A8ABB4; ">Selecciona una o varias de las opciones listadas</p>

										<?php echo form_error('pago', '<div class="error">', '</div>'); ?>

									</div>

								</div>



								<div style="background:transparent; height: 151px; margin-right: 101px; width: 459px;">

									<!-- <form class="ac-custom ac-checkbox ac-checkmark" autocomplete="off"> -->

									<ul>

										<li>

											<input id="cb6" name="pago[]" type="checkbox" value="Transferencia Bancaria" <?php echo set_checkbox('pago', 'Transferencia Bancaria', false) ?>>

											<label for="cb6" style="margin-top: -18px; width: 303px; margin-left: -329px; font-size: 13px;">Transferencia Bancaria</label></li>

										<li style="margin-top: -17px;">

											<input id="cb7" name="pago[]" type="checkbox" value="Giros Nacionales" <?php echo set_checkbox('pago', 'Giros Nacionales', false) ?>>

											<label for="cb7" style="margin-top: -18px; width: 303px; margin-left: -360px; font-size: 13px;">Giros Nacionales</label></li>

										<li style="margin-top: -17px;">

											<input id="cb8" name="pago[]" type="checkbox" value="Cheque" <?php echo set_checkbox('pago', 'Cheque', false) ?>>

											<label for="cb8" style="margin-top: -18px; width: 303px; margin-left: -415px; font-size: 13px;">Cheque</label></li>

										<li style="margin-left: 245px; margin-top: -135px;">

											<input id="cb9" name="pago[]" type="checkbox" value="Efectivo" <?php echo set_checkbox('pago', 'Efectivo', false) ?>>

											<label for="cb9" style="margin-top: -18px; width: 303px; margin-left: -169px; font-size: 13px;">Efectivo</label></li>

										<li style="margin-left: 245px; margin-top: -17px;">

											<input id="cb9" name="pago[]" type="checkbox" value="Contraentrega" <?php echo set_checkbox('pago', 'Contraentrega', false) ?>>

											<label for="cb10" style="margin-top: -17px; width: 303px; margin-left: -132px; font-size: 13px;">Contraentrega</label></li>

										<li style="margin-left: 245px; margin-top: -17px;">

											<input id="cb9" name="pago[]" type="checkbox" value="A Convenir" <?php echo set_checkbox('pago', 'A Convenir', false) ?>>

											<label for="cb11" style="margin-top: -17px; width: 303px; margin-left: -150px; font-size: 13px;">A Convenir</label></li>

										<ul>

											<!-- </form> -->

											</div>

											<script src="<?= base_url() ?>js/publicar/svgcheckbx.js"></script>



											<div style="background:transparent; height: 76px; margin-top: -125px; margin-left: 442px; width: 150px; margin-bottom: 12px;">

												<p style="color: #7f7f7f; font-size:13px; ">Otra forma de Pago</p>

												<?php echo form_error('otra', '<div class="error">', '</div>'); ?>

												<input type="text" id="pminimo" name="otra" value="<?php echo set_value('otra'); ?>"></input>

											</div>

											<br> <br> <br>



											<!-- 3. informacion complementaria -->

											<div class="grid_2" id="es1">

												<p id="es11">3. Información complementaria</p>

											</div>



											<div style="background: transparent; width: 125px; margin-top: 79px; margin-right: 763px; text-align:left;"> 

												<p style="color: #A8ABB4; font-size:13px;">Empresa o sector al que le interesa el producto</p>

											</div>

											<div style="background: transparent; width: 315px; height: 37px;margin-top: -56px; margin-right: 265px; text-align: left;">
												<script>
										$(document).ready(function() {
											$("#combo_tipo").load("<?php echo base_url() ?>publicar_producto/tipo_empresa");
										});
												</script>
												<select id="combo_tipo" name="tipo" style="margin-top: 3px;margin-left: 2px; border: solid 1px #A0FF24;">


													<option value=" ">--------</option>



												</select>  

												<select id="combo" name="sector" style="margin-top: 3px;margin-left: 2px; border: solid 1px #A0FF24;">

													<option value=" ">--------</option>

													<option value="Sector">Sector</option>

													<option value="Sector">Sector</option>

													<option value="Sector">Sector</option>

													<option value="Sector">Sector</option>

												</select>  

											</div>



											<div style="background: transparent; width: 161px; margin-top: 52px; margin-right: 728px; text-align: left;"> 

												<p style="color: #A8ABB4; font-size:13px;">Estado del Producto</p>

											</div>

											<div style="background: transparent; width: 315px; height: 37px;margin-top: -28px; margin-right: 265px; text-align: left">

												<select id="combo" name="estado" style="margin-top: 3px;margin-left: 2px; border: solid 1px #A0FF24;">

													<option value=" ">--------</option>

													<option value="Nuevo">Nuevo</option>

													<option value="Usado">Usado</option>

												</select>  

											</div>



											<!-- boton enviar formulario -->

											<div class="grid_2" id="espacio15">

                  <!-- <img src="<?//=base_url()?>img/boton_publicar.png" style="margin-left: 439px; margin-top: -249px;"/> -->

												<button type="submit" style="border: 0; background-color: transparent;margin-left: 439px; margin-top: -249px;">

													<img src="<?= base_url() ?>img/boton_publicar.png" />

												</button> 

											</div>

											<?= form_close() ?> <!-- Cierra el formulario-->

											</div> <!--fin del div que maneja el contenido de la apgina -->

											</div> <!--fin del div que maneja el cuerpo del sscontenido -->

											</div>

											</section> </article>

											</div>

											</body>

											</html>

