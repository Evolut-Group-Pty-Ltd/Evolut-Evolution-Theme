<?php include 'wp-content/themes/evolut-starter/includes/block-formatting.php'; ?>

<section class="image-columns section container <?php echo !empty($block['className']) ? $block['className'] : '' ?> margin--top-<?php echo $margin_top; ?> margin--bottom-<?php echo $margin_bottom; ?>">
  <?php if(get_field('title')): ?>
  <h2 class="image-columns__title"><?php the_field('title') ?></h2>
  <?php endif; ?>

  <div class="image-columns__container grid">
    <?php 
    $idx = 1;
    $in_row = 3;
    $columns_number = count(get_field('columns'));
    $rows_number = ceil($columns_number / $in_row);
    $last_row_columns = $columns_number % 3;
    if($last_row_columns === 0) $last_row_columns = 3;
    $last_row_shift = (12 - $last_row_columns * 4) / 2;
    while(have_rows('columns')): the_row(); ?>
    <?php 
    $current_row = ceil($idx / $in_row); 
    if($current_row === $rows_number // last row
      && $idx % 3 === 1 // first item in the row
      && $last_row_shift !== 0): ?>
    <div class="grid__col--span<?php echo $last_row_shift ?>"></div>
    <?php endif; ?>
    <div class="image-columns__item grid__col--span4">
      <div class="image-columns__item-image-container">
        <img class="image-columns__item-image" src="<?php echo get_sub_field('image')['url'] ?>" alt="<?php echo get_sub_field('image')['alt'] ?>">
      </div>
      <div class="image-columns__item-content">
        <?php if(get_sub_field('title')): ?>
        <h5 class="image-columns__item-title"><?php the_sub_field('title') ?></h5>
        <?php endif; ?>
        <?php if(get_sub_field('text')): ?>
        <div class="image-columns__item-text"><?php echo nl2br(get_sub_field('text')) ?></div>
        <?php endif; ?>
      </div>
    </div>
    <?php 
    $idx++; 
    endwhile; ?>
  </div>

</section>
