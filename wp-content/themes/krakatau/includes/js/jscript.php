<?php 
function krakatau_include_jscript() {
$options = get_option('krakatau_options');
	if(isset($options['krakatau_show_slider']) and $options['krakatau_show_slider'] == 'true') {
		switch($options['krakatau_slider_mode']) {
			case 0:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Horizontal Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'scrollHorz',
							speed: 1000,
							timeout: 8000,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});


				//]]>
				</script>";

			break;
			case 1:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Dropdown Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx:     'scrollVert',
							speed: 1000,
							timeout: 8000,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";

			break;
			case 2:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Fade Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'fade',
							speed: 'slow',
							timeout: 8000,
                                                        slideResize: 0,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";
                        break;
			case 3:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Vertical Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'slideY',
							speed: 'slow',
							timeout: 8000,
                                                        slideResize: 0,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";
                        break;
			case 4:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Vertical Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'blindX',
							speed: 'slow',
							timeout: 8000,
                                                        slideResize: 0,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";

                        break;
			case 5:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Vertical Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'blindY',
							speed: 'slow',
							timeout: 8000,
                                                        slideResize: 0,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";

                        break;
			case 6:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Vertical Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'blindZ',
							speed: 'slow',
							timeout: 8000,
                                                        slideResize: 0,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";

                        break;
			case 7:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Vertical Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'growY',
							speed: 'slow',
							timeout: 3000,
                                                        slideResize: 0,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";

                        break;
			case 8:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Vertical Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'curtainY',
							speed: 'slow',
							timeout: 3000,
                                                        slideResize: 0,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";

                        break;
			case 9:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Vertical Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'wipe',
							speed: 'slow',
							timeout: 3000,
                                                        slideResize: 0,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";

                        break;
			case 10:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Zoom Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'zoom',
							speed: 'slow',
							timeout: 8000,
                                                        slideResize: 0,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";

			break;
			default:
				$return = "<script type=\"text/javascript\">
				//<![CDATA[
					// Horizontal Slider
					jQuery(document).ready(function($) {
						$('#slideshow')
							.cycle({
							fx: 'scrollHorz',
							speed: 1000,
							timeout: 8000,
							next:   '#slide_next', 
							prev:   '#slide_prev'
						});
					});
				//]]>
				</script>";
			break;
		}
		
		/* Slide Menu
			Slide Effeckts
				show - show(500) 
				slide - slideDown(500)
				fade - show().css({opacity:0}).animate({opacity:1},500)
				diagonal - animate({width:'show',height:'show'},500)
				left - animate({width:'show'},500)
				slidefade - animate({height:'show',opacity:1})
		*/
		$return .= "<script type=\"text/javascript\">
				//<![CDATA[
					jQuery(document).ready(function($) {
						$('#navmenu ul').css({display: 'none'}); // Opera Fix
						$('#navmenu li').hover(function(){
							$(this).find('ul:first').css({visibility: 'visible',display: 'none'}).show(500).css({opacity:0}).animate({height:'show',opacity:1},400);
						},function(){
							$(this).find('ul:first').css({visibility: 'hidden'});
						});
					});
				//]]>
				</script>";
		
		echo $return;
	}
}
?>