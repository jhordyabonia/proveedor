<div class="eventos">
	<h2> Eventos</h2>
	<ul>
		<?php foreach ($eventos as $key => $value):?>
			<li><a href='<?=base_url()?>micro_admin/test_envio/<?=$value->id?>/<?=$id_plantilla?>'><?=$value->nombre?></a>
		<?php endforeach;?>	
	</ul>
</div>