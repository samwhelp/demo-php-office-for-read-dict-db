<?php

namespace Main\Action;

class DictConcisedLinkBaseSaveAsOds {

	public function run () {

		// ## 產生成語接龍基本對應表
		$model = (new \Main\Model\DictConcisedLinkBase)
			->run()
		;


		// ## 將結果儲存成 ods
		$file_path = THE_CLI_VAR_DIR_PATH . '/result/link-base.ods';

		$writer = (new \Dict\LinkBase\SaveAsOds)
			->setTargetFilePath($file_path)
			->setData($model->getTargetData())
			->run()
		;

		echo('儲存檔案: ' . $file_path . PHP_EOL);

	}




}
