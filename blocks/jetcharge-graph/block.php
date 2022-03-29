<?php
$items = get_field('items');
$items_count = count($items);
?>
<section class="jetcharge-graph section section--no-space <?php echo !empty($block['className']) ? $block['className'] : '' ?>" data-active-item="1">
  <div class="jetcharge-graph__container container grid">
    <div class="jetcharge-graph__title-col grid__col--span12">
      <?php if(get_field('title')): ?>
      <h1 class="jetcharge-graph__title"><?php the_field('title') ?></h1>
      <?php endif; ?>
    </div>

    <div class="jetcharge-graph__menu-col grid__col--span2">
      <nav class="jetcharge-graph__menu"> 
        <?php foreach($items as $idx => $item): ?>
        <button class="jetcharge-graph__menu-item" type="button" data-target="<?php echo ($idx + 1) ?>"><?php echo $item['title'] ?></button>
        <?php endforeach; ?>
      </nav>
      <div class="jetcharge-graph__navs">
        <button class="jetcharge-graph__nav"><i data-feather="arrow-left"></i></button>
        <button class="jetcharge-graph__nav"><i data-feather="arrow-right"></i></button>
      </div>
    </div>

    <div class="jetcharge-graph__graph-col grid__col--span7">
      <div class="jetcharge-graph__graph">
        <?php foreach($items as $idx => $item): ?>
        <button class="jetcharge-graph__graph-item" data-target="<?php echo ($idx + 1) ?>" style="<?php echo sprintf('width: %d%%; left: %d%%; top: %d%%;', $item['width'], $item['left'], $item['top']) ?>">
          <img class="jetcharge-graph__img" src="<?php echo $item['image'] ?>" alt="<?php echo $item['title'] ?>">
          <img class="jetcharge-graph__img jetcharge-graph__img--active" src="<?php echo $item['image_active'] ?>" alt="<?php echo $item['title'] ?>">
        </button>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="jetcharge-graph__desc-col grid__col--span3">
      <?php foreach($items as $item): ?>
      <div class="jetcharge-graph__desc-item">
        <h3 class="jetcharge-graph__desc-item-title"><?php echo $item['title'] ?></h3>
        <div class="jetcharge-graph__desc-item-text"><?php echo nl2br($item['text']) ?></div>
        <?php if($item['button']): ?>
        <a class="jetcharge-graph__desc-item-btn btn btn--gradient" href="<?php echo $item['button']['url'] ?>" target="<?php echo $item['button']['target'] ?>">
          <?php echo $item['button']['title'] ?>
        </a>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php
wp_enqueue_script(EVOLUT_THEME_SLUG . '-jetcharge-graph-js', get_stylesheet_directory_uri() . '/src/scripts/jetcharge-graph.js', array(), EVOLUT_THEME_VERSION, true);
?>
