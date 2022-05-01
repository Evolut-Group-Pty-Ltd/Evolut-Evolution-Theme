<?php
$items_count = 0;
$posts = __( $args['posts'] );
$variant = __( $args['variant'] );
$card_width = __( $args['card_width'] );
$card_spacing = __( $args['card_spacing'] );
$card_align = __( $args['card_align'] );
$image_align = __( $args['image_align'] );
$card_type = __( $args['card_type'] );
$card_colours = __( $args['card_colours'] );
$auto_rotation = $args['auto_rotation'];
$items_count = count($posts);

// No draggable variant anymore
if($variant === 'draggable') $variant = 'flickity';
$posts_count = count($posts);
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
      <?php foreach($posts as $post):
        if(get_field("deliverable_bullets", $post)) :
          $bullets = get_field("deliverable_bullets", $post);
          $tags = array();
          foreach($bullets as $bullet) :
            array_push($tags, ["tag_title" => $bullet['deliverable_bullet_title']]);
          endforeach;
        endif;
      get_template_part('elements/post-card/' . $card_type, null, array(
        'classes' => $variant_item_style,
        'title' => get_the_title($post),
        'text' => get_the_excerpt($post),
        'link' => get_the_permalink($post),
        'image_url' => get_the_post_thumbnail_url($post),
        'download' => get_field('download', $post),
        'card_colours' => $card_colours,
        'show_date' => __( $args['show_date'] ),
        'date' => get_the_date('jS M Y', $post->ID),
        'image_align' => $image_align,
        'tags' => $tags,
        'code' => get_field('code', $post),
      ));
      ?> 
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
