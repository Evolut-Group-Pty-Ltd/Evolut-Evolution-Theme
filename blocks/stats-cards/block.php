<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
  jQuery(document).ready(function( $ ) {
      $('.counter').counterUp({
          delay: 10,
          time: 2000
      });
  });
  </script>
<?php get_template_part('blocks/acf-block-inputs', null, ['block_name' => 'stats-cards']); ?>
<?php
get_template_part('blocks/stats-cards/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'stats' => get_field('stats'),
  'stats_variant' => get_field('stats_variant'),
  'variant' => get_field('variant'),
  'card_width' => get_field('card_width'),
  'card_spacing' => get_field('card_spacing'),
  'card_layout' => get_field('card_layout'),
  'card_type' => get_field('card_type'),
  'card_align' => get_field('card_align'),
  'card_colours' => get_field('card_colours'),
));
?>
<?php get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="/wp-content/themes/evolut-starter/src/scripts/jquery.counterup.min.js"></script>