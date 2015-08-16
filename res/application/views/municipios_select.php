<option value="0">--Municipios--</option>
<?php if ($dept=="14") { ?>
 <option value="524">BOGOTÁ DC</option>
 <option value="0">--------</option> 
<?php }elseif($dept=="30"){ ?>
 <option value="1071">CALI</option>
 <option value="0">--------</option> 
<?php } elseif($dept=="2"){ ?>
<option value="82">MEDELLIN</option>
<option value="0">--------</option> 
<?php } ?>
 
<?php
	foreach ($municipios->result() as $row){ ?>
	<option value="<?=$row->id_municipio?>" <?= set_select('municipio',  $row ->id_municipio ); ?>><?=$row->municipio?></option>
<?php } ?>


