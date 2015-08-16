<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

  <!-- Con este script cerramos la ventana modal del index al iniciar y mostramos esta pagina -->
<script type="text/javascript">            
function window_onload() {  
 $(document).ready(function() { 
javascript:parent.jQuery.fancybox.close();
window.open('<?=base_url()?>admin', '_top');
});
}
</script>        
    </head>

    <body onload="window_onload();">
      <br>
     <h1 style="text-align: center"><?=$titulo?></h1>
     <p>Rol: <?=$this->session->userdata('rol_usuario')?></p>
     <?=anchor(base_url().'logueo/logout', 'Cerrar sesión')?>
     <br><br>


           
    </body>
</html>