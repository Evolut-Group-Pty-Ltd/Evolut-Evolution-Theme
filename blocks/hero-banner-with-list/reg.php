<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'hero-banner-with-list',
      'title'             => __('Hero Banner with List'),
      'description'       => __('Primary Hero Banner'),
      'render_template'   => 'blocks/hero-banner-with-list/block.php',
      'category'          => 'layout',
      'icon'              => 'menu',
      'keywords'          => array('image', 'hero', 'banner'),
    ));
  }
});
?>
