<?php get_template_part('partials/header/header'); ?>
<?php get_template_part('partials/service-header/service-header-2'); ?>
<?php
    $partners = get_field('partners_list');
    $yurika_team = get_field('yurika_team');
    $location = get_field('location');
    $status = get_field('status');
    $date_time = get_field('date_time');

    $args = array(
      'yurika_team' => $yurika_team,
      'partners' => $partners,
      'location' => $location,
      'status' => $status,
    );
  ?>

<div class="case-study__content service__content container grid">
  <div class="service__content__content grid__col--span9">
    <?php the_content() ?>
    <?php
      $yurika_team = get_field('yurika_team');

      $args = array(
        'title' => 'Yurika team',
        'card_type' => 'partial',
        'variant' => 'wrap',
        'card_spacing' => '10',
        'card_width' => '4',
        'posts' => $yurika_team,
      );
    ?>
    <?php get_template_part('blocks/post-cards/block', null, $args ); ?>
  </div>
  <div class="service__content__col grid__col--span3">
    <?php get_template_part('partials/related-content/related-content-col'); ?>
  </div>
</div>

<?php get_template_part('partials/footer/footer'); ?>