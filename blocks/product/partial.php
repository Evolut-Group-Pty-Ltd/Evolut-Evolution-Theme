<?php
$product_id = __( $args['product_id'] );
$product = get_post($product_id);
//$product = wc_get_product( $product_id );
$product_title = get_the_title($product);
$product_description = get_the_excerpt($product);
//$product_sku = $product->get_sku();
$product_website = get_field("product_website");
$product_download = get_field("product_download");
?>
<div id="product-<?php echo $product_id ?>">
	<div class="summary entry-summary">
		<h1 class="product__title"><?php echo $product_title ?></h1>
		<?php if($product_sku) : ?><h6 class="product__sku"><?php echo $product_sku ?></h6><?php endif; ?>
		<?php if($product_description) : ?><h4 class="product__description"><?php echo $product_description ?></h4><?php endif; ?>
		<div class="product__buttons">
	    	<?php if($product_website) : ?><a href="<?php echo $product_website; ?>" target="_blank" class="product__cta btn btn-purple-gradient">Product website</a><?php endif; ?><?php if($product_download) : ?><a href="<?php echo $product_download; ?>" target="_blank" class="product__cta btn btn-coral-gradient">Product brochure</a><?php endif; ?><a href="/contact-us/" class="product__cta btn btn-orange-gradient">Contact us</a>
		</div>
	</div>
</div>