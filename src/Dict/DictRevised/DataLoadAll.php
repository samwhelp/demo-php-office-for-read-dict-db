<?php

namespace Dict\DictRevised;

class DataLoadAll {

	protected $_Data = array();
	public function getData () {
		return $this->_Data;
	}


	public function run () {
		$list = array(
			THE_CLI_VAR_DIR_PATH . '/dict_revised/dict_revised_2015_20190329_1.xls',
			THE_CLI_VAR_DIR_PATH . '/dict_revised/dict_revised_2015_20190329_2.xls',
			THE_CLI_VAR_DIR_PATH . '/dict_revised/dict_revised_2015_20190329_3.xls',
		);

		$this->_Data = array();
		foreach ($list as $key => $file_path) {
			$loader = (new \Dict\DictRevised\DataLoader)
				->setSourceFilePath($file_path)
				->run()
			;
			$this->_Data += $loader->getData();
		}

		return $this;
	}
}
