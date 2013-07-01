<?php

class Module {

	private $moduleOutput = array();

	/* Module inicialization
     * @param $modulename name of module
    */ 
	public function __construct($modulename) {
		
		// Load plugins to module
		switch($modulename) {
			
			// headmodule -> speficif operations
			case 'head':
				$this->headModule();
				break;
		
			// others modules -> get plugins	
			default:
				$this->loadModule($modulename);
				break;
		}
	}

	/* Head module set html head data
    */ 
	private function headModule() {

		$this->moduleOutput['title'] = 'Web Title';
		$this->moduleOutput['author'] = 'Karel Juricka';


	}

	/* Load plugins to module
     * @param $modulename name of module
    */ 
	private function loadModule($modulename) {

		// Call plugin
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