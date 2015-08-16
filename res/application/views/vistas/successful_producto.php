<html>
<head>
    <style type="text/css">

    #contenedor{ 
    position: relative; 
    left: 0px;       
    padding:0px;      
    width:100%; 
    margin:0px; 
    background:#F5F6CE; 
    height: 100%;
    }

    #info_subida{
        float:left;    
        padding:10px; 
        color:#000; 
        width:15%; 
        margin:10px; 
        background:#F2F2F2; 
        height: 700px;
    }

      #imagenes{
        position: relative;
        float:left;          
        color:#000; 
        width:70%; 
         
        background:#blue; 
    }

       #imagen{             
        position: absolute; 
        float:left;
        color:#000; 
        width:25%; 
        margin:10px; 
        background:#F7F2E0;         
    }

       #infoimagen{                
        position: absolute;
        float:right; 
        color:#000; 
        width:70%; 
        margin:10px; 
        background:#F7F2E0; 
        left: 26%;
    }

    #desc_prod{
     float:left; 
     border: 1px solid orange;  
    }

    #botones_prod{
     float:left; 
     border: 1px solid orange; 
    }
</style>
</head>

<body>
<div id="contenedor">

<p align="center"><font color="red" size="7"></font></p>
    El producto ha sido registrado exitosamente ......

<div id="info_subida">
        <hr>
        <p>Aqui se mostraran las categorias </p> 
        <br>
        <hr>
        <?php foreach ($query as $row) {
            echo '<p>'. $row->nomcategoria.'</p><hr>'; 
        }?>

</div>
<p><?php echo anchor('registroproducto', 'Subir otro producto!!'); ?></p>


<div id="imagenes">
<div id="imagen">
    <center>
    <img src="http://scriptmedia.co/proveedor/uploads/thumbs/<?=$imagen?>"  width="250px" height="200px"/></center>
    
    </div>
    <div id="infoimagen">
<div id="titulo_prod">
    <table width="100%" >
        <tr><td> <?=$titulo?></td></tr>
    </table>
   <div id="desc_prod">
          <table align="center"  width="90%">
        <tr><th><font size="4">Nombre producto</font></th>
        <td><?=$titulo?></td></tr>
        <tr><th>Descripcion</th>
        <td><?= $descripcion ?></tr>
        <tr><th>Categoria</th>
        <td><?=$categoria?></td></tr>
        <tr><th>Pedido</th>
        <td><?= $pedido ?></tr>
         <tr><th>capacidad</th>
        <td><?=$capacidad?></td></tr>
        <tr><th>precio</th>
        <td><?= $precio ?><?= @$otro ?></tr>
    </table> 
   </div><!--Cierra desc_prod -->
   <div id="botones_prod">
   Aqui los datos de la empresa
   <br>Contact details</div><!--Cierra botones_prod -->
</div>

 
    </div>



</div><!-- cierra div contenedor -->
</body>
</html>


