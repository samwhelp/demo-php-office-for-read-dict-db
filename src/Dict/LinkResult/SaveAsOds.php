<?php

namespace Dict\LinkResult;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Ods;


class SaveAsOds {

	protected $_Spreadsheet;

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

	public function __construct () {

		$this->_Spreadsheet = new Spreadsheet();

		$sheet = $this->_Spreadsheet->getActiveSheet();

		// 設定欄位名稱
		$sheet->setCellValue('A1', '開頭');

	}

	public function run () {

		$this->syncData();

		if (!$this->_TargetFilePath) {
			$this->_TargetFilePath = THE_CLI_VAR_DIR_PATH . '/result/link-result.ods';
		}

		$this->prepDir();

		$writer = new Ods($this->_Spreadsheet);
		$writer->save($this->_TargetFilePath);

		return $this;
	}

	protected function syncData () {
		$sheet = $this->_Spreadsheet->getActiveSheet();

		foreach ($this->_Data as $row => $list) {
			foreach ($list as $col => $val) {
				 $sheet->setCellValueByColumnAndRow($col+1, $row+2, $val);
			}
		}
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
