<?php /* 
Template Name: Service Extended
Template Post Type: service
 */ ?>
<?php get_template_part('partials/header/header'); ?>
<?php
$args = array(
    'menu_name' => 'capabilities',
    'post_type' => 'service',
    'menu_type' => 'submenu',
);
?>
<?php get_template_part('partials/submenu/submenu', null, $args ); ?>
<?php get_template_part('partials/service-header/service-header-2'); ?>

<?php the_content(); ?>

<?php
$currentpage = get_the_ID();
$level = count(get_post_ancestors( $post->ID )) + 1;
$posts = get_children( 'post_parent=' . $currentpage);
if($level>=3) :
    $tabs_array = [];
    foreach($posts as $post) {
        //$tabs_array["row"] = array("title" => get_the_title($services_child), "content" => get_the_content($services_child));
        $content = apply_filters('the_content', get_post_field('post_content', $post->ID));
        $tabs_array += [ "post-$post->ID" => ["title" => get_the_title($post->ID), "content" => $content, "image" => get_the_post_thumbnail_url($post->ID), "video" => get_field("bg_video", $post->ID)]];
    }
    //vardump($tabs_array);
    
    $args = array(
        'tabs' => $tabs_array,
        'tab_orientation' => 'row',
        'block_id' => 'service_offering',
    );
?>
    <section class="section service-offering__tabs"><?php get_template_part('blocks/tabs/partial', null, $args ); ?></section>
<?php endif; ?>

<?php get_template_part('partials/footer/footer'); ?>
