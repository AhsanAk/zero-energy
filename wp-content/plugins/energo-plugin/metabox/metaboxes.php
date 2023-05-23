<?php
if ( ! function_exists( "energo_add_metaboxes" ) ) {
	function energo_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'project.php',
			'service.php',
			'team.php',
			'testimonials.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( ENERGOPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/energo_options/boxes", "energo_add_metaboxes" );
}
