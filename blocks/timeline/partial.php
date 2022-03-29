<?php
$timeline = __( $args['timeline'] );
?>
<?php if($timeline) : ?>
<div class="timeline">
	<?php foreach($timeline as $timeline_part) : ?>
	 <div class="timeline__part reveal">
	   <div class="timeline__part-content">
	     <?php if($timeline_part['title']) : ?><h3 class="timeline__part-title"><?php echo $timeline_part['title']; ?></h3><?php endif; ?>
	     <?php if($timeline_part['subtitle']) : ?><h4 class="timeline__part-subtitle"><?php echo $timeline_part['subtitle']; ?></h4><?php endif; ?>
	     <?php if($timeline_part['text']) : ?><div class="timeline__part-text"><?php echo $timeline_part['text']; ?></div><?php endif; ?>
	     <?php if($timeline_part['image']) : ?>
	     <div class="timeline__image-box">
	       <img class="timeline__image" src="<?php echo $timeline_part['image']['url']; ?>" alt="<?php echo $timeline_part['title']; ?><">
	     </div>
	 	<?php endif; ?>
	   </div>
	 </div>
	<?php endforeach; ?>
  
</div>
<?php endif; ?>
<script>
function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("revealed");
    } else {
      reveals[i].classList.remove("revealed");
    }
  }
}

window.addEventListener("scroll", reveal);
</script>
 