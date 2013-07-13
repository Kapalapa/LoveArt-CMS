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

		// TODO: ADD MORE DATA FROM DB
		$this->moduleOutput['title'] =  (empty($page['title'])) ? web::$settings['title'] : web::$settings['title']. " - " . $page['title'];
		$this->moduleOutput['author'] = 'Karel Juricka';
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