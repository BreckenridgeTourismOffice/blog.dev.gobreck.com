<body <?php body_class(); ?>>
<div class="row">
<div class="heading-menu">
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
			</div><div class="clearfix"></div>
</div>

<section id="header">
		    <div id="head">
    <?php if ( get_header_image() != '' ) : ?>
            <div class="alignleft">
<h1 class="site-title"><span><a href="<?php echo home_url( '/' ); ?>"><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo('description'); ?>" /></a></span></h1>
            </div>
    <?php endif; ?>
    <?php if ( !get_header_image() ) : ?>
            <div class="alignleft">
 <h1 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
    <p class="site-description">
    <?php bloginfo( 'description' ); ?>
	</p>
            </div>                  
    <?php endif; ?>
<div id="socialmedia_icons">
	<?php if ( isset($options['krakatau_socialmedia_header']) and $options['krakatau_socialmedia_header'] == 'true' ) { 
					get_template_part( 'header', 'social' );
				} ?>
				
</div>
			<div class="clearfix"></div>
            </div>
		
</section>
</div>