<?php

namespace Main\Model;

class DictConcisedLinkBase {

	protected $_SourceData = array();


	protected $_TargetData = array();
	public function getTargetData () {
		return $this->_TargetData;
	}


	public function run () {

		// ## 載入資料
		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised-Four.txt';

		$loader = (new \Dict\SerializeData\PhpSerialize\DataLoad)
			->setSourceFilePath($db_file_path)
			->run()
		;


		// ## 產生對照表
		$this->_SourceData = $loader->getData();

		$list = array();

		foreach ($this->_SourceData as $item) {

			//var_dump($item);

			$content = $item['B']; // 「欄位B」的值就是「成語」。

			//$size = mb_strlen($content, 'UTF-8');
			$size = mb_strlen($content);
			if ($size != 4) { // 排除長度不是4個字的。基本上資料來源都是四個字的，這個只是再次確保。
				continue;
			}

			$last_two = mb_substr($content, 2, 2); // 找出主要成語的後面兩個字。 例如：content若是「會心一笑」，這裡找到的兩個字就是「一笑」。
			$link_list = $this->findTargetList_ByFirstTwo($last_two); //根據上面找到的兩個字，找到開頭兩個字的成語。上面的例子「一笑」，所以就找出是「一笑」開頭的。

			if (empty($link_list)) { // 若找不到後面可以接龍的成語
				continue; // 掠過下面動作不處理。
			}

			$list[$content] = $link_list; //將找到的，接龍成語列表，存到該成語的對應表。

		}

		$this->_TargetData = $list;

		return $this;
	}

	public function findTargetList_ByFirstTwo ($val) {
		$list = array();

		foreach ($this->_SourceData as $item) {
			$content = $item['B'];

			//$size = mb_strlen($content, 'UTF-8');
			$size = mb_strlen($content);
			if ($size != 4) {
				continue;
			}

			if (mb_substr($content, 0, 2) !== $val) {
				continue;
			}



			//$list[] = $item;
			$list[] = $content;

		}

		return $list;
	}

	public function findTargetList_ByLastTwo ($val) {
		$list = array();

		foreach ($this->_SourceData as $item) {
			$content = $item['B'];

			//$size = mb_strlen($content, 'UTF-8');
			$size = mb_strlen($content);
			if ($size != 4) {
				continue;
			}

			if (mb_substr($content, 2, 2) !== $val) {
				continue;
			}

			//$list[] = $item;
			$list[] = $content;

		}

		return $list;
	}



}
