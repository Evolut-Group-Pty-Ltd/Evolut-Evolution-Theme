<?php
$slides = get_field('slides');
$slides_number = count($slides);
?>
<section class="image-with-text-slider section slider slider--relative <?php echo !empty($block['className']) ? $block['className'] : '' ?>" data-slide="1">
  <div class="image-with-text-slider__container container">
    <div class="image-with-text-slider__items slider__items">
      <?php while(have_rows('slides')): the_row(); ?>
      <div class="image-with-text-slider__item slider__item grid">
        <div class="grid__col--span6">
          <img class="image-with-text-slider__image" src="<?php echo get_sub_field('image')['url'] ?>" alt="<?php echo get_sub_field('image')['alt'] ?>">
        </div>
        <div class="grid__col--span6">
          <h3 class="image-with-text-slider__item-title"><?php the_sub_field('title') ?></h3>
          <strong class="image-with-text-slider__item-sub-title"><?php the_sub_field('sub_title') ?></strong>
          <div class="image-with-text-slider__item-text"><?php echo nl2br(get_sub_field('text')) ?></div>
        </div>
      </div>
      <?php endwhile; ?>
    </div> 
    <div class="image-with-text-slider__arrows slider__arrows">
      <button class="image-with-text-slider__arrow slider__arrow"><i data-feather="arrow-left"></i></button>
      <button class="image-with-text-slider__arrow slider__arrow"><i data-feather="arrow-right"></i></button>
    </div>
    <div class="image-with-text-slider__nav slider__nav slider__nav--dark">
      <?php for($i = 1; $i <= $slides_number; $i++): ?>
      <button class="image-with-text-slider__nav-item slider__nav-item" data-target-slide="<?php echo $i ?>">
        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M13.8454 0.339722C14.5599 0.339722 15.2202 0.72092 15.5774 1.33972L19.4227 7.99998C19.78 8.61878 19.78 9.38117 19.4227 9.99998L15.5774 16.6602C15.2202 17.279 14.5599 17.6602 13.8454 17.6602L6.1548 17.6602C5.44027 17.6602 4.78001 17.279 4.42275 16.6602L0.577447 9.99998C0.220182 9.38117 0.220182 8.61878 0.577448 7.99998L4.42275 1.33972C4.78001 0.720919 5.44027 0.339721 6.1548 0.339722L13.8454 0.339722Z" fill="currentColor"/>
        </svg>
      </button>  
      <?php endfor; ?>
    </div>
  </div>
</section>
