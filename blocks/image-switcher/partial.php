<?php
$images = __( $args['images'] );
?>
<div class="image-switcher__wrapper container">
  <div class="image-switcher__before">
    <img class="image-switcher__content-image shortpixel--no-resize" src="<?php echo $images['image_1']; ?>" draggable="false"/>
  </div>
  <div class="image-switcher__after">
    <img class="image-switcher__content-image shortpixel--no-resize" src="<?php echo $images['image_2']; ?>" draggable="false"/>
  </div>
  <div class="image-switcher__scroller">
    <svg class="image-switcher__scroller__thumb" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><polygon points="0 50 37 68 37 32 0 50" style="fill:#fff"/><polygon points="100 50 64 32 64 68 100 50" style="fill:#fff"/></svg>
  </div>
</div>
 
