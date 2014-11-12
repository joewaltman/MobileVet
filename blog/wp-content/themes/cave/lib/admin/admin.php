<?php
class CaveAdmin {
		
		/** Constructor Method */
		function __construct() {
	
			/** Load the admin_init functions. */
			add_action( 'admin_init', array( &$this, 'admin_init' ) );
			
			/* Hook the settings page function to 'admin_menu'. */
			add_action( 'admin_menu', array( &$this, 'settings_page_init' ) );		
	
		}
		
		/** Initializes any admin-related features needed for the framework. */
		function admin_init() {
			
			/** Registers admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_register_scripts' ), 1 );
		
			/** Loads admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ) );
			
		}
		
		/** Registers admin JavaScript and Stylesheet files for the framework. */
		function admin_register_scripts() {
			
			/** Register Admin Stylesheet */
			wp_register_style( 'cave-admin-css-style', esc_url( CAVE_ADMIN_URI . 'style.css' ) );
			
			/** Register Admin Scripts */
			wp_register_script( 'cave-admin-js-cave', esc_url( CAVE_ADMIN_URI . 'common.js' ) );
			wp_register_script( 'cave-admin-js-jquery-cookie', esc_url( CAVE_JS_URI . 'jquery-cookie/jquery.cookie.js' ) );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for the framework. */
		function admin_enqueue_scripts() {			
		}
		
		/** Initializes all the theme settings page functionality. This function is used to create the theme settings page */
		function settings_page_init() {
			
			global $cave;
			
			/** Register theme settings. */
			register_setting( 'cave_options_group', 'cave_options', array( &$this, 'cave_options_validate' ) );
			
			/* Create the theme settings page. */
			$cave->settings_page = add_theme_page( 
				esc_html( __( 'Cave Options', 'cave' ) ),	/** Settings page name. */
				esc_html( __( 'Cave Options', 'cave' ) ),	/** Menu item name. */
				$this->settings_page_capability(),				/** Required capability */
				'cave-options', 								/** Screen name */
				array( &$this, 'settings_page' )				/** Callback function */
			);
			
			/* Check if the settings page is being shown before running any functions for it. */
			if ( !empty( $cave->settings_page ) ) {
				
				/** Add contextual help to the theme settings page. */
				add_action( 'load-'. $cave->settings_page, array( &$this, 'settings_page_contextual_help' ) );
				
				/* Load the JavaScript and stylesheets needed for the theme settings screen. */
				add_action( 'admin_enqueue_scripts', array( &$this, 'settings_page_enqueue_scripts' ) );
				
				/** Configure settings Sections and Fileds. */
				$this->settings_sections();
				
				/** Configure default settings. */
				$this->settings_default();				
				
			}
			
		}
		
		/** Returns the required capability for viewing and saving theme settings. */
		function settings_page_capability() {
			return 'edit_theme_options';
		}
		
		/** Displays the theme settings page. */
		function settings_page() {
			require( CAVE_ADMIN_DIR . 'page.php' );
		}
		
		/** Text for the contextual help for the theme settings page in the admin. */
		function settings_page_contextual_help() {
			
			/** Get the parent theme data. */
			$theme = cave_theme_data();
			$AuthorURI = $theme['AuthorURI'];
			$ThemeURI = $theme['ThemeURI'];
		
			/** Get the current screen */
			$screen = get_current_screen();
			
			/** Add theme reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'cave-theme',
				'title' => __( 'Theme Support', 'cave' ),
				'content' => implode( '', file( CAVE_ADMIN_DIR . 'help/support.html' ) ),				
				
				)
			);
			
			/** Add license reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'cave-license',
				'title' => __( 'License', 'cave' ),
				'content' => implode( '', file( CAVE_ADMIN_DIR . 'help/license.html' ) ),				
				
				)
			);
			
			/** Add changelog reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'cave-changelog',
				'title' => __( 'Changelog', 'cave' ),
				'content' => implode( '', file( CAVE_ADMIN_DIR . 'help/changelog.html' ) ),				
				
				)
			);
			
			/** Help Sidebar */
			$sidebar = '<p><strong>' . __( 'For more information:', 'cave' ) . '</strong></p>';
			if ( !empty( $AuthorURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $AuthorURI ) . '" target="_blank">' . __( 'Cave Project', 'cave' ) . '</a></p>';
			}
			if ( !empty( $ThemeURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $ThemeURI ) . '" target="_blank">' . __( 'Cave Official Page', 'cave' ) . '</a></p>';
			}			
			$screen->set_help_sidebar( $sidebar );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for displaying the theme settings page in the WordPress admin. */
		function settings_page_enqueue_scripts( $hook ) {
			
			/** Load Scripts For Cave Options Page */
			if( $hook === 'appearance_page_cave-options' ) {
				
				/** Load Admin Stylesheet */
				wp_enqueue_style( 'cave-admin-css-style' );
				
				/** Load Admin Scripts */
				wp_enqueue_script( 'cave-admin-js-cave' );
				wp_enqueue_script( 'cave-admin-js-jquery-cookie' );
				
			}
				
		}
		
		/** Configure settings Sections and Fileds */		
		function settings_sections() {
		
			/** Blog Section */
			add_settings_section( 'cave_section_blog', 'Blog Options', array( &$this, 'cave_section_blog_fn' ), 'cave_section_blog_page' );			
			
			add_settings_field( 'cave_field_nav_style', __( 'Navigation Style', 'cave' ), array( &$this, 'cave_field_nav_style_fn' ), 'cave_section_blog_page', 'cave_section_blog' );
			
			/** Post Section */
			add_settings_section( 'cave_section_post', 'Post Options', array( &$this, 'cave_section_post_fn' ), 'cave_section_post_page' );
			
			add_settings_field( 'cave_field_post_style', __( 'Post Style', 'cave' ), array( &$this, 'cave_field_post_style_fn' ), 'cave_section_post_page', 'cave_section_post' );
			add_settings_field( 'cave_field_featured_image_control', __( 'Post Featured Image', 'cave' ), array( &$this, 'cave_field_featured_image_control_fn' ), 'cave_section_post_page', 'cave_section_post' );
			
			/** Footer Section */
			add_settings_section( 'cave_section_footer', 'Footer Options', array( &$this, 'cave_section_footer_fn' ), 'cave_section_footer_page' );
			
			add_settings_field( 'cave_field_copyright_control', __( 'Use Copyright', 'cave' ), array( &$this, 'cave_field_copyright_control_fn' ), 'cave_section_footer_page', 'cave_section_footer' );
			add_settings_field( 'cave_field_copyright', __( 'Enter Copyright Text', 'cave' ), array( &$this, 'cave_field_copyright_fn' ), 'cave_section_footer_page', 'cave_section_footer' );
			
			/** General Section */
			add_settings_section( 'cave_section_general', 'General Options', array( &$this, 'cave_section_general_fn' ), 'cave_section_general_page' );
			
			add_settings_field( 'cave_field_reset_control', __( 'Reset Theme Options', 'cave' ), array( &$this, 'cave_field_reset_control_fn' ), 'cave_section_general_page', 'cave_section_general' );
		
		}
		
		/** Configure default settings. */	
		function get_settings_default()  {
			
			$default = array(
					
				'cave_nav_style' => 'numeric',
				
				'cave_post_style' => 'content',
				'cave_featured_image_control' => 'manual',
				
				'cave_copyright_control' => 0,
				'cave_copyright' => '',
				
				'cave_reset_control' => 0
				
			);
			
			return $default;
			
		}
		function settings_default() {
			global $cave;
			
			$cave_reset_control = false;
			$cave_options = cave_get_settings();
			
			/** Cave Reset Logic */
			if ( !is_array( $cave_options ) ) {			
				$cave_reset_control = true;			
			} 						
			elseif ( $cave_options['cave_reset_control'] == 1 ) {			
				$cave_reset_control = true;			
			}			
			
			/** Let Reset Cave */
			if( $cave_reset_control == true ) {				
				$default = $this->get_settings_default();				
				update_option( 'cave_options' , $default );			
			}
		
		}
		
		/** Cave Pre-defined Range */
		
		/* Boolean Yes | No */		
		function cave_boolean_pd() {			
			return array( 1 => __( 'yes', 'cave' ), 0 => __( 'no', 'cave' ) );		
		}
		
		/* Nav Style Range */		
		function cave_nav_style_pd() {			
			return array( 'numeric' => __( 'Numeric', 'cave' ), 'older-newer' => __( 'Older / Newer', 'cave' ) );			
		}
		
		/* Post Style Range */		
		function cave_post_style_pd() {			
			return array( 'content' => __( 'Content', 'cave' ), 'excerpt' => __( 'Excerpt', 'cave' ) );			
		}
		
		/* Featured Image Range */		
		function cave_featured_image_pd() {			
			return array( 'manual' => __( 'Use Featured Image', 'cave' ), 'auto' => __( 'Use Featured Image Automatically', 'cave' ), 'no' => __( 'No Featured Image', 'cave' ) );			
		}		
		
		/** Cave Options Validation */				
		function cave_options_validate( $input ) {
			
			/** Cave Predefined */
			$default = $this->get_settings_default();
			$cave_boolean_pd = $this->cave_boolean_pd();
			$cave_nav_style_pd = $this->cave_nav_style_pd();
			$cave_post_style_pd = $this->cave_post_style_pd();
			$cave_featured_image_pd = $this->cave_featured_image_pd();						
			
			/* Validation: cave_nav_style */
			if ( ! array_key_exists( $input['cave_nav_style'], $cave_nav_style_pd ) ) {
				 $input['cave_nav_style'] = $default['cave_nav_style'];
			}
			
			/* Validation: cave_post_style */			
			if ( ! array_key_exists( $input['cave_post_style'], $cave_post_style_pd ) ) {
				 $input['cave_post_style'] = $default['cave_post_style'];
			}
			
			/* Validation: cave_featured_image_control */			
			if ( ! array_key_exists( $input['cave_featured_image_control'], $cave_featured_image_pd ) ) {
				 $input['cave_featured_image_control'] = $default['cave_featured_image_control'];
			}										
			
			/* Validation: cave_copyright_control */			
			if ( ! array_key_exists( $input['cave_copyright_control'], $cave_boolean_pd ) ) {
				 $input['cave_copyright_control'] = $default['cave_copyright_control'];
			}
			
			/* Validation: cave_copyright */
			if( !empty( $input['cave_copyright'] ) ) {
				$input['cave_copyright'] = htmlspecialchars ( $input['cave_copyright'] );
			}
			
			/* Validation: cave_reset_control */
			if ( ! array_key_exists( $input['cave_reset_control'], $cave_boolean_pd ) ) {
				 $input['cave_reset_control'] = $default['cave_reset_control'];
			}
			
			return $input;
		
		}
		
		/** Blog Section Callback */				
		function cave_section_blog_fn() {
			echo '<div class="cave-section-desc">
			  <p class="description">'. __( 'Customize your blog by using the following settings.', 'cave' ) .'</p>
			</div>';
		}
		
		/* Nav Style Callback */		
		function cave_field_nav_style_fn() {
			
			$cave_options = get_option( 'cave_options' );
			$items = $this->cave_nav_style_pd();
			
			echo '<select id="cave_nav_style" name="cave_options[cave_nav_style]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $cave_options['cave_nav_style'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select navigation style.', 'cave' ) .'</small></div>';
		
		}
		
		/** Post Section Callback */				
		function cave_section_post_fn() {
			echo '<div class="cave-section-desc">
			  <p class="description">'. __( 'Customize your posts by using the following settings.', 'cave' ) .'</p>
			</div>';
		}
		
		/* Post Style Callback */		
		function cave_field_post_style_fn() {
			
			$cave_options = get_option( 'cave_options' );
			$items = $this->cave_post_style_pd();
			
			echo '<select id="cave_post_style" name="cave_options[cave_post_style]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $cave_options['cave_post_style'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select post style.', 'cave' ) .'</small></div>';
		
		}
		
		/* Featured Image Callback */		
		function cave_field_featured_image_control_fn() {
			
			$cave_options = get_option( 'cave_options' );
			$items = $this->cave_featured_image_pd();
			
			echo '<select id="cave_featured_image_control" name="cave_options[cave_featured_image_control]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $cave_options['cave_featured_image_control'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( '<strong>Use Featured Image:</strong> which is set in the post.', 'cave' ) .'</small></div>';
			echo '<div><small>'. __( '<strong>Use Featured Image Automatically:</strong> from the images uploaded to the post.', 'cave' ) .'</small></div>';
			echo '<div><small>'. __( '<strong>No Featured Image:</strong> for the post.', 'cave' ) .'</small></div>';
		
		}
		
		/** Footer Section Callback */				
		function cave_section_footer_fn() {
			echo '<div class="cave-section-desc">
			  <p class="description">'. __( 'Customize your footer by using the following settings.', 'cave' ) .'</p>
			</div>';
		}
		
		/* Copyright Control Callback */		
		function  cave_field_copyright_control_fn() {
			
			$cave_options = get_option( 'cave_options' );
			$items = $this->cave_boolean_pd();
			
			echo '<select id="cave_copyright_control" name="cave_options[cave_copyright_control]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $cave_options['cave_copyright_control'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select yes to override default copyright text.', 'cave' ) .'</small></div>';
		
		}
		
		/* Copyright Callback */
		function cave_field_copyright_fn() {
			
			$cave_options = get_option('cave_options');
			echo '<textarea type="textarea" id="cave_copyright" name="cave_options[cave_copyright]" rows="7" cols="50">'. esc_html ( $cave_options['cave_copyright'] ) .'</textarea>';
			echo '<div><small>'. __( 'Enter the copyright text.', 'cave' ) .'</small></div>';
			echo '<div><small>Example: <strong>&amp;copy; Copyright '.date('Y').' - &lt;a href="'. esc_url( home_url( '/' ) ) .'"&gt;'. get_bloginfo('name') .'&lt;/a&gt;</strong></small></div>';
		
		}
		
		/** General Section Callback */				
		function cave_section_general_fn() {
			echo '<div class="cave-section-desc">
			  <p class="description">'. __( 'Here are the general settings to customize your blog.', 'cave' ) .'</p>
			</div>';
		}
		
		/* Reset Congrol Callback */		
		function cave_field_reset_control_fn() {
			
			$cave_options = get_option('cave_options');			
			$items = $this->cave_boolean_pd();			
			echo '<label><input type="checkbox" id="cave_reset_control" name="cave_options[cave_reset_control]" value="1" /> '. __( 'Reset Theme Options.', 'cave' ) .'</label>';
		
		}
}

/** Initiate Admin */
new CaveAdmin();
?>