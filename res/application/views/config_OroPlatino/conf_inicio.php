<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/config_OroPlatino/conf_cata_produc.css">


<div class="contenedor-config">
	<div class="title-config">
		<div class="conten-title col-xs-12 col-md-12 col-lg-12">
			<i class="ico-style-config fa fa-cog"></i>
			<h3 class="text-title-config">Configuracion</h3>
		</div>
	</div>
	<div class="container-config">
		<div class="conten-config6 col-xs-12 col-md-12 col-lg-12">
			<div class="conten-item6 col-xs-12 col-md-3 col-lg-3">
				<h3 class="text-item">General</h3>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-perfil fa fa-building-o"></i>
					<a class="text-subitem">Perfil de empresa</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-contacto fa fa-phone"></i>
					<a class="text-subitem">Contacto</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="icon-usuario fa fa-child"></i>
					<a class="text-subitem">Usuario</a>
				</div>
				<h3 class="text-item-dos">Configurar Web</h3>
				<div class="active-config margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-home"></span>
					<a class="text-subitem">Inicio</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-th-list"></span>
					<a class="text-subitem">Catalogo de Productos</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-bookmark"></span>
					<a class="text-subitem">Productos Principales</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-briefcase"></span>
					<a class="text-subitem">Nosotros</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<i class="ico-config-style2 fa fa-file-text"></i>
					<a class="text-subitem">Cotizaciones requeridas</a>
				</div>
				<div class="margin-conten col-xs-12 col-md-12 col-lg-12">
					<span class="ico-config-style glyphicon glyphicon-open"></span>
					<a class="text-subitem">Subir Catalogo</a>
				</div>
			</div>
			<div class="conten-general-cata col-xs-12 col-md-9 col-lg-9">
				<h3>
					<span class="ico-cont-style glyphicon glyphicon-home"></span>
					Configurar Inicio
				</h3>

			<?=form_open_multipart(base_url().'editar_empresa/banners')?>
				<div class="content-config-inicio">
					<div class="titles">
						<h3 class="text-title-up">1. Subir imagenes centrales (Banners)</h3>
						<div class="conten-paso1">
							<p class="agreagar-text">Agregar avisos centrales a su pagina de inicio.</p> <p class="ver-ejm">- Ver ejemplo</p>
							<p class="medidas-recom">Medidas recomendadas 700 pixeles por 600px pixeles</p>
							<div class="img-banner">
								<div class="subir-img">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a class="text-up-img">Subir imágen 1</a>
								</div>
								<div class="subido-img">
									<img class="imge-subido" src="<?php echo base_url()?>assets/img/subido-img.png">
									<p class="name-file">Nombre del archivo.PNG</p>
									<a class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>
							<div class="img-banner">
								<div class="subir-img">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a class="text-up-img">Subir imágen 1</a>
								</div>
								<div class="subido-img">
									<img class="imge-subido" src="<?php echo base_url()?>assets/img/subido-img.png">
									<p class="name-file">Nombre del archivo.PNG</p>
									<a class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>
							<div class="img-banner">
								<div class="subir-img">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a class="text-up-img">Subir imágen 1</a>
								</div>
								<div class="subido-img">
									<img class="imge-subido" src="<?php echo base_url()?>assets/img/subido-img.png">
									<p class="name-file">Nombre del archivo.PNG</p>
									<a class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>

							<!-- Campo 7 -->
							<div class="input-group col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-guardar-inicio">
									<i class="ico-circle fa fa-floppy-o"></i>
									<p class="text-publicarPro">Guardar</p> 
								</button>
							</div>
    					<?=form_close()?>
						</div>
					</div>
				</div>
				<div class="content-config-inicio">
					<div class="titles">
						<h3 class="text-title-up">2. Subir Videos de Youtube <i class="ico-youtube fa fa-youtube"></i></h3>
						<div class="conten-paso2">
							<p class="agreagar-text">Agregar videos de Youtube a su pagina de inicio.</p> <p class="ver-ejm">- Ver ejemplo</p>
							<p class="medidas-recom">Copie las direcciones de los videos y peguelas en los campos respectivos (Maximo 20 videos)</p>
							
						<?=form_open_multipart(base_url().'editar_empresa/videos')?>
							<!-- Campo 1 -->
							<div class="input-group padig col-xs-12 col-md-5 col-lg-5">
							  <span class="fiel-tramspa padi2 input-group-addon">
							  	1
							  </span>
							  <input type="text" class="form-control" name="videos[]" placeholder="Introdusca dirección del video" style="border-radius: 0;">
							</div>
							<!-- Campo 1 -->
							<div class="input-group padig col-xs-12 col-md-5 col-lg-5">
							  <span class="fiel-tramspa padi2 input-group-addon">
							  	2
							  </span>
							  <input type="text" class="form-control" name="videos[]" placeholder="Introdusca dirección del video" style="border-radius: 0;">
							</div>
							<!-- Campo 1 -->
							<div class="input-group padig col-xs-12 col-md-5 col-lg-5">
							  <span class="fiel-tramspa padi2 input-group-addon">
							  	3
							  </span>
							  <input type="text" class="form-control" name="videos[]" placeholder="Introdusca dirección del video" style="border-radius: 0;">
							</div>
							<!-- Campo 1 -->
							<div class="input-group padig col-xs-12 col-md-5 col-lg-5">
							  <span class="fiel-tramspa padi2 input-group-addon">
							  	4
							  </span>
							  <input type="text" class="form-control" name="videos[]" placeholder="Introdusca dirección del video" style="border-radius: 0;">
							</div>
							<!-- Campo 1 -->
							<div class="input-group padig col-xs-12 col-md-5 col-lg-5">
							  <span class="fiel-tramspa padi2 input-group-addon">
							  	5
							  </span>
							  <input type="text" class="form-control" name="videos[]" placeholder="Introdusca dirección del video" style="border-radius: 0;">
							</div>
							<!-- Campo 1 -->
							<div class="conten-mas-videos col-xs-12 col-md-5 col-lg-5">
							  <a class="agregar-mas-videos"><i class="ico-mas fa fa-plus-circle"></i> Agregar más videos</a>
							</div>
							<!-- Campo 7 -->
							<div class="input-group col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-guardar-inicio" type="submit">
									<i class="ico-circle fa fa-floppy-o"></i>
									<p class="text-publicarPro">Guardar</p> 
								</button>
							</div>
    					<?=form_close()?>
						</div>
					</div>
				</div>
				<div class="content-config-inicio">
					<div class="titles">
						<h3 class="text-title-up">3. Subir imagenes de la Empresa</h3>
						<div class="conten-paso3">
							<p class="agreagar-text3">Agregar imagenes de la empresa a la pagina de inicio (Maximo 20 imagenes).</p>
							
						<?=form_open_multipart(base_url().'editar_empresa/imagenes')?>
							<!-- Campo 1 -->
							<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">
								<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
								  <span class="fiel-tramspa padi2 input-group-addon">
								  	1
								  </span>
								  <input type="text" class="form-control" name="imagenes[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">
								</div>
							</div>							
							<div class="img-banner">
								<div class="subir-img2">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a class="text-up-img2">Subir imágen</a>
								</div>
								<div class="subido-img2">
									<img class="imge-subido" src="<?php echo base_url()?>assets/img/img-logo-em-ejemplo.png">
									<p class="name-file">Nombre del archivo.PNG</p>
									<a class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>
							<!-- Campo 2 -->
							<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">
								<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
								  <span class="fiel-tramspa padi2 input-group-addon">
								  	2
								  </span>
								  <input type="text" class="form-control" name="imagenes[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">
								</div>
							</div>							
							<div class="img-banner">
								<div class="subir-img2">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a class="text-up-img2">Subir imágen</a>
								</div>
								<div class="subido-img2">
									<img class="imge-subido" src="<?php echo base_url()?>assets/img/img-logo-em-ejemplo.png">
									<p class="name-file">Nombre del archivo.PNG</p>
									<a class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>
							<!-- Campo 3 -->
							<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">
								<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
								  <span class="fiel-tramspa padi2 input-group-addon">
								  	3
								  </span>
								  <input type="text" class="form-control" name="imagenes[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">
								</div>
							</div>							
							<div class="img-banner">
								<div class="subir-img2">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a class="text-up-img2">Subir imágen</a>
								</div>
								<div class="subido-img2">
									<img class="imge-subido" src="<?php echo base_url()?>assets/img/img-logo-em-ejemplo.png">
									<p class="name-file">Nombre del archivo.PNG</p>
									<a class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>
							<!-- Campo 4 -->
							<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">
								<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
								  <span class="fiel-tramspa padi2 input-group-addon">
								  	4
								  </span>
								  <input type="text" class="form-control" name="imagenes[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">
								</div>
							</div>							
							<div class="img-banner">
								<div class="subir-img2">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a class="text-up-img2">Subir imágen</a>
								</div>
								<div class="subido-img2">
									<img class="imge-subido" src="<?php echo base_url()?>assets/img/img-logo-em-ejemplo.png">
									<p class="name-file">Nombre del archivo.PNG</p>
									<a class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>
							<!-- Campo 5 -->
							<div class="col-xs-12 col-md-5 col-lg-5" style="padding-left: 22px;">
								<div class="input-group padig col-xs-12 col-md-12 col-lg-12">
								  <span class="fiel-tramspa padi2 input-group-addon">
								  	5
								  </span>
								  <input type="text" class="form-control" name="imagenes[]" placeholder="Titulo de la imágen" style="border-radius: 0;height: 29px;">
								</div>
							</div>							
							<div class="img-banner">
								<div class="subir-img2">
									<span class="ico-up glyphicon glyphicon-open"></span>
									<a class="text-up-img2">Subir imágen</a>
								</div>
								<div class="subido-img2">
									<img class="imge-subido" src="<?php echo base_url()?>assets/img/img-logo-em-ejemplo.png">
									<p class="name-file">Nombre del archivo.PNG</p>
									<a class="btn-remov-img"><span class="ico-rem glyphicon glyphicon-remove-sign"></span>Borrar</a>
								</div>
							</div>
							<!-- Campo 1 -->
							<div class="conten-mas-videos col-xs-12 col-md-5 col-lg-5">
							  <a class="agregar-mas-videos2"><i class="ico-mas fa fa-plus-circle"></i> Agregar más videos</a>
							</div>
							<!-- Campo 7 -->
							<div class="input-group col-xs-12 col-md-6 col-lg-8">
								<button class="btn btn-guardar-inicio2">
									<i class="ico-circle fa fa-floppy-o"></i>
									<p class="text-publicarPro">Guardar</p> 
								</button>
							</div>							
    					<?=form_close()?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>