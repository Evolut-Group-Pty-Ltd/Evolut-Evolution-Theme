<?php
get_template_part('blocks/modal-window/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'id' => get_field('id'),
  'title' => get_field('title'),
  'content' => get_field('text_content'),
));
?>

