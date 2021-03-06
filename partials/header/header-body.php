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
    <nav class="header__menu">
      <?php render_menu('primary', 'header__menu', '-'); ?>
    </nav>
    <form class="header__model-search ev-model-search" action="/" method="get">
      <input type="text" class="header__search-box" placeholder="Search" name="s" id="s">
      <button type="submit" class="header__model-search-btn ev-model-search__btn btn" type="button"><i data-feather="search"></i>
    </form>
    <button class="header__trigger-btn" aria-label="Website Menu">
      <svg class="header__trigger-icon header__trigger-icon--closed" width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="25" height="3" fill="currentColor"/>
        <rect y="9" width="25" height="3" fill="currentColor"/>
        <rect x="10" y="18" width="15" height="3" fill="currentColor"/>
      </svg>
      <svg class="header__trigger-icon header__trigger-icon--open" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect y="19.0786" width="26.9812" height="2.45283" transform="rotate(-45 0 19.0786)" fill="currentColor"/>
        <rect width="26.9812" height="2.45283" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 20.9998 19.0786)" fill="currentColor"/>
      </svg>
    </button>
  </div>
</header>
<?php get_template_part('partials/mega-menu/mega-menu', null, array('menu_name' => 'mega_menu')) ?>
