<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php cave_featured_image(); ?>
  
  <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  
  <div class="entry-meta">    
	<?php echo cave_post_date() . cave_post_comments() . cave_post_author() . cave_post_sticky() . cave_post_edit_link(); ?>
  </div><!-- .entry-meta -->
  
  <div class="entry-content clearfix">	
	<?php cave_post_style(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo cave_link_pages(); ?>
  
  <div class="entry-meta-bottom">    
  <?php echo cave_post_category() . cave_post_tags(); ?>    
  </div><!-- .entry-meta-bottom -->

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->