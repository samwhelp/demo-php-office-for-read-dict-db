<?php

namespace Main\Action;

class DictConcisedLinkListSaveAsOds {

	public function run () {

		// ## 產生成語接龍的各種組合結果
		$model = (new \Main\Model\DictConcisedLinkList)
			->run()
		;

		// ## 將結果儲存成 ods
		$writer = (new \Dict\LinkResult\SaveAsOds)
			->setTargetFilePath(THE_CLI_VAR_DIR_PATH . '/result/link-result.ods')
			->setData($model->getTargetData())
			->run()
		;

	}




}
