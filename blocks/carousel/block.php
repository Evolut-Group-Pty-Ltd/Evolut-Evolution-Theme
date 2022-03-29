<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'carousel']); ?>
<?php
get_template_part('blocks/carousel/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'gallery' => get_field('gallery'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>
