<?php
$posts = __( $args['posts'] );
$hero_image = __( $args['hero_image'] );
$include_excerpts = __( $args['include_excerpts'] );
$items_count = count($features);
?>

<div class="features__container container" style="--items-count: <?php echo $items_count ?>;">
    <div class="features__list">
      <?php foreach($posts as $post):
        $text = ($include_excerpts ? get_the_excerpt($post) : '');
      get_template_part('elements/feature/list', null, array(
        'title' => get_the_title($post),
        'text' => $text,
        'link' => get_the_permalink($post),
        'icon' => get_field('icon', $post),
        'link_title' => 'Learn More',
      ));
      ?>
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
    </div>
    <div class="features__image">
    	<img src="<?php echo $hero_image ?>">
    </div>
  </div>