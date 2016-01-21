<head>
	<title><?=$type_search;?></title>
<style type="text/css">

div.productos
{
  width:100px;
  height:250;
  margin: 3;
  padding: 4;
  vertical-align: ;
  border: 1;
  border-color: gray;
  background-image: "";
  border-bottom-left-radius: 5;
  border-bottom-right-radius: 5;
  color:gray;
  font-style: italic;  
}
div.productos p
{
	color:blue;
}
div.productos img
{
  width:90%;
}

</style>
</head>
<body>
	<?= form_open(base_url() . 'index.php/busqueda_prueba/busqueda') ?>
		<select name="selec1" id="selec1">
			<option value="Productos" selected> Productos </option>
			<option value="Solicitados" default> Solicitados </option>
			<option value="Proveedores" default> Proveedores </option>
		</select>

		<input type="text" name="busqueda" size="30">
		<input type="submit">
	<?= form_close() ?>


	<div class="listados">

		<?php
		if($productos)
		{
		 foreach ($productos as $producto) 
			{
				echo "<div class='productos'>";
				echo '<img src="'.base_url().".uploads/resize/".$producto->nombre_img.'">';
				echo "<p>".$producto->nom_producto."</p>";
				echo "$: ".$producto->precio_unidad;
				echo "<br>".$producto->pedido_min;
				echo "</div>";
			}
		}elseif($ofertas)
		{
		 foreach ($ofertas as $oferta) 
			{
				echo $oferta->nom_producto;
				echo "<BR>";
			}
		}elseif($proveedores)
		{
		 foreach ($proveedores as $proveedor) 
			{
				echo $proveedor->nombre;
				echo "<BR>";
			}
		}
		?>
	</div>

</body>