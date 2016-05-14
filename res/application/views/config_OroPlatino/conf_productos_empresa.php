<div id="lanzador_popup_productos" data-toggle="modal" data-target="#popup_info">
</div>

<div class="modal" id="popup_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
    <div class="modal-dialog">
        <div class="modal-content modal-content-two popup-productos">
            <div class="modal-header header">
                <h4>
                    <button id="close" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
                    <CENTER>
                        Seleccione el producto "Principal" <?=$identificador_temporal+1?>.
                        <br>
                        <?php if($page>0):?>
                            <a class="btn" href="JavaSrcipt:void();" onclick="JavaScript:page--;lanzar_popup(<?=$identificador_temporal?>)"><span aria-hidden="true">Anterior</span></a>    
                        <?php endif;?>
                        <?php if($productos):?>
                            <a class="btn" href="JavaSrcipt:void();" onclick="JavaScript:page++;lanzar_popup(<?=$identificador_temporal?>)"><span aria-hidden="true">Siguiente</span></a>
                        <?php endif;?>
                    </CENTER>
                </h4>
            </div>
        	<div class="modal-body contenido_popup">
               
            	<div class="conten-item-catapu2 row">
                    <?=$empresa->nombre?>
                        <?php if($productos):?>
                            <?php foreach($productos as $producto):?>
                            <?php if(!$producto){continue;}?>
                                <?php $imagen="default.jpg";
                                    foreach (explode(',', $producto->imagenes) as $key => $value) 
                                    {
                                        if(!is_null($value))
                                        {$imagen=$value; break;}
                                    }
                                    ?>
                                <div class="padding-bottom col-lg-6">
                                    <div class="imagen-prin inline-block content_imxx">
                                        <img class="img-responsive imgxx" src="<?=verificar_imagen('uploads/'.$imagen)?>">
                                    </div>
                                    <div class="info-pro-pri inline-block">
                                        <p class="txt_nomproducto2" ><?=$producto->nombre?></p>
                                        <p class="txt_precio"><?php if($producto->precio_unidad==0){echo "Precio a convenir.";}else{echo '$'.decimal_points($producto->precio_unidad);}?></p>
                                        <p class="txt_pedido"><?php if($producto->pedido_minimo==0){echo "Pedido mínimo a convenir.</p>";}else{echo decimal_points($producto->pedido_minimo)." ".($producto->medida).'<p class="txt_pedido">pedido mínimo</p>';}?>
                                        <p class="txt_desc"><?=strip_tags($producto->descripcion)?></p>
                                        <div class="input-group style-padding6 col-xs-12 col-md-8 col-lg-8" style="padding:2%;">
                                            <button class="btn btn-primary" onclick="agregar(<?=$identificador_temporal?>,<?=$producto->id?>);">
                                                <span class="ico-config-style glyphicon glyphicon-bookmark"></span>
                                                Seleccionar como Principal
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        <?php else:?>
                            <div>
                                <CENTER>
                                    <h3>No tienes mas productos</h3>
                                </CENTER>
                            </div>
                        <?php endif;?>
                 </div>
        	</div>
        </div>
    </div>
</div>