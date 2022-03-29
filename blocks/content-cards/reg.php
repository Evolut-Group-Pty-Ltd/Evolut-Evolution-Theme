<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
      'name'              => 'content-cards',
      'title'             => __('Content Cards'),
      'description'       => __('Show specific content as cards'),
      'render_template'   => 'blocks/content-cards/block.php',
      'category'          => 'layout',
      'icon'              => 'images-alt2',
      'keywords'          => array('content', 'cards'),
    ));
  }
});
?>
