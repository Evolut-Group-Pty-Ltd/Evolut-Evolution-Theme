<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'posts-preview']); ?>
<?php
get_template_part('blocks/posts-preview/partial', null, array(
  'classes' => $classes,
  'posts_source' => get_field('posts_source'),
  'heading' => get_field('heading'),
  'selected_posts' => get_field('selected_posts'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'posts-preview', 'position' => 'end']); ?>