<?php
get_template_part('partials/header/header', 'minimal');
get_template_part('partials/header/header', 'body', $args);
$page_type = 'page';
if(is_archive()) $page_type = 'archive';
if(is_tax()) $page_type = 'taxonomy';
if($page_type == 'page') : 
	$page_background = get_field('page_background_colour');
	$page_type_colour = get_field('page_type_colour');
elseif($page_type == 'archive') :
	$page_background = get_field('page_background_colour', 'option');
	$page_type_colour = get_field('page_type_colour', 'option');
elseif($page_type == 'taxonomy') :
	$page_background = get_field('page_background_colour', 'option');
	$page_type_colour = get_field('page_type_colour', 'option');
endif;
?>
<main class="main"<?php echo (get_field("page_background_colour") || get_field("page_type_colour")) ? sprintf(' style="background-color: %s; color: %s;"', $page_background, $page_type_colour) : '' ?>>
