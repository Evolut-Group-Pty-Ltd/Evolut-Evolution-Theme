<?php
$items_count = 0;
$posts = __( $args['products'] );
$variant = __( $args['variant'] );
$card_width = __( $args['card_width'] );
$card_spacing = __( $args['card_spacing'] );
$card_align = __( $args['card_align'] );
$card_colour = __( $args['card_colour'] );
$text_colour = __( $args['text_colour'] );
$items_count = count($posts);
?>

<div class="post-cards__container <?php echo $variant === 'draggable' ? 'post-cards__container--draggable draggable-content__container no-scrollbar' : ''?>" style="--items-count: <?php echo $items_count ?>;">
    <div class="<?php echo $variant === 'draggable' ? 'draggable-content__items' : 'post-cards__grid container grid'?> card-space-<?php echo $card_spacing ?>">
      <?php foreach($posts as $post):
        $product = wc_get_product( $post->ID );
      get_template_part('elements/post-card/product-BG', null, array(
        'classes' => $variant === 'draggable' ? 'draggable-content__item' : 'grid__col--span' . $card_width,
        'title' => get_the_title($post),
        'text' => get_the_excerpt($post),
        'link' => get_the_permalink($post),
        'image_url' => get_the_post_thumbnail_url($post),
        'bg_color' => $card_colour,
        'price' => $product->get_price(),
        'sku' => $product->get_sku(),
      ));
      ?> 
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>