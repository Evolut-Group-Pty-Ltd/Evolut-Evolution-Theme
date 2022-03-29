<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'hero-banner']); ?>
<?php
get_template_part('blocks/hero-banner/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'background_url' => get_field('background')['url'],
  'title' => get_field('banner_title'),
  'text' => get_field('text'),
  'button_text' => get_field('button_text'),
  'button_link' => get_field('button_link'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>

