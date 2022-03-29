<?php /* 
Template Name: Service Complex
Template Post Type: service
 */ ?>
<?php get_template_part('partials/header/header'); ?>
<?php
$args = array(
    'menu_name' => 'capabilities',
    'post_type' => 'service',
);
?>
<?php get_template_part('partials/submenu/submenu', null, $args ); ?>
<?php get_template_part('partials/service-header/service-header'); ?>

<?php the_content(); ?>

<?php get_template_part('partials/footer/footer'); ?>