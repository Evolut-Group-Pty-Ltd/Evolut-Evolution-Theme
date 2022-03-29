<?php
$other_settings = get_field('other', 'option');
?>
<section class="map-locations section <?php echo !empty($block['className']) ? $block['className'] : '' ?>">
  <div class="map-locations__container container">
    <?php if(get_field('title')): ?>
    <h3 class="map-locations__title"><?php the_field('title') ?></h3>
    <?php endif; ?>
    <div class="grid">
      <?php while(have_rows('locations')): the_row(); ?> 
      <div class="map-locations__item grid__col--span6">
        <?php /*<div class="map-locations__item-map"></div>*/ ?>
        <iframe class="map-locations__item-map"
          width="100%"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key=<?php echo $other_settings['google_maps_api_key'] ?>&<?php echo sprintf("q=%s&zoom=%d", get_sub_field('address'), get_sub_field('zoom')) ?>" allowfullscreen>
        </iframe>
        <h4 class="map-locations__item-name"><?php the_sub_field('name') ?></h4>
        <div class="map-locations__item-address">
          <?php the_sub_field('address') ?>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php /*
src="//www.google.com/maps/embed/v1/view?key=<?php echo $other_settings['google_maps_api_key'] ?>&<?php echo sprintf("center=%s,%s&zoom=%d", get_sub_field('latitude'), get_sub_field('longitude'), get_sub_field('zoom')) ?>" allowfullscreen>
 */ ?>
