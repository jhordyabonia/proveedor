<link rel="stylesheet" type="text/css" href="<?php echo css_url()?>/new_tablero_usuario/new_tablero_usuario.css">
<!--<link rel="stylesheet" type="text/css" href="<?php echo css_url()?>listado.css">-->
<div class="contenedor_tablero">
	<div class="col-md-12 contenedor_botones">
		<div class="col-md-4">
			<div class="col-md-12 contenedor_empresa">
				<div class="col-md-3 contenedor_logo">
					<!-- REEMPLAZAR IMAGEN ESTÁTICA POR IMAGEN LLAMADA CON VARIABLE -->
					<?php if($empresa->logo):?>
						<img class="img-responsive img_logo_empresa" src="<?=base_url()?>uploads/logos/<?=$empresa->logo?>">				</div>
					<?php else:?>
						<img class="img-responsive img_logo_empresa" src="<?=base_url()?>uploads/logos/default.jpg">				</div>
					<?php endif;?>
				<div class="col-md-6 titulo_empresa">
					<p class="nombre_empresa">
						<a href="<?=base_url()?>perfil/ver_empresa/<?=$empresa->id?>" 
							class="nom_empresa link_tablero_usuario">
							<?=$empresa->nombre?>
						</a>
					</p>
					<!-- aquí colocar condición if para el titulo de membresía -->
						<p class="titulo_membresia"><?=$nombre_membresia?></p>
					<!-- <p class="titulo_membresia">Empresa Platino</p> -->

				</div>
				<!-- aquí colocar condición if para el logo de membresía -->
				<div class="col-md-3 img_membresia">					
					<?php if($nombre_membresia=="Empresa Platino"):?> 
						<img src="<?=base_url()?>assets/img/membresia/logo_mem_platino.png" class="membresia">
					<?php elseif($nombre_membresia=="Empresa Oro"):?> 
						<img src="<?=base_url()?>assets/img/membresia/logo_mem_oro.png" class="membresia">
					<?php else:?> 
						<img src="<?=base_url()?>assets/img/membresia/logo_mem_estandar.png" class="membresia">
					<?php endif;?>
				</div>
				<!-- <div class="col-md-3 img_membresia">
					<img src="http://proveedor.com.co/assets/img/membresia/logo_mem_platino.png" class="membresia">
				</div> -->
				<!-- SOLO MOSTRAR SI SE TIENE MEMBRESIA ESTANDAR -->
				<div class="col-md-12 actualizar_membresia">
					<?php if($nombre_membresia!="Empresa Platino"):?> 
					<!--
					<a href="http://clientes.proveedor.com.co/#precio" class="link_tablero_usuario">
						<p class="texto_actualizar">
								<span class="glyphicon glyphicon-circle-arrow-up"></span> 
								ACTUALIZAR A PLATINO  
						</p>
					</a>-->
					<?php elseif($administrador):?>
					<a href="micro_admin" class="link_tablero_usuario">
						<p class="texto_actualizar">
								<span class="glyphicon glyphicon-circle-arrow-up"></span> 
								Micro Admin 
						</p>
					</a>
					<?php endif;?>
				</div>
				<!-- FIN CONTENIDO PARA MOSTRAR EN MEMBRESÍA ESTANDAR -->
			</div>
		</div>
		<div class="col-md-4 contenedor_servicio">
			<!-- DESHABILITAR CONTENIDO CUANDO CARGUE MEMBRESÍA PLATINO, SIMPLEMENTE DEJAR CONTENEDOR CON COLOR, BORDES Y SOMBRA,
				 YA ESTÁ DISEÑADO DE ESTE MODO -->
			<div class="col-md-12 obtener_servicio">
				<div class="col-md-1 contenedor_icono_pulgar">
					<span class="glyphicon glyphicon-thumbs-up ico_pulgar"></span>
				</div>
				<div class="col-md-11 contenedor_texto_servicio">
					<?php if($nombre_membresia!="Empresa Platino"):?>
					<p class="texto_obtener_membresia"> 
						MEMBRESÍA PLATINO<br>
							Adquiera el servicio de Oportunidades Comerciales para su Empresa!</p>
					<a href="<?=base_url()?>" class="link_tablero_usuario"><p class="texto_mas_informacion">Más Información</p></a>
				 	<?php endif;?></div>
			</div>
			<!-- FIN CONTENIDO PARA DESHABILITAR EN MEMBRESÍA PLATINO -->
		</div>
		<div class="col-md-4 contenedor_obtener_membresia">
			<div class="col-md-12 obtener_membresia">
				<!-- DESHABILITAR CONTENIDO CUANDO CARGUE MEMBRESÍA PLATINO, SIMPLEMENTE DEJAR CONTENEDOR CON COLOR, BORDES Y SOMBRA,
				 YA ESTÁ DISEÑADO DE ESTE MODO -->
				<div class="col-md-1 contenedor_icono_estrella">
					<span class="glyphicon glyphicon-star ico_estrella"></span>
				</div>
				<?php if($nombre_membresia!="Empresa Platino"):?> 
				<div class="col-md-11 contenedor_texto_obtener_membresia">
						<p class="texto_obtener_membresia">VERIFICAR EMPRESA<br> Incremente el Número de clientes ahora verificando su empresa!</p>
				</div>
				<a href="http://www.blog.proveedor.com.co/como-funciona-proveedor-com-co-ayuda/" class="link_tablero_usuario"><p class="texto_mas_informacion">Más Información</p></a>
				<?php endif;?>
				<!-- FIN CONTENIDO PARA DESHABILITAR EN MEMBRESÍA PLATINO -->
			</div>
		</div>
		<div class="col-md-4 botones_publicar_solicitar">
			<div class="col-md-6 publicar">
				<div class="col-md-12 btn_publicar">
					<a href="<?=base_url()?>publicar_producto" class="link_tablero_usuario">
						<p class="centrar_icono"><span class="glyphicon glyphicon-chevron-up ico_chevron"></span></p>
						<p class="centrar_icono"><span class="glyphicon glyphicon-stop ico_stop"></span></p>
						<p class="publicar_producto"> PUBLICAR PRODUCTOS</p>
					</a>
				</div>
			</div>
			<div class="col-md-6 solicitar">
				<div class="col-md-12 btn_solicitar">
					<a href="<?=base_url()?>publicar_oferta" class="link_tablero_usuario">
						<p class="centrar_icono"><span class="glyphicon glyphicon-file ico_file"></span></p>
						<p class="solicitar_producto"> SOLICITAR COTIZACIÓN</p>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 botones_mensajes_oportunidades_comerciales">
			<div class="col-md-12 oportunidades_comerciales">
				<div class="col-md-12 btn_oport_comerciales">
					<div class="col-md-9">
						<a href="<?=base_url()?>tablero_usuario/oportunidades" class="link_tablero_usuario">
							<span class="glyphicon glyphicon-ok ico_check"></span>
							<p class="texto_oport_comerciales"> OPORTUNIDADES</p>
							<p class="texto_oport_comerciales2"> para su negocio</p>
						</a>
					</div>
					<div class="col-md-3">
						<p class="num_total">
							<!-- añadir variable total oportunidades -->
							<?=$oportunidades['total_oportunidades']?>
						</p>
						<p class="texto_total">
							TOTAL
						</p>
						<p class="num_nuevos">
							<!-- añadir variable nuevas oportunidades -->
							<?=$oportunidades['numero_nuevas']?>
						</p>
						<p class="texto_nuevos">
							NUEVAS
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-12 mensajes">
				<div class="col-md-12 btn_mensajes">
					<div class="col-md-9">
						<a href="<?=base_url()?>mensajes" class="link_tablero_usuario">
							<i class="fa fa-envelope ico_sobre"></i>
							<p class="texto_mensajes"> MENSAJES</p>
						</a>
					</div>
					<div class="col-md-3">
						<p class="num_total_mensajes">
							<!-- añadir variable total mensajes -->
							<?php echo $count_msj2 ?>
						</p>
						<p class="texto_total">
							TOTAL
						</p>
						<p class="num_nuevos_mensajes">
							<!-- añadir variable nuevos mensajes -->
							<?php echo $count_msj ?>
						</p>
						<p class="texto_nuevos">
							NUEVOS
						</p>
					</div>
				</div>
			</div>
			
		</div>
		<div class="col-md-4 botones_anunciar_pagina_empresa">
			<div class="col-md-12 anunciar_pagina_empresa">
				<div class="col-md-6 anunciar">
					<div class="col-md-12 btn_anunciar">
						<a href="<?=base_url()?>config_empresa/inicio/"  class="link_tablero_usuario">
							<p class="centrar_icono marg-top"><i class="fa fa-laptop sty-ico-confi"></i> <i class="fa fa-cog sty-ico-confi"></i></p>
							<p class="texto_pagina_empresa">Configurar página de Empresa</p>
						</a>
						<!--<a href="<?=base_url()?>" class="link_tablero_usuario"><p class="texto_mas_informacion_anunciar">Más Información</p></a>-->
					</div>
				</div>
				<div class="col-md-6 pagina_empresa">
					<div class="col-md-12 btn_pagina_empresa">
						<a href="<?=base_url()?>perfil/ver_empresa/<?=$empresa->id?>" class="link_tablero_usuario">
							<p class="centrar_icono"><i class="fa fa-laptop ico_portatil"></i></p>
							<p class="texto_pagina_empresa">Visitar Página de Empresa</p>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-12 productos_publicados_cotizaciones">
				<div class="col-md-6 productos_publicados">
					<div class="col-md-12 btn_productos_publicados">
						<a href="<?=base_url()?>producto/administrar" class="link_tablero_usuario">
							<span class="glyphicon glyphicon-list ico_productos_publicados"></span>
							<p class="texto_prod_publicados">Productos Publicados 
								  <!-- dentro del span añadir contador de productos publicados -->
								<span class="numero_prod_publicados">
									<?php echo $count_productos ?>
								</span> 
							</p>
						</a>
					</div>
				</div>
				<div class="col-md-6 cotizaciones">
					<div class="col-md-12 btn_cotizaciones">
						<a href="<?=base_url()?>oferta_test/administrar" class="link_tablero_usuario">
							<span class="glyphicon glyphicon-file ico_cotizaciones"></span>
							<p class="texto_cotizaciones">Solicitudes Publicadas
								<!-- dentro del span añadir contador de cotizaciones -->
								<span class="numero_cotizaciones">
									<?php echo $count_ofertas ?>
								</span> 
							</p>
						</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
       document.onload=ready();
       function ready()
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/registro_completo/";
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                ready=document.getElementById('ready');
                ready.innerHTML=popup.response;
                console.log(popup.response);
                first_into="<?=$this->session->flashdata('registro_completo')?>";
                if(first_into=='DONE')
                {
               	  console.log("click");
                  document.getElementById('launch_popup_ready').click();
                }
              }
       }
  </script>
  <div data-toggle="modal" data-target="registro_completo" id="launch_popup_ready">
    </div>
  <div id="ready" onload="JavaScript:ready();">
    </div>
   