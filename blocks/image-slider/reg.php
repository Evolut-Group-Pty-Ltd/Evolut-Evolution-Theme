<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'image-slider',
      'title'             => __('Image Slider'),
      'description'       => __('Show image slides with title and text'),
      'render_template'   => 'blocks/image-slider/block.php',
      'category'          => 'layout',
      'icon'              => 'images-alt',
      'keywords'          => array('image', 'slider'),
    ));
  }
});
?>
