<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

//get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );
$id = get_queried_object_id();
$term = get_term($id, 'product_cat');
$term_parent_id = $term->parent;
$parent_link = get_term_link( $term_parent_id, 'product_cat' );
$thumbnail_id = get_woocommerce_term_meta( $id, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );

?>
<header class="service-header woocommerce-products-header" style="background-image: url('<?php echo $image ?>');">
	<div class="service-header__img-bg">
	    <div class="service-header__container container grid">
		    <div class="service-header__column grid__col--span8">
		        <h3 class="service-header__sub-title">ENERGY SUPPLIES</h3>
		        <h1 class="service-header__title lines-shift-container woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		        <div class="service-header__text text--intro lines-shift-container" style="--shift-delay: 150ms;"><?php the_archive_description(); ?></div>
		        
			<?php
			/**
			 * Hook: woocommerce_archive_description.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			//do_action( 'woocommerce_archive_description' );
			?>
			</div>
			<div class="service-header__column--links grid__col--span4">
		        <?php if($term_parent_id) : ?>
		           <div class="related-services__header">RELATED PRODUCT CATEGORIES</div>
			            <ul id="related-service__list" class="service-header__related-services">
			              <?php wp_list_categories( 'depth=1&taxonomy=product_cat&title_li=&child_of=' . $term_parent_id ); ?>
			            </ul>
			            <a class="related-services__header" href="<?php echo $parent_link ?>"><< <?php echo get_term($term_parent_id)->name; ?></a>
		        <?php endif; ?>
		    </div>
	    </div>
	</div>
</header>
<section class="products__section section"><div class="products__container container">
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

//get_footer( 'shop' );
?>
</div></section>
<?php
get_template_part('blocks/modal-window/partial', null, array(
  'classes' => '',
  'id' => 'category-modal',
  'title' => get_field('popup_title', $term),
  'content' => get_field('popup_content', $term),
));
