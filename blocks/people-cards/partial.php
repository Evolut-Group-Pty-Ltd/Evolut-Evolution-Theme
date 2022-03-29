<?php
$items_count = 0;
$posts = __( $args['posts'] );
$variant = __( $args['variant'] );
$card_width = __( $args['card_width'] );
$card_spacing = __( $args['card_spacing'] );
$card_align = __( $args['card_align'] );
$card_type = __( $args['card_type'] );
$card_colours = __( $args['card_colours'] );
$items_count = count($posts);
?>

<div class="people-cards__container <?php echo $variant === 'draggable' ? 'people-cards__container--draggable draggable-content__container no-scrollbar' : ''?>" style="--items-count: <?php echo $items_count ?>;">
    <div class="<?php echo $variant === 'draggable' ? 'draggable-content__items' : 'people-cards__grid container grid'?> card-space-<?php echo $card_spacing ?>">
      <?php foreach($posts as $post):
      get_template_part('elements/people-card/' . $card_type, null, array(
        'classes' => $variant === 'draggable' ? 'draggable-content__item' : 'grid__col--span' . $card_width,
        'title' => get_the_title($post),
        'text' => get_the_excerpt($post),
        'link' => get_the_permalink($post),
        'image_url' => get_the_post_thumbnail_url($post),
        'linkedin' => get_field('linkedin',$post->ID),
        'email_address' => get_field('email_address',$post->ID),
        'phone' => get_field('phone',$post->ID),
        'position' => get_field('position',$post->ID),
        'card_colours' => $card_colours,
      ));
      ?> 
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>