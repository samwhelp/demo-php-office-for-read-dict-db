<?php

namespace Dict\LinkResult;


class ToStdOut {

	protected $_Data = array();
	public function setData ($val) {
		$this->_Data = $val;
		return $this;
	}


	public function run () {

		foreach ($this->_Data as $row => $list) {
			echo($this->createPath($list) . PHP_EOL);
		}

		return $this;
	}

	protected function createPath($list)
	{
		$rtn = '';
		foreach ($list as $val) {
			$rtn .= '/' . $val;
		}

		$rtn = ltrim($rtn, '/');

		return $rtn;
	}


}
