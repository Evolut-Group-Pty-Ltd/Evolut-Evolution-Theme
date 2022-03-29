<?php
function smart_video($video, $video_options, $styles) {
	$autoplay = ($video_options['autoplay']) ? ' autoplay=""' : '';
	$controls = ($video_options['controls']) ? ' controls=""' : '';
	$loop = ($video_options['loop']) ? ' loop=""' : '';
	$muted = ($video_options['muted']) ? ' muted=""' : '';
	$poster = ($video_options['poster']) ? ' poster="' . $video_options['poster'] . '"' : '';
	$video_options_string = $poster . $autoplay . $controls . $loop . $muted;

	$video_html = '<div class="video__container swarmify__video' . $styles . '">';
	$video_html .= '<smartvideo src="' . $video . '" width="1280" height="720" class="swarm-fluid" controls=""' . $video_options_string . '></smartvideo>';
	$video_html .= '</div>';

	return $video_html;
}
?>