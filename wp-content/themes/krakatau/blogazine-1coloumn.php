<?php
/*
blogazine style: One coloumn style
*/
?>
<?php get_header(); ?>
<?php wp_enqueue_style('one-coloumn');wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="row">
    <?php echo krakatau_breadcrumb(); ?>
<section class="one-coloumn-blogazine">
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry">
    
<h1 class="one-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    
<p class="post-info-single">
<?php 
                    printf( __( '<span class="%1$s">Posted on</span> %2$s by %3$s', 'krakatau' ),'meta-prep meta-prep-author',
		            sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
			            get_permalink(),
			            esc_attr( get_the_time() ),
			            get_the_date()
		            ),
		            sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			            get_author_posts_url( get_the_author_meta( 'ID' ) ),
			        sprintf( esc_attr__( 'View all posts by %s', 'krakatau' ), get_the_author() ),
			            get_the_author()
		                )
			        );
		        ?>
</p>
    <?php the_content(); ?>
<div class="clearfix"></div>
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'krakatau' ) . '</span>', 'after' => '</div>' ) ); ?>

</div>
<div class="clearfix"></div>
<div class="postinfo">
	<?php _e('Category: ', 'krakatau'); the_category(', ') ?> | 
	<?php if (get_the_tags()) the_tags(__('Tags: ', 'krakatau'), ', '); ?>
		</div>
<div class="alignleft">
    <?php if (!is_attachment()) {previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'krakatau' ) . '</span> %title' );} else {previous_image_link(array( 64, 64 ));}; ?>
</div>
<div class="alignright">
    <?php if (!is_attachment()) {next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'krakatau' ) . '</span>' );} else { next_image_link(array( 64, 64 ));}; ?>
</div>
<div class="clearfix"></div>
<?php 
		$options = get_option('krakatau_options');
		if(isset($options['krakatau_author_general_intro']) and $options['krakatau_author_general_intro'] == 'true') {
				get_template_part( 'author', 'profile' );
			}
		?>

</div>

    <?php endwhile; ?>
    <?php comments_template('', true); ?>
<div class="clearfix"></div>
    <?php else : ?>
<div class="entry">
					<p><?php _e('No matches. Please try again, or use the navigation menus to find what you search for.', 'krakatau'); ?></p>
				</div>	
    <?php endif; ?>
</section>
    
    <?php get_template_part( 'footer', 'content' ); ?>
    <?php get_footer(); ?>              