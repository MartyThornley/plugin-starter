<?php
/**
 * Fired during plugin activation.
 *
 * Used for setting up databae tables, adding default options, checking for dependencies, etc.
 */

class PLUGIN_CLASS_NAMEActivator extends PLUGIN_CLASS_NAME {

	public function __construct() {

		parent::__construct();
		$this->activate();
		
	}
	
	/**
	 * Actions to run during activation
	 */
	public static function activate() {

		// do stuff here ************************************
		
	}

}