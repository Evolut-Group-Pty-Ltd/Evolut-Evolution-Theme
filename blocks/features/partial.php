<?php
$features = __( $args['features'] );
$hero_image = __( $args['hero_image'] );
$items_count = count($features);
?>

<div class="features__container container" style="--items-count: <?php echo $items_count ?>;">
    <div class="features__list">
      <?php while(have_rows('features')): the_row();
      get_template_part('elements/feature/list', null, array(
        'title' => get_sub_field('title'),
        'text' => get_sub_field('description'),
        'link' => get_sub_field('link')['url'],
        'link_title' => get_sub_field('link')['title'],
        'link_target' => get_sub_field('link')['target'],
        'icon' => get_sub_field('icon'),
      ));
      ?>
      <?php endwhile; ?>
    </div>
    <div class="features__image">
    	<img src="<?php echo $hero_image ?>">
    </div>
  </div>