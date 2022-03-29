<?php
$classes = array_key_exists('classes', $args) ? $args['classes'] : '';
$download = $args['download']['url'];
$is_link = isset($args['link']);
if(!is_link) :
  $is_link = isset($download);
endif;
?>
<div class="post-cards__item list-item <?php echo $classes ?>" <?php if($is_link) : ?>onclick="location.href='<?php if($args['download']) : ?><?php echo $download ?><?php else : ?><?php echo $args['link'] ?><?php endif; ?>'; location.target='_blank';" <?php endif; ?>style="<?php if($is_link) : ?>cursor: pointer; <?php endif; ?>background-color: <?php echo $args['card_colours']['card_colour']; ?>;">
  <div class="post-cards__item-image" style="background-image: url(<?php echo $args['image_url'] ?>);  background-size: cover; background-position: center;">
  </div>
  <div class="post-cards__item-content">
    <h5 class="post-cards__item-title"<?php if($args['card_colours']['heading_colour']) : ?> style="color: <?php echo $args['card_colours']['heading_colour']; ?>;"<?php endif; ?>><?php echo $args['title'] ?></h5>
    <?php if($args['link']) : ?><a class="post-cards__item-link" href="<?php echo $args['link'] ?>"><i data-feather="arrow-right"></i></a><?php endif; ?>
  </div>
</div>

