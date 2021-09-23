<?php
/**
 * Functions
 */

/******************************************************************************
                        Included Files
******************************************************************************/

// Run Theme Setup Functions
  include_once(TEMPLATEPATH . '/inc/theme-setup.php');

/******************************************************************************
                        Structure Functions
******************************************************************************/

// Register Sidebars

    register_sidebar( array(
      'id'            => 'foundation_sidebar_right',
      'name'          => __( 'Sidebar Right', 'foundation' ),
      'description'   => __( 'This sidebar is located on the right-hand side of each page.', 'foundation' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h5>',
      'after_title'   => '</h5>',
    ));
    add_action( 'widgets_init', 'foundation_widgets_init' );



// ACF Options Pages
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
      'page_title'  => 'Главные Настройки Темы',
      'menu_title'  => 'Настройки Темы',
      'menu_slug'   => 'theme-general-settings',
      'capability'  => 'edit_posts',
      'redirect'  => true
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Настройки шапки',
      'menu_title'  => 'Шапка',
      'parent_slug' => 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Настройки футера',
      'menu_title'  => 'Футер',
      'parent_slug' => 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Контактная форма',
      'menu_title'  => 'Контактная форма',
      'parent_slug' => 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Блок "Истории успеха"',
      'menu_title'  => 'Истории успеха',
      'parent_slug' => 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Блок "Готовы учиться?"',
      'menu_title'  => 'Готовы учиться?',
      'parent_slug' => 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Партнеры',
      'menu_title'  => 'Партнеры',
      'parent_slug' => 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Отзывы',
      'menu_title'  => 'Отзывы',
      'parent_slug' => 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Страница программы',
      'menu_title'  => 'Страница программы',
      'parent_slug' => 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Попап форма',
      'menu_title'  => 'Попап форма',
      'parent_slug' => 'theme-general-settings'
    ));

  }


/******************************************************************************
                         Style Functions
 ******************************************************************************/

// Stick Admin Bar To The Top
  if (!is_admin()) {

    function my_filter_head() {
      remove_action('wp_head', '_admin_bar_bump_cb');
    }
    add_action('get_header', 'my_filter_head');

    function stick_admin_bar() { ?>
      <style>
        body.admin-bar {margin-top:32px !important}
        @media screen and (max-width: 782px) {body.admin-bar { margin-top:46px !important }}
        @media screen and (max-width: 600px) {body.admin-bar { margin-top:46px !important } html #wpadminbar{ margin-top: -46px; }}
      </style>
    <?php }
    add_action('admin_head', 'stick_admin_bar');
    add_action('wp_head', 'stick_admin_bar');

  }


// Login Screen Customization
  function wordpress_login_styling() { ?>
    <style>
      .login #login h1 a {
        background-image: url('<?php echo get_header_image(); ?>');
        background-size: contain;
        width: auto;
        height: 220px;
      }
      body.login{
        background-color: #<?php echo get_background_color(); ?>;
        background-image: url('<?php echo get_background_image(); ?>') !important;
        background-repeat: repeat;
        background-position: center center;
      };

    </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'wordpress_login_styling' );

  function admin_logo_custom_url(){
    $site_url = home_url();
    return ($site_url);
  }
  add_filter('login_headerurl', 'admin_logo_custom_url');

/********************************************************************************
                         Enqueue Scripts and Styles for Front-End
*********************************************************************************/

function foundation_scripts_and_styles() {
  if (!is_admin()) {

// Load Stylesheets
  // Core

  // Plugins
  wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/plugins/font-awesome.min.css', null, null );
  wp_enqueue_style( 'animate', get_template_directory_uri().'/css/plugins/animate.min.css', null, null );
  wp_enqueue_style( 'swiper', get_template_directory_uri().'/css/plugins/swiper.min.css', null, null );
  wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/css/plugins/magnific-popup.min.css', null, null );
  wp_enqueue_style( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css', null, null );

  // System
  wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', null, null );/*2nd priority*/

// Load JavaScripts
  // Сore
  wp_enqueue_script( 'jquery' );

  // jQuery Plugins
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/plugins/modernizr.custom.js', null, null );
  wp_enqueue_script( 'dlmenu', get_template_directory_uri() . '/js/plugins/jquery.dlmenu.js', null, null, true );
  wp_enqueue_script( 'inputmask', get_template_directory_uri() . '/js/plugins/jquery.inputmask.bundle.js', null, null, true );
  wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/plugins/swiper.min.js', null, null, true );
  wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/plugins/parallax.min.js', null, null, true );
  wp_enqueue_script( 'spincrement', get_template_directory_uri() . '/js/plugins/jquery.spincrement.min.js', null, null, true );
  wp_enqueue_script( 'jqueryUI', get_template_directory_uri() . '/js/plugins/jquery-ui.min.js', null, null, true );
  wp_enqueue_script( 'magnificPopup', get_template_directory_uri() . '/js/plugins/jquery.magnific-popup.js', null, null, true );
  wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/plugins/wow.min.js', null, null, true );
  wp_enqueue_script( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', null, null, true );
  
  // Custom javascript
  wp_enqueue_script( 'common-js', get_template_directory_uri() . '/js/common.js', null, null, true );
  wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/menu.js', null, null, true );
  wp_enqueue_script( 'initDlMenu', get_template_directory_uri() . '/js/initDlMenu.js', null, null, true );
  wp_enqueue_script( 'initInputMask', get_template_directory_uri() . '/js/initInputMask.js', null, null, true );
  wp_enqueue_script( 'initSwiper', get_template_directory_uri() . '/js/initSwiper.js', null, null, true );
  wp_enqueue_script( 'initSelect', get_template_directory_uri() . '/js/initSelectMenu.js', null, null, true );
  wp_enqueue_script( 'program', get_template_directory_uri() . '/js/program.js', null, null, true );

  wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', null, null, true ); /* This should go first */

  wp_localize_script( 'global', 'site_domain', array( 'site_domain_url' => admin_url( 'admin-ajax.php' ) ) );
  wp_enqueue_script( 'global' );

  }
}
add_action( 'wp_enqueue_scripts', 'foundation_scripts_and_styles' );




/******************************************************************************
                         Additional Functions
*******************************************************************************/

// Remove #more anchor from posts
  function remove_more_jump_link($link) {
    $offset = strpos($link, '#more-');
    if ($offset) { $end = strpos($link, '"',$offset); }
    if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
    return $link;
  }
  add_filter('the_content_more_link', 'remove_more_jump_link');


// Control Excerpt Length using Filters
  function custom_excerpt_length( ) {
    return 30;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Remove […] string using Filters
  function new_excerpt_more( $more = '...' ) {
    return $more;
  }
  add_filter('excerpt_more', 'new_excerpt_more');


// Make the "read more" link to the post
  function new_excerpt_more_link( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'foundation') . '</a>';
  }
  add_filter( 'excerpt_more', 'new_excerpt_more_link' );


// Broken admin in chrome
  function chromefix_inline_css() { 
    wp_add_inline_style( 'wp-admin', '#adminmenu { transform: translateZ( 0 ); }' );
  }
  add_action('admin_enqueue_scripts', 'chromefix_inline_css');


// Enable option to hide labels in Gravity Forms
  add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


// Custom Image Sizes
  if ( ! function_exists( 'custom_image_sizes' ) ) :
    /**
     * Use this function for creation of custom image sizes via add_image_size()
     */
    function custom_image_sizes() {
      add_image_size( 'student_works_index', 410, 300, true );
      add_image_size( 'student_works_single', 1000, 425, true );
      add_image_size( 'review_photo', 160, 999, false );
      add_image_size( 'program_people_ph', 140, 140, true );
      add_image_size( 'contact_ph', 100, 100, true );
      add_image_size( 'rent_slider', 400, 300, true );
      add_image_size( 'news_inner_thumb', 1000, 665, true );
      add_image_size( 'branch_photo', 290, 290, true );
      add_image_size( 'gal_popup', 400, 285, true );
      add_image_size( 'rent_scheme', 1102, 662, true );
      add_image_size( 'page_slider', 620, 350, true );
    }
    add_action( 'after_setup_theme', 'custom_image_sizes' );

  endif;

/************************ PUT YOUR FUNCTIONS BELOW ************************/

// include ready-to-study template
include_once(TEMPLATEPATH . '/inc/ready-to-study.php');

// include partners template
include_once(TEMPLATEPATH . '/inc/partners.php');

// include reviews template
include_once(TEMPLATEPATH . '/inc/reviews.php');

// include works template
include_once(TEMPLATEPATH . '/inc/works.php');

// include share template
include_once(TEMPLATEPATH . '/inc/share.php');


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



// ajax more news button
add_action('wp_ajax_ajax', 'ajax_callback');
add_action('wp_ajax_nopriv_ajax', 'ajax_callback');

function ajax_callback(){
    
    $pt = 0;
    if (isset($_GET['pt'])) {
        $pt = $_GET['pt'];
    }
    $posts = '';
    $i = 0;
    $args = array(
        'post_type'     => $pt,
        'posts_per_page'    => -1
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) : 
        while ( $the_query->have_posts() ) : $the_query->the_post();

            global $wpdb;

            $id = $the_query->posts[$i]->ID;

            $post_thumbnail_id = get_post_thumbnail_id($id);
            $src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' , true );

            
            $term_list = wp_get_post_terms($id, 'category', array("fields" => "all"));

            $posts .= '<li class="news__item news-item">';
            $posts .= '<div class="news-item__header" style="background:'. get_field('term_color', $term_list[0]) .'">';
            $posts .= '<div class="news-item__type">'. $term_list[0]->name . '</div>';
            $posts .= '<div class="news-item__date">'. get_field('event_date') .'</div>';
            $posts .= '</div>';
            $posts .= '<a href="'. get_permalink($id) .'" class="news-item__hovers">';
            $posts .= '<div class="news-item__logo"><img src="'. $src[0] .'" alt=""></div>';
            $posts .= '<div class="news-item__title">'. get_the_title() . $the_query->ID .'</div>';
            $posts .= '</a>';
            $date_fest = mb_strtolower(get_field('date_fest'));
            if($date_fest){
                $posts .= '<div class="news-item__date-time"><p>'. $date_fest .'</p></div>';
            }
            $fest_place = get_field('fest_place');
            if($fest_place){
                $posts .= '<div class="news-item__place">'. $fest_place .'</div>';
            } 
            /*else {
                $posts .= '<a href="'. get_permalink($id) .'" class="news-item__link">Зарегистрироваться</a>';
            }*/
            $posts .= '</li>';

            $i++;
        endwhile;
    endif; wp_reset_query();
    echo json_encode($posts);
    wp_die();
}


// ajax more category button
add_action('wp_ajax_category', 'category_callback');
add_action('wp_ajax_nopriv_category', 'category_callback');

function category_callback(){
    
    $category = 0;
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
    }
    $posts = '';
    $i = 0;
    $args = array(
        'post_type'     => 'post',
        'category_name' => $category,
        'posts_per_page'    => -1
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) : 
        while ( $the_query->have_posts() ) : $the_query->the_post();

            global $wpdb;

            $id = $the_query->posts[$i]->ID;

            $post_thumbnail_id = get_post_thumbnail_id($id);
            $src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' , true );

            $term_list = wp_get_post_terms($id, 'category', array("fields" => "all"));

            $posts .= '<li class="news__item news-item">';
            $posts .= '<div class="news-item__header" style="background:'. get_field('term_color', $term_list[0]) .'">';
            $posts .= '<div class="news-item__type">'. $term_list[0]->name . '</div>';
            $posts .= '<div class="news-item__date">'. get_field('event_date') .'</div>';
            $posts .= '</div>';
            $posts .= '<a href="'. get_permalink($id) .'" class="news-item__hovers">';
            $posts .= '<div class="news-item__logo"><img src="'. $src[0] .'" alt=""></div>';
            $posts .= '<div class="news-item__title">'. get_the_title() . $the_query->ID .'</div>';
            $posts .= '</a>';
            
            $date_fest = mb_strtolower(get_field('date_fest'));
            if($date_fest){
                $posts .= '<div class="news-item__date-time"><p>'. $date_fest .'</p></div>';
            }
            
            $fest_place = get_field('fest_place');
            if($fest_place){
                $posts .= '<div class="news-item__place">'. $fest_place .'</div>';
            } 
            /*else {
                $posts .= '<a href="'. get_permalink($id) .'" class="news-item__link">Зарегистрироваться</a>';
            }*/
            $posts .= '</li>';

            $i++;
        endwhile;
    endif; wp_reset_query();

    echo json_encode($posts);

    wp_die();
}


// ajax more intensives button
add_action('wp_ajax_intensives', 'intensives_callback');
add_action('wp_ajax_nopriv_intensives', 'intensives_callback');

function intensives_callback(){
    $pt = 0;
    if (isset($_GET['pt'])) {
        $pt = $_GET['pt'];
    }
    $posts = '';
    $i = 0;
    $args = array(
        'post_type'     => $pt,
        'posts_per_page'    => -1
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) : 
        while ( $the_query->have_posts() ) : $the_query->the_post();

            global $wpdb;

            $id = $the_query->posts[$i]->ID;

            $post_thumbnail_id = get_post_thumbnail_id($id);
            $src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' , true );

            $posts .= '<li class="intensives__item intensive-item">';
            $posts .= '<a href="'. get_permalink($id) .'" class="intensive-item__hovers">';
            $posts .= '<div class="intensive-item__logo"><img src="'. $src[0] .'"></div>';
            $posts .= '<div class="intensive-item__title">'. get_the_title() .'</div>';
            $posts .= '</a>';
            $posts .= '<div class="intensive-item__teachers">'. get_field('teacher_intensives'). '</div>';
            $posts .= '<div class="intensive-item__period">'. get_field('period_intensives'). '</div>';
            $posts .= '<div class="intensive-item__price">'. get_field('price_intensives'). ' ₽</div>';
            $posts .= '</li>';

            $i++;
        endwhile;
    endif; wp_reset_query();

    echo json_encode($posts);


    wp_die();
}


// ajax more stories button
add_action('wp_ajax_stories', 'stories_callback');
add_action('wp_ajax_nopriv_stories', 'stories_callback');

function stories_callback(){
    $pt = 0;
    if (isset($_GET['pt'])) {
        $pt = $_GET['pt'];
    }
    $posts = '';
    $i = 0;
    $args = array(
        'post_type'     => $pt,
        'posts_per_page'    => -1
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) : 
        while ( $the_query->have_posts() ) : $the_query->the_post();

            global $wpdb;

            $id = $the_query->posts[$i]->ID;

            $post_thumbnail_id = get_post_thumbnail_id($id);
            $src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' , true );

            
            $term_list = wp_get_post_terms($id, 'faculty_work', array("fields" => "all"));

            $posts .= '<li class="news__item news-item">';
            $posts .= '<div class="news-item__header" style="background:'. get_field('term_color', $term_list[0]) .'">';
            $posts .= '<div class="news-item__type">'. $term_list[0]->name . '</div>';
            $term_list = wp_get_post_terms($id, 'work_year', array("fields" => "all"));
            $posts .= '<div class="news-item__date">'. $term_list[0]->name .'</div>';
            $posts .= '</div>';
            $posts .= '<a href="'. get_permalink($id) .'" class="news-item__hovers">';
            $posts .= '<div class="news-item__logo"><img src="'. $src[0] .'" alt=""></div>';
            $posts .= '<div class="news-item__title">'. get_the_title() . $the_query->ID .'</div>';
            $posts .= '</a>';
            $teachers = '';
            $term_list = wp_get_post_terms($id, 'teachers_work', array("fields" => "all"));
            $term_count = count($term_list);
            $it = 1;
            foreach ($term_list as $term ) {
                $nm = $term->name;
                $sep = '';
                if ( $it != $term_count ) {
                    $sep = ', ';
                }
                $teachers .= $nm;
                $teachers .= $sep;
                $it++;
            }
            $posts .= '<div class="news-item__date-time">'. $teachers .'</div>';
            $posts .= '</li>';

            $i++;
        endwhile;
    endif; 
    wp_reset_query();
    echo json_encode($posts);

    wp_die();
}

function limit_words($words, $limit, $append = ' &hellip;') {
  // Add 1 to the specified limit becuase arrays start at 0
  $limit = $limit+1;
  // Store each individual word as an array element
  // Up to the limit
  $words = explode(' ', $words, $limit);
  // Shorten the array by 1 because that final element will be the sum of all the words after the limit
  array_pop($words);
  // Implode the array for output, and append an ellipse
  $words = implode(' ', $words) . $append;
  // Return the result
  return $words;
}


// custom mobile menu
function clean_custom_menus() {
  $menu_name = 'header-menu'; // specify custom menu slug
  if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $menu_list = '<ul class="dl-menu">' ."\n";
    foreach( $menu_items as $menu_item ) {

      if( $menu_item->menu_item_parent == 0 ) {
           
        $parent = $menu_item->ID;
         
        $menu_array = array();
        foreach( $menu_items as $submenu ) {
          if( $submenu->menu_item_parent == $parent ) {
            $bool = true;
            $sub_parent = $submenu->ID;

            $submenu_array = array();
            foreach( $menu_items as $sub_submenu ) {
              if( $sub_submenu->menu_item_parent == $sub_parent ) {
                $sub_bool = true;

                $submenu_array[] = '<li>' ."\n";
                $submenu_array[] .= '<a href="' . $sub_submenu->url . '">' . $sub_submenu->title . '</a>' ."\n";
                $submenu_array[] .= '</li>' ."\n";

              }
            }

            if( $sub_bool == true && count( $submenu_array ) > 0 ) {
              $menu_array[] .= '<li>' ."\n";
              $menu_array[] .= '<a href="' . $submenu->url . '">' . $submenu->title . '</a>' ."\n";
               
              $menu_array[] .= '<ul class="dl-submenu">' ."\n";
              $menu_array[] .= implode( "\n", $submenu_array );
              $menu_array[] .= '</ul>' ."\n";
            } else {
              $menu_array[] .= '<li>' ."\n";
              $menu_array[] .= '<a href="' . $submenu->url . '">' . $submenu->title . '</a>' ."\n";
            }
            $menu_array[] .= '</li>' ."\n";
          }
        }
        if( $bool == true && count( $menu_array ) > 0 ) {
          $menu_list .= '<li>' ."\n";
          $menu_list .= '<a href="' . $submenu->url . '">' . $menu_item->title . '</a>' ."\n";
           
          $menu_list .= '<ul class="dl-submenu">' ."\n";
          $menu_list .= implode( "\n", $menu_array );
          $menu_list .= '</ul>' ."\n";
        } else {
          $menu_list .= '<li>' ."\n";
          $menu_list .= '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
        }
      }
      // end <li>
      $menu_list .= '</li>' ."\n";

    }

    $menu_list .= "\t\t\t". '</ul>' ."\n";
  } else {
    // $menu_list = '<!-- no list defined -->';
  }
  echo $menu_list;
}

//acf google map api key
function my_acf_init() {
  
  acf_update_setting('google_api_key', 'AIzaSyBwDWTSkj2av1nrkh22kq1hHIw9bWjpUak');
}

add_action('acf/init', 'my_acf_init');





function get_tax_navigation( $taxonomy = 'category', $direction = '' ) 
{
    // Make sure we are on a taxonomy term/category/tag archive page, if not, bail
    if ( 'category' === $taxonomy ) {
        if ( !is_category() )
            return false;
    } elseif ( 'post_tag' === $taxonomy ) {
        if ( !is_tag() )
            return false;
    } else {
        if ( !is_tax( $taxonomy ) )
            return false;
    }

    // Make sure the taxonomy is valid and sanitize the taxonomy
    if (    'category' !== $taxonomy 
         || 'post_tag' !== $taxonomy
    ) {
        $taxonomy = filter_var( $taxonomy, FILTER_SANITIZE_STRING );
        if ( !$taxonomy )
            return false;

        if ( !taxonomy_exists( $taxonomy ) )
            return false;
    }

    // Get the current term object
    $current_term = get_term( $GLOBALS['wp_the_query']->get_queried_object() );

    // Get all the terms ordered by slug 
    $terms = get_terms( $taxonomy, ['orderby' => 'slug'] );

    // Make sure we have terms before we continue
    if ( !$terms ) 
        return false;

    // Because empty terms stuffs around with array keys, lets reset them
    $terms = array_values( $terms );

    // Lets get all the term id's from the array of term objects
    $term_ids = wp_list_pluck( $terms, 'term_id' );

    /**
     * We now need to locate the position of the current term amongs the $term_ids array. \
     * This way, we can now know which terms are adjacent to the current one
     */
    $current_term_position = array_search( $current_term->term_id, $term_ids );

    // Set default variables to hold the next and previous terms
    $previous_term = '';
    $next_term     = '';

    // Get the previous term
    if (    'previous' === $direction 
         || !$direction
    ) {
        if ( 0 === $current_term_position ) {
            $previous_term = $terms[intval( count( $term_ids ) - 1 )];
        } else {
            $previous_term = $terms[$current_term_position - 1];
        }
    }

    // Get the next term
    if (    'next' === $direction
         || !$direction
    ) {
        if ( intval( count( $term_ids ) - 1 ) === $current_term_position ) {
            $next_term = $terms[0];
        } else {
            $next_term = $terms[$current_term_position + 1];
        }
    }

    $link = [];
    // Build the links
    if ( $previous_term ) 
        $link[] = '<a href="' . esc_url( get_term_link( $previous_term ) ) . '" class="pagination__left"><div class="pagination__title pagination__title--left">' . $previous_term->name . '</div></a>';

    if ( $next_term ) 
        $link[] = '<a href="' . esc_url( get_term_link( $next_term ) ) . '" class="pagination__right"><div class="pagination__title pagination__title--right">' . $next_term->name . '</div></a>';

    return implode( $link );
}

// add_action( 'pre_get_posts', 'my_change_sort_order'); 
// function my_change_sort_order($query){
//     if(is_archive()):
//       $query->set( 'order', 'ASC' );
//     endif;
// };

// function change_archive_query( $query ) {
//     if ( $query->is_main_query() && $query->is_archive()) {
//         $query->set( 'order', 'ASC' );
//     }
// }
// add_action( 'pre_get_posts', 'change_archive_query' );

function my_get_the_excerpt( $post_id ){
    global $post;  
    $save_post = $post;
    $post = get_post($post_id);
    setup_postdata( $post );
    $output = get_the_excerpt();
    $post = $save_post;
    return $output;
}

require_once dirname(__DIR__ . '/wordshop') . '/functions/cron-sender/DateUpdater.php'; // Класс для смены даты со строкового значения на datetime
require_once dirname(__DIR__ . '/wordshop') . '/functions/cron-sender/cron.php'; // Cron event для рассылки за полтора часа




?>
