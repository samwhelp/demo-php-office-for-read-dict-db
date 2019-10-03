<?php

namespace Dict\SerializeData\PhpSerialize;

class DataSave {

	protected $_TargetFilePath = '';
	public function setTargetFilePath ($val) {
		$this->_TargetFilePath = $val;
		return $this;
	}

	protected $_Data = array();
	public function setData ($val) {
		$this->_Data = $val;
		return $this;
	}

	protected $_Content = '';

	public function run () {

		$this->prepDir();

		//https://www.php.net/manual/en/function.serialize.php
		$this->_Content = serialize($this->_Data);

		//https://www.php.net/manual/en/function.file-put-contents.php
		file_put_contents($this->_TargetFilePath, $this->_Content);

		return $this;
	}

	protected function prepDir () {
		$dir_path = dirname($this->_TargetFilePath);
		//var_dump($dir_path);

		//https://www.php.net/manual/en/function.file-exists.php
		if (file_exists($dir_path)) {
			return;
		}

		//https://www.php.net/manual/en/function.mkdir.php
		mkdir($dir_path, 0755, true);
	}

}
