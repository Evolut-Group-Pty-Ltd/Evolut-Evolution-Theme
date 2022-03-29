<?php
$other_settings = get_field('other', 'option');
echo do_shortcode('[mc4wp_form id="' . $other_settings['mailchimp_newsletter_form_id'] .'"]')
?>

