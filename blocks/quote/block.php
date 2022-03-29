<?php include 'wp-content/themes/evolut-starter/includes/block-formatting.php'; ?>

<section class="quote section visible-tag margin--top-<?php echo $margin_top; ?> margin--bottom-<?php echo $margin_bottom; ?> <?php echo !empty($block['className']) ? $block['className'] : '' ?>">
  <div class="quote__container container">
    <div class="quote__content"><em><?php echo get_field('quote') ?></em></div>
    <div class="quote__author"><?php echo get_field('author') ?></div>
    <div class="quote__by-line"><?php echo get_field('by_line') ?></div>
  </div>
</section>
