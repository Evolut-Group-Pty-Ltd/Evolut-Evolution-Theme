<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'shopify-collection',
      'title'             => __('Shopify Collection'),
      'description'       => __('Renderes shopify collection'),
      'render_template'   => 'blocks/shopify-collection/block.php',
      'category'          => 'content',
      'icon'              => 'cart',
      'keywords'          => array('shopify', 'product', 'collection'),
    ));
  }
});
?>
