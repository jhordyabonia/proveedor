<input placeholder="Nombre categoria" onchange="nueva_categoria=this.value;" ><button onclick="make(nueva_categoria)">Agragar</button>   
<div class='main row' id="main"> 
   <?php if($categorias):?>
        <?php foreach ($categorias as $key => $item):?>
            <div id='div<?=$item->id?>' align='center' class='caja col-md-3 col-xs-3 col-lg-3' 
                draggable='true' ondragstart='dragstart(this, event)' ondrop='drop(this, event)' 
                ondragenter='return false' ondragover='return false'>
                <a href='<?=$url?>/show/<?=$item->id?>'>
                    <div class='col-md-8 col-xs-8 col-lg-8'>
                        <span class='glyphicon glyphicon-folder-open directori'></span><br><?=$item->nombre?>
                    </div>
                </a>
                <div class='col-md-4 col-xs-4 col-lg-4'>
                <div class='funciones'>
                        <a onclick='up(<?=$item->id?>)'><span class='glyphicon glyphicon-upload'></span>Subir</a>
                        <a onclick='del(<?=$item->id?>)'><span class='glyphicon glyphicon-trash'></span>Eliminar</a>
                    </div>
                </div>            
            </div>
        <?php endforeach;?>
    <?php else:?>
        <h2 align='center'>
            <br>No hay subcategorias aquí
        </h2> 
    <?php endif;?>
</div>