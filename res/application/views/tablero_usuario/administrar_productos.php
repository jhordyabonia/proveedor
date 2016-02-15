<head>

  <link rel="stylesheet" type="text/css" href="<?php echo css_url(); ?>administrar_productos.css">
  <script type="text/javascript">
     jQuery(document).ready(function($) {
        $("#publicar_producto").addClass('active');
    });
  </script>
 </head>

  

    <!-- Contenedor Central --><br>
    <!-- Contenedor Central --><br>
    <!-- Contenedor Central --><br>
    <!-- Contenedor Central --><br>
  <div class="container-fluid" style="margin-top:50px">
    
      
    
      <!-- row -->
      <div class="row">

       <div class="row">
  
          <div class="col-xs-4 col-xs-push-2" style="margin-left: 20px;">
            <h2>Administrar mis productos</h2>
          </div>
          
          <div class="col-xs-3 col-xs-push-4 h31">
            <h3>Productos Publicados  
            <!--Numero de productos publicados traidos desde la bd -->
             <b style="color: #ff7e00;"> <?php echo $productos_cantidad; ?> </b>
            </h3> 
            
            
             
          </div>
          
          <div class="col-xs-1 col-xs-push-4 h31" style="margin-left: -45px;">
            <img src="<?php echo img_url(); ?>administrar_productos/icono_prod_publicados.png">
          </div>
      
        </div>



        <div class="col-sm-2" style="margin-top:-100px"> <!-- columna vacia para dejar espacio de botones -->
          
          <!-- div boton Publicar productos -->
      
        <div class="col-xs-3 col-xs-push-2 col-sm-12 col-sm-push-0 text-center btn1 " 
           onclick="location.href='<?= base_url() ?>publicar_producto';" 
           style="cursor:pointer;">
           <img src="<?php echo img_url(); ?>Tablero_usuario/Publicar_Producto.png" 
          class="img-responsive img_btn1">
          <h4>Publicar <br> Producto</h4>
        </div>

      

      <!-- div boton Administrar mis productos -->
      
          <div class="col-xs-3 col-xs-push-4 col-sm-12 col-sm-push-0 text-center btn2 ">
            <img src="<?php echo img_url(); ?>Tablero_usuario/Ediccion_de_producto.png" 
            class="img-responsive img_btn1">
            <h4>Administrar <br> mis productos</h4>
          </div>

      </div>  

        

        <!-- columna de tamaño 9 para la tabla un espacio -->
        <div class="col-xs-10 col-xs-push-0 table-responsive " >
         <CENTER>
          <table class="table table-bordered table-hover ">
            <thead>
              <tr>
                <th style="text-align: center;">Producto</th>
                <th style="text-align: center;">Imagenes</th>
                <th class="hidden-xs" style="text-align: center;">Fecha de Publicacion</th>
                <th style="text-align: center;">Editar</th>
                <th style="text-align: center;">Eliminar</th>
              </tr>
            </thead>
              <tbody>  
                <?php if ($productos):  ?>
                <?php foreach ($productos as $producto):  ?>
                  <tr>
                    
                    <td width="20%" >                       
                       <a href="<?= base_url(); ?>producto/ver/<?=$producto->id?>/" >
                         <h5 style="margin: 15% 10% ;">
                          <?=$producto->nombre?>
                          </h5>
                        </a>
                      </td>
                    <td width="20%" > 
                     <a href="<?= base_url(); ?>producto/ver/<?=$producto->id?>/" >
                        <div class="center-block" style="height: 120px; width: 120px; /* border-style: solid; */">
                            <img src="<?= base_url() ?>uploads/<?=$producto->nombre_img?>" 
                            class="img-responsive center-block" style="/* margin: auto auto; */ height: 85%;"/>
                            <!-- <img src="<?= base_url() ?>uploads/resize/<?=$producto->nombre_img?>" width="80px" height="118px"/> -->
                        </div>
                    </td>
                      </a>
                    <td width="20%" > 
                       <h5 style="margin: 20% 30%;"> 
                        <?= $producto->fecha_publicacion ?> 
                       </h5>   
                    </td>
                      
                    <td width="15%" > 
                      <a href="<?= base_url()?>producto/editar/<?=$producto->id?>">  
                        <span class="glyphicon glyphicon-pencil" style="font-size: 30px; margin: 20% 40%;"> 
                      </a> 
                    </td>
                    
                    <td width="15%"> 
                      <a href="JavaScript:confirmar_eliminar(<?=$producto->id?>)"> 
                        <span class="glyphicon glyphicon-trash" style="font-size: 30px; margin: 20% 40%;"> 
                      </a> 
                    </td>

                  </tr>
                  <?php endforeach; ?>   
                  <?php endif; ?>                
              </tbody>
          </table>
         </CENTER>
        </div>

    </div><!-- Fin row tabla de productos -->
  </div><!-- Fin Container-fluid -->

<script type="text/javascript">

       function confirmar_eliminar(id)
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/eliminar_producto/"+id;
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                popup_eliminar=document.getElementById('popup_eliminar');
                popup_eliminar.innerHTML=popup.response;
                console.log(popup.response);
                document.getElementById('launch_popup_eliminar').click();
              }
       }
  </script>
  <div data-toggle="modal" data-target="#eliminar_producto" id="launch_popup_eliminar">
    </div>
  <div id="popup_eliminar">
    </div>
