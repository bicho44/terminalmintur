
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Turismo_InterOceánico
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content row">
		
		<div class="col-md-9">
		<?php
			if (has_post_thumbnail()){
				
				if(imgd_has_slideshow_thumbnail(get_the_ID(),'imgd_slideshow_images')){
					require( locate_template( 'template-parts/carrousel/carrousel-owl2.php' ) );
				} else {
					the_post_thumbnail('show-cropped');
				}
			}
		?>
		</div>
		 <div class="col-md-3">
			<?php
				the_content();
			?>
		</div>
		<?php

			echo wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'imgd' ),
				'after'  => '</div>',
			) );

		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">

			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'turismointer' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
