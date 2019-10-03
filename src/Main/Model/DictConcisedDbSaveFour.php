<?php

namespace Main\Model;

class DictConcisedDbSaveFour {

	protected $_Data = array();

	public function run () {

		// ## 載入資料
		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised.txt';

		$loader = (new \Dict\SerializeData\PhpSerialize\DataLoad)
			->setSourceFilePath($db_file_path)
			->run()
		;

		// ## 確認載入是否成功，若不成功，就不繼續執行下面的動作。
		if (!$loader->getIsOk()) {
			return;
		}


		// ## 挑選資料 - 挑選長度是四個字的
		$this->_Data = $loader->getData();
		$size = count($this->_Data);

		echo(PHP_EOL);
		echo('### 挑選開始 ###' . PHP_EOL);
		echo('	從原先的資料共 ' . $size . ' 筆，' . PHP_EOL);

		$list = array();

		foreach ($loader->getData() as $item) {
			//var_dump($item);

			$content = $item['B'];

			//$size = mb_strlen($content, 'UTF-8');
			$size = mb_strlen($content);

			if ($size != 4) { //排除長度不是4個字的。
				continue;
			}

			//var_dump($content);

			$list[] = $item;

		}

		$size = count($list);
		echo('	挑選出四個字的資料共 ' . $size . ' 筆。' . PHP_EOL);
		echo('=== 挑選完畢 ===' . PHP_EOL);

		// ## 儲存資料 - 將長度是四個字的儲存到新的檔案

		echo(PHP_EOL);
		echo('### 存檔開始 ###' . PHP_EOL);

		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised-Four.txt';

		$serialize = (new \Dict\SerializeData\PhpSerialize\DataSave)
			->setTargetFilePath($db_file_path)
			->setData($list)
			->run()
		;

		echo('	檔案: ' . $db_file_path . PHP_EOL);

		echo('=== 存檔完畢 ===' . PHP_EOL);

	}
}
