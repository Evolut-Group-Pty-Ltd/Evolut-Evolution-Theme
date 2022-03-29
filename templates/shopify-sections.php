<?php /* Template Name: Shopify Sections */ ?>
<?php
if(array_key_exists('section', $_GET)) {
  if($_GET['section'] === 'header') {
    get_template_part('partials/header/header', 'body');
  } else if($_GET['section'] === 'footer') {
    get_template_part('partials/footer/footer', 'body');
  } else if($_GET['section'] === 'content') {
    $page = get_page_by_path('shopify-footer-content');
    if($page !== null) {
      $content = apply_filters('the_content', $page->post_content);
      $content = str_replace(']]>', ']]&gt;', $content);
      echo $content;
    }
  }
}
?>
