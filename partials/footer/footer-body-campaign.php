<?php
$logo_height = get_field('logo_height', 'option');
?>
</main>
<footer class="footer">
  <div class="footer__container container">
    <div class="footer__logo-row">
      <a class="footer__logo grid__col--span3" href="https://evolut.com.au/" target="_blank">
        <img class="footer__logo-img" src="<?php the_field('logo_white', 'option'); ?>" alt="<?php echo get_bloginfo('name') ?>" <?php echo $logo_height ? sprintf('style="height: %spx;"', $logo_height) : '' ?>>
      </a>
      <nav class="footer__menu grid__col--span3">
        <?php echo $common_text['footer_copyright'] ?>
      </nav>
    </div>
  </div>
</footer>
