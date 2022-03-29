<?php
function show_block($name, $args) {
  $json = json_encode($args);
  $code = '<!-- wp:'. $name . ' '. $json .' /-->';
  //var_dump($code);
  $blocks = parse_blocks($code);
  foreach($blocks as $b) {
    echo render_block($b);
  }
}
?>
