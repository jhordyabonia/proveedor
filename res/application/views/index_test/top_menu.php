 <!-- Brand and toggle get grouped for better mobile display -->
	    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/index/top_menu.css">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="col-md-12" id="content_general">
	    	<div class="row">
	    		<div class="col-md-7">
	    			<div class="row hidden-xs">
						<p id="texto_bienvenido">Bienvenido al portal de intercambios comerciales de las empresas en Colombia!</p>
	    			</div>
	    		</div>
	    		<div class="col-xs-12 col-md-5">
	    			<div class="row">
						<ul class="list-inline contenedor_gral">
							<li class="active">
								<ul class="list-inline contenedor_top">
									<li><span class="ingresar_ico glyphicon glyphicon-user"></span></li>
									<? if($id_usuario):?>
										<li><a class="enlace_top" href="<?=base_url()?>logueo/logout">Salir</a></li>
									<? else: ?>
										<li><a class="enlace_top" href="<?=base_url()?>logueo">Ingresar</a></li>
									<? endif; ?>
								</ul>
							</li>
							<li>
								<ul class="list-inline contenedor_top">
									<li><img src="<?php echo base_url()?>assets/img/index/registro.png"  style="width: 23px;"></li>
									<? if($id_usuario):?>
										<li><a class="enlace_top" href="<?=base_url()?>tablero_usuario">Tablero de usuario</a></li>										
									<? else: ?>
										<li><a class="enlace_top" href="<?=base_url()?>registro/registrar">Registro Gratis</a></li>									
									<? endif; ?>
								</ul>
							</li>
							<!--
							<li>
								<ul class="list-inline" style="border-right: 2px solid #D9D9D9;height: 23px;">
									<li><img src="<?php echo base_url()?>assets/img/index/contacto.png"  style="width: 29px;"></li>
									<li><p style="color:black; font-size:12px; margin-right: 10px;">Contactos</p></li>
								</ul>
							</li>
							<li>
								<ul class="list-inline" style="border-right: 2px solid #D9D9D9;height: 23px;">
									<li></li>
									<li><p style="color:black; font-size:12px; margin-right: 22px;">Ayuda</p></li>
								</ul>
							</li>
						-->
						</ul>
				</div>
	    		</div>
	    		
	    	</div>
	    </div>