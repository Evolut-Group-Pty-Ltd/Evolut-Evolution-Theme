<?php
get_template_part('blocks/block-wrapper' . ($args['position'] ? '-' . $args['position'] : '' ), null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'margin_formatting' => get_field('margin_formatting'),
  'padding' => get_field('padding'),
  'minimum_height' => get_field('minimum_height'),
  'block_unique_id' => get_field('block_unique_id'),
  'block_colours' => get_field('block_colours'),
));
?>
<?php
get_template_part('blocks/posts-slider/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'posts' => get_field('posts'),
  'title' => get_field('title'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>
