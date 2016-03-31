<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/catalogo_producto/top_menu_catalogo.css">

<div class="conten_top_catalogo">
	<div class="conten_top">
		<div class="col-md-3">
			<a href="<?=base_url()?>">
				<img class="img-responsive" src="<?=base_url()?>assets/img/imagen_empresa/captura1.png" style="margin-top:-1px;">
			</a>
		</div>
		<div class="col-md-5" style="padding-left:70px;">
          <?= form_open(base_url() . 'listados/validar',array('name'=>'buscador')) ?> 
			<ul class="list-inline style_material">
				<li>
					<a class="enlaces" href="JavaScript:document.buscador.submit();">
						<span class="ico_buscar glyphicon glyphicon-search"></span>
					</a>
				</li>
				<li style="width: 93%;">
					<input type="text" id ="d" class="input_style" name="busqueda" placeholder="Buscar en proveedor">
				</li>
			</ul>
          <?= form_close() ?>	
		</div>	
		<div class="col-md-4">
			<ul class="list-inline" style="float:right;">
				<li>
					<ul class="list-inline">
						<li><span class="glyphicon glyphicon-user"></span></li>
						
						<?php if($usuario):?>
							<a class="enlaces" href="<?=base_url()?>logueo/logout">
								Salir
							</a>
						<?php else:?>
						<a class="enlaces" data-toggle="modal" id='launch_login' href="JavaScript:login(this,'false');">
								Ingresar
							</a>
						<?php endif?>
					</ul>
				</li>
				<li>
					<ul class="list-inline">
						<li><span class="glyphicon glyphicon-pencil"></span></li>						
						<?php if($usuario):?>
							<a class="enlaces" href="<?=base_url()?>tablero_usuario">
								Tablero Usuario
							</a>
						<?php else:?>
						<a id="launch_registro" class="enlaces" href="JavaScript:launch(this);">
								Registro Gratis
							</a>
						<?php endif?>
					</ul>
				</li>
			</ul>
		</div>		
	</div>
</div>