<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Filmarte
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'filmarte' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
<?php
	if (!isset($opciones_imgd)){
		$opciones_imgd=get_option( 'opciones_imgd' );
	}
 ?>
<?php
	if ($opciones_imgd['imgd_show_social_in_primary_menu'][0]!=0){
		get_template_part('template-parts/menu','bootstrap-con-social'); 
	} else {
		get_template_part('template-parts/menu','bootstrap'); 
	}
?>

	</header><!-- #masthead -->
