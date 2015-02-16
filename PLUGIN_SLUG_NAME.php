<?php
/**
 * Plugin Name:       	_PLUGIN_TITLE_
 * Description: 		Description
 * Version: 			_PLUGIN_VERSION_
 * Author:            	Author
 * Text Domain:       	_PLUGIN_SLUG_
 * Domain Path:       	/languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The base plugin class. Plugin definitions and functions used by other classes.
 */
require plugin_dir_path( __FILE__ ) . 'inc/classes/class-PLUGIN_CLASS_NAME.php';

/** 
 * The class to setup and run the plugin
 */
require plugin_dir_path( __FILE__ ) . 'inc/classes/class-PLUGIN_CLASS_NAMESetup.php';

/**
 * Create instance of the class
 */
$_PLUGIN_FUNCTION_NAME_ = new PLUGIN_CLASS_NAMESetup();

/**
 * Include wrapper functions
 */
require plugin_dir_path( __FILE__ ) . 'inc/functions/template-tags.php';
