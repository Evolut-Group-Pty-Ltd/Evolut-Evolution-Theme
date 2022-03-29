<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'image-columns',
      'title'             => __('Image Columns'),
      'description'       => __('Multiple columns with images and description'),
      'render_template'   => 'blocks/image-columns/block.php',
      'category'          => 'layout',
      'icon'              => 'columns',
      'keywords'          => array('image', 'text', 'columns'),
    ));
  }
});
?>
