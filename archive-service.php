<?php get_template_part('partials/header/header'); ?>
<?php get_template_part('partials/archive-header/archive-header') ?>
<?php $post_type = get_post_type(); ?>

<a id="latest-articles" name="latest-articles"></a>
<div class="container">
  <?php if(have_posts()): ?>
  <div class="archive-filter-bar">
    <h3 class="archive-filter-bar__title"><?php echo $post_type === 'resource' ? 'Resources' : 'Topics' ?></h3>

    <div class="archive-filter-bar__topics no-scrollbar">
    <?php
    $categories = array();
    $tax_slug = 'category';
    if($post_type === 'post') {
      $categories = get_categories();
    } else if($post_type === 'resource') {
      $categories = get_terms(array('taxonomy' => 'resource_category'));
      $tax_slug = 'resource_category';
    }
    foreach($categories as $category):
      $is_category = false;
      if($post_type === 'post') {
        $is_category = is_category($category);
      } else if($post_type === 'resource') {
        $is_category = is_tax($tax_slug, $category->name);
      }

      $category_link = get_category_link($category->term_id);
    ?>
      <a href="<?php echo $category_link ?>" class="archive-filter-bar__topic <?php echo $is_category ? 'archive-filter-bar__topic--active' : '' ?>"><?php echo $category->name ?></a>
    <?php endforeach; ?>
    </div>

    <?php if($post_type !== 'resource'): ?>
    <div class="archive-filter-bar__order">
      <form action="#latest-articles">
        <?php $orderby = get_query_var('orderby'); ?>
        <select class="archive-filter-bar__order-select input--select" name="orderby" onchange="this.parentNode.submit()">
            <option value="date" <?php echo 'date' == $orderby ? 'selected' : ''?>>Sort by: Date</option>
            <option value="title" <?php echo 'title' == $orderby ? 'selected' : ''?>>Sort by: Title</option>
            <option value="author" <?php echo 'author' == $orderby ? 'selected' : ''?>>Sort by: Author</option>
        </select>
      </form>
    </div>
    <?php endif; ?>
  </div>
  <div class="archive-posts-list">
  <?php while(have_posts()): the_post();?>
      <div class="blog-post-item__container grid">
        <a class="grid__col--span6" href="<?php echo get_the_permalink() ?>">
          <img class="blog-post-item__image" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title() ?>">
        </a>
        <div class="grid__col"></div>
        <div class="blog-post-item__details grid__col--span5">
          <?php if($post_type !== 'resource'): ?>
          <div class="blog-post-item__date"><?php echo get_the_time('j F Y') ?></div>
          <?php endif; ?>
          
          <div class="blog-post-item__title-n-text">
            <h3 class="blog-post-item__title"><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
            <div class="blog-post-item__text"><?php echo get_the_excerpt() ?></div>
          </div>
          <a class="blog-post-item__link" href="<?php echo get_the_permalink() ?>">Read More</a>
        </div>
      </div>
  <?php endwhile; ?>
  </div>
  <?php get_template_part('partials/pagination/pagination') ?>
  <?php else: ?>
  <div class="archive-posts-list">
  No posts found!
  </div>
  <?php endif; ?>
</div>

<?php get_template_part('partials/footer/footer'); ?>
