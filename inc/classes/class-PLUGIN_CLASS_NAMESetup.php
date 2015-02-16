<?php
/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and public-facing site hooks.
 *
 * Maintains the unique identifier of this plugin.
 * Also the current version of the plugin.
 */

class PLUGIN_CLASS_NAMESetup extends PLUGIN_CLASS_NAME {
	
	protected $options;		// container for options object
	protected $admin;		// container for admin object
	protected $front;		// container for front end object
	
	/**
	 * Construct
	 */
	public function __construct() {
		parent::__construct();	
		$this->load();
	}

	/**
	 * Start the plugin.
	 *
	 * Add hooks here
	 */
	private function load() {
		
		$this->activate_and_upgrade_plugin();
		
		add_action( 'plugins_loaded', 			array( $this , 'load_plugin_textdomain' ) );
		add_action( 'plugins_loaded' ,			array( $this , 'load_options' ) );
		add_action( 'init' , 					array( $this , 'init' ) );
		
		if ( is_admin() ) {
			$this->admin();
		} else {
			$this->frontend();
		}
	
	}

	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-plugin-name-activator.php
	 */
	public function activate_and_upgrade_plugin() {
	
		if ( get_option( $this->domain . '_plugin_activated' ) != 'activated' ) {
			
			require_once( $this->plugin_dir . 'inc/classes/class-PLUGIN_CLASS_NAMEActivator.php' );
			$_PLUGIN_FUNCTION_NAME_activator = new PLUGIN_CLASS_NAMEActivator;		
			
			update_option( $this->domain . '_plugin_activated' , 'activated' );
			update_option( $this->domain . '_plugin_version' , $this->version );
			
		} elseif ( get_option( $this->domain . '_plugin_version' ) < $this->version ) {
			
			require_once( $this->plugin_dir . 'inc/classes/class-PLUGIN_CLASS_NAMEUpdate.php' );
			$_PLUGIN_FUNCTION_NAME_update = new PLUGIN_CLASS_NAMEUpdate;
			
			update_option( $this->domain . '_plugin_version' , $this->version );
		} 
	}

	/**
	 * The code that runs during init.
	 */
	public function init() {
		// do stuff
	}	

	/**
	 * Load the plugin text domain for translation.
	 */
	public function load_plugin_textdomain() {
	
		load_plugin_textdomain( $this->domain, false, $this->plugin_dir . '/languages/' );

	}

	/**
	 * The code that runs during init.
	 */
	public function load_options() {
		global $bb_tag_options;
		require_once ( $this->plugin_dir . 'modules-options/class-PLUGIN_CLASS_NAMEOptions.php' );
		$this->options = new PLUGIN_CLASS_NAMEOptions( );	
	}	

	/**
	 * Dashboard functionality.
	 */
	public function admin() {
		require_once ( $this->plugin_dir . 'modules-admin/class-PLUGIN_CLASS_NAMEAdmin.php' );
		$this->admin = new PLUGIN_CLASS_NAMEAdmin( );
	}

	/**
	 * Public-facing functionality
	 */
	public function frontend() {
		require_once ( $this->plugin_dir . 'modules-frontend/class-PLUGIN_CLASS_NAMEFrontEnd.php' );
		$this->front = new PLUGIN_CLASS_NAMEFrontEnd( );
	}

}
