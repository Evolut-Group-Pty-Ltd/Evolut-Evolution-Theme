<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'text-with-image',
      'title'             => __('Text with Image'),
      'description'       => __('Universal text with image block'),
      'render_template'   => 'blocks/text-with-image/block.php',
      'category'          => 'layout',
      'icon'              => 'columns',
      'keywords'          => array('image', 'text', 'columns'),
    ));
  }
});
?>
