<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'benefirs-slider',
      'title'             => __('Benefits Slider'),
      'description'       => __('Allows to preview benefits'),
      'render_template'   => 'blocks/benefits-slider/block.php',
      'category'          => 'layout',
      'icon'              => 'table-row-before',
      'keywords'          => array('benefit', 'benefits', 'slider'),
    ));
  }
});
?>
