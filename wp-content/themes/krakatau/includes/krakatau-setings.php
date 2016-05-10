<?php
    if ( ! isset( $content_width ) )
	$content_width = 584;
function krakatau_enqueue_scripts() {
            wp_enqueue_style('krakatau_style', get_stylesheet_uri(stylesheet_url), array(), '0.1.2');
        
}
function krakatau_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option('thread_comments')) { 
            wp_enqueue_script('comment-reply'); 
        }
    }
function krakatau_cycle_enqueue_scripts() {
    if ( is_home()) { 
            wp_enqueue_script('jquery');
            wp_enqueue_script('krakatau_jquery-cycle', get_template_directory_uri() .'/includes/js/jquery.cycle.all.min.js', array('jquery'));
add_action('wp_head', 'krakatau_include_jscript');
        }
    }
function krakatau_widgets_init() {
register_sidebar(array(
'name' => __('sidebar-rotator','krakatau'),
'description' => __('sidebar for rotator and ads', 'krakatau'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('sidebar-one-coloumn','krakatau'),
'description' => __('sidebar one column1', 'krakatau'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));

register_sidebar(array(
'name' => __('coloumn-one','krakatau'),
'description' => __('sidebar right column1', 'krakatau'),
'before_widget' => '<div class="coloumn-one">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('coloumn-two','krakatau'),
'description' => __('sidebar right column2', 'krakatau'),
'before_widget' => '<div class="coloumn-two">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('footer left','krakatau'),
'description' => __('footer left area', 'krakatau'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('footer midlle','krakatau'),
'description' => __('footer midle area', 'krakatau'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('footer right','krakatau'),
'description' => __('fotter right area', 'krakatau'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));		
} 
function krakatau_takberjudul($title) {
    if ($title == '') {return 'Untitled';} else {return $title;}}
function krakatau_default_menu() {
	echo '<ul id="navmenu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}
function krakatau_excerpt_length( $length ) {
	return 60;
}
function krakatau_continue_reading_link() {
	return '<span class="clear"></span><span class="read-more"><a href="'. esc_url(get_permalink()) . '">' . __( 'Read more &raquo;', 'krakatau' ) . '</a></span>';
}
function krakatau_excerpt_more( $more ) {
	return ' &hellip;' . krakatau_continue_reading_link();
}

add_theme_support( 'custom-header', array(
'default-image'	=> get_template_directory_uri() . '/images/default_header.png',
'header-text'	=> false,
'flex-width'    => true,
'width'		=> 400,
'flex-height'   => true,
'height'	=> 100,
'admin-head-callback'	=> 'krakatau_admin_header_style'));
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/default_header.png'); 
define('HEADER_IMAGE_WIDTH', 400); 
define('HEADER_IMAGE_HEIGHT', 100);
define('NO_HEADER_TEXT', true);
function krakatau_admin_header_style() {
?>
<style type="text/css">
#headimg {
	        background-repeat:no-repeat;
                border:none !important;
                width:<?php echo HEADER_IMAGE_WIDTH; ?>px;max-width:100%;
                height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;
                }
	</style>
<?php }
function krakatau_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
case 'pingback' :
case 'trackback' :
?>
<li class="post pingback">
<p><?php _e( 'Pingback:', 'krakatau' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'krakatau' ), '<span class="edit-link">', '</span>' ); ?></p>
<?php
break;
default :
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
<article id="comment-<?php comment_ID(); ?>" class="comment">
<footer class="comment-meta">
<div class="comment-author vcard">
<?php
    $avatar_size = 68;
    if ( '0' != $comment->comment_parent )
    $avatar_size = 39;
       echo get_avatar( $comment, $avatar_size );
       printf( __( '%1$s on %2$s <span class="says">said:</span>', 'krakatau' ),
       sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
       sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
       esc_url( get_comment_link( $comment->comment_ID ) ),
       get_comment_time( 'c' ),
       sprintf( __( '%1$s at %2$s', 'krakatau' ), get_comment_date(), get_comment_time() )
	)
);
?>
<?php edit_comment_link( __( 'Edit', 'krakatau' ), '<span class="edit-link">', '</span>' ); ?>
</div>
<?php if ( $comment->comment_approved == '0' ) : ?>
<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'krakatau' ); ?></em>
<br />
<?php endif; ?>
</footer>
<div class="comment-content"><?php comment_text(); ?></div>
<div class="clearfix"></div>
<div class="reply alignright">
<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'krakatau' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
</div>
<div class="clearfix"></div>
</article>
	<?php
break;
	endswitch;
}
function krakatau_filter_title( $filter_title ) {
	global $page, $paged;
	$filter_title = str_replace( '&raquo;', '', $filter_title );
	$site_description = get_bloginfo( 'description', 'display' );
	$separator = '#124';
	if ( is_singular() ) {
		if ( $paged >= 2 || $page >= 2 )
			$filter_title .=  ', ' . __( 'Page', 'krakatau' ) . ' ' . max( $paged, $page );
	} else {
		if( ! is_home() )
			$filter_title .= ' &' . $separator . '; ';
		$filter_title .= get_bloginfo( 'name' );
		if ( $paged >= 2 || $page >= 2 )
			$filter_title .=  ', ' . __( 'Page', 'krakatau' ) . ' ' . max( $paged, $page );
	}
	if ( is_home() && $site_description )
		$filter_title .= ' &' . $separator . '; ' . $site_description;
	return $filter_title;
}

function krakatau_content_nav() {
	global $wp_query;
	$paged			=	( get_query_var( 'paged' ) ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link	=	get_pagenum_link();
	$url_parts		=	parse_url( $pagenum_link );
	$format			=	( get_option('permalink_structure') ) ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';
	
	if ( isset($url_parts['query']) ) {
		$pagenum_link	=	"{$url_parts['scheme']}://{$url_parts['host']}{$url_parts['path']}%_%?{$url_parts['query']}";
	} else {
		$pagenum_link	.=	'%_%';
	}
	
	$links	=	paginate_links( array(
		'base'		=>	$pagenum_link,
		'format'	=>	$format,
		'total'		=>	$wp_query->max_num_pages,
		'current'	=>	$paged,
		'mid_size'	=>	2,
		'type'		=>	'list'
	) );
	
	if ( $links ) {
		echo "<div class=\"nav-page\">{$links}</div>";
	}
}

function krakatau_breadcrumb() {
    $amdhas = '<span>&#8250;</span>';
    $name = 'Home'; //'Home' link
    $currentBefore = '<span class="current">';
    $currentAfter = '</span>';
    echo '<div class="breadcrumb">';
    global $post;
    $home = home_url();
    echo '<a href="' . $home . '">' . $name . '</a> ';
    if (!is_home())
        echo $amdhas . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $amdhas . ' '));
        echo $currentBefore . 'Archive by category &#39;';
        single_cat_title();
        echo '&#39;' . $currentAfter;
    } elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $amdhas . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $amdhas . ' ';
        echo $currentBefore . get_the_time('d') . $currentAfter;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $amdhas . ' ';
        echo $currentBefore . get_the_time('F') . $currentAfter;
    } elseif (is_year()) {
        echo $currentBefore . get_the_time('Y') . $currentAfter;
    } elseif (is_single()) {
        $cat = get_the_category();
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $amdhas . ' ');
        echo $currentBefore;
        the_title();
        echo $currentAfter;
    } elseif (is_page() && !$post->post_parent) {
        echo $currentBefore;
        the_title();
        echo $currentAfter;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumb_lists = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumb_lists[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumb_lists = array_reverse($breadcrumb_lists);
        foreach ($breadcrumb_lists as $crumb)
            echo $crumb . ' ' . $amdhas . ' ';
        echo $currentBefore;
        the_title();
        echo $currentAfter;
    } elseif (is_search()) {
        echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
    } elseif (is_tag()) {
        echo $currentBefore . 'Posts tagged &#39;';
        single_tag_title();
        echo '&#39;' . $currentAfter;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
    } elseif (is_404()) {
        echo $currentBefore . 'Error 404' . $currentAfter;
    }

    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo __('Page','krakatau') . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }

    echo '</div>';
}