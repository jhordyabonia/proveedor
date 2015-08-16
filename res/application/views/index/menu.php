
<div class="grid_2 alpha" id="contenedor_ulmenu">
	<ul id="menu" style="height: auto; border: none;">
		<?php  foreach ($categorias as $data): ?> 
		<li class="asideizquierdo elem" style="margin-top: -2px;"> 
			<a href="<?=base_url()?>categoria/<?=$data->id_categoria?>/<?=str_replace(","," ",$data->nombre_categoria)?>" style="color:#0033cc;" class="ir_categoria" >
			<img src="<?=base_url()?>img/iconos_subcat/<?=$data->icono?>" class="asideizquierdo imagen" /> 
			<?=$data->nombre_categoria?> 
			</a> 
			<ul class="subcategoria"> 
				<div class="antesde_divsubs">
					<table> <tr>
						<td> <img src="<?=base_url()?>img/iconos_subcat/<?=$data->icono?>"/> </td>
						<td class="tdsub_titulo"> <?=$data->nombre_categoria?> </td>
					</tr>
					</table>
				</div>
				<div class="divsubs"> 
					<!-- En este bloque php se trae de la bd todas las subcategorias correspondientes a cada categoria
					en la lista de categorias del index-->
					<?php 
					$query = $this->db->query("Select nom_subcategoria from subcategoria where id_categoria =".$data->id_categoria); 
						foreach ($query->result_array() as $row) { 	?>
					<li> <a href="#"> <?=$row['nom_subcategoria'];?> </a> </li>	  						   
						<?php 	} 	?> 
				</div>
			</ul>
		</li>
		<?php endforeach; ?>  <!-- fin de cilco foreach -->
	</ul>
</div>							

