<link href="<?php echo css_url().'index/formulario_solicitudes.css' ?>" rel="stylesheet">
<div class="row">     
     <div id="seo1_productos">
          <div class="col-md-12 fondo_color">
               <div class="col-md-4"></div>
                    <div class="col-md-4">
                    <p class="texto_resultado_2">No encontraste lo que estabas buscando?</p>
               </div>
               <div class="col-md-4"></div>
          </div>
          <div class="col-md-12 fondo_color">
               <div class="col-md-3"></div>
               <div class="col-md-4">
                    <a class="btn btn-solicitar" href="<?=base_url()?>publicar_oferta" style="    margin-bottom:100px">
                              <i class="fa fa-file-text icono-solicitar"></i> 
                              SOLICITAR COTIZACIÓN <br>
                         </a>
               </div>
               <div class="col-md-4"></div> 
          </div>
     </div>

     <div id="seo1_proveedores" style="display:none">
          <div class="col-md-12 fondo_color">
               <div class="col-md-4"></div>
                    <div class="col-md-4">
                    <p class="texto_resultado_2">No encontraste lo que estabas buscando?</p>
               </div>
               <div class="col-md-4"></div>
          </div>
          <div class="col-md-12 fondo_color">
               <div class="col-md-3"></div>
               <div class="col-md-4">
                    <a class="btn btn-solicitar" href="<?=base_url()?>publicar_oferta" style="    margin-bottom:100px">
                              <i class="fa fa-file-text icono-solicitar"></i> 
                              SOLICITAR COTIZACIÓN <br>
                         </a>
               </div>
               <div class="col-md-4"></div> 
          </div>
     </div>

     <div id="seo1_solicitudes" style="display:none">
          <div class="col-md-12 fondo_color">
               <div class="col-md-4"></div>
                    <div class="col-md-4">
                    <p class="texto_resultado_2">Busca más compradores?</p>
               </div>
               <div class="col-md-4"></div>
          </div>
          <div class="col-md-12 fondo_color">
               <div class="col-md-3"></div>
               <div class="col-md-4">
                    <a class="btn btn-solicitar" href="<?=base_url()?>publicar_producto" style="    margin-bottom:100px">
                              <i class="fa fa-file-text icono-solicitar"></i> 
                              PUBLICAR PRODUCTO <br>
                         </a>
               </div>
               <div class="col-md-4"></div> 
          </div>
     </div>


     <script type="text/javascript">
      cambiar_seo('<?=$div?>');

     function cambiar_seo(div)
     {
          document.getElementById('seo_productos').style.display='none';
          document.getElementById('seo_solicitudes').style.display='none';
          document.getElementById('seo_proveedores').style.display='none';

          document.getElementById('seo0_productos').style.display='none';
          document.getElementById('seo0_solicitudes').style.display='none';
          document.getElementById('seo0_proveedores').style.display='none';

          document.getElementById('seo1_productos').style.display='none';
          document.getElementById('seo1_solicitudes').style.display='none';
          document.getElementById('seo1_proveedores').style.display='none';
          document.getElementById('seo_'+div).style.display='';
          document.getElementById('seo0_'+div).style.display='';
          document.getElementById('seo1_'+div).style.display='';
          if(div=="productos")
               { document.title="<?=$nom_producto?>- Productos - Venta"}
          else if(div=="solicitudes")
               { document.title="<?=$nom_producto?>- Solicitudes de Compradores"}
          else
               { document.title="<?=$nom_producto?>- Proveedores - Empresas"}
          console.log(div);
     }
     </script>
</div>