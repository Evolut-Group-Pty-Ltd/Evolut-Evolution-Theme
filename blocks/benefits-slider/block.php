<?php
get_template_part('blocks/block-wrapper', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'title' => get_field('title'),
  'heading_tag' => get_field('heading_tag'),
  'alignment' => get_field('alignment'),
  'sub_heading' => get_field('sub_heading'),
  'block_links' => get_field('block_links'),
  'description' => get_field('description'),
  'margin_formatting' => get_field('margin_formatting'),
  'padding' => get_field('padding'),
  'background_image' => get_field('background_image'),
  'bg_image_settings' => get_field('bg_image_settings'),
  'background_video' => get_field('background_video'),
  'minimum_height' => get_field('minimum_height'),
  'heading_position' => get_field('heading_position'),
  'block_unique_id' => get_field('block_unique_id'),
  'block_name' => 'benefits-slider',
));
?>
<?php
get_template_part('blocks/benefits-slider/partial', null, array(
  'classes' => $classes,
  'benefits' => get_field('benefits'),
  'block_id' => get_field('block_unique_id'),
));
?>
<?php
get_template_part('blocks/block-wrapper-end', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'title' => get_field('title'),
  'heading_tag' => get_field('heading_tag'),
  'alignment' => get_field('alignment'),
  'sub_heading' => get_field('sub_heading'),
  'block_links' => get_field('block_links'),
  'description' => get_field('description'),
  'heading_position' => get_field('heading_position'),
));
?>
