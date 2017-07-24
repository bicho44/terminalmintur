<?php
/**
* Template Name: Full Size Width Childs
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
				get_template_part( 'template-parts/content', 'page-grid' );


			if (!isset($opciones_imgd)){
				$opciones_imgd=get_option( 'opciones_imgd' );
			}
			if ($opciones_imgd['imgd_magic_tabs'][0]!=0){
				
				//echo "ID=".get_the_ID();
				$parent = get_imgd_child_pages($post_ID);

				if($parent->have_posts()){
					imgd_child_grid(get_the_ID());
				}
			}
				
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- Row -->
</div><!-- #primary -->
<?php get_footer();?>
