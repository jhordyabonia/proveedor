<!DOCTYPE html>
<html>
    <head>
	    <title></title>
	    <script type="text/javascript">
	    function verificar()
	    {
	    	id_empresa=document.getElementById('id_empresa').value;
	    	var popup=new XMLHttpRequest();
		    var url_popup="<?=base_url()?>inventarios/verificar_empresa/"+id_empresa;

			popup.open("GET", url_popup, true);
			popup.addEventListener('load',show,false);
			popup.send(null);

			function show()
			{
				verificacion=document.getElementById('div_verificacion');
				console.log(popup.response);
				verificacion.innerHTML=popup.response;				
			}
		}
	    </script>
    </head>
    <body> 
    	<?=form_open_multipart(base_url().'inventarios/cargar')?>
		<input type="text" name="id_empresa" id="id_empresa" value="<?=$id_empresa?>">
		<input type="button" value="Verificar" onclick="JavaScript:verificar();">		
    	<div id="div_verificacion" style="heigt:100px"></div>
		<input type="file" name="file" value="<?=$namefile?>">
		<?=form_submit('submit', 'Upload')?>
    	<?=form_close()?>
    </body>
</html>