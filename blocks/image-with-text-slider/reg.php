<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
      'name'              => 'image-with-text-slider',
      'title'             => __('Image with Text Slider'),
      'description'       => __('Show image with text slides'),
      'render_template'   => 'blocks/image-with-text-slider/block.php',
      'category'          => 'layout',
      'icon'              => 'table-col-before',
      'keywords'          => array('image', 'text', 'slider'),
    ));
  }
});
?>
