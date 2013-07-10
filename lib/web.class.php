<?php

class Web {

	// Dir
	public static $dir;

	// DB handler
	public static $db;

	// Active page
	public static $page;

	// Theme handler
	protected $theme;

	// Admin indentificator
	protected $admin = false;

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

		$act_page = (!empty($_GET['page'])) ?  $_GET['page'] : 'index';

		try {

			// Get page from db
			self::$page = $this->loadPage($act_page);

			// Connect to database
			self::$db = $this->establishDB($_config['db']);

			// Configure website from database data
			// TODO - some class members can be loaded from DB to pretend extensive loading from DB

			// Inicialize theme
			$this->theme = $this->webThemeInit();

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
	 * -- get some info data about page
	 * @param $page active page
	 * @return page id
	*/
	protected function loadPage($page) {

	}

	/* Database establish
     * @param $dbconfig database configuration data
    */ 
	protected function establishDB($dbconfig) {

		// Set dns
		$dns = 'mysql:dbname='.$dbconfig['dbname'].';host='. $dbconfig['server'] .';charset='.$dbconfig['charset'].'';
		
		// Return instance to db
		return new PDO($dns, $dbconfig['username'], $dbconfig['password']);
	
	}

	/* Instanciate webtheme
	 * -- TODO: DEFENSIVE PROGRAMMING
     * @param $webconfig webconfiguration data
    */ 
	protected function webThemeInit() {

		// Instanciate theme
		return new Theme((get_class() == 'web') ? false :  true);

	}

	/* Init modules on webpage
	*/
	protected function webModulesInit() {
		
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