<?php
/* =================================================================
 Hey.. realy simple functions? 
 This my style. You can see i just load, register, add, filter, 
 actions and require. But if you remove one of them you will break 
 everthing functions on your krakatau theme.
 == Question ==
 Why you do like this amdhas?
 Because this way made me put a simple code, i like simple.
===================================================================== */
?>
<?php
/* =============================================================
 Lets begin to set up
================================================================ */
function krakatau_setup(){
load_theme_textdomain('krakatau', get_template_directory() . '/languages' );
register_nav_menu( 'navi', __( 'Navigation', 'krakatau' ) );
add_theme_support( 'custom-background'); 
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
add_editor_style();
                  }
/* ====================================================
 Lets begin to filter
======================================================= */
add_filter('excerpt_more', 'krakatau_excerpt_more');
add_filter('excerpt_length', 'krakatau_excerpt_length');
add_filter('single_template', 'krakatau_get_post_template');
add_filter('the_title', 'krakatau_takberjudul');
add_filter( 'wp_title', 'krakatau_filter_title' );
/* ===============================================
 Lets begin to action
================================================== */
add_action('the_content', 'krakatau_inline');
add_action('widgets_init', 'krakatau_widgets_init');
add_action('after_setup_theme', 'krakatau_setup' );
add_action('wp_head', 'krakatau_google_verifications');
add_action('wp_head', 'krakatau_bing_verifications');
add_action('wp_head', 'krakatau_google_plus');
add_action('admin_menu', 'krakatau_pt_add_custom_box');
add_action('admin_init', 'krakatau_register_settings'); 
add_action('admin_menu', 'krakatau_admin_add_page');
add_action('admin_menu', 'krakatau_add_meta_box');
add_action('admin_head', 'krakatau_set_admin_head');
add_action( 'admin_print_styles-appearance_page_krakatau', 'krakatau_admin_enqueue_scripts' );
add_action('wp_enqueue_scripts', 'krakatau_enqueue_comment_reply');
add_action('wp_enqueue_scripts', 'krakatau_cycle_enqueue_scripts');
add_action('wp_enqueue_scripts', 'krakatau_enqueue_scripts');
add_action('edit_post','krakatau_save_postdata');
add_action('save_post', 'krakatau_pt_save_postdata', 1, 2); 
add_action('save_post','krakatau_save_postdata');
add_action('publish_page','krakatau_save_postdata');
add_action('publish_post','krakatau_save_postdata');
/* ========================================================
 Lets begin to require
============================================================ */
require( get_template_directory() . '/includes/krakatau-setings.php' );
require( get_template_directory() . '/includes/js/jscript.php' );
require( get_template_directory() . '/includes/widgets/widget-ads.php' );
require( get_template_directory() . '/includes/widgets/widget-socialmedia.php' );
require( get_template_directory() . '/options/theme-functions.php' );
require( get_template_directory() . '/options/theme-admin.php' );
require( get_template_directory() . '/blogazine/costum-css.php' );
require( get_template_directory() . '/blogazine/register-style.php' );
require( get_template_directory() . '/blogazine/costum-template.php' );
?>