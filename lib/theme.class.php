<?php

class Theme {

	// Themes working directory
	public static $workingDir = '';

	// Themes web directory
	public static $themesWebDir = 'themes/web'; 
	
	// Themes admin directory
	public static $themesAdminDir = 'themes/admin'; 

	// Active theme
	public static $activeTheme = 'default';

	// Active admin theme
	public static $activeAdminTheme = 'default';

	// Theme full dir
	private $themeDir = '';

	// Theme data
	private $themeData = '';

	// Admin status
	private $admin;

	/* Inicialize theme
    */ 
	public function __construct ($admin = false, $specific = NULL) {

		// Set admin status
		$this->admin = $admin;

		// Set theme full directory
		$this->themedir = ($this->admin) ? self::$themesAdminDir . '/' . self::$activeAdminTheme : self::$themesWebDir . '/' . self::$activeTheme;

		// Load theme from file
		$this->themeData = $this->loadThemeData($specific);

		// Add absolute path to template
		$this->templateReplace('absolute_path',  theme::$workingDir . '/' . $this->themedir . '/');
	}

	/* Method to get theme string
	 * @return theme data string
    */ 
	public function getThemeData() {

		return $this->themeData;
	}

	/* Method to init specific module
	 * $moduleName name of module to init
    */ 
	public function initModule($moduleName) {

		// Instanciace new module
		$module = new Module($moduleName);

		// Get templates of module
		$templates = $module->getOutput();

		// Add tempates to data output
		foreach($templates as $position => $template) {
			$this->templateReplace($position, $template);
		}		 

	}
	
	/* Method that make replace of part of template to module output
	 * @param $subject place identificator
	 * @param $item module to insert
	*/
	private function templateReplace($subject, $item) {

		$this->themeData = str_replace('<% '. $subject .' %>', $item, $this->themeData);
	}

	/* Method to load theme data from file to string
	 * @return theme data string
	*/
	private function loadThemeData($specific) {

		// Set theme folder
		$themefolder = ($this->admin) ? self::$themesAdminDir : self::$themesWebDir; 

		// Set file name
		$filename = ($specific == NULL) ? 'index.tpl' : $specific .'.tpl';

		var_dump($filename);

		// If file not exit's, throw expcetion

		if (($readData = file_get_contents(web::$dir . '/' . $this->themedir . '/' . $filename)) === FALSE)
			throw new Exception('Theme\'s file doent exists');

		// return string with data
		return $readData;	
	}

}

?>