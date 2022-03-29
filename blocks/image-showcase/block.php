<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'image-showcase']); ?>
<?php
get_template_part('blocks/image-showcase/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'images' => get_field('images'),
  'scrollable_settings' => get_field('scrollable_settings'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>