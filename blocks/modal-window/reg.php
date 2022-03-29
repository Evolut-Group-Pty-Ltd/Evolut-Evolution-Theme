<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'modal-window',
      'title'             => __('Modal Window'),
      'description'       => __('Allows to create a simple modal window'),
      'render_template'   => 'blocks/modal-window/block.php',
      'category'          => 'layout',
      'icon'              => 'columns',
      'keywords'          => array('modal', 'window', 'popup'),
    ));
  }
});
?>
