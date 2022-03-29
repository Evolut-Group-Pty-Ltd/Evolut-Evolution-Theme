<?php get_template_part('blocks/shopify-collection/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'title' => get_field('title'),
  'collection_id' => get_field('collection_id')
)) ?>
