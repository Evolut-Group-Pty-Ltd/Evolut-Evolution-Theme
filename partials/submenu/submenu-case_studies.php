<?php
$classes = array();
if(array_key_exists('class', $args)) {
  $classed = array_merge($classes, $args['class']);
}

$menu_name = get_field('sub_menu');
if ( ! empty( $args['menu_name'] ) ) {
  $menu_name = __( $args['menu_name'] );
  $post_type = __( $args['post_type'] );
}
if($menu_name !== null && $menu_name !== '') {
?>
  <section class="sub__menu <?php echo implode(' ', $classes) ?>">
  <div class="sub__menu__container container">
    <div class="sub__menu__container--title">< PREV</div>
    <div class="sub__menu__container--title"> | </div>
    <div class="sub__menu__container--title">NEXT ></div>
  </div>
</section>
<?php
}
?>