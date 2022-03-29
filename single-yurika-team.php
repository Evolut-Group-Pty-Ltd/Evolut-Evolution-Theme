<?php get_template_part('partials/header/header'); ?>
<?php get_template_part('partials/team-header/team-header'); ?>
<?php
$linked_in = get_field("linkedin");
$email_address = get_field("email_address");
$phone = get_field("phone");
$contact_details = (isset($linked_in) || isset($email_address) || isset($phone));
$name = get_the_title();
?>

<div class="case-study__content service__content container grid">
  <div class="service__content__content grid__col--span9">
    <?php the_content() ?>
  </div>
  <div class="team__contact__col grid__col--span3">
    <?php if($contact_details) : ?>
      <h5>Contact <?php echo $name ?></h5>
      <?php if($email_address) : ?><a class="team__contact--btn btn btn-purple" href="mailto:<?php echo $email_address ?>"><img class="team__contact--social" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/email.svg" alt="Email"> Email <?php echo $name ?></a><?php endif; ?>
      <?php if($linked_in) : ?><a class="team__contact--btn btn btn-linkedin" href="<?php echo $linked_in ?>"><img class="team__contact--social" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/LinkedIn.svg" alt="LinkedIn"><?php echo $name ?> on LinkedIn</a><?php endif; ?>
      <?php if($phone) : ?><a class="team__contact--btn btn btn-orange" href="tel:<?php echo $phone ?>"><img class="team__contact--social" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/telephone.svg" alt="Email">Call <?php echo $name ?></a><?php endif; ?>
    <?php //get_template_part('partials/related-content/related-content-col'); ?>
  <?php endif; ?>
  </div>
</div>

<?php get_template_part('partials/footer/footer'); ?>