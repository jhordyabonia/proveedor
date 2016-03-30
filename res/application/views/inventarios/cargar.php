<!DOCTYPE html>
<html>
    <head>
    	<style type="text/css">

.button1 {
    background-color: #fff;
    border: none;
    display: inline-block;
    color: #000fff;
    padding: 0px;
    text-align: center;
    text-decoration: none;
    /*font-size: 12px;*/
    margin: 0px;
    cursor: pointer;
}
</style>
	    <script type="text/javascript">
	    function verificar()
	    {
	    	id_empresa=document.getElementById('id_empresa').value;
	    	if (id_empresa=="") {alert('Debe ingresar un id o nit de empresa registrado');return;};
	    	var popup=new XMLHttpRequest();
		    var url_popup="<?=base_url()?>inventarios/verificar_empresa/"+id_empresa;

			popup.open("GET", url_popup, true);
			popup.addEventListener('load',show,false);
			popup.send(null);

			function show()
			{
				verificacion=document.getElementById('div_verificacion');
				//console.log(popup.response);
				verificacion.innerHTML=popup.response;				
			}
		}
	    </script>
    </head>
    <body> 
    	<CENTER>
<br><br><br>
		<h1>Carga masiva de productos</h1>
		<h4>*Se recomienda leer las <button class="button1" onclick="document.getElementById('instrucciones').style.display='';" >instrucciones</button>, antes de iniciar el proceso</h4>
	    	<?=form_open_multipart(base_url().'inventarios/cargar')?>
	    	<table border="0">
				<tr><td><label>Nit: </label>
					<td><input type="text" size="15" placeholder="Ingrese el nit o id de la empresa" name="id_empresa" id="id_empresa" value="<?=$id_empresa?>">
					<td><input type="button" value="Verificar" onclick="JavaScript:verificar();">		
					<td><input type="file" name="file" value="<?=$namefile?>">
					<td>     </td><td><?=form_submit('submit', 'Cargar archivo')?>
		    	<?=form_close()?>
	    	</table>
		    <div id="div_verificacion" style="min-height:100px;border:#c5c5c5 solid 1px;">
		    	
		    </div>
    	</CENTER>
		    <div id="instrucciones" style="box-shadow: rgb(225,225,225) 10px 100px 10px 250px; display:none;overflow-y:scroll;overflow-x:hidden;padding:5px;height:70%;width:80%;border:#c5c5c5 solid 1px;background-color:#fff;color:#000;position:absolute;top:20%;left:10%;z-index:10">
		    	 	<div class="close" style="pointer:cursor;display:inline-block;left:97%;position:relative;width:100%;" onclick="document.getElementById('instrucciones').style.display='none';"><span style="color:withe!important">X</span><br></div>
		    	 	<center><h2><br> Instrucciones</h2></center>
			    	<ul>
			    		<li>1 en el campo 'Nit:' ingrese el <b>nit</b> o el <b>id</b> de la empresa y pulse el boton <input type="button" disabled="true" value="verificar"><br>
			    		(A continuación se deplegarán los datos de la empresa. compruebe que efectivamente se trata de la empresa a la cual desea agragar los productos)</li>
			    		<img  style="max-width:100%;margin:5px;padding:5px;padding-right:40px;" src="<?=base_url()?>uploads/tuto/1.JPG">
			    		<br><li>2 Una vez Seguros de la correspondecia del <b>nit</b> o <b>id</b> procedemos a selecionar el archivo con los dato de los productos, pulsando el boton <input type="button" disabled="true" value="Seleccionar archivo"><br>
			    			(El archivo debe ser de estension: </b>*.xls</b>,<b>*xlsx</b> u <b>*.ods</b>; con el formato especificado. <a href="<?=base_url()?>uploads/inventarios/carga_masiva.xlsx" target="Other"> Descargar formato</a>)
			    		<img  style="max-width:100%;margin:5px;padding:5px;padding-right:40px;" src="<?=base_url()?>uploads/tuto/2.JPG">
			    		<img  style="max-width:100%;margin:5px;padding:5px;padding-right:40px;" src="<?=base_url()?>uploads/tuto/3.JPG">
			    		</li>
			    		<br><li>3 Una vez seleccionado el archivo, procedemos a pulsar el boton <input type="button" disabled="true" value="Cargar archivo">
			    		luego de uno pocas segundos, dependiendo de la cantidad de productos en el archivo, 
			    		estos se listarán en pantalla <i>"de uno por fila" para su revision</i>.</li>
			    		<img  style="max-width:100%;margin:5px;padding:5px;padding-right:40px;" src="<?=base_url()?>uploads/tuto/4.JPG">
			    		<br><li>4 En la primera columna se encuentra el boton <b>subir o arrastrar imangen</b>, 
			    		mediante el cual puede asignarse a cada producto su correspondiente imagen. <br></li>
			    		<img  style="max-width:100%;margin:5px;padding:5px;padding-right:40px;" src="<?=base_url()?>uploads/tuto/41.JPG">
			    		<br><li>5 Luego de confirmar, el contenido que deseamos registrar, pulsamos el boton <b>Registrar</b>
			    		<br>(tras algunos segundos, dependiendo de la cantidad de productos en el archivo, 
			    		Se mostrará, en pantalla la cantidad de productos registrada.)</li>
			    		<img  style="max-width:100%;margin:5px;padding:5px;padding-right:40px;" src="<?=base_url()?>uploads/tuto/5.JPG">
			    		<br><li>6 Justo bajo, la informacion de la carga, tambien se muestra la opcion de subir un archivo <b>*.zip</b>
			    		 con las imagenes de los productos. Las cuales deberan estar nombradas, con la referencia exacta del producto.</li>
			    	</ul>
		    </div>
    </body>
</html>