<?php 
/**
 * Devuelve un meta con la imagen que va a aparecer en facebook
 * @param  string url de la imagen
 * @return string metatag con la propiedad og:image
 */
function get_meta_image($url_image_facebook = False)
{
    if ($url_image_facebook) {
        return  '<meta property="og:image" content="' . $url_image_facebook . '" />';
    }
    $default_url = base_url()."uploads/resize/pagina_producto/visualizador/default.jpg";
    return  '<meta property="og:image" content="' . $default_url . '" />';
}
?>
<?php if (isset($facebook) && is_array($facebook)): ?>
    <meta property="fb:app_id" content="1746467018915200">
    <meta property="og:title" content="<?php echo $titulo ?>">
    <meta property="og:site_name" content="Proveedor.com.co">
    <?php echo get_meta_image($facebook['url_image_facebook']) ?>

    <meta property="og:description" content="<?php echo $facebook['mensaje'] ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $titulo ?>" />
    <meta name="twitter:description" content="<?php echo $facebook['mensaje'] ?>" />
    <meta name="twitter:image" content="<?php echo $facebook['url_image_facebook'] ?>" />
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo $titulo ?>">
    <meta itemprop="description" content="<?php echo $facebook['mensaje'] ?>">
    <meta itemprop="image" content="<?php echo $facebook['url_image_facebook'] ?>">

<?php else: ?>
    <!-- No se agregó la información para compartir en redes sociales -->
<?php endif ?>