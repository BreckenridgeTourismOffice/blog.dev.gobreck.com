<?php 
    get_header(); 
    $cb_theme_style = ot_get_option('cb_theme_style', 'cb_boxed');
?>
	<div class="cb-404-header<?php if ($cb_theme_style == 'cb_boxed') echo ' wrap'; ?>">
           <h1 id="cb-cat-title"><?php _e("Oops! The page you were looking for was not found", "cubell"); ?></h1>
    </div>
    
	<div id="cb-content" class="wrap clearfix">
	    
         <div id="main" class="cb-main clearfix" role="main">
	
			<article id="post-not-found" class="hentry clearfix">
	      	              
				<section class="entry-content">			
					
	                <h2><?php _e("Use the navigation above, or the search bar below, to get what you're looking for!", "cubell"); ?></h2>
		
				</section> <!-- end article section -->
	
				<section class="search">
	
				    <p><?php get_search_form(); ?></p>
	
				</section> <!-- end search section -->
				
				<img src="http://blog.gobreck.com/wp-content/uploads/2014/06/Town-BobWinsett-750x499.jpg"/>
					
			</article> <!-- end article -->
	
		</div> <!-- end #main -->
		
	</div> <!-- end #cb-content -->
    
<?php get_footer(); ?>
