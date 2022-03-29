<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'image-showcase',
      'title'             => __('Image Showcase'),
      'description'       => __('Show line of images with title and descriptions'),
      'render_template'   => 'blocks/image-showcase/block.php',
      'category'          => 'layout',
      'icon'              => 'ellipsis',
      'keywords'          => array('image', 'showcase'),
    ));
  }
});
?>
