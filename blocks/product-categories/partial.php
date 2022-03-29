<?php
$items_count = 0;
$categories = __( $args['product_categories'] );
$variant = __( $args['variant'] );
$card_width = __( $args['card_width'] );
$card_spacing = __( $args['card_spacing'] );
$card_align = __( $args['card_align'] );
$card_type = __( $args['card_type'] );
$card_colour = __( $args['card_colour'] );
$icon_colour = __( $args['icon_colour'] );
$text_colour = __( $args['text_colour'] );
$items_count = count($categories);
?>

<div class="post-cards__container <?php echo $variant === 'draggable' ? 'post-cards__container--draggable draggable-content__container no-scrollbar' : ''?>" style="--items-count: <?php echo $items_count ?>;">
    <div class="<?php echo $variant === 'draggable' ? 'draggable-content__items' : 'post-cards__grid container grid'?> card-space-<?php echo $card_spacing ?>">
      <?php foreach($categories as $category):
        $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        $link = get_term_link( $category->term_id, 'product_cat' );
      get_template_part('elements/post-card/' . $card_type, null, array(
        'classes' => $variant === 'draggable' ? 'draggable-content__item' : 'grid__col--span' . $card_width,
        'title' => $category->name,
        'text' => $category->description,
        'link' => $link,
        'image_url' => $image,
        'bg_color' => $card_colour,
      ));
      ?> 
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>