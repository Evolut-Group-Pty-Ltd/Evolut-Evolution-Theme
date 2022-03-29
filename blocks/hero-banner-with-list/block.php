<?php
$background_image = get_field('background_image');
$background_video = get_field('background_video');
$bg_image_settings = get_field('bg_image_settings');

$classes = array();
if(get_field('background_shadow_overlay')) $classes[] = 'hero-banner-with-list--shadow-overlay';
if(!empty($block['className'])) $classes[] = $block['className'];
?>
<section class="hero-banner-with-list section <?php echo implode(' ', $classes) ?>">
  <?php if($background_video): ?>
  <video class="hero-banner-with-list__video" playsinline autoplay muted loop>
      <source src="<?php echo $background_video ?>" type="video/mp4">
  </video>
<?php else : ?>
  <div class="hero-banner-with-list__video" <?php echo $background_image ? sprintf('style="background-image: url(%s); %s"', $background_image, $bg_image_settings) : '' ?>>
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
        </a>
        <?php endwhile; ?>
      </nav>
    </div>
  </div>
  <a class="hero-banner-with-list__btn scroll-to" href="<?php the_field('scroll_to_target') ?>" data-target="<?php the_field('scroll_to_target') ?>"><i data-feather="arrow-down" aria-label="Scroll Down"></i></a>
</section>
