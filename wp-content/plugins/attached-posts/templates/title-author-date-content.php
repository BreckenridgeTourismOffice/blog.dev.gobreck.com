<?php
/*
AP Template: Title, Author, Date and Content
Description: This template shows the title, the publishing date, the author and the content for each associated post.
Version: 1.0
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/

If ( $association_query = $this->get_associated_posts() ) : ?>
<div class="associated-posts <?php Echo Sanitize_Title(BaseName(__FILE__, '.php')) ?>">
  <?php While ($association_query->have_posts()) : $association_query->the_post(); ?>
  <div class="associated-post">
    <h3 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
    <p class="post-meta">
      Geschrieben am <span class="post-date"><?php Echo Get_The_Date() ?></span> von <span class="post-author"><a href="<?php echo Get_Author_Posts_URL(Get_The_Author_Meta('ID')) ?>"><?php The_Author() ?></a></span>.
    </p>

    <div class="post-content"><?php the_content() ?></div>

  </div>
  <?php EndWhile ?>
</div>
<?php EndIf;
/* End of File */