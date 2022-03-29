<?php
//$posts = __( $args['posts'] );
//$title = __( $args['title'] );
$posts = $args['posts'];
$title = $args['title'];
//var_dump($slides);
$slides_number = count($posts);
?>
<div class="image-slider slider <?php echo !empty($block['className']) ? $block['className'] : '' ?>" data-slide="1">
  <div class="slider__items">
    <?php foreach($posts as $post): ?> 
    <div class="image-slider__item slider__item" style="background-image: linear-gradient(180deg, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.9) 100%), url('<?php echo get_the_post_thumbnail_url($post) ?>'); ">
      <div class="image-slider__item-container container">
        <h1 class="image-slider__item-title"><?php echo $title ?></h1>
        <h3 class="image-slider__item-sub-title"><?php echo get_the_title($post) ?></h3>
        <div class="image-slider__item-text"><?php echo get_the_excerpt($post) ?></div>
          <a class="image-slider__item-btn btn" href="<?php echo get_the_permalink($post) ?>">Learn more</a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <nav class="image-slider__nav slider__nav container">
    <?php for($i = 1; $i <= $slides_number; $i++): ?>
    <button class="image-slider__nav-item slider__nav-item" data-target-slide="<?php echo $i ?>" aria-label="next item">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="10" cy="10" r="10" fill="currentColor"/>
      </svg>
    </button>  
    <?php endfor; ?>
  </nav>
</div>