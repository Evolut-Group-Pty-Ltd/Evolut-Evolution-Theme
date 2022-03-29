<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'carousel',
      'title'             => __('Carousel'),
      'description'       => __('Show gallery of images in a Carousel'),
      'render_template'   => 'blocks/carousel/block.php',
      'category'          => 'layout',
      'icon'              => 'images-alt',
      'keywords'          => array('carousel', 'slider'),
    ));
  }
});
?>
