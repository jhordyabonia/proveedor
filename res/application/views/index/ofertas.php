
<!-- Contenido izquierdo ultimas ofertas de compra -->
<ul id="movimiento1">
	<?php foreach ($prod_ofertas as $row): ?>
		<li>
			<table width="415px"> <tr>
					<td style="width: 130px; height: 106px; padding: 5px 5px 5px 5px; vertical-align: middle; max-height: 90px; text-align: center;"> 
						<a href="<?= base_url() ?>oportunidad_comercial/ver/<?= $row->id_oferta ?>"> 
							<img src="<?= base_url() ?>uploads/<?= $row->nombre_img ?>" class="imgProd" /> </a>
					</td>
					<td width="214px" style="padding: 5px 5px 5px 5px;"> 
						<a href="<?= base_url() ?>oportunidad_comercial/ver/<?= $row->id_oferta ?>"> 
							<p style="color: #3aa2ed; font-size: 15px; text-align: center;" > 
								<?= $row->nom_producto; ?> </p> </a>
				<center> <table style="padding-top: 14px;"> <tr>
							<td> <p class="precio_signo_pesos"> $ </p> </td>
							<td style="vertical-align: middle;"> <table>
									<tr> <td> <center> <p class="precio_precio"> 
											<?= $row->precio; ?> </p> </center> </td>
						</tr>
						<tr> <td> <center> <img src="img/sonrisaprecio.png"  style="margin-top: -6px;" />
						</center> </td>
						</tr>
					</table> 
					</td>
					</tr> 
			</table> </center>
			<p style="margin-top: -5px; color: gray; font-size: 15px; text-align: center; padding-top: 4px;"> 
				<?= $row->cantidad_requerida; ?> unidades </p>
			<p style="margin-top: -5px; color: gray; font-size: 11px; text-align: center; padding-top: 4px;"> 
				pedido mínimo </p>
			</td>
		<td style="width: 60px; text-align: center; vertical-align: middle;"> 
			<!-- Formato para la fecha -->
			<?php
			$date = new DateTime($row->fecha_publicacion);
			$fecha = $date->format('M-d');
			?>
			<p style="color: gray; font-size: 13px;"> <?= $fecha ?></p> 
		</td>
	</tr> </table>
	</li>
<?php endforeach; ?>  

</ul>