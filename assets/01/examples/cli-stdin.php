<?php

	if (php_sapi_name() != 'cli') exit('Please run this file from the CLI');

	while(!feof(STDIN)) {
		$line = trim(fgets(STDIN));
		if(strlen($line) > 0) {
			echo strrev($line).PHP_EOL;
		}
	}