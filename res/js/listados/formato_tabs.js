		<!--// paginacion #1 -->
			var items_per_page = 6;

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

			//funcion que trae y formatea los datos
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
					new_content += '<div>' //new_content += '<div class="grid_4" style="width: 100%; height: auto;">';
						<!-- //contenedor general -->
						new_content += '<div class="grid_4" style="margin: 3px 0px 15px 0px; width:100%;height:200px;background:#FFF;">';
							<!-- //aside izquierdo: imagen producto -->
							new_content += '<div class="grid_4" style="margin: 0 12px 0 11px; border: 1px solid #F3F3F4; width: 188px; height: 145px; background: #FFF;">';
								new_content += '<div class="grid_4" style="margin: 0; width: 186px; height: 143px;">';
									new_content += '<table style="width: 186px; height: 143px; background:#FFF; text-align: center;">';
										new_content += '<tr> <td style="vertical-align: middle; text-align: center;">';
											new_content += '<a href="http://sm.proveedor.com.co/proveedor/control_producto/ver_producto2/'+ productos[i][17] +'/'+ productos[i][16] +'"> <img src="http://sm.proveedor.com.co/proveedor/' + productos[i][0] + '" style="height: auto; max-height: 127px; width: auto; max-width: 167px;" /> </a>';
										new_content += '</td> </tr>';
									new_content += '</table>';
								new_content += '</div>';
							new_content += '</div>';

							<!-- //aside izquierdo: boton favoritos (debajo de la imagen) -->
							new_content += '<div class="grid_4" style="margin:153px 0px 0px -196px; width:185px; background:#FFF; height:27px;">';
								new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/estrella.png" style="margin-top: 12px;" /></a>';
								new_content += '<a href="#" style="color: #7f7f7f; text-decoration: none; font-size: 12px; font-family: arial; vertical-align: text-top;"> Agregar producto a Favoritos </a>';
							new_content += '</div>';

							<!-- //contenedor central -->
							new_content += '<div class="grid_4" style="margin: 0 12px 0 0; width: 577px; height: 190px; background:#f4f4f4;">';
								<!-- //contenedor central / titulo del producto -->
								new_content += '<div class="grid_4" style="padding-bottom: 7px; margin: -1px 0 0 -1px; width: 577px; height: 25px !important; background: #FFF; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">';
									new_content += '<a href="http://sm.proveedor.com.co/proveedor/control_producto/ver_producto2/'+ productos[i][17] +'/'+ productos[i][16] +'"><b style="color: #0177E6; font-family: &#39;Arial Rounded MT&#39;, Arial, sans-serif; font-size: 21px; font-weight: bold; overflow: hidden;">' 
										+ productos[i][1] + '</b></a>';
								new_content += '</div>';
								<!-- //contenedor central / precio, unidades y descripcion (debajo del titulo) -->
								new_content += '<div class="grid_4" style="margin: 1px 0 0 -1px; /*width: 358px;*/width: 358px; height: 155px; background:#FFF;">';
									new_content += '<div class="grid_4" style="width: 265px; height: 44px; margin: 16px 0px 10px 0px;">';
										new_content += '<table style="width: 100%;"> <tr>';
											<!-- //precio -->
											new_content += '<td style="width: 147px;">';
												new_content += '<table> <tr> <td style="text-align: center; vertical-align: middle;">';
													new_content += '<center> <table> <tr>';
														new_content += '<td> <p style="color: black; font-size: 13px; font-weight: bold; margin-right: 8px; margin-top: 0px;"> Precio: </p> </td>';
														new_content += '<td> <p style="color: #ff7f27; font-size: 23px; margin-right: 4px; margin-top: -5px;"> $ </p> </td>';
														new_content += '<td style="vertical-align: middle;"> <table>';
															new_content += '<tr> <td> <center> <p style="font-weight: bold; font-size: 17px; color: black; margin-bottom: 2px;">' + productos[i][2] + '</p> </center> </td>';
															new_content += '</tr>';
															new_content += '<tr> <td> <center> <img src="http://sm.proveedor.com.co/proveedor/img/sonrisaprecio.png" style="margin-top: 0px;" /> </center> </td>';
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
									new_content += '<div class="grid_4" style="margin:0px 0px 0px 0px; width: 350px; height:41px; background: #FFF;">';
										new_content += '<p style="font-size: 14px; font-family: arial; color: gray;">' 
											+ productos[i][4] + '</p>';
									new_content += '</div>';
								new_content += '</div>';
								<!-- //contenedor central / certificacion del proveedor -->
								/* new_content += '<div class="grid_4" style="margin: -1px -15px 0px -11px; width:231px; height:44px; background:#FFF;">';
									if (productos[i][5] == "1") { //si es certificado
										new_content += '<center><a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/certificado.png" /></a></center>';
									} else if (productos[i][5] == "0") { //si NO es certificado 
										new_content += '<center><a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/nocertificado.png" /></a></center>'; 
									}
								new_content += '</div>'; */
								<!-- //contenedor central / informacion del proveedor -->
								new_content += '<div class="grid_4" style="margin: 1px -1px 0 0; width: 216px; height: 156px; background: #FFF; display: table !important; float: right;">';
									<!-- //contenedor central / informacion del proveedor / nombre -->
									new_content += '<div style="height: 40px; max-height: 40px; display: table-row !important; overflow: hidden;">';
										new_content += '<a href="http://sm.proveedor.com.co/proveedor/perfil/ver_empresa/'+ productos[i][15] +'/'+ productos[i][17] +'"><p style="font-family: &#39;Arial Rounded MT&#39;, Arial, sans-serif; font-size: 21px; font-weight: bold; font-size: 15px; color: #fe7f1c; text-align: center; height: auto; overflow: hidden; margin: 0 0 0 13px; display: table-cell; vertical-align: middle; padding: 0 10px 0 10px;">' 
											+ productos[i][6] + '</p></a>';
									new_content += '</div>';
									<!-- //contenedor central / informacion del proveedor / combo titulo:valor -->
									new_content += '<div class="grid_4" style="margin: 5px 0 0 7px; width: 200px; height: 108px; background:#FFF;">';
										new_content += '<b style="font-size: 12px; font-family:arial; font-weight: bolder;">' + productos[i][7] + '</b>';
										new_content += '<p style="margin: -16px 0px 0px 124px; font-size: 12px;">' + productos[i][8] + '</p>';

										new_content += '<b style="font-size: 12px; font-family:arial; font-weight: bolder;">' + productos[i][9] + '</b>';
										new_content += '<p style="margin: -16px 0px 0px 120px; font-size: 12px;">' + productos[i][10] + '</p>';

										/* new_content += '<b style="font-size: 12px; font-family:arial; font-weight: bolder;">' + productos[i][11] + '</b>';
										new_content += '<p style="margin: -16px 0px 0px 43px; font-size: 12px;">' + productos[i][12] + '</p>';

										new_content += '<b style="font-size: 12px; font-family:arial; font-weight: bolder;">' + productos[i][13] + '</b>';
										new_content += '<a href="#" style="margin: -16px 0px 0px 0px; font-size: 12px; text-decoration: none;">'
											+ productos[i][14] + '</a>'; */
									new_content += '</div>';
								new_content += '</div>';
							new_content += '</div>'; //cierre contenedor central

							<!-- //aside derecho: botones de comunicacion -->
							new_content += '<div class="grid_4" style="margin: 0px 0px 0px -1px; width: 195px; height: 191px; background:#FFF;">';
								<!-- //aside derecho: botones de comunicacion / chatea ahora -->
								new_content += '<div class="grid_4" style="margin: -15px 0px 6px 3px; width: 88px; height: 13px; background: #FFF;">';
									new_content += '<b style="display: none; font-size:11px;font-family:arial; margin-left:5px; font-weight:normal;">Chatea ahora!</b>';
								new_content += '</div>';
								<!-- //aside derecho: botones de comunicacion / tablita con botones (reforma del original) -->
								new_content += '<table style="border-spacing: 0; border-collapse: separate;">';
									new_content += '<tr>';
										<!-- //aside derecho: botones de comunicacion / boton 1,1 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width: 94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/disponible.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
										<!-- //aside derecho: botones de comunicacion / boton 2,1 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/addproveedor.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
									new_content += '</tr>';
									new_content += '<tr>';
										<!-- //aside derecho: botones de comunicacion / boton 1,2 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/contactar_2.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
										<!-- //aside derecho: botones de comunicacion / boton 2,2 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/call_2.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
									new_content += '</tr>';
								new_content += '</table>';
							new_content += '</div>';
						new_content += '</div>'; //cierre contenedor general
						<!-- //separador -->
						new_content += '<div class="grid_4" style="margin: 0 0 1.5em 0.8em; width: 97.5%; height: 0px; background: #f4f4f4;"></div>';
					new_content += '</div>'; //cierre div TOTAL
				}

				//se hace una especie de innerHTML en el gran div Searchresult, con el resultado de la consulta (?)
				//$('#Searchresult').empty().append(new_content);
				$('#Searchresult').html(new_content);

				// Prevent click event propagation
				return false;
			}
		
		<!--// paginacion #2 -->
	
			var items_per_page_2 = 6;
	
			$(document).ready(function(){      
				initPagination_2();
			});

			//funcion que prepara lo necesario para implementar la paginacion
			function initPagination_2() {
				$("#Pagination_2").pagination(proveedores.length, {
					callback: pageselectCallback_2,
					items_per_page: items_per_page_2
				});
			}

			//funcion que trae y formatea los datos
			function pageselectCallback_2(page_index, jq) {
				//formula que establece la maxima cantidad de elementos a mostrar en c/pagina
				var max_elem = Math.min((page_index+1) * items_per_page_2, proveedores.length);
				//variable que contendran los datos ya formateados 
				var new_content = "";

				for (var i=page_index*items_per_page_2 ; i<max_elem ; i++) {
					new_content += '<div>' //new_content += '<div class="grid_4" style="width: 100%; height: auto;">';
						<!-- //contenedor general -->
						new_content += '<div class="grid_4" style="margin: 3px 0 15px 10px; width:100%; height: 217px; background:#FFF;">';
							<!-- //aside izquierdo: imagen producto -->
							/*new_content += '<div class="grid_4" style="margin: 0px 12px 0px 11px; width:185px; height:147px; background: #FFF;">';
								new_content += '<div class="grid_4" style="margin:13px 0px 0px 1px; width:183px;height:145px; background:#FFF;"></div>';
								new_content += '<div class="grid_4" style="margin: -149px 0px 0px 9px; height: auto;">';
									new_content += '<table style="width:167px; height:127px; background:#FFF; text-align: center;">';
										new_content += '<tr> <td style="vertical-align: middle; text-align: center;">';
											new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/'+ proveedores[i][0] + '" style="height: auto; max-height: 127px; width: auto; max-width: 167px;" /> </a>';
										new_content += '</td> </tr>';
									new_content += '</table>';
								new_content += '</div>';
							new_content += '</div>';

							<!-- //aside izquierdo: boton agregar a contactos  (debajo de la imagen) -->
							new_content += '<div class="grid_4" style="text-align: center; margin:153px 0px 0px -196px; width:185px; background:#FFF; height:27px;">';
								new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/add.png" style="margin-top: 12px;" /></a>';
								new_content += '<a href="#" style="text-decoration: none; font-size: 12px; font-family: arial; vertical-align: text-top;"> Agregar a Contactos </a>';
							new_content += '</div>';*/

							<!-- //contenedor central -->
							new_content += '<div class="grid_4" style="margin: 0; width: 49.5em; height: auto; float: left; background:#f4f4f4;">';
								<!-- //contenedor central / titulo del producto -->
								new_content += '<div class="grid_4" style="margin: -1px 12px 0px -1px; width: 100%; height: 3em; background: #FFF; display: table !important;">';
									new_content += '<div class="grid_4" style="margin: 0; width: auto; height: 1.5em; overflow: hidden;">';
										new_content += '<b style="color: #0177E6; font-size: 20px; font-family: &#39;Arial Rounded MT&#39;, Arial, sans-serif; font-weight: bold;">' 
											+ proveedores[i][1] + '</b>';
									new_content += '</div>';
									new_content += '<div class="grid_4" style="clear: both; margin: 0; width: auto; height: 1.1em;">';
										new_content += '<b style="color: #0177E6; font-size: 13px; font-family: Arial, sans-serif; font-weight: normal;">'
											+ '<a href="http://sm.proveedor.com.co/proveedor/perfil/ver_empresa/'+ proveedores[i][16] +'/'+ proveedores[i][15] +'" style="color: #0177E6;">Ver catálogo</a> | '
											+ '<a href="http://sm.proveedor.com.co/proveedor/perfil/contacto_empresa/'+ proveedores[i][15] +'" style="color: #0177E6;">Información de contacto</a> | '
											+ '<a href="http://sm.proveedor.com.co/proveedor/perfil/perfil_empresa/'+ proveedores[i][16] +'/'+ proveedores[i][15] +'" style="color: #0177E6;">Perfil de la empresa</a> </b>';
									new_content += '</div>';
								new_content += '</div>';

								<!-- //contenedor central / tres imagenes (debajo del titulo) -->
								new_content += '<div class="grid_4" style="margin: 1px 0 -1px -1px; width: 34.55em; height: auto; float: left; background:#FFF;">';
									new_content += '<table style="width: auto; height: auto; padding-top: 10px;">';
										new_content += '<tr>'; new_content += '<td>';
											new_content += '<table style="width: auto; height: auto;">';
												new_content += '<tr>';
													new_content += '<td style="width: auto;">';
														new_content += '<div style="width: 151px; height: 114px; min-height: 114px; border: 0px solid #eeeeee; text-align: center; display: table !important;">';
															new_content += '<a href="http://sm.proveedor.com.co/proveedor/control_producto/ver_producto2/'+ proveedores[i][17] +'/'+ proveedores[i][16] +'" style="display: table-cell; vertical-align: middle;">' 
																+ '<img src="http://sm.proveedor.com.co/proveedor/'+ proveedores[i][2]
																+ '" style="width: auto; max-width: 150px; height: auto; max-height: 113px;" />' + '</a>';
														new_content += '</div>';
														new_content += '<div style="width: 82px; height: auto; max-height: 30px;">';
															new_content += '<a href="http://sm.proveedor.com.co/proveedor/control_producto/ver_producto2/'+ proveedores[i][17] +'/'+ proveedores[i][16] +'" style="color: black; font-size: 13px; text-decoration: none; display: inline-block; height: 30px; overflow: hidden;">';
																new_content += proveedores[i][3] + '&#32; <b> resaltado </b>';
																	//+ '<font style="color: #ff7f27; font-size:12px;">' + 'resaltado' +'</font>';
															new_content += '</a>';
														new_content += '</div>';
													new_content += '</td>';
													new_content += '<td style="width: 8px;"> </td>';
													new_content += '<td style="width: auto;">';
														new_content += '<div style="width: 151px; height: 114px; min-height: 114px; border: 0px solid #eeeeee; text-align: center; display: table !important;">';
															new_content += '<a href="http://sm.proveedor.com.co/proveedor/control_producto/ver_producto2/'+ proveedores[i][17] +'/'+ proveedores[i][16] +'" style="display: table-cell; vertical-align: middle;">' 
																+ '<img src="http://sm.proveedor.com.co/proveedor/'+ proveedores[i][4] 
																+ '" style="width: auto; max-width: 150px; height: auto; max-height: 113px;" />' + '</a>';
														new_content += '</div>';
														new_content += '<div style="width: 82px; height: auto; max-height: 30px;">';
															new_content += '<a href="http://sm.proveedor.com.co/proveedor/control_producto/ver_producto2/'+ proveedores[i][17] +'/'+ proveedores[i][16] +'" style="color: black; font-size: 13px; text-decoration: none; display: inline-block; height: 30px; overflow: hidden;">';
																new_content += proveedores[i][5] + '&#32; <b> resaltado </b>';
																	//+ '<font style="color: #ff7f27; font-size:12px;">' + 'resaltado' +'</font>';
															new_content += '</a>';
														new_content += '</div>';
													new_content += '</td>';
													new_content += '<td style="width: 8px;">';
													new_content += '<td style="width: 82px;">';
														new_content += '<div style="width: 151px; height: 114px; min-height: 114px; border: 0px solid #eeeeee; text-align: center; display: table !important;">';
															new_content += '<a href="http://sm.proveedor.com.co/proveedor/control_producto/ver_producto2/'+ proveedores[i][17] +'/'+ proveedores[i][16] +'" style="display: table-cell; vertical-align: middle;">' 
																+ '<img src="http://sm.proveedor.com.co/proveedor/'+ proveedores[i][6] 
																+ '" style="width: auto; max-width: 150px; height: auto; max-height: 113px;" />' + '</a>';
														new_content += '</div>';
														new_content += '<div style="width: 82px; height: auto; max-height: 30px;">';
															new_content += '<a href="http://sm.proveedor.com.co/proveedor/control_producto/ver_producto2/'+ proveedores[i][17] +'/'+ proveedores[i][16] +'" style="color: black; font-size: 13px; text-decoration: none; display: inline-block; height: 30px; overflow: hidden;">';
																new_content += proveedores[i][7] + '&#32; <b> resaltado </b>';
																	//+ '<font style="color: #ff7f27; font-size:12px;">' + 'res' +'</font>';
															new_content += '</a>';
														new_content += '</div>';
													new_content += '</td>';
												new_content += '</tr>';
											new_content += '</table>';
										new_content += '</td>'; new_content += '</tr>';
										/*new_content += '<tr>'; new_content += '<td>';
											new_content += '<a href="#" style="color: blue; text-decoration: none; font-size: 12px;">' 
												+ 'Ver más productos &#62; </a>';
										new_content += '</td>'; new_content += '</tr>'; */
									new_content += '</table>';
								new_content += '</div>';

								<!-- //contenedor central / aside a la izquierda de los botones de comunicacion -->
								new_content += '<div class="grid_4" style="margin: 1px -1px -2px 0; width: 221px; height: auto; float: right; background: #FFF; padding-left: 15px; padding-top: 8px;">';
									new_content += '<div style="width: auto; height: 32px; max-height: 32px; padding-bottom: 5px;">';
										/*new_content += '<table style="width: auto; height: auto;">';
											new_content += '<tr>';
												new_content += '<td style="vertical-align: middle; padding-right: 10px;">';
													new_content += '<p style="font-size: 13px; color: gray; margin: 0;"> Nivel: </p> </td>';
												new_content += '</td>';
												new_content += '<td>';
													if (proveedores[i][8] == "1") { //si es certificado
														new_content += '<img src="http://sm.proveedor.com.co/proveedor/img/certificado.png" /> <img src="http://sm.proveedor.com.co/proveedor/img/chulo_2.png" />';
													} else if (proveedores[i][8] == "0") { //si NO es certificado 
														new_content += '<img src="http://sm.proveedor.com.co/proveedor/img/nocertificado.png" />'; 
													}
												new_content += '</td>';
											new_content += '</tr>';
										new_content += '</table>';*/
										new_content += '<b style="float: left; margin: 0 0.6em 0 1em; font-size: 12px; font-family:arial; font-weight: bolder;">' + 'Tipo de empresa:' + '</b>';
										new_content += '<p style="color: #FF7F27; float: left; margin: 0; font-size: 12px;">' + 'Fabricante' + '</p>';
										new_content += '<b style="float: left; margin: 0 0.6em 0 1em; font-size: 12px; font-family:arial; font-weight: bolder;">' + 'Ubicación:' + '</b>';
										new_content += '<p style="color: #0177E6; float: left; margin: 0; font-size: 12px;">' + 'Bogotá, Cundinamarca' + '</p>';
									new_content += '</div>';

									/*new_content += '<div style="width: auto; height: 18px; padding-bottom: 5px;">';
										new_content += '<table style="width: auto; height: auto;">';
											new_content += '<tr>';
												new_content += '<td style="vertical-align: middle; padding-right: 10px;">';
													new_content += '<p style="font-size: 13px; color: gray; margin: 0;"> Ciudad: </p>';
												new_content += '</td>';
												new_content += '<td> <p style="font-size:13px; color:black; margin:0;">' + proveedores[i][9] + '</p></td>';
											new_content += '</tr>';
										new_content += '</table>';
									new_content += '</div>';*/

									new_content += '<div style="width: auto; height: auto;">';
										new_content += '<table style="width: auto; height: auto;">';
											new_content += '<tr>';
												new_content += '<td>';
													new_content += '<p style="font-size:13px; color: gray; margin:0;"> Productos Principales: </p>';
												new_content += '</td>';
											new_content += '</tr>';
											new_content += '<tr>';
												new_content += '<td>';
													new_content += '<ul style="font-size: 11px; margin-left: 1em; list-style: disc;">';
														new_content += '<li style="padding-left: 10px;">' + proveedores[i][10] + '</li>';
														new_content += '<li style="padding-left: 10px;">' + proveedores[i][11] + '</li>';
														new_content += '<li style="padding-left: 10px;">' + proveedores[i][12] + '</li>';
														new_content += '<li style="padding-left: 10px;">' + proveedores[i][13] + '</li>';
														new_content += '<li style="padding-left: 10px;">' + proveedores[i][14] + '</li>';
													new_content += '</ul>';
												new_content += '</td>';
											new_content += '</tr>';
										new_content += '</table>';
									new_content += '</div>';

									new_content += '<div style="width: auto; height: auto;">';
										new_content += '<a href="http://sm.proveedor.com.co/proveedor/perfil/ver_empresa/'+ proveedores[i][16] +'/'+ proveedores[i][15] +'" style="color: blue; text-decoration: none; font-size: 12px;">' 
											+ 'Ver más productos &#62; </a>';
									new_content += '</div>'


								new_content += '</div>';
							new_content += '</div>'; //cierre contenedor central

							<!-- //aside derecho: botones de comunicacion -->
							new_content += '<div class="grid_4" style="margin: 0px 0px 0px -1px; width: 195px; height: 191px; float: right; background:#FFF;">';
								<!-- //aside derecho: botones de comunicacion / chatea ahora -->
								/*new_content += '<div class="grid_4" style="margin: -15px 0px 6px 3px; width: 88px; height: 13px; background: #FFF;">';
									new_content += '<b style="font-size:11px;font-family:arial; margin-left:5px; font-weight:normal;">Chatea ahora!</b>';
								new_content += '</div>';*/
								<!-- //aside derecho: botones de comunicacion / tablita con botones (reforma del original) -->
								new_content += '<table style="border-spacing: 0; border-collapse: separate;">';
									new_content += '<tr>';
										<!-- //aside derecho: botones de comunicacion / boton 1,1 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width: 94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/disponible.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
										<!-- //aside derecho: botones de comunicacion / boton 2,1 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/addproveedor.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
									new_content += '</tr>';
									new_content += '<tr>';
										<!-- //aside derecho: botones de comunicacion / boton 1,2 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/contactar_2.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
										<!-- //aside derecho: botones de comunicacion / boton 2,2 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/call_2.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
									new_content += '</tr>';
								new_content += '</table>';
							new_content += '</div>';
						new_content += '</div>'; //cierre contenedor general
						<!-- //separador -->
						new_content += '<div class="grid_4" style="margin: 0px 0px 1.5em 0.8em; width: 97.5%; height: 0px; background: #f4f4f4;"></div>';
					new_content += '</div>'; //cierre div TOTAL
				}

				$('#Searchresult_2').html(new_content);

				// Prevent click event propagation
				return false;
			}
		
		<!-- //paginacion #3 -->
		
			var items_per_page_3 = 6;
	
			$(document).ready(function(){      
				initPagination_3();
			});

			//funcion que prepara lo necesario para implementar la paginacion
			function initPagination_3() {
				$("#Pagination_3").pagination(ofertas.length, {
					callback: pageselectCallback_3,
					items_per_page: items_per_page_3
				});
			}

			//funcion que trae y formatea los datos
			function pageselectCallback_3(page_index, jq) {
				//formula que establece la maxima cantidad de elementos a mostrar en c/pagina
				var max_elem = Math.min((page_index+1) * items_per_page_2, ofertas.length);
				//variable que contendran los datos ya formateados 
				var new_content = "";

				for (var i=page_index*items_per_page_2 ; i<max_elem ; i++) {
					new_content += '<div>' //new_content += '<div class="grid_4" style="width: 100%; height: auto;">';
						<!-- //contenedor general -->
						new_content += '<div class="grid_4" style="margin: 0 3px 0 0px; width:100%;height: 250px;background:#FFF;">';
							<!-- //titulo del producto -->
							new_content += '<div class="grid_4" style="margin: 0; width: 96.6%; height: 25px; background: #FFF; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; padding-bottom: 7px; border-bottom: 1px solid #F3F3F4;">';
								new_content += '<b style="color: #0177E6; font-size: 21px; font-family: &#39;Arial Rounded MT&#39;, Arial, sans-serif; font-weight: bold; overflow: hidden;">' 
									+ ofertas[i][1] + '</b>';
							new_content += '</div>';

							<!-- //aside izquierdo: imagen producto -->
							new_content += '<div class="grid_4" style="margin: 14px 12px 0 0; width: 188px; height: 145px; background: #FFF; border: 1px solid #F3F3F4; float: left;">';
								new_content += '<div class="grid_4" style="margin: 0; width: 186px; height: 143px;">';
									new_content += '<table style="width: 186px; height: 143px; background:#FFF; text-align: center;">';
										new_content += '<tr> <td style="vertical-align: middle; text-align: center;">';
											new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/' + ofertas[i][0] + '" style="height: auto; max-height: 127px; width: auto; max-width: 167px;" /> </a>';
										new_content += '</td> </tr>';
									new_content += '</table>';
								new_content += '</div>';
							new_content += '</div>';

							<!-- //aside izquierdo: boton agregar a favoritos  (debajo de la imagen) -->
							new_content += '<div class="grid_4" style="text-align: center; margin: 162px 0px 0px -196px; width:185px; background:#FFF; height:27px;">';
								new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/estrella.png" style="margin-top: 12px;" /></a>';
								new_content += '<a href="#" style="color: #7f7f7f; text-decoration: none; font-size: 12px; font-family: arial; vertical-align: text-top;"> Agregar Oferta a Favoritos </a>';
							new_content += '</div>';

							<!-- //contenedor central -->
							new_content += '<div class="grid_4" style="margin: 14px 5px 0 0; width: 565px; height: 175px; background:#f4f4f4;">';
								<!-- //contenedor central / descripcion (a la derecha de la imagen) -->
								new_content += '<div class="grid_4" style="margin: 0 12px 0 -1px; width: 340px; height: 175px; background:#FFF;">';
									new_content += '<div style="width: 98%; height: auto; margin-top: 10px; line-height: 1.1em;">';
										new_content += '<table style="width: auto; height: auto; font-size: 13px;">';
											new_content += '<tr> <td style="padding-right: 10px;">';
												new_content += '<p style="color:gray; font-weight:bold; margin:0;display:inline;"> Cantidad: </p>';
												new_content += '<p style="color: #ff7f27; margin: 0; display: inline;">' + ofertas[i][3] + '</p>';
											new_content += '<td> </tr>';
											new_content += '<tr> <td style="padding-right: 10px;">';
												new_content += '<p style="color:gray; font-weight:bold; margin:0;display:inline;"> Presupuesto límite: </p>';
												new_content += '<p style="color: black; margin: 0; display: inline;">' + ofertas[i][4] + '</p>';
											new_content += '<td> </tr>';
											new_content += '<tr> <td style="padding-right: 10px;">';
												new_content += '<p style="color:gray; font-weight:bold; margin:0;display:inline;"> Lugar de entrega: </p>';
												new_content += '<p style="color: black; margin: 0; display: inline;">' + ofertas[i][5] + '</p>';
											new_content += '<td> </tr>';
										new_content += '</table>';
									new_content += '</div>';
									new_content += '<div style="width: 98%; height: auto; margin-top: 10px; line-height: 1.2em;">';
										new_content += '<p style="font-size:14px; font-weight: normal; color: gray; margin: 0; overflow: hidden; height: auto; max-height: 58px;">';
											new_content += ofertas[i][2] + '</p>';
										new_content += '<table style="width: auto; height: auto; font-size: 13px; margin-top: 0.5em;"';
											new_content += '<tr> <td style="padding-right: 10px;">';
												new_content += '<p style="color:gray; font-weight:bold; margin:0;display:inline;"> Vigente hasta: </p>';
												new_content += '<p style="color: #ff7f27; margin: 0; display: inline;">' + ofertas[i][3] + '</p>';
											new_content += '</td> </tr>';
										new_content += '</table>';
									new_content += '</div>';
								new_content += '</div>';

								<!-- //contenedor central / aside a la izquierda de los botones de comunicacion -->
								new_content += '<div class="grid_4" style="margin: 0 -15px 0 -11px; width: 220px; height: 175px; background: #FFF; padding-left: 5px;">';
									/* new_content += '<div style="width: auto; height: auto; margin-top: 10px;">';
										new_content += '<p style="color: gray; font-size: 13px; margin: 0;"> Empresas que Busca/Compra: </p>';
									new_content += '</div>'; */
									new_content += '<div style="width: auto; height: auto; margin-top: 10px;">';
										new_content += '<p style="color: #ff7f27; font-size: 15px; margin: 0; font-weight: bold; text-align: center;">' + ofertas[i][6] + '</p>';
									new_content += '</div>';
									new_content += '<div style="width: auto; height: auto; margin-top: 0px; text-align: center;">';
										/*if (ofertas[i][7] == "1") { //si es certificado
											new_content += '<img src="http://sm.proveedor.com.co/proveedor/img/certificado.png" /> <img src="http://sm.proveedor.com.co/proveedor/img/chulo_2.png" />';
										} else if (ofertas[i][7] == "0") { //si NO es certificado 
											new_content += '<p style="color: #ddd; font-size: 13px; margin: 0; font-weight: bold;"> Usuario sin verificar </p>';
										}*/
										new_content += '<p style="color: #7F7F7F; font-size: 12px; margin: 0 0 1em 0; font-weight: bold;"> Comprador </p>';

										new_content += '<b style="float: left; margin: 0 0.6em 0 1em; font-size: 12px; font-family:arial; font-weight: bolder;">' + productos[i][7] + '</b>';
										new_content += '<p style="color: #FF7F27; float: left; margin: 0; font-size: 12px;">' + productos[i][8] + '</p>';

										new_content += '<b style="float: left; margin: 0 0.6em 0 1em; font-size: 12px; font-family:arial; font-weight: bolder;">' + productos[i][9] + '</b>';
										new_content += '<p style="color: #0177E6; float: left; margin: 0; font-size: 12px;">' + productos[i][10] + '</p>';
									new_content += '</div>';
								new_content += '</div>';
							new_content += '</div>'; //cierre contenedor central

							<!-- //aside derecho: botones de comunicacion -->
							new_content += '<div class="grid_4" style="margin: -4px 0 0 -1px; width: 195px; height: 191px; background:#FFF;">';
								<!-- //aside derecho: botones de comunicacion / chatea ahora -->
								/*new_content += '<div class="grid_4" style="margin: -15px 0px 6px 3px; width: 88px; height: 13px; background: #FFF;">';
									new_content += '<b style="font-size:11px;font-family:arial; margin-left:5px; font-weight:normal;">Chatea ahora!</b>';
								new_content += '</div>';*/
								<!-- //aside derecho: botones de comunicacion / tablita con botones (reforma del original) -->
								new_content += '<table style="border-spacing: 0; border-collapse: separate;">';
									new_content += '<tr>';
										<!-- //aside derecho: botones de comunicacion / boton 1,1 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width: 94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/comp_disp.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
										<!-- //aside derecho: botones de comunicacion / boton 2,1 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/comp_add.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
									new_content += '</tr>';
									new_content += '<tr>';
										<!-- //aside derecho: botones de comunicacion / boton 1,2 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/comp_contact.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
										<!-- //aside derecho: botones de comunicacion / boton 2,2 -->
										new_content += '<td>';
											new_content += '<div class="grid_4" style="margin: 0; width:94px; height:93px; background: #FFF;">';
												new_content += '<a href="#"> <img src="http://sm.proveedor.com.co/proveedor/img/comp_call.png"/></a>';
											new_content += '</div>';
										new_content += '</td>';
									new_content += '</tr>';
								new_content += '</table>';
							new_content += '</div>';
						new_content += '</div>'; //cierre contenedor general
						<!-- //separador -->
						new_content += '<div class="grid_4" style="margin: 0; width: 97.5%; height: 0px; background: #f4f4f4;"></div>';
					new_content += '</div>'; //cierre div TOTAL
				}

				$('#Searchresult_3').html(new_content);

				// Prevent click event propagation
				return false;
			}
	