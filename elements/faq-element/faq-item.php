<?php
$classes = array_key_exists('classes', $args) ? $args['classes'] : '';
?>
<div class="faq-accordion__item <?php echo $classes ?>">
  <div class="faq-accordion__item-content">
    <h5 class="faq-accordion__item-title"><?php echo $args['question'] ?></h5>
  </div>
  <div class="panel"><?php echo $args['answer'] ?></div>
</div>

