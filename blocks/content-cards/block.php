<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'content-cards']); ?>
<?php
get_template_part('blocks/content-cards/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'cards' => get_field('cards'),
  'variant' => get_field('variant'),
  'card_type' => get_field('card_type'),
  'card_width' => get_field('card_width'),
  'card_spacing' => get_field('card_spacing'),
  'card_align' => get_field('card_align'),
  'card_colours' => get_field('card_colours'),
  'icon_colour' => get_field('icon_colour'),
  'text_colour' => get_field('text_colour'),
  'auto_rotation' => get_field('auto_rotation'),
  'show_date' => get_field('show_date'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>