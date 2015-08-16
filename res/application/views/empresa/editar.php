<!-- VIEW editar perfil de empresa / <?=base_url()?>empresa/editar -->
<script> var base_url = "<?= base_url() ?>"; </script>
<link href="<?= base_url() ?>assets/css/empresa/editar_perfil_empresa.css"
  rel="stylesheet" type="text/css" >
<script src="<?=base_url()?>assets/bootstrap/js/jquery.js"></script>
<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/publicar_producto/bootstrap-filestyle.min.js"> </script>
  <link href="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.css"
  rel="stylesheet" type="text/css" />
<script src="<?= base_url() ?>assets/js/publicar_producto/jquery.tagsinput.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css"
  rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/css/empresa/editar_perfil_empresa.css" rel="stylesheet" type="text/css" />
<script src="<?= base_url() ?>assets/js/empresa/jquery.tagsinput.js"></script>
<script src="<?= base_url() ?>assets/js/empresa/editar_perfil_empresa.js"></script>
<script src="<?php echo js_url(); ?>jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"> </script>
    

<div class="container-fluid">
	<div class="row">
		<!-- sidebar -->
		<div class="col-md-2 col-sm-2"> </div>

		<!-- page content -->
		<div class="col-md-10 col-sm-10">
			<div class="row">
        <h3>Editar perfil de la empresa</h3>
      </div>
			
			<!-- implement flash data msg when form is submitted -->
			<!-- implementar los mensajes flash cuando el formulario se ha enviado -->
      <?php /*if ($this->session->flashdata('producto_registrado')) { ?>
        <div class="row"> <div class="col-md-12">
          <div class="alert alert-success" role="alert">
            <strong><?= $this->session->flashdata('producto_registrado') ?></strong>
          </div>
        </div> </div>
      <?php }*/ ?>

      <div class="row seccion">
        <h4>Editar información de cuenta</h4>
      </div>
      <?php
      $atributos = array(
        'autocomplete' => 'off',
        'id' => 'informacion_de_cuenta',
        'novalidate' => 'novalidate');
      ?>
    <?= form_open_multipart('perfil/actualizar_cuenta', $atributos); ?>
      <div class="row campos">
        <div class="col-md-3 col-sm-4">
          <div class="input-group">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
            </span>
            <input type="text" class="form-control" required="true"
              value="<?=$datos_usuario->email;?>" placeholder="Mail"  name="email">
                  <?php echo form_error('email', '<span class="tooltip_perso">', '</span>'); ?>
          </div>
        </div>
        <div class="col-md-3">
          <h6> Ingresar correo electrónico (mail) </h6>
        </div>
      </div>

      <div class="row campos">
        <div class="col-md-3 col-sm-4">
          <div class="input-group">
            <span class="input-group-addon">
              <span class="glyphicon  glyphicon-user" aria-hidden="true"></span>
            </span>
            <input type="text" class="form-control" required="true" 
              value="<?=$datos_usuario->usuario;?>" placeholder="Usuario"  name="usuario">              
          </div>
        </div>
        <div class="col-md-3">
          <h6> Ingresar Usuario </h6>
        </div>
      </div>

      <div class="row campos">
      	<div class="col-md-3 col-sm-4">
      		<div class="input-group">
	          <span class="input-group-addon">
	          	<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
	          </span>
	          <input type="password" class="form-control" required="true"
	            value="" placeholder="Password"  name="password">
	        </div>
      	</div>
      	<div class="col-md-3">
      		<h6> Ingresar contraseña actual </h6>
      	</div>
      </div>

      <div class="row campos">
      	<div class="col-md-3 col-sm-4">
      		<div class="input-group">
	          <span class="input-group-addon">
	          	<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
	          </span>
	          <input type="password" class="form-control" required="true"
	            value="" placeholder="New Password"  name="newpassword">
	           <?php echo form_error('password', '<span class="tooltip_perso">', '</span>'); ?>
         </div>
      	</div>
      	<div class="col-md-3">
      		<h6> Ingresar nueva contraseña </h6>
      	</div>

            <?php if ($this->session->flashdata('usuario_modififcado')) : ?>            
              <div class="row campos">
                <div class="col-md-3 col-sm-4">
                  <div class="input-group" style="color:red;">
                   <strong><?= $this->session->flashdata('usuario_modififcado') ?></strong>
                  </div>
                </div>
            <?php endif; ?>

      </div>

      <div class="row campos">
        <div class="col-md-3 col-sm-4">
          <div class="btn-group btn-group-lg vcenter" id="btn_guardarcambios">
            <button type="submit" class="btn btn-default"> Guardar Cambios </button>
          </div>
        </div>
      </div>


            <input  type="hidden" name="nit" value="<?= $empresa->nit?>" >
    <?= form_close() ?>

 <?php
      $atributos = array(
        'autocomplete' => 'off',
        'id' => 'default-behavior',
        'novalidate' => 'novalidate');
    ?>
    <?= form_open_multipart('perfil/actualizar', $atributos); ?>
      <div class="row seccion">
        <h4>Editar información de contacto</h4>
      </div>

      <div class="row campos">
      	<div class="col-md-2">
      		<h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Nombre y Apellido</h5>
      	</div>
      	<div class="col-md-3">
      		<div class="input-group">
	          <input style="border-radius: 5px;" type="text" name="nombres" class="form-control" required="true" value="<?=  $datos_usuario->nombres; ?>" >
	        </div>
      	</div>
      </div>

      <div class="row campos">
      	<div class="col-md-2">
      		<h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Cargo/Función en la empresa</h5>
      	</div>
      	<div class="col-md-3">
      		<div class="input-group">
	          <input style="border-radius: 5px;" type="text" name="cargo" class="form-control" required="true" value="<?=  $datos_usuario->cargo; ?>" >
	        </div>
      	</div>
      </div>

      <div class="row campos">
      	<div class="col-md-2">
      		<h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Dirección de la empresa</h5>
      	</div>
      	<div class="col-md-3">
      		<div class="input-group">
	          <input style="border-radius: 5px;" type="text" name="direccion" class="form-control" required="true" value="<?=  $datos_usuario->direccion; ?>" >
	        </div>
      	</div>
      </div>

      <div class="row campos">
      	<div class="col-md-2">
      		<h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Departamento</h5>
      	</div>
      	<div class="col-md-3">
      		<select style="border-radius: 5px;" class="form-control provincia inputbox" id="combo_d" name="departamento" >
              <?php foreach ($departamento as $fila):?>
                  <?php if($fila->id_departamento==$datos_usuario->departamento): ?>
                    <option value="<?= $fila->id_departamento ?>" selected ><?= $fila->nombre ?></option>
                  <?php else: ?>
                     <option value="<?= $fila->id_departamento ?>" ><?= $fila->nombre ?></option>
                  <?php endif; ?>
              <?php endforeach; ?>
            </select>
      	</div>
      </div>

      <div class="row campos">
      	<div class="col-md-2">
      		<h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Ciudad / Municipio</h5>
      	</div>
      	<div class="col-md-3">
      		  <select style="border-radius: 5px;" class="form-control municipio inputbox" id="combo_m" name="ciudad">
                 <?php foreach ($municipios as $row): ?>
                    <?php if($datos_usuario->ciudad==$row->id_municipio): ?>
                      <option value="<?= $row->id_municipio ?>"  selected><?= $row->municipio ?></option>
                    <? else: ?>                  
                      <option value="<?= $row->id_municipio ?>" ><?= $row->municipio ?></option>
                    <?php endif; ?>
                 <?php endforeach; ?>
            </select>
      	</div>
      </div>

      <div class="row campos">
      	<div class="col-md-2">
      		<h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Teléfono Celular</h5>
      	</div>
      	<div class="col-md-3">
      		<div class="input-group">
	          <input style="border-radius: 5px;" type="text" name="celular" class="form-control" required="true" value="<?=  $datos_usuario->celular; ?>" >
	        </div>
      	</div>
      </div>

      <div class="row campos">
      	<div class="col-md-2">
      		<h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Teléfono Oficina</h5>
      	</div>
      	<div class="col-md-3">
      		<div class="col-md-3">
      			<div class="input-group">
		          <input  style="border-radius: 5px;" type="text" name="indicativo" class="form-control" required="true" value="<?=  $datos_usuario->indicativo; ?>" >
		        </div>
      		</div>
      		<div class="col-md-6">
      			<div class="input-group">
		          <input style="border-radius: 5px;" type="text" name="telefono" class="form-control" required="true" value="<?=  $datos_usuario->telefono; ?>" >
		        </div>
      		</div>
      		<div class="col-md-3">
      			<div class="input-group">
		          <input style="border-radius: 5px;" type="text" name="extension" class="form-control" required="true" value="<?=  $datos_usuario->extension; ?>" >
		        </div>
      		</div>
      	</div>
      </div>

      <div class="row campos">
      	<div class="col-md-2">
      		<h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Página web</h5>
      	</div>
      	<div class="col-md-3">
      		<div class="input-group">
	          <input style="border-radius: 5px;" type="text" name="web" class="form-control" required="true" value="<?=  $datos_usuario->web; ?>" >
	        </div>
      	</div>
     </div>


      <div class="row seccion">
        <h4>Editar información de la empresa</h4>
      </div>

      <div class="row campos">
        <div class="col-md-2">
          <h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Nombre de la empresa</h5>
        </div>
        <div class="col-md-3">
          <div class="input-group">
            <input style="border-radius: 5px;" type="text" name="nombre" class="form-control" required="true" value="<?= $empresa->nombre?>" >
          </div>
        </div>
      </div>

      <div class="row campos">
        <div class="col-md-2">
          <h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Nit de la empresa</h5>
        </div>
        <div class="col-md-3">
          <div class="input-group">
            <input style="border-radius: 5px;" type="text" class="form-control" required="true" name="nit" value="<?= $empresa->nit?>" >
          </div>
        </div>
      </div>

      <div class="row campos">
        <div class="col-md-2">
          <h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Tipo empresa</h5>
        </div>
        <div class="col-md-3">
            <select style="border-radius: 5px;" class="form-control inputbox" id="combo_m" name="tipo_empresa">
                 <?php foreach ($tipos_empresa as $row): ?>
                    <?php if($empresa->tipo==$row->tipo||$empresa->tipo==$row->id_tipoempresa): ?>
                      <option value="<?= $row->id_tipoempresa ?>"  selected><?= $row->tipo ?></option>
                    <? else: ?>                  
                      <option value="<?= $row->id_tipoempresa ?>" ><?= $row->tipo ?></option>
                    <?php endif; ?>
                 <?php  endforeach; ?>
            </select>
        </div>
      </div>

      <div class="row campos">
        <div class="col-md-2">
          <h6 class="derecha"><span id="asterisk" class="label label-default">*</span>Logo empresa</h5>
        </div>
       <div class="col-md-3 logo_div col-sm-2 col-xs-10">
          <div class="col-md-12 center-block">

            <img id="logo" class="center-block logo_empresa" height="50px" src="<?php echo base_url()?>uploads/logos/<?php echo $empresa->logo; ?>" alt="Logo Empresa">
            <input type="hidden" name="logo_old" value="<?=$empresa->logo; ?>">
          </div>    
        </div>

        <div class="col-md-4 col-sm-4 col-xs-10">
          <div style="display: block;" >
            <input type="file" class="filestyle upload" id="btn_archivos" name="userfile[]" multiple 
                      data-size="lg" data-input="false" data-icon="false"
                      data-buttonText="Modificar Logotipo" data-badge="false" onchange="JavaScript:load_new_logo()">

         <script type="text/javascript">
            function load_new_logo()
            {
             var paths = document.getElementById(id_boton_examina).files;
             var navegador = window.URL || window.webkitURL;
             url = navegador.createObjectURL(paths[0]);
             console.log(url);
             document.getElementById('logo').src=url;             
            }
          </script>
                 
          </div>
        </div>

      </div>

      <div class="row campos">
          <div class="col-md-2" >
            <h6 align="right"><span id="asterisk" class="label label-default" >*</span>Descripción de la empresa</h6>
          </div>
          <div class="col-md-7 col-sm-8">
            <div class="input-control">
              <textarea style="border-radius: 5px;"  name="descripcion" id="textarea3" rows="5"
                required class="form-control"><?=nl2br($empresa->descripcion);?></textarea>
            </div>
          </div>          
        </div>

      <div class="row seccion">
        <h4>Editar las categorías</h4>
      </div>
        <h6>Selcecciona una categoría, y luego haz click en agregar</h6>
         <?php echo form_error('nombre_categorias', '<div class="error">', '</div>'); ?>
            <script type="text/javascript">
                function agregar_categoria(categoria)
                {
                  if(document.getElementById('numero_categorias').value>=5)
                  {
                    alert('Numero maxiomo categorias alcanzado!');
                    return;
                  }
                  id=categoria.substring(categoria.lastIndexOf('(')+1, categoria.lastIndexOf(')')); 
                  categoria=categoria.substring(categoria.lastIndexOf(')')+1);  
                  document.getElementById('id_categorias').value+="|"+id;
                  document.getElementById('nombre_categorias').value+="|"+categoria;
                  document.getElementById('textarea2').innerHTML+='<option  value="('+id+')'+categoria+'">'+categoria+'</option>';
                  document.getElementById('numero_categorias').value++;                
                }
                function eliminar_categoria()
                {
                  if(document.getElementById('numero_categorias').value<=0)
                  {
                    alert('No hay categorias!');
                    return;
                  }
                  var nombre_categorias=document.getElementById('nombre_categorias');
                  var tmp_nombres=nombre_categorias.value;
                  tmp_nombres=tmp_nombres.substring(0, tmp_nombres.lastIndexOf('|'));
                  document.getElementById('nombre_categorias').value=tmp_nombres;

                  var id_categorias=document.getElementById('id_categorias');
                  var tmp_ids=id_categorias.value;
                  tmp_ids=tmp_ids.substring(0, tmp_ids.lastIndexOf('|'));
                  document.getElementById('id_categorias').value=tmp_ids;
                            
                  document.getElementById('textarea2').lastChild.remove();
                  //Las categorias precargadas requieren doble llamado al metodo remove
                  var numero_base = document.getElementById('numero_base').value;
                  var numero_categorias = document.getElementById('numero_categorias').value
                  if(numero_categorias<=numero_base&&numero_categorias>=0)
                  { 
                    document.getElementById('textarea2').lastChild.remove();
                    document.getElementById('numero_base').value--;
                  }

                  document.getElementById('numero_categorias').value--;
                }
            </script>
      <div class="row campos">
            <div class="col-md-4 col-sm-2 col-xs-10">
                <select style="border-radius: 5px; width: 260px;" id="categorias" name="categorias" size="10" class="form-control" >
                    <?php foreach ($categorias as $fila): ?>
                        <option title="<?= $fila->nombre_categoria ?>" 
                          value="(<?= $fila->id_categoria ?>)<?= $fila->nombre_categoria ?>"><?= $fila->nombre_categoria ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2 col-sm-8 col-xs-10" id="botones" >
              <div style="display: inline-block;" class="btn-group btn-group-lg vcenter" id="agregar">
                  <button type="button" class="btn btn-default" onclick="JavaSript:agregar_categoria(categorias.value);"> Agregar <b>&gt; </b></button>
                </div>

                <div style="display: block;" class="btn-group btn-group-lg vcenter" id="eliminar">
                  <button type="button" class="btn btn-default" onclick="JavaSript:eliminar_categoria();"> <b>&lt;</b> Quitar </button>
                </div>            
            </div>
         <div class="col-md-4 col-sm-2 col-xs-10">
          <select style="border-radius: 5px; width: 260px;" id="textarea2" class="form-control textarea2" size="10" class="form-control" >
                <?php 
                $id_categorias_actuales="";
                $nombres_categorias_actuales="";
                foreach ($empresa->categorias as $key => $fila): ?>
                   <?php 
                        $nombres_categorias_actuales.="|".$fila->nombre_categoria;
                        $id_categorias_actuales.="|".$fila->id_categoria; 
                   ?> 
                   <option value="(<?= $fila->id_categoria ?>)<?= $fila->nombre_categoria ?>"><?= $fila->nombre_categoria ?></option>
                    
                 <?php endforeach; ?>               
          </select>
         </div>
      </div>
      <input  type="hidden" id="numero_base" value="<?= count($empresa->categorias); ?>">
      <input  type="hidden" id="numero_categorias" name="numero_categorias" value="<?= count($empresa->categorias); ?>">
      <input  type="hidden" id="id_categorias" name="id_categorias" required value="<?= $id_categorias_actuales;?>">
      <input  type="hidden" id="nombre_categorias" name="nombre_categorias" required value="<?= $nombres_categorias_actuales;?>">
     <div class="row seccion">
        <h4>Productos</h4>
     </div>
       <!-- palabras clave -->
        <div class="row campos">
          <div class="col-md-12">
            <h5>Productos principales de la empresa</h5>
            <?php echo form_error('etiquetas', '<div class="error">', '</div>'); ?>
           </div>
          <div class="col-md-6 col-sm-6">
              <div class="input-control">
                  <input type="text" name="productos_principales" class="form-control" id="Pclave" value="<?=$empresa->productos_principales?>">
              </div>
          </div>
          <div class="col-md-12">
            <h6>Ingresa la palabra clave de productos principales de la empresa  y pulsa la tecla Enter</h6>
            <h6>Ej.: Zapato en cuero</h6>
          </div>
        </div>
      <div class="row campos">
          <div class="col-md-12">
            <h5>Productos que le interesan a la empresa</h5>
            <h6>Las 'palabras clave' hacen que la solicitud sea más visible a los proveedores.</h6>
            <?php echo form_error('productos_interes', '<div class="error">', '</div>'); ?>              
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="input-control">
             <?php
              $productos_interes=""; 
              foreach (explode(',',$empresa->productos_de_interes) as $registro) 
                {
                  $productos_interes.=",".$registro;
                }
             ?>
                  <input style="border-radius: 5px;"  name="productos_interes" type="text" id="productos_interes" class="form-control" value="<?=$productos_interes; ?>">
                </div>
          </div>
          <div class="col-md-12">
            <h6>Ingresa la palabra clave de productos que le interesan a la empresa y pulsa la tecla Enter </h6>
            <h6>Ej.: Zapato en cuero</h6>
          </div>
        </div>

    		</div>
    	</div>	
    </div>

    <div class="row seccion">
         </div>

      <div class="row campos">
          <div class="col-md-12">
           <div class="btn-group btn-group-lg vcenter" id="btn_submit">
            <button type="submit" class="btn btn-default"> Guardar Cambios </button>
          </div>
        </div>
      </div>

                  <?= form_close() ?>
       