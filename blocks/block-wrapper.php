<?php 

$title = __( $args['title'] );
$title_position = __( $args['title_position'] );
$heading_tag = __( $args['heading_tag'] );
$alignment = __( $args['alignment'] );
$sub_heading = __( $args['sub_heading'] );
$block_links = __( $args['block_links'] );
$description = __( $args['description'] );
$margin_formatting = __( $args['margin_formatting'] );
$padding = __( $args['padding'] );
$background_image = __( $args['background_image'] );
$bg_image_settings = __( $args['bg_image_settings'] );
$background_video = __( $args['background_video'] );
$minimum_height = __( $args['minimum_height'] );
$heading_position = __( $args['heading_position'] );
$block_name = __( $args['block_name'] );
$block_unique_id = __( $args['block_unique_id'] );
if(get_field("heading_position")) : 
	$heading_position = get_field("heading_position");
	endif;
?>


<section <?php if($block_unique_id) : ?>id="<?php echo $block_unique_id; ?>" <?php endif; ?>class="<?php echo $block_name ?>-section block section visible-tag <?php echo $variant === 'draggable' ? 'draggable-content' : ''?> <?php echo !empty($block['className']) ? $block['className'] : '' ?> <?php echo block_classes($args)["class"] ?>" style="<?php echo block_classes($args)["style"] ?>">
	<?php if(($heading_position != 'bottom') && ($heading_tag || $title || $sub_heading || $description || $block_links)) : ?>
	<div class="block__wrapper-meta <?php echo $alignment ? 'align--' . $alignment : ''; ?>">
	<?php echo block_heading_tag_section($heading_tag) ?>
	<?php echo block_title_section($title) ?>
	<?php echo block_sub_heading_section($sub_heading) ?>
	<?php echo block_description_section($description) ?>
	<?php echo block_links_section($args) ?>
	</div>
	<?php endif; ?>