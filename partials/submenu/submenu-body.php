<?php
$classes = array();
if(array_key_exists('class', $args)) {
  $classes = array_merge($classes, $args['class']);
}

$menu_name = get_field('sub_menu');
$menu_type = '';
if($args['menu_name']) {
  $menu_name = __( $args['menu_name'] );
  $post_type = __( $args['post_type'] );
  $menu_type = __( $args['menu_type'] );
}
$depth = 2;
if($menu_name) :
?>
  <section class="sub__menu<?php if($menu_type=="tertiary") : ?> tertiary<?php endif; ?> <?php echo implode(' ', $classes) ?>">
  <nav class="sub__menu__container container<?php if($menu_type=="tertiary") : ?> tertiary<?php endif; ?>">
  <?php 
    wp_nav_menu( array(
      'menu' => $menu_name,
      'depth' => $depth
    ) );
    ?>
  </nav>
</section>
<?php endif; ?>
