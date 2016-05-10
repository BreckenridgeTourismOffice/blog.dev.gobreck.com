<?php
/**
 * 
 *
 */ 
get_header(); ?>
<?php wp_head(); ?>
</head>
        <?php get_template_part( 'header', 'content' ); ?>
<div class="row">
<div class="excerpt">
        <?php echo krakatau_breadcrumb(); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry">
<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
       <?php the_content(); ?>
<div class="clear"></div>
<div class="alignleft">
       <?php if (!is_attachment()) {previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'krakatau' ) . '</span> %title' );} else {previous_image_link(array( 64, 64 ));}; ?>
</div>
<div class="alignright">
       <?php if (!is_attachment()) {next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'krakatau' ) . '</span>' );} else { next_image_link(array( 64, 64 ));}; ?>
</div>
		</div>
<div class="clear"></div>
        <?php 
		$options = get_option('krakatau_options');
		if(isset($options['krakatau_author_general_intro']) and $options['krakatau_author_general_intro'] == 'true') {
				get_template_part( 'author', 'profile' );
			}
		?>

</div>

    <?php endwhile; ?>
    <?php else : ?>
<div class="entry">
			<p>
			<?php _e('No matches. Please try again, or use the navigation menus to find what you search for.', 'krakatau'); ?>
			</p>
		</div>
    <?php endif; ?>
    <?php comments_template('', true); ?>
</div>
		
<?php get_sidebar(); ?>
<?php get_template_part( 'footer', 'content' ); ?>
<?php get_footer(); ?>