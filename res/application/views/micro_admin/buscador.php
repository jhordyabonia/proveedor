<br>
<br>
<br>
<br>
<CENTER>
  <link rel="stylesheet" href="<?php echo css_url() ?>perfil_empresa/header.css">
 <div class="col-md-11 col-sm-11 col-xs-12">
            <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="row form_buscador">                 
                 <?= form_open(base_url() . 'micro_admin/busqueda/Validar') ?> 
                  <div class="col-md-3 col-sm-3 col-xs-12 div_c_elem_buscador_select hidden-xs">
                    <select class="form-control" name="selec1" id="selec">
                      <option value="Empresas" selected>Empresas</option>
                      <option value="Productos">Productos</option>
                      <option value="Solicitud_internas">Solicitudes internas</option>
                    </select>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-9 div_c_elem_buscador_input">
                    <div class="input-group">
                      <input type="text" class="form-control input_busqueda" size="70" name="busqueda"
                        placeholder="Buscar productos, proveedores y productos solicitados">
                    </div>
                  </div>
                  <div class="btn-group">
                      <button type="submit" class="btn btn-default btn_busqueda">
                        <span class="glyphicon glyphicon-search" id="logo_buscar" aria-hidden="true"></span> 
                      </button>
                    </div>
                 <?= form_close() ?>
                </div>
              </div>
</CENTER>