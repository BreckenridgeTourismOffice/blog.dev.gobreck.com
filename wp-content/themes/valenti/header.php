<?php
        $cb_logo_position = ot_get_option( 'cb_logo_position', 'left' );
		$cb_sticky_onoff = ot_get_option( 'cb_sticky_nav', 'on' );
		$cb_banner = ot_get_option( 'cb_banner_selection', false );
        $cb_banner_code = ot_get_option( 'cb_banner_code', NULL );
        $cb_theme_style = ot_get_option( 'cb_theme_style', 'cb_boxed' );
        $cb_breaking_news = ot_get_option( 'cb_breaking_news', 'off' );
        $cb_nav_style = ot_get_option( 'cb_menu_style', 'cb_dark' );
        $cb_featured_image_style_override_onoff = ot_get_option( 'cb_post_style_override_onoff', 'off' );
        $cb_featured_image_style_override_style = ot_get_option( 'cb_post_style_override', 'standard' );
        $cb_favicon = ot_get_option( 'cb_favicon_url', false );
        $cb_bg_to = ot_get_option( 'cb_bg_to', 'off' );
        $cb_container_classes = NULL;
        $cb_menu_icons = ot_get_option( 'cb_main_nav_icons', 'both' );
        $cb_to_top = ot_get_option( 'cb_to_top', 'on' );
        $cb_responsive_style = ot_get_option( 'cb_responsive_onoff', 'on' );
        $cb_featured_image_style = $cb_post_format = $cb_bg_ad = $cb_ad_wrap_fix = $cb_bg_to_margin_top = $cb_bg_to_img = $cb_review_checkbox = $cb_body_class = $cb_show_header = $cb_output = NULL;
        $cb_body_class .= cb_get_body_classes(); 
        $cb_logo = ot_get_option( 'cb_logo_url', NULL );

        if ( ( $cb_bg_to == 'global' ) || ( ( $cb_bg_to == 'only-hp' ) && ( is_front_page() == TRUE ) ) ) {
            $cb_bg_to_margin_top = ot_get_option('cb_bg_to_margin_top', NULL);
            $cb_bg_to_url = ot_get_option('cb_bg_to_url', NULL);
            $cb_bg_to_img = ot_get_option('cb_bg_to_img', NULL);
            $cb_bg_ad = '<a href="'. $cb_bg_to_url .'" target="_blank" id="cb-bg-to" rel="nofollow"></a>';
            $cb_ad_wrap_fix = ' cb-rel-wrap';

            if ( $cb_bg_to_margin_top != NULL ) {
                $cb_bg_to_margin_top = ' style="margin-top:'. $cb_bg_to_margin_top[0] . $cb_bg_to_margin_top[1] . ';"';
            }
            if ( $cb_bg_to_img != NULL ) {
                $cb_bg_to_img = 'style="background-color: #fff; background-image: url('. $cb_bg_to_img .'); background-attachment: fixed; background-position: 50% 0%; background-repeat: no-repeat no-repeat;"';
            }
        }

        if ( is_single() ) {

            $cb_post_id = $post->ID;
            $cb_featured_image_style = get_post_meta( $cb_post_id, 'cb_featured_image_style', true );
            $cb_post_format = get_post_format($cb_post_id);
            $cb_review_checkbox = get_post_meta($cb_post_id, 'cb_review_checkbox', true );
            $cb_featured_image_style_override_post_onoff = get_post_meta( $cb_post_id, 'cb_featured_image_style_override', true );

            if ( ( $cb_featured_image_style_override_post_onoff != 'on' ) && ( $cb_featured_image_style_override_onoff == 'on' ) ) {
               $cb_featured_image_style = $cb_featured_image_style_override_style;
            }

            $cb_body_class .= cb_get_dropcap( $post->ID );
            $cb_show_header = cb_show_header();
        }

        if ( $cb_show_header == NULL ) {
            $cb_show_header = 'on';
        }

        if ( is_page() == true ) {
            $cb_page_id = get_the_ID();
            $cb_featured_image_style = get_post_meta( $cb_page_id, 'cb_page_featured_style', true );
        }

        if ( ( ( $cb_featured_image_style == 'full-background' ) || ( $cb_featured_image_style == 'parallax' ) || ( $cb_featured_image_style == '4' ) || ( $cb_featured_image_style == '5' ) ) && ( $cb_post_format != 'gallery' ) && ( is_category() == false ) && ( is_front_page() == false )  ) {
                      $cb_bg_ad = $cb_bg_to_img = $cb_bg_to_margin_top = NULL;
        } elseif ( $cb_theme_style == 'cb_boxed' ) {
                      $cb_container_classes = 'cb-boxed wrap clearfix';
                      if ( $cb_ad_wrap_fix != NULL ) {
                          $cb_container_classes .= $cb_ad_wrap_fix;
                      }
        } elseif ( $cb_theme_style == 'cb_full' ) {
                      $cb_container_classes = 'cb-unboxed clearfix';
                      if ( $cb_ad_wrap_fix != NULL ) {
                          $cb_container_classes .= $cb_ad_wrap_fix;
                      }
        }

        if ( is_singular() ) {
            $cb_body_class .= cb_get_post_fis( $post->ID );
        }

        if ( $cb_show_header != 'on' ) {
            $cb_body_class .= ' cb-menu-logo-vis';
        }
?>

<!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>

		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
		<!-- mobile meta -->
        <?php if ( $cb_responsive_style == 'on' ) { ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?php } else { ?>
            <meta name="viewport" content="width=1200"/>
        <?php } ?>

		<link rel="shortcut icon" href="<?php echo $cb_favicon; ?>">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php  
        if ( has_nav_menu( 'main' ) ) {

				$cb_main_menu = wp_nav_menu(
					array(
						'echo'           => FALSE,
				    	'container' => FALSE,
				    	'theme_location' => 'main',
				        'depth' => 0,
						'walker' => new CB_Walker,
						'items_wrap' => '<ul class="nav main-nav wrap clearfix">%3$s</ul>',
					)
                );
		}
		?>

		<!-- head functions -->
		<?php wp_head(); ?>
		<!-- end head functions-->

	</head>

	<body <?php body_class( $cb_body_class ); echo $cb_bg_to_img; ?>>

        <?php echo $cb_bg_ad; ?>

	    <div id="cb-outer-container"<?php echo $cb_bg_to_margin_top; ?>>

            <?php if ( has_nav_menu( 'small' ) ) { ?>

            <!-- Small-Screen Menu -->
            
            <div id="cb-mob-menu" class="clearfix<?php if ( $cb_nav_style == 'cb_light' ) { echo ' cb-light-menu'; } else { echo ' cb-dark-menu'; } ?>">
                <a href="#" id="cb-mob-close" class="cb-link"><i class="fa cb-times"></i></a>

                <?php if ( has_nav_menu( 'small' ) ) { ?>
                    <div class="cb-mob-menu-wrap">
                        <?php  cb_small_screen_nav(); ?>
                    </div>
                <?php } ?>
            </div>

            <!-- /Small-Screen Menu -->

        <?php } ?>

    		<div id="cb-container" class="<?php echo $cb_container_classes; ?>" <?php 
            if ( $cb_review_checkbox == '1' ) { 
                echo 'itemprop="review" itemscope itemtype="http://schema.org/Review"'; 
            } elseif ( $cb_review_checkbox != NULL ) { 
                echo 'itemscope itemtype="http://schema.org/Article"'; 
            }
            ?>>

                <header class="header clearfix<?php if ( $cb_theme_style == 'cb_boxed' ) { echo ' wrap'; } if ( $cb_logo_position == 'center' ) { echo ' cb-logo-center'; } ?>" role="banner">
                        
                        <?php if ( ( ( $cb_logo != NULL ) || ( cb_header_banner() != NULL ) ) && ( $cb_show_header == 'on' ) ) { ?>

                            <div id="cb-logo-box" class="wrap clearfix">
                                <?php cb_logo(); ?>
                                <?php cb_header_banner(); ?>
                            </div>

                         <?php } ?>

                        <?php echo cb_add_modals_main_menu(); ?>

                        <?php if ( has_nav_menu( 'main' ) ) { ?>
                             <nav id="cb-nav-bar" class="clearfix<?php if ($cb_nav_style == 'cb_light') {echo ' cb-light-menu';} else {echo ' cb-dark-menu';} if ($cb_theme_style != 'cb_boxed') { echo ' cb-full-width'; } ?>" role="navigation">
                                <div id="cb-main-menu" class="cb-nav-bar-wrap clearfix wrap">
                                    <?php echo $cb_main_menu; ?>
                                </div>
                            </nav>
                        <?php } ?>

    	 				<?php if ( has_nav_menu( 'top' ) || ($cb_breaking_news != 'off') || ( has_nav_menu( 'small' ) )  ) { ?>

                            <!-- Secondary Menu -->
                            <div id="cb-top-menu" class="clearfix<?php if ( $cb_nav_style == 'cb_light' ) { echo ' cb-light-menu'; } else { echo ' cb-dark-menu'; } if ( ! has_nav_menu( 'top' ) && ( $cb_breaking_news == 'off') ) { echo ' cb-hidden'; } ?>">
                                <div class="wrap cb-top-menu-wrap clearfix">
                                    
                                    <div class="cb-left-side cb-mob">
                                        <?php if ( has_nav_menu( 'small' ) ) { ?>
                                            <a href="#" id="cb-mob-open"><i class="fa fa-bars"></i></a>
                                        <?php }

                                        if ($cb_breaking_news != 'off') { echo cb_breaking_news(); }
                                        cb_mob_logo(); 
                                    
                                    echo '</div>';

                                    if ( has_nav_menu( 'top' ) ) { cb_top_nav(); }

                                    if ( function_exists('login_with_ajax') ) {

                                        $cb_login_space = '<i class="fa fa-user"></i>';

                                        if ( ( $cb_menu_icons == 'both' ) || ($cb_menu_icons == 'login' ) ) {
                                            $cb_output .= '<a href="#" class="cb-small-menu-icons cb-small-menu-login" id="cb-lwa-trigger-sm">' . $cb_login_space . '</a>';
                                        }
                                    }

                                    if ( ( $cb_menu_icons == 'both') || ( $cb_menu_icons == 'search' ) ) {
                                        $cb_output .= '<a href="#" title="'. __('Search', 'cubell').'" class="cb-tip-bot cb-small-menu-icons cb-small-menu-search" id="cb-s-trigger-sm"><i class="fa fa-search"></i></a>';
                                    }

                                    echo '<div class="cb-mob-right">' . $cb_output . '</div>';
                                    ?>

                                </div>
                            </div>
                            <!-- /Secondary Menu -->

                        <?php } ?>

                        <?php if ( $cb_to_top == 'on' ) { ?>

    	 				      <a href="#" id="cb-to-top" class="cb-base-color"><i class="fa fa-long-arrow-up"></i></a>

                        <?php } ?>

                </header> <!-- end header -->