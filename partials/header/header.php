<?php
get_template_part('partials/header/header', 'minimal');
get_template_part('partials/header/header', 'body', $args);
?>
<main class="main"<?php echo (get_field("page_background_colour") || get_field("page_type_colour")) ? sprintf(' style="background-color: %s; color: %s;"', get_field("page_background_colour"), get_field("page_type_colour")) : '' ?>>
