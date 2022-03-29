<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'post-cards',
      'title'             => __('Post Cards'),
      'description'       => __('Show specific posts as cards'),
      'render_template'   => 'blocks/post-cards/block.php',
      'category'          => 'layout',
      'icon'              => 'images-alt2',
      'keywords'          => array('post', 'cards'),
    ));
  }
});
?>
