<?php
get_template_part('blocks/block-wrapper', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'title' => get_field('title'),
  'heading_tag' => get_field('heading_tag'),
  'alignment' => get_field('alignment'),
  'sub_heading' => get_field('sub_heading'),
  'block_links' => get_field('block_links'),
  'description' => get_field('description'),
  'margin_formatting' => get_field('margin_formatting'),
  'padding' => get_field('padding'),
  'background_image' => get_field('background_image'),
  'bg_image_settings' => get_field('bg_image_settings'),
  'background_video' => get_field('background_video'),
  'minimum_height' => get_field('minimum_height'),
  'heading_position' => get_field('heading_position'),
  'block_unique_id' => get_field('block_unique_id'),
  'block_name' => 'faq-accordion',
));
?>

<?php
get_template_part('blocks/faq-accordion/partial', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'faq_items' => get_field('faq_items'),
));
?>
<?php
get_template_part('blocks/block-wrapper-end', null, array(
  'classes' => !empty($block['className']) ? $block['className'] : '',
  'title' => get_field('title'),
  'heading_tag' => get_field('heading_tag'),
  'alignment' => get_field('alignment'),
  'sub_heading' => get_field('sub_heading'),
  'block_links' => get_field('block_links'),
  'description' => get_field('description'),
  'heading_position' => get_field('heading_position'),
));
?>
<script>
var acc = document.getElementsByClassName("faq-accordion__item-content");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>