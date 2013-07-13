<?php

define ("DEFAULT_PAGE", "homepage");

class Web {

	// Dir
	public static $dir;

	// Title
	public static $settings = array();

	// DB handler
	public static $db;

	// DEBUG MOD
	public static $debug = false;

	// Active page
	protected $page = array();

	// Theme handler
	protected $theme;

	// FOR NOW: hash with error messages
	public static $errors = array();

	// Modules
	protected $modules = array (
		'head' => '',
		'content' => '',
		'absolute_path' => ''
	);

	/* WEB inicialization
     * @param $_config configuration data
    */ 
	public function __construct($_config) {

		// Set debug mode
		self::$debug = $_config['web']['debug'];

		// Set active page
		$act_page = (!empty($_GET['page'])) ?  $_GET['page'] : DEFAULT_PAGE;

		// Establish db connection
		self::$db = new Database($_config['db']['server'], $_config['db']['dbname'], $_config['db']['username'], $_config['db']['password'], $_config['db']['charset'], $_config['db']['prefix']);

		// Configure website from database data
		$this->loadWebConfig($_config['web']['settings']);

		// Get page from db
		$this->page = $this->loadPage($act_page);

		// Inicialize theme
		$this->theme = $this->webThemeInit();

		// Inicialize modules
		$this->webModulesInit();

		// DEBUG: show errors
		(self::$debug ) ? var_dump(self::$errors) : null;

	}

	/* Load webconfig from database, if empty, use configuration file settings
	 * @param $config configuration data array 
	*/
	protected function loadWebConfig($settings, $admin = false) {

		// Set table where pages are
		$settingsTable = (!$admin) ? "settings" : "admin_settings";

		var_dump($settingsTable);

		// Select web settings from database	
		try {
		
			self::$db->query("SELECT title, theme FROM ".database::$prefix.$settingsTable);
		
		// If no row was selected, use config settings
		// TODO: for every column check if it exits in db (is not NULL)
		if (!(self::$settings = self::$db->single()))
			self::$settings = $settings;

		}

		// If db error, use configuration file settings
		catch (PDOException $e) {
			self::$errors['db'] = $e->getMessage();
			self::$settings = $settings;
		}

		// DEBUG OUTPUT
		(self::$debug ) ? var_dump(self::$settings) : null;
	}

	/* TODO:
	 * Check in database if page exits
	 * -- throw expcetion if not
	 * @param $page active page
	 * @return hash with page info
	*/
	protected function loadPage($page, $admin = false) {

		// Set table where pages are
		$pageTable = (!$admin) ? "page" : "admin_page";

		// Load page data from DB
		self::$db->query("SELECT id, name, title, theme FROM ".database::$prefix . $pageTable ." WHERE name = :pagename");
		self::$db->bind(":pagename", $page);
		
		return self::$db->single();
	}

	/* Init modules on webpage
	*/
	protected function webModulesInit() {
		
		// Loop inicializing modules
		foreach($this->modules as $key => $value) {
			$this->modules[$key] = $this->theme->initModule($key, $this->page);	
		}
	}

	/* Show website output
	 * @return string with output data
	 */
	public function showWebsite() {
		return $this->theme->getThemeData();
	}

	/* Instanciate webtheme
	 * -- TODO: DEFENSIVE PROGRAMMING
     * @param $webconfig webconfiguration data
    */ 
	private function webThemeInit() {

		// DEBUG OUTPUT
		(self::$debug ) ? var_dump($this->page) : null;

		// Instanciate theme
		return new Theme(false, (!empty($this->page['theme'])) ? $this->page['theme'] : null);

	}
}


?>