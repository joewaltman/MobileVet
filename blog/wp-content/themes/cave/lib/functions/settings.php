<?php
/** Loads the Cave theme setting. */
function cave_get_settings() {
	global $cave;

	/* If the settings array hasn't been set, call get_option() to get an array of theme settings. */
	if ( !isset( $cave->settings ) ) {
		$cave->settings = get_option( 'cave_options' );
	}
	
	/** return settings. */
	return $cave->settings;
}
?>