<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'product-categories',
      'title'             => __('Product Categories'),
      'description'       => __('Show specific product categories as cards'),
      'render_template'   => 'blocks/product-categories/block.php',
      'category'          => 'layout',
      'icon'              => 'dashicons-products',
      'keywords'          => array('products', 'categories', 'cards'),
    ));
  }
});
?>
