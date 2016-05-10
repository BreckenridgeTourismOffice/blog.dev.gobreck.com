<?php
function krakatau_get_slider_sections() {
		$krakatau_sections = array();
		
		$krakatau_sections[] = array("id" => "krakatau_slider",
					"name" => __('Featured Posts Slider', 'krakatau'));
					
		return $krakatau_sections;
	}
	
	function krakatau_get_slider_settings() {
		
		$krakatau_settings = array();
						
		$krakatau_settings[] = array("name" => __('Show Post Slider?', 'krakatau'),
						"desc" => __('Check this if you want to show the Featured Post Slider.', 'krakatau'),
						"id" => "krakatau_show_slider",
						"std" => "false",
						"type" => "checkbox",
						"section" => "krakatau_slider");
						
		$krakatau_settings[] = array("name" => __('Title', 'krakatau'),
						"desc" => __('Enter here your title for your featured post, for example featured post or recent post.', 'krakatau'),
						"id" => "krakatau_slider_title",
						"std" => "Content Slider",
						"type" => "text",
						"section" => "krakatau_slider");
						
		$krakatau_settings[] = array("name" =>  __('Slider Effect', 'krakatau'),
						"desc" => "",
						"id" => "krakatau_slider_mode",
						"std" => "0",
						"type" => "select",
						'choices' => array(
									0 => __('Horizontal Slider', 'krakatau'),
									1 => __('vertical Slider', 'krakatau'),
									2 => __('Fade Slider', 'krakatau'),
                                                                        3 => __('slideY', 'krakatau'),
                                                                        4 => __('blindX', 'krakatau'),
                                                                        5 => __('blindY', 'krakatau'),
                                                                        6 => __('blindZ', 'krakatau'),
                                                                        7 => __('growing', 'krakatau'),
                                                                        8 => __('curtain', 'krakatau'),
                                                                        9 => __('cover', 'krakatau'),
                                                                        10 => __('Zoom Slider', 'krakatau')),
						"section" => "krakatau_slider"
						);

		$krakatau_settings[] = array("name" => __('Slider Content', 'krakatau'),
						"desc" => "",
						"id" => "krakatau_slider_content",
						"std" => "0",
						"type" => "radio",
						'choices' => array(
									0 => __('Show latest posts', 'krakatau'),
									1 => __('Show latest posts from category "featured"', 'krakatau'),
									2 => __('Show latest posts with post_meta_key "featured"', 'krakatau'),
									3 => __('Show latest posts from custom category(enter ID below)', 'krakatau')),
						"section" => "krakatau_slider"
						);
						
		$krakatau_settings[] = array("name" => __('category ID', 'krakatau'),
						"desc" => __("Please enter the category ID you'd like to include in the slideshow.(You have to tick the last option above)", 'krakatau'),
						"id" => "krakatau_slider_cat",
						"std" => "1",
						"type" => "text",
						"section" => "krakatau_slider");

		$krakatau_settings[] = array("name" => __('Number of Posts', 'krakatau'),
						"desc" => __('Enter the number how much posts should be displayed in the post slider.', 'krakatau'),
						"id" => "krakatau_slider_limit",
						"std" => "5",
						"type" => "text",
						"section" => "krakatau_slider");
		
		return $krakatau_settings;
	}

?>