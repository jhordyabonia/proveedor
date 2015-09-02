<div style="min-height:600px; padding:200px" >
  <CENTER>
  <?php if($permiso){ echo '<a href="'.base_url().'micro_admin" class="row btn btn-default btn-lg" id="boton_comprar">Volver</a>';}?>

  <br>
  <br>
 <div data-toggle="modal" class="row btn btn-default btn-lg" data-target="#<?=$id_popup?>" id="auto_launch">
  <?php if($permiso){echo "Ver";}else{ echo "Ver formulario";}?>
      </div>
    <script type="text/javascript">
       document.onload=ready();
         function ready()
           {
                  document.getElementById('auto_launch').click();
           }
    </script>
  </CENTER>
</div>