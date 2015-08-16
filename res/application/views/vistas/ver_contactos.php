
      <?php  foreach ($contacto as $registro): ?> 
      <div class="result" style="padding-bottom: 7px;"> 
  <table width="100%" height="auto" border="1" style="border: 4px solid #ddd" >
   <tbody><tr> 
   <td width="28%" style="vertical-align: middle; font-weight: bold; text-align: center;">
 <img src="<?=base_url()?>uploads/logos/<?= $registro->logo ?>" width="110" height="47">
  <?= $registro->nombre ?> </td> 
    <td width="10%" style="vertical-align: middle; text-align: center;"><?= $registro->usuario ?></td>
    
  <td width="15%" style="vertical-align: middle; color: blue;"> 
  Cel.: <?= $registro->celular ?> <br> Tel.: <?= $registro->fijo ?></td>
  <td width="10%" style="vertical-align: middle; text-align: center;"><?= $registro->ciudad ?></td>
  <td width="13%" style="vertical-align: middle; text-align: center;">
    <img src="img/certificado.png"></td>
  <td width="auto" style="vertical-align: middle;">
  <a href="#" style="margin-right: -4px;"> <img src="img/disponible.png"  width="76px" height="79"> </a>
  <a href="<?=base_url()?>contactar_usuario" style="margin-right: -4px;"> <img src="img/contactar.png"  width="76px" height="79"> </a>
  <a href="#" style="margin-right: -4px;"> <img src="img/call.png"  width="76px" height="79"> </a>
     
</td></tr>
 </tbody></table>
</div> 
      <?php endforeach; ?>
     
