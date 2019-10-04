<?php

namespace Main\Action;

class DictConcisedLinkListSaveAsOds {

	public function run () {

		// ## 產生成語接龍的各種排列組合結果
		$model = (new \Main\Model\DictConcisedLinkList)
			->run()
		;


		// ## 將結果儲存成 ods
		$file_path = THE_CLI_VAR_DIR_PATH . '/result/link-result.ods';

		$writer = (new \Dict\LinkResult\SaveAsOds)
			->setTargetFilePath($file_path)
			->setData($model->getTargetData())
			->run()
		;

		echo('儲存檔案: ' . $file_path . PHP_EOL);

	}




}
