<?php
$social_media = get_field('social_media', 'option');
$common_text = get_field('common_text', 'option');
?>
</main>
<footer class="footer">
  <div class="footer__container container">
    <div class="footer__logo-row">
      <a class="footer__logo grid__col--span3" href="/">
        <img class="footer__logo-img" src="<?php the_field('logo_white', 'option'); ?>" alt="<?php echo get_bloginfo('name') ?>" <?php echo $logo_height ? sprintf('style="height: %spx;"', $logo_height) : '' ?>>
      </a>
      <nav class="footer__menu grid__col--span3">
        <?php echo $common_text['footer_copyright'] ?>
      </nav>
      <nav class="footer__menu footer__menu__links grid__col--span3">
        <?php render_menu('footer_links', 'footer__menu', '-') ?>
      </nav>
      <div class="footer__social grid__col--span3">
        <?php if($social_media['twitter_link']) : ?><a class="footer__social-link" href="<?php echo $social_media['twitter_link'] ?>" aria-label="Twitter">
          <img class="footer__social-icon" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/twitter-icon.svg" alt="Twitter Icon">
        </a><?php endif; ?>
        <?php if($social_media['linkedin_link']) : ?><a class="footer__social-link" href="<?php echo $social_media['linkedin_link'] ?>" aria-label="LinkedIn">
          <img class="footer__social-icon" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/linkedin-icon.svg" alt="LinkedIn Icon">
        </a><?php endif; ?>
        <?php if($social_media['facebook_link']) : ?><a class="footer__social-link" href="<?php echo $social_media['facebook_link'] ?>" aria-label="Facebook">
          <img class="footer__social-icon" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/facebook-icon.svg" alt="Facebook Icon">
        </a><?php endif; ?>
        <?php if($social_media['instagram_link']) : ?><a class="footer__social-link" href="<?php echo $social_media['instagram_link'] ?>" aria-label="Instagram">
          <img class="footer__social-icon" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/instagram-icon.svg" alt="Instagram Icon">>
        </a><?php endif; ?>
      </div>
    </div>
  </div>
</footer>
