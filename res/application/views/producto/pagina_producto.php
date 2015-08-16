<link href="<?php echo css_url().'pagina_producto.css' ?>" rel="stylesheet">
<!-- ruta del producto -->
<!--
<div class="col-md-12 grid_1" id="ho">
	<p style="font-size: 12px">
		<?php echo $this->breadcrumb->output(); ?>
	</p>
</div>
-->
</div><div class="col-md-12 pagina_producto">
	<div class="col-md-3 contenedor_imagen">
		<div class="col-md-12 imagen">
			<div class="background_imagen">
				<div class="center-vertical_imagen">
					<?php if($producto->imagenes):?>
						<a href="JavaScript:slider();" >
							 <!--<img src="<?=base_url()?>uploads/Fileteadora_Industral_790.000_.jpg" class=" img_imagen img-responsive">-->
							 <img id="display" src="<?=base_url()?>uploads/<?=$producto->imagenes[0]?>" class=" img_imagen img-responsive"> 
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
			<?php if($producto->imagenes):?>
				<?php foreach($producto->imagenes as $key => $value):?>
					<div class="col-md-4 mini">
						<a href="JavaScript:mostrar_imagen('imagen_<?=$key?>')"><img  id="imagen_<?=$key?>" src="<?=base_url()?>uploads/<?=$value?>" class="imag"></a>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
		<!-- </div> -->
	</div>
	<div class="col-md-6 contenedor_descripciones">
		<div class="col-md-12">
			<p class="nom_producto"><?=$producto->nombre ?></p>
		</div>
		<div class="col-md-12 content_producto">
			<div class="col-md-12">
				<?php if ($producto->precio_unidad): ?>
					<div class="col-md-6 contenedor_descrip_producto">
						<p class="precio">Precio: </p>
					</div>
					<div class="col-md-6">
						<p class="valor">
							<?php if(decimal_points($producto->precio_unidad)!="A convenir"):?>
								<span class="glyphicon glyphicon-usd icono_precio"></span>
							<?php endif;?>
							 <?=decimal_points($producto->precio_unidad);?><span class="slash">/</span><span class="unidad"> <?php if($producto->medida){ echo $producto->medida;}?></span></p>
						<img src="<?php echo img_url()?>sonrisaprecio.png" class="sonrisa_precio img-responsive">
					</div>
				<?php endif;?>
			</div>
			<div class="col-md-12">
				<?php if($producto->pedido_minimo&&$producto->medida):?>
					<div class="col-md-6 contenedor_descrip_producto">
						<p class="pedido_min">Pedido Mínimo: </p>
					</div>
					<div class="col-md-6">
						<p class="cant_unidades"><?=$producto->pedido_minimo?> 
							<?php if($producto->medida){echo $producto->medida;}?>
						</p>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-md-12">
				<!--
					<?php if($tiempo_entrega):?>
						<div class="col-md-6 contenedor_descrip_producto">
							<p class="tiempo_entrega">Tiempo de Entrega: </p>
						</div>
						<div class="col-md-6">
							<p class="valor_entrega"><?=$tiempo_entrega?></p>
						</div>
					<?php endif;?>
				-->
			</div>
			<div class="col-md-12">
				<!--
					<?php if ($capacidad_sum):?>
						<div class="col-md-6 contenedor_descrip_producto">
							<p class="capacidad_sum">Capacidad de Suministro: </p>
						</div>
						<div class="col-md-6">
							<p class="cantidad_capacidad"><?=$capacidad_sum?></p>
						</div>
					<?php endif;?>
				-->
			</div>
			<div class="col-md-12">
				<?php if($producto->formas_de_pago):?>
					<div class="col-md-6 contenedor_descrip_producto">
						<p class="forma_pago">Forma de Pago: </p>
					</div>
					<div class="col-md-6">
						<p class="tipo_pago">
							<?=$producto->formas_de_pago?>
						</p>
					</div>
				<?php endif;?>
			</div>
			<div class="col-md-12">
				<?php if($usuario->departamento): ?>
					<div class="col-md-5 contenedor_descrip_producto">
						<p class="lugar_entrega">Ubicación: </p>
					</div>
					<div class="col-md-7">
						<p class="sitio"><?=$usuario->ciudad."-".$usuario->departamento?></p>
					</div>
				<?php endif;?>
			</div>
			<div class="col-md-12">
				<?php if ($producto->estado):?>
					<div class="col-md-6 contenedor_descrip_producto">
						<p class="estado">Estado: </p>
					</div>
					<div class="col-md-6">
						<p class="valor_estado"><?=$producto->estado?></p>
					</div>
				<?php endif;?>
			</div>
		</div>
		<div class="col-md-12 contenedor_botones1">
			<div class="col-md-6 contactar" data-toggle="modal" id='popup_launch' data-target="#popup">
				<a hhref="JavaScript:;" class="contacto"><i class="fa fa-envelope sobre"></i> Contactar Proveedor</a>
			</div>
			<!-- <div class="col-md-6 chatear">
				<a href="#" class="chat"><span class="glyphicon glyphicon-comment globo" aria-hidden="true"></span> Chatear Ahora!</a>
			</div> -->
		</div>
	</div>
	<div class="col-md-3 contenedor_empresa">
		<div class="col-md-12 nombre_empresa">
			<p class="nom_empresa"><a href="<?=base_url()?>/perfil/ver_empresa/<?=$empresa->id?>"><?=$empresa->nombre?></p></a>
			<div class="col-md-12">
				<div class="row">
				<?php echo @$div_membresia ?>
				</div>
			</div>
		</div>
		<div class="col-md-12 info_contacto">
			<p class="info"><a href="<?=base_url()?>/perfil/contacto_empresa/<?=$empresa->id?>"><i class="fa fa-newspaper-o carnet"></i> Información de Contacto</a></p>
			<?php if($usuario->telefono): ?>
				<p class="ubicacion">Ubicación: <span class="ubica"><?=$usuario->ciudad."-".$usuario->departamento?></span></p>
			<?php endif;?>
			<?php if($empresa->tipo):?>
				<p class="tipo_empresa">Tipo de Empresa: <span class="tipo"><?=$empresa->tipo?></span></p>
			<?php endif;?>
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
						data = "Estos datos no estan disponibles";
					 <? if($usuario->celular):?>
						data ="<P><BR>Celular: ";  
						data+="<?=$usuario->celular?>";
					 <?php endif;?>
					 <? if($usuario->numero):?>
						data+="<BR>Oficina: ";   
						data+="<?=$usuario->indicativo?> <?=$usuario->numero?></P>";
					 <?php endif;?>
					}
					document.getElementById('numero_empresa').innerHTML=data;
				}
			</script>
			<div class="col-md-9 boton_llamada">
				<a href="JavaScript:mostrar_telefonos();" class="llamar"> Llamar a la Empresa</a>
				<br>
				<div id="numero_empresa">
					</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 contenedor_tabs_prod">
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs pestanas" role="tablist">
		   	<li role="presentation" class="active tab_width" >
		    	<a href="#descripcion" aria-controls="home" role="tab" data-toggle="tab">
		    		Descripción del producto
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
		    <div role="tabpanel" class="tab-pane active" id="descripcion">
		    	<div class="col-md-8">
		    		<p class="texto">
		    			<?=$producto->descripcion?>	
					</p>
		    	</div>
		    	<div class="col-md-4">
		    	</div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="perfil">
		    	<div class="col-md-8">
		    		<p class="texto">
		    			<?=$empresa->descripcion?>
					</p>
		    	</div>
		    	<div class="col-md-4">
		    		
		    	</div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="otras_solicitudes">
		    	otras
		    </div>
		</div>
		<div class="col-md-12 contenedor_publica_producto_prod">
			<div class="col-md-3 col-md-offset-3 publicar_prod">
				<p class="clientes">¿No es el producto que estaba buscando?</p>
				<p class="publicar">¡Publique el producto que requiere gratis!</p>
		</div>
		<div class="col-md-2 contenedor_publicar">
			<a href="#"><img src="<?=base_url()?>assets/img/index/btn_solicitar_producto.png"></a>
			<!-- <a href="#"><img src=" <?php echo img_url() ?>publicar-solicitud.png"></a> -->
		</div>
		</div>
	</div>
</div>
<div class="col-md-12 contenedor_botones_prod">
	<div class="col-md-5 col-md-offset-1 contactar" data-toggle="modal" id='popup_launch' data-target="#popup">
		<a href="JavaScript:;" class="contacto"><i class="fa fa-envelope sobre"></i> Contactar Proveedor</a>
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
          total_imagenes=1;
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
<div id="cotizar">
 </div>
<?php  
  $reffer= "none";
  $id_producto = $this->uri->segment(3);		
  if($this->session->flashdata('reffer')) 
    { $reffer=$this->session->flashdata('reffer');  }
  ?>
 <script type="text/javascript">
       reffer= "<?=$reffer?>";
       document.onload= start();
       function start()
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/contactar/<?=$id_producto?>/1";
            var msj_enviado = "<?=$this->session->flashdata('mensaje_enviado')?>"=="DONE";
            if (msj_enviado)
            { url_popup="<?=base_url()?>popup/confirmar_mensaje"; }

            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);

            function show()
              {
                cotizar=document.getElementById('cotizar');
                //console.log(popup.response);
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

