<?php
define('EVOLUT_THEME_SLUG', 'evolution-theme');
define('EVOLUT_THEME_TEXT_DOMAIN', EVOLUT_THEME_SLUG);
define('EVOLUT_THEME_VERSION' , '1.0.12');
define('EVOLUT_DEV_ENVIRONMENT', true);

require('includes/gutenberg-styles.php');
require('includes/render-menu.php');
require('includes/block-utils.php');
require('includes/gf-submit-btn-text.php');
require('includes/password-form.php');
require('blocks/blocks.php');
require('includes/block-functions.php');
require('includes/smart-video.php');

// Support
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// showing 32 EV vehicles at the time
add_filter('pre_get_posts', function($wp_query) {
  if(!array_key_exists('post_type', $wp_query->query_vars)) return;
  if($wp_query->query_vars['post_type'] != 'ev-vehicle') return;
  $wp_query->query_vars['posts_per_page'] = 32;
});

register_nav_menus(
  array(
    'topbar' => __('Top Bar', EVOLUT_THEME_TEXT_DOMAIN),
    'primary' => __('Primary', EVOLUT_THEME_TEXT_DOMAIN),
    'mega_menu' => __('Mega Menu', EVOLUT_THEME_TEXT_DOMAIN),
    'footer'  => __('Footer Menu', EVOLUT_THEME_TEXT_DOMAIN),
    'footer_secondary'  => __('Footer Secondary menu', EVOLUT_THEME_TEXT_DOMAIN),
    'footer_links'  => __('Footer Links', EVOLUT_THEME_TEXT_DOMAIN),
  )
);

if(function_exists('acf_add_options_page')) {
  acf_add_options_page(
    array(
      'page_title' => 'Evolution Settings',
      'menu_title' => 'Evolution Settings',
      'menu_slug'  => 'evolution-settings',
      'capability' => 'edit_posts',
      'redirect'   => false,
    )
  );
}

add_action(
    'wp_enqueue_scripts',
    function() {
      if(EVOLUT_DEV_ENVIRONMENT) {
        wp_enqueue_style(EVOLUT_THEME_SLUG . '-css', get_stylesheet_directory_uri() . '/src/styles/_all.css', array(), EVOLUT_THEME_VERSION);

        $scripts = array(
          'utils' => array('utils.js'),
          'header' => array('header.js'),
          'slider' => array('slider.js'),
          'modal-window' => array('modal-window.js'),
          'evlt-accordion' => array('evlt-accordion.js'),
          'scroll-to' => array('scroll-to.js'),
          'graggable-content' => array('draggable-content.js'),
          'mega-menu' => array('mega-menu.js'),
          'el-select' => array('el-select.js'),
          'gravity-forms' => array('gravity-forms.js', array('jquery')),
          'image-showcase' => array('image-showcase.js'),
          'model-search' => array('model-search.js'),
          'visible-tag' => array('visible-tag.js'),
          'image-switcher' => array('image-switcher.js'),
          'posts-preview' => array('posts-preview.js'),
          'flickity' => array('flickity.js'),
          'slick' => array('slick.js'),
          'swiper' => array('swiper.min.js')
        );
        foreach($scripts as $slug => $script) {
          wp_enqueue_script(
            EVOLUT_THEME_SLUG . '-' . $slug, 
            get_stylesheet_directory_uri() . '/src/scripts/' . $script[0], 
            count($script) > 1 ? $script[1] : array(),
            EVOLUT_THEME_VERSION,
            true
          );
        }
      } else {
        wp_enqueue_style(EVOLUT_THEME_SLUG . '-css', get_stylesheet_directory_uri() . '/src/styles/_combined.css', array(), EVOLUT_THEME_VERSION);
        wp_enqueue_script(EVOLUT_THEME_SLUG . '-scripts', get_stylesheet_directory_uri() . '/src/scripts/_combined.js',  array('jquery'), EVOLUT_THEME_VERSION, true);
      }

    }
);

add_action('init', function() {
  $allowed_origins = array('http://localhost:8080', 'https://store.jetcharge.com.au');
  $origin = get_http_origin();

  $preview_origin = '/^https:\/\/\w+\.shopifypreview\.com$/';
  
  if($origin && (in_array($origin, $allowed_origins) || preg_match($preview_origin, $origin) !== false)) {
    header('Access-Control-Allow-Origin: ' . esc_url_raw($origin));
  }
});

function get_adjacent_category($category_slug,$taxonomy,$type){
    global $wpdb;
    if($type=="next"){
        $operater=" > ";
        $orderby=" ORDER BY tt.`term_id` ASC ";
    }else{
        $operater=" < ";
        $orderby=" ORDER BY tt.`term_id` DESC ";
    }
    $query="SELECT *,(SELECT `term_id` FROM wp_terms WHERE `slug`='".$category_slug."') AS given_term_id,
        (SELECT parent FROM wp_term_taxonomy WHERE `term_id`=given_term_id) AS parent_id
        FROM  `wp_terms` t
        INNER JOIN `wp_term_taxonomy` tt ON (`t`.`term_id` = `tt`.`term_id`)
        HAVING  tt.taxonomy='".$taxonomy."' AND tt.`parent`=parent_id AND tt.`term_id` $operater given_term_id $orderby LIMIT 1";
    return $wpdb->get_row($query);
}

function mytheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce', array(
    'thumbnail_image_width' => 400,
    'single_image_width'    => 800,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 4,
            'default_columns' => 3,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
  ) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Enable Gutenberg editor for WooCommerce
function j0e_activate_gutenberg_product( $can_edit, $post_type ) {
 if ( $post_type == 'product' ) {
        $can_edit = true;
    }
    return $can_edit;
}
add_filter( 'use_block_editor_for_post_type', 'j0e_activate_gutenberg_product', 10, 2 );

// enable taxonomy fields for woocommerce with gutenberg on
function j0e_enable_taxonomy_rest( $args ) {
    $args['show_in_rest'] = true;
    return $args;
}
add_filter( 'woocommerce_taxonomy_args_product_cat', 'j0e_enable_taxonomy_rest' );
add_filter( 'woocommerce_taxonomy_args_product_tag', 'j0e_enable_taxonomy_rest' );

// remove "home" from woocommerce breadcrumbs

add_filter('woocommerce_breadcrumb_defaults', function( $defaults ) {
    unset($defaults['home']); //removes home link.
    return $defaults; //returns rest of links
});

/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
  // Change the breadcrumb delimeter from '/' to '>'
  $defaults['delimiter'] = ' &gt; ';
  return $defaults;
}
?>