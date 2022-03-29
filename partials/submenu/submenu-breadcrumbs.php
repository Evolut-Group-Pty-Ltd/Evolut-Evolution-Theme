<?php
function breadcrumb_page( $post ) {
  $format = '<a href="%s" title="%s">%s</a> &gt; ';    
  $anc = array_map( 'get_post', array_reverse( (array) get_post_ancestors( $post ) ) );
  $links = array_map( 'get_permalink', $anc );
  foreach ( $anc as $i => $apost ) {
    $title = apply_filters( 'the_title', $apost->post_title );
    printf( $format, $links[$i], esc_attr($title), esc_html($title) );
  }
  echo apply_filters( 'the_title', $post->post_title );
}

//global $post;
$post_id = get_the_ID();
$post = get_post($post_id);

$current_post_type = get_post_type();
if($current_post_type == 'service' || $current_post_type == 'product') :
?>
  <section class="breadcrumbs">
  <nav class="breadcrumbs__container container">
  <?php 
  if($current_post_type=="service") :
    breadcrumb_page( $post ); 
  elseif($current_post_type=="product") :
    woocommerce_breadcrumb();
  endif;
  ?>
  </nav>
</section>
<?php endif; ?>