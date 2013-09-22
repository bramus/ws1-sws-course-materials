<?php

	if (php_sapi_name() != 'cli') exit('Please run this file from the CLI');

	$name = readline('What is your name? ');
	$city = readline('Where to you live? ');
	echo 'Hello ' . $name . ' from ' . $city . PHP_EOL;