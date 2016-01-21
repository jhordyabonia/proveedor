<script language=JavaScript>
<!--

function disabletext(e){
return false
}

function reEnable(){
return true
}

//if the browser is IE4+
document.onselectstart=new Function ("return false")

//if the browser is NS6
if (window.sidebar){
document.onmousedown=disabletext
document.onclick=reEnable
}

function inhabilitar(){
    alert ("Esta informacion pertenece a Proveedor.com.co, para uso exclusivo de empresas platino.");
    return false;
}
 
function agregar(obj)
{
	console.log(obj);
  	if(obj.checked)
    { alert(obj.value);	}
}      

document.oncontextmenu=inhabilitar

// --><!--Funcionalidad de mensajes-->
     reffer= "<?=$reffer?>";
       //document.onload= start(0);
       function start(id_objeto)
	       {
		       	var popup=new XMLHttpRequest();
		       	if(id_objeto<0)
		       	{	var url_popup="<?=base_url()?>mensajes/lanzar_popup/5";	}
		       else
		       	{	var url_popup="<?=base_url()?>mensajes/lanzar_popup/4";	}

				var msj_enviado = "<?=$this->session->flashdata('mensaje_enviado')?>"=="DONE";
				if (msj_enviado)
				{	url_popup="<?=base_url()?>popup/confirmar_mensaje";	}

				popup.open("GET", url_popup, true);
				popup.addEventListener('load',show,false);
				popup.send(null);

				function show()
					{
						cotizar=document.getElementById('cotizar');
						console.log(popup.response);
						cotizar.innerHTML=popup.response;

	       				if (msj_enviado)
						{  	document.getElementById('confimacion_msj_enviado').click();	}
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
						if(id_objeto<0)
						{
							document.getElementById('id_objeto').value=document.getElementById('destinatarios').value;
						}else
						{
							document.getElementById('id_objeto').value=id_objeto ;
						}
						document.getElementById('btn_contactar').click();
					}
					//login();
			} 
  </script>
<link rel="stylesheet" href="<?php echo css_url() ?>/solicitudes_tablero_usuario.css">
		
<div class="col-md-12 contenedor_oportunidades">
	<div class="col-md-8 contenedor_titulos">
		<p class="titulo_oportunidades">Oportunidades para su Negocio</p>
		<!-- <p class="nombre_categoria"><?=$categoria->nombre_categoria?></p> -->
		<div class="col-md-12 contenedor_select_categoria">
			<select onchange="JavaScript:location.href='<?=base_url()?>tablero_usuario/oportunidades/'+this.value;" class="select_categorias">
				<?php if($categoria->id_categoria==41||$categoria->id_categoria==6):?>
				<?php else:?>
					<option value="<?=$categoria->id_categoria?>" class="item_select_categoria"><?=$categoria->nombre_categoria?></option>
				<?php endif;?>
				<option value="41" class="item_select_categoria" <?php if($categoria->id_categoria==41){echo "selected";}?> >Seguridad Industrial, Calzado y Dotación</option>
				<option value="6" class="item_select_categoria" <?php if($categoria->id_categoria==6){echo "selected";}?> >Calzado</option>
				<optgroup label=""></optgroup>
				<?php foreach ($categorias as $key => $value):?>
				<option value="<?=$value->id_categoria?>" class="item_select_categoria"><?=$value->nombre_categoria?></option>
				<?php endforeach;?>
			</select>
		</div>
		<div class="col-md-4 nuevas_oportunidades">
			<b>Nuevas Oportunidades</b>
 			<span class="badge"><?=$numero_nuevas?></span>
		</div>
	</div>
	<div class="col-md-4">
		<p class="total_oportunidades">Total Oportunidades Comerciales</p>
		<p class="numero_oportunidades"><?=$total_oportunidades?></p> 
		<div class="contactar" >
			<form action="<?=base_url()?>popup/envio_multiple/" method="post" name="envio">
				<input type="hidden" id="destinatarios" name="destinatarios" value="">
				<?php if($empresa->membresia==3):?>		                     	
					<a  href="JavaScript:start(-1);"  rol="button" class="contacto"><i class="fa fa-envelope sobre"></i> Enviar Múltiples Cotizaciones</a>
	            <?php else:?>		                     	
					<a data-toggle="modal" data-target="#popup_info"rol="button" class="contacto"><i class="fa fa-envelope sobre"></i> Enviar Múltiples Cotizaciones</a>
	            <?php endif;?>
				<!--<a  href="JavaScript:envio.submit();"  rol="button" class="contacto"><i class="fa fa-envelope sobre"></i> Enviar Multiples Cotizaciones</a>-->
			</form>
		</div>
		<p class="texto_oportunidades">Seleccione varias oportunidades, y envíe una cotización</p>
	</div>
</div>
<div class="col-md-12 tabla_oportunidades">				
	         
	          <table class="table table-bordered table-hover col-xs-2 table-responsive">
	            <thead>
	              <tr>								
	                <th class="centrado titulo"></th>
	                <th class="centrado titulo">Fecha</th>
	                <th class="centrado titulo">Producto y/o Servicio requerido</th>
	                <th class="centrado titulo">Descripción</th>
	                <th class="centrado titulo">Información del pedido</th>
	                <th class="centrado titulo">Información del contacto</th>
	                <th class="centrado titulo">Enviar</th>
	              </tr>
	            </thead>
	              <tbody>  
	                <?php foreach ($datos as $dato):  ?>
	                  <tr>
	                    <td width="2%" class="centrado">
	                    	<input type="checkbox" name="<?=$dato->id?>" onchange="JavaScript:destinatarios=document.getElementById('destinatarios');if(this.checked){destinatarios.value+=','+this.name}else{destinatarios.value=destinatarios.value.replace(','+this.name,'')}console.log(destinatarios.value);"/>
	                    </td>    
	                    <td width="7%" class="centrado">
	                    	<!--<img  src="<?=base_url()?>uploads/resize/logos/<?=$dato->logo?>"/>-->
	                         <p class="fecha_solicitud"><?=$dato->fecha?><br></p>
	                    </td>    
	                    <th width="20%" class="dato1">                 
	                         <p class="titulo_solicitud"><?=$dato->solicitud?></p> 
	                     </td>    
	                    <td width="20%" class="dato1">   
	                        <p class="descripcion_solicitud"><?=$dato->descripcion?></p>
	                        <?php if($dato->adjunto):?>
		                        <a href="<?=base_url()?>uploads/resize/adjunto/<?=$dato->adjunto?>">
		                        	Descargar adjunto <?=$dato->adjunto?>
		                        </a>
	                    	<?php endif;?>
	                      </td> 
	                    <td width="23%" > 
	                    	<table>
		                        <tr><th class="label_dato2">Cantidad requerida: <th class="dato"> <?=$dato->cantidad_requerida?>
		                        <tr><th class="label_dato2">Precio a pagar: <th class="dato"> <?=$dato->precio?>
		                    	<tr><th class="label_dato2">Forma de pago: <th class="dato"> <?=$dato->forma_de_pago?>
		                    	<tr><th class="label_dato2">Ciudad de entrega: <th class="dato"> <?=$dato->ciudad_entrega?>
		                    </table>
	                    </td>                      
	                    <td width="20%" class="centrado"> 
	                    	<?php if($empresa->membresia==3):?>
	                    	<table>
		                     	<tr><th class="label_dato">Nombre:<th class="dato"> <?=$dato->nombres?>
		                     	<tr><th class="label_dato">Email:<th class="dato"> <?=$dato->email?>
		                     	<tr><th class="label_dato">Empresa:<th class="dato"> <?=$dato->nombre_empresa?>
		                     	<tr><th class="label_dato">Teléfono:<th class="dato"> <?=$dato->telefono?>
		                     	<tr><th class="label_dato">Tipo:<th class="dato"> 
	                     	</table>
		                    <?php else:?>
		                   <!-- <img src="<?=base_url()?>uploads/resize/ver_mas.jpg">-->
		                   	<div class="col-md-12 contenedor_tabla_estandar">
		                   		<div class="col-md-4 contenedor_estandar">
		                   			<table>
		                   				<tr><th class="label_dato">Nombre:
		                     			<tr><th class="label_dato">Email:
		                     			<tr><th class="label_dato">Empresa:		                     	
		                     			<tr><th class="label_dato">Teléfono:
		                     			<tr><th class="label_dato">Tipo:
		                     		</table>
		                   		</div>
		                   		<div class="col-md-8 contenedor_estandar_2">
		                   			<button class="btn btn-primary ver_contacto" data-toggle="modal" data-target="#popup_info"><span class="fa fa-phone telefono"></span>Ver Contacto</button>
		                   		</div>
		                   	</div>
	                     	
		                 	<?php endif;?>
	                    </td>
	                     <td width="5%" class="centrado"> 
	                    	<?php if($empresa->membresia==3):?>
		                     	<a href="JavaScript:start(<?=$dato->id?>)" >
		                     	<i class="fa fa-envelope sobre"></i><br>							
		                     		Enviar Cotización</a>
	                    	<?php else:?>
		                     	<a data-toggle="modal" data-target="#popup_info" >
	                    			<i class="fa fa-envelope sobre"></i><br>							
		                     		Enviar Cotización</a>
	                    	<?php endif;?>
	                     <!--	<a target="other" href="<?=base_url()?>micro_admin/enviar_a_platino/<?=$dato->id?>" >Enviar Cotización</a>-->
	                    </td>
	                  </tr>	
	                  <?php endforeach; ?>     
                             
	              </tbody>
	          </table>
	         </CENTER>
</div>
<div class="modal" id="popup_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
    <div class="modal-dialog">
        <div class="modal-content modal-content-two">
            <div class="modal-header header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
        	<div class="modal-body contenido_popup">
            	<p class="contenedor_candado"><span class="glyphicon glyphicon-lock ico_candado"></span></p>
            	<p class="contenido_exclusivo">Contenido exclusivo para</p>
            	<p class="empresas_platino">Empresas Platino</p>
            	<div class="background_img col-md-push-4">
            		
					<div class="center-vertical_img">
						<img src="http://proveedor.com.co/assets/img/membresia/logo_mem_platino.png" class="img-responsive img_platino">
					</div>
				</div>
            	<button class="btn btn-primary btn_acceder" onclick="JavaScript:location.href='http://clientes.proveedor.com.co/';">ACCEDER AHORA!</button>
        	</div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil_empresa/catologo_productos.css">


  <div id='btn_contactar' data-toggle="modal" data-target="#popup_mensajes"></div>
  <div id="cotizar">
    </div>