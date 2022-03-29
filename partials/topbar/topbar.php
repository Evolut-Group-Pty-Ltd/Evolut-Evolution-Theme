<?php
$classes = array();
if($args['sticky']) $classes[] = 'topbar--sticky';
if(array_key_exists('class', $args)) {
  $classed = array_merge($classes, $args['class']);
}
// $is_overlay = get_field('overlay_header_over_content');
// if($is_overlay) $classes[] = 'topbar--overlay';
?>
  <section class="topbar <?php echo implode(' ', $classes) ?>">
  <nav class="topbar__menu container">
    <?php render_menu('topbar', 'topbar__menu', '-', 3) ?>
  </nav>
</section>
