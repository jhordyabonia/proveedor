<head>

	<link rel="stylesheet" type="text/css" href="<?php echo css_url(); ?>administrar_ofertas.css">
	<script>
  jQuery(document).ready(function($) {
        $("#publicar_oferta").addClass('active');
    });
</script>
</head>


		<!-- Contenedor Central -->
	<div class="container-fluid">
		
			<!-- row -->
			<div class="row">

				<div class="row">
	
					<div class="col-xs-4 col-xs-push-2" style="margin-left: 20px;">
						<h2>Administrar mis solicitudes de producto</h2>
					</div>
					
					<div class="col-xs-3 col-xs-push-4 h31">
						<h3>Solicitudes de producto 
						<b style="color: #ff7e00;"> <?=$solicitudes_cantidad?></b>
						</h3> 
						 
					</div>
					
					<div class="col-xs-1 col-xs-push-4 h31" style="margin-left: -45px;">
						<img src="<?php echo img_url(); ?>administrar_productos/icono_prod_publicados.png">
					</div>
			
				</div>

				<!-- columna vacia para dejar espacio de botones -->
			<div class="col-sm-2" style="margin-top: -100px;">
			    
			    <!-- div boton Publicar productos -->
			
			  <div class="col-xs-3 col-xs-push-2 col-sm-12 col-sm-push-0 text-center btn1 " 
			     onclick="location.href='<?= base_url() ?>publicar_oferta';" 
			     style="cursor:pointer;">
			     <img src="<?php echo img_url(); ?>Tablero_usuario/Publicar_Producto.png" 
			    class="img-responsive img_btn1">
			    <h4>Publicar Solicitud</h4>
			  </div>

			

			<!-- div boton Administrar mis productos -->
			
			    <div class="col-xs-3 col-xs-push-4 col-sm-12 col-sm-push-0 text-center btn2 ">
			      <img src="<?php echo img_url(); ?>Tablero_usuario/Ediccion_de_producto.png" 
			      class="img-responsive img_btn1">
			      <h4>Administrar Solicitudes</h4>
			    </div>		

			</div>  

				

				<!-- columna de tamaño 10 para la tabla un espacio -->
				<div class="col-xs-10 col-xs-push-0 table-responsive ">
					<table class="table table-bordered table-hover ">
						<thead>
							<tr>
								<th style="text-align: center;">Solicitud</th>
								<th style="text-align: center;">Imagenes</th>
				                <th class="hidden-xs" style="text-align: center;">Fecha de Publicacion</th>
				                <th style="text-align: center;">Editar</th>
				                <th style="text-align: center;">Eliminar</th>
							</tr>
						</thead>
							<tbody>
							 <?php if ($solicitudes):  ?>
							 <?php foreach ($solicitudes as $solicitud):  ?>
									<tr>
										
										<td width="20%" > 
										 <a href="<?= base_url(); ?>oportunidad_comercial/ver/<?=$solicitud->id?>" >
											<h5  style="margin: 15% 10% ;">
												<?=$solicitud->nombre?> </td>
											</h5>
										 </a>
										<td width="20%" > 
										 <a href="<?= base_url(); ?>oportunidad_comercial/ver/<?=$solicitud->id?>" >
											<div class="center-block" style="height: 120px; width: 120px; /* border-style: solid; *"/>
												<img src="<?= base_url() ?>uploads/resize/<?=$solicitud->nombre_img?>" 
												class="img-responsive center-block" style="/* margin: auto auto; */ height: 85%;"/> 
												<!--<img src="<?= base_url() ?>uploads/resize/<?=$oferta->nombre_img?>" width="80px" height="118px"/> -->
											</div>
										</td>
											</a>
										<td width="20%" > 
											<h5 style="margin: 20% 30%;">
												<?= $solicitud->fecha_publicacion ?>  </td>	
											</h5>
										<td width="15%" > 
											<a href="<?= base_url()?>oferta_test/editar/<?=$solicitud->id?>"> 
												<span class="glyphicon glyphicon-pencil" style="font-size: 30px; margin: 20% 40%;"> 
												</span> 
											</a> 
										</td>
										
										<td width="15%"> 
											<a href="JavaScript:confirmar_eliminar(<?=$solicitud->id?>)">  
												<span class="glyphicon glyphicon-trash" style="font-size: 30px; margin: 20% 40%;"> 
												</span> 
											</a> 
										</td>

									</tr>
									<?php endforeach; ?>   
									<?php else:?>
									No ha publicado aún    
								<?php endif;?>
							</tbody>
					</table> 
				</div>

		</div><!-- Fin row tabla de ofertas -->
	</div><!-- Fin Container-fluid -->

<script type="text/javascript">

       function confirmar_eliminar(id)
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/eliminar_solicitud/"+id;
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                popup_eliminar=document.getElementById('popup_eliminar');
                popup_eliminar.innerHTML=popup.response;
                console.log(popup.response);
                document.getElementById('launch_popup_eliminar').click();
              }
       }
  </script>
  <div data-toggle="modal" data-target="#eliminar_solicitud" id="launch_popup_eliminar">
    </div>
  <div id="popup_eliminar">
    </div>
