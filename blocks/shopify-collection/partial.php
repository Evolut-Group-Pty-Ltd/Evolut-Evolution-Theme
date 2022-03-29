<section class="shopify-collection section <?php echo $args['classes'] ?>" data-collection-id="<?php echo $args['collection_id'] ?>">
  <?php if($args['title']): ?>
  <h3 class="shopify-collection__title"><?php echo $args['title'] ?></h3>
  <?php endif; ?>
  <div class="shopify-collection__container container">
    <div class="shopify-collection__collection"></div>
  </div>
</section>
<?php
wp_enqueue_script(EVOLUT_THEME_SLUG . '-shopify-js', get_stylesheet_directory_uri() . '/src/scripts/_shopify-collection.js', array(), EVOLUT_THEME_VERSION, true);

$shopify_settings = get_field('shopify', 'option');
$shopify_data = array(
  'domain' => $shopify_settings['domain'],
  'storefront_access_token' => $shopify_settings['storefront_access_token']
);
wp_localize_script(EVOLUT_THEME_SLUG . '-shopify-js', 'jetcharge_shopify', $shopify_data);
?>

