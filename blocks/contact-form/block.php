<section class="contact-form section container grid <?php echo !empty($block['className']) ? $block['className'] : '' ?>">
  <div class="contact-form__details grid__col--span4">
    <h3 class="contact-form__details-title"><?php the_field('title') ?></h3>
    <?php while(have_rows('contacts')): the_row(); ?>
    <?php $contact_type = get_sub_field('type'); ?>
    <div class="contact-form__contact">
      <h4 class="contact-form__contact-name"><?php the_sub_field('name') ?></h4>
      <?php if($contact_type === 'phone'): ?>
      <a class="contact-form__contact-value heading--h4" href="tel:<?php echo str_replace(' ', '', get_sub_field('value')) ?>"><?php the_sub_field('value') ?></a>
      <?php elseif($contact_type === 'email'): ?>
      <a class="contact-form__contact-value heading--h4" href="mailto:<?php the_sub_field('value') ?>"><?php the_sub_field('value') ?></a>
      <?php else: ?>
      <div class="contact-form__contact-value heading--h4"><?php the_sub_field('value') ?></div>
      <?php endif; ?>
    </div>
    <?php endwhile; ?>
    <div class="contact-form__hours">
      <h4 class="contact-form__hours-label">Opening Hours</h4>
      <div class="contact-form__hours-value"><?php the_field('hours') ?></div>
    </div>
  </div>
  <div class="grid__col"></div>
  <div class="contact-form__form grid__col--span7">
    <?php echo do_shortcode('[gravityform id="' . get_field('form_id') . '" title="false" description="false" ajax="true"]'); ?>
  </div>
</section>
