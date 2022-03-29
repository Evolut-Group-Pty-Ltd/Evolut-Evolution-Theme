 <?php
$items_count = 0;
$faq_items = get_field('faq_items');
$items_count = count($faq_items);

if (!empty($faq_items)) {
?>
  <div class="faq-accordion__container" style="--items-count: <?php echo $items_count ?>;">
    <div class="faq-accordion__grid container grid">
      <?php 
      if( have_rows('faq_items') ):
        while( have_rows('faq_items') ) : the_row();
          get_template_part('elements/faq-element/faq-item', null, array(
            'classes' => 'grid__col--span12',
            'question' => get_sub_field('question'),
            'answer' => get_sub_field('answer'),
          ));
        endwhile;
      endif;
      ?> 
      <?php wp_reset_query(); ?>
    </div>
  </div>
  <?php } ?>