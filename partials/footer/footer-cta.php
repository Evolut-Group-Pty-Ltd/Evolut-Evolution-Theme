<?php
$footer_option = get_field("footer_option");
if($footer_option=="reusable") :
    $cta_id = get_field("reusable_block_id");
    // get reusable gutenberg block:
    $cta = get_post( $cta_id );
    echo apply_filters( 'the_content', $cta->post_content );
elseif($footer_option=="custom") :  
    $footer_override = get_field("footer");
    $footer_layout = get_field("footer_layout");
    if($footer_layout=="hero-banner") :
        get_template_part('blocks/block-wrapper', null, array(
              'margin_formatting' => ['margin_top' => 'none', 'margin_bottom' => 'none'],
              'padding' => ['padding_top' => 'none', 'padding_bottom' => 'none'],
              'block_unique_id' => 'footer-cta',
            ));
        get_template_part('blocks/hero-banner/partial', null, array(
          'title' => $footer_override["title"],
          'text' => $footer_override["subtitle"],
          'button_text' => $footer_override["button_text"],
          'button_link' => $footer_override["link"],
          'background_url' => $footer_override["background_image"],
        ));
        get_template_part('blocks/block-wrapper-end', null,null);

    elseif($footer_layout=="content-cards") :
         get_template_part('blocks/block-wrapper', null, array(
              'margin_formatting' => ['margin_top' => 'none', 'margin_bottom' => 'none'],
              'padding' => ['padding_top' => 'half', 'padding_bottom' => 'half'],
              'block_unique_id' => 'footer-cta',
            ));
        get_template_part('blocks/content-cards/partial', null, array(
          'cards' => ['0' => ['title' => $footer_override["title"], 'image' => $footer_override["background_image"], 'link' => $footer_override["link"], 'text' => $footer_override["subtitle"]]],
          'variant' => 'wrap',
          'card_type' => 'bg-image',
          'card_width' => '12',
          'card_spacing' => '0',
        ));
        get_template_part('blocks/block-wrapper-end', null,null);

    endif;
else :
    $current_post_type = get_post_type();
    //var_dump($current_post_type);
    $footer_applied = get_field('footer_applied', 'option');
    if(in_array($current_post_type, $footer_applied)) :
        $cta_id = get_field('general_footer_block_id', 'option');
        // get reusable gutenberg block:
        $cta = get_post( $cta_id );
        echo apply_filters( 'the_content', $cta->post_content );
    endif;
endif;
?>