<!DOCTYPE html>
<html lang = "es">
  <head>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
	<meta charset="UTF-8">
	<title>PROVEEDOR.com.co / Tablero de Usuario - Bloquear Contactos</title>
	<link rel="stylesheet" href="<?=base_url()?>css/960.css">
	<link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
	<link rel="stylesheet" href="<?=base_url()?>css/reset.css">
	<!-- importaciones estilos del header -->
	<link rel="stylesheet" href="<?=base_url()?>css/cont_bloq/estilosheader.css">
	<!-- importaciones sistema de paginacion -->
	<link rel="stylesheet" href="<?=base_url()?>css/cont_bloq/pagination.css" />
	<script type="text/javascript" src="<?=base_url()?>js/cont_bloq/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/cont_bloq/jquery.pagination.js"></script> 
	<!--<script type="text/javascript" src="<?=base_url()?>js/cont_bloq/datosContactos.js"></script>  JS donde estan los datos -->
	<!-- JS donde estan los datos de contactos traidos desde la bd -->
	<?php  echo '<script type="text/javascript">
		var contactosB = [';
		if ($contacto2) {
			foreach (@$contacto2 as $registro){
        echo '
    ["'.@$registro->logo.'", "'.@$registro->nombre.'", "'.@$registro->usuario.'", "Cel.: '.@$registro->celular.' <br> Tel.: '.@$registro->numero.'", "'.@$registro->ciudad.'", "'.@$registro->certificado.'"],
    ';
		}
			}
	echo '];
		</script>';
		?>



	<script type="text/javascript">
		//SISTEMA DE PAGINACION
		//datosContactos.js tiene en una matriz los datos de los contactos traidos desde la bd
		//y mediante este javascript formatear esos datos teniendo en cuenta el valor de la variable
		//items_per_page que contiene el numero de contactos que quiero mostrar por pagina.
		//el mismo codigo/libreria hace el proceso correspondiente

		//variable global: items por pagina
		var items_per_page = 6;

		// When document is ready, initialize pagination
		//cuando el documento este listo inicializar la paginacion
		$(document).ready(function(){      
		  initPagination();
		});

		//funcion que prepara lo necesario para implementar la paginacion
		function initPagination() {
		  //#Pagination es el div que muestra los links para las paginas
		  //ej: [Anterior] [1] [2] [3] ... [20] [Siguiente]
		  //ahora especifico: 
		  //cantidad de contactos que estan en la matriz de datosContactos.js (contactosB.length)
		  //el llamado a la funcion pageselectCallback (callback: pageselectCallback)
		  //y la cantidad de items por pagina (items_per_page: items_per_page)
		  //con esos datos la libreria muestra la cantidad de paginas necesarias para mostrar el contenido
		  $("#Pagination").pagination(contactosB.length, {
			 callback: pageselectCallback,
			 items_per_page: items_per_page
		  });
		}

		//funcion que trae y formatea los datos, es llamada cuando el usuario hace clic en un link de pagina
		//es decir, cuando se hace clic en la pagina 2 o 3 por ejemplo.
		//parametros:
		//page_index: la pagina a la que hice clic (si hice clic en la pagina 1, esta variable es 0)
		//jq: el contenedor #Pagination que contiene los links de pagina, en forma de objeto jquery
		function pageselectCallback(page_index, jq) {
		  //formula que establece la maxima cantidad de elementos a mostrar en c/pagina
		  var max_elem = Math.min((page_index+1) * items_per_page, contactosB.length);
		  //variable que contendran los datos ya formateados 
		  var new_content = "";

		  //for para iterar entre los elementos de la lista de contactos
		  //con el formato definido para el html de panel9
		  for (var i=page_index*items_per_page ; i<max_elem ; i++) {
			//concatenar a new_content los elementos del archivo datosContactos.js
			//en el formato especificado de html			
			new_content += '<div class="grid_2 alpha" id="tablita_p">';
				new_content += '<div class="grid_2 alpha" id="tablita_p2">';				
					new_content += '<div class="grid_2 alpha" style="margin-top: 3px; height: 107px; width:42px; background:#f7f7f7;';
					new_content += 'text-align: center;">';
						new_content += '<input type="checkbox" name="bloquear[]" value="' + contactosB[i][2] + '" style="margin-top:40px;"></input>';
					new_content += '</div>';
					
					new_content += '<div class="grid_2 alpha" id="tablita_col1_p">';
						new_content += '<img src="<?=base_url()?>uploads/resize/logos/' + contactosB[i][0] + '" width="120" height="67"/> <br> <br>';
						new_content += '<p style="color: grey; font-weight: bold;">' + contactosB[i][1] + '</p>';
					new_content += '</div>';

					new_content += '<div class="grid_2 alpha" id="tablita_col2_p">';
						new_content += '<div style="padding-top: 40px;">' + contactosB[i][2] + '</div>';
					new_content += '</div>';

					new_content += '<div class="grid_2 alpha" id="tablita_col3_p">';
						new_content += '<div style="padding-top: 40px; color: #ff7f27">' + contactosB[i][3] + '</div>';
					new_content += '</div>';

					new_content += '<div class="grid_2 alpha" id="tablita_col4_p">';
						new_content += '<div style="padding-top: 40px;">' + contactosB[i][4] + '</div>';
					new_content += '</div>';

					new_content += '<div class="grid_2 alpha" id="tablita_col5_p">';
						if (contactosB[i][5] == '1') {
							//si es certificado
							new_content += '<img src="<?=base_url()?>img/certificado.png" style="padding-top: 40px;" />';
						} else {
							new_content += '<img src="<?=base_url()?>img/nocertificado.png" style="padding-top: 40px;" />';
						}
					new_content += '</div>';					
				new_content += '</div>';
			 new_content += '</div>';			 
		  }

		  //se hace una especie de innerHTML en el gran div Searchresult, con el resultado de la consulta (?)
		  //$('#Searchresult').empty().append(new_content);
		  $('#Searchresult').html(new_content);

		  // Prevent click event propagation
		  return false;
		}
	 </script>


	 <!-- Estilos para el mensaje de confirmacion al bloquear cobtacto, el mensaje se puede editar desde el controlador -->
<style type="text/css">
  .exito {  
       color: #4F8A10;  
       background-color: #DFF2BF;  
       background-image:url('<?=base_url()?>img/Alarm-Tick-icon.png'); 
       font-family:Arial, Helvetica, sans-serif;  
       font-size:13px;  
       border: 1px solid;  
       margin: 10px 0px;  
       padding:15px 10px 15px 50px;  
       background-repeat: no-repeat;  
       background-position: 10px center;
       width: 22%; 
       position: absolute;
}
</style>

  </head>
	<style type="text/css">
		  .container_12{
				background:#ffffff;
				height:auto;
				width: 1336px;
				max-width: 1299px;
				margin-top: 30px;
				margin-left: 4px;
				margin-right: center;
			 }
				#he{
				  width: 1088px;
				  margin-left: 33px;
                  margin-right: -71px;
			 }
			 .grid_1{
				background: #ffffff;
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
				 margin-left: 4px;
			 }
			 .grid_2{
				 background: red;
				 height:300px;
				 width: 100%;
			 } 
			  #div2{
				 height:auto;
				 width: 1019px;
			 }
			 #div3{
				 height:900px;
				 width: 1830px;
			 }
				 #bloquear{
				 border: 0px #636369 solid;
				 color: #FFFFFF;
				 background-color: #99d9ea;
				 margin-top: 0px;
				 margin-left: 0px;
				 height: 82px;
				 width: 215px;
				 max-width: 215px;
				 font-size:19px;
			 }

		/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
		/* estilos tablita */
		#tablita {
			margin-top: 30px; 
			height: 1080px; 
			background:#ffffff; 
			font-size: 13px; 
			width: 1019px;
		}

		#tablita_p {
			margin-top: 5px; 
			height:120px; 
			background:#f1f1f1;
			width: 1012;
		}
		#tablita_p2 {
			margin-top: 3px; 
			height:113px; 
			background:#ffffff; 
			width:1012px; 
			margin-left:3px;
		}

		#tablita_col1 {
			margin-top: 3px; 
			height:35px; 
			width:265px; 
			background:#f7f7f7;
		}
		#tablita_col1_p {
			margin-top: 3px; 
			height:107px; 
			width:217px; 
			background:#f7f7f7; 
			margin-left:-6px;
		}

		#tablita_col2 {
			margin-top: 3px; 
			height:35px; 
			width:135px; 
			background:#f7f7f7; 
			margin-left:-6px;
		}
		#tablita_col2_p {
			margin-top: 3px; 
			height:107px; 
			width:133px; 
			background:#f7f7f7; 
			margin-left:-6px; 
			text-align: center;
		}

		#tablita_col3 {
			margin-top: 3px; 
			height:35px; 
			width:170px; 
			background:#f7f7f7; 
			margin-left:-6px;
		}
		#tablita_col3_p {
			margin-top: 3px; 
			height:107px; 
			width:173px; 
			background:#f7f7f7; 
			margin-left:-6px; 
			text-align: center;
		}

		#tablita_col4 {
			margin-top: 3px; 
			height:35px; 
			width:115px; 
			background:#f7f7f7; 
			margin-left:-6px;
		}
		#tablita_col4_p {
			margin-top: 3px; 
			height:107px; 
			width:116px; 
			background:#f7f7f7; 
			margin-left:-6px; 
			text-align: center;
		}

		#tablita_col5 {
			margin-top: 3px; 
			height:35px; 
			width:170px; 
			background:#f7f7f7; 
			margin-left:-6px;
		}
		#tablita_col5_p {
			margin-top: 3px; 
			height:107px; 
			width:168px; 
			background:#f7f7f7; 
			margin-left:-6px; 
			text-align: center;
		}

		#tablita_col6 {
			margin-top: 3px; 
			height:35px; 
			width:143px; 
			background:#f7f7f7; 
			margin-left:-6px;
		}
		#paginacion{
				margin-top: 3px; 
				height: auto; 
				background: #e9e9e9; 
				width:1012px; 
				margin-left:3px;
			}
			#publi{
				margin-top: 8px; 
				width:750px;
				height:140px; 
				background:#ffffff; 
				margin-left:134px;
			}


			#fooo{
				margin-top: 16px;
				height:328px; 
				width: 1363px; 
				background:#f2f2f2; 
				margin-left: -17px;
			}
			 #pa{
			    margin-top: 3px;
                height: 42px;
                width: 581px;
                margin-right: -94px;
                margin-left: -6px;
                background: #f7f7f7;	
			 }
			 #pu{
			 	margin-top: 30px;
                height: 42px;
                background: #f7f7f7;
                width: 1098px;
			 }
	</style>

	<style>
		@media screen and (max-width: 1280px) {
		  .container_12{
				background:#ffffff;
				height:auto;
				width: 1336px;
				max-width: 1299px;
				margin-top: 30px;
				margin-left: 4px;
				margin-right: center;
			 }
				#he{
				  width: 1015px;
				  max-width: 1054px;
			 }
			 .grid_1{
				background: #ffffff;
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
				 margin-left: 4px;
			 }
			 .grid_2{
				 background: red;
				 height:300px;
				 width: 100%;
			 } 
			  #div2{
				 height:auto;
				 width: 1019px;
			 }
			 #div3{
				 height:900px;
				 width: 1830px;
			 }
				 #bloquear{
				 border: 0px #636369 solid;
				 color: #FFFFFF;
				 background-color: #99d9ea;
				 margin-top: 0px;
				 margin-left: 0px;
				 height: 82px;
				 width: 215px;
				 max-width: 215px;
				 font-size:19px;
			 }

			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* estilos tablita */
			#tablita {
				width: 1000px;
			}
			#tablita_p {
				width: 1000px;
			}
			#tablita_p2 {
				width: 994px;
			}
			#tablita_col6 {
				width: 124px;
			}
		
		#paginacion{
				margin-top: 3px; 
				height: auto; 
				background: #e9e9e9; 
				width:1012px; 
				margin-left:3px;
			}
			#publi{
				margin-top: 8px; 
				width:750px;
				height:140px; 
				background:#ffffff; 
				margin-left:134px;
			}


			#fooo{
				margin-top: 16px;
				height:328px; 
				width: 1334px; 
				background:#f2f2f2; 
				margin-left: -17px;
			}
			 #pa{
			    margin-top: 3px;
                height: 42px;
                width: 233px;
                margin-left: -6px;
                background: #f7f7f7;	
			 }
			 #pu{
			 	margin-top: 30px;
                height: 42px;
                background: #f7f7f7;
                width: 751px;
			 }
		}
	</style>


	<style>
		@media screen and (max-width: 1024px) {
		  .container_12{
				background:#ffffff;
				height:auto;
				width: 997px;
				max-width: 997px;
				margin-top: 30px;
				margin-left: 10px;
				margin-right: center;
			 }
				#he{
				  background: transparent;
                  float: left;
                  width: 739px;
                  margin-right: -12px;
                  padding-left: 0px;
                  max-width: 1054px;
                  display: block;
			 }
			 .grid_1{
				background: #ffffff;
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
				 background: #ffffff;
				 height:300px;
				 width: 100%;
			 } 
			  #div2{
				 height:auto;
				 width: 751px;
				 margin-left: -2px;
                 margin-right: -12px;
			 }
			 #div3{
				 height:900px;
				 width: 1830px;
			 }
				 #bloquear{
				 border: 0px #636369 solid;
				 color: #FFFFFF;
				 background-color: #99d9ea;
				 margin-top: 0px;
				 margin-left: 0px;
				 height: 82px;
				 width: 215px;
				 max-width: 215px;
				 font-size:19px;
			 }

			 #pa{
			    margin-top: 3px;
                height: 42px;
                width: 233px;
                margin-left: -6px;
                background: #f7f7f7;	
			 }
			 #pu{
			 	margin-top: 30px;
                height: 42px;
                background: #f7f7f7;
                width: 751px;
			 }

					/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* estilos tablita */
			#tablita {
				width: 750px;
			}
			#tablita_p {
				width: 748px;
			}
			#tablita_p2 {
				width: 742px;
			}
			#tablita_col2, #tablita_col2_p {
				width: 110px;
			}
			#tablita_col3, #tablita_col3_p {
				width: 136px;
			}
			#tablita_col4, #tablita_col4_p {
				width: 110px;
			}
			#tablita_col5, #tablita_col5_p {
				width: 107px;
				margin-right: -10px;
			}
			#tablita_col6 {
				display: none;
			}

			#paginacion{
				margin-top: 3px; 
				height: auto; 
				background: #e9e9e9; 
				width:745px; 
				margin-left:3px;
			}
			#publi{
				margin-top: 8px; 
				width:750px;
				height:140px; 
				background:#ffffff; 
				margin-left:-10px;
			}

			#fooo{
				margin-top: 16px;
				height:326px; 
				width: 1014px; 
				background:#f2f2f2; 
				margin-left: -17px;
			}

		}


	</style>

	
	 <body>
		<div class="container_12">
			<div class="grid_1" style="background: transparent; padding-left: 10px; margin: 0px -13px 0px 4px; display: block; float: left;">
				<a href="<?=base_url()?>index"> <img src="<?=base_url()?>img/logo3.png" style="float: left;" /></a>
		  	</div> 
	  		<div class="grid_1" id="he">
				<table width="auto" height="auto" style="border-spacing: 0px;"> <tr> <td>
				  <div style="padding: 4px 0px 4px 0px;"> <table style="border-spacing: 0px;"> <tr>
					<td class="header_iconos"> <a href="<?=base_url()?>tablero_usuario"> Inicio </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos"> <a href="<?=base_url()?>mensajes_usuario"> Mensajes </a> </td>
					<!-- separador -->
					<td style="background: #f1f1f1; border-bottom: 4px solid #00a2e8;"> <div style="border-right: 1px dotted #969696; height: 32px; margin-top: 10px;"> </div> 
					</td>
					<!-- separador -->
					<td class="header_iconos activo"> <a href="<?=base_url()?>contactos"> Contactos </a> </td>
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
						<td style="padding-top: 17px;"> <p style="font-size: 13px;"> > </p> </td>
					  </tr> </table>
					</td>
				  </tr> </table> </div>
				</td> </tr> </table>
		  	</div>

				 <div class="clear"></div>
				  <article>
					 <section>
						 <div class="grid_4" id="div1">
 <!--esta parte pertenece a al panel izquierdo donde van las dos imagenes de contacto y bloquear contactos -->
									<div class="grid_2 alpha" style="margin-top: 30px; height:420px; background:#ffffff;"><center><a href="#"><img src="<?=base_url()?>img/add_contacto_2.png" /></a></center></div>
									<div class="grid_2 alpha" style="margin-top: -23px; height:84px; background:#ffffff; margin-left: 17px;"><a href="#"><img src="<?=base_url()?>img/bloquear_2.png" /></a></div>
						  </div>

 <!--este div es el cuerpo de de la pagina, en el estaran los divs encargados de organizar todo -->
						  <div class="grid_4" id="div2">
							  <div class="grid_2 alpha" id="pu">
									 <h1 style="font-size:17px; margin-top:10px; margin-left:30px;">Ciudad:</h1>
									 <form style="margin-top:-20px; margin-left:104px;">
										  <input type="radio" name="ciudad" value="Bogota">Bogota<b style="color:#4accef;"> (<?=$bogota;?>)</b>
										  <input type="radio" name="ciudad" value="Cali">Cali<b style="color:#4accef;"> (<?=$cali;?>)</b>
										  <input type="radio" name="ciudad" value="Medellin">Medellin<b style="color:#4accef;"> (<?=$medellin;?>)</b>
										  <input type="radio" name="ciudad" value="Otras">Otras ciudades<b style="color:#4accef;"> (<?=$otras_ciudades;?>)</b>
									 </form>
							  </div>
							  <div class="grid_2 alpha" style="margin-top: 3px; height:42px; width:255px; background:#f7f7f7;"></div>
							  <div class="grid_2 alpha" style="margin-top: 3px; height:42px; width:255px; margin-left:-6px; background:#f7f7f7;">
									 <h1 style="font-size:17px; margin-top:10px; margin-left:30px;">Nivel:</h1>
									<form style="margin-top:-20px; margin-left:95px;">
										  <input type="radio" name="certificado" value="certificado"><img src="<?=base_url()?>img/certificado.png" />
									</form>     
							  </div>
							  <div class="grid_2 omega" id="pa">
									 <h1 style="font-size:17px; margin-top:10px; margin-left:30px;">Ver</h1>
									 <a href="#"><p style="margin-left:82px; margin-top:-20px;"><img src="<?=base_url()?>img/vista1.png" /></p></a>   
									 <a href="#"><p style="margin-left:105px; margin-top:-20px;"><img src="<?=base_url()?>img/vista2.png" /></p></a>

								<?php if($this->session->flashdata('ct_bloqueado'))  { ?>
								<!-- Mensaje que confirma cuando se ha bloqueado contactos -->
					            <div class="exito mensajes"> 
					            	<?=$this->session->flashdata('ct_bloqueado')?>
					            </div>
					            <br>
					             <?php } ?>    
							  </div> 


					
							  <div class="grid_2 alpha" id="tablita">
									<div class="grid_2 alpha" id="tablita_col1">
										<h1 style="margin-top:8px; color:#1eabe8; font-size: 15px;" align= "center">Empresa</h1></div>
									<div class="grid_2 alpha" id="tablita_col2">
										<h1 style="margin-top:8px; font-size: 15px; color:#1eabe8;" align= "center">Usuario</h1></div>
									<div class="grid_2 alpha" id="tablita_col3">
										<h1 style="margin-top:8px; font-size: 15px; color:#1eabe8;" align= "center">Contacto</h1></div>
									<div class="grid_2 alpha" id="tablita_col4">
										<h1 style="margin-top:8px; font-size: 15px; color:#1eabe8;" align= "center">Ciudad</h1></div>
									<div class="grid_2 alpha" id="tablita_col5"> </div>
									<div class="grid_2 omega" id="tablita_col6"> </div>
								
								<div class="grid_2 alpha" style="margin-top: 5px; height:991px; background:#ffffff;">   
<!-- en esta parte se manejan varios divs para funcionar como una tabla dentro de cada uno ira un contenido de los contactos -->
<!-- al final hay un boton para bloquear todos los contactos que fueron previamente seleccionados-->
										<!-- cargador de elementos -->
										<?=form_open(base_url().'bloquear_contacto/bloquear')?>  <!--Formulario de busqueda que dirige a la vista de listado -->
										<div id="Searchresult" style="height: auto;">
											El contenido especificado no se ha inicializado. 
										</div>
										 

										<!-- contenedor de paginas -->
										<div class="grid_2 alpha" style="margin-top: 25px; height: auto; background:#f1f1f1; font-size: 16px;">
											<div class="grid_2 alpha" id="paginacion">
												<div id="Pagination" style="padding: 0em 3em; margin: 0em 18%;"> </div> 
											</div>
										</div>

										 <div class="grid_2 alpha" style="background: transparent; margin-left: 53px; width: auto;"> 
												<div class="grid_2 alpha" style="margin-top: 28px; height:82px; background:#ffffff; width:300px; margin-left:116px;">
													 <h1 style="margin-top:10px; font-size:17px; color:#3a3a3a;">Selecciona las empresas que desees bloquear y da clic a continuación en "Bloquear Contacto"</h1>
												</div>
												<div class="grid_2 alpha" style="margin-top: 28px; height:82px; background:#ffffff; width:213px; margin-left:18px;">
													 <input type="submit" value="Bloquear Contacto" id="bloquear" style="cursor: pointer;" >     
												</div>  
										 </div> 
										 <?=form_close()?>

								</div>
							  </div>
						  </div>
							  <div class="grid_2 alpha" id="fooo">
								  <iframe src="<?=base_url()?>footer" scrolling="no" style="height: 324px; width: 100%; margin-left: 0px;"></iframe></div>   
							  </div>   
					 </section>
				  </article>

		 </div>
	  </body>
  </html>







