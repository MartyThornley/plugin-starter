<?php
/**
 * The class that defines the info needed by the plugin.
 *
 * This is used to define internationalization, version numbers, paths, plugin names, etc.
 *
 */

class PLUGIN_CLASS_NAME {

	protected $name;			// The unique identifier of this plugin.
	protected $version;			// The current version of the plugin.
	protected $domain;			// The identifier for translation

	protected $dir;				// The full PATH to the plugin folder
	protected $url;				// The full URL to the plugin folder

	protected $stylesheet_dir;	// The full path to the current theme directory
	protected $stylesheet_url;	// The full url to the current theme directory

	protected $template_dir;	// The full path to the current template directory
	protected $template_url;	// The full url to the current template directory
	
	protected $views;			// The full path to the views folder for this plugin
	protected $css;				// The full url to the css folder for this plugin
	protected $js;				// The full url to the js folder for this plugin
	
	/**
	 * Define the core functionality of the plugin.
	 */
	public function __construct() {

		$this->name 			= '_PLUGIN_SLUG_';
		$this->version 			= '_PLUGIN_VERSION_';
		$this->domain 			= $this->plugin_name;

		$this->dir 				= plugin_dir_path( dirname( __FILE__ ) );
		$this->url 				= WP_PLUGIN_URL . '/' . str_replace( basename( __FILE__ ) , "" , plugin_basename(__FILE__) );

		$this->stylesheet_dir 	= get_stylesheet_directory();
		$this->template_dir 	= get_template_directory();
		
		$this->stylesheet_url	= dirname( get_bloginfo( 'stylesheet_url' ) );
		$this->template_url		= dirname( get_bloginfo( 'template_url' ) );

		$this->views 			= trailingslashit( $this->dir ) . 'views';
		$this->css 				= trailingslashit( $this->url ) . 'assets/css';
		$this->js 				= trailingslashit( $this->url ) . 'assets/css';

	}

	/**
	 *  Wrapper to get details about plugin
	 */
	public function details() {
		$details = array( 
			'name' 		=> $this->name,
			'version' 	=> $this->version,
			'dir' 		=> $this->dir,
			'url' 		=> $this->url,
			'name' 		=> $this->name,
			'views'		=> $this->views,
			'css'		=> $this->css,
			'js'		=> $this->js
		);
		
		return $details;
	}	

	/**
	 * Retrieve a view.
	 *
	 * Will look for same named file in child theme, then theme, then plugin in views directory.
	 */
	public function get_view( $view ) {
		
		/**
		 * Add .php extension
		 */
		$view = $view . '.php';
		
		/**
		 * Include file if exists in child theme
		 */
		if ( file_exists( trailingslashit( $this->stylesheet_dir ). $view ) ) {
			include( trailingslashit( $this->stylesheet_dir ) . $view );
			
		/**
		 * Include file if exists in parent theme
		 */
		} elseif ( file_exists( trailingslashit( $this->template_dir  ) . $view ) ) {
			include( trailingslashit( $this->template_dir ) . $view );
			
		/**
		 * Include from plugin if it is not in child theme or parent theme
		 */
		} elseif ( file_exists( trailingslashit( $this->views_dir ) .  $view ) ) {
			include( trailingslashit( $this->views_dir ) . $view );
		}
	}		
}
