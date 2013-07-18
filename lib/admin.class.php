<?php

define("DEFAULT_ADMIN_PAGE", "homepage");
define("ADMIN_BOOL", true);



class Admin extends Web {

	private $modules = array (
		'head' => '',
		'absolute_path' => '',
		'admin_login' => ''
	);


	/* Admin inicialization is subclass of web
	 * $_config 
	*/
	public function __construct($_config) {


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

		if (!isset($_SESSION['admin-user']))
			$this->theme = new Theme(ADMIN_BOOL, 'login');
		else
			$this->theme = new Theme(ADMIN_BOOL, (!empty($this->page['theme'])) ? $this->page['theme'] : null);
		// Inicialize modules
		$this->adminModulesInit();

		(self::$debug ) ? var_dump(self::$errors) : null;

	}

	private function adminModulesInit() {
		
		// Loop inicializing modules
		foreach($this->modules as $key => $value) {
			// Instanciate new module
			$this->modules[$key] = new Module($key, $this->page, ADMIN_BOOL);
			// Add module output to theme
			$this->theme->setModuleOutput($this->modules[$key]);
		}

	}
	

	// ADMIN LOGIN FORM
	// TODO: REBUILD TO BETTER VERSION
	public static function loginForm() {

		$errors = "";

		// Login programming
		if (isset($_POST['username'])) {
			if (empty($_POST['username']) || empty($_POST['password']))
				$errors .= "Missing username or password";

			else {
				self::$db->query("SELECT id,username,password FROM ".database::$prefix . "admin_user WHERE username = :username ");
				self::$db->bind(":username", $_POST['username']);

				$adminUserData = self::$db->single();

				if ($_POST['password'] != $adminUserData['password']) {
					$errors .= "Wrong password";
				}

				else {
					$_SESSION['admin-user'] = $adminUserData['id'];
				}



				var_dump($adminUserData);

			}
		}


		$formOutput = "
			<em>
				".$errors."
			</em>
			<br />
			<br />
			<form method=\"POST\">
				Login: <input type=\"text\" name=\"username\"\><br />
				Password: <input type=\"password\" name=\"password\"\><br />
				<input type=\"submit\" value=\"LOGIN\"/>
			</form>
		";

		return $formOutput;
	}



}

?>