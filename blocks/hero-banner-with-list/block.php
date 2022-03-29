<?php
$background_image = get_field('background');
if($background_image) $background_image = $background_image['url'];

$background_video = get_field('background_video');

$autoplay = " autoplay";
$controls = "";
$loop = " loop";
$muted = " muted";
$video_options_string = $autoplay . $controls . $loop . $muted;

$classes = array();
if(get_field('background_shadow_overlay')) $classes[] = 'hero-banner-with-list--shadow-overlay';
if(!empty($block['className'])) $classes[] = $block['className'];
?>
<section class="hero-banner-with-list section <?php echo implode(' ', $classes) ?>" <?php echo $background_image ? sprintf('style="background-image: url(%s);"', $background_image) : '' ?>>
  <?php if($background_video): ?>
  <div class="video__container swarmify__video container block">
    <smartvideo src="<?php echo $video ?>" width="1280" height="720" class="swarm-fluid" controls=""<?php echo $video_options_string; ?>></smartvideo>
  </div>
  <?php endif; ?>
  <div class="hero-banner-with-list__grid container grid">
    <div class="hero-banner-with-list__container grid__col--span8">
      <h1 class="hero-banner-with-list__title lines-shift-container"><?php the_field('title') ?></h1>
      <div class="hero-banner-with-list__text lines-shift-container" style="--shift-delay: 300ms;"><?php the_field('text') ?></div>
    </div>
    <div class="hero-banner-with-list__items grid__col--span12">
      <nav class="hero-banner-with-list__list grid__col--span5">
        <?php while(have_rows('list')): the_row(); ?>
        <a class="hero-banner-with-list__list-item" href="<?php the_sub_field('link_url') ?>">
          <?php the_sub_field('link_text') ?>
          <!-- <i class="hero-banner-with-list__list-icon" data-feather="arrow-right"></i> -->
        </a>
        <?php endwhile; ?>
      </nav>
    </div>
  </div>
<!--  <img class="hero-banner-with-list__corner" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/hero-hex-corner.svg"> -->
  <a class="hero-banner-with-list__btn scroll-to" href="<?php the_field('scroll_to_target') ?>" data-target="<?php the_field('scroll_to_target') ?>"><i data-feather="arrow-down" aria-label="Scroll Down"></i></a>
</section>
