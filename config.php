<?php

	// Define absolute rootpath
	define('ROOTPATH', dirname(__FILE__));

	/* DB Configuration */

	$_config['db']['server'] = 'localhost';

	$_config['db']['dbname'] = 'loveart_cms';
	
	$_config['db']['username'] = 'loveart_cms';
	
	$_config['db']['password'] = '881997';

	$_config['db']['charset'] = 'utf8';

	$_config['db']['prefix'] = 'love_';


	/* DIR Configuration */
	$_config['web']['tpldir'] = '/projects/loveart_cms';

	$_config['web']['basedir'] = ROOTPATH;

	$_config['web']['url'] = 'http://localhost/projekty/loveart_cms';


	/* Web configurations */
	$_config['web']['settings']['title'] = 'LoveArt Default title';
	$_config['web']['settings']['theme'] = 'defaualt';
	
	/* Admin configurations */
	$_config['admin']['settings']['title'] = 'LoveArt CMS 1.0';
	$_config['admin']['settings']['theme'] = 'default';


	/* Debugger */
	$_config['web']['debug'] = true;
	$_config['admin']['debug'] = true;
?>	