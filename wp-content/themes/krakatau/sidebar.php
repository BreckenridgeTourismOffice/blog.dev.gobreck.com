<section class="side-right">

<?php 
		$options = get_option('krakatau_options');
		if(isset($options['krakatau_search_general_intro']) and $options['krakatau_search_general_intro'] == 'true') {
                echo '<div class="searching">';                              
                               get_search_form();
                echo '</div>';
			        
			}
		?>


<?php 
		$options = get_option('krakatau_options');
		if(is_home() and isset($options['krakatau_check_general_intro']) and $options['krakatau_check_general_intro'] == 'true') {
				get_template_part( 'intro', 'index' );
			}
		?>
<?php 
		$options = get_option('krakatau_options');
		if(isset($options['krakatau_check_rotator']) and $options['krakatau_check_rotator'] == 'true') {
				get_template_part( 'rotator', 'index' );
			}
		?>
    <div class="line1">
<?php if (!dynamic_sidebar('sidebar-one-coloumn')) : ?>	
<?php endif; ?>
    </div>
    <div class="clearfix"></div>
    <div class="six">
    
<?php if (!dynamic_sidebar('coloumn-one')) : ?>
<?php endif; ?>	
    
    </div>
    <div class="six">
    
<?php if (!dynamic_sidebar('coloumn-two')) : ?>
<?php endif; ?>
    
    </div>
</section>
</div>	