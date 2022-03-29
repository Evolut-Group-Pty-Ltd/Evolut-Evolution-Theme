<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'text-with-image']); ?>
<?php
get_template_part('blocks/text-with-image/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'title' => get_field('title'),
  'title_position' => get_field('title_position'),
  'text_content' => get_field('text_content'),
  'image_content' => get_field('image_content'),
  'gap_size' => get_field('gap_size'),
  'reverse_order' => get_field('reverse_order'),
  'content_alignment' => get_field('content_alignment'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>
