<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'contact-form',
      'title'             => __('Contact Form'),
      'description'       => __('Contax Form with extra information'),
      'render_template'   => 'blocks/contact-form/block.php',
      'category'          => 'layout',
      'icon'              => 'email',
      'keywords'          => array('contact', 'form', 'address', 'hours'),
    ));
  }
});
?>
