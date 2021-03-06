	<footer id="colophon" class="site-footer" role="contentinfo">
    
    	<div class="responsive-container">
            	
            <div class="site-info">
            
            
                <?php do_action( 'BizArk_credits' ); ?>
                <h3><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h3>
                <p><?php _e('&copy; All rights reserved.', 'BizArk') ?></p>
                <?php if( is_home() || is_front_page() ): ?>
                <p><?php printf( __( 'Designed by: %1$s.', 'BizArk' ), '<a href="http://www.themealley.com/" rel="designer">ThemeAlley.com</a>' ); ?></p>
                <?php endif; ?>
                <p>Powered by <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'BizArk' ); ?>" rel="generator"><?php printf( __( '%s', 'BizArk' ), 'WordPress' ); ?></a></p>
                <div class="footer-search"><?php get_search_form(); ?></div>

                
            </div><!-- .site-info -->
            
            <div class="footer-widget-three">
            	<?php if ( dynamic_sidebar('footer-left') ){ } else { ?>
                
                    <aside id="archives" class="widget">
                        <h1 class="widget-title"><?php _e( 'Archives', 'BizArk' ); ?></h1>
                        <ul>
                            <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?>
            </div>
            
            <div class="footer-widget-three">
            	<?php if ( dynamic_sidebar('footer-center') ){ } else { ?>

                    <aside id="meta" class="widget">
                        <h1 class="widget-title"><?php _e( 'Meta', 'BizArk' ); ?></h1>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?>            
            </div>
            
            <div class="footer-widget-three">
            	<?php if ( dynamic_sidebar('footer-right') ){ } else { ?>

                    <aside id="archives" class="widget">
                        <h1 class="widget-title"><?php _e( 'Archives', 'BizArk' ); ?></h1>
                        <ul>
                            <?php wp_list_pages('title_li='); ?>
                        </ul>
                    </aside>                                                                                 
                                                                                
                <?php } ?>            
            </div>            
            
    	</div><!-- #Responsive-Container -->
                    
	</footer><!-- #colophon -->