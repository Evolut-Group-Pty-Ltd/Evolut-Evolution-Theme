<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'hero-banner',
      'title'             => __('Hero Banner'),
      'description'       => __('Hero Banner'),
      'render_template'   => 'blocks/hero-banner/block.php',
      'category'          => 'layout',
      'icon'              => 'image',
      'keywords'          => array('image', 'hero', 'banner'),
    ));
  }
});
?>
