<?php
$page_type = 'page';
if(is_archive()) $page_type = 'archive';
if(is_tax()) $page_type = 'taxonomy';

$sticky = array_key_exists('sticky', $args) ? $args['sticky'] : true;

$topbar_args = array_key_exists('topbar_args', $args) ? $args['topbar_args'] : array();
$topbar_args['sticky'] = $sticky;

//get_template_part('partials/topbar/topbar', null, $topbar_args);

$classes = array();
if($sticky) $classes[] = 'header--sticky';
if(array_key_exists('class', $args)) {
  $classes = array_merge($classes, $args['class']);
}

if($page_type == 'page') $is_overlay = get_field('overlay_header_over_content');
if($page_type == 'archive') $is_overlay = get_field('overlay_header_over_content', 'option');
if($page_type == 'taxonomy') $is_overlay = get_field('overlay_header_over_content', 'option');
if($is_overlay) $classes[] = 'header--overlay';

$logo_height = get_field('logo_height', 'option');
?>
<header class="header <?php echo implode(' ', $classes) ?>">
  <div class="header__container container">
    <a class="header__logo" href="/">
      <img class="header__logo-img header__logo-img--white" src="<?php the_field('logo_white', 'option'); ?>" alt="<?php echo get_bloginfo('name') ?>" <?php echo $logo_height ? sprintf('style="height: %spx;"', $logo_height) : '' ?>>
      <img class="header__logo-img header__logo-img--dark" src="<?php the_field('logo', 'option'); ?>" alt="<?php echo get_bloginfo('name') ?>" <?php echo $logo_height ? sprintf('style="height: %spx;"', $logo_height) : '' ?>>
    </a>
  </div>
</header>
