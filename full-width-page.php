<?php
/**
* Template Name: Full Size Width Page
* Página todo a lo ancho sin sidebar
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Filmarte
*/

get_header(); ?>

<div id="primary" class="content-area container">
	<div class="row">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- Row -->
</div><!-- #primary -->
<?php
get_footer();
