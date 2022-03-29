<?php
$items_count = 0;

$title = __( $args['title'] );
$stats = __( $args['stats'] );
$stats_variant = __( $args['stats_variant'] );
$variant = __( $args['variant'] );
$card_width = __( $args['card_width'] );
$card_spacing = __( $args['card_spacing'] );
$card_layout = __( $args['card_layout'] );
$card_type = __( $args['card_type'] );
$card_align = __( $args['card_align'] );
$card_colours = __( $args['card_colours'] );
$items_count = count($stats);

if (!empty($stats)) {
?>

  <div class="post-cards__container stats-<?php echo $stats_variant; ?> <?php echo $variant === 'draggable' ? 'post-cards__container--draggable draggable-content__container no-scrollbar' : ''?>" style="--items-count: <?php echo $items_count ?>;">
    <div class="<?php echo $variant === 'draggable' ? 'draggable-content__items' : 'post-cards__grid container grid'?> card-space-<?php echo $card_spacing ?>">
      <?php foreach($stats as $stat):
      get_template_part('elements/stats-card/' . $card_type, null, array(
        'classes' => $variant === 'draggable' ? 'draggable-content__item' : 'grid__col--span' . $card_width,
        'stat' => $stat['stat'],
        'before_number' => $stat['before_number'],
        'after_number' => $stat['after_number'],
        'text' => $stat['text'],
        'link' => $stat['link'],
        'image_url' => $stat['image_url'],
        'bg_image' => $stat['bg_image'],
        'animation' => $stat['animation'],
        'animation_colours' => $stat['animation_colours'],
        'card_colours' => $card_colours,
        'card_align' => $card_align,
        'use_thousands_separator' => $stat['use_thousands_separator'],
      ));
      ?> 
      <?php endforeach; ?>
    </div>
  </div>
<?php } ?>
 