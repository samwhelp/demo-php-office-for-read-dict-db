<?php

namespace Main\Action;

class DictConcisedLinkList {

	public function run () {

		// ## 產生成語接龍的各種排列組合結果
		$model = (new \Main\Model\DictConcisedLinkList)
			->run()
		;

		// ## 將結果印到「標準輸出」
		$writer = (new \Dict\LinkResult\ToStdOut)
			->setData($model->getTargetData())
			->run()
		;

	}




}
