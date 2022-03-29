<?php
$classes = array_key_exists('classes', $args) ? $args['classes'] : '';
?>
<div class="people-cards__item <?php echo $classes ?>">
  <a class="people-cards__item-image" href="<?php echo $args['link'] ?>" style="background-image: url(<?php echo $args['image_url'] ?>); "><?php echo $args['title'] ?></a>
  <div class="people-cards__item-content">
    <h5 class="people-cards__item-title"<?php if($args['card_colours']['heading_colour']) : ?> style="color: <?php echo $args['card_colours']['heading_colour']; ?>;"<?php endif; ?>><?php echo $args['title'] ?></h5>
    <?php if($args['position']) : ?>
    <div class="people-cards__item-text"<?php if($args['card_colours']['description_colour']) : ?> style="color: <?php echo $args['card_colours']['description_colour']; ?>;"<?php endif; ?>>
      <?php echo $args['position'] ?>
    </div>
    <?php endif ?>
    <?php if($args['linkedin']) : ?>
    <div class="people-cards__item-text people--linkedin"<?php if($args['card_colours']['description_colour']) : ?> style="color: <?php echo $args['card_colours']['description_colour']; ?>;"<?php endif; ?>>
       <a href="<?php echo $args['linkedin'] ?>">LinkedIn Profile</a>
    </div>
    <?php endif ?>
    <?php if($args['email_address']) : ?>
    <div class="people-cards__item-text people--email"<?php if($args['card_colours']['description_colour']) : ?> style="color: <?php echo $args['card_colours']['description_colour']; ?>;"<?php endif; ?>>
      <a href="mailto:<?php echo $args['email_address'] ?>"><?php echo $args['email_address'] ?></a>
    </div>
    <?php endif ?>
    <?php if($args['phone']) : ?>
    <div class="people-cards__item-text people--phone"<?php if($args['card_colours']['description_colour']) : ?> style="color: <?php echo $args['card_colours']['description_colour']; ?>;"<?php endif; ?>>
      <?php echo $args['phone'] ?>
    </div>
    <?php endif ?>
    <?php if($args['text']) : ?>
    <div class="people-cards__item-text"<?php if($args['card_colours']['description_colour']) : ?> style="color: <?php echo $args['card_colours']['description_colour']; ?>;"<?php endif; ?>>
      <?php echo $args['text'] ?>
    </div>
    <?php endif ?>
  </div>
</div>

