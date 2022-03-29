<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( ['container','section'], $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	//do_action( 'woocommerce_before_single_product_summary' );
	?>

	<?php
	$product_id = get_the_ID();
	$product = wc_get_product( $product_id );
	$product_title = $product->get_name();
	$product_description = $product->get_description();
	$product_short_description = $product->get_short_description();
	$product_additional_description = get_field("additional_description");
	$product_sku = $product->get_sku();
	$product_website = get_field("product_website");
	$product_download = get_field("product_download");
	$product_gallery_ids = $product->get_gallery_image_ids();
	$product_gallery = array();
	$product_image = wp_get_attachment_url(get_post_thumbnail_id($product_id));
	array_push($product_gallery, ['url' => $product_image, 'background_size' => 'cover']);
	foreach( $product_gallery_ids as $product_gallery_id ) :
		array_push($product_gallery, ['url' => wp_get_attachment_url( $product_gallery_id ), 'background_size' => 'contain']);
    endforeach;
	?>
	<div class="product__gallery"><?php get_template_part('blocks/carousel/partial', null, ['gallery' => $product_gallery]); ?></div>

	<div class="summary entry-summary">
		<h1 class="product__title"><?php echo $product_title ?></h1>
		<?php if($product_sku) : ?><h6 class="product__sku"><?php echo $product_sku ?></h6><?php endif; ?>
		<?php if($product_short_description) : ?><h4 class="product__description"><?php echo $product_short_description ?><?php echo ($product_additional_description) ? $product_additional_description : '' ?></h4><?php endif; ?>
		<div class="product__buttons">
	    	<?php if($product_website) : ?><a href="<?php echo $product_website; ?>" target="_blank" class="product__cta btn btn-purple-gradient">Product website</a><?php endif; ?><?php if($product_download) : ?><a href="<?php echo $product_download; ?>" target="_blank" class="product__cta btn btn-coral-gradient">Product brochure</a><?php endif; ?><a href="https://yurikaproto.evolut.com.au/wp-content/uploads/2022/03/Build-a-Quote-Yurika.zip" target="_blank" class="product__cta btn btn-coral-gradient">Build a Quote</a><a href="/contact-us/" class="product__cta btn btn-orange-gradient">Contact us</a>
		</div>
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		//do_action( 'woocommerce_single_product_summary' );
		?>
	</div>


	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	//do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
