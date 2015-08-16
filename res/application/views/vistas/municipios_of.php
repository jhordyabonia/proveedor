<option value="0">--Municipios--</option>
<?php
	foreach ($municipios->result() as $row){ ?>
	<option value="<?=$row->id_municipio?>" <?= set_select('municipio',  $row ->id_municipio ); ?>><?=$row->municipio?></option>
<?php } ?>