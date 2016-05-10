<?php
ob_start('krakatau_save');
function krakatau_save($artd_buffer) {
	global $global_styles, $single_styles;	
	$data = "\n".$single_styles.$global_styles;
    $artd_buffer = str_replace('</head>', $data."\n</head>", $artd_buffer);	 
    return $artd_buffer;
}

function krakatau_inline($data) {
	global $post, $global_styles, $single_styles;
	if(is_single() or is_page()) 
		$single_styles .= str_replace( '#postid', $post->ID, get_post_meta($post->ID, 'krakatau_ideamdhas_single', true) )."\n";
	
	return $data;
}

function krakatau_save_postdata( $post_id ) {
 	
  	if ( !wp_verify_nonce( $_POST['krakatau-ideamdhas-nonce'], basename(__FILE__) ) )
    	return $post_id;
  
  	if ( 'page' == $_POST['post_type'] ) {
    	if ( !current_user_can( 'edit_page', $post_id ) )
      		return $post_id;
  	} else {
    	if ( !current_user_can( 'edit_post', $post_id ) )
      		return $post_id;
  	}

  	
	delete_post_meta( $post_id, 'krakatau_ideamdhas_single' );
	
	
	if(trim($_POST['single-code']) != '')
		add_post_meta( $post_id, 'krakatau_ideamdhas_single', ($_POST['single-code']));
	

	return true;
}

function krakatau_set_admin_head() { ?>	
<?php
}
function krakatau_add_meta_box() {
		if( current_user_can('edit_posts') )
    		add_meta_box( 'krakatau-ideamdhas-box', __( 'Costum style blogazine', 'krakatau' ), 
                'krakatau_meta_box', 'post', 'normal' );
		if( current_user_can('edit_pages') )
    		add_meta_box( 'krakatau-ideamdhas-box', __( 'Costum style blogazine', 'krakatau' ), 
                'krakatau_meta_box', 'page', 'normal' );
	}

function krakatau_meta_box() {
	global $post;
?>
<form action="krakatau-ideamdhas_submit" method="get" accept-charset="utf-8">
	<?php
	
  	echo '<input type="hidden" name="krakatau-ideamdhas-nonce" id="krakatau-ideamdhas-nonce" value="' . 
		wp_create_nonce(basename(__FILE__) ) . '" />'; ?>

	<script type="text/javascript" charset="utf-8">
	/* <![CDATA[ */
	jQuery(document).ready(function() {
		jQuery('.help').click(function() {
			var anchor = this.href.substr( this.href.indexOf('#') );
			jQuery(this).hide();
			jQuery(anchor).toggle();
			return false;
		});
		

		jQuery('#krakatau-ideamdhas-box textarea').focus(function() {
			jQuery('#location').attr('class', this.id);
			var location = jQuery('#location').attr('class');
		});
		
		jQuery('#style-insert').click(function() {
			var location = jQuery('#location').attr('class');
			edInsertContent(location, '<' + 'style type="text/css" media="screen"'+'>'+"\n\n"+'<'+'/style'+'>');
		});
		jQuery('#script-insert').click(function() {
			var location = jQuery('#location').attr('class');
			edInsertContent(location, '<'+'script type="text/javascript" charset="utf-8"'+'>'+"\n\n"+'<'+'/script'+'>');
		});
		
		
		function edInsertContent(which, myValue) {
		    myField = document.getElementById(which);
			//IE suppart
			if (document.selection) {
				myField.focus();
				sel = document.selection.createRange();
				sel.text = myValue;
				myField.focus();
			}
			//MOZILLA/NETSCAPE suppart
			else if (myField.selectionStart || myField.selectionStart == '0') {
				var startPos = myField.selectionStart;
				var endPos = myField.selectionEnd;
				var scrollTop = myField.scrollTop;
				myField.value = myField.value.substring(0, startPos)
				              + myValue 
		                      + myField.value.substring(endPos, myField.value.length);
				myField.focus();
				myField.selectionStart = startPos + myValue.length;
				myField.selectionEnd = startPos + myValue.length;
				myField.scrollTop = scrollTop;
			} else {
				myField.value += myValue;
				myField.focus();
			}
		}
	});
	
	/* ]]> */
	</script>
<p><?php _e( 'You can enter an internal CSS code and javascript', 'krakatau' ); ?></p>
	<input type="hidden" name="location" id="location" />
	<input type="button" name="style-insert" class="button" value="<?php _e( 'Insert &lt;style&gt; Tag', 'krakatau' ); ?>" id="style-insert" /> 
	<input type="button" name="script-insert" class="button" value="<?php _e( 'Insert &lt;script&gt; Tag', 'krakatau' ); ?>" id="script-insert" />

<textarea style="width:100%;height:400px;min-height:100%" id="single-code" name="single-code" rows="8" cols="40"><?php echo esc_textarea( get_post_meta( $post->ID,'krakatau_ideamdhas_single', true ) ); ?></textarea>

</form>
<?php
}