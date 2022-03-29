<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'people-cards']); ?>
<?php
get_template_part('blocks/people-cards/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'posts' => get_field('posts'),
  'variant' => get_field('variant'),
  'card_type' => get_field('card_type'),
  'card_width' => get_field('card_width'),
  'card_spacing' => get_field('card_spacing'),
  'card_align' => get_field('card_align'),
  'card_colours' => get_field('card_colours'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>