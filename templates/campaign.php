<?php /* 
Template Name: Campaign
Template Post Type: page, service, proposals, contracts
 */ ?>
<?php 
get_template_part('partials/header/header-campaign', null, array(
  'sticky' => false
)); ?>

<?php the_content(); ?>

<?php
wp_enqueue_script(EVOLUT_THEME_SLUG . '-content-only-page-js', get_stylesheet_directory_uri() . '/src/scripts/_content-only-page.js', array(), EVOLUT_THEME_VERSION, true);
get_template_part('partials/footer/footer-campaign');
?>