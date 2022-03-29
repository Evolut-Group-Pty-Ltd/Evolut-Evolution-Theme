<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
      'name'              => 'reusable-modules',
      'title'             => __('Reusable Modules'),
      'description'       => __('Universal modules with image block'),
      'render_template'   => 'blocks/reusable-modules/block.php',
      'category'          => 'layout',
      'icon'              => 'columns',
      'keywords'          => array('image', 'text', 'columns', 'modules'),
    ));
  }
});
?>
