<link rel="stylesheet" type="text/css" href="<?php echo css_url()?>listado.css">
<link rel="stylesheet" type="text/css" href="<?php echo css_url()?>banner_publicidad.css">


<div class="elemento" bgcolor="gray" style="background:#F7F7F7;"  width="100%" height="100%">
	<!--<div class="temp_error" style="background: #fff !important;padding: 28%;"></div>-->
	<!-- Columna categorias -->
<div class="col-md-12 color_fondo">
	<div class="col-md-2 categorias">
		<?php echo $div_categorias ?>
	</div>

	<!-- Columna info ppal-->
	<div class="col-md-10 contenedor_tabs">
		<div role="tabpanel">

		  <!-- Nav tabs -->
		  <?php 

		  	$controlador = $this->uri->segment(1); #controlador
		  	$metodo = $this->uri->segment(2); #metodo
		  	$arg1 = $this->uri->segment(3); #arg1
			$arg2 = $this->uri->segment(4); #arg2

		  	$_div_productos = "tab-pane active";
			$_div_solicitudes = "tab-pane fade";
		  	$_div_proveedores = "tab-pane fade";
			$active_div_productos = "active tab_width";
			$active_div_solicitudes = "";
			
			$active_div_proveedores = "";
		  	if($div=="solicitudes")
		  		{
				  	$_div_proveedores = "tab-pane fade";		  	
				  	$_div_solicitudes = "tab-pane active";				  	
				  	$_div_productos = "tab-pane fade";
				  	$active_div_productos = "";
					$active_div_solicitudes = "active";
					$active_div_proveedores = "";
		  		}else if($div=="proveedores")
		  		{
				  	$_div_proveedores = "tab-pane active";		  	
				  	$_div_solicitudes = "tab-pane fade";				  	
				  	$_div_productos = "tab-pane fade";
				  	$active_div_productos = "";
					$active_div_solicitudes = "";
					$active_div_proveedores = "active";
		  		}
		  	?>
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="<?=$active_div_productos?>" >
		    	<a href="#productos" onclick="JavaScript:cambiar_seo('productos')" aria-controls="home" role="tab" data-toggle="tab">
		    		Productos <span class="badge"><?=$page_count*25?></span>
		    	</a>
		    </li>
		    <li role="presentation" class="<?=$active_div_solicitudes?>">
		    	<a href="#solicitudes" onclick="JavaScript:cambiar_seo('solicitudes')" aria-controls="solicitudes" role="tab" data-toggle="tab">
		    		Compradores <span class="badge"><?=$page_count3*25?></span>
		    	</a>
		    </li>
		    <li role="presentation" class="<?=$active_div_proveedores?>">
		    	<a href="#proveedores" onclick="JavaScript:cambiar_seo('proveedores')" aria-controls="proveedores" role="tab" data-toggle="tab">
		    		Proveedores <span class="badge"><?=$page_count2*25?></span>
		    	</a>
		    </li>
		  </ul>

		  <!-- Tab info -->
		  <div class="tab-content">
		    <div role="tabpanel" class="<?=$_div_productos?>" id="productos">
		    	<div class="row">
					<div class="contenedor_banner hidden-xs col-md-12 col-lg-12 col-xs-12 col-sm-12" style="padding-left: 0px; padding-right: 15px;">
						<div class="banner_publicidad">
							<script type="text/javascript">broadstreet.zone(45614);</script> 
						</div>
					</div>
				</div>
		    	<?php if($div_productos)
			    	{
			    		foreach ($div_productos as $key => $value) 
			    		{			    				
			    			echo $value; 			    			
			    		}
			    	}else echo  '<H3 align="left">La búsqueda "<b>'.$nom_producto.'</b>" no ha coincidido con ningún producto</H3>';
		    	?>		
		    								<style type="text/css">
			    								.pagina_actual  
			    								{
			    									background-color: lightgray !important;
			    									color: white !important;
			    								}
		    								</style>
		    	    							<center>
													<nav>
													  <ul class="pagination">
														<? if($page>0): ?>
															<li><a href="<?=base_url().$controlador.'/'.$metodo.'/'.$arg1?>/productos/<?=$page-1;?>/<?=$filtro?>/<?=$tipo_filtro?>">&laquo; Anterior </a></li>
														<?php endif; ?>
														<? for($i=0;$i<$page_count;$i++): ?>
															<li <?php if($page==$i){echo "class='pagina_actual'";}?>>
																<?php if($page==$i):?>
																	<span class="pagina_actual"><?=$i+1?></span>
																<?php else: ?>
																	<a href="<?=base_url().$controlador.'/'.$metodo.'/'.$arg1?>/productos/<?=$i?>/<?=$filtro?>/<?=$tipo_filtro?>"><?=$i+1?></a>
																<?php endif;?>
															</li>
														<?endfor;?>
														<? if($page<intval($page_count)): ?>
															<li><a href="<?=base_url().$controlador.'/'.$metodo.'/'.$arg1?>/productos/<?=$page+1?>/<?=$filtro?>/<?=$tipo_filtro?>">Siguiente &raquo;</a></li>
													  	<?php endif; ?>
													  </ul>
													</nav>
												</center>
		    </div>
		    <div role="tabpanel" class="<?=$_div_proveedores?>" id="proveedores">
		    	<div class="row">
					<div class="contenedor_banner hidden-xs col-md-12 col-lg-12 col-xs-12 col-sm-12" style="padding-left: 0px; padding-right: 15px;">
						<div class="banner_publicidad">
							<script type="text/javascript">broadstreet.zone(45614);</script> 
						</div>
					</div>
				</div>
		    	<?php if($div_empresas)
			    	{
			    		foreach ($div_empresas as $key => $value) 
			    			{
			    				echo $value;
			    			}
			    	}else echo '<H3 align="left">La búsqueda "<b>'.$nom_producto.'</b>" no ha coincidido con ningúna empresa</H3>';
		    	?>					
		    									<center>
													<nav>
													  <ul class="pagination">
														<? if($page>0): ?>
															<li><a href="<?=base_url().$controlador.'/'.$metodo.'/'.$arg1?>/proveedores/<?=$page-1;?>/<?=$filtro?>/<?=$tipo_filtro?>">&laquo; Anterior </a></li>
														<?php endif; ?>
														<? for($i=0;$i<$page_count2;$i++): ?>
															<li>
																<?php if($page==$i):?>
																	<span class="pagina_actual"><?=$i+1?></span>
																<?php else: ?>
																	<a href="<?=base_url().$controlador.'/'.$metodo.'/'.$arg1?>/proveedores/<?=$i?>/<?=$filtro?>/<?=$tipo_filtro?>"><?=$i+1?></a>
																<?php endif;?>	
															</li>
														<?endfor;?>
														<? if($page<intval($page_count2)): ?>
															<li><a href="<?=base_url().$controlador.'/'.$metodo.'/'.$arg1?>/proveedores/<?=$page+1?>/<?=$filtro?>/<?=$tipo_filtro?>">Siguiente &raquo;</a></li>
													  	<?php endif; ?>
													  </ul>
													</nav>
												</center>
		    </div>
		    <div role="tabpanel" class="<?=$_div_solicitudes?>" id="solicitudes">
		    	<div class="row">
					<div class="contenedor_banner hidden-xs col-md-12 col-lg-12 col-xs-12 col-sm-12" style="padding-left: 0px; padding-right: 15px;">
						<div class="banner_publicidad">
							<script type="text/javascript">broadstreet.zone(45614);</script> 
						</div>
					</div>
				</div>

				<?php if($div_solicitudes)
			    	{
			    		foreach ($div_solicitudes as $key => $value) 
			    			{			    				
			    				echo $value; 
			    			}
			    	}else  echo '<H3 align="left">La búsqueda "<b>'.$nom_producto.'</b>" no ha coincidido con ningúna solicitud</H3>';
		    	?>
		    								<center>
													<nav>
													  <ul class="pagination">
														<? if($page>0): ?>
															<li><a href="<?=base_url().$controlador.'/'.$metodo.'/'.$arg1?>/solicitudes/<?=$page-1;?>/<?=$filtro?>/<?=$tipo_filtro?>">&laquo; Anterior </a></li>
														<?php endif; ?>
														<? for($i=0;$i<$page_count3;$i++): ?>
															<li>
															<?php if($page==$i):?>
																<span class="pagina_actual"><?=$i+1?></span>
															<?php else: ?>
																<a href="<?=base_url().$controlador.'/'.$metodo.'/'.$arg1?>/solicitudes/<?=$i?>/<?=$filtro?>/<?=$tipo_filtro?>"><?=$i+1?></a>
															<?php endif;?>
															</li>
														<?endfor;?>
														<? if($page<intval($page_count3)): ?>
															<li><a href="<?=base_url().$controlador.'/'.$metodo.'/'.$arg1?>/solicitudes/<?=$page+1?>/<?=$filtro?>/<?=$tipo_filtro?>">Siguiente &raquo;</a></li>
													  	<?php endif; ?>
													  </ul>
													</nav>
												</center>	
		    </div>
		  </div>

		</div>
			</div>

</div>
</div>

<?php  
  $reffer= "none";		
  if($this->session->flashdata('reffer')) 
    { $reffer=$this->session->flashdata('reffer');  }
  ?>
<script type="text/javascript">
     reffer= "<?=$reffer?>";
       function start(id,tipo)
         {         	
            cotizar=document.getElementById('cotizar');
            cotizar.innerHTML="";

         	if(id!=0&&tipo!=0)
          	{  var url_popup="<?=base_url()?>mensajes/lanzar_popup/"+tipo;	}
          	else
          	{
	            var msj_enviado = "<?=$this->session->flashdata('mensaje_enviado')?>"=="DONE";
	            if (msj_enviado)
	            { url_popup="<?=base_url()?>popup/confirmar_mensaje"; }
	        	else{return;}
	    	}

            var popup=new XMLHttpRequest();

            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);

            function show()
              {
                cotizar=document.getElementById('cotizar');
                console.log(popup.response);
                cotizar.innerHTML=popup.response;
		        document.getElementById('id_objeto').value=id;
		        document.getElementById('btn_contactar').click();          

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
  <a id='btn_contactar' data-toggle="modal" data-target="#popup_mensajes"></a>
  <div id="cotizar">
    </div>