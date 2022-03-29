<?php
$title = __( $args['title'] );
$text = __( $args['text'] );
$link = __( $args['link'] );
$link_title = __( $args['link_title'] );
$link_target = __( $args['link_target'] );
$icon = __( $args['icon'] );
?>

<div class="feature__link__item">
	<div class="feature__icon">
		<img class="feature__icon__image" src="<?php echo $icon ?>">
	</div>
	<div class="feature_details">
		<h4 class="feature__title"><?php echo $title ?></h4>
		<div class="feature__description"><?php echo $text ?></div>
		<?php if($link) : ?>
		<a href="<?php echo $link ?>" target="<?php echo $link_target ?>" class="feature__link btn btn-alt"><?php echo $link_title ?></a>
	<?php endif ?>
	</div>
</div>