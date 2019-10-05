<?php

namespace Main\Model;

class DictConcisedLinkList {

	protected $_SourceData = array();


	protected $_TargetData = array();
	public function getTargetData () {
		return $this->_TargetData;
	}


	public function run () {

		$db_file_path = THE_CLI_VAR_DIR_PATH . '/db/DictConcised-Link.txt';


		$loader = (new \Dict\SerializeData\PhpSerialize\DataLoad)
			->setSourceFilePath($db_file_path)
			->run()
		;


		$this->_SourceData = $loader->getData();



		foreach ($this->_SourceData as $main => $relation) {
			$pass = $this->createMetaData_ByMain($main);
			$this->walkMetaData($pass);
		}


		return $this;

	}


	public function findLinkList_ByMain ($main) {
		if (!array_key_exists($main, $this->_SourceData)) {
			return array();
		}

		return $this->_SourceData[$main];

	}


	public function createMetaData_ByMain ($main) {

		$rs = array();

		$atom = array();
		$atom['title'] = $main;
		$atom['path'] = array($main);
		$atom['sub'] = array();

		$rs[$main] = $atom;
		//$this->createMetaAll_ByMain('會心一笑', $rs['會心一笑']);
		$this->createMetaAll_ByMain ($main, $rs[$main]);

		return $rs;

	}

	public function createMetaAll_ByMain ($main, &$node) {
		$test = $this->findLinkList_ByMain($main);


		if (empty($test)) {
			return;
		}

		foreach ($test as $key => $sub) {
			$sub_path = $node['path'];
			if (in_array($sub, $sub_path)) { //排除已經存在的，避免無窮迴圈
				## echo ("Reapeat:" . $sub . PHP_EOL);
				continue;
			}
			$sub_path[] = $sub;

			$atom = array();
			$atom['title'] = $sub;
			$atom['path'] = $sub_path;
			$atom['sub'] = array();

			$node['sub'][$sub] = $atom;

			$this->createMetaAll_ByMain($sub, $node['sub'][$sub]);
		}

	}


	public function walkMetaData($node)
	{
		foreach ($node as $key => $atom) {
			if (empty($atom['sub'])) {
				//var_dump($node);
				//var_dump($atom);
				//var_dump($atom['path']);
				//echo($this->createPath($atom['path']) . PHP_EOL);
				$this->_TargetData[] = $atom['path'];
				continue;
			}

			//$this->walkMetaData($node[$key]);
			$this->walkMetaData($atom['sub']);
		}
	}


	public function createPath($list)
	{
		$rtn = '';
		foreach ($list as $val) {
			$rtn .= '/' . $val;
		}

		$rtn = ltrim($rtn, '/');

		return $rtn;
	}






}
