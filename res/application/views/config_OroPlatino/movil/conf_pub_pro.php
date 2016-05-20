	<div class="content-wrapper" style="min-height: 916px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Publicar
      <small>Proveedor.com.co</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>tablero_uauario"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Publicar producto</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    	<div class="row">
		<div class="col-md-7">
            <div class="box box-warning">
                <div class="box-header with-border">
                  <h2 class="box-title">
                    <span class="ico-cont-style glyphicon glyphicon-bookmark"></span>
                    Publicar Producto y/o Servicio
                  </h2>
                 </div>
                
                <div class="box-body">
            <?= form_open_multipart('publicar_producto/registrar'); ?>
            
        <!-- Row del Nombre del Porducto -->
          <div class="row" >
            <div class="col-xs-12 col-md-12"> 
                  <span class="">
                        <i id='err_nombre_avanzado'>
                    <?php if(form_error('nombre_avanzado', '','')!='')
                      {
                      echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
                      }
                    ?>
                    </i>
                      </span>
                  <input  class="form-control col-md-8 col-xs-8 col-lg-8 " name="nombre_avanzado" placeholder="Nombre del producto"
                  onchange="JavaScript:verificar_largo(this,5);" onclick="JavaScript:limpiar(this);"
                  value="<?php echo set_value('nombre_avanzado'); ?>" required type="text" >                   
            </div>
          </div>
           <!-- Campo De Validación -->
           <div id="parent_msj_err_nombre_avanzado">
            <span class="style-text-validation" id="msj_err_nombre_avanzado"><?=form_error('nombre_avanzado', '','')?></span>
          </div>

          

            <!-- Row de Categorias del Producto -->
            <div class="row" >
              <div class="col-xs-12">
                    <select class="form-control col-md-12 col-xs-12 col-lg-12 " name="categoria" required onchange="JavaScript:cambio_categoria(this.value);document.getElementById('div_subcategoria2').style.display='';">
                      <option value="" selected>Seleccione una categoria del producto</option>
                      <?php foreach ($categoria as $fila): ?>
                        <option title="<?= $fila->nombre_categoria ?>"
                          value="<?= $fila->id_categoria ?>"><?= $fila->nombre_categoria ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!--div class="">
                      <i class="fa fa-times-circle veri-nok"></i>
                    </div-->
              </div>
            </div>

          <!-- Campo De Validación -->
          <!--div class="" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->

          <!-- Row de Sub-Categorias del Producto -->
            <div class="row" style="margin-bottom:15px;display:none" id="div_subcategoria2" >
              <div class="col-xs-12">
                    <select class="form-control col-md-12 col-xs-12 col-lg-12 " required name="subcategoria" id="subcategorias">
                      <option value="" selected>Seleccione una subcategoria del producto</option>

                    </select>
                    <!--div class="">
                      <i class="fa fa-check-circle veri-ok"></i>
                    </div-->
              </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->

            <!-- categorias y subcategorias
            <div class="row">
              <div class="col-md-12">
                <h5>Selecciona una categoría y luego clic en Agregar</h5>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-10">
                <select name="menu" size="10" id="textarea1" class="form-control col-md-12 col-xs-12 col-lg-12"
                  style="width: 450px;">

                  <?php foreach ($categoria as $fila): ?>
                    <option title="<?= $fila->nombre_categoria ?>"
                      value="<?= $fila->id_categoria ?>"><?= $fila->nombre_categoria ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
              <div class="col-md-1 col-sm-12 col-xs-2" id="flecha_union_cat_subcat" >
                <img src="<?= base_url() ?>img/pag_siguiente_ok.png">
              </div>
              <div class="col-md-12 col-sm-12 col-xs-10">
                <div name="menu" id="textarea2" class="form-control col-md-12 col-xs-12 col-lg-12 textarea2"
                  style="overflow-y: scroll; display: none"></div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-4" id="botones">
                <div class="btn-group btn-group-lg vcenter" id="agregar">
                  <button type="button" class="btn btn-default">Agregar &#62;</button>
                </div>
                <div class="btn-group btn-group-lg vcenter" id="eliminar">
                  <button type="button" class="btn btn-default">&#60; Quitar</button>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-8" id="cat_subcat">
                <div> <p>Seleccionado:</p> </div>
                <div id="categoria_div_titulo">
                  <p>Categoria:</p>
                </div>
                <div id="categoria_div_contenido">
                  <input type="hidden" readonly id="categoria" required="true"
                    name="categoria" value="<?php echo set_value('categoria'); ?>" />
                  <div id="categoria_div">
                    <p id="cat_selecc"> <?php echo set_value('categoria'); ?> </p>
                  </div>
                </div>
                <div id="subcategoria_div_titulo">
                  <p>Subcategoria:</p>
                </div>
                <div id="subcategoria_div_contenido">
                    <input type="hidden" readonly id="subcategoria"
                      name="subcategoria" value="<?php echo set_value('subcategoria'); ?>"/>
                  <div id="subcategoria_div">
                    <p id="subcat_selecc">
                      <?php echo set_value('subcategoria'); ?> </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-xs-12">
                <label for="categoria" generated="true" class="error"></label>
                <label for="subcategoria" generated="true" class="error"></label>
              </div>
            </div> -->

            <!-- descripcion -->
            <div class="row">
              <div class="col-xs-12">
                  <span class="">
                        <i id='err_descripcion_avanzada'>
                    <?php if(form_error('descripcion_avanzada', '','')!='')
                      {
                      echo '<span class="glyphicon glyphicon-remove-sign boton-verificar-nok"></span>';
                      }
                    ?>
                    </i>
                  </span>
                    <textarea name="descripcion_avanzada" id="textarea4" placeholder="Descripción del producto o servicio"
                     onchange="JavaScript:verificar_largo(this,10);" onclick="JavaScript:limpiar(this);" 
                    required class="form-control col-md-12 col-xs-12 col-lg-12 "><?php echo set_value('descripcion_avanzada'); ?></textarea>
                    
                      <p class="style-max-pala hidden-sm pull-right" id="contador_textarea4"> <b>5.000</b> palabras máximo</p>
                    
              </div>

            </div>

            <!-- Campo De Validación -->
            <div class=""  id="parent_msj_err_descripcion_avanzada">
            <span class="style-text-validation" id="msj_err_descripcion_avanzada"><?=form_error('descripcion_avanzada', '','')?></span>
          </div>

            <!-- servicio de fotos -->
            <div class="row">
                <div align="center" class="col-md-12 col-sm-12 col-xs-6 " style="cursor:pointer">
                <button class="btn btn-lg btn-primary" onclick="JavaScript:document.getElementById('btn_archivos2').click()">
                    <span id="upfile2">
                      <span class="glyphicon glyphicon-picture icono-plus"></span>
                      Agregar Imágenes (máximo 5)
                    </span>          
                </button>          
                        <div style="display:none">
                           <input type="file" class="filestyle" id="btn_archivos2" name="userfiles[]" multiple
                            data-size="lg" data-input="false" data-icon="false" data-badge="false"
                            onchange="JavaScript:oculta_eliminar2();" onload="JavaScript:oculta_eliminar2();">
                        </div>
                </div>
               
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="row" id="preview_avanzado">
                  <!-- <div class="col-md-12 col-sm-12">
                    <a href="#" class="thumbnail"><img data-src="holder.js/100%x180" alt="imagen 1"></a>
                  </div> -->
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                  <div class="btn-group btn-group-lg vcenter" id="eliminar2" >
                      <button style="display:none" type="button" id="btn_delete2" class="btn btn-default">
                        <span class="glyphicon glyphicon-remove"></span>
                        Eliminar Imagen
                      </button>
                </div>
              </div>
               <div class="row">
                  <div class="input-control">
                          <div class="col-md-4 col-xs-12" >                      
                                <input type="radio" id="precioUni_avanzado" class="form-radio" name="rd_precio_avanzado" value="precioUni_avanzado" 
                                value="pr_unit_avanzado" checked="checked">
                                Precio unitario
                          </div>
                                
                          <div class="col-md-4 col-xs-12" >
                            <input type="radio" id="precioconvenir_avanzada" class="form-radio" name="rd_precio_avanzado" value="precioconvenir_avanzada" 
                            value="pr_aconv_avanzado">
                            Precio a convenir  
                         </div>
                    </div>
                </div>          
                      
             <div class="input-control">
                  <div class="col-md-12 col-sm-12 col-xs-12" id="seccion_precio_avanzado">
                     <input type="text" class="form-control col-md-8 col-xs-8 col-lg-8" id="precio1_format_avanzado" required="true"
                        value="<?php echo set_value('precio_avan'); ?>" placeholder="Precio por unidad">
                        
                      <input type="hidden"  id="precio1_avanzado" readonly name="precio_avan"
                        value="<?php echo set_value('precio_avan'); ?>"/>
                    </div>
                    <label for="precio1_format_avanzado" generated="true" class="error"></label>
                    <label for="precio1_avanzado" generated="true" class="error" style="display: none !important;"></label>
             </div>
             
            </div>
 <script>
                                function cambiar_clave_f()
                                {
                                    document.getElementById('cambiar_clave_link').style.display='none';
                                    document.getElementById('cambiar_clave').style.display='';
                                    document.getElementById('password').required=true;
                                    document.getElementById('password2').required=true;
                                 }
                             </script>
							<div class="input-group style-padding7 col-xs-12 col-md-6 col-lg-8">
								<a id="cambiar_clave_link" href="JavaScript:cambiar_clave_f();">
									<p>Mas Datos <span style="padding-left:15px" class="fa fa-chevron-circle-down"></span>
									</p> 
								</a>
							</div>
                            
<div id="cambiar_clave" style="display:none">
          
            <!-- Campo De Validación -->
          <!--div class="" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </-->
            
            <!-- <hr style="border: 2px solid #ea5b0c;border-radius: 200px /8px;width: 99%;"/>-->
           
            <div class="row">                
            
             <div class="input-control">
                 <div class="col-md-1 col-sm-1 col-xs-1">Por:</div>
                 <div class="col-md-11 col-xs-11 col-lg-11">
                  <select class="form-control" id="combo2" name="list_medidas_avan" required="true">
                    </select>
            </div>
            </div>
            
             <div class="input-control">
              <div class="col-md-12 col-sm-12">
                  <input type="text"   onchange="" class="form-control col-md-12 col-xs-12 col-lg-12" required="true" name="pedido_min" id="pedido_min" placeholder="Pedido mínimo"
                    value="<?php echo set_value('pedido_min'); ?>" onkeypress="" >
                </div>
              <div class="col-md-12 col-sm-12">
                <div class="">
                  <input type="text" class="form-control col-md-12 col-xs-12 col-lg-12" name="medidas" disabled="disabled"
                    value="Unidad (Und)" required>
                </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="" style="margin: 0;">
            <span class="style-val-avan" style="margin-top: -4px;">Validación Correspondiente</span>
          </div-->

<!--             tiempo de entrega
<div class="row">
  <div class="col-md-12">
    <h5>Tiempo de entrega<span id="asterisk" class="label label-default">*</span></h5>
    <?php echo form_error('tiempo_entrega', '<div class="error">', '</div>'); ?>
  </div>
  <div class="col-md-12 col-sm-12">
    <div class="">
      <input type="text" class="form-control col-md-12 col-xs-12 col-lg-12" name="tiempo_entrega" required="true"
        id="tiempo_entrega" value="<?php echo set_value('tiempo_entrega'); ?>" >
    </div>
    <h6 class="hidden-xs">Ej. 8</h6>
  </div>
  <div class="col-md-12 col-sm-12">
    <select class="form-control col-md-12 col-xs-12 col-lg-12" id="combo2" name="list_entrega">
      <option value="Semanas">Semanas</option>
      <option value="Dias">Dias</option>
      <option value="Meses">Meses</option>
      <option value="Horas">Horas</option>
    </select>
  </div>
</div> -->

            <!-- capacidad de suministro -->
<!--             <div class="row">
  <div class="col-md-12">
    <h5>Capacidad de suministro</h5>
    <?php echo form_error('capacidad', '<div class="error">', '</div>'); ?>
  </div>
  <div class="col-md-12 col-sm-12">
    <div class="">
      <input type="text" class="form-control col-md-12 col-xs-12 col-lg-12" name="capacidad" id="capacidad"
        value="<?php echo set_value('capacidad'); ?>" >
    </div>
    <h6>Ingrese la cantidad</h6>
    <h6 class="hidden-xs">Ej. 500</h6>
  </div>
  <div class="col-md-12 col-sm-12">
    <div class="">
      <input type="text" class="form-control col-md-12 col-xs-12 col-lg-12" name="medidas" disabled="disabled"
        value="Unidad (Und)">
    </div>
  </div>
  <div class="col-md-1 col-sm-1 col-xs-1" id="seccion_precio_por"><h5>por</h5></div>
  <div class="col-md-12 col-sm-12 col-xs-5">
    <select class="form-control col-md-12 col-xs-12 col-lg-12" id="combo" name="list_capacidad">
      <option value="Día">Dia</option>
      <option value="Semana">Semana</option>
      <option value="Mes">Mes</option>
      <option value="Hora">Hora</option>
    </select>
  </div>
</div> -->

            <!-- forma de pago -->
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12">
                  <h5>Forma de pago (Selecciona una o varias de las opciones listadas)
                    
                  </h5>
                  <?php echo form_error('pago', '<div class="error">', '</div>'); ?>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-12 col-sm-12"> 
                          <input type="checkbox" name="pago[]"
                          <?php echo set_checkbox('pago', 'Transferencia Bancaria', false) ?>
                          value="Transferencia bancaria"> Transferencia bancaria 
                      </div>
                      <div class="col-md-12 col-sm-12">  
                          <input type="checkbox" name="pago[]"
                          <?php echo set_checkbox('pago', 'Giros nacionales', false) ?>
                          value="Giros nacionales"> Giros nacionales 
                      </div>
                      <div class="col-md-12 col-sm-12"> 
                          <input type="checkbox" name="pago[]"
                          <?php echo set_checkbox('pago', 'Cheque', false) ?>
                          value="Cheque"> Cheque
                      </div>
              </div>
              <div class="col-md-12 col-sm-12">
                    <div class="col-md-12 col-sm-12">
                      <input type="checkbox" name="pago[]"
                      <?php echo set_checkbox('pago', 'Efectivo', false) ?>
                      value="Efectivo"> Efectivo 
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <input type="checkbox" name="pago[]"
                      <?php echo set_checkbox('pago', 'Contraentrega', false) ?>
                      value="Contraentrega"> Contraentrega 
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <input type="checkbox" name="pago[]"
                      <?php echo set_checkbox('pago', 'A convenir', false) ?>
                      value="A convenir"> A convenir
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12" style="margin-top: 7px;">
                    <div class="col-md-12 col-sm-12">
                      <div class="">
                        <input id="otra" type='hidden' name='pago[]'>
                        <input type="text" class="form-control col-md-12 col-xs-12 col-lg-12" id="pminimo" name="otra" onchange="JavaScript:document.getElementById('otra').checked=true;"
                          value="<?php echo set_value('otra'); ?>" placeholder="Otra forma de pago">
                        <?php echo form_error('otra', '<div class="error">', '</div>'); ?>
                        <label class="error" for="pago[]" generated="true"></label>
                      </div>
                    </div>
                  </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->
            

            <!-- page subtitle (in gray) -->
            <!-- <hr style="border: 2px solid #ea5b0c;border-radius: 200px /8px;width: 99%;"/>-->
            <div>
              <h4 class="seccion" style="height: 40px;padding: 12px;">
                Información Complementaria
              </h4>
            </div>
  <!-- palabras clave -->
            <div class="row">
                <div class="col-md-12">
                  <h3 class="seccion" style="height: 40px;padding: 12px;">Palabras clave + ENTER</h3>
                  <h6 class="seccion" >Las 'palabras clave' hacen que el producto sea más visible a las empresas.</h6>
                  <?php echo form_error('etiquetas', '<div class="error">', '</div>'); ?>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="input-control">
                    <input type="text" class="form-control col-md-12 col-xs-12 col-lg-12" id="Pclave" name="Pclave">
                  </div>
                  <input type="hidden" id="qwerty" name="etiquetas">
                </div>
                <div class="col-md-12">
                  <h6><b>Ingresa la palabra clave y pulsa la tecla ENTER</b></h6>
                  <h6>Ej.: Zapato en cuero</h6>
                </div>
            </div>

            <!-- empresa o sector al que le interesa ... -->
            <div class="row" style="margin-bottom: 16px; display:none">
              <div class="col-md-12 col-sm-12">
                <h5>Empresa o sector al que le interesa el producto</h5>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-6" style="top:10px;">
                    <select class="form-control col-md-12 col-xs-12 col-lg-12 " name="sector" onchange="">
                      <!--
                        <?php foreach ($categoria as $key => $value):?>
                        <option value="<?=$value->id_categoria?>"> <?=$value->nombre_categoria?>
                        <?php endforeach?>
                    -->
                    </select>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-6" style="top:10px;">
                <select class="form-control col-md-12 col-xs-12 col-lg-12" name="tipo" id="tipo">
                </select>
              </div>
            </div>

            <!-- Campo De Validación -->
          <!--div class="" style="margin: 0;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->

            <!-- estado del producto -->
            <div class="row">                  
                <div class="input-control">
                    <div class="col-md-12 col-sm-12">
                        <h5>Estado del producto</h5>
                    </div>
                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                        <select class="form-control" id="combo" name="estado">
                            <option value="Nuevo">Nuevo</option>
                            <option value="Usado">Usado</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Campo De Validación -->
          <!--div class="" style="margin: 0;margin-bottom: 20px;">
            <span class="style-val-avan">Validación Correspondiente</span>
          </div-->

          	</div>
          	</div>
          	</div><!--Div oculto-->
							<div class=" style-padding6 col-xs-12 col-md-12 col-lg-12" style="padding:2%;">
                  <center>
                      <button type="submit" class="btn btn-lg bg-orange no-border">
                        <i class="ico-circle fa fa-floppy-o"></i>
                        Publicar Producto
                      </button>
                  </center>
               </div>	
						</div>

            <?= form_close() ?>
            
              </div>
            </div>
            
				</div>
				</div>
				</div>
  </section>
			
            
<script type="text/javascript">
    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
<script type="text/javascript">

       document.onload=ready();
       function ready()
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/confirmar_producto/";
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                ready=document.getElementById('ready');
                ready.innerHTML=popup.response;
                console.log(popup.response);
                <?php if($this->session->flashdata('producto_registrado')):?>
                  document.getElementById('launch_popup_ready').click();
                <?php endif; ?>
              }
       }
  </script>
  <script type="text/javascript">  
    $("#upfile1").click(function () {
    $("#btn_archivos").trigger('click');
    });
  </script>

  <script type="text/javascript">  
    $("#upfile2").click(function () {
    $("#btn_archivos_avanzado").trigger('click');
    });
  </script>

  <script type="text/javascript"> 
        <?php if($avanzada):?>
            document.getElementById('publi_completa_link').click();
        <?php endif;?>
  </script>
  <div data-toggle="modal" data-target="#confirmar_producto" id="launch_popup_ready">
    </div>
  <div id="ready" onload="JavaScript:ready();">
    </div>
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