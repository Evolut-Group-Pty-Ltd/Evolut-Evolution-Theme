<?php
$link_cards = get_field('link_cards');
$items_count = count($link_cards);
?>
<section class="link-cards-slider draggable-content section visible-tag <?php echo !empty($block['className']) ? $block['className'] : '' ?>" style="--items-count: <?php echo $items_count ?>;">
  <?php if(get_field('title')): ?>
  <h1 class="link-cards-slider__title"><?php the_field('title') ?></h1>
  <?php endif; ?>

  <div class="link-cards-slider__container draggable-content__container no-scrollbar">
    <div class="link-cards-slider__items draggable-content__items">
      <?php while(have_rows('link_cards')): the_row(); 
      $bgattr = '';
      $background = get_sub_field('background');
      if($background['image']) {
        $bgattr = sprintf('style="background-image: %s, url(%s);"', $background['overlay'], $background['image']);
      }
      ?>
      <a class="link-cards-slider__item draggable-content__item <?php echo $bgattr !== '' ? 'link-cards-slider__item--bg' : '' ?>" href="<?php the_sub_field('link') ?>" <?php echo $bgattr ?>>
        <?php /*
        <svg class="link-cards-slider__item-icon" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M13.8454 0.339722C14.5599 0.339722 15.2202 0.72092 15.5774 1.33972L19.4227 7.99998C19.78 8.61878 19.78 9.38117 19.4227 9.99998L15.5774 16.6602C15.2202 17.279 14.5599 17.6602 13.8454 17.6602L6.1548 17.6602C5.44027 17.6602 4.78001 17.279 4.42275 16.6602L0.577447 9.99998C0.220182 9.38117 0.220182 8.61878 0.577448 7.99998L4.42275 1.33972C4.78001 0.720919 5.44027 0.339721 6.1548 0.339722L13.8454 0.339722Z" fill="currentColor"/> -->
        </svg>
        */?>
        <h3 class="link-cards-slider__item-title"><?php the_sub_field('title') ?></h3>
        <div class="link-cards-slider__item-text">
        <?php the_sub_field('text') ?>
        </div>
        <div class="link-cards-slider__item-link">
          <?php if(get_field('custom_card_icon')): ?>
          <img class="link-cards-slider__item-link-icon" src="<?php the_field('custom_card_icon') ?>" alt="Open">
          <?php else: ?>
          <i class="link-cards-slider__item-link-icon" data-feather="arrow-right"></i>
          <?php endif; ?>
        </div> 
      </a>
      <?php endwhile; ?>
    </div>
  </div>
</section>
