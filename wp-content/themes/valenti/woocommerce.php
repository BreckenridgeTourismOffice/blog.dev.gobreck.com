<?php
        get_header();
        $cb_theme_style = ot_get_option('cb_theme_style', 'cb_boxed');
        $cb_woocommerce_sidebar = ot_get_option('cb_woocommerce_sidebar', 'sidebar');
        $cb_sidebar_position = NULL;
        $cb_breadcrumbs = ot_get_option('cb_breadcrumbs', 'on');

?>
		<div id="cb-content" class="wrap clearfix">

            <div class="cb-cat-header cb-woocommerce-page">

                <h1 id="cb-cat-title" >
                    <?php
                        if ( is_shop() == true ) {
                            woocommerce_page_title();
                        } elseif ( ( is_product_category() == true ) || ( is_product_tag() == true ) ) {

                            global $wp_query;
                            $cb_current_object = $wp_query->get_queried_object();
                            echo $cb_current_object->name;

                        } else {
                            the_title();
                        }
                    ?>
                </h1>

            </div>

            <?php if ( $cb_breadcrumbs != 'off'  ) { echo cb_breadcrumbs(); } ?>
			<div id="main" class="cb-main entry-content clearfix" role="main">

				<?php woocommerce_content(); ?>

                <?php comments_template(); ?>

			</div> <!-- end #main -->

			<?php if ( $cb_woocommerce_sidebar != 'nosidebar' ) {  get_sidebar(); } ?>

		</div> <!-- end #cb-content -->

<?php get_footer(); ?>