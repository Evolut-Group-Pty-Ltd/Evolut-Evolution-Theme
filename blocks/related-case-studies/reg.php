<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'related-case-studies',
      'title'             => __('Related Case Studies'),
      'description'       => __('Show related case studies as cards'),
      'render_template'   => 'blocks/related-case-studies/block.php',
      'category'          => 'layout',
      'icon'              => 'images-alt2',
      'keywords'          => array('related', 'case', 'studies'),
    ));
  }
});
?>
