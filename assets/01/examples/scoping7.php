<?php

	$foo = 'foo';

	$changePassByValue = function($arg) use ($foo) {
		$foo = 'foobar';
	};

	$changePassByReference = function($arg) use (&$foo) {
		$foo = 'foobar';
	};

	echo $foo . PHP_EOL;
	$changePassByValue('test');
	echo $foo . PHP_EOL;
	$changePassByReference('test');
	echo $foo . PHP_EOL;