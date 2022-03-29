<?php 
global $ev_models;
if($ev_models === null) {
  $ev_models = get_posts(array(
    'post_type' => 'ev-vehicle',
    'posts_per_page' => -1
  ));
}
?>
<section class="model-search ev-model-search section <?php echo $args['classes'] ?>">
  <?php if($args['title']): ?>
  <h1 class="model-search__title"><?php echo $args['title'] ?></h1>
  <?php endif; ?>
  <div class="model-search__container container grid">
    <div class="grid__col--span3"></div>
    <div class="grid__col--span6">
      <select class="model-search__select ev-model-search__select input--select input--select-search" name="model-name">
        <option value="">Select Make and Model</option>
        <?php foreach($ev_models as $model): ?>
        <option value="<?php echo get_the_permalink($model) ?>"><?php echo get_the_title($model) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="grid__col--span5"></div>
    <div class="grid__col--span2">
      <button class="model-search__btn ev-model-search__btn btn" type="button">Search Now</button> 
    </div>
  </div>
</section>
