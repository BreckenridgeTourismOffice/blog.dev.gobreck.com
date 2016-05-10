<?php
	function krakatau_get_general_sections() {
		$krakatau_sections = array();
		
		$krakatau_sections[] = array("id" => "krakatau_general_layout",
					"name" => __('Layout Settings', 'krakatau'));
					return $krakatau_sections;

	}
	
	function krakatau_get_general_settings() {

		$krakatau_settings = array();
	
		
		$krakatau_settings[] = array("name" =>  __('This option for your logo on the top, if you want to remove krakatau default header go to <b>appearance -> header</b> and remove default header image', 'krakatau'),
						"desc" => __('</br>Upload Image for your site logo or you can just paste your image URL', 'krakatau'),
						"id" => "krakatau_general_logo",
						"std" => "",
						"type" => "image",
						"section" => "krakatau_general_layout");

                $krakatau_settings[] = array("name" => __('Search Form', 'krakatau') . '',
						"desc" => __('uncheck here if you like to remove search form', 'krakatau'),
						"id" => "krakatau_search_general_intro",
						"std" => "true",
						"type" => "checkbox",
						"section" => "krakatau_general_layout");

                $krakatau_settings[] = array("name" => __('Intro check', 'krakatau') . '',
						"desc" => __('uncheck here if you like to remove intro from home page', 'krakatau'),
						"id" => "krakatau_check_general_intro",
						"std" => "true",
						"type" => "checkbox",
						"section" => "krakatau_general_layout");
	
		$krakatau_settings[] = array("name" => __('Author Profile', 'krakatau') . '',
						"desc" => __('uncheck here if you like to remove Your profile description every page', 'krakatau'),
						"id" => "krakatau_author_general_intro",
						"std" => "true",
						"type" => "checkbox",
						"section" => "krakatau_general_layout");

                $krakatau_settings[] = array("name" => __('Put your site description, welcome message or everything that describe your site', 'krakatau') . '',
						"desc" => __('Type your text for message, description you can add html markup like &lt;blockquote&gt;, &lt;q&gt;, &lt;img src="" alt=""/&gt;, &lt;a href=""&gt;&lt;/a&gt;', 'krakatau'),
						"id" => "krakatau_general_intro",
						"std" => "",
						"type" => "textarea",
						"section" => "krakatau_general_layout");
				
		
return $krakatau_settings;
	}

?>