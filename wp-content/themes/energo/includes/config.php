<?php
/**
 * Theme config file.
 *
 * @package ENERGO
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['energo_main_header'][] 	= array( 'energo_preloader', 98 );
$config['default']['energo_main_header'][] 	= array( 'energo_main_header_area', 99 );

$config['default']['energo_main_footer'][] 	= array( 'energo_preloader', 98 );
$config['default']['energo_main_footer'][] 	= array( 'energo_main_footer_area', 99 );

$config['default']['energo_sidebar'][] 	    = array( 'energo_sidebar', 99 );

$config['default']['energo_banner'][] 	    = array( 'energo_banner', 99 );


return $config;
