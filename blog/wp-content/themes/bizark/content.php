<?php
/**
 * @package BizArk
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        
		<div class="entry-meta">
			<?php BizArk_posted_on(); ?>
		</div><!-- .entry-meta -->  
              
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'BizArk' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'BizArk' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>
    
	<footer class="entry-meta-bottom">
            
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ' ', 'BizArk' ) );
				if ( $categories_list && BizArk_categorized_blog() ) :
			?>
			<div class="entry-meta-bottom-item">
				<?php printf( __( 'Posted in %1$s', 'BizArk' ), $categories_list ); ?>
			</div>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ' ', 'BizArk' ) );
				if ( $tags_list ) :
			?>
			<div class="entry-meta-bottom-item">
				<?php printf( __( 'Tagged %1$s', 'BizArk' ), $tags_list ); ?>
			</div>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<div class="entry-meta-bottom-item">
			<?php comments_popup_link( __( 'Leave a comment', 'BizArk' ), __( '1 Comment', 'BizArk' ), __( '% Comments', 'BizArk' ) ); ?>
        </div>
		<?php endif; ?>
        
        <?php edit_post_link( __( 'Edit', 'BizArk' ), '<div class="entry-meta-bottom-item edit-link">', '</div>' ); ?>
        
	</footer><!-- .entry-meta -->      


</article><!-- #post-## -->
