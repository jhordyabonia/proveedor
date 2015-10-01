<br>
<br>
<br>
<br>
<link rel="stylesheet" href="<?php echo css_url() ?>perfil_empresa/header.css">
	<div class="col-md-12">
		<div class="row">
			<!-- Div contenedor del header menu-->
			<div class="col-md-12" id="content_menu">
				<div class="row">
					<!-- div del logo-->
					<div class="col-md-2">
						<div class="row">
							<div class="col-md-12">
							</div>
						</div>
					</div>
					<!-- div del texto de registro y ingreso-->
					<div class="col-xs-12 col-md-3">
						<div class="row"  id="content_general_text">
							<div class="col-xs-5 col-md-5 line-right">
								<div class="row">
									<div class="col-xs-3 col-md-3">
									</div>
									<div class="col-xs-9 col-md-9">
									</div>
								</div>
							</div>
							<div class="col-xs-7 col-md-7">
								<div class="row">
									<div class="col-xs-3 col-md-3">
									</div>
									<div class="col-xs-9 col-md-9">
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
			
		</div>
	</div>




	<div class="row">
		<!-- Div de pestañas -->
		<div class="col-md-15" id="contenedor_pesta">
			<div class="row">
				<div class="col-md-2 tab_active"><a href="<?=base_url()?>micro_admin/inicio">Inicio</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/empresas">Empresas</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/productos">Productos</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/solicitudes_internas">Solicitudes Internas</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/solicitudes_externas">Solicitudes Externas</a></div>
				<div class="col-md-2 tab_inactive"><a href="<?=base_url()?>micro_admin/mensajes">Mensajes</a></div>
				
			</div>
		</div>
		<!-- div que contiene el titulo, foto y membresia -->
		<!--  contenedor central -->
		<div class="col-md-12">
		  <div class="row">

	        <!-- columna de tamaño 9 para la tabla un espacio -->
	        <div class="col-xs-10 col-xs-push-0 table-responsive " >
	         <CENTER>
	         	<a href="<?=base_url()?>micro_admin/test_envio/1/1/667"><h3>Editor de plantillas</h3></a>
	         	<a href="<?=base_url()?>popup_categoria/crear"><h3>Crear capturador de oportunidades</h3></a>
	         	<a href="<?=base_url()?>micro_admin/busquedas_frecuentes"><h3>Terminos de busqueda frecuentes</h3></a>
	          <table class="table table-bordered table-hover ">
	            <thead>

	              <tr>
	                <th style="text-align: center;">Objeto/item</th>
	                <th style="text-align: center;">Numero total<br>de registros</th>
	                <th style="text-align: center;">Numero de registros <br>ultimo dia</th>
	                <th style="text-align: center;">Numero de registros <br>Ultima semana</th>
	                <th style="text-align: center;">Numero de registros <br>ultimo mes</th>
	              </tr>
	            </thead>
	              <tbody>  
	                <?php foreach ($datos as $key => $dato):  ?>
	                  <tr>	                    
	                    <td width="20%" >                   
	                         <?=$key?>
	                      </td> 
	                    <td width="20%" >                   
	                         <?=$dato->total_registros?>
	                      </td>
	                    <td width="20%" >                   
	                         <?=$dato->total_dia?>
	                      </td>
	                    <td width="20%" >                   
	                         <?=$dato->total_semana?>
	                      </td>
	                    <td width="20%" > 
	                        <?=$dato->total_mes?>
	                    </td>
	                  </tr>
	                  <?php endforeach; ?>                
	              </tbody>
	          </table>
	         </CENTER>
	        </div>

			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/catologo_productos.css">