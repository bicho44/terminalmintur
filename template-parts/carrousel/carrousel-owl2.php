<?php
/*
 * Carrousel Owl
 *
 */

// <!-- start loop SlideShow -->
//echo '<h2>OWL</h2>';
$carrousel ='';

// Verifico que la noticia tenga imágen
if (imgd_has_slideshow_thumbnail(get_the_ID(),'imgd_slideshow_images')) {
    $class = "item";
    /* Obtengo el URL de la imagen principal */
    $post_thumbnail_ids = imgd_get_slideshow_thumbnail_id(get_the_ID(), 'imgd_slideshow_images');
    if($post_thumbnail_ids){

        foreach($post_thumbnail_ids as $key=>$val)
        {
            $carrousel .= '<div class="' . $class . '">';
            $html = wp_get_attachment_image_src($val, 'show-cropped' );
             //var_dump($html);

            $carrousel .= '<img src="' . $html[0] . '" alt="' . get_the_title() . '">';
            //echo $key . ' : ' . $val[0] . '<br/>';
             $carrousel .='</div><!-- end item -->';
        }

        //$html = wp_get_attachment_image_src($post_thumbnail_id, $slider_size );

    } /*else {
        echo '<h1>'.$post_thumbnail_ids.'</h1>';
    }*/

    /*$carrousel .='<div class="carousel-caption">';

    $carrousel .='<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
    $carrousel .= '<p class="hidden-xs hidden-sm">' . imgd_content(33) . '</p>';
    $carrousel .='</div>'<!-- end CAPTION-->;*/

   

} /*else {
    echo 'Test SlideShow false '. imgd_has_slideshow_thumbnail(get_the_ID(),'imgd_slideshow_images');
}*/


//<!-- end loop SlideShow -->
// var_dump($noThumb);    ?>

<?php if ($carrousel != '') { ?>
    <!-- Carrousel -->
        <div id="SlideShow" class="owl-carousel">
                <?php echo $carrousel; ?>
        </div>
    <!-- end Carrousel -->
<?php
} //End Check Carrousel
//echo '<h1>'.$nothumb.'</h1>';
