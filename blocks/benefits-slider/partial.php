<?php
$items_count = 0;
$benefits = __( $args['benefits'] );
$items_count = count($benefits);
$block_id = __( $args['block_id'] );
?>
 <div class="benefits__list">
  <div class="benefits__nav">
  <?php foreach($benefits as $idx => $benefit): ?>
    <a class="tab__a-<?php echo $block_id ?> benefits__list-item <?php echo $idx === 0 ? 'benefits__list-item--active' : '' ?>" href="javascript:void(0)" onclick="<?php echo $block_id ?>_OpenTab(event, 'tab-<?php echo $block_id ?>-<?php echo $idx; ?>')">
      <div class="benefits__list-item-title tab__link-<?php echo $block_id ?>"><?php echo $benefit['icon'] ? sprintf('<img src="%s" class="benefits__icon">', $benefit['icon']) : '' ?><?php echo $benefit["title"]; ?></div>
    </a>
    <?php endforeach; ?>
  </div>
  <div class="benefits__views">
    <?php foreach($benefits as $idx => $benefit): ?>
    <div class="benefits__view <?php echo $idx === 0 ? 'benefits__view--active' : '' ?> tab__content-<?php echo $block_id ?>" id="tab-<?php echo $block_id ?>-<?php echo $idx; ?>"<?php if($idx!=0) : ?> style="display:none"<?php endif; ?>>
      <div class="benefits__meta">
        <div class="benefits__content">
          <h1 class="benefits__meta-title heading--display"><?php echo $benefit["title"]; ?></h1>
          <div class="benefits__meta-description"><?php echo $benefit["description"]; ?></div>
        </div> 
        <?php $stats = $benefit["statistics"];
        if($stats) : ?>
        <div class="benefits__stats">
          <?php foreach($stats as $stat): ?>
          <div class="benefits__stats-item">
            <img class="benefits__stats-image" src="<?php echo $stat["icon"]; ?>">
            <div class="benefits__stats-text"><?php echo $stat["title"]; ?></div>
          </div>
           <?php endforeach; ?>
        </div>
      <?php endif; ?>
      </div>
      <div class="benefits__related" style="background-image: url(<?php echo $benefit["image"]; ?>); background-position: center; background-size: cover;">
        <?php if($benefit['video']): ?>
          <?php echo smart_video($benefit['video'], null, null) ?>
        <?php endif; ?>
          <div class="benefits__related-content">
            <?php $related_content = $benefit["related_content"];
            if($related_content) : ?>
            <h6 class="benefits__related-content__title">Related Products, Services and Capabilities</h6><?php endif; ?>
            <div class="benefits__related-content__items">
            <?php foreach($related_content as $post): ?>
              <a href="<?php echo get_the_permalink($post) ?>" class="benefits__related-content__item"><?php echo get_the_title($post) ?></a>
            <?php endforeach; ?>
            </div>
          </div>
        </div>
    </div>
  <?php endforeach; ?>
  </div>
  </div>

<script>
function <?php echo $block_id ?>_OpenTab(evt, tabName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("tab__content-<?php echo $block_id ?>");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
    // x[i].style.width = "<?php echo $content_width ?>";
  }
  tablinks = document.getElementsByClassName("tab__a-<?php echo $block_id ?>");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" benefits__list-item--active", "");
  }
  document.getElementById(tabName).style.display = "flex";
  evt.currentTarget.className += " benefits__list-item--active";
  //evt.currentTarget.firstElementChild.className += " active";
}
</script>