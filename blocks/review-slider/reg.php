<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'review-slider',
      'title'             => __('Review Slider'),
      'description'       => __('Show review slides with title, text, image and name'),
      'render_template'   => 'blocks/review-slider/block.php',
      'category'          => 'layout',
      'icon'              => 'groups',
      'keywords'          => array('review', 'slider'),
    ));
  }
});
?>
