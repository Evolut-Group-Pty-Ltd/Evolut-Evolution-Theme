<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'posts-preview',
      'title'             => __('Posts Preview'),
      'description'       => __('Allows to preview large number of posts'),
      'render_template'   => 'blocks/posts-preview/block.php',
      'category'          => 'layout',
      'icon'              => 'table-row-before',
      'keywords'          => array('post', 'preview', 'slider'),
    ));
  }
});
?>
