<?php

if ( ! function_exists('foundation_setup') ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function foundation_setup() {
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        // This feature adds RSS feed links to HTML <head>
        add_theme_support( 'automatic-feed-links' );

        //  Add widget support shortcodes
        add_filter('widget_text', 'do_shortcode');

        // Support for Featured Images
        add_theme_support( 'post-thumbnails' );

        // Custom Background
        add_theme_support( 'custom-background', array('default-color' => 'fff'));

        // Custom Header
        add_theme_support( 'custom-header', array(
            'default-image' => get_template_directory_uri() . '/images/custom-logo.png',
            'height'        => '200',
            'flex-height'   => true,
            'uploads'       => true,
            'header-text'   => false
        ) );

        // Register Navigation Menu
        register_nav_menus( array(
            'header-menu' => 'Header Menu',
            'footer-menu' => 'Footer Menu'
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
    }
    add_action( 'after_setup_theme', 'foundation_setup' );

endif; // foundation_setup


if ( ! function_exists( 'display_custom_image_sizes' ) ) :
    /**
     * This function gives opportunity to ddd custom image sizes to WP Editor
     */
    function display_custom_image_sizes($sizes) {
        global $_wp_additional_image_sizes;

        if (empty($_wp_additional_image_sizes))
            return $sizes;

        foreach ($_wp_additional_image_sizes as $id => $data) {
            if (!isset($sizes[$id]))
                $sizes[$id] = ucfirst(str_replace('-', ' ', $id));
        }

        return $sizes;
    }
    add_filter('image_size_names_choose', 'display_custom_image_sizes');

endif; // display_custom_image_sizes


if ( ! function_exists( 'foundation_editor_style' ) ) :
    /**
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    function foundation_editor_style() {
        add_editor_style( 'style.css' );
    }
    add_action( 'admin_init', 'foundation_editor_style' );

endif; // foundation_editor_style


/**
 * Navigation Menu Adjustments
 * Add class to navigation sub-menu
 */
class foundation_navigation extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = array() ){
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdrown_menu dropdown\">\n";
    }

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( !empty( $children_elements[ $element->$id_field ] ) ) {
            $element->classes[] = 'has-dropdown';
        }
        Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

}
/* Display Pages In Navigation Menu */
if ( ! function_exists( 'foundation_page_menu' ) ) :

    function foundation_page_menu() {
        $pages_args = array(
            'sort_column' => 'menu_order, post_title',
            'menu_class'  => '',
            'include'     => '',
            'exclude'     => '',
            'echo'        => true,
            'show_home'   => false,
            'link_before' => '',
            'link_after'  => ''
        );

        wp_page_menu($pages_args);
    }

endif; // Navigation Menu Adjustments


if ( ! function_exists( 'foundation_pagination' ) ) :
    /** Pagination Function */
    function foundation_pagination() {
        global $wp_query;
        $big = 999999999;

        $links = paginate_links(
            array(
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => '?paged=%#%',
                'prev_next' => true,
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
                'current'   => max( 1, get_query_var('paged') ),
                'total'     => $wp_query->max_num_pages,
                'type'      => 'list'
            )
        );

        $pagination = str_replace('page-numbers', 'pagination', $links);

        echo '<div class="pagination">'.$pagination.'</div>';
    }

endif;


?>