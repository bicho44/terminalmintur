<?php
/**
 * Header Bootstrap
 *
 * Menu Markup Bootstrap
 *
 * Creator: bicho44
 * Date: 06
 */
?>
<!-- <div class="container"> -->
<nav class="navbar navbar-default animate">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
			        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand"
			   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img
					src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-header.png"
					alt="<?php esc_attr(bloginfo('name')); ?>"
					></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php
			wp_nav_menu( array(
					'menu' => 'primary',
					'theme_location' => 'primary',
					'depth' => 2,
					'container' => 'div',
					/*'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
					'container_id' => 'bs-example-navbar-collapse-1',*/
					'menu_class' => 'nav navbar-nav',
					'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
					'walker' => new wp_bootstrap_navwalker()
				)
			);
			?>
			<?php if ( has_nav_menu( 'social' ) ) : // Check if there's a menu assigned to the 'social' location. ?>

    <?php wp_nav_menu(
        array(
            'theme_location'  => 'social',
            'container'       => 'nav',
            'container_id'    => 'menu-social',
            'container_class' => 'menu nav navbar-nav navbar-right',
            'menu_id'         => 'menu-social-items',
            'menu_class'      => 'menu-items',
            'depth'           => 1,
            'link_before'    => '<span class="screen-reader-text">',
            'link_after'     => '</span>',
        )
    ); ?>

<?php endif; // End check for menu. ?>
		</div> <!-- /.navbar-collapse -->

	</div> <!--/.container-->
</nav>
<!-- </div> -->
