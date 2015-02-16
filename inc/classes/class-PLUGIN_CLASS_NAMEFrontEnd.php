<?php
/**
 * Class for front end goodies
 */

class PLUGIN_CLASS_NAMEFrontEnd extends PLUGIN_CLASS_NAME {
	
	public function __construct() {
		parent::__construct();
		add_action( 'init' , 			array( $this , 'init' ) );		
	}
	
	/**
	 * The code that runs during init.
	 */	
	public function init() {
		
		$this->scripts_and_styles();

	}

	/**
	 * Add enqueue actions
	 */
	public function scripts_and_styles() {
				
		add_action( 'enqueue_scripts', array( $this , 'enqueue_styles' ) );
		add_action( 'enqueue_scripts', array( $this , 'enqueue_scripts' ) );

	}	

	/**
	 * Register and enqueue styles
	 */
	public function enqueue_styles() {
				
		// register and enqueue styles

	}	

	/**
	 * Register and enqueue scripts
	 */	
	public function enqueue_scripts() {
				
		// register and enqueue scripts

	}		
}