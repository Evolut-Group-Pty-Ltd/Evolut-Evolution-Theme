<?php
get_template_part('blocks/model-search/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'title' => get_field('title'),
));
?>
