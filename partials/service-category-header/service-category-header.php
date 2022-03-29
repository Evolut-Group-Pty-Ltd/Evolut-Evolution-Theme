<?php
$blog = get_field('blog', 'option');
$featured_post = $blog['featured_blog_post'];
$post_type = get_post_type();
if($post_type === 'resource') {
  $resources = get_field('resources', 'option');
  $term = get_queried_object();
  foreach($resources['featured_resource_for_category'] as $featured) {
    if($featured['category'] === $term->term_id) {
      $featured_post = $featured['resource'];
      break;
    }
  }
}
?>
<section class="archive-header archive-header--<?php echo $post_type ?>">
  <div class="archive-header__container container">
    <h1 class="archive-header__title heading--display lines-shift-container">
    <?php if(is_category() || is_tax()): ?>
      <?php echo str_replace('Resource Category: ', '', get_the_archive_title()) ?>
    <?php else: ?>
      Latest Articles 
    <?php endif; ?>
    </h1>
    
    <div class="grid blog-post-item">
      <a class="grid__col--span6" href="<?php echo get_the_permalink($featured_post) ?>">
        <img class="blog-post-item__image" src="<?php echo get_the_post_thumbnail_url($featured_post) ?>" alt="<?php echo get_the_title($featured_post) ?>">
      </a>
      <div class="grid__col"></div>
      <div class="blog-post-item__details grid__col--span5">
        <?php if($post_type !== 'resource'): ?>
        <div class="blog-post-item__date"><?php echo get_the_time('j F Y', $featured_post) ?></div>
        <?php endif; ?>
        
        <div class="blog-post-item__title-n-text">
          <h3 class="blog-post-item__title"><a href="<?php echo get_the_permalink($featured_post) ?>"><?php echo get_the_title($featured_post) ?></a></h3>
          <div class="blog-post-item__text"><?php echo get_the_excerpt($featured_post) ?></div>
        </div>
        <a class="blog-post-item__link" href="<?php echo get_the_permalink($featured_post) ?>">Read More</a>
      </div>
    </div>
  </div>
</section>
