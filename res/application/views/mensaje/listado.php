<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type='text/css'>
.span12
{
	width: 100%;
	height: 100%;
}
.text-left {
    text-align: left;
    font-size: 12px;
}
.cell
{
	padding: 5px;
    font-size: 16px;
    height: 10px;
    width: 2%;
    border-right: 1px solid #F5F5F5;
    border-top: 1px solid rgb(185, 179, 179);
    color: #333333;
    cursor: alias;
}
.row1
{
    background-color: white;
}
.new
{
    font-weight: bold;
}
.badge
{
	background-color: #FF7F27!important;
}
.conten-general-cata 
{
    width: 80%!important;
}
.elipse 
{
    white-space: nowrap; 
    max-width: 10em; 
    overflow: hidden;
    text-overflow: ellipsis; 
    /*border: 1px solid #000000;*/
}
</style>
</head>
<body>
	<div style='height:20px;'></div>  
	<div>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/config_OroPlatino/conf_cata_produc.css">


<div class="contenedor-config">
	<div class="title-config">
		<div class="conten-title col-xs-12 col-md-12 col-lg-12">
			<i class="fa fa-envelope icono_mensaje"></i>
			<h3 class="text-title-config">Mensajes</h3>
		</div>
	</div>
	<div class="container-config">
		<div class="conten-config6 col-xs-12 col-md-12 col-lg-12">
			<div class="conten-item6 col-xs-12 col-md-3 col-lg-3">
				<h3 class="text-item">General</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-log-in"></span>
					<a href="<?=base_url()?>mensajes/"  class="text-subitem">Recibidos <span class="badge"><?php echo $numero_nuevos?></span></a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-log-out"></span>
					<a href="<?=base_url()?>mensajes/enviados" class="text-subitem">Enviados </a>
				</div>
				
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<span class="ico-cont-style glyphicon glyphicon-home"></span>
					<?=$tab?> 
					<br>
					<br>
				</h3>
				<!--
				<input type="checkbox" name="elminar[]">Seleccionar todos
				<div class="content-config-inicio">
					<div class="titles">
						<h3 class="text-title-up"> 
							</div>
							</div>-->
						<!--aquí el output-->
						
						<table borde="1">

					      <?php $white=TRUE; if($nuevos&&$tab=="recibidos"):?>
						       <?php foreach ($nuevos as $key => $value):?>
									<tr class="<?php if($white){$white=FALSE; echo 'row1'; }else{$white=TRUE;}?> new" onclick="JavaScript:location.href='<?=base_url()?>mensajes/leer/<?=$value->id?>/<?=$tab?>'">
										<td class="cell">
											<div class="elipse">
												<input type="checkbox" name="elminar[]">
												<span class="badge">Nuevo</span>
												<?=$value->remitente->nombres?>
											</div>
										<td class="cell">	
											<div class="elipse">										
												<?php if($value->adjunto):?>
													<span class="fa fa-paperclip clip_icono"></span>
												<?php endif;?>
												<?=$value->asunto?>
											</div>
										<td class="cell"><div class="elipse"><?=$value->mensaje?></div>
										<td class="cell"><?=$value->fecha?>
							 <?php endforeach; ?>
						  <?php endif; ?>
					      <?php if($recibidos&&$tab=="recibidos"):?>
						       <?php foreach ($recibidos as $key => $value):?>
									<tr class="<?php if($white){$white=FALSE; echo 'row1'; }else{$white=TRUE;}?>" onclick="JavaScript:location.href='<?=base_url()?>mensajes/leer/<?=$value->id?>/<?=$tab?>'">
										<td class="cell">
											<div class="elipse">
												<input type="checkbox" name="elminar[]">
												<?=$value->remitente->nombres?>
											</div>
										<td class="cell">
											<div class="elipse">
												<?php if($value->adjunto):?>
													<span class="fa fa-paperclip clip_icono"></span>
												<?php endif;?>
												<?=$value->asunto?>
											</div>
										<td class="cell"><div class="elipse"><?=$value->mensaje?></div>
										<td class="cell"><?=$value->fecha?>
							 <?php endforeach; ?>
						  <?php endif; ?>
					      <?php if($enviados&&$tab=="enviados"):?>
						       <?php foreach ($enviados as $key => $value):?>
									<tr class="<?php if($white){$white=FALSE; echo 'row1'; }else{$white=TRUE;}?>" onclick="JavaScript:location.href='<?=base_url()?>mensajes/leer/<?=$value->id?>/<?=$tab?>'">
										<td class="cell">
											<div class="elipse">
												<input type="checkbox" name="elminar[]">
												<?=$value->destinatario->nombres?>
											</div>
										<td class="cell">
											<div class="elipse">
												<?php if($value->adjunto):?>
													<span class="fa fa-paperclip clip_icono"></span>
												<?php endif;?>
												<?=$value->asunto?>
											</div>
										<td class="cell"><div class="elipse"><?=$value->mensaje?> </div>
										<td class="cell"><?=$value->fecha?>
							 <?php endforeach; ?>
						  <?php endif; ?>
							</table>
	</div>
   
</body>
</html>
