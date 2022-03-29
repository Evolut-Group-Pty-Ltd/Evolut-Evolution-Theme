<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'link-cards-slider',
      'title'             => __('Link Cards Slider'),
      'description'       => __('Show links as Cards Slider'),
      'render_template'   => 'blocks/link-cards-slider/block.php',
      'category'          => 'layout',
      'icon'              => 'images-alt2',
      'keywords'          => array('list', 'cards', 'slider'),
    ));
  }
});
?>
