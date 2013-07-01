<?php
	

	// Error reporting on
	ini_set('display_errors',1); 
 	error_reporting(E_ALL);

 	// Load configuration file
	require_once '../config.php';

	// Load core class files
	require_once $_config['web']['basedir']. '/lib/autoloading.class.php';	
	
	// Set autoloading dirs
	autoLoading::$basedir = $_config['web']['basedir'];
	autoloading::$classdir = 'lib';

	// Autoload files
	spl_autoload_register(array('autoLoading', 'classLoader'));

	// Set web dir
	web::$dir = $_config['web']['basedir'];

	// Set theme web dir
	theme::$workingDir = $_config['web']['tpldir'];
	theme::$themesAdminDir = 'themes/admin';

	// Instanciate main object of website
	$website = new Admin($_config);

	echo $website->showWebsite();

?>