<?php
get_template_part('blocks/reusable-modules/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'title' => get_field('title'),
  'reverse_order' => get_field('reverse_order'),
  'no_top_offset' => get_field('no_top_offset'),
  'image_column' => get_field('image_column'),
  'modules_column' => get_field('modules_column')
));
?>
