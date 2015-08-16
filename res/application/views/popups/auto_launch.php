<link rel="stylesheet" type="text/css" href="<?php echo css_url()?>styles_login.css">
	<script type="text/javascript">
	   document.onload=ready();
       function ready()
         {
            var popup=new XMLHttpRequest();
            var url_popup="<?=base_url()?>popup/<?=$view?>";
            popup.open("GET", url_popup, true);
            popup.addEventListener('load',show,false);
            popup.send(null);
            function show()
              {
                ready=document.getElementById('ready');
                ready.innerHTML=popup.response;
                console.log(popup.response);
                document.getElementById('auto_launch').click();
              }
       }
  </script>
<div data-toggle="modal" data-target="#<?=$id_popup?>" id="auto_launch">
    </div>
  <div id="ready">
    </div>