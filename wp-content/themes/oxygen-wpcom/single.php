<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Oxygen
 * @since Oxygen 0.2.2
 */

get_header(); ?>

		<div id="primary" class="site-content">
			<div id="content" role="main">
			
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail( 'archive-thumbnail' );
} 
?>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php get_sidebar( 'after-singular' ); ?>

				<?php oxygen_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php get_sidebar( 'primary' ); ?>
<?php get_sidebar( 'secondary' ); ?>
<?php get_footer(); ?>