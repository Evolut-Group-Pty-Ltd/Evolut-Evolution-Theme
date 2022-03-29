<?php get_template_part('partials/header/header'); ?>
<?php
$args = array(
    'menu_name' => 'capabilities',
    'post_type' => 'service',
    'menu_type' => 'submenu',
);
?>
<?php get_template_part('partials/submenu/submenu', null, $args ); ?>
<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>
      <?php the_content(); ?>

		<?php endwhile; // end of the loop. ?>
    <?php if(1==2) : //if(get_field('product_video')) : ?>
<section class="block section margin--top-standard margin--bottom-standard visible-tag visible-tag--visible">
  <h1 class="block__title container">Product video</h1>
  <?php
get_template_part('blocks/video/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'video' => get_field('product_video'),
  'video_type' => get_field('video_type'),
));
?>
</section>
<?php endif; ?>
<?php if(get_field('related_content')) : ?>
<section class="block section margin--top-standard margin--bottom-standard visible-tag visible-tag--visible">
  <h1 class="block__title container">Related content</h1>
<?php
get_template_part('blocks/post-cards/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'posts' => get_field('related_content'),
  'card_type' => 'list-item',
    'variant' => 'wrap',
    'card_spacing' => '10',
    'card_width' => '4',
));
?>
</section>
<?php endif; ?>

<?php get_template_part('partials/footer/footer'); ?>
