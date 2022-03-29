<?php
add_filter('gform_submit_button', function($button, $form) {
  return $button .= '<div class="gform_footer__comment">* Required Fields</div>';
}, 10, 2);

// turning input tag into a button
add_filter('gform_next_button', 'input_to_button', 10, 2);
add_filter('gform_previous_button', 'input_to_button', 10, 2);
add_filter('gform_submit_button', 'input_to_button', 10, 2);
function input_to_button($button, $form) {
  $dom = new DOMDocument();
  $dom->loadHTML('<?xml encoding="utf-8" ?>' . $button);
  $input = $dom->getElementsByTagName('input')->item(0);
  $new_button = $dom->createElement('button');
  $new_button->appendChild($dom->createTextNode($input->getAttribute('value')));
  $input->removeAttribute('value');
  foreach($input->attributes as $attribute) {
    $new_button->setAttribute($attribute->name, $attribute->value);
  }
  $input->parentNode->replaceChild($new_button, $input);

  return $dom->saveHtml($new_button);
}

?>
