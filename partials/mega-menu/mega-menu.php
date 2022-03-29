<?php
$social_media = get_field('social_media', 'option');

$locations = get_nav_menu_locations();
$menu_name = $args['menu_name'];
$menu = wp_get_nav_menu_object($locations[$menu_name]);
$menu_items = wp_get_nav_menu_items($menu->term_id);

$hierachy = structure_menu_items_hierarchicaly(0, $menu_items);

$classes = array();
if(array_key_exists('class', $args)) {
  $classed = array_merge($classes, $args['class']);
}
$is_overlay = get_field('overlay_header_over_content');
if($is_overlay) $classes[] = 'mega-menu--shifted';
?>

<?php
/*function is_active_item($item) {
  $no_protocol_url = str_replace(array('http://', 'https://'), '', $item->url);
  $is_same_domain = stripos($no_protocol_url, $_SERVER['SERVER_NAME']) === 0;
  $active = $is_same_domain && $_SERVER['REQUEST_URI'] == parse_url($item->url, PHP_URL_PATH);
  return $active;
}

$active_mega_items = array();
function is_mega_active($items) {
  foreach($items as &$i) {
    $item = &$i['item'];
    # check self
    if(is_active_item($item)) {
      array_push($active_mega_items, $item);
      return true;
    # check children
    } else {
      $has_active_child = is_mega_active($i['children']);
      if($has_active_child) {
        array_push($active_mega_items, $item);
        return true;
      }
    }
  }
  return false;
}
$has_active_mega = is_mega_active($hierachy);
echo "<!--";
var_dump($has_active_mega);
var_dump($active_mega_items);
echo "-->";*/
?>

<section class="mega-menu evlt-accordion evlt-accordion--sm-only <?php echo implode(' ', $classes) ?>">
  <svg xmlns="http://www.w3.org/2000/svg" class="svg-filter">
  <defs>
    <filter id="yurika-duotone">
      <feColorMatrix type="matrix" result="grayscale"
          values="1 0 0 0 0
                  1 0 0 0 0
                  1 0 0 0 0
                  0 0 0 1 0" >
        </feColorMatrix>
        <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
          <feFuncR type="table" tableValues="0.3529411764 0.8588235294"></feFuncR>
          <feFuncG type="table" tableValues="0.1568627451 0.5568627451"></feFuncG>
          <feFuncB type="table" tableValues="0.4980392216 0.2"></feFuncB>
          <feFuncA type="table" tableValues="0 1"></feFuncA>
        </feComponentTransfer> 
      <feBlend mode="normal" in="componentTransfer" in2="SourceGraphic" result="blend"/>
    </filter>
    <filter id="yurika-blend" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
      <feColorMatrix type="matrix" values=".33 .33 .33 0 0
        .33 .33 .33 0 0
        .33 .33 .33 0 0
        0 0 0 1 0" in="SourceGraphic" result="colormatrix"/>
        <feComponentTransfer in="colormatrix" result="componentTransfer">
              <feFuncR type="table" tableValues="0.35 0.81 0.86"/>
          <feFuncG type="table" tableValues="0.16 0.37 0.56"/>
          <feFuncB type="table" tableValues="0.5 0.4 0.2"/>
          <feFuncA type="table" tableValues="0 1"/>
          </feComponentTransfer>
        <feBlend mode="normal" in="componentTransfer" in2="SourceGraphic" result="blend"/>
    </filter>
    <filter id="blackCurrant-and-mint" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
      <feColorMatrix type="matrix" values=".33 .33 .33 0 0
        .33 .33 .33 0 0
        .33 .33 .33 0 0
        0 0 0 1 0" in="SourceGraphic" result="colormatrix"/>
      <feComponentTransfer in="colormatrix" result="componentTransfer">
        <feFuncR type="table" tableValues="0.75 0.53"/>
        <feFuncG type="table" tableValues="0.25 0.97"/>
        <feFuncB type="table" tableValues="0.64 0.77"/>
        <feFuncA type="table" tableValues="0 1"/>
      </feComponentTransfer>
      <feBlend mode="normal" in="componentTransfer" in2="SourceGraphic" result="blend"/>
    </filter>
    <filter id="purple-sepia" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
      <feColorMatrix type="matrix" values=".33 .33 .33 0 0
        .33 .33 .33 0 0
        .33 .33 .33 0 0
        0 0 0 1 0" in="SourceGraphic" result="colormatrix"/>
      <feComponentTransfer in="colormatrix" result="componentTransfer">
        <feFuncR type="table" tableValues="0.43 0.97"/>
        <feFuncG type="table" tableValues="0.06 0.88"/>
        <feFuncB type="table" tableValues="0.37 0.79"/>
        <feFuncA type="table" tableValues="0 1"/>
      </feComponentTransfer>
      <feBlend mode="normal" in="componentTransfer" in2="SourceGraphic" result="blend"/>
    </filter>
    <svg xmlns="http://www.w3.org/2000/svg">
    <filter id="purple-hue">
      <feColorMatrix
        type="matrix"
        values=" 1.000  0.400  0.000  0.000  0.100 
                 0.000  1.000  0.000  0.000  0.000 
                 0.000  1.000  1.000  0.000  0.700 
                 0.000  0.000  0.000  1.000  0.000">
      </feColorMatrix>
    </filter>
  </defs>
</svg>
  <div class="mega-menu__container container">
    <div class="mega-menu__content">
        <?php 
        // TOP LEVEL
        foreach($hierachy as &$i):
        $item = &$i['item'];
        $href = !empty($item->url) ? $item->url : '';
        $title = apply_filters('the_title', $item->title, $item->ID);
        if(count($i['children']) == 0) continue;
        $id = $item->ID;
        $custom_id = get_field('target_menu_id', $item);
        if($custom_id) $id = $custom_id;

      ?>  
      <div class="mega-menu__item evlt-accordion__item" id="mega-menu-item-<?php echo $id ?>">
        <div class="mega-menu__item-header">
          <span class="mega-menu__item-title evlt-accordion__title"><?php echo $title ?></span>
          <a class="mega-menu__item-link" href="<?php echo $href ?>">More Information <i data-feather="chevron-right"></i></a>
        </div>
        <div class="grid mega-menu__item-content evlt-accordion__content">
            <?php 
            // MEGA MENU CONTENTS
            foreach($i['children'] as &$c):
            $citem = &$c['item'];
            $citem_image = get_field('image', $citem);
            $citem_type = get_field('menu_item_type', $citem);
            $citem_colspan = get_field('col_span', $citem);
            $citem_hide = (get_field('hide', $citem)) ? ' hide' : '';
            $citem_hide_mobile = (get_field('hide_mobile', $citem)) ? ' hide--mobile' : '';
            // COLUMN BREAK
            //if($citem->title === '__COLUMN_BREAK__'):
            ?>
          <div class="mega-menu__item-column grid__col--span<?php echo $citem_colspan ?><?php echo $citem_hide ?><?php echo $citem_hide_mobile ?>"> 
            <?php 
            //continue;   
            // IMAGE ITEM
            //elseif($citem_image): ?>
            <!-- <a class="mega-menu__item-image-link" href=<?php echo $citem->url ?>><img class="mega-menu__item-image" src="<?php echo $citem_image ?>" alt="<?php echo $citem->title ?> | <?php echo $citem_type ?>"></a> -->
            <?php
            //continue;
            //endif; ?>
            <div class="grid mega-menu__item-link-2-container">
              <?php 
              // NO TEXT ITEM
              if($citem->title !== '__NO_TEXT__'): ?>
              <div class="grid__col--span12">
                <a class="mega-menu__item-link-2" href="<?php echo $citem->url ?>"><?php echo $citem->title ?></a>
              </div>
              <?php endif; ?>
              <?php 
              // SUB ITEMS, LOWEST LEVEL
              foreach($c['children'] as &$s):
              $sitem = &$s['item'];
              $sitem_image = get_field('image', $sitem);
              $sitem_type = get_field('menu_item_type', $sitem);
              $sitem_colspan = get_field('col_span', $sitem);
              $sitem_hide = get_field('hide', $sitem) ? ' hide' : '';
              $sitem_hide_mobile = (get_field('hide_mobile', $sitem)) ? ' hide--mobile' : '';
              ?>
              <div class="mega-menu__item-list grid__col--span<?php echo $sitem_colspan ?><?php echo $sitem_hide ?><?php echo $sitem_hide_mobile ?>">
                <?php
                switch ($sitem_type) {
                   case 'standard':
                ?>
                 <div class="mega-menu__item-list-col">
                    <div>
                      <a class="mega-menu__item-link-3" href="<?php echo $sitem->url ?>"><?php echo $sitem->title ?></a>
                    </div>
                 </div>
                 <?php
                    break;
                    case 'image':
                 ?>
                 <div class="mega-menu__item-list-col">
                    <div class="mega-menu__item-list-col-heading">
                      <a class="mega-menu__item-list-col-heading-link" href="<?php echo $sitem->url ?>"><?php echo $sitem->title ?></a>
                    </div>
                    <div class="mega-menu__item-list-col-image" style="background-image:url(<?php echo $sitem_image ?>); ">
                      <a class="mega-menu__item-image-link" href=<?php echo $sitem->url ?>><img class="mega-menu__item-image" src="<?php echo $sitem_image ?>" alt="<?php echo $sitem->title ?>"></a>
                    </div>
                 </div>
                 <?php
                    break;
                    case 'featured':
                 ?>
                 <div class="grid mega-menu__item-list-col featured-col">
                  <div class="mega-menu__item-list-col-heading featured grid__col--span6">
                      <a class="mega-menu__item-list-col-heading-link" href="<?php echo $sitem->url ?>"><?php echo $sitem->title ?></a>
                    </div>
                  <a class="mega-menu__item-list-col-image featured grid__col--span6" style="background-image:url(<?php echo $sitem_image ?>); " href=<?php echo $sitem->url ?>>
                    </a>
                 </div>
                 <?php
                    break;
                    case 'insight':
                 ?>
                 <div class="mega-menu__item-list-col">
                    <a class="mega-menu__item-link-3" href="<?php echo $sitem->url ?>"><?php echo $sitem->title ?></a>
                 </div>
                 <?php
                    break;
                    case 'search':
                 ?>
                 <div class="mega-menu__item-list-col">
                    <a class="mega-menu__item-link-3" href="<?php echo $sitem->url ?>"><?php echo $sitem->title ?></a>
                 </div>
                 <?php
                    break;
                    case 'html':
                 ?>
                 <div class="mega-menu__item-list-col">
                    <a class="mega-menu__item-link-3" href="<?php echo $sitem->url ?>"><?php echo $sitem->title ?></a>
                 </div>
                 <?php
                 }
                 ?>
              </div>
              <?php endforeach; ?>
            </div>
            </div>
            <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <nav class="mega-menu__topbar-menu">
      <?php render_menu('topbar', 'mega-menu__topbar-menu', '-') ?>
    </nav>

    <div class="mega-menu__social">
      <?php if($social_media['facebook_link']) : ?><a class="mega-menu__social-link" href="<?php echo $social_media['facebook_link'] ?>" aria-label="Facebook">
        <img class="mega-menu__social-icon" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/facebook-icon.svg" alt="Facebook Link">
      </a><?php endif; ?>
      <?php if($social_media['instagram_link']) : ?><a class="mega-menu__social-link" href="<?php echo $social_media['instagram_link'] ?>" aria-label="Instagram">
        <img class="mega-menu__social-icon" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/instagram-icon.svg" alt="Instagram Icon">
      </a><?php endif; ?>
      <?php if($social_media['twitter_link']) : ?><a class="mega-menu__social-link" href="<?php echo $social_media['twitter_link'] ?>" aria-label="Twitter">
        <img class="mega-menu__social-icon" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/twitter-icon.svg" alt="Twitter Icon">
      </a><?php endif; ?>
      <?php if($social_media['linkedin_link']) : ?><a class="mega-menu__social-link" href="<?php echo $social_media['linkedin_link'] ?>" aria-label="LinkedIn">
        <img class="mega-menu__social-icon" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/linkedin-icon.svg" alt="LinkedIn Icon">
      </a><?php endif; ?>
    </div>
  </div>
</section>
