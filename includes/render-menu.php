<?php
function structure_menu_items_hierarchicaly($parent_id, $items) {
  $h = array();
  foreach($items as &$i) {
    if($i->menu_item_parent != $parent_id) continue;

    $item = array('item' => $i, 'children' => array());
    $item['children'] = structure_menu_items_hierarchicaly($i->ID, $items);
    $h[] = $item;
  }
  return $h;
}

function is_active_url($url) {
  $no_protocol_url = str_replace(array('http://', 'https://'), '', $url);
  $is_same_domain = stripos($no_protocol_url, $_SERVER['SERVER_NAME']) === 0;
  $active = $is_same_domain && $_SERVER['REQUEST_URI'] == parse_url($url, PHP_URL_PATH);
  return $active;
}

function is_active_item($i) {
  $item = &$i['item'];
  if(is_active_url($item->url)) return true;
  foreach($i['children'] as &$ic) {
    if(is_active_item($ic)) return true;
  }

  return false;
}

function render_menu($menu_name, $base_class='nav-menu', $separator='__', $max_depth = 1) {
  $locations = get_nav_menu_locations();
  // if not such menu rendering nothing
  if(!array_key_exists($menu_name, $locations)) return;

  $menu = wp_get_nav_menu_object($locations[$menu_name]);
  $menu_items = wp_get_nav_menu_items($menu->term_id);
  $hierarchy = structure_menu_items_hierarchicaly(0, $menu_items);

  render_menu_items($hierarchy, $base_class, $separator, 1, $max_depth);
}

function render_menu_items($hierarchy, $base_class='nav-menu', $separator='__', $depth, $max_depth) {
  foreach($hierarchy as &$i) {
    $item = &$i['item'];
    $href = !empty($item->url) ? $item->url : '';
    $title = apply_filters('the_title', $item->title, $item->ID);
    //$active = ( (stripos($item->url, $_SERVER['SERVER_NAME']) !== false) && $_SERVER['REQUEST_URI'] == parse_url( $item->url, PHP_URL_PATH  )  ) ? $base_class . $separator . 'item--active' : '';
    $active = is_active_item($i) ? $base_class . $separator . 'item--active' : '';
    $target = !empty($item->target) ? ' target="'.$item->target.'"' : '';

    $result = sprintf(
      "<a href='%s' class='" . $base_class . $separator . "item %s %s'%s id='menu-item-%s'>%s%s</a>", 
      $href, 
      $active, 
      join(' ', $item->classes), 
      $target, 
      $item->ID, 
      $title,
      in_array('shopify-cart__counter', $item->classes) ? ' <span class="Header__CartCountContainer">(<span class="Header__CartCount">0</span>)</span>' : ''
    );
    echo $result;

    if($depth < $max_depth && !empty($i['children'])) {
      echo '<div class="' . $base_class . $separator . 'children ' . $base_class . $separator . 'children--lvl' . $depth .'">';
      render_menu_items($i['children'], $base_class, $separator, $depth + 1, $max_depth);
      echo '</div>';
    }
  }
}
?>
