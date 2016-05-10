<?php
class krakatau_Ads_Widget extends WP_Widget {
function krakatau_Ads_Widget() {
			$widget_ops = array('classname' => 'krakatau_ads', 'description' => __('Show your image rotator or your Ads', 'krakatau') );
			$this->WP_Widget('krakatau_ads', 'Krakatau ads and image rotator', $widget_ops);
		}
		function widget($args, $instance) {
			extract($args, EXTR_SKIP);
			$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
			
			$pic = array();
			$url = array();
			$nr = range(1,9); 
			$i = 0;
			$n = 0;
			$options = get_option('krakatau_options');
			if ( isset($options['krakatau_ads_rotate']) and $options['krakatau_ads_rotate'] == 'true' ) {
				shuffle($nr);
			}
			foreach ($nr as $number) {	
				if( isset($options['krakatau_ads_image_'.$number]) and $options['krakatau_ads_image_'.$number] != '' ) {
					$i++;
					$pic[$i] = esc_url($options['krakatau_ads_image_'.$number]);
					$url[$i] = esc_url( $options['krakatau_ads_url_'.$number]);
				}
			}
			
echo $before_widget;
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		?>
			<div id="ads">
				<?php
				if(count($pic) > 0) {
					foreach($pic as $key) { 
						$n++;
				?>
					<a href="<?php echo $url[$n]; ?>"><img src="<?php echo $pic[$n]; ?>" alt="banner" /></a>
			<?php 
					} 
				}
				else {
					_e('<blockquote>This your area image rotator or your ads. You can put your image here for example thumbnail or your product, and also you can change every time you want. To activate this rotator</blockquote>Go to WP-Admin-> Appearance-> Theme Options to configure this widget', 'krakatau');
				}
			?>
			</div>
		<?php
			echo $after_widget;
		}
	 
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = esc_attr($new_instance['title']);
			return $instance;
		}
		function form($instance) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
			$title = esc_attr($instance['title']);
		?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'krakatau'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<?php
		}
	}
	register_widget('krakatau_Ads_Widget');
?>