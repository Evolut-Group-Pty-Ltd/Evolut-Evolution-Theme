<?php get_template_part('partials/header/header'); ?>
<?php
    $post_type = get_field('post_type');
    $menu_name = (is_post_type_archive( 'casestudies' ) || is_tax( 'case_study_categories' )) ? 'casestudies' : 'insights';

    $args = array(
      'menu_name' => $menu_name,
      'post_type' => $post_type,
    );
  ?>
<?php //get_template_part('partials/submenu/submenu', null, $args); ?>
<?php  
$term = get_queried_object();
$bg_image = get_field('bg_image', $term);
  $args = array(
    'bg_image' => $bg_image,
  ); 
?>
<?php //get_template_part('partials/service-header/service-header-2', null, $args) ?>

<?php $post_type = get_post_type(); ?>

<a id="latest-articles" name="latest-articles"></a>

  <div class="archive-filter-bar container">
  <?php if(have_posts()): ?>
    <?php 
    if($post_type === 'post') : ?>

      <h3 class="archive-filter-bar__title">Tags</h3>
      <div class="archive-filter-bar__topics no-scrollbar">
      <?php
      $tags = array();
      $tax_slug = 'tag';
      if($post_type === 'post') {
        $tags = get_tags();
      }
      foreach($tags as $tag):
        $is_tag = false;
        if($post_type === 'post') {
          $is_tag = is_tag($tag);
        } 

        $tag_link = get_tag_link($tag->term_id);
      ?>
        <a href="<?php echo $tag_link ?>" class="archive-filter-bar__topic <?php echo $is_tag ? 'archive-filter-bar__topic--active' : '' ?>"><?php echo $tag->name ?></a>
      <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php //if($post_type !== 'resource'): ?>
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
      <?php //endif; ?>
    </div>

    <?php 
    $card_type = "partial";
    if($post_type === 'resource') :
      $resource_category = $term->slug;
      if($resource_category == "product-specifications") :
        $card_type = "list-item";
      endif;
    endif;

    get_template_part('blocks/block-wrapper', null, ['block_name' => 'post-cards', 'margin_formatting' => ['margin_top' => 'half', 'margin_bottom' => 'half'], 'padding' => ['padding_top' => 'none', 'padding_bottom' => 'none']]);
    global $wp_query;
    $posts = $wp_query->posts;
    get_template_part('blocks/post-cards/partial', null, array(
      'classes' => !empty($block['className']) ? $block['className'] : '',
      'posts' => $posts,
      'variant' => 'wrap',
      'card_type' => $card_type,
      'card_width' => '4',
      'card_spacing' => '20',
      'show_date' => true,
    ));
    get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']);
    ?>

  <?php get_template_part('partials/pagination/pagination') ?>
  <?php else: ?>
  <div class="archive-posts-list">
  No posts found!
  </div>
  <?php endif; ?>

<?php get_template_part('partials/footer/footer'); ?>
