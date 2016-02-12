<?php 
function get_meta_image($url_image_facebook = False)
{
	if ($url_image_facebook) {
		return  '<meta property="og:image" content="' . $url_image_facebook . '" />';
	}
	$default_url = base_url()."uploads/resize/pagina_producto/visualizador/default.jpg";
	return  '<meta property="og:image" content="' . $default_url . '" />';
}
?>
<meta property="fb:app_id" content="1746467018915200">
<meta property="og:title" content="<?php echo $titulo ?>">
<meta property="og:site_name" content="Proveedor.com.co">
<?php echo $url_image_facebook ?>
<?php echo get_meta_image($url_image_facebook) ?>
<meta property="og:description" content="" />
