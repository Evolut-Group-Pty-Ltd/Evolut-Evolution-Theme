<?php get_template_part('partials/header/header', 'minimal'); ?>

<section class="page-404 container">
  <a class="page-404__logo" href="/"><img class="page-404__logo-image" src="<?php echo get_stylesheet_directory_uri() ?>/src/images/Yurika-Colour-BlkStrap-Web.svg"></a>

  <h1 class="page-404__title">404</h1>

  <div class="page-404__text text--intro">
    Sorry, the page you are looking for could not be found.
  </div> 

<?php /*<form class="search-form" action="/">
    <button class="search-form__btn" type="submit"><i data-feather="search"></i></button>
    <input class="search-form__input" type="text" name="s" placeholder="Search...">
    </form>*/?>

  <a class="page-404__button btn btn--large" href="/">Back To Home</a> 
</section>

<?php get_template_part('partials/footer/footer', 'minimal'); ?>
