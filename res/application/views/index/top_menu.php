 <!-- Brand and toggle get grouped for better mobile display -->
	    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/index/top_menu.css">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div id="content_general"  onload="launch();">
	    	<div id="sub_content_general" class="row">
	    		<div class="col-md-7">
	    			<div class="row hidden-xs hidden-sm">
						<p id="texto_bienvenido" style="padding:">Bienvenido al portal de intercambios comerciales de las empresas en Colombia!</p>
	    			</div>
	    		</div>
	    		<div class="col-xs-12 col-md-5 bor_botoom">
	    			<div class="row">
						<ul class="list-inline contenedor_gral">
							<li class="active">
								<ul class="list-inline contenedor_top">
									<?php if($id_usuario):?>
										<a class="enlace_top" href="<?=base_url()?>logueo/logout">
											<li><span class="ingresar_ico glyphicon glyphicon-user"></span></li>
											<li>Salir</li>
										</a>
									<?php else: ?>
										<li><span class="ingresar_ico glyphicon glyphicon-user"></span></li>
										<li><a id="launch_login" class="enlace_top"  href="JavaScript:login(this,'tablero_usuario');"
											class="enlace_top enlace_registro cursor-mano  hidden-xs hidden-sm visible-md visible-lg" style="color:#111;">Ingresar</a></li>
									<?php endif; ?>
								</ul>
							</li>
							<li>
								<ul class="list-inline contenedor_top hidden-xs hidden-sm visible-md visible-lg">
									<li><img src="<?php echo base_url()?>assets/img/index/registro.png"  style="width: 23px;margin-left: -12px;"></li>
									<?php if($id_usuario):?>
										<li><a class="enlace_top  hidden-xs hidden-sm visible-md visible-lg" href="<?=base_url()?>tablero_usuario">Tablero de usuario</a></li>										
									<?php else: ?>
										<li>
											<a id="launch_registro" data-toggle="modal" href="JavaScript:launch(this);"
											class="enlace_top enlace_registro cursor-mano  hidden-xs hidden-sm visible-md visible-lg" style="color:#111;">
												Registro Gratis
											</a>
										</li>								
									<?php endif; ?>
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
<script type="text/javascript">              
				   
                    <?php if($registro):?>  
					document.getElementById('launch_registro').click();
                    <?php endif;?>                     
                                   
   </script>
