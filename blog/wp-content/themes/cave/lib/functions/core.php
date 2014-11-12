<?php
/** Function for setting the content width of a theme. */
function cave_set_content_width( $width = '' ) {
	global $content_width;
	$content_width = absint( $width );
}

/** Function for getting the theme's content width. */
function cave_get_content_width() {
	global $content_width;
	return $content_width;
}

/** Function for getting the theme's data */
function cave_theme_data() {
	global $cave;
	
	/** If the parent theme data isn't set, let grab it. */
	if ( empty( $cave->theme_data ) ) {
		
		$cave_theme_data = array();
		$theme_data = wp_get_theme( 'cave' );
		$cave_theme_data['Name'] = $theme_data->get( 'Name' );
		$cave_theme_data['ThemeURI'] = $theme_data->get( 'ThemeURI' );
		$cave_theme_data['AuthorURI'] = $theme_data->get( 'AuthorURI' );
		$cave_theme_data['Description'] = $theme_data->get( 'Description' );
		
		$cave->theme_data = $cave_theme_data;
	
	}

	/** Return the parent theme data. */
	return $cave->theme_data;
}
?>