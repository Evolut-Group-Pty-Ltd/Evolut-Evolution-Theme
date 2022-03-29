<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<?php
//$product_id = get_the_ID();
//$product = wc_get_product( $product_id );
$product_title = $product->get_name();
$product_description = $product->get_description();
$product_short_description = $product->get_short_description();
$product_sku = $product->get_sku();
$image_id  = $product->get_image_id();
$product_image = wp_get_attachment_image_url( $image_id, 'full' );
//$product_image = $product->get_image();
$product_link = get_permalink( $product->get_id() );
?>
<div class="post-cards__item <?php echo $classes ?>">
  <a class="post-cards__item-image" href="<?php echo $product_link ?>" style="background-image: url(<?php echo $product_image ?>); "><?php echo $product_title ?></a>
  <div class="post-cards__item-content">
    <h5 class="post-cards__item-title"><?php echo $product_title ?></h5>
    <?php if($product_sku) : ?><h6 class="product__sku">Product Code: <?php echo $product_sku ?></h6><?php endif; ?>
    <div class="post-cards__item-text">
      <?php echo $product_short_description ?>
    </div>
    <div class="product__btns">
      <a class="product__contact btn-alt btn btn--small" href="<?php echo $product_link ?>">Learn more</a>
      <a class="product__quote btn-alt btn btn--small modal-window__trigger modal-window__trigger--allow-default" data-target="#category-modal" href="https://yurikaproto.evolut.com.au/wp-content/uploads/2022/03/Build-a-Quote-Yurika.zip" download>Build a Quote</a> 
    </div>
  </div>
</div>
