<?php
/**
 * template for displaying archive 
 *
 */ 
get_header(); ?>
                <?php wp_head(); ?>
</head>
                <?php get_template_part( 'header', 'content' ); ?>
  <div class="row">
  <div class="excerpt">
<h2 class="arh">
                    <?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: %s', 'krakatau' ), '<span>' . get_the_date() . '</span>' ); ?>
				    <?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: %s', 'krakatau' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
				    <?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: %s', 'krakatau' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
				    <?php else : ?>
				<?php _e( 'Blog Archives', 'krakatau' ); ?>
				    <?php endif; ?>
</h2>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="postmeta">
  <div class="postmeta_links">
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
		</div>
  <div class="postcomments">
	   <a href="<?php the_permalink() ?>#comments"><?php comments_number(__('No comments', 'krakatau'),__('One comment','krakatau'),__('% comments','krakatau')); ?></a>
		</div>
  <div class="clear"></div>
		</div>
		<h2 class="title-excerpt"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				
  <div class="entry">
				<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
				<?php the_excerpt(); ?>
					<div class="clearfix"></div>
					</div>
				
  <div class="postinfo">
				<?php _e('Category: ', 'krakatau'); the_category(', ') ?> | 
				<?php if (get_the_tags()) the_tags(__('Tags: ', 'krakatau'), ', '); ?>
		</div>

		</div>

		        <?php endwhile; ?>
                <?php krakatau_content_nav();?>	
	            <?php else : ?>
  <div class="entry">
<p>
                <?php _e('No matches. Please try again, or use the navigation menus to find what you search for.', 'krakatau'); ?>
</p>
	    </div>	
			

		        <?php endif; ?>
			
	    </div>
                <?php get_sidebar(); ?>
                <?php get_template_part( 'footer', 'content' ); ?>
                <?php get_footer(); ?>