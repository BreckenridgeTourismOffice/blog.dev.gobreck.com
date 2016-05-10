<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=page div and all content after
 *
 * @package WordPress
 * @subpackage Brightpage
 */
?>

	</div> <!-- end div #page -->
	<!-- END PAGE -->

	<?php get_template_part( 'bottom-menu' ); // 3-Column Bottom Menu (bottom-menu.php) ?>

	<!-- BEGIN FOOTER -->
	<div id="footer" class="clearfix">
		
		<div id="footer-left" class="grid_02 first">
			<p><a href="http://www.gobreck.com/"><?php _e('Brought to you by GoBreck.com', 'brightpage'); ?></a></p>
		</div> <!-- end div #footer-left -->

		<div id="footer-right" class="grid_02 last">
			<p>&copy; <?php echo date('Y');?> <a href="<?php echo home_url(''); ?>/" title="<?php bloginfo('name');?>" ><?php bloginfo('name');?></a></p>
		</div> <!-- end div #footer-right -->
			
	</div> <!-- end div #footer -->
	<!-- END FOOTER -->
		
</div> <!-- end wrapper w_960 -->
	<div id='networkedblogs_nwidget_container' style='height:360px;padding-top:10px;'><div id='networkedblogs_nwidget_above'></div><div id='networkedblogs_nwidget_widget' style="border:1px solid #D1D7DF;background-color:#F5F6F9;margin:0px auto;"><div id="networkedblogs_nwidget_logo" style="padding:1px;margin:0px;background-color:#edeff4;text-align:center;height:21px;"><a href="http://www.networkedblogs.com/" target="_blank" title="NetworkedBlogs"><img style="border: none;" src="http://static.networkedblogs.com/static/images/logo_small.png" title="NetworkedBlogs"/></a></div><div id="networkedblogs_nwidget_body" style="text-align: center;"></div><div id="networkedblogs_nwidget_follow" style="padding:5px;"><a style="display:block;line-height:100%;width:90px;margin:0px auto;padding:4px 8px;text-align:center;background-color:#3b5998;border:1pxsolid #D9DFEA;border-bottom-color:#0e1f5b;border-right-color:#0e1f5b;color:#FFFFFF;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:none;" href="http://www.networkedblogs.com/blog/the-breck-connection?ahash=5a2566b988157d42d188c59d825a795b">Follow this blog</a></div></div><div id='networkedblogs_nwidget_below'></div></div><script type="text/javascript">
if(typeof(networkedblogs)=="undefined"){networkedblogs = {};networkedblogs.blogId=1110803;networkedblogs.shortName="the-breck-connection";}
</script><script src="http://nwidget.networkedblogs.com/getnetworkwidget?bid=1110803" type="text/javascript"></script>
<?php wp_footer(); ?>

</body>
</html>