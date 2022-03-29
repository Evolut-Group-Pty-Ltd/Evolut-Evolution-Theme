<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
      'name'              => 'model-search',
      'title'             => __('Model Search'),
      'description'       => __('Shows EV model dropdown with search'),
      'render_template'   => 'blocks/model-search/block.php',
      'category'          => 'layout',
      'icon'              => 'search',
      'keywords'          => array('ev', 'model', 'search'),
    ));
  }
});
?>
