<?php

namespace Main\Action;

class DictConcisedDbSaveLink {

	public function run () {

		// ## 產生成語接龍基本對應表
		$model = (new \Main\Model\DictConcisedLinkBase)
			->run()
		;

		// ## 將結果儲存成「php serialize」格式。
		$file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised-Link.txt';

		$writer = (new \Dict\SerializeData\PhpSerialize\DataSave)
			->setTargetFilePath($file_path)
			->setData($model->getTargetData())
			->run()
		;

	}




}
