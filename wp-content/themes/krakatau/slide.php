<?php
	$options = get_option('krakatau_options');
	$slider_limit = intval($options['krakatau_slider_limit'] - 1);	
	switch($options['krakatau_slider_content']) {
		case 0: query_posts('offset=0&posts_per_page=' . $slider_limit); break;
		case 1: query_posts('category_name=featured&offset=0&posts_per_page=' . $slider_limit); break;
		case 2: query_posts('meta_key=featured&meta_value=yes&offset=0&posts_per_page=' . $slider_limit); break;
		case 3: query_posts('cat=' . esc_attr($options['krakatau_slider_cat']) . '&offset=0&posts_per_page=' . $slider_limit); break;
		default: query_posts('offset=0&posts_per_page=' . $slider_limit); break;
	}
?>
<div id="slider">
	<div id="slide_panel">
		<h2 id="slide_head"><?php echo esc_attr($options['krakatau_slider_title']); ?></h2>
		<div id="slide_keys">
			<a id="slide_prev" href="#prev"><img src="<?php echo get_template_directory_uri(); ?>/images/prev.png" alt="" /></a>
			<a id="slide_next" href="#next"><img src="<?php echo get_template_directory_uri(); ?>/images/next.png" alt="" /></a>
		</div>
	</div>
	<div class="clearfix"></div>
	<div id="content-slider">	
		<div id="slideshow">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
			<div class="post">		
				<h2 class="title-excerpt"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
					<?php the_excerpt(); ?>
					<div class="clear"></div>
				</div>
				
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</div>
	<div class="clearfix"></div>
	</div>
<?php wp_reset_query(); ?>						