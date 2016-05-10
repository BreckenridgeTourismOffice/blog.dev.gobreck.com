<?php	
	function krakatau_get_ads_sections() {
		$krakatau_sections = array();
					
		$krakatau_sections[] = array("id" => "krakatau_ads_banner",
					"name" => __('Image rotator or your ads here', 'krakatau'));
					
		return $krakatau_sections;
	}
	
	function krakatau_get_ads_settings() {

		$default_img = get_template_directory_uri() . '/images/amdhas.jpg';
		$krakatau_settings = array();

	        $krakatau_settings[] = array("name" => __('Rotator check', 'krakatau') . '',
						"desc" => __('Uncheck here if you want to remove rotator image or your ads, please make sure you activated widget ads rotator on <b>appearance -> widgets -> Krakatau ads and image rotator</b> and put the widget on sidebar-rotator', 'krakatau'),
						"id" => "krakatau_check_rotator",
						"std" => "true",
						"type" => "checkbox",
						"section" => "krakatau_ads_banner");	
		
		
		$krakatau_settings[] = array("name" => __('Rotate image or your ads?', 'krakatau'),
						"desc" => __('Check this to randomly rotate the image.', 'krakatau'),
						"id" => "krakatau_ads_rotate",
						"std" => "false",
						"type" => "checkbox",
						"section" => "krakatau_ads_banner");

		$krakatau_settings[] = array("name" => __(' Image URL', 'krakatau') . ' #1',
						"desc" => __('Enter the image URL.', 'krakatau'),
						"id" => "krakatau_ads_image_1",
						"std" => $default_img,
						"type" => "image",
						"section" => "krakatau_ads_banner");
							
		$krakatau_settings[] = array("name" =>  __('Link for your image', 'krakatau') . ' #1',
						"desc" => __('Enter the URL where this ads or image points to.', 'krakatau'),
						"id" => "krakatau_ads_url_1",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_ads_banner");

		$krakatau_settings[] = array("name" => __(' Image URL', 'krakatau') . ' #2',
						"desc" => __('Enter the image URL.', 'krakatau'),
						"id" => "krakatau_ads_image_2",
						"std" => $default_img,
						"type" => "image",
						"section" => "krakatau_ads_banner");
							
		$krakatau_settings[] = array("name" => __('Link for your image', 'krakatau') . ' #2',
						"desc" => __('Enter the URL where this ads or image points to.', 'krakatau'),
						"id" => "krakatau_ads_url_2",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_ads_banner");

		$krakatau_settings[] = array("name" => __(' Image URL', 'krakatau') . ' #3',
						"desc" => __('Enter the image URL.', 'krakatau'),
						"id" => "krakatau_ads_image_3",
						"std" => $default_img,
						"type" => "image",
						"section" => "krakatau_ads_banner");
							
		$krakatau_settings[] = array("name" => __('Link for your image', 'krakatau') . ' #3',
						"desc" => __('Enter the URL where this ads or image points to.', 'krakatau'),
						"id" => "krakatau_ads_url_3",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_ads_banner");

		$krakatau_settings[] = array("name" => __(' Image URL', 'krakatau') . ' #4',
						"desc" => __('Enter the image URL.', 'krakatau'),
						"id" => "krakatau_ads_image_4",
						"std" => $default_img,
						"type" => "image",
						"section" => "krakatau_ads_banner");
							
		$krakatau_settings[] = array("name" => __('Link for your image', 'krakatau') . ' #4',
						"desc" => __('Enter the URL where this ads or image points to.', 'krakatau'),
						"id" => "krakatau_ads_url_4",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_ads_banner");

		$krakatau_settings[] = array("name" => __(' Image URL', 'krakatau') . ' #5',
						"desc" => __('Enter the image URL.', 'krakatau'),
						"id" => "krakatau_ads_image_5",
						"std" => "$default_img",
						"type" => "image",
						"section" => "krakatau_ads_banner");
							
		$krakatau_settings[] = array("name" => __('Link for your image', 'krakatau') . ' #5',
						"desc" => __('Enter the URL where this ads or image points to.', 'krakatau'),
						"id" => "krakatau_ads_url_5",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_ads_banner");

		$krakatau_settings[] = array("name" => __(' Image URL', 'krakatau') . ' #6',
						"desc" => __('Enter the image URL.', 'krakatau'),
						"id" => "krakatau_ads_image_6",
						"std" => "$default_img",
						"type" => "image",
						"section" => "krakatau_ads_banner");
							
		$krakatau_settings[] = array("name" => __('Link for your image', 'krakatau') . ' #6',
						"desc" => __('Enter the URL where this ads or image points to.', 'krakatau'),
						"id" => "krakatau_ads_url_6",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_ads_banner");
						
		$krakatau_settings[] = array("name" => __(' Image URL', 'krakatau') . ' #7',
						"desc" => __('Enter the image URL.', 'krakatau'),
						"id" => "krakatau_ads_image_7",
						"std" => "$default_img",
						"type" => "image",
						"section" => "krakatau_ads_banner");
							
		$krakatau_settings[] = array("name" => __('Link for your image', 'krakatau') . ' #7',
						"desc" => __('Enter the URL where this ads or image points to.', 'krakatau'),
						"id" => "krakatau_ads_url_7",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_ads_banner");

		$krakatau_settings[] = array("name" => __(' Image URL', 'krakatau') . ' #8',
						"desc" => __('Enter the image URL.', 'krakatau'),
						"id" => "krakatau_ads_image_8",
						"std" => "$default_img",
						"type" => "image",
						"section" => "krakatau_ads_banner");
							
		$krakatau_settings[] = array("name" => __('Link for your image', 'krakatau') . ' #8',
						"desc" => __('Enter the URL where this ads or image points to.', 'krakatau'),
						"id" => "krakatau_ads_url_8",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_ads_banner");

            $krakatau_settings[] = array("name" => __(' Image URL', 'krakatau') . ' #9',
						"desc" => __('Enter the image URL.', 'krakatau'),
						"id" => "krakatau_ads_image_9",
						"std" => "$default_img",
						"type" => "image",
						"section" => "krakatau_ads_banner");

	      $krakatau_settings[] = array("name" => __('Link for your image', 'krakatau') . ' #9',
						"desc" => __('Enter the URL where this ads or image points to.', 'krakatau'),
						"id" => "krakatau_ads_url_9",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_ads_banner");

		return $krakatau_settings;
	}

?>