<?php 
if ( ! empty( $args ) ) {
	$post_type = __( $args['post_type'] );
  $yurika_team = __( $args['yurika_team'] );
  $partners = __( $args['partners'] );
  $location = __( $args['location'] );
  $status = __( $args['status'] );
  $in_brief = __( $args['in_brief'] );
  $key_idea = __( $args['key_idea'] );
  $take_aways = __( $args['take_aways'] );
  $audience = __( $args['audience'] );
  $date_time = __( $args['date_time'] );
  $attachments = __( $args['attachments'] );
  $video = __( $args['video'] );

  $items_count = count($posts);
}
if (!empty($posts)) : ?>
<div class="summary <?php echo $post_type ?>">
	<div class="summary--container container">
		<div class="summary__overview">
			<?php if(!empty($in_brief)) : ?>
			<div class="summary__col in_brief">
				<h5 class="summary__col--title">Key messages</h5>
				<div class="summary__col--items">
					<?php echo $in_brief ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if(!empty($key_idea)) : ?>
			<div class="summary__col key_idea">
				<h5 class="summary__col--title">Key idea</h5>
				<div class="summary__col--items">
					<?php echo $key_idea ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if(!empty($take_aways)) : ?>
			<div class="summary__col take_aways">
				<h5 class="summary__col--title">Take aways</h5>
				<div class="summary__col--items">
					<?php echo $take_aways ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if(!empty($audience)) : ?>
			<div class="summary__col audience">
				<h5 class="summary__col--title">Audience</h5>
				<div class="summary__col--items">
					<?php echo $audience ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if(!empty($yurika_team)) : ?>
			<div class="summary__col teams">
				<h5 class="summary__col--title">Yurika Team</h5>
				
				<div class="summary__col--items">
					<?php foreach($yurika_team as $post) : 
					setup_postdata($post); 
					?>
					<a href="<?php the_permalink(); ?>" class="summary__col--item"><?php the_title(); ?></a>
					<?php endforeach ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if($partners) : ?>
			<div class="summary__col partners">
				<h5 class="summary__col--title">Partners</h5>
				<div class="summary__col--items">
					<?php foreach($partners as $partner) : ?>
					<div class="summary__col--item"><?php echo $partner['partner'] ?></div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if(!empty($attachments)) : ?>
			<div class="summary__col downloads">
				<h5 class="summary__col--title">Downloads</h5>
				
				<div class="summary__col--items">
					<?php foreach($attachments as $attachment) : 
					?>
					<a href="<?php echo $attachment['attachment']['url'] ?>" target="_blank" class="summary__col--item"><?php echo $attachment['name'] ?></a>
					<?php endforeach ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if(!empty($location)) : ?>
			<div class="summary__col location">
				<h5 class="summary__col--title">Location</h5>
				<div class="summary__col--items">
					<?php echo $location ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if(!empty($date_time)) : ?>
			<div class="summary__col location">
				<h5 class="summary__col--title">Date & time</h5>
				<div class="summary__col--items">
					<?php echo $date_time ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if(!empty($status)) : ?>
			<div class="summary__col status">
				<h5 class="summary__col--title">Status</h5>
				<div class="summary__col--items">
					<div href="" class="summary__col--item"><?php echo $status ?></div>
				</div>
			</div>
			<?php endif; ?>
			<?php if(!empty($video)) : ?>
			<div class="summary__col video">
				<h5 class="summary__col--title">Video</h5>
				<div class="summary__col--items">
					<div href="" class="summary__col--item">
						<video width="100%" controls>
						  <source src="<?php echo $video ?>" type="video/mp4">
						</video>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<div class="summary__share">
			<div class="summary__col share">
				<h5 class="summary__col--title">Share</h5>
				<div class="summary__col--items">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink() ?>" target="_blank" class="summary__col--item share" style="background-image: url();">Facebook</a>
					<a href="https://www.linkedin.com/shareArticle?url=<?php echo get_permalink() ?>&title=<?php echo get_the_title() ?>&summary=<?php echo get_the_excerpt() ?>" target="_blank" class="summary__col--item share" style="background-image: url();">LinkedIn</a>
					<a href="https://twitter.com/share?url=<?php echo get_permalink() ?>&text=<?php echo get_the_title() ?>" target="_blank" class="summary__col--item share" style="background-image: url();">Twitter</a>
					<a href="https://reddit.com/submit?url=<?php echo get_permalink() ?>&title=<?php echo get_the_title() ?>" target="_blank" class="summary__col--item share" style="background-image: url();">Reddit</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

