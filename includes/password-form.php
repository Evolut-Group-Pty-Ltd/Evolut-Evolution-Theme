<?php
add_filter( 'the_password_form', function($post = 0) {
  $post   = get_post($post);
  $label  = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
  $output = '
<form class="password-form container section" action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" class="post-password-form" method="post">
    <p>' . __('This content is password protected. To view it please enter your password below:') . '</p>
    <div class="password-form__inputs">
      <input class="password-form__input input" name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . __('Password') . '"/>
      <input class="btn" type="submit" name="Submit" value="' . esc_attr_x('Enter', 'post password form') . '" />
    </div>
</form>';

  return $output;
});
?>
