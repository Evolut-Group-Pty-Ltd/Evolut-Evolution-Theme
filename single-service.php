<?php get_template_part('partials/header/header'); ?>
<?php get_template_part('partials/submenu/submenu', null, $args ); ?>
<?php
    $post_type = 'service';
    $yurika_team = get_field('yurika_team');
    $in_brief = get_field('in_brief');
    $partners = get_field('partners_list');
    $attachments = get_field('attachments');
    $video = get_field('video');

    $args = array(
      'post_type' => $post_type,
      'yurika_team' => $yurika_team,
      'in_brief' => $in_brief,
      'partners' => $partners,
      'attachments' => $attachments,
      'video' => $video,
    );
  ?>
<?php get_template_part('partials/service-header/service-header'); ?>
<?php
$args = array(
    'menu_name' => 'capabilities',
    'post_type' => 'service',
);
?>

<?php // get_template_part('partials/summary/summary',null, $args ); ?>

<div class="service__content container grid">
  <div class="service__content__content grid__col--span12">
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
  <!-- <div class="service__content__col grid__col--span3">
    <?php get_template_part('partials/related-content/related-content-col'); ?>
  </div> -->
</div>

<?php get_template_part('partials/footer/footer'); ?>


 