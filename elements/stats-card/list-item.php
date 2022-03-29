<?php
$classes = array_key_exists('classes', $args) ? $args['classes'] : '';
$card_colours = __( $args['card_colours'] );
$card_colour = $card_colours["card_colour"];
$icon_colour = $card_colours["icon_colour"];
$heading_colour = $card_colours["heading_colour"];
$description_colour = $card_colours["description_colour"];
$hover_colour = $card_colours["hover_colour"];
$bg_image_class = '';
if($args['bg_image']) :
  $bg_image_class = 'stats-cards__item--bg-image';
endif;
$stat_percent = ($args['stat']) ? $args['stat']/100 : 0;
$stat_bg_color = ($args['animation_colours']['background_colour']) ? $args['animation_colours']['background_colour'] : "var(--primary-purple-color)";
$stat_bar_color = ($args['animation_colours']['foreground_colour']) ? $args['animation_colours']['foreground_colour'] : "white";
?>
<?php if($args['link']) : ?>
  <a href="<?php echo $args['link'] ?>" class="stats-cards__item list-item <?php echo $classes ?> <?php echo $bg_image_class ?> align-<?php echo $args['card_align'] ?>" style="background-image: url(<?php echo $args['bg_image'] ?>); --card-colour: <?php echo $card_colour; ?>; --icon-colour: <?php echo $icon_colour; ?>; --heading-colour: <?php echo $heading_colour; ?>; --description-colour: <?php echo $description_colour; ?>; --hover-colour: <?php echo $hover_colour; ?>;">
<?php else : ?>
<div class="stats-cards__item list-item <?php echo $classes ?> <?php echo $bg_image_class ?> align-<?php echo $args['card_align'] ?>" style="background-image: url(<?php echo $args['bg_image'] ?>); --card-colour: <?php echo $card_colour; ?>; --icon-colour: <?php echo $icon_colour; ?>; --heading-colour: <?php echo $heading_colour; ?>; --description-colour: <?php echo $description_colour; ?>; --hover-colour: <?php echo $hover_colour; ?>;">
<?php endif; ?>
  <div class="stats-cards__item__container">
    <div class="stats-cards__image-container">
      <?php if($args['animation']) : ?>
        <div class="round-prog" style="--progress: <?php echo $stat_percent; ?>; --inactive-color: <?php echo $stat_bar_color; ?>; --active-color: <?php echo $stat_bg_color; ?>;">
          <svg width="60" height="60">
            <circle class="round-prog__bg" cx="60" cy="30" r="25"   transform="rotate(-90, 45, 45)"/>
            <circle class="round-prog__line" cx="60" cy="30" r="25" transform="rotate(-90, 45, 45)"/>
          </svg>
          <div class="round-prog__label">
            <?php if($args['image_url']) : ?>
              <?php if(str_contains($args['image_url'],"svg")) : ?>
                <?php echo file_get_contents($args['image_url']); ?><?php else : ?><img class="stats-cards__item-animation-image" src="<?php echo $args['image_url'] ?>">
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      <?php elseif($args['image_url']) : ?>
        <?php if(str_contains($args['image_url'],"svg")) : ?>
        <?php echo file_get_contents($args['image_url']); ?>
        <?php else : ?>
          <img class="stats-cards__item-image" src="<?php echo $args['image_url'] ?>">
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="stats-cards__item-content">
      <?php if((!empty($args['stat']) || $args['stat'] == 0) && $args['stat'] !== '') : ?><h5 class="stats-cards__item-title"><?php echo $args['before_number'] ?><span class="counter"><?php echo ($args['use_thousands_separator']) ? number_format($args['stat']) : $args['stat'] ?></span><?php echo $args['after_number'] ?></h5><?php endif; ?>
      <div class="stats-cards__item-text<?php if((empty($args['stat']) && $args['stat'] != 0) || $args['stat'] === '')  : ?> no-stat<?php endif; ?>">
        <?php echo $args['text'] ?>
      </div>
    </div>
  </div>
<?php if($args['link']) : ?>
 </a>
<?php else : ?>
</div>
<?php endif; ?>

