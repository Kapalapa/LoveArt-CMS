<?php

class StaticContent {

	// Static output data
	private $staticData = '';

	public function __construct($instance_id) {
		$this->staticData = 'Miluju te niky';
	}

	public function getOutput() {
		return $this->staticData;
	}


}
?>