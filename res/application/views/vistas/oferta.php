<!DOCTYPE html>
<html lang = "es">
  	<head>
		<!-- PAGINA OFERTA DE COMPRA - BASADA EN PAGINA PRODUCTO -->
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?=base_url()?>img/logoweb.ico" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <title>PROVEEDOR.com.co / Oferta de Compra</title> -->
    <title> <?php echo $nom_producto." / PROVEEDOR.com.co"; ?> </title>

		<link rel="stylesheet" href="<?=base_url()?>css/960.css">
		<link rel="stylesheet" href="<?=base_url()?>css/960_12_col.css">
		<link rel="stylesheet" href="<?=base_url()?>css/reset.css">

		<script type="text/javascript" src="<?=base_url()?>js/jquery-1.9.1.js"> </script>

		<!-- importaciones para el tooltip de la seccion comentarios del formulario -->
			<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/oferta/tooltipster.css" />
			<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/oferta/estilos_tooltip.css" />
			<script type="text/javascript" src="<?=base_url()?>js/oferta/jquery.tooltipster.min.js"> </script>
			<script type="text/javascript" src="<?=base_url()?>js/oferta/prettify.js"> </script>
			<script type="text/javascript" src="<?=base_url()?>js/oferta/scripts.js"> </script>

		<!-- importaciones para el visor de imagenes (smooth products) -->
			<script type="text/javascript" src="<?=base_url()?>js/oferta/visualizador_imagenes.js"> </script>
			<link rel="stylesheet" href="<?=base_url()?>css/oferta/visualizador_imagenes.css">
			<script type="text/javascript">
				/* wait for images to load */
				$(window).load( function() {
					$('.sp-wrap').smoothproducts();
				});
			</script>

		<!-- importaciones para las tabs -->
			<link href='<?=base_url()?>css/oferta/estilostabs_ofcompra.css' rel='stylesheet' type='text/css'>
			<!-- <script type="text/javascript" src="js/jquery-1.9.1.js"></script>  -->
			<script type="text/javascript" src="<?=base_url()?>js/jstabs.js"> </script>

    <!-- script para mostrar los nums de telefono -->
      <script type="text/javascript">
        <?php function formatPhoneNumber($phoneNumber) {
          //http://stackoverflow.com/questions/4708248/formatting-phone-numbers-in-php
          $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

          if(strlen($phoneNumber) > 10) {
            $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
            $areaCode = substr($phoneNumber, -10, 3);
            $nextThree = substr($phoneNumber, -7, 3);
            $lastFour = substr($phoneNumber, -4, 4);

            $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
          } else if(strlen($phoneNumber) == 10) {
            $areaCode = substr($phoneNumber, 0, 3);
            $nextThree = substr($phoneNumber, 3, 3);
            $lastFour = substr($phoneNumber, 6, 4);

            $phoneNumber = $areaCode.'-'.$nextThree.'-'.$lastFour;
          } else if(strlen($phoneNumber) == 7) {
            $nextThree = substr($phoneNumber, 0, 3);
            $lastFour = substr($phoneNumber, 3, 4);

            $phoneNumber = $nextThree.'-'.$lastFour;
          }

          return $phoneNumber;
        } ?>
        function VerOcultar_NumTel() {
          if (jQuery("#numTel").val() == "Llamar a la Empresa") {
            jQuery("#numTel").css("font-weight", "normal");
            jQuery("#numTel").css("font-size", "15px");
            jQuery("#numTel").val("<?php echo 'Fijo: '.formatPhoneNumber($empresa['id_contacto']['numero']); ?>"
              + "\n" + "<?php echo 'Cel.: '.formatPhoneNumber($empresa['id_contacto']['celular']); ?>");
          } else {
            jQuery("#numTel").css("font-weight", "normal");
            jQuery("#numTel").css("font-size", "13px");
            jQuery("#numTel").val("Llamar a la Empresa");
          }
        }
      </script>

    <!-- script que muestra un pequeño tooltip al mouse-hover en textarea mensaje -->
      <script type="text/javascript">
        $(document).ready(function() {
          $('.tooltip_comentarioform').tooltipster({
            fixedWidth: 222,
            position: 'right',
            tooltipTheme: '.tooltip_general',
            delay: 200, speed: 100,
            animation: 'slide'
          });
        });
      </script>

    <!-- script contador de palabras para el textarea #textareamensaje -->
      <!-- http://mysticalpotato.wordpress.com/2012/10/27/contador-de-caracteres-para-textarea-al-estilo-twitter-con-jquery/ -->
      <script type="text/javascript">
        $(document).ready(function() {
          //#textarea, #textoContador, num max de caracteres
          init_contadorTa("textareamensaje", "contador_textareamensaje", 500);

          function init_contadorTa(idtextarea, idcontador, max) {
            $("#" + idtextarea).keyup(function() {
              console.log("keyup");
              updateContadorTa(idtextarea, idcontador, max);
            });

            $("#" + idtextarea).change(function() {
              console.log("change");
              updateContadorTa(idtextarea, idcontador, max);
            });
          }

          function updateContadorTa(idtextarea, idcontador, max) {
            var contador = $("#" + idcontador);
            var ta = $("#" + idtextarea);
            //contador.html("0/" + max);

            contador.html("<b>" + (500 - (ta.val().length)) + "</b> palabras máximo");
            if (parseInt(ta.val().length) > max) {
              ta.val(ta.val().substring(0, max - 1));
              contador.html("<b>" + (500 - max) + "</b> palabras máximo");
            }
          }
        });
      </script>

    <!-- Estilos para los mensajes de error en las validaciones -->
      <style type="text/css">
        .error {
          /*position: absolute;*/
          font-weight: bold;
          /*left: 77%;*/
          /* /////////////// */
          /*width: 225px;
          height: 40px;
          padding: 3px;
          font-size: 13px;
          line-height: 15px;
          text-align: center;
          color: red;
          background: rgb(255, 255, 255);
          border: 1px solid #DDD;
          border-radius: 2px;
          text-shadow: rgba(0, 0, 0, 0.0980392) 1px 1px 1px;
          box-shadow: rgba(0, 0, 0, 0.4) 2px 2px 5px 0px;*/
          z-index: 3;
        }
        .error:after {
          content: "";
          position: absolute;
          width: 0;
          height: 0;
          border-width: 10px;
          border-style: solid;
          border-color: #fff #ddd #fff #fff;
          top: 9px;
          left: -20px;
        }
          label.error {
            display: none;
            width: 225px;
            height: 52px;
          position: absolute;
          background: #ddd;
          font-size: 14px;
          color: red;
          padding: 0.7em 0.7em 0.7em 0.7em;
          transition: none;
          cursor: default;
          left: 80%;
          margin-top: -2em;
          }
          @media screen and (max-width: 1279px) {
            label.error {
              left: 75%;
            }
          }
          label:before {
            width: 100% !important;
            margin: 0;
            height: 100% !important;
            top: 61% !important;
            border: none !important;
            background: transparent !important;
          }
      </style>

		<!-- estilos css generales (1280) -->
  		<style type="text/css">
  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* cuerpo */
  				html, body {
  					font-family: Arial;
  					/* desaparece scroll horizontal en IE y otros */
  					overflow-x: hidden;
  					overflow-y: auto;
  				}

  				a {
  					text-decoration: none;
  				}

  				.container_12{
  					background:#ffffff;
  					height: auto;
  					/* width: 79.1em; width: 1265px; */
            width: 100%;
  					margin-top: 10px;
  					margin-left: center;
  					margin-right: center;
  				}

  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* generales */
  				.grid_1{
  					background: yellow;
  					height: 50px;
  					width: 225px;
  				}

  				.grid_4{
  					background: #ffffff;
  					height:512px;
  					margin:12px 12px;
  					width: 300px;
  				}

  				.grid_2{
  					background: red;
  					height:300px;
  					width: 100%;
  				}

  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* headers */
  				#header_1 {
            width: 104%;
            height: 35px;
            margin: -11px 0px 27px -10px;
  				}

  				#he{
  					width: auto;
  					margin-top: -7px;
            margin-left: -19px;
  					background:#ffffff;
  				}

  				/* header 2 */
  				#hi {
  					display: block;
  					width: auto;
  					margin-top: -19px;
  					height: 70px;
  					background: #ffffff;
  					margin-left: 12px;
  				}

          #titulito{
            width: auto;
            height: 20px;
            background: transparent;
            margin-top: -27px;
            margin-left: 657px;
            display: none;
          }
          #espacio_logo_proveedor {
            background: transparent;
            width: 15em;
            height: auto;
            margin: 0;
            margin-top: -1.4em;
            margin-left: 0.42em;
            display: block;
          }

  				#div1_logo {
  					height: 49px;
  					width: 205px;
  					background: red;
  					margin-left: 0px;
  					margin-top: 1px;
  				}

  				#div3_buscar{
  					height: auto;
  					width: auto;
  					background: #00a2e8;
  					margin-left: 5px;
  					margin-top: 9px;
  					border: none;
  					background: transparent;
  					border-radius: 3px;
  					border-collapse: separate;
  				}

  					#barra {
  						/* estilos de la barra de busqueda de arriba (tabla) */
  						width: auto;
  						display: block;
  						height: auto;
  						min-height: 39px;
  						border-radius: 3px;
  						border: 2px solid #005e9b;
  					}

            /* estilos del select de arriba (dentro de un label) */
            #selec {
              height: 41px;
              width: 106px; /* width: 104px; */
              border: none;
              padding: 10px 10px 10px 1px;
              margin: 0;
              background: transparent;
              color: #ff812d; /* naranja el texto */
              outline:none;
              display: inline-block;
              -webkit-appearance:none;
              -moz-appearance:none;
              appearance:none;
              cursor:pointer;
              font-weight: bold;
            }

            .flechita {
              margin-left: 15px;
              margin-right: 10px;
            }

            .flechita #selec {
              /* quitar la flecha de un select (para firefox, ie y otros) */
              -moz-appearance: none;
              appearance: none;
              text-indent: 0.01px;
              text-overflow: '';
              background-image: url("<?= base_url() ?>img/flechita_select.png");
              background-position: 96px 19px; /* background-position: 87px 17px; */
              background-repeat: no-repeat;
              font-family: Arial, sans-serif;
            }

  					#cuadrobusqueda {
  						padding-left: 42px; /*padding-left: 15px;*/
  						height: 39px;
  						max-height: 39px;
  						width: 437px; /*width: 493px;*/
              max-width: 437px;
  						border: none;
              font-family: Arial, sans-serif;
  					}

  					#cuadrobusqueda:focus {
  						/* quitar el resplandor generado por el explorador al darle foco al select */
  						outline: 0px;
  					}
            #cuadrobusqueda::-webkit-input-placeholder {
              color: #c3c3c3;
              font-size: 13px;
            }
            #cuadrobusqueda:-moz-placeholder {
              color: #929292;
              font-size: 13px;
            }
            #cuadrobusqueda::-moz-placeholder {
              color: #929292;
              font-size: 13px;
            }
            #cuadrobusqueda:-ms-input-placeholder {
              color: #c3c3c3;
              font-size: 13px;
            }

  					#btn_busqueda {
  						background: url('<?= base_url() ?>img/botonbusqueda.png');
  						width: 65px;
  						height: 41px;
  						cursor: pointer;
  						border: none;
  						display: block;
  						margin-bottom: -1px;
              background-position: center;
  					}

  				#div4_boton1 {
  					height: 47px;
  					width: 144px;
  					background: red;
  					margin-left: 10px;
  					margin-top: 9px;
  					box-shadow: 139px 3px 0px white, 4px 3px 0.2px #ddd;
  				}

  				#div4_boton2 {
  					height: 47px;
  					width: 178px;
  					background: red;
  					margin-left: -1px;
  					margin-top: 9px;
  					box-shadow: 139px 3px 0px white, 4px 3px 0.2px #ddd;
  				}

  				/* ruta del producto */
  				#ho{
  					width: 700px;
  					max-width: 900px;
  					margin-top: 7px;
  					height: 22px;
  					background:#ffffff;
  					padding-left: 3px;
            display: block;
            float: left;
            clear: both;
  				}

  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* espacio para las fotos y los videos */
  				#div1{
  					height: auto;
  					width: 322px;
  					max-width: 322px;
  					background: #ffffff;
  					display: block;
  					padding: 1px 0 2em 0;
  					margin-left: 11px;
  				}

  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* informacion general  del producto (a la derecha del v. de imagenes) */
  				#div2 {
  					height: auto; /*465px*/
  					width: 895px;
  					background:#ffffff;
  					margin-left: 12px;
  				}

  				#tituloproducto{
  					margin: 0px 0px 0px 0px;
  					height: auto;
  					width:885px;
  					background: transparent;
  					padding-bottom: 1px;
  				}

  				#inf_basica_prod {
  					margin-top: 5px;
  					height: auto;
  					width: 527px; /*width: 598px;*/
  					margin-left: 0px;
  					background: transparent;
  				}

  				#inf_basica_fabr {
  					margin-top: 5px;
  					width: 393px;
            margin-right: -175px;
  					height: auto;
  					margin-left: -11px;
  					background: transparent;
  					border-top: 1px solid #f3f3f4;
            
  				}

  				#links_contact_fabven {
  					border-top: 1px dotted #ddd;
  					height: auto;
  					width: 344px;
  					margin: 5px 0 0 0;
  					background: transparent;
  				}

  				#publi {
  					margin-top: 36px;
  					height: 65px;
  					width: 844px;
  					margin-left: 0px;
  					background:#ffffff;
  				}

  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* separador despues de las tabs */
  				#botonazul_ofcompra {
  					height: auto;
  					width: auto;
  					margin-left: 411px;
  					margin-top: -35px;
  					background: #ffffff;
  					padding: 0px 19px 0px 19px;
            text-align: center;
  				}
          .text-naranja{
            color:#FF7F27;
          }

  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* quiero enviar una cotizacion - formulario */
  				#qqap_form {
  					height: auto;
  					width: 1263px;
  					border-bottom: 2px solid #ddd;
  					margin-left: 0px;
  					margin-top: 42px;
  					background: transparent;
  					padding-bottom: 30px;
  				}

  				#pseudotab {
  					width: 287px;
  					border-left: 1px solid #ddd;
  					border-right: 1px solid #ddd;
  					border-top: 3px solid #00a2e8;
  					border-bottom: none;
  					text-align: center;
  					height: 37px;
  					line-height: 34px;
  					position: relative;
  					z-index: 3;
  					margin-bottom: -2px;
  					background: white;
  				}

  				.titulo {
  					width: 230px;
  					float: left;
  					text-align: right;
  				}

  				.subtitulo {
  					padding-left: 10px;
  				}

  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* Ofertas de compra similares */
  				#ofcompra_sim {
  					height: 280px;
  					width: 1251px;
  					margin-left: 14px;
  					margin-top: 12px;
  					background: transparent;
  				}

  				#ofcompra_sim_DIV {
  					padding: 20px 20px 10px 28px;
  				}

          #tabla_solprored {
            border-collapse: separate;
            border-spacing: 2em;
            width: 100%;
          }
          #tabla_solprored td {
            text-align: center;
            vertical-align: middle;
          }
          #tabla_solprored #btn_cotizar {
            width: 8em;
            height: 2em;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
          }

  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* Publicidad */
  				#publi_publi {
  					height: auto;
  					width: 1216px;
  					margin: 35px 0px 45px 46px;
  					background:#ffffff;
  					text-align: center;
  				}

  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* footer */
  				#foo {
  					margin-top: 8px;
  					height: 333px;
  					width: 1350px;
  					margin-left: -41px;
  					background: #f2f2f2;
  					margin-bottom: -21px;
  				}

  				#foo_iframe {
  					height: 333px;
  					width: 100%;
  					margin-left: 0px;
  				}

  			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  			/* otros estilos / sin clasificar */
  				#div3{
  					height:900px;
  					width: 1830px;
  				}

  				#div4{
  					height:900px;
  					width: 1830px;
  				}

  				#div2_ingresar{
  					height: 25px;
  					width: 82px;
  					background: red;
  					margin-left: 32px;
  					margin-top: 24px;
  				}

  				#espacio{
  					height: 25px;
  					width: 1px;
  					background: silver;
  					margin-left: -8px;
  					margin-top: 24px;
  				}

  				#div2_registro{
  					height: 26px;
  					width: 121px;
  					background: red;
  					margin-left: -4px;
  					margin-top: 23px;
  				}

  				#espacio_busqueda{
  					width: 371px;
  					height: 38px;
  					background: #00a2e8;
  					margin-left: 3px;
  					margin-top: 3px;
  				}

  				#espacio_boton_busqueda{
  					width: 58px;
  					height: 38px;
  					background: yellow;
  					margin-left: 617px;
  					margin-top: -38px;
  				}

  				#espacio_foto_producto{
  					margin-top: 0px;
  					height: 366px;
  					width: 393px;
  					background:#aaaaaa;
  				}

  				#foto_producto{
  					margin-top: 4px;
  					height: 358px;
  					width: 383px;
  					background: #ffffff;
  					margin-left:5px;
  				}

  				#table1{
  					width: 109px;
  				}

  				 #report{
  					font-size: 11px;
  					text-align: right;
  				}

  				 #cuadropbli{
  					width: 326px;
  					height: 253px;
  					border-top: 1px solid #ddd;
  					margin: 9px 0px 0px -3px;
  				}

  				 #separador{
  					width: 109px;
  				}

        #cuadropubli{
          width: 300px;
          height: auto;
          border-top: 1px solid #ddd;
          margin: 0.5em 0px 0px 0px;
          padding-top: 3em;
        }

        #numTel {
          vertical-align: middle;
          background: #00a2e8;
          cursor: pointer;
          color: white;
          width: 169px;
          height: 37px;
          max-height: 50px;
          border:none;
          font-family: Arial;
        }


        #inputautormensaje, #inputemailmensaje, #inputtelefonomensaje {
          width: 196px;
          height: 26px;
          margin-left: 0px;
          border: 1px solid #ddd;
        }
        #textareamensaje {
          margin-left: 0px;
          width: 571px;
          height: 103px;
          border: 1px solid #ddd;
          resize: none;
          font-family: Arial;
        }
        #contador_textareamensaje {
          float: right;
          font-size: 11px;
          color: #B4B3B3;
        }
  		</style>

		<!-- estilos css para resolucion 1024 (solo estan los atributos que cambian, no todos) -->
  		<style type="text/css">
  			@media screen and (max-width: 1024px) {
  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  				/* cuerpo */
  					html, body {
  						font-family: Arial;
  						/* desaparece scroll horizontal en IE y otros */
  						overflow-x: hidden;
  						overflow-y: auto;
  					}

  					a {
  						text-decoration: none;
  					}

  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  				/* headers */
  					#he{
  						width: 97%;
  						/* max-width: 1246px; */
  						margin-top:-30px;
  						height:34px;
  						background:#ffffff;
  					}

  					#cuadrobusqueda {
  						width: 267px;
  					}

  					#cuadrobusqueda:focus {
  						/* quitar el resplandor generado por el explorador al darle foco al select */
  						outline: 0px;
  					}

  					/* ruta del producto */
  					#ho{
  						height: 22px;
  					}

  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  				/* informacion general  del producto (a la derecha del v. de imagenes) */
  					#div2{
  						width: 649px;
  					}

  					#tituloproducto{
  						width: 651px;
  					}

  					#inf_basica_fabr {
  						margin-left: 11px;
  						border: none;
  					}

  					#links_contact_fabven {
  						border: none;
  					}

  					#publi{
  						margin-top: 22px;
  						margin-left: -297px;
  					}

  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  				/* tabs: info producto / perfil empresa / otros productos empresa */
  					#table1{
  						width: 0px;
  					}

  					#report {
  						text-align: center;
  					}

  					#cuadropubli{
  						margin: 9px 0px 0px -124px;
  					}

  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  				/* separador despues de las tabs */
  					#botonazul_ofcompra {
  						margin-left: 275px;
  					}

  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  				/* quiero enviar una cotizacion - formulario */
  					#separador{
  						width: 8px;
  					}

  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  				/* Ofertas de compra similares */
  					#ofcompra_sim {
  						height: 300px;
  						width: 1007px;
  						margin-left: 0px;
  						font-size: 14px;
  					}

  					#ofcompra_sim_DIV {
  						padding: 20px 5px 10px 5px;
  					}

  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  				/* Publicidad */
  					#publi_publi {
  						width: 1007px;
  						margin: 35px 0px 45px 0px;
  					}

  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  				/* footer */
  					#foo {
  						width: 1009px;
  						margin-left: 0px;
  						margin-bottom: -32px;
  					}

  				/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
  				/* otros estilos / sin clasificar */
  					#div3{
  						height:900px;
  						width: 1830px;
  					}

  					#div4{
  						height:900px;
  						width: 1830px;
  					}

  					#div2_ingresar{
  						height: 25px;
  						width: 82px;
  						background: red;
  						margin-left: 32px;
  						margin-top: 24px;
  					}

  					#espacio{
  						height: 25px;
  						width: 1px;
  						background: silver;
  						margin-left: -8px;
  						margin-top: 24px;
  					}

  					#div2_registro{
  						height: 26px;
  						width: 121px;
  						background: red;
  						margin-left: -4px;
  						margin-top: 23px;
  					}

  					#espacio_busqueda{
  						width: 371px;
  						height: 38px;
  						background: #00a2e8;
  						margin-left: 3px;
  						margin-top: 3px;
  					}

  					#espacio_boton_busqueda{
  						width: 58px;
  						height: 38px;
  						background: yellow;
  						margin-left: 617px;
  						margin-top: -38px;
  					}

  					#espacio_foto_producto{
  						margin-top: 0px;
  						height: 366px;
  						width: 393px;
  						background:#aaaaaa;
  					}

  					#foto_producto{
  						margin-top: 4px;
  						height: 358px;
  						width: 383px;
  						background: #ffffff;
  						margin-left:5px;
  					}
          }
  		</style>
	</head>

	<body>
		<div class="container_12">
			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			<!-- header  -->
			 <iframe src="<?=base_url()?>header" scrolling="no" id="header_1"></iframe>

       <div style="padding-left: 1em;">
         <div style="float: left; margin-right: 2em;">
          <div class="grid_1" id="espacio_logo_proveedor" style="margin-left: 0;">
            <a href="<?php echo base_url() ?>"> <img src="<?= base_url() ?>img/logo3.png" /> </a>
          </div>
         </div>
         <div style="float: left;">
           <table>
            <tr>
              <td style="height: auto; padding-right: 8px;">
                <?= form_open(base_url() . 'listado/validar') ?>
                  <span><?php echo validation_errors(); ?></span>
                  <table id="barra">
                    <tr>
                      <td style="height: 40px; max-height: 40px; padding-top: 0px; padding-right: 3px;">
                        <div class="flechita">
                          <select name="selec1" id="selec">
                            <option value="Productos" selected> Productos </option>
                            <option value="Solicitados" default> Solicitados </option>
                            <option value="Proveedores" default> Proveedores </option>
                          </select>
                        </div>
                      </td>
                      <td style="height: 33px; max-height: 40px; padding-top: 8px;">
                        <div style="border-left: 2px solid #ddd; padding: 2px 0px 2px 0px; height: 68%;"> </div>
                      </td>
                      <td style="height: 40px; max-height: 40px; display: block; font-size: 24px;">
                        <input type="text" name="busqueda" id="cuadrobusqueda"
                             placeholder="Buscar Productos, Proveedores y Productos Solicitados en Colombia"/> </td>
                      <td style="max-height: 40px;">
                        <input type="submit" name="btn_busqueda"  id="btn_busqueda" value="" /> </td>
                    </tr>
                  </table>
                <?= form_close() ?>
              </td>
              <td>
                <table style="width: auto; height: auto;">
                  <tr>
                    <td style="height: auto; padding-right: 8px;">
                      <a href="<?= $publicar_of ?>">
                        <img src="<?= base_url() ?>img/boton_oferta.png" /> </a>
                    </td>
                    <td style="height: auto">
                      <a href="<?= $publicar_prod ?>">
                        <img src="<?= base_url() ?>img/boton_producto.png" /> </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
           </table>
         </div>
       </div>

			<!-- ruta del producto -->
  			<div class="grid_1" id="ho">
  				<p style="font-size: 12px">
  					<?php echo $this->breadcrumb->output(); ?>
  				</p>
  			</div>

			<div class="clear"></div>

			<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			<!-- contenido -->
			<article> <section>
			 	<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			 	<!-- espacio de las fotos y videos -->
  				<div class="grid_4" id="div1">
  					<table style="width: auto;">
  						<tr> <td style="width: 322px; max-width: 322px; height: 360px;">
  							<div class="sp-wrap"> <?php
                  foreach ($imagenes as $imagen) { ?>
                    <a href="<?php echo base_url()."uploads/resize".$imagen['nombre_img']; ?>">
                      <img src="<?php echo base_url()."uploads/resize".$imagen['nombre_img']; ?>" alt=""> </a> <?php
                  } ?>
  							</div>
  						</td> </tr>
  						<tr> <td style="padding-top: 10px; visibility: hidden;">
  							<a href="#" style="font-size: 12px;"> <center> View and Share related images </center> </a>
  						</td> </tr>
  					</table>
  				</div>

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			  <!-- informacion general  del producto -->
			  	<div class="grid_4" id="div2">
			  		<!-- titulo del producto -->
  				  	<div class="grid_2 alpha" id="tituloproducto">
  				  		<div style="padding: 5px 10px 5px 1em; font-size: 20px;">
                  <p style="color: black; margin: 0;">
                    <?php echo $nom_producto; ?> </p>
  				  		</div>
  				  	</div>

            <!-- informacion basica del producto -->
  				  	<div class="grid_2 alpha" id="inf_basica_prod">
  				  		<div style="width: 96%; float:left; padding: 10px 10px 12px 10px; border: 1px solid #f3f3f4;
                  border-left: none; border-bottom: none; height: 260px;">
  				  			<div style="float: left; width: 100%; max-height: 180px;">
  				  				<div style="width: auto; height: auto; padding: 10px 10px 0px 10px;">
  				  					<table style="font-size: 14px; width: 100%;">
  				  						<tr>
  				  							<td style="width: 12em; font-weight: bold; padding-bottom: 1em; padding-right: 1em;">
                            Cantidad Requerida: </td>
  				  							<td style="color: #ff7f27; font-weight: bold; padding-bottom: 1em; font-size: 16px;">
                            <?php if(!$medida){$medida['nombre_unidad']="unidades";}
                            echo decimal_points($cantidad_requerida)." ".$medida['nombre_unidad']; ?> </td>
  				  						</tr>
  				  						<tr>
  				  							<td style="width: 12em; font-weight: bold; padding-bottom: 1em; padding-right: 1em;">
                            Precio máximo a pagar: </td>
  				  							<td style="font-weight: bold; display: inline; padding-bottom: 1em; font-size: 16px;">
  				  								<p style="color: #ff7f27; display: inline;"> <?php echo "$".decimal_points($precio); ?> </p>
  				  								<?php echo " x ".decimal_points($cantidad_requerida)." ".$medida['nombre_unidad']; ?>
  				  							</td>
  				  						</tr>
                        <tr>
                          <td style="width: 12em; padding-bottom: 1em; padding-right: 1em;"> Forma de pago: </td>
                          <td style="padding-bottom: 1em;"> <?php
                            foreach ($tipo_pago as $tp) { echo $tp->tipo_pago.", "; } ?> </td>
                        </tr>
                        <tr>
                          <td style="width: 12em; padding-bottom: 1em; padding-right: 1em;"> Lugar de Entrega: </td>
                          <td style="padding-bottom: 1em; text-transform: capitalize;">
                            <?php echo $ciudad_entrega['municipio'].
                              " - ".$dpto_entrega->nombre; ?> </td>
                        </tr>
                        <tr>
                          <td style="width: 12em; padding-bottom: 1em; padding-right: 1em;"> Fecha de publicación: </td>
                          <td style="padding-bottom: 1em;"> <?php
                            function nombremes($mes){
                              setlocale(LC_TIME, 'spanish');
                              $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000));
                              return $nombre;
                            }
                            $ymd = new DateTime($fecha_publicacion);
                            //$formattedDate = $ymd->format('d / F / Y');
                            $dia = $ymd->format('d');
                            $mes = nombremes($ymd->format('m'));
                            $anio = $ymd->format('Y');
                            echo $dia." de ".$mes." de ".$anio; ?> </td>
                        </tr>
  				  					</table>
  				  				</div>
  				  			</div>
                  <div style="float: left; width: 100%; padding: 10px 10px 0px 10px;">
                    <div data-toggle="modal" id='popup_launch' data-target="#popup" style="float: left; padding-right: 0.5em;">
                        <img type="button" src="<?=base_url()?>img/btn_enviarcoti.png">
                    </div>
                    <!-- <div style="float: left; max-width: 200px;">
                      <div>
                        <a href="#"> <img src="<?=base_url()?>img/btn_dejarmensaje.png"> </a>
                        <a href="#"> <img style="float: right;" src="<?=base_url()?>img/regresopronto.png"> </a>
                      </div>
                    </div> -->
                  </div>
  				  		</div>
  				  	</div>

            <!-- informacion basica del fabricante/vendedor -->
    					<div class="grid_2" id="inf_basica_fabr">
                <div style="float: left; padding: 11px 0 0 10px;">
                  <a href="#"> <img style="border: 1px solid #f3f3f4;" src="<?=base_url()?>img/addcontacto_f2.png" /> </a>
                </div>
    						<div style="padding: 11px 10px 10px 10px; font-size: 13px; overflow: hidden;">
    							<p style="clear: both; float: left; color: #00a2e8; font-size: 18px; font-weight: bold;">
    								<a href="<?php echo base_url() . "perfil/ver_empresa/0/" .  $empresa['nit']; ?>" style="color: #00a2e8;">
                      <?php echo $empresa['nombre']; ?> </a> </p>
                        
                           <div style= "float:right"> <!--MEMBRESIA SOLICITUD PRODUCTO -->
                            <?php echo $div_membresia ?> 
                           </div>
                           
                   <table style="clear: both; float: left; width: 100%; border-collapse: separate; border-spacing: 0.5em; margin-left: -0.5em; font-size: 12px;">
    								<!-- <tr> <td> <b style="color: gray; vertical-align: sub;">
    									Nivel: </b> <img src="<?=base_url()?>img/certificado.png" /> </td> </td> </tr> -->
    								<tr> <td> <?php echo $empresa['descripcion']; ?> </td> </tr>
                    <tr>
                      <td> <div>
                        <img style="padding-right: 5px;" src="<?=base_url()?>img/contacto.png" />
                        <a href="<?php echo base_url() . "perfil/contacto_empresa/" . $empresa['nit'] ?>"
                          style="font-size: 14px;"> Información de Contacto </a>
                      </div> </td>
                    </tr>
    								<tr> <td style="text-transform: capitalize;"> <b style="color: black;">
    									Ubicación: </b>
                      <?php echo strtolower($empresa['ciudad'])." - ".strtolower($empresa['departamento']); ?> </td> </tr>
    								<tr> <td> <b style="color: black;">
    									Tipo de empresa: </b> <?php echo $empresa['tipo_empresa']['tipo']; ?> </td> </tr>
                    <tr> <td> <b style="color: black;">
                      Productos de interés: </b> <?php echo "aqui va texto"; ?> </td> </tr>
    								<tr> <td> <b style="color: black;">
    									Solicitudes publicadas: </b>
                      <a href="<?php echo base_url() . "perfil/ver_empresa/" . $empresa['nit'] ?>"
                      style="text-decoration: underline; color: blue;">
    									88 - Ver solicitudes </a> </td> </tr>
    							</table>
    						</div>
    					</div>

            <!-- links contacto fabricante/vendedor -->
    					<div class="grid_2" id="links_contact_fabven">
    						<div style="padding: 1.5em 10px 1.5em 10px; text-align: center;">
                  <img style="padding-right: 10px;" src="<?=base_url()?>img/telefono.png" />
                  <input type="button" value="Llamar a la Empresa" id="numTel" onclick="VerOcultar_NumTel()" />
                </div>
    					</div>

            <!-- publicidad -->
              <div class="grid_2 " id="publi" style="display: none;">
    						<img src="<?=base_url()?>img/publi_long.png" />
    					</div>
			  	</div>

			  	<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			  	<!-- tabs: info producto / perfil empresa / otros productos empresa -->
  			  	<div class="grid_4" style="width: 1250px; height: auto;">
  				  	<table style="width: auto; margin-left: -11px; border-bottom: 1px dotted gray;"> <tr>
  				  		<!-- separador izquierda (1280) -->
  				  		<td id="table1">
  				  			<div style="border-top: 1px solid #ddd; margin-top: 2.1em;"> </div>
  				  		</td>
  				  		<!-- contenido "tabla" -->
  				  		<td style="width: auto;">
  				  			<div class="grid_2 " style="height: 373px; width: auto; margin-left: -11px; margin-top: -40px; background: transparent;">
  						  		<div style="padding: 10px 10px 10px 10px; height: 355px;">
  						  			<table style="width: 100%; height: 355px;">
  						  				<tr>
  						  					<td style="width: 823px; max-width: 865px; font-size: 13px; padding-top: 26px;">
  						  						<ul id="tabs">
  												   <li> <a href="#" title="tab1" style="border-left: 1px solid #ddd;">
  												   	Información del producto solicitado </a> </li>
  												   <!-- <li> <a href="#" title="tab2">
  												   	Otras solicitudes del comprador </a> </li> -->
  												   <li> <a href="#" title="tab3">
  												   	Perfil del comprador </a> </li>
  												</ul>
  												<div id="content">
  													<div id="tab1">
  														<div style="float: left;">
                                <p style="margin: 0; font-size: 14px; line-height: 1.5em;">
                                  <?php echo $descripcion; ?> </p>
  														</div>
  													</div>

  													<div id="tab2">
  														PESTAÑA 2
  													</div>

  													<div id="tab3">
  														<?php echo $empresa["descripcion"]; ?>
  													</div>
  												</div>
  						  					</td>
  						  					<td style="width: auto; vertical-align: middle;">
  						  						<!-- <p id="report">
  						  							<a href="#" style="color: grey;"> <img src="<?=base_url()?>img/icono_rsa.png" />
  						  							Reportar oferta sospechosa </a> </p> -->
<!--   						  						<div id="cuadropubli">
  						  							<div style="margin-top: 2.2em;">
                                <div style="text-align: center; border-left: 1px solid #f3f3f4;">
                                  <div style="font-size: 13px; padding-bottom: 3em;">
                                    <p style="padding-bottom: 1em;"> Compartir producto solicitado </p>
                                    <div>
                                      <a href="#" style="margin-right: 0.5em;">
                                        <img src="<?=base_url()?>img/logo_cartamensaje.png" /></a>
                                      <a href="#" style="margin-right: 0.5em;">
                                        <img src="<?=base_url()?>img/logo_twitter_2.png" /></a>
                                      <a href="#" style="margin-right: 0.5em;">
                                        <img src="<?=base_url()?>img/logo_face.png" /></a>
                                      <a href="#" style="margin-right: 0.5em;">
                                        <img src="<?=base_url()?>img/logo_plus_2.png" /></a>
                                      <a href="#" style="margin-right: 0.5em;">
                                        <img src="<?=base_url()?>img/logo_in.png" /></a>
                                    </div>
                                  </div>
                                  <div style="font-size: 15px; font-weight: bold;">
                                    <p style="padding-bottom: 1em;"> ¿Quiere conseguir más clientes? </p>
                                    <div>
                                      <a href="<?= $publicar_prod ?>">
                                        <img src="<?=base_url()?>img/boton_producto.png" /></a>
                                    </div>
                                  </div>
                                </div>
  						  							</div>
  						  						</div> -->
  						  					</td>
  						  				</tr>
  						  			</table>
  						  		</div>
  						  	</div>
  				  		</td>
  				  	</tr> </table>
  			  	</div>

			  	<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
			  	<!-- separador -->
				  <div class="grid_2" id="botonazul_ofcompra">
            <div>
            <p>¿Quiere conseguir mas clientes?</p>
            <p class="text-naranja">Publique un producto!</p>
            </div>
            <div>
              <a href="<?php echo base_url() ?>publicar_producto"> <img src="<?php echo img_url() ?>publicar-producto.jpg"></a>
            </div>
          </div>
        

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!-- quiero contactar al comprador - formulario -->
  				<div class="grid_2" id="qqap_form">
  					<table style="width: 100%; height: auto;"> <tr>
  						<!-- separador -->
  						<td id="separador">
  				  		<div style="border-top: 2px solid #ddd; margin-top: 39.7px;"> </div>
  				  	</td>
  				  	<!-- formulario -->
  						<td style="width: 687px; max-width: 687px;"> 
              <?php  
                echo form_open_multipart("oferta/contacto/".$this->uri->segment(3));
              ?>
  							<div class="grid_2 " style="margin-left: 0px; height: auto; width: 677px; background: transparent;">
  								<div style="font-size: 13px;"> <table style="width: 100%;">
  									<tr>
  										<td style="cursor: pointer;"> <div id="pseudotab">
  											<p style="vertical-align: middle; font-weight: bold; font-size: 15px">
  												Quiero contactar al comprador! </p>
  										</div> </td>
  									</tr>
  									<tr> <td> <div style="border-top: 2px solid #ddd; position: relative; z-index: 2; width: 677px;">
  										<table style="width: auto; border-spacing: 0px;">
  											<tr> <td colspan="3" style="padding-top: 32px;"> </td> </tr>
  											<tr>
  												<td style="line-height: 25px; height: 29px;" class="titulo">
  													<font color="red"> * </font> Nombre de quien envía el mensaje: </td>
  												<td class="subtitulo"> <input type="text" id="inputautormensaje" name="inputautormensaje" onclick="JavaScript:document.getElementById('popup_launch').click();" /> </td>
  											</tr>
  											<tr> <td style="padding-top: 10px;"> </td> </tr>
  											<tr>
  												<td style="line-height: 25px; height: 29px;" class="titulo">
  													<font color="red"> * </font> E-mail de quien envía el mensaje: </td>
  												<td class="subtitulo"> <input type="text" id="inputemailmensaje" name="inputemailmensaje" onclick="JavaScript:document.getElementById('popup_launch').click();" /> </td>
  											</tr>
  											<tr> <td style="padding-top: 10px;"> </td> </tr>
  											<tr>
  												<td style="line-height: 25px; height: 29px;" class="titulo">
  													<font color="red"> * </font> Teléfono de contacto: </td>
  												<td class="subtitulo"> <input type="text" id="inputtelefonomensaje"
                            name="inputtelefonomensaje" onclick="JavaScript:document.getElementById('popup_launch').click();"/> </td>
  											</tr>
  											<tr> <td style="padding-top: 10px;"> </td> </tr>
  											<tr>
  												<td class="titulo" style="height: 63px; line-height: 63px;"> Producto cotizado: </td>
  												<td class="subtitulo">
  													<table style="width: auto; margin-left: 0px;"> <tr>
  														<td style="width: 15%;">
                                <img src="<?php echo base_url()."uploads/resize".$imagenes[0]['nombre_img']; ?>"
                                  style="width: 75px;" /> </td>
  														<td style="width: 80%; vertical-align: middle; padding-left: 1em;">
                                <a href="#"> <?php echo $nom_producto; ?> </a> </td>
  													</tr> </table>
  												</td>
  											</tr>
  											<tr> <td style="padding-top: 10px;"> </td> </tr>
  											<tr>
  												<td class="titulo" style="margin-top: 0.8em;"> <font color="red"> * </font> Mensaje: </td>
  												<td class="subtitulo">
  													<p id="contador_textareamensaje"> 500 caracteres máximo </p>
                            <textarea rows="10" cols="50" id="textareamensaje" name="textareamensaje" onclick="JavaScript:document.getElementById('popup_launch').click();"
                              class="tooltip_comentarioform"
                              title="<b> Ingrese detalles de su cotización como: </b> <br> <br>
                                <ul style='list-style-type: disc; margin: 0; padding-left: 20px;'>
                                  <li> Información de quien envía la cotización. </li>
                                  <li> Especificaciones técnicas  de la cotización. </li>
                                  <li> Incluir información sobre precio, tiempo de entrega, forma de pago, etc."></textarea>
  												</td>
  											</tr>
  											<tr> <td style="margin-top: 0.8em;">
                        Adjuntar archivo
                        </td>
                        <td style="text-align: center;">
                          <?php 
                            echo form_upload('adjunto');
                           ?>  
                        </td> </tr>
  											<tr>
  												<td class="titulo"> </td>
  												<td style="text-align: center;">
  													<button onclick="JavaScript:document.getElementById('popup_launch').click();" style="border: 0; background: transparent; cursor: pointer;">
                              <img src="<?=base_url()?>img/botonenviarCOTI.png" /> </button>
  												</td>
  											</tr>
  										</table>
  									</div> </td> </tr>
  								</table> </div>
  							</div>
  						</form> </td>
  						<!-- informacion de la empresa -->
  						<td>
  							<div class="grid_2" style="border: 2px solid #e8e8e8; height: auto; width: 314px; margin: 10px 0px 0px -11px; background: white;">
  								<center> <div style="padding: 3px 5px 0px 5px; font-size: 13px; vertical-align: middle;">
                    <p style="clear: both; float: left; color: #00a2e8; font-size: 18px; font-weight: bold;">
                      <?php echo $empresa['nombre']; ?> </p>
                    <table style="clear: both; float: left; width: 100%; border-collapse: separate; border-spacing: 0.5em; margin-left: -0.5em; font-size: 12px;">
                      <tr> <td> <?php echo $empresa['descripcion']; ?> </td> </tr>
                      <tr>
                        <td> <div>
                          <img style="padding-right: 5px;" src="<?=base_url()?>img/contacto.png" />
                          <a href="<?php echo base_url() . "perfil/contacto_empresa/" . $empresa['nit'] ?>"
                            style="font-size: 14px;"> Información de Contacto </a>
                        </div> </td>
                      </tr>
                      <tr> <td style="text-transform: capitalize;"> <b style="color: black;">
                        Ubicación: </b>
                        <?php echo strtolower($empresa['ciudad'])." - ".strtolower($empresa['departamento']); ?> </td> </tr>
                      <tr> <td> <b style="color: black;">
                        Tipo de empresa: </b> <?php echo $empresa['tipo_empresa']['tipo']; ?> </td> </tr>
                      <tr> <td> <b style="color: black;">
                        Productos de interés: </b> <?php echo "aqui va texto"; ?> </td> </tr>
                      <tr> <td> <b style="color: black;">
                        Solicitudes publicadas: </b>
                        <a href="<?php echo base_url() . "perfil/ver_empresa/" . $empresa['nit'] ?>"
                        style="text-decoration: underline; color: blue;">
                        88 - Ver solicitudes </a> </td> </tr>
                    </table>
  								</div> </center>
  							</div>
  						</td>
  					</tr> </table>
  				</div>

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!-- Ofertas de compra similares -->
<!--   				<div class="grid_2" id="ofcompra_sim">
  					<div id="ofcompra_sim_DIV">
              <div style="font-size: 16px; padding-bottom: 31px;">
                <p style="display: inline;">
                  Otras solicitudes de producto relacionadas con
                  <p style="color: #ff7f27; display: inline; font-weight: bold;">
                    <?php echo $nom_producto; ?> </p>
                </p>
              </div>
              <div style="font-size: 14px;">
                <table id="tabla_solprored">
                  <tr>
                    <td> Productos solicitados </td>
                    <td> Precio máximo a pagar / Cantidad </td>
                    <td> Lugar de entrega </td>
                    <td> Contactar comprador </td>
                  </tr>
                  <tr>
                    <td colspan="5" style="border-bottom: 1px solid #ddd;"> </td>
                  </tr>
                  <tr>
                    <td style="color: blue;"> Se compra láminas de cobre de 5mm </td>
                    <td> $50.000 x 1.000 unidades </td>
                    <td> Bogotá Cundinamarca </td>
                    <td> <input type="button" value="Cotizar" id="btn_cotizar" /> </td>
                  </tr>
                  <tr>
                    <td style="color: blue;"> Se compra láminas de cobre de 5mm </td>
                    <td> $50.000 x 1.000 unidades </td>
                    <td> Bogotá Cundinamarca </td>
                    <td> <input type="button" value="Cotizar" id="btn_cotizar" /> </td>
                  </tr>
                </table>
              </div>
  					</div>
  				</div> -->

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!-- publicidad --><!-- 
  				<div class="grid_2" id="publi_publi">
  					<a href="#"> <img src="<?=base_url()?>img/publi_long.png" /> </a>
  				</div> -->

				<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
				<!-- footer -->
				<!-- <div class="grid_2 alpha" id="foo">
          <iframe src="<?=base_url()?>footer" scrolling="no" id="foo_iframe"> </iframe>
        </div> -->

		</div>
	</center>

  <!-- script para las validaciones con jquery -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#form_contactar_comprador").validate({
          //validar todo, este o no hidden
          ignore: "",
          //especificar reglas
          rules: {
            inputautormensaje: "required",
            inputemailmensaje: "required",
            inputtelefonomensaje: "required",
            textareamensaje: "required"
          },
          //especificar mensajes para esas reglas
          messages: {
            inputautormensaje: "Ingrese el nombre de la persona de contacto",
            inputemailmensaje: "Ingrese su e-mail",
            inputtelefonomensaje: "Ingrese un número celular o fijo al que quiere ser contactado",
            textareamensaje: "Ingrese su mensaje"
          },
          submitHandler: function(form) {
            form.submit();
          }
        });
      });
    </script>


<!-- funcionalidad de msj en popup -->
<?php 
  $id_producto = $this->uri->segment(3); 
  $reffer= "none";
  if($this->session->flashdata('reffer')) 
    { $reffer=$this->session->flashdata('reffer');  }
  ?>
 <script type="text/javascript">
     reffer= "<?=$reffer?>";
       document.onload= start();
       function start()
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/contactar/<?=$id_producto?>/2";
            var msj_enviado = "<?=$this->session->flashdata('mensaje_enviado')?>"=="DONE";
            if (msj_enviado)
            { url_popup="<?=base_url()?>popup/confirmar_mensaje"; }

            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);

            function show()
              {
                cotizar=document.getElementById('cotizar');
                console.log(popup.response);
                cotizar.innerHTML=popup.response;

                    if (msj_enviado)
                {   document.getElementById('confimacion_msj_enviado').click(); }
                else
                { 
                  error_login ="<?=$this->session->flashdata('session')?>";
                          mensaje = "<?=$this->session->flashdata('reffer')?>";
                          if(error_login!="Done"&&mensaje=="mensaje")
                          {
                            document.getElementById('#login').click();
                          }else
                          if(mensaje=="mensaje")
                          {
                    document.getElementById('btn_contactar').click();
                    <?=$this->session->set_flashdata('reffer',FALSE)?>
                  }               
                }           
              }
          }
  </script>
  <div id="cotizar">
    </div>

