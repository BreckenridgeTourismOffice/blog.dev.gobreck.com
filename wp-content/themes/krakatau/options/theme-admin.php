<?php
function krakatau_admin_add_page() {
	add_theme_page(__('Theme Options', 'krakatau'), __('Theme Options', 'krakatau'), 'edit_theme_options', 'krakatau', 'krakatau_options_page');
}
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" )
	wp_redirect( 'themes.php?page=krakatau' );
function krakatau_options_page() { 
	$options = get_option('krakatau_options');
?>
<div class="admin_wrap">
		<div id="admin_heading">
		<div class="icon32" id="icon-options-general"></div>            
            <h2><?php _e('Welcome to Krakatau WordPress Theme!', 'krakatau'); ?></h2>
		</div>
<div class="clear"></div>
                    <div class="row">
                    <div class="thre">
                    <div class="wp-badge">
<?php _e('Amdhas Chromatic on WordPress', 'krakatau'); ?>
                                             </div>
                                                           </div>
                    <div class="six">
<p class="gede"><?php _e('Here you are, i have several options for krakatau WordPress Theme. You can configure like sliding effect, SEO, meta tag for google, and much more. Would you like make your site different? oh, yes..you can change your layout every single post with css embed like magazine style [<a href="http://amdhas.tk/">I call blogazine</a>]. Now lets do it several settings for your home page. Enjoy...', 'krakatau'); ?></p>
                                             </div>
<div class="thre">
<p><img class="garis" src="<?php echo get_template_directory_uri(); ?>/options/images/hendro.jpg"/></p>
</div>
               </div>

		<?php if ( isset( $_GET['settings-updated'] ) ) : ?>
			<div class="updated"><p><?php _e('Theme settings updated successfully.', 'krakatau'); ?></p></div>
		<?php endif; ?>
		<div class="clear"></div>
			
<?php krakatau_options_page_tabs(); ?>
<form class="form" action="options.php" method="post">
				
					<div class="settings">
						<?php settings_fields('krakatau_options'); ?>
						<?php do_settings_sections('krakatau'); ?>
					</div>
				
				<?php if ( isset ( $_GET['tab'] ) ) : $tab = $_GET['tab']; else: $tab = 'general'; endif; ?>
<input name="krakatau_options[validation-submit]" type="hidden" value="<?php echo $tab ?>" />
<p><input name="Submit" class="button-primary" type="submit" value="<?php esc_attr_e('Save Changes', 'krakatau'); ?>" /></p>
			</form>
			
			<div class="options_sidebar">
				
				<dl>
<dt>
<h4><?php _e('More about Hendro Prayitno', 'krakatau'); ?></h4>
</dt>
<dd>
			<ul>

<li><a href="http://amdhas.tk/" target="_blank"><?php _e('Visit amdhas.tk', 'krakatau'); ?></a></li>
<li><a href="http://profiles.wordpress.org/amdhas" target="_blank"><?php _e('Browse all of my Themes', 'krakatau'); ?></a></li>
			</ul>
</dd>
				</dl>
				
				<dl>
<dt>
<h4><?php _e('Subscribe', 'krakatau'); ?></h4>
</dt>
<dd>
<p><?php _e('If you like my theme for more featured you can hire me or follow me.', 'krakatau'); ?></p>

<ul class="subscribe">
<li><img src="<?php echo get_template_directory_uri(); ?>/options/images/rss.png"/><a href="http://amdhas.tk/feed" target="_blank"><?php _e('RSS Feed', 'krakatau'); ?></a></li>
<li><img src="<?php echo get_template_directory_uri(); ?>/options/images/email.png"/><a href="mailto:hasilent00@gmail.com" target="_blank"><?php _e('Send Email', 'krakatau'); ?></a></li>
<li><img src="<?php echo get_template_directory_uri(); ?>/options/images/twitter.png"/><a href="http://twitter.com/amdhas" target="_blank"><?php _e('Follow me on Twitter', 'krakatau'); ?></a></li>
<li><img src="<?php echo get_template_directory_uri(); ?>/options/images/facebook.png"/><a href="http://id-id.facebook.com/people/Amdhas-Chromatic/100000572076394" target="_blank"><?php _e('Become Amdhas friend', 'krakatau'); ?></a></li>
		</ul>
					</dd>
				</dl>
			</div>
			<div class="clear"></div>
	</div>
<?php
}

function krakatau_options_page_tabs( $current = 'general' ) {
if ( isset( $_GET['tab'] ) ) :
		$current = $_GET['tab'];
	else:
		$current = 'general';
	endif;
$tabs = krakatau_get_settings_page_tabs();
$links = array();
	foreach( $tabs as $tab => $name ) :
		if ( $tab == $current ) :
			$links[] = "<a class=\"nav-tab nav-tab-active\" href=\"?page=krakatau&tab=$tab\">$name</a>";
		else :
			$links[] = "<a class=\"nav-tab\" href=\"?page=krakatau&tab=$tab\">$name</a>";
		endif;
	endforeach;
	echo '<h2 id="tabs_navi" class="nav-tab-wrapper">';
	foreach ( $links as $link ) : echo $link; endforeach;
	echo '</h2>';
}
function krakatau_display_setting( $setting = array() ) {
	$options = get_option('krakatau_options');
	
	if ( ! isset( $options[$setting['id']] ) )
		$options[$setting['id']] = $setting['std']; 

	switch ( $setting['type'] ) {
	
		case 'text':
			echo "<input id='".$setting['id']."' name='krakatau_options[".$setting['id']."]' type='text' value='". esc_attr($options[$setting['id']]) ."' />";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
		
		case 'textarea':
			echo "<textarea id='".$setting['id']."' name='krakatau_options[".$setting['id']."]' rows='5'>" . esc_attr($options[$setting['id']]) . "</textarea>";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
			
		case 'checkbox':
			echo "<input id='".$setting['id']."' name='krakatau_options[".$setting['id']."]' type='checkbox' value='true'";
			checked( $options[$setting['id']], 'true' );
			echo ' /><label> '.$setting['desc'].'</label>';
		break;
		
		case 'select':
			echo "<select id='".$setting['id']."' name='krakatau_options[".$setting['id']."]'>";
		 
			foreach ( $setting['choices'] as $value => $label ) {
				echo "<option ".selected( $options[$setting['id']], $value )." value='" . $value . "' >" . $label . "</option>";
			}
		 
			echo "</select>";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
		
		case 'radio':
			foreach ( $setting['choices'] as $value => $label ) {
				echo "<input id='".$setting['id']."'";
				checked( $options[$setting['id']], $value );
				echo " type='radio' name='krakatau_options[".$setting['id']."]' value='" . $value . "'/> " . $label . "<br/>";
			}
		break;

		case 'image':
			echo "<p class='image-bg'><img id='".$setting['id']."img' src='" . esc_attr($options[$setting['id']]) . "' /></p>";
			echo '<input class="upload-image-field" id="'.$setting['id'].'" name="krakatau_options['.$setting['id'].']" type="text" value="'. esc_attr($options[$setting['id']]) .'" />';
			echo '<input class="tombol-amdhas-chromatic button-secondary" type="button" value="'. __("Upload Image", "krakatau") .'" />';
			echo '	<label>'.$setting['desc'].'</label>';
			
		break;
								
		default:
			echo "<input id='".$setting['id']."' name='krakatau_options[".$setting['id']."]' size='40' type='text' value='". esc_attr($options[$setting['id']]) ."' />";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
	}
}
function krakatau_register_settings() {
if ( isset ( $_GET['tab'] ) ) :
		$tab = $_GET['tab'];
	else:
		$tab = 'general';
	endif;
	
	$krakatau_sections = krakatau_get_sections($tab);	
	$krakatau_settings = krakatau_get_settings($tab);
	
	register_setting( 'krakatau_options', 'krakatau_options', 'krakatau_options_validate' );
	
	foreach ($krakatau_sections as $section) {
		add_settings_section($section['id'], $section['name'], 'krakatau_section_text', 'krakatau');
	}
	
	foreach ($krakatau_settings as $setting) {
		add_settings_field($setting['id'], $setting['name'], 'krakatau_display_setting', 'krakatau', $setting['section'], $setting);
	}
}
function krakatau_options_validate($input) {
	$options = get_option('krakatau_options');

	if ( isset ( $input['validation-submit'] ) ) :
		$tab = $input['validation-submit'];
	else:
		$tab = 'general';
	endif;
	$validate_settings = krakatau_get_settings($tab);

	foreach ($validate_settings as $setting) {
		
		if ($setting['type'] == 'checkbox' and !isset($input[$setting['id']]) ) 
		{
			$options[$setting['id']] = 'false'; 
		}
		elseif ($setting['type'] == 'radio' and !isset($input[$setting['id']]) ) 
		{
			$options[$setting['id']] = 1; 
		}
		elseif ($setting['type'] == 'textarea')
		{
			$options[$setting['id']] = wp_kses_post(trim($input[$setting['id']]));
		}
		else 
		{
			$options[$setting['id']] = esc_attr(trim($input[$setting['id']]));
		}
	}
	return $options;
}
function krakatau_section_text() {}
?>