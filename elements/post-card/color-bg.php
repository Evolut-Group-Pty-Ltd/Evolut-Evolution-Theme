<?php
$classes = array_key_exists('classes', $args) ? $args['classes'] : '';
?>
<div class="post-cards__item bg-image color-bg <?php echo $classes ?>" onclick="location.href='<?php echo $args['link'] ?>';" style="cursor: pointer; background-color: <?php echo $args['card_colours']['card_colour']; ?>;">
  <div class="post-cards__item-content">
    <h5 class="post-cards__item-title"<?php if($args['card_colours']['heading_colour']) : ?> style="color: <?php echo $args['card_colours']['heading_colour']; ?>;"<?php endif; ?>><?php echo $args['title'] ?></h5>
    <div class="post-cards__item-text"<?php if($args['card_colours']['description_colour']) : ?> style="color: <?php echo $args['card_colours']['description_colour']; ?>;"<?php endif; ?>>
      <?php echo $args['text'] ?>
    </div>
    <a class="post-cards__item-link" href="<?php echo $args['link'] ?>"><i data-feather="arrow-right"></i></a> 
  </div>
</div>
