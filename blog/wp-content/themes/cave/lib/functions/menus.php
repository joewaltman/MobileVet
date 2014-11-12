<?php
/** Register nav menus. */
add_action( 'init', 'cave_register_menus' );

/** Registers the the core menus */
function cave_register_menus() {

	/* Register the 'primary' menu. */
	register_nav_menu( 'cave-primary-menu', __( 'Cave Primary Menu', 'cave' ) );
	
}
?>