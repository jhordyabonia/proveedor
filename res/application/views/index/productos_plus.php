

<!-- Productos de la pestaña 1 -->
<table width="auto" height="auto" style="border-collapse: separate; border-spacing: 2px;"> 
    <tr>

<?php  $x=0;
foreach ($prod_plus1 as $row): ?> 
    <td class="c_prodplus"> <div class="c_prodplus_divgen">
        <center> 
        <div style="padding: 5px 7px 5px 7px;">
        <table width="auto" style="font-size: 13px;">
            <tr> <td style="text-align: center; vertical-align: middle; height: 102px;">
                <a href="<?=base_url()?>producto/ver/<?= $row->id_producto;?>/<?= $row->id_usuario;?>">
                    <img src="<?= base_url()?>uploads/<?php echo $row->nombre_img; ?>" class="c_prodplus_imagen"/>
                </a>
                </td> </tr>
            <tr> <td style="padding-bottom: 8px; padding-top: 15px;">
                    <a href="<?=base_url()?>producto/ver/<?= $row->id_producto;?>/<?= $row->id_usuario;?>"> <p style="color: #3aa2ed; font-size: 15px;" > 
                        <?php echo $row->nom_producto; ?> </p> </a> 
                </td> </tr>
            <tr> <td style="padding-bottom: 8px;">
                <center> <table>
            <tr>
                <td> <p class="precio_signo_pesos"> $ </p> </td>
                <td style="vertical-align: middle;">
                <table>
                    <tr> <td> <center> <p class="precio_precio"> 
                        <?php echo $row->precio_unidad; ?> </p> </center> </td>
                    </tr>
                     <tr> <td> 
                        <center> <img src="img/sonrisaprecio.png" style="margin-top: -6px;" />
                         </center> </td>
                        </tr>
                </table> </td>
                        </tr>
                        <tr> <td style="color: gray; font-size: 15px; text-align: center; padding-top: 4px;" colspan="2">
                            <p style="margin-top: -5px;"> <?php echo $row->pedido_min; ?> unidades </p>
                        </td> </tr>
                        <tr> <td style="color: gray; font-size: 11px; text-align: center; padding-top: 4px;" colspan="2">
                            <p style="margin-top: -3px;"> pedido mínimo </p>
                        </td> </tr>
                            </table> </center> </td> </tr>
                                <tr> <td style="text-align: center; padding-top: 0px; vertical-align: middle; height: 55px;">
                                <a href="<?=base_url()?>perfil/ver_empresa/<?php echo $row->id_usuario; ?>/<?php echo $row->nit; ?>">
                                    <img src="<?=base_url()?>uploads/logos/<?php echo $row->logo; ?>" class="c_prodplus_imagensec" />
                                </a>
                                </td> </tr>
                            </table> </div> </center> </div>
    </td>


 <?php if($x==4){ ?>
     </tr><tr>
    <?php }
     ?>

     <?php $x++; endforeach; ?>
     </tr>

</table>


                                              
                                            