<?php
$related_services = get_field('related_services');

if($related_services !== null && $related_services !== false) {
  show_block('acf/post-cards', array(
    'id' => 'block_61a4130c8b418',
    'name' => 'acf/post-cards',
    'data' => array(
      'title' => 'Related Services',
      'posts' => $related_services
    )
  ));
}

?>
