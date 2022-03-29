<?php
$selected_posts = $args['selected_posts'];
$title = get_field('title');
$background_colour = get_field("block_colours")["background_colour"];
$heading_tag_colour = get_field("block_colours")["heading_tag_colour"];
$title_colour = get_field("block_colours")["title_colour"];
$subheading_colour = get_field("block_colours")["subheading_colour"];
$description_colour = get_field("block_colours")["description_colour"];
$block_unique_id = get_field('block_unique_id');
?>
<section <?php if($block_unique_id) : ?>id="<?php echo $block_unique_id; ?>" <?php endif; ?>class="posts-preview section <?php echo $args['classes'] ?>"<?php if($background_colour) : ?> style="background-color: <?php echo $background_colour ?>;"<?php endif; ?>>
  <div class="posts-preview__views container">
    <?php foreach($selected_posts as $idx => $post): ?>
    <div class="posts-preview__view grid <?php echo $idx === 0 ? 'posts-preview__view--active' : '' ?>">
      <div class="posts-preview__meta grid__col--span5">
        <div class="posts-preview__content">
          <h6 class="posts-preview__meta-type text--caps14"<?php if($heading_tag_colour) : ?> style="color: <?php echo $heading_tag_colour ?>;"<?php endif; ?>><?php echo $title  ?></h6>
          <h1 class="posts-preview__meta-title heading--display"<?php if($title_colour) : ?> style="color: <?php echo $title_colour ?>;"<?php endif; ?>><?php echo get_the_title($post) ?></h1>
          <div class="posts-preview__meta-description"<?php if($description_colour) : ?> style="color: <?php echo $description_colour ?>;"<?php endif; ?>><?php echo get_the_excerpt($post) ?></div>
          <a class="posts-preview__meta-link btn" href="<?php echo get_the_permalink($post) ?>">
            Learn More
          </a>
        </div> 
        <nav class="posts-preview__nav">
          <button class="posts-preview__nav-item" type="button" aria-label="previous item">
            <svg width="44" height="43" viewBox="0 0 44 43" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 21.6814C0 10.042 9.43558 0.606445 21.075 0.606445H44V42.7563H21.075C9.43558 42.7563 0 33.3208 0 21.6814V21.6814Z" fill="#aaaaaa"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M26.9648 33.8255C26.5562 34.2613 25.8948 34.2613 25.4873 33.8255L16.8466 24.5846C16.0294 23.7118 16.0294 22.2959 16.8466 21.4231L25.55 12.1141C25.9544 11.6828 26.6075 11.6772 27.0171 12.103C27.4351 12.5377 27.4403 13.254 27.0286 13.6954L19.0629 22.2132C18.6543 22.6502 18.6543 23.3576 19.0629 23.7945L26.9648 32.2453C27.3734 32.6811 27.3734 33.3885 26.9648 33.8255Z" fill="#CCCCCC"/>
            </svg>
          </button>
          <button class="posts-preview__nav-item" type="button" aria-label="next item">
            <svg width="44" height="43" viewBox="0 0 44 43" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M44 21.6809C44 33.3203 34.5644 42.7559 22.925 42.7559L0 42.7559L3.68486e-06 0.605953L22.9251 0.605955C34.5644 0.605956 44 10.0415 44 21.6809V21.6809Z" fill="#aaaaaa"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1758 33.8255C16.5844 34.2613 17.2458 34.2613 17.6534 33.8255L26.294 24.5846C27.1112 23.7118 27.1112 22.2959 26.294 21.4231L17.5907 12.1141C17.1863 11.6828 16.5332 11.6772 16.1236 12.103C15.7056 12.5377 15.7003 13.254 16.1121 13.6954L24.0777 22.2132C24.4863 22.6502 24.4863 23.3576 24.0777 23.7945L16.1758 32.2453C15.7672 32.6811 15.7672 33.3885 16.1758 33.8255Z" fill="#CCCCCC"/>
            </svg>
          </button>
        </nav>
      </div>
      <div class="grid__col--span1"></div>
      <?php if(get_field("bg_video", $post)) : ?>
      <video class="posts-preview__video grid__col--span6" playsinline autoplay muted loop>
          <source src="<?php echo get_field("bg_video", $post); ?>" type="video/mp4">
      </video>
    <?php else : ?>
      <a class="posts-preview__image-container grid__col--span6" href="<?php echo get_the_permalink($post) ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url($post) ?>');">
      </a>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="posts-preview__list container">
    <?php foreach($selected_posts as $idx => $post): 
      $postType = get_post_type_object(get_post_type($post));
      if ($postType) {
          $post_type_label = $postType->labels->singular_name;
      }
      ?>
    <div class="posts-preview__list-item <?php echo $idx === 0 ? 'posts-preview__list-item--active' : '' ?>">
      <h6 class="posts-preview__list-item-type text--caps14"><?php echo $post_type_label; ?></h6>
      <h5 class="posts-preview__list-item-title"><?php echo get_the_title($post) ?></h5>
    </div>
    <?php endforeach; ?>
  </div>

</section>