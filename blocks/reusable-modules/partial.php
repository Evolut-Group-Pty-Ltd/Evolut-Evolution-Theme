<?php
$reusable_modules_image_column = function ($image_column) {
?>
<a class="reusable-modules__image-column grid__col--span<?php echo $image_column['width'] ?> <?php echo $args['classes'] ?>" <?php echo $image_column['link'] ? 'href="' . $image_column['link']['url'] . '"' : '' ?> style="background-image: url(<?php echo $image_column['image'] ?>)">
  <?php if($image_column['sub_title']): ?>
  <div class="reusable-modules__image-subtitle text--caps12"><?php echo $image_column['sub_title'] ?></div>
  <?php endif; ?>
  <?php if($image_column['title']): ?>
  <div class="reusable-modules__image-title text--intro"><?php echo $image_column['title'] ?></div>
  <?php endif; ?>
  <?php if($image_column['text']): ?>
  <div class="reusable-modules__image-text"><?php echo $image_column['text'] ?></div>
  <?php endif; ?>
</a>
<?php
};
$modules_column = $args['modules_column'];
?>
  <section class="reusable-modules <?php echo $args['no_top_offset'] ? 'reusable-modules--no-top-space' : '' ?>">
  <div class="reusable-modules__container container">
    <?php if($args['title']): ?>
    <h3 class="reusable-modules__title"><?php echo $args['title'] ?></h3>
    <?php endif; ?>
    <div class="reusable-modules__grid grid">
      <?php if($args['image_column']['width'] !== '0' && !$args['reverse_order']) $reusable_modules_image_column($args['image_column']); ?>
  
      <div class="reusable-modules__modules grid__col--span<?php echo $modules_column['width'] ?> grid grid--<?php echo $modules_column['width'] ?>col">
        <?php foreach($modules_column['modules'] as $module): ?>
        <a class="reusable-modules__module grid__col--span3" <?php echo $module['link'] ? 'href="' . $module['link']['url'] . '"' : '' ?>>
          <?php if($module['sub_title']): ?>
          <div class="reusable-modules__module-subtitle text--caps12"><?php echo $module['sub_title'] ?></div>
          <?php endif; ?>
          <?php if($module['title']): ?>
          <strong class="reusable-modules__module-title"><?php echo $module['title'] ?></strong>
          <?php endif; ?>
          <?php if($module['text']): ?>
          <div class="reusable-modules__module-text"><?php echo $module['text'] ?></div>
          <?php endif; ?>
        </a>
        <?php endforeach; ?>
      </div>
      <?php if($args['image_column']['width'] !== '0' && $args['reverse_order']) $reusable_modules_image_column($args['image_column']); ?>
    </div>
  </div>
</section>
