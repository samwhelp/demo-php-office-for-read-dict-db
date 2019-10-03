<?php

namespace Main\Demo;

class DictConcisedDbLoadLink {

	public function run () {

		// ## 載入資料
		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised-Link.txt';

		$loader = (new \Dict\SerializeData\PhpSerialize\DataLoad)
			->setSourceFilePath($db_file_path)
			->run()
		;

		var_dump($loader->getData());

		// ## 巡迴資料
		/*
		foreach ($loader->getData() as $item) {
			var_dump($item);
		}
		*/


	}
}
