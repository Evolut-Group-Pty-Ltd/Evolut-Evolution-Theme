<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'timeline']); ?>
<?php
get_template_part('blocks/timeline/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'timeline' => get_field('timeline'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>