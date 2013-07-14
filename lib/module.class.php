<?php

class Module {

	private $moduleOutput = array();

	/* Module inicialization
     * @param $modulename name of module
    */ 
	public function __construct($modulename, $page) {
		
		// Load plugins to module
		switch($modulename) {
			
			// headmodule -> speficif operations
			case 'head':
				$this->headModule($page);
				break;
		
			// others modules -> get plugins	
			default:
				$this->loadModule($modulename, $page);
				break;
		}
	}

	/* Head module set html head data
    */ 
	private function headModule($page) {

		// Join webtitle with page title if exits
		$this->moduleOutput['title'] =  (empty($page['title'])) ? web::$settings['title'] : web::$settings['title']. " - " . $page['title'];
		$this->moduleOutput['description'] = web::$settings['description'];
		$this->moduleOutput['keywords'] = web::$settings['keywords'];
		$this->moduleOutput['author'] = web::$settings['author'];
		$this->moduleOutput['copyright'] = web::$settings['copyright'];
	}

	/* Load plugins to module
     * @param $modulename name of module
    */ 
	private function loadModule($modulename, $page) {

		// Call plugin
		// TODO: LOAD MODULES DATA FROM DB
		// -> load all plugins related with specific module in RANK order
		$plugin = new StaticPage();
		$this->moduleOutput['content'] = $plugin->getOutput();
	}

	/* Data output of module
	 * @return output module data 
    */ 
	public function getOutput() {
		return $this->moduleOutput;
	}
};

?>