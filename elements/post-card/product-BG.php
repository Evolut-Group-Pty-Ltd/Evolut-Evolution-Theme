<?php
$classes = array_key_exists('classes', $args) ? $args['classes'] : '';
?>
<div class="post-cards__item product-bg <?php echo $classes ?>">
  <div class="post-cards__item-image" href="<?php echo $args['link'] ?>" style="background-image: url(<?php echo $args['image_url'] ?>); ">
    <div class="post-cards__item-content">
      <h5 class="post-cards__item-title"><?php echo $args['title'] ?></h5>
      <div class="product__btns">
        <a class="product__contact btn-alt btn btn--small" href="<?php echo $args['link'] ?>">Learn more</a>
        <a class="product__quote btn-alt btn btn--small" href="https://yurikaproto.evolut.com.au/wp-content/uploads/2022/03/Build-a-Quote-Yurika.zip" download>Build a Quote</a> 
      </div>
    </div>
  </div>
</div>

