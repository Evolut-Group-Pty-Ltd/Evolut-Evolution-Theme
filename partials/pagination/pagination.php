<?php echo get_the_posts_pagination(array(
  'class' => 'pagination',
  'prev_text' => '<img class="pagination__arrow" src="' . get_stylesheet_directory_uri() . '/src/images/pagination_arrow_back.svg">',
  'next_text' => '<img class="pagination__arrow" src="' . get_stylesheet_directory_uri() . '/src/images/pagination_arrow_forwards.svg">',
))?>

