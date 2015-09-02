 <!-- Brand and toggle get grouped for better mobile display -->
	    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/index/top_menu.css">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div id="content_general"  onload="launch();">
	    	<div id="sub_content_general" class="row">
	    		<div class="col-md-7">
	    			<div class="row hidden-xs hidden-sm">
						<p id="texto_bienvenido">Bienvenido al portal de intercambios comerciales de las empresas en Colombia!</p>
	    			</div>
	    		</div>
	    		<div class="col-xs-12 col-md-5 bor_botoom">
	    			<div class="row">
						<ul class="list-inline contenedor_gral">
							<li class="active">
								<ul class="list-inline contenedor_top">
									<? if($id_usuario):?>
										<a class="enlace_top" href="<?=base_url()?>logueo/logout">
											<li><span class="ingresar_ico glyphicon glyphicon-user"></span></li>
											<li>Salir</li>
										</a>
									<? else: ?>
										<li><span class="ingresar_ico glyphicon glyphicon-user"></span></li>
										<li><a class="enlace_top" href="<?=base_url()?>logueo">Ingresar</a></li>
									<? endif; ?>
								</ul>
							</li>
							<li>
								<ul class="list-inline contenedor_top hidden-xs hidden-sm visible-md visible-lg">
									<li><img src="<?php echo base_url()?>assets/img/index/registro.png"  style="width: 23px;margin-left: -12px;"></li>
									<? if($id_usuario):?>
										<li><a class="enlace_top  hidden-xs hidden-sm visible-md visible-lg" href="<?=base_url()?>tablero_usuario">Tablero de usuario</a></li>										
									<? else: ?>
										<li>
											<a id="launch_registro" data-toggle="modal" href="JavaScript:launch();"
											class="enlace_top enlace_registro cursor-mano  hidden-xs hidden-sm visible-md visible-lg" style="color:#111;">
												Registro Gratis
											</a>
										</li>								
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
<script type="text/javascript">                    
                    //window.onload=launch();
                    function launch()
                    {
                        var popup=new XMLHttpRequest();
                        
                        var url_popup="<?=base_url()?>registro/registrar/<?=$paso?>/<?=$id_registro?>/1";	
                        //alert(url_popup);                        		
                        popup.open("GET", url_popup, true);
                        popup.addEventListener('load',show,false);
                        popup.send(null);
                        function show()
                          {
                            div=document.getElementById('registro');
                            div.innerHTML=popup.response;
                            document.getElementById('popup_launch').click();
                            console.log(popup.response);
                          }
                    }   
                    <?php if($registro):?>  
					document.getElementById('launch_registro').click();
                    <?php endif;?>  
                                   
   </script>
<div id="registro" ></div>
