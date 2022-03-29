<?php
$related_case_studies = get_field('related_case_studies');

if($related_case_studies !== null && $related_case_studies !== false) {
  show_block('acf/post-cards', array(
    'id' => 'block_case_studies',
    'name' => 'acf/post-cards',
    'data' => array(
      'title' => 'Related Case Studies',
      'posts' => $related_case_studies
    )
  ));
}

?>
