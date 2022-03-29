<section class="modal-window <?php echo $args['classes'] ?>" id="<?php echo $args['id'] ?>">
  <div class="modal-window__window">
    <h3 class="modal-window__title"><?php echo $args['title'] ?></h3>
    <div class="modal-window__content">
      <?php echo $args['content'] ?>
    </div>
    <button class="modal-window__close-btn">
      <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect y="19.0786" width="26.9812" height="2.45283" transform="rotate(-45 0 19.0786)" fill="currentColor"/>
        <rect width="26.9812" height="2.45283" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 20.9998 19.0786)" fill="currentColor"/>
      </svg>
    </button>
  </div>
</section>
