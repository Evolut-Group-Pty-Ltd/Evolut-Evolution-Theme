<?php include 'wp-content/themes/evolut-starter/includes/block-formatting.php'; ?>
<?php
$classes = !empty($block['className']) ? $block['className'] : '';
$classes .= 'margin--top-' . esc_attr($margin_top);
$classes .= ' margin--bottom-' . esc_attr($margin_bottom);
?>
<?php
get_template_part('blocks/posts-preview/partial', null, array(
  'classes' => $classes,
  'posts_source' => get_field('posts_source'),
  'selected_posts' => get_field('selected_posts')
));
?>
