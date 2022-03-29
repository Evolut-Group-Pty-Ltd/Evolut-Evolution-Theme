<section class="team-header section" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
  <div class="team-header__img-bg">
    <div class="team-header__container container grid">
      <div class="team-header__column grid__col--span8">
        <h3 class="team-header__sub-title"><?php echo get_the_category_list() ?></h3>
        <h1 class="team-header__title lines-shift-container"><?php the_title() ?></h1>
        <div class="team-header__text text--intro lines-shift-container" style="--shift-delay: 150ms;"><?php the_excerpt() ?></div>
        <div class="team-header__details"><?php echo get_field('position') ?><br><a href="mailto:<?php echo get_field('email_address') ?>" target="_blank"><?php echo get_field('email_address') ?></a></div>
      </div>
      <div class="team-header__column--related grid__col--span4">
      </div>
    </div>
  </div>
</section>
