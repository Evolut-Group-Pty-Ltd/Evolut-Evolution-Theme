<?php
$settings = $args['scrollable_settings'];
$is_scrollable = $settings !== null && is_array($settings) && $settings['scrollable'] === true;
$visible_items = $is_scrollable ? $settings['visible_items'] : 5;
$items_gap = $is_scrollable ? $settings['items_gap'] : 20;
$rotate_speed = array_key_exists('rotate_speed', $settings) ? intval($settings['rotate_speed']) : 0;
?>
  <div class="image-showcase <?php echo $is_scrollable ? 'image-showcase--scrollable' : '' ?> <?php echo !empty($block['className']) ? $block['className'] : '' ?>" style="--visible-items: <?php echo $visible_items ?>; --items-gap: <?php echo $items_gap ?>px;" <?php echo $rotate_speed !== 0 ? 'data-rotate-speed="'. $rotate_speed . '"' : '' ?>>

  <?php if(get_field('text')): ?>
  <div class="image-showcase__text container"><?php the_field('text') ?></div>
  <?php endif; ?>
  <div class="image-showcase__container container">
    <div class="image-showcase__images">
      <?php while(have_rows('images')): the_row(); ?> 
      <div class="image-showcase__image-container">
        <img class="image-showcase__image" src="<?php echo get_sub_field('image')['url'] ?>" alt="<?php echo get_sub_field('image')['alt'] ?>">
      </div>
      <?php endwhile; ?>
    </div>

    <div class="image-showcase__navs">
      <button class="image-showcase__nav"><i data-feather="arrow-left"></i></button>
      <button class="image-showcase__nav"><i data-feather="arrow-right"></i></button>
    </div>
  </div>
</div>
