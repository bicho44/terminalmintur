<?php
/**
* The template for the Front Page
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Filmarte
*/

get_header(); 

$opciones_imgd = get_option('opciones_imgd');

$slider = $opciones_imgd['imgd_slider'][0];
$slider_size = $opciones_imgd['imgd_slider_size'];

?>

<?php if ($slider!=0) {?>
	<?php include( locate_template( 'template-parts/carrousel.php' ) );?>
<?php } ?>

<?php
 while ( have_posts() ) : the_post();
 	the_content();
 endwhile; // End of the loop.
 ?>

<?php get_footer(); ?>