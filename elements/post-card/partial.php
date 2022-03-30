<?php
$classes = array_key_exists('classes', $args) ? $args['classes'] : '';
$background_video = __( $args['video'] );
$video_options = __( $args['video_options'] );
$autoplay = ($video_options['autoplay']) ? " autoplay" : "";
$controls = ($video_options['controls']) ? " controls" : "";
$loop = ($video_options['loop']) ? " loop" : "";
$muted = ($video_options['muted']) ? " muted" : "";
$date = __( $args['date'] ) ? __( $args['date'] ) : '';
$video_options_string = $autoplay . $controls . $loop . $muted;
$tags = __( $args['tags'] );
global $post;
?>
<a class="post-cards__item <?php echo $classes ?><?php echo $args['link'] ? ' linked' : '' ?>" <?php echo $args['link'] ? 'href="' . $args['link'] . '"' : '' ?> style="<?php if($args['link']) : ?>cursor: pointer; <?php endif; ?>background-color: <?php echo $args['card_colours']['card_colour']; ?>;">
  <?php if($background_video): ?>
    <?php echo smart_video($background_video, $video_options, null) ?>
  <!--<video<?php echo $video_options_string; ?> class="post-cards__item-video">
      <source src="<?php echo $background_video ?>" type="video/mp4">
  </video>-->
  <?php else : ?>
  <div class="post-cards__item-image" style="background-image: url(<?php echo $args['image_url'] ?>); <?php if($args['image_align']) : ?>background-position: <?php echo $args['image_align'] ?>;<?php endif; ?>"><?php echo $args['title'] ?></div>
  <?php endif; ?>
  <div class="post-cards__item-content">
    <?php if(__($args['show_date'])) : ?><div class="post-cards__date"><?php echo $date; ?></div><?php endif; ?>
    <h5 class="post-cards__item-title"<?php if($args['card_colours']['heading_colour']) : ?> style="color: <?php echo $args['card_colours']['heading_colour']; ?>;"<?php endif; ?>><?php echo $args['title'] ?></h5>
    <div class="post-cards__item-text"<?php if($args['card_colours']['description_colour']) : ?> style="color: <?php echo $args['card_colours']['description_colour']; ?>;"<?php endif; ?>>
      <?php echo $args['text'] ?>
    </div>
    <?php if($tags) : ?>
      <div class="post-cards__tags">
        <?php foreach($tags as $tag) : ?>
          <div class="post-cards__tag"><?php echo $tag["tag_title"] ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php if($args['link']) : ?><span class="post-cards__item-link" href="<?php echo $args['link'] ?>"><i data-feather="arrow-right"></i></span><?php endif; ?>
  </div>
</a>

