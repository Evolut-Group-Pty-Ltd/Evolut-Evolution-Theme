<?php
if(have_rows('margin_formatting')):
  while(have_rows('margin_formatting')): the_row(); 
    $margin_top = get_sub_field('margin_top');
    $margin_bottom = get_sub_field('margin_bottom');
  endwhile;
endif; 
?>