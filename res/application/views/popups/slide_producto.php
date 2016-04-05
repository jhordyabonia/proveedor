<style type="text/css">
/**
 *Para dar estilos a un div, imagen u objeto especifico
 *solo se referencia el objeto anteponieendo el caracter '#'
 *al id del objeto se abren llaves y se especifican a continuacion
 *los atributos de estilo deseados
 **/
#conten_pantalla
{
  height: 500px;
}
#pantalla
{
  max-width: 90%;
  max-height: 100%;
}
#conten_pantalla2
{
  position: absolute;
  top: 10%;
  left: 10%;
  height:80%;
  width: 80%;  
}
</style>
<div class="slide_producto" >
    <div class="modal fade" id="popup_slider" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog" >
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          </ol>
        <!-- Wrapper for slides -->
          <div id="conten_pantalla" class="carousel-inner">
            <center>
              <div  id="conten_pantalla2" class="item active">
                  <img id="pantalla" src="<?=base_url()?>uploads/<?=$imagen?>" alt="...">
              </div>
           </center>
          </div>
 
        <!-- Controls -->
          <a class="left carousel-control" href="JavaScript:anterior_imagen();" role="button" >
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="JavaScript:proxima_imagen();" role="button">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div> 
    </div>
  </div>              
</div>  
