<?php
$text_content = $args['text_content'];
$image_content = $args['image_content'];
$content_alignment = $args['content_alignment'];
$background_image = __( $args['background_image'] );
$bg_image_settings = __( $args['bg_image_settings'] );

$classes = $args['classes'];
if($args['reverse_order']) $classes .= ' text-with-image--reverse';

$block_text_with_image__text = function($text_content, $content_alignment) {
  if($text_content['size'] === '0') return;
  if($text_content['sub_title_size'] == 'large') $margin_class='margin';
?>
<div class="text-width-image__text-col grid__col--span<?php echo $text_content['size'] ?> align-<?php echo $content_alignment; ?>">
  <?php if($text_content['sub_title']): ?>
  <h3 class="text-with-image__sub-title heading-<?php echo $text_content['sub_title_size'] ?>"><?php echo $text_content['sub_title'] ?></h3>
  <?php endif; ?>

  <div class="text-with-image__text" style="column-count: <?php echo $text_content['text_columns'] ?>;">
  <?php echo $text_content['text'] ?>
  </div>

  <?php if($text_content['button_text']): ?>
  <div>
    <a class="text-with-image__btn btn" href="<?php echo $text_content['button_link'] ?>"><?php echo $text_content['button_text'] ?></a>
  </div>
  <?php endif; ?>
</div> 
<?php
};

$block_text_with_image__gap = function($gap_size) {
  if($gap_size === '0') return;
?>
<div class="text-with-image__gap-col grid__col--span<?php echo $gap_size ?>"></div>
<?php
};

$block_text_with_image__image = function($i) {
  $video = $i['video'];
  $video_type = $i['video_type'];
  $video_options = $i['video_options'];
  $autoplay = ($video_options['autoplay']) ? " autoplay" : "";
  $controls = ($video_options['controls']) ? " controls" : "";
  $loop = ($video_options['loop']) ? " loop" : "";
  $muted = ($video_options['muted']) ? " muted" : "";
  $video_options_string = $autoplay . $controls . $loop . $muted;

  if($i['size'] === '0') return;
  $cover = false;
  if(array_key_exists('background_cover_mode', $i)) $cover = $i['background_cover_mode'];
  if($i['scale_mode']=='true') $scale_class='transform: scale(' . $i['scale_multiplier'] . ');';
  if($i['scale_mode']=='true') $expand_class='overflow: visible';
?>
<div class="text-with-image__image-col <?php echo $cover ? 'text-with-image__image-col--cover' : '' ?> grid__col--span<?php echo $i['size'] ?>">
  <?php if($video): ?>
    <?php if (!empty($video) && $video_type!='YouTube') : ?>
    <figure class="video__container container"><video<?php echo $video_options_string; ?> src="<?php echo $video; ?>" playsinline></video></figure>
    <?php elseif ($video) : ?>
    <iframe class="video__container video__youtube container" src="<?php echo $video; ?>" prop-width="1280" prop-height="720" frameborder="0" allowfullscreen="" allow="autoplay" style="width: 100%; height: 100%;" title="<?php echo $text_content['sub_title'] ?>"></iframe>
    <?php endif; ?>
  <!--
  <video<?php echo $video_options_string; ?> class="text-with-image__image-container video">
      <source src="<?php echo $i['video']; ?>" type="video/mp4">
  </video>
  -->
  <?php else : ?>
  <div class="text-with-image__image-container" style="<?php echo $expand_class ?>">
    <img class="text-with-image__image" src="<?php echo $i['image']['url'] ?>" alt="<?php echo $i['image']['alt'] ?>" style="<?php echo $scale_class ?>">
  </div>
  <?php endif; ?>
</div>
<?php 
};
?>
<?php 
$bg_position = ($bg_image_settings ? $bg_image_settings : 'center');
  if($background_image) $bg_image_class = 'background-image: url(' . $background_image . '); background-size: cover; background-position: ' . $bg_position;
?>

  <div class="text-with-image__container container grid">
    <?php if(!$args['reverse_order']): ?>

    <?php $block_text_with_image__text($text_content, $content_alignment) ?>
    <?php $block_text_with_image__gap($args['gap_size']) ?>
    <?php $block_text_with_image__image($image_content) ?>

    <?php else: ?>

    <?php $block_text_with_image__image($image_content) ?>
    <?php $block_text_with_image__gap($args['gap_size']) ?>
    <?php $block_text_with_image__text($text_content, $content_alignment) ?>

    <?php endif; ?>
  </div>

