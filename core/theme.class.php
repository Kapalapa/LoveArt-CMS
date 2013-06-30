<?php

class Theme {

	// Themes directory
	public static $themesDir = 'themes'; 

	// Theme data
	private $themeData = '';

	// Active theme
	private $activeTheme = 'default';

	/* Inicialize theme
    */ 
	public function __construct () {

		// Load theme from file
		$this->themeData = $this->loadThemeData();
	}

	/* Method to get theme string
	 * @return theme data string
    */ 
	public function getThemeData() {

		return $this->themeData;
	}

	/* Method to init specific module
    */ 
	public function initModule($moduleName) {

		$module = new Module($moduleName);

		// Get templates of module
		$templates = $module->getOutput();

		// Add tempates to data output
		foreach($templates as $position => $template) {

			$this->themeData = str_replace('<% '. $position .' %>', $template, $this->themeData);
		}		 

	}

	/* Method to load theme data from file to string
	 * @return theme data string
	*/
	private function loadThemeData() {

		// If file not exit's, throw expcetion
		if (($readData = file_get_contents(web::$dir .'/' . self::$themesDir . '/' . $this->activeTheme . '/index.tpl')) === FALSE)
			throw new Exception('Theme\'s file doent exists');

		// return string with data
		return $readData;	
	}

}

?>