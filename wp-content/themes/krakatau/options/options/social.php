<?php
function krakatau_get_social_sections() {
		$krakatau_sections = array();

		$krakatau_sections[] = array("id" => "krakatau_buttons",
					"name" => __('Social Media Buttons', 'krakatau'));
					
		return $krakatau_sections;
	}
	
	function krakatau_get_social_settings() {
		
		$krakatau_settings = array();
		
		$krakatau_settings[] = array("name" => __('Show SocialMedia Buttons in Header?', 'krakatau'),
						"desc" => __('Check this to activate the SocialMedia Buttons in Header.', 'krakatau'),
						"id" => "krakatau_socialmedia_header",
						"std" => "false",
						"type" => "checkbox",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "Twitter",
						"desc" => __('Enter the URL to your Twitter Profile here.', 'krakatau'),
						"id" => "krakatau_social_twitter",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "Facebook",
						"desc" => __('Enter the URL to your Facebook Profile here.', 'krakatau'),
						"id" => "krakatau_social_facebook",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "Google+",
						"desc" => __('Enter the URL to your Google+ profile.', 'krakatau'),
						"id" => "krakatau_social_googleplus",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "LinkedIn",
						"desc" => __('Enter the URL to your LinkedIn Profile here.', 'krakatau'),
						"id" => "krakatau_social_linkedin",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");	
						
		$krakatau_settings[] = array("name" => "MySpace",
						"desc" => __('Enter the URL to your MySpace Profile here.', 'krakatau'),
						"id" => "krakatau_social_myspace",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");	
						
		$krakatau_settings[] = array("name" => "Blogger",
						"desc" => __('Enter the URL to your Blogger Profile here.', 'krakatau'),
						"id" => "krakatau_social_blogger",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");	
						
		$krakatau_settings[] = array("name" => "Wordpress",
						"desc" => __('Enter the URL to your Wordpress.com Blog here.', 'krakatau'),
						"id" => "krakatau_social_wordpress",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "Flickr",
						"desc" => __('Enter the URL to your Flickr Profile here.', 'krakatau'),
						"id" => "krakatau_social_flickr",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "Last.fm",
						"desc" => __('Enter the URL to your Last.fm Profile here.', 'krakatau'),
						"id" => "krakatau_social_lastfm",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
		
		$krakatau_settings[] = array("name" => "Delicious",
						"desc" => __('Enter the URL to your Delicious Profile here.', 'krakatau'),
						"id" => "krakatau_social_delicious",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "Digg",
						"desc" => __('Enter the URL to your Digg Profile here.', 'krakatau'),
						"id" => "krakatau_social_digg",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "Reddit",
						"desc" => __('Enter the URL to your Reddit Profile here.', 'krakatau'),
						"id" => "krakatau_social_reddit",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "StumpleUpon",
						"desc" => __('Enter the URL to your StumpleUpon Profile here.', 'krakatau'),
						"id" => "krakatau_social_stumbleupon",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "RSS URL",
						"desc" => __('Enter your RSS URL (e.g. Feedburner Feed) here.', 'krakatau'),
						"id" => "krakatau_social_rss",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "Friendfeed",
						"desc" => __('Enter the URL to your Friendfeed Profile here.', 'krakatau'),
						"id" => "krakatau_social_friendfeed",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		$krakatau_settings[] = array("name" => "Skype",
						"desc" => __('Enter your Skype Contact here.', 'krakatau'),
						"id" => "krakatau_social_skype",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_buttons");
						
		return $krakatau_settings;
	}

?>