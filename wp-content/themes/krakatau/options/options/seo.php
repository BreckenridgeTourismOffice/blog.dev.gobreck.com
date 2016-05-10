<?php
function krakatau_get_seo_sections() {
		$krakatau_sections = array();

		$krakatau_sections[] = array("id" => "krakatau_seo",
					"name" => __('Setting seo meta', 'krakatau'));
					
		return $krakatau_sections;
	}
	
	function krakatau_get_seo_settings() {
		
		$krakatau_settings = array();
		
		
						
		$krakatau_settings[] = array("name" =>__('Google Verification code', 'krakatau'),
						"desc" => __('Enter your google verifications code here.', 'krakatau'),
						"id" => "krakatau_google_meta",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_seo");
						
		$krakatau_settings[] = array("name" => __('Bing Verification code', 'krakatau'),
						"desc" => __('Enter your Bing verifications code here.', 'krakatau'),
						"id" => "krakatau_bing_meta",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_seo");

		$krakatau_settings[] = array("name" => __('Google plus ID', 'krakatau'),
						"desc" => __('Enter your gogle+ profile code here.', 'krakatau'),
						"id" => "krakatau_googleplus_meta",
						"std" => "",
						"type" => "text",
						"section" => "krakatau_seo");
										
		return $krakatau_settings;
	}

?>