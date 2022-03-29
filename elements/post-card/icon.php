<?php
$classes = array_key_exists('classes', $args) ? $args['classes'] : '';
$bg_image_class = '';
if($args['image_url']) :
  $bg_image_class = 'stats-cards__item--bg-image';
endif;
if($args['icon_colour']) :
  $icon_colour_style = 'color: ' . $args['icon_colour'] . ';';
endif;
if($args['text_colour']) :
  $text_colour_style = 'color: ' . $args['text_colour'] . ';';
endif;
if($args['background_colour']) :
  $bg_color_style = 'background-color: ' . $args['background_colour'] . ';';
  elseif ($args['card_colour']) :
    $bg_color_style = 'background-color: ' . $args['card_colour'] . ';';
  endif;
?>
<?php if($args['link']) : ?>
  <a href="<?php echo $args['link'] ?>" class="stats-cards__item <?php echo $classes ?> <?php echo $bg_image_class ?> align-<?php echo $args['card_align'] ?>" style="background-image: url(<?php echo $args['image_url'] ?>);">
<?php else : ?>
<div class="stats-cards__item <?php echo $classes ?> <?php echo $bg_image_class ?> align-<?php echo $args['card_align'] ?>" style="background-image: url(<?php echo $args['image_url'] ?>); <?php echo $bg_color_style ?>">
<?php endif; ?>
  <div class="stats-cards__item__container">
    <div class="stats-cards__image-container">
      <img class="stats-cards__item-image" src="<?php echo $args['icon'] ?>"  style="<?php echo $icon_colour_style ?>">
    </div>
    <div class="stats-cards__item-content">
      <div class="stats-cards__item-text" style="<?php echo $text_colour_style ?>">
        <?php echo $args['title'] ?>
      </div>
    </div>
  </div>
<?php if($args['link']) : ?>
 </a>
<?php else : ?>
</div>
<?php endif; ?>

