<?php
$featured_download = get_field('featured_download');
$downloads = get_field('downloads');
$background_video = get_field('bg_video');
$banner_height = get_field('banner_height');
global $post;
//$currentpage = $post->ID;
$currentpage = get_the_ID();
$services_children = get_children( 'post_parent=' . $currentpage);
function has_children() {
  global $post;
  return count( get_posts( array('post_parent' => $post->ID, 'post_type' => $post->post_type) ) );
}
$services_parent = get_post_parent($currentpage);
// get all parents and grand parents in an array
$ancestors = array_reverse(get_post_ancestors($currentpage));
$level = count(get_post_ancestors( $post->ID )) + 1;
// grand parent page id = From the array created above
$greatgrandparentID = $ancestors[0];
$grandparentID = $ancestors[1];
$parentID = $ancestors[2];
//$post = get_queried_object();
$postType = get_post_type_object(get_post_type($post));
$post_type_singular = ($postType) ? $postType->labels->singular_name : '';
if(get_field('title')) :
    $page_tag = get_field('sub_title') ? get_field('sub_title') : '';
    $page_title = get_field('title') ? get_field('title') : get_the_title();
    $page_description = get_field('title') ? get_field('description') : get_the_excerpt();
    $bg_image = get_the_post_thumbnail_url();
elseif(is_category()) :
    $page_tag = "Knowledge Hub";
    $page_title = str_replace('Category: ', '', get_the_archive_title());
    $page_description = get_the_archive_description();
    $bg_image = get_field('bg_image');
    if ( ! empty( $args['bg_image'] ) ) :
      $bg_image = __( $args['bg_image'] );
    endif;

elseif(is_tax('resource_category')) :
    $page_tag = "Knowledge Hub";
    $page_title = str_replace('Resource Category: ', '', get_the_archive_title());
    $page_description = get_the_archive_description();
    $bg_image = get_field('bg_image');
elseif($post_type_singular == 'Post') :
    $categories = get_the_category(); 
    $page_tag = $categories[0]->name;
    $page_title = get_the_title();
    $page_description = get_the_excerpt();
    $bg_image = get_the_post_thumbnail_url();
elseif($post_type_singular == 'Resource') :
    $terms = get_the_terms($post,'resource_category');
    $page_tag = $terms[0]->name;
    $page_title = get_the_title();
    $page_description = get_the_excerpt();
    $bg_image = get_the_post_thumbnail_url();
else :
    $page_tag = $post_type_singular;
    $page_title = get_the_title();
    $page_description = get_the_excerpt();
    $bg_image = get_the_post_thumbnail_url();
endif;
?>
<section class="service-header section banner-<?php echo $banner_height ?>" style="background-image: url(<?php echo $bg_image; ?>)">
  <?php if($background_video): ?>
  <video class="hero-banner-with-list__video" playsinline autoplay muted loop>
      <source src="<?php echo $background_video ?>" type="video/mp4">
  </video>
  <?php endif; ?>
  <div class="service-header__img-bg">
    <div class="service-header__container container grid">
      <div class="service-header__column grid__col--span8">
        <h3 class="service-header__sub-title"><?php if(!is_page()) : ?><?php echo (($greatgrandparentID) ? get_the_title($greatgrandparentID) : $page_tag); ?><?php echo (($grandparentID) ? ' > ' . get_the_title($grandparentID) : ''); ?><?php else : ?><?php echo $page_tag; ?><?php endif; ?></h3>
        <h1 class="service-header__title lines-shift-container"><?php echo $page_title; ?></h1>
        <div class="service-header__text text--intro lines-shift-container" style="--shift-delay: 150ms;"><?php echo $page_description; ?></div>
        <?php if(!is_category() && $post_type_singular == "Post") : ?><div class="post-header__posted-date">Posted: <?php echo get_the_time('j F Y') ?></div><?php endif; ?>
      </div>
      <div class="service-header__column--links grid__col--span4">
          <?php if($downloads && $page_tag!="Knowledge Hub") : ?>
              <div class="related-services__header">FEATURED DOWNLOAD/S</div>
              <div class="service-header__featured-download__container">
              <?php foreach($downloads as $download) : ?>
              <a href="<?php echo $download["download"]["url"] ?>" target="_blank" class="service-header__featured-download">
                <img src="<?php echo $download["icon"] ?>" class="service-header__featured-download__image">
                <div class="service-header__featured-download__meta">
                  <h4 class="service-header__featured-download__title"><?php echo $download["download"]["title"] ?></h4>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
      </div>
    </div>
    <!--
    <?php
    if(has_children() && ($level < 3)) :
      ?>
    <div class="service-header__links-container container">
      <div class="related-services__header">SERVICE OFFERING</div>
      <ul id="child-service__list" class="service-header__related-services children">
          <?php wp_list_pages( 'depth=1&post_type=service&title_li=&child_of=' . $currentpage ); ?>
      </ul>
    </div>
    <?php endif; ?>
  -->
  </div>
</section>