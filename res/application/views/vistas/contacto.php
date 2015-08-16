<?php
session_start();
$_SESSION['username'] = $this->session->userdata('usuario'); // Must be already set
?>
<!DOCTYPE html>
<html lang = "es">
  	<head>
  		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- estos archivos son para el chat -->
		<link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>css/contactos/chat.css" />
		<!--<link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>css/contactos/screen.css" /> -->
		<script type="text/javascript" src="<?=base_url()?>js/contactos/jquery.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/contactos/chat.js"></script>

		<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
      	<meta charset="UTF-8">
      	<title>Proveedor.com.co / Tablero de Usuario - Contactos</title>
      	<link rel="stylesheet" href="<?=base_url()?>css/960.css">
      	<link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
      	<link rel="stylesheet" href="<?=base_url()?>css/reset.css">
      	<!-- importaciones estilos del header -->
      	<link rel="stylesheet" href="<?=base_url()?>css/contactos/estilosheader.css">
      	<!-- importaciones sistema de paginacion -->
      	<link rel="stylesheet" href="<?=base_url()?>css/contactos/pagination.css" />
		<script type="text/javascript" src="<?=base_url()?>js/contactos/jquery.min.js"></script> 
		<script type="text/javascript" src="<?=base_url()?>js/contactos/jquery.pagination.js"></script> 
		<!--<script type="text/javascript" src="<?//=base_url()?>js/datosContactos.js"></script> -->



		<!-- JS donde estan los datos de contactos traidos desde la bd -->
	<?php  echo '<script type="text/javascript">
		var contactos = [';
		if ($contacto) {
			foreach (@$contacto as $registro){
        echo '
    ["'.@$registro->logo.'", "'.@$registro->nombre.'", "'.@$registro->usuario.'", "Cel.: '.@$registro->celular.' <br> Tel.: '.@$registro->numero.'", "'.@$registro->ciudad.'", "'.@$registro->certificado.'"],
    ';
		}
			}

echo	'];

		</script>';
		?>


<!-- Este script es el encargado de dirigir a la pagina de bloquear contacto al presionar el boton de bloquear contacto -->
<script type="text/javascript">
	$(document).ready(function(){
	   $("input.bloquear_contacto").click(function() {
	      url = "<?=base_url()?>bloquear_contacto";
	      window.open(url, '_self');
	      return false;
	   });
	});
</script>


		<script type="text/javascript">
			//variable global: items por pagina
			var items_per_page = 6;

			//cuando el documento este listo inicializar la paginacion
			$(document).ready(function(){      
				initPagination();
			});

			//funcion que prepara lo necesario para implementar la paginacion
			function initPagination() {
				$("#Pagination").pagination(contactos.length, {
					callback: pageselectCallback,
					items_per_page: items_per_page
				});
			}

			//funcion que trae y formatea los datos, es llamada cuando el usuario hace clic en un link de pagina
			function pageselectCallback(page_index, jq) {
				//formula que establece la maxima cantidad de elementos a mostrar en c/pagina
				var max_elem = Math.min((page_index+1) * items_per_page, contactos.length);
				//variable que contendran los datos ya formateados 
				var new_content = "";

				//for para iterar entre los elementos de la lista de contactos
				//con el formato definido para el html de panel7
				for (var i=page_index*items_per_page ; i<max_elem ; i++) {
					var nom ="'"+contactos[i][2]+"'";
					new_content += '<div class="result" style="padding-bottom: 7px;">';
						new_content += '<tr> <td colspan="6" style="padding-top: 10px;">';
							new_content += '<table border="1" style="width: 100%; height: auto; border: 4px solid #ddd"> <tr>';
								new_content += '<td id="primercol_tablaprincipal" style="vertical-align: middle; font-weight:bold; text-align:center;">';
									new_content += '<p id="nomEmpresa">' + '<img src="<?=base_url()?>uploads/logos/' + contactos[i][0] + '" id="nomEmpresa_img" style="width: 110px; height: 47px;"/> ' 
										+ contactos[i][1] + '</p> ';
								new_content += '</td>';
								new_content += '<td style="width: 10%; vertical-align: middle; text-align: center;">';
									new_content += contactos[i][2];
								new_content += '</td>';
								new_content += '<td style="width: 15%; vertical-align: middle; color: blue;"> ';
									new_content += contactos[i][3];
								new_content += '</td>';
								new_content += '<td style="width: 10%; vertical-align: middle; text-align: center;">';
									new_content += contactos[i][4];
								new_content += '</td>';
								new_content += '<td style="width: 13%; vertical-align: middle; text-align: center;">';
									if (contactos[i][5] == '1') {
										//si es certificado
										new_content += '<img src="<?=base_url()?>img/certificado.png" />';
									} else {
										new_content += '<img src="<?=base_url()?>img/nocertificado.png" />';
									}
								new_content += '</td>';
								new_content += '<td width="auto" style="vertical-align: middle;">';
								new_content += '<a href="javascript:void(0)" onclick="javascript:chatWith('+nom+')" style="margin-right: -4px;"> <img src="<?=base_url()?>img/disponible_REC.png" /> </a>';
								new_content += '<a href="<?=base_url()?>contactar_usuario/enviar_msj/'+contactos[i][0]+'/'+contactos[i][2]+'" style="margin-right: -4px;"> <img src="<?=base_url()?>img/contactar_REC.png" /> </a>';
								new_content += '<a href="#" style="margin-right: -4px;"> <img src="<?=base_url()?>img/call_REC.png" /> </a>';
								new_content += '</td>'
							new_content += '</tr> </table>'
						new_content += '</td> </tr>';
					new_content += '</div>';
				}

				//se hace una especie de innerHTML en el gran div Searchresult, con el resultado de la consulta (?)
				//$('#Searchresult').empty().append(new_content);
				$('#Searchresult').html(new_content);

				// Prevent click event propagation
				return false;
			}
		</script>


		<!-- estilos css generales -->
	   <style type="text/css">
			.container_12{
				background:#ffffff;
				height:auto;
				width: 1336px;
				max-width: 1299px;
				margin-top: 30px;
				margin-left: -7px;
				margin-right: center;
			}
	           #he{
	              width: 1100px;
	              margin-left: 21px;
	              margin-right: -84px;
	          }
	          .grid_1{
	            background: transparent;
	             height: 50px;
	             width: 225px;
	          }
	          .grid_4{
	             background: #ffffff;
	             height:512px;
	             margin:12px 12px;
	             width: 300px;
	          }

	           #div1{
	             height:auto;
	             width: 220px;
	          }
	          .grid_2{
	             background: red;
	             height:300px;
	             width: 100%;
	          } 
	           #div2{
	             height:auto;
	             width: 1000px;
	          }
	          #div3{
	          	height: auto;
	             width: 1345px;
	             margin-left: 0px;
	          }

	      /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
	      /* estilos tablita */
	      #tablaprincipal_divgen {
	      	margin-top: 30px; 
	      	height: auto; 
	      	background-color: transparent;
	      }
	      #tablaprincipal {
	      	width: 100%;
	      }

	      #primercol_tablaprincipal {
	      	width: 24%;
	      }

	      #nomEmpresa {
				color: gray;
			}

			#contenedor1{
				height: 32px; 
			    background:#f7f7f7; 
			    width:1090px; 
			    font-size: 13px;
			    margin-top: 32px;
			}
			#contenedor_2 {
				height: 32px; 
				background: transparent; 
				font-size: 13px;
			}

			#contenedor2{
				margin-top: 3px; 
				height: 32px; 
				width: 632px;
	            margin-right: -111px;
				margin-left: -5px; 
				background: #f7f7f7;
			   }
			   #contenedor_paginacion{
			   	background: #e9e9e9; 
			   	text-align: center;
			   }
	   </style>

	   <!-- estilos css resolucion 1280 -->
	   <style>
	     	@media screen and (max-width: 1280px) {
	   	    .container_12{
	          	background:#ffffff;
	            height:auto;
	            width: 1265px;
	            max-width: 1265px;
	            margin-top: 30px;
	            margin-left: center;
	            margin-right: center;
	          }
	           #he{
	              background: transparent;
	              float: left;
	              width: 1014px;
	              margin-right: -12px;
	              padding-left: 0px;
	              max-width: 1054px;
	              display: block;
	          }
	          .grid_1{
	            background: transparent;
	             height: 50px;
	             width: 225px;
	          }
	          .grid_4{
	             background: #ffffff;
	             height:512px;
	             margin:12px 12px;
	             width: 300px;
	          }

	           #div1{
	             height:auto;
	             width: 220px;
	          }
	          .grid_2{
	             background: red;
	             height:300px;
	             width: 100%;
	          } 
	           #div2{
	             height:auto;
	             width: 989px;
	          }
	          #div3{
	             height:auto;
	             width: 989px;
	             margin-left: -16px;
	          }

				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
				/* estilos tablita */
				#tablaprincipal {
					width: 100%;
				}

				#nomEmpresa {
					color: gray;
				}

				#contenedor1{
				height: 32px; 
			    background:#f7f7f7; 
			    width:1090px; 
			    font-size: 13px;
			    margin-top: 32px;
			}
			#contenedor2{
				margin-top: 3px; 
				height: 32px; 
				width: 629px; 
				margin-left: -5px; 
				background: #f7f7f7;
			   }
			   #contenedor_paginacion{
			   	background: #e9e9e9; 
			   	text-align: center;
			   }
	      }
	   </style>

	   <!-- estilos css resolucion 1024 -->
	   <STYLE TYPE="text/css">
	   	@media screen and (max-width: 1024px) {
	   		body {
	   			/* desaparece scroll horizontal en IE y otros */
					overflow-x: hidden;
					overflow-y: auto;
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
	           #he{
	              background: transparent;
	              float: left;
	              width: 757px;
	              margin-right: -12px;
	              padding-left: 0px;
	              max-width: 757px;
	              display: block;
	          }
	          .grid_1{
	            background: transparent;
	             height: 50px;
	             width: 225px;
	          }
	          .grid_4{
	             background: #ffffff;
	             height:512px;
	             margin:12px 12px;
	             width: 300px;
	          }

	           #div1{
	             height:auto;
	             width: 220px;
	          }
	          .grid_2{
	             background: red;
	             height:300px;
	             width: 100%;
	          } 
	           #div2{
	             height:auto;
	             width: 989px;
	          }
	          #div3{
	             height:auto;
	             width: 996px;
	             margin-left: 9px;
	          }


	   		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
				/* estilos tablita */
				#tablaprincipal_divgen {
					margin-left: -30px;
				}
				#tablaprincipal {
					width: 79.8%;
				}

				#nomEmpresa {
					color: gray;
					width: 130px;
				}
				#nomEmpresa_img {
					padding-bottom: 10px;
				}

				#primercol_tablaprincipal {
					width: 16%;
				}

				#contenedor1{
				height: 32px; 
			    background:#f7f7f7; 
			    width:760px; 
			    font-size: 13px;
			    margin-top: 32px;
			    margin-left: -30px;
			   }
			   #contenedor_2 {
			   	margin-left: -30px;
			   }

			   #contenedor2{
				margin-top: 3px; 
				height: 32px; 
				width: 302px; 
				margin-left: -5px; 
				background: #f7f7f7;
			   }

			   #contenedor_paginacion{
			   	 background: #e9e9e9;
	             text-align: center;
	             width: 777px;
			   }
	   	}
	   </STYLE>

	<style type="text/css">
	   	#img_contacto 
    	.contacto_number {
	      font-size: 14pt;
	      font-weight: bold;
	      color: white;
	      position:absolute;
	      top:52%;
	      left:45%;
    	}

    	#img_contacto {
		    z-index: 1;
	      	position: relative;
        }
	</style>


	</head>
    
	<body>
		<!--<a href="javascript:void(0)" onclick="javascript:chatWith('luis')">Chat With luis, probando</a>-->
		<div class="container_12" scrolling="no">
			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			<!-- APARTADO HEADER -->
			<div class="grid_1" style="margin-left: 15px; background: transparent; padding-left: 10px; margin: 0px -13px 0px 15px; display: block; float: left;">
				<a href="<?=base_url()?>index"> <img src="<?=base_url()?>img/logo3.png" style="float: left;" /></a>
		  	</div> 
	  		<div class="grid_1" id="he">
				<table style="width: auto; height: auto; border-spacing: 0px;"> <tr> <td>
				  <div style="padding: 4px 0px 4px 0px;"> <table style="border-spacing: 0px;"> <tr>
					<td class="header_iconos"> <a href="<?=base_url()?>tablero_usuario"> Inicio </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos"> <a href="<?= base_url()?>mensajes"> Mensajes </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos activo"> <a href="#"> Contactos </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos"> <a href="<?=base_url()?>publicar_producto"> Productos </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos"> <a href="<?=base_url()?>publicar_oferta"> Busco/Compro </a>  </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos" style="width: 327px;">
					  <table width="100%" style="height: 50px; background-color: #f1f1f1; border-spacing: 0px;"> <tr>
					<td style="padding-top: 15px; padding-left: 70px; width: 50px;"> <img src="<?=base_url()?>img/logouser.png" /> </td>
					<td style="padding-top: 15px; width: 100px;"> 
				<p id="usuactual" style="font-size: 18px;"> <a href="#" style="color: #ff7f27;"> <?=$this->session->userdata('usuario');?> </a> </p> 
						</td>
						<td style="padding-top: 17px;">
							<a href="/proveedor/logueo/logout" title="Cerrar Sesión" style="font-size: 12px;">Cerrar Sesión</a>
						</td>
					  </tr> </table>
					</td>
				  </tr> </table> </div>
				</td> </tr> </table>
		  	</div>
			<div class="clear"></div>

			<article>
				<section>
					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- APARTADO ASIDE IZQUIERDO -->
					<div class="grid_4" id="div1" style="height: auto;">
						<div class="grid_2 alpha" style="height: auto; margin-top: 30px; background-color: transparent;">
							<div class="grid_2 alpha" style="background-color: transparent; height: auto;" id="img_contacto">
								<center> <a href="#"> <img src="<?=base_url()?>img/add_contacto_2.png" /> </a> </center>
								<span class="contacto_number"><?= $count_contactos;?></span> <!--Numero de contactos del usuario -->
							<br> <br>
							<center> 
							<input type="button" value="Bloquear Contacto" style="height: 70px; width: 186px; background-color: #99d9ea; cursor: pointer; border: 1px solid transparent;" class="bloquear_contacto" /> 
							</center>
							</div>
						</div>
					</div>

					<div class="grid_4" id="div2" scrolling="no">
						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO TITULO DEL CONTENIDO -->
							<!-- contenedor 1 -->
					      <div class="grid_2 alpha" id="contenedor1" >
								<h1 style="font-size: 13px; margin-top: 8px; margin-left: 27px; color: #7f7fa7; font-weight: bold;"> Ciudad: </h1>
								<form style="margin-top: -19px; margin-left: 85px;">
									<input type="radio" name="ciudad" value="Bogota" style="height: 15px; width: 15px; vertical-align: text-bottom;"> 
										Bogotá <b style="color:#4accef; font-weight: 500;"> (<?=$bogota;?>)</b>
									<input type="radio" name="ciudad" value="Cali" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">
										Cali<b style="color:#4accef; font-weight: 500;"> (<?=$cali;?>)</b>
									<input type="radio" name="ciudad" value="Medellin" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">
										Medellín<b style="color:#4accef; font-weight: 500;"> (<?=$medellin;?>)</b>
									<input type="radio" name="ciudad" value="Otras" style="height: 15px; width: 15px; margin-left: 24px; vertical-align: text-bottom;">
										Otras ciudades<b style="color:#4accef; font-weight: 500;"> (<?=$otras_ciudades;?>)</b>
								</form>
							</div>

							<!-- contenedor 2 -->
							<div class="grid_2 alpha" id="contenedor_2">
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
											<img src="<?=base_url()?>img/certificado.png" />
									</form>     
								</div>
								<div class="grid_2 omega" id="contenedor2">
									<h1 style="font-size:13px; margin-top:10px; margin-left: 25px; color: #7f7fa7; font-weight: bold;"> Ver </h1>
									<a href="#"><p style="margin-left: 71px; margin-top:-20px;"><img src="<?=base_url()?>img/vista1.png" /></p></a>   
									<a href="#"><p style="margin-left: 93px; margin-top:-19px;"><img src="<?=base_url()?>img/vista2.png" /></p></a>    
								</div>
							</div>

						<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
						<!-- APARTADO CONTENIDO: TABLITA -->
						<div class="grid_2 alpha" id="tablaprincipal_divgen">
							<div style="padding: 10px 0px 10px 0px;">
								<table id="tablaprincipal" style="height: auto;">
									<thead style="background-color: #e9e9e9; color: #00a2e8; font-size: 15px;">
										<tr>
											<td id="primercol_tablaprincipal" style="border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
												Empresa </td>
											<td style="width: 10%; border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
												Usuario </td>
											<td style="width: 15%; border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
												Contacto </td>
											<td style="width: 10%; border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
												Ciudad </td>
											<td style="width: 13%; border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> 
												Nivel </td>
											<td style="width: auto; border-right: 1px solid white; font-weight: bold; text-align: center; padding: 5px 5px 5px 5px;"> </td>
										</tr>
									</thead>
									<tbody style="background-color: transparent; color: black; font-size: 13px; border-spacing: 2px">
										<tr style="width: 100%;"> <td colspan="7"> 
											<!-- texto de reemplazo si el plugin no se ha inicializado -->
											<div id="Searchresult" style="height: auto;">
												Tu lista de contactos esta vacía 
											</div>
										</td> </tr>
									</tbody>
								</table> <br> 
								<!-- contenedor de paginas -->
								<div id="contenedor_paginacion">
									<div id="Pagination" style="padding: 0em 3em; margin: 1em 18%;"> </div> 
								</div>
								<br> <br>
							</div>
						</div>
					</div>

					<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
					<!-- APARTADO FOOTER -->
					<div class="grid_4" id="div3" style="margin-top: -60px;">
						<div class="grid_2 alpha" style="margin-top: 50px; height: auto; width: 101%; background: #f2f2f2; margin-bottom: -13px;">
						<iframe src="<?=base_url()?>footer" scrolling="no" style="height: 312px; width: 100%; margin-left: 0px;"> </iframe>
						</div>   
					</div>
				</section>
			</article>
		</div>
	</body>
</html>