<?php if ( is_home()) : ?>
  <div class="intro">
<?php 
$options = get_option('krakatau_options');
if ( isset($options['krakatau_general_intro']) and $options['krakatau_general_intro'] <> "" ) { 
echo  $options['krakatau_general_intro']; 
} else {
echo '<blockquote>';
echo 'This a part of your theme for welcome message. You can configure on your theme options, For title, descriptions, button and everything what you need here. just put your text on texarea also you can put your image here.';
echo '</blockquote>';

} 
			?>
    </div>
<?php endif; ?>
