<?php

namespace Main\Demo\Json;

class DictConcisedDbLoad {

	public function run () {

		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised.json';

		$loader = (new \Dict\SerializeData\JsonSerialize\DataLoad)
			->setSourceFilePath($db_file_path)
			->run()
		;

		//var_dump($loader->getData());

		$list = array();

		foreach ($loader->getData() as $item) {
			$content = $item['B'];

			//var_dump($item);

			//$size = mb_strlen($content, 'UTF-8');
			$size = mb_strlen($content);

			if ($size != 4) {
				continue;
			}


			$list[] = $item;

		}

		var_dump($list);

		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised-Four.json';

		$serialize = (new \Dict\SerializeData\JsonSerialize\DataSave)
			->setTargetFilePath($db_file_path)
			->setData($list)
			->run()
		;

		//var_dump($list);
	}
}
