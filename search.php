<?php 
global $wp_query;
get_template_part('partials/header/header');
//get_template_part('partials/service-header/service-header-2', null, null); 
?>
  <h2 class="search-title section block container margin--top-standard"> <?php echo $wp_query->found_posts; ?>
          <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>" </h2>

    <?php 
    get_template_part('blocks/block-wrapper', null, ['block_name' => 'post-cards', 'margin_formatting' => ['margin_top' => 'half', 'margin_bottom' => 'half'], 'padding' => ['padding_top' => 'none', 'padding_bottom' => 'none']]);
    
    $posts = $wp_query->posts;
    get_template_part('blocks/post-cards/partial', null, array(
      'classes' => !empty($block['className']) ? $block['className'] : '',
      'posts' => $posts,
      'variant' => 'wrap',
      'card_type' => 'partial',
      'card_width' => '4',
      'card_spacing' => '20',
      'show_date' => true,
    ));
    get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']);
    ?>

  <?php get_template_part('partials/pagination/pagination') ?>

<?php get_template_part('partials/footer/footer'); ?>