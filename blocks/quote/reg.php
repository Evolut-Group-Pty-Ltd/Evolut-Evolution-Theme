<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'quote',
      'title'             => __('Quote'),
      'description'       => __('Pull Quote w/ optional author'),
      'render_template'   => 'blocks/quote/block.php',
      'category'          => 'layout',
      'icon'              => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M21 15C21 16.1046 20.1046 17 19 17H7L3 21V5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V15Z" stroke="#262629" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
      'keywords'          => array('quote', 'pull'),
    ));
  }
});
?>
