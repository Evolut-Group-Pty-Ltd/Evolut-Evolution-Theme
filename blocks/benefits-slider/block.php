<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'benefits-slider']); ?>
<?php
get_template_part('blocks/benefits-slider/partial', null, array(
  'classes' => $classes,
  'benefits' => get_field('benefits'),
  'block_id' => get_field('block_unique_id'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>
