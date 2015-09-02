	<link href="<?php echo css_url().'index/carousel_horizontal.css' ?>" rel="stylesheet">
 	<!--<link href="<?=base_url()?>assets/carrouseles/owl-carousel/owl.carousel.css" rel="stylesheet">-->
    <script src="<?=base_url()?>assets/carrouseles/assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?=base_url()?>assets/carrouseles/owl-carousel/owl.carousel.min.js"></script>
    
    <script>

    $(document).ready(function($) {
      $("#productos_destacados").owlCarousel();
    }); 
    $(document).ready(function($) {
      $("#productos_publicados").owlCarousel();
    }); 
    $(document).ready(function($) {
      $("#oportunidades").owlCarousel();
    }); 
    $(document).ready(function($) {
      $("#empresas").owlCarousel();
    }); 
    
    $("body").data("page", "frontpage");

    </script>
    <script src="<?=base_url()?>assets/carrouseles/assets/js/bootstrap-collapse.js"></script>
    <script src="<?=base_url()?>assets/carrouseles/assets/js/bootstrap-transition.js"></script>

    <script src="<?=base_url()?>assets/carrouseles/assets/js/google-code-prettify/prettify.js"></script>
	  <script src="<?=base_url()?>assets/carrouseles/assets/js/application.js"></script>

    <script type="text/javascript">
    jQuery(function($){
      var disqus_loaded = false;
      var top = $("#faq").offset().top; 
      var owldomain = window.location.hostname.indexOf("owlgraphic");
      var comments = window.location.href.indexOf("comment");

      if(owldomain !== -1){
        function check(){
          if ( (!disqus_loaded && $(window).scrollTop() + $(window).height() > top) || (comments !== -1) ){
            $(window).off( "scroll" )
            disqus_loaded = true;
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'owlcarousel'; // required: replace example with your forum shortname
            var disqus_identifier = 'OWL Carousel';
            //var disqus_url = 'http://owlgraphic.com/owlcarousel/';
            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
          }
        }
        $(window).on( "scroll", check )
        check();
      } else {
        $('.disqus').hide();
      }
    });
    </script>

    <script>
    var owldomain = window.location.hostname.indexOf("owlgraphic");
    if(owldomain !== -1){
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-41541058-1', 'owlgraphic.com');
      ga('send', 'pageview');
    }
    </script>
