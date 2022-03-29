<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'separator-line',
      'title'             => __('Separator Line'),
      'description'       => __('Separates content blocks with a line'),
      'render_template'   => 'blocks/separator-line/block.php',
      'category'          => 'layout',
      'icon'              => 'minus',
      'keywords'          => array('separator', 'break', 'line'),
    ));
  }
});
?>
