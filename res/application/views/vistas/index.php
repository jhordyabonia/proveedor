<html>
<head>
<title>proveedor</title>
<style type="text/css"> 
#principal{ 
background:#F2F2F2;  

width:100%; 
height: 100%;
} 


#izquierda{ 
float:left;    /*tambien puede poner float:right, para que se alineé a la derecha */ 
padding:10px; 
color:#000; 
width:15%; 
margin:10px; 
background:#D8D8D8; 
height: 85%;
} 

#centro{ 
float:left;    /*tambien puede poner float:right, para que se alineé a la derecha */ 
padding:10px; 
color:#000; 
width:60%; 
margin:10px; 
background:#D8D8D8; 
height: 60%;
}

#derecha{ 
float:left;    /*tambien puede poner float:right, para que se alineé a la derecha */ 
padding:10px; 
color:#000; 
width:15%; 
margin:10px; 
background:#D8D8D8; 
height: 70%;
}

#welcome{
color: red;
font-size: 20;	
	}

#contenido_top{
float:none;    
padding:8%; 
color:#000; 
width:670px; 
background:#D8D8FF; 
height: 50%;
}	

#contenido_down{
float:left;    
padding:3px; 
color:#000; 
width:95%; 
margin:10px; 
background:#D8D8DF; 
height: 20%;
}

#img_superior{
float:left;    
padding:0px; 
color:#000; 
width:95%; 
margin:2px; 
background:#D8D8FF; 
height: 30%;
}

#publicidad{
float:left;    
padding:0px; 
color:#000; 
width:60%; 
margin:2px; 
background:#D8D8FF; 
height: 30%;
}


</style>
</head>

<body>
	
<div id="principal" >
<p id="welcome"><?=@$mensaje?></p>
<table width="70%" align="center">
	<tr>
	<td><h4><?= @$usuario ?></h4></td>
	<td>Registro gratis</td>
	<td>Oficina virtual</td>
	<td>Comprar</td>
	<td>Vender</td>
	<td>Ayuda </td>	
	</tr>
</table>
<p>titulo pagina index</p>


<div id="izquierda">
	<h3>Logo de la empresa</h3> 
        <hr>
  <?php foreach ($query as $row) {
            echo '<p>'. $row->nomcategoria.'</p><hr color=gray>'; 
        }?>      
</div>

<div id="centro">
	centro

	<div id="img_superior">
		<img src="http://scriptmedia.co/proveedor/uploads/promocion.jpg" width="100%" height="100%">
	</div>

<p>productos plus</p>
<table width="95%">
	<tr>
		<td style="border:1px solid #81DAF5; width:300px; height: 100px"></td>
		<td style="border:1px solid #81DAF5; width:300px; height: 100px"> </td>
		<td style="border:1px solid #81DAF5; width:300px; height: 100px"></td>
		<td style="border:1px solid #81DAF5; width:300px; height: 100px"></td>
		<td style="border:1px solid #81DAF5; width:300px; height: 100px"></td>
	</tr>
		<tr>
		<td style="border:1px solid #81DAF5; width:300px; height: 100px"></td>
		<td style="border:1px solid #81DAF5; width:300px; height: 100px"> </td>
		<td style="border:1px solid #81DAF5; width:300px; height: 100px"></td>
		<td style="border:1px solid #81DAF5; width:300px; height: 100px"></td>
		<td style="border:1px solid #81DAF5; width:300px; height: 100px"></td>
	</tr>
</table>

</div>



<div id="derecha">
	derecha
</div>

<p>Mejores promociones</p>
<div id="publicidad">
	Aqui publicidad
</div>

<p align="center"> </p>

	

<table width="50%" align="center">
<tr><td style="width:100px; height: 100px">Ultimas ofertas</td><td style="width:100px; height: 100px">Ultimos productos</td></tr>
<tr>
	<td style="border:1px solid #81DAF5; width:100px; height: 100px">
	<img src="http://scriptmedia.co/proveedor/uploads/Line.png" width="50px" height="50px">	
	</td>
	<td style="border:1px solid #81DAF5; width:100px; height: 100px"> 
	<img src="http://scriptmedia.co/proveedor/uploads/Line.png" width="50px" height="50px">
	</td>
</tr>
	<tr>
	<td style="border:1px solid #81DAF5; width:100px; height: 100px">
	<img src="http://scriptmedia.co/proveedor/uploads/Line.png" width="50px" height="50px">	
	</td>
	<td style="border:1px solid #81DAF5; width:100px; height: 100px">
	<img src="http://scriptmedia.co/proveedor/uploads/Line.png" width="50px" height="50px">
	 </td>
	</tr>

	</tr>
	<tr>
	<td style="border:1px solid #81DAF5; width:100px; height: 100px">
	<img src="http://scriptmedia.co/proveedor/uploads/Line.png" width="50px" height="50px">	
	</td>
	<td style="border:1px solid #81DAF5; width:100px; height: 100px">
	<img src="http://scriptmedia.co/proveedor/uploads/Line.png" width="50px" height="50px">
	 </td>
	</tr>

	</tr>
	<tr>
	<td style="border:1px solid #81DAF5; width:100px; height: 100px">
	<img src="http://scriptmedia.co/proveedor/uploads/Line.png" width="50px" height="50px">	
	</td>
	<td style="border:1px solid #81DAF5; width:100px; height: 100px">
	<img src="http://scriptmedia.co/proveedor/uploads/Line.png" width="50px" height="50px">
	 </td>
	</tr>
</table>




<!-- <div id="contenido_top">
	productos plus 	top
<table width="95%">
	<tr>
		<td style="border:1px solid #81DAF5; width:300px; height: 250px"></td>
		<td style="border:1px solid #81DAF5; width:300px; height: 250px"> </td>
		<td style="border:1px solid #81DAF5; width:300px; height: 250px"></td>
		<td style="border:1px solid #81DAF5; width:300px; height: 250px"></td>
		<td style="border:1px solid #81DAF5; width:300px; height: 250px"></td>
	</tr>
</table>
</div> -->

	



<div id="contenido_down">
	Empresas patrocinadores ::
</div>

	
</div>
<footer>
		<?php echo google_analytics('UA-56575808-1');  ?>
</footer>
</body>
</html>