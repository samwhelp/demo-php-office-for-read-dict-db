<?php

namespace Main\Model;

class DictConcisedDbSave {

	public function run () {

		// ## 載入資料 - 將xls資料載入。
		$loader = (new \Dict\DictConcised\DataLoadAll)
			->run()
		;

		// ## 儲存資料 - 將格式轉成「php serialize」的格式，然後存檔。
		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised.txt';

		$serialize = (new \Dict\SerializeData\PhpSerialize\DataSave)
			->setTargetFilePath($db_file_path)
			->setData($loader->getData())
			->run()
		;

	}
}
