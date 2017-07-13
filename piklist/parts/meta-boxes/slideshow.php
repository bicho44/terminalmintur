<?php
/*
Title: Slide Show Images
Post Type: page
Description: imágens para el slideshow
Priority: high
Order: 3
*/

piklist (
    'field',
    array(
        'type' => 'file',
        'scope' => 'post_meta',
        'field' => 'imgd_slideshow_images',
        'label' => __('Imágens para el SlideShow', 'imgd'),
        'description'=>__('Colocar acá las imágenes para que haya un slideshow en cada página','img')
        ,'options' => array(
            'title' => __('Imagenes del Programa', 'imgd')
            ,'button' => __('Inserte las imagenes', 'imgd')
        )
        ,'position' => 'wrap'
    )
);