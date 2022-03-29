<?php
$slides = get_field('slides');
$slides_number = count($slides);
$rotate_speed = 0;
if(get_field('auto_rotate_speed')) $rotate_speed = get_field('auto_rotate_speed');
$bg_colour = get_field("block_colours")["background_colour"];
$heading_tag_colour = get_field("block_colours")["heading_tag_colour"];
$title_colour = get_field("block_colours")["title_colour"];
$subheading_colour = get_field("block_colours")["subheading_colour"];
$description_colour = get_field("block_colours")["description_colour"];
?>
<section class="review-slider slider <?php echo !empty($block['className']) ? $block['className'] : '' ?>" data-slide="1" data-rotate-speed="<?php echo $rotate_speed ?>"<?php if($bg_colour) : ?>style="background:<?php echo $bg_colour ?>"<?php endif; ?>>
  <div class="slider__items">
    <?php while(have_rows('slides')): the_row(); ?>
    <div class="review-slider__item slider__item">
      <div class="review-slider__item-container container">
        <div class="review-slider__grid grid">
          <div class="review_slider__item-content grid__col--span7">
            <?php if(get_field('heading_tag') || get_field('description')) : ?>
            <div class="review-slider__item-heading">
              <?php if(get_field('heading_tag')): ?>
              <h6 class="review-slider__item-tag"<?php if($heading_tag_colour) : ?> style="color:<?php echo $heading_tag_colour ?>"<?php endif; ?>><?php echo get_field('heading_tag'); ?></h6>
              <?php endif; ?>

              <?php if(get_field('description')): ?>
              <div class="review-slider__item-description"<?php if($subheading_colour) : ?> style="color:<?php echo $subheading_colour ?>"<?php endif; ?>><?php echo get_field('description'); ?></div>
              <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="review-slider__item-details">
              <?php if(get_sub_field('title')): ?>
              <h2 class="review-slider__item-title"<?php if($title_colour) : ?> style="color:<?php echo $title_colour ?>"<?php endif; ?>><?php the_sub_field('title') ?></h2>
              <?php endif; ?>

              <?php if(get_sub_field('text')): ?>
              <div class="review-slider__item-text"<?php if($description_colour) : ?> style="color:<?php echo $description_colour ?>"<?php endif; ?>><?php the_sub_field('text') ?></div>
              <?php endif; ?>

              <?php if(get_sub_field('name')): ?>
              <div class="review-slider__item-name"><?php the_sub_field('name') ?></div>
              <?php endif; ?>
           
              <nav class="review-slider__nav slider__nav slider__nav--dark">
                <?php for($i = 1; $i <= $slides_number; $i++): ?>
                <button class="review-slider__nav-item slider__nav-item" data-target-slide="<?php echo $i ?>" aria-label="next item">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="10" fill="currentColor"/>
                  </svg>
                </button>  
                <?php endfor; ?>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="review-slider__img" style="background-image: url('<?php echo get_sub_field('image')['url'] ?>');"></div>
    </div>
    <?php endwhile; ?>
  </div>
</section>
