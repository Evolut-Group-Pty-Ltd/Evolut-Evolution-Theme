<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;700&display=swap" rel="stylesheet">
<?php get_template_part('partials/header/header'); ?>

<?php if(have_posts()): ?>
<?php while(have_posts()): the_post();?>
<div class="container">
  <h1><?php the_title() ?></h1>
</div>
<?php the_content(); ?>
<?php endwhile; ?>
<?php else: ?>
No posts found!
<?php endif; ?>

<?php get_template_part('partials/footer/footer'); ?>

