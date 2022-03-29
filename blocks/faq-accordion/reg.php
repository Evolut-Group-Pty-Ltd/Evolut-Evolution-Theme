<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'faq-accordion',
      'title'             => __('FAQ Accordion'),
      'description'       => __('Show added rows as accordion'),
      'render_template'   => 'blocks/faq-accordion/block.php',
      'category'          => 'layout',
      'icon'              => 'images-alt2',
      'keywords'          => array('faq', 'accordion'),
    ));
  }
});
?>
