<?php
$classes = array_key_exists('classes', $args) ? $args['classes'] : '';
$background_video = __( $args['video'] );
$video_options = __( $args['video_options'] );
$autoplay = ($video_options['autoplay']) ? " autoplay" : "";
$controls = ($video_options['controls']) ? " controls" : "";
$loop = ($video_options['loop']) ? " loop" : "";
$muted = ($video_options['muted']) ? " muted" : "";
$video_options_string = $autoplay . $controls . $loop . $muted;
?>
<div class="post-cards__item rollover-text <?php echo $classes ?>" <?php if($args['link']) : ?>onclick="location.href='<?php echo $args['link'] ?>';" <?php endif; ?>style="<?php if($args['link']) : ?>cursor: pointer; <?php endif; ?>background-image: url(<?php echo $args['image_url'] ?>);  background-size: cover; background-position: center;">
  <?php if($background_video): ?>
  <video<?php echo $video_options_string; ?> class="post-cards__item-video">
      <source src="<?php echo $background_video ?>" type="video/mp4">
  </video>
  <?php endif; ?>
  <div class="post-cards__item-content">
    <h5 class="post-cards__item-title"<?php if($args['card_colours']['heading_colour']) : ?> style="color: <?php echo $args['card_colours']['heading_colour']; ?>;"<?php endif; ?>><?php echo $args['title'] ?></h5>
    <div class="post-cards__item-text"<?php if($args['card_colours']['description_colour']) : ?> style="color: <?php echo $args['card_colours']['description_colour']; ?>;"<?php endif; ?>>
      <?php echo $args['text'] ?>
    </div>
    <?php if($args['link']) : ?><a class="post-cards__item-link" href="<?php echo $args['link'] ?>"><i data-feather="arrow-right"></i></a><?php endif; ?>
  </div>
</div>