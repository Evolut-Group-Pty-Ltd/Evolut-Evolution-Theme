<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
      'name'              => 'jetcharge-graph',
      'title'             => __('Process Infographics'),
      'description'       => __('Dynamic infographics explaining what we do'),
      'render_template'   => 'blocks/jetcharge-graph/block.php',
      'category'          => 'layout',
      'icon'              => 'images-alt2',
      'keywords'          => array('jetcharge', 'infographics', 'graph', 'scheme'),
    ));
  }
});
?>
