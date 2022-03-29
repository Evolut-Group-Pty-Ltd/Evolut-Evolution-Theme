<?php
//if(get_post_type()=="capabilities") :
  $current_post_type = get_post_type();
  $solutions_array = ['name' => 'solutions', 'card_type' => 'bg-image', 'variant' => 'draggable', 'card_spacing' => '0', 'card_width' => '4'];
  $case_studies_array = ['name' => 'case_studies', 'card_type' => 'bg-image', 'variant' => 'draggable', 'card_spacing' => '0', 'card_width' => '4'];
  $services_array = ['name' => 'services', 'card_type' => 'partial', 'variant' => 'draggable', 'card_spacing' => '0', 'card_width' => '4'];
  $resources_array = ['name' => 'resources', 'card_type' => 'list-item', 'variant' => 'wrap', 'card_spacing' => '10', 'card_width' => '4'];
  $industries_array = ['name' => 'industries', 'card_type' => 'partial', 'variant' => 'draggable', 'card_spacing' => '0', 'card_width' => '4'];
  $capabilities_array = ['name' => 'capabilities', 'card_type' => 'bg-image', 'variant' => 'draggable', 'card_spacing' => '0', 'card_width' => '4'];
  $team_array = ['name' => 'team', 'card_type' => 'list-item', 'variant' => 'wrap', 'card_spacing' => '10', 'card_width' => '4'];
  $related_array = [
    ['id' => 'capabilities', 'related_items' => [$services_array, $team_array, $case_studies_array,  $resources_array, $industries_array, $solutions_array, $capabilities_array]],
    ['id' => 'industry', 'related_items' => [$solutions_array, $case_studies_array, $capabilities_array, $services_array, $resources_array, $industries_array]],
    ['id' => 'solution', 'related_items' => [$capabilities_array, $case_studies_array, $services_array, $resources_array, $industries_array, $solutions_array]],
    ['id' => 'page', 'related_items' => [$capabilities_array, $case_studies_array, $services_array, $resources_array, $industries_array, $solutions_array]]
  ];
  foreach($related_array as $related_content) :
    if($related_content['id']==$current_post_type) :
      foreach($related_content['related_items'] as $related_item) :
        $related_item_name = $related_item['name'];
        $related_cards = get_field('related_' . $related_item_name);
        $related_label = get_field($related_item_name . '_label');
        $related_enabled = get_field($related_item_name . '_enabled');
        if($related_enabled && $related_cards) :
          if($related_item_name == "case_studies") :
            $args = ['margin_formatting' => ['margin_top' => 'none', 'margin_bottom' => 'none'], 'padding' => ['padding_top' => 'none', 'padding_bottom' => 'none']];
            get_template_part('blocks/block-wrapper', null, $args); 
            get_template_part('blocks/posts-slider/partial', null, array(
              'classes' => !empty($block['className']) ? $block['className'] : '',
              'posts' => $related_cards,
              'title' => $related_label,
            ));
            get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); 
            wp_reset_postdata();
          else :
            $args = ['title' => $related_label, 'margin_formatting' => ['margin_top' => 'standard', 'margin_bottom' => 'standard'], 'padding' => ['padding_top' => 'none', 'padding_bottom' => 'none']];
            get_template_part('blocks/block-wrapper', null, $args); 
            get_template_part('blocks/post-cards/partial', null, array(
              'classes' => !empty($block['className']) ? $block['className'] : '',
              'posts' => $related_cards,
              'variant' => $related_item['variant'],
              'card_type' => $related_item['card_type'],
              'card_width' => $related_item['card_width'],
              'card_spacing' => $related_item['card_spacing'],
            ));
            get_template_part('blocks/acf-block-inputs', null, ['position' => 'end']); 
            wp_reset_postdata();
          endif;
        endif;
      endforeach;
    endif;
  endforeach;
//endif;
?>