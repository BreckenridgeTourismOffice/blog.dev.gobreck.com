<?php
function krakatau_get_settings_page_tabs() {
		$tabs = array(
			'general' => __('General', 'krakatau'),
			'slider' => __('Sliding effect', 'krakatau'),
			'social' => __('Social buttons', 'krakatau'),
			'ads' => __('Widget ads', 'krakatau'),
                        'seo' => __('SEO', 'krakatau')
		);
		return $tabs;
	}
	
	function krakatau_get_sections($tab) {
switch ( $tab ) :
			case 'general' :
                        require_once dirname( __FILE__ ) . '/options/general.php';                             			
				$krakatau_sections = krakatau_get_general_sections();
			break;
			case 'slider' :
                                require_once dirname( __FILE__ ) . '/options/sliding-efect.php';
				$krakatau_sections = krakatau_get_slider_sections();
			break;
			case 'social' :
				require_once dirname( __FILE__ ) . '/options/social.php';
				$krakatau_sections = krakatau_get_social_sections();
			break;
			case 'ads' :
				require_once dirname( __FILE__ ) . '/options/ads.php';
				$krakatau_sections = krakatau_get_ads_sections();
			break;
                        case 'seo' :
				require_once dirname( __FILE__ ) . '/options/seo.php';
				$krakatau_sections = krakatau_get_seo_sections();
			break;

			default :
				require_once dirname( __FILE__ ) . '/options/general.php';
				$krakatau_sections = krakatau_get_general_sections();
			break;
		endswitch;
		
		return $krakatau_sections;
	}
	
	function krakatau_get_settings($tab = 'general') {
switch ( $tab ) :
			case 'general' :
				require_once dirname( __FILE__ ) . '/options/general.php'; 
				$krakatau_settings = krakatau_get_general_settings();
			break;
			case 'slider' :
				require_once dirname( __FILE__ ) . '/options/sliding-efect.php';
				$krakatau_settings = krakatau_get_slider_settings();
			break;
			case 'social' :
				require_once dirname( __FILE__ ) . '/options/social.php';
				$krakatau_settings = krakatau_get_social_settings();
			break;
			case 'ads' :
				require_once dirname( __FILE__ ) . '/options/ads.php';
				$krakatau_settings = krakatau_get_ads_settings();
			break;
                        case 'seo' :
				require_once dirname( __FILE__ ) . '/options/seo.php';
				$krakatau_settings = krakatau_get_seo_settings();
			break;
			default :
				require_once dirname( __FILE__ ) . '/options/general.php';
				$krakatau_settings = krakatau_get_general_settings();
			break;
		 endswitch;
		
		return $krakatau_settings;
	}
function krakatau_google_verifications() {
              $options = get_option('krakatau_options');
              if ( isset($options['krakatau_google_meta']) and $options['krakatau_google_meta'] <> '' ) {
	      echo '<meta name="google-site-verification" content="' . $options['krakatau_google_meta'] . '" />' . "\n";
}
	}
function krakatau_bing_verifications() {
              $options = get_option('krakatau_options');
              if ( isset($options['krakatau_bing_meta']) and $options['krakatau_bing_meta'] <> '' ) {
	      echo '<meta name="msvalidate.01" content="' . $options['krakatau_bing_meta'] . '" />' . "\n";
}
	}
function krakatau_google_plus() {
               $options = get_option('krakatau_options');
               if ( isset($options['krakatau_googleplus_meta']) and $options['krakatau_googleplus_meta'] <> '' ) {
	       echo '<meta name="profile" content="' . $options['krakatau_googleplus_meta'] . '" />' . "\n";
}
	}
	function krakatau_admin_enqueue_scripts( $hook_suffix ) { 
		if ( isset($_GET['page']) and $_GET['page'] == 'krakatau' ) :
		  wp_enqueue_style('krakatau_options_style', get_template_directory_uri() .'/options/admin-style.css');
		  wp_enqueue_script('thickbox');
                  wp_enqueue_script('media-upload');
                  wp_enqueue_script('jquery');		
		  wp_enqueue_script('krakatau_theme_options', get_template_directory_uri() .'/options/jquery-image-upload.js', array('jquery','media-upload','thickbox'));
		  wp_localize_script('image_upload', 'localizing_upload_js', array(
				'use_this_image' => __('Use this Image', 'krakatau')
			));
		  wp_enqueue_style('thickbox');
		endif;
	}
?>