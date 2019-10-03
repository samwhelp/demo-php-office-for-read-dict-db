<?php

namespace Dict\DictIdiom;

class DataLoadAll {

	protected $_Data = array();
	public function getData () {
		return $this->_Data;
	}


	public function run () {
		$list = array(
			THE_CLI_VAR_DIR_PATH . '/dict_idioms/dict_idioms_2011_20190329.xls'
		);

		$this->_Data = array();
		foreach ($list as $key => $file_path) {
			$loader = (new \Dict\DictIdiom\DataLoader)
				->setSourceFilePath($file_path)
				->run()
			;
			$this->_Data += $loader->getData();
		}

		return $this;
	}
}
