  <div style="background-color:'white';">
  <table style="max-width: 300px;  margin: auto; border-radius: 7px; text-align: center;">
    <tr>
      <td>
        <img style="max-width: 600px;" src="<?php echo img_url() ?>header-email-platino.png" alt="">
      </td>
    </tr>
    <tr>
      <td>
        <strong>
          <p style="line-height:15px; color: #FF7F27; font-size:'35px'; font-family:'Arial' padding-top: 15px; margin-top: 15px; margin-bottom: 20px;" >
            OPORTUNIDAD COMERCIAL
          </p>
          <div style="line-height:10px; font-size: 16px; color: #7F7F7F; font-family:'Arial'; margin-top: 5px; margin-bottom: 1px;">
            <input id="input_var_1" type="hidden" value="solicitud->nombre_empresa">
            <div class="var" id="var_1">
            <?php echo $solicitud->nombre_empresa ?>  
            </div>
            <br>
          </div>
          <div style="line-height:10px; font-size: 16px; color: #7F7F7F; font-family:'Arial'; margin-top: 5px; margin-bottom: 1px;">
            <input id="input_var_2" type="hidden" value="solicitud->nombres">
            <div class="var" id="var_2">
            <?php echo $solicitud->nombres ?>
            </div>
            </div> 
            <br>
      </strong>
        <p style="line-height:15px; color: #FF7F27; font-size: 25px;">
           Tenemos nuevos clientes de 
        </p>
           <input id="input_var_3" type="hidden" value="solicitud->nombre_categoria">            
            <div class="var" id="var_3" style="line-height:15px; color: #FF7F27; font-size: 25px;">
            <?=$solicitud->nombre_categoria?> 
            </div>
        <p style="color: #FF7F27; font-size: 25px;">
            para su empresa
        </p>
      </td>
    </tr>

<tr>
  <td>  <br>
       
        <TABLE id="previa" style="max-width: 100%;border-color:white;" BORDER='0' padding='4' margin='2' cellspading='2' bgcolor='#efefef'> 
       <TR>
          <th align='left'><p>Producto o insumo solicitado:</p><td align='left'>
            <I>
              <input id="input_var_4" type="hidden" value="solicitud->solicitud"> 
              <div class="var" id="var_4">
                <?=$solicitud->solicitud?>
              </div>
            </I>
        <TR>
          <th align='left'><p>Descripcion de la solicitud:</p><td align='left'>
            <I>           
              <input id="input_var_7" type="hidden" value="solicitud->descripcion">            
              <div class="var" id="var_7">
                <?=$solicitud->descripcion?>
              </div>
            </I>
        <TR>
          <th align='left'><p>Cantidad:</p><td align='left'>
            <I>
              <input id="input_var_5" type="hidden" value="solicitud->cantidad_requerida"> 
              <div class="var" id="var_5">
                <?=$solicitud->cantidad_requerida?>
              </div>
            </I>
        <TR>
          <th align='left'><p>Precio máximo:</p><td align='left'>
            <I>
              <input id="input_var_6" type="hidden" value="solicitud->precio"> 
              <div class="var" id="var_6">
                <?=$solicitud->precio?>
              </div>
            </I>
        <TR>
          <th align='left'><p>Forma de pago preferida:</p><td align='left'>
            <I>
              <input id="input_var_8" type="hidden" value="solicitud->forma_de_pago"> 
              <div class="var" id="var_8">
                <?=$solicitud->forma_de_pago?>
              </div>
            </I>
        <TR>
          <th align='left'><p>Direccion de Email:</p><td align='left'>
            <I>
              <input id="input_var_9" type="hidden" value="solicitud->email"> 
              <div class="var" id="var_9">
                <?=$solicitud->email?>
              </div>
            </I>
        <TR>  
          <th align='left'><p>Nombre y Apellidos:</p><td align='left'>
            <I>
              <input id="input_var_10" type="hidden" value="solicitud->nombres"> 
              <div class="var" id="var_10">
                <?=$solicitud->nombres?>
              </div>
            </I>
        <TR>
          <th align='left'><p>Telefono:</p><td align='left'>
            <I>
              <input id="input_var_11" type="hidden" value="solicitud->telefono"> 
              <div class="var" class="var" id="var_11">
                <?=$solicitud->telefono?>
              </div>
            </I>
        <TR>
          <th align='left'><p>Nombre empresa:</p><td align='left'>
          </I>
            <input id="input_var_12" type="hidden" value="solicitud->nombre_empresa"> 
            <div class="var" id="var_12">
              <?=$solicitud->nombre_empresa?>
            </div>
          </I>
        <TR>
          <th align='left'><p>Ciudad de entrega:<td align='left'>
            <I>
              <input id="input_var_13" type="hidden" value="solicitud->ciudad_entrega"> 
              <div class="var" id="var_13">
                <?=$solicitud->ciudad_entrega?>
              </div>
            </I>
         </TR>
        </TABLE>
        <br> 
        <center>
        <div style="max-width: 300px;">
          <p>
            www.Proveedor.com.co
          </p>
          <p>
            Asesor
          </p>
        </div>
        </center>
        <br>
        <br>
        <br>
  </td>
</tr>
    <tr>
      <td>
        <img style="max-width: 600px;" src="<?php echo img_url() ?>footer-email-platino.png" alt="">
      </td>      
    </tr>
  </table>
      </div>