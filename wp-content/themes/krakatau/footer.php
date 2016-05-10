<footer class="row credit">
     <div class="alignright">
<a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
         <?php bloginfo('name'); ?></a> | <a href="<?php echo esc_url(__('http://amdhas.tk','krakatau')); ?>" title="<?php esc_attr_e('krakatau', 'krakatau'); ?>"><?php printf('Krakatau'); ?></a> powered by <a href="<?php echo esc_url(__('http://wordpress.org','krakatau')); ?>" title="<?php esc_attr_e('WordPress', 'krakatau'); ?>"><?php printf('WordPress'); ?></a>
     </div>
  </footer>
         <?php wp_footer(); ?>
</body>
</html>