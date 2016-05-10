<?php
/*
blogazine style: Blogazine Style
*/
?>
               <?php get_header(); ?>
               <?php wp_head(); ?>
</head>
<body>
   <section class="blogazine">
   <div class="row">
<div id="logo" class="alignleft">
				<?php
				$options = get_option('krakatau_options');
				if ( isset($options['krakatau_general_logo']) and $options['krakatau_general_logo'] <> "" ) { ?>
					<a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url($options['krakatau_general_logo']); ?>" alt="Logo" /></a>
				<?php } else { ?>

				<?php } ?>
</div>
<div id="navi">
				<?php
wp_nav_menu(array('theme_location' => 'navi', 'container' => false, 'menu_id' => 'navmenu', 'echo' => true, 'fallback_cb' => 'krakatau_default_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0));
				?>
			</div>
</div>
   <div class="clearfix"></div>
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
               <?php the_content(); ?>
<div class="clearfix"></div>
<section id="authorarea">
		       <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 90 ) ); ?>
		<div class="authorinfo">
			<h3><?php the_author(); ?></h3>
			<p><?php the_author_meta( 'description' ); ?></p>

		</div>
	</section>
</div>

               <?php endwhile; ?>
               <?php else : ?>
               <?php endif; ?>
  <section class="ohnav">
<div class="alignleft">
               <?php if (!is_attachment()) {previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'krakatau' ) . '</span> %title' );} else {previous_image_link(array( 64, 64 ));}; ?>
</div>
<div class="alignright">
               <?php if (!is_attachment()) {next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'krakatau' ) . '</span>' );} else { next_image_link(array( 64, 64 ));}; ?>
</div>
<div class="clearfix"></div>
</section>
  <section class="comment-blogazine">
<?php comments_template('', true); ?>
</section>
  <section class="ohnav">
  <div class="alignleft">
               <?php if (!is_attachment()) {previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'krakatau' ) . '</span> %title' );} else {previous_image_link(array( 64, 64 ));}; ?>
  </div>
  <div class="alignright">
               <?php if (!is_attachment()) {next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'krakatau' ) . '</span>' );} else { next_image_link(array( 64, 64 ));}; ?>
  </div>
  <div class="clearfix"></div>
  </section>
              <?php get_template_part( 'footer', 'content' ); ?>
  </section>
              <?php get_footer(); ?>