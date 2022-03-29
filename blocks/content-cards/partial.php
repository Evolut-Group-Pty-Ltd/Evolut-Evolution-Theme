<?php
$items_count = 0;
$cards = __( $args['cards'] );
$variant = __( $args['variant'] );
$card_width = __( $args['card_width'] );
$card_spacing = __( $args['card_spacing'] );
$card_align = __( $args['card_align'] );
$card_type = __( $args['card_type'] );
$card_colours = __( $args['card_colours'] );
$auto_rotation = $args['auto_rotation'];
$items_count = count($cards);

// No draggable variant anymore
if($variant === 'draggable') $variant = 'flickity';
$posts_count = count($cards);
$flickity_settings = array(
  'wrapAround' => $posts_count > 4,
  'autoPlay' => $auto_rotation,
  'pageDots' => false
);
if($posts_count <= 4) {
  $flickity_settings['contain'] = true;
}
if($posts_count <= 3) {
  $flickity_settings['prevNextButtons'] = false;
}

$variant_style = '';
if($variant==='draggable') :
  $variant_container_style = 'post-cards__container--draggable draggable-content__container no-scrollbar';
  $variant_items_style = 'draggable-content__items';
  $variant_item_style = 'draggable-content__item';
elseif($variant==='flickity') : 
  $variant_container_style = 'flickity__container post-cards--no-card-anim';
  $variant_items_style = 'carousel flickity__items';
  $variant_item_style = 'carousel-cell flickity__item';
else :
  $variant_container_style = '';
  $variant_items_style = 'post-cards__grid container grid';
  $variant_item_style = 'grid__col--span' . $card_width;
endif;
?>

<div class="post-cards__container <?php echo $variant_container_style; ?>" style="--items-count: <?php echo $items_count ?>;">
    <div class="<?php echo $variant_items_style; ?> card-space-<?php echo $card_spacing ?>"<?php if($variant==='flickity') : ?> data-flickity='<?php echo json_encode($flickity_settings) ?>'<?php endif; ?>>

      <?php foreach($cards as $card) :
      get_template_part('elements/post-card/' . $card_type, null, array(
        'classes' => $variant_item_style,
        'title' => $card['title'],
        'text' => nl2br($card['text']),
        'link' => $card['link']['url'],
        'image_url' => $card['image'],
        'icon' => $card['icon'],
        'card_align' => $card_align,
        'card_colours' => $card_colours,
        'background_colour' => $card['background_colour'],
        'video' => $card['video'],
        'video_options' => $card['video_options'],
        'show_date' => __( $args['show_date'] ),
        'date' => $card['date'],
      ));
      ?>
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>