<?php
class krakatau_SocialMedia_Widget extends WP_Widget {
		function krakatau_SocialMedia_Widget() {
			$widget_ops = array('classname' => 'theme_socialmedia', 'description' => __('Show your Social Media Buttons', 'krakatau_social_lang') );
			$this->WP_Widget('theme_socialmedia', 'Krakatau widget social button', $widget_ops);
		}
	 
		function widget($args, $instance) {
			extract($args, EXTR_SKIP);
			$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
			
			$url = get_template_directory_uri() . '/images/icons';
			$options = get_option('krakatau_options');
			$networks = '';
			
			echo $before_widget;
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		?>
			<div id="socialmedia_buttons">
				
<?php 
// Twitter Button
				if ( isset($options['krakatau_social_twitter']) and $options['krakatau_social_twitter'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_twitter']) .'"><img src="'. $url .'/twitter.png" alt="twitter" /></a>';
				endif;
							
// Facebook Button
				if ( isset($options['krakatau_social_facebook']) and $options['krakatau_social_facebook'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_facebook']) .'"><img src="'. $url .'/facebook.png" alt="facebook" /></a>';
				endif;
							
// GooglePlus Button
				if ( isset($options['krakatau_social_googleplus']) and $options['krakatau_social_googleplus'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_googleplus']) .'"><img src="'. $url .'/googleplus.png" alt="googleplus" /></a>';
				endif;
						
// LinkedIn Button
				if ( isset($options['krakatau_social_linkedin']) and $options['krakatau_social_linkedin'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_linkedin']) .'"><img src="'. $url .'/linkedin.png" alt="linkedin" /></a>';
				endif;
							
// MySpace Button
				if ( isset($options['krakatau_social_myspace']) and $options['krakatau_social_myspace'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_myspace']) .'"><img src="'. $url .'/myspace.png" alt="myspace" /></a>';
				endif;
				
// Blogger Button
				if ( isset($options['krakatau_social_blogger']) and $options['krakatau_social_blogger'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_blogger']) .'"><img src="'. $url .'/blogger.png" alt="blogger" /></a>';
				endif;
						
// Wordpress Button
				if ( isset($options['krakatau_social_wordpress']) and $options['krakatau_social_wordpress'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_wordpress']) .'"><img src="'. $url .'/wordpress.png" alt="wordpress" /></a>';
				endif;
				
// Flickr Button
				if ( isset($options['krakatau_social_flickr']) and $options['krakatau_social_flickr'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_flickr']) .'"><img src="'. $url .'/flickr.png" alt="flickr" /></a>';
				endif;
							
// Last.fm Button
				if ( isset($options['krakatau_social_lastfm']) and $options['krakatau_social_lastfm'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_lastfm']) .'"><img src="'. $url .'/lastfm.png" alt="lastfm" /></a>';
				endif;
				
// Delicious Button
				if ( isset($options['krakatau_social_delicious']) and $options['krakatau_social_delicious'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_delicious']) .'"><img src="'. $url .'/delicious.png" alt="delicious" /></a>';
				endif;
				
// Digg Button
				if ( isset($options['krakatau_social_digg']) and $options['krakatau_social_digg'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_digg']) .'"><img src="'. $url .'/digg.png" alt="digg" /></a>';
				endif;
				
// Reddit Button
				if ( isset($options['krakatau_social_reddit']) and $options['krakatau_social_reddit'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_reddit']) .'"><img src="'. $url .'/reddit.png" alt="reddit" /></a>';
				endif;
				
// StumbleUpon Button
				if ( isset($options['krakatau_social_stumbleupon']) and $options['krakatau_social_stumbleupon'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_stumbleupon']) .'"><img src="'. $url .'/stumbleupon.png" alt="stumbleupon" /></a>';
				endif;
				
// RSS Button
				if ( isset($options['krakatau_social_rss']) and $options['krakatau_social_rss'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_rss']) .'"><img src="'. $url .'/rss.png" alt="rss" /></a>';
				endif;
				
// Friendfeed Button
				if ( isset($options['krakatau_social_friendfeed']) and $options['krakatau_social_friendfeed'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_friendfeed']) .'"><img src="'. $url .'/friendfeed.png" alt="friendfeed" /></a>';
				endif;
				
// Skype Button
				if ( isset($options['krakatau_social_skype']) and $options['krakatau_social_skype'] <> '' ) :
					$networks .= '<a href="'. esc_url($options['krakatau_social_skype']) .'"><img src="'. $url .'/skype.png" alt="skype" /></a>';
				endif;
				
				if($networks == '') {
					_e('Go to WP-Admin-> Appearance-> Theme Options to configure this widget', 'krakatau');
				} else {
					echo $networks;
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
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'krakatau_social_lang'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<?php
		}
	}
	register_widget('krakatau_SocialMedia_Widget');
?>