<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Turismo_InterOceánico
 */
	if (!isset($opciones_imgd)){
		$opciones_imgd=get_option( 'opciones_imgd' );
	}
 ?>
<?php if ($opciones_imgd['imgd_show_footer'][0]!=0){

$class="align-right";
?>
	<div class="wrapfooter">
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-1-sidebar' ) ) { ?>
					<?php $class="col-md-8 align-right"; ?>
    					<?php dynamic_sidebar( 'footer-1-sidebar' ); ?>
					<?php } ?>
					
					<?php if ( is_active_sidebar( 'footer-2-sidebar' ) ) { ?>
					<?php $class="col-md-4 align-right"; ?>
							<?php dynamic_sidebar( 'footer-2-sidebar' ); ?>
					<?php } ?>

					<div class=<?php echo $class;?>>
					<!-- Menu Social -->
					<?php get_template_part('template-parts/menu', 'social'); ?>

					<?php if ( is_active_sidebar( 'footer-3-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'footer-3-sidebar' ); ?>
					<?php } ?>
					</div>
				</div>
			</div><!-- End Container -->
		</footer>
		<div class="container">
			<div class="credits row">
				<?php imgd_credits(); ?>
			</div>
		</div>
	</div> <!-- #wrapfooter -->
<?php } //End Check Show Footer ?>

</div><!-- end Page -->

<?php wp_footer(); ?>
</body>
</html>
