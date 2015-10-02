
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
          <p style="color: #FF7F27; font-size:'5px'; font-family:'Arial'" >
            OPORTUNIDAD COMERCIAL
          <p style="font-size: 15pt; color: #7F7F7F; font-family:'Arial'; margin-top: 1px; margin-bottom: 1px;">
            <?php echo $solicitud->nombre_empresa ?> <!-- Variable -->
          <p style="font-size: 15pt; color: #7F7F7F; font-family:'Arial'; margin-top: 1px; margin-bottom: 1px;">
            <?php echo $solicitud->nombres ?> <!-- Variable -->
      </strong>
        <p style="color: #FF7F27; font-size: 26pt;">
           <?php echo "Tenemos nuevos clientes de ".$solicitud->nombre_categoria." para su empresa" ?> <!-- Variable -->
        <p>
      </td>
    </tr>

<tr>
  <td>  <br>
        <br>
        <br>
        <TABLE id="previa" style="max-width: 300px;" BORDER='0' padding='4' margin='2' cellspading='2' bgcolor='#efefef'> 
        <?php if($solicitud->solicitud):?>
        <TR>
          <th align='left'>Producto o isumo solicitado:<td align='left'><I><?=$solicitud->solicitud?></I>
        <?php endif;?>
        <?php if($solicitud->descripcion):?>
        <TR>
          <th align='left'>Descripcion de la solicitud:<td align='left'><I><?=$solicitud->descripcion?></I>
        <?php endif;?>
        <?php if($solicitud->cantidad_requerida):?>
        <TR>
          <th align='left'>Cantidad:<td align='left'><I><?=$solicitud->cantidad_requerida?></I>
        <?php endif;?>
        <?php if($solicitud->precio):?>
        <TR>
          <th align='left'>Precio máximo:<td align='left'><I><?=$solicitud->precio?></I>
        <?php endif;?>
        <?php if($solicitud->forma_de_pago):?>
        <TR>
          <th align='left'>Forma de pago preferida:<td align='left'><I><?=$solicitud->forma_de_pago?></I>
        <?php endif;?>
        <?php if($solicitud->email):?>
        <TR>
          <th align='left'>Direccion de Email:<td align='left'><I><?=$solicitud->email?></I>
        <?php endif;?>
        <?php if($solicitud->nombres):?>
        <TR>  
          <th align='left'>Nombre y Apellidos:<td align='left'><I><?=$solicitud->nombres?></I>
        <?php endif;?>
        <?php if($solicitud->telefono):?>
        <TR>
          <th align='left'>Telefono:<td align='left'><I><?=$solicitud->telefono?></I>
        <?php endif;?>
        <?php if($solicitud->nombre_empresa):?>
        <TR>
          <th align='left'>Nombre empresa:<td align='left'></I><?=$solicitud->nombre_empresa?></I>
        <?php endif;?>
        <?php if($solicitud->ciudad_entrega):?>
        <TR>
          <th align='left'>Ciudad de entrega:<td align='left'><I><?=$solicitud->ciudad_entrega?></I>
      <?php endif;?>
         </TR>
        </TABLE>
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