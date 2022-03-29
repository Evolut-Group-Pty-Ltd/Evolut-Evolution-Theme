<?php
$background_video = get_field('bg_video');
$banner_height = get_field('banner_height');
?>
<section class="service-header section banner-<?php echo $banner_height ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
  <?php if($background_video): ?>
  <video class="hero-banner-with-list__video" playsinline autoplay muted loop>
      <source src="<?php echo $background_video ?>" type="video/mp4">
  </video>
  <?php endif; ?>
  <div class="service-header__img-bg">
    <div class="service-header__container container grid">
      <div class="service-header__column grid__col--span8">
        <h3 class="service-header__sub-title">Service</h3>
        <h1 class="service-header__title lines-shift-container"><?php the_title() ?></h1>
        <div class="service-header__text text--intro lines-shift-container" style="--shift-delay: 150ms;"><?php the_excerpt() ?></div>
      </div>
      <div class="service-header__column--related grid__col--span4">
        <?php
        $services_children = get_children( 'post_parent=' . get_the_ID());
        if(!empty($services_children) && $services_children !== null) {
          ?>
        <h4 class="service-header__related-title"><?php the_title() ?> Services</h4>
        <ul id="related-service__list" class="service-header__related-services">
            <?php wp_list_pages( 'post_type=service&title_li=&child_of=' . get_the_ID() ); ?>
        </ul>
        <?php 
        }
        $services_parent = get_post_parent(get_the_ID()); 
        if($services_parent !== null) {
        ?>
        <a class="service-header__parent-link" href="<?php echo get_the_permalink($services_parent) ?>"><< Back to: <?php echo get_the_title($services_parent) ?></a>
      <?php } ?>
      </div>
    </div>
    <?php
    $page_menu = get_field("page_menu");
    if($page_menu) :
    ?>
    <div class="service-header__links-container container">
      <?php while( have_rows('page_menu') ): the_row(); ?>
        <a href="<?php echo get_sub_field('anchor'); ?>" class="service-header__link"><?php echo get_sub_field('link_title'); ?></a>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  <a class="hero-banner-with-list__btn scroll-to" href="[name='page-content-start']" data-target="[name='page-content-start']"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg></a>
  </div>
</section>
