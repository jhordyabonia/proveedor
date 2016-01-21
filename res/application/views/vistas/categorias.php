<!DOCTYPE html>
<html lang = "es">
  	<head>
		<!--[if lt IE 9]>
		  	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
		<meta charset="UTF-8"> 
		<title>PROVEEDOR.com.co / Categorías</title>
		<link rel="stylesheet" href="<?=base_url()?>css/960.css">
		<link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
		<link rel="stylesheet" href="<?=base_url()?>css/reset.css">
		<link rel="stylesheet" href="<?=base_url()?>css/categoria/estilosheader.css">

		<!-- importaciones sistema de paginacion -->
      <link rel="stylesheet" href="<?=base_url()?>css/categoria/pagination.css" />
		<script type="text/javascript" src="<?=base_url()?>js/jquery-1.9.1.js"> </script>
		<script type="text/javascript" src="<?=base_url()?>js/categoria/jquery.pagination.js"> </script> 
		

<?php 
	echo '<script type="text/javascript">
	var productos = [';
	if($productos){
		foreach (@$productos as $value) {
	echo '	
    ["uploads/resize/'.@$value->nombre_img.'", "'.@$value->nom_producto.'",
    "'.@$value->precio_unidad.'", "'.@$value->pedido_min.' unidades pedido mínimo",
    "'.nl2br(substr(@$value->descripcion_producto, 0, 76)).'..",
    "1", "'.@$value->nombre.'", 
    "Origen del Despacho: ", "'.@$value->ubicacion.'", 
    "Estado del Producto: ", "En Stock", 
    "Marca: ", "Pvor", 
    "Ciudad: ", "'.@$value->ciudad.'"], ';
    }
}
    
    echo ']; </script>';

?>


		<script type="text/javascript">
			//variable global: items por pagina
			var items_per_page = 20;

			// When document is ready, initialize pagination
			//cuando el documento este listo inicializar la paginacion
			$(document).ready(function(){      
				initPagination();
			});

			//funcion que prepara lo necesario para implementar la paginacion
			function initPagination() {
				$("#Pagination").pagination(productos.length, {
					callback: pageselectCallback,
					items_per_page: items_per_page
				});
			}

			function pageselectCallback(page_index, jq) {
				//formula que establece la maxima cantidad de elementos a mostrar en c/pagina
				var max_elem = Math.min((page_index+1) * items_per_page, productos.length);
				//variable que contendran los datos ya formateados 
				var new_content = "";

				//for para iterar entre los elementos de la lista de contactos
				//con el formato definido para el html de panel7
				for (var i=page_index*items_per_page ; i<max_elem ; i++) {
					//concatenar a new_content los elementos del archivo datosContactos.js
					//en el formato especificado de html
					//new_content += '';
					new_content += '<div>';
						<!-- //contenedor general -->
						new_content += '<div class="grid_4" style="margin: 3px 0px 20px -11px; width:100%;height:200px;background:#FFF;">';
							<!-- //aside izquierdo: imagen producto -->
							new_content += '<div class="grid_4" style="margin: 0px 12px 0px 11px; width:185px; height:147px; background: #FFF;">';
								new_content += '<div class="grid_4" style="margin:13px 0px 0px 1px; width:183px;height:145px; background:#FFF;"></div>';
								new_content += '<div class="grid_4" style="margin: -149px 0px 0px 9px; height: auto;">';
									new_content += '<table style="width:167px; height:127px; background:#FFF; text-align: center;">';
										new_content += '<tr> <td style="vertical-align: middle; text-align: center;">';
											new_content += '<a href="#"> <img src="<?=base_url()?>' + productos[i][0] + '" style="height: auto; max-height: 127px; width: auto; max-width: 167px;" /> </a>';
										new_content += '</td> </tr>';
									new_content += '</table>';
								new_content += '</div>';
							new_content += '</div>';

							<!-- //aside izquierdo: boton favoritos (debajo de la imagen) -->
							new_content += '<div class="grid_4" style="margin:153px 0px 0px -196px; width:185px; background:#FFF; height:27px;">';
								new_content += '<a href="#"> <img src="<?=base_url()?>img/estrella.png" style="margin-top: 12px;" /></a>';
								new_content += '<a href="#" style="text-decoration: none; font-size: 12px; font-family: arial; vertical-align: sub;"> Agregar producto a Favoritos </a>';
							new_content += '</div>';

							<!-- //contenedor central -->
							new_content += '<div class="grid_4" style="margin: 11px 12px 0px 8px; width:558px; height:167px; background:#f4f4f4;">';
								<!-- //contenedor central / titulo del producto -->
								new_content += '<div class="grid_4" style="margin: -1px 12px 0px -1px; width: 326px; height: 39px; background: #FFF; display: table !important;">';
									new_content += '<b style="color: #0000ff; text-decoration: blink; display: table-cell; vertical-align: bottom; font-size: 15px; font-family: arial;">' 
										+ productos[i][1] + '</b>';
								new_content += '</div>';
								<!-- //contenedor central / precio, unidades y descripcion (debajo del titulo) -->
								new_content += '<div class="grid_4" style="margin: 41px 0px 0px -340px; width: 326px; height: 125px; background:#FFF;">';
									new_content += '<div class="grid_4" style="width: 265px; height: 44px; margin: 16px 0px 10px 0px;">';
										new_content += '<table style="width: 100%;"> <tr>';
											<!-- //precio -->
											new_content += '<td style="width: 147px;">';
												new_content += '<table> <tr> <td style="text-align: center; vertical-align: middle;">';
													new_content += '<center> <table> <tr>';
														new_content += '<td> <p style="color: black; font-size: 13px; font-weight: bold; margin-right: 8px; margin-top: 0px;"> Precio: </p> </td>';
														new_content += '<td> <p style="color: #ff7f27; font-size: 23px; margin-right: 4px; margin-top: -5px;"> $ </p> </td>';
														new_content += '<td style="vertical-align: middle;"> <table>';
															new_content += '<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black; margin-bottom: 6px;">' + productos[i][2] + '</p> </center> </td>';
															new_content += '</tr>';
															new_content += '<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" style="margin-top: -8px;" /> </center> </td>';
															new_content += '</tr>';
														new_content += '</table> </td>';
													new_content += '</tr> </table> </center>';
												new_content += '</td> </tr> </table>';
											new_content += '</td>';
											<!-- //texto unidades -->
											new_content += '<td style="width: auto;">';
												new_content += '<p style="font-size: 13px; font-family: arial; color: gray; margin-left: 10px;">' 
													+ productos[i][3] + '</p>';
											new_content += '</td>';
										new_content += '</tr> </table>';
									new_content += '</div>';
									<!-- //descripcion -->
									new_content += '<div class="grid_4" style="margin:0px 0px 0px 0px; width:284px; height:41px; background: #FFF;">';
										new_content += '<p style="font-size: 14px; font-family: arial; color: gray;">' 
											+ productos[i][4] + '</p>';
									new_content += '</div>';
								new_content += '</div>';
								<!-- //contenedor central / certificacion del proveedor -->
								new_content += '<div class="grid_4" style="margin: -1px -15px 0px -11px; width:231px; height:44px; background:#FFF;">';
									if (productos[i][5] == "1") { //si es certificado
										new_content += '<center><a href="#"> <img src="<?=base_url()?>img/certificado_2.png" /></a></center>';
									} else if (productos[i][5] == "0") { //si NO es certificado 
										new_content += '<center><a href="#"> <img src="<?=base_url()?>img/nocertificado.png" /></a></center>'; 
									}
								new_content += '</div>';
								<!-- //contenedor central / informacion del proveedor -->
								new_content += '<div class="grid_4" style="margin: 26px -22px 0px -218px; width: 231px; height: 140px; background: #FFF; display: table !important;">';
									<!-- //contenedor central / informacion del proveedor / nombre -->
									new_content += '<div style="height: 40px; max-height: 40px; display: table-row !important; overflow: hidden;">';
										new_content += '<p style="font-size: 15px; font-family: arial; color: #fe7f1c; margin-left: 13px; text-align: center; height: auto; overflow: hidden; margin-bottom: 0px; display: table-cell; vertical-align: middle; padding-left: 20px; padding-right: 20px;">' 
											+ productos[i][6] + '</p>';
									new_content += '</div>';
									<!-- //contenedor central / informacion del proveedor / combo titulo:valor -->
									new_content += '<div class="grid_4" style="margin: 3px 0px 0px 27px; width:201px; height:88px; background:#FFF;">';
										new_content += '<table style="width: auto; height: auto; font-size: 12px; border-collapse: separate; border-spacing: 4px;">';
											new_content += '<tr>';
												new_content += '<td> <b>' + productos[i][7] + '</b>' + productos[i][8] + '</td>';
											new_content += '</tr>';
											new_content += '<tr>';
												new_content += '<td> <b>' + productos[i][9] + '</b>' + productos[i][10] + '</td>';
											new_content += '</tr>';
											new_content += '<tr>';
												new_content += '<td> <b>' + productos[i][11] + '</b>' + productos[i][12] + '</td>';
											new_content += '</tr>';
											new_content += '<tr>';
												new_content += '<td> <b>' + productos[i][13] + '</b>' + productos[i][14] + '</td>';
											new_content += '</tr>';
										new_content += '</table>';
									new_content += '</div>';
								new_content += '</div>';
							new_content += '</div>'; //cierre contenedor central

							<!-- //aside derecho: botones de comunicacion -->
							new_content += '<div class="grid_4" style="margin: 0px 0px 0px -1px; width: 195px; height: 191px; background:#FFF;">';
								<!-- //aside derecho: botones de comunicacion / chatea ahora -->
								new_content += '<div class="grid_4" style="margin: -15px 0px 6px 3px; width: 88px; height: 13px; background: #FFF;">';
									new_content += '<b style="font-size:11px;font-family:arial; margin-left:5px; font-weight:normal;">Chatea ahora!</b>';
								new_content += '</div>';
								<!-- //aside derecho: botones de comunicacion / tablita con botones (reforma del original) -->
								new_content += '<table style="border-spacing: 0; border-collapse: separate;">';
									new_content += '<tr>';
										<!-- //aside derecho: botones de comunicacion / boton 1,1 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width: 94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="<?=base_url()?>img/disponible.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
										<!-- //aside derecho: botones de comunicacion / boton 2,1 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="<?=base_url()?>img/addproveedor.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
									new_content += '</tr>';
									new_content += '<tr>';
										<!-- //aside derecho: botones de comunicacion / boton 1,2 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="<?=base_url()?>img/contactar_2.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
										<!-- //aside derecho: botones de comunicacion / boton 2,2 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="<?=base_url()?>img/call_2.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
									new_content += '</tr>';
								new_content += '</table>';
							new_content += '</div>';
						new_content += '</div>'; //cierre contenedor general
						<!-- //separador -->
						new_content += '<div class="grid_4" style="margin: -18px 0px 0px 0px; width: 967px; height: 0px; background: #f4f4f4;"></div>';
					new_content += '</div>'; //cierre div TOTAL
				}

				//se hace una especie de innerHTML en el gran div Searchresult, con el resultado de la consulta (?)
				//$('#Searchresult').empty().append(new_content);
				$('#Searchresult').html(new_content);

				// Prevent click event propagation
				return false;
			}
		</script>

		<!-- importaciones para las tabs -->
		<link href='<?=base_url()?>css/categoria/estilostabs.css' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="<?=base_url()?>js/categoria/jstabs.js"> </script>

		<!-- importaciones visualizadores de imagenes -->
		<link href="<?=base_url()?>css/categoria/amazon_scroller.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?=base_url()?>js/categoria/amazon_scroller.js"> </script>
		<script type="text/javascript">
			$(function() {
				$("#amazon_scroller1").amazon_scroller({
					scroller_title_show: 'enable',
					scroller_time_interval: '4000',
					scroller_window_background_color: "transparent",
					scroller_window_padding: '10',
					scroller_border_size: '0',
					scroller_border_color: '#f4f4f4',
					scroller_images_width: '170',
					scroller_images_height: 'auto',
					scroller_title_size: '12',
					scroller_title_color: 'black',
					scroller_show_count: '5',
					directory: '<?=base_url()?>img'
				});
				$("#amazon_scroller2").amazon_scroller({
					scroller_title_show: 'enable',
					scroller_time_interval: '5000',
					scroller_window_background_color: "transparent",
					scroller_window_padding: '10',
					scroller_border_size: '0',
					scroller_border_color: '#ddd',
					scroller_images_width: '170',
					scroller_images_height: 'auto',
					scroller_title_size: '12',
					scroller_title_color: 'black',
					scroller_show_count: '5',
					directory: '<?=base_url()?>img'
				});
			});
		</script>

		<!-- estilos css generales -->
		<style type="text/css">
			/* estilos generales */
			html, body {
				font-family: Arial;
				/* desaparece scroll horizontal en IE y otros */
				overflow-x: hidden;
				overflow-y: auto;
			}

			a {
				text-decoration: none !important;
			}

			.container_12{
				background:#FFFFFF;
				height:2647px;
				width: 1346px;
				max-width: 1321px;
				margin-top: 0px;
				margin-left: center;
				margin-right: center;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* contenedores generales */
			.grid_1{
				background: red;
				height: 50px;
				width: 225px;
			}

			.grid_2{
				background: red;
				height:300px;
				width: 100%;
			}

			.grid_4{
				background: transparent;
				height:512px;
				margin:12px 12px;
				width: 300px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* header 1 y 2: estilos */
			#ha{
				width: 1280px;
				max-width: 1280px;
				height:31px;
				background:#FFFFFF;
			}

			#hi{
				margin-top: 13px;
				height: 64px;
				width: 218px;
				background:#FFFFFF;
			}

			#he {
				margin-top: 26px;
				width: 1034px;
				max-width: 1034px;
				height: auto;
				background:#FFFFFF;
				margin-left: -5px;
			}

			#barra {
				width: auto;
				display: block; 
				height: auto;
				min-height: 39px;
				/*max-height: 40px; */
				border-radius: 3px; 
				border: 3px solid #005e9b; 
				box-shadow: 682px 4px 2px white, 4px 4px 0.2px -1px #ddd;
			}

			.flechita select {
				-moz-appearance: none;
				appearance: none;
				text-indent: 0.01px;
				text-overflow: '';
				background-image: url("<?=base_url()?>img/flechita_select.png");
				background-position: 87px 17px;
				background-repeat: no-repeat;
			}

			#cuadrobusqueda {
				padding-left: 15px; 
				height: 39px; 
				max-height: 40px; 
				width: 493px; 
				border: none;
			}

			#cuadrobusqueda:focus {
				outline: 0px;
			}

			#btn_busqueda {
				background: url('<?=base_url()?>img/botonbusqueda.png'); 
				width: 65px; 
				height: 41px; 
				cursor: pointer; 
				border: none;
				display: block;
				margin-bottom: -1px;
			}

			select {
				padding: 10px;
				margin: 0;
				background: transparent;
				color: #ff812d; /* naranja el texto */
				border-right: 1px solid #ddd;
				border-top: none;
				border-left: none;
				border-bottom: none;
				outline:none;
				display: inline-block;
				-webkit-appearance:none;
				-moz-appearance:none;
				appearance:none;
				cursor:pointer;
				font-weight: bold;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* div donde va el slider de productos 1 */
			#div2 {
				height: auto;
				width: 1019px;
				margin-top: 12px;
				margin-left: 234px;
			}
			#margen {
				height: auto;
				width: 1012px;
				margin-top: 3px;
				background: #FFFFFF;
				margin-left: 3px;
				padding-bottom: 20px;
			}
			#divruta {
				margin-top: 3px; 
				margin-left: 3px; 
				width: 681px; 
				height: auto; 
				background: transparent; 
				font-size: 13px;
			}
			/* titulo de la pagina/seccion actual */
			#divtitulo {
				margin-top: 20px; 
				margin-left: -695px; 
				width: 480px; 
				height: 27px; 
				background: transparent;
			}
			#titulo {
				margin-top: 0px;
				font-weight: bold; 
				font-size: 22px; 
				color: black;
			}
			#divtablita1 {
				width: 1000px; 
				height: 322px; 
				margin-top: 60px;
			}
			/* elementos producto/vis de imagenes */
			.c_prodplus_divgen {
				width: 168px;
				max-width: 168px; 
				min-width: 168px; 
				height: 272px;
				min-height: 272px;
				max-height: 272px;
			}
			.c_prodplus_imagen {
				width: auto; 
				max-width: 150px;
				height: auto;
				max-height: 125px;
			}
			.c_prodplus_imagensec { 
				width: auto; 
				max-width: 150px;
				height: auto;
				max-height: 55px;
				vertical-align: middle;
			}
			#textounidades {
				color: gray; 
				text-align: center; 
				padding-top: 4px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* div subcategorias ... */
			#marco2 {
				height: auto;
				width: 1019px;
				margin-top: -11px;
				margin-left: 234px;
				background: transparent;
			}
			#fotos_subcat {
				width: auto;
				max-width: 103px;
				height: auto;
				max-height: 78px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* div donde va el slider de productos 2 */
			#margen2 {
				height: auto;
				width: 1012px;
				margin-top: 3px;
				background: #FFFFFF;
				margin-left: 3px;
				padding-bottom: 20px;
				max-height: 342px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
			/* div que maneja el panel izquierdo de la pagina */
			#div1 {
				height: auto;
				width: 215px;
				margin-top: -1347px;
				background: transparent;
				padding-top: 25px;
			}

			.elemlista_masbuscados {
				list-style-image: url("<?=base_url()?>img/sonrisabusqueda.png");
				list-style-position: inside;
				padding-bottom: 5px;
				font-size: 16px;
				padding-left: 20px;
			}

			.listacategorias {
				color: blue;
				border-bottom: 1px solid #f6f6f6;
				padding-top: 7px;
				padding-bottom: 7px;
				font-size: 13px;
				padding-left: 6px;
			}
			.listacategorias.activo {
				color: white;
				background: #ff7f27;
				font-size: 14px;
				border-bottom: 1px solid #f6f6f6;
				padding-top: 7px;
				padding-bottom: 7px;
				padding-left: 6px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
			/* div que maneja el sistema de paginacion */
			#div3 {
				height: auto;
				width: 1023px;
				margin-left: 237px;
				margin-top: -1380px;
			}
			#div3_interno {
				width: 1028px;
				height: auto; 
				background: white;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
			/* pregunta de satisfaccion */
			#preguntasat {
				margin: 20px 0px 0px 390px; 
				width: 539px; 
				height: auto; 
				max-height: 146px;
				background:#ffffff;
			}
			#preguntasat_titulo {
				margin: 3px 0px -27px 3px; 
				width: 306px; 
				height: 37px; 
				background: #ffffff;
			}
			#preguntasat_botones {
				margin: -26px 0px -27px 317px; 
				width: 220px; 
				height: 63px; 
				background: #ffffff;
			}
			#preguntasat_subtitulo {
				margin: 17px 0px -27px 3px; 
				width: 533px; 
				height: 42px; 
				background: #ffffff;
			}
			#preguntasat_btnpublicaroferta {
				width: auto;
				height: auto;
				margin: 0;
				padding: 42px 0px 0px 0px;
				margin-left: 200px;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
			/* productos especiales */
			#prodespeciales {
				width: 1222px;
				height: 310px;
				border: 2px solid #f3f3f4;
				margin: 30px 0px 0px 18px;
			}
			#tablita_PE {
				margin: 39px 0px 0px -413px;
			}
			.imagenes_PE {
				width: auto; 
				max-width: 169px;
				height: auto;
				max-height: 113px;
				vertical-align: middle;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
			/* publicidad */
			#publicidad {
				width: 94%;
				height: 84px;
				max-height: 84px;
				text-align: center;
			}

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
			/* footer */
			#footer {
				height: auto;
				width: 100%; 
				background:#f2f2f2;
			}
			#iframe_footer {
				height: 353px; 
				width: 102%;
				margin-left: -15px;
			}
		</style>

		<!-- estilos css para resoluciones 1024 -->
		<!-- (nota: no todos los estilos ni todos sus atributos aparecen aqui -->
		<!-- porque no fueron necesarios que cambiaran) -->
		<style type="text/css">
			@media screen and (max-width: 1024px) {
				/* estilos generales */
				html, body {
					font-family: Arial;
					/* desaparece scroll horizontal en IE y otros */
					overflow-x: hidden;
					overflow-y: auto;
				}

				a {
					text-decoration: none !important;
				}

				.container_12 {
					width: 1008px;
					max-width: 1008px;
				}

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
				/* header 1 y 2: estilos */
				#ha{
					margin-left: -226px;
				}

				#he {
					width: 765px;
				}

				#cuadrobusqueda {
					width: 254px;
				}

				#cuadrobusqueda:focus {
					outline: 0px;
				}

				#btn_busqueda {
					width: 60px; 
				}

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
				/* div donde va el slider de productos 1 */
				#div2 {
					margin-left: 10px;
					background: white;
					/*border: 1px solid red;*/
				}
				#divtablita1 {
					width: 986px;
				}
				

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
				/* div subcategorias ... */
				#marco2 {
					margin-left: 10px;
					background: white;
				}

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
				/* div donde va el slider de productos 2 */
				#tablita2 {
					width: 986px;
				}

				#margen2 {
					margin-top: -42px; 
					padding-top: 42px;
					/*border: 2px solid blue;*/
				}

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
				/* div que maneja el panel izquierdo de la pagina */
				#div1 {
					visibility: hidden;
				}

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
				/* div que maneja el sistema de paginacion */
				#div3 {
					margin-left: 13px;
					margin-top: -1398px;
				}
				#content {
					/* personalizar el alto default del contenido de c/pestaña */
					min-height: 1323px;
				}

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
				/* pregunta de satisfaccion */
				#preguntasat {
					margin-left: 231px;
				}

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
				/* productos especiales */
				#prodespeciales {
					width: 970px;
				}
				#tablita_PE {
					margin: -6px 0px 0px -5px;
					width: 966px;
				}

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
				/* publicidad */
				#publicidad {
					width: 985px;
				}

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
				/* footer */
				#footer, #iframe_footer {
					width: 1010px;
				}
			}
		</style>
  	</head>

	<body> 
		<div class="container_12">
			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			<!-- header -->
		  	<div class="grid_1" id="ha">
				<iframe src="<?=base_url()?>header" scrolling="no" style="height: 60px; width: 104%;"></iframe>
		  	</div> 

		  	<div class="grid_1" id="hi"><a href="<?=base_url()?>index"> 
		  		<img src="<?=base_url()?>img/logo3.png" /> </a></div> 

		  	<!-- header: conjunto barra de busqueda y botones publicar -->
		  	<div class="grid_1" id="he">
			 	<table style="width: auto; height: auto;">
					<tr>
					  	<td style="height: 45px; padding-right: 13px;">
						 	<table id="barra">
								<tr>
									<td style="height: 40px; max-height: 40px; padding-top: 0px; padding-right: 3px;">
										<div class="flechita">
											<select name="selec1" style="height: 41px; width: 104px; border: none;">
												<option value="Productos" selected> Productos </option>
												<option value="Ofertas"> Ofertas </option>
												<option value="Empresas"> Empresas </option>
											</select>
										</div>
									</td>
									<td style="height: 33px; max-height: 40px; padding-top: 8px;"> 
										<div style="border-left: 2px solid #ddd; padding: 2px 0px 2px 0px; height: 68%;"> </div> 
									</td>
									<td style="height: 40px; max-height: 40px; display: block; font-size: 24px;"> 
										<input type="text" name="busqueda" placeholder="Ingresa tu Búsqueda" id="cuadrobusqueda"/> </td>
									<td style="max-height: 40px;"> 
										<input type="button" name="btn_busqueda"  id="btn_busqueda" /> </td>
								</tr>
							</table>
					  	</td>
					  	<td style="height: 50px;">
							<table style="width: auto; height: auto;">
								<tr>
							  		<td height="auto" style="padding-right: 8px;">
								 		<a href="#"> <img src="<?=base_url()?>img/boton_oferta.png" style="box-shadow: 1px 9px 0.2px -5px #ddd" /> </a>
							 		</td>
							  		<td height="auto">
								 		<a href="#"> <img src="<?=base_url()?>img/boton_producto.png" style="box-shadow: 1px 9px 0.2px -5px #ddd" /> </a>
							  		</td>
								</tr>
						 	</table>
					  	</td>
					</tr>
			  </table>
		 	</div> 
		  	
		  	<div class="clear"></div>

		  	<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
		  	<!-- contenedor -->
			<article> <section>
				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
		 		<!--  div donde va el slider de productos 1 -->
				<div class="grid_4" id="div2">
					<div class="grid_4" id="margen">
						<!-- ruta, titulo y subtitulo de la seccion actual -->
						<div class="grid_4" id="divruta"> <p id="ruta">
							Home &#187; <a href="#" style="color: blue"> <?=$categoria->nombre_categoria?> </a><!--  Nombre de la categoria -->
						</p> </div>
						<div class="grid_4" id="divtitulo"> <p id="titulo">
							<?=$categoria->nombre_categoria?> 
						</p> </div>
						<!-- elementos producto/vis de imagenes (foto/descripcion/precio) -->
						<!-- nota: algunos estilos del amazon scroller se re-colocan aqui por problemas con firefox -->
						<div id="divtablita1">
							<table width="100%" style="height: auto;"> <tr> <td style="height: 316px; border: 3px solid #f4f4f4;"> 
								<div id="amazon_scroller1" class="amazon_scroller" style="height: 272px; width: 960px;">
									<p style="color: #ff7f27; font-size: 17px; font-weight: bold; padding-bottom: 10px;"> 
										Productos más buscados </p>
									<div class="amazon_scroller_mask" style="height: 272px; width: 960px;">
									<ul>
										<li>
											<div class="c_prodplus_divgen">
												<center> <div style="padding: 5px 7px 5px 7px;"> <table width="auto" style="font-size: 13px;">
													<tr> <td style="text-align: center; vertical-align: middle; height: 125px;">
														<img src="<?=base_url()?>img/ipad_1.png" class="c_prodplus_imagen"/>
													</td> </tr>
													<tr> <td style="padding-bottom: 8px; padding-top: 15px; text-align: center;">
														<a href="#"> <p style="color: #3aa2ed; height: 34px; font-size: 15px; overflow: hidden;"> 
															iPad 4 16 Gb + Wifi + 3g + accesorios 
														</p> </a> 
													</td> </tr>
													<tr> <td style="padding-bottom: 8px;"> <center> <table>
														<tr>
															<td> <p style="color: #ff7f27; font-size: 40px; margin-right: 2px;"> $ </p> </td>
															<td style="vertical-align: middle;"> <table>
																<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
																	1.000.458.000 </p> </center> </td>
																</tr>
																<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" 
																	style="margin-top: -1px;" /> </center> </td>
																</tr>
															</table> </td>
														</tr>
														<tr> <td id="textounidades" style="font-size: 15px; padding-top: 6px;" colspan="2">
															<p style="margin-top: -5px;"> 30000 unidades </p>
														</td> </tr>
														<tr> <td id="textounidades" style="font-size: 11px;" colspan="2">
															<p style="margin-top: -3px;"> pedido mínimo </p>
														</td> </tr>
													</table> </center> </td> </tr>
												</table> </div> </center> 
											</div>
										</li>
										<!-- !!!!!!!!!!!!!!!!!!!! -->
										<li>
											<div class="c_prodplus_divgen">
												<center> <div style="padding: 5px 7px 5px 7px;"> <table width="auto" style="font-size: 13px;">
													<tr> <td style="text-align: center; vertical-align: middle; height: 125px;">
														<img src="<?=base_url()?>img/memorias_usb.png" class="c_prodplus_imagen"/>
													</td> </tr>
													<tr> <td style="padding-bottom: 8px; padding-top: 15px; text-align: center;">
														<a href="#"> <p style="color: #3aa2ed; height: 34px; font-size: 15px; overflow: hidden;"> 
															Memorias USB
														</p> </a> 
													</td> </tr>
													<tr> <td style="padding-bottom: 8px;"> <center> <table>
														<tr>
															<td> <p style="color: #ff7f27; font-size: 40px; margin-right: 2px;"> $ </p> </td>
															<td style="vertical-align: middle;"> <table>
																<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
																	458.000 </p> </center> </td>
																</tr>
																<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" 
																	style="margin-top: -1px;" /> </center> </td>
																</tr>
															</table> </td>
														</tr>
														<tr> <td id="textounidades" style="font-size: 15px; padding-top: 6px;" colspan="2">
															<p style="margin-top: -5px;"> 30000 unidades </p>
														</td> </tr>
														<tr> <td id="textounidades" style="font-size: 11px;" colspan="2">
															<p style="margin-top: -3px;"> pedido mínimo </p>
														</td> </tr>
													</table> </center> </td> </tr>
												</table> </div> </center> 
											</div>
										</li>
										<!-- !!!!!!!!!!!!!!!!!!!! -->
										<li>
											<div class="c_prodplus_divgen">
												<center> <div style="padding: 5px 7px 5px 7px;"> <table width="auto" style="font-size: 13px;">
													<tr> <td style="text-align: center; vertical-align: middle; height: 125px;">
														<img src="<?=base_url()?>img/papita.png" class="c_prodplus_imagen"/>
													</td> </tr>
													<tr> <td style="padding-bottom: 8px; padding-top: 15px; text-align: center;">
														<a href="#"> <p style="color: #3aa2ed; height: 34px; font-size: 15px; overflow: hidden;"> 
															Papa parda
														</p> </a> 
													</td> </tr>
													<tr> <td style="padding-bottom: 8px;"> <center> <table>
														<tr>
															<td> <p style="color: #ff7f27; font-size: 40px; margin-right: 2px;"> $ </p> </td>
															<td style="vertical-align: middle;"> <table>
																<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
																	458.000 </p> </center> </td>
																</tr>
																<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" 
																	style="margin-top: -1px;" /> </center> </td>
																</tr>
															</table> </td>
														</tr>
														<tr> <td id="textounidades" style="font-size: 15px; padding-top: 6px;" colspan="2">
															<p style="margin-top: -5px;"> 30000 unidades </p>
														</td> </tr>
														<tr> <td id="textounidades" style="font-size: 11px;" colspan="2">
															<p style="margin-top: -3px;"> pedido mínimo </p>
														</td> </tr>
													</table> </center> </td> </tr>
												</table> </div> </center> 
											</div>
										</li>
										<!-- !!!!!!!!!!!!!!!!!!!! -->
										<li>
											<div class="c_prodplus_divgen">
												<center> <div style="padding: 5px 7px 5px 7px;"> <table width="auto" style="font-size: 13px;">
													<tr> <td style="text-align: center; vertical-align: middle; height: 125px;">
														<img src="<?=base_url()?>img/cosaverde.png" class="c_prodplus_imagen"/>
													</td> </tr>
													<tr> <td style="padding-bottom: 8px; padding-top: 15px; text-align: center;">
														<a href="#"> <p style="color: #3aa2ed; height: 34px; font-size: 15px; overflow: hidden;"> 
															Máquina
														</p> </a> 
													</td> </tr>
													<tr> <td style="padding-bottom: 8px;"> <center> <table>
														<tr>
															<td> <p style="color: #ff7f27; font-size: 40px; margin-right: 2px;"> $ </p> </td>
															<td style="vertical-align: middle;"> <table>
																<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
																	458.000 </p> </center> </td>
																</tr>
																<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" 
																	style="margin-top: -1px;" /> </center> </td>
																</tr>
															</table> </td>
														</tr>
														<tr> <td id="textounidades" style="font-size: 15px; padding-top: 6px;" colspan="2">
															<p style="margin-top: -5px;"> 30000 unidades </p>
														</td> </tr>
														<tr> <td id="textounidades" style="font-size: 11px;" colspan="2">
															<p style="margin-top: -3px;"> pedido mínimo </p>
														</td> </tr>
													</table> </center> </td> </tr>
												</table> </div> </center> 
											</div>
										</li>
										<!-- !!!!!!!!!!!!!!!!!!!! -->
										<li>
											<div class="c_prodplus_divgen">
												<center> <div style="padding: 5px 7px 5px 7px;"> <table width="auto" style="font-size: 13px;">
													<tr> <td style="text-align: center; vertical-align: middle; height: 125px;">
														<img src="<?=base_url()?>img/ipad_3.png" class="c_prodplus_imagen"/>
													</td> </tr>
													<tr> <td style="padding-bottom: 8px; padding-top: 15px; text-align: center;">
														<a href="#"> <p style="color: #3aa2ed; height: 34px; font-size: 15px; overflow: hidden;"> 
															iPad
														</p> </a> 
													</td> </tr>
													<tr> <td style="padding-bottom: 8px;"> <center> <table>
														<tr>
															<td> <p style="color: #ff7f27; font-size: 40px; margin-right: 2px;"> $ </p> </td>
															<td style="vertical-align: middle;"> <table>
																<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
																	458.000 </p> </center> </td>
																</tr>
																<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" 
																	style="margin-top: -1px;" /> </center> </td>
																</tr>
															</table> </td>
														</tr>
														<tr> <td id="textounidades" style="font-size: 15px; padding-top: 6px;" colspan="2">
															<p style="margin-top: -5px;"> 30000 unidades </p>
														</td> </tr>
														<tr> <td id="textounidades" style="font-size: 11px;" colspan="2">
															<p style="margin-top: -3px;"> pedido mínimo </p>
														</td> </tr>
													</table> </center> </td> </tr>
												</table> </div> </center> 
											</div>
										</li>
										<!-- !!!!!!!!!!!!!!!!!!!! -->
										<li>
											<div class="c_prodplus_divgen">
												<center> <div style="padding: 5px 7px 5px 7px;"> 
													<table width="auto" style="font-size: 13px;">
													<tr> <td style="text-align: center; vertical-align: middle; height: 125px;">
														<img src="<?=base_url()?>img/monitores.png" class="c_prodplus_imagen"/>
													</td> </tr>
													<tr> <td style="padding-bottom: 8px; padding-top: 15px; text-align: center;">
														<a href="#"> <p style="color: #3aa2ed; height: 34px; font-size: 15px; overflow: hidden;"> 
															Monitores SAMSUNG
														</p> </a> 
													</td> </tr>
													<tr> <td style="padding-bottom: 8px;"> 
														<center> <table>
														<tr>
															<td> <p style="color: #ff7f27; font-size: 40px; margin-right: 2px;"> $ </p> </td>
															<td style="vertical-align: middle;"> 
																<table>
																<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
																	58.000 </p> </center> </td>
																</tr>
																<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" 
																	style="margin-top: -1px;" /> </center> </td>
																</tr>
															</table> </td>
														</tr>
														<tr> <td id="textounidades" style="font-size: 15px; padding-top: 6px;" colspan="2">
															<p style="margin-top: -5px;"> 30000 unidades </p>
														</td> </tr>
														<tr> <td id="textounidades" style="font-size: 11px;" colspan="2">
															<p style="margin-top: -3px;"> pedido mínimo </p>
														</td> </tr>
													</table> </center> 
												</td> </tr>
												</table> </div> </center> 
											</div>
										</li>
										<!-- !!!!!!!!!!!!!!!!!!!! -->
										<li>
											<div class="c_prodplus_divgen">
												<center> <div style="padding: 5px 7px 5px 7px;"> <table width="auto" style="font-size: 13px;">
													<tr> <td style="text-align: center; vertical-align: middle; height: 125px;">
														<img src="<?=base_url()?>img/ipad_2.png" class="c_prodplus_imagen"/>
													</td> </tr>
													<tr> <td style="padding-bottom: 8px; padding-top: 15px; text-align: center;">
														<a href="#"> <p style="color: #3aa2ed; height: 34px; font-size: 15px; overflow: hidden;"> 
															iPad 4 16 Gb + Wifi + 3g + accesorios CON TODOS LOS FIERROS
														</p> </a> 
													</td> </tr>
													<tr> <td style="padding-bottom: 8px;"> <center> <table>
														<tr>
															<td> <p style="color: #ff7f27; font-size: 40px; margin-right: 2px;"> $ </p> </td>
															<td style="vertical-align: middle;"> <table>
																<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
																	1.580.000 </p> </center> </td>
																</tr>
																<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" 
																	style="margin-top: -1px;" /> </center> </td>
																</tr>
															</table> </td>
														</tr>
														<tr> <td id="textounidades" style="font-size: 15px; padding-top: 6px;" colspan="2">
															<p style="margin-top: -5px;"> 30000 unidades </p>
														</td> </tr>
														<tr> <td id="textounidades" style="font-size: 11px;" colspan="2">
															<p style="margin-top: -3px;"> pedido mínimo </p>
														</td> </tr>
													</table> </center> </td> </tr>
												</table> </div> </center> 
											</div>
										</li> 
										<!-- !!!!!!!!!!!!!!!!!!!! -->
									</ul> </div>
									<ul class="amazon_scroller_nav" style="top: 121px; width: 960;"> <li></li> <li></li> </ul>
									<div style="clear: both"></div>
								</div>
							</td> </tr> </table>
						</div>
					</div>
				</div>

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!--  div que maneja el panel de subcategorias de la pagina--> 
				<div class="grid_4" id="marco2">
					<p style="font-weight: bold; font-size: 22px; padding-bottom: 20px;"> 
						Subcategorías de Equipos Eléctricos y Electrónicos </p>
					<table style="margin-left: 40px;">
						<tr>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;"> 
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/maquinaria.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría alfa </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-right: 38px;"> </td>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;">
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/cosarara.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría alfa </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-right: 38px;"> </td>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;"> 
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/maquinaria.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría alfa-beta-gama </p> </a> </td>
								</tr> </table> </div>
							</td>
						</tr>
						<tr> <td style="padding-top: 12px;"> </td> </tr>
						<tr>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;"> 
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/tuberia.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría Beta </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-right: 38px;"> </td>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;">
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/maquinaria.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría alfa-beta-gama </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-right: 38px;"> </td>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;"> 
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/ipad_1.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría beta </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-bottom: 38px;"> </td>
						</tr>
						<tr> <td style="padding-top: 12px;"> </td> </tr>
						<tr>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;"> 
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/cosarara.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría Gama </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-right: 38px;"> </td>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;">
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/ipad_2.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría Gama </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-right: 38px;"> </td>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;"> 
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/ipad_3.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría Gama </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-bottom: 38px;"> </td>
						</tr>
						<tr> <td style="padding-top: 12px;"> </td> </tr>
						<tr>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;"> 
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/puerta.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría Alfa-Beta-Gama </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-right: 38px;"> </td>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;">
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/computador.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría Alfa-Beta-Gama </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-right: 38px;"> </td>
							<td style="border: 3px solid #f4f4f4; width: 280px; height: 68px;"> 
								<div style="padding: 10px 10px 10px 10px;"> <table> <tr>
									<td style="width: 103px; text-align: center; height: 78px; vertical-align: middle;"> <a href="#">
										<img src="<?=base_url()?>img/balon.png" id="fotos_subcat" /> </a> </td>
									<td style="vertical-align: middle; padding-left: 10px;"> 
										<a href="#" style="color: blue;"> <p style="font-weight: bold; font-size: 16px;"> 
											Subcategoría Alfa-Beta-Gama </p> </a> </td>
								</tr> </table> </div>
							</td> <td style="padding-bottom: 38px;"> </td>
						</tr>
					</table>
				</div>

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!--  div donde va el slider de productos 2 -->
				<div class="grid_4" id="div2" style="margin-top: 30px; max-height: 357px;">
					<div class="grid_4" id="margen2">
						<!-- elementos producto/vis de imagenes (foto/descripcion/precio) -->
						<!-- nota: algunos estilos del amazon scroller 2 se re-colocan aqui por problemas con opera -->
						<table id="tablita2" width="100%" style="height: auto;"> <tr> <td style="height: 316px; border: 3px solid #f4f4f4;"> 
							<div id="amazon_scroller2" class="amazon_scroller" style="width: 960px; height: 272px;">
								<p style="color: #ff7f27; font-size: 17px; font-weight: bold; padding-bottom: 10px;"> 
									Productos más nuevos </p>
								<div class="amazon_scroller_mask" style="width: 900px; height: 272px;"> 
									<ul>
								<!-- En este ciclo se imprime las 7 imagenes que se muestran en la vista de categorias en la parte de
								productos mas nuevos, con sus respectivos datos traidos desde la bd		 -->
								<?php  foreach ($prod_mas_nuevos as $row): ?>
									<li>
										<div class="c_prodplus_divgen">
											<center> <div style="padding: 5px 7px 5px 7px;"> 
												<table width="auto" style="font-size: 13px;">
												<tr> <td style="text-align: center; vertical-align: middle; height: 125px;">
													<a href="<?=base_url()?>producto/ver/<?= $row->id_producto;?>/<?= $row->id_usuario;?>"> 
													<img src="<?=base_url()?>uploads/resize/<?=$row->nombre_img?>" class="c_prodplus_imagen"/>
													</a>
												</td> </tr>
												<tr> <td style="padding-bottom: 8px; padding-top: 15px; text-align: center;">
													<a href="<?=base_url()?>producto/ver/<?= $row->id_producto;?>/<?= $row->id_usuario;?>"> 
														<p style="color: #3aa2ed; height: 34px; font-size: 15px; overflow: hidden;"> 
														<?=$row->nom_producto; ?> 
													</p> </a> 
												</td> </tr>
												<tr> <td style="padding-bottom: 8px;"> 
													<center> <table>
													<tr>
														<td> <p style="color: #ff7f27; font-size: 40px; margin-right: 2px;"> $ </p> </td>
														<td style="vertical-align: middle;"> 
															<table>
															<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
																<?= $row->precio_unidad; ?> </p> </center> </td>
															</tr>
															<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" style="margin-top: -1px;" /> </center> </td>
															</tr>
														</table> </td>
													</tr>
													<tr> <td id="textounidades" style="font-size: 15px; padding-top: 6px;" colspan="2">
														<p style="margin-top: -5px;"> <?= $row->pedido_min; ?> unidades </p>
													</td> </tr>
													<tr> <td id="textounidades" style="font-size: 11px;" colspan="2">
														<p style="margin-top: -3px;"> pedido mínimo </p>
													</td> </tr>
												</table> </center> </td> </tr>
											</table> </div> </center> 
										</div>
									</li>

								<?php endforeach; ?> 									
								</ul> </div>
								<ul class="amazon_scroller_nav" style="top: 121px; width: 960px;"> <li></li> <li></li> </ul>
								<div style="clear: both"></div>
							</div>
						</td> </tr> </table>
					</div>
				</div>

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!--  div que maneja el panel izquierdo de la pagina-->
				<div class="grid_4" id="div1"> 
					<div style="padding: 0px 10px 10px 10px;">
						<center>
							<p style="font-weight: bold; font-size: 16px;"> Más buscado </p>
							<p style="font-weight: bold; font-size: 14px; padding-bottom: 10px;"> en ésta categoría </p>
						</center>

						<table width="100%">
							<!-- !!!!!!!!!!!!!!!!!!!! mas buscado -->
							<tr> <td> <ul>
								<li class="elemlista_masbuscados"> <a href="#" style="color: #00a2e8;"> iPad 4 </a> </li>
								<li class="elemlista_masbuscados"> <a href="#" style="color: #00a2e8;"> Galaxy Tab </a> </li>
								<li class="elemlista_masbuscados"> <a href="#" style="color: #00a2e8;"> Galaxy S4 </a> </li>
								<li class="elemlista_masbuscados"> <a href="#" style="color: #00a2e8;"> iPhone 5 </a> </li>
								<li class="elemlista_masbuscados"> <a href="#" style="color: #00a2e8;"> Nokia Lumia </a> </li>
							</ul> </td> </tr>
							<!-- !!!!!!!!!!!!!!!!!!!! -->
							<tr> <td style="padding-top: 50px;"> </td> </tr> 
							<!-- !!!!!!!!!!!!!!!!!!!! categorias generales -->
							<TR> <td> 
								<table style="width: 181px;"> <tr> <td style="font-weight: bold; text-align: center; padding-bottom: 9px;">
									Subcategorías
								</td></tr></table>
							</td> </TR>
							<tr> <td> <!-- <center> -->
								<table style="border-top: 1px solid #c1cedf; width: 181px;"> <tr> <td>
									<ul style="text-align: left; padding: 2px 0px 0px 3px;">
										<a href="#"> <li class="listacategorias"> Agricultura y Animales </li> </a>
										<a href="#"> <li class="listacategorias"> Arte, Artesanías y Regalos </li> </a>
										<a href="#"> <li class="listacategorias"> Automotor </li> </a>
										<a href="#"> <li class="listacategorias"> Automotor II </li> </a>
										<a href="#"> <li class="listacategorias"> Casa y Jardín </li> </a>
										<a href="#"> <li class="listacategorias"> Comidas y Bebidas </li> </a>
										<a href="#"> <li class="listacategorias"> Computación </li> </a>
										<a href="#"> <li class="listacategorias"> Construcción </li> </a>
										<a href="#"> <li class="listacategorias"> Deporte y Entretenimiento </li> </a>
										<a href="#"> <li class="listacategorias"> Electrodomésticos </li> </a>
										<a href="#"> <li class="listacategorias"> Elementos de Viaje </li> </a>
										<a href="#"> <li class="listacategorias"> Empaquetado y Embalaje </li> </a>
										<a href="#"> <li class="listacategorias"> Energía </li> </a>
										<a href="#"> <li class="listacategorias activo"> Equipos Eléctricos y Electrónicos </li> </a>
										<a href="#"> <li class="listacategorias"> Franquicias </li> </a>
										<a href="#"> <li class="listacategorias"> Joyería y Accesorios </li> </a>
										<a href="#"> <li class="listacategorias"> Joyería y Accesorios II </li> </a>
										<a href="#"> <li class="listacategorias"> Juguetería </li> </a>
										<a href="#"> <li class="listacategorias"> Medio Ambiente </li> </a>
										<a href="#"> <li class="listacategorias"> Minerales, Metales y Materiales </li> </a>
										<a href="#"> <li class="listacategorias"> Muebles y Decoración </li> </a>
										<a href="#"> <li class="listacategorias"> Papelería y Elementos de Oficina </li> </a>
										<a href="#"> <li class="listacategorias"> Publicidad e Impresiones </li> </a>
										<a href="#"> <li class="listacategorias"> Químicos </li> </a>
										<a href="#"> <li class="listacategorias"> Ropa, Moda y Calzado </li> </a>
										<a href="#"> <li class="listacategorias"> Saldos / Outlet </li> </a>
										<a href="#"> <li class="listacategorias"> Salud y Belleza </li> </a>
										<a href="#"> <li class="listacategorias"> Seguridad y Vigilancia </li> </a>
										<a href="#"> <li class="listacategorias"> Servicios </li> </a>
										<a href="#"> <li class="listacategorias"> Suministros Industriales </li> </a>
										<a href="#"> <li class="listacategorias"> Telecomunicaciones </li> </a>
										<a href="#"> <li class="listacategorias"> Textiles y Cuero </li> </a>
										<a href="#"> <li class="listacategorias" style="border-bottom: none;"> * Otros </li> </a>
									</ul>
								</td> </tr> </table>
							<!-- </center> --> </td> </tr>
							<!-- !!!!!!!!!!!!!!!!!!!! publicidad 1 -->
							<tr> <td style="padding-top: 37px; text-align: center;">
								<a href="#"> <img src="<?=base_url()?>img/publi.png" /> </a>
							</td> </tr>
							<!-- !!!!!!!!!!!!!!!!!!!! publicidad 2 -->
							<tr> <td style="padding-top: 23px; text-align: center;">
								<a href="#"> <img src="<?=base_url()?>img/publi.png" /> </a>
							</td> </tr>
						</table>
					</div>
				</div> 

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!--  div que maneja el sistema de paginacion -->
				<!-- agrupar: contenedor 1 y 2, publicidad y paginacion -->
				<div class="grid_4" id="div3" style="height: auto;">
					<div id="div3_interno">
						<!-- pestañas -->
						<ul id="tabs" style="height: 32px; font-size: 13px;">
						   <li><a href="#" title="tab1"> Productos </a></li>
						   <li><a href="#" title="tab2"> Proveedores </a></li>
						   <li><a href="#" title="tab3"> Ofertas de Compra </a></li>   
						</ul>
						<div id="content" style="padding: 0; height: auto; /*1655px*/ width: 1106px;">
							<!-- pestaña 1 -->
							<div id="tab1">
								<!-- contenedor 1 -->
						      <div class="grid_2 alpha" style="height: 32px; background:#f7f7f7; width:1090px; font-size: 13px;">
									<h1 style="font-size: 13px; margin-top: 8px; margin-left: 27px; color: #7f7fa7; font-weight: bold;"> Ciudad: </h1>
									<form style="margin-top: -19px; margin-left: 85px;">
										<input type="radio" name="ciudad" value="Bogota" style="height: 15px; width: 15px; vertical-align: text-bottom;"> 
											Bogotá <b style="color:#4accef; font-weight: 500;"> (88)</b>
										<input type="radio" name="ciudad" value="Cali" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">
											Cali<b style="color:#4accef; font-weight: 500;"> (44)</b>
										<input type="radio" name="ciudad" value="Medellin" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">
											Medellín<b style="color:#4accef; font-weight: 500;"> (12)</b>
										<input type="radio" name="ciudad" value="Otras" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">
											Otras ciudades<b style="color:#4accef; font-weight: 500;"> (6)</b>
									</form>
								</div>

								<!-- contenedor 2 -->
								<div class="grid_2 alpha" style="height: 32px; background: transparent; font-size: 13px;">
									<div class="grid_2 alpha" style="margin-top: 3px; height: 32px; width: 243px; background:#f7f7f7;">
										<h1 style="font-size: 13px; margin-top: 8px; margin-left: 27px; color: #7f7fa7; font-weight: bold;"> Chat: </h1>
										<form style="margin-top: -19px; margin-left: 85px;">
											<input type="radio" name="ciudad" value="Bogota" style="height: 15px; width: 15px; vertical-align: text-bottom;"> 
												Disponible
										</form>
									</div>
									<div class="grid_2 alpha" style="margin-top: 3px; height: 32px; width: 207px; margin-left:-6px; background:#f7f7f7;">
										<h1 style="font-size: 13px; margin-top:10px; margin-left: 25px; color: #7f7fa7; font-weight: bold;"> Nivel: </h1>
										<form style="margin-top:-20px; margin-left: 76px;">
											<input type="radio" name="certificado" value="certificado" style="vertical-align: top; height: 15px; width: 15px;">
												<img src="<?=base_url()?>img/certificado_trans.png" />
										</form>     
									</div>
									<div class="grid_2 omega" style="margin-top: 3px; height: 32px; width: 629px; margin-left: -5px; background: #f7f7f7;">
										<h1 style="font-size:13px; margin-top:10px; margin-left: 25px; color: #7f7fa7; font-weight: bold;"> Ver </h1>
										<a href="#"><p style="margin-left: 71px; margin-top:-20px;"><img src="<?=base_url()?>img/vista1.png" /></p></a>   
										<a href="#"><p style="margin-left: 93px; margin-top:-35px;"><img src="<?=base_url()?>img/vista2.png" /></p></a>    
									</div>
								</div>

								<!-- publicidad -->
								<div class="grid_2 alpha" style="height:120px; width:951px; background:#fff; border: 2px solid #f3f3f4; margin: 30px 0px 0px 20px;">
									<center style="line-height: 120px;"> <a href="#"> <img src="<?=base_url()?>img/publicidad3.png" /> </a> </center>
								</div>

				            <!-- en esta parte va el contenido de la paginacion-->
				            <table id="tablita_paginacion">
				            	<tr> <td>
										<div class="grid_2 alpha" style="background: transparent; min-height: 1035px; height: auto; width: 1028px; margin-bottom: -40px;">
											<!-- aqui van los productos de sist paginacion -->
											<div class="grid_4" style="width: 100%; height: auto;">
												<div id="Searchresult" style="height: auto;">
														El contenido especificado no se ha inicializado. 
												</div>
											</div>
										</div>
									</td> </tr>
									<tr> <td>
										<!-- contenedor de paginas -->
										<div style="background: #e9e9e9; text-align: center; font-family: Arial; width: 95%; margin-top: 55px;">
											<center> <div id="Pagination" style="padding: 0em 3em; margin: 0em 18%;"> </div> </center>
										</div>
									</td> </tr>
								</table>
							</div>

							<!-- pestaña 2 -->
							<div id="tab2">
								2
							</div>

							<!-- pestaña 3 -->
							<div id="tab3">
								3
							</div>
						</div>
					</div>
				</div>

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!-- pregunta de satisfaccion -->
				<div class="grid_4" id="preguntasat">
					<div class="grid_4" id="preguntasat_titulo">
						<b style="font-family: arial; font-size: 15px;">Encontraste lo que estabas buscando?</b>
					</div>
					<div class="grid_4" id="preguntasat_botones">
						<a href="#"> <img src="<?=base_url()?>img/botonSI.png" /> </a>
						<a href="#"> <img src="<?=base_url()?>img/botonNO.png" /> </a>
					</div>
					<div class="grid_4" id="preguntasat_subtitulo">
						<p style=" font-size: 15px; font-family: arial;">Si no encontraste el producto que necesitas da clic en "No" y Proveedor.com.co te contactará en cuanto ese producto sea publicado</p>
					</div>
				   <div class="grid_4" id="preguntasat_btnpublicaroferta">
						<a href="#"> <img src="<?=base_url()?>img/boton_oferta.png" /> </a>
					</div>
				</div>

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!-- productos especiales -->
				<div class="grid_4" id="prodespeciales">
					<div style="padding: 10px 10px 10px 10px;">
						<div class="grid_4" style="margin-top: 3px; margin-left: 5px; width: 434px; height: 30px; background: transparent;">
							<p style="color: #ff7f27; font-weight: bold; font-size: 15px;"> 
								Productos Especiales </p>
						</div>

						<div class="grid_4" style="width: auto; height: auto; margin: 13px 0px 0px 2px;">
							<table id="tablita_PE"> <tr> 
								<!-- div 1 (foto1)-->
								<td style="width: 210px; height: 255px;"> 
									<center> <table>
										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">
											<a href="#" style="text-decoration: none;"> <img src="<?=base_url()?>img/cosaazul.png" class="imagenes_PE"/></a>
										</td> </tr>
										<tr> <td style="padding-bottom: 7px;"> </td> </tr>

										<tr> <td style="width: 100%; height: 40px; text-align: center; vertical-align: middle;">
											<a href="#" style="text-decoration: none;"> 
												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 
													Máquina General Electric / Black & Decker </p> </a>
											</div>
										</td> </tr>

										<tr> <td style="padding-bottom: 10px;"> </td> </tr>
										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">
											<center> <table> <tr>
												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>
												<td style="vertical-align: middle;"> <table>
													<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
														1.000.458.000 </p> </center> </td>
													</tr>
													<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> </td>
													</tr>
												</table> </td>
											</tr> </table> </center>
										</td> </tr>

										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">
											<img src="<?=base_url()?>img/certificado_2.png" style="margin-top: -6px; margin-left: 12px;" />
										</td> </tr>
									</table> </center>
								</td>
								<td style="padding-right: 25px;"> </td>

								<!-- div 2 (foto2)-->
								<td style="width: 210px; height: 255px;"> 
									<center> <table>
										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">
											<a href="#" style="text-decoration: none;"> <img src="<?=base_url()?>img/tuberia1.png" class="imagenes_PE"/></a>
										</td> </tr>
										<tr> <td style="padding-bottom: 7px;"> </td> </tr>

										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">
											<div style="height: 40px; max-height: 40px;">
											<a href="#" style="text-decoration: none;"> 
												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 
													iPad 4 16 Gb + Wifi + 3g + accesorios y un texto_demasiado_diria_yo LARGO </p> </a>
											</div>
										</td> </tr>

										<tr> <td style="padding-bottom: 10px;"> </td> </tr>
										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">
											<center> <table> <tr>
												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>
												<td style="vertical-align: middle;"> <table>
													<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
														1.000 </p> </center> </td>
													</tr>
													<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> </td>
													</tr>
												</table> </td>
											</tr> </table> </center>
										</td> </tr>

										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">
											<img src="<?=base_url()?>img/certificado_2.png" style="margin-top: -6px; margin-left: 12px;" />
										</td> </tr>
									</table> </center>
								</td>
								<td style="padding-right: 25px;"> </td>

								<!-- div 3 (foto3)-->
								<td style="width: 210px; height: 255px;"> 
									<center> <table>
										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">
											<a href="#" style="text-decoration: none;"> <img src="<?=base_url()?>img/arroz.png" class="imagenes_PE"/></a>
										</td> </tr>
										<tr> <td style="padding-bottom: 7px;"> </td> </tr>

										<tr> <td style="width: 100%; height: 40px; text-align: center; vertical-align: middle;">
											<a href="#" style="text-decoration: none;"> 
												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 
													iPad 4 16 Gb + Wifi + 3g + accesorios </p> </a>
											</div>
										</td> </tr>

										<tr> <td style="padding-bottom: 10px;"> </td> </tr>
										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">
											<center> <table> <tr>
												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>
												<td style="vertical-align: middle;"> <table>
													<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
														1.000.458 </p> </center> </td>
													</tr>
													<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> </td>
													</tr>
												</table> </td>
											</tr> </table> </center>
										</td> </tr>

										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">
											<img src="<?=base_url()?>img/certificado_2.png" style="margin-top: -6px; margin-left: 12px;" />
										</td> </tr>
									</table> </center>
								</td>
								<td style="padding-right: 25px;"> </td>

								<!-- div 4 (foto4)-->
								<td style="width: 210px; height: 255px;"> 
									<center> <table>
										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">
											<a href="#" style="text-decoration: none;"> <img src="<?=base_url()?>img/cosarara.png" class="imagenes_PE"/></a>
										</td> </tr>
										<tr> <td style="padding-bottom: 7px;"> </td> </tr>

										<tr> <td style="width: 100%; height: 40px; text-align: center; vertical-align: middle;">
											<a href="#" style="text-decoration: none;"> 
												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 
													iPad 4 16 Gb + Wifi + 3g + accesorios </p> </a>
											</div>
										</td> </tr>

										<tr> <td style="padding-bottom: 10px;"> </td> </tr>
										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">
											<center> <table> <tr>
												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>
												<td style="vertical-align: middle;"> <table>
													<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
														458.000 </p> </center> </td>
													</tr>
													<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> </td>
													</tr>
												</table> </td>
											</tr> </table> </center>
										</td> </tr>

										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">
											<img src="<?=base_url()?>img/certificado_2.png" style="margin-top: -6px; margin-left: 12px;" />
										</td> </tr>
									</table> </center>
								</td>
								<td style="padding-right: 25px;"> </td>

								<!-- div 5 (foto5)-->
								<td style="width: 210px; height: 255px;"> 
									<center> <table>
										<tr> <td style="width: 169px; height: 113px; text-align: center; vertical-align: middle;">
											<a href="#" style="text-decoration: none;"> <img src="<?=base_url()?>img/memorias_usb.png" class="imagenes_PE"/></a>
										</td> </tr>
										<tr> <td style="padding-bottom: 7px;"> </td> </tr>

										<tr> <td style="width: 100%; height: 40px; text-align: center; vertical-align: middle;">
											<a href="#" style="text-decoration: none;"> 
												<p style="color: #3aa2ed; font-size: 15px; height: 35px; overflow: hidden;"> 
													iPad 4 16 Gb + Wifi + 3g + accesorios </p> </a>
											</div>
										</td> </tr>

										<tr> <td style="padding-bottom: 10px;"> </td> </tr>
										<tr> <td style="width: 100%; height: auto; text-align: center; vertical-align: middle;">
											<center> <table> <tr>
												<td> <p style="color: #ff7f27; font-size: 36px; margin-right: 2px;"> $ </p> </td>
												<td style="vertical-align: middle;"> <table>
													<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black;"> 
														655.000 </p> </center> </td>
													</tr>
													<tr> <td> <center> <img src="<?=base_url()?>img/sonrisaprecio.png" /> </center> </td>
													</tr>
												</table> </td>
											</tr> </table> </center>
										</td> </tr>

										<tr> <td style="width: 100%; height: 30px; text-align: center; vertical-align: middle;">
											<img src="<?=base_url()?>img/certificado_2.png" style="margin-top: -6px; margin-left: 12px;" />
										</td> </tr>
									</table> </center>
								</td>
							</tr> </table>
						</div>
					</div>
				</div>

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!-- publicidad -->
				<div class="grid_4" id="publicidad">
					<a href="#"> <img src="<?=base_url()?>img/publicidad4.png" /> </a>
				</div>

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!--  div que maneja el footer de la pagina-->
				<div class="grid_2 alpha" id="footer">
					<iframe src="<?=base_url()?>footer" scrolling="no" id="iframe_footer"> </iframe>
				</div>
			</section> </article>
		</div>
	</body>
</html>
