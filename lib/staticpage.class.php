<?php

class StaticPage {

	// Static output data
	private $staticData = '';

	public function __construct() {
		$this->staticData = 'Miluju te niky';
	}

	public function getOutput() {
		return $this->staticData;
	}


}
?>