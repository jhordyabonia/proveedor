<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Img | Uno que usé</title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico" />
	<!-- libreria de javascript jQuery	 -->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<style>
		img{
			width: 100px;
		}
	</style>
</head>
<body>

<script type="text/javascript">
var ruta = "<?php echo base_url() ?>upload/imagen";
var id_multipart_for ="#formulario";
var id_boton_examinar="#btn_archivos";
var id_boton_examina="btn_archivos";
var id_boton_subir="#subir";
var id_div_preview="#preview";
var id_div_resultado="#result";
$(document).ready(function () {
		$(id_boton_examinar).on('change',	function () {
			$(id_div_preview).html('');
			var paths = document.getElementById(id_boton_examina).files;
			var navegador = window.URL || window.webkitURL;
			for (var i = paths.length - 1; i >= 0; i--) {
				var valid=true;
				size=paths[i].size;
				type=paths[i].type;
				name=paths[i].name;
				
				if (size>1024*1024) {
					$(id_div_preview).append("El tamaño es muy grande<br>");
					valid=false;
				};
				if (type!='image/jpeg' && type!='image/png' && type!='image/bmp') {
					$(id_div_preview).append("El archivo "+name+" no es un tipo valido<br>");	
					valid=false;
				};
				if (valid) {
					url=navegador.createObjectURL(paths[i]);
					$(id_div_preview).append('<img src="'+url+'" alt="'+name+'">');
				};
			};
		});
		$(id_boton_subir).on('click',function(){
			var form_data = new FormData($(id_multipart_for)[0]);
			$.ajax({
				url:ruta,
				type:"post",
				data: form_data,
				contentType: false,
				processData: false,
				success: function (datos) {
					$(id_div_resultado).html(datos);
				}
			});
			
		});
	});
</script>

<form method="post" id="formulario" enctype="multipart/form-data">
	<p>Subir imagen</p>
	<input type="file" id="btn_archivos" name="userfiles[]" multiple>	
	<input type="button" id="subir" value="Subir imagenes">
</form>
<div id="preview">
	
</div>
<div id="result">
	
</div>