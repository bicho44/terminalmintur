<?php
/**
 * Funciones para Obtener la dara de las páginas Hijas y devolverlas en TABS  de Bootstrap 3.x
 *
 * @package IMD Framework
 */

/**
 * Buscar las páginas Hijas
 *
 * @param $post_ID
 * @return WP_Query
 */
function get_imgd_child_pages($post_ID)
{
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'post_parent' => $post_ID,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    );
    $parent = new WP_Query($args);

   return $parent;
}


function imgd_child_grid($post_ID, $title="", $content=""){
    echo get_imgd_child_grid($post_ID, $title="", $content="");
}

function get_imgd_child_grid($post_ID, $title="", $content=""){
    $parent = get_imgd_child_pages($post_ID);

    $grid = "";

    if ($parent->have_posts()) {

        /* Verifico que tenga la Tab principal */
        if ($title && $content !== ""){
            $header .= '<li class="active"><a href="#' . the_slug($post_ID) . '" data-toggle="tab">' . $title. '</a></li>';
            $tabs .= '<div id="' . the_slug($post_ID) . '" role="tabpanel" class="tab-pane active">';
            $tabs .= $content;
            $tabs .= '</div>';
        }

        while ($parent->have_posts()) : $parent->the_post();
            
            $tabs .= '<div id="' . the_slug(get_the_ID()) . '" role="panel" class="'.the_slug(get_the_ID()).' grid-panel col-md-3">';
            $tabs .= '<a href="'.get_the_permalink().'">';

			if (has_post_thumbnail()){
				$tabs .= get_the_post_thumbnail(get_the_ID(), 'thumb-archive');
			}
		    
            $tabs .= '<h2>'.get_the_title().'</h2>';
            //$tabs .= apply_filters('the_content',get_the_content());
            $tabs .= '</a>';
            $tabs .= '</div>';

        endwhile;

        wp_reset_query();

        return $tabs;

    } else {
        return;
    }
}

/**
 * Obtengo los Tabs formateados para Bootstrap 3.x
 *
 * @param $post_ID
 * @param $title
 * @param $content
 * @return string or boolean
 */
function imgd_child_pages($post_ID, $title="", $content=""){

    $tabs = "";
    $header = "";

    $parent = get_imgd_child_pages($post_ID);

    if ($parent->have_posts()) {
        $header .= ' <!-- Nav tabs -->';
        $header .= '<ul id="tabs-content" class="nav nav-tabs" role="tablist">';

        $tabs .= '<!-- Tab panes --><div class="tab-content">';

        /* Verifico que tenga la Tab principal */
        if ($title && $content !== ""){
            $header .= '<li class="active"><a href="#' . the_slug($post_ID) . '" data-toggle="tab">' . $title. '</a></li>';
            $tabs .= '<div id="' . the_slug($post_ID) . '" role="tabpanel" class="tab-pane active">';
            $tabs .= $content;
            $tabs .= '</div>';
        }

        while ($parent->have_posts()) : $parent->the_post();
            $header .= '<li><a href="#' . the_slug(get_the_ID()) . '" data-toggle="tab">' . get_the_title() . '</a></li>';

            $tabs .= '<div id="' . the_slug(get_the_ID()) . '" role="tabpanel" class="tab-pane">';
            $tabs .= apply_filters('the_content',get_the_content());
            $tabs .= '</div>';

        endwhile;

        $header .= '</ul> <!-- End Tabs -->';
        $tabs .= '</div><!-- End Tabs Panes -->';

        wp_reset_query();

        return $header.$tabs;
    } else {
        return false;
    }

}

/**
 * Funcion de Ayuda para Obtener el Slug, ya que no hay una en Wordpress
 * @link: http://www.wprecipes.com/wordpress-function-to-get-postpage-slug
 *
 * @param $post_ID
 * @return mixed
 */
function the_slug($post_ID) {
    $post_data = get_post($post_ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug;
}