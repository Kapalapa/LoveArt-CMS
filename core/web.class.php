<?php

class Web {

	// Dir
	public static $dir;

	// DB handler
	public static $db;

	// Active page
	public static $page;

	// Theme handler
	private $theme;

	// Admin indentificator
	private $admin;

	// Modules
	private $modules = array (
		'head' => '',
		'content' => ''
	);

	/* WEB inicialization
     * @param $_config configuration data
     * @param $admin boolean, true if is admin interface
    */ 
	public function __construct($_config, $admin = false) {

		// Set admin status
		$this->admin = $admin;

		$act_page = (!empty($_GET['page'])) ?  $_GET['page'] : 'index';

		try {

			// Get page from db
			self::$page = $this->loadPage($act_page);

			// Connect to database
			self::$db = $this->establishDB($_config['db']);

			// Configure website from database data
			// TODO - some class members can be loaded from DB to pretend extensive loading from DB

			// Inicialize theme
			$this->theme = $this->webThemeInit($_config['web']);

			// Inicialize modules
			$this->webModulesInit();


		}

		// TODO : EXCEPTION CLASS
		catch (PDOException $e)	{
			printf("Connection failed: ". $e->getMessage());
		}

		catch (Exception $e) {
			printf("Error: ". $e->getMessage() ."<br />");
		}
	}

	/* TODO:
	 * Check in database if page exits
	 * -- throw expcetion if not
	 * -- get page id which all cms then use as identificator
	 * @param $page active page
	 * @return page id
	*/
	private function loadPage($page) {

	}

	/* Database establish
     * @param $dbconfig database configuration data
    */ 
	private function establishDB($dbconfig) {

		// Set dns
		$dns = 'mysql:dbname='.$dbconfig['dbname'].';host='. $dbconfig['server'] .';charset='.$dbconfig['charset'].'';
		
		// Return instance to db
		return new PDO($dns, $dbconfig['username'], $dbconfig['password']);
	
	}

	/* Instanciate webtheme
	 * -- TODO: DEFENSIVE PROGRAMMING
     * @param $webconfig webconfiguration data
    */ 
	private function webThemeInit($webconfig) {

		// Instanciate theme
		return new Theme();

	}

	/* Init modules on webpage
	*/
	private function webModulesInit() {
		
		// Loop inicializing modules
		foreach($this->modules as $key => $value) {
			$this->modules[$key] = $this->theme->initModule($key);	
		}

	}

	public function showWebsite() {
		return $this->theme->getThemeData();
	}
}


?>