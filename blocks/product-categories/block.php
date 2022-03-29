
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
  'block_name' => 'product-categories',
));
?>
<?php
get_template_part('blocks/product-categories/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'product_categories' => get_field('product_categories'),
  'variant' => get_field('variant'),
  'card_type' => get_field('card_type'),
  'card_width' => get_field('card_width'),
  'card_spacing' => get_field('card_spacing'),
  'card_align' => get_field('card_align'),
  'card_colour' => get_field('card_colour'),
  'icon_colour' => get_field('icon_colour'),
  'text_colour' => get_field('text_colour'),
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
 