<?php

namespace Main\Model;

class DictRevisedDbSave {

	public function run () {

		$loader = (new \Dict\DictRevised\DataLoadAll)
			->run()
		;

		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictRevised.txt';

		$serialize = (new \Dict\SerializeData\PhpSerialize\DataSave)
			->setTargetFilePath($db_file_path)
			->setData($loader->getData())
			->run()
		;

	}
}
