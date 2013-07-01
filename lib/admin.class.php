<?php

class Admin extends Web {


	public function __construct($_config, $admin = false) {

		$logged = false;

		// If not logged in, show login

		$act_page = (!empty($_GET['page'])) ?  $_GET['page'] : 'index';

		try {

			// Get page from db
			self::$page = $this->loadPage($act_page);

			// Connect to database
			self::$db = $this->establishDB($_config['db']);

			// Configure website from database data
			// TODO - some class members can be loaded from DB to pretend extensive loading from DB

			// If not logged in, show login
			if (!$logged)
				$this->theme = $this->adminLogin();
			else
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

	private function adminLogin() {
		return new Theme(true, 'login');
	}	

}

?>