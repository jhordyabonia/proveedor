
  <div style="background-color:'white';">
  <table style="max-width: 300px;  margin: auto; border-radius: 7px; text-align: center;">
    <tbody><tr>
      <td>
        <img style="max-width: 600px;" src="http://192.168.33.10/assets/img/header-email-platino.png" alt="">
      </td>
    </tr>
    <tr>
      <td>
        <strong>
          <p style="color: #FF7F27; font-size:'5px'; font-family:'Arial'">
            OPORTUNIDAD COMERCIAL
          </p>
          <div style="font-size: 15pt; color: #7F7F7F; font-family:'Arial'; margin-top: 1px; margin-bottom: 1px;">
            <input id="input_var_1" type="hidden" value="solicitud->nombre_empresa">
            <div class="var" id="var_1"><?=$solicitud->nombre_empresa?></div>
          </div>
          <div style="font-size: 15pt; color: #7F7F7F; font-family:'Arial'; margin-top: 1px; margin-bottom: 1px;">
            <input id="input_var_2" type="hidden" value="solicitud->nombres">
            <div class="var" id="var_2"><?=$solicitud->nombres?></div>
            </div> 
      </strong>
        <p style="color: #FF7F27; font-size: 26pt;">
           Tenemos nuevos clientes de 
        </p>
           <input id="input_var_3" type="hidden" value="solicitud->nombre_categoria">            
            <div class="var" id="var_3" style="color: #FF7F27; font-size: 26pt;"><?=$solicitud->nombre_categoria?></div>
        <p style="color: #FF7F27; font-size: 26pt;">
            para su empresa
        </p>
      </td>
    </tr>

<tr>
  <td>  <br>
        <br>
        <br>
        <table id="previa" style="max-width: 300px;" border="0" padding="4" margin="2" cellspading="2" bgcolor="#efefef"> 
       <tbody><tr>
          <th align="left"><p>Producto o isumo solicitado:</p></th><td align="left">
            <i>
              <input id="input_var_4" type="hidden" value="solicitud->solicitud"> 
              <div class="var" id="var_4"><?=$solicitud->solicitud?></div>
            </i>
        </td></tr><tr>
          <th align="left"><p>Descripcion de la solicitud:</p></th><td align="left">
            <i>           
              <input id="input_var_7" type="hidden" value="solicitud->descripcion">            
              <div class="var" id="var_7"><?=$solicitud->descripcion?></div>
            </i>
        </td></tr><tr>
          <th align="left"><p>Cantidad:</p></th><td align="left">
            <i>
              <input id="input_var_5" type="hidden" value="solicitud->cantidad_requerida"> 
              <div class="var" id="var_5"><?=$solicitud->cantidad_requerida?></div>
            </i>
        </td></tr><tr>
          <th align="left"><p>Precio máximo:</p></th><td align="left">
            <i>
              <input id="input_var_6" type="hidden" value="solicitud->precio"> 
              <div class="var" id="var_6"><?=$solicitud->precio?></div>
            </i>
        </td></tr><tr>
          <th align="left"><p>Forma de pago preferida:</p></th><td align="left">
            <i>
              <input id="input_var_8" type="hidden" value="solicitud->forma_de_pago"> 
              <div class="var" id="var_8"><?=$solicitud->forma_de_pago?></div>
            </i>
        </td></tr><tr>
          <th align="left"><p>Direccion de Email:</p></th><td align="left">
            <i>
              <input id="input_var_9" type="hidden" value="solicitud->email"> 
              <div class="var" id="var_9"><?=$solicitud->email?></div>
            </i>
        </td></tr><tr>  
          <th align="left"><p>Nombre y Apellidos:</p></th><td align="left">
            <i>
              <input id="input_var_10" type="hidden" value="solicitud->nombres"> 
              <div class="var" id="var_10"><?=$solicitud->nombres?></div>
            </i>
        </td></tr><tr>
          <th align="left"><p>Telefono:</p></th><td align="left">
            <i>
              <input id="input_var_11" type="hidden" value="solicitud->telefono"> 
              <div class="var" id="var_11"><?=$solicitud->telefono?></div>
            </i>
        </td></tr><tr>
          <th align="left"><p>Nombre empresa:</p></th><td align="left">
          
            <input id="input_var_12" type="hidden" value="solicitud->nombre_empresa"> 
            <div class="var" id="var_12"><?=$solicitud->nombre_empresa?></div>
          
        </td></tr><tr>
          <th align="left"><p>Ciudad de entrega:</p></th><td align="left">
            <i>
              <input id="input_var_13" type="hidden" value="solicitud->ciudad_entrega"> 
              <div class="var" id="var_13"><?=$solicitud->ciudad_entrega?></div>
            </i>
         </td></tr>
        </tbody></table>
        <br>
        <br>
        <br>
  </td>
</tr>
    <tr>
      <td>
        <img style="max-width: 600px;" src="http://192.168.33.10/assets/img/footer-email-platino.png" alt="">
      </td>      
    </tr>
  </tbody></table>
      </div>