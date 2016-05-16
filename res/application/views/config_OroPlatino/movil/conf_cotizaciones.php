	<div class="content-wrapper" style="min-height: 916px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?=$empresa->nombre?>
      <small>Proveedor.com.co</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active"><?=$empresa->nombre?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
		<div class="row">
		<div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">
					<i class="ico-cont-style fa fa-file-text"></i>
					Cotizaciones Requeridas
				</h3>
				<div class="content-catalogo-pro">
					<div class="titles">
						<h3 class="text-title-pub">Solicitar cotizaciones a multiples Proveedores</h3>
						<ul class="list-item-cata">
							<li class="item-cata" onclick="location.href='<?=base_url()?>oferta_test/administrar'">
								<span class="glyphicon glyphicon-th"></span>
								Administrar Cotizaciones Requeridas
							</li>
						</ul>
					</div>
					<div class="conten-formulario-cata">
						<p class="text-cotice-eq">Solicite cotizaciones de los productos o servicios que requiere la empresa a multiples Proveedores.</p>
						<div class="formulario-cata">
							<p class="text-requerido">Requerido</p>
          	<?= form_open('publicar_oferta/registrar/TRUE'); ?>
            					<!-- Campo 2 -->
							<div class="input-group style-padding col-xs-12 col-md-12 col-lg-12">
							  <span class="">
							  	<span class="ico-gene glyphicon glyphicon-list"></span>
									Selecciones la categoria del producto o servicio requerido
							  </span>
							  <select class="form-control" name="categoria"
							  id="categoria" 
		                      onchange="JavaScript:cambio_categoria_simple(this.value);" 
		                      required  >
								  <option selected>Selecciones la categoria del producto o servicio requerido</option>
							  	  <?php foreach($categorias as $categoria):?>
								  	<option value="<?=$categoria->id_categoria?>"><?=$categoria->nombre_categoria?></option>
								  <?php endforeach;?>
							</select>
								<span class=" conten-ico-vali">
							  	<i id='err_categoria' ></i>
							  </span>
							  <span class="">
							  	
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_categoria" class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_categoria"></p>
							</div>

							<!-- Row de Sub-Categorias del Producto -->
					            <div id="div_subcategorias" style="display:none" class="input-group style-padding col-xs-12 col-md-12 col-lg-12">
								  <span class="">
								  	<span class="ico-gene glyphicon glyphicon-list"></span>
										Seleccione una sub-categoria del product
								  </span>
								  <select class="form-control new-br" name="subcategorias_simples" id="subcategorias_simples">
					                      <option value="" selected>Seleccione una sub-categoria del producto</option>       
					                    </select>
					                   <span class=" conten-ico-vali">
							  	<i id='err_subcategorias_simples' ></i></i>
							  </span>
							  <span class="">
							  	
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_subcategorias_simples"  class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_" id="msj_err_subcategorias_simples"></p>
							</div>


							<!-- Campo 1 -->
							<div class="input-group style-padding col-xs-12 col-md-12 col-lg-12">
							  <span class="">
							  	<span class="ico-gene glyphicon glyphicon-pencil"></span>
									Nombre del productos o servicio
							  </span>
							  <input type="text" class="form-control" 
							  name="nombre_producto" required
							   onchange="JavaScript:verificar_largo(this,5);" 
			                   onclick="JavaScript:limpiar(this)" 			                 
			                   placeholder="Nombre del productos o servicio requerido">
							  <span class=" conten-ico-vali">
							  	<i id='err_nombre_producto' ></i>
							  </span>
							  <span class="">
							  	
							  </span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_nombre_producto" class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_nombre_producto"></p>
							</div>

							<!-- Campo 3 -->
							<div class="input-group style-padding col-xs-12 col-md-12 col-lg-12">
							  <span class="">
							  	<span class="ico-textarea-item glyphicon glyphicon-list-alt"></span>
									Descripcion
							  </span>
							  <textarea class="form-control" rows="5" name="descripcion" required
							  id="textarea3" onchange="JavaScript:verificar_largo(this,10);" onclick="JavaScript:limpiar(this);"
							  placeholder="Descripcion del producto o servicio requerido"></textarea>
							  <span class=" conten-ico-vali">
							  	<i id='err_descripcion' ></i>
							  </span>
							  <span class="">
							  	<span class="ico-requerido2 glyphicon glyphicon-asterisk"></span>
							  </span>
							  <span class="palabras-maxima"><strong>5000</strong> palabras máximo</span>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_descripcion" class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_descripcion"></p>
							</div>

							<!-- Campo 5 -->
							<div class="input-group  inline-block style-padding3 col-xs-12 col-md-12 col-lg-12">
							<span class="">
							  	<span class="ico-textarea-item glyphicon glyphicon-list-alt"></span>
									Cantidad requerida
							  </span>	
							  	<input type="text" class="form-control" name="cantidad_requerida" onchange="this.value+=' ';decimal_point(this)"  onKeyPress="decimal_point(this);return soloNumeros(event)"
                 				 required   placeholder="Cantidad requerida">
							</div>
							<div class="input-group inline-block style-padding4 col-xs-12 col-md-12 col-lg-12">	
								<span class="">
							  	<span class="ico-textarea-item glyphicon glyphicon-list-alt"></span>
									Unidad
							  </span>							
								    <select class="form-control" name="list_medida">
									 <option value="1">Unidad (und)</option>
								    	<?php foreach ($unidades as $key => $unidad):?>
										  <option <?=$unidad->id_dimension?> ><?=$unidad->nombre?></option>
										<?php endforeach;?>
									</select>					
							</div>
							<div class="input-group inline-block style-padding5 col-xs-12 col-md-1 col-lg-1">
								<p class="col-xs-12 col-md-12 col-lg-12">(Opcional)</p>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_cantidad_requerida" class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_cantidad_requerida"></p>
							</div>

							<!-- Campo 6 -->
							<div class="input-group style-padding2 col-xs-12 col-md-12 col-lg-12">
								<div class="adjuntar-archivo">
							  		<a class="enlace-ssubir-imagenes" href="JavaScript:document.getElementById('userfile').click();">
							  		    <p class="text-subir-img">
                                              <span class="ico-subir-img glyphicon glyphicon-paperclip"></span>
                                              Adjuntar archivo
                                        </p>
							  		</a>
							  	</div>
                      			<div class="" id="adjunto" unable onclick="document.getElementById('userfile').click();"></div>
							  	<div style='display:none'>
			                         <input type="file" class="upload"  
			                         onchange="JavaScript:var paths = document.getElementById('userfile').files;document.getElementById('adjunto').innerHTML=paths[0]['name'];" id="userfile" name="userfile">
			                      </div>
							</div>

							<!-- Campo validacion -->
							<div id="parent_msj_err_adjunto" class="input-group content_validacion2 col-xs-12 col-md-12 col-lg-12">
							  <p class="text_errors" id="msj_err_"></p>
							</div>
<div class=" style-padding6 col-xs-12 col-md-12 col-lg-12" style="padding:2%;">
                                <button type="submit" class="btn btn-primary">
									<i class="ico-circle fa fa-floppy-o"></i>
                                    SOLICITAR COTIZACION
                                 </button>
                               </div>	
							</div>
													
    					<?=form_close()?>
						</div>
					</div>
				</div>
				</div>
				</div>
				</div>
				</div>
  </section>
			

<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e) 
{ 
var key = window.Event ? e.which : e.keyCode 
return ((key >= 48 && key <= 57) || (key==8)) 
}
</script>

<script type="text/javascript">

       document.onload=ready();
       function ready()
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/confirmar_solicitud/";
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                ready=document.getElementById('ready');
                ready.innerHTML=popup.response;
                console.log(popup.response);
                <?php if($this->session->flashdata('oferta_registrada')):?>
                  document.getElementById('launch_popup_ready').click();
                <?php endif; ?>
              }
       }
  </script>
  <div data-toggle="modal" data-target="#confirmar_solicitud" id="launch_popup_ready">
    </div>
    <!--
  <div id="ready" onload="JavaScript:ready();">
    </div>
-->
<style>
        textarea {
    margin-bottom: 2%!important;
}
select {
    margin-bottom: 2%!important;
}
input {
    margin-bottom: 2%!important;
}
        </style>