<?php

namespace Main\Demo;

class DictConcisedDbLoadFour {

	public function run () {

		// ## 載入資料
		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised-Four.txt';

		$loader = (new \Dict\SerializeData\PhpSerialize\DataLoad)
			->setSourceFilePath($db_file_path)
			->run()
		;

		//var_dump($loader->getData());

		// ## 巡迴資料
		foreach ($loader->getData() as $item) {
			//var_dump($item);
			$content = $item['B'];
			echo($content . PHP_EOL);
		}


	}
}
