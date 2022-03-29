<?php 

$title = __( $args['title'] );
$heading_tag = __( $args['heading_tag'] );
$alignment = __( $args['alignment'] );
$sub_heading = __( $args['sub_heading'] );
$block_links = __( $args['block_links'] );
$description = __( $args['description'] );
$heading_position = __( $args['heading_position'] );
if(get_field("heading_position")) : 
	$heading_position = get_field("heading_position");
	endif;
?>

<?php if(($heading_position == 'bottom') && ($heading_tag || $title || $sub_heading || $description || $block_links)) : ?>
	<div class="block__wrapper-meta">
	<?php echo block_title_section($title) ?>
	<?php echo block_sub_heading_section($sub_heading) ?>
	<?php echo block_description_section($description) ?>
	<?php echo block_heading_tag_section($heading_tag) ?>
	<?php echo block_links_section($args) ?>
	</div>
<?php endif; ?>
</section>