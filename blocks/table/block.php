<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'table']); ?>
<?php
get_template_part('blocks/table/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'html' => get_field('html'),
  'table' => get_field('table'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>