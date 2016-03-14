 <!-- Brand and toggle get grouped for better mobile display -->

	    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/index/top_menu.css">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div id="content_general"  onload="launch();">
	    	<div id="sub_content_general" class="row">
	    		<div class="col-md-7">
	    			<div class="row hidden-xs hidden-sm">
						<p id="texto_bienvenido" style="padding-left:15px">Bienvenido al portal de intercambios comerciales de las empresas en Colombia!</p>
	    			</div>
	    		</div>
	    		<div class="col-xs-12 col-md-5 bor_botoom">
				    <ul class="list-inline pull-right">
				        <li class="active">
				            <?php if($id_usuario):?>
				                <a class="enlace_top" href="<?=base_url()?>logueo/logout">
				                    <span class="fa fa-sign-out"></span>
				                    Salir
				                </a>
				            <?php else: ?>
				                <a id="launch_login" class="enlace_top"  href="JavaScript:login(this,'tablero_usuario');"
				                class="enlace_top enlace_registro cursor-mano  hidden-xs hidden-sm visible-md visible-lg" style="color:#111;">
				                    <span class="ingresar_ico glyphicon glyphicon-user"></span>
				                    Ingresar
				                </a>
				            <?php endif; ?>
				        </li>
				        <li>
				            <?php if($id_usuario):?>
				                <a class="enlace_top  hidden-xs hidden-sm visible-md visible-lg" href="<?=base_url()?>tablero_usuario">
				                    <i class="fa fa-desktop"></i>
				                    Tablero de usuario
				                </a>                                      
				            <?php else: ?>
				                <a id="launch_registro" data-toggle="modal" href="JavaScript:launch(this);"
				                            class="enlace_top enlace_registro cursor-mano  hidden-xs hidden-sm visible-md visible-lg" style="color:#111;">
				                    <span class="fa fa-check"></span>
				                    Registro Gratis
				                </a>
				            <?php endif; ?>
				        </li>                               
				    </ul>
				</div>
	    	</div>
	    </div>
<script type="text/javascript">              
				   
                    <?php if($registro!=""):?>
                    launch(document.getElementById('launch_registro'));  
					//document.getElementById('launch_registro').click();
                    <?php endif;?>                     
                                   
   </script>
