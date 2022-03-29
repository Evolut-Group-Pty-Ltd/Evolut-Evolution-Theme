<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'posts-slider',
      'title'             => __('Posts Slider'),
      'description'       => __('Show post slides with title and text'),
      'render_template'   => 'blocks/posts-slider/block.php',
      'category'          => 'layout',
      'icon'              => 'images-alt',
      'keywords'          => array('posts', 'slider'),
    ));
  }
});
?>
