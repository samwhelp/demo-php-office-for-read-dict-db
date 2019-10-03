#!/usr/bin/env php
<?php

	require_once(dirname(__DIR__) . '/app/boot/start.php');

	(new \Main\Model\DictConcisedDbSaveLink)
		->run()
	;
