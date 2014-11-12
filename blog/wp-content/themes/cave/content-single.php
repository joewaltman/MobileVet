<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
  
  <div class="entry-meta">    
	<?php echo cave_post_date() . cave_post_comments() . cave_post_author() . cave_post_sticky() . cave_post_edit_link(); ?>
  </div><!-- .entry-meta -->
  
  <div class="entry-content clearfix">
  	<?php the_content(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo cave_link_pages(); ?>
  
  <div class="entry-meta-bottom">
  <?php echo cave_post_category() . cave_post_tags(); ?>
  </div><!-- .entry-meta -->

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->

<?php cave_author(); ?> 

<?php comments_template( '', true ); ?>