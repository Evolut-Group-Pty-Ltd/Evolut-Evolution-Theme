<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'video']); ?>
<?php
get_template_part('blocks/video/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'video' => get_field('video'),
  'video_type' => get_field('video_type'),
  'video_options' => get_field('video_options'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>