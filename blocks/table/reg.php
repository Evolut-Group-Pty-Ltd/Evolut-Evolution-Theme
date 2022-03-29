<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'table',
      'title'             => __('Table'),
      'description'       => __('Show a table'),
      'render_template'   => 'blocks/table/block.php',
      'category'          => 'layout',
      'icon'              => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10 3H14V21H10V3Z" stroke="#262629" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M18 8H22V21H18V8Z" stroke="#262629" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M2 13H6V21H2V13Z" stroke="#262629" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
      'keywords'          => array('table'),
    ));
  }
});
?>
