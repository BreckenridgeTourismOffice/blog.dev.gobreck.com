<section id="authorarea">
	<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 90 ) ); ?>
		<div class="authorinfo">
			<h3><?php the_author(); ?></h3>
			<p><?php the_author_meta( 'description' ); ?></p>
			
		</div>
	</section>