<?php

namespace Dict\DictConcised;

class DataLoadAll {

	protected $_Data = array();
	public function getData () {
		return $this->_Data;
	}


	public function run () {
		$list = array(
			THE_CLI_VAR_DIR_PATH . '/dict_concised/dict_concised_2014_20190411.xls'
		);

		$this->_Data = array();
		foreach ($list as $key => $file_path) {
			$loader = (new \Dict\DictConcised\DataLoader)
				->setSourceFilePath($file_path)
				->run()
			;
			$this->_Data += $loader->getData();
		}

		return $this;
	}
}
