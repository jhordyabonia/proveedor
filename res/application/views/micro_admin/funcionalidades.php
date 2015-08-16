
<script type="text/javascript">
       document.onload= start(0,0);
       function start(id,tipo)
         {

         	if(id!=0&&tipo!=0)
          	{  var url_popup="<?=base_url()?>popup/contactar/"+id+"/"+tipo;	}
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

		        document.getElementById('btn_contactar').click();          
              }
          }     

       function confirmar_eliminar_solicitud(id)
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
       function confirmar_publicar(id)
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/confirmar_publicar/"+id;
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                popup_eliminar=document.getElementById('popup_eliminar');
                popup_eliminar.innerHTML=popup.response;
                console.log(popup.response);
                document.getElementById('launch_popup_publicar').click();
              }
         }          
       function confirmar_eliminar_producto(id)
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/eliminar_producto/"+id;
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                popup_eliminar=document.getElementById('popup_eliminar');
                popup_eliminar.innerHTML=popup.response;
                console.log(popup.response);
                document.getElementById('launch_popup_eliminar_producto').click();
              }
       } 
       function confirmar_eliminar_empresa(nit)
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/eliminar_producto/"+nit;
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

function editar(id)
{
  if(document.getElementById(id).innerHTML=="Guardar")
  {

    document.getElementById(""+id+"nombre").disabled=true;
    document.getElementById(""+id+"descripcion").disabled=true;
    document.getElementById(""+id+"pago").disabled=true;
    document.getElementById(""+id+"nombres").disabled=true;
    document.getElementById(""+id+"nombre_empresa").disabled=true;
    document.getElementById(""+id+"ciudad").disabled=true;
    document.getElementById(""+id+"email").disabled=true;
    document.getElementById(""+id+"telefono").disabled=true;
    document.getElementById(""+id+"cantidad").disabled=true;
    document.getElementById(""+id+"precio").disabled=true;

    document.getElementById(id).innerHTML="Editar";

    document.getElementById('solicitud').value=document.getElementById(""+id+"nombre").value;
    document.getElementById('descripcion').value=document.getElementById(""+id+"descripcion").value;
    document.getElementById('pago').value=document.getElementById(""+id+"pago").value;
    document.getElementById('nombres').value=document.getElementById(""+id+"nombres").value;
    document.getElementById('nombre_empresa').value=document.getElementById(""+id+"nombre_empresa").value;
    document.getElementById('ciudad').value=document.getElementById(""+id+"ciudad").value;
    document.getElementById('email').value=document.getElementById(""+id+"email").value;
    document.getElementById('telefono').value=document.getElementById(""+id+"telefono").value;
    document.getElementById('cantidad_requerida').value=document.getElementById(""+id+"cantidad").value;
    document.getElementById('precio').value=document.getElementById(""+id+"precio").value;
    document.getElementById('id_solictud').value=id;

    document.getElementById('form').submit();
    return;
  }

  document.getElementById(""+id+"nombre").disabled=false;
  document.getElementById(""+id+"descripcion").disabled=false;
  document.getElementById(""+id+"pago").disabled=false;
  document.getElementById(""+id+"nombres").disabled=false;
  document.getElementById(""+id+"nombre_empresa").disabled=false;
  document.getElementById(""+id+"ciudad").disabled=false;
  document.getElementById(""+id+"email").disabled=false;
  document.getElementById(""+id+"telefono").disabled=false;
  document.getElementById(""+id+"cantidad").disabled=false;
  document.getElementById(""+id+"precio").disabled=false;
  document.getElementById(id).innerHTML="Guardar";  
}
</script>
  <div id='btn_contactar' data-toggle="modal" data-target="#popup"></div>
  <div id="cotizar">
    </div>

  <div data-toggle="modal" data-target="#eliminar_solicitud" id="launch_popup_eliminar">
    </div>
  <div data-toggle="modal" data-target="#confirmar_publicar" id="launch_popup_publicar">
    </div>
  <div data-toggle="modal" data-target="#eliminar_producto" id="launch_popup_eliminar_producto">
    </div>
  <div id="popup_eliminar">
    </div>
