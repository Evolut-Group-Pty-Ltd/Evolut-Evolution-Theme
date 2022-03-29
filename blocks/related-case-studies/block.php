<?php
$posts = get_field('posts');
$items_count = count($posts);
?>
<section class="post-cards draggable-content section visible-tag <?php echo !empty($block['className']) ? $block['className'] : '' ?>">
  <?php if(get_field('title')): ?>
  <h1 class="post-cards__title container"><?php the_field('title') ?></h1>
  <?php endif; ?>

  <div class="post-cards__container draggable-content__container no-scrollbar" style="--items-count: <?php echo $items_count ?>;">
    <div class="draggable-content__items">
      <?php foreach($posts as $post): ?> 
      <div class="post-cards__item draggable-content__item">
        <a class="post-cards__item-image" href="<?php echo get_the_permalink($post) ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url($post) ?>); "><?php echo get_the_title($post) ?></a>
        <div class="post-cards__item-content">
          <h5 class="post-cards__item-title"><?php echo get_the_title($post) ?></h5>
          <div class="post-cards__item-text">
            <?php echo get_the_excerpt($post) ?>
          </div>
          <a class="post-cards__item-link" href="<?php echo get_the_permalink($post) ?>"><i data-feather="arrow-right"></i></a> 
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

</section>
