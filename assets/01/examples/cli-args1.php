<?php

	if (php_sapi_name() != 'cli') exit('Please run this file from the CLI');

	echo 'Number of arguments ' . $argc . PHP_EOL;
	foreach ($argv as $key => $value) {
		echo 'Argument #' . $key . ' : ' . $value . PHP_EOL;
	}