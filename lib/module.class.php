<?php

class Module {

	// Array with all output data with specific places
	private $moduleOutput = array();

	// ID of instance module
	private $moduleData;

	/* Module inicialization
     * @param $modulename name of module
    */ 
	public function __construct($modulename, $page, $admin) {
		
		// Load plugins to module
		switch($modulename) {
			
			// headmodule -> speficif operations
			case 'head':
				$this->headModule($page);
				break;
		
			case 'admin_login':
				$this->moduleOutput[$modulename] = admin::loginForm();
				break;

			// others modules -> get plugins	
			default:
				// Load module data

				$contentTable =  (!$admin) ? "content" : "admin_content";
				web::$db->query("
				SELECT
						".database::$prefix ."plugin.name,
						".database::$prefix . $contentTable .".plugin_instance_id
				FROM 	
						".database::$prefix . "module,
						".database::$prefix . $contentTable .", 
						".database::$prefix . "plugin	
				WHERE 	
						".database::$prefix . "module.name = :modulename AND
						page_id = :pageid AND
						plugin_id = ".database::$prefix . "plugin.id AND
						module_id = ".database::$prefix . "module.id
				ORDER BY rank
				 ");
				web::$db->bind(":modulename", $modulename);
				web::$db->bind(":pageid", $page['id']);
				$this->moduleData = web::$db->resultset(); 

				(web::$debug ) ? var_dump($this->moduleData) : null;
				

				$this->loadModule($modulename, $page);
				break;
		}
	}

	/* Head module set html head data
    */ 
	private function headModule($page) {

		// Join webtitle with page title if exits
		$this->moduleOutput['title'] =  (empty($page['title'])) ? web::$settings['title'] : web::$settings['title']. " - " . $page['title'];
		
		// Set head module other data
		$this->moduleOutput['description'] = web::$settings['description'];
		$this->moduleOutput['keywords'] = web::$settings['keywords'];
		$this->moduleOutput['author'] = web::$settings['author'];
		$this->moduleOutput['copyright'] = web::$settings['copyright'];
	}

	/* Load plugins to module
     * @param $modulename name of  module
    */ 
	private function loadModule($modulename, $page) {

		$plugin = "";

		$this->moduleOutput[$modulename] = "";
		
		// Call plugin
		foreach ($this->moduleData as $key => $pluginData) {
			$plugin = new $pluginData['name']($pluginData['plugin_instance_id']);
			$this->moduleOutput[$modulename] .= $plugin->getOutput();
		}
		
	}

	/* Data output of module
	 * @return output module data 
    */ 
	public function getOutput() {
		return $this->moduleOutput;
	}
};

?>