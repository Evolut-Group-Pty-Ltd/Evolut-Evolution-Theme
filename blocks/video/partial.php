<?php
$video = __( $args['video'] );
$video_type = __( $args['video_type'] );
$video_options = __( $args['video_options'] );
$autoplay = ($video_options['autoplay']) ? " autoplay" : "";
$controls = ($video_options['controls']) ? " controls" : "";
$loop = ($video_options['loop']) ? " loop" : "";
$muted = ($video_options['muted']) ? " muted" : "";
$video_options_string = $autoplay . $controls . $loop . $muted;
//if (!empty($video) && $video_type!='YouTube') :
?>
<div class="video__container swarmify__video container block">
	<smartvideo src="<?php echo $video ?>" width="1280" height="720" class="swarm-fluid" controls=""<?php echo $video_options_string; ?>></smartvideo>
</div>
 