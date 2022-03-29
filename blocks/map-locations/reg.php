<?php
add_action('acf/init', function() {
  // Check function exists.
  if(function_exists('acf_register_block_type')) {
    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'map-locations',
      'title'             => __('Map Locations'),
      'description'       => __('Show geo locations with maps'),
      'render_template'   => 'blocks/map-locations/block.php',
      'category'          => 'layout',
      'icon'              => 'location-alt',
      'keywords'          => array('map', 'address', 'location'),
    ));
  }
});
?>
