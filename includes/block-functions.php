<?php

function get_colour($acf_field, $block_colours) {
  
    // Set array of color classes (for block editor) and hex codes (from ACF)
  $wd_block_colors = [
     // Change these to match your color class (gutenberg) and hex codes (acf)
       "purple"       => "#5a287f",
       "orange"       => "#db8e33",
       "coral"        => "#cf5f65",
       "dark-grey"    => "#1a0826",
       "light-purple" => "#f7f4f8",
       "blue"         => "#2a4a96",
       "teal"         => "#0e7187",
       "green"        => "#7bb26a",
       "black"        => "#000000",
       "white"        => "#ffffff",
       "grey-light"   => "#f7f7f7",
       "half-white"   => "rgba(255, 255, 255, 0.5)",

  ];
  //$block_colours = get_field("block_colours");

  $colour_class = '';
  if($block_colours[$acf_field]) :
    $colour = $block_colours[$acf_field];
    foreach( $wd_block_colors as $key => $value ) {
         if( $colour == $value ) {
              $class_colour = $key;
         }
    }

    if($acf_field == 'heading_tag_colour') { $class_descriptor = 'heading-tag'; }
    if($acf_field == 'title_colour') { $class_descriptor = 'title'; }
    if($acf_field == 'subheading_colour') { $class_descriptor = 'subheading'; }
    if($acf_field == 'description_colour') { $class_descriptor = 'description'; }
    if($acf_field == 'background_colour') { $class_descriptor = 'background'; }

    $colour_class = 'has-' . $class_colour . '-' . $class_descriptor . '-color';
  endif;

  return $colour_class;
}

function block_classes($args) {
  $class_set = '';

  $heading_tag_class = get_colour('heading_tag_colour', $args['block_colours']);
  $title_class = get_colour('title_colour', $args['block_colours']);
  $subheading_class = get_colour('subheading_colour', $args['block_colours']);
  $description_class = get_colour('description_colour', $args['block_colours']);
  $background_class = get_colour('background_colour', $args['block_colours']);

  $block_style = '';
  $background_image = $args['background_image'];
  $bg_image_settings = $args['bg_image_settings'];
  $minimum_height = $args['minimum_height'];
  $vertical_position = $args['vertical_position'];
  $bg_position = ($bg_image_settings ? $bg_image_settings : 'center');
  if($background_image) $block_style = 'background-image: url(' . $background_image . '); background-size: cover; background-position: ' . $bg_position . ';';
  if($minimum_height) $block_style .= ' min-height: ' . $minimum_height . ';';
  if($vertical_position) $block_style .= ' justify-content: ' . $vertical_position . ';';

  if($args['margin_formatting']) :
    $margin_top = $args['margin_formatting']['margin_top'];
    $margin_bottom = $args['margin_formatting']['margin_bottom'];
  else :
    $margin_top = 'standard';
    $margin_bottom = 'standard';
  endif;

  if($args['padding']) :
    $padding_top = $args['padding']['padding_top'];
    $padding_bottom = $args['padding']['padding_bottom'];
  else :
    $padding_top = 'none';
    $padding_bottom = 'none';
  endif;

  $block_class = $heading_tag_class . ' ' . $title_class . ' ' . $subheading_class . ' ' . $description_class . ' ' . $background_class . ' margin--top-' . $margin_top . ' margin--bottom-' . $margin_bottom . ' padding--top-' . $padding_top . ' padding--bottom-' . $padding_bottom;

  $class_array = array("class" => $block_class, "style" => $block_style);

  return $class_array;
}

?>
<?php
function block_links_section($args) {
  if( $args['block_links'] ) : ?>
    <div class="block__links container">
        <?php foreach($args['block_links'] as $block_link) : ?>
            <a class="block__link btn<?php echo $args['button_style'] ? ' btn-' . $args['button_style'] : ''; ?><?php echo $args['button_size'] ? ' btn--' . $args['button_size'] : ''; ?>" href="<?php echo $block_link['link']['url']; ?>"><?php echo $block_link['link_title']; ?></a>
        <?php endforeach; ?>
    </div>
  <?php 
  endif; 
};
?>
<?php
function block_heading_tag_section($heading_tag) {
    if($heading_tag) : 
?>
  <h6 class="block__heading-tag container"><?php echo $heading_tag ?></h6>
<?php 
endif; 
};
?>
<?php
function block_title_section($title) {
    if($title) : 
?>
  <h2 class="block__title container"><?php echo $title ?></h2>
<?php 
endif; 
};
?>
<?php
function block_sub_heading_section($sub_heading) {
    if($sub_heading) : 
?>
  <h3 class="block__sub-heading container"><?php echo $sub_heading ?></h3>
<?php 
endif; 
};
?>
<?php
function block_description_section($description) {
    if($description) : 
?>
  <div class="block__description container"><?php echo $description ?></div>
<?php 
endif; 
};
?>