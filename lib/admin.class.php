<?php

define("DEFAULT_ADMIN_PAGE", "homepage");

class Admin extends Web {


	/* Admin inicialization is subclass of web
	 * $_config 
	*/
	public function __construct($_config) {

		$logged = true;

		// Set debug mode
		self::$debug = $_config['admin']['debug'];

		// Set active page
		$act_page = (!empty($_GET['page'])) ?  $_GET['page'] : DEFAULT_ADMIN_PAGE;

		// Establish db connection
		self::$db = new Database($_config['db']['server'], $_config['db']['dbname'], $_config['db']['username'], $_config['db']['password'], $_config['db']['charset'], $_config['db']['prefix']);

		// Configure website from database data
		$this->loadWebConfig($_config['admin']['settings'], true);

		// Get page from db
		$this->page = $this->loadPage($act_page, true);

		// Inicialize theme

		if (!$logged)
			$this->theme = $this->adminLogin();
		else
			$this->theme = $this->adminThemeInit();

		// Inicialize modules
		$this->webModulesInit();

		(self::$debug ) ? var_dump(self::$errors) : null;

	}


	/* Instanciate webtheme
	 * -- TODO: DEFENSIVE PROGRAMMING
     * @param $webconfig webconfiguration data
    */ 
	private function adminThemeInit() {

		// DEBUG OUTPUT
		(self::$debug ) ? var_dump($this->page) : null;

		// Instanciate theme
		return new Theme(true, (!empty($this->page['theme'])) ? $this->page['theme'] : null);

	}

	private function adminLogin() {
		return new Theme(true, 'login');
	}	

}

?>