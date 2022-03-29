<?php
$background_video = get_field('bg_video');
$banner_height = get_field('banner_height');
$product_id = get_the_ID();
$product = wc_get_product( $product_id );
$product_title = $product->get_name();
$product_description = $product->get_description();
$product_sku = $product->get_sku();
$product_website = get_field("product_website");
$product_download = get_field("product_download");
?>
<section class="product_header service-header section banner-<?php echo $banner_height ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
  <?php if($background_video): ?>
  <video class="hero-banner-with-list__video" playsinline autoplay muted loop>
      <source src="<?php echo $background_video ?>" type="video/mp4">
  </video>
  <?php endif; ?>
  <div class="service-header__img-bg">
    <div class="service-header__container container grid">
      <div class="service-header__column grid__col--span8">
        <h3 class="service-header__sub-title">Product: <?php echo $product_sku ?></h3>
        <h1 class="service-header__title lines-shift-container"><?php echo get_the_title(); ?></h1>
        <div class="service-header__text text--intro lines-shift-container" style="--shift-delay: 150ms;"><?php the_excerpt(); ?></div>
      </div>
    </div>
    <div class="service-header__links-container container">
      <div class="related-services__header">PRODUCT LINKS</div>
      <div class="product__buttons">
          <?php if($product_website) : ?><a href="<?php echo $product_website; ?>" target="_blank" class="product__cta btn btn-purple-gradient">Product website</a><?php endif; ?><?php if($product_download) : ?><a href="<?php echo $product_download; ?>" target="_blank" class="product__cta btn btn-coral-gradient">Product brochure</a><?php endif; ?><a href="https://yurikaproto.evolut.com.au/wp-content/uploads/2022/03/Build-a-Quote-Yurika.zip" target="_blank" class="product__cta btn btn-coral-gradient">Build a Quote</a><a href="/contact-us/" class="product__cta btn btn-orange-gradient">Contact us</a>
      </div>
    </div>
  </div>
</section>