<?php

namespace Main\Demo\Json;

class DictConcisedDbSave {

	public function run () {

		$loader = (new \Dict\DictConcised\DataLoadAll)
			->run()
		;

		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised.json';

		$serialize = (new \Dict\SerializeData\JsonSerialize\DataSave)
			->setTargetFilePath($db_file_path)
			->setData($loader->getData())
			->run()
		;


	}
}
