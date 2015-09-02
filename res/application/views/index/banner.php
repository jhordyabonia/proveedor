<link rel="stylesheet" href="<?php echo base_url()?>assets/css/index/index.css">
<script type="text/javascript">
  $(document).ready(function(){
    $('#carouselInicio').carousel({interval: 3000});
  });
</script>
<div class="row" style="margin: 201px 0px 0px;">
  <!-- Seccion de Carousel -->
  <div class="row" id="foto_principal">
    <!-- Carousel-->
    <div id="carouselInicio" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php foreach ($banners as $i => $banner): ?>
            <li data-target="#carouselInicio" data-slide-to="<?php echo $i; ?>" 
              class="<?php echo $banner['active']; ?>"></li>
          <?php endforeach ?>
        </ol>
        <div class="carousel-inner" >
          <?php foreach ($banners as $banner): ?>
            <div class="item <?php echo $banner['active']; ?>">
              <a href="<?php echo $banner['url']; ?> ">
                <img src="<?php echo $banner['img_url']; ?>" class="img-responsive" style="width: 100%;">
              </a>
            </div>
          <?php endforeach ?>
        </div>
        <!-- Controls -->
        <!--<a class="left carousel-control" href="#carouselInicio" data-slide="prev" style="z-index:1;"></a>
        <a class="right carousel-control" href="#carouselInicio" data-slide="next" style="z-index:1;"></a> -->
    </div> 
  </div>
</div>