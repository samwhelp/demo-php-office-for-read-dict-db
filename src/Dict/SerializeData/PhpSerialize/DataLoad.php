<?php

namespace Dict\SerializeData\PhpSerialize;

class DataLoad {

	protected $_SourceFilePath = '';
	public function setSourceFilePath ($val) {
		$this->_SourceFilePath = $val;
		return $this;
	}

	protected $_Data = array();
	public function getData () {
		return $this->_Data;
	}

	protected $_IsOk = false;
	public function getIsOk () {
		return $this->_IsOk;
	}

	public function run () {

		// ## 檢查「來源檔案」是否存在
		if (!file_exists($this->_SourceFilePath)) {
			$this->_IsOk = false;

			echo(PHP_EOL);
			echo('!!! 載入失敗 !!!' . PHP_EOL);
			echo('	檔案不存在: ' . $this->_SourceFilePath . PHP_EOL);
			echo('=== 載入失敗 ===' . PHP_EOL);
			echo PHP_EOL;
			return $this;
		}

		//https://www.php.net/manual/en/function.file-get-contents.php
		$this->_Content = file_get_contents($this->_SourceFilePath);

		//https://www.php.net/manual/en/function.unserialize.php
		$this->_Data = unserialize($this->_Content);

		$this->_IsOk = true;
		return $this;
	}

}
