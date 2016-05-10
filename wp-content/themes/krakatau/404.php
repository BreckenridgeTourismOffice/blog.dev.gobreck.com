       <?php get_header(); ?>
       <?php wp_head(); ?>
</head>
       <?php get_template_part( 'header', 'content' ); ?>
<div class="row">
<div class="two">
		<h2>
       <?php _e('404 Error: Not found', 'krakatau'); ?>
	   </h2>
</div>
<div class="four">
       <p>
       <?php _e('The page you trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for', 'krakatau'); ?>
	   </p>
</div>
<div class="six">
       <?php get_search_form(); ?>
</div>						
       <?php get_template_part( 'footer', 'content' ); ?>	
       <?php get_footer(); ?>