<link href="<?php echo css_url().'oportunidad_comercial/oportunidad_comercial.css' ?>" rel="stylesheet">
<div class="col-md-12 oportunidad_comercial">
	<div class="col-md-3 contenedor_imagen">
		<div class="col-md-12 imagen">
			<div class="background_imagen">
				<div class="center-vertical_imagen">
					<?php if(count($solicitud->imagenes)>0):?>
						<a href="JavaScript:slider();" >
						 <!--<img id="display" src="<?=base_url()?>uploads/resize/Fileteadora_Industral_790.000_.jpg" class=" img_imagen img-responsive">-->
					<?php if(is_null($solicitud->imagenes[0])):?>
						 <img id="display" src="<?=base_url()?>uploads/resize/pagina_producto/visualizador/<?=$solicitud->imagenes[1]?>" class=" img_imagen img-responsive">
					<?php else:?>
						 <img id="display" src="<?=base_url()?>uploads/resize/pagina_producto/visualizador/<?=$solicitud->imagenes[0]?>" class=" img_imagen img-responsive">
					<?php endif;?>
						</a>
					<?php endif;?>
				</div>
			</div>
		</div>
		<!-- <div class="col-md-12 miniaturas"> -->
		<div class="col-md-12">
			<p class="texto_mini">Click para ver imagen más grande</p>
		</div>
		<div class="col-md-12">
			<?php if($solicitud->imagenes):?>
				<?php foreach($solicitud->imagenes as $key => $value):?>
				<?php if($value==""){continue;}?>						
					<div class="col-md-4 mini">
						<a href="JavaScript:mostrar_imagen('imagen_<?=$key?>')"><img  id="imagen_<?=$key?>" src="<?=base_url()?>uploads/resize/pagina_producto/miniatura/<?=$value?>" class="imag"></a>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
		<!-- </div> -->
	</div>
	<div class="col-md-6 contenedor_descripciones">
		<div class="col-md-12">
			<p class="nom_solicitud">Se requiere: <?=$solicitud->nombre ?></p>
		</div>
		<div class="col-md-12 content_solicitud">
			<!-- Muy bien, te das cuenta que si el contenedor tiene 12 y hay mas de uno 12 los siguientes divs se bajan. -->
		<?php if($solicitud->cantidad_requerida!=0):?>
			<div class="col-md-12">
				<div class="col-md-6 contenedor_descrip_solicitud">
						<p class="cantidad_requerida">Cantidad Requerida: </p>
				</div>
				<div class="col-md-6">
					<?php if($solicitud->medida): ?>					
						<p class="cantidad">
							<?=decimal_points($solicitud->cantidad_requerida);?> 
							<?=$solicitud->medida?>
						</p>
					<?php endif;?>
				</div>
			</div>
		<?php endif;?>
			<?php if($solicitud->precio_maximo): ?>
				<div class="col-md-12">
					<div class="col-md-6 contenedor_descrip_solicitud">					
							<p class="max_precio">Precio Máximo a Pagar: </p>						
					</div>
					<div class="col-md-6">
						<p class="precio_max"><span class="glyphicon glyphicon-usd icono_precio"></span><?php echo decimal_points($solicitud->precio_maximo)?> <span class="cant">x <?=decimal_points($solicitud->cantidad_requerida)." ".$solicitud->medida?></span></p>
					</div>
				</div>
			<?php else:?>			
				<div class="col-md-12">
					<div class="col-md-6 contenedor_descrip_solicitud">					
							<p class="max_precio">Precio Máximo a Pagar: </p>						
					</div>
					<div class="col-md-6">
						<p class="precio_max">A convenir <span class="cant">x <?=decimal_points($solicitud->cantidad_requerida)." ".$solicitud->medida?></span></p>
					</div>
				</div>
			<?php endif;?>
			<div class="col-md-12">
				<?php if($solicitud->formas_de_pago): ?>
					<div class="col-md-6 contenedor_descrip_solicitud">					
						<p class="forma_pago">Forma de Pago: </p>
					</div>
						<div class="col-md-6">
							<p class="tipo_pago">
								<?=$solicitud->formas_de_pago?>
							</p>
						</div>
				<? endif;?>
			</div>
			<div class="col-md-12">
				<?php if($solicitud->ciudad_entrega):?>
					<div class="col-md-5 contenedor_descrip_solicitud">
						<p class="lugar_entrega">Lugar de Entrega: </p>
					</div>
					<div class="col-md-7">
						<p class="sitio"><?=$solicitud->ciudad_entrega?><?php if($solicitud->departamento_entrega){echo "-".$solicitud->departamento_entrega;}?></p>
					</div>
				<?php endif;?>
			</div>
			<div class="col-md-12">
				<?php if($solicitud->fecha_publicacion):?>
					<div class="col-md-6 contenedor_descrip_solicitud">
						<p class="fecha_publi">Fecha de Publicación: </p>
					</div>
					<div class="col-md-6">
						<p class="fecha_p"><?=$solicitud->fecha_publicacion?></p>
					</div>
				<?php endif;?>
			</div>
		</div>
		<div class="col-md-12 contenedor_botones1">
			<div class="col-md-6 contactar" data-toggle="modal" id='popup_launch' data-target="#popup_mensajes">
				<a  rol="button" href="JavaScript:;" class="contacto"><i class="fa fa-envelope sobre"></i> Contactar Comprador</a>
			</div>
			<!-- <div class="col-md-6 chatear">
				<a href="#" class="chat"><span class="glyphicon glyphicon-comment globo" aria-hidden="true"></span> Chatear Ahora!</a>
			</div> -->
		</div>
	</div>
	<div class="col-md-3 contenedor_empresa">
		<div class="col-md-12 nombre_empresa">
			<p class="nom_empresa"><a href="<?=base_url()?>perfil/perfil_empresa/<?=$empresa->id?>"><?=$empresa->nombre?></p>
			<div class="col-md-12">
				<div class="row">
				<?php echo @$div_membresia ?>
				</div>
			</div>
		</div>
		<div class="col-md-12 info_contacto">
			<p class="info"><i class="fa fa-newspaper-o carnet"></i> <a href="<?=base_url()?>perfil/contacto_empresa/<?=$empresa->id?>">Información de Contacto</a></p>
			<?php if($solicitud->ciudad_entrega):?>
				<p class="ubicacion">Ubicación: 
					<span class="ubica"><?=$solicitud->ciudad_entrega?><?php if($solicitud->departamento_entrega){echo "-".$solicitud->departamento_entrega;}?></span></p>
			<? endif;?>
			<?php if($empresa->tipo):?>
				<p class="tipo_empresa">Tipo de Empresa: <span class="tipo"><?=$empresa->tipo?></span></p>
			<? endif;?>
		</div>
		<div class="col-md-12 contenedor_catalogo">
			<p class="catalogo"><span class="glyphicon glyphicon-th ico_catalogo"></span>Ver Catálogo -<a href="<?=base_url()?>/perfil/ver_empresa/<?=$empresa->id?>" class="productos">  <?=$numero_productos?> - productos</a></p>
			<p class="catalogo"><span class="glyphicon glyphicon-list-alt ico_solicitados"></span>Productos Solicitados -<a href="<?=base_url()?>perfil/productos_solicitados/<?=$empresa->id?>" class="productos"> <?=$numero_ofertas?> - Solicitudes</a></p>
		</div>
		<div class="col-md-12 llamada">
			<div class="col-md-2">
				<i class="fa fa-phone ico_llamar"></i>
			</div>
			<script type="text/javascript">
				telefono_visible=true;
				function mostrar_telefonos()
				{
					data = "";
					telefono_visible=!telefono_visible;
					if(!telefono_visible)
					{
						data = "<center>Estos datos no estan disponibles</center>";
					 <? if($usuario->celular):?>
						data ="<P><center>Celular: ";  
						data+="<?=$usuario->celular?>";
					 <?php endif;?>
					 <? if($usuario->telefono):?>
						data+="<BR>Oficina: ";   
						data+="<?=$usuario->telefono?></center></P>";
					 <?php endif;?>
					}
					document.getElementById('numero_empresa').innerHTML=data;
				}
			</script>
			<div class="col-md-9 boton_llamada">
				<a href="JavaScript:mostrar_telefonos();" class="llamar" > Llamar a la Empresa</a>
				<div  id="numero_empresa" style="background-color:#FFFFFF;">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 contenedor_tabs">
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs pestanas" role="tablist">
		    <li role="presentation" class="active tab_width" >
		    	<a href="#descripcion" aria-controls="home" role="tab" data-toggle="tab">
		    	Descripción de la Solicitud
		    	</a>
		    </li>
		    <li role="presentation" class="tab_width">
		    	<a href="#perfil" aria-controls="perfil" role="tab" data-toggle="tab">
		    		Perfil de la Empresa
		    	</a>
		    </li>
		   <!--
		    <li role="presentation" class="tab_width">
		    	<a href="#otras_solicitudes" aria-controls="otras_solicitudes" role="tab" data-toggle="tab">
		    		Otras Solicitudes de la Empresa
		    	</a>
		    </li>
			-->
		</ul>
		  <!-- Tab info -->
	<div class="tab-content content_pestanas">
		<div role="tabpanel" class="col-md-12 tab-pane active" id="descripcion">
		   	<div class="col-md-8">
		    	<p class="texto">
					<?=$solicitud->descripcion?>		    			
		    	</p>
		    </div>
		    <div class="col-md-4">

		    </div>
		</div>
		<div role="tabpanel" class="tab-pane" id="perfil">
			<div class="col-md-8">
		    	<p class="texto2">
					<?=$empresa->descripcion;?>		    			
		    	</p>
		    </div>
		    <div class="col-md-4">

		    </div>
		</div>
		<div role="tabpanel" class="tab-pane" id="otras_solicitudes">
		    otras
		</div>
	</div>
	<div class="col-md-12 contenedor_publica_producto">
		<div class="col-md-3 col-md-offset-3 publicar_prod">
			<p class="clientes">¿Quiere conseguir más clientes?</p>
			<p class="publicar">¡Publique sus productos gratis!</p>
		</div>
		<div class="col-md-2 contenedor_publicar">
			<a href="#"><img src="<?=base_url()?>assets/img/index/btn_publicar_producto.png"></a>
			<!-- <a href="#"><img src=" <?php echo img_url() ?>publicar-solicitud.png"></a> -->
			
		</div>
	</div>
	</div>
</div>
<div class="col-md-12 contenedor_botones">
	<div class="col-md-5 col-md-offset-1 contactar" data-toggle="modal" id='popup_launch' data-target="#popup">
		<a href="JavaScript:;" class="contacto"><i class="fa fa-envelope sobre"></i> Contactar Comprador</a>
	</div>
	<!-- <div class="col-md-5 col-md-offset-1 chatear">
		<a href="#" class="chat"><span class="glyphicon glyphicon-comment globo" aria-hidden="true"></span> Chatear Ahora!</a>
	</div> -->
</div>

<!-- Servicio de galeria de imagenes -->
 <a id="slider_launch" data-toggle="modal" data-target="#popup_slider"></a>
<div id="slider" >
 </div>
 <script type="text/javascript">
 slider_cargado=false;
         function slider()
         {
           	imagen = document.getElementById('display').src;
            if(slider_cargado)  
            {
           		document.getElementById('pantalla').src=imagen;          	
                document.getElementById('slider_launch').click(); 
                return;
            }
            imagen=imagen.substring(imagen.length,imagen.lastIndexOf("/")+1);
	        var popup=new XMLHttpRequest();
	        var url_popup="<?=base_url()?>popup/slider/"+imagen;
	        popup.open("GET", url_popup, true);
	        popup.addEventListener('load',insert,false);
	        popup.send(null);

            function insert()
              {
           		slider_div=document.getElementById('slider');
                slider_div.innerHTML=popup.response; 
	            slider_cargado=true;
                document.getElementById('display').click(); 
              }
          }
          actual_imagen=0;
          total_imagenes=<?=count($imagenes)?>;
           //document.onload= proxima_imagen();
          function mostrar_imagen(id)
		  {
			src=document.getElementById(id).src;
			document.getElementById('display').src=src;
		  }
          function anterior_imagen()
          {            
            actual_imagen--;
            if(actual_imagen<=0)
              {actual_imagen=total_imagenes;}
            src=document.getElementById("imagen_"+actual_imagen).src;
            document.getElementById('pantalla').src=src;
          }
          function proxima_imagen()
          {              
            actual_imagen++;
            if(actual_imagen>=total_imagenes)
              {actual_imagen=0;}
            src=document.getElementById("imagen_"+actual_imagen).src;
            document.getElementById('pantalla').src=src;
          }
 </script>

<!-- funcionalidad de msj en popup -->
<?php  
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
            var url_popup="<?=base_url()?>mensajes/lanzar_popup/2";
            var msj_enviado = "<?=$this->session->flashdata('mensaje_enviado')?>"=="DONE";
            if (msj_enviado)
            { url_popup="<?=base_url()?>popup/confirmar_mensaje"; }

            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);

            function show()
              {
                cotizar=document.getElementById('cotizar');
               // console.log(popup.response);
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
                document.getElementById('id_objeto').value="<?=$solicitud->id?>" ;     
              }
          }         
  </script>
  <div id="cotizar">
    </div>

