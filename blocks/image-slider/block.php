<?php
$slides = get_field('slides');
//var_dump($slides);
$slides_number = count($slides);
?>
<section class="image-slider slider <?php echo !empty($block['className']) ? $block['className'] : '' ?>" data-slide="1">
  <div class="slider__items">
    <?php while(have_rows('slides')): the_row(); ?>
    <div class="image-slider__item slider__item" style="background-image: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.5) 100%), url('<?php echo get_sub_field('image')['url'] ?>');">
      <div class="image-slider__item-container container">
        <?php if(get_sub_field('title')): ?>
        <h1 class="image-slider__item-title"><?php the_sub_field('title') ?></h1>
        <?php endif; ?>

        <?php if(get_sub_field('sub_title')): ?>
        <h3 class="image-slider__item-sub-title"><?php the_sub_field('sub_title') ?></h3>
        <?php endif; ?>

        <?php if(get_sub_field('text')): ?>
        <div class="image-slider__item-text"><?php the_sub_field('text') ?></div>
        <?php endif; ?>

        <?php
        $button = get_sub_field('button');
        if($button): ?>
          <a class="image-slider__item-btn btn" href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>"><?php echo $button['title'] ?></a>
        <?php endif; ?>
      </div>
    </div>
    <?php endwhile; ?>
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
</section>
