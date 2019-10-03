<?php

namespace Dict\Base;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class DataLoader {

	// https://en.wikipedia.org/wiki/Fluent_interface#PHP

	protected $_SourceFilePath = '';
	public function setSourceFilePath ($val) {
		$this->_SourceFilePath = $val;
		return $this;
	}

	protected $_SourceSpreadsheet = NULL;

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

		echo(PHP_EOL);
		echo('### 載入開始 ###' . PHP_EOL);
		echo('	檔案: ' . $this->_SourceFilePath . PHP_EOL);

		// ## 載入來源檔案
		// https://phpoffice.github.io/PhpSpreadsheet/master/PhpOffice/PhpSpreadsheet/IOFactory.html#method_load
		// https://phpoffice.github.io/PhpSpreadsheet/master/PhpOffice/PhpSpreadsheet/Spreadsheet.html
		$this->_SourceSpreadsheet = IOFactory::load($this->_SourceFilePath);

		// ## 獲得來源資料
		// https://phpoffice.github.io/PhpSpreadsheet/master/PhpOffice/PhpSpreadsheet/Spreadsheet.html#method_getActiveSheet
		// https://phpoffice.github.io/PhpSpreadsheet/master/PhpOffice/PhpSpreadsheet/Worksheet/Worksheet.html#method_toArray

		$sheet = $this->_SourceSpreadsheet->getActiveSheet(); //目前使用的sheet，因為只有一個，所以呼叫這個就可以了

		$this->_Data = $sheet->toArray(null, true, true, true); //將sheet的資料，轉成php的array來操作。

		$size = count($this->_Data);

		echo('	共載入 ' . $size . ' 筆資料。' . PHP_EOL);

		echo('=== 載入完畢 ===' . PHP_EOL);

		$this->_IsOk = true;
		return $this;
	}
}
