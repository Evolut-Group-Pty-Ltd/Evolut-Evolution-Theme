<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'produts',
      'title'             => __('Products'),
      'description'       => __('Show specific products as cards'),
      'render_template'   => 'blocks/products/block.php',
      'category'          => 'layout',
      'icon'              => 'dashicons-products',
      'keywords'          => array('products', 'cards'),
    ));
  }
});
?>
