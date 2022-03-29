<?php
$related_services = get_field('related_services');

$args = array(
  'title' => 'Related services',
  'card_type' => 'list-item',
  'variant' => 'wrap',
  'card_spacing' => '10',
  'card_width' => '12',
  'posts' => $related_services,
);
?>
<?php get_template_part('blocks/post-cards/block', null, $args ); ?>

<?php
$related_resources = get_field('related_resources');

$args = array(
  'title' => 'Related resources',
  'card_type' => 'list-item',
  'variant' => 'wrap',
  'card_spacing' => '10',
  'card_width' => '12',
  'posts' => $related_resources,
);
?>
<?php get_template_part('blocks/post-cards/block', null, $args ); ?>

<?php
$related_solutions = get_field('related_solutions');

$args = array(
  'title' => 'Related solutions',
  'card_type' => 'list-item',
  'variant' => 'wrap',
  'card_spacing' => '10',
  'card_width' => '12',
  'posts' => $related_solutions,
);
?>
<?php get_template_part('blocks/post-cards/block', null, $args ); ?>

<?php
$related_case_studies = get_field('related_case_studies');

$args = array(
  'title' => 'Related case studies',
  'card_type' => 'list-item',
  'variant' => 'wrap',
  'card_spacing' => '10',
  'card_width' => '12',
  'posts' => $related_case_studies,
);
?>
<?php get_template_part('blocks/post-cards/block', null, $args ); ?>

<?php
$related_industries = get_field('related_industries');

$args = array(
  'title' => 'Related industries',
  'card_type' => 'list-item',
  'variant' => 'wrap',
  'card_spacing' => '10',
  'card_width' => '12',
  'posts' => $related_industries,
);
?>
<?php get_template_part('blocks/post-cards/block', null, $args ); ?>